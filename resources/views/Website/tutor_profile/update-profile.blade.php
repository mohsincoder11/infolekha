@extends('Website.tutor_profile.layout')
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
                                <form method="post" action="{{route('tutor_profile.post_update_profile')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="custom-form">

                                        <div class="col-md-6">
                                            <label style="font-size:16px;">Name of Tutor </label>
                                            <input name="name" type="text" placeholder="Noory" value="{{$user_data->name}}" />
                                        </div>
                                        <div class="col-md-6">
                                            <label style="font-size:16px;">Subject </label>
                                            <input name="subject" type="text" placeholder="English" value="{{$user_data->tutor_detail->subject}}"  />
                                        </div>
                                        <div class="col-md-6">
                                            <label style="font-size:16px;">Year of Experience </label>
                                            <input name="experiance" type="number" step="0.1" placeholder="" value="{{$user_data->tutor_detail->experiance}}"  />
                                        </div>
                                        <div class="col-md-6">
                                            <label style="font-size:16px;">Mobile </label>
                                            <input name="mob" type="text" placeholder="987655988" value="{{$user_data->mob}}"  />
                                        </div>
                                        <div class="col-md-6">
                                            <label style="font-size:16px;">Email ID </label>
                                            <input name="email" type="text" placeholder="shiv12@gmail.com" value="{{$user_data->email}}"  />
                                        </div>
    
                                        <div class="col-md-6">
                                            <label style="font-size:16px;">Address </label>
                                            <input name="address" id="address" type="text" placeholder="Address" value="{{$user_data->address}}"  />
                                        </div>
                                        <div class="col-md-6">
                                            <label style="font-size:16px;">Pin Code </label>
                                            <input name="pin_code" type="number" placeholder="444604" value="{{$user_data->tutor_detail->pin_code}}"  />
                                        </div>
                                        <div class="col-md-6">
                                            <label style="font-size:16px;">Select Type </label>
                                            <select name="job_type" data-placeholder="Status"
                                                class="chosen-select on-radius no-search-select">
                                                <option @if($user_data->tutor_detail->job_type=='Full Time') selected @endif>Full Time</option>
                                                <option @if($user_data->tutor_detail->job_type=='Part Time') selected @endif>Part Time</option>
                                                <option @if($user_data->tutor_detail->job_type=='Remote') selected @endif>Remote</option>
                                            </select>
                                        </div>
										
										  <div class="col-md-8">
                                            <label style="font-size:16px;">Upload CV</label>
                                            <input type="file" class="upload" name="cv" accept=".pdf,.doc,.docx" />
                                            <a style="color:#3030f0;text-decoration:underline" target="_blank" href="{{asset('public/'.$user_data->tutor_detail->cv)}}">
                                                <b>
                                                Open CV
                                                </b>
                                            </a></div>
                                        <div class="col-md-4">
                                            <label style="font-size:16px;">Upload Logo</label>
                                            <input type="file" class="upload" name="logo" accept="image/*" />
                                        </div> 
                                      
                                        
    
                                        <label style="font-size:16px;">Declaration </label>
                                        <textarea name="declaration" cols="40" rows="3" placeholder=""
                                            style="margin-bottom:20px;  color:#144273;">{{$user_data->tutor_detail->declaration}}</textarea>
                                        <button class="btn    color-bg  float-btn">Save Changes</button>
                                    </div>
                            </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

       @stop

       @section('js')
       <script type="text/javascript"
       src="https://maps.google.com/maps/api/js?countrycode:IN&key=AIzaSyDkFrL3p2KR9iAmFiuhmkszKgMHIon1Y0E&libraries=places">
   </script>
       <script>
        google.maps.event.addDomListener(window, 'load', initialize);
        
        function initialize() {
            /* var input = document.getElementById('address');*/
            var autocomplete = new google.maps.places.Autocomplete(
                (document.getElementById('address')), {
                    types: ['locality']
                });
                autocomplete.setComponentRestrictions({
                 'country': 'in'
             });
            /*var autocomplete = new google.maps.places.Autocomplete(input);*/
        
            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();
        
            });
        }
        </script>
        @stop