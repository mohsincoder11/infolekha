@extends('website_layout')
@section('website_content')
    @if ($errors->any())
        <div class="alert alert-danger">
            There were some errors with your request.
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}




main {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
}

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
    <!-- Page title -->
    <div class="page-title parallax parallax1">
        <div class="section-overlay">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-heading">
                        <h1 class="title">User</h1>
                    </div><!-- /.page-title-captions -->
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li> - </li>
                            <li><a href="index.html">Page</a></li>
                            <li> - </li>
                            <li>User</li>
                        </ul>
                    </div><!-- /.breadcrumbs -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.page-title -->

    <section class="flat-row page-profile bg-theme">
        <div class="container">
            <div class="row">
				<div class="col-md-3"></div>
                <div class="col-lg-7">
                    <div class="flat-tabs style2" data-effect="fadeIn">


                        <div class="content-tab listing-user profile">
                            <div class="content-inner active">
                                <div class="basic-info">
                                    <h3 align="center" style="color: #073D5F; margin-bottom:7% !important;">Subscription
                                        Plans
                                    </h3>
                                    <div class="row">

                                        <div class="col-md-12">

                                            <div>
                                                <form method="post" action="{{ url('initiatePaymentAPI') }}"
                                                    class="form-profile">
                                                    @csrf

                                                    <div class="row payment_cards_parent" style="margin-right: 5%;">
                                                            <div class="col-md-3"></div>
                                                        @foreach ($Subscriptions as $subscription)
                                                            <div class="col-md-4 payment_cards">
                                                                <div class="d2">
                                                                    <label class="checkbox-wrapper">
                                                                        <input type="radio" name="subscription_id"
                                                                            value="{{ $subscription->id }}"
                                                                            class="radio-input"
                                                                            @if ($loop->index == 0) checked @endif />
                                                                        <span class="checkbox-tile">
                                                                            <span class="checkbox-icon">
                                                                                <div class="box-content">
                                                                                    <h4 for="vehicle1"
                                                                                        style="color: #073D5F; ">
                                                                                        <b>{{ Ucwords($subscription->plan) }}</b>
                                                                                    </h4>
                                                                                    <h6
                                                                                        style="color:#073D5F; margin-top: 8%;  ">
                                                                                        ₹ <span
                                                                                            class="subscription_amt">{{ round($subscription->amount) }}</span>
                                                                                        / Per {{ $subscription->type }}</h6>

                                                                                </div>
                                                                            </span>

                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                  
                                                    <div class="row">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-3" style="margin-top:10px;">
                                                            <p class="form-control-label d"
                                                                style="color: #073D5F; font-size:14px">
                                                                <b>Apply Coupon Code</b>
                                                            </p>
                                                        </div>

                                                        <div class="col-md-3 d4" style="margin-top:10px;">
                                                            <input type="text" class="form-control" id="coupn_code_field" name="coupon"
                                                                placeholder="Cuopon Code" style="border-radius:5px; height:90%; ">
                                                        </div>

                                                        <div class="col-md-2 d3" style="margin-top:20px;">
                                                            <button type="button" class="btn btn-primary coupon_apply"
                                                               style="background-color: #073D5F; border-radius:5px; padding: 10px;">Apply</button>
                                                        </div>
                                             

                                                    </div>


                                                    
  <div class=" update-profile d1" style=" margin-top:2%;" align="center"> 
                                                        <button type="submit" class="btn btn-primary"
                                                            style="width: 20%;">Pay Now</button>
                                                    </div>
                                                </form>
                                            </div>
											
								
                                        </div>

                                </div>
                            </div>
										
					 <!-- <div class="col-md-12">
						 <div class="row">
                              <div class="col-lg-4">
                                <div class="card-basic">
                                    <div class="card-header header-basic">
                                      <h6 style="color:#fff;">For 1-9 Days</h6>
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
                                          <div  >
  
                                              <label style="text-align: center !important;"> Apply Coupon Code</label>
                                            
                                          </div>
                                          <button class="btn btn-standard">Pay now</button>
                                        </div>
                                      </div>
                                  </div>
                           
                     
                              </div>
  
                              
                              <div class="col-lg-4">
                                  
                                <div class="card-standard">
                                    <div class="card-header header-standard">
                                      <h6 style="color:#fff;">For 10-29 Days</h6>
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
                                        <div  >

                                            <label style="text-align: center !important;"> Apply Coupon Code</label>
                                           
                                        </div>
                                        <button class="btn btn-standard">Pay now</button>
                                      </div>
                                    </div>
                                  </div>
                               
                              </div>
  
  
                              <div class="col-lg-4">
                                <div class="card-premium">
                                    <div class="card-header header-premium">
                                      <h6 style="color:#fff;">For more than 30 Days</h6>
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
                                          <div  >
  
                                              <label style="text-align: center !important;"> Apply Coupon Code</label>
                                          
                                          </div>
                                          <button class="btn btn-standard">Pay now</button>
                                        </div>
                                      </div>
                                  </div>
                                     </div>-->

                                      </div>

                                    </div>

                        </div>
						
						

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@stop

@section('js')
    <script>
        var payment_cards=$(".payment_cards").clone();
        $(".coupon_apply").on("click", function() {
            $(".loader-container").show();
            var id = $(".radio-input:checked").val();
            var newDiv = $('<div class="col-md-3"></div>');
            $(".payment_cards_parent").html(newDiv).append(payment_cards.clone());       
            $(".radio-input[value='" + id + "']").prop("checked", true);
            var element = $(".radio-input:checked");

            console.log(id);
             
            $.ajax({
                type: "get",
                url: "{{ route('apply_subscription_amount') }}",
                data: {
                    id: $(".radio-input:checked").val(),
                    code: $("#coupn_code_field").val(),
                },
                dataType: "json",
                success: function(data) {
                    $(".loader-container").hide();

                    if (!data.status) {
                        Toast.fire({
                            icon: 'error',
                            title: data.message
                        })
                    } else {
                        element.siblings().find('.subscription_amt').text(data.amount);

                    }
                }
            })
        })
    </script>
@stop
