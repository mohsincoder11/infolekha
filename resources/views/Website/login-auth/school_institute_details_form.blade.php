@extends('website_layout')
@section('website_content')
<style>
	  @media (max-width: 768px) {
       .wt {
            width:90% !important;
           
        }

        
    }
</style>

@if ($errors->any())
<div class="alert alert-danger">
    There were some errors with your request.
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<!-- Page title -->
<div class="page-title parallax parallax1">
    <div class="section-overlay">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading">
                    <h3 class="title" style="color:white;">Welcome1</h3><br>
                    <h1 class="title">{{$data->r_name}}</h1>
                </div><!-- /.page-title-captions -->
                <div class="breadcrumbs">
                    <ul>
                        <!-- <li><a href="index.html">Home</a></li>
                                <li> - </li>
                                <li><a href="index.html">Page</a></li>
                                <li> - </li>-->

                    </ul>
                </div><!-- /.breadcrumbs -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.page-title -->

<section class="flat-row page-profile bg-theme">
    <div class="container">
        <div class="row">
            <div class="col-lg-1">

            </div>
            <div class="col-lg-10">
                <div class="flat-tabs style2" data-effect="fadeIn">
                    <ul class="menu-tab clearfix">
                        <!-- <li class="active"><a href="#"><i class="ion-navicon-round"></i>(3) Listings</a></li> -->
                        <!-- <li class=""><a href="#"><i class="ion-chatbubbles"></i> Reviews</a></li> -->
                    </ul>

                    <div class="content-tab listing-user profile">
                        <div class="content-inner ">
                            <div class="basic-info">
                                <h5>{{$data->r_entity}}</h5>

                                <form method="post" action="{{url('school_institute_detail_create')}}"
                                    class="form-profile" enctype="multipart/form-data" id="form2">
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-8">

                                            <div>

                                                <div class="row">
                                                    <div class="col-lg-6">

                                                        <div class="form-group">
                                                            <label class="form-control-label">Name of
                                                                {{$data->r_entity}}</label>
                                                            <input type="text" class="form-control" placeholder="Name"
                                                                value="{{$data->r_name}}" name="school_institute"
                                                                required="required">
                                                            <!--name="school_institute" -->

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label">City Name*</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Enter city name" name="address" required="required"
                                                                value="{{$data->address}}" readonly>

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label class="form-control-label">About
                                                                School/College/Institution <span id="charcount">0 out of
                                                                    500 characters</span></label><br>
                                                            <span id=charcount></span>
                                                            <textarea minlength="20" maxlength="500" name="about"
                                                                id="about"
                                                                onkeyup="charcountupdate(this.value)"></textarea>


                                                        </div>
                                                    </div>



                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label">Pin Code*</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Enter your Pin code" name="pin_code"
                                                                required="required">

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label">Operating Since
                                                            </label>
                                                            <select id="ddlYears" name="oprating_since">
                                                                <option value="">Select Year</option>

                                                                @for($i=date('Y');$i>=1950;$i--)
                                                                <option value="{{$i}}">{{$i}}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div>



                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label">Registration
                                                                No</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Registration No" name="registration_no">

                                                        </div>
                                                    </div>


                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label">Contact No</label>
                                                            <input type="text" readonly class="form-control"
                                                                placeholder="Contact No" name="mob"
                                                                value="{{$data->r_mob}}" required="required">

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label">Email ID*</label>
                                                            <input readonly type="text" class="form-control"
                                                                placeholder="Email ID" value="{{$data->email}}"
                                                                name="email" required="required">

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label">Website</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Website-URL" name="website">

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label">Facebook </label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Facebook-URL " name="fb">

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label">Instagram</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Instagram-URL " name="insta">

                                                        </div>
                                                    </div>


                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label">LinkedIn URL</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="LinkedIn URL" name="google">

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label">Youtube</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Youtube-URL " name="yt">

                                                        </div>
                                                    </div>


                                                    @if($data->r_entity =='School')
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Select School*</label>
                                                            <select class="form-select select country-select"
                                                                name="school" id="school_entity">
                                                                <option>Select</option>
                                                                @foreach ($school_type as $school_type )
                                                                <option value="{{$school_type->type}}">
                                                                    {{$school_type->type}}</option>
                                                                @endforeach

                                                                <option value="Other">Other (Please Specify)</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6" id="school_entity_other_div">
                                                        <div class="form-group">
                                                            <label class="form-label">Specify Other Board</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                name="school_other">
                                                        </div>
                                                    </div>
                                                    @endif

                                                    @if($data->r_entity=='College')
                                                    @php
                                                    $streams=get_college_stream();
                                                    @endphp
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Select College Stream*</label>
                                                            <select class="form-select select country-select"
                                                                name="college">
                                                                <option>Select </option>
                                                                @foreach($streams as $stream)
                                                                <option>{{$stream}}</option>

                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>
                                                    @endif


                                                    @if($data->r_entity=='Institute')
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Select Institute*</label>
                                                            <select class="form-select select country-select"
                                                                name="institute" required="required">
                                                                <option>Select </option>
                                                                <option>Professional (please specify your
                                                                    professional field)</option>
                                                                <option>Competitive courses</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    @endif




                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label"> course*</label>
                                                            <!-- <select class="form-select select country-select"
                                                                        name="course"  required="required">-->

                                                            <select id="course" name="course[]"
                                                                class="form-select select country-select" multiple>
                                                                @if('School'== $data->r_entity)
                                                                @foreach(get_school_course() as $course)
                                                                <option>{{$course}}</option>
                                                                @endforeach

                                                                @endif
                                                                @if('College'== $data->r_entity)
                                                                @foreach(get_college_course() as $course)
                                                                <option>{{$course}}</option>
                                                                @endforeach
                                                                @endif
                                                                @if('Institute'== $data->r_entity)
                                                                @foreach(get_institute_course() as $course)
                                                                <option>{{$course}}</option>
                                                                @endforeach
                                                                @endif
                                                                <option> Other </option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    {{--
                                                    <div class="col-lg-6" id="other_course_div">
                                                        <div class="form-group">
                                                            <label class="form-label"> Other Course*</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Specify other course" name="course[]">

                                                        </div>
                                                    </div> --}}

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label"> Office
                                                                Timings (From)</label>

                                                            <input name="opening_time" type="text" id="timepicker" class="from-control" autocomplete="off">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label">Office
                                                                Timings (To)</label>
                                                            <input type="text" id="timepicker2" name="closing_time" 
                                                                class="timepicker-12-hr" autocomplete="off">

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label"> Facilities*</label>
                                                            <!--<select class="form-select select country-select"
                                                                    name="facilities"  required="required">-->
                                                            <select id="facilities" name="facilities[]"
                                                                class="form-select select country-select" multiple>

                                                                @foreach (get_facilities() as $facility )
                                                                <option>{{$facility}}</option>
                                                                @endforeach

                                                                <option> Other </option>


                                                            </select>
                                                        </div>
                                                    </div>

                                                    {{-- <div class="col-lg-6" id="other_facilities_div">
                                                        <div class="form-group">
                                                            <label class="form-label"> Other Facilities*</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Specify other facilities"
                                                                name="facilities[]">

                                                        </div>
                                                    </div> --}}


                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label">Upload Photos of
                                                                School (Max. 5 )</label>
                                                            <input type="file" class="form-control" name="image[]"
                                                                multiple accept="image/*">

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label">Upload Video of
                                                                School (Max. 2)</label>
                                                            <input type="file" class="form-control" name="video[]"
                                                                multiple accept="video/*">

                                                        </div>
                                                    </div>





                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <div class="row policy_checkbox_class"
                                                                style="margin-left: 1%;">
                                                                <input class="form-control-lable" type="checkbox"
                                                                    name="policy_checkbox" id="checkbox"
                                                                    style="margin-right: 1%;">
                                                                    <label for="checkbox">I have read and accepted the
                                                                    </label> <label><spam style="color:#073D5F;cursor: pointer;"
                                                                            onclick="openPopup1()"> Terms & Condition
                                                                        </spam></label>

                                                            </div>

                                                            <div id="popup1" class="popup1"
                                                                style="overflow-y: scroll !important;">

                                                                <div
                                                                    style="width: 100%; text-align: right; position: sticky; top: 0;">
                                                                    <a class="close-btn1" onclick="closePopup1()"><i
                                                                            class="fas fa-times"></i></a>
                                                                </div>

                                                                <br>
                                                                <!-- Popup1 content goes here -->
                                                                <p>
                                                                <p>
                                                                <h4> <b>TERMS & CONDITION</b></h4>
                                                                <p style="margin-top:10px;color:#000;">As a authorised
                                                                    representative of above mentioned educational
                                                                    institution I hereby declare and accept following
                                                                    terms and conditions</p>
                                                                </p>
                                                                <p><b> 1.</b> By signing up for a listing on
                                                                    INFOlekha.org, we confirm that we are a legitimate
                                                                    educational institution, and that all information
                                                                    provided to INFOlekha.org is accurate and
                                                                    up-to-date. We understand that INFOlekha.org has the
                                                                    right to verify the information provided and may
                                                                    remove our listing if any information is found to be
                                                                    false or misleading.</p><br>

                                                                <p><b>2.</b> We acknowledge that by listing on
                                                                    INFOlekha.org, we agree to provide timely and
                                                                    accurate updates to any changes in our institution's
                                                                    information, including contact details, programs
                                                                    offered, admission requirements, and any other
                                                                    relevant information.</p><br>

                                                                <p><b> 3. </b>We understand that INFOlekha.org is not
                                                                    responsible for any decisions made by students or
                                                                    parents based on our institution's information
                                                                    listed on the website. We also agree that
                                                                    INFOlekha.org is not responsible for any disputes
                                                                    that may arise between us and any students, parents,
                                                                    or other parties.</p><br>

                                                                <p><b>4.</b> We acknowledge that INFOlekha.org may use
                                                                    our institution's information, including logo and
                                                                    images, for promotional purposes on the website and
                                                                    in other marketing materials.</p><br>

                                                                <p><b>5.
                                                                    </b> We agree to indemnify and hold harmless
                                                                    INFOlekha.org, its affiliates, and its directors,
                                                                    officers, employees, and agents from and against any
                                                                    claims, damages, liabilities, costs, and expenses
                                                                    arising from our institution's listing on the
                                                                    website, including any inaccuracies or omissions in
                                                                    our institution's information, and any disputes or
                                                                    other issues that may arise between us and any
                                                                    students, parents, or other parties.</p><br>

                                                                <p><b> 6.</b> We acknowledge that INFOlekha.org may use
                                                                    third-party vendors or service providers to assist
                                                                    in the provision of the website and its services. We
                                                                    understand that these vendors or service providers
                                                                    may have access to our institution's data for the
                                                                    purpose of providing their services to
                                                                    INFOlekha.org. We agree that INFOlekha.org is not
                                                                    responsible for the actions or omissions of any
                                                                    third-party vendors or service providers.</p><br>

                                                                <p><b> 7.</b> We also acknowledge that we are
                                                                    responsible for ensuring the security of our
                                                                    institution's login credentials for the website. We
                                                                    agree to notify INFOlekha.org immediately if we
                                                                    suspect any unauthorized use of our login
                                                                    credentials.</p><br>

                                                                <p><b> 8.</b> We understand that INFOlekha.org may
                                                                    terminate our institution's listing on the website
                                                                    at any time, with or without cause. We also
                                                                    understand that we may terminate our institution's
                                                                    listing on the website at any time, but that any
                                                                    fees paid to INFOlekha.org are non-refundable.</p>
                                                                <br>

                                                                <p><b> 9.</b> This declaration constitutes the entire
                                                                    agreement between our institution and INFOlekha.org
                                                                    and supersedes all prior or contemporaneous
                                                                    agreements or understandings, whether written or
                                                                    oral. Any modifications to this declaration must be
                                                                    made in writing and signed by both parties.<br>

                                                                <p><b> 10.</b> We have the authority to enter into this
                                                                    declaration on behalf of our institution and have
                                                                    read and understand its terms and conditions.</p>
                                                                <br>

                                                                <p><b> 11.</b> This declaration shall be governed by and
                                                                    construed in accordance with the laws of India,
                                                                    without giving effect to any principles of conflicts
                                                                    of law.</p><br>

                                                                <p><b> 12.</b> Furthermore, we have read and understood
                                                                    the terms and conditions of INFOlekha.org and agree
                                                                    to abide by them. We also acknowledge that
                                                                    INFOlekha.org may update the terms and conditions
                                                                    from time to time, and it is our responsibility to
                                                                    review them regularly.</p><br>

                                                                <p><b>13.</b> By signing up for a listing on
                                                                    INFOlekha.org, we acknowledge that we have read and
                                                                    understood this declaration and agree to be bound by
                                                                    its terms and conditions.<br>

                                                                </p>


                                                            </div>


                                                         

                                                        </div>
                                                    </div>


                                                    <div class="update-profile centered-container"
                                                        style=" margin-top: 5%;margin-left:2%">



                                                        <button type="submit" class="btn btn-primary"> <i
                                                                class="fa fa-hand-o-right" aria-hidden="true"></i>
                                                            Submit</button>
                                                    </div>
                                                </div>
                                                <div id="popup" class="popup">
                                                    <a class="close-btn" onclick="closePopup()"></a>
                                                    <!-- Popup content goes here -->

                                                </div>

                                                <!--modal-->

                                                <!---modal-2-->

                                </form>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="upload-img">
                                <label>
									<span style="font-size:14px;">(Size 200x200px)</span>
                                    <input id="image1" type="file" name="logo" style="display:none;">
                                    <img id="category-img-tag" src="{{asset('website_asset/images/223.jpg')}}"
                                        class="dropzone">
                                </label>


                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>
    </div>
    </div>

