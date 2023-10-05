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

                                <h5 class="mb-0 text-primary">Update Default OTP</h5>
                            </div>
                            <hr>

                            <form class="row g-2" action="{{ route('admin.master.update-default-otp') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12"></div>

                                <div class="col-md-6">
                                    <label for="inputCode" class="form-label">Default OTP</label>
                                    <input type="text" value="{{$current_otp->otp}}" class="form-control" placeholder="Enter OTP" name="otp">
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
          
        </div>
    </div>
    <!--end page wrapper -->
@stop



