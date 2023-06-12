@extends('Website.school_profile.layout')
@section('css')
    <style>
        label {
            z-index: 1 !important;
        }
    </style>
@stop
@section('profile_content')
    <div class="dashboard-content">
        <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dashboard Menu</div>
        <div class="container dasboard-container">
            <!-- dashboard-title -->
            <div class="dashboard-title fl-wrap">
                <div class="dashboard-title-item">Update Profile</div>
                @include('Website.school_profile.profile_header')

                <!--Tariff Plan menu-->
                <!-- <div class="tfp-det-container">
                                        <div   class="tfp-btn"><span>Your Tariff Plan : </span> <strong>Extended</strong></div>
                                        <div class="tfp-det">
                                            <p>You Are on <a href="#">Extended</a> . Use link bellow to view details or upgrade. </p>
                                            <a href="#" class="tfp-det-btn color-bg">Details</a>
                                        </div>
                                    </div> -->
                <!--Tariff Plan menu end-->
            </div>
            <!-- dashboard-title end -->
            <!-- dasboard-wrapper-->


            <div class="dasboard-widget-box fl-wrap">
                <div class="col-md-12">
                    <div class="row">
                        <div class="custom-form">
                            <form action="{{ route('school_profile.post_update_profile') }}" 
                            method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="col-md-6">
                                    <label style="font-size:16px;">Upload Logo </label>
                                    <input type="file" name="logo" class="upload" value="{{ $data->logo }}" />
                                    <img height="50px" width="50px" src="{{ asset('public') . '/' . $data->logo }}"
                                        alt="">
                                </div>
                                <div class="col-md-6 ">
                                    <label style="font-size:16px;">Enter Your Name <span class="dec-icon"><i
                                                class="fas fa-user"></i></span></label>
                                    <input type="text" placeholder="Noory" name="name" value="{{ $data->name }}" />
                                </div>
                                <div class="col-md-6">
                                    <label style="font-size:16px;">School Name <span class="dec-icon"><i
                                                class="fas fa-school"></i></span></label>
                                    <input type="text" placeholder="School of Scholar" name="entity_name"
                                        value="{{ $data->entity_name }}" />
                                </div>
                                <div class="col-md-6">
                                    <label style="font-size:16px;">Facilities <span class="dec-icon"><i
                                                class="fas fa-desktop"></i></span></label>
                                    <select id="facilities" name="facilities[]"
                                        class="chosen-select on-radius no-search-select" multiple>


                                        <option>Select Facilities </option>

                                        <option>Classrooms</option>
                                        <option>Digital classroom</option>
                                        <option>Playground & Sports facilities</option>
                                        <option>A/c classroom</option>
                                        <option>Canteen / Cafeterias</option>
                                        <option>Security System (CCTV, Security Guards, Other)</option>
                                        <option>Biometric Attendance Monitoring System</option>
                                        <option>Library</option>
                                        <option>Computer Lab</option>
                                        <option>Laboratories </option>
                                        <option>Garden</option>
                                        <option>Conference rooms</option>
                                        <option>Auditoriums</option>
                                        <option>Transportation</option>
                                        <option>Indoor sports arena</option>
                                        <option>Amphitheatre</option>
                                        <option>Multipurpose Hall.</option>
                                        <option>Counselling Centre</option>
                                        <option>Activity Rooms</option>
                                        <option>Art rooms</option>
                                        <option>Mathematics Laboratory</option>
                                        <option>Health center</option>
                                        <option>Art studios</option>
                                        <option>Music rooms</option>
                                        <option>Administrative offices</option>
                                        <option>Restrooms</option>
                                        <option>Parking lots</option>
                                        <option>Outdoor learning spaces</option>
                                        <option>Career and technical education facilities</option>
                                        <option>Multi-purpose rooms</option>
                                        <option> Daycare facilities</option>
                                        <option>Storage areas</option>
                                        <option>Staff lounges</option>
                                        <option>Conference rooms</option>
                                        <option>Prayer and meditation rooms</option>
                                        <option> Reading corners</option>
                                        <option> Emergency response resources</option>
                                        <option>Innovation centers</option>
                                        <option>Distance learning facilities</option>
                                        <option>Athletic facilities</option>
                                        <option>Parent resource centers</option>
                                        <option>Lecture halls</option>
                                        <option> Dormitories and housing facilities</option>
                                        <option>Student-run enterprises</option>





                                    </select>
                                </div>


                                <div class="col-md-6">
                                    <label style="font-size:16px;">Courses <span class="dec-icon"><i
                                                class="fas fa-truck-couch"></i></span></label>
                                    <select id="course" name="course[]" class="chosen-select on-radius no-search-select"
                                        multiple>

                                        <option>Select Courses </option>
                                        @if ('School' == $data->r_entity)
                                            <option> 1 Nursery </option>
                                            <option> Pre-Primary </option>
                                            <option> Primary </option>
                                            <option>Junior KG
                                            <option> Senior KG </option>
                                            <option>1 st Standard </option>
                                            <option> 2nd Standard </option>
                                            <option> 3rd Standard</option>
                                            <option> 4th Standard </option>
                                            <option> 5th Standard </option>
                                            <option> 6th Standard </option>
                                            <option> 7th Standard </option>
                                            <option> 8th Standard </option>
                                            <option> 9th Standard </option>
                                            <option> 10th Standard</option>
                                        @endif
                                        @if ('College' == $data->r_entity)
                                            <option> 11th </option>
                                            <option> 12th
                                            <option> B.com </option>
                                            <option> M.com </option>
                                            <option> LLB </option>
                                            <option> LLM </option>
                                            <option> BBA </option>
                                            <option> MBA </option>
                                            <option> CA Foundation </option>
                                            <option> CA IPCC </option>
                                            <option> CA Final </option>
                                            <option> CS Foundation </option>
                                            <option> CS Executive </option>
                                            <option> CS Professional </option>
                                            <option> ICWA Foundation </option>
                                            <option> ICWA Inter </option>
                                            <option> ICWA Final </option>
                                            <option> Bachelor in Technology (B.Tech)
                                            </option>
                                            <option> Bachelor in Engineering (BE) </option>
                                            <option> JEE-Main </option>
                                            <option> GATE </option>
                                            <option> UPCET </option>
                                            <option> BITSAT </option>
                                            <option> Bachelor of Science (B. Sc.) </option>
                                            <option> Bachelor of Architecture ( B.Arch.)
                                            </option>
                                            <option> Architecture Designer </option>
                                            <option> Interior Designer </option>
                                            <option> Software Engineer </option>
                                            <option> Research Analyst </option>
                                            <option> MBBS (Bachelor of Medicine and Bachelor
                                                of Surgery) </option>
                                            <option> NEET Entrance exam </option>
                                            <option> BDS (Bachelor of Dental Surgery)
                                            </option>
                                            <option> Botany/Zoology/Chemistry </option>
                                            <option> Biochemistry </option>
                                            <option> BHMS (Bachelor of Homeopathy Medicine
                                                and Surgery) </option>
                                            <option> B. Pharmacy </option>
                                            <option> BPT (Bachelor of Physiotherapy)
                                            </option>
                                            <option> BAMS (Bachelor of Ayurvedic Medicine
                                                Surgery)</option>
                                            <option> BUMS (Bachelor of Unani Medicine and
                                                Surgery) </option>
                                            <option> Bioinformatics </option>
                                            <option> Genetics </option>
                                            <option> Forensic Sciences </option>
                                            <option> Biotechnology </option>
                                            <option> Environmental Science </option>
                                            <option> Nursing </option>
                                            <option> Bachelor in Business Studies </option>
                                            <option> Bachelor of Legislative Law </option>
                                            <option> CLAT </option>
                                            <option> Bachelor of Management Studies
                                            </option>
                                            <option> Certified Financial Planner (CFP)
                                            </option>
                                            <option> Financial Analyst and Advisor </option>
                                            <option> Investment Banking Analyst </option>
                                            <option> Bachelor of Arts (BA) - 3 years
                                            </option>
                                            <option> Master of Arts (MA) </option>
                                            <option> Bachelor of Computer Application (BCA)
                                                - 3 years </option>
                                            <option> Bachelor of Hotel Management (BHM)
                                            </option>
                                            <option> Bachelor of Journalism & Mass
                                                Communication (BJMC) - 3 years</option>
                                            <option> Bachelor of Elementary Education
                                                (B.El.Ed) - 4 years </option>
                                            <option> Bachelor of Fine Arts (BFA) - 3 years
                                            </option>
                                            <option> Fashion Designing - 3 to 4 years
                                            </option>
                                            <option> Diploma in IT </option>
                                        @endif
                                        @if ('Institute' == $data->r_entity)
                                            <option> Yoga </option>
                                            <option> Photography </option>
                                            <option> Acting and Anchoring </option>
                                            <option> Junior Basic Training (JBT) </option>
                                            <option> Travel and Tourism </option>
                                            <option> Event Management </option>
                                            <option> Paramedical Courses </option>
                                            <option> Nursing courses </option>
                                            <option> Web Designing </option>
                                            <option> Digital Marketing</option>
                                            <option> Graphic Design
                                            <option> Tally </option>
                                            <option> Interior Design </option>
                                            <option> Beautician </option>
                                            <option> Hardware and Networking </option>
                                            <option> Photography </option>
                                            <option> Air Hostess </option>
                                            <option> MSCIT </option>
                                            <option> MS-Excel </option>
                                            <option> MS-Word </option>
                                            <option> MS-Powerpoint </option>
                                            <option> Computer Clases </option>
                                            <option> DTP Classes </option>
                                        @endif
                                        <option> Other </option>


                                    </select>
                                </div>
                                {{-- <div class="col-md-6" style="margin-top:2%;">
                                            <label>Tagline<span class="dec-icon"><i class="fas fa-minus-octagon"></i></span></label>
                                            <input type="text" placeholder="Tagline" value="{{$data->}}"/>
                                        </div> --}}

                                <div class="col-md-6">
                                    <label style="font-size:16px;">Facebook Link<span class="dec-icon"><i
                                                class="fas fa-minus-octagon"></i></span></label>
                                    <input type="text" placeholder="Facebook Link" name="fb"
                                        value="{{ $data->fb }}" />
                                </div>


                                <div class="col-md-6">
                                    <label style="font-size:16px;">Twitter Link<span class="dec-icon"><i
                                                class="fas fa-minus-octagon"></i></span></label>
                                    <input type="text" placeholder="Twitter Link" name="website"
                                        value="{{ $data->website }}" />
                                </div>

                                <div class="col-md-6">
                                    <label style="font-size:16px;">Instagram Link<span class="dec-icon"><i
                                                class="fas fa-minus-octagon"></i></span></label>
                                    <input type="text" placeholder="Instagram Link" name="insta"
                                        value="{{ $data->insta }}" />
                                </div>


                                <div class="col-md-6">
                                    <label style="font-size:16px;">YouTube Link<span class="dec-icon"><i
                                                class="fas fa-minus-octagon"></i></span></label>
                                    <input type="text" placeholder="You-tube Link" name="yt"
                                        value="{{ $data->yt }}" />
                                </div>

                                <div class="col-md-6">
                                    <label style="font-size:16px;">Linkedin Link<span class="dec-icon"><i
                                                class="fas fa-minus-octagon"></i></span></label>
                                    <input type="text" placeholder="Linkdin Link" name="google"
                                        value="{{ $data->google }}" />
                                </div>
                                <div class="col-md-12">


                                    <label>About Us </label>
                                    <textarea cols="40" rows="3" placeholder="About Me" style="margin-bottom:20px;" name="about">{{ $data->about }}</textarea>
                                </div>
                                <div class="col-md-6">
                                    <label style="font-size:16px;">Upload School Image</label>
                                    <input type="file" class="upload" multiple name="image[]" accept="image/*" />
                                </div>
                                <div class="col-md-12">

                                    <div class="row">
                                        @foreach (json_decode($data->image) as $i)
                                            <div class="col-md-2">
                                                <a  target="_blank" href="{{ asset('public') . '/' . $i }}">
                                                <img height="100px" width="auto"
                                                    src="{{ asset('public') . '/' . $i }}" alt="">
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label style="font-size:16px;">Upload School Video</label>
                                    <input type="file" class="upload" multiple name="video[]" accept="video/*" />
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        @foreach (json_decode($data->video) as $i)
                                            <div class="col-md-4">


                                                <a target="_blank" href="{{ asset('public') . '/' . $i }}"
                                                    class="geodir-category-img_item">
                                                    <iframe height="115" src="{{ asset('public') . '/' . $i }}"
                                                        alt="" title="YouTube video player" frameborder="0"
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                        allowfullscreen></iframe>
                                            </a>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                                <div class="row">
                                    <button type="submit" class="btn color-bg  float-btn">Save Changes</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@stop
