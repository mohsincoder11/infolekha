@extends('Website.school_profile.layout')
@section('css')
    <style>
        label {
            z-index: 1 !important;
        }
    .multi-image{
    /* Set fixed dimensions for the slide item container */
    width: 100%; /* Set the desired width */
    height: 150px; /* Set the desired height */
}

.multi-image img {
    width: 100% !important;
    object-fit: contain !important;
    height: 100px !important;
    border:1px solid #bfbfbf;
    border-radius: 5px;
}

.img {
    width: 100% !important;
    object-fit: contain !important;
    height: 100px !important;
    border:1px solid #bfbfbf;
    border-radius: 5px;
}


    .delete-icon {
      position: absolute;
      top: 5px;
      right: 20px;
      color: red;
      cursor: pointer;
      font-size: 20px;
      z-index: 9999;
    }
   /* Custom modal styles */
.modal {
  display: none;
  position: fixed;
  z-index: 9999;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
  background-color: #fefefe;
  margin: 15% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
  max-width: 400px; /* Limit the maximum width of the modal */
  border-radius: 5px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
.modal-content span{
  text-align: end;

}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

.modal-buttons {
  text-align: right;
  margin-top: 20px;
}

.btn-no,
.btn-yes {
  padding: 10px 20px;
  cursor: pointer;
  border: none;
  border-radius: 3px;
  font-weight: bold;
  color: #fff;
}

.btn-no {
  background-color: #bbb;
}

.btn-yes {
  background-color: #073D5F;
  margin-left: 10px;
}


.popup1 {
        display: none;
        position:fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 700px;
        height: 300px;
        background-color: #fff;
        padding: 1px 20px 20px 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        z-index: 1000;
       
    }

    /* .close-btn1_div {
       width: 100%; text-align: right; position: sticky; top: 0;

    } */
    .close-btn1 {
 float: right;
 display: block;
 width: 100%; /* Adjust the width to your preferred size */
 height: 40px; /* Adjust the height to your preferred size */
 line-height: 40px; /* Center the icon vertically */
 background-color: white;
 cursor: pointer;
 font-size: 1.5rem;
 color: #666;
 transition: color 0.3s ease-in-out;
 padding: 10px 0 30px 0;
   margin-bottom: 10px;


}

    .close-btn1:hover {
        color: #000;
    }

    @media screen and (max-width: 480px) {
        .popup1 {
            width: 90%;
            /*height: 90%;*/
            max-width: none;
            max-height: none;
        }
    }
    .popup1 .form-control-label{
        margin-bottom: 5px;
    float: left;
    font-size: 14px;
    }
    </style>

<style>
	  @media (max-width: 768px) {
       .wt {
            width:90% !important;
           
        }

        
    }
</style>
   <link href="
   https://cdn.jsdelivr.net/npm/timepicker@1.14.1/jquery.timepicker.min.css
   " rel="stylesheet">
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
                        <div class="custom-form">
                            <form action="{{ route('school_profile.post_update_profile') }}" 
                            method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
							

                                    <div class="col-md-5">
									    <div class="listsearch-input-item">
                                    <label style="font-size:16px;">Upload Logo</label>
                                    <input type="file" name="logo" class="upload" value="{{ $data->logo }}" />
                                    <img height="50px" width="50px" src="{{ asset('public') . '/' . $data->logo }}"
                                        alt="">
									</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="listsearch-input-item">
                                <label style="font-size:16px;">Upload Banner</label>
                                <input type="file" name="banner_image" class="upload" value="{{ $data->banner_image }}" />
                                <img height="50px" width="50px" src="{{ isset($data->banner_image) ? asset('public').'/'.($data->banner_image) : 'https://via.placeholder.com/950x250' }}"
                                alt="">
                                </div>
                            </div>
									<div class="col-md-1"></div>
                                <div class="col-md-6 ">
                                    <label style="font-size:16px;"> Your Name </label>
                                    <input type="text" placeholder="Name" name="name" value="{{ $data->name }}" />
                                </div>
                                <div class="col-md-6">
                                    <label style="font-size:16px;">School Name </label>
                                    <input type="text" placeholder="School of Scholar" name="entity_name"
                                        value="{{ $data->entity_name }}" />
                                </div>
                              
                                <div class="col-md-6">

                                    <label style="font-size:16px;">Courses </label>
                                    <select id="course" name="course[]" class="form-select select country-select"
                                        multiple>

                                        @if('School'== $data->r_entity)
                                            @php
                                            $other_courses_array=array_diff(json_decode($data->course),get_school_course());
                                            @endphp
                                        @foreach(get_school_course() as $course)
                                        <option @if(is_array(json_decode($data->course)) && in_array($course,json_decode($data->course))) selected @endif >{{$course}}</option>
                                        @endforeach
                                     
                                        @endif
                                        @if('College'== $data->r_entity)
                                            @php
                                            $other_courses_array=array_diff(json_decode($data->course),get_college_course());
                                            @endphp
                                        @foreach(get_college_course() as $course)
                                        <option  @if(is_array(json_decode($data->course)) && in_array($course,json_decode($data->course))) selected @endif>{{$course}}</option>
                                        @endforeach
                                        @endif
                                        @if('Institute'== $data->r_entity)
                                            @php
                                            $other_courses_array=array_diff(json_decode($data->course),get_institute_course());
                                            @endphp
                                        @foreach(get_institute_course() as $course)
                                        <option  @if(is_array(json_decode($data->course)) && in_array($course,json_decode($data->course))) selected @endif>{{$course}}</option>
                                        @endforeach
                                        @endif

                                        @foreach($other_courses_array as $other_course)
                                        <option selected >{{$other_course}}</option>
                                        @endforeach
                                      
                                        <option>Other</option>


                                    </select>
                            </div>
                            @php
                            $other_facilities_array=array_diff(json_decode($data->facilities),get_facilities());
                            @endphp
                            <div class="col-md-6">
                                <label style="font-size:16px;">Facilities </label>
                                <select id="facilities" name="facilities[]"
                                class="form-select select country-select" multiple>

                                    @foreach (get_facilities() as $facility )
                                    <option  @if(is_array(json_decode($data->facilities)) && in_array($facility,json_decode($data->facilities))) selected @endif>{{$facility}}</option>
                                @endforeach
                                <option>Other</option>
                                @foreach($other_facilities_array as $other_facilities)
                                <option selected >{{$other_facilities}}</option>
                                @endforeach

                                </select>
                            </div>
                                {{-- <div class="col-md-6" style="margin-top:2%;">
                                            <label>Tagline</label>
                                            <input type="text" placeholder="Tagline" value="{{$data->}}"/>
                                        </div> --}}

                                <div class="col-md-6">
                                    <label style="font-size:16px;">Facebook Link</label>
                                    <input type="text" placeholder="Facebook Link" name="fb"
                                        value="{{ $data->fb }}" />
                                </div>


                                <div class="col-md-6">
                                    <label style="font-size:16px;">Twitter Link</label>
                                    <input type="text" placeholder="Twitter Link" name="website"
                                        value="{{ $data->website }}" />
                                </div>

                                <div class="col-md-6">
                                    <label style="font-size:16px;">Instagram Link</label>
                                    <input type="text" placeholder="Instagram Link" name="insta"
                                        value="{{ $data->insta }}" />
                                </div>


                                <div class="col-md-6">
                                    <label style="font-size:16px;">YouTube Link</label>
                                    <input type="text" placeholder="You-tube Link" name="yt"
                                        value="{{ $data->yt }}" />
                                </div>

                                <div class="col-md-6">
                                    <label style="font-size:16px;">Linkedin Link</label>
                                    <input type="text" placeholder="Linkdin Link" name="google"
                                        value="{{ $data->google }}" />
                                </div>
                                <div class="col-md-6 ">
                                    <label style="font-size:16px;"> Address </label>
                                    <input type="text" placeholder="Address" id="current_location_at_form" name="address" value="{{ $data->address }}" />
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label style="font-size:16px;" class="form-control-label"> Office
                                            Timings (From)</label>

                                        <input name="opening_time" type="text" id="timepicker" class="from-control" autocomplete="off" value="{{ $data->opening_time }}">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label style="font-size:16px;" class="form-control-label">Office
                                            Timings (To)</label>
                                        <input type="text" id="timepicker2" name="closing_time"
                                            class="timepicker-12-hr" autocomplete="off" value="{{ $data->closing_time }}">

                                    </div>
                                </div>
                                <div class="col-md-12">


                                    <label style="font-size:16px;">About Us <span id="charcount">0 out of 500 characters</span> </label>
                                    <textarea cols="40" rows="3" maxlength="500" placeholder="About Me" style="margin-bottom:20px;" name="about" onkeyup="charcountupdate(this.value)">{{ $data->about }}</textarea>
                                </div>
                                <div class="col-md-6">
                                    <label style="font-size:16px;">Upload School Image</label>
                                    <input type="file" class="upload" multiple name="image[]" accept="image/*" />
                                </div>
                                <div class="col-md-12">

                                    <div class="row">
                                        @foreach (json_decode($data->image) as $i)
                                            <div class="col-md-2 multi-image">
                                                <div class="image-container">
                                                    <a  target="_blank" href="{{ asset('public') . '/' . $i }}">
                                                        <img height="100px" width="auto"
                                                        src="{{ asset('public') . '/' . $i }}" alt="">
                                                    </a> 
                                                    <i class="fas fa-times-circle delete-icon delete-image" image_name="{{$i}}"></i>
                                                </div>
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
                                            <div class="col-md-4 multi-image" >


                                                <a target="_blank" href="{{ asset('public') . '/' . $i }}"
                                                    class="geodir-category-img_item img">
                                                    <iframe height="100%" width="210" src="{{ asset('public') . '/' . $i }}?autoplay=0" class="iframe-click"
                                                        alt="" title="YouTube video player" frameborder="0"
                                                        allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                            </a>
                                            <i class="fas fa-times-circle delete-icon delete-video" video_name="{{$i}}"></i>

                                            
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                                <div  >
                                    <button type="submit" class="btn color-bg  float-btn" >Save Changes</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div id="customModal" class="modal">
        <form action="{{route('school_profile.delete-image')}}" method="post">
            @csrf
        <div class="modal-content">
          <span class="close close-model">&times;</span>
          <p>Are you sure you want to delete this image?</p>
          <div class="modal-buttons">
            <input type="hidden" name="image_name" id="image_name2">

            <button type="button" class="btn-no close-model">No</button>
            <button type="submit" class="btn-yes">Yes</button>
          </div>
        </div>
    </form>
      </div>

      <div id="customModal2" class="modal">
        <form action="{{route('school_profile.delete-video')}}" method="post">
            @csrf
        <div class="modal-content">
          <span class="close close-model2">&times;</span>
          <p>Are you sure you want to delete this video?</p>
          <div class="modal-buttons">
            <input type="hidden" name="video_name" id="video_name2">

            <button type="button" class="btn-no close-model2">No</button>
            <button type="submit" class="btn-yes">Yes</button>
          </div>
        </div>
    </form>
      </div>


      <div id="popup2" class="popup1 wt"
style="overflow-y: scroll !important;width: 40vw;">

<div
    style="width: 100%; text-align: right; position: sticky; top: 0;">
    <a class="close-btn1" onclick="closePopup2()"><i
            class="fas fa-times"></i></a>
</div>

<div class="row wt">
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
    <div class="col-lg-1" style="margin-top:25px;" >
        <button type="button" class=" color-bg  float-btn" style="padding:8px; color:#fff;"><i
                class="fa fa-plus-square"  ></i></button>
    </div>

</div>
<span class="other_course_container">

</span>
<div class="row centered-container mt-2">
    <button type="button"
        class=" btn color-bg  float-btn popup2-submit-btn" style="padding:12px;">Submit</button>
</div>

</div>

<div id="popup3" class="popup1 wt"
style="overflow-y: scroll !important;width: 40vw;">

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
    <div class="col-lg-1" style="margin-top:25px;" >
        <button type="button" class=" color-bg  float-btn" style="padding:8px; color:#fff;"><i
                class="fa fa-plus-square"></i></button>
    </div>

</div>
<span class="other_facilities_container">

</span>
<div class="row centered-container mt-2">
    <button type="button"
        class=" color-bg  float-btn popup3-submit-btn" style="padding:12px; color:#fff;">Submit</button>
</div>

</div>

@stop

@section('js')
<script src="
https://cdn.jsdelivr.net/npm/timepicker@1.14.1/jquery.timepicker.min.js
"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
$( "#timepicker" ).timepicker({
    timeFormat: 'h:i A' // Format as two-digit hours with AM/PM
  });
$( "#timepicker2" ).timepicker({
    timeFormat: 'h:i A' // Format as two-digit hours with AM/PM
  });

  $('#timepicker2').on('change', function() {
    // Get the selected times from both timepickers
    var timepicker1Value = $('#timepicker').val();
    var timepicker2Value = $('#timepicker2').val();

    // Parse the selected times into JavaScript Date objects
    var time1 = new Date('2000-01-01 ' + timepicker1Value);
    var time2 = new Date('2000-01-01 ' + timepicker2Value);

    // Check if timepicker2 is greater than timepicker1
    if (time2 <= time1) {
         Toast.fire({
            icon: 'error',
            title: "Time in To must be greater than From"
        })
      // You can reset the value of Timepicker 2 here if needed
      // $('#timepicker2').val('');
    }
  });


    function charcountupdate(str) {
        var lng = str.length;
        document.getElementById("charcount").innerHTML = lng + ' out of 500 characters';
    }
   
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
        '<div class="col-lg-1">' +
        '<button type="button" class=" btn-danger delete-row" style="padding:12px;"><i class="fa fa-trash"></i></button>' +
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
  const $modal2 = $('#popup2');
        const $modal3 = $('#popup3');


        $(document).on('click', '.delete-image',function(){
  document.getElementById('customModal').style.display = 'block';
  console.log($(this).attr('image_name'));
  $("#image_name2").val($(this).attr('image_name'));
        })
        
        $(document).on('click', '.close-model',function(){
  document.getElementById('customModal').style.display = 'none';
})

$(document).on('click', '.delete-video',function(){
  document.getElementById('customModal2').style.display = 'block';
  console.log($(this).attr('video_name'));
  $("#video_name2").val($(this).attr('video_name'));
        })
        
        $(document).on('click', '.close-model2',function(){
  document.getElementById('customModal2').style.display = 'none';
})




        $('#course').select2({closeOnSelect:false}); 
 


$('#facilities').select2({closeOnSelect:false}); 
 
setTimeout(() => {
    $('.select2-container').css('width', '100%');
    console.log($('.select2-container ul li'))
    $('.select2-container ul li').css('text-align', 'initial');

}, 200);
$(document).on('mouseenter', '.select2-results__options', function() {
    // Change the text-align style to "initial" for list items inside Select2
    $(this).find('li').css('text-align', 'initial');
    $(this).find('li').css('padding-left', '10px');
  });
})

	
</script>
<script type="text/javascript"
src="https://maps.google.com/maps/api/js?countrycode:IN&key=AIzaSyDkFrL3p2KR9iAmFiuhmkszKgMHIon1Y0E&libraries=places"></script>
<script>
    google.maps.event.addDomListener(window, 'load', initialize);

    function initialize() {
        /* var input = document.getElementById('current_location');*/
        var autocomplete = new google.maps.places.Autocomplete(
            (document.getElementById('current_location_at_form')), {
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
