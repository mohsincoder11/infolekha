@extends('layout')
@section('content')
    <!--start page wrapper -->

    <div class="page-wrapper">
        <div class="page-content">

@php
    $labels = ['January', 'February', 'March'];
$data = [10, 20, 30];

@endphp

            <!--end row-->
            <h6 class="mb-0 text-uppercase"></h6>
         


            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                <a href="{{route('admin.registration.school')}}"> 
                                       <p class="mb-0 text-secondary">Schools</p>
                                    <h4 class="my-1">{{ $count['school'] }}</h4>
                                    <p class="mb-0 font-13 text-success"></p>
                                </a>
                                </div>
                                <div class="widgets-icons bg-light-success text-success ms-auto">
                                <a href="{{route('admin.registration.school')}}"> 
                                    <i
                                        class="fadeIn animated bx bx-buildings"></i>
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                <a href="{{route('admin.registration.college')}}"> 
                                    <p class="mb-0 text-secondary">Colleges</p>
                                    <h4 class="my-1">{{ $count['college'] }}</h4>
                                </a>

                                </div>
                                <div class="widgets-icons bg-light-info text-info ms-auto">
                                <a href="{{route('admin.registration.college')}}"> 
                                    <i
                                        class="fadeIn animated bx bx-buildings"></i>
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                <a href="{{route('admin.registration.institute')}}"> 
                                    <p class="mb-0 text-secondary">Institutions</p>
                                    <h4 class="my-1">{{ $count['institute'] }}</h4>
                                </a>
                                </div>
                                <div class="widgets-icons bg-light-danger text-danger ms-auto">
                                <a href="{{route('admin.registration.institute')}}"> 
                                    <i
                                        class="fadeIn animated bx bx-buildings"></i>
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                <a href="{{route('admin.registration.student')}}"> 
                                    <p class="mb-0 text-secondary">Parents/Students</p>
                                    <h4 class="my-1">{{ $count['student'] }}</h4>
                                </a>
                                </div>
                                <div class="widgets-icons bg-light-info text-info ms-auto">
                                <a href="{{route('admin.registration.student')}}"> 
                                    <i class='bx bxs-group'></i>
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10">

                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <a href="{{ route('admin.announcement') }}">
                                        <p class="mb-0 text-secondary">Approved Announcements</p>
                                        <h4 class="my-1">{{ $count['announcement_active'] }}
                                        </h4>
                                    </a>
                                </div>
                                <div class="widgets-icons bg-light-success text-success ms-auto">
                                    <a href="{{ route('admin.announcement') }}">
                                        <i class="lni lni-checkmark"></i>
                                    </a>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <a href="{{ route('admin.announcement') }}">
                                        <p class="mb-0 text-secondary">Rejected Announcements</p>
                                        <h4 class="my-1">{{ $count['announcement_rejected'] }}</h4>
                                    </a>
                                </div>
                                <div class="widgets-icons bg-light-danger text-danger ms-auto">
                                    <a href="{{ route('admin.announcement') }}">
                                        <i class="lni lni-cross-circle"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <a href="{{ route('admin.advertisement') }}">
                                        <p class="mb-0 text-secondary">Approved Ads</p>
                                        <h4 class="my-1">{{ $count['advertisement_active'] }}</h4>
                                    </a>
                                </div>
                                <div class="widgets-icons bg-light-success text-success ms-auto">
                                    <a href="{{ route('admin.advertisement') }}">
                                        <i class="lni lni-checkmark"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <a href="{{ route('admin.advertisement') }}">
                                        <p class="mb-0 text-secondary">Rejected Ads</p>
                                        <h4 class="my-1">{{ $count['advertisement_rejected'] }}</h4>
                                    </a>
                                </div>
                                <div class="widgets-icons bg-light-danger text-danger ms-auto">
                                    <a href="{{ route('admin.advertisement') }}">
                                        <i class="lni lni-cross-circle">
                                        </i>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-xl-4 mx-auto">
                    <h6 class="mb-0 text-uppercase">User Type</h6>
                    <hr/>
                    <div class="card">
                        <div class="card-body">
                            <div class="chart-container1">
                                <canvas id="chart6"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
              

                <div class="col-xl-4 mx-auto">
                    <h6 class="mb-0 text-uppercase">User Register by month</h6>
                    <hr/>
                    <div class="card">
                        <div class="card-body">
                            <div class="chart-container1">
                                <canvas id="chart22"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                  <div class="col-xl-4 mx-auto">
                    <h6 class="mb-0 text-uppercase">Payment by month</h6>
                    <hr/>
                    <div class="card">
                        <div class="card-body">
                            <div class="chart-container1">
                                <canvas id="chart2"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-xl-4 mx-auto">
                    <h6 class="mb-0 text-uppercase">Line Chart</h6>
                    <hr/>
                    <div class="card">
                        <div class="card-body">
                            <div class="chart-container1">
                                <canvas id="chart1"></canvas>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-xl-4 mx-auto">
                    <h6 class="mb-0 text-uppercase">Announcements</h6>
                    <hr/>
                    <div class="card">
                        <div class="card-body">
                            <div class="chart-container1">
                                <canvas id="chart31"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 mx-auto">
                    <h6 class="mb-0 text-uppercase">Advertisements</h6>
                    <hr/>
                    <div class="card">
                        <div class="card-body">
                            <div class="chart-container1">
                                <canvas id="chart32"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 mx-auto">
                </div>
                <div class="col-xl-4 mx-auto">
                </div>

                {{-- <div class="col-xl-4 mx-auto">
                    <h6 class="mb-0 text-uppercase">Radar Chart</h6>
                    <hr/>
                    <div class="card">
                        <div class="card-body">
                            <div class="chart-container1">
                                <canvas id="chart4"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 mx-auto">
                    <h6 class="mb-0 text-uppercase">Polar Area Chart</h6>
                    <hr/>
                    <div class="card">
                        <div class="card-body">
                            <div class="chart-container1">
                                <canvas id="chart5"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
               
                <div class="col-xl-4 mx-auto">
                    <h6 class="mb-0 text-uppercase">Horizontal Bar Chart</h6>
                    <hr/>
                    <div class="card">
                        <div class="card-body">
                            <div class="chart-container1">
                                <canvas id="chart7"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 mx-auto">
                    <h6 class="mb-0 text-uppercase">Grouped Bar Chart</h6>
                    <hr/>
                    <div class="card">
                        <div class="card-body">
                            <div class="chart-container1">
                                <canvas id="chart8"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 mx-auto">
                    <h6 class="mb-0 text-uppercase">Mixed Chart</h6>
                    <hr/>
                    <div class="card">
                        <div class="card-body">
                            <div class="chart-container1">
                                <canvas id="chart9"></canvas>
                            </div>
                        </div>
                    </div>
                </div> --}}
              
            
                    </div>


            <div class="col-md-12">
                <h6 class="mb-0 text-uppercase"></h6>
                <hr />
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-primary" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab"
                                    aria-selected="true">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class='bx bx-home font-18 me-1'></i>
                                        </div>
                                        <div class="tab-title">School/College/Institution</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab"
                                    aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class='bx bx-user-pin font-18 me-1'></i>
                                        </div>
                                        <div class="tab-title">Student/Parent</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#primarycontact" role="tab"
                                    aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class='bx bx-microphone font-18 me-1'></i>
                                        </div>
                                        <div class="tab-title">Tutor/Faculty</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content py-3">
                            <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">

                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="example" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th> SN.</th>
                                                            <th>Name of School/College/Institution </th>
                                                            <th>Contact No</th>
                                                            <th>Email</th>
                                                            <th>Entity Name</th>
                                                            <th>Active [Payment Status]</th>
                                                            <th>Log In</th>
                                                            <th style="background-color: #ffff;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($school_institute_data as $dt)
                                                            <tr>
                                                                <td>{{ $loop->index + 1 }}</td>
                                                                <td>
                                                                    <div class="tooltip-wrap2">{{ $dt->r_name }}
                                                                        <div class="tooltip-content2">

                                                                            <label><b> SN</b>:{{ $dt->user_id }}</label><br>
                                                                            <label><b>Name of
                                                                                    School/College/Institution:</b>{{ $dt->r_name }}</label><br>
                                                                            <label><b>Name of
                                                                                    Entity:</b>{{ $dt->r_name }}</label><br>
                                                                            <label><b>Contact
                                                                                    Person:</b>{{ $dt->r_contact_person }}</label><br>
                                                                            <label><b>Mobile
                                                                                    No.:</b>{{ $dt->r_mob }}</label><br>
                                                                            <label><b>Email
                                                                                    Id:</b>{{ $dt->email }}</label><br>
                                                                            <label><b>Address:</b>{{ $dt->address }}</label><br>


                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    {{ $dt->mob }}
                                                                </td>


                                                                <td>
                                                                    {{ $dt->email }}

                                                                </td>

                                                                <td>{{ $dt->r_entity }}</td>
                                                                <td>
                                                                    <button type="button" class="btn">
                                                                        <div class="form-check form-switch">
                                                                            <input class="form-check-input "
                                                                                type="checkbox"
                                                                                value="{{ $dt->user_id }}"
                                                                                id="id{{ $dt->user_id }}"
                                                                                @if ($dt->active == 1) checked='true' @endif
                                                                                @if ($dt->subscription_status == 0) disabled @endif>
                                                                        </div>
                                                                        @if ($dt->subscription_status == 0)
                                                                            Not Paid
                                                                        @elseif ($dt->subscription_status == 1)
                                                                            Paid
                                                                        @endif
                                                                    </button>
                                                                </td>
                                                                <td>
                                                                    <div class="d-grid"> 
                                                                        <a target="_blank" class="btn btn-sm btn-outline-success radius-15" href="{{route('admin-login-to-user',$dt->user_id)}}">Log In</a>
                                                                    </div>
                                                                  
                                                                </td>


                                                                <td style="background-color: #ffff;">
                                                                    {{-- <button
                                                                        type="button" class="btn1 btn-outline-success"><i
                                                                            class='bx bx-edit-alt me-0'></i></button>--}}
                                                                    <a href="{{route('admin.delete-user',$dt->user_id)}}"
                                                                        class="btn btn-outline-danger"><i
                                                                            class='bx bx-trash me-0'></i></a> 
                                                                            @if ($dt->subscription_status == 0)
                                            
                                                                            <a href="{{route('admin.buy-subscription-email',$dt->user_id)}}" title="Send subscription mail" class="btn btn-outline-warning">
                                                                                <i
                                                                            class='bx bx-envelope me-0'></i>
                                                                            </a>
                                                                            @endif
                                                                </td>

                                                            </tr>
                                                        @endforeach


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="primaryprofile" role="tabpanel">

                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="example1" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th> SN.</th>
                                                            <th>Name Student/Parent </th>
                                                            <th>Contact No.</th>
                                                            <th>Email</th>
                                                            <th>Log In</th>
                                                            <th style="background-color: #ffff;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($student_data as $dt)
                                                            <tr>
                                                                <td>{{ $loop->index + 1 }}</td>
                                                                <td>
                                                                    <div class="tooltip-wrap2">{{ $dt->r_name }}
                                                                        <div class="tooltip-content2">

                                                                            <label><b> SN</b>:{{ $dt->user_id }}</label><br>
                                                                            <label><b>Name of
                                                                                    Student/Parent:</b>{{ $dt->r_name }}</label><br>

                                                                            <label><b>Name of Current
                                                                                    School/College:</b>{{ $dt->r_current_school_institute }}</label><br>

                                                                            <label><b>Contact
                                                                                    Person:</b>{{ $dt->r_name }}</label><br>

                                                                            <label><b>Mobile
                                                                                    No.:</b>{{ $dt->mob }}</label><br>

                                                                            <label><b>Email
                                                                                    Id:</b>{{ $dt->email }}</label><br>




                                                                        </div>
                                                                    </div>
                                                                </td>


                                            <td>
                                                <div class="tooltip-wrap3">{{ $dt->mob }}

                                                </div>
                                            </td>


                                            <td>
                                                {{ $dt->email }}

                                            </td>
                                            <td>
                                                <div class="d-grid"> <a target="_blank" class="btn btn-sm btn-outline-success radius-15" href="{{route('admin-login-to-user',$dt->user_id)}}">Log In</a>
                                                </div>
                                              
                                            </td>


                                            <td style="background-color: #ffff;"><button type="button"
                                                    class="btn1 btn-outline-success"><i
                                                        class='bx bx-edit-alt me-0'></i></button> <button type="button"
                                                    class="btn1 btn-outline-danger"><i
                                                        class='bx bx-trash me-0'></i></button> 
                                                    </td>

                                            </tr>
                                            @endforeach


                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="primarycontact" role="tabpanel">

                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example3" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th> SN.</th>
                                                        <th>Name of Tutor</th>
                                                        <th>Mobile</th>
                                                        <th>Email</th>
                                                        <th>Activation/Deactivation</th>
                                                        <th>Log In</th>
                                                        <th style="background-color: #ffff;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($tutor_data as $dt)
                                                        <tr>
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>
                                                                <div class="tooltip-wrap2">{{ $dt->name }}
                                                                    <div class="tooltip-content2">

                                                                        <label><b> SN</b>:{{ $dt->user_id }}</label><br>
                                                                        <label><b>Name of
                                                                                Tutor/Faculty</b>{{ $dt->r_name }}</label><br>
                                                                        <label><b>Mobile No.:
                                                                            </b>{{ $dt->mob }}</label><br>
                                                                        <label><b>Email
                                                                                Id:</b>{{ $dt->email }}</label><br>
                                                                        <label><b>State:</b></label><br>
                                                                        <label><b>City:</b></label><br>


                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                {{ $dt->mob }}
                                                            </td>
                                                            <td>
                                                                {{ $dt->email }}

                                                            </td>


                                                            <td>

                                                                <button type="button" value="{{ $dt->user_id }}"
                                                                    class="btn">
                                                                    <div class="form-check form-switch">
                                                                        <input class="form-check-input " type="checkbox"
                                                                            value="{{ $dt->user_id }}"
                                                                            id="id{{ $dt->user_id }}"
                                                                            @if ($dt->active == 1) checked='true' @endif
                                                                            @if ($dt->subscription_status == 0) disabled @endif>
                                                                    </div>
                                                                    @if ($dt->subscription_status == 0)
                                                                        Not Paid
                                                                    @elseif ($dt->subscription_status == 1)
                                                                        Paid
                                                                    @endif
                                                                </button>
                                                            </td>


                                                            <td>
                                                                <div class="d-grid"> <a target="_blank" class="btn btn-sm btn-outline-success radius-15" href="{{route('admin-login-to-user',$dt->user_id)}}">Log In</a>
                                                                </div>
                                                              
                                                            </td>
                                                            <td style="background-color: #ffff;"><button type="button"
                                                                    class="btn1 btn-outline-success"><i
                                                                        class='bx bx-edit-alt me-0'></i></button>
                                                                <button type="button" class="btn1 btn-outline-danger"><i
                                                                        class='bx bx-trash me-0'></i></button>
                                                            </td>

                                                        </tr>
                                                    @endforeach


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>




   @include('admin.registration.active-model')


    @stop


    <!--end page wrapper -->
    @section('js')
    <script src="{{asset('plugins/chartjs/js/Chart.min.js')}}"></script>
