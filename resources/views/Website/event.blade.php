@extends('website_layout')
@section('website_content')

<div class="page-title parallax parallax1">
        <div class="section-overlay">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">                    
                    <div class="page-title-heading">
                        <h1 class="title">  Events</h1>
                    </div><!-- /.page-title-captions -->
                    <div class="breadcrumbs">
                        <!-- <ul>
                            <li><a href="index.html"></a></li>
                          
                        </ul>                    -->
                    </div><!-- /.breadcrumbs -->   
                </div><!-- /.col-md-12 -->  
            </div><!-- /.row -->  
        </div><!-- /.container -->                      
    </div><!-- /.page-title -->



    <section class="main-content page-listing-grid">
        <div class="container">
    <div class="row">
        <div class="col-lg-12" >
            <div class="title-section text-center" style="margin-top: 7px;">
                <h1 class="title"> </h1>
               
            </div>
            <div class="row listing-grid">
                <div class="col-md-4">
                    <div class="flat-product">
                        <div class="featured-product">
                            <img src="https://infolekha.org/website_asset/images/Competition.png" alt="image">
                         
                        </div>
                    
                  
<a href="{{route('coming_soon')}}" title="">
                        <button type="button" class="btn" style="color:white !important; width: 100%;" >
                                Competition 
                         </button> 
	</a>
                    </div>
                  
                </div>
                <div class="col-md-4">
                    <div class="flat-product">
                        <div class="featured-product">
                            <img src="https://infolekha.org/website_asset/images/Seminar.png" alt="image">
                         
                        </div>
                    
                 
     <a href="{{route('coming_soon')}}" title="">
                        <button type="button" class="btn" style="color:white !important; width: 100%;" >
                                Seminar & Lectures 
                         </button>
		 </a>
                    </div>
                  
                </div>
                <div class="col-md-4">
                    <div class="flat-product">
                        <div class="featured-product">
                            <img src="https://infolekha.org/website_asset/images/Workshop.png" alt="image">
                         
                        </div>
                    
                      
     <a href="{{route('coming_soon')}}" title="">
                        <button type="button" class="btn" style="color:white !important; width: 100%;" >
                                Workshops 
                         </button>
		 </a>
                    </div>
                  
                </div>
                <div class="col-md-4">
                    <div class="flat-product">
                        <div class="featured-product">
                            <img src="https://infolekha.org/website_asset/images/Activity.png" alt="image">
                         
                        </div>
                    
       <a href="{{route('coming_soon')}}" title="">
                        <button type="button" class="btn" style="color:white !important; width: 100%;" >
                     
                                Activities for Students
    
                         </button>
		   </a>
                    </div>
                  
                </div>
                <div class="col-md-4">
                    <div class="flat-product">
                        <div class="featured-product">
                            <img src="https://infolekha.org/website_asset/images/Student-devlopment.png" alt="image">
                         
                        </div>
                    
                     
<a href="{{route('coming_soon')}}" title="">
                        <button type="button" class="btn" style="color:white !important; width: 100%;" >
                                Student Development Programs 
                         </button>
	</a>
                    </div>
                  
                </div>
             
            </div>
                       
        </div><!-- /.col-lg-9 -->    
               
    </div><!-- /.row -->  </div>
    </section>
@stop
@section('js')
<script>
	 $(window).load(function(){
            $('#event').hide();
        }); 

</script>
@stop