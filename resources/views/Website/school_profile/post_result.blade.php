@extends('Website.school_profile.layout')
@section('css')

@stop

@section('profile_content')
    <div class="dashboard-content">
        <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dashboard Menu</div>
        <div class="container dasboard-container">
            <!-- dashboard-title -->
            <div class="dashboard-title fl-wrap">
                <div class="dashboard-title-item">Upload Result</div>
                @include('Website.school_profile.profile_header')


<<<<<<< HEAD
            </div>


            <div class="col-md-12">
                <div class="list-searh-input-wrap-title fl-wrap"></div>
                <div class="block-box fl-wrap search-sb" id="filters-column">
                    <div class="row">
                        <div class="col-md-4">
                            <form action="{{ route('school_profile.insert_post_result') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="listsearch-input-item">

                                    <label>Upload File</label>
                                    <input type="file" onClick="this.select()" value="" name="file" />
                                </div>
                        </div>
                        <div class="col-md-4">
                            <div class="listsearch-input-item">
                                <label>For Academic Year</label>
                                <select class="chosen-select on-radius no-search-select" id="ddlYears" name="year">

                                    @for ($i = intval(date('Y')); $i >= 1951; $i--)
                                        <option>{{ $i }}-{{ $i - 1 }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>




                        {{-- <div class="col-md-4">
=======
        <div class="col-md-12">
            <div class="list-searh-input-wrap-title fl-wrap"></div>
            <div class="block-box fl-wrap search-sb" id="filters-column">
                <div class="row">
                    <div class="col-md-4">
<form action="{{route('school_profile.create_post_result')}}" method="POST" enctype="multipart/form-data" >
    @csrf
                        <div class="listsearch-input-item">

                            <label>Upload Banner</label>
                            <input type="file" onClick="this.select()" value="" name="image"/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="listsearch-input-item">
                            <label>For Year</label>
                            <select class="chosen-select on-radius no-search-select" id="ddlYears" name="year">
                                <?php
                                $currentYear = date('Y');
                                $startYear = $currentYear - 10; // Start from 10 years ago
                                $endYear = $currentYear + 20; // End 20 years in the future
                    
                                for ($year = $startYear; $year <= $endYear; $year++) {
                                    $yearRange = $year . '-' . ($year + 1);
                                    $selected = ($yearRange == $currentYear . '-' . ($currentYear + 1)) ? 'selected' : '';
                                    echo "<option value='$yearRange' $selected>$yearRange</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    
                    
                    
                    {{-- <div class="col-md-4">
>>>>>>> 4687ef0c2deca25b9e8e1e5e8fda764c3243943d
                        <div class="listsearch-input-item">

                            <label>Uload PDF</label>
                            <input type="file" onClick="this.select()" value="" />
                        </div>
                    </div> --}}
<<<<<<< HEAD


                        <div class="col-md-4">



                            <button type="submit" class="btn  color-bg  float-btn">Save </button>
                        </div>
                        </form>
                    </div>
                    <div class="col-md-12" style="margin-top: 20px;">
                        <hr>
                    </div>

                    <div class="col-md-12">

                        <div class="row" style="margin-top:20px;">


                                    <table id="customers">
                                        <tr>
                                            <th>Sr.no</th>
                                            <th>File</th>
                                            <th>Academic Year</th>
                                            <th>Delete</th>
                                        </tr>
                                       
                                       
                                        @foreach($school_post_result as $post_result)
                                        @php
                                        $string = $post_result->file;
                                        $extension = pathinfo($string, PATHINFO_EXTENSION);
                                        $image_extension_array=['jpg', 'png', 'gif','jpeg','JPG','PNG','JPEG','GIF'];
                                         @endphp
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                @if(in_array($extension, $image_extension_array))
                                                <a target="_blank" href="{{asset('public')."/".$post_result->file}}">
                                                    <img height="50px" width="50px" src="{{asset('public')."/".$post_result->file}}" alt="" />
                                                </a>
                                                    @else
                                                    <a target="_blank" href="{{asset('public')."/".$post_result->file}}">
                                                       Click here to open
                                                    </a>
                                                    @endif
                    
                                            </td>
                                            <td>
                                                <label>{{$post_result->start_year}}-{{$post_result->end_year}}</label>
    
                                            </td>
                                            <td>
                                                <a href="{{route('school_profile.destroy_post_result',$post_result->id)}}">
                                                    <button class="btn color-bg  float-btn" style="padding: 5px 25px;"><i
                                                            class="fa fa-trash" aria-hidden="true"></i> Delete</button></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                      
                                    </table>



                            </div>

                        </div>
=======

                 
                    <div class="col-md-4">
                                 


                        <button type="submit" class="btn  color-bg  float-btn">Save </button>
                    </div>
                </form>
                </div>
                <div class="col-md-12" style="margin-top: 20px;">
                    <hr>
                </div>

                <div class="col-md-12">
                    @foreach ($school_post_result as $post_result)

                    <div class="row" style="margin-top:20px;">
                                           
                        <div class="col-md-4">
                            <div class="widget-posts-img">  
                            <a href="{{asset('public')."/".$post_result->upload_banner}}">
                                <img height="50px" width="50px" src="{{asset('public')."/".$post_result->upload_banner}}" alt="" /></a>
                                                   
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="listsearch-input-item">
                                <label>{{$post_result->year}}</label>
                            </div>
                        </div>
                      
                        <div class="col-md-4">
                            <a href="{{route('school_profile.destroy_post_result',$post_result->id)}}">
                            <button class="btn color-bg  float-btn" style="padding: 5px 25px;"><i
                                    class="fa fa-trash" aria-hidden="true"></i> Delete</button></a>
                        </div>
                               
                  
                    </div>
                    @endforeach
>>>>>>> 4687ef0c2deca25b9e8e1e5e8fda764c3243943d
                </div>
                
            
            </div>


        </div>
    </div>
@stop
