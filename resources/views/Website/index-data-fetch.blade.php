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
</section>