@extends('administrative.layouts.main')

@section('main-container')
<div class="container-fluid">
					
  <!-- Title -->
  <div class="row heading-bg">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
      <h5 class="txt-dark"><?=$page_name?></h5>
    </div>
    <!-- Breadcrumb -->
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
      <ol class="breadcrumb">
      <li><a href="{{ url('administrative/dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ url('administrative/usersadmin/index') }}">{{ $page_name }}</a></li>
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
            <h6 class="panel-title txt-dark">{{ $subpage_name }}</h6>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="panel-wrapper collapse in">
          <div class="panel-body">
            <div class="form-wrap">
                                
              <form data-toggle="validator" novalidate="true" action="{{ route("administrative.usersadmin.store") }}" method="post" enctype="multipart/form-data" >
              @csrf
                <div class="form-group">
                  <label class="control-label mb-10 text-left">Name</label>
                  <input type="text" name="name" class="form-control @error("name") is-invalid @enderror" data-error="Value Required." value="{{ old("name") }}" required >
                        <div class="help-block with-errors"></div>
                        @error("name")
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                </div>
                                        
                <div class="form-group">
                  <label class="control-label mb-10 text-left">Email</label>
                  <input type="text" name="email" class="form-control @error("email") is-invalid @enderror" data-error="Value Required." value="{{ old("email") }}" required >
                        <div class="help-block with-errors"></div>
                        @error("email")
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                </div>


                <div class="form-group col-xs-12 col-sm-6" style="padding-left:0px;">
                  <label class="control-label mb-10 text-left">Password</label>
                  <input type="password" name="password" class="form-control @error("password") is-invalid @enderror" data-error="Value Required." value="{{ old("password") }}" required id="inputPassword"  >
                        <div class="help-block with-errors"></div>
                        @error("password")
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                </div>
                                                                            
                <div class="form-group col-xs-12 col-sm-6">
                  <label class="control-label mb-10 text-left">Confirm Password</label>
                  <input type="password" name="admin_cpassword" class="form-control @error("admin_cpassword") is-invalid @enderror" value="{{ old("admin_cpassword") }}" required id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Whoops, Password and Confirm Password don't match" >
                        <div class="help-block with-errors"></div>
                        @error("admin_cpassword")
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                </div>                                                
                                        
                                        
<div class="form-group col-xs-12" style="padding-left:0px;">
                  <label class="control-label mb-10 text-left">User Group</label>
                  <select name="usergroups_id" class="form-control">
                  <option value="">Select Group</option>
@php
use App\Models\Wlusergroups;
$usergroups = Wlusergroups::orderBy('created_at','desc')->get();
@endphp
                  @foreach  ($usergroups as $usergroup)     
                  <option value="{{ $usergroup->usergroups_id }}" >{{ $usergroup->usergroups_name }}</option>
                  @endforeach
                  </select>
</div>


                <div class="form-group">
                  <label class="control-label mb-10 text-left">Status</label>
                  <div class="radio radio-info">
                    <input type="radio" name="status" id="radio1" value="1" @if (old("status") == 1) checked @endif >
                    <label for="radio1">
                      Enable
                    </label>
                  </div>
                  <div class="radio radio-info">
                    <input type="radio" name="status" id="radio2" value="0" @if (old("status") != 1) checked @endif>
                    <label for="radio2">
                      Disable
                    </label>
                  </div>	
                </div>
              
<div class="form-group mb-0">
      <button type="submit" class="btn btn-success btn-anim"><i class="icon-rocket"></i><span class="btn-text">submit</span></button>
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
@endsection