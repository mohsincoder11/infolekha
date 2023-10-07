@extends('website_layout')
@section('website_content')



    <div class="slider">
        <div class="slide_viewer">
            <div class="slide_group hh">
                {{-- <div class="slide banner">
                    <a> <img src="{{ asset('website_asset/images/main-banner.png') }}"></a>
                </div> --}}
                @foreach($banner_images as $banner_image)
                <div class="slide banner">
                    <a href="{{$banner_image->link}}"><img
                            src="{{ asset('public/'.$banner_image->banner_image) }}" width=100%></a>
                </div>
                @endforeach
                {{-- <div class="slide banner">
                    <a href="{{ url('student_register_form') }}"><img
                            src="{{ asset('website_asset/images/slides/2.png') }}" width=100%></a>
                </div>
                <div class="slide banner">
                    <a href="{{ url('tutor_register_form') }}"><img src="{{ asset('website_asset/images/slides/4.png') }}"
                            width=100%></a>
                </div> --}}
                <!--<div class="slide banner">
                                        <a href="#"><img src="{{ asset('website_asset/images/slides/4.png') }}" width=100% ></a>
                                    </div>-->
            </div>
        </div>
    </div><!-- End // .slider -->


    <section class="flat-row page-services">
        <div class="container">
            <h3 style="margin-bottom: 3%;" align="center" class="p1">Find a Near You</h3>
            <div class="row">
                <div class="col-md-1"></div>

                <div class="col-lg-2 col-sm-6">
                    <a href="{{ route('college_listing', 'School') }}">
                        <div class="iconbox text-center">
                            <div class="box-header" style="margin-top:5px;">
                                <i class="fa fa-users" aria-hidden="true"></i>
                            </div>
                            <div class="box-content">
                                <div class="box-title"> School
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-2 col-sm-6">
                    <a href="{{ route('college_listing', 'College') }}">
                        <div class="iconbox text-center">
                            <div class="box-header" style="margin-top:5px;">
                                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                            </div>
                            <div class="box-content">
                                <div class="box-title"> College
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <a href="{{ route('college_listing', 'Institute') }}">
                        <div class="iconbox text-center">
                            <div class="box-header" style="margin-top:5px;">
                                <i class="fa fa-university" aria-hidden="true"></i>

                            </div>
                            <div class="box-content">
                                <div class="box-title">Institution/Classes
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-2 col-sm-6">
                    <a href="{{ route('college_listing', 'tutorjob') }}">
                        <div class="iconbox text-center">
                            <div class="box-header" style="margin-top:5px;">
                                <i class="fa fa fa-id-badge" aria-hidden="true"></i>
                            </div>
                            <div class="box-content">
                                <div class="box-title"> Tutor Job
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-2 col-sm-6">
                    <a href="{{ asset('brouchre-pdf.pdf') }}" download>
                        <div class="iconbox text-center">
                            <div class="box-header" style="margin-top:5px;">
                                <i class="fa fa-download" aria-hidden="true"></i>
                            </div>
                            <div class="box-content">
                                <div class="box-title"> Brochure
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <span id="city-wise-data">
        <div class="row" style="padding: 2%">
            <div class="col-md-6">
                <div class="cover-image-skeleton"></div>

            </div>  
            <div class="col-md-6">
                <div class="cover-image-skeleton"></div>

            </div>
            <div class="col-md-12" style="padding-top:2%">
                <div class="cover-image-skeleton"></div>

            </div>
        </div>
        
