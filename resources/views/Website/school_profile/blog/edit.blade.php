@extends('Website.school_profile.layout')
@section('css')
    <style>
        #description {
            height: 200px;
        }
    </style>

@stop

@section('profile_content')
    <div class="dashboard-content">
        <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dashboard Menu</div>
        <div class="container dasboard-container">
            <!-- dashboard-title -->
            <!-- dashboard-title -->
            <div class="dashboard-title fl-wrap">
                <div class="dashboard-title-item"><span>Edit Blog</span></div>
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
                        <form method="post" action="{{route('school_profile.update-blog')}}" id="blog_form" enctype="multipart/form-data">
                            <form method="post" action="{{route('school_profile.insert-blog')}}" id="blog_form" enctype="multipart/form-data">
                                <div class="custom-form">
        @csrf
        <input type="hidden" name="id" value="{{$edit_data->id}}">

        
        
        <div class="col-md-12">
            <label style="font-size:16px;">Subject of Blog </label>
            <input type="text" placeholder="Subject of Blog" value="{{$edit_data->subject}}" name="subject"/>
        </div>

        <div class="col-md-6">
            <label style="font-size:16px;">Category </label>
            <select data-placeholder="Status" class="chosen-select on-radius no-search-select" name="category" id="category">
                @foreach (get_blog_categories() as $cat)
                    <option value="{{$cat}}" @if($cat==$edit_data->category) selected="selected" @endif>{{$cat}}</option>
                @endforeach
                <option value="Other" @if(!in_array($edit_data->category,get_blog_categories())) selected="selected" @endif >Other</option>
            </select>
        </div>
        <div class="col-md-6 @if(!in_array($edit_data->category,get_blog_categories())) @else d-none @endif" id="other_category_div">
            <label style="font-size:16px;">Specify other category </label>
            <input type="text" placeholder="other category" value="{{$edit_data->category}}"  name="other_category" id="other_category" />
        </div>

        <div class="col-md-4">
            <label style="font-size:16px;">Upload Blog Image</label>
            <input type="file" class="upload" name="blog_image" />
        </div>
        <div class="col-md-2">
            <a href="{{asset('public/'.$edit_data->blog_image)}}" target="_blank">  <img height="50" width="50" src="{{asset('public/'.$edit_data->blog_image)}}" alt=""></a>
        </div>
        
                                    <div class="col-md-12" style="margin-top:10px;">
                                        <textarea  name="content1" id="content1" rows="8"  style="height: 150px;" >
                                          {!!$edit_data->content1!!}</textarea>
                                          
        
                                          <span class="editor_error"></span>
                                    </div>
        
                                    <div class="col-md-12" style="margin-top:10px;">
                                        <textarea name="content2" id="content2" rows="8"  style="height: 150px;" >
                                              {!!$edit_data->content2!!}</textarea>
                                    
        
                                              <span class="editor_error"></span>
                                    </div>
        
                                    <div class="col-md-12" style="margin-top:10px;">
                                        <textarea name="content3" id="content3" rows="8"  style="height: 150px;" >
                                                  {!!$edit_data->content3!!}</textarea>
                                                  
                                                  <span class="editor_error"></span>
                                    </div>
        
                                    <div class="col-md-12" style="margin-top:10px;">
                                        <textarea name="content4" id="content4" rows="8"  style="height: 150px;" >
                                                      {!!$edit_data->content4!!}</textarea>
                                                      
                                                      <span class="editor_error"></span>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <button class="btn  color-bg  float-btn">Update </button>
        
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
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<script>
    $(document).ready(function() {
     var toolbar=[   ['bold', 'italic', 'underline', 'strike'],
                         [{
                             'list': 'ordered'
                         }, {
                             'list': 'bullet'
                         }],
                         ['link', 'image', 'video'],
                         ['clean']
                     ];
 
 
 
     var description1 = new Quill("#content1", {
                 theme: "snow",
                 modules: {
                     toolbar: toolbar
                 }
             });
 
             var description2 = new Quill("#content2", {
                 theme: "snow",
                 modules: {
                     toolbar: toolbar
                 }
             });
 
             var description3 = new Quill("#content3", {
                 theme: "snow",
                 modules: {
                     toolbar: toolbar
                 }
             });
 
             var description4 = new Quill("#content4", {
                 theme: "snow",
                 modules: {
                     toolbar: toolbar
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
      
    //     submitHandler: function(form) {
    //                return true;
    //             },
    //     errorPlacement: function(error, element) {

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
