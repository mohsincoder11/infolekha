@extends('layout')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-md-12 mx-auto">

                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">

                                <h6>College</h6>
                            </div>
                            <hr>
                            <form action="" method="get" class="row g-2">

                                <div class="col-md-2">
                                    <label class="form-label">Date From</label>
                                    <input class="form-control" type="date" name="from_date"
                                        value="{{ request('from_date') }}">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Date To</label>
                                    <input class="form-control" type="date" name="to_date"
                                        value="{{ request('to_date') }}">
                                </div>


                                {{-- <div class="col-md-2">
                        <label class="form-label">Type</label>
                        <select class="form-select mb-3" aria-label="Default select example" name="type">
                            <option value="" {{ request('type') == '' ? 'selected' : '' }}>Select Type</option>
                            <option value="Subscription" {{ request('type') == 'Subscription' ? 'selected' : '' }}>Subscription</option>
                            <option value="Announcement" {{ request('type') == 'Announcement' ? 'selected' : '' }}>Announcement</option>
                        </select>
                    </div> --}}

                                <div class="col-md-2">
                                    <label class="form-label">Status</label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="active">
                                        <option value="" {{ request('active') == '' ? 'selected' : '' }}>Select Status
                                        </option>
                                        <option value="0" {{ request('active') == '0' ? 'selected' : '' }}>Pending
                                        </option>
                                        <option value="1" {{ request('active') == '1' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="2" {{ request('active') == '2' ? 'selected' : '' }}>Reject
                                        </option>
                                    </select>
                                </div>


                                <div class="col-md-2" style="margin-top:35px;">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary "> <i
                                                class="lni lni-circle-plus"></i>Search</button>
                                    </div>
                                </div>
                                @if (request('active') == '0')
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="col">
                                                <button name="send_email" value="true" type="submit"
                                                    class="btn btn-sm btn-warning "> <i class="lni lni-envelope"></i>
                                                    Send Mail to All
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endif



                            </form>

                        </div>

                    </div>
                </div>
            </div>



            <!--end page wrapper -->
            <!--start overlay-->
            <div class="overlay toggle-icon"></div>
            <hr />
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th> SN.</th>
                                        <th>Name of College </th>
                                        <th>Contact No</th>
                                        <th>Email</th>
                                        <th>Active [Payment Status]</th>
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
                                                                College:</b>{{ $dt->r_name }}</label><br>
                                                        <label><b>Name of
                                                                Entity:</b>{{ $dt->r_name }}</label><br>
                                                        <label><b>Contact
                                                                Person:</b>{{ $dt->r_contact_person }}</label><br>
                                                        <label><b>Mobile
                                                                No.:</b>{{ $dt->r_mob }}</label><br>
                                                        <label><b>Email
                                                                Id:</b>{{ $dt->email }}</label><br>
                                                        <label><b>Address:</b>{{ $dt->address_details }}</label><br>


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
                                                <button type="button" class="btn">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input " type="checkbox"
                                                            value="{{ $dt->user_id }}" id="id{{ $dt->user_id }}"
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
                                                <div class="d-grid"> <a target="_blank"
                                                        class="btn btn-sm btn-outline-success radius-15"
                                                        href="{{ route('admin-login-to-user', $dt->user_id) }}">Log In</a>
                                                </div>

                                            </td>

                                            <td style="background-color: #ffff;">
                                                @if (can_view_this('admin.delete-user'))
                                                    <a href="{{ route('admin.delete-user', $dt->user_id) }}"
                                                        class="btn btn-outline-danger"><i class='bx bx-trash me-0'></i></a>
                                                @endif
                                                @if ($dt->subscription_status == 0)
                                                    <a href="{{ route('admin.buy-subscription-email', $dt->user_id) }}"
                                                        title="Send subscription mail" class="btn btn-outline-warning">
                                                        <i class='bx bx-envelope me-0'></i>
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
