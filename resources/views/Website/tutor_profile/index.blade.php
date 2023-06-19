@extends('Website.tutor_profile.layout')
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


                                @if (isset($user_data->logo))
                                    <img src="{{ asset('public/' . $user_data->logo) }}" alt=""
                                        style="height:90px; width:90px; border-radius:50%;">
                                @else
                                    <img src="{{ asset('public/icon/user.png') }}" alt=""
                                        style="height:90px; width:90px; border-radius:50%;">
                                @endif
                                <label style="text-align: center;  color: #144273; font-size:28px;">
                                    {{ $user_data->name }}
                                </label>
                                <!-- <label style="text-align:center; color:#144273; font-size:16px;">Lorem ipsum
                                                dolor, sit amet consectetur adipisicing elit!!</label> -->
                                <div class="col-md-12">
                                    <div class="row" style="margin-top: 40px;">

                                        <div class="col-md-4">
                                            <span style="font-size:15px; color:#144273;">
                                                <i class="fa fa-user"></i> {{ $user_data->name }}

                                            </span>
                                        </div>

                                        
                                        <div class="col-md-4" style="margin-top: 5px;">
                                            <span style="font-size:15px; color:#144273;">
                                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                                {{ $user_data->email }}

                                            </span>
                                        </div>
                                        <div class="col-md-4">
                                            <span style="font-size:15px; color:#144273;">
                                                <i class="fa fa-phone"></i>
                                                {{ $user_data->mob }}
                                            </span>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-md-12">
                                    <div class="row" style="margin-top: 40px;">

                                        <div class="col-md-4" style="margin-top: 5px;">
                                            <span style="font-size:15px; color:#144273;">
                                                <i class="fa fa-file-pdf" aria-hidden="true"></i>
                                               <a target="_blank" href="{{asset('public/'.$user_data->cv)}}">CV</a> 

                                            </span>
                                        </div>
                                        <div class="col-md-4" style="margin-top: 5px;">
                                            <span style="font-size:15px; color:#144273;">
                                                <i class="fa fa-book" aria-hidden="true"></i>
                                                {{ $user_data->subject }}

                                            </span>
                                        </div>

                                        <div class="col-md-4" style="margin-top: 5px;">
                                            <span style="font-size:15px; color:#144273;">
                                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                {{ $user_data->experiance }}
                                                {{ $user_data->experiance > 0 ? 'Years' : 'Year' }}

                                            </span>
                                        </div>

                                      


                                    </div>
                                </div>



                                <div class="col-md-12">
                                    <div class="row" style="margin-top: 40px;">
                                        <div class="col-md-4" style="margin-top: 5px;">
                                            <span style="font-size:15px; color:#144273;">
                                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                {{ $user_data->job_type }}

                                            </span>
                                        </div>
                                        <div class="col-md-4" style="margin-top: 5px;">
                                            <span style="font-size:15px; color:#144273;">
                                                <i class="fa fa-book" aria-hidden="true"></i>
                                                {{ $user_data->address }}

                                            </span>
                                        </div>

                                        <div class="col-md-4" style="margin-top: 5px;">
                                            <span style="font-size:15px; color:#144273;">
                                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                {{ $user_data->pin_code }}

                                            </span>
                                        </div>




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
