@extends('Website.school_profile.layout')
@section('profile_content')
<div class="dashboard-content">
                    <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>
                    <div class="container dasboard-container">
                        <!-- dashboard-title -->	
                        <div class="dashboard-title fl-wrap">
                            <div class="dashboard-title-item">Update Profile</div>
                            @include('Website.school_profile.profile_header')

                            <!--Tariff Plan menu-->
                            <!-- <div class="tfp-det-container">
                                <div   class="tfp-btn"><span>Your Tariff Plan : </span> <strong>Extended</strong></div>
                                <div class="tfp-det">
                                    <p>You Are on <a href="#">Extended</a> . Use link bellow to view details or upgrade. </p>
                                    <a href="#" class="tfp-det-btn color-bg">Details</a>
                                </div>
                            </div> -->
                            <!--Tariff Plan menu end-->						
                        </div>
                        <!-- dashboard-title end -->
                        <!-- dasboard-wrapper-->
                        
                     
                        <div class="dasboard-widget-box fl-wrap">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="custom-form">
                                        <form action="{{route('school_profile.update_profiledata')}}" method="post">
                                        @csrf
                                        <div class="col-md-6">
                                            <label style="font-size:16px;">Upload School Image</label>
                                            <input type="file" class="upload" name="image"/>
                                            <img height="50px" width="50px" src="{{asset('public')."/".$data->image}}" alt="">
                                        </div>
                                        <div class="col-md-6">
                                            <label style="font-size:16px;">Upload Logo </label>
                                            <input type="file" name="logo" class="upload" value="{{$data->logo}}"/>
                                            <img height="50px" width="50px" src="{{asset('public')."/".$data->logo}}" alt="">
                                        </div>
                                        <div class="col-md-6">
                                            <label style="font-size:16px;">Enter Your Name <span class="dec-icon"><i class="fas fa-user"></i></span></label>
                                            <input type="text" placeholder="Noory" name="name" value="{{$data->name}}"/>
                                        </div>
                                        <div class="col-md-6">
                                            <label style="font-size:16px;">School Name <span class="dec-icon"><i class="fas fa-school"></i></span></label>
                                            <input type="text" placeholder="School of Scholar" name="entity_name" value="{{ $data->entity_name }}" />
                                        </div>
                                        <div class="col-md-6">
                                            <label style="font-size:16px;">Facilities <span class="dec-icon"><i class="fas fa-desktop"></i></span></label>
                                            <select data-placeholder="Status" class="chosen-select on-radius no-search-select">
                                               
                                            </select>
                                        </div>
                                        
                                        
                                        <div class="col-md-6">
                                            <label style="font-size:16px;">Courses <span class="dec-icon"><i class="fas fa-truck-couch"></i></span></label>
                                            <select data-placeholder="Status" class="chosen-select on-radius no-search-select" >
                                                <option></option>
                                              
                                            </select>
                                        </div>
                                        {{-- <div class="col-md-6" style="margin-top:2%;">
                                            <label>Tagline<span class="dec-icon"><i class="fas fa-minus-octagon"></i></span></label>
                                            <input type="text" placeholder="Tagline" value="{{$data->}}"/>
                                        </div> --}}

                                        <div class="col-md-6"  >
                                            <label style="font-size:16px;">Facebook Link<span class="dec-icon"><i
                                                        class="fas fa-minus-octagon"></i></span></label>
                                            <input type="text" placeholder="Facebook Link" name="fb" value="{{$data->fb}}" />
                                        </div>
    
                                                   
                                        <div class="col-md-6"  >
                                            <label style="font-size:16px;">Twitter Link<span class="dec-icon"><i
                                                        class="fas fa-minus-octagon"></i></span></label>
                                            <input type="text" placeholder="Twitter Link" name="website" value="{{$data->website}}" />
                                        </div>
    
                                        <div class="col-md-6"  >
                                            <label style="font-size:16px;">Instagram Link<span class="dec-icon"><i
                                                        class="fas fa-minus-octagon"></i></span></label>
                                            <input type="text" placeholder="Instagram Link" name="insta" value="{{$data->insta}}" />
                                        </div>
    
                                           
                                        <div class="col-md-6"  >
                                            <label style="font-size:16px;">You-tube Link<span class="dec-icon"><i
                                                        class="fas fa-minus-octagon"></i></span></label>
                                            <input type="text" placeholder="You-tube Link" name="yt" value="{{$data->yt}}" />
                                        </div>
    
                                        <div class="col-md-6"  >
                                            <label style="font-size:16px;">Linkdin Link<span class="dec-icon"><i
                                                        class="fas fa-minus-octagon"></i></span></label>
                                            <input type="text" placeholder="Linkdin Link" name="google" value="{{$data->google}}" />
                                        </div>
    
                                      			
                                        <label>About Us </label>
                                        <textarea cols="40" rows="3" placeholder="About Me" style="margin-bottom:20px;" name="about">{{$data->about}}</textarea>										
                                        <button type="submit" class="btn color-bg  float-btn">Save Changes</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        </div>
                        
                    </div>
                    @stop