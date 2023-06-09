<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

use App\Http\Requests\Church\CreateChurchRequest;
use App\Http\Requests\Church\UpdateChurchRequest;
use App\Http\Requests\Church\SaveChurchProfileRequest;

use DataTables;
use App\Models\Church;
use App\Models\ChurchDay;
use App\Models\Diocese;
use App\Models\Vicariate;

use App\Repositories\ChurchRepository;
use App\Repositories\ChurchTimeScheduleRepository;

class ChurchController extends Controller
{
    protected $ChurchRepository;
    protected $ChurchTimeScheduleRepository;

    public function __construct(ChurchRepository $ChurchRepository, ChurchTimeScheduleRepository $ChurchTimeScheduleRepository)
    {
        $this->ChurchRepository = $ChurchRepository;
        $this->ChurchTimeScheduleRepository = $ChurchTimeScheduleRepository;
    }

    public function churchProfile(Request $request)
    {
        $user = Auth::user();
        return view('user-page.representative-dashboard.church-profile', compact('user'));
    }

    public function saveChurchProfile(SaveChurchProfileRequest $request)
    {
        $data = $request->validated();
        $church = Church::where('church_uuid', $request->uuid)->firstOrFail();
        $update_church = $church->update($data);

        if ($update_church) {
            return back()->with('success', 'Save Church Successfully');
        }
    }

    public function searchPage(Request $request)
    {
        $queries = $request->all();
        $churches = Church::active(1)
            ->latest()
            ->with('schedules')
            ->paginate(10);
        return view('user-page.church-listing.churches', compact('churches', 'queries'));
    }

