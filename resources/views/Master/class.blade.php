@extends('layout')
@section('content')

<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<div class="row">
					<div class="col-md-8 mx-auto" >
						<div class="card">
							<div class="card-body">
								<div class="card-title d-flex align-items-center">
								
									<h5 class="mb-0 text-primary">Add Class</h5>
								</div>
								<hr>
								<form class="row g-2" action="{{route('admin.master.create_clsss')}}" method="post">
									@csrf
									
						<div class="col-md-2"></div>
									<div class="col-md-4">
										<label for="inputFirstName" class="form-label">Class*</label>
										<input type="text" class="form-control" id="inputFirstName" placeholder="Class" name="class">
									</div>
						
									<div class="col-md-3" style="margin-top:5%;" >
								       <button type="submit" class="btn btn-primary px-3"><i class="lni lni-circle-plus"></i> Add  </button>
									</div>
								</form>
		
							</div>
		
						</div>
					</div>
				</div>
				

				
				<!--end page wrapper -->
				<!--start overlay-->
				<div class="overlay toggle-icon"></div>
				<hr/>
				<div class="col-md-8 mx-auto">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Sr. No.</th>
										<th>Class</th>  
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									
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