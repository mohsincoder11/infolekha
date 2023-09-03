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
                <div class="col-lg-3">

                </div>
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
                                                                <div class="">
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
                                                        <div class="col-md-1"></div>
                                                        <div class="col-md-4" style="margin-top:10px;">
                                                            <p class="form-control-label"
                                                                style="color: #073D5F; font-size:16px">
                                                                <b>Apply Coupon Code</b>
                                                            </p>
                                                        </div>

                                                        <div class="col-md-4" style="margin-top:10px;">
                                                            <input type="text" class="form-control" id="coupn_code_field" name="coupon"
                                                                placeholder="Cuopon Code" style="border-radius:10px;">
                                                        </div>

                                                        <div class="col-md-2" style="margin-top:20px;">
                                                            <button type="button" class="btn btn-primary coupon_apply"
                                                                style="">Apply</button>
                                                        </div>


                                                    </div>


                                                    <div class="update-profile" style="margin-left:38%; margin-top:2%;">
                                                        <button type="submit" class="btn btn-primary"
                                                            style="width: 40%;">Pay Now</button>
                                                    </div>

                                                </form>
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
