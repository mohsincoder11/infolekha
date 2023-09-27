@extends('layout')
@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    @include('alerts')

                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">

                                <h5 class="mb-0 text-primary">Edit Subscription</h5>
                            </div>
                            <hr>

                            <form class="row g-2" action="{{ route('admin.master.update_subscription') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $edit->id }}">
                                <div class="col-md-12"></div>

                                <div class="col-md-3">
                                    <label class="form-label">Plan Name</label>
                                    <input class="form-control " type="text" placeholder="Plan Name"
                                        aria-label="default input example" name="plan" value="{{ $edit->plan }}">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Amount</label>
                                    <input class="form-control " type="text" placeholder="Amount"
                                        aria-label="default input example" name="amount" value="{{ $edit->amount }}">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">User Type</label>		
                                    <select class="form-select mb-3" aria-label="Default select example" name="user_type" id="user_type">
                                        <option selected disabled>Select User</option>
                                        <option value="1"  @if ($edit->user_type == '1') selected @endif>School/Institute/College</option>
                                        <option value="2"  @if ($edit->user_type == '2') selected @endif>Tutor</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Select Duration</label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="type" id="type">
                                        <option selected>Select Type</option>
                                        <option value="Month" @if ($edit->type == 'Month') selected @endif>Month
                                        </option>
                                        <option value="Year" @if ($edit->type == 'Year') selected @endif>Year
                                        </option>
                                        <option value="Days" @if ($edit->type == 'Days') selected @endif>Days
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-4 @if($edit->type != 'Days') d-none @endif" id="days_div">
                                    <label class="form-label">Enter Days</label>
                                    <input class="form-control" type="number" step="1" name="days" value="{{$edit->days}}"
                                        id="days">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="status">
                                        <option value="active" @if ($edit->status == 'active') selected @endif>Active
                                        </option>
                                        <option value="inactive" @if ($edit->status == 'inactive') selected @endif>Inactive
                                        </option>

                                    </select>
                                </div>
                                <div class="col-md-12 @if ($edit->user_type != '2') d-none @endif " id="view_once">
                                    <div class="form-check" style="padding-left:1.5em !important;">
                                        <input class="form-check-input" type="checkbox" name="view_once" id="gridCheck"
                                            value="1" @if ($edit->view_once == '1') checked @endif>
                                        <label class="form-check-label" for="gridCheck">View Job Once</label>
                                    </div>
                                </div>

                                <div class="col-md-12" style="margin-top:2%;">
                                    <button type="submit" class="btn btn-primary px-3"><i class="lni lni-circle-plus"></i>
                                        Update </button>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>



            <!--end page wrapper -->
            <!--start overlay-->
            <div class="overlay toggle-icon"></div>
            <hr />
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>

                                        <th>Plan</th>
                                        <th>User Type</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Subscription as $subscription)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $subscription->plan }}</td>
                                            <td>
                                                {{ $subscription->user_name }}
                                            </td>
                                            <td>{{ $subscription->subscription_month_detail }}</td>
                                            <td>{{ $subscription->amount }}</td>
                                            <td>{{ ucFirst($subscription->status) }}</td>

                                            <td>
                                                {{-- <button type="button" class="btn"><div class="form-check form-switch">  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">  </div>	</button> --}}
                                                <a href="{{ route('admin.master.edit_subscription', $subscription->id) }}">
                                                    <button type="button" class="btn1 btn-outline-success"><i
                                                            class='bx bx-edit-alt me-0'></i></button> </a>
                                                <a
                                                    href="{{ route('admin.master.destroy_subscription', $subscription->id) }}">
                                                    <button type="button" class="btn1 btn-outline-danger"><i
                                                            class='bx bx-trash me-0'></i></button> </a>
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
    <!--end page wrapper -->
@stop


@section('js')
    <script>
        $(document).ready(function() {
            $("#type").on('change', function() {
                if ($(this).val() == 'Days') {
                    $("#days_div").removeClass("d-none");
                } else if ($(this).val() == 'Month') {
                    $("#days").val(30);
                    $("#days_div").addClass("d-none");
                } else {
                    $("#days").val(365);
                    $("#days_div").addClass("d-none");
                }
            })

            $("#user_type").on('change', function() {
                if ($(this).val() == '2') {
                    $("#view_once").removeClass("d-none");
                } else {
                    $("#view_once").addClass("d-none");
                }
            })
            $('.select_box').select2();
            ClassicEditor
                .create(document.querySelector('#editor'))
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@stop
