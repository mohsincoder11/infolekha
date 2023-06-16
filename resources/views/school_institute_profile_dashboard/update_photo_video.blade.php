@extends('school_institute_profile_layout')
@section('profile_content')
<div class="dashboard-content">
                    <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>
                    <div class="container dasboard-container">
                        <!-- dashboard-title -->	
                        <div class="dashboard-title fl-wrap">
                            <div class="dashboard-title-item">Upload Photo/Video </div>
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
                                <div class="col-md-6">
                                <div class="listsearch-input-item">

                                    <label>Uload Photo/Video</label>
                                    <input type="file" onClick="this.select()" value=""/>										
                                </div>
                                </div>
                                <!-- listsearch-input-item end-->
                                <!-- listsearch-input-item -->
                                <!-- <div class="listsearch-input-item">
                                    <label>Cities</label>
                                    <select data-placeholder="All Cities" class="chosen-select on-radius no-search-select" >
                                        <option>All Cities</option>
                                        <option>New York</option>
                                        <option>London</option>
                                        <option>Paris</option>
                                        <option>Kiev</option>
                                        <option>Moscow</option>
                                        <option>Dubai</option>
                                        <option>Rome</option>
                                        <option>Beijing</option>
                                    </select>
                                </div> -->
                                <div class="col-md-6"><button class="btn color-bg  float-btn" style="margin-top:4vh;">Save Changes</button></div>
                            
                            
                            
                        </div>
                        </div>
                        </div>
                       
                </div>
                @stop