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

        .success {
            color: green;
        }

        .info {
            color: dodgerblue;
        }

        .warning {
            color: orange;
        }

        .danger {
            color: red;
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
            min-width: 160px;
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

        @media only screen and (max-width: 768px) {
            .pp {
                margin-left: 2%;
            }
        }

        .row {
            padding-left: 10px;
            padding-right: 5px !important;
        }

        .container div {
            word-wrap: break-word !important;
        }

        .center {
            margin-left: auto;
            margin-right: auto;
        }
    </style>

    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td1,
        th1 {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr1:nth-child(even) {
            background-color: #dddddd;
        }

        .active_like {
            color: #3b6efa !important;
        }

        .fa-thumbs-up,
        .fa-comment,
        .fa-share,
        .fa-share-alt,
        .grey {
            color: #787878;
        }
    </style>
    <style>
        .icon {
      display: flex;
      align-items: center;
      position: relative;
    }

    .icon i {
      margin-right: 5px;
    }

    .share-options {
      display: none;
      flex-direction: row; /* Display options in a row */
      position: absolute;
      background-color: #fff;
      border: 1px solid #e1e1e1;
      border-radius: 5px;
      padding: 10px;
      z-index: 1;
      top: 100%; /* Position options below the share icon */
      left: 50%; /* Align options to the horizontal center of the share icon */
      transform: translateX(-50%); /* Adjust for horizontal centering */
    }

    .share-option {
      margin-right: 10px;
      cursor: pointer;
    }

        .fa-link {
            color: rgb(149, 149, 149);

        }

        .fa-link:hover {
            color: rgb(0, 0, 0);

        }

        .whatsapp_icon {
            color: #009e00;
        }

        .facebook_icon {
            color: #0131c1;
        }


        input[type="checkbox"] {
            display: none;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }

            to {
                opacity: 0;
            }
        }

        .fa-times:before {
            margin-left: 135px;
        }


        @media (max-width: 768px) {
            t1 {
                width: 100%;
            }

            t2 {
                margin-left: 20%;
            }
        }


        .blog-footer {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ffffff;
            padding: 10px;
        }

        .icon {
            margin: 0 35px;
            /* Add space between icons */
            color: #333;
            font-size: 20px;
            cursor: pointer;
        }

        @media (max-width: 600px) {
          

            .icon {
                margin: 10px 20px;
                /* Add space between icons in mobile view */
            }
        }
    </style>
@stop
@section('website_content')


    <section class="main-content page-listing-grid">
        <div>
            <img src="https://via.placeholder.com/1920x400">
        </div>
        <div class="container">

            <div class="row">


                <div class="col-lg-12" style="padding-left: 3%; padding-right: 3%;">
                    <section class="main-content">
                        <div class="container">
                            <div class="row">
                                <!-- <div class="col-lg-1"></div> -->


                                <div class="col-lg-12"
                                    style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding-bottom:4%; margin-top:2%; ">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="title-section text-center" style="margin-top:2%; ">
                                                <h4 style="color: #073D5F; font-style: sans-serif;">{{ $blog->subject }}
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="col-md-4" style=" color: #000; margin-bottom: 2%; font-weight:900px; ">
                                            <p><span style="color:#073D5F;">Published Date : </span><span
                                                    style="color: #787878;">{{ date('d-m-Y', strtotime($blog->created_at)) }}
                                                </span></p>

                                        </div>
                                        <div class="col-md-4" style=" color: #000; margin-bottom:2%;">
                                            <p><span style="color:#073D5F;">Author : {{ $blog->author_name }}</span></p>

                                        </div>

                                        <div class="col-md-4" style=" color: #000; margin-bottom:2%;">
                                            <p><span style="color:#073D5F;">Category : {{ $blog->category }}</span></p>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="col-md-12" align="center">
                                                <div class="widget widget_categories">
                                                    <img src="{{ asset('public/' . $blog->blog_image) }}">
                                                </div>
                                            </div>


                                            <div class="para1">
                                                {!! html_entity_decode($blog->content1) !!}
                                            </div>


                                            <br>

                                            <div class="col-md-12" align="center">
                                                <img src="{{ asset('images/google-display.png') }}">
                                            </div>

                                            <div class="row">
                                                {!! html_entity_decode($blog->content2) !!}
                                            </div>


                                            <br>

                                            <div class="col-md-12" align="center">
                                                <img src="{{ asset('images/add1.jpg') }}">
                                            </div>

                                            <div class="row">
                                                {!! html_entity_decode($blog->content3) !!}
                                            </div>


                                            <br>

                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-5">
                                                    <img src="{{ asset('images/image5.gif') }}"
                                                        style="height:250px; width:300px;">
                                                </div>
                                                <div class="col-md-5">
                                                    <img src="{{ asset('images/images7.gif') }}"
                                                        style="height:250px; width:300px;">

                                                </div>
                                            </div>

                                            <div class="row">
                                                {!! html_entity_decode($blog->content4) !!}
                                            </div>
                                            <hr style="color: #073D5F;">



                                            <div class="blog-footer">
                                                @if (auth()->check())
                                                    <div class="icon">
                                                        <i class="fas fa-thumbs-up like_blog {{ check_if_blog_like($blog->id) }}"  id="{{ $blog->id }}"></i>
                                                        <!-- Like icon -->
                                                        <span>{{ blog_like_count($blog->id) }}</span> <!-- Like count -->
                                                    </div>
                                                    <div class="icon">
                                                        <a  data-toggle="modal"
                                                        href="#popup_register">
                                                        <i class="fas fa-comment"></i></a> <!-- Comment icon -->
                                                        <span>{{ blog_comment_count($blog->id) }}</span>
                                                        
                                                        <!-- Comment count -->
                                                    </div>
                                                    <div class="icon toggleShareOptions">
                                                        <i class="fas fa-share"></i> <!-- Share icon -->
                                                        <span id="shareCount">{{ blog_share_count($blog->id) }}</span>
                                                        <div class="share-options" id="shareOptions">
                                                            <div class="share-option" >
                                                                <a href="whatsapp://send?text=Explore this event {{ route('blog-details', $blog->id) }}"
                                                                    
                                                                    data-action="share/whatsapp/share" >
                                                                <i class="fab fa-whatsapp whatsapp_icon" data-id="{{ $blog->id }}"></i> 
                                                            </a>
                                                            </div>
                                                            <div class="share-option" onclick="shareOnFacebook()">
                                                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('blog-details', $blog->id) }}"
                                                                    >
                                                                <i class="fab fa-facebook facebook_icon" data-id="{{ $blog->id }}"></i> 
                                                            </a>
                                                            </div>
                                                            <div class="share-option copy-link" link="{{ route('blog-details', $blog->id) }}"
                                                                id="{{ $blog->id }}">
                                                                <i class="fas fa-link"></i> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="icon">
                                                        <a href="{{ route('check_login_msg', 'like') }}"><i class="fas fa-thumbs-up"></i></a> <!-- Like icon -->
                                                        <span>{{ blog_like_count($blog->id) }}</span> <!-- Like count -->
                                                    </div>
                                                    <div class="icon">
                                                        <a href="{{ route('check_login_msg', 'comment') }}"><i class="fas fa-comment"></i></a> <!-- Comment icon -->
                                                        <span>{{ blog_comment_count($blog->id) }}</span>
                                                        <!-- Comment count -->
                                                    </div>
                                                    <div class="icon">
                                                        <a href="{{ route('check_login_msg', 'share') }}"><i class="fas fa-share-alt"></i></a> <!-- Share icon -->
                                                        <span>{{ blog_share_count($blog->id) }}</span> <!-- Share count -->
                                                    </div>
                                                @endif
                                            </div>
                                            <hr>
                                            <div class="content-inner">
                                                <div class="author-review content-listing">
                                                    <div class="comments-area">
                                                        <ol class="comment-list">
                                                            @foreach ($blog_comments as $blog_comment)
                                                                <li class="comment">
                                                                    <article class="comment-body clearfix">
                                                                        <div class="comment-author">
                                                                            @if (isset($blog_comment->user->logo))
                                                                                <img src="{{ asset('public/' . $blog_comment->user->logo) }}"
                                                                                    alt="image" height="50"
                                                                                    width="50">
                                                                            @else
                                                                                <img src="{{ asset('public/logo/user.png') }}"
                                                                                    alt="image" height="50"
                                                                                    width="50">
                                                                            @endif
                                                                        </div><!-- .comment-author -->
                                                                        <div class="comment-text">
                                                                            <div class="comment-metadata">
                                                                                <h5><a href="#">{{ $blog_comment->user->name }}
                                                                                    </a></h5>
                                                                                <p class="day">
                                                                                    {{ $blog_comment->created_at->format('d/m/Y') }}
                                                                                </p>

                                                                            </div><!-- .comment-metadata -->
                                                                            <div class="comment-content">
                                                                                <p>{{ $blog_comment->comment }} </p>
                                                                            </div><!-- .comment-content -->
                                                                        </div><!-- /.comment-text -->
                                                                    </article><!-- .comment-body -->
                                                                </li><!-- #comment-## -->
                                                            @endforeach

                                                        </ol><!-- .comment-list -->
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade " id="popup_register">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-hidden="true">&times;</button>
                                                        </div>
                                                        <div class="modal-body text-center clearfix">
                                                            <div class="comment-respond" id="respond">
                                                                <h2 class=""
                                                                    style="position: relative; font-size: 19px; font-weight: 700; color: #424242;">
                                                                    Leave a comment</h2>
                                                                <form novalidate="" class="clearfix" id="commentform"
                                                                    method="post" action="{{ route('blog_comment') }}">
                                                                    @csrf
                                                                    <input type="hidden" value="{{ $blog->id }}"
                                                                        name="blog_id">
                                                                    <p class="comment-form-comment">
                                                                        <textarea type="text" placeholder="Message" name="comment" required="required" rows="4" cols="50"></textarea>
                                                                    </p>
                                                                    <p class="form-submit" align="center">
                                                                        <button type="submit"
                                                                            class="comment-submit effect-button">Send
                                                                        </button>
                                                                    </p>
                                                                </form>
                                                            </div><!-- /.comment-respond -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                        </div><!-- /.col-lg-9 -->

                                    </div><!-- /.row -->
                                </div><!-- /.container -->
                    </section>

                </div><!-- /.col-lg-9 -->


            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>

