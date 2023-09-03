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

                                <h5 class="mb-0 text-primary">Edit Advertisement Package</h5>
                            </div>
                            <hr>

                            <form class="row g-2" action="{{ route('admin.master.update_advertisement') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$edit->PackageID}}">
									<div class="col-md-2">
										<label>Location</label>
										<select class="form-select mb-3" aria-label="Default select example" name="location"
											>
											<option value="" selected>Select</option>
											<option value="home">Home</option>
											<option value="listing">Listing</option>
										</select>
									</div>
									<div class="col-md-2">
										<label>Package Name</label>
										<input class="form-control mb-3" type="text" placeholder="Package name"
											aria-label="default input example" name="PackageName" value="{{$edit->PackageName}}">
									</div>
									<div class="col-md-2">
										<label>Label</label>
										<input class="form-control mb-3" type="text" placeholder="Label"
											aria-label="default input example" name="label" value="{{$edit->label}}">
									</div>
									<div class="col-md-2">
										<label>Banner Width</label>
										<input class="form-control mb-3" type="number" placeholder="Banner width"
											aria-label="default input example" name="BannerWidth" value="{{$edit->BannerWidth}}">
									</div>
									<div class="col-md-2">
										<label>Banner Height</label>
										<input class="form-control mb-3" type="number" placeholder="Banner Height"
											aria-label="default input example" name="BannerHeight" value="{{$edit->BannerHeight}}">
									</div>
									<div class="col-md-2">
										<label>Price</label>
										<input class="form-control mb-3" type="number" placeholder="Price"
											aria-label="default input example" name="OriginalPrice" value="{{$edit->OriginalPrice}}">
									</div>
									{{-- <div class="col-md-2">
										<label>Discount</label>
										<input class="form-control mb-3" type="text" placeholder="Discount"
											aria-label="default input example" name="">
									</div> --}}
									<div class="col-md-2">
										<label>Min Days</label>
										<input class="form-control mb-3" type="text" placeholder="Min days"
											aria-label="default input example" name="MinDays" value="{{$edit->MinDays}}">
									</div>
									<div class="col-md-2">
										<label>Max Days</label>
										<input class="form-control mb-3" type="text" placeholder="Max days"
											aria-label="default input example" name="MaxDays" value="{{$edit->MaxDays}}">
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
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Location</th>
                                        <th>Package Name</th>
                                        <th>Label</th>
                                        <th>Banner Width</th>
                                        <th>Banner Height</th>
                                        <th>Price</th>
                                        <th>Min days</th>
                                        <th>Max days</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Advertisement as $advertisement)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                          <td>{{$advertisement->location}}</td>
                                          <td>{{$advertisement->PackageName}}</td>
                                          <td>{{$advertisement->label}}</td>
                                          <td>{{$advertisement->BannerWidth}}px</td>
                                          <td>{{$advertisement->BannerHeight}}px</td>
                                          <td>{{$advertisement->OriginalPrice}}</td>
                                          <td>{{$advertisement->MinDays}}</td>
                                          <td>{{$advertisement->MaxDays}}</td>

                                            <td>
                                                <a href="{{ route('admin.master.edit_advertisement', $advertisement->PackageID) }}">
                                                    <button type="button" class="btn1 btn-outline-success"><i
                                                            class='bx bx-edit-alt me-0'></i></button> </a>
                                                <a href="{{ route('admin.master.destroy_advertisement', $advertisement->PackageID) }}">
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
