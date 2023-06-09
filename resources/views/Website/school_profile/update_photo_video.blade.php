@extends('Website.school_profile.layout')
@section('profile_content')
    <div class="dashboard-content">
        <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>
        <div class="container dasboard-container">
            <!-- dashboard-title -->
            <div class="dashboard-title fl-wrap">
                <div class="dashboard-title-item">Upload Photo/Video </div>
               @include('Website.school_profile.profile_header')
                <!--Tariff Plan menu-->

                <!--Tariff Plan menu end-->
            </div>
            <!-- dashboard-title end -->
            <!-- dasboard-wrapper-->

            <div class="col-md-12">
                <div class="list-searh-input-wrap-title fl-wrap">
                    <div class="block-box fl-wrap search-sb" id="filters-column">
                        <!-- listsearch-input-item -->
                        <div class="col-md-6">
                            <div class="listsearch-input-item">

                                <label>Uload Photo/Video</label>
                                <input type="file" onClick="this.select()" value="" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <button class="btn    color-bg  float-btn">Save </button>
                        </div>

                        <div class="col-md-12" style="margin-top:20px;">
                            <hr>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-4" style="margin-top:16px;">
                                <div class="widget-posts-img"><img src="images/agency/agent/3.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-3">
                                <button class="btn color-bg  float-btn" style="padding: 5px 25px;"><i class="fa fa-trash"
                                        aria-hidden="true"></i> Delete</button>
                            </div>
                        </div>
                    </div>


                </div>


            </div>
        </div>
    </div>
@stop