</section>

<div id="popup2" class="popup2 wt"
style="overflow-y: scroll !important;width: 40vw;">

<div
    style="width: 100%; text-align: right; position: sticky; top: 0;">
    <a class="close-btn1" onclick="closePopup2()"><i
            class="fas fa-times"></i></a>
</div>

<div class="row ht">
    <div class="col-lg-1"></div>
    <div class="col-lg-8">
        <div class="form-group">
            <label class="form-control-label">Other
                Course</label>
            <input type="text" class="form-control"
                placeholder="Enter Other Course"
                id="other_course_modal_input">
            <!--name="school_institute" -->

        </div>
    </div>
    <div class="col-lg-3" style="padding-top: 2.5rem">
        <button type="button" class="btn btn-primary"><i
                class="fa fa-plus-square"></i></button>
    </div>

</div>
<span class="other_course_container">

</span>
<div class="row centered-container mt-2">
    <button type="button"
        class="btn btn-primary popup2-submit-btn">Submit</button>
</div>

</div>

<div id="popup3" class="popup2 wt"
style="overflow-y: scroll !important;width: 40vw!important;">

<div
    style="width: 100%; text-align: right; position: sticky; top: 0;">
    <a class="close-btn1" onclick="closePopup3()"><i
            class="fas fa-times"></i></a>
