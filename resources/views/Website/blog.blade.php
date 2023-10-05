
@extends('website_layout')
@section('website_content')
<div class="page-title parallax parallax1">
        <div class="section-overlay">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">                    
                    <div class="page-title-heading">
                        <h1 class="title">Blogs</h1>
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
               
               
            </div>
            <div class="row listing-grid">
                <div class="col-md-4">
                    <div class="flat-product">
                        <div class="featured-product">
                            <img src="{{asset('website_asset/images/Opportunity1.jpg')}}" alt="image">
                         
                        </div>
                    
                        <div class="content-product">
                            <!-- <h6 class="widget-title">by : Youness &nbsp;| 23-02-2021 &nbsp;
                                
                            </h6> -->
                            <div class="text">
                                <p>Exploring Opportunities After 10th Standard...
                                </p>
                            </div>
                       

                        </div>
     <a href="{{route('opportunites')}}" alt="image">
                        <button type="button" class="btn"  style="color:white !important; width: 100%;"  >
                                     Read More... 
    
                         </button>
		 </a>
                    </div>
                  
                </div>
                <div class="col-md-4">
                    <div class="flat-product">
                        <div class="featured-product">
                            <img src="{{asset('website_asset/images/Cover-photo.jpg')}}" alt="image">
                         
                        </div>
                    
                        <div class="content-product">
                      
                            <div class="text">
                                <p>Unlocking Your Potential: How Early Career ...
                                </p>
                            </div>
                       

                        </div>
    <a href="{{route('choosing')}}" title="">
                        <button type="button" class="btn" style="color:white !important; width: 100%;" >
                        
                                Read More... 
    
                         </button>
		</a>
                    </div>
                  
                </div>
                <div class="col-md-4">
                    <div class="flat-product">
                        <div class="featured-product">
                            <img src="{{asset('website_asset/images/featured-time-management-final.jpg')}}" alt="image">
                         
                        </div>
                    
                        <div class="content-product">
                           
                            <div class="text">
                                <p>Effective Study Habits and Time ...</p>
                            </div>
                       

                        </div>
<a href="{{route('stratigic')}}" title="">
                        <button type="button" class="btn" style="color:white !important; width: 100%;" >
                            
                                     Read More... 
    
                         </button>
	</a>
                    </div>
                  
                </div>
                <div class="col-md-4">
                    <div class="flat-product">
                        <div class="featured-product">
                            <img src="{{asset('website_asset/images/blog-cover-04.jpg')}}" alt="image">
                         
                        </div>
                    
                        <div class="content-product">
                           
                            <div class="text">
                                <p>The Role of Apprenticeships and Internships ...
                                </p>
                            </div>
                       

                        </div>
      <a href="{{route('benifite')}}" title="">
                        <button type="button" class="btn" style="color:white !important; width: 100%;" >
                      
                                     Read More... 
    
                         </button>
		  </a>
                    </div>
                  
                </div>
                <div class="col-md-4">
                    <div class="flat-product">
                        <div class="featured-product">
                            <img src="{{asset('website_asset/images/internship-training-in-chennai-kk-nagar-5.jpg')}}" alt="image">
                         
                        </div>
                    
                        <div class="content-product">
                          
                            <div class="text">
                                <p>The benefits and challenges of online learning ...
                                </p>
                            </div>
                       

                        </div>
    <a href="{{route('role')}}" title="">
                        <button type="button" class="btn" style="color:white !important; width: 100%;" >
                                     Read More... 
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
            $('#blog').hide();
        }); 

</script>
@stop
    