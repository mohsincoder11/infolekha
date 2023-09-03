@extends('Website.school_profile.layout')
@section('css')
    <style>
        #description {
            height: 200px;
        }
    </style>

      <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@stop

@section('profile_content')
    <div class="dashboard-content">
        <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dashboard Menu</div>
        <div class="container dasboard-container">
            <!-- dashboard-title -->
            <!-- dashboard-title -->
            <div class="dashboard-title fl-wrap">
                <div class="dashboard-title-item"><span>Blog</span></div>
                @include('Website.school_profile.profile_header')

            </div>
            <!-- dashboard-title end -->
            <!-- dasboard-wrapper-->
          
            <div class="dasboard-widget-box fl-wrap">
                <div style="margin-bottom:8%;">
                    <a href="{{ route('school_profile.blog') }}" class="add-list color-bg"> <span>Show Blog</span></a>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <form method="post" action="{{route('school_profile.insert-blog')}}" id="blog_form" enctype="multipart/form-data">
                        <div class="custom-form">
@csrf


                            <div class="col-md-12">
                                <label style="font-size:16px;">Subject of Blog </label>
                                <input type="text" placeholder="Subject of Blog" name="subject"/>
                            </div>

                            <div class="col-md-6">
                                <label style="font-size:16px;">Category </label>
                                <select data-placeholder="Status" class="chosen-select on-radius no-search-select" name="category" id="category">
                                    @foreach (get_blog_categories() as $cat)
                                        <option value="{{$cat}}" >{{$cat}}</option>
                                    @endforeach
                                    <option value="Other" >Other</option>
                                </select>
                            </div>
                            <div class="col-md-6  d-none" id="other_category_div">
                                <label style="font-size:16px;">Specify other category </label>
                                <input type="text" placeholder="other category"   name="other_category" id="other_category" />
                            </div>

                            <div class="col-md-6">
                                <label style="font-size:16px;">Upload Blog Image</label>
                                <input type="file" class="upload" name="blog_image" />
                            </div>

                            <div class="col-md-12" style="margin-top:10px;">
                                <div id="description1" rows="8"  style="height: 150px;" >
                                  </div>
                                  <input type="hidden" name="content1" id="editor_content1" />

                                  <span class="editor_error"></span>
                            </div>

                            <div class="col-md-12" style="margin-top:10px;">
                                <div id="description2" rows="8"  style="height: 150px;" >
                                      </div>
                            <input type="hidden" name="content2" id="editor_content2" />

                                      <span class="editor_error"></span>
                            </div>

                            <div class="col-md-12" style="margin-top:10px;">
                                <div id="description3" rows="8"  style="height: 150px;" >
                                          </div>
                                          <input type="hidden" name="content3" id="editor_content3" />
                                          <span class="editor_error"></span>
                            </div>

                            <div class="col-md-12" style="margin-top:10px;">
                                <div id="description4" rows="8"  style="height: 150px;" >
                                              </div>
                                              <input type="hidden" name="content4" id="editor_content4" />
                                              <span class="editor_error"></span>
                            </div>
                            <div class="col-md-12">
                                <button class="btn  color-bg  float-btn">Save </button>

                            </div>
                        </div>
                    </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
@stop

@section('js')
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script>
   $(document).ready(function() {
    var description1 = new Quill("#description1", {
                theme: "snow",
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline', 'strike'],
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }],
                        ['link', 'image', 'video'],
                        ['clean']
                    ]
                }
            });

            var description2 = new Quill("#description2", {
                theme: "snow",
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline', 'strike'],
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }],
                        ['link', 'image', 'video'],
                        ['clean']
                    ]
                }
            });

            var description3 = new Quill("#description3", {
                theme: "snow",
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline', 'strike'],
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }],
                        ['link', 'image', 'video'],
                        ['clean']
                    ]
                }
            });

            var description4 = new Quill("#description4", {
                theme: "snow",
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline', 'strike'],
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }],
                        ['link', 'image', 'video'],
                        ['clean']
                    ]
                }
            });
  });
 
</script>


    <script>
       $(document).ready(function () {
        $("#category").on("change", function(){
            $("#other_category").val('');

            if($(this).val() =='Other'){
                $("#other_category_div").removeClass('d-none');
            }else{
                $("#other_category_div").addClass('d-none');
            }
        })

    // $('#blog_form').validate({
    //     rules: {
    //         subject: 'required',
    //         category: 'required',
    //         blog_image: {
    //             required: true,
    //             extension: 'jpg,jpeg,png,gif'
    //         },
    //         content1:{
    //             required: true,
    //             minlength:1
    //         },  
    //         content2:{
    //             required: true,
    //             minlength:1
    //         },  
    //         content3:{
    //             required: true,
    //             minlength:1
    //         }, 
    //          content4:{
    //             required: true,
    //             minlength:1
    //         },
          
           
    //     },
    //     messages: {
    //         blog_image: {
    //             extension: 'Please select a valid image file (jpg, jpeg, png, gif)'
    //         }
    //     },
    //     submitHandler: function(form) {
    //                return true;
    //             },
    //     errorPlacement: function(error, element) {
    //         console.log($("#content1").text().length); // For HTML content

    //         if (element.attr("name") === "content1" || element.attr("name") === "content2" || element.attr("name") === "content3" || element.attr("name") === "content4") {
    //                     element.closest('.editor_error').append(error);
    //                 }
    //                 if (element.attr("name") === "subject") {
    //                     element.closest('.col-md-12').append(error);
    //                 }
    //                 else{
    //     element.closest('.col-md-6').append(error);
                        
    //                 }
                   


    //             },
    // });
});
    </script>
@stop