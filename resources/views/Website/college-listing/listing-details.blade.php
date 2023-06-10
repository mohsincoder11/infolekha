@extends('website_layout')
@section('css')
    <style>
        .rating-wrapper {
            position: relative;
            display: inline-block;
            border: none;
            font-size: 14px;
            margin-bottom: 20px;

        }

        .rating-wrapper input {
            border: 0;
            width: 1px;
            height: 1px;
            overflow: hidden;
            position: absolute !important;
            clip: rect(1px 1px 1px 1px);
            clip: rect(1px, 1px, 1px, 1px);
            opacity: 0;
        }

        .rating-wrapper label {
            position: relative;
            float: right;
            color: #C8C8C8;
        }

        .rating-wrapper label:before {
            margin: 5px;
            content: "\f005";
            font-family: FontAwesome;
            display: inline-block;
            font-size: 1.5em;
            color: #ccc;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        .rating-wrapper input:checked~label:before {
            color: #FFC107;
        }

        .rating-wrapper label:hover~label:before {
            color: #ffdb70;
        }

        .rating-wrapper label:hover:before {
            color: #FFC107;
        }
    </style>
    <style>
        .btn {
            border: none;
            background-color: #073D5F;
            /* padding: 11px 26px; */
            font-size: 16px;
            cursor: pointer;
            display: inline-block;
        }

        .btn:hover {
            background: #477ea0;
        }


        .default {
            color: black;
        }

        .dropbtn {

            border: none;
            cursor: pointer;
        }


        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 360px;
            overflow: auto;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 3px;
            text-decoration: none;
            display: block;
        }

        .dropdown a:hover {
            background-color: #ddd;
        }

        .show {
            display: block;
        }
    </style>

    <style>
        @media only screen and (max-width: 768px) {

            /* for mobile view /.menu */
            .menunone {
                display: none !important;
            }

            .menu1 {
                display: block !important;
            }

            .p1 {
                padding-top: 1%;
            }

            /* for mobile view /.menu end*/

            .previous_btn {
                left: 50px;
            }

            .next_btn {
                right: 50px;
            }
        }

        @media (max-width: 768px) {

            html,
            body {

                height: 100%;
                margin: 0;
                padding: 0;
                width: 100%;
            }

            .slider {
                margin: 0 auto;
                max-width: 1500px;
            }

            .slide_viewer {
                height: 133px !important;
                overflow: hidden;
                position: relative;
            }

            .slide_group {
                height: 100%;
                position: relative;
                width: 100%;
            }

            .slide {
                display: none;
                height: 100%;
                position: absolute;
                width: 100%;
            }

            .slide_buttons {
                left: 0;
                position: absolute;
                right: 0;
                text-align: center;
            }

        }
    </style>

    <style>
        .placeholder1 {

            color: #fff;

        }


        @media only screen and (max-width: 768px) {
            .l1 {
                padding-top: 70%;
                margin-bottom: -30%;
            }

            .l2 {
                margin-right: 20% !important;

            }
        }
    </style>
    <!--border corner-->
    <style>
        .inpclass input::placeholder {
            color: rgb(255, 255, 255);
            font: 1.25rem
        }
    </style>



    <style>
        .container1 {
            width: 400px;
            height: 400px;
            background-color: #ffffff;
            position: relative;
            position: relative;
            overflow: hidden;
            top: 70%;
            left: 30%;
            transform: translate(-85%, -85%);
        }

        .container1::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 40%;
            height: 40%;
            border-left: 4px solid #ebc765;
            border-top: 4px solid #ebc765;

        }

        .container1::after {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            width: 60%;
            height: 60%;
            border-top: 4px solid #000000;
            border-right: 4px solid #000000;
        }

        .children::before {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60%;
            height: 60%;
            border-bottom: 4px solid #000000;
            border-left: 4px solid #000000;
        }

        .children::after {
            content: "";
            position: absolute;
            bottom: 0;
            right: 0;
            width: 40%;
            height: 40%;
            border-bottom: 4px solid #ebc765;
            border-right: 4px solid #ebc765;
        }

        .custompad {
            border: 1px solid #eee;
            margin-bottom: 29px;
            border-radius: 10px;
            padding: 20px 20px 20px 20px;
        }
    </style>
