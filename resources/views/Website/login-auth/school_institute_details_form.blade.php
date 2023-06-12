@extends('website_layout')
@section('website_content')


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
							<h3 class="title" style="color:white;">Welcome</h3><br>
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
									
                                         <form method="post" action="{{url('school_institute_detail_create')}}"  class="form-profile" enctype="multipart/form-data" id="form2">
                                             @csrf
                                        <div class="row">
                                      
                                            <div class="col-md-8">

                                                <div>
                                                   
                                                    <div class="row">                                                   
                                                            <div class="col-lg-6">
                                                            
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Name of {{$data->r_entity}}</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Name" value="{{$data->r_name}}" name="school_institute"  required="required" ><!--name="school_institute" -->
                                                                      
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Address*</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Address" name="address" required="required" value="{{$data->address}}" >
                                                                      
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label class="form-control-label">About
                                                                        School/College/institution (Max. 500 
                                                                        Alphabets)  <span id="charcount">0 out of 500 characters</span></label><br>
                                                                    <span id=charcount></span>
																	<textarea minlength="20" onkeyup="charcountupdate(this.value)" name="about" id="about"></textarea>

                                                                     


                                                                </div>
                                                            </div>



                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Pin Code*</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Enter your Pin code" name="pin_code" required="required">
                                                                      
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
                                                                        placeholder="Registration No" name="registration_no" >
                                                                      
                                                                </div>
                                                            </div>


                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Contact No</label>
                                                                    <input type="text" readonly class="form-control"
                                                                        placeholder="Contact No" name="mob" value="{{$data->r_mob}}" required="required" >
                                                                      
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Email ID*</label>
                                                                    <input readonly type="text" class="form-control"
                                                                        placeholder="Email ID" value="{{$data->email}}" name="email" required="required">
                                                                       
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Website</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Website-URL" name="website" >
                                                                     
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
                                                                        placeholder="Instagram-URL " name="insta" >
                                                                        
                                                                </div>
                                                            </div>


                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Google
                                                                        Business</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Google Business URL" name="google" >
                                                                      
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Youtube</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Youtube-URL " name="yt" >
                                                                      
                                                                </div>
                                                            </div>
                                                         
														
                                                         @if($data->r_entity =='School')
                                                           <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Select School*</label>
                                                                    <select class="form-select select country-select"
                                                                        name="school" required="required"> 
                                                                        <option>Select </option>
                                                                        @foreach ($school_type as $school_type )
                                                                            <option value="{{$school_type->id}}">{{$school_type->type}}</option>
                                                                        @endforeach
																		
                                                                       
                                                                        <option>Other (Please Specify)</option>
                                                                        <option></option>
                                                                    </select>
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
                                                                        name="college" >
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
                                                                        name="institute"  required="required">
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
																	<select id="course" name="course[]"  class="form-select select country-select"  multiple >
                                                                        <option>Select Courses </option>
																		@if('School'== $data->r_entity)
                                                                       <option> 1 Nursery </option>
                                                                        <option> Pre-Primary </option>
                                                                        <option> Primary </option>
                                                                        <option>Junior KG
                                                                        <option> Senior KG </option>
                                                                        <option>1 st Standard </option>
                                                                        <option> 2nd Standard </option>
                                                                        <option> 3rd Standard</option>
                                                                        <option> 4th Standard </option>
                                                                        <option> 5th Standard </option>
                                                                        <option> 6th Standard </option>
                                                                        <option> 7th Standard </option>
                                                                        <option> 8th Standard </option>
                                                                        <option> 9th Standard </option>
                                                                        <option> 10th Standard</option>
																		@endif
																		@if('College'== $data->r_entity)
                                                                        <option> 11th </option>
                                                                        <option> 12th
                                                                        <option> B.com </option>
                                                                        <option> M.com </option>
                                                                        <option> LLB </option>
                                                                        <option> LLM </option>
                                                                        <option> BBA </option>
                                                                        <option> MBA </option>
                                                                        <option> CA Foundation </option>
                                                                        <option> CA IPCC </option>
                                                                        <option> CA Final </option>
                                                                        <option> CS Foundation </option>
                                                                        <option> CS Executive </option>
                                                                        <option> CS Professional </option>
                                                                        <option> ICWA Foundation </option>
                                                                        <option> ICWA Inter </option>
                                                                        <option> ICWA Final </option>
                                                                        <option> Bachelor in Technology (B.Tech)
                                                                        </option>
                                                                        <option> Bachelor in Engineering (BE) </option>
                                                                        <option> JEE-Main </option>
                                                                        <option> GATE </option>
                                                                        <option> UPCET </option>
                                                                        <option> BITSAT </option>
                                                                        <option> Bachelor of Science (B. Sc.) </option>
                                                                        <option> Bachelor of Architecture ( B.Arch.)
                                                                        </option>
                                                                        <option> Architecture Designer </option>
                                                                        <option> Interior Designer </option>
                                                                        <option> Software Engineer </option>
                                                                        <option> Research Analyst </option>
                                                                        <option> MBBS (Bachelor of Medicine and Bachelor
                                                                            of Surgery) </option>
                                                                        <option> NEET Entrance exam </option>
                                                                        <option> BDS (Bachelor of Dental Surgery)
                                                                        </option>
                                                                        <option> Botany/Zoology/Chemistry </option>
                                                                        <option> Biochemistry </option>
                                                                        <option> BHMS (Bachelor of Homeopathy Medicine
                                                                            and Surgery) </option>
                                                                        <option> B. Pharmacy </option>
                                                                        <option> BPT (Bachelor of Physiotherapy)
                                                                        </option>
                                                                        <option> BAMS (Bachelor of Ayurvedic Medicine
                                                                            Surgery)</option>
                                                                        <option> BUMS (Bachelor of Unani Medicine and
                                                                            Surgery) </option>
                                                                        <option> Bioinformatics </option>
                                                                        <option> Genetics </option>
                                                                        <option> Forensic Sciences </option>
                                                                        <option> Biotechnology </option>
                                                                        <option> Environmental Science </option>
                                                                        <option> Nursing </option>
                                                                        <option> Bachelor in Business Studies </option>
                                                                        <option> Bachelor of Legislative Law </option>
                                                                        <option> CLAT </option>
                                                                        <option> Bachelor of Management Studies
                                                                        </option>
                                                                        <option> Certified Financial Planner (CFP)
                                                                        </option>
                                                                        <option> Financial Analyst and Advisor </option>
                                                                        <option> Investment Banking Analyst </option>
                                                                        <option> Bachelor of Arts (BA) - 3 years
                                                                        </option>
                                                                        <option> Master of Arts (MA) </option>
                                                                        <option> Bachelor of Computer Application (BCA)
                                                                            - 3 years </option>
                                                                        <option> Bachelor of Hotel Management (BHM)
                                                                        </option>
                                                                        <option> Bachelor of Journalism & Mass
                                                                            Communication (BJMC) - 3 years</option>
                                                                        <option> Bachelor of Elementary Education
                                                                            (B.El.Ed) - 4 years </option>
                                                                        <option> Bachelor of Fine Arts (BFA) - 3 years
                                                                        </option>
                                                                        <option> Fashion Designing - 3 to 4 years
                                                                        </option>
                                                                        <option> Diploma in IT </option>
																		@endif
																		@if('Institute'== $data->r_entity)
                                                                        <option> Yoga </option>
                                                                        <option> Photography </option>
                                                                        <option> Acting and Anchoring </option>
                                                                        <option> Junior Basic Training (JBT) </option>
                                                                        <option> Travel and Tourism </option>
                                                                        <option> Event Management </option>
                                                                        <option> Paramedical Courses </option>
                                                                        <option> Nursing courses </option>
                                                                        <option> Web Designing </option>
                                                                        <option> Digital Marketing</option>
                                                                        <option> Graphic Design
                                                                        <option> Tally </option>
                                                                        <option> Interior Design </option>
                                                                        <option> Beautician </option>
                                                                        <option> Hardware and Networking </option>
                                                                        <option> Photography </option>
                                                                        <option> Air Hostess </option>
                                                                        <option> MSCIT </option>
                                                                        <option> MS-Excel </option>
                                                                        <option> MS-Word </option>
                                                                        <option> MS-Powerpoint </option>
                                                                        <option> Computer Clases </option>
                                                                        <option> DTP Classes </option> 
																		@endif
																		<option> Other </option> 

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6" >
                                                                <div class="form-group">
                                                                    <label class="form-control-label"> Office
                                                                        Timings (From)</label>
                                                                    
                                                                    <input type="text" id="timepicker-12-hr" name="timepicker-12-hr" class="timepicker-12-hr">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6" >
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Office
                                                                        Timings (To)</label>
                                                                        <input type="text" id="timepicker-12-hr" name="timepicker-12-hr" class="timepicker-12-hr">
                                                                      
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label class="form-label"> Facilities*</label>
                                                                    <!--<select class="form-select select country-select"
                                                                    name="facilities"  required="required">-->
																<select id="facilities" name="facilities[]"  class="form-select select country-select"  multiple >
                                                                        <option>Select Facilities </option>
																		
                                                                      <option>Classrooms</option> 
                                                                       <option>Digital classroom</option> 
                                                                        <option>Playground & Sports facilities</option> 
                                                                        <option>A/c classroom</option> 
                                                                        <option>Canteen / Cafeterias</option> 
                                                                        <option>Security System (CCTV, Security Guards, Other)</option> 
                                                                        <option>Biometric Attendance Monitoring System</option> 
                                                                        <option>Library</option> 
                                                                        <option>Computer Lab</option> 
                                                                        <option>Laboratories </option> 
                                                                        <option>Garden</option> 
                                                                        <option>Conference rooms</option> 
                                                                        <option>Auditoriums</option> 
                                                                        <option>Transportation</option> 
                                                                        <option>Indoor sports arena</option> 
                                                                        <option>Amphitheatre</option> 
                                                                        <option>Multipurpose Hall.</option> 
                                                                        <option>Counselling Centre</option> 
                                                                        <option>Activity Rooms</option> 
                                                                        <option>Art rooms</option> 
                                                                        <option>Mathematics Laboratory</option> 
                                                                        <option>Health center</option> 
                                                                        <option>Art studios</option> 
                                                                        <option>Music rooms</option> 
                                                                        <option>Administrative offices</option> 
                                                                        <option>Restrooms</option> 
                                                                        <option>Parking lots</option> 
                                                                        <option>Outdoor learning spaces</option> 
                                                                        <option>Career and technical education facilities</option> 
                                                                        <option>Multi-purpose rooms</option> 
                                                                        <option> Daycare facilities</option> 
                                                                        <option>Storage areas</option> 
                                                                        <option>Staff lounges</option> 
                                                                        <option>Conference rooms</option> 
                                                                        <option>Prayer and meditation rooms</option> 
                                                                       <option> Reading corners</option> 
                                                                       <option> Emergency response resources</option> 
                                                                       <option>Innovation centers</option> 
                                                                       <option>Distance learning facilities</option> 
                                                                       <option>Athletic facilities</option> 
                                                                       <option>Parent resource centers</option> 
                                                                       <option>Lecture halls</option> 
                                                                       <option>	Dormitories and housing facilities</option> 
                                                                       <option>Student-run enterprises</option> 
                                                                        
                                                            

                                                                    </select>
                                                                </div>
                                                            </div>



                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Upload Photos of
                                                                        School (Max. 5 )</label>
                                                                    <input type="file" class="form-control" name="image[]"  multiple accept="image/*">
                                                                    
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Upload Video of
                                                                        School (Max. 2)</label>
                                                                    <input type="file" class="form-control" name="video[]" multiple  accept="video/*" >
                                                                   
                                                                </div>
                                                            </div>

                                            
                                                      
														
														
                                                           <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <div class="row policy_checkbox_class" style="margin-left: 1%;">
                                                           <input class="form-control-lable" type="checkbox" name="policy_checkbox" id="checkbox" style="margin-right: 1%;" >
  <label for="checkbox">I have read and accepted the <spam style="color:#073D5F"  onclick="openPopup1()">Terms & Condition</spam></label>	


                                                         </div>
                                                        <div id="popup1" class="popup1" style="overflow-y: scroll !important;">
                                                            <a class="close-btn1" onclick="closePopup1()"><i class="fas fa-times"></i></a>
                                                             <br>
                                                                <!-- Popup1 content goes here -->
                                                             <p>
                                                                <p>
																	<h4> <b>TERMS & CONDITION</b></h4><p style="color:#000;">As a authorised representative of above mentioned educational institution I hereby declare and accept following terms and conditions</p></p>
                                                              <p><b>  1.</b>	By signing up for a listing on INFOlekha.org, we confirm that we are a legitimate educational institution, and that all information provided to INFOlekha.org is accurate and up-to-date. We understand that INFOlekha.org has the right to verify the information provided and may remove our listing if any information is found to be false or misleading.</p><br>
                                                                
                                                                <p><b>2.</b>	We acknowledge that by listing on INFOlekha.org, we agree to provide timely and accurate updates to any changes in our institution's information, including contact details, programs offered, admission requirements, and any other relevant information.</p><br>
                                                                
                                                               <p><b> 3. </b>We understand that INFOlekha.org is not responsible for any decisions made by students or parents based on our institution's information listed on the website. We also agree that INFOlekha.org is not responsible for any disputes that may arise between us and any students, parents, or other parties.</p><br>
                                                                
                                                               <p><b>4.</b> 	We acknowledge that INFOlekha.org may use our institution's information, including logo and images, for promotional purposes on the website and in other marketing materials.</p><br>
                                                                
                                                                <p><b>5.
																	</b>	We agree to indemnify and hold harmless INFOlekha.org, its affiliates, and its directors, officers, employees, and agents from and against any claims, damages, liabilities, costs, and expenses arising from our institution's listing on the website, including any inaccuracies or omissions in our institution's information, and any disputes or other issues that may arise between us and any students, parents, or other parties.</p><br>
                                                                
                                                               <p><b> 6.</b>	We acknowledge that INFOlekha.org may use third-party vendors or service providers to assist in the provision of the website and its services. We understand that these vendors or service providers may have access to our institution's data for the purpose of providing their services to INFOlekha.org. We agree that INFOlekha.org is not responsible for the actions or omissions of any third-party vendors or service providers.</p><br>
                                                                
                                                               <p><b> 7.</b>	We also acknowledge that we are responsible for ensuring the security of our institution's login credentials for the website. We agree to notify INFOlekha.org immediately if we suspect any unauthorized use of our login credentials.</p><br>
                                                                
                                                               <p><b> 8.</b>	We understand that INFOlekha.org may terminate our institution's listing on the website at any time, with or without cause. We also understand that we may terminate our institution's listing on the website at any time, but that any fees paid to INFOlekha.org are non-refundable.</p><br>
                                                                
                                                              <p><b>  9.</b>	This declaration constitutes the entire agreement between our institution and INFOlekha.org and supersedes all prior or contemporaneous agreements or understandings, whether written or oral. Any modifications to this declaration must be made in writing and signed by both parties.<br>
                                                                
                                                               <p><b> 10.</b>	We have the authority to enter into this declaration on behalf of our institution and have read and understand its terms and conditions.</p><br>
                                                                
                                                               <p><b> 11.</b>	This declaration shall be governed by and construed in accordance with the laws of India, without giving effect to any principles of conflicts of law.</p><br>
                                                                
                                                               <p><b> 12.</b>	Furthermore, we have read and understood the terms and conditions of INFOlekha.org and agree to abide by them. We also acknowledge that INFOlekha.org may update the terms and conditions from time to time, and it is our responsibility to review them regularly.</p><br>
                                                                
                                                               <p><b>13.</b>	By signing up for a listing on INFOlekha.org, we acknowledge that we have read and understood this declaration and agree to be bound by its terms and conditions.<br>
                                                             
                                                                </p>

                                                               
                                                       </div>
												
                                                    </div>
                                                  </div>
													

                                                             <div class="update-profile" style="margin-left: 47%; margin-top: 5%;">
                                                                

                                                            
                                                                <button type="submit"
                                                                    class="btn btn-primary" > <i class="fa fa-hand-o-right" aria-hidden="true"></i> Submit</button>
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
                                                <input id="image1" type="file" name="logo" style="display:none;">
                                                <img  id="category-img-tag" src="{{asset('website_asset/images/223.jpg')}}" class="dropzone" >
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

    
				
					
					



