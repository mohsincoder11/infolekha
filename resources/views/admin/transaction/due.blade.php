@extends('layout')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="row">
                @include('alerts')

                <div class="col-md-12 mx-auto">

                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">

                                <h6>Transaction Due</h6>
                            </div>
                            <hr>
                            <form action="" method="get" class="row g-2">

                                <div class="col-md-2">
                                    <label class="form-label">Date From</label>
                                    <input class="form-control datepicker" type="date" name="from_date"
                                        value="{{ request('from_date') }}">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Date To</label>
                                    <input class="form-control" type="date" name="to_date"
                                        value="{{ request('to_date') }}">
                                </div>


                                <div class="col-md-2">
                                    <label class="form-label">Type</label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="type">
                                        <option value="" {{ request('type') == '' ? 'selected' : '' }}>Select Type
                                        </option>
                                        <option value="Subscription"
                                            {{ request('type') == 'Subscription' ? 'selected' : '' }}>Subscription</option>
                                        <option value="Announcement"
                                            {{ request('type') == 'Announcement' ? 'selected' : '' }}>Announcement</option>
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label class="form-label">Status</label>
                                    <select class="form-select mb-3" aria-label="Default select example"
                                        name="transaction_status">
                                        <option value="" {{ request('transaction_status') == '' ? 'selected' : '' }}>
                                            Select Status</option>
                                        <option value="success"
                                            {{ request('transaction_status') == 'success' ? 'selected' : '' }}>Success
                                        </option>
                                        <option value="NA"
                                            {{ request('transaction_status') == 'NA' ? 'selected' : '' }}>Pending</option>
                                        <option value="Other"
                                            {{ request('transaction_status') == 'Other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                </div>


                                <div class="col-md-2" style="margin-top:35px;">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary "> <i
                                                class="lni lni-circle-plus"></i>Search</button>
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
            <hr />
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Transaction ID</th>
                                        <th>Date</th>
                                        <th>User</th>
                                        <th>Entity</th>
                                        <th>Type</th>
                                        <th>Plan</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Expire In</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <td>1</td>
                                            <td>{{ $transaction->transaction_id }}</td>
                                            <td>{{ date('d-m-Y', strtotime($transaction->created_at)) }}</td>
                                            <td>{{ $transaction->name }}</td>
                                            <td>{{ $transaction->entity_name }}</td>
                                            <td>{{ $transaction->type }}</td>
                                            <td>{{ $transaction->TransactionSubscription->plan }}</td>

                                            <td>{{ $transaction->amount }}</td>
                                            <td>{{ $transaction->transaction_status }}</td>
                                            <td>{!! $transaction->expiry_difference !!}</td>

                                            <td>

                                                @if ($transaction->type == 'Announcement')
                                                    <a class="btn btn-warning"
                                                        href="{{ route('admin.announcement_due_mail', $transaction->id) }}">
                                                        <i class='bx bx-envelope me-0'></i>
                                                    </a>
                                                @elseif($transaction->type == 'Subscription')
                                                    @if ($transaction->entity_name == 'Tutor')
                                                        <a class="btn btn-warning"
                                                            href="{{ route('admin.tutor_subscription_mail', $transaction->id) }}">
                                                            <i class='bx bx-envelope me-0'></i>
                                                        </a>
                                                    @else
                                                        <a class="btn btn-warning"
                                                            href="{{ route('admin.subscription_mail', $transaction->id) }}">
                                                            <i class='bx bx-envelope me-0'></i>
                                                        </a>
                                                    @endif
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
@stop

{{-- @section('js')
<script>
        $('.datepicker').datepicker('setDate', 'mm/dd/yyyy');

</script>
@stop --}}
