@extends('Website.school_profile.layout')
@section('css')
<style>
    .card-basic,
.card-premium,
.card-standard {
  margin: 0 2rem 1rem 0;
  padding: 0 0 0.5rem 0;
  width: 13rem;
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
                <div class="dashboard-title-item">Promote Your Bussiness</div>
                @include('Website.school_profile.profile_header')


            </div>
            <!-- dashboard-title end -->


            <div class="col-md-12">

                <div class="list-searh-input-wrap-title fl-wrap"></div>

                <div class="block-box fl-wrap search-sb" id="filters-column">

                    <!-- listsearch-input-item -->


                    <div class="col-md-12">

                        <h4 style="color: #073D5F; font-size: 22px; margin-bottom: 10px; margin-top: 10px;"><b>Our
                                Subscription Plans </b></h4>
                        <!-- listsearch-input-item -->



                        <div class="col-lg-4">
                            <div class="card-basic">
                                <div class="card-header header-basic">
                                    <h1>For 1-9 Days</h1>
                                </div>
                                <div class="card-body">

                                    <div class="card-element-hidden-standard">
                                        <ul class="card-element-container">
                                            <li class="card-element">Original Price : Rs.10 Per Day</li>
                                            <li class="card-element">Discount : 50%</li>
                                            <li class="card-element">Final Price : Rs. 05 Per Day</li>
                                            <li class="card-element">No. of Days :1-9</li>
                                            <li class="card-element">Total Amount : Rs.25</li>
                                        </ul>
                                        <div>

                                            <label style="text-align: center !important;"> Apply Coupon Code</label>
                                            <input type="text" value="" />
                                        </div>
                                        <button class="btn btn-standard">Pay Now</button>
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
                                            <li class="card-element">Original Price : Rs.09 Per Day</li>
                                            <li class="card-element">Discount : 50%</li>
                                            <li class="card-element">Final Price : Rs. 4.5 Per Day</li>
                                            <li class="card-element">No. of Days :10-20 days</li>
                                            <li class="card-element">Total Amount : Rs.45</li>
                                        </ul>
                                        <div>

                                            <label style="text-align: center !important;"> Apply Coupon Code</label>
                                            <input type="text" value="" />
                                        </div>
                                        <button class="btn btn-standard">Pay Now</button>
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
                                            <li class="card-element">Original Price : Rs.07 Per Day</li>
                                            <li class="card-element">Discount : 50%</li>
                                            <li class="card-element">Final Price : Rs. 3.5 Per Day</li>
                                            <li class="card-element">No. of Days :30-365</li>
                                            <li class="card-element">Total Amount : Rs.350</li>
                                        </ul>
                                        <div>

                                            <label style="text-align: center !important;"> Apply Coupon Code</label>
                                            <input type="text" value="" />
                                        </div>
                                        <button class="btn btn-standard">Pay Now</button>
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
