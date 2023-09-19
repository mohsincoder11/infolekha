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
                   



                    <div class="dasboard-widget-box fl-wrap">
                        <div class="box-widget fl-wrap">
                            <div class="profile-widget">
                                <div class="profile-widget-header color-bg smpar fl-wrap">
                                    <div class="pwh_bg"></div>
  
                                   
                                    <div class="profile-widget-card">
                                        <div class="profile-widget-image">
                                            @if (isset($user_data->logo))
                                            <img src="{{ asset('public/' . $user_data->logo) }}" alt="">
                                            @else
                                            <img src="{{ asset('public/icon/user.png') }}" alt=""
                                                style="height:90px; width:90px; border-radius:50%;">
                                            @endif
                                        </div>
                                        <div class="profile-widget-header-title">
                                            <h4 style="font-size:22px;"><a href="agent-single.html">{{ $user_data->name }}</a></h4>
                                          
                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-widget-content fl-wrap">
                                    <div class="contats-list fl-wrap" style="padding-left:10px; padding-right:10px;">
                                        <ul class="no-list-style">
                                            <li><span> <i class="fa fa-phone" aria-hidden="true"></i>  Phone :</span> <a href="#">{{ $user_data->mob }}</a></li>
                                            <li><span>  <i class="fa fa-envelope" aria-hidden="true"></i> Mail :</span> <a href="#">{{ $user_data->email }}</a></li>
                                            <li><span>  <i class="fa fa-book"></i>Subject :</span> <a href="#">{{ $user_data->subject }}
                                            </a></li>
                                            <li><span><i class="fal fa-file-pdf"></i> CV:</span> <a target="_blank" href="{{asset('public/'.$user_data->cv)}}">View CV</a></li>
                                            <li><span>  <i class="fa fa-table" aria-hidden="true"></i> Experience :</span> <a href="#"> {{ $user_data->experiance }}
                                                {{ $user_data->experiance > 0 ? 'Years' : 'Year' }}</a></li>
                                            <li><span>  <i class="fa fa-briefcase" aria-hidden="true"></i> Job Type :</span> <a href="#">{{ $user_data->job_type }}</a></li>
                                            <li><span><i class="fa fa-map-marker" aria-hidden="true"></i> Address :</span> <a href="#">{{ $user_data->address }}</a></li>
                                            <li><span>   <i class="fa fa-location-arrow" aria-hidden="true"></i>Pin code :</span> <a href="#">{{ $user_data->pin_code }}
                                            </a></li>

                                        </ul>
                                    </div>

                       
                                    <!-- <div class="profile-widget-footer fl-wrap">
                                        <a href="agent-single.html" class="btn float-btn color-bg small-btn">View Profile</a>
                                    </div> -->
                                </div>
								
								             <div class="col-md-12 "   style="margin-top:5%;
box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >

                            <span 
								  style="color:#3c628b; text-align:center;"><b>Declaration</b></span>
                            <p  align="justify" 
                                style="margin-bottom:20px;  color:#144273;">{{ $user_data->declaration }}
                            </p>

                        </div>
                            </div>
                        </div>
                    </div>











                </div>


            </div>
        </div>
    </div>
@stop
