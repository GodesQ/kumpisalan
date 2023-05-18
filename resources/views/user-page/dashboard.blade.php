@extends('layouts.user-layout')

@section('title', 'Dashboard')

@section('content')
<main id="main" class="site-main">
    <div class="site-content owner-content">
        <div class="member-menu">
            <div class="container">
                <ul>
                    <li class="active"><a href="owner-dashboard.html">Dashboard</a></li>
                    <li><a href="owner-bookings.html">Bookings</a></li>
                    <li><a href="owner-listings.html">Listings</a></li>
                    <li><a href="owner-wishlist.html">Wishlist</a></li>
                    <li><a href="owner-profile.html">Profile</a></li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="member-wrap">
                <div class="member-wrap-top">
                    <h2>Welcome back! {{ auth()->user()->firstname }}</h2>
                </div><!-- .member-wrap-top -->
                <div class="member-statistical">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="item blue">
                                <h3>Active Churches</h3>
                                <span class="number">0</span>
                                <span class="line"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="item green">
                                <h3>Saved Churches</h3>
                                <span class="number">12</span>
                                <span class="line"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="item yellow">
                                <h3>Ongoing Schedules</h3>
                                <span class="number">6</span>
                                <span class="line"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="item purple">
                                <h3>Cancelled Schedules</h3>
                                <span class="number">145</span>
                                <span class="line"></span>
                            </div>
                        </div>
                    </div>
                </div><!-- .member-statistical -->
                <div class="owner-box">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="ob-item">
                                <div class="ob-head">
                                    <h3>Recent Bookings</h3>
                                    <a href="#" class="view-all" title="View All">View all</a>
                                </div>
                                <div class="ob-content">
                                    <ul>
                                        <li class="pending">
                                            <p class="date"><b>Date:</b>March 15, 2020</p>
                                            <p class="place"><b>Place:</b>Bamboo Hotel Paris</p>
                                            <p class="status"><b>Status:</b><span>Pending</span></p>
                                            <a href="#" title="More" class="more"><i class="las la-angle-right"></i></a>
                                        </li>
                                        <li class="approve">
                                            <p class="date"><b>Date:</b>March 15, 2020</p>
                                            <p class="place"><b>Place:</b>Bamboo Hotel Paris</p>
                                            <p class="status"><b>Status:</b><span>Approve</span></p>
                                            <a href="#" title="More" class="more"><i class="las la-angle-right"></i></a>
                                        </li>
                                        <li class="cancel">
                                            <p class="date"><b>Date:</b>March 15, 2020</p>
                                            <p class="place"><b>Place:</b>Bamboo Hotel Paris</p>
                                            <p class="status"><b>Status:</b><span>Cancel</span></p>
                                            <a href="#" title="More" class="more"><i class="las la-angle-right"></i></a>
                                        </li>
                                        <li class="pending">
                                            <p class="date"><b>Date:</b>March 15, 2020</p>
                                            <p class="place"><b>Place:</b>Bamboo Hotel Paris</p>
                                            <p class="status"><b>Status:</b><span>Pending</span></p>
                                            <a href="#" title="More" class="more"><i class="las la-angle-right"></i></a>
                                        </li>
                                        <li class="approve">
                                            <p class="date"><b>Date:</b>March 15, 2020</p>
                                            <p class="place"><b>Place:</b>Bamboo Hotel Paris</p>
                                            <p class="status"><b>Status:</b><span>Approve</span></p>
                                            <a href="#" title="More" class="more"><i class="las la-angle-right"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="ob-item">
                                <div class="ob-head">
                                    <h3>New Reviews</h3>
                                    <a href="#" class="view-all" title="View All">View all</a>
                                </div>
                                <div class="ob-content">
                                    <ul class="place__comments">
                                        <li>
                                            <div class="place__author">
                                                <div class="place__author__avatar">
                                                    <a title="Sebastian" href="#"><img src="images/avatars/male-2.jpg" alt=""></a>
                                                </div>
                                                <div class="place__author__info">
                                                        <a title="Sebastian" href="#">Sebastian</a>
                                                        <div class="place__author__star">
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star"></i>
                                                            <span style="width: 72%">
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star"></i>
                                                            </span>
                                                        </div>
                                                    <span class="time">October 1, 2019</span>
                                                </div>
                                            </div>
                                            <div class="place__comments__content">
                                                <p>Went there last Saturday for the first time to watch my favorite djs (Kungs, Sam Feldet and Watermat) and really had a great experience. </p>
                                            </div>
                                            <p class="place"><b>Place:</b>Vago Restaurant</p>
                                        </li>
                                        <li>
                                            <div class="place__author">
                                                <div class="place__author__avatar">
                                                    <a title="Sebastian" href="#"><img src="images/avatars/male-1.jpg" alt=""></a>
                                                </div>
                                                <div class="place__author__info">
                                                        <a title="Sebastian" href="#">Sebastian</a>
                                                        <div class="place__author__star">
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star"></i>
                                                            <span style="width: 72%">
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star"></i>
                                                            </span>
                                                        </div>
                                                    <span class="time">October 1, 2019</span>
                                                </div>
                                            </div>
                                            <div class="place__comments__content">
                                                <p>Went there last Saturday for the first time to watch my favorite djs (Kungs, Sam Feldet and Watermat) and really had a great experience. </p>
                                            </div>
                                            <p class="place"><b>Place:</b>Renew Body Spa</p>
                                        </li>
                                        <li>
                                            <div class="place__author">
                                                <div class="place__author__avatar">
                                                    <a title="Sebastian" href="#"><img src="images/avatars/female-1.jpg" alt=""></a>
                                                </div>
                                                <div class="place__author__info">
                                                        <a title="Sebastian" href="#">Sebastian</a>
                                                        <div class="place__author__star">
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star"></i>
                                                            <span style="width: 72%">
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star"></i>
                                                            </span>
                                                        </div>
                                                    <span class="time">October 1, 2019</span>
                                                </div>
                                            </div>
                                            <div class="place__comments__content">
                                                <p>Went there last Saturday for the first time to watch my favorite djs (Kungs, Sam Feldet and Watermat) and really had a great experience. </p>
                                            </div>
                                            <p class="place"><b>Place:</b>Bamboo Hotel Paris</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="ob-item">
                                <div class="ob-head">
                                    <h3>Notifications <span>(5)</span></h3>
                                    <a href="#" class="clear-all" title="Clear All">Clear all</a>
                                </div>
                                <div class="ob-content">
                                    <ul>
                                        <li class="noti-item unread">
                                            <p>You have got a new booking <br> Booking ID: #123434</p>
                                            <span>1d ago</span><a href="#" class="delete-noti" title="Delete">Delete</a>
                                        </li>
                                        <li class="noti-item read">
                                            <p>You have got a new booking <br> Booking ID: #123434</p>
                                            <span>1d ago</span><a href="#" class="delete-noti" title="Delete">Delete</a>
                                        </li>
                                        <li class="noti-item read">
                                            <p>You have got a new booking <br> Booking ID: #123434</p>
                                            <span>1d ago</span><a href="#" class="delete-noti" title="Delete">Delete</a>
                                        </li>
                                        <li class="noti-item read">
                                            <p>You have got a new booking <br> Booking ID: #123434</p>
                                            <span>1d ago</span><a href="#" class="delete-noti" title="Delete">Delete</a>
                                        </li>
                                        <li class="noti-item read">
                                            <p>You have got a new booking <br> Booking ID: #123434</p>
                                            <span>1d ago</span><a href="#" class="delete-noti" title="Delete">Delete</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- .owner-box -->
            </div><!-- .member-wrap -->
        </div>
    </div><!-- .site-content -->
</main><!-- .site-main -->
@endsection

@if (Session::get('login-success'))
    @push('scripts')
        <script>
            toastr.success("{{ Session::get('login-success') }}", 'Login');
        </script>
    @endpush
@endif