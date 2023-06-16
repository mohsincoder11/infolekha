@extends('school_institute_profile_layout')
@section('profile_content')

<div class="dashboard-content">
                    <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>
                    <div class="container dasboard-container">
                        <!-- dashboard-title -->	
                        <div class="dashboard-title fl-wrap">
                            <div class="dashboard-title-item"><span>Profile</span></div>
                            <div class="dashbard-menu-header">
                                <div class="dashbard-menu-avatar fl-wrap">
                                    <img src="{{asset('public')."/".($data->logo ?? '')}}" alt="">
                                    <h4>Welcome, <span>{{$data->entity_name ?? ''}}</span></h4>
                                </div>
                                <a href="{{route('logout')}}" class="log-out-btn   tolt" data-microtip-position="bottom"  data-tooltip="Log Out"><i class="far fa-power-off"></i></a>
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
                                    <div class="dasboard-widget-title fl-wrap">
                                    </div>
                                    <div class="dasboard-widget-box nopad-dash-widget-box fl-wrap">
                                       
                                        <div class="bg-wrap bg-parallax-wrap-gradien">
                                            <div class="bg" data-bg="{{asset('public')."/".($data->logo ?? '')}}"></div>
                                        </div>
                                        <div class="change-photo-btn cpb-2  ">
                                            <div class="photoUpload color-bg">
                                                <span> <i class="far fa-camera"></i> Change Cover </span>
                                                <input type="file" class="upload">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="dasboard-widget-title fl-wrap">
                                        <h5 style=" color: #1e3f54;"><i class="fas fa-key"></i>School Info</h5>
                                    </div> -->
                                    <div class="dasboard-widget-box fl-wrap">
                                        <div class="custom-form">
                                           

                                            <img src="{{asset('public')."/".($data->logo ?? '')}}" alt="" style="height:60px; width:60px; border-radius:50%;"> <label style="text-align: center;  color: #144273; font-size:28px;">{{$data->entity_name ?? ''}}</label>
                                            <label style="text-align:center; color:#144273; font-size:16px;">Lorem ipsum dolor, sit amet consectetur adipisicing elit!!</label>


                                          <h1 style="color:#144273; margin-right: 90%; font-size: 20px; margin-top: 20%;">Courses</h1>

                                          <div class="col-md-12" style="margin-top:2%; margin-bottom: 10%;  ">

                                          
                                           
                                          @foreach(json_decode($data->course) as $c)
                                          @if($loop->index % 3 ==0 && $loop->index !=0)
                                          <br><br><br><br>
                                          @endif
                                            <div class="col-md-4" style="margin-top: 5px;">
                                           
                                                <span style="font-size:15px; color:#144273; text-align:left;" >
                                                  
                                                    <i class="fa fa-graduation-cap" style="float:left"></i> {{$c}}</span>
                                            </div>
                                            @endforeach
                                            
                                
                                           </div>
                                        
                                           <h1 style="color:#144273; margin-right: 90%; font-size: 20px; margin-top: 10%;">Facilities</h1 >


                                           <div class="col-md-12" id="demo" style="margin-top:2%;   " >
                                           @foreach(json_decode($data->facilities) as $c)
                                          @if($loop->index % 3 ==0 && $loop->index !=0)
                                          <br><br><br><br>
                                          @endif
                                            <div class="col-md-4" >
                                                <span style="font-size:15px; color:#144273;">
                                                   <i class="fa fa-book" style="float:left"></i> {{$c}}<br><br>
                                               
                                            </div>
                                            @endforeach
                        
                                            </div>
                                            
                                            <label style="color:#144273; text-align:center; margin-top: 10%;">About Us</label>
                                            <textarea cols="40" rows="3" placeholder="" style="margin-bottom:20px;  color:#144273;">{{$data->about}}</textarea>	
                                            
                                               <!-- section -->
                    <section >
                        <div class="container">
                            <!-- section-title -->
                            <div class="section-title st-center fl-wrap">
                                <h3 style="color:#144273; text-align:center; font-size: 15px;">Images</h3>
                             
                            </div>
                            <!-- section-title end -->
                            <div class="clearfix"></div>
                            <div class="listing-carousel-wrapper lc_hero carousel-wrap fl-wrap">
                                <div class="listing-carousel carousel ">
                                    <!-- slick-slide-item -->
                                    @if($data->image !=null)
                                    @foreach(json_decode($data->image) as $i)
                                    <div class="slick-slide-item">
                                        <!--  agent card item -->
                                        <div class="listing-item">
                                            <article class="geodir-category-listing fl-wrap">
                                                <div class="geodir-category-img fl-wrap  agent_card">
                                                    <a href="agent-single.html" class="geodir-category-img_item">
                                                        <img src="{{asset('public').'/'.$i}}" alt="">
                                                        
                                                    </a>
                                                
                                                </div>
                                          
                                            </article>
                                        </div>
                                        <!--  agent card item end -->
                                    </div>
                                    @endforeach
                                  @endif
                                    <!-- slick-slide-item end-->
                                    <!-- slick-slide-item -->
                                    
                                    <!-- slick-slide-item end-->								
                                </div>
                                <div class="swiper-button-prev lc-wbtn lc-wbtn_prev"><i class="far fa-angle-left"></i></div>
                                <div class="swiper-button-next lc-wbtn lc-wbtn_next"><i class="far fa-angle-right"></i></div>
                            </div>
                        </div>
                    </section>
                    
                    <!-- section end-->	
                                            <div class="col-md-12">
                                                <div class="row">
                                             <label style="color:#144273; text-align:center; margin-top: 10%;">Contact Us</label>
                                             <div class="custom-form" style="margin-top:5%;">
                                               
                                                <div class="col-md-6">
                                                <label style="font-size:16px; color:#144273;">Name of S/C/I <span class="dec-icon"><i class="far fa-user"></i></span></label>
                                                <input type="text" placeholder="Name of S/C/I" value=""/>
                                                </div>
                                                <div class="col-md-6">
                                                <label  style="font-size:16px; color:#144273;">Adress <span class="dec-icon"><i class="fas fa-map-marker"></i> </span></label>
                                                <input type="text" placeholder="USA 27TH Brooklyn NY" value=""/>
                                                </div>
                                                <div class="col-md-6">
                                                <label  style="font-size:16px; color:#144273;">Phone<span class="dec-icon"><i class="far fa-phone"></i> </span></label>
                                                <input type="text" placeholder="+7(123)987654" value=""/>	
                                                </div>
                                                <div class="col-md-6">
                                               	 <label  style="font-size:16px; color:#144273;">Email Address <span class="dec-icon"><i class="far fa-envelope"></i></span></label>
                                                <input type="text" placeholder="AlicaNoory@domain.com" value=""/>	
                                                </div>
                                                <div class="col-md-6">
                                                <label  style="font-size:16px; color:#144273;">Website<span class="dec-icon"><i class="far fa-globe"></i></span></label>
                                                <input type="text" placeholder="P.R.Pote Patil.com" value=""/>	
                                                </div>
                                                
                                                
                                                
                                            </div>
                                            </div>
                                            </div>

                                        </div>


                                           <!-- list-single-main-item -->
                                           
                                        <!-- list-single-main-item end -->                                             
                                        <!-- list-single-main-item -->
                                   
                                        <!-- list-single-main-item end -->  
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

                    @stop

