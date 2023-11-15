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

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        .active_like {
            color: #004cff !important;
        }

        .fa-thumbs-up,
        .fa-comment,
        .fa-share,
        .grey {
            color: #787878;
        }
    </style>
    <style>
        .share-box2 {
            right: 20px;
            bottom: 0px;
        }

        .share-box2 .btn {
            height: 45px;
            width: 45px;
            position: absolute;
            border-radius: 50%;
            box-shadow: 4px 2px 10px 1px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: #999;
            cursor: pointer;
            position: relative;
            background: #fff;
        }

        .share-box2.btn .fa-share-alt {
            margin-right: 2px;
        }

        .share-box2.btn>i:hover {
            color: rgb(225, 30, 30);
        }

        active:not(:focus-within)>i {
            transform: translate(0.8px, 0.8px);
        }

        .social2 {
            box-shadow: 4px 2px 10px 1px rgba(0, 0, 0, 0.2);
            position: relative;
            top: -50px;
            left: -65px;
            display: none;
            justify-content: space-between;
            background-color: white;
            padding: 2px 2px;
            border-radius: 50px;
            z-index: 9999;

        }

        .toggle input[type="checkbox"]:checked+.btn .social2 {
            animation: fadeIn 1s;
            display: flex;
        }

        .toggle input[type="checkbox"]:not(:checked)+.btn .social2 {
            animation: fadeOut 1s;
        }

        .toggle input[type="checkbox"]:checked+.btn .fa-share-alt {
            display: none;
        }

        .toggle input[type="checkbox"]:not(:checked)+.btn .fa-times {
            display: none;
        }

        .social2 a {
            margin: 0 10px;
            font-size: 25px !important;
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
            color: rgb(1, 49, 193)29, 158);
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

                                            <table style="width: 40%; height: 1%;  border: #073D5F solid 2px;"
                                                class="center">
                                                <tr>
                                                    <td align="center" style="">
                                                        <span style="color: green; margin-top: 10%;"
                                                            class="fa fa-thumbs-up"></span>
                                                        <span>{{ blog_like_count($blog->id) }}</span>
                                                    </td>
                                                    <td align="center" style="margin-top: 10%;">
                                                        <span>{{ blog_comment_count($blog->id) }} Comment</span></td>
                                                    <td align="center" style="margin-top: 10%;">
                                                        <span>{{ blog_share_count($blog->id) }} Shares</span></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="click"
                                                            style="margin-left:26%; margin-top: 10%; margin-bottom: 13%;">

                                                            @if (auth()->check())
                                                                <span
                                                                    class="fa fa-thumbs-up like_blog {{ check_if_blog_like($blog->id) }}"
                                                                    id="{{ $blog->id }}"> </span>
                                                            @else
                                                                <a href="{{ route('check_login_msg', 'like') }}">
                                                                    <span class="fa fa-thumbs-up"> </span>
                                                                </a>
                                                            @endif
                                                            <div class="ring"></div>
                                                            <div class="ring2"></div>
                                                            <p class="info">Like</p>
                                                            <p class="info1" style="margin-top:-25%;">Dislike</p>
                                                        </div>
                                                    </td>
                                                    <td align="center" style="margin-top: 10%;">

                                                        @if (auth()->check())
                                                            <a style="color: #787878;" data-toggle="modal"
                                                                href="#popup_register">
                                                                <p style="grey">
                                                                    <i class="fa fa-comment" aria-hidden="true"></i>
                                                                    Comments
                                                                </p>
                                                            </a>
                                                        @else
                                                            <a href="{{ route('check_login_msg', 'comment') }}"
                                                                class="grey">
                                                                <i class="fa fa-comment" aria-hidden="true"></i> Comments
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <td align="center" style="margin-top: 10%;">
                                                        @if (auth()->check())
                                                            <div class="share-box2">
                                                                <label class="toggle" for="toggle1">
                                                                    <input type="checkbox" id="toggle1" />
                                                                    <div class="btn">
                                                                        <i class="fas fa-share-alt"></i>
                                                                        <i class="fas fa-times"></i>
                                                                        <div class="social2">
                                                                            <a class="whatsapp_icon" 
                                                                                href="whatsapp://send?text=Explore this event {{ route('blog-details', $blog->id) }}" data-id="{{$blog->id}}"
                                                                                data-action="share/whatsapp/share">
                                                                                <i class="fab fa-whatsapp"></i></a>
                                                                            <a class="facebook_icon" 
                                                                                href="https://www.facebook.com/sharer/sharer.php?u={{ route('blog-details', $blog->id) }}" data-id="{{$blog->id}}">
                                                                                <i class="fab fa-facebook"></i>
                                                                            </a>
                                                                            {{-- <a
                                                                  href="https://www.instagram.com/?url={{ route('blog-details', $blog->id) }}">
                                                                  <i class="fab fa-instagram"></i>
                                                                </a>  --}}
                                                                            <a class="copy-link"
                                                                                href="javascript:void(0)""
                                                                                link="{{ route('blog-details', $blog->id) }}" id="{{$blog->id}}">
                                                                                <i class="fas fa-link"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        @else
                                                            <a href="{{ route('check_login_msg', 'share') }}">
                                                                <span class="grey"><i class="fa fa-share"
                                                                        aria-hidden="true"></i> Share</span>

                                                            </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            </table>

                                            <div class="content-inner">
                                                <div class="author-review content-listing">
                                                    <div class="comments-area">
                                                        <ol class="comment-list">
                                                            @foreach ($blog_comments as $blog_comment)
                                                                <li class="comment">
                                                                    <article class="comment-body clearfix">
                                                                        <div class="comment-author">
                                                                            @if(isset($blog_comment->user->logo))
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
                                                                <h2 class="comment-reply-title">Leave a comment</h2>
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
                share_blog_count($(this).attr('id'));
        });

        $(document).on('click','.whatsapp_icon, .facebook_icon',function(){
            share_blog_count($(this).attr('data-id'));

        })

        function share_blog_count(id){
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
                $(this).toggleClass("active_like");
                $.ajax({
                    url: '{{ route('like_unlike_blog') }}',
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "blog_id": $(this).attr('id')
                    },
                    success: function(response) {
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