    public function fetchData(Request $request)
    {
        abort_if(!$request->ajax(), 404);

        $church_name = $request->church_name;
        $church_address = $request->church_address;
        $latitude = $request->latitude;
        $longitude = $request->longitude;
        $criterias = json_decode($request->criterias);
        $days = json_decode($request->days);
        $radius = $request->radius;

        $churches = Church::select('*')
            ->active(1)
            ->where(DB::raw('lower(name)'), 'like', '%' . strtolower($church_name) . '%')
            ->when($days, function ($q) use ($days) {
                if (in_array('monday', $days)) {
                    return $q->where('has_monday_sched', 1);
                }

                if (in_array('tuesday', $days)) {
                    return $q->where('has_tuesday_sched', 1);
                }

                if (in_array('wednesday', $days)) {
                    return $q->where('has_wednesday_sched', 1);
                }

                if (in_array('thursday', $days)) {
                    return $q->where('has_thursday_sched', 1);
                }

                if (in_array('friday', $days)) {
                    return $q->where('has_friday_sched', 1);
                }

                if (in_array('saturday', $days)) {
                    return $q->where('has_saturday_sched', 1);
                }

                if (in_array('sunday', $days)) {
                    return $q->where('has_sunday_sched', 1);
                }
            })
            ->when($latitude and $longitude && $church_address, function ($q) use ($latitude, $longitude, $radius) {
                return $q
                    ->addSelect(
                        DB::raw(
                            '6371 * acos(cos(radians(' .
                                $latitude .
                                "))
                                * cos(radians(churches.latitude)) * cos(radians(churches.longitude) - radians(" .
                                $longitude .
                                ')) + sin(radians(' .
                                $latitude .
                                "))
                                * sin(radians(churches.latitude))) AS distance",
                        ),
                    )
                    ->having('distance', '<=', $radius)
                    ->orderBy('distance', 'asc');
            })
            ->latest()
            ->paginate(10);

        $view_data = view('user-page.church-listing.church-data', compact('churches'))->render();
        return response()->json([
            'view_data' => $view_data,
            'churches' => $churches,
        ]);
    }

    public function fetchChurchName(Request $request) {
        $query = $request->church;

        $results = Church::select('id', 'name')
        ->where(DB::raw('lower(name)'), 'like', '%' . strtolower($query) . '%')
        ->limit(5)
        ->get();

        return response($results, 200);
    }

    public function detailPage(Request $request)
    {
        $church = Church::where('id', $request->id)
            ->with('schedules', 'church_diocese')
            ->firstOrFail();
        return view('user-page.church-listing.church-info', compact('church'));
    }

    public function lists(Request $request)
    {
        if ($request->ajax()) {
            $churches = Church::latest('id')
                ->active(1)
                ->isNotDeleted()
                ->with('church_diocese', 'church_vicariate');

            return Datatables::of($churches)
                ->addIndexColumn()
                ->addColumn('church_vicariate', function ($row) {
                    return $row->church_vicariate ? $row->church_vicariate->name : 'Vicariate Not Found';
                })
                ->addColumn('church_diocese', function ($row) {
                    return $row->church_diocese ? $row->church_diocese->name : 'Diocese Not Found';
                })
                ->addColumn('action', function ($row) {
                    $btn =
                        '<a href="/admin/church/edit/' .
                        $row->church_uuid .
                        '" class="btn btn-primary btn-sm"><i class="ti ti-edit"></i></a>
                        <a id="' .
                        $row->church_uuid .
                        '" class="btn btn-danger btn-sm remove-btn"><i class="ti ti-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin-page.churches.list');
    }

    public function create(Request $request)
    {
        $dioceses = Diocese::get();
        return view('admin-page.churches.create', compact('dioceses'));
    }

    public function store(CreateChurchRequest $request)
    {
        $data = $request->validated();

        $file = $request->file('church_image');
        $church_image_name = Str::snake($request->name) . '.' . $file->getClientOriginalExtension();
        $save_file = $file->move(public_path() . '/admin-assets/images/churches', $church_image_name);

        if ($save_file) {
            $church = $this->ChurchRepository->store($request, $data, $church_image_name);
            $saveScheduleTime = $this->ChurchTimeScheduleRepository->saveTime($request, $church);

            if (!$church) {
                $new_upload_image = public_path('/admin-assets/images/churches/') . $request->church_image_name;
                $remove_image = @unlink($new_upload_image);
                return back()->with('fail', 'Failed to create church. Please Try Again.');
            }

            return redirect()
                ->route('admin.churches.list')
                ->with('success', 'Church Successfully Created.');
        }

        return back()->with('fail', 'Failed to upload image of church. Please Try Again.');
    }

    public function edit(Request $request)
    {
        $church = Church::where('church_uuid', $request->uuid)
            ->with('schedules', 'church_vicariate')
            ->firstOrFail();

        $dioceses = Diocese::get();
        // $vicariates = Vicariate::select('name')->groupBy('name')->get();
        return view('admin-page.churches.edit', compact('church', 'dioceses'));
    }

    public function update(UpdateChurchRequest $request)
    {
        $data = $request->validated();
        $church = Church::where('church_uuid', $request->uuid)->firstOrFail();

        $church_image_path = $request->current_image;
        $save_file = null;

        if ($request->hasFile('church_image')) {
            $file = $request->file('church_image');

            $old_upload_image = public_path('/admin-assets/images/churches/') . $request->church_image_path;
            $remove_image = @unlink($old_upload_image);

            $church_image_path = Str::snake($request->name) . '.' . $file->getClientOriginalExtension();

            // save to directory
            $save_file = $file->move(public_path() . '/admin-assets/images/churches', $church_image_path);
        }

        $save_church = $this->ChurchRepository->update($request, $data, $church, $church_image_path);
        $saveScheduleTime = $this->ChurchTimeScheduleRepository->saveTime($request, $church);

        if (!$save_church && $save_file) {
            $new_upload_image = public_path('/admin-assets/images/churches/') . $request->church_image_name;

            $remove_image = @unlink($new_upload_image);
            return back()->with('fail', 'Failed to create church. Please Try Again.');
        }

        return redirect()
            ->route('admin.church.edit', $church->church_uuid)
            ->with('success', 'Church Successfully Updated.');
    }

    public function delete(Request $request)
    {
        $church = Church::where('church_uuid', $request->uuid)->firstOrFail();
        $delete = $church->delete();

        if ($delete) {
            return response([
                'status' => 'DELETED',
                'message' => 'Church Successfully Deleted',
            ]);
        }
    }
}
