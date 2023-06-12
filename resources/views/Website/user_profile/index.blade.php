@extends('Website.user_profile.layout')
@section('profile_content')

            <div class="dashboard-content">
                <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dashboard Menu</div>
                <div class="container dasboard-container">
                    <!-- dashboard-title -->
                    <div class="dashboard-title fl-wrap">
                        <div class="dashboard-title-item"><span> Profile</span></div>
                        @include('Website.school_profile.profile_header')

                        <!--Tariff Plan menu-->

                        <!--Tariff Plan menu end-->
                    </div>
                    <!-- dashboard-title end -->
                    <!-- dasboard-wrapper-->
                    <div class="dasboard-wrapper fl-wrap no-pag">
                        <div class="row">
                            <div class="col-md-10">

                                <div class="dasboard-widget-box fl-wrap">
                                    <div class="custom-form">


                                        <img src="{{asset('public/'.$user_data->logo)}}" alt=""
                                            style="height:90px; width:90px; border-radius:50%;"> <label
                                            style="text-align: center;  color: #144273; font-size:28px;">
                                            {{$user_data->name}}
                                        </label>
                                        <!-- <label style="text-align:center; color:#144273; font-size:16px;">Lorem ipsum
                                            dolor, sit amet consectetur adipisicing elit!!</label> -->

                                        <div class="col-md-12">
                                            <div class="row" style="margin-top: 40px;">

                                                <div class="col-md-4">
                                                    <span style="font-size:15px; color:#144273;">
                                                        <i class="fa fa-user"></i>                                             {{$user_data->r_name}}

                                                    </span>
                                                </div>
                                                <div class="col-md-4" style="margin-top: 5px;">
                                                    <span style="font-size:15px; color:#144273;">
                                                        <i class="fa fa-phone" aria-hidden="true"></i>                                             
                                                        {{$user_data->mob}}

                                                    </span>
                                                </div>
                                                <div class="col-md-4">
                                                    <span style="font-size:15px; color:#144273;">
                                                        <i class="fa fa-book"></i>
                                                        {{$user_data->r_current_school_institute}}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="col-md-12">
                                            <div class="row" style="margin-top: 40px;">

                                                <div class="col-md-4" style="margin-top: 5px;">
                                                    <span style="font-size:15px; color:#144273;">
                                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                                        {{$user_data->email}}

                                                    </span>
                                                </div>

                                                <div class="col-md-4" style="margin-top: 5px;">
                                                    <span style="font-size:15px; color:#144273;">
                                                        <i class="fa fa-map-marker" aria-hidden="true"></i> 
                                                        {{$user_data->address}}

                                                    </span>
                                                </div>
                                                {{-- <div class="col-md-4" style="margin-top: 5px;">
                                                    <span style="font-size:15px; color:#144273;">
                                                        <i class="fa fa-location-arrow" aria-hidden="true"></i> 444601
                                                    </span>
                                                </div> --}}

                                            </div>
                                        </div>




                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
         @stop