@stop

@section('js')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.toggleShareOptions', function() {
                var shareOptions = document.getElementById("shareOptions");
                shareOptions.style.display = (shareOptions.style.display === "none" || shareOptions.style
                    .display === "") ? "flex" : "none";
            }) 
            
        $('.copy-link').on('click', function() {
            var link = $(this).attr('link');
            var tempInput = document.createElement("input");
            tempInput.value = link;
            document.body.appendChild(tempInput);
            tempInput.select();
            document.execCommand("copy");
            document.body.removeChild(tempInput);
            Toast.fire({
                icon: 'success',
                title: 'Link copied succefully.'
            })
            var currentCount = parseInt($("#shareCount").text());
            $("#shareCount").text(currentCount + 1);
            share_blog_count($(this).attr('id'));
        });

        $(document).on('click', '.whatsapp_icon, .facebook_icon', function() {
            var currentCount = parseInt($("#shareCount").text());
            $("#shareCount").text(currentCount + 1);

            share_blog_count($(this).attr('data-id'));

        })

        function share_blog_count(id) {
            $.ajax({
                url: '{{ route('blog_share') }}',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "blog_id": id
                },
                success: function(response) {

                },
                error: function(xhr, status, error) {
                    console.log('Error sending like request:', error);
                }
            })


        }

        $(".like_blog").on("click", function() {
            var likeCountSpan = $(this).next('span');
            var currentCount = parseInt(likeCountSpan.text());
            console.error(currentCount);
            $(this).toggleClass("active_like");
            $.ajax({
                url: '{{ route('like_unlike_blog') }}',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "blog_id": $(this).attr('id')
                },
                success: function(response) {
                    likeCountSpan.text(parseInt(currentCount) + parseInt(response.count));

                    Toast.fire({
                        icon: 'success',
                        title: response.message
                    })

                },
                error: function(xhr, status, error) {
                    console.log('Error sending like request:', error);
                }
            });
        })
        })
    </script>
@stop