<script>
    $(function () {
	"use strict";
	// chart 1
	
    // var ctx = document.getElementById('chart1').getContext('2d');
	// var myChart = new Chart(ctx, {
	// 	type: 'line',
	// 	data: {
	// 		labels: ['Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa', 'Su'],
	// 		datasets: [{
	// 			label: 'Google',
	// 			data: [6, 20, 14, 12, 17, 8, 10],
	// 			backgroundColor: "transparent",
	// 			borderColor: "#0d6efd",
	// 			pointRadius: "0",
	// 			borderWidth: 4
	// 		}, {
	// 			label: 'Facebook',
	// 			data: [5, 30, 16, 23, 8, 14, 11],
	// 			backgroundColor: "transparent",
	// 			borderColor: "#f41127",
	// 			pointRadius: "0",
	// 			borderWidth: 4
	// 		}]
	// 	},
	// 	options: {
	// 		maintainAspectRatio: false,
	// 		legend: {
	// 			display: true,
	// 			labels: {
	// 				fontColor: '#585757',
	// 				boxWidth: 40
	// 			}
	// 		},
	// 		tooltips: {
	// 			enabled: false
	// 		},
	// 		scales: {
	// 			xAxes: [{
	// 				ticks: {
	// 					beginAtZero: true,
	// 					fontColor: '#585757'
	// 				},
	// 				gridLines: {
	// 					display: true,
	// 					color: "rgba(0, 0, 0, 0.07)"
	// 				},
	// 			}],
	// 			yAxes: [{
	// 				ticks: {
	// 					beginAtZero: true,
	// 					fontColor: '#585757'
	// 				},
	// 				gridLines: {
	// 					display: true,
	// 					color: "rgba(0, 0, 0, 0.07)"
	// 				},
	// 			}]
	// 		}
	// 	}
	// });
	// chart 2
	var transactionData = @json($transactions_chart);

        // Prepare data for the chart (you may need to format it as needed)
        var monthNames = [
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul',
            'Aug', 'Sept', 'Oct', 'Nov', 'Dec'
        ];
        var labels = [];
        var datasets = [];
        
        // Iterate through the transactionData and format it for the chart
        for (var i = 0; i < transactionData.length; i++) {
            var transaction = transactionData[i];
            var monthName = monthNames[transaction.month - 1]; // Adjust for zero-based index
            
            var label = monthName + ' ' + transaction.year;

            if (!labels.includes(label)) {
                labels.push(label);
            }

            if (!datasets[transaction.transaction_status]) {
                datasets[transaction.transaction_status] = {
                    label: transaction.transaction_status,
                    data: [],
                    backgroundColor: getRandomColor(),
                };
            }

            datasets[transaction.transaction_status].data.push(transaction.total_amount);
        }

        var ctx = document.getElementById("chart2").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: Object.values(datasets),
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: true,
                    labels: {
                        fontColor: '#585757',
                        boxWidth: 40
                    }
                },
                tooltips: {
                    enabled: true
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            beginAtZero: true,
                            fontColor: '#585757'
                        },
                        gridLines: {
                            display: true,
                            color: "rgba(0, 0, 0, 0.07)"
                        },
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            fontColor: '#585757'
                        },
                        gridLines: {
                            display: true,
                            color: "rgba(0, 0, 0, 0.07)"
                        },
                    }]
                }
            }
        });


        var transactionData2 = @json($user_register_by_month_chart);
        console.log(transactionData2)

        // Prepare data for the chart (you may need to format it as needed)
      
        var labels2 = [];
