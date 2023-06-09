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

.rating-wrapper input:checked ~ label:before {
  color: #FFC107;
}

.rating-wrapper label:hover ~ label:before {
  color: #ffdb70;
}

.rating-wrapper label:hover:before {
  color: #FFC107;
}
</style>
@stop
@section('website_content')
<section class="main-content page-listing">

    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="listing-wrap">
                    <!-- <div class="tf-gallery">
                        <div id="tf-slider">
                            <ul class="slides">
                                <li>
                                    <img src="images/clg.png" alt="image">
                                </li>
                                <li>
                                    <img src="images/clg.png" alt="image">
                                </li>
                                <li>
                                    <img src="images/clg.png" alt="image">
                                </li>
                                <li>
                                    <img src="images/clg.png" alt="image">
                                </li>
                            </ul>
                        </div>
                        <div id="tf-carousel">
                            <ul class="slides">
                                <li>
                                   <img src="images/services/s4.jpg" alt="image">
                                </li>
                                <li>
                                   <img src="images/services/s3.jpg" alt="image">
                                </li>
                                <li>
                                   <img src="images/services/s2.jpg" alt="image">
                                </li>
                                <li>
                                   <img src="images/services/s1.jpg" alt="image">
                                </li>                              
                            </ul>
                        </div>

                    </div> -->

                    <!-- /.tf-gallery -->
                    <div class="slider">
                        <div class="slide_viewer">
                            <div class="slide_group">
                                @foreach(json_decode($details->image) as $i)
                                <div class="slide">
                                    <img src="{{asset('public').'/'.$i}}" alt="">
                                </div>
                                @endforeach
                               
                            </div>
                        </div>
                    </div><!-- End // .slider -->

                    <div class="slide_buttons">
                    </div>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

                    <!--slider-->
                    <div class="text p1" style="margin-top: 3%;">
                        <h4>Royal English School</h4><br>

                        <h5 class="title-listing">About Us</h5>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                            fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                            culpa qui officia deserunt mollit anim id est laborum.</p><br>
                    </div>

                    <div class="content-listing">

                        <h3 class="title-listing">Faculty</h3>
                        <div class="wrap-list clearfix">
                            <ul class="list float-left">
                                <li><span><i class="fa fa-check"></i></span>Booking online</li>
                                <li><span><i class="fa fa-check"></i></span>Free ship</li>
                            </ul>
                            <ul class="list float-left">
                                <li><span><i class="fa fa-check"></i></span>Booking online</li>
                                <li><span><i class="fa fa-check"></i></span>Booking online</li>
                            </ul>
                        </div>

                        <h3 class="title-listing">Cources</h3>
                        <div class="wrap-list clearfix">
                            <ul class="list float-left">
                                <li><span><i class="fa fa-check"></i></span>Booking online</li>
                                <li><span><i class="fa fa-check"></i></span>Free ship</li>
                            </ul>
                            <ul class="list float-left">
                                <li><span><i class="fa fa-check"></i></span>Booking online</li>
                                <li><span><i class="fa fa-check"></i></span>Booking online</li>
                            </ul>
                        </div>



                        <div class="list-comment">
                            <h3 class="title-listing">2 Reviews</h3>
                            <div class="comments-area">
                                <ol class="comment-list">
                                    <li class="comment">
                                        <article class="comment-body clearfix">
                                            <div class="comment-author">
                                                <img src="images/services/c1.png" alt="image">
                                            </div><!-- .comment-author -->
                                            <div class="comment-text">
                                                <div class="comment-metadata">
                                                    <h5><a href="#">Admin</a></h5>
                                                    <p class="day">12/01/2017</p>
                                                    <div class="flat-start">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                    </div>
                                                </div><!-- .comment-metadata -->
                                                <div class="comment-content">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                        sed do eiusmod tempor incididunt ut labore et dolore
                                                        magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                        exercitation ullamco </p>
                                                </div><!-- .comment-content -->
                                            </div><!-- /.comment-text -->
                                        </article><!-- .comment-body -->
                                    </li><!-- #comment-## -->
                                    <li class="comment">
                                        <article class="comment-body clearfix">
                                            <div class="comment-author">
                                                <img src="images/services/c2.png" alt="image">
                                            </div><!-- .comment-author -->
                                            <div class="comment-text">
                                                <div class="comment-metadata">
                                                    <h5><a href="#">Admin</a></h5>
                                                    <p class="day">12/01/2017</p>
                                                    <div class="flat-start">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                    </div>
                                                </div><!-- .comment-metadata -->
                                                <div class="comment-content">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                        sed do eiusmod tempor incididunt ut labore et dolore
                                                        magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                        exercitation ullamco </p>
                                                </div><!-- .comment-content -->
                                            </div><!-- /.comment-text -->
                                        </article><!-- .comment-body -->
                                    </li><!-- #comment-## -->
                                    <li class="comment">
                                        <article class="comment-body clearfix">
                                            <div class="comment-author">
                                                <img src="images/services/c3.png" alt="image">
                                            </div><!-- .comment-author -->
                                            <div class="comment-text">
                                                <div class="comment-metadata">
                                                    <h5><a href="#">Admin</a></h5>
                                                    <p class="day">12/01/2017</p>
                                                    <div class="flat-start">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                    </div>
                                                </div><!-- .comment-metadata -->
                                                <div class="comment-content">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                        sed do eiusmod tempor incididunt ut labore et dolore
                                                        magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                        exercitation ullamco </p>
                                                </div><!-- .comment-content -->
                                            </div><!-- /.comment-text -->
                                        </article><!-- .comment-body -->
                                    </li><!-- #comment-## -->
                                </ol><!-- .comment-list -->

                                <div class="comment-respond" id="respond">
                                    <h3 class="title-listing">Add a Review</h3>
                                    <form novalidate="" class="comment-form clearfix" id="commentform"
                                        method="post" action="{{route('insert_feedback')}}">
                                        @csrf
                                        <input type="hidden" name="college_id" value="{{$details->user_id}}">
                                        <div class="wrap-input clearfix">
                                            <p class="comment-notes">
                                                <input type="email" value="{{ auth()->check() ? auth()->user()->email : '' }}"  placeholder="Your Email" size="30" value=""
                                                    name="email">
                                            </p>
                                            <p class="comment-form-email">
                                                <input type="text" value="{{ auth()->check() ? auth()->user()->name : '' }}"   placeholder="Your Name" aria-required="true"
                                                    name="name">

                                            </p>
                                        </div>
                                        <p class="comment-form-comment">
                                            <textarea class="" tabindex="4" placeholder="write review" name="comment"
                                                required></textarea>
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
                                            <button type="submit" class="comment-submit effect-button">Send Review</button>
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

                            <span>   <button type="button" class="login-btn effect-button mobile1"
                                mobile_number="{{ $details->r_mob }}">
                                <i class="fa fa-phone" aria-hidden="true"></i> Show
                                Number</button> &nbsp;
                            &nbsp;</a>


                            
                                <button type="button" class="login-btn effect-button send_enquiry_modal"
                                    college_id="{{$details->user_id}}"> <i
                                        class="fa fa-paper-plane"></i> Send
                                    Enquiry</button><br>


                        </ul>



                        <div class="social-links">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
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