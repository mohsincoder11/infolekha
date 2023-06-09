@extends('Website.school_profile.layout')
@section('profile_content')
   <div class="dashboard-content">
                    <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>
                    <div class="container dasboard-container">
                        <!-- dashboard-title -->	
                        <div class="dashboard-title fl-wrap">
                            <div class="dashboard-title-item">Create job Vacancy</div>
                            @include('Website.school_profile.profile_header')

                            <!--Tariff Plan menu-->
                          
                            <!--Tariff Plan menu end-->						
                        </div>
                        <!-- dashboard-title end -->
                        <!-- dasboard-wrapper-->

                        <div class="dasboard-widget-box fl-wrap">
                        <div class="col-md-12">
                                <div class="custom-form">
                            <div class="row">

                                    <div class="col-md-6">
                                        <div class="listsearch-input-item ">
                                            <label>Job Vacancy posting</label>
                                            <select class="chosen-select on-radius no-search-select" >
                                                <option>All</option>
                                                <option> Teaching Staff</option>
                                                <option>Admin Staff</option>
                                            </select>
                                        </div>
                                     </div>
                         
                                    <div class="col-md-6">
                                        <label style="font-size:16px;">Name of Subject<span class="dec-icon"><i class="fas fa-user"></i></span></label>
                                        <input type="text" placeholder="Name of Subject" value=""/>
                                    </div>

                                    <div class="col-md-6">
                                        <label style="font-size:16px;">Post <span class="dec-icon"><i class="fas fa-school"></i></span></label>
                                        <input type="text" placeholder="Post" value=""/>
                                    </div>

                                    <div class="col-md-6" >
                                        <label style="font-size:16px;">Scope of work <span class="dec-icon"><i class="fas fa-school"></i></span></label>
                                        <input type="text" placeholder="Scope of work" value=""/>
                                    </div>
                                    <div class="col-md-6">
                                        <label style="font-size:16px;">Experience required<span class="dec-icon"><i class="fas fa-school"></i></span></label>
                                        <input type="text" placeholder="Experience required" value=""/>
                                    </div>
                                   

                                      <div class="col-md-6">
                                        <label style="font-size:16px;">Skills Required<span class="dec-icon"><i class="fas fa-school"></i></span></label>
                                        <input type="text" placeholder="Skills Required" value=""/>
                                    </div>
                                    <div class="col-md-6">
                                        <label style="font-size:16px;">Estimated Package <span class="dec-icon"><i class="fas fa-school"></i></span></label>
                                        <input type="text" placeholder="Estimated Package " value=""/>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="listsearch-input-item ">
                                            <label>Seelct Type</label>
                                            <select class="chosen-select on-radius no-search-select" >
                                                <option value="">Select Type</option>
                                                <option value="Part Time">Part Time</option>
                                                <option value="Full Time">Full Time</option> 
                                                <option value="Remote">Remote</option>
                                            </select>
                                        </div>
                                     </div>
                                  
                                  
                                </div>
                                

                               
                                    <button class="btn color-bg  float-btn" style="float:center;">Save Changes</button>
                             
                            </div>
                        </div>
                           
                        </div>
                        </div>
                       
                </div>
                @stop