@stop
@section('website_content')
    <section class="main-content page-listing">

        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="listing-wrap">

                        <div class="flat-product clearfix custompad">
                            <div class="rate-product">
                                <div class="link-review clearfix">

                                    <div class="info-product">
                                        <h4 class="title"><i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                            {{ $details->entity_name }}
                                        </h4>
                                        @if (auth()->check())
                                            <a class="heart2 like_college {{ check_if_like($details->user_id) }}"
                                                college_id="{{ $details->user_id }}" style="margin-top:3% ! important;">
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
                                        $rating_count = get_college_rating($details->user_id);
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


                                    <p>{{ $details->address }}</p>
                                </div>
                                <div class="info-product" style="margin-top:-6;">

                                    <button type="button" class="login-btn effect-button mobile1"
                                        mobile_number="{{ $details->r_mob }}">
                                        <i class="fa fa-phone" aria-hidden="true"></i> Show
                                        Number</button> &nbsp; &nbsp;
                                    <button type="button" class="login-btn effect-button send_enquiry_modal"
                                        college_id="{{ $details->user_id }}"> <i class="fa fa-paper-plane"></i> Send
                                        Enquiry</button>



                                </div>
                            </div>
                        </div>

                        <h5 class="title-listing">Quick Information</h5>
                        <div class="row">
                            <div class="col-lg-7" style="margin-top: 2%;">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class=" icon-text text-left">
                                            <div class="box-content">
                                                <div style="color: #000000;"><b>Year of Establishment</b></div>
                                                <p>{{ $details->oprating_since }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class=" icon-text text-left">
                                            <div class="box-content">
                                                <div style="color: #000000;"><b>Timings</b></div>
                                                {{-- <p >
                                                Mon - Sat
                                                9:30 am - 12:30 pm</p> 
                                                <p >Sun
                                                    Closed - Closed</p> --}}
                                                    <p>
                                                        {{ $details->opening_time }} - {{ $details->closing_time }}  
                                                    </p>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>



                        <div class="text p1" style="margin-top: 3%;">


                            <h5 class="title-listing">About Us</h5>

                            <p>{!!$details->about!!}.</p><br>
                        </div>

                        <section class="flat-row section-client">
                            <div class="container">
                                <div class="row">

                                    <div style="margin-bottom:2% ;">
                                        <h5 class="title-listing">Images</h5>

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="flat-client" data-item="4" data-nav="true" data-dots="false"
                                            data-auto="false">
                                            @foreach(json_decode($details->image) as $i)
                                            <div class="client">
                                                <div class="featured-client">
                                                    <img src="{{asset('public').'/'.$i}}" alt="image">
                                                </div>

                                            </div>
                                            @endforeach
                                            
                                        </div><!-- /.flat-client -->
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="flat-row section-client">
                            <div class="container">
                                <div class="row">

                                    <div style="margin-bottom:2% ;">
                                        <h5 class="title-listing">Video</h5>

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="flat-client" data-item="4" data-nav="true" data-dots="false"
                                            data-auto="false">
                                            @foreach(json_decode($details->video) as $i)
                                            <div class="client">
                                                <div class="featured-client">
                                                    <img src="{{asset('public').'/'.$i}}" alt="image">
                                                </div>

                                            </div>
                                            @endforeach
                                          
                                        </div><!-- /.flat-client -->
                                    </div>
                                </div>
                            </div>
                        </section>

                        <div class="content-listing">

                            <h5 class="title-listing" style="margin-bottom: 3%;">Facilities</h5>
                            <div class="wrap-list clearfix">
                                <ul class="list float-left">
                                    @foreach(json_decode($details->facilities) as $i)
                                    @if($loop->index%2==0)
                                    <li><span><i class="fa fa-check"></i></span>{{$i}}</li>
                                    @endif

                                    @endforeach
                                </ul>
                                <ul class="list float-left">
                                    @foreach(json_decode($details->facilities) as $i)
                                    @if($loop->index%2==1)
                                    <li><span><i class="fa fa-check"></i></span>{{$i}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                              
                            </div>

                            <h3 class="title-listing">Courses</h3>
                            <div class="wrap-list clearfix">
                                <ul class="list float-left">
                                    @foreach(json_decode($details->course) as $i)
                                    @if($loop->index%2==0)
                                    <li><span><i class="fa fa-check"></i></span>{{$i}}</li>
                                    @endif

                                    @endforeach
                                </ul>
                                <ul class="list float-left">
                                    @foreach(json_decode($details->course) as $i)
                                    @if($loop->index%2==1)
                                    <li><span><i class="fa fa-check"></i></span>{{$i}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                              
                            </div>




                            <div class="list-comment">
                                <h5 class="title-listing">{{count($details->college_review )}} Reviews</h5>
                                <div class="comments-area">
                                    <ol class="comment-list">
                                       
                                        @foreach( $details->college_review as $review)
                                        <li class="comment">
                                            <article class="comment-body clearfix">
                                                <div class="comment-author">
                                                    <img style="object-fit: cover;" width="46px" height="46px" src="{{asset('public/'.$review->logo)}}" alt="image">
                                                </div><!-- .comment-author -->
                                                <div class="comment-text">
                                                    @php
                                                    $filledStars = floor($review->rating);
                                                    $hasHalfStar = ($rating_count - $filledStars) >= 0.5;
                                                @endphp
                                                    <div class="comment-metadata">
                                                        <h5><a href="#">{{$review->name}}</a></h5>
                                                        <p class="day">{{date('d/m/Y',strtotime($review->created_at))}}</p>
                                                        <div class="flat-start">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                            @if ($i <= $filledStars)
                                                                <i class="fas fa-star"></i> 
                                                            @elseif ($i == ($filledStars + 1) && $hasHalfStar)
                                                                <i class="fas fa-star-half-alt"></i> 
                                                            @else
                                                                <i class="far fa-star"></i>
                                                            @endif
                                                        @endfor
                                                        </div>
                                                    </div><!-- .comment-metadata -->
                                                    <div class="comment-content">
                                                        <p>
                                                            {{$review->comment}} </p>
                                                    </div><!-- .comment-content -->
                                                </div><!-- /.comment-text -->
                                            </article><!-- .comment-body -->
                                        </li><!-- #comment-## -->
                                        @endforeach

                                      

                                    </ol><!-- .comment-list -->

                                    <div class="comment-respond" id="respond">
                                        <h3 class="title-listing">Add a Review</h3>
                                        <form novalidate="" class="comment-form clearfix" id="commentform"
                                            method="post" action="{{ route('insert_feedback') }}">
                                            @csrf
                                            <input type="hidden" name="college_id" value="{{ $details->user_id }}">
                                            <div class="wrap-input clearfix">
                                                <p class="comment-notes">
                                                    <input type="email"
                                                        value="{{ auth()->check() ? auth()->user()->email : '' }}"
                                                        placeholder="Your Email" size="30" value=""
                                                        name="email">
                                                </p>
                                                <p class="comment-form-email">
                                                    <input type="text"
                                                        value="{{ auth()->check() ? auth()->user()->name : '' }}"
                                                        placeholder="Your Name" aria-required="true" name="name">

                                                </p>
                                            </div>
                                            <p class="comment-form-comment">
                                                <textarea class="" tabindex="4" placeholder="write review" name="comment" required></textarea>
                                            </p>
                                            <input type="text" name="rating" id="rating" value="3">
                                            <div class="rating-wrapper">
                                                <input type="checkbox" name="rating1" id="st1" value="1" />
                                                <label for="st1"></label>
                                                <input type="checkbox" name="rating1" id="st2" value="2" />
                                                <label for="st2"></label>
                                                <input type="checkbox" name="rating1" id="st3" value="3" />
                                                <label for="st3"></label>
                                                <input type="checkbox" name="rating1" id="st4" value="4" />
                                                <label for="st4"></label>
                                                <input type="checkbox" name="rating1" id="st5" value="5" />
                                                <label for="st5"></label>
                                            </div>
                                            <p class="form-submit">
                                                <button type="submit" class="comment-submit effect-button">Send
                                                    Review</button>
                                            </p>
                                        </form>
                                    </div><!-- /.comment-respond -->
                                </div><!-- /.comments-area -->
                            </div>

                        </div>


                    </div><!-- /.listing-wrap -->
                </div><!-- /.col-lg-9 -->
                <div class="col-lg-3">
                    <div class="sidebar">


                        <div class="widget widget-contact">
                            <h5 class="widget-title">Contact Us</h5>
                            <ul>
                                <li class="adress">PO Box 16122 Collins Street West Victoria 8007 Australia</li>
                                <li class="phone">+61 3 8376 6284</li>
                                <li class="email">Yourplace@gmail.com</li><br>

                                <!-- <span> <button type="button" id="logup-button" class=" login-btn effect-button">
                                        <i class="fa fa-phone" aria-hidden="true"></i> Show
                                        Number</button></span>&nbsp;&nbsp;

                                <button type="button" id="logup-button" class=" login-btn effect-button"
                                    onclick="location.href='#'"> <i class="fa fa-paper-plane"
                                        aria-hidden="true"></i> Send
                                    Enquiry</button><br> -->


                            </ul>



                            <div class="social-links">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div><br>

                        <img src="https://via.placeholder.com/290x220" alt="image"><br><br>
                        <img src="https://via.placeholder.com/290x220" alt="image"><br><br>
                        <img src="https://via.placeholder.com/290x220" alt="image"><br><br>
                        <img src="https://via.placeholder.com/290x220" alt="image">
                    </div><!-- /.sidebar -->



                </div><!-- /.col-md-3 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>


    <div class="modal fade flat-popupform" id="popup_login">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                <div class="modal-body text-center clearfix">
                    <label class="form-label" style="color:#073D5F; font-size:20px; ">Mobile
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
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body text-center clearfix">
                    <form class="form-login form-listing" action="{{ route('post_enquiry') }}" method="post">
                        @csrf
                        <input type="hidden" name="college_id" id="college_id">

                        <h3 class="title-formlogin">Send Enquiry</h3>

                        <span class="input-login icon-form"><input type="text" placeholder="Your Name*"
                                name="name" required="required"
                                value="{{ auth()->check() ? auth()->user()->name : '' }}"><i
                                class="fa fa-user"></i></span>
                        <span class="input-login icon-form"><input type="text" placeholder="E-mail*" name="email"
                                required="required" value="{{ auth()->check() ? auth()->user()->email : '' }}"><i
                                class="fa fa-envelope-o"></i></span>
                        <!-- <span class="input-login icon-form"><input type="text" placeholder="Mobile Number*" name="mobile_no" required="required"><i class="fa fa-phone" aria-hidden="true"></i></span> -->
                        <span class="input-login icon-form">
                            <textarea type="text" placeholder="Message" name="message" required="required" rows="4" cols="50"></textarea>
                        </span>
                        <div class="wrap-button signup">
                            <button type="submit" id="logup-button" class=" login-btn effect-button"
                                title="log in">SEND</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {

            //             const checkboxes = document.querySelectorAll('input[type="checkbox"][name="rating1"]');
            //   let lastCheckedValue = '';

            //   checkboxes.forEach((checkbox) => {
            //     checkbox.addEventListener('change', () => {
            //       if (checkbox.checked) {
            //         lastCheckedValue = checkbox.value;
            //         $("#rating").val(lastCheckedValue);
            //       }
            //     });
            //   });


            $(".send_enquiry_modal").on("click", function() {
                $("#popup_register").modal("show");
                $("#college_id").val($(this).attr('college_id'));
            })

            // $(".like_college").on("click", function() {
            //     $(this).toggleClass("active_heart");
            //     $.ajax({
            //         url: '{{ route('like_unlike') }}',
            //         type: 'POST',
            //         data: {
            //             "_token": "{{ csrf_token() }}",
            //             "college_id": $(this).attr('college_id')
            //         },
            //         success: function(response) {
            //             console.log('Like request successful');
            //         },
            //         error: function(xhr, status, error) {
            //             console.log('Error sending like request:', error);
            //         }
            //     });
            // })

            $(".mobile1").on('click', function() {
                $("#popup_login").modal('show');
                $("#mobile_number").text($(this).attr('mobile_number'));

            })
        });
    </script>
@stop
