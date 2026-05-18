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
                    <li><a href="{{ url('administrative/packages/index') }}">{{ $page_name }}</a></li>
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

<div class="clearfix"></div>
              @if (Session::has('success'))
              <p style="background:#01c853;color:#fff;border-radius:5px;margin-top:20px;padding-left:20px;">
              {{ Session::get('success') }}
              <div class="clearfix"></div>
              @endif
              </p>
<div class="clearfix"></div>

              <form data-toggle="validator" novalidate="true" action="{{ route("administrative.packages.update",$packages->packages_id) }}" method="post" enctype="multipart/form-data" >
                @method('put')
                @csrf
                <div class="form-group">
                  <label class="control-label mb-10 text-left">Service Name</label>
                  <input type="text" name="packages_name" class="form-control @error("packages_name") is-invalid @enderror" data-error="Value Required." value="{{ old("packages_name",$packages->packages_name) }}" required >
                        <div class="help-block with-errors"></div>
                        @error("packages_name")
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                </div>
                
                <div class="form-group">
                  <label class="control-label text-left">Short/Makkah Hotel Info.</label>
                  <textarea name="packages_info" class="form-control" rows="5">{{ old("packages_info",$packages->packages_info) }}</textarea>
                </div>      
          
          <div class="form-group">
                  <label class="control-label mb-10 text-left"><strong style="color:#ff0000">Ex-Image</strong></label>
                  <div class="clearfix"></div>
                  @if ($packages->packages_image != "")
                  <img height="50" src="{{ asset('uploads/packages/'.$packages->packages_image) }}">
                  @endif
          </div>

          <div class="form-group">
            <label class="control-label mb-10 text-left">Image</label>
            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
              <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
              <span class="input-group-addon fileupload btn btn-info btn-anim btn-file"><i class="fa fa-upload"></i> <span class="fileinput-new btn-text">Select file</span> <span class="fileinput-exists btn-text">Change</span>
              <input type="file" name="packages_image">
              </span> <a href="#" class="input-group-addon btn btn-danger btn-anim fileinput-exists" data-dismiss="fileinput"><i class="fa fa-trash"></i><span class="btn-text"> Remove</span></a> 
            </div>
          </div>

          <div class="form-group">
            <label class="control-label text-left">Details/Makkah Hotel Info.</label>
            <textarea name="packages_details" class="textarea_editor form-control" rows="5">{{ old("packages_details",$packages->packages_details) }}</textarea>
          </div>

          <div class="form-group col-xs-12 col-sm-4" style="padding-left:0px;">
            <label class="control-label mb-10 text-left">Room Option 1</label>
            <input type="text" name="packages_tag" class="form-control" value="{{ old("packages_tag",$packages->packages_tag) }}">
          </div>

          <div class="form-group col-xs-12 col-sm-4" style="padding-left:0px;">
            <label class="control-label mb-10 text-left">Price 1</label>
            <input type="text" name="packages_price" class="form-control" value="{{ old("packages_price",$packages->packages_price) }}">
          </div>

          <div class="form-group col-xs-12 col-sm-4" style="padding-left:0px;">
            <label class="control-label mb-10 text-left">Room Option 2</label>
            <input type="text" name="packages_tag2" class="form-control" value="{{ old("packages_tag2",$packages->packages_tag2) }}">
          </div>

          <div class="form-group col-xs-12 col-sm-4" style="padding-left:0px;">
            <label class="control-label mb-10 text-left">Price 2</label>
            <input type="text" name="packages_price2" class="form-control" value="{{ old("packages_price2",$packages->packages_price2) }}">
          </div>

          <div class="form-group col-xs-12 col-sm-4" style="padding-left:0px;">
            <label class="control-label mb-10 text-left">Room Option 3</label>
            <input type="text" name="packages_tag3" class="form-control" value="{{ old("packages_tag3",$packages->packages_tag3) }}">
          </div>

          <div class="form-group col-xs-12 col-sm-4" style="padding-left:0px;">
            <label class="control-label mb-10 text-left">Price 3</label>
            <input type="text" name="packages_price3" class="form-control" value="{{ old("packages_price3",$packages->packages_price3) }}">
          </div>

          <!--<div class="form-group col-xs-12 col-sm-4" style="padding-left:0px;">
            <label class="control-label mb-10 text-left">Price By</label>
            <select name="packages_priceby" class="form-control">
              <option value="1" @if ($packages->packages_priceby==1) selected @endif >Monthly</option>
              <option value="0" @if ($packages->packages_priceby==0) selected @endif >Yearly</option>
              <option value="2" @if ($packages->packages_priceby==2) selected @endif >None</option>
            </select>
          </div>-->

          <div class="form-group">
            <label class="control-label text-left">Sort</label>
            <input type="text" name="packages_sort" class="form-control" value="{{ old("packages_sort",$packages->packages_sort) }}">
          </div>
          <div class="form-group">
            <label class="control-label mb-10 text-left">Status</label>
            <select name="packages_status" class="form-control">
              <option value="1" @if ($packages->packages_status==1) selected @endif>Enabled</option>
              <option value="0" @if ($packages->packages_status==0) selected @endif>Disabled</option>
            </select>
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