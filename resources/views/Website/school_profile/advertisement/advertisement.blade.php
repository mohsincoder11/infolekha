@extends('Website.school_profile.layout')
@section('css')

    <style>
        .card-basic,
        .card-premium,
        .card-standard {
           
            padding: 0 0 0.5rem 0;
            background: #fff;
            color: #000;
            text-align: center;
            border-radius: 1rem;
            box-shadow: 0.5rem 0.5rem 1rem rgba(51, 51, 51, 0.2);
            overflow: hidden;
            transition: all 0.3s ease-in-out;
        }

        .card-basic:hover,
        .card-premium:hover,
        .card-standard:hover {
            transform: scale(1.015);
            animation: zoom-in 0.3s ease-in;
        }


        @keyframes zoom-in {
            from {
                transform: scale(1);
            }

            to {
                transform: scale(1.015);
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
            color: #000;
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
                                <select data-placeholder="Status" class="chosen-select on-radius no-search-select"
                                    id="location">
                                    <option>Select Option</option>
                                    <option value="home">On Home Page</option>
                                    <option value="listing">On Listing Page</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label style="font-size:16px;">Select Size(px)</label>
                                <span id="advertisement_area">
									      
                                    <select data-placeholder="Status" class="chosen-select on-radius no-search-select"
                                        id="advertisement_size">
										 <option>Select Size</option>
                                    </select>
                                </span>
                            </div>


                        </div>

                        <span id="advertisement_div" style="width:100%;"></span>

                        {{-- @include('Website.school_profile.advertisement.packages') --}}

                    </div>

               


           

            <div class="col-md-12" style="margin-top: 20px;">
                <hr>
            </div>

            <div class="col-md-12">

                <div class="row" style="margin-top:20px; overflow-x:scroll;">

                       <table id="customers">
                        <tr>
                            <th>SN.</th>
                            <th>Location</th>
                            <th>Package Name</th>
                            <th>Size</th>
                            <th>Selected Days</th>
                            <th>Amount</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                        @foreach ($advertisements as $advertisement)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $advertisement->location=='home' ? 'Home Page' : 'Listing Page' }}</td>
                                <td>{{ $advertisement->PackageName }}</td>
                                <td>{{ $advertisement->BannerWidth }}*{{ $advertisement->BannerHeight }} pxl</td>
                                <td>{{ $advertisement->SelectedDays>0 ? $advertisement->SelectedDays.' days' : $advertisement->SelectedDays.' day' }}</td>
                                <td>{{ $advertisement->TotalAmount }}</td>
                                <td>
                                    @if(isset($advertisement->image))
                                 <a href="{{asset('public/'.$advertisement->image)}}" target="_blank">
                                     <img height="50" width="auto" src="{{asset('public/'.$advertisement->image)}}" alt="">
                                 </a>
                                     @else
                                     Not Uploaded
                                     @endif
                                 </td>
                                <td>{{ $advertisement->status }}</td>

                                <td>
                                    <a class="" href="{{route('school_profile.delete-advertisement',$advertisement->EnquiryID)}}">
                                      <i class="fa fa-trash" aria-hidden="true"></i></a>
                                    
                                  
                                </td>

                            </tr>
                        @endforeach




                    </table>
                    @if(count($advertisements)==0)
                            <p>No Record Found</p>
                            @endif
 </div>

                </div>

            </div>
        </div>

    </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {

            $(document).on("change", "#location", function() {
                $.ajax({
                    type: "get",
                    url: "{{ route('school_profile.get_advertisement_size') }}",
                    data: {
                        location: $(this).val(),
                    },
                    dataType: "json",
                    success: function(data) {
                        $("#advertisement_area").html(data);
                        $("#advertisement_size").niceSelect();
                        $("#advertisement_div").empty();
                    }
                })
            })

            $(document).on("change", "#advertisement_size", function() {
                $.ajax({
                    type: "get",
                    url: "{{ route('school_profile.get_advertisement_cards') }}",
                    data: {
                        size: $(this).val(),
                    },
                    dataType: "json",
                    success: function(data) {
                        $("#advertisement_div").html(data);
                        $(".select_days").niceSelect();
                    }
                })
            })

            $(document).on("change", ".select_days", function() {
                let parent_div = $(this).closest('.card-element-container');
                let selected_day = $(this).val();

                if(parent_div.find('.CouponCode').val()){
                    calculate_discount(parent_div);
                }

                if (selected_day && selected_day > 0) {
                    $(this).closest("form").find(".no_of_days_error").html('');
                }
            })


            $(document).on("click", ".ApplyCouponCode", function() {
                let parent_div = $(this).closest('.card-element-container');
                if(parent_div.find('.CouponCode').val()){
                    calculate_discount(parent_div);
                }

             
            })
            function calculate_discount(parent_div) {
                $.ajax({
                    type: "get",
                    url: "{{ route('school_profile.get_coupon_val') }}",
                    data: {
                        code: parent_div.find('.CouponCode').val(),
                    },
                    dataType: "json",
                    success: function(data) {
                        let original_price = parent_div.find('.original_price').val();
                        var selected_days2=parent_div.find('.select_days').val();
                        let total_amount=0;
                        if(data.status && selected_days2){
                            let coupon=data.coupon;
                            total_amount=Math.round(original_price * selected_days2);
                            
                            if(coupon.type=='PERCENT'){
                                let discount=(total_amount/100)*coupon.discount;
                                total_amount=parseFloat(total_amount)-parseFloat(discount);
                            parent_div.find('.discount_span').text(coupon.discount+'%');
                            parent_div.find('.discount_input').val(discount);
                            }

                            if(coupon.type=='FLAT'){
                                total_amount=parseFloat(total_amount)-parseFloat(coupon.discount);
                                parent_div.find('.discount_span').text(coupon.discount+' RS');
                            parent_div.find('.discount_input').val(coupon.discount);
                            }
                                
                        }else{
                            total_amount=Math.round(original_price * selected_days2);
                            parent_div.find('.discount_span').text('0');
                            parent_div.find('.discount_input').val('0');
                            Toast.fire({
                icon: 'error',
                title: "Invalid coupon code."
            })

                        }
                        total_amount=total_amount.toFixed(2);

                        parent_div.find('.total_amount').text(total_amount);
                        parent_div.find('.total_amount').val(total_amount);
                        if(total_amount && total_amount>0)
                        parent_div.find('.final_price').text((total_amount/selected_days2).toFixed(2));
                        

                       
                    }
                })
            }


            
            $(document).on("click", ".btn-submit", function(e) {
                e.preventDefault(); // Prevent the default form submission

                var formId = $(this).closest("form").attr("id");
                let SelectedDays = $(this).closest("form").find(".select_days").val();
                if (SelectedDays && SelectedDays > 0) {
                    setTimeout(() => {
                    $(this).closest("form").submit();
                        
                    }, 1000);
                    $(this).closest("form").find(".no_of_days_error").html('');

                } else {
                    $(this).closest("form").find(".no_of_days_error").html(
                        '<label class="error">Please select no of days.<label>');
                }

            });




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
