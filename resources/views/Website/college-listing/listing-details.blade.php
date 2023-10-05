@extends('website_layout')
@section('css')

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

    <style>
        .rating-box {
            padding: 0 0 15px 0;
            text-align: center;
        }

        .rating-box .stars {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .stars i {
            font-size: 25px;
            color: #b5b8b1;
            transition: all 0.2s;
            cursor: pointer;
        }

        .stars i.active {
            color: #ffb851;
            transform: scale(1.1);
        }
    </style>

    <!--modal-->
    <style>
        button a {
            letter-spacing: 2px;
        }

        h1,
        h2,
        h3 {
            /* font-family: 'Oswald'; */
            color: #fff;

        }

        span {
            color: #4fe;
        }

        h2 {
            /* letter-spacing: -2px; */
            font-weight: 600;
        }

        h3 {
            font-weight: 200;
            color: #333333;
            font-size: 19px;
        }

        .button-- {
            float:right;
            position: relative;
            padding: 0;
        }

        .modal-content {
            position: relative;
            background-color: #fff;
            -webkit-background-clip: padding-box;
            background-clip: padding-box;
            border: 1px solid #999;
            border: 1px solid rgba(0, 0, 0, .2);
            border-radius: 0;
            outline: 0;
            -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, .5);
            box-shadow: 0 3px 9px rgba(0, 0, 0, .5);
        }

        .btn {
            border-radius: 0px !important;
        }

        #myModal--effect-zoomIn.modal.fade .modal-dialog {
            -webkit-transform: scale(0.1);
            -moz-transform: scale(0.1);
            -ms-transform: scale(0.1);
            transform: scale(0.1);
            top: 120px;
            opacity: 0;
            -webkit-transition: all 0.3s;
            -moz-transition: all 0.3s;
            transition: all 0.3s;
        }


        .job-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            padding: 0 74px;
        }

        .job-card {
            border: 1px solid #073d5f;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            background-color: #fffefe;
            transition: transform 0.2s;
        }

        .job-card:hover {
            transform: translateY(-5px);
        }

        .job-card h2 {
            margin-top: 0;
            font-size: 20px;
            color: #333;
        }

        .job-card p {
            margin: 0;
            color: #666;
        }

        .job-card .company {
            font-weight: bold;
        }

        .job-card .location {
            color: #888;
        }

        .job-card .description {
            margin-top: 10px;
        }

        .job-card button {
            margin: 10px 0;
            display: inline-block;
            padding: 8px 16px;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.2s;
        }

        .job-card .apply-btn {
            background-color: #007bff;
        }

        .job-card .apply-btn1 {
            background-color:#073d5f;

        }

        .job-card .apply-btn2 {
            background-color: #073d5f;

        }

        .job-card .apply-btn3 {
            background-color: #073d5f;

        }

        .job-card .apply-btn:hover {
            background-color: #0056b3;
        }
        .job-card button i {
    margin-right: 8px;
  }
  .box-content a{
    color: #0275d8;
  }
  .box-content a:hover{
   text-decoration: underline;
  }
  .plyr {
        height: 10em !important;

    }
    .slick-slide {
width: 0px; /* Set a global width for all slides*/
} 
.owl-theme .owl-controls .owl-nav div {
    background-color: #073D5f;
}
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/plyr/3.7.8/plyr.css"
    integrity="sha512-yexU9hwne3MaLL2PG+YJDhaySS9NWcj6z7MvUDSoMhwNghPgXgcvYgVhfj4FMYpPh1Of7bt8/RK5A0rQ9fPMOw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--modal end-->
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
                                        <h4 class="title">
                                            {{ $details->entity_name }}
                                        </h4>
                                        @if (auth()->check())
                                            <a class="heart2 like_college {{ check_if_like($details->user_id) }}"
                                                college_id="{{ $details->user_id }}">
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
                                        <label  class="review"
                                            style="background-color:rgb(151, 201, 2); padding:2px 4px; border-radius:5px; color:#fff;margin-left:5px;"><b>{{ $rating_count }}</b>
                                        </label>
                                    </div>


                                    <p>{{ $details->address_details }}</p>
                                </div>
                                <div class="info-product" style="margin-top:-6;">

                                    {{-- <button type="button" class="login-btn effect-button mobile1"
                                        mobile_number="{{ $details->r_mob }}">
                                        <i class="fa fa-phone" aria-hidden="true"></i> Show
                                        Number</button> &nbsp; &nbsp; --}}
                                     @if (auth()->check() && auth()->user()->role != '2')
									<button type="button" class="login-btn effect-button send_enquiry_modal"
                                        college_id="{{ $details->user_id }}"> <i class="fa fa-paper-plane"></i> Send
                                        Enquiry</button>&nbsp;
									@endif
                             
									 <button type="button" class="login-btn effect-button start-review"
                                        college_id="{{ $details->user_id }}"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Write A
                                        Review</button>
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



                        <div class=" p1" style="margin-top: 3%;word-wrap: break-word;">


                            <h5 class="title-listing" style="margin-bottom:5px;">About Us</h5>

                            <p >{!! $details->about !!}.</p><br>
                        </div>

                        @if(count(json_decode($details->image))>0)
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
                                            @foreach (json_decode($details->image) as $i)
                                                <div class="client">
                                                    <div class="featured-client">
                                                        <img src="{{ asset('public') . '/' . $i }}" alt="image" style="height:142px; width:270px;">
                                                    </div>

                                                </div>
                                            @endforeach

                                        </div><!-- /.flat-client -->
                                    </div>
                                </div>
                            </div>
                        </section>
                        @endif

                        @if(count(json_decode($details->video))>0)
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
                                            @foreach (json_decode($details->video) as $i)
                                            <div class="listing-item" style="width:110%;">
                                                <article class="geodir-category-listing fl-wrap">
                                                    <div class="geodir-category-img fl-wrap agent_card">

                                                        <video controls crossorigin playsinline poster="{{asset('website_asset/icon/video-play-icon.png')}}" style="height:30vh">
                                                            <source src="{{ asset('public') . '/' . $i }}" type="video/mp4" size="576">
                                                   
                                                               <!-- Caption files -->
                                                               <!-- Fallback for browsers that don't support the <video> element -->
                                                               <a>Video Oynatılamıyor</a>
                                                       </video>
                                                    </div>
                                                </article>
                                            </div>
                                            @endforeach

                                        </div><!-- /.flat-client -->
                                    </div>
                                </div>
                            </div>
                        </section>
                        @endif

                        @if(json_decode($details->facilities)>0)

                        <div class="content-listing">

                            <h5 class="title-listing" style="margin-bottom: 3%;">Facilities</h5>
                            <div class="wrap-list clearfix">
                                <ul class="list float-left">
                                    @if (json_decode($details->facilities))
                                        @foreach (json_decode($details->facilities) as $i)
                                            @if ($loop->index % 2 == 0)
                                                <li><span><i class="fa fa-check"></i></span>{{ $i }}</li>
                                            @endif
                                        @endforeach
                                    @endif

                                </ul>
                                <ul class="list float-left">
                                    @if (json_decode($details->facilities))
                                        @foreach (json_decode($details->facilities) as $i)
                                            @if ($loop->index % 2 == 1)
                                                <li><span><i class="fa fa-check"></i></span>{{ $i }}</li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>

                            </div>
                            @endif

                        @if(json_decode($details->course)>0)
                            <h3 class="title-listing">Courses</h3>
                            <div class="wrap-list clearfix">
                                <ul class="list float-left">
                                    @if (json_decode($details->course))
                                        @foreach (json_decode($details->course) as $i)
                                            @if ($loop->index % 2 == 0)
                                                <li><span><i class="fa fa-check"></i></span>{{ $i }}</li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                                <ul class="list float-left">
                                    @if (json_decode($details->course))
                                        @foreach (json_decode($details->course) as $i)
                                            @if ($loop->index % 2 == 1)
                                                <li><span><i class="fa fa-check"></i></span>{{ $i }}</li>
                                            @endif
                                        @endforeach
                                    @endif

                                </ul>

                            </div>
                            @endif

                    @if(count($past_results)>0)
                            <h3 class="title-listing">Past Results</h3>
                            <div class="wrap-list clearfix">
                                <div class="row">
                                    <div class="col-lg-7" >
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class=" icon-text text-left">
                                                    <div class="box-content">
                                                        <div style="color: #000000;"><b>Year of Result</b></div>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class=" icon-text text-left">
                                                    <div class="box-content">
                                                        <div style="color: #000000;"><b>View Result</b></div>

                                                       
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                @foreach ($past_results as $past_result)
                             
								     <div class="row">
                                    <div class="col-lg-7" >
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class=" icon-text text-left">
                                                    <div class="box-content">
                                                        <p>{{$past_result->start_year}}-{{$past_result->end_year}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class=" icon-text text-left">
                                                    <div class="box-content">

                                                        <div> <a target="_blank" href="{{asset('public/'.$past_result->file)}}">Click here to check the result </a>   </div>
                                                                  

                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                @endforeach
                            </div>
                            @endif




                            <div class="list-comment">
                                <h5 class="title-listing">{{ count($details->college_review) }} Reviews</h5>
                                <div class="comments-area">
                                    <ol class="comment-list">

                                        @foreach ($details->college_review as $review)
                                            <li class="comment">
                                                <article class="comment-body clearfix">
                                                    <div class="comment-author">
                                                        @if(isset( $review->logo) && $review->logo!=null)
                                                            <img style="object-fit: cover;" width="46px" height="46px"
                                                            src="{{ asset('public/' . $review->logo) }}" alt="image">
                                                        @else
                                                            <img src="{{ asset('public/icon/user.png') }}" alt=""
                                                            width="46px" height="46px" style="object-fit: cover;">
                                                        @endif
                                                    </div><!-- .comment-author -->
                                                    <div class="comment-text">
                                                        @php
                                                            $filledStars = floor($review->rating);
                                                        @endphp
                                                        <div class="comment-metadata">
                                                            <h5>{{ $review->name }}</h5>
                                                            <p class="day">
                                                                {{ date('d/m/Y', strtotime($review->created_at)) }}</p>
                                                            <div class="flat-start">
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    @if ($i <= $filledStars)
                                                                        <i class="fas fa-star"></i>
                                                                   
                                                                    @else
                                                                        <i class="far fa-star"></i>
                                                                    @endif
                                                                @endfor
                                                            </div>
                                                        </div><!-- .comment-metadata -->
                                                        <div class="comment-content">
                                                            <p>
                                                                {{ $review->comment }} </p>
                                                        </div><!-- .comment-content -->
                                                    </div><!-- /.comment-text -->
                                                </article><!-- .comment-body -->
                                            </li><!-- #comment-## -->
                                        @endforeach



                                    </ol><!-- .comment-list -->

                                    <div class="comment-respond" id="respond">
                                        <h3 class="title-listing" style="margin-bottom: 10px !important;">Add a Review</h3>
                                        <form novalidate="" class="comment-form clearfix" id="reviewform"
                                            method="post" action="{{ route('insert_feedback') }}">
                                            @csrf
                                            <input type="hidden" name="college_id" value="{{ $details->user_id }}">
                                            <div class="wrap-input clearfix">
                                                <p class="comment-notes">
                                                    <input type="email"
                                                        value="{{ auth()->check() ? auth()->user()->email : '' }}"
                                                        placeholder="Your Email" size="30" value=""
                                                        name="email">
                                                    <span id="feedback_email"></span>

                                                </p>

                                                <p class="comment-form-email">
                                                    <input type="text"
                                                        value="{{ auth()->check() ? auth()->user()->name : '' }}"
                                                        placeholder="Your Name" aria-required="true" name="name">
                                                    <span id="feedback_name"></span>



                                                </p>
                                            </div>
                                            <p class="comment-form-comment">
                                                <textarea class="" tabindex="4" placeholder="write review" name="comment" required></textarea>
                                                <span style="line-height:24px" id="feedback_comment"></span>


                                            </p>
                                            <input type="hidden" name="rating" id="rating" value="0">
                                            <div class="rating-box">
                                                <div class="stars">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                            </div>

                                            <p class="form-submit mt-2">
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
                                <li class="adress">{{ $details->address_details ?? '' }}</li>
                                <li class="phone">
                                    <a href="tel:{{ $details->r_mob }}"">
                                        {{ $details->r_mob ?? '' }}
                                    </a>
                                </li>
                                <li class="email">
                                    <a href="mailto:{{ $details->email }}">
                                        {{ $details->email ?? '' }}
                                    </a>
                                </li><br>

                                @if (auth()->user()->role == '2' && count($jobs) > 0 && auth()->user()->tutordetail->subscription_status=='1' &&  auth()->user()->active=='1')
                                    <div class="wrapper">
                                        <button type="button" class=" login-btn effect-button " data-toggle="modal"
                                            data-target="#jobModal"> <i class="fa fa-eye" aria-hidden="true"></i> 
                                            View Jobs</button>
                                    </div>
                                @endif




                            </ul>


                            <div class="social-links">

                                @if (isset($details->fb) && $details->fb != null)
                                    <a target="_blank" href="{{ $details->fb }}"><i class="fab fa-facebook"></i></a>
                                @endif
                                @if (isset($details->insta) && $details->insta != null)
                                    <a target="_blank" href="{{ $details->insta }}"><i class="fab fa-instagram"></i></a>
                                @endif
                                @if (isset($details->yt) && $details->yt != null)
                                    <a target="_blank" href="{{ $details->yt }}"><i class="fab fa-youtube"></i></a>
                                @endif
                                @if (isset($details->google) && $details->google != null)
                                    <a target="_blank" href="{{ $details->google }}"><i class="fab fa-google"></i></a>
                                @endif
                                @if (isset($details->website) && $details->website != null)
                                    <a target="_blank" href="{{ URL::to($details->website) }}"><i class="fab fa-twitter"></i></a>
                                @endif


                            </div>
                        </div>
                        <br>
                        <span id="city-wise-data">
                            <div class="card">
                                <div class="cover-image-skeleton"></div>
                               
                            </div>
                        {{-- @foreach ($advertisements as $advertisement)
                            <img class="listing_image" src="{{ asset('public/' . $advertisement->image) }}"
                                alt="image">
                            <br>
                            <br>
                        @endforeach --}}
                    </span>


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

    <!-- Modal -->
    <div class="modal fade" id="jobModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">

            <h4 class="modal-title" id="myModalLabel" style="text-align:right;" >View Jobs</h4>
					                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="job-list">
                            @foreach ($jobs as $job)
                                <div class="job-card">
                                    <form action="{{ route('apply-for-job') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="job_vacancy_id" value="{{ $job->id }}">
                                        <input type="hidden" name="college_id" value="{{ $job->college_id }}">
                                        <h2>{{ ucfirst($job->vacancy_type) }}</h2>
                                        <p class="company">{{ $job->college_details->r_name }}</p>

                                        <button type="button" class="apply-btn1"><i
                                                class="fa fa-book"></i>{{ ucfirst($job->subject_name) }}</button>
                                        <button type="button" class="apply-btn2"><i
                                                class="fa fa-suitcase"></i>{{ ucfirst($job->job_type) }}</button>
                                        <button type="button" class="apply-btn3"><i
                                                class="fa fa-calendar"></i>{{ $job->experience_required }}</button>

                                        <br>
                                        @if(check_user_applied_job($job->id))
                                        <label for="" class="text-success">Applied <i class="fa fa-check"></i></label>

                                        @else
                                        <button type="submit" class="apply-btn" >Apply Now</button>

                                        @endif
                                    </form>
                                </div>
                            @endforeach


                        </div>



                    </div>
                </div>
                <!-- <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     <button type="button" class="btn btn-primary">Save changes</button>
                  </div> -->
            </div>
        </div>
    </div>

    <!--modal end-->
@stop

@section('js')
   <script src="https://cdnjs.cloudflare.com/ajax/libs/plyr/3.7.8/plyr.min.js"
        integrity="sha512-vONptKEoKbP1gaC5UkbYDa9OPr04ur4bxaaqT7DAJxGHB2oogtseCPrl5e5hPFokGYotlGNV4d+GM593ka7iNA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click','.plyr__sr-only',function() {
            })
            var videoElements = document.querySelectorAll('.container video');

            // Loop through each video element and initialize Plyr
            videoElements.forEach(function(videoElement) {
                var player = new Plyr(videoElement, {
                    muted: false,
                    volume: 1,
                    controls: ['play-large', 'play', 'progress', 'current-time',  'volume',
                        'fullscreen'
                    ],
                });
            });
        });
        </script>
    <script>
        $(document).ready(function() {

            $(".start-review").click(function() {
                $('html, body').animate({
                    scrollTop: $("#respond").offset().top
                }, 
                {
                    duration: 2000, // Animation duration in milliseconds
                    easing: 'easeOutQuad', // Easing function for the animation
                }
                ); // Adjust the animation duration as needed (in milliseconds)
            });
            const stars = $('.stars i');

            // ---- ---- Stars ---- ---- //
            stars.click(function() {
                const selectedStarIndex = stars.index(this);
                $("#rating").val(parseInt(selectedStarIndex) + 1);
                stars.each(function(index) {
                    // ---- ---- Active Star ---- ---- //
                    if (index <= selectedStarIndex) {
                        $(this).addClass('active');
                    } else {
                        $(this).removeClass('active');
                    }
                });


            });


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


            $("#reviewform").validate({
                rules: {
                    name: {
                        required: true,
                    },

                    email: {
                        required: true,
                        customEmail: true,
                    },
                    comment: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: "This field is required.",
                    },
                    email: {
                        required: "This field is required.",
                        customEmail: "Please enter valid email address.",
                    },
                    comment: {
                        required: "This field is required.",

                    },
                },
                submitHandler: function(form) {
                    return true;
                },
                errorPlacement: function(error, element) {



                    if (element.attr("name") === "name") {
                        error.appendTo($('#feedback_name'));
                    }
                    if (element.attr("name") === "email") {
                        error.appendTo($('#feedback_email'));
                    }
                    if (element.attr("name") === "comment") {
                        error.appendTo($('#feedback_comment'));
                    }

                },
            });
        });
    </script>
@stop
