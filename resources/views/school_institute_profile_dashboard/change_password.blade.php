@extends('school_institute_profile_layout')
@section('profile_content')

<div class="dashboard-content">
                    <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>
                    <div class="container dasboard-container">
                        <!-- dashboard-title -->	
                        <div class="dashboard-title fl-wrap">
                            <div class="dashboard-title-item"> Change Password</div>
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
                        <div class="dasboard-wrapper fl-wrap no-pag">
                            <div class="row">
                                         
                                <div class="col-md-10">
                                    <div class="dasboard-widget-title dbt-mm fl-wrap">
                                        <h5><i class="fas fa-key"></i>Change Password</h5>
                                    </div>
                                    <div class="dasboard-widget-box fl-wrap">
                                        <div class="custom-form">
                                            <div class="pass-input-wrap fl-wrap">
                                          <label style="font-size:16px;">Current Password<span class="dec-icon"><i class="far fa-lock-open-alt"></i></span></label>
                                                <input type="password" class="pass-input" placeholder="" value=""/>
                                                <span class="eye"><i class="far fa-eye" aria-hidden="true"></i> </span>
                                            </div>
                                            <div class="pass-input-wrap fl-wrap">
                                                <label style="font-size:16px;">New Password<span class="dec-icon"><i class="far fa-lock-alt"></i></span></label>
                                                <input type="password" class="pass-input" placeholder="" value=""/>
                                                <span class="eye"><i class="far fa-eye" aria-hidden="true"></i> </span>
                                            </div>
                                            <div class="pass-input-wrap fl-wrap">
                                                <label style="font-size:16px;">Confirm New Password<span class="dec-icon"><i class="far fa-shield-check"></i> </span></label>
                                                <input type="password" class="pass-input" placeholder="" value=""/>
                                                <span class="eye"><i class="far fa-eye" aria-hidden="true"></i> </span>
                                            </div>
                            
                                            <button class="btn    color-bg  float-btn">Save Changes</button>
                                        </div>
                                    </div>
                                    <!-- <div class="dasboard-widget-title fl-wrap" style="margin-top: 30px;">
                                        <h5><i class="fas fa-share-alt"></i>Your Socials</h5>
                                    </div>
                                    <div class="dasboard-widget-box fl-wrap">
                                        <div class="custom-form">
                                            <label>Facebook  <span class="dec-icon"><i class="fab fa-facebook"></i></span></label>
                                            <input type="text" placeholder="https://www.facebook.com/" value=""/>
                                            <label>Twitter <span class="dec-icon"><i class="fab fa-twitter"></i></span></label>
                                            <input type="text" placeholder="https://twitter.com/" value=""/>
                                            <label>Instagram<span class="dec-icon"><i class="fab fa-instagram"></i>  </span></label>
                                            <input type="text" placeholder="https://www.instagram.com/" value=""/>	
                                            <label>Vkontakte<span class="dec-icon"><i class="fab fa-vk"></i>  </span></label>
                                            <input type="text" placeholder="https://vk.com/" value=""/>	
                                            <button class="btn    color-bg  float-btn">Save Changes</button>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <!-- dasboard-wrapper end -->	
                    </div>
                    <!-- dashboard-footer -->
                    <!-- <div class="dashboard-footer">
                        <div class="dashboard-footer-links fl-wrap">
                            <span>Helpfull Links:</span>
                            <ul>
                                <li><a href="about.html">About  </a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="pricing.html">Pricing Plans</a></li>
                                <li><a href="contacts.html">Contacts</a></li>
                                <li><a href="help.html">Help Center</a></li>
                            </ul>
                        </div>
                        <a href="#main" class="dashbord-totop  custom-scroll-link"><i class="fas fa-caret-up"></i></a>
                    </div> -->
                    <!-- dashboard-footer end -->			
                </div>
                @stop