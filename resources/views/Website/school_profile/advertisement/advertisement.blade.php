@extends('Website.school_profile.layout')
@section('css')

    <style>
        .card-basic,
        .card-premium,
        .card-standard {
           
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
                                <label style="font-size:16px;">Select Size(pxl)</label>
                                <span id="advertisement_area">
                                    <select data-placeholder="Status" class="chosen-select on-radius no-search-select"
                                        id="advertisement_size">
                                    </select>
                                </span>
                            </div>


                        </div>

                        <span id="advertisement_div" style="width:100%;"></span>

                        {{-- @include('Website.school_profile.advertisement.packages') --}}

                    </div>

                </div>


            </div>

            <div class="col-md-12" style="margin-top: 20px;">
                <hr>
            </div>

            <div class="col-md-12">

                <div class="row" style="margin-top:20px;">

                    <table id="customers">
                        <tr>
                            <th>Sr.no</th>
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
                                    <a class="" href="#">
                                        <i class="fal fa-trash"></i>
                                    </a>
                                  
                                </td>

                            </tr>
                        @endforeach




                    </table>



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
                console.log(SelectedDays);
                if (SelectedDays && SelectedDays > 0) {
                    $(this).closest("form").submit();
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