</div>

<div class="row wt">
    <div class="col-lg-1"></div>
    <div class="col-lg-8">
        <div class="form-group">
            <label class="form-control-label">Other
                Facilities</label>
            <input type="text" class="form-control"
                placeholder="Enter Other Facilities"
                id="other_facilities_modal_input">
            <!--name="school_institute" -->

        </div>
    </div>
    <div class="col-lg-3" style="padding-top: 2.5rem">
        <button type="button" class="btn btn-primary"><i
                class="fa fa-plus-square"></i></button>
    </div>

</div>
<span class="other_facilities_container">

</span>
<div class="row centered-container mt-2">
    <button type="button"
        class="btn btn-primary popup3-submit-btn">Submit</button>
</div>

</div>







@stop
@section("js")
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
<script>
    function charcountupdate(str) {
	var lng = str.length;
	document.getElementById("charcount").innerHTML = lng + ' out of 500 characters';
}

$("#popup2 button").on('click', function(e) {
    if($("#other_course_modal_input").val()){
        console.log($("#other_course_modal_input").val());
    var newRow = $('<div class="row other_course_row">' +
        '<div class="col-lg-1"></div>' +
        '<div class="col-lg-8">' +
        '<div class="form-group">' +
        '<label class="form-control-label">Course</label>' +
        '<input name="other_course[]" type="text" class="form-control" value="'+$("#other_course_modal_input").val()+'">' +
        '</div>' +
        '</div>' +
        '<div class="col-lg-3" style="padding-top: 2.5rem">' +
        '<button type="button" class="btn btn-danger delete-row"><i class="fa fa-trash"></i></button>' +
        '</div>' +
        '</div>');
    $("#other_course_modal_input").val('');

    $(".other_course_container").append(newRow);
    $("#other_course_modal_input").focus();
    }

});

