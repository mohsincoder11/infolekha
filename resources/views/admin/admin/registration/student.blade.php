@extends('layout')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 mx-auto" >
            
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex align-items-center">

                    <h6>Student/Parent</h6>
                </div>
                <hr>
                <form action="" method="get" class="row g-2">

                    <div class="col-md-2">
                        <label class="form-label">Date From</label>
                        <input class="form-control" type="date" name="from_date" value="{{ request('from_date') }}">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Date To</label>
                        <input class="form-control" type="date" name="to_date" value="{{ request('to_date') }}">
                    </div>


                    {{-- <div class="col-md-2">
                        <label class="form-label">Type</label>
                        <select class="form-select mb-3" aria-label="Default select example" name="type">
                            <option value="" {{ request('type') == '' ? 'selected' : '' }}>Select Type</option>
                            <option value="Subscription" {{ request('type') == 'Subscription' ? 'selected' : '' }}>Subscription</option>
                            <option value="Announcement" {{ request('type') == 'Announcement' ? 'selected' : '' }}>Announcement</option>
                        </select>
                    </div>
                
                    <div class="col-md-2">
                        <label class="form-label">Status</label>
                        <select class="form-select mb-3" aria-label="Default select example" name="transaction_status">
                            <option value="" {{ request('transaction_status') == '' ? 'selected' : '' }}>Select Status</option>
                            <option value="success" {{ request('transaction_status') == 'success' ? 'selected' : '' }}>Success</option>
                            <option value="NA" {{ request('transaction_status') == 'NA' ? 'selected' : '' }}>Pending</option>
                            <option value="Other" {{ request('transaction_status') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div> --}}
                

                    <div class="col-md-2" style="margin-top:35px;">
                        <div class="col">
                            <button type="submit" class="btn btn-primary "> <i class="lni lni-circle-plus"></i>Search</button>
                        </div>
                    </div>



                </form>

            </div>

        </div>
            </div>
        </div>
        

        
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <hr/>
        <div class="col-md-12 mx-auto">
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
                            @foreach ($registers as $dt)
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
</div>

@include('admin.registration.active-model')

@stop

@section('js')
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
