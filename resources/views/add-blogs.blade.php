@extends('layout')
@section('content')

    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            @include('alerts')
            {{-- <div class="row">
					<div class="col-md-12 mx-auto" >
						<div class="card">
							<div class="card-body">
								<div class="card-title d-flex align-items-center">
								
									<h5 class="mb-0 text-primary">Add Blogs</h5>
								</div>
								<hr>
							
								<form class="row g-2" action="{{route('admin.create_blog')}}" method="post" enctype="multipart/form-data">
									@csrf
									
						<div class="col-md-12"></div>
						
							<div class="col-md-3">
								<label for="inputFirstName" class="form-label">Title</label>
								<input type="text" class="form-control" placeholder="Title" name="title" >
							</div>
							<div class="col-md-3">
								<label for="inputFirstName" class="form-label">Author Name</label>
								<input type="text" class="form-control" placeholder="Author Name" name="author_name" >
							</div>
							<div class="col-md-3">
								<label for="inputFirstName" class="form-label">Publish Date</label>
								<input type="date" class="form-control" placeholder="Publish Date" name="publish_date" >
							</div>
							<div class="col-md-3">
							<label for="inputFirstName" class="form-label">Upload Blog Image</label>
							<input type="file" class="form-control" id="inputFirstName" placeholder="" name="blog_image">
						</div>
						<div class="col-md-12">
							<label for="inputFirstName" class="form-label"></label>
							<textarea  rows="5" cols="10"  class="form-control" id="editor" placeholder="Blogs "
								name="blogs"></textarea>
						</div>

									{{-- <div class="col-md-4">
										<label for="inputFirstName" class="form-label">Blogs*</label>
										<textarea class="form-control"  placeholder="Blogs..." rows="3" name="blogs"></textarea>
									</div> 
						
									<div class="col-md-3" style="margin-top:5%;" >
								       <button type="submit" class="btn btn-primary px-3"><i class="lni lni-circle-plus"></i> Add  </button>
									</div>
								</form>
		
							</div>
		
						</div>
					</div>
				</div> --}}



            <!--end page wrapper -->
            <!--start overlay-->
            <div class="overlay toggle-icon"></div>
            <hr />
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <button class="btn btn-primary add-blog">Add Blog</button>
                            </div>
                        </div>
                        <div class="table-responsive mt-4">
                            <table id="example" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="10">Sr. No.</th>
                                        <th width="25">Subject</th>
                                        <th width="10">Category</th>
                                        <th width="15">Author Name</th>
                                        <th width="10">Publish Date</th>
                                        <th width="10">Blog Image</th>
                                        <th width="10">Status</th>
                                        <th width="10">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blogs as $blog)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $blog->subject }}</td>
                                            <td>{{ $blog->category }}</td>
                                            <td>{{ $blog->author_name }}</td>
                                            <td>{{ date('d-m-Y', strtotime($blog->created_at)) }}</td>
                                            <td><a href="{{ asset('public/' . $blog->blog_image) }}">
                                                    <img height="50px" width="50px"
                                                        src="{{ asset('public/' . $blog->blog_image) }}" alt="">
                                                </a>
                                            </td>
                                            <td>{{ $blog->status }}</td>

                                            <td>
                                                <button type="button" class="btn1 btn-outline-primary open_modal"
                                                    BlogID="{{ $blog->id }}"><i
                                                        class="fadeIn animated bx bx-edit"></i></button>

                                                <a href="{{ route('admin.destroy_blog', $blog->id) }}">
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

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Blog Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="form" action="{{ route('admin.change-blog-status') }}" method="post"
                        enctype="multipart/form-data" class="row g-2" id="announcement_form">
                        @csrf
                        <input type="hidden" name="BlogID" id="BlogID">

                        <div class="col-md-12">
                            <label>Subject</label>
                            <input class="form-control mb-3" name="subject"  id="subject" type="text" aria-label=""
                                placeholder="Subject">
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Category</label>
                            <select class="form-select mb-3" aria-label="Default select example" name="category" id="category">
                                @foreach (get_blog_categories() as $cat)
                                    <option value="{{$cat}}" >{{$cat}}</option>
                                @endforeach
                                    <option value="Other" >Other</option>

                            </select>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5 form-group">
                            <a href="" target="_blank" >
                            <img src="" alt="" height="100" width="100" id="blog_image">
                        </a>
                        </div>


                        <div class="col-md-12" >
                            <label for="about_from"></label><br>
                            <div id="editor1" style="height: 150px;"></div>
                            <input type="hidden" name="content1" id="editor_content1" />

                            <br><br>
                        </div>

                        <div class="col-md-12" >
                            <label for="about_to"></label><br>
                            <div id="editor2" style="height: 150px;">
                            </div>
							<input type="hidden" name="content2" id="editor_content2" /><br><br>
                        </div>

                        <div class="col-md-12" >
                            <label for="tourist_attraction"></label><br>
                            <div id="editor3" style="height: 150px;">
                            </div>
							<input type="hidden" name="content3" id="editor_content3" /><br><br>
                        </div>

                        <div class="col-md-12" >
                            <label for="tourist_attraction"></label><br>
                            <div id="editor4" style="height: 150px;">
                            </div>
							<input type="hidden" name="content4" id="editor_content4" /><br><br>
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Status</label>
                            <select class="form-select mb-3" aria-label="Default select example" name="status" id="status">
                                <option value="">Select</option>
                                <option value="Pending">Pending</option>
                                <option value="Active">Active</option>
                                <option value="Reject">Reject</option>

                            </select>
                        </div>
                        <div class="col-md-8 ">
                            <label>Note</label>
                            <textarea rows="4" class="form-control mb-3" name="reject_reason" id="note" type="text" aria-label="default input example"
                                placeholder="Note"></textarea>
                        </div>

                        <div class="col-md-12" align="center">
                            <button type="submit" class="btn btn-primary px-5">Update</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Blog</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="form" action="{{ route('admin.add-blog') }}" method="post"
                        enctype="multipart/form-data" class="row g-2" id="announcement_form">
                        @csrf

                        <div class="col-md-12">
                            <label>Subject</label>
                            <input class="form-control mb-3" name="subject"  id="subject2" type="text" aria-label=""
                                placeholder="Subject">
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Category</label>
                            <select class="form-select mb-3" aria-label="Default select example" name="category" id="category2">
                                <option value="">Select</option>
                                <option>Physics</option>
                                <option>Mathematics</option>
                                <option>Chemistry</option>

                            </select>
                        </div>
                        <div class="col-md-6">
							<label for="inputFirstName" class="form-label">Upload Blog Image*</label>
							<input type="file" class="form-control" id="inputFirstName" placeholder="" name="blog_image">
						</div>


                        <div class="col-md-12">
                            <label for="about_from"></label><br>
                            <div id="editor12" style="height: 150px;"></div>
                            <input type="hidden" name="content1" id="editor_content12" />

                            <br><br>
                        </div>

                        <div class="col-md-12">
                            <label for="about_to"></label><br>
                            <div id="editor22" style="height: 150px;">
                            </div>
							<input type="hidden" name="content2" id="editor_content22" /><br><br>
                        </div>

                        <div class="col-md-12">
                            <label for="tourist_attraction"></label><br>
                            <div id="editor32" style="height: 150px;">
                            </div>
							<input type="hidden" name="content3" id="editor_content32" /><br><br>
                        </div>

                        <div class="col-md-12">
                            <label for="tourist_attraction"></label><br>
                            <div id="editor42" style="height: 150px;">
                            </div>
							<input type="hidden" name="content4" id="editor_content42" /><br><br>
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Status</label>
                            <select class="form-select mb-3" aria-label="Default select example" name="status" id="status2">
                                <option value="">Select</option>
                                <option value="Pending">Pending</option>
                                <option value="Active">Active</option>
                                <option value="Rejected">Rejected</option>

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
        $(document).ready(function(){
            var toolbar=  [
                        ['bold', 'italic', 'underline', 'strike'],
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }],
                        ['link', 'image', 'video'],
                        ['clean']
                    ];

                    var editor1 = new Quill("#exampleModal #editor1", {
                theme: "snow",
                modules: {
                   toolbar:toolbar
                }
            });

            var editor2 = new Quill("#exampleModal #editor2", {
                theme: "snow",
                modules: {
                    toolbar:toolbar
                }
            });

            var editor3 = new Quill("#exampleModal #editor3", {
                theme: "snow",
                modules: {
                    toolbar:toolbar
                }
            });

            var editor4 = new Quill("#exampleModal #editor4", {
                theme: "snow",
                modules: {
                    toolbar:toolbar
                }
            });

            var editor12 = new Quill("#exampleModal2 #editor12", {
                theme: "snow",
                modules: {
                   toolbar:toolbar
                }
            });

            var editor22 = new Quill("#exampleModal2 #editor22", {
                theme: "snow",
                modules: {
                    toolbar:toolbar
                }
            });

            var editor32 = new Quill("#exampleModal2 #editor32", {
                theme: "snow",
                modules: {
                    toolbar:toolbar
                }
            });

            var editor42 = new Quill("#exampleModal2 #editor42", {
                theme: "snow",
                modules: {
                    toolbar:toolbar
                }
            });

        });

        
        $(document).on('click', '.add-blog', function(e) {
            $("#exampleModal2").modal('show');
        })

        $(document).on('click', '.open_modal', function(e) {
            $("#exampleModal").modal('show');
			$.ajax({
                type: 'GET',
                url: '{{ route('admin.get-blog') }}',
                data: {
                    BlogID: $(this).attr('BlogID'),
                },
                success: function(data) {
					$("#status").val(data.status).change();
                    $("#blog_image").attr('src', '{{ asset('/public/') }}/' + data.blog_image);
                    $("#blog_image").closest('a').attr('href', '{{ asset('/public/') }}/' + data.blog_image);
                    
					$("#note").val(data.reject_reason);
					$("#category").val(data.category).change();
					$("#subject").val(data.subject);
					$("#BlogID").val(data.id);
					$("#editor1 .ql-editor").html(data.content1);
					$("#editor2 .ql-editor").html(data.content2);
					$("#editor3 .ql-editor").html(data.content3);
					$("#editor4 .ql-editor").html(data.content4);
                },
                error: function(data) {

                    console.log(data);
                }
            });

            
        })

        $("#exampleModal #form").submit(function(e) {
            $('#editor_content1').val(JSON.stringify($("#editor1 .ql-editor").html()));
            $('#editor_content2').val(JSON.stringify($("#editor2 .ql-editor").html()));
            $('#editor_content3').val(JSON.stringify($("#editor3 .ql-editor").html()));
            $('#editor_content4').val(JSON.stringify($("#editor4 .ql-editor").html()));
            return;
            return true;
        });

        $("#exampleModal2 #form").submit(function(e) {
            $('#editor_content12').val(JSON.stringify($("#editor12 .ql-editor").html()));
            $('#editor_content22').val(JSON.stringify($("#editor22 .ql-editor").html()));
            $('#editor_content32').val(JSON.stringify($("#editor32 .ql-editor").html()));
            $('#editor_content42').val(JSON.stringify($("#editor42 .ql-editor").html()));
            return true;
        });
    </script>

@stop