$(".other_course_container").on('click', '.delete-row', function(e) {
    $(this).closest('.other_course_row').remove();
});

$(".popup2-submit-btn").on('click', function(e) {
    var inputFields = $("input[name='other_course[]']");
    var values = [];
    inputFields.each(function() {
        values.push($(this).val());
    });

    var $select2 = $('#course');
    $select2.select2('destroy');

    values.forEach(function(value) {
        $select2.append('<option selected>' + value + '</option>');
    });
    $select2.select2();

    $select2.trigger('change');
    
    closePopup2();
});

 $('#course').on('change', function() {  
    const selectedOptions = $(this).val(); 
    if(selectedOptions){
const otherOption = selectedOptions.includes('Other'); 
if(otherOption){
     var index = selectedOptions.indexOf('Other');
        if (index > -1) {
                selectedOptions.splice(index, 1); // Remove the "Other" option
            $(this).val(selectedOptions).trigger('change'); // Update the selected value           
        }
  
      openPopup2();
}
   
    }
    
    });



    $("#popup3 button").on('click', function(e) {
    if($("#other_facilities_modal_input").val()){
    var newRow = $('<div class="row other_facilities_row">' +
        '<div class="col-lg-1"></div>' +
        '<div class="col-lg-8">' +
        '<div class="form-group">' +
        '<label class="form-control-label">Facilities</label>' +
        '<input name="other_facilities[]" type="text" class="form-control" value="'+$("#other_facilities_modal_input").val()+'">' +
        '</div>' +
        '</div>' +
        '<div class="col-lg-3" style="padding-top: 2.5rem">' +
        '<button type="button" class="btn btn-danger delete-row"><i class="fa fa-trash"></i></button>' +
        '</div>' +
        '</div>');
    $("#other_facilities_modal_input").val('');

    $(".other_facilities_container").append(newRow);
    $("#other_facilities_modal_input").focus();
    }

});

