@extends('layout')
@section('css')
<style>
    .close{

    float: right;
    font-size: 1.5rem;
    font-weight: bold;
    line-height: 1;
    color: #000;
    opacity: .5;
    padding: 0;
    cursor: pointer;
    background: transparent;
    border: 0;
}

    
</style>

@stop

@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            @include('alerts')

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
                        <div class="row">
                            <div class="col-md-2">
                                <button class="btn btn-primary add-announcement mb-4">Add Announcement</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th> SN</th>
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
                                            <td>{{ $announcements->college_details ? $announcements->college_details->r_name : ($announcements->college_id==1 ? 'Infolekha' : 'N/A') }}
                                                ({{ $announcements->college_details ? $announcements->college_details->r_entity : 'N/A' }})
                                            </td>
                                            <td>{{ $announcements->PackageName }}</td>
                                            </td>
                                            <td>{{ $announcements->SelectedDays > 0 ? $announcements->SelectedDays . ' days' : (isset($announcements->SelectedDays) ?  $announcements->SelectedDays. ' day' : 'Infinite') }}</td>
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
                                              
                                               <span class="badge @if($announcements->status=='Pending') bg-secondary @elseif($announcements->status=='Active') bg-primary @elseif($announcements->status=='Reject') bg-danger @endif">  {{ $announcements->status }}
                                            </span>

                                            <td>

                                                <button type="button" class="btn1 btn-outline-primary open_announcement_modal" title="Preview"  
                                                heading="{{ $announcements->heading }}"
                                                    image={{ asset('public/' . $announcements->image) }}
                                                    content="{{ $announcements->main_content }}"
                                                    EnquiryID="{{ $announcements->id }}"><i
                                                        class="fadeIn animated bx bx-unite"></i></button>
                                                        <button title="update status" type="button" class="btn1 btn-outline-primary open_modal"
                                                        EnquiryID="{{ $announcements->id }}" current_status="{{ $announcements->status }}" notes="{{ $announcements->note }}"  heading="{{ $announcements->heading }}"
                                                        image={{ asset('public/' . $announcements->image) }}
                                                        content="{{ $announcements->main_content }}"><i
                                                            class="fadeIn animated bx bx-refresh"></i>
                                                        </button>
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
    <!--end page wrapper -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Announcement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.change-announcement-status') }}" method="post"
                        enctype="multipart/form-data" class="row g-2" id="announcement_form">
                        @csrf
                        <input type="hidden" id="EnquiryID" name="AnnouncementID">
                        <div class="col-md-12">
                            <label>Title*</label>
                            <input class="form-control mb-3" name="heading"  id="heading" type="text" aria-label=""
                                placeholder="Title">
                        </div>
    
                        <div class="col-md-12">
                            <label for="inputFirstName" class="form-label"> Main Content*</label>
                            <textarea class="form-control" name="main_content" id="main_content"  rows="6"></textarea>
                       
                        </div>
                        <div class="col-md-6">
                            <label for="inputFirstName" class="form-label"> Image*</label>
                            <input type="file" class="form-control" id="inputFirstName" placeholder="" name="image" accept="image/*">
                        </div>
                        <div class="col-md-6">
                            <img src="" id="image" alt="" style="height:100px;width:auto;">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Status</label>
                            <select class="form-select mb-3" aria-label="Default select example" name="status" id="status">
                                <option value="">Select</option>
                                <option>Pending</option>
                                <option>Active</option>
                                <option>Reject</option>

                            </select>
                        </div>
                        <div class="col-md-12">
                            <label>Note</label>
                            <textarea class="form-control mb-3" name="note" type="text" aria-label="default input example" placeholder="Note" id="note"></textarea>
                        </div>
                        <div class="col-md-6" >
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

<div class="modal fade " id="announcement_modal" style="padding-top: 5%;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <h3 align="center" id="announcement_heading"></h3>
            <div class="modal-body clearfix">

                <div class="row">

                    <div class="col-md-8">
                        <p id="announcement_content" align="justify"></p>

                    </div>
                    <div class="col-md-4">
                        <img width="100%" height="auto" id="announcement_image" src="">
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
                <h5 class="modal-title" id="exampleModalLabel">Add Announcement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="form" action="{{ route('admin.add-announcement') }}" method="post"
                    enctype="multipart/form-data" class="row g-2" id="announcement_form">
                    @csrf

                    <div class="col-md-12">
                        <label>Title*</label>
                        <input class="form-control mb-3" name="heading"  id="heading" type="text" aria-label=""
                            placeholder="Title">
                    </div>

                    
                  
                    <div class="col-md-12">
                        <label for="inputFirstName" class="form-label"> Main Content*</label>
                        <textarea class="form-control" name="main_content" id="main_content"  rows="6"></textarea>
                   
                    </div>
                    <div class="col-md-6">
                        <label for="inputFirstName" class="form-label"> Image*</label>
                        <input type="file" class="form-control" id="inputFirstName" placeholder="" name="image" accept="image/*">
                    </div>
                    <div class="col-md-6 ">
                        <label>Status</label>
                        <select class="form-select mb-3" aria-label="Default select example" name="status" id="status2">
                            <option value="">Select</option>
                            <option value="Pending">Pending</option>
                            <option value="Active">Active</option>
                            <option value="Reject">Rejected</option>

                        </select>
                    </div>
                

                    <div class="col-md-12" align="center">
                        <button type="submit" class="btn btn-primary px-5">Save</button>
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
            $(document).on('click', '.add-announcement', function(e) {
            $("#exampleModal2").modal('show');
        })


            $(document).on('click', '.open_modal', function(e) {
                $("#exampleModal").modal('show');
                $("#EnquiryID").val($(this).attr('EnquiryID'));
                $("#status").val($(this).attr('current_status'));
                $("#note").text($(this).attr('notes'));
                $("#heading").val($(this).attr('heading'));
            $("#image").attr('src', $(this).attr('image'));
            $("#main_content").text($(this).attr('content'));

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


            $(document).on('click', '.open_announcement_modal', function() {
            $("#announcement_modal").modal('show');
            $("#announcement_heading").text($(this).attr('heading'));
            $("#announcement_image").attr('src', $(this).attr('image'));
            $("#announcement_content").html($(this).attr('content'));
        })
        $(document).on('click', '.close', function() {
            $("#announcement_modal").modal('hide');
        })
        })
    </script>
@stop
