<!DOCTYPE HTML>
<html lang="en">

<head>
    <!--=============== basic  ===============-->
    <meta charset="UTF-8">
    <title>Infolekha</title>

    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="{{ asset('website_asset/images/favicon.png') }}" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="{{ asset('website_asset/stylesheets/bootstrap.css') }}">

    <!--=============== css  ===============-->
    <link type="text/css" rel="stylesheet" href="{{ asset('website_asset/school_dashboard/css/plugins.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('website_asset/school_dashboard/css/style.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('website_asset/school_dashboard/css/dashboard-style.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('website_asset/school_dashboard/css/color.css') }}">

    
{{-- 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css" integrity="sha512-ARJR74swou2y0Q2V9k0GbzQ/5vJ2RBSoCWokg4zkfM29Fb3vZEQyv0iWBMW/yvKgyHSR/7D64pFMmU8nYmbRkg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-css/1.4.6/select2-bootstrap.min.css">
--}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" /> 

    <!--=============== favicons ===============-->
    <link rel="shortcut icon" href="images/favicon.ico">

    <style>

        .error {
            color: #ff0202 !important;
            font-size: 12px !important;
        }

        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align:center;
            background-color: #144273;
            ;
            color: white;
        }

        .disable-li {
            color: #a1a0a0 !important;

        }

        .swal2-toast .swal2-title {
            font-size: 14px !important;
        }

        .select2-container {
  max-height: 100px;
}

.select2-results__option {
  padding-right: 20px;
  vertical-align: middle;
}
.select2-results__option:before {
  content: "";
  display: inline-block;
  position: relative;
  height: 20px;
  width: 20px;
  border: 2px solid #e9e9e9;
  border-radius: 4px;
  background-color: #fff;
  margin-right: 20px;
  vertical-align: middle;
}
.select2-results__option[aria-selected=true]:before {
  font-family:fontAwesome;
  content: "\f00c";
  color: #fff;
  background-color: #073D5F;
  border: 0;
  display: inline-block;
  padding-left: 3px;
}
.select2-container--default .select2-results__option[aria-selected=true] {
	background-color: #fff;
}
.select2-container--default .select2-results__option--highlighted[aria-selected] {
	background-color: #eaeaeb;
	color: #272727;
}
.select2-container--default .select2-selection--multiple {
	margin-bottom: 10px;
}
.select2-container--default.select2-container--open.select2-container--below .select2-selection--multiple {
	border-radius: 4px;
}
.select2-container--default.select2-container--focus .select2-selection--multiple {
	border-color: #073D5F;
	border-width: 2px;
}
.select2-container--default .select2-selection--multiple {
	border-width: 2px;
    float: left;
    border: 1px solid #e5e7f2;
    background: #F5F7FB;
    width: 100%;
    padding: 2px 5px 4px 5px;
    border-radius: 4px;
    color: #7d93b2;
    font-size: 12px;
}
.select2-container--open .select2-dropdown--below {
	
	border-radius: 6px;
	box-shadow: 0 0 10px rgba(0,0,0,0.5);

}
.select2-selection .select2-selection--multiple:after {
	content: 'hhghgh';
}
/* select with icons badges single*/
.select-icon .select2-selection__placeholder .badge {
	display: none;
}
.select-icon .placeholder {
/* 	display: none; */
}
.select-icon .select2-results__option:before,
.select-icon .select2-results__option[aria-selected=true]:before {
	display: none !important;
	/* content: "" !important; */
}
.select-icon  .select2-search--dropdown {
	display: none;
}
.select2-container--default .select2-selection--multiple .select2-selection__rendered {
   
    height: 39px !important;
    overflow: auto;
}

.slick-slide-item {
    /* Set fixed dimensions for the slide item container */
    width: 300px; /* Set the desired width */
    height: 150px; /* Set the desired height */
}

.slider-image {
    width: 100% !important;
    object-fit: contain !important;
    height: 150px !important;
}
}
    </style>
    @yield('css')
    @stack('css2')

</head>

