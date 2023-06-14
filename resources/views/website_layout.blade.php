 <!DOCTYPE html>
 <!--[if (gte IE 9)|!(IE)]><!-->
 <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
 <!--<![endif]-->

 <head>
     <!-- Basic Page Needs -->
     <meta charset="utf-8">
     <title>Infolekha </title>

     <meta name="author" content="themesflat.com">

     <!-- Mobile Specific Metas -->
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <!-- Bootstrap  -->

     <link rel="stylesheet" type="text/css" href="{{ asset('website_asset/stylesheets/bootstrap.css') }}">

     <!-- Theme Style -->
     <link rel="stylesheet" type="text/css" href="{{ asset('website_asset/stylesheets/style.css') }}">
     <link rel="stylesheet" href="{{ asset('website_asset/stylesheets/wickedpicker.min.css') }}">

     <!-- Responsive -->
     <link rel="stylesheet" type="text/css" href="{{ asset('website_asset/stylesheets/responsive.css') }}">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />


     <!-- REVOLUTION LAYERS STYLES -->
     <link rel="stylesheet" type="text/css" href="{{ asset('website_asset/revolution/css/layers.css') }}">
     <link rel="stylesheet" type="text/css" href="{{ asset('website_asset/revolution/css/settings.css') }}">

     <!-- Animation Style -->
     <link rel="stylesheet" type="text/css" href="{{ asset('website_asset/stylesheets/animate.css') }}">

     <!-- Favicon and touch icons  -->
     <link href="{{ asset('website_asset/icon/apple-touch-icon-48-precomposed.png') }}"
         rel="apple-touch-icon-precomposed" sizes="48x48">
     <link href="{{ asset('website_asset/icon/apple-touch-icon-32-precomposed.png') }}"
         rel="apple-touch-icon-precomposed">
     <link href="{{ asset('website_asset/images/favicon.png') }}" rel="shortcut icon">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.16/css/bootstrap-multiselect.min.css"
         rel="stylesheet" />


     <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7902240890164332"
         crossorigin="anonymous"></script>


     <script async src="https://www.googletagmanager.com/gtag/js?id=G-4C6L2QE9LF"></script>
     <script>
         window.dataLayer = window.dataLayer || [];

         function gtag() {
             dataLayer.push(arguments);
         }
         gtag('js', new Date());

         gtag('config', 'G-4C6L2QE9LF');
     </script>
 </head>

 <style>
     @import url("https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap");

     *,
     *:after,
     *:before {
         box-sizing: border-box;
     }

     /* body {
  font-family: "Inter", sans-serif;
  line-height: 1.5;
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #f8f8f9;
} */

     .radio-group {
         display: flex;
         flex-wrap: wrap;
         justify-content: center;
         width: 90%;
         margin-left: auto;
         margin-right: auto;
         max-width: 600px;
         -webkit-user-select: none;
         -moz-user-select: none;
         -ms-user-select: none;
         user-select: none;
     }

     .radio-group>* {
         margin: 0.5rem 0.5rem;
     }

     .radio-group-legend {
         font-size: 1.5rem;
         font-weight: 700;
         color: #9c9c9c;
         text-align: center;
         line-height: 1.125;
         margin-bottom: 1.25rem;
     }

     .radio-input {
         clip: rect(0 0 0 0);
         -webkit-clip-path: inset(100%);
         clip-path: inset(100%);
         height: 1px;
         overflow: hidden;
         position: absolute;
         white-space: nowrap;
         width: 1px;
     }

     .radio-input:checked+.checkbox-tile {
         border-color: #073D5F;
         box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
         color: #073D5F;
     }

     .radio-input:checked+.checkbox-tile:before {
         transform: scale(1);
         opacity: 1;
         background-color: #073D5F;
         border-color: #073D5F;
     }

     .radio-input:checked+.checkbox-tile .checkbox-icon,
     .radio-input:checked+.checkbox-tile .checkbox-label {
         color: #073D5F;
     }

     .radio-input:focus+.checkbox-tile {
         border-color: #073D5F;
         box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1), 0 0 0 4px #b5c9fc;
     }

     .radio-input:focus+.checkbox-tile:before {
         transform: scale(1);
         opacity: 1;
     }

     .checkbox-tile {
         display: flex;
         flex-direction: column;
         align-items: center;
         justify-content: center;
         width: 10rem;
         min-height: 8rem;
         border-radius: 0.5rem;
         border: 2px solid #b5bfd9;
         background-color: #fff;
         box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
         transition: 0.15s ease;
         cursor: pointer;
         position: relative;
     }

     .checkbox-tile:before {
         content: "";
         position: absolute;
         display: block;
         width: 1.25rem;
         height: 1.25rem;
         border: 2px solid #b5bfd9;
         background-color: #fff;
         border-radius: 50%;
         top: 0.25rem;
         left: 0.25rem;
         opacity: 0;
         transform: scale(0);
         transition: 0.25s ease;
         background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='192' height='192' fill='%23FFFFFF' viewBox='0 0 256 256'%3E%3Crect width='256' height='256' fill='none'%3E%3C/rect%3E%3Cpolyline points='216 72.005 104 184 48 128.005' fill='none' stroke='%23FFFFFF' stroke-linecap='round' stroke-linejoin='round' stroke-width='32'%3E%3C/polyline%3E%3C/svg%3E");
         background-size: 12px;
         background-repeat: no-repeat;
         background-position: 50% 50%;
     }

     .checkbox-tile:hover {
         border-color: #073D5F;
     }

     .checkbox-tile:hover:before {
         transform: scale(1);
         opacity: 1;
     }

     .checkbox-icon {
         transition: 0.375s ease;
         color: #494949;
     }

     .checkbox-icon svg {
         width: 3rem;
         height: 3rem;
     }

     .checkbox-label {
         color: #707070;
         transition: 0.375s ease;
         text-align: center;
     }












     html,
     body {
         height: 100%;
         margin: 0;
         padding: 0;
         width: 100%;
     }

     .slider {
         width: 100%;
         margin: 0;

     }

     .slide_viewer {
         width: 100%;
         height: 500px;
         overflow: hidden;
         position: relative;
     }

     .slide_group {
         /* height: 100%; */
         position: relative;
         width: 100%;
     }

     .slide {
         display: none;
         height: 100%;
         position: absolute;
         width: 100%;
     }

     .slide:first-child {
         display: block;
     }

     .slide_buttons {
         left: 0;
         position: absolute;
         right: 0;
         text-align: center;
     }

     a.slide_btn {
         color: #474544;
         font-size: 42px;
         margin: 0 0.175em;
         -webkit-transition: all 0.4s ease-in-out;
         -moz-transition: all 0.4s ease-in-out;
         -ms-transition: all 0.4s ease-in-out;
         -o-transition: all 0.4s ease-in-out;
         transition: all 0.4s ease-in-out;
     }

     .slide_btn.active,
     .slide_btn:hover {
         color: #428CC6;
         cursor: pointer;
     }

     .directional_nav {
         height: 340px;
         margin: 0 auto;
         max-width: 940px;
         position: relative;
         top: 0px;
     }

     .previous_btn {
         bottom: 0;
         left: 100px;
         margin: auto;
         position: absolute;
         top: 10px;
     }

     .next_btn {
         bottom: 0;
         margin: auto;
         position: absolute;
         right: 100px;
         top: 0;
     }

     .previous_btn,
     .next_btn {
         cursor: pointer;
         height: 65px;
         opacity: 0.5;
         -webkit-transition: opacity 0.4s ease-in-out;
         -moz-transition: opacity 0.4s ease-in-out;
         -ms-transition: opacity 0.4s ease-in-out;
         -o-transition: opacity 0.4s ease-in-out;
         transition: opacity 0.4s ease-in-out;
         width: 65px;
     }

     .previous_btn:hover,
     .next_btn:hover {
         opacity: 1;
     }

     @media only screen and (max-width: 768px) {

         .paa {
             padding-right: 10%;

         }

         /* for mobile view /.menu */
         .menunone {
             display: none !important;
         }

         .menu1 {
             display: block !important;
         }

         .p1 {
             padding-top: 5%;
             font-size: 20px;
         }


         /* for mobile view /.menu end*/

         .previous_btn {
             left: 50px;
         }

         .next_btn {
             right: 50px;
         }
     }

     @media (max-width: 768px) {

         html,
         body {
             height: 100%;
             margin: 0;
             padding: 0;
             width: 100%;
         }

         .slider {
             margin: 0 auto;
             max-width: 1500px;
         }

         .slide_viewer {
             height: 133px !important;
             overflow: hidden;
             position: relative;
         }

         .slide_group {
             /* height: 100%; */
             position: relative;
             width: 100%;
         }

         .slide {
             display: none;
             height: 100%;
             position: absolute;
             width: 100%;
         }

         .slide:first-child {
             display: block;
         }

         .slide_buttons {
             left: 0;
             position: absolute;
             right: 0;
             text-align: center;
         }

         a.slide_btn {
             color: #474544;
             font-size: 42px;
             margin: 0 0.175em;
             -webkit-transition: all 0.4s ease-in-out;
             -moz-transition: all 0.4s ease-in-out;
             -ms-transition: all 0.4s ease-in-out;
             -o-transition: all 0.4s ease-in-out;
             transition: all 0.4s ease-in-out;
         }

         .slide_btn.active,
         .slide_btn:hover {
             color: #428CC6;
             cursor: pointer;
         }

         .directional_nav {
             height: 340px;
             margin: 0 auto;
             max-width: 940px;
             position: relative;
             top: 0px;
         }

         .previous_btn {
             bottom: 0;
             left: 100px;
             margin: auto;
             position: absolute;
             top: 10px;
         }

         .next_btn {
             bottom: 0;
             margin: auto;
             position: absolute;
             right: 100px;
             top: 0;
         }

         .previous_btn,
         .next_btn {
             cursor: pointer;
             height: 65px;
             opacity: 0.5;
             -webkit-transition: opacity 0.4s ease-in-out;
             -moz-transition: opacity 0.4s ease-in-out;
             -ms-transition: opacity 0.4s ease-in-out;
             -o-transition: opacity 0.4s ease-in-out;
             transition: opacity 0.4s ease-in-out;
             width: 65px;
         }

         .previous_btn:hover,
         .next_btn:hover {
             opacity: 1;
         }
     }

     /* slider */













     .popup1 {
         display: none;
         position: absolute;
         top: 10%;
         left: 70%;

         transform: translate(-70%, -70%);
         width: 800px;
         height: 400px;
         background-color: #fff;
         padding: 20px;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
         z-index: 1000;
     }

     .close-btn1 {
         position: absolute;
         top: 10px;
         left: 10px;
         cursor: pointer;
         font-size: 1.5rem;
         color: #666;
         transition: color 0.3s ease-in-out;
     }

     .close-btn1:hover {
         color: #000;
     }

     @media screen and (max-width: 480px) {
         .popup1 {
             width: 90%;
             /*height: 90%;*/
             max-width: none;
             max-height: none;
         }
     }







     .btn {
         border: none;
         background-color: #073D5F;

         font-size: 16px;
         cursor: pointer;
         display: inline-block;
     }

     .btn:hover {
         background: #477ea0;
     }

     .success {
         color: green;
     }

     .info {
         color: dodgerblue;
     }

     .warning {
         color: orange;
     }

     .danger {
         color: red;
     }

     .default {
         color: black;
     }

     .dropbtn {

         border: none;
         cursor: pointer;
     }



     .dropdown {
         position: relative;
         display: inline-block;
     }

     .dropdown-content {
         display: none;
         position: absolute;
         background-color: #f1f1f1;
         min-width: 225px;
         overflow: auto;
         box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
         z-index: 10000;
     }

     .dropdown-content a {
         color: black;
         padding: 12px 3px;
         text-decoration: none;
         display: block;
     }

     .dropdown a:hover {
         background-color: #ddd;
     }

     .show {
         display: block;
     }

     .inpclass input::placeholder {
         color: rgb(255, 255, 255);
     }


     /* .btn {
        border: none;
        background-color: #073D5F;
       
        font-size: 16px;
        cursor: pointer;
        display: inline-block;
    }

    .btn:hover {
        background: #477ea0;
    }


    .default {
        color: black;
    }

    .dropbtn {

        border: none;
        cursor: pointer;
    }



    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        
        overflow: auto;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 10000;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 3px;
        text-decoration: none;
        display: block;
    }

    .dropdown a:hover {
        background-color: #ddd;
    }

    .show {
        display: block;
    } */
     .error {
         color: #ff0202;
         font-size: 14px;
     }

     .fa-phone {
         transform: rotate(90deg);

     }