@stop
@section("js")

<script>
function charcountupdate(str) {
	var lng = str.length;
    console.log(lng);
	document.getElementById("charcount").innerHTML = lng + ' out of 500 characters';
	
}
</script>
<script>
        function openPopup1() {
            
                document.getElementById('popup1').style.display = 'block';
           
        }
        function closePopup1() {
            document.getElementById('popup1').style.display = 'none';
        }
    </script>





<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script> 	
$(document).ready(function(){
	$('#course').select2({closeOnSelect:true}); 
 $('#course').on('change', function() {  const selectedOptions = $(this).val(); 
 const otherOption = selectedOptions.includes('other'); 
 if (otherOption) {  $('#other-fruit').show();  } else {  $('#other-fruit').hide();  }  });


$('#facilities').select2({closeOnSelect:false}); 
 $('#facilities').on('change', function() {  const selectedOptions = $(this).val(); 
 const otherOption = selectedOptions.includes('other'); 
 if (otherOption) {  $('#other-fruit').show();  } else {  $('#other-fruit').hide();  }  });

	


});

	

</script> 
<script>
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
</script>



<!-- jQuery -->

<!-- Timepicker Js -->
<script src="{{asset('js/wickedpicker.min.js')}}"></script>

<script>
  var twelveHour = $('.timepicker-12-hr').wickedpicker();
            $('.time').text('//JS Console: ' + twelveHour.wickedpicker('time'));
            $('.timepicker-24-hr').wickedpicker({twentyFour: true});
            $('.timepicker-12-hr-clearable').wickedpicker({clearable: true});
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
        // Regular expression pattern
        var urlPattern = /^(https?:\/\/)([\w.-]+)\.([a-zA-Z]{2,6})(\/\S*)?$/;
        return this.optional(element) || urlPattern.test(value);
      }, "Please enter a valid URL starting with http:// or https://");
     

      




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
        httpOrHttpsUrl: "Please enter valid https/http url.",
      },
      fb: {
        httpOrHttpsUrl: "Please enter valid https/http url.",
      },
      insta: {
        httpOrHttpsUrl: "Please enter valid https/http url.",
      },
      google: {
        httpOrHttpsUrl: "Please enter valid https/http url.",
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