{{--@if(count($announcements)>0)
 <section class="flat-row section-about1 parallax parallax3">
            <div class="container">

                <div class="row">
                    <div class="col-md-12"style="padding-left:5%; padding-right:5%;">

                        <h3>Announcement</h3><br>

                        <div class="row">
                            <div class="col-md-6"
                                style="padding-top:1px; 
                            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                                <marquee width="100%" direction="up" height="300px" onmouseover="this.stop();"
                                    onmouseout="this.start();" scrollamount="4">
                                    <div class="widget widget_categories">


                                        <ul>
                                            @foreach ($announcements as $announcement)
                                                <li>
                                                    <label class="open_announcement_modal"
                                                        heading="{{ $announcement->heading }}"
                                                        image={{ asset('public/' . $announcement->image) }}
                                                        content="{{ $announcement->main_content }}"
                                                        style="color: black !important;">
                                                        {{ ucfirst($announcement->heading) }}
                                                    </label>
                                                </li>
                                            @endforeach

                                        </ul>



                                    </div>
                                </marquee>

                            </div>

                            <div class="col-md-6" style="padding-left:2%;">
                                @foreach ($advertisements_650 as $advertisement)
                                    <div class="row">
                                        <a>
                                            <img src="{{ asset('public/' . $advertisement->image) }}" alt="image"
                                                style="margin-top: 2%; ">
                                        </a>
                                    </div>
                                @endforeach



                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        @endif

        <section class="flat-row blog-shortcode">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-section text-center">

                            <div class="sub-title">

                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($advertisements_370 as $advertisement2)
                        <div class="col-lg-4 col-sm-6">
                            <article class="post clearfix">
                                <div class="featured-post">
                                    <a href="blog-single.html">
                                        <img src="{{ asset('public/' . $advertisement2->image) }}" alt="image"
                                            style="margin-top: 2%; ">
                                    </a>

                                </div>

                            </article>
                        </div>
                    @endforeach


                </div>
            </div>
        </section> --}}
    </span>

    <div class="modal fade " id="announcement_modal" style="padding-top: 5%;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <h3 align="center" id="announcement_heading"></h3>
                <div class="modal-body clearfix">

                    <div class="row">

                        <div class="col-md-8">
                            <p id="announcement_content" align="justify"></p>

                        </div>
                        <div class="col-md-4">
                          <a href="" target="_blank" download>  <img id="announcement_image" src=""></a> 
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@stop

@section('js')
    <script>
        $(window).load(function() {
            $('#home').hide();
        });
    </script>


    <script>
        $('.slider').each(function() {
            var $this = $(this);
            var $group = $this.find('.slide_group');
            var $slides = $this.find('.slide');
            var bulletArray = [];
            var currentIndex = 0;
            var timeout;

            function move(newIndex) {
                var animateLeft, slideLeft;
                advance();
                if ($group.is(':animated') || currentIndex === newIndex) {
                    return;
                }
                bulletArray[currentIndex].removeClass('active');
                bulletArray[newIndex].addClass('active');
                if (newIndex > currentIndex) {
                    slideLeft = '100%';
                    animateLeft = '-100%';
                } else {
                    slideLeft = '-100%';
                    animateLeft = '100%';
                }
                $slides.eq(newIndex).css({
                    display: 'block',
                    left: slideLeft
                });
                $group.animate({
                    left: animateLeft
                }, function() {
                    $slides.eq(currentIndex).css({
                        display: 'none'
                    });
                    $slides.eq(newIndex).css({
                        left: 0
                    });
                    $group.css({
                        left: 0
                    });
                    currentIndex = newIndex;
                });
            }

            function advance() {
                clearTimeout(timeout);
                timeout = setTimeout(function() {
                    if (currentIndex < ($slides.length - 1)) {
                        move(currentIndex + 1);
                    } else {
                        move(0);
                    }
                }, 4000);
            }
            $('.next_btn').on('click', function() {
                if (currentIndex < ($slides.length - 1)) {
                    move(currentIndex + 1);
                } else {
                    move(0);
                }
            });
            $('.previous_btn').on('click', function() {
                if (currentIndex !== 0) {
                    move(currentIndex - 1);
                } else {
                    move(3);
                }
            });
            $.each($slides, function(index) {
                var $button = $('<a class="slide_btn">&bull;</a>');
                if (index === currentIndex) {
                    $button.addClass('active');
                }
                $button.on('click', function() {
                    move(index);
                }).appendTo('.slide_buttons');
                bulletArray.push($button);
            });
            advance();
        });

        $(document).on('click', '.open_announcement_modal', function() {
            $("#announcement_modal").modal('show');
            $("#announcement_heading").text($(this).attr('heading'));
            $("#announcement_image").attr('src', $(this).attr('image'));
            $("#announcement_image").parent('a').attr('href', $(this).attr('image'));
            $("#announcement_content").html($(this).attr('content'));
        })
    </script>


@stop
