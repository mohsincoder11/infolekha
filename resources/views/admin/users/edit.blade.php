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

                                <h5 class="mb-0 text-primary">Edit User</h5>
                            </div>
                            <hr>

                            <form class="row g-2" action="{{ route('admin.update_user') }}" method="post"
                                enctype="multipart/form-data" id="edit_form">
                                @csrf
                                <input type="hidden" value="{{ $edit_user->id}}" name="id">

                                <div class="col-md-12"></div>

                                <div class="col-md-6">
                                    <label for="inputFirstName" class="form-label">Name</label>
                                    <input type="text" class="form-control" placeholder="User Name" name="name" value="{{$edit_user->name}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputFirstName" class="form-label">Email</label>
                                    <input type="email" class="form-control" placeholder="User Email" name="email" value="{{$edit_user->email}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputFirstName" class="form-label">Password</label>
                                    <input type="password" class="form-control" placeholder="User Password" name="password">
                                </div>
                                <div class="col-md-4">
                                    <label for="inputFirstName" class="form-label">User Logo</label>
                                    <input type="file" class="form-control" name="logo">
                                </div> 
                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">User Logo</label>
                                    <img height="100px" width="100px" src="{{asset('public/'.$edit_user->logo)}}" alt="">
                                </div>

                                
                                <div class="row pt-2">
                                        <label for=""> <b> Permission </b> </label>
                                </div>
                                <div class="row">
                                    <table  class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="40">Page</th>
                                                <th width="20">View 
                                                    <input type="checkbox" class="form-check-input checkbox-column" data-column="2">
                                                </th>
                                                <th width="20">Edit
                                                    <input type="checkbox" class="form-check-input checkbox-column" data-column="3">
                                                    
                                                </th>
                                                <th width="20">Delete
                                                    <input type="checkbox" class="form-check-input checkbox-column" data-column="4">
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            {!!permission_row('Dashboard','admin.dashboard',NULL,NULL)!!}

                                            {!!permission_row('Subscription','admin.master.subscription','admin.master.edit_subscription','admin.master.destroy_subscription')!!}

                                            {!!permission_row('coupon','admin.master.coupon','admin.master.edit_coupon','admin.master.destroy_coupon')!!}

                                            {!!permission_row('advertisement master','admin.master.advertisement','admin.master.edit_advertisement','admin.master.destroy_advertisement')!!}

                                            {!!permission_row('announcement master','admin.master.announcement','admin.master.edit_announcement','admin.master.destroy_announcement')!!}

                                            {!!permission_row('Banner Image','admin.master.banner-image','admin.master.edit-banner-image','admin.master.destroy-banner-image')!!}

                                            {!!permission_row('Default OTP','admin.master.default-otp',NULL,NULL)!!}

                                            {!!permission_row('Registration-College','admin.registration.college',NULL,'admin.delete-user')!!}
                                            {!!permission_row('Registration-School','admin.registration.school',NULL,'admin.delete-user')!!}
                                            {!!permission_row('Registration-Institute','admin.registration.institute',NULL,'admin.delete-user')!!}
                                            {!!permission_row('Registration-Student','admin.registration.student',NULL,'admin.delete-user')!!}
                                            {!!permission_row('Registration-Tutor','admin.registration.tutor',NULL,'admin.delete-user')!!}

                                            {!!permission_row('Transaction','admin.transaction',NULL,NULL)!!}

                                            {!!permission_row('announcement','admin.announcement','admin.edit_announcement','admin.destroy_announcement2')!!}

                                            {!!permission_row('advertisement','admin.advertisement',NULL,'admin.delete-advertisement')!!}

                                            {!!permission_row('Blog','admin.blog','admin.edit_blog','admin.destroy_blog')!!}

                                        </tbody>
                                    </table>
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

                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Permissions</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $loop->index + 1 }} </td>
                                          <td>{{$user->name}}</td>
                                          <td>{{$user->email}}</td>
                                          <td>
                                            <a href="javascrip:void(0)" class="view_permission_modal" permission="{{implode(',',$user->permissions_array)}}">
                                                <button type="button" class="btn1 btn-outline-primary"><i
                                                        class='bx bx-unite me-0'></i></button> View</a>
                                          </td>
                                            <td>
                                                <a href="{{ route('admin.edit_user', $user->id) }}">
                                                    <button type="button" class="btn1 btn-outline-success"><i
                                                            class='bx bx-edit-alt me-0'></i></button> </a>
                                                <a href="{{ route('admin.delete_user', $user->id) }}">
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

    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">User Permissions</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                        <div class="row pt-2">
                            <label for=""> <b> Permission </b> </label>
                    </div>
                    <div class="row">
                        <table  class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="40">Page</th>
                                    <th width="20">View</th>
                                    <th width="20">Edit</th>
                                    <th width="20">Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                                {!!permission_row_model('Dashboard','admin.dashboard',NULL,NULL)!!}

                                {!!permission_row_model('Subscription','admin.master.subscription','admin.master.edit_subscription','admin.master.destroy_subscription')!!}

                                {!!permission_row_model('coupon','admin.master.coupon','admin.master.edit_coupon','admin.master.destroy_coupon')!!}

                                {!!permission_row_model('advertisement master','admin.master.advertisement','admin.master.edit_advertisement','admin.master.destroy_advertisement')!!}

                                {!!permission_row_model('announcement master','admin.master.announcement','admin.master.edit_announcement','admin.master.destroy_announcement')!!}

                                {!!permission_row_model('Banner Image','admin.master.banner-image','admin.master.edit-banner-image','admin.master.destroy-banner-image')!!}

                                {!!permission_row_model('Default OTP','admin.master.default-otp',NULL,NULL)!!}

                                {!!permission_row_model('Registration-College','admin.registration.college',NULL,'admin.delete-user')!!}
                                {!!permission_row_model('Registration-School','admin.registration.school',NULL,'admin.delete-user')!!}
                                {!!permission_row_model('Registration-Institute','admin.registration.institute',NULL,'admin.delete-user')!!}
                                {!!permission_row_model('Registration-Student','admin.registration.student',NULL,'admin.delete-user')!!}
                                {!!permission_row_model('Registration-Tutor','admin.registration.tutor',NULL,'admin.delete-user')!!}

                                {!!permission_row_model('Transaction','admin.transaction',NULL,NULL)!!}

                                {!!permission_row_model('announcement','admin.announcement','admin.edit_announcement','admin.destroy_announcement2')!!}

                                {!!permission_row_model('advertisement','admin.advertisement',NULL,'admin.delete-advertisement')!!}

                                {!!permission_row_model('Blog','admin.blog','admin.edit_blog','admin.destroy_blog')!!}

                            </tbody>
                        </table>
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
            $('.checkbox-column').on('change', function () {
        var columnNumber = $(this).data('column');
        var isChecked = $(this).prop('checked');

        // Check/uncheck all checkboxes in the column
        $('table tbody td:nth-child(' + columnNumber + ') input[type="checkbox"]').prop('checked', isChecked);
    });
    
            let checked_Array2 = @json($edit_user->permissions_array); // No need for quotes here
            // Use JSON.parse to convert the JSON string to a JavaScript array
            checked_Array2.forEach(function(permission) {
                $('#edit_form input[type="checkbox"][value="' + permission + '"]').prop('checked', true);
            });

            $(document).on('click', '.view_permission_modal', function(e) {
                $(".model_checkbox").prop('checked', false);
                let checked_Array = $(this).attr('permission').split(',');
                checked_Array.forEach(function(permission) {
                    $(".model_checkbox[value='" + permission + "']").prop('checked', true);
                });
                $("#exampleModal2").modal('show');
            })
                
            // $('.select_box').select2();
            // ClassicEditor
            //     .create(document.querySelector('#editor'))
            //     .catch(error => {
            //         console.error(error);
            //     });
        });
    </script>
@stop
