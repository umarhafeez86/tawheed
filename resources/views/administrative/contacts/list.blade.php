@extends('administrative.layouts.main')

@section('main-container')
		<!-- Footable CSS -->
		<link href="{{ url('admin/vendors/bower_components/jsgrid/dist/jsgrid.min.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ url('admin/vendors/bower_components/jsgrid/dist/jsgrid-theme.min.css') }}" rel="stylesheet" type="text/css"/>
        
        <div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<h5 class="txt-dark">{{ $page_name }}</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="{{ url('administrative/dashboard') }}">Dashboard</a></li>
							<li class="active"><span>{{ $subpage_name }}</span></li>
						</ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->
				
				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">{{ $subpage_name }} List</h6>
								</div>
                                
                                <div class="clearfix"></div>
                                @if (Session::has('success'))
                                <p style="background:#01c853;color:#fff;border-radius:5px;margin-top:20px;padding-left:20px;">
										{{ Session::get('success') }}
										<div class="clearfix"></div>
                                </p>
								@endif
								<div class="clearfix"></div>
							</div>

							<div class="panel-wrapper collapse in">
							<div class="panel-body">
								<div class="form-wrap">


              <form data-toggle="validator" novalidate="true" action="{{ url("/administrative/contacts/exportcontacts") }}" method="post" enctype="multipart/form-data" >
              @csrf
						<div class="form-group col-xs-6">
								<label class="control-label mb-10 text-left">Date From</label>
								<input type="date" name="freequotes_date_from" class="form-control @error("freequotes_date_from") is-invalid @enderror" data-error="Value Required." value="{{ old("freequotes_date_from") }}" required >
										<div class="help-block with-errors"></div>
										@error("freequotes_date_from")
										<p class="invalid-feedback">{{ $message }}</p>
										@enderror
						</div>

						<div class="form-group col-xs-6">
								<label class="control-label mb-10 text-left">Date To</label>
								<input type="date" name="freequotes_date_to" class="form-control @error("freequotes_date_to") is-invalid @enderror" data-error="Value Required." value="{{ old("freequotes_date_to") }}" required >
										<div class="help-block with-errors"></div>
										@error("freequotes_date_to")
										<p class="invalid-feedback">{{ $message }}</p>
										@enderror
						</div>

						<div class="form-group mb-2">
							<button type="submit" class="btn btn-success btn-anim"><i class="icon-rocket"></i><span class="btn-text">Export Data</span></button>

							<a href="{{ url('administrative/contacts/emptycontacts') }}" class="btn btn-danger btn-anim pull-right">
								<i class="fa fa-trash" aria-hidden="true"></i> <span class="btn-text">Delete Data</span>
							</a>
						</div>

			  </form>


								</div>
							</div>
							</div>

						</div>
					</div>
				</div>
				<!-- /Row -->
			</div>
			<script>
				function deleteData($id){
					if (confirm("Are you sure you want to delete data?")) {
						document.getElementById('delete-data-from-'+$id).submit();
					}
				}
			</script>
@endsection