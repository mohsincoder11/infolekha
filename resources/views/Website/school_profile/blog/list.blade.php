@extends('Website.school_profile.layout')

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
            <div  style="margin-bottom:2%; float:right;">
                <a href="{{route('school_profile.write-blog')}}" class="btn color-bg"> <span>Write a Blog</span></a>
            </div>

            <div class="col-md-12" style="overflow-x:scroll;">
                <table id="customers">
                   <thead>
                        <th> SN</th>
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
                            <a href="{{route('school_profile.delete-blog',$blog->id)}}">
                            <i class="fa fa-trash" aria-hidden="true"></i></a>
                       
                        <a href="{{route('school_profile.edit-blog',$blog->id)}}">

                           <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>

                        </td>
                    </tr>

                      
                    

                        @endforeach
                </tbody>

                      


                </table>
                @if(count($blogs) == 0)
				   <p align="center">No Record Found</p>

                @endif
            </div>


        </div>
    </div>

</div>
@stop