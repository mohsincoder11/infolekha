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

    <!--=============== css  ===============-->
    <link type="text/css" rel="stylesheet" href="{{ asset('website_asset/school_dashboard/css/plugins.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('website_asset/school_dashboard/css/style.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('website_asset/school_dashboard/css/dashboard-style.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('website_asset/school_dashboard/css/color.css') }}">
    <!--=============== favicons ===============-->
    <link rel="shortcut icon" href="images/favicon.ico">
    <style>
        .error {
            color: #ff0202 !important;
            font-size: 14px !important;
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
            text-align: left;
            background-color: #144273;
            ;
            color: white;
        }

        .heart2 {
            position: absolute;
            right: -4px;
            top: -6px;
            font-size: 16px;
            width: 43px;
            height: 43px;
            line-height: 45px;
            color: #FFF;
            -webkit-border-radius: 50%;
            border-radius: 50%;
            text-align: center;
        }

        .swal2-toast .swal2-title {
            font-size: 14px !important;
        }
    </style>
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
                    <li class="current"><a href="#tab-wish"> Wishlist <span>- 3</span></a>
                    </li>
                    <li><a href="#tab-compare"> Compare <span>- 2</span></a>
                    </li>
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
                                <li><a href="#" class="current-lan" data-lantext="EN">English</a>
                                </li>
                                <li><a href="#" data-lantext="FR">Franais</a>
                                </li>
                                <li><a href="#" data-lantext="ES">Espaol</a>
                                </li>
                                <li><a href="#" data-lantext="DE">Deutsch</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="header-opt-modal-item currency-item fl-wrap">
                        <h4>Currency: <span>USD</span></h4>
                        <div class="header-opt-modal-list fl-wrap">
                            <ul>
                                <li><a href="#" class="current-lan" data-lantext="USD">USD</a>
                                </li>
                                <li><a href="#" data-lantext="EUR">EUR</a>
                                </li>
                                <li><a href="#" data-lantext="GBP">GBP</a>
                                </li>
                                <li><a href="#" data-lantext="RUR">RUR</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--header-opt-modal end -->
        </header>
        <!-- header end  -->
        <!-- wrapper  -->
        @php
        $routeName = request()
            ->route()
            ->getName();
    @endphp
        <div id="wrapper">
            <!-- dashbard-menu-wrap -->
            <div class="dashbard-menu-overlay"></div>
            <div class="dashbard-menu-wrap">
                <div class="dashbard-menu-close"><i class="fal fa-times"></i></div>
                <div class="dashbard-menu-container">
                    <!-- user-profile-menu-->
                    <div class="user-profile-menu">
                        <h3>Main</h3>
                        <ul class="no-list-style">
                            <!-- <li><a href="dashboard.html"><i class="fal fa-chart-line"></i>Dashboard</a>
                            </li> -->
                            <li><a href="{{ route('user_profile.home') }}" @if ($routeName == 'user_profile.home') class="user-profile-act" @endif ><i
                                        class="fal fa-user"></i> Home Page</a>
                            </li>
                            <li><a href="{{ route('user_profile.update_profile') }}"  @if ($routeName == 'user_profile.update_profile') class="user-profile-act" @endif><i
                                        class="fal fa-user-edit"></i>Update
                                    Profile</a>
                            </li>


                            <li>
                                <a href="{{ route('user_profile.user_wishlist') }}" @if ($routeName == 'user_profile.user_wishlist') class="user-profile-act" @endif><i
                                        class="fal fa-heart"></i>Wishlist</a>

                            </li>
                            <li>
                                <a href="{{ route('user_profile.user_change_password') }}" @if ($routeName == 'user_profile.user_change_password') class="user-profile-act" @endif><i
                                        class="fal fa-key"></i>Change Password</a>

                            </li>


                        </ul>
                    </div>
                    <!-- user-profile-menu end-->
                    <!-- user-profile-menu-->
                    <!-- <div class="user-profile-menu">
                            <h3>Listings</h3>
                            <ul  class="no-list-style">
                                <li><a href="dashboard-listing-table.html"><i class="fal fa-th-list"></i> My listigs  </a>
                                </li>
                                <li><a href="dashboard-bookings.html"> <i class="fal fa-calendar-check"></i> Bookings <span>2</span></a>
                                </li>
                                <li><a href="dashboard-review.html"><i class="fal fa-comments-alt"></i> Reviews </a>
                                </li>
                                <li><a href="dashboard-add-listing.html"><i class="fal fa-file-plus"></i> Add New</a>
                                </li>
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
                                <li><a href="about.html">About  </a>
                                </li>
                                <li><a href="blog.html">Blog</a>
                                </li>
                                <li><a href="pricing.html">Pricing Plans</a>
                                </li>
                                <li><a href="contacts.html">Contacts</a>
                                </li>
                                <li><a href="help.html">Help Center</a>
                                </li>
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
    @yield('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session()->has('success'))
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

            Toast.fire({
                icon: 'success',
                title: "{{ session()->get('success') }}"
            })
        </script>
    @endif

    @if (session()->has('error'))
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

            Toast.fire({
                icon: 'error',
                title: "{{ session()->get('error') }}"
            })
        </script>
    @endif

</body>

</html>
