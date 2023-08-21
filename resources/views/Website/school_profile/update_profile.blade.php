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
                        <div class="custom-form">
                            <form action="{{ route('school_profile.post_update_profile') }}" 
                            method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                <div class="col-md-6">
                                    <label style="font-size:16px;">Upload Logo</label>
                                    <input type="file" name="logo" class="upload" value="{{ $data->logo }}" />
                                    <img height="50px" width="50px" src="{{ asset('public') . '/' . $data->logo }}"
                                        alt="">
                                </div>
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
                                    <label style="font-size:16px;">Facilities </label>
                                    <select id="facilities" name="facilities[]"
                                    class="form-select select country-select" multiple>

                                        @foreach (get_facilities() as $facility )
                                        <option  @if(is_array(json_decode($data->facilities)) && in_array($facility,json_decode($data->facilities))) selected @endif>{{$facility}}</option>
                                    @endforeach

                                    </select>
                                </div>

                                <div class="col-md-6">

                                    <label style="font-size:16px;">Courses </label>
                                    <select id="course" name="course[]" class="form-select select country-select"
                                        multiple>

                                        @if('School'== $data->r_entity)
                                        @foreach(get_school_course() as $course)
                                        <option @if(is_array(json_decode($data->course)) && in_array($course,json_decode($data->course))) selected @endif >{{$course}}</option>
                                        @endforeach
                                     
                                        @endif
                                        @if('College'== $data->r_entity)
                                        @foreach(get_college_course() as $course)
                                        <option  @if(is_array(json_decode($data->course)) && in_array($course,json_decode($data->course))) selected @endif>{{$course}}</option>
                                        @endforeach
                                        @endif
                                        @if('Institute'== $data->r_entity)
                                        @foreach(get_institute_course() as $course)
                                        <option  @if(is_array(json_decode($data->course)) && in_array($course,json_decode($data->course))) selected @endif>{{$course}}</option>
                                        @endforeach
                                        @endif
                                      
                                        <option> Other </option>


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
                                                    <iframe height="115" width="210" src="{{ asset('public') . '/' . $i }}"
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


@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
<script>
    function charcountupdate(str) {
        var lng = str.length;
        document.getElementById("charcount").innerHTML = lng + ' out of 500 characters';
    }
    </script>
<script>
    $(document).ready(function() {

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
 $('#course').on('change', function() {  const selectedOptions = $(this).val(); 
 const otherOption = selectedOptions.includes('other'); 
 if (otherOption) {  $('#other-fruit').show();  } else {  $('#other-fruit').hide();  }  });


$('#facilities').select2({closeOnSelect:false}); 
 $('#facilities').on('change', function() {  const selectedOptions = $(this).val(); 
 const otherOption = selectedOptions.includes('other'); 
 if (otherOption) {  $('#other-fruit').show();  } else {  $('#other-fruit').hide();  }  });
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
@stop