.heart:hover{
    background-color: #e8280b !important;
         color: #fff !important;
}
     .active_heart {
         background-color: #e8280b !important;
         color: #fff !important;
         animation: likeAnimation 0.35s ease-in-out;

     }

     @keyframes likeAnimation {
         0% {
             transform: scale(1);
         }

         50% {
             transform: scale(1.3);
             box-shadow: rgb(246, 166, 166) 0px 4px 10px;
         }

         100% {
             transform: scale(1);
         }
     }

     .star.filled {
         color: gold;
     }
     .swal2-toast .swal2-title {
    font-size: 14px!important;
  }
 </style>

 @yield('css')


 <body class="header_sticky">
     <!-- Preloader -->
     <!--<section class="loading-overlay">
        <div class="Loading-Page">
            <h2 class="loader">Loading</h2>
        </div>
    </section>-->

     <!-- Boxed -->
     <div class="boxed">
       
       

         <!-- Header -->
         <header id="header" class="header clearfix" style="margin-top:-2%;">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-3">
                         <div id="logo" style="margin-top:2em">


                             <a href="{{ route('index') }}"><img
                                     src="{{ asset('website_asset/images/Your-Logo.png') }}" alt="image"></a>


                         </div>
                         <div class="btn-menu">
                             <span></span>
                         </div>
                     </div>
                     <div class="col-lg-9">
                         <div class="nav-wrap">
                             <nav id="mainnav" class="mainnav float-right" style="margin-top:1em">
                                 <ul class="menu menunone">


                                     <li style="margin-top: 5%;">
                                         <p class="inpclass"><input type="text" id="current_location"
                                                 class="current_location" name="address" required=""
                                                 style="background-color: #073D5F;border-radius: 4px; height:37px; color: #fff;">
                                         </p>
                                     </li>

                                     <li>
                                         <div class="button-addlist  dropdown " id="home">
                                             <a
                                                 href="{{ route('index') }}
                                            "><button
                                                     type="button" class="btn" href='index.html'><i
                                                         class="fa fa-home" aria-hidden="true"></i> Home</button></a>
                                         </div>
                                     </li>



                                     <li>
                                         <div class="button-addlist  dropdown " id="event">
                                             <a
                                                 href="{{ route('event') }}
                                            "><button
                                                     type="button" class="btn"><i class="fa fa-calendar"
                                                         aria-hidden="true"></i> Events</button></a>
                                         </div>
                                     </li>




                                     <li>
                                         <div class="button-addlist  dropdown " id="blog">
                                             <a href="{{ route('blog') }}"><button type="button" class="btn"><i
                                                         class="fa fa-file-text" aria-hidden="true"></i>
                                                     Blogs</button></a>
                                         </div>
                                     </li>
                                     @if (auth()->check())
                                         <li style="color: black !important;"> <img
                                                 src="{{ asset('website_asset/images/user.png') }}">

                                             {{ auth()->check() ? auth()->user()->name : '' }}
                                             <ul class="submenu" style="width:6.5em">
                                                 <li>
                                                     @if (auth()->user()->role == 1)
                                                         <a href="{{ route('school_profile.home') }}">Profile</a>
                                                     @elseif(auth()->user()->role == 2)
                                                         <a href="{{ route('tutor_profile.home') }}">Profile</a>
                                                     @else
                                                     <a href="{{ route('user_profile.home') }}">Profile</a>
                                                     @endif
                                                 </li>
                                                 <li><a href="{{ route('logout') }}">Log out</a>
                                                 </li>
                                             </ul>
                                         </li>
                                     @else
                                         <li>
                                             <div class="button-addlist  dropdown">
                                                 <button type="button" onclick="myFunction()" class="btn dropbtn"
                                                     onclick="location.href='page-addlisting.html'"><i
                                                         class="fa fa-id-badge" aria-hidden="true"></i>

                                                     Sign Up</button>
                                                 <div id="myDropdown" class="dropdown-content">
                                                     <a href="{{ route('school_institute_register_form') }}">
                                                         &nbsp;School / College / Institution</a>
                                                     <a href="{{ route('student_register_form') }}"> &nbsp;Student /
                                                         Parent </a>
                                                     <a href="{{ route('tutor_register_form') }}"> &nbsp;Tutor /
                                                         Faculty </a>
                                                 </div>
                                             </div>
                                         </li>







                                         <li>
                                             <div class="button-addlist  dropdown ">
                                                 <a href="{{ route('login') }} "><button type="button"
                                                         class="btn" href='page-addlisting.html'><i
                                                             class="fa fa-user-plus"></i> Login</button></a>
                                             </div>
                                         </li>


                                     @endif







                                 </ul><!-- /.menu -->

                                 <!--for mobile view /.menu -->
                                 <ul class="menu menu1 " style="display: none; background-color: #073D5F;">
                                     <li class="home" id="home">
                                         <a href="{{ route('index') }}" style="color: #fff;"><i class="fa fa-home"
                                                 aria-hidden="true"></i> Home</a>
                                     </li>

                                     <li class="home" id="event">
                                         <a href="{{ route('event') }}"
                                             style="color: #fff; padding-top: -10% !important;"><i class="fa fa-book"
                                                 aria-hidden="true"></i> Events</a>
                                     </li>

                                     <li class="home" id="blog">
                                         <a href="{{ route('blog') }}" style="color: #fff;"><i
                                                 class="fa fa-file-text" aria-hidden="true"></i> Blogs</a>
                                     </li>


                                     

                                     @if (auth()->check())
                                         <li>
                                             <a href="#" style="color: #fff;"> <i class="fa fa-users"
                                                     aria-hidden="true"></i>
                                                 {{ auth()->check() ? auth()->user()->name : '' }}</a>
                                             <ul class="submenu">
                                                <li>
                                                    @if (auth()->user()->role == 1)
                                                        <a style="color: #fff;" href="{{ route('school_profile.home') }}">Profile</a>
                                                    @elseif(auth()->user()->role == 2)
                                                        <a style="color: #fff;" href="{{ route('tutor_profile.home') }}">Profile</a>
                                                    @else
                                                    <a style="color: #fff;" href="{{ route('user_profile.home') }}">Profile</a>
                                                    @endif
                                                </li>
                                                <li><a style="color: #fff;" href="{{ route('logout') }}">Log out</a>
                                                </li>
                                             </ul><!-- /.submenu -->
                                         </li>
                                         @else
                                         <li><a href="#" style="color: #fff;"> <i class="fa fa-arrow-circle-right"
                                            aria-hidden="true"></i> Sign Up</a>
                                    <ul class="submenu">
                                        <li><a href="{{ route('school_institute_register_form') }}"
                                                style="color: #fff;">School/College/Institution</a>
                                        </li>
                                        <li><a href="{{ route('student_register_form') }}"
                                                style="color: #fff;">Student/Parent</a>
                                        </li>
                                        <li><a href="{{ route('tutor_register_form') }}"
                                                style="color: #fff;">Tutor/Faculty</a>
                                        </li>
                                    </ul><!-- /.submenu -->
                                </li>

                                <li class="home">
                                    <a href="{{ route('login') }} " style="color: #fff;"><i
                                            class="fa fa-user-plus"></i> Login</a>
                                </li>
                                     @endif


                                 </ul><!-- /.menu -->
                             </nav><!-- /.mainnav -->

                             <div class="menu1" style="display: none;">
                                 <p class="inpclass"><input type="text" id="current_location2"
                                         class="current_location " name="address" required=""
                                         style="background-color: #073D5F; height:37px; border-radius: 4px; color: #fff; ">
                                 </p>
                             </div>
                         </div><!-- /.nav-wrap -->
                     </div><!-- /.col-lg-8 -->
                 </div><!-- /.row -->
             </div>
         </header><!-- /.header -->


         @yield('website_content')

         <!-- Footer -->
         <footer class="footer footer-widgets" style="position:sticky;">
             <div class="container">
                 <div class="bottom">
                     <div class="row">
                         <div class="col-lg-6">
                             <div class="copyright">
                                 <a href="{{ route('about_us') }}">About Us </a>&nbsp;&nbsp;
                                 <!--<a href="{{ route('blog') }}"  >Blogs </a>-->
                                 <a href="{{ route('web_contacts') }}">Contact Us</a>&nbsp;&nbsp;
                                 <a href="{{ route('privacy_policy') }}">Privacy Policy&nbsp;&nbsp;</a>
                                 <a href="{{ route('term') }}">Terms & Condition&nbsp;&nbsp;</a>
                                 <a href="{{ route('refund') }}">Refund & Cancellation</a>
                             </div>
                         </div><!-- /.col-md-12 -->
                         <div class="col-md-3"></div>
                         <!-- <div class="col-md-2"><img src="{{ asset('images/startupindia.png') }}"></div>-->
                         <div class="col-lg-3">
                             <div class="social-links float-right">
                                 <a
                                     href="https://www.facebook.com/people/INFOlekhaorg/100090065737337/?mibextid=ZbWKwL"><i
                                         class="fab fa-facebook"></i></a>

                                 <a href="https://twitter.com/info_lekha"><i class="fab fa-twitter"></i></a>
                                 <a href="https://www.linkedin.com/in/info-lekha-a876a026a/"><i
                                         class="fab fa-linkedin"></i></a>
                                 <a href="https://www.instagram.com/infolekha/?igshid=ZDdkNTZiNTM%3D"><i
                                         class="fab fa-instagram"></i></a>
                                 <a href="https://www.youtube.com/@infolekha"><i class="fab fa-youtube"></i></a>
                             </div>
                         </div>
                     </div>

                     <div class="row">
                         <div class="col-md-4"></div>
                         <div class="col-md-6">
                             <div class="copyright">
                                 <p>© {{ date('Y') }} INFOlekha Services LLP. <a
                                         href="https://themeforest.net/user/themesflat/portfolio"></a> All
                                     Rights Reserved.&nbsp;
                                 </p>
                             </div>
                         </div>

                     </div>
                 </div>
             </div>
         </footer>

         <!--modal-->
         <div class="modal fade flat-popupform" id="popup_register">
             <div class="modal-dialog modal-lg">
                 <div class="modal-content">
                     <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal"
                             aria-hidden="true">&times;</button>
                     </div>
                     <div class="modal-body text-center clearfix">
                         <form class="form-login form-listing" action="#" method="post">
                             <h3 class="title-formlogin">subscription Plans</h3>
                             <div style="border-bottom: 1px solid rgb(6, 16, 67); margin-bottom: 4%;"></div>
                             <!-- <h4 class="title-formlogin">Pay Now</h3> -->



                             <div class="row">
                                 <div class="col-md-12">

                                     <div class="row">
                                         <div class="col-md-6"
                                             style="padding-top:10px;  
                                            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 3px 10px 0 rgba(0, 0, 0, 0.19);border: #000 1p;">
                                             <div class="iconbox icon-text text-left">
                                                 <div class="box-content">
                                                     <h5 for="vehicle1" style="color: #073D5F; margin-left: 15%;">
                                                         <b>Monthly</b></h5>
                                                     <h6 style="color:#073D5F; margin-top: 2%; margin-left:2%; ">₹ 500
                                                         / Per Month</h6>
                                                     <div style="margin-left: 22%; margin-top:12%;">
                                                         <a> <button type="button"
                                                                 class="btn btn-primary">Subcribe</button></a>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <!-- <div class="col-md-1"></div> -->
                                         <div class="col-md-6"
                                             style="padding-top:10px;  
                                            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 3px 10px 0 rgba(0, 0, 0, 0.19);border: #000 1p;">
                                             <div class="iconbox icon-text text-left">
                                                 <div class="box-content">

                                                     <h5 for="vehicle2" style="color: #073D5F; margin-left: 22%; ">
                                                         <b>Yearly</b></h5>
                                                     <h6 style="color: #073D5F; margin-top: 2%; margin-left: 1%;">₹
                                                         5000 / Per Year</h6>
                                                     <div style="margin-left: 22%; margin-top:12%;">
                                                         <a> <button type="button"
                                                                 class="btn btn-primary">Subcribe</button></a>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>

                                     </div>
                                 </div>

                             </div>

                             <div class="row" style="margin-top: 10px;">
                                 <div class="col-md-12"
                                     style="padding-top:10px;  
                                    box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 3px 10px 0 rgba(0, 0, 0, 0.19);border: #000 1p;">

                                     <div class="row">
                                         <div class="col-md-4">
                                             <div>
                                                 <div>
                                                     <div>
                                                         <p
                                                             class="form-control-label"style="color: #073D5F; font-size:10px">
                                                             <b>Apply Coupon Code</b></p>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>

                                         <div class="col-md-8">
                                             <div>
                                                 <div>

                                                     <input type="text" class="form-control"
                                                         placeholder="Coupon Code">

                                                 </div>
                                             </div>
                                         </div>

                                     </div>
                                 </div>

                             </div>

                             <div class="update-profile" style="margin-top: 2%;">
                                 <a data-toggle="modal" href="#popup_login"> <button type="button"
                                         class="btn btn-primary">Next</button></a>
                             </div>



                         </form>
                     </div>
                 </div>
             </div>
         </div>
         <!--modal end-->

         <!---modal-2-->
         <div class="modal fade flat-popupform" id="popup_login">
             <div class="modal-dialog">
                 <div class="modal-content">
                     <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal"
                             aria-hidden="true">&times;</button>
                     </div>
                     <div class="modal-body text-center clearfix">
                         <form class="form-login form-listing" action="#" method="post">
                             <h3 class="title-formlogin" style="border-bottom: 1px solid rgb(69, 69, 69);">Pay Now
                             </h3>
                             <div class="row">
                                 <div class="row">

                                     <div class="col-md-12">

                                         <div>
                                             <form method="post" action="#" class="form-profile">
                                                 <div class="row">

                                                     <div class="col-lg-6">
                                                         <p>Monthly Packages</p>
                                                     </div>


                                                     <div class="col-lg-6">
                                                         <p>500</p>
                                                     </div>

                                                     <div class="col-lg-6">
                                                         <p>Disscount</p>
                                                     </div>


                                                     <div class="col-lg-6">
                                                         <p>(400)</p>
                                                     </div>
                                                     <hr style="color: #073D5F;">
                                                     <div class="col-lg-6">
                                                         <p>Net Pay</p>
                                                     </div>

                                                     <div class="col-lg-6">
                                                         <p> 100</p>
                                                     </div>




                                                     <div class="update-profile" style="margin-left:40%;">
                                                         <a> <button type="button" class="btn btn-primary">Pay
                                                                 Now</button></a>
                                                     </div>
                                                 </div>
                                             </form>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
         <!--modal-2 end-->

         <!-- Go Top -->
         <a class="go-top effect-button">
             <i class="fa fa-angle-up"></i>
         </a>

     </div>

     <!-- Javascript -->
     <script src="{{ asset('website_asset/javascript/jquery.min.js') }}"></script>
     <script src="{{ asset('website_asset/javascript/tether.min.js') }}"></script>
     <script src="{{ asset('website_asset/javascript/bootstrap.min.js') }}"></script>
     <script src="{{ asset('website_asset/javascript/jquery.easing.js') }}"></script>
     <script src="{{ asset('website_asset/javascript/jquery-waypoints.js') }}"></script>
     <script src="{{ asset('website_asset/javascript/jquery-countTo.js') }}"></script>
     <script src="{{ asset('website_asset/javascript/owl.carousel.js') }}"></script>
     <script src="{{ asset('website_asset/javascript/jquery.cookie.js') }}"></script>
     <script src="{{ asset('../../../cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.5/handlebars.min.js') }}"></script>
     <script src="{{ asset('website_asset/javascript/parallax.js') }}"></script>
     <script src="{{ asset('website_asset/javascript/bootstrap-slider.min.js') }}"></script>
     <script src="{{ asset('website_asset/javascript/smoothscroll.js') }}"></script>

     <script src="{{ asset('website_asset/javascript/main.js') }}"></script>

     <!-- Revolution Slider -->
     <script src="{{ asset('website_asset/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
     <script src="{{ asset('website_asset/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
     <script src="{{ asset('website_asset/revolution/js/slider.js') }}"></script>
     <script src="{{ asset('website_asset/javascript/jquery.flexslider-min.js') }}"></script>


     <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
     <script src="{{ asset('website_asset/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
     <script src="{{ asset('website_asset/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
     <script src="{{ asset('website_asset/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
     <script src="{{ asset('website_asset/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}">
     </script>
     <script src="{{ asset('website_asset/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
     <script src="{{ asset('website_asset/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
     <script src="{{ asset('website_asset/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
     <script src="{{ asset('website_asset/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
     <script src="{{ asset('website_asset/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     
     @if(session()->has('success'))
     <script>
            const Toast = Swal.mixin({
  toast: true,
  position: 'bottom',
  showConfirmButton: false,
  timer: 4000,
  background:'#000',
  color:'#fff',
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: "{{session()->get('success')}}"
})
     </script>
     @endif

