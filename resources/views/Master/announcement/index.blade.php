@extends('layout')
@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-md-10 mx-auto">
					@include('alerts')

                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">

                                <h5 class="mb-0 text-primary">Add Announcement Package</h5>
                            </div>
                            <hr>

                            <form class="row g-2" action="{{ route('admin.master.create_announcement') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf

									
									<div class="col-md-2">
										<label>Package Name</label>
										<input class="form-control mb-3" type="text" placeholder="Package name"
											aria-label="default input example" name="PackageName">
									</div>
									
									<div class="col-md-2">
										<label>Price</label>
										<input class="form-control mb-3" type="number" placeholder="Price"
											aria-label="default input example" name="OriginalPrice">
									</div>
									{{-- <div class="col-md-2">
										<label>Discount</label>
										<input class="form-control mb-3" type="text" placeholder="Discount"
											aria-label="default input example" name="">
									</div> --}}
									<div class="col-md-2">
										<label>Min Days</label>
										<input class="form-control mb-3" type="text" placeholder="Min days"
											aria-label="default input example" name="MinDays">
									</div>
									<div class="col-md-2">
										<label>Max Days</label>
										<input class="form-control mb-3" type="text" placeholder="Max days"
											aria-label="default input example" name="MaxDays">
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
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                    
                                        <th>Package Name</th>
                                     
                                        <th>Price</th>
                                        <th>Min days</th>
                                        <th>Max days</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Announcement as $announcement)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                          <td>{{$announcement->PackageName}}</td>
                                         
                                          <td>{{$announcement->OriginalPrice}}</td>
                                          <td>{{$announcement->MinDays}}</td>
                                          <td>{{$announcement->MaxDays}}</td>

                                            <td>
                                                <a href="{{ route('admin.master.edit_announcement', $announcement->PackageID) }}">
                                                    <button type="button" class="btn1 btn-outline-success"><i
                                                            class='bx bx-edit-alt me-0'></i></button> </a>
                                                <a href="{{ route('admin.master.destroy_announcement', $announcement->PackageID) }}">
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