$(".other_facilities_container").on('click', '.delete-row', function(e) {
    $(this).closest('.other_facilities_row').remove();
});

$(".popup3-submit-btn").on('click', function(e) {
    var inputFields = $("input[name='other_facilities[]']");
    var values = [];
    inputFields.each(function() {
        values.push($(this).val());
    });

    var $select2 = $('#facilities');
    $select2.select2('destroy');

    values.forEach(function(value) {
        $select2.append('<option selected>' + value + '</option>');
    });
    $select2.select2();

    $select2.trigger('change');
    
    closePopup3();
});

 $('#facilities').on('change', function() {  
    const selectedOptions = $(this).val(); 
    if(selectedOptions){
const otherOption = selectedOptions.includes('Other'); 
if(otherOption){
     var index = selectedOptions.indexOf('Other');
        if (index > -1) {
                selectedOptions.splice(index, 1); // Remove the "Other" option
            $(this).val(selectedOptions).trigger('change'); // Update the selected value           
        }
  
      openPopup3();
}
   
    }
    
    });


        function openPopup1() {
                setTimeout(() => {
                document.getElementById('popup1').style.display = 'block';
                }, 200);
        }

        function closePopup1() {
            document.getElementById('popup1').style.display = 'none';
        }

        function openPopup2() {
                setTimeout(() => {
                document.getElementById('popup2').style.display = 'block';
                }, 200);
        }

        function closePopup2() {
            document.getElementById('popup2').style.display = 'none';
        }

        function openPopup3() {
                setTimeout(() => {
                document.getElementById('popup3').style.display = 'block';
                }, 200);
        }

        function closePopup3() {
            document.getElementById('popup3').style.display = 'none';
        }
        const $modal = $('#popup1');
        const $modal2 = $('#popup2');
        const $modal3 = $('#popup3');

