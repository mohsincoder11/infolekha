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

                                <h5 class="mb-0 text-primary">Add Banner Image</h5>
                            </div>
                            <hr>

                            <form class="row g-2" action="{{ route('admin.master.create-banner-image') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="col-md-12"></div>

                                <div class="col-md-6">
                                    <label for="inputFirstName" class="form-label">Link</label>
                                    <input type="text" class="form-control" placeholder="Coupon Title" name="link">
                                </div>
                                <div class="col-md-6">
                                        <label for="formFile" class="form-label">Image</label>
                                        <input class="form-control" type="file" id="formFile" name="banner_image" accept="image/*">
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

                                        <th>Image</th>
                                        <th>Link</th>
                                      
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($banner_images as $banner_image)
                                        <tr>
                                            <td>{{$loop->index + 1 }}</td>
                                          <td>
                                            <a target="_blank" href="{{asset('public/'.$banner_image->banner_image)}}">
                                                 <img  height="80" width="auto" src="{{asset('public/'.$banner_image->banner_image)}}" alt="">
                                            </a>
                                            </td>
                                          <td>
                                            <a href="{{$banner_image->link}}">
                                            {{$banner_image->link}}
                                        </a>
                                        </td>
                                         

                                            <td>
                                               
                                                <a href="{{ route('admin.master.edit-banner-image', $banner_image->id) }}">
                                                    <button type="button" class="btn1 btn-outline-success"><i
                                                            class='bx bx-edit-alt me-0'></i></button> </a>
                                                <a href="{{ route('admin.master.destroy-banner-image', $banner_image->id) }}">
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
                
            // $('.select_box').select2();
            // ClassicEditor
            //     .create(document.querySelector('#editor'))
            //     .catch(error => {
            //         console.error(error);
            //     });
        });
    </script>
@stop
