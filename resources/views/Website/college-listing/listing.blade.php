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
            left: 0;
            top: 0;
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
            margin-bottom: 10px;
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
    </style>

@stop
@section('website_content')
    <section class="main-content page-listing-grid">
        <div>
            <img src="{{ asset('website_asset/images/Listing-banner-top.png') }}">
        </div>
        <div class="container">

            <div class="row">

                <div class="col-lg-12">
                    <section class="main-content page-listing-grid">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="flat-select clearfix">
                                        <div class="float-left width100 clearfix" style="margin-top:3% !important">
                                            <div class="row">
                                                @if (request()->segment(2) && request()->segment(2) == 'School')
                                                    <div class="col-md-2 col-sm-6">
                                                        <div class="sortby" style="padding-top:4px; ">
                                                            <ul class="unstyled">
                                                                <li class="current">
                                                                    <label  class="title">
                                                                    {{-- {{get_board_name(request()->board_type) ?? 'Type of Board'}} --}}
                                                                    Type of Board
                                                                    <i class="fa fa-angle-right"></i></label>
                                                                    <ul class="unstyled">
                                                                        @foreach ($school_type as $board_type)
                                                                            <li class="en">
                                                                                <a @if(request()->board_type==$board_type->id) style="font-weight:bold;" @endif 
                                                                                    href="{{ route('college_listing', ['type' => request()->segment(2) ? request()->segment(2) : '']) }}?board_type = {{$board_type->id}}"
                                                                                    title="">
                                                                                    <i class="fa fa-caret-right"></i>
                                                                                    {{ $board_type->type }}
                                                                                </a>
                                                                            </li>
                                                                        @endforeach


                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="col-md-2">
                                                    <div class="sortby" style="padding-top:4px; ">
                                                        <ul class="unstyled">
                                                            <li class="current"> <label  class="title">Stream<i class="fa fa-angle-right"></i></label>
                                                                <ul class="unstyled">
                                                                    @foreach(get_college_stream() as $stream)
                                                                    <li class="en">
                                                                        <a @if(request()->stream==$stream) style="font-weight:bold;" @endif href="{{ route('college_listing', ['type' => request()->segment(3) ? request()->segment(3) : '']) }}?stream = {{$stream}}" title=""><i
                                                                                class="fa fa-caret-right"></i>{{$stream}}</a>
                                                                    </li>
                                                                    @endforeach
                                                                   
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                </div>

                                                {{-- <div class="col-md-2">
                                                    <div class="sortby" style="padding-top:4px; ">
                                                        <ul class="unstyled">
                                                            <li class="current"><a href="#" class="title">Type of
                                                                    Board<i class="fa fa-angle-right"></i></a>
                                                                <ul class="unstyled">
                                                                    <li class="en"><a href="#" title=""><i
                                                                                class="fa fa-caret-right"></i>Open Now</a>
                                                                    </li>
                                                                    <li class="en"><a href="#" title=""><i
                                                                                class="fa fa-caret-right"></i>Most
                                                                            reviewed</a></li>
                                                                    <li class="en"><a href="#" title=""><i
                                                                                class="fa fa-caret-right"></i>Top rated</a>
                                                                    </li>
                                                                    <li class="en"><a href="#" title=""><i
                                                                                class="fa fa-caret-right"></i>Random</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                </div>
                                                <div class="col-md-2">
                                                    <div class="sortby" style="padding-top:4px; ">
                                                        <ul class="unstyled">
                                                            <li class="current"><a href="#" class="title">Type of
                                                                    Board<i class="fa fa-angle-right"></i></a>
                                                                <ul class="unstyled">
                                                                    <li class="en"><a href="#" title=""><i
                                                                                class="fa fa-caret-right"></i>Open Now</a>
                                                                    </li>
                                                                    <li class="en"><a href="#" title=""><i
                                                                                class="fa fa-caret-right"></i>Most
                                                                            reviewed</a></li>
                                                                    <li class="en"><a href="#" title=""><i
                                                                                class="fa fa-caret-right"></i>Top rated</a>
                                                                    </li>
                                                                    <li class="en"><a href="#" title=""><i
                                                                                class="fa fa-caret-right"></i>Random</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                </div>
                                                <div class="col-md-2">
                                                    <div class="sortby" style="padding-top:4px; ">
                                                        <ul class="unstyled">
                                                            <li class="current"><a href="#" class="title">Type of
                                                                    Board<i class="fa fa-angle-right"></i></a>
                                                                <ul class="unstyled">
                                                                    <li class="en"><a href="#"
                                                                            title=""><i
                                                                                class="fa fa-caret-right"></i>Open Now</a>
                                                                    </li>
                                                                    <li class="en"><a href="#"
                                                                            title=""><i
                                                                                class="fa fa-caret-right"></i>Most
                                                                            reviewed</a></li>
                                                                    <li class="en"><a href="#"
                                                                            title=""><i
                                                                                class="fa fa-caret-right"></i>Top rated</a>
                                                                    </li>
                                                                    <li class="en"><a href="#"
                                                                            title=""><i
                                                                                class="fa fa-caret-right"></i>Random</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                </div>
                                                <div class="col-md-2">
                                                    <div class="sortby" style="padding-top:4px; ">
                                                        <ul class="unstyled">
                                                            <li class="current"><a href="#" class="title">Type of
                                                                    Board<i class="fa fa-angle-right"></i></a>
                                                                <ul class="unstyled">
                                                                    <li class="en"><a href="#"
                                                                            title=""><i
                                                                                class="fa fa-caret-right"></i>Open Now</a>
                                                                    </li>
                                                                    <li class="en"><a href="#"
                                                                            title=""><i
                                                                                class="fa fa-caret-right"></i>Most
                                                                            reviewed</a></li>
                                                                    <li class="en"><a href="#"
                                                                            title=""><i
                                                                                class="fa fa-caret-right"></i>Top rated</a>
                                                                    </li>
                                                                    <li class="en"><a href="#"
                                                                            title=""><i
                                                                                class="fa fa-caret-right"></i>Random</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                </div> --}}
                                            </div>




                                        </div>
                                        <!-- <div class="float-right">
                                                                <div class="flat-sort">
                                                                   <a href="listing-list.html" class="course-list-view active"><i class="fa fa-list"></i></a>
                                                                    <a href="listing-grid.html" class="course-grid-view "><i class="fa fa-th"></i></a>
                                                                </div>
                                                            </div> -->
                                    </div>
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
                                                            <p>{{ Str::limit($anno->about, 40) }}</p>
                                                            @if (auth()->check())
                                                                <a class="heart like_college {{ check_if_like($anno->user_id) }}"
                                                                    college_id="{{ $anno->user_id }}"
                                                                    style="margin-top:3% ! important;">
                                                                    <i class="ion-android-favorite-outline heart-icon"></i>

                                                                </a>
                                                            @else
                                                                <a href="{{ route('like-login-redirect') }}"
                                                                    class="heart" style="margin-top:3% ! important;">
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
                                                        <p style="font-size:16px;">{{ $anno->address }}</p>

                                                    </div>
                                                    <div class="info-product" style="margin-top:-6;">

                                                        <button type="button" class="login-btn effect-button mobile1"
                                                            mobile_number="{{ $anno->r_mob }}">
                                                            <i class="fa fa-phone" aria-hidden="true"></i> Show
                                                            Number</button> &nbsp;
                                                        &nbsp;</a>



                                                        <button type="button"
                                                            class="login-btn effect-button send_enquiry_modal"
                                                            college_id="{{ $anno->user_id }}"> <i
                                                                class="fa fa-paper-plane"></i> Send
                                                            Enquiry</button>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                        @empty
                                        <div class="listing-list">No Records Found</div>
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
                                                        style="color:#073D5F; font-size:20px; ">Mobile
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

                                    <div id="popup2" class="popup2">
                                        <div class="popup-content">
                                            <span class="close2">&times;</span>
                                            <h2>10 Vacancies are available in your area</h2>
                                            <p>Apply now!</p>
                                            <div class="center">
                                                <a href="redirect-url">Click here for details</a>
                                            </div>
                                        </div>
                                    </div>


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
                                                        <!-- <span class="input-login icon-form"><input type="text" placeholder="Mobile Number*" name="mobile_no" required="required"><i class="fa fa-phone" aria-hidden="true"></i></span> -->
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
                                <div class="col-lg-3" style="margin-top:7%;">
                                    <div class="sidebar">
                                        <div class=" widget widget-form style2 ">
                                            <span><img src="{{ asset('website_asset/images/clg-listing1.png') }}"></span>



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
            //$("#popup2").css('display','flex');
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
