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
                    <div class="row" >
                        <div class="custom-form">
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <label style="font-size:16px;">Select Location</label>
                                <select data-placeholder="Status" class="chosen-select on-radius no-search-select"
                                    name="location" id="location">
                                    <option>Select Option</option>
                                    <option value="home">On Home Page</option>
                                    <option value="listing">On Listing Page</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label style="font-size:16px;">Select Size(Pxl)</label>
                               <span id="advertisement_area">
                                <select data-placeholder="Status" class="chosen-select on-radius no-search-select"
      id="advertisement_size">
                                </select>
                               </span>
                            </div>


                        </div>

<span id="advertisement_div"></span>

                        {{-- @include('Website.school_profile.advertisement.packages') --}}

                    </div>

                </div>



            </div>
        </div>

    </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {

          $(document).on("change","#location", function() {
                $.ajax({
                  type: "get",
                    url: "{{ route('school_profile.get_advertisement_size')}}",
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

            $(document).on("change","#advertisement_size", function() {
                $.ajax({
                  type: "get",
                    url: "{{ route('school_profile.get_advertisement_cards')}}",
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

            $(document).on("change",".select_days", function() {
              let selected_day=$(this).val();
              console.log($(this).closest().find('input'));
              let original_price=$(this).siblings('.original_price').val();
              console.log(original_price);
              $(this).closest('li').next('.card-element').find('.total_amount').text(original_price*selected_day);

            })

            

            
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
