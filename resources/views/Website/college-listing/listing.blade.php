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
                                        <div class="float-left width50 clearfix" style="margin-top:3% !important">

                                            <div class="one-three more-filter">
                                                <ul class="unstyled">
                                                    <li class="current"><a href="#" class="title">More Fillter <i
                                                                class="fa fa-angle-right"></i></a>
                                                        <ul class="unstyled">
                                                            <li class="en">
                                                                <input type="checkbox" id="wifi" name="category">
                                                                <label for="wifi">College</label>
                                                            </li>
                                                            <li class="en">
                                                                <input type="checkbox" id="smoking" name="category">
                                                                <label for="smoking">Institution</label>
                                                            </li>
                                                            <li class="en">
                                                                <input type="checkbox" id="onl" name="category">
                                                                <label for="onl">School</label>
                                                            </li>

                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="one-three sortby">
                                                <ul class="unstyled">
                                                    <li class="current"><a href="#" class="title">Sort by: Random <i
                                                                class="fa fa-angle-right"></i></a>
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
                                                                        class="fa fa-caret-right"></i>favourite</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- <div class="float-right">
                                                    <div class="flat-sort">
                                                       <a href="listing-list.html" class="course-list-view active"><i class="fa fa-list"></i></a>
                                                        <a href="listing-grid.html" class="course-grid-view "><i class="fa fa-th"></i></a>
                                                    </div>
                                                </div> -->
                                    </div>
                                    @foreach ($college_list as $anno)
                                        <div class="listing-list">

                                            <div class="flat-product clearfix">
                                                <div class="featured-product">

                                                    <div style="width:290px; height: 220px ; margin:0px ">

                                                        <img style="width:100%; height:100% ; "
                                                            src="{{ asset('public') . '/' . $anno->logo }}"
                                                            alt="" />

                                                    </div>

                                                    <div class="time">

                                                    </div>
                                                </div>
                                                <div class="rate-product">
                                                    <div class="link-review clearfix">

                                                        <div class="info-product">
                                                            <h4 class="title"> {{ $anno->entity_name }}</h4>
                                                            <p>{{ $anno->about }}</p>
                                                            @if(auth()->check())
                                                            <a  class="heart like_college {{check_if_like($anno->user_id)}}"
                                                                college_id="{{ $anno->user_id }}"
                                                                style="margin-top:3% ! important;">
                                                                <i class="ion-android-favorite-outline heart-icon"></i>
                                                                
                                                            </a>
                                                            @else
                                                            <a href="{{route('like-login-redirect')}}"  class="heart"
                                                                style="margin-top:3% ! important;">
                                                                <i class="ion-android-favorite-outline heart-icon"></i>
                                                                
                                                            </a>
                                                            @endif
                                                        </div>
                                                        @php
                                                            $rating_count=get_college_rating($anno->user_id);
                                                        @endphp
                                                        <div class="start-review">
                                                            <span class="rating_star">
                                                                <i class="fa fa-star star {{$rating_count >= 1 ? 'filled' : ''}}"></i>
                                                                <i class="fa fa-star star {{$rating_count >= 2 ? 'filled' : ''}}"></i>
                                                                <i class="fa fa-star star {{$rating_count >= 3 ? 'filled' : ''}}"></i>
                                                                <i class="fa fa-star star {{$rating_count >= 4 ? 'filled' : ''}}"></i>
                                                                <i class="fa fa-star star {{$rating_count >=  5? 'filled' : ''}}"></i>
                                                            </span>
                                                            <a href="#" class="review" style="font-size:15px;">({{$rating_count}}
                                                                )</a>
                                                        </div>
                                                        <p style="font-size:16px;">{{ $anno->address }}</p>

                                                    </div>
                                                    <div class="info-product" style="margin-top:-6;">

                                                        <button type="button" class="login-btn effect-button mobile1"
                                                            mobile_number="{{ $anno->r_mob }}">
                                                            <i class="fa fa-phone" aria-hidden="true"></i> Show
                                                            Number</button> &nbsp;
                                                        &nbsp;</a>


                                                        
                                                            <button type="button" class="login-btn effect-button send_enquiry_modal"
                                                                college_id="{{$anno->user_id}}"> <i
                                                                    class="fa fa-paper-plane"></i> Send
                                                                Enquiry</button>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                    @endforeach

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
                                            <marquee behavior="scroll" direction="up" scrollamount="7">
                                                <span><img
                                                        src="{{ asset('website_asset/images/clg-listing1.png') }}"></span>

                                            </marquee>


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

          
            $(".send_enquiry_modal").on("click", function() {
                $("#popup_register").modal("show");
                $("#college_id").val($(this).attr('college_id'));

            })
            $(".like_college").on("click", function() {
                $(this).toggleClass("active_heart");
                $.ajax({
                    url: '{{ route("like_unlike") }}',
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "college_id": $(this).attr('college_id')
                    },
                    success: function(response) {
                        console.log('Like request successful');
                    },
                    error: function(xhr, status, error) {
                        console.log('Error sending like request:', error);
                    }
                });
            })

            $(".mobile1").on('click', function() {
                $("#popup_login").modal('show');
                $("#mobile_number").text($(this).attr('mobile_number'));


            })
        });
    </script>
@stop
