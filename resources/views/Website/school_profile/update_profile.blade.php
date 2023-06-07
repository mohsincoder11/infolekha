@extends('Website.school_profile.layout')
@section('profile_content')
<div class="dashboard-content">
                    <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>
                    <div class="container dasboard-container">
                        <!-- dashboard-title -->	
                        <div class="dashboard-title fl-wrap">
                            <div class="dashboard-title-item">Update Profile</div>
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
                        
                     
                        <div class="dasboard-widget-box fl-wrap">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="custom-form">
                                        <div class="col-md-6">
                                            <label style="font-size:16px;">Upload School Image</label>
                                            <input type="file" class="upload" value=""/>
                                        </div>
                                        <div class="col-md-6">
                                            <label style="font-size:16px;">Upload Logo </label>
                                            <input type="file" class="upload" value=""/>
                                        </div>
                                        <div class="col-md-6">
                                            <label style="font-size:16px;">Enter Your Name <span class="dec-icon"><i class="fas fa-user"></i></span></label>
                                            <input type="text" placeholder="Noory" value=""/>
                                        </div>
                                        <div class="col-md-6">
                                            <label style="font-size:16px;">School Name <span class="dec-icon"><i class="fas fa-school"></i></span></label>
                                            <input type="text" placeholder="School of Scholor" value=""/>
                                        </div>
                                        <div class="col-md-6">
                                            <label style="font-size:16px;">Facilities <span class="dec-icon"><i class="fas fa-desktop"></i></span></label>
                                            <select data-placeholder="Status" class="chosen-select on-radius no-search-select" >
                                                <option></option>
                                                <option>Library</option>
                                                <option>Practical Lab</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label style="font-size:16px;">Courses <span class="dec-icon"><i class="fas fa-truck-couch"></i></span></label>
                                            <select data-placeholder="Status" class="chosen-select on-radius no-search-select" >
                                                <option></option>
                                                <option>BE</option>
                                                <option>ME</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6" style="margin-top:2%;">
                                            <label>Tagline<span class="dec-icon"><i class="fas fa-minus-octagon"></i></span></label>
                                            <input type="text" placeholder="Tagline" value=""/>
                                        </div>

                                      
                                      			
                                        <label>About Us </label>
                                        <textarea cols="40" rows="3" placeholder="About Me" style="margin-bottom:20px;"></textarea>										
                                        <button class="btn    color-bg  float-btn">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        </div>
                        
                    </div>
                    @stop