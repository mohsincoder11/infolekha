@extends('Website.school_profile.layout')
@section('css')
<style>
    .card-basic,
.card-premium,
.card-standard {
  margin: 0 1rem 1rem 0;
  padding: 0 0 0.5rem 0;
  background: #fff;
  color: #444;
  text-align: center;
  border-radius: 1rem;
  box-shadow: 0.5rem 0.5rem 1rem rgba(51, 51, 51, 0.2);
  overflow: hidden;
  transition: all 0.1ms ease-in-out;
}
.card-basic:hover,
.card-premium:hover,
.card-standard:hover {
  transform: scale(1.02);
}

.card-header {
  height: 5rem;
  text-transform: uppercase;
  font-weight: 700;
  font-size: 0.8rem;
  padding: 2rem 0;
  color: #fff;
  clip-path: polygon(0 0, 100% 0%, 100% 85%, 0% 100%);
}

.header-basic,
.btn-basic {
  background: linear-gradient(135deg, rgb(0, 119, 238), #073d5f);
}

.header-standard,
.btn-standard {
    background: linear-gradient(135deg, rgb(0, 119, 238), #073d5f);
}

.header-premium,
.btn-premium {
    background: linear-gradient(135deg, rgb(0, 119, 238), #073d5f);
}

.card-body {
  padding: 0.5rem 0;
}
.card-body h2 {
  font-size: 2rem;
  font-weight: 700;
}

.card-element-container {
  color: #444;
  list-style: none;
}
.card-element-container li{
    line-height: 2rem;
}

.btn {
  margin: 0.5rem 0;
  padding: -16.7rem 1rem;
  outline: none;
  border-radius: 1rem;
  font-size: 1rem;
  font-weight: 700;
  color: #fff;
  border: none;
  cursor: pointer;
  transition: all 0.1ms ease-in-out;
}

.btn:hover {
  transform: scale(0.95);
}

.btn:active {
  transform: scale(1);
}

.card-element-hidden {
  display: none;
}

</style>
@stop
@section('profile_content')
<div class="dashboard-content">
    <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dashboard Menu</div>
    <div class="container dasboard-container">
        <!-- dashboard-title -->
        <div class="dashboard-title fl-wrap">
            <div class="dashboard-title-item">Post Advertisement</div>
            @include('Website.school_profile.profile_header')


        </div>


        <div class="col-md-12">
            <div class="list-searh-input-wrap-title fl-wrap"></div>
            <div class="block-box fl-wrap search-sb" id="filters-column">
                <div class="row">
                    <div class="custom-form">
                        <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <label style="font-size:16px;">Select Location</label>
                            <select data-placeholder="Status"
                                class="chosen-select on-radius no-search-select" name="">
                                <option>Select Option</option>
                                <option>On Home Page</option>
                                <option>On Listing Page</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label style="font-size:16px;">Select Size</label>
                            <select data-placeholder="Status"
                                class="chosen-select on-radius no-search-select">
                                <option>650 x 450 pxl</option>
                                <option>370 x 450 pxl</option>
                                <option>1920 x 400 pxl</option>
                                <option>290 x 220 pxl</option>
                            </select>
                        </div>
                
                 
                     

                </div>

                
      

            

                <!-- listsearch-input-item -->
                

                <div class="col-md-12">
               
                  <h4 style="color: #073D5F; font-size: 22px; margin-bottom: 10px; margin-top: 10px;"><b>Our Subscription Plans  </b></h4>
                  <!-- listsearch-input-item -->
                  

              
                  <div class="col-lg-4">
                    <div class="card-basic">
                        <div class="card-header header-basic">
                          <h1>For 1-9 Days</h1>
                        </div>
                        <div class="card-body">
                         
                            <div class="card-element-hidden-standard">
                              <ul class="card-element-container">
                                <li class="card-element">Main Banner : 1920 x 400 pxl</li>
                                <li class="card-element">Original Price - Rs. 1000 Per Day</li>
                                <li class="card-element">Discount - 50%</li>
                                <li class="card-element">Final Price - Rs. 500 Per Day</li>
                                <li class="card-element">No. of Days 01-09 days </li>
                                <li class="card-element">Total Amount Rs. 2500</li>

                              </ul>
                              <div  >

                                  <label style="text-align: center !important;"> Apply Coupon Code</label>
                                  <input type="text"  value="" />
                              </div>
                              <button class="btn btn-standard">Send Enquiry</button>
                            </div>
                          </div>
                      </div>
               
         
                  </div>

                  
                  <div class="col-lg-4">
                      
                    <div class="card-standard">
                        <div class="card-header header-standard">
                          <h1>For 10-29 Days</h1>
                        </div>
                        <div class="card-body">
                         
                          <div class="card-element-hidden-standard">
                            <ul class="card-element-container">
                              <li class="card-element">Main Banner : 1920 x 400 pxl</li>
                              <li class="card-element">Original Price : Rs. 900 Per Day</li>
                              <li class="card-element">Discount : 50%</li>
                              <li class="card-element">Final Price : Rs. 450 Per Day</li>
                              <li class="card-element">No. of Days : 10-29 days</li>
                              <li class="card-element">Total Amount Rs. 4500</li>
                            </ul>
                            <div  >

                                <label style="text-align: center !important;"> Apply Coupon Code</label>
                                <input type="text"  value="" />
                            </div>
                            <button class="btn btn-standard">Send Enquiry</button>
                          </div>
                        </div>
                      </div>
                   
                  </div>


                  <div class="col-lg-4">
                    <div class="card-premium">
                        <div class="card-header header-premium">
                          <h1>For more than 30 Days</h1>
                        </div>
                        <div class="card-body">
                         
                            <div class="card-element-hidden-standard">
                              <ul class="card-element-container">
                                <li class="card-element">Main Banner : 1920 x 400 pxl</li>
                                <li class="card-element">Original Price : Rs. 800 Per Day</li>
                                <li class="card-element">Discount : 50%
                                </li>
                                <li class="card-element">Final Price : Rs. 400 Per Day</li>
                                <li class="card-element">No. of Days : 30-365 days</li>
                                <li class="card-element">Total Amount Rs. 40000</li>
                              </ul>
                              <div  >

                                  <label style="text-align: center !important;"> Apply Coupon Code</label>
                                  <input type="text"  value="" />
                              </div>
                              <button class="btn btn-standard">Send Enquiry</button>
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

@section('js')
    <script>
        $(document).ready(function() {
            $('.read-more-link').click(function(e) {
      e.preventDefault();
      var $container = $(this).closest('.text-container');
      $container.find('.short-text').hide();
      $container.find('.full-text').toggle();
      $container.find('.show-less').show();
    });

    $('.show-less-link').click(function(e) {
      e.preventDefault();
      var $container = $(this).closest('.text-container');
      $container.find('.full-text').hide();
      $container.find('.short-text').show();
      $container.find('.show-less').hide();
    });
        });
    </script>
@stop
