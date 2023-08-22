@extends('Website.school_profile.layout')

@section('profile_content')

<div class="dashboard-content">
                    <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dashboard Menu</div>
                    <div class="container dasboard-container">
                        <!-- dashboard-title -->
						<div class="col-md-3"></div>
						
                        <div class="dashboard-title fl-wrap">
                            <div class="dashboard-title-item"><span>Profile</span></div>
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

                        
                        <div class="dasboard-wrapper fl-wrap no-pag">
                            <div class="row">
                                         <div class="col-md-10">
                                    <div class="dasboard-widget-title fl-wrap">
                                    </div>
                                    <div class="dasboard-widget-box nopad-dash-widget-box fl-wrap">
                                       
                                        <div class="bg-wrap bg-parallax-wrap-gradien">
                                            <div class="bg" data-bg="{{asset('public')."/".($user_data->logo ?? '')}}"></div>
                                        </div>
                                        <div class="change-photo-btn cpb-2  ">
                                            {{-- <div class="photoUpload color-bg">
                                                <span> <i class="far fa-camera"></i> Change Cover </span>
                                                <input type="file" class="upload">
                                            </div> --}}
                                        </div>
                                    </div>
                                    <!-- <div class="dasboard-widget-title fl-wrap">
                                        <h5 style=" color: #1e3f54;"><i class="fas fa-key"></i>School Info</h5>
                                    </div> -->
                                    <div class="dasboard-widget-box fl-wrap">
                                        <div class="custom-form">
                                           

                                            <img src="{{asset('public')."/".($user_data->logo ?? '')}}" alt="" style="height:60px; width:60px; border-radius:50%;"> <label style="text-align: center;  color: #144273; font-size:28px;">{{ucfirst($user_data->entity_name) ?? ''}}</label>
                                            {{-- <label style="text-align:center; color:#144273; font-size:16px;">
                                                Lorem ipsum dolor, sit amet consectetur adipisicing elit!!</label> --}}


                                          <label style="color:#144273; text-align:center; font-size: 20px;">Courses</label>

                                          <div class="col-md-12" style="margin-top:2%; margin-bottom: 5%;  ">

                                          
                                           
                                          @if(json_decode($user_data->course))
                                          @foreach(json_decode($user_data->course) as $c)
                                          @if($loop->index % 3 ==0 && $loop->index !=0)
                                          <br><br>
                                          @endif
                                            <div class="col-md-4" style="margin-top: 5px;">
                                           
                                                <span style="font-size:15px; color:#144273; text-align:left;" >
                                                  
                                                    <i class="fa fa-graduation-cap" style="float:left"></i> {{$c}}</span>
                                            </div>
                                            @endforeach
                                            @endif
                                            
                                
                                           </div>
                                        <label style="color:#144273; text-align:center; font-size: 20px; margin-top: 20px;">Facilities</label>
                   


                                           <div class="col-md-12" id="demo" style="margin-top:2%;   " >
                                            @if(json_decode($user_data->facilities))
                                            @foreach(json_decode($user_data->facilities) as $c)
                                          @if($loop->index % 3 ==0 && $loop->index !=0)
                                          <br><br><br><br>
                                          @endif
                                            <div class="col-md-4" >
                                                <span style="font-size:15px; color:#144273;">
                                                   <i class="fa fa-book" style="float:left"></i> {{$c}}<br><br>
                                               
                                            </div>
                                            @endforeach
                                            @endif
                        
                                            </div>
                                            
                                            <label style="color:#144273; text-align:center; margin-top: 5%;">About Us</label>
                                            <textarea cols="40" rows="3" placeholder="" style="margin-bottom:0px;font-size:14px;  color:#144273;">{{$user_data->about}}</textarea>	
                                            
                                               <!-- section -->
                    <section >
                        <div class="container">
                            <!-- section-title -->
                            <div class="section-title st-center fl-wrap">
                                <label style="color:#144273; text-align:center; font-size: 20px;">
                                    Images</label>
                             
                            </div>
                            <!-- section-title end -->
                            <div class="clearfix"></div>

                            <div class="listing-carousel-wrapper lc_hero carousel-wrap fl-wrap">
                                <div class="listing-carousel carousel ">
                                    <!-- slick-slide-item -->
                                    @if($user_data->image !=null)
                                    @foreach(json_decode($user_data->image) as $i)
                                    <div class="slick-slide-item">
                                        <!-- agent card item -->
                                        <div class="listing-item">
                                            <article class="geodir-category-listing fl-wrap">
                                                <div class="geodir-category-img fl-wrap agent_card" style="max-height: 150px; overflow: hidden;">
                                                    <a target="_blank" href="{{ asset('public').'/'.$i }}" class="geodir-category-img_item">
                                                        <img src="{{ asset('public').'/'.$i }}" alt="" class="slider-image">
                                                    </a>
                                                </div>
                                            </article>
                                        </div>
                                        <!-- agent card item end -->
                                    </div>
                                    @endforeach
                                  @endif
                                </div>
                                <div class="swiper-button-prev lc-wbtn lc-wbtn_prev"><i class="far fa-angle-left"></i></div>
                                <div class="swiper-button-next lc-wbtn lc-wbtn_next"><i class="far fa-angle-right"></i></div>
                            </div>



                       

                        </div>
                    </section>
                    
                    <!-- section end-->	
                                                     <div class="container" style="margin-bottom:5%">
                                                <!-- section-title -->
                                                <div class="section-title st-center fl-wrap">
                                                    <label style="color:#144273; text-align:center; font-size: 20px; margin-top:40px;">
                                                        Videos</label>

                                                </div>
                                                <!-- section-title end -->
                                                <div class="clearfix"></div>
                                                <div class="listing-carousel-wrapper lc_hero carousel-wrap fl-wrap">
                                                    <div class="listing-carousel carousel">
                                                        <!-- slick-slide-item -->
                                                        @if ($user_data->video != null)
                                                            @foreach (json_decode($user_data->video) as $i)
                                                                <div class="slick-slide-item">
                                                                    <!-- agent card item -->
                                                                    <div class="listing-item">
                                                                        <article class="geodir-category-listing fl-wrap">
                                                                            <div class="geodir-category-img fl-wrap agent_card" >
                                                                               
       <iframe  height="115" width="210" src="{{ asset('public').'/'.$i }}" alt="" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                                                            </div>
                                                                        </article>
                                                                    </div>
                                                                    <!-- agent card item end -->
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                        <!-- slick-slide-item end -->
                                                    </div>
                                                    <div class="swiper-button-prev lc-wbtn lc-wbtn_prev"><i class="far fa-angle-left"></i></div>
                                                    <div class="swiper-button-next lc-wbtn lc-wbtn_next"><i class="far fa-angle-right"></i></div>
                                                </div>
                                                
                                                </div>


                                            </div>

                                            
                                            @if ($user_data->fb || $user_data->website ||
                                            $user_data->insta ||
                                            $user_data->yt ||
                                            $user_data->google) 
                                              <h1 style="color:#144273;  font-size: 20px; margin-top: 12%;">
                                                Social Media Handles</h1>
    
    
                                            <div class="col-md-12" id="demo" style="margin-top:2%;  ">
   
                                                <div class="footer-social fl-wrap" style="text-align: center;">
                                                    <div class="col-md-4"></div>
                                                    <ul>
                                                        @if ($user_data->fb)
                                                            <li><a href="{{ $user_data->fb }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                                        @endif
                                                        @if ($user_data->website)
                                                            <li><a href="{{ $user_data->website }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                                        @endif
                                                        @if ($user_data->insta)
                                                            <li><a href="{{ $user_data->insta }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                                        @endif
                                                        @if ($user_data->yt)
                                                            <li><a href="{{ $user_data->yt }}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                                        @endif
                                                        @if ($user_data->google)
                                                            <li><a href="{{ $user_data->google }}" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                                        @endif
                                                    </ul>
                                                </div>
                                                
                                                
                                            </div>
                                            @endif

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
