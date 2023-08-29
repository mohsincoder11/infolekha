@extends('website_layout')
@section('css')
<style>
    .btn {
        border: none;
        background-color: #073D5F;
        /* padding: 11px 26px; */
        font-size: 16px;
        cursor: pointer;
        display: inline-block;
    }

    .btn:hover {
        background: #477ea0;
    }

    .success {
        color: green;
    }

    .info {
        color: dodgerblue;
    }

    .warning {
        color: orange;
    }

    .danger {
        color: red;
    }

    .default {
        color: black;
    }

    .dropbtn {

        border: none;
        cursor: pointer;
    }



    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        overflow: auto;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 3px;
        text-decoration: none;
        display: block;
    }

    .dropdown a:hover {
        background-color: #ddd;
    }

    .show {
        display: block;
    }
    @media only screen and (max-width: 768px) {
        .pp{
            margin-left:2%;
        }
    }
   
</style>

<style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    
    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }
    
    tr:nth-child(even) {
      background-color: #dddddd;
    }
    </style>
@stop
@section('website_content')


        <section class="main-content page-listing-grid">
            <div>
                <img src="https://via.placeholder.com/1920x400">
            </div>
            <div class="container">

                <div class="row" >


                    <div class="col-lg-12" style="padding-left: 3%; padding-right: 3%;" >
                        <section class="main-content">
                            <div class="container">
                                <div class="row">
                                    <!-- <div class="col-lg-1"></div> -->

                                
                                    <div class="col-lg-12" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding-bottom:4%; margin-top:2%; ">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="title-section text-center"
                                                    style="margin-top:2%; ">
                                                    <h4 style="color: #073D5F; font-style: sans-serif;">{{$blog->subject}}</h4>
                                                </div>
                                            </div>
                                            <div class="col-md-4" style=" color: #000; margin-bottom: 2%; font-weight:900px; ">
                                                <p><span style="color:#073D5F;">Published Date : </span><span style="color: #787878;">{{date('d-m-Y',strtotime($blog->created_at))}} </span></p>
                        
                                            </div>
                                            <div class="col-md-4" style=" color: #000; margin-bottom:2%;">
                                                <p><span style="color:#073D5F;">Author : {{$blog->author_name}}</span></p>
                        
                                            </div>

                                            <div class="col-md-4" style=" color: #000; margin-bottom:2%;">
                                                <p><span style="color:#073D5F;">Category : {{$blog->category}}</span></p>
                        
                                            </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-12" >

                                            <div class="col-md-12" align="center">
                                                <div class="widget widget_categories" >
                                                    <img src="{{asset('public/'.$blog->blog_image)}}">
                                                </div>
                                                 </div>
                                                

                                                 <div class="row">
                                                    {!! html_entity_decode($blog->content1) !!}
                                                </div>
                                                   
                                            
                                            <br>

                                            <div class="col-md-12" align="center">
                                                <img src="{{asset('images/google-display.png')}}" >
                                            </div>

                                            <div class="row">
                                                {!! html_entity_decode($blog->content2) !!}
                                            </div>
                                               
                                        
                                        <br>

                                        <div class="col-md-12" align="center">
                                            <img src="{{asset('images/add1.jpg')}}" >
                                        </div>

                                        <div class="row">
                                            {!! html_entity_decode($blog->content3) !!}
                                        </div>
                                           
                                    
                                    <br>

                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5">
                                            <img src="{{asset('images/image5.gif')}}" style="height:250px; width:300px;">
                                        </div>
                                        <div class="col-md-5">
                                            <img src="{{asset('images/images7.gif')}}" style="height:250px; width:300px;">
                                
                                        </div>
                                    </div>

                                    <div class="row">
                                        {!! html_entity_decode($blog->content4) !!}
                                    </div>
                                       
                                
                               


                                    </div><!-- /.col-lg-9 -->
                                    
                                </div><!-- /.row -->
                            </div><!-- /.container -->
                        </section>

                    </div><!-- /.col-lg-9 -->

                    
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section>

@stop