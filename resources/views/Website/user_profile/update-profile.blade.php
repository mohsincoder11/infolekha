@extends('Website.user_profile.layout')
@section('profile_content')
            <div class="dashboard-content">
                <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dashboard Menu</div>
                <div class="container dasboard-container">
                    <!-- dashboard-title -->
                    <div class="dashboard-title fl-wrap">
                        <div class="dashboard-title-item">Update Profile</div>
                                                @include('Website.school_profile.profile_header')


                    </div>
                    <!-- dashboard-title end -->
                    <!-- dasboard-wrapper-->

                    <div class="dasboard-widget-box fl-wrap">
                        <div class="col-md-12">
                            <div class="row">
                                <form method="post" action="{{route('user_profile.post_update_profile')}}" enctype="multipart/form-data">
                                    @csrf
                                <div class="custom-form">

                                    <div class="col-md-6">
                                        <label style="font-size:16px;">Name of Student/Parent <span class="dec-icon"><i
                                                    class="fas fa-user"></i></span></label>
                                        <input type="text" placeholder="Name of Student/Parent" name="r_name" value="{{$user_data->r_name}}" />
                                    </div>


                                    <div class="col-md-6">
                                        <label style="font-size:16px;">Mobile <span class="dec-icon"><i
                                                    class="fa fa-phone" aria-hidden="true"></i></span></label>
                                        <input type="text" placeholder="" name="mob" value="{{$user_data->mob}}" />
                                    </div>

                                    <div class="col-md-6">
                                        <label style="font-size:16px;">School <span class="dec-icon"><i
                                                    class="fas fa-school"></i></span></label>
                                        <input type="text" placeholder="" name="r_current_school_institute" value="{{$user_data->r_current_school_institute}}" />
                                    </div>

                                    <div class="col-md-6">
                                        <label style="font-size:16px;">Email ID <span class="dec-icon"><i
                                                    class="fa fa-envelope" aria-hidden="true"></i></span></label>
                                        <input type="text" placeholder="" name="email" value="{{$user_data->email}}" />
                                    </div>

                                    <div class="col-md-6">
                                        <label style="font-size:16px;">Address <span class="dec-icon"> <i
                                                    class="fa fa-map-marker" aria-hidden="true"></i></span></label>
                                        <input type="text" placeholder="" name="address" value="{{$user_data->address}}" />
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <label style="font-size:16px;">Pin Code <span class="dec-icon"> <i
                                                    class="fa fa-location-arrow" aria-hidden="true"></i></span></label>
                                        <input type="text" placeholder="" value="" />
                                    </div> --}}
                                    <div class="col-md-6">
                                        <label style="font-size:16px;">Upload Photo</label>
                                        <input type="file" class="upload" name="logo" accept="image/*" />
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" class="btn color-bg float-btn">Save Changes</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

       @stop