<body>
    <!--loader-->
    <div class="loader-wrap">
        <div class="loader-inner">
            <svg>
                <defs>
                    <filter id="goo">
                        <fegaussianblur in="SourceGraphic" stdDeviation="2" result="blur" />
                        <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 5 -2"
                            result="gooey" />
                        <fecomposite in="SourceGraphic" in2="gooey" operator="atop" />
                    </filter>
                </defs>
            </svg>
        </div>
    </div>
    <!--loader end-->
    <!-- main -->
    <div id="main">
        <!-- header -->
        <header class="main-header">
            <!--  logo  -->
            <div class="logo-holder">
                <a href="{{ route('index') }}"><img src="{{ asset('website_asset/images/Your-Logo.png') }}"
                        alt="image"></a>
            </div>
            <!-- logo end  -->

            <!--  dashboard-submenu  end -->

            <!-- header-search-wrapper -->
            <div class="header-search-wrapper novis_search">
                <div class="header-serach-menu">
                    <div class="custom-switcher fl-wrap">
                        <div class="fieldset fl-wrap">
                            <input type="radio" name="duration-1" id="buy_sw" class="tariff-toggle" checked>
                            <label for="buy_sw">Buy</label>
                            <input type="radio" name="duration-1" class="tariff-toggle" id="rent_sw">
                            <label for="rent_sw" class="lss_lb">Rent</label>
                            <span class="switch color-bg"></span>
                        </div>
                    </div>
                </div>
                <div class="custom-form">
                    <form method="post" name="registerform">
                        <label>Keywords </label>
                        <input type="text" placeholder="Address , Street , State..." value="" />
                        <label>Categories</label>
                        <select data-placeholder="Categories" class="chosen-select on-radius no-search-select">
                            <option>All Categories</option>
                            <option>House</option>
                            <option>Apartment</option>
                            <option>Hotel</option>
                            <option>Villa</option>
                            <option>Office</option>
                        </select>
                        <label style="margin-top:10px;">Price Range</label>
                        <div class="price-rage-item fl-wrap">
                            <input type="text" class="price-range" data-min="100" data-max="100000"
                                name="price-range1" data-step="1" value="1" data-prefix="$">
                        </div>
                        <button onclick="location.href='listing.html'" type="button" class="btn float-btn color-bg"><i
                                class="fal fa-search"></i> Search</button>
                    </form>
                </div>
            </div>
            <!-- header-search-wrapper end  -->
            <!-- wishlist-wrap-->
            <div class="header-modal novis_wishlist tabs-act">
                <ul class="tabs-menu fl-wrap no-list-style">
                    <li class="current"><a href="#tab-wish"> Wishlist <span>- 3</span></a></li>
                    <li><a href="#tab-compare"> Compare <span>- 2</span></a></li>
                </ul>
                <!--tabs -->
                <div class="tabs-container">
                    <div class="tab">
                        <!--tab -->
                        <div id="tab-wish" class="tab-content first-tab">
                            <!-- header-modal-container-->
                            <div class="header-modal-container scrollbar-inner fl-wrap" data-simplebar>
                                <!--widget-posts-->
                                <div class="widget-posts  fl-wrap">
                                    <ul class="no-list-style">
                                        <li>
                                            <div class="widget-posts-img"><a href="listing-single.html"><img
                                                        src="images/all/small/1.jpg" alt=""></a>
                                            </div>
                                            <div class="widget-posts-descr">
                                                <h4><a href="listing-single.html">Affordable Urban Room</a></h4>
                                                <div class="geodir-category-location fl-wrap"><a href="#"><i
                                                            class="fas fa-map-marker-alt"></i> 40 Journal Square , NJ,
                                                        USA</a></div>
                                                <div class="widget-posts-descr-price"><span>Price: </span> $ 1500 / per
                                                    month</div>
                                                <div class="clear-wishlist"><i class="fal fa-trash-alt"></i></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="widget-posts-img"><a href="listing-single.html"><img
                                                        src="images/all/small/2.jpg" alt=""></a>
                                            </div>
                                            <div class="widget-posts-descr">
                                                <h4><a href="listing-single.html">Family House</a></h4>
                                                <div class="geodir-category-location fl-wrap"><a href="#"><i
                                                            class="fas fa-map-marker-alt"></i> 34-42 Montgomery St ,
                                                        NY, USA</a></div>
                                                <div class="widget-posts-descr-price"><span>Price: </span> $ 50.000
                                                </div>
                                                <div class="clear-wishlist"><i class="fal fa-trash-alt"></i></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="widget-posts-img"><a href="listing-single.html"><img
                                                        src="images/all/small/3.jpg" alt=""></a>
                                            </div>
                                            <div class="widget-posts-descr">
                                                <h4><a href="listing-single.html">Apartment to Rent</a></h4>
                                                <div class="geodir-category-location fl-wrap"><a href="#"><i
                                                            class="fas fa-map-marker-alt"></i>75 Prince St, NY, USA</a>
                                                </div>
                                                <div class="widget-posts-descr-price"><span>Price: </span> $100 / per
                                                    night</div>
                                                <div class="clear-wishlist"><i class="fal fa-trash-alt"></i></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- widget-posts end-->
                            </div>
                            <!-- header-modal-container end-->
                            <div class="header-modal-top fl-wrap">
                                <div class="clear_wishlist color-bg"><i class="fal fa-trash-alt"></i> Clear all</div>
                            </div>
                        </div>
                        <!--tab end -->
                        <!--tab -->
                        <div class="tab">
                            <div id="tab-compare" class="tab-content">
                                <!-- header-modal-container-->
                                <div class="header-modal-container scrollbar-inner fl-wrap" data-simplebar>
                                    <!--widget-posts-->
                                    <div class="widget-posts  fl-wrap">
                                        <ul class="no-list-style">
                                            <li>
                                                <div class="widget-posts-img"><a href="listing-single.html"><img
                                                            src="images/all/small/4.jpg" alt=""></a>
                                                </div>
                                                <div class="widget-posts-descr">
                                                    <h4><a href="listing-single.html">Gorgeous house for sale</a></h4>
                                                    <div class="geodir-category-location fl-wrap"><a href="#"><i
                                                                class="fas fa-map-marker-alt"></i> 70 Bright St New
                                                            York, USA </a></div>
                                                    <div class="widget-posts-descr-price"><span>Price: </span> $ 52.100
                                                    </div>
                                                    <div class="clear-wishlist"><i class="fal fa-trash-alt"></i></div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="widget-posts-img"><a href="listing-single.html"><img
                                                            src="images/all/small/5.jpg" alt=""></a>
                                                </div>
                                                <div class="widget-posts-descr">
                                                    <h4><a href="listing-single.html">Family Apartments</a></h4>
                                                    <div class="geodir-category-location fl-wrap"><a href="#"><i
                                                                class="fas fa-map-marker-alt"></i> W 85th St, New York,
                                                            USA </a></div>
                                                    <div class="widget-posts-descr-price"><span>Price: </span> $ 72.400
                                                    </div>
                                                    <div class="clear-wishlist"><i class="fal fa-trash-alt"></i></div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- widget-posts end-->
                                </div>
                                <!-- header-modal-container end-->
                                <div class="header-modal-top fl-wrap">
                                    <a class="clear_wishlist color-bg" href="compare.html"><i
                                            class="fal fa-random"></i> Compare</a>
                                </div>
                            </div>
                        </div>
                        <!--tab end -->
                    </div>
                    <!--tabs end -->
                </div>
            </div>
            <!--wishlist-wrap end -->
            <!--header-opt-modal-->
            <div class="header-opt-modal novis_header-mod">
                <div class="header-opt-modal-container hopmc_init">
                    <div class="header-opt-modal-item lang-item fl-wrap">
                        <h4>Language: <span>EN</span></h4>
                        <div class="header-opt-modal-list fl-wrap">
                            <ul>
                                <li><a href="#" class="current-lan" data-lantext="EN">English</a></li>
                                <li><a href="#" data-lantext="FR">Franais</a></li>
                                <li><a href="#" data-lantext="ES">Espaol</a></li>
                                <li><a href="#" data-lantext="DE">Deutsch</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="header-opt-modal-item currency-item fl-wrap">
                        <h4>Currency: <span>USD</span></h4>
                        <div class="header-opt-modal-list fl-wrap">
                            <ul>
                                <li><a href="#" class="current-lan" data-lantext="USD">USD</a></li>
                                <li><a href="#" data-lantext="EUR">EUR</a></li>
                                <li><a href="#" data-lantext="GBP">GBP</a></li>
                                <li><a href="#" data-lantext="RUR">RUR</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--header-opt-modal end -->
        </header>
        <!-- header end  -->
        <!-- wrapper  -->
        <div id="wrapper">
            <!-- dashbard-menu-wrap -->
            <div class="dashbard-menu-overlay"></div>
            <div class="dashbard-menu-wrap">
                <div class="dashbard-menu-close"><i class="fal fa-times"></i></div>
                <div class="dashbard-menu-container">
                    <!-- user-profile-menu-->
                    <div class="user-profile-menu">
                        {{-- <h3>Main</h3> --}}
                        @php
                        $routeName = request()
                            ->route()
                            ->getName();
                    @endphp
                        <ul class="no-list-style">
                            <!-- <li><a href="dashboard.html"><i class="fal fa-chart-line"></i>Dashboard</a></li> -->
                            <li><a href="{{ route('school_profile.home') }}"
                                    @if ($routeName == 'school_profile.home') class="user-profile-act" @endif>
                                    <i class="fal fa-user"></i> Home Page</a></li>
                            <li><a href="{{ route('school_profile.update_profile') }}"
                                    @if ($routeName == 'school_profile.update_profile') class="user-profile-act" @endif><i
                                        class="fal fa-user-edit"></i>Update
                                    Profile</a></li>
                            @if (Auth::user()->active == '1')
                                <li><a href="{{ route('school_profile.post_result') }}"
                                        @if ($routeName == 'school_profile.post_result') class="user-profile-act" @endif><i
                                            class="fal fa-file"></i> Post
                                        Your
                                        Results</a></li>
                                <li>
                                    <a href="{{ route('school_profile.create_job_vacancy') }}"
                                        @if ($routeName == 'school_profile.create_job_vacancy') class="user-profile-act" @endif><i
                                            class="fal fa-briefcase"></i>Create Job Vacancy</a>

                                </li>

                                <li>
                                    <a
                                        class="submenu-link  
                                @if ($routeName == 'school_profile.post_announcement' || $routeName == 'school_profile.post_advertisement' ||  $routeName == 'school_profile.announcement-package') sl_tog @endif"><i
                                            class="fal fa-angle-right user-profile-act"></i>Promote Your
                                        {{ Auth::user()->entity_type }}
                                    </a>
                                    <ul class="no-list-style"
                                        @if ($routeName == 'school_profile.post_announcement' || $routeName == 'school_profile.post_advertisement' ||  $routeName == 'school_profile.announcement-package') style="display:block" @endif>
                                        <li><a href="{{ route('school_profile.post_announcement') }}"
                                                @if ($routeName == 'school_profile.post_announcement' ||  $routeName == 'school_profile.announcement-package') class="user-profile-act" @endif><i
                                                    class="fal fa-bullhorn"></i> Post Announcement </a></li>
                                        <li><a href="{{ route('school_profile.post_advertisement') }}"
                                                @if ($routeName == 'school_profile.post_advertisement') class="user-profile-act" @endif> <i
                                                    class="fal fa-ad"></i> Post Advertisement</a></li>

                                    </ul>
                                </li>
                                <li><a href="{{ route('school_profile.blog') }}"
                                    @if ($routeName == 'school_profile.blog' || $routeName == 'school_profile.write-blog') class="user-profile-act" @endif><i
                                        class="fal fa-file"></i> Write a Blog</a>
                                    </li>
                            <li>
                            @else
                                <li><a href="#" class="disable-li"><i class="fal fa-file"></i> Post
                                        Your
                                        Results</a></li>
                                <li>
                                    <a href="#" class="disable-li"><i class="fal fa-briefcase"></i>Create Job
                                        Vacancy</a>

                                </li>

                                <li>
                                    <a href="#" class="disable-li"><i
                                            class="fa-angle-right user-profile-act"></i>Promote Your
                                        {{ Auth::user()->entity_type }}
                                    </a>

                                </li>
                                <li>
                                    <a href="{{ route('activate_profile') }}"
                                        @if ($routeName == 'activate_profile') class="user-profile-act" @endif><i
                                            class="fal fa-unlock"></i>Activate Profile</a>
    
                                </li>
                            @endif


                            {{-- <li>
                                <a href="{{ route('school_profile.update_photo_video') }}"
                                    ><i class="fa fa-cloud-upload"></i>Upload
                                    Photo/Video</a>

                            </li> --}}

                            <li>
                                <a href="{{ route('school_profile.change_password') }}"
                                    @if ($routeName == 'school_profile.change_password') class="user-profile-act" @endif><i
                                        class="fal fa-key"></i>Change Password</a>

                            </li>

                           

                            <li>
                                <a href="#" class="disable-li"><i class="fal fa-cloud-download"></i>Download
                                    Profile</a>

                            </li>
                        </ul>
                    </div>
                    <!-- user-profile-menu end-->
                    <!-- user-profile-menu-->
                    <!-- <div class="user-profile-menu">
                            <h3>Listings</h3>
                            <ul  class="no-list-style">
                                <li><a href="dashboard-listing-table.html"><i class="fal fa-th-list"></i> My listigs  </a></li>
                                <li><a href="dashboard-bookings.html"> <i class="fal fa-calendar-check"></i> Bookings <span>2</span></a></li>
                                <li><a href="dashboard-review.html"><i class="fal fa-comments-alt"></i> Reviews </a></li>
                                <li><a href="dashboard-add-listing.html"><i class="fal fa-file-plus"></i> Add New</a></li>
                            </ul>
                        </div> -->
                    <!-- user-profile-menu end-->
                </div>
                <!-- <div class="dashbard-menu-footer"> &#169;  Homeradar 2022 .  All rights reserved.</div> -->
            </div>
            <!-- dashbard-menu-wrap end  -->
            <!-- content -->
            @yield('profile_content')
            <!-- dashboard-footer -->
            <!-- <div class="dashboard-footer">
                        <div class="dashboard-footer-links fl-wrap">
                            <span>Helpfull Links:</span>
                            <ul>
                                <li><a href="about.html">About  </a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="pricing.html">Pricing Plans</a></li>
                                <li><a href="contacts.html">Contacts</a></li>
                                <li><a href="help.html">Help Center</a></li>
                            </ul>
                        </div>
                        <a href="#main" class="dashbord-totop  custom-scroll-link"><i class="fas fa-caret-up"></i></a>
                    </div> -->
            <!-- dashboard-footer end -->
        </div>
        <!-- content end -->
        <div class="dashbard-bg gray-bg"></div>
    </div>
    <!-- wrapper end -->
    </div>
    <!-- Main end -->
    <!--=============== scripts  ===============-->
    <script src="{{ asset('website_asset/school_dashboard/js/jquery.min.js') }}"></script>
    <script src="{{ asset('website_asset/school_dashboard/js/plugins.js') }}"></script>
    <script src="{{ asset('website_asset/school_dashboard/js/scripts.js') }}"></script>
    <script src="{{ asset('website_asset/school_dashboard/js/dashboard.js') }}"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js" integrity="sha512-yDlE7vpGDP7o2eftkCiPZ+yuUyEcaBwoJoIhdXv71KZWugFqEphIS3PU60lEkFaz8RxaVsMpSvQxMBaKVwA5xg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

    <script>
        $.validator.addMethod(
            "strongPassword",
            function(value, element) {
                return (
                    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(value)
                );
            },
            "Password must contain at least one uppercase letter, one lowercase letter, one digit, and one special character."
        );
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'bottom',
            showConfirmButton: false,
            timer: 4000,
            background: '#000',
            color: '#fff',
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
    </script>
    @if (session()->has('success'))
    <script>
        Toast.fire({
            icon: 'success',
            title: "{{ session()->get('success') }}"
        })
    </script>
@endif

@if (session()->has('info'))
<script>
    Toast.fire({
        icon: 'info',
        title: "{{ session()->get('info') }}"
    })
</script>
@endif

    @if (session()->has('error'))
        <script>
            Toast.fire({
                icon: 'error',
                title: "{{ session()->get('error') }}"
            })
        </script>
    @endif
    @yield('js')

</body>

</html>