// Function to handle the click event outside the modal
$(document).click(function(event) {
    if ($modal.css('display') === 'block' && !$modal.is(event.target) && $modal.has(event.target).length === 0) {
    // Clicked outside the modal, so hide it
    closePopup1();
  }
});


   
$(document).ready(function(){
    //$('#other_course_div').hide(); 
        // $('#other_facilities_div').hide();
         $('#course').select2({
    closeOnSelect: false
}).on('select2:select', function (e) {
    var selectedValue = e.params.data.id; 
    
    if (selectedValue === 'Other') { 
        $(this).select2('close');
    }
});

$('#facilities').select2({
    closeOnSelect: false
}).on('select2:select', function (e) {
    var selectedValue = e.params.data.id; 
    
    if (selectedValue === 'Other') { 
        $(this).select2('close');
    }
});


$('#school_entity_other_div').hide();

$('#school_entity').on('change', function() { 
    $('#school_entity_other_div input').val('');
    if($(this).val()=='Other'){
        $('#school_entity_other_div').show();
    } else{
        $('#school_entity_other_div').hide();

    }
})






 function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#category-img-tag').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#image1").change(function(){
        readURL(this);
    });
});

</script>



<!-- jQuery -->

<!-- Timepicker Js -->
<script src="{{asset('js/wickedpicker.min.js')}}"></script>

<script>
    //   var twelveHour = $('.timepicker-12-hr').wickedpicker();
//             $('.time').text('//JS Console: ' + twelveHour.wickedpicker('time'));
//             $('.timepicker-24-hr').wickedpicker({twentyFour: true});
//             $('.timepicker-12-hr-clearable').wickedpicker({clearable: true});
$( "#timepicker" ).timepicker();
$( "#timepicker2" ).timepicker();

</script>

