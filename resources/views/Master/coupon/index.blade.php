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

                                <h5 class="mb-0 text-primary">Add Coupons</h5>
                            </div>
                            <hr>

                            <form class="row g-2" action="{{ route('admin.master.create_coupon') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="col-md-12"></div>

                                <div class="col-md-6">
                                    <label for="inputFirstName" class="form-label">Coupon Title</label>
                                    <input type="text" class="form-control" placeholder="Coupon Title" name="title">
                                </div>

                                <div class="col-md-6">
                                    <label for="inputCode" class="form-label">Coupon Code</label>
                                    <input type="text" class="form-control" placeholder="Coupon Code" name="code">
                                </div>

                                <div class="col-md-6">
                                    <label for="inputType" class="form-label">Coupon Type</label>
                                    <select class="form-select" name="type">
                                        <option value="FLAT">FLAT</option>
                                        <option value="PERCENT">PERCENT</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="inputDiscount" class="form-label">Coupon Discount</label>
                                    <input type="number" class="form-control" placeholder="Coupon Discount"
                                        name="discount">
                                </div>

                                <div class="col-md-6">
                                    <label for="inputStatus" class="form-label">Coupon Status</label>
                                    <select class="form-select" name="status">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>

                                <div class="col-md-12" style="margin-top:2%;">
                                    <button type="submit" class="btn btn-primary px-3"><i class="lni lni-circle-plus"></i>
                                        Add </button>
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

                                        <th>Title</th>
                                        <th>Code</th>
                                        <th>Type</th>
                                        <th>Discount</th>
                                        <th>Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Coupon as $Coupon)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                          <td>{{$Coupon->title}}</td>
                                          <td>{{$Coupon->code}}</td>
                                          <td>{{$Coupon->type}}</td>
                                          <td>{{$Coupon->discount}}</td>
                                          <td>{{ucFirst($Coupon->status)}}</td>

                                            <td>
                                               
                                                <a href="{{ route('admin.master.edit_coupon', $Coupon->id) }}">
                                                    <button type="button" class="btn1 btn-outline-success"><i
                                                            class='bx bx-edit-alt me-0'></i></button> </a>
                                                <a href="{{ route('admin.master.destroy_coupon', $Coupon->id) }}">
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
            $('.select_box').select2();
            ClassicEditor
                .create(document.querySelector('#editor'))
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@stop