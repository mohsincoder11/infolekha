@extends('Website.school_profile.layout')
@section('css')
    <style>
        label {
            z-index: 1 !important;
        }

        .d-none {
            display: none;
        }
    </style>

@stop
@section('profile_content')
    <div class="dashboard-content">
        <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dashboard Menu</div>
        <div class="container dasboard-container">
            <!-- dashboard-title -->
            <div class="dashboard-title fl-wrap">
                <div class="dashboard-title-item">Job For vacancy1</div>
                @include('Website.school_profile.profile_header')

                <!--Tariff Plan menu-->

                <!--Tariff Plan menu end-->
            </div>
            <!-- dashboard-title end -->
            <!-- dasboard-wrapper-->

            <div class="dasboard-widget-box fl-wrap">
                <div class="col-md-12">
                    <form action="{{ route('school_profile.insert_create_job_vacancy') }}" method="post" id="job_form">
                        @csrf
                        <div class="custom-form">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <div class="listsearch-input-item ">
                                        <label>Vacancy For</label>
                                        <p>{{ ucfirst($vacancy->vacancy_type) }}</p>
                                    </div>
                                </div>

                               @if($vacancy->vacancy_type=='teaching')
                                <span id="Teaching_staff_div" class="d-none">
                                    <div class="col-md-6 form-group">
                                        <label style="font-size:16px;">Name of Subject</label>
                                        <p>{{ ucfirst($vacancy->subject_name) }}</p>

                                    </div>
                                </span>
                                @endif
                                @if($vacancy->vacancy_type=='admin')

                                <span id="Admin_staff_div">
                                    <div class="col-md-6 form-group">
                                        <label style="font-size:16px;">Post </label>
                                        <p>{{ ucfirst($vacancy->post) }}</p>

                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label style="font-size:16px;">Scope of work </label>
                                        <p>{{ ucfirst($vacancy->scope_of_work) }}</p>

                                    </div>
                                </span>
                                @endif


                                <div class="col-md-6 form-group">
                                    <label style="font-size:16px;">Experience required </label>
                                    <p>{{ ucfirst($vacancy->experience_required) }}</p>

                                </div>


                                <div class="col-md-6 form-group">
                                    <label style="font-size:16px;">Skills Required</label>
                                    <p>{{ ucfirst($vacancy->skills_required) }}</p>

                                </div>
                                <div class="col-md-6 form-group">
                                    <label style="font-size:16px;">Estimated Package </label>
                                    <p>{{ ucfirst($vacancy->estimated_package) }}</p>

                                </div>

                                <div class="col-md-6 form-group">
                                    <div class="listsearch-input-item ">
                                        <label>Select Type</label>
                                        <p>{{ ucfirst($vacancy->job_type) }}</p>

                                    </div>

                                </div>


                            </div>



                          
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
                                <th>Tutor Name</th>
                                <th>Subject</th>
                                <th>Experience</th>
                                <th>CV</th>
                           </tr>

                            @foreach ($applied_jobs as $applied_job)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $applied_job->tutor_details->name ?? '' }}</td>  
                                    <td>{{ $applied_job->tutor_details->subject ?? '' }}</td>  
                                    <td>{{ $applied_job->tutor_details->experiance ?? '' }}</td>  
                                    <td>
                                        <a target="_blank" href="{{asset('public/'.$applied_job->tutor_details->cv)}}"> <i class="fa fa-download"></i>

                                        </a>
                                    </td>
                                    
                                   
                                 

                                </tr>
                            @endforeach




                        </table>



                    </div>

                </div>

            </div>
        </div>

    </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {









        })
    </script>
@stop
