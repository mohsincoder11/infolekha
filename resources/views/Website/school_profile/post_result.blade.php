@extends('Website.school_profile.layout')
@section('profile_content')
<div class="dashboard-content">
    <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>
    <div class="container dasboard-container">
        <!-- dashboard-title -->
        <div class="dashboard-title fl-wrap">
            <div class="dashboard-title-item">Upload Result</div>
            @include('Website.school_profile.profile_header')


        </div>


        <div class="col-md-12">
            <div class="list-searh-input-wrap-title fl-wrap"></div>
            <div class="block-box fl-wrap search-sb" id="filters-column">
                <div class="row">
                    <div class="col-md-4">

                        <div class="listsearch-input-item">

                            <label>Uload Banner</label>
                            <input type="file" onClick="this.select()" value="" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="listsearch-input-item">
                            <label>For Year</label>
                            <select class="chosen-select on-radius no-search-select" id="ddlYears"></select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="listsearch-input-item">

                            <label>Uload PDF</label>
                            <input type="file" onClick="this.select()" value="" />
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button class="btn color-bg  float-btn"
                            style="padding:5px 30px; margin-top:4vh;">Add</button>
                    </div>

                </div>
                <div class="col-md-12" style="margin-top: 20px;">
                    <hr>
                </div>

                <div class="col-md-12">
                    <div class="row" style="margin-top:20px;">
                        <div class="col-md-4">
                            <div class="widget-posts-img"><img src="images/agency/agent/2.jpg" alt="">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="listsearch-input-item">
                                <label>Academic Year 2022-2023</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="box-widget-content fl-wrap">
                                <div class="bwc_download-list">
                                    <a href="#" download><span><i class="fal fa-file-pdf"></i></span>PDF</a>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button class="btn color-bg  float-btn" style="padding: 5px 25px;"><i
                                    class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" style="margin-top:20px;">
                    <hr>
                </div>
                <div class="col-md-12">
                    <div class="row" style="margin-top:20px;">
                        <div class="col-md-4">
                            <div class="widget-posts-img"><img src="images/agency/agent/3.jpg" alt="">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="listsearch-input-item">
                                <label>Academic Year 2022-2023</label>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="box-widget-content fl-wrap">
                                <div class="bwc_download-list">
                                    <a href="#" download><span><i class="fal fa-file-pdf"></i></span>PDF</a>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <button class="btn color-bg  float-btn" style="padding: 5px 25px;"><i
                                    class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
@stop