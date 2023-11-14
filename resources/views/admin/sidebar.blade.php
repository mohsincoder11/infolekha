<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">


    <div class="sidebar-header">
        <div>
            <img src="{{ asset('images/logo-icon.png') }}" class="logo-icon" alt="Infolekha">
        </div>
        <div>
            <h4 class="logo-text">
                <img src="{{ asset('images/logo-img.png') }}" width="100%" height="30%" alt="Infolekha">
            </h4>
        </div>
        <div class="toggle-icon ms-auto">
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        @if (can_view_this('admin.dashboard'))
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <div class="parent-icon"><i class='bx bx-home-circle' style="font-size: 17px;"></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        @endif

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="lni lni-list" style="font-size: 17px;"></i>
                </div>
                <div class="menu-title">Master</div>
            </a>
            <ul>
                @if (can_view_this('admin.master.subscription'))
                    <li> <a href="{{ route('admin.master.subscription') }}"><i class="bx bx-right-arrow-alt"></i>Make
                            Subscriptions</a>
                    </li>
                @endif
                @if (can_view_this('admin.master.coupon'))
                    <li> <a href="{{ route('admin.master.coupon') }}"><i class="bx bx-right-arrow-alt"></i>Add
                            Coupons</a>
                    </li>
                @endif

                @if (can_view_this('admin.master.advertisement'))
                    <li> <a href="{{ route('admin.master.advertisement') }}"><i
                                class="bx bx-right-arrow-alt"></i>Advertisements Package</a>
                    </li>
                @endif
                @if (can_view_this('admin.master.announcement'))
                    <li> <a href="{{ route('admin.master.announcement') }}"><i
                                class="bx bx-right-arrow-alt"></i>Announcements Package</a>
                    </li>
                @endif
                @if (can_view_this('admin.master.banner-image'))
                    <li> <a href="{{ route('admin.master.banner-image') }}"><i class="bx bx-right-arrow-alt"></i>Banner
                            Image</a>
                    </li>
                @endif
                @if (can_view_this('admin.master.default-otp'))
                    <li> <a href="{{ route('admin.master.default-otp') }}"><i class="bx bx-right-arrow-alt"></i>Default
                            OTP</a>
                    </li>
                @endif



            </ul>
        </li>

        @if (can_view_this('admin.registration.college') ||
                can_view_this('admin.registration.school') ||
                can_view_this('admin.registration.institute') ||
                can_view_this('admin.registration.student') ||
                can_view_this('admin.registration.tutor'))

            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="lni lni-list" style="font-size: 17px;"></i>
                    </div>
                    <div class="menu-title">Registrations</div>
                </a>
                <ul>

                    @if (can_view_this('admin.registration.college'))
                        <li> <a href="{{ route('admin.registration.college') }}"><i
                                    class="bx bx-right-arrow-alt"></i>College</a>
                        </li>
                    @endif
                    @if (can_view_this('admin.registration.school'))
                        <li> <a href="{{ route('admin.registration.school') }}"><i
                                    class="bx bx-right-arrow-alt"></i>School</a>
                        </li>
                    @endif
                    @if (can_view_this('admin.registration.institute'))
                        <li> <a href="{{ route('admin.registration.institute') }}"><i
                                    class="bx bx-right-arrow-alt"></i>Institute</a>
                        </li>
                    @endif
                    @if (can_view_this('admin.registration.student'))
                        <li> <a href="{{ route('admin.registration.student') }}"><i
                                    class="bx bx-right-arrow-alt"></i>Student</a>
                        </li>
                    @endif
                    @if (can_view_this('admin.registration.tutor'))
                        <li> <a href="{{ route('admin.registration.tutor') }}"><i
                                    class="bx bx-right-arrow-alt"></i>Tutor</a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        @if (can_view_this('admin.transaction') || can_view_this('admin.transaction-due'))
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="lni lni-list" style="font-size: 17px;"></i>
                    </div>
                    <div class="menu-title">Transaction</div>
                </a>
                <ul>


                    @if (can_view_this('admin.transaction'))
                        <li> <a href="{{ route('admin.transaction') }}"><i
                                    class="bx bx-right-arrow-alt"></i>Transaction
                                List</a>
                        </li>
                    @endif
                    @if (can_view_this('admin.transaction-due'))
                        <li> <a href="{{ route('admin.transaction-due') }}"><i
                                    class="bx bx-right-arrow-alt"></i>Transaction
                                Due</a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        @if (can_view_this('admin.announcement'))
            <li>
                <a href="{{ route('admin.announcement') }}">
                    <div class="parent-icon"><i class="lni lni-volume-high" style="font-size: 17px;"></i></i>
                    </div>
                    <div class="menu-title">Announcement</div>
                </a>
            </li>
        @endif

        @if (can_view_this('admin.advertisement'))
            <li>
                <a href="{{ route('admin.advertisement') }}">
                    <div class="parent-icon"><i class="lni lni-circle-plus" style="font-size: 17px;"></i></i>
                    </div>
                    <div class="menu-title">Advertisement</div>
                </a>
            </li>
        @endif

        @if (can_view_this('admin.blog'))
            <li>
                <a href="{{ route('admin.blog') }}">
                    <div class="parent-icon"><i class="lni lni-remove-file" style="font-size: 17px;"></i></i>
                    </div>
                    <div class="menu-title">Blogs</div>
                </a>
            </li>
        @endif
        @if (can_view_this('admin.users'))
            <li>
                <a href="{{ route('admin.users') }}">
                    <div class="parent-icon"><i class="lni lni-users" style="font-size: 17px;"></i></i>
                    </div>
                    <div class="menu-title">User Managment</div>
                </a>
            </li>
        @endif

        {{-- <li>
            <a href="#">
                <div class="parent-icon"><i class="lni lni-laptop-phone" style="font-size: 17px;"></i>
                </div>
                <div class="menu-title">Contact</div>
            </a>
        </li> 
     --}}


    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->
<!--start header -->
