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
                                <div class="pull-right">
								@if (userpermission_status(session()->get('adminusergroups_id'),"5_a")==true)
                                <!--button class="btn  btn-primary" onclick="window.location='{{ url('administrative/settings/create') }}'">Add New</button-->
                                @endif
								</div>
                                
                                <div class="clearfix"></div>
                                @if (Session::has('success'))
                                <p style="background:#01c853;color:#fff;border-radius:5px;margin-top:20px;padding-left:20px;">
                                {{ Session::get('success') }}
                                <div class="clearfix"></div>
                                @endif
                                </p>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="datable_1" class="table  display table-hover mb-30">
												<thead>
													<tr>
														<th>ID</th>
														<th>Name</th>
                            							<th>Address</th>
														<th>Phone</th>
														<th>Email</th>
														<!--th>Action</th-->
													</tr>
												</thead>

												<tbody>
                        @foreach ($settings as $setting)
                        <tr>
                          <td>{{ $setting->id }}</td>
                          <td>{{ $setting->setting_name }}</td>
                          <td>{{ $setting->setting_address }}</td>

						  <td>{{ $setting->setting_phone }}</td>
						  <td>{{ $setting->setting_email }}</td>
                          
                          <!--td>
                            
							@if (userpermission_status(session()->get('adminusergroups_id'),"5_e")==true)
                            <a href="{{ route("administrative.settings.edit",$setting->id) }}" style="padding:0 5px;">
                              <i class="fa fa-edit" aria-hidden="true"></i>
                            </a>
                            @endif

							@if (userpermission_status(session()->get('adminusergroups_id'),"5_d")==true)
                            <a href="javascript:void(0)" onclick="deleteData({{ $setting->id }});">
								<i class="fa fa-trash" aria-hidden="true"></i>
							</a>
                            <form id="delete-data-from-{{ $setting->id }}" action="{{ route("administrative.settings.destroy",$setting->id) }}" method="POST">
                              @csrf
                              @method('delete')
                            </form> 
							@endif

                          </td-->
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
				</div>
				<!-- /Row -->
			</div>
			<script>
				function deleteData($id){
					if (confirm("Are you sure you want to delete data?")) {
						//ocument.getElementById('delete-data-from-'+$id).submit();
					}
				}
			</script>
@endsection