@extends('layout')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="card-title d-flex align-items-center">

                    <h5 class="mb-0 text-primary">Advertisement Enquiry</h5>
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
                                        <th> SN</th>
                                        <th>Date</th>
                                        <th>Entity</th>
                                        <th>Location</th>
                                        <th>Package Name</th>
                                        <th>Size</th>
                                        <th>Selected Days</th>
                                        <th>Amount</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($advertisements as $advertisement)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ date('d-m-Y', strtotime($advertisement->created_at)) }}</td>
                                            <td>{{ $advertisement->college_details->r_name }}
                                                ({{ $advertisement->college_details->r_entity }})
                                            </td>
                                            <td>{{ $advertisement->location == 'home' ? 'Home Page' : 'Listing Page' }}</td>
                                            <td>{{ $advertisement->PackageName }}</td>
                                            <td>{{ $advertisement->BannerWidth }}*{{ $advertisement->BannerHeight }} pxl
                                            </td>
                                            <td>{{ $advertisement->SelectedDays > 0 ? $advertisement->SelectedDays . ' days' : $advertisement->SelectedDays . ' day' }}
                                            </td>
                                            <td>{{ $advertisement->TotalAmount }}
                                            </td>
                                            <td>
                                                @if (isset($advertisement->image))
                                                    <a href="{{ asset('public/' . $advertisement->image) }}"
                                                        target="_blank">
                                                        <img height="50" width="auto"
                                                            src="{{ asset('public/' . $advertisement->image) }}"
                                                            alt="">
                                                    </a>
                                                @else
                                                    Not Uploaded
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.change-advertisement-status') }}"
                                                    method="post">
                                                    @csrf
                                                    <input type="hidden" name="EnquiryID"
                                                        value="{{ $advertisement->EnquiryID }}">
                                                    <select class="form-control change_status" name="status">
                                                        <option value="">Select option</option>
                                                        <option @if ($advertisement->status == 'Pending') selected @endif>Pending
                                                        </option>
                                                        <option @if ($advertisement->status == 'Active') selected @endif>Active
                                                        </option>
                                                        <option @if ($advertisement->status == 'Disabled') selected @endif>Disabled
                                                        </option>
                                                        <option @if ($advertisement->status == 'Rejected') selected @endif>Rejected
                                                        </option>
                                                    </select>
                                                </form>


                                            <td>

                                                <button title="upload image" type="button" class="btn1 btn-outline-primary open_modal"
                                                    EnquiryID="{{ $advertisement->EnquiryID }}"
                                                    width="{{ $advertisement->BannerWidth }}"
                                                    height="{{ $advertisement->BannerHeight }}"><i
                                                        class="fadeIn animated bx bx-upload"></i></button>
                                                <button title="delete" type="button" class="btn1 btn-outline-danger"><i
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

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Advertisement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.upload-advertisement') }}" method="post" enctype="multipart/form-data"
                        class="row g-2">
                        @csrf
                        <input type="hidden" id="EnquiryID" name="EnquiryID">
                        <input type="hidden" id="Width">
                        <input type="hidden" id="Height">

                        <div class="col-md-5">
                            <label>Images</label>
                            <input class="form-control mb-3" type="file" aria-label="default input example"
                                name="image" id="modal_image" accept="image/*">
                        </div>
                        <div class="col-md-3" style="margin-top:4.4vh;">
                            <div class="col">
                                <button type="submit" class="btn btn-primary px-5 modal_submit"> <i
                                        class="lni lni-circle-plus"></i>Submit</button>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <p id="image_resolution_error" class="d-none error"></p>
                        </div>


                    </form>
                </div>

            </div>
        </div>
    </div>
@stop


@section('js')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.open_modal', function(e) {
                $("#exampleModal").modal('show');
                $("#EnquiryID").val($(this).attr('EnquiryID'));
                $("#Width").val($(this).attr('Width'));
                $("#Height").val($(this).attr('Height'));


            })

            $(document).on('change', '.change_status', function(e) {
                $(this).closest('form').submit();
            })

            $("#modal_image").on("change", function(event) {
                var file = event.target.files[0];

                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var img = new Image();
                        img.src = e.target.result;
                        img.onload = function() {
                            var width = this.width;
                            var height = this.height;
                            if (width === $("#Width").val() && height === $("#Height").val()) {
                                $("#image_resolution_error").addClass("d-none");
                                $(".modal_submit").prop("disabled", false);
                            } else {
                                $("#image_resolution_error").removeClass("d-none");
                                $("#image_resolution_error").html("Image resolution should be: " +
                                    $("#Width").val() + "x" + $("#Height").val());
                                $(".modal_submit").prop("disabled", true);

                            }
                        };
                    };
                    reader.readAsDataURL(file);
                }
            });

        })
    </script>
@stop