<script>
    $(document).ready(function() {
        jQuery.validator.addMethod("imageFileonly", function(value, element) {
        // Get the file extension
        var extension = value.split('.').pop().toLowerCase();
        // Check if the extension is one of the image formats
        return ['jpg', 'jpeg', 'png', 'gif'].indexOf(extension) !== -1;
      }, "Please select a valid image file (jpg, jpeg, png).");

      jQuery.validator.addMethod("videoFileonly", function(value, element) {
        // Get the file extension
        var extension = value.split('.').pop().toLowerCase();
        // Check if the extension is one of the image formats
        return ['mp4', 'mov', 'avi'].indexOf(extension) !== -1;
      }, "Please select a valid video file (mp4, mov, avi).");

      
      jQuery.validator.addMethod("maxFileSize", function(value, element, params) {
        // Get the selected file count
        var fileCount = element.files.length;
        // Check if the file count is within the specified limit
        return fileCount <= params;
      }, jQuery.validator.format("You can select a maximum of {0} image files."));

      jQuery.validator.addMethod("maxVideoSize", function(value, element, params) {
        // Get the file size in bytes
        var fileSize = element.files[0].size;
        // Convert file size to megabytes
        var fileSizeInMB = fileSize / (1024 * 1024);
        // Check if file size is less than the specified limit
        return fileSizeInMB <= params;
      }, jQuery.validator.format("File size must be less than {0}MB."));

      jQuery.validator.addMethod("httpOrHttpsUrl", function(value, element) {
    return this.optional(element) || /^(https?:\/\/)?(www\.)?[\w-]+(\.[\w-]+)+(\/[\w-]*)*\/?$/.test(value);
}, "Please enter a valid URL.");

      
    //   jQuery.validator.addMethod("httpOrHttpsUrl", function(value, element) {
    //     // Regular expression pattern
    //     var urlPattern = /^(https?:\/\/)([\w.-]+)\.([a-zA-Z]{2,6})(\/\S*)?$/;
    //     return this.optional(element) || urlPattern.test(value);
    //   }, "Please enter a valid URL starting with http:// or https://");
     

      




  $("#form2").validate({
    rules: {
        school_institute: {
        required: true,
      },
      website: {
        httpOrHttpsUrl: true,
      },
      fb: {
        httpOrHttpsUrl: true,
      },
      insta: {
        httpOrHttpsUrl: true,
      },
      google: {
        httpOrHttpsUrl: true,
      },
      address: {
        required: true,
      },
      school: {
        required: true,
      },
      pin_code: {
        required: true,
        digits: true,
        minlength: 6,
        maxlength: 6,
      }, 
      about: {
        minlength: 20,
        maxlength: 500,
      },
      oprating_since: {
        required: true,
      },
      mob: {
        required: true,
      },
      email: {
        required: true,
        email: true,
      },
      'course[]': {
        required: true,
      },
      'facilities[]': {
        required: true,
      },
      policy_checkbox:{
        required:true
      },
      'image[]': {
        required:true,
            imageFileonly: true,
            maxFileSize: 5 // Maximum file count

          },
           'video[]': {
            required:true,
            videoFileonly: true,
            maxVideoSize: 5,
            maxFileSize: 2 

          }

    },
    messages: {
      school_institute: {
        required: "This field is required",
      },
      website: {
        httpOrHttpsUrl: "Please enter valid URL.",
      },
      fb: {
        httpOrHttpsUrl: "Please enter valid URL.",
      },
      insta: {
        httpOrHttpsUrl: "Please enter valid URL.",
      },
      google: {
        httpOrHttpsUrl: "Please enter valid URL.",
      },
      about: {
        minlength: "Please enter minimum 20 character description.",
        maxlength:  "Please enter maximum 500 character description.",
      },
      address: {
        required: "This field is required.",
      },
      pin_code: {
        required: "This field is required.",
        minlength: "Please enter 6 digit pincode.",
        maxlength: "Please enter 6 digit pincode.",
        digits: "Pincode number must be integer only.",
      },
      oprating_since: {
        required: "This field is required.",
      },
      mob: {
        required: "This field is required.",
      }, 
      school: {
        required: "This field is required.",
      },
      email: {
        required: "This field is required.",
        email: "Please enter valid email address.",
      },
      'course[]': {
        required: "This field is required.",
      },
      'facilities[]': {
        required: "This field is required.",
      },
      policy_checkbox:{
        required: "Accept terms and conditions to submit.",
      },
      'image[]': {
            required: "Please select at least one image file.",
            imageFileonly: "Please select valid image files only (jpg, jpeg, png).",
            maxFileSize: "You can select a maximum of 5 image files."

          },
          'video[]': {
            required: "Please select at least one video file.",
            videoFileonly: "Please select valid video file only (mp4,mov,avi).",
            maxFileSize: "You can select a maximum of 2 video files.",
            maxVideoSize:"File size must be less than 5MB."
          }
    },
    submitHandler: function(form) {
      return true;
    },
    errorPlacement: function(error, element) {
        if (element.attr("name") ==="policy_checkbox") { 
                    error.insertAfter(element.closest('.policy_checkbox_class'));
                }
                else if (element.attr("name") ==="facilities[]" || element.attr("name") ==="course[]") { 
                    error.insertAfter(element.closest('.form-group'));
                }else{
                    error.insertAfter(element); // Corrected error placement

                }
    },
  });

});


</script>












@stop