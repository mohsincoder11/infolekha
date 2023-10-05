@extends('Website.tutor_profile.layout')
@section('css')
<style>
	
	  /* @media (max-width: 768px) {
        .pd {
        padding-right:15px;
        }*/
		
    .contats-list.fl-wrap a{
        text-decoration: none;
        cursor: text;

    }
	
	table, th, td {
		
}
	tr, td{
	padding:4px;
	}
	
	td, a{
		justify-content:left;
		color: #3c628b;
	}
	
</style>
@stop
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
                                            <h4 style="font-size:22px;">{{ $user_data->name }}</h4>
                                          
                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-widget-content fl-wrap">
                                    <div class="contats-list fl-wrap " style="padding-left:20px; padding-right:10px;">
										<table style="width:100%; color: #3c628b; font-size:1rem; ">
											<tr>
												<td align="left"><i style="transform: rotate(90deg);" class="fa fa-phone" aria-hidden="true"></i>  <span>Phone</span> </td>
												<td>:</td>
												<td align="left"><a href="javascript:void(0)"><span>{{ $user_data->mob }}</span></a></td>
											</tr>
											<tr>
												<td align="left"><i class="fa fa-envelope" aria-hidden="true"></i> <span>Mail</span> </td>
													<td>:</td>
												<td align="left"><a href="javascript:void(0)"><span>{{ $user_data->email }}</span></a></td>
											</tr>
												<tr>
												<td align="left"><i class="fa fa-book"></i> <span>Subject</span> </td>
													<td>:</td>
												<td align="left"><a href="javascript:void(0)"><span style=" text-transform: capitalize;">{{ $user_data->subject }}</span></a></td>											
											</tr>
													<tr>
												<td align="left"><i class="fal fa-file-pdf"></i> <span>CV</span> </td>
													<td>:</td>
												<td align="left"><a style="text-decoration: underline; !important;cursor:pointer;" target="_blank" href="{{asset('public/'.$user_data->cv)}}"><span>View CV</span></a></td>											
											</tr>
												<tr>
												<td align="left"><i class="fa fa-table" aria-hidden="true"></i> <span>Experience</span> </td>
													<td>:</td>
												<td align="left"><a href="javascript:void(0)"> <span>{{ $user_data->experiance }}
                                                {{ $user_data->experiance > 0 ? 'Years' : 'Year' }}</span></a></td>											
											</tr>
												<tr>
												<td align="left"><i class="fa fa-briefcase" aria-hidden="true"></i> <span>Job Type</span> </td>
													<td>:</td>
													<td align="left"><a href="javascript:void(0)"><span>{{ $user_data->job_type }}</span></a></td>											
											</tr>
												<tr>
												<td align="left"><i class="fa fa-map-marker" aria-hidden="true"></i> <span>Address </span> </td>
													<td>:</td>
													<td align="left"><a href="javascript:void(0)"><span>{{ $user_data->address }}</span></a></td>											
											</tr>
												<tr>
												<td align="left"><i class="fa fa-location-arrow" aria-hidden="true"></i> <span>Pin code </span> </td>
													<td>:</td>
												<td align="left"><a href="javascript:void(0)"><span>{{ $user_data->pin_code }}</span>
                                            </a></td>											
											</tr>
											
										</table>
                                      <!--  <ul class="no-list-style">
                                            <li><span> <i style="transform: rotate(90deg);" class="fa fa-phone" aria-hidden="true"></i>  Phone :</span> <a href="javascript:void(0)">{{ $user_data->mob }}</a></li>
                                            <li><span>  <i class="fa fa-envelope" aria-hidden="true"></i> Mail :</span> <a href="javascript:void(0)">{{ $user_data->email }}</a></li>
                                            <li><span>  <i class="fa fa-book"></i>Subject :</span> <a href="javascript:void(0)">{{ $user_data->subject }}
                                            </a></li>
                                            <li><span><i class="fal fa-file-pdf"></i> CV:</span> <a style="text-decoration: underline; !important;cursor:pointer;" target="_blank" href="{{asset('public/'.$user_data->cv)}}">View CV</a></li>
                                            <li><span>  <i class="fa fa-table" aria-hidden="true"></i> Experience :</span> <a href="javascript:void(0)"> {{ $user_data->experiance }}
                                                {{ $user_data->experiance > 0 ? 'Years' : 'Year' }}</a></li>
                                            <li><span>  <i class="fa fa-briefcase" aria-hidden="true"></i> Job Type :</span> <a href="javascript:void(0)">{{ $user_data->job_type }}</a></li>
                                            <li><span><i class="fa fa-map-marker" aria-hidden="true"></i> Address :</span> <a href="javascript:void(0)">{{ $user_data->address }}</a></li>
                                            <li><span>   <i class="fa fa-location-arrow" aria-hidden="true"></i>Pin code :</span> <a href="javascript:void(0)">{{ $user_data->pin_code }}
                                            </a></li>

                                        </ul>-->
                            

                       
                                    <!-- <div class="profile-widget-footer fl-wrap">
                                        <a href="agent-single.html" class="btn float-btn color-bg small-btn">View Profile</a>
                                    </div> -->
							
										<div>						<h4
 style="color:#3c628b; font-size:18px; margin-top:10px; float:left; padding-left:5px;" ><i class="fa fa-pencil-square-o"></i> Declaration<h4>
						 <div class="col-md-12 " style=" border:1px solid #eee; padding:10px; margin-top:20px; margin-bottom:10px;" >


                            <p  
                                style="margin-bottom:20px; color:#144273;  font-size:14px;">{{ $user_data->declaration }}
                            </p>

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
