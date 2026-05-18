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
								@if (userpermission_status(session()->get('adminusergroups_id'),"6_a")==true)
                                <button class="btn  btn-primary" onclick="window.location='{{ url('administrative/services/create') }}'">Add New</button>
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
														<th>Heading</th>
														<th>Parent</th>
														<th>Sort</th>
														<th>Status</th>
														<th></th>
														<th>Action</th>
													</tr>
												</thead>

												<tbody>
@php
use App\Models\Services;
@endphp
						@foreach ($services as $service)
                        <tr>
                          <td>{{ $service->services_id }}</td>
                          <td>
							@if ($service->show_in_related!=1) <span class="label label-info" id="related_{{ $service->services_id }}" style="cursor: pointer" onclick="updaterelatedinfo('{{ $service->services_id }}');">Normal</span> @else <span class="label label-success" id="related_{{ $service->services_id }}" style="cursor: pointer" onclick="updaterelatedinfo('{{ $service->services_id }}');">Related</span> @endif
							{{ $service->services_name }}
						  </td>
						  
@php
$main_services = Services::where('services_id',$service->services_parent)->first();
@endphp
							<td>
							@if ($main_services)
							{{ $main_services->services_name }}
							@endif
							</td>
								
						  <td>{{ $service->services_sort }}</td>
						  <td>@if ($service->services_status == 1) <span class="label label-success">Enable</span> @else <span class="label label-danger">Disable</span> @endif</td>
                          
						  <td>
							<a href="{{ route("administrative.servicesdetails.index",$service->services_id) }}" style="padding:0 5px;text-decoration:underline;color:#ff0000;">
								Manage Service Details
							</a>
						  </td>

                          <td>
                            
							@if (userpermission_status(session()->get('adminusergroups_id'),"6_e")==true)
                            <a href="{{ route("administrative.services.edit",$service->services_id) }}" style="padding:0 5px;">
                              <i class="fa fa-edit" aria-hidden="true"></i>
                            </a>
                            @endif

							@if (userpermission_status(session()->get('adminusergroups_id'),"6_d")==true)
                            <a href="javascript:void(0)" onclick="deleteData({{ $service->services_id }});">
								<i class="fa fa-trash" aria-hidden="true"></i>
							</a>
                            <form id="delete-data-from-{{ $service->services_id }}" action="{{ route("administrative.services.destroy",$service->services_id) }}" method="POST">
                              @csrf
                              @method('delete')
                            </form> 
							@endif

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
				</div>
				<!-- /Row -->
			</div>
			<script>
				function deleteData($id){
					if (confirm("Are you sure you want to delete data?")) {
						document.getElementById('delete-data-from-'+$id).submit();
					}
				}

				function updaterelatedinfo($id){	
					//alert ($id);
					$.ajax({ 
						url: "{{ url('/administrative/services/change_related') }}"+"/"+$id, 
						type: "get",
						success: function(response) {
							//alert(response);
							if (response==1){
								$("#related_"+$id).removeClass("label-info");
								$("#related_"+$id).addClass("label-success");
								$("#related_"+$id).html("Related");
							}else{
								$("#related_"+$id).removeClass("label-success");
								$("#related_"+$id).addClass("label-info");
								$("#related_"+$id).html("Normal");
							}
						}
					});
				}
			</script>
@endsection