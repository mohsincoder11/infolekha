@extends('school_institute_profile_layout')
@section('profile_content')
<div class="dashboard-content">
                    <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>
                    <div class="container dasboard-container">
                        <!-- dashboard-title -->	
                        <div class="dashboard-title fl-wrap">
                            <div class="dashboard-title-item">Create job Vacancy</div>
                            <div class="dashbard-menu-header">
                                <div class="dashbard-menu-avatar fl-wrap">
                                    <img src="images/avatar/user.png" alt="">
                                     <h4>Welcome, <span>Amit Tawanee</span></h4>
                                </div>
                                <a href="index.html" class="log-out-btn   tolt" data-microtip-position="bottom"  data-tooltip="Log Out"><i class="far fa-power-off"></i></a>
                            </div>
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
                        
                        <div class="col-md-12">
                            <div class="list-searh-input-wrap-title fl-wrap"></div>
                            <div class="block-box fl-wrap search-sb" id="filters-column">
                                <!-- listsearch-input-item -->
                               
                                <!-- listsearch-input-item end-->
                                <!-- listsearch-input-item -->
                                <div class="col-md-6">
                                <div class="listsearch-input-item">
                                    <label>Teaching Staff</label>
                                    <select data-placeholder="All Cities" class="chosen-select on-radius no-search-select" >
                                        <option>All</option>
                                        <option> Name of Subject</option>
                                        <option>Experience Required</option>
                                        <option>Skills Required</option>
                                        <option>Estimated Package (Optional)</option>
                                        <option>Part Time/ Full Time/ Remote</option>
                                       
                                       
                                        
                                    </select>
                                </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="listsearch-input-item">
                                        <label>Admin Staff</label>
                                        <select data-placeholder="All Cities" class="chosen-select on-radius no-search-select" >
                                            <option>All</option>
                                            <option>Post</option>
                                            <option>scope Of Work</option>
                                            <option>Experience required</option>
                                            <option>Skills Required</option>
                                            <option>Estimated Package</option>
                                            <option>Part Time/ Full Time/ Remote</option>
                                           
                                            
                                        </select>
                                    </div>
                                    </div>
                                    
                                <div class="col-md-12"><button class="btn color-bg " style="margin-top:4vh;">Save Changes</button></div>
                            
                            
                            
                        </div>
                        </div>
                        </div>
                       
                </div>
                @stop