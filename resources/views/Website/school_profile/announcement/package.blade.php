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
                <div class="dashboard-title-item">Select Subscription Plan</div>
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



                        @foreach($announcement_packages as $advertisements) 
                        <form action="{{route('school_profile.pay-for-announcement')}}" method="post" id="form{{$loop->iteration}}">
                         @csrf
                         <input type="hidden" name="announcement_id" value="{{$announcement_id}}">
                        <div class="col-lg-4">
                           <div class="card-basic">
                               <div class="card-header header-basic">
                                 <h1>{{$advertisements->PackageName}}</h1>
                               </div>
                               <div class="card-body">
                                <input type="hidden" name="PackageID" value="{{$advertisements->PackageID}}">
                                   <div class="card-element-hidden-standard">
                                     <ul class="card-element-container">
                                       
                                       <li class="card-element">Original Price - Rs. {{$advertisements->OriginalPrice}} Per Day</li>
                                       <li class="card-element">Discount - {{$advertisements->Discount}}%</li>
                                       <li class="card-element">Final Price - Rs. {{$advertisements->OriginalPrice-(($advertisements->OriginalPrice/100)*$advertisements->Discount)}} Per Day</li>
                                       <li class="card-element" style="padding:0 10px">
                                            <input type="hidden" class="original_price" value="{{$advertisements->OriginalPrice-(($advertisements->OriginalPrice/100)*$advertisements->Discount)}}">
                                             <select class="select_days" name="SelectedDays">
                                             <option value="">Select no of days</option>
                                             @for($i=$advertisements->MinDays;$i<=$advertisements->MaxDays;$i++)
                                             <option value="{{$i}}">{{$i}} @if($i>1)days @else day @endif</option>
                                             @endfor
                                         </select>
                                         <span class="no_of_days_error"></span>
                                      </li>
                                       <li class="card-element">Total Amount - Rs. <span class="total_amount"></span>
                                         <input type="hidden" name="TotalAmount" class="total_amount">
                     
                                       </li>
                     
                                     </ul>
                                     <div>
                     
                                         {{-- <label style="text-align: center !important;"> Apply Coupon Code</label>
                                         <input type="text" class="form-control" name="CouponCode"  value="" /> --}}
                                     </div>
                                     <button type="submit" class="btn btn-standard btn-submit">Pay Now</button>
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

            $(document).on("change", ".select_days", function() {
                let selected_day = $(this).val();
                let original_price = $(this).siblings('.original_price').val();
                $(this).closest('li').next('.card-element').find('.total_amount').text(original_price *
                    selected_day);
                $(this).closest('li').next('.card-element').find('.total_amount').val(original_price *
                    selected_day);
                if (selected_day && selected_day > 0) {
                    $(this).closest("form").find(".no_of_days_error").html('');
                }
            })

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

           
        });
    </script>
@stop