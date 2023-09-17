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
            width: 100%;
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

        .btn-standard {
            margin-top: 1em;

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

        li {
            line-height: 2em;
        }
        .subscription_amt,.rupee{
            font-size: 3em;
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
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="flat-tabs style2" data-effect="fadeIn">


                        <div class="content-tab listing-user profile">
                            <div class="content-inner active">
                                <div class="basic-info">
                                    <h3 align="center" style="color: #073D5F; margin-bottom:7% !important;">Subscription
                                        Plans
                                    </h3>
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="row payment_cards_parent">
                                                @foreach ($Subscriptions as $key => $subscription)
                                                    <div class="col-lg-6 payment_cards">
                                                        <form method="post" action="{{ url('initiatePaymentAPI') }}">
                                                            @csrf
                                                            <input type="text" name="subscription_id"
                                                                value="{{ $subscription->id }}" class="radio-input">
                                                            <div class="card-basic">
                                                                <div class="card-header header-basic">
                                                                    <h6 style="color:#fff;">
                                                                        {{ Ucwords($subscription->plan) }}</h6>
                                                                </div>
                                                                <div class="card-body">

                                                                    <div class="card-element-hidden-standard">
                                                                        <ul class="card-element-container">
                                                                            <li class="card-element">
                                                                                <h6
                                                                                    style="color:#073D5F; margin-top: 8%;  ">
                                                                                   <span class="rupee"> ₹</span> <span class="subscription_amt" data-amount="{{ round($subscription->amount) }}">
                                                                                    {{ round($subscription->amount) }}
                                                                                </span>
                                                                                    / Per {{ $subscription->type }}</h6>
                                                                            </li>

                                                                            <li class="card-element">
                                                                                <div>
                                                                                    <input type="text" class="CouponCode"
                                                                                        name="CouponCode" value=""
                                                                                        style="margin-left:10px;display:inline;width:50%;height:inherit !important;padding:10px;border: 1px solid rgba(0, 0, 0, 0.15);
                                                                                        border-radius: 0.25rem;" />
                                                                                    <button
                                                                                        style="margin-left:10px; padding:10px; border-radius:10px; color:#fff; border:none;display:inline;width:30%"
                                                                                        type="button"
                                                                                        class="btn-standard ApplyCouponCode">Apply</button>
                                                                                </div>
                                                                            </li>
                                                                            <li class="card-element discount-text">
                                                                            </li>
                                                                        </ul>
                                                                        <button class="btn btn-standard">Pay
                                                                            now</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                        </div>

                                            @endforeach
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
    </section>
@stop

@section('js')
    <script>

$(document).on("click", ".ApplyCouponCode", function() {
    var form = $(this).closest('form');
    var id = form.find(".radio-input").val();
    var CouponCode = form.find(".CouponCode").val();
    var cardContainer = form.closest('.payment_cards'); // Get the specific card container

    if (CouponCode && CouponCode != null) {
        $(".loader-container").show();

        $.ajax({
            type: "get",
            url: "{{ route('apply_subscription_amount') }}",
            data: {
                id: id,
                code: CouponCode,
                coupon_for: {{ auth()->user()->role }}
            },
            dataType: "json",
            success: function(data) {
                $(".loader-container").hide();
                // Update the subscription amount with discount
                 

                    // Clear discount text and restore other cards
                    $(".CouponCode").val('');
                    $(".discount-text").html(' &nbsp;');
                   
                    form.find(".CouponCode").val(CouponCode);
                    $(".payment_cards").each(function() {
                        var originalAmount = $(this).find(".subscription_amt").data("amount");
                        $(this).find(".subscription_amt").html(originalAmount);
                    });
                if (!data.status) {
                    Toast.fire({
                        icon: 'error',
                        title: data.message
                    });
                } else {
                   
                    var subscription_amt = form.find(".subscription_amt");
                    subscription_amt.html(data.amount);

                    var newDiscountText = 'Discount Applied: ' + data.discount;
                    cardContainer.find(".discount-text").text(newDiscountText);
            
                }
            },
            error: function(error) {
                $(".loader-container").hide();
            }
        });
    }
});


    </script>
@stop
