@extends('website_layout')
@section('css')
    <style>
        /*   .sidebar {
                                  height: 100%;
                                  overflow: hidden;
                                }*/

        /*.marquee ul {
                                  list-style: none;
                                  padding: 0;
                                  margin: 0;
                                  animation: scroll 15s linear infinite;
                                  animation-delay: -1.5s; /* Add a negative delay to smooth out the repeat */
        }

        /*.marquee ul li {
                                  margin-bottom: 10px;
                                }

                                .marquee ul li img {
                                  display: block;
                                  max-width: 100%;
                                  height: auto;
                                }

                                @keyframes scroll {
                                  0% {
                                    transform: translateY(0%);
                                  }
                                  100% {
                                    transform: translateY(-100%);
                                  }
                                }*/
    </style>


    <style>
        .marquee {
            font-size: 2vw;
            color: #fff;
            font-family: 'Courier New', Courier, monospace;
            height: 120vw;
            overflow: hidden;
            /* background-color: #000; */
            position: relative;
            /* behavior: scroll;
                                     direction: up; */
        }

        /* nested div inside the container */
        .marquee div {
            display: block;
            width: 200%;
            position: absolute;
            overflow: hidden;
            animation: marquee 20s linear infinite;
        }

        /* span with text */
        .marquee span {
            /* behavior: scroll; */
            direction: up;
            float: top;
            width: 50%;
        }

        /* keyframe */
        @keyframes marquee {
            0% {
                top: 0;
            }

            100% {
                top: -100%;
            }
        }

        .popup2 {
            display: none;
            position: fixed;
            z-index: 1;
            left: 50%;
            top: 50%;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
        }

        .popup2 .popup-content {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.15);
            padding: 20px;
            max-width: 400px;
            text-align: center;
            position: relative;
        }

        .popup2 .close2 {
            color: #aaa;
            font-size: 24px;
            font-weight: bold;
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

        .popup2 .close2:hover,
        .close:focus {
            color: #555;
        }

        .popup2 h2 {
            font-size: 24px;
            margin: 15px 0;
            text-transform: uppercase;
        }

        .popup2 p {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .popup2.center {
            text-align: center;
        }

        .popup2 a {
            display: inline-block;
            padding: 12px 24px;
            background-color: #073D5F;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .popup2 a:hover {
            background-color: #052d45;
        }


        .pac-item-query {
            font-size: 14px;
            padding-right: 3px;
            color: #111;
            font-weight: normal !important;
        }

        .pac-item {
            padding: 10px;
            border-top: 1px solid #ffffff
        }

        .pac-container {
            width: 33%;
        }

        .no-record img {
            margin-top: 10px;
            height: 10rem;
            width: auto;

        }

        .centered-container {
            flex-direction: column;
            /* Stack items vertically */
        }

        .centered-container div {
            text-align: center;
            /* Optional: Center the content within each div */
            margin: 10px 0;
            /* Optional: Add spacing between the elements */
        }

        .centered-container div p {
            font-size: 1.5em;
        }
    </style>

@stop
@section('website_content')
    <section class="main-content page-listing-grid">
        <div id="1920_header">
            <img src="{{ asset('website_asset/images/Listing-banner-top.png') }}">
        </div>
        <div class="container">

            <div class="row">

                <div class="col-lg-12">
                    <section class="main-content page-listing-grid">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="">
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <select class="form-select select country-select filter filter_form"
                                                        name="type">
                                                        <option value=""
                                                            @if (request()->type == 'All') selected @endif>All</option>
                                                        <option value="School"
                                                            @if (request()->type == 'School') selected @endif>School
                                                        </option>
                                                        <option value="College"
                                                            @if (request()->type == 'College') selected @endif>College
                                                        </option>
                                                        <option value="Institute"
                                                            @if (request()->type == 'Institute') selected @endif>Institute
                                                        </option>

                                                    </select>
                                                </div>
                                            </div>

                                            @if (request()->segment(2) && request()->segment(2) == 'School')
                                                <div class="col-lg-2">
                                                    <div class="form-group">
                                                        <select class="form-select select country-select filter filter_form"
                                                            name="board_type">
                                                            <option value="">All (Select Board Type)</option>
                                                            @foreach ($school_type as $board_type)
                                                                <option value="{{ $board_type->id }}"
                                                                    @if (request()->board_type == $board_type->id) selected @endif>
                                                                    {{ $board_type->type }}</option>
                                                            @endforeach
                                                            <option value="Other"
                                                                @if (request()->board_type == 'Other') selected @endif>Other
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            @endif
                                            @if (request()->segment(2) && request()->segment(2) == 'College')
                                                <div class="col-lg-2">
                                                    <div class="form-group">
                                                        <select class="form-select select country-select filter filter_form"
                                                            name="stream">
                                                            <option value="">Select Stream Type</option>
                                                            @foreach (get_college_stream() as $stream)
                                                                <option value="{{ $stream }}"
                                                                    @if (request()->stream == $stream) selected @endif>
                                                                    {{ $stream }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            @endif




                                            <div class="col-lg-2" style="margin-bottom:20px;">
                                                <div class="form-group ">
                                                    <input type="text" value="{{ request()->city }}" name="city"
                                                        id="city_search" class="form-control f1 "
                                                        placeholder="Type to search cities">
                                                </div>
                                            </div>
                                            @if (auth()->check() &&
                                                    auth()->user()->role == '2' &&
                                                    auth()->user()->tutordetail->subscription_status == '1' &&
                                                    auth()->user()->active == '1')
                                                <div class="col-lg-2">
                                                    <div class="form-group">
                                                        <select class="form-select select country-select filter filter_form"
                                                            name="tutor_vacancy">
                                                            <option value="All"
                                                                @if (request()->tutor_vacancy == 'All') selected @endif>All
                                                            </option>
                                                            <option value="vacancy"
                                                                @if (request()->tutor_vacancy == 'vacancy') selected @endif>Vacancy
                                                            </option>

                                                        </select>
                                                    </div>
                                                </div>
                                            @endif





                                            {{-- <div class="col-lg-2">
                                            <div class="form-group">
                                              <select class="form-select select country-select filter " name="sellist1">
                                                <option>Select </option>
                                                <option>Play Group</option>
                                                <option>Nursery</option>
                                                <option>Pre-Primary</option>
                                                <option> 1st to 12th</option>
                                                <option>College</option>
                                                <option>Arts</option>
                                                <option>Commerce</option>
                                                <option>Science</option>
                                              </select>
                                            </div>
                                          </div>

                                          <div class="col-lg-2">
                                            <div class="form-group">
                                              <select class="form-select select country-select filter " name="sellist1">
                                                <option>Select </option>
                                                <option>Play Group</option>
                                                <option>Nursery</option>
                                                <option>Pre-Primary</option>
                                                <option> 1st to 12th</option>
                                                <option>College</option>
                                                <option>Arts</option>
                                                <option>Commerce</option>
                                                <option>Science</option>
                                              </select>
                                            </div>
                                          </div>

                                          <div class="col-lg-2">
                                            <div class="form-group">
                                              <select class="form-select select country-select filter " name="sellist1">
                                                <option>Select </option>
                                                <option>Play Group</option>
                                                <option>Nursery</option>
                                                <option>Pre-Primary</option>
                                                <option> 1st to 12th</option>
                                                <option>College</option>
                                                <option>Arts</option>
                                                <option>Commerce</option>
                                                <option>Science</option>
                                              </select>
                                            </div>
                                          </div> --}}


                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-9">

                                    @forelse ($college_list as $anno)

                                        <div class="listing-list">

                                            <div class="flat-product clearfix">
                                                <div class="featured-product">

                                                    <div style="width:290px; height: 220px ; margin:0px ">

                                                        <a href="{{ route('listing-details', $anno->user_id) }}">
                                                            <img style="width:100%; height:100% ; "
                                                                src="{{ asset('public') . '/' . $anno->logo }}"
                                                                alt="" />
                                                        </a>

                                                    </div>

                                                    <div class="time">

                                                    </div>
                                                </div>
                                                <div class="rate-product">
                                                    <div class="link-review clearfix">

                                                        <div class="info-product">
                                                            <a href="{{ route('listing-details', $anno->user_id) }}">
                                                                <h4 class="title"> {{ $anno->entity_name }}</h4>
                                                            </a>
                                                            <p>{{ Str::limit($anno->about, 100) }}</p>
                                                            @if (auth()->check())
                                                                <a class="heart like_college {{ check_if_like($anno->user_id) }}"
                                                                    college_id="{{ $anno->user_id }}"
                                                                    style="margin-top:3% ! important;">
                                                                    <i class="ion-android-favorite-outline heart-icon"></i>

                                                                </a>
                                                            @else
                                                                <a href="{{ route('like-login-redirect') }}" class="heart"
                                                                    style="margin-top:3% ! important;">
                                                                    <i class="ion-android-favorite-outline heart-icon"></i>

                                                                </a>
                                                            @endif
                                                        </div>
                                                        @php
                                                            $rating_count = get_college_rating($anno->user_id);
                                                            $filledStars = floor($rating_count);
                                                            $hasHalfStar = $rating_count - $filledStars >= 0.5;
                                                        @endphp
                                                        <div class="start-review">
                                                            <span class="flat-start">
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    @if ($i <= $filledStars)
                                                                        <i class="fas fa-star"></i>
                                                                    @elseif ($i == $filledStars + 1 && $hasHalfStar)
                                                                        <i class="fas fa-star-half-alt"></i>
                                                                    @else
                                                                        <i class="far fa-star"></i>
                                                                    @endif
                                                                @endfor
                                                            </span>
                                                            <label href="#" class="review"
                                                                style="background-color:rgb(151, 201, 2); padding:2px 4px; border-radius:5px; color:#fff;margin-left:5px;"><b>{{ $rating_count }}</b></label>
                                                        </div>
                                                        <p style="font-size:16px;">{{ $anno->address_details }}</p>

                                                    </div>
                                                    <div class="info-product" style="margin-top:-6;">

                                                        @if (auth()->check())
                                                        <button type="button" class="login-btn effect-button mobile1"
                                                            mobile_number="{{ $anno->mob }}">
                                                            <i class="fa fa-phone" aria-hidden="true"></i> Show
                                                            Number</button> &nbsp;
                                                        &nbsp;
                                                            @if (auth()->user()->role != '2')
                                                                <button type="button"
                                                                    class="login-btn effect-button send_enquiry_modal"
                                                                    college_id="{{ $anno->user_id }}"> <i
                                                                        class="fa fa-paper-plane"></i> Send
                                                                    Enquiry</button>
                                                            @endif
                                                        @else
                                                        <a href="{{ route('enquiry-login-redirect',1) }}"> <button
                                                            type="button" class="login-btn effect-button "
                                                            > <i
                                                                class="fa fa-phone"></i>  Show
                                                                Number</button></a>&nbsp;
                                                            <a href="{{ route('enquiry-login-redirect',2) }}"> <button
                                                                type="button" class="login-btn effect-button "
                                                                > <i
                                                                    class="fa fa-paper-plane"></i> Send
                                                                Enquiry</button></a>
                                                        @endif

                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                    @empty
                                        <div class="listing-list no-record centered-container">
                                            <div>
                                                <img src="{{ asset('website_asset/icon/no-record.svg') }}" alt="">
                                            </div>
                                            <div>
                                                <p>No Record Found</p>
                                            </div>
                                        </div>
                                    @endforelse

                                    <div class="modal fade flat-popupform" id="popup_login">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;</button>
                                                </div>

                                                <div class="modal-body text-center clearfix">
                                                    <label class="form-label"
                                                        style="color:#073D5F; font-size:20px; ">Contact
                                                        Number</label><br>
                                                    <label style="color: black;" id="mobile_number"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                    {{-- <div class="popup" id="">
                                        <div class="cnt223" align="center">
                                            <a href="" class="close mj" style="color:#ff0000;"> X </a><br>
                                            <a href="#" target="_blank">
                                    
                                                <h4><b>10 VACCANCIES ARE AVAILABLE <br>IN YOUR AREA </b></h4><br>
                                    
                                                <a href="#" class="btn" target="_blank"> Click Here For More Details</a>
                                    
                                            </a>
                                            <br/>
                                        </div>
                                    </div> --}}
                                    @if (request()->segment(2) && request()->segment(2) == 'tutorjob')
                                        @if (
                                            (!auth()->check() || auth()->user()->active != '1') &&
                                                vacancy_count() > 0 &&
                                                (!auth()->user() || auth()->user()->tutordetail->subscription_status != '1'))
                                            <div id="popup2" class="popup2">
                                                <div class="popup-content">
                                                    <span class="close2">&times;</span>
                                                    <h2>{{ vacancy_count() }} Vacancies are available in your area</h2>
                                                    <p>Apply now!</p>
                                                    <div class="center">
                                                        <a href="{{ route('tutor_subscription') }}">Click here for
                                                            details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endif


                                    <div class="modal fade flat-popupform" id="popup_register">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body text-center clearfix">
                                                    <form class="form-login form-listing"
                                                        action="{{ route('post_enquiry') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="college_id" id="college_id">

                                                        <h3 class="title-formlogin">Send Enquiry</h3>

                                                        <span class="input-login icon-form"><input type="text"
                                                                placeholder="Your Name*" name="name"
                                                                required="required"
                                                                value="{{ auth()->check() ? auth()->user()->name : '' }}"><i
                                                                class="fa fa-user"></i></span>
                                                        <span class="input-login icon-form"><input type="text"
                                                                placeholder="E-mail*" name="email" required="required"
                                                                value="{{ auth()->check() ? auth()->user()->email : '' }}"><i
                                                                class="fa fa-envelope-o"></i></span>
                                                        <span class="input-login icon-form">
                                                            <input type="text"
                                                                placeholder="Mobile Number*" name="mobile"
                                                                required="required"  value=""></span>
                                                        <span class="input-login icon-form">
                                                            <textarea type="text" placeholder="Message" name="message" required="required" rows="4" cols="50"></textarea>
                                                        </span>
                                                        <div class="wrap-button signup">
                                                            <button type="submit" id="logup-button"
                                                                class=" login-btn effect-button"
                                                                title="log in">SEND</button>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="blog-pagination style2 text-center">
                                        <div class=" clearfix" style="margin-left:40%;">
                                            {{ $college_list->links('pagination::bootstrap-4') }}
                                        </div> <!-- /.flat-pagination -->
                                    </div><!-- /.blog-pagination -->
                                </div><!-- /.col-lg-9 -->
                                <div class="col-lg-3">
                                    <div class="sidebar" style="margin-top:0.01rem;">
                                        <div class=" widget widget-form style2 ">
                                            <span id="city-wise-data">
                                                <div class="card">
                                                    <div class="cover-image-skeleton"></div>

                                                </div>
                                                {{-- @foreach ($advertisements as $advertisement)
                                                <span><img class="listing_image"
                                                        src="{{ asset('public/' . $advertisement->image) }}"
                                                        alt="image">
                                                </span>
                                                <br>
                                                <br>
                                            @endforeach --}}
                                            </span>

                                        </div>

                                    </div>
                                </div><!-- /.col-md-3 -->
                            </div><!-- /.row -->
                        </div><!-- /.container -->
                    </section>


                </div><!-- /.col-lg-9 -->

            </div>
            <!-- /.row -->
        </div><!-- /.container -->
    </section>


@stop
@section('js')
    <script>
        $(document).ready(function() {

            $(document).on('change', '.filter_form', function() {
                if ($(this).attr('name') == 'type') {
                    var selectedValue = $(this).val();

                    var redirectURL = "{{ route('college_listing', ['type' => '']) }}/" + selectedValue;
                    window.location.href = redirectURL;
                } else {
                    $(this).closest('form').submit();
                }
            });

            var autocomplete2 = new google.maps.places.Autocomplete(
                (document.getElementById('city_search')), {
                    types: ['(cities)']
                });

            /*var autocomplete = new google.maps.places.Autocomplete(input);*/
            autocomplete2.setComponentRestrictions({
                'country': 'in'
            });
            autocomplete2.addListener('place_changed', function() {
                var place = autocomplete2.getPlace();
                var address = place.formatted_address;
                var city_name = address.substr(0, address.indexOf(',')).trim();
                $("#city_search").val(city_name);
                $("#city_search").closest('form').submit();
                console.log('submit');

                //localStorage.setItem('city_search', city_name);
                //stored_city_function(city_name);

            });


            $("#popup2").css('display', 'flex');
            $(".close2").click(function() {
                $("#popup2").hide();
            });

            $(".send_enquiry_modal").on("click", function() {
                $("#popup_register").modal("show");
                $("#college_id").val($(this).attr('college_id'));
            })



            $(".mobile1").on('click', function() {
                $("#popup_login").modal('show');
                $("#mobile_number").text($(this).attr('mobile_number'));

            })
        });
    </script>
@stop
