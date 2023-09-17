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
            transition: all 0.3s ease-in-out;
        }

        .card-basic:hover,
        .card-premium:hover,
        .card-standard:hover {
            transform: scale(1.02);
            animation: zoom-in 0.3s ease-in;
        }


        @keyframes zoom-in {
            from {
                transform: scale(1);
            }

            to {
                transform: scale(1.02);
            }
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

        .card-element-container li {
            line-height: 2rem;
        }

        .btn {
            margin: 0.5rem 0;
            padding: -16.7rem 1rem;
            outline: none;
            border-radius: 1rem;
            font-size: 0.8rem;
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
                <div class="dashboard-title-item">Select Announcement Plan</div>
                @include('Website.school_profile.profile_header')


            </div>
            <!-- dashboard-title end -->


            <div class="col-md-12">

                <div class="list-searh-input-wrap-title fl-wrap"></div>

                <div class="block-box fl-wrap search-sb" id="filters-column">

                    <!-- listsearch-input-item -->


                    <div class="col-md-12">

                        <h4 style="color: #073D5F; font-size: 22px; margin-bottom: 10px; margin-top: 10px;"><b>Our
                                Announcement Plans </b></h4>
                        <!-- listsearch-input-item -->



                        @foreach ($announcement_packages as $advertisements)
                            <form action="{{ route('school_profile.pay-for-announcement') }}" method="post"
                                id="form{{ $loop->iteration }}">
                                @csrf
                                <input type="hidden" name="announcement_id" value="{{ $announcement_id }}">
                                <div class="col-lg-4">
                                    <div class="card-basic">
                                        <div class="card-header header-basic">
                                            <h1>{{ $advertisements->PackageName }}</h1>
                                        </div>
                                        <div class="card-body">
                                            <input type="hidden" name="PackageID" value="{{ $advertisements->PackageID }}">
                                            <div class="card-element-hidden-standard">
                                                <ul class="card-element-container">

                                                    <li class="card-element">Original Price - Rs.
                                                        {{ $advertisements->OriginalPrice }} Per Day</li>
                                                    <li class="card-element">Discount - <span class="discount_span">0</span>
                                                        <input type="hidden" name="Discount" class="discount_input">
                                                    </li>
                                                    <li class="card-element">Final Price - Rs.
                                                        {{ $advertisements->OriginalPrice }} Per Day</li>
                                                    <li class="card-element" style="padding:0 10px">
                                                        <input type="hidden" class="original_price"
                                                            value="{{ $advertisements->OriginalPrice }}">
                                                        <select class="select_days" name="SelectedDays">
                                                            <option value="">Select no of days</option>
                                                            @for ($i = $advertisements->MinDays; $i <= $advertisements->MaxDays; $i++)
                                                                <option value="{{ $i }}">{{ $i }}
                                                                    @if ($i > 1)
                                                                        days
                                                                    @else
                                                                        day
                                                                    @endif
                                                                </option>
                                                            @endfor
                                                            <option value=""></option>
                                                        </select>
                                                        <span class="no_of_days_error"></span>
                                                    </li>
                                                    <li class="card-element">Total Amount - Rs. <span
                                                            class="total_amount"></span>
                                                        <input type="hidden" name="TotalAmount" class="total_amount">

                                                    </li>

                                                    <li class="card-element">Apply Coupon Code

                                                    </li>
                                                   
                                                    <li class="card-element">
                                                        <div>
                                                        <input type="text" class="form-control CouponCode"
                                                            name="CouponCode" value="" style="margin-left:10px;display:inline;width:50%" " />
                                                       <button
                                                                style="margin-left:10px; padding:10px; border-radius:10px; color:#fff; border:none;display:inline;width:30%" "
                                                                type="button"
                                                                class="btn-standard ApplyCouponCode">Apply</button>
                                                    </div>
                                                    </li>

                                                </ul>


                                                <div>

                                                    <button type="submit" class="btn btn-standard btn-submit">Pay Now</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </form>
                        @endforeach





                    </div>


                </div>
            </div>

        </div>




    </div>

@stop

@section('js')
    <script>
        $(document).ready(function() {


            $(".select_days").niceSelect();

            $(document).on("click", ".btn-submit", function(e) {
                e.preventDefault(); // Prevent the default form submission

                var formId = $(this).closest("form").attr("id");
                let SelectedDays = $(this).closest("form").find(".select_days").val();
                if (SelectedDays && SelectedDays > 0) {
                    $(this).closest("form").submit();
                    $(this).closest("form").find(".no_of_days_error").html('');

                } else {
                    $(this).closest("form").find(".no_of_days_error").html(
                        '<label class="error">Please select no of days.<label>');
                }

            });

            $(document).on("change", ".select_days", function() {
                let parent_div = $(this).closest('.card-element-container');
                let selected_day = $(this).val();

                calculate_discount(parent_div);

                if (selected_day && selected_day > 0) {
                    $(this).closest("form").find(".no_of_days_error").html('');
                }
            })


            $(document).on("click", ".ApplyCouponCode", function() {
                let parent_div = $(this).closest('.card-element-container');
                if (parent_div.find('.CouponCode').val()) {
                    calculate_discount(parent_div);
                }


            })

            function calculate_discount(parent_div) {
                var SelectedDays=parent_div.find('.select_days').val();
                if (SelectedDays && SelectedDays > 0) {
                    $(this).closest("form").submit();
                    parent_div.find(".no_of_days_error").html('');

                } else {
                    parent_div.find(".no_of_days_error").html(
                        '<label class="error">Please select no of days.<label>');
                            return;
                }
                $.ajax({
                    type: "get",
                    url: "{{ route('school_profile.get_coupon_val') }}",
                    data: {
                        code: parent_div.find('.CouponCode').val(),
                        coupon_for:4,
                    },
                    dataType: "json",
                    success: function(data) {

                        let original_price = parent_div.find('.original_price').val();
                        var selected_days2 = parent_div.find('.select_days').val();
                        let total_amount = 0;
                        if (data.status && selected_days2) {
                            let coupon = data.coupon;
                            total_amount = Math.round(original_price * selected_days2);

                            if (coupon.type == 'PERCENT') {
                                let discount = (total_amount / 100) * coupon.discount;
                                total_amount = parseFloat(total_amount) - parseFloat(discount);
                                parent_div.find('.discount_span').text(coupon.discount + '%');
                                parent_div.find('.discount_input').val(discount);
                            }

                            if (coupon.type == 'FLAT') {
                                total_amount = parseFloat(total_amount) - parseFloat(coupon.discount);
                                parent_div.find('.discount_span').text(coupon.discount + ' RS');
                                parent_div.find('.discount_input').val(coupon.discount);
                            }

                        } else {
                            total_amount = Math.round(original_price * selected_days2);
                            parent_div.find('.discount_span').text('0');
                            parent_div.find('.discount_input').val('0');
                            if (!data.status && parent_div.find('.CouponCode').val()) {
                                Toast.fire({
                                    icon: 'error',
                                    title: "Invalid coupon code."
                                })
                            }

                        }
                        total_amount = total_amount.toFixed(2);
                        parent_div.find('.total_amount').text(total_amount);
                        parent_div.find('.total_amount').val(total_amount);
                        if (total_amount && total_amount > 0)
                            parent_div.find('.final_price').text((total_amount / selected_days2)
                                .toFixed(2));



                    }
                })
            }


        });
    </script>
@stop