@if(session()->has('error'))
<script>
       const Toast = Swal.mixin({
toast: true,
position: 'bottom',
showConfirmButton: false,
timer: 4000,
background:'#000',
color:'#fff',
timerProgressBar: true,
didOpen: (toast) => {
toast.addEventListener('mouseenter', Swal.stopTimer)
toast.addEventListener('mouseleave', Swal.resumeTimer)
}
})

Toast.fire({
icon: 'error',
title: "{{session()->get('error')}}"
})
</script>

     @endif

     <script>
         /* When the user clicks on the button, 
             toggle between hiding and showing the dropdown content */
         function myFunction() {
             document.getElementById("myDropdown").classList.toggle("show");
         }

         // Close the dropdown if the user clicks outside of it
         window.onclick = function(event) {
             if (!event.target.matches('.dropbtn')) {
                 var dropdowns = document.getElementsByClassName("dropdown-content");
                 var i;
                 for (i = 0; i < dropdowns.length; i++) {
                     var openDropdown = dropdowns[i];
                     if (openDropdown.classList.contains('show')) {
                         openDropdown.classList.remove('show');
                     }
                 }
             }
         }
     </script>


     <script>
        $(document).ready(function() {
  $(document).on("contextmenu", function(e) {
    //e.preventDefault();  //this will disable right click
  });

         const x = document.getElementById("current_location");
         if (navigator.geolocation) {
             navigator.geolocation.getCurrentPosition(showPosition);
         } else {
             alert("check your internet connection");
         }

         function showPosition(position) {

             let google_url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' + position.coords.latitude + ',' +
                 position.coords.longitude + '&key=AIzaSyDkFrL3p2KR9iAmFiuhmkszKgMHIon1Y0E';
           

             fetch(google_url).then(function(response) {
                 return response.json();
             }).then(function(data) {
              
                 let city = null;
                 let state = null;
                 for (const result of data.results) {
                     for (const component of result.address_components) {
                         if (component.types.includes('locality')) {
                             city = component.long_name;
                             break;
                         }
                         if (component.types.includes('administrative_area_level_4')) {
                             state = component.long_name;
                             break;
                         }
                     }
                     if (city && state) {
                         break;
                     }
                 }

                 $("#current_location,#current_location2").val(city);
                 var stored_city = localStorage.getItem('city_name');
                 if(stored_city){
                    $("#current_location,#current_location2").val(stored_city);
                 }
                 
                

             }).catch(function(err) {
                 console.log('Fetch Error :-S', err);
             });

         }
        });
     </script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
     <script>
         $.validator.addMethod("customEmail", function(value, element) {
             var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
             return this.optional(element) || emailRegex.test(value);
         }, "Invalid email format");

         $.validator.addMethod(
             "strongPassword",
             function(value, element) {
                 return (
                     /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(value)
                 );
             },
             ""
         );
     </script>
     @yield('js')
   
     <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7902240890164332"
         crossorigin="anonymous"></script>

     <script type="text/javascript"
         src="https://maps.google.com/maps/api/js?countrycode:IN&key=AIzaSyDkFrL3p2KR9iAmFiuhmkszKgMHIon1Y0E&libraries=places">
     </script>

     <script>
         google.maps.event.addDomListener(window, 'load', initialize);

         function initialize() {
              var current_location = document.getElementById('current_location');
             var autocomplete = new google.maps.places.Autocomplete(current_location);
             autocomplete.setOptions({
  types: ['(cities)']
});

             /*var autocomplete = new google.maps.places.Autocomplete(input);*/
             autocomplete.setComponentRestrictions({
                 'country': 'in'
             });
             autocomplete.addListener('place_changed', function() {
                console.clear();
              
                 var place = autocomplete.getPlace();
                 var address=place.formatted_address;
                 var city_name = address.substr(0, address.indexOf(',')).trim();
                 $("#current_location").val(city_name);
                 $("#current_location2").val(city_name);
                 localStorage.setItem('city_name', city_name);
                 stored_city_function(city_name);
                 
             });

             /* var input = document.getElementById('current_location');*/
             var autocomplete2 = new google.maps.places.Autocomplete(
                 (document.getElementById('current_location2')), {
                    types: ['(cities)']
                 });

             /*var autocomplete = new google.maps.places.Autocomplete(input);*/
             autocomplete2.setComponentRestrictions({
                 'country': 'in'
             });
             autocomplete2.addListener('place_changed', function() {
                 var place = autocomplete2.getPlace();
                 var address=place.formatted_address;
                 var city_name = address.substr(0, address.indexOf(',')).trim();
                 $("#current_location").val(city_name);
                 $("#current_location2").val(city_name);
                 localStorage.setItem('city_name', city_name);
                 stored_city_function(city_name);

             });
         }
         $("#current_location").on('focus', function() {
            $(this).attr('placeholder', '');
            $(this).val('');
         })


         $("#current_location2").on('focus', function() {
             $(this).attr('placeholder', '');
             $(this).val();
         })

         function stored_city_function(city){
            $.ajax({
                     type: 'GET',
                     url: '{{route("save-city")}}',
                     data:{city:city},
                     success: function(data) {
                         console.log(data);
                     },
                     error: function(data) {

                         console.log(data);
                     }
                 });
                }

                $(".like_college").on("click", function() {
                $(this).toggleClass("active_heart");
                $.ajax({
                    url: '{{ route("like_unlike") }}',
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "college_id": $(this).attr('college_id')
                    },
                    success: function(response) {
                        console.log('Like request successful');
                    },
                    error: function(xhr, status, error) {
                        console.log('Error sending like request:', error);
                    }
                });
            })
     </script>


 </body>

 </html>
