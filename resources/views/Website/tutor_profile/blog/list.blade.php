@extends('Website.tutor_profile.layout')

@section('profile_content')
<div class="dashboard-content">
    <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>
    <div class="container dasboard-container">
        <!-- dashboard-title -->
        <!-- dashboard-title -->
        <div class="dashboard-title fl-wrap">
            <div class="dashboard-title-item"><span>Blog</span></div>
            @include('Website.school_profile.profile_header')

            <!--Tariff Plan menu-->
            <div class="tfp-det-container">


            </div>
            <!--Tariff Plan menu end-->
        </div>
        <!-- dashboard-title end -->
        <!-- dasboard-wrapper-->


        <div class="dasboard-widget-box fl-wrap">
            <div  style="margin-bottom:8%;">
                <a href="{{route('tutor_profile.write-blog')}}" class="add-list color-bg"> <span>Write a Blog</span></a>
            </div>

            <div class="col-md-12">
               
                                           <table id="customers">
                   <thead>
                        <th>Sr.No</th>
                        <th>Subject</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $blog)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$blog->subject}}</td>
                        <td>{{$blog->category}}</td>
                        <td>
                          <a href="{{asset('public/'.$blog->blog_image)}}" target="_blank">  <img height="50" width="50" src="{{asset('public/'.$blog->blog_image)}}" alt=""></a>
                        </td>
                        <td>{{$blog->status}}</td>
                        <td>
                            <a href="{{route('tutor_profile.delete-blog',$blog->id)}}">
                            <i class="far fa-trash"></i>
                        </a>
                        <a href="{{route('tutor_profile.edit-blog',$blog->id)}}">

                            <i class="far fa-pencil"></i>
                        </a>

                        </td>
                    </tr>

                      
                </tbody>
                        @endforeach
                      


                </table>
                @if(count($blogs)==0)
                            <p>No record found</p>
                            @endif
            </div>


        </div>
    </div>

</div>
@stop