var datasets2 = {};
var colors = [];

// Iterate through the transactionData and format it for the chart
for (var i = 0; i < transactionData2.length; i++) {
    let transaction = transactionData2[i];
    let monthName = monthNames[transaction.month - 1]; // Adjust for zero-based index

    let label = monthName + ' ' + transaction.year;

    if (!labels2.includes(label)) {
        labels2.push(label);
    }

    if (!datasets2[transaction.year]) {
        datasets2[transaction.year] = {
            label: transaction.year.toString(),
            data: [],
        };
        colors.push(getRandomColor());
    }

    datasets2[transaction.year].data.push(transaction.total_user);
}

var ctx2 = document.getElementById("chart22").getContext('2d');
var myChart2 = new Chart(ctx2, {
    type: 'bar',
    data: {
        labels: labels2,
        datasets: Object.keys(datasets2).map(function (key, index) {
            return {
                label: key,
                data: datasets2[key].data,
                backgroundColor: '#0d6efd',
            };
        }),
    },
    options: {
        maintainAspectRatio: false,
        legend: {
            display: true,
            labels: {
                fontColor: '#585757',
                boxWidth: 40
            }
        },
        tooltips: {
            enabled: true
        },
        scales: {
            xAxes: [{
                ticks: {
                    beginAtZero: true,
                    fontColor: '#585757'
                },
                gridLines: {
                    display: true,
                    color: "rgba(0, 0, 0, 0.07)"
                },
            }],
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    fontColor: '#585757'
                },
                gridLines: {
                    display: true,
                    color: "rgba(0, 0, 0, 0.07)"
                },
            }]
        }
    }
});



        // Function to generate random colors for dataset backgrounds
        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }
	// chart 3
	new Chart(document.getElementById("chart31"), {
		type: 'pie',
		data: {
			labels: ["Pending","Active","Reject"],
			datasets: [{
				label: "Population (millions)",
				backgroundColor: ["#f2f233","#17a00e", "#f41127"],
				data: @json($announcement_chart)
			}]
		},
		options: {
			maintainAspectRatio: false,
			title: {
				display: true,
				text: 'Announcement Accept & Reject'
			}
		}
	});
    new Chart(document.getElementById("chart32"), {
		type: 'pie',
		data: {
			labels: ["Pending","Active","Reject"],
			datasets: [{
				label: "Population (millions)",
				backgroundColor: ["#f2f233","#17a00e", "#f41127"],
				data: @json($advertisement_chart)
			}]
		},
		options: {
			maintainAspectRatio: false,
			title: {
				display: true,
				text: 'Advertisement Accept & Reject'
			}
		}
	});
	// chart 4
	// new Chart(document.getElementById("chart4"), {
	// 	type: 'radar',
	// 	data: {
	// 		labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
	// 		datasets: [{
	// 			label: "1950",
	// 			fill: true,
	// 			backgroundColor: "rgb(13 110 253 / 23%)",
	// 			borderColor: "#0d6efd",
	// 			pointBorderColor: "#fff",
	// 			pointBackgroundColor: "rgba(179,181,198,1)",
	// 			data: [8.77, 55.61, 21.69, 6.62, 6.82]
	// 		}, {
	// 			label: "2050",
	// 			fill: true,
	// 			backgroundColor: "rgba(255,99,132,0.2)",
	// 			borderColor: "rgba(255,99,132,1)",
	// 			pointBorderColor: "#fff",
	// 			pointBackgroundColor: "rgba(255,99,132,1)",
	// 			pointBorderColor: "#fff",
	// 			data: [25.48, 54.16, 7.61, 8.06, 4.45]
	// 		}]
	// 	},
	// 	options: {
	// 		maintainAspectRatio: false,
	// 		title: {
	// 			display: true,
	// 			text: 'Distribution in % of world population'
	// 		}
	// 	}
	// });
	// chart 5
	// new Chart(document.getElementById("chart5"), {
	// 	type: 'polarArea',
	// 	data: {
	// 		labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
	// 		datasets: [{
	// 			label: "Population (millions)",
	// 			backgroundColor: ["#0d6efd", "#212529", "#17a00e", "#f41127", "#ffc107"],
	// 			data: [2478, 5267, 734, 784, 433]
	// 		}]
	// 	},
	// 	options: {
	// 		maintainAspectRatio: false,
	// 		title: {
	// 			display: true,
	// 			text: 'Predicted world population (millions) in 2050'
	// 		}
	// 	}
	// });
	// chart 6
	new Chart(document.getElementById("chart6"), {
		type: 'doughnut',
		data: {
			labels: ["School", "College", "Institute", "Parent/Student","Tutor"],
			datasets: [{
				label: "Population (millions)",
				backgroundColor: ["#0d6efd", "#212529", "#17a00e", "#f41127", "#ffc107"],
				data: @json($chart_count)
			}]
		},
		options: {
			maintainAspectRatio: false,
			title: {
				display: true,
				text: 'Total user by their type'
			}
		}
	});
	// chart 7
	// new Chart(document.getElementById("chart7"), {
	// 	type: 'horizontalBar',
	// 	data: {
	// 		labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
	// 		datasets: [{
	// 			label: "Population (millions)",
	// 			backgroundColor: ["#0d6efd", "#212529", "#17a00e", "#f41127", "#ffc107"],
	// 			data: [2478, 5267, 734, 784, 433]
	// 		}]
	// 	},
	// 	options: {
	// 		maintainAspectRatio: false,
	// 		legend: {
	// 			display: false
	// 		},
	// 		title: {
	// 			display: true,
	// 			text: 'Predicted world population (millions) in 2050'
	// 		}
	// 	}
	// });
	// chart 8
	// new Chart(document.getElementById("chart8"), {
	// 	type: 'bar',
	// 	data: {
	// 		labels: ["1900", "1950", "1999", "2050"],
	// 		datasets: [{
	// 			label: "Africa",
	// 			backgroundColor: "#0d6efd",
	// 			data: [133, 221, 783, 2478]
	// 		}, {
	// 			label: "Europe",
	// 			backgroundColor: "#f41127",
	// 			data: [408, 547, 675, 734]
	// 		}]
	// 	},
	// 	options: {
	// 		maintainAspectRatio: false,
	// 		title: {
	// 			display: true,
	// 			text: 'Population growth (millions)'
	// 		}
	// 	}
	// });
	// chart 9
	// new Chart(document.getElementById("chart9"), {
	// 	type: 'bar',
	// 	data: {
	// 		labels: ["1900", "1950", "1999", "2050"],
	// 		datasets: [{
	// 			label: "Europe",
	// 			type: "line",
	// 			borderColor: "#673ab7",
	// 			data: [408, 547, 675, 734],
	// 			fill: false
	// 		}, {
	// 			label: "Africa",
	// 			type: "line",
	// 			borderColor: "#f02769",
	// 			data: [133, 221, 783, 2478],
	// 			fill: false
	// 		}, {
	// 			label: "Europe",
	// 			type: "bar",
	// 			backgroundColor: "rgba(0,0,0,0.2)",
	// 			data: [408, 547, 675, 734],
	// 		}, {
	// 			label: "Africa",
	// 			type: "bar",
	// 			backgroundColor: "rgba(0,0,0,0.2)",
	// 			backgroundColorHover: "#3e95cd",
	// 			data: [133, 221, 783, 2478]
	// 		}]
	// 	},
	// 	options: {
	// 		maintainAspectRatio: false,
	// 		title: {
	// 			display: true,
	// 			text: 'Population growth (millions): Europe & Africa'
	// 		},
	// 		legend: {
	// 			display: false
	// 		}
	// 	}
	// });
	// chart 10
	if($("#chart10").length > 0) {
	new Chart(document.getElementById("chart10"), {
		type: 'bubble',
		data: {
			labels: "Africa",
			datasets: [{
				label: ["China"],
				backgroundColor: "#17a00e",
				borderColor: "#17a00e",
				data: [{
					x: 21269017,
					y: 5.245,
					r: 15
				}]
			}, {
				label: ["Denmark"],
				backgroundColor: "#ffc107",
				borderColor: "#ffc107",
				data: [{
					x: 258702,
					y: 7.526,
					r: 10
				}]
			}, {
				label: ["Germany"],
				backgroundColor: "#17a00e",
				borderColor: "#17a00e",
				data: [{
					x: 3979083,
					y: 6.994,
					r: 15
				}]
			}, {
				label: ["Japan"],
				backgroundColor: "#f41127",
				borderColor: "#f41127",
				data: [{
					x: 4931877,
					y: 5.921,
					r: 15
				}]
			}]
		},
		options: {
			maintainAspectRatio: false,
			title: {
				display: true,
				text: 'Predicted world population (millions) in 2050'
			},
			scales: {
				yAxes: [{
					scaleLabel: {
						display: true,
						labelString: "Happiness"
					}
				}],
				xAxes: [{
					scaleLabel: {
						display: true,
						labelString: "GDP (PPP)"
					}
				}]
			}
		}
	});
}
});
</script>
         <script>
            $(document).on('click', ".form-check-input", function() {
                let variable_id = $(this).val();
                const a = $(String('#' + variable_id));
                $("#id_val").val($(this).val());
                $("#user_id_span").text($(this).val());
                
                $('#exampleModal').modal({
                    keyboard: false,
                    backdrop: "static"
                });
                if (a.is(':Checked')) {
                    $('#exampleModal').modal('show');

                } else {
                    $('#exampleModal').modal('show');
                }

            });
         
        </script>
         


    @stop
