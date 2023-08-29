@extends('layout')
@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="card-title d-flex align-items-center">

                    <h5 class="mb-0 text-primary">Announcement Enquiry</h5>
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
                                        <th>Sr.no</th>
                                        <th>Date</th>
                                        <th>Entity</th>
                                        <th>Package Name</th>
                                        <th>Selected Days</th>
                                        <th>Amount</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($announcements as $announcements)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ date('d-m-Y', strtotime($announcements->created_at)) }}</td>
                                            <td>{{ $announcements->college_details ? $announcements->college_details->r_name : 'N/A' }}
                                                ({{ $announcements->college_details ? $announcements->college_details->r_entity : 'N/A' }})
                                            </td>
                                            <td>{{ $announcements->PackageName }}</td>
                                            </td>
                                            <td>{{ $announcements->SelectedDays > 0 ? $announcements->SelectedDays . ' days' : $announcements->SelectedDays . ' day' }}
                                            </td>
                                            <td>{{ $announcements->TotalAmount }}
                                                ({{ check_announcement_payment_status($announcements->id, $announcements->college_id) }})
                                            </td>
                                            <td>
                                                @if (isset($announcements->image))
                                                    <a href="{{ asset('public/' . $announcements->image) }}"
                                                        target="_blank">
                                                        <img height="50" width="auto"
                                                            src="{{ asset('public/' . $announcements->image) }}"
                                                            alt="">
                                                    </a>
                                                @else
                                                    Not Uploaded
                                                @endif
                                            </td>
                                            <td>
                                                {{-- <form action="{{ route('admin.change-announcement-status') }}"
                                                    method="post">
                                                    @csrf
                                                    <input type="hidden" name="EnquiryID"
                                                        value="{{ $announcements->EnquiryID }}">
                                                    <select class="form-control change_status" name="status">
                                                        <option value="">Select option</option>
                                                        <option @if ($announcements->status == 'Pending') selected @endif>Pending
                                                        </option>
                                                        <option @if ($announcements->status == 'Active') selected @endif>Active
                                                        </option>
                                                        <option @if ($announcements->status == 'Disabled') selected @endif>Disabled
                                                        </option>
                                                    </select>
                                                </form> --}}
                                               <span class="badge @if($announcements->status=='Pending') bg-secondary @elseif($announcements->status=='Active') bg-primary @elseif($announcements->status=='Reject') bg-danger @endif">  {{ $announcements->status }}
                                            </span>

                                            <td>

                                                <button type="button" class="btn1 btn-outline-primary open_modal"
                                                    EnquiryID="{{ $announcements->id }}"><i
                                                        class="fadeIn animated bx bx-note"></i></button>
                                                <button type="button" class="btn1 btn-outline-danger"><i
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
    <!--end page wrapper -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Announcement Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.change-announcement-status') }}" method="post"
                        enctype="multipart/form-data" class="row g-2" id="announcement_form">
                        @csrf
                        <input type="hidden" id="EnquiryID" name="AnnouncementID">
                        <div class="col-md-6 form-group">
                            <label>Status</label>
                            <select class="form-select mb-3" aria-label="Default select example" name="status">
                                <option value="">Select</option>
                                <option>Pending</option>
                                <option>Active</option>
                                <option>Reject</option>

                            </select>
                        </div>
                        <div class="col-md-6 ">
                            <label>Note</label>
                            <input class="form-control mb-3" name="note" type="text" aria-label="default input example"
                                placeholder="Note">
                        </div>
                        <div class="col-md-6" style="margin-top:4.4vh;">
                            <div class="col">
                                <button type="submit" class="btn btn-primary px-5"> <i
                                        class="lni lni-circle-plus"></i>Submit</button>
                            </div>
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

            })

            $(document).on('change', '.change_status', function(e) {
                $(this).closest('form').submit();
            })

            $("#announcement_form").validate({
                rules: {
                    status: {
                        required: true,
                    },

                },
                messages: {
                    status: {
                        required: "Please select option",
                    },

                },
                submitHandler: function(form) {
                    return true;
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element.closest('.form-group'));

                },
            });



        })
    </script>
@stop
