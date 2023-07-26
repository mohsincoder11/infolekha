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
                <div class="dashboard-title-item">Create job Vacancy</div>
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
                                        <select class="chosen-select on-radius no-search-select" name="vacancy_type"
                                            id="vacancy_type">
                                            <option value="">Select Type</option>
                                            {{-- <option>All</option> --}}
                                            <option value="teaching">Teaching Staff</option>
                                            <option value="admin">Admin Staff</option>
                                        </select>
                                    </div>
                                    <span id="vacancy_type_error_span"></span>
                                </div>

                                <span id="Teaching_staff_div" class="d-none">
                                    <div class="col-md-6 form-group">
                                        <label style="font-size:16px;">Name of Subject</label>
                                        <input type="text" placeholder="Name of Subject" value=""
                                            name="subject_name" />
                                    </div>
                                </span>

                                <span id="Admin_staff_div" class="d-none">
                                    <div class="col-md-6 form-group">
                                        <label style="font-size:16px;">Post </label>
                                        <input type="text" placeholder="Post" value="" name="post" />
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label style="font-size:16px;">Scope of work </label>
                                        <input type="text" placeholder="Scope of work" value=""
                                            name="scope_of_work" />
                                    </div>
                                </span>

                                <div class="col-md-6 form-group">
                                    <label style="font-size:16px;">Experience required</label>
                                    <input type="text" placeholder="Experience required" value=""
                                        name="experience_required" />
                                </div>


                                <div class="col-md-6 form-group">
                                    <label style="font-size:16px;">Skills Required</label>
                                    <input type="text" placeholder="Skills Required" value=""
                                        name="skills_required" />
                                </div>
                                <div class="col-md-6 form-group">
                                    <label style="font-size:16px;">Estimated Package </label>
                                    <input type="text" placeholder="Estimated Package " value=""
                                        name="estimated_package" />
                                </div>

                                <div class="col-md-6 form-group">
                                    <div class="listsearch-input-item ">
                                        <label>Select Type</label>
                                        <select class="chosen-select on-radius no-search-select" name="job_type">
                                            <option value="">Select Type</option>
                                            <option value="Part Time">Part Time</option>
                                            <option value="Full Time">Full Time</option>
                                            <option value="Remote">Remote</option>
                                        </select>
                                    </div>
                                    <span id="job_type_error"></span>

                                </div>


                            </div>



                            <button type="submit" class="btn color-bg  float-btn" style="float:center;">Save
                                Changes</button>

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
                                <th>Vacancy For</th>
                                <th>Subject</th>
                                <th>Experience Required</th>
                                <th>Skills</th>
                                <th>Estimated Package</th>
                                <th>Job Type</th>
                                <th>Post</th>
                                <th>Scope of Work</th>
                                <th>Action</th>
                            </tr>

                            @foreach ($vacancies as $vacancy)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $vacancy->vacancy_type == 'teaching' ? 'Teaching Staff' : 'Admin Staff' }}</td>
                                    <td>{{ $vacancy->subject_name ?? '' }}</td>
                                    <td>{{ $vacancy->experience_required }}</td>
                                    <td>{{ $vacancy->skills_required }}</td>
                                    <td>{{ $vacancy->estimated_package }}</td>
                                    <td>{{ $vacancy->job_type }}</td>
                                    <td>{{ $vacancy->post }}</td>
                                    <td>{{ $vacancy->scope_of_work }}</td>
                                    <td>
                                        <a class="" href="{{route('delete_job_vacancy',$vacancy->id)}}">
                                            <i class="fal fa-trash"></i>
                                            </a> 
                                            <a class="" href="{{route('school_profile.view-applied-job',$vacancy->id)}}">
                                                <i class="fal fa-eye"></i>
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
            $("#vacancy_type").on('change', function() {
                if ($(this).val() == 'admin') {
                    $("#Admin_staff_div").removeClass('d-none');
                    $("#Teaching_staff_div").addClass('d-none');
                } else {
                    $("#Teaching_staff_div").removeClass('d-none');
                    $("#Admin_staff_div").addClass('d-none');
                }
            })

            jQuery.validator.addMethod("decimal", function(value, element) {
                // Regular expression to match decimal values
                var decimalRegex = /^\d+(\.\d+)?$/;
                return this.optional(element) || decimalRegex.test(value);
            }, "Please enter a valid decimal value.");
            $("#job_form").validate({
                ignore: function(element) {
                    return $(element).is(":hidden") || $(element).parents(":hidden").length > 0;
                },
                rules: {
                    vacancy_type: {
                        required: true,

                    },
                    // subject_name: {
                    //     required: true,
                    // },
                    // post: {
                    //     required: true,
                    // },
                    // scope_of_work: {
                    //     required: true,
                    // },
                    experience_required: {
                        required: true,
                        number: true,
                        decimal: true
                    },
                    skills_required: {
                        required: true,
                    },
                    estimated_package: {
                        required: true,
                        number: true,
                        decimal: true
                    },
                    job_type: {
                        required: true,
                    },


                },
                messages: {
                    vacancy_type: {
                        required: "This field is required.",
                    },
                    subject_name: {
                        required: "This field is required.",
                    },
                    post: {
                        required: "This field is required.",
                    },
                    scope_of_work: {
                        required: "This field is required.",
                    },
                    experience_required: {
                        required: "This field is required.",
                        number: "Please enter valid value.",
                        decimal: "Please enter valid value."
                    },
                    skills_required: {
                        required: "This field is required.",
                    },
                    estimated_package: {
                        required: "This field is required.",
                        number: "Please enter valid value.",
                        decimal: "Please enter valid value."
                    },
                    job_type: {
                        required: "This field is required.",
                    },

                },
                submitHandler: function(form) {
                    return true;
                },
                errorPlacement: function(error, element) {
                    if (element.attr("name") === "vacancy_type") {
                        error.appendTo($('#vacancy_type_error_span'));
                    }
                    if (element.attr("name") === "job_type") {
                        error.appendTo($('#job_type_error'));
                    } else if (element.attr("name") != "vacancy_type" && element.attr("name") !=
                        "job_type") {
                        element.append('.form-group').after(error);

                    }


                },
            });

        })
    </script>
@stop
