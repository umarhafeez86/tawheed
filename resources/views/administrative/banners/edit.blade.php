@extends('administrative.layouts.mainsettings')

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
                    <li><a href="{{ url('administrative/banners/index') }}">{{ $page_name }}</a></li>
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

              <form data-toggle="validator" novalidate="true" action="{{ route("administrative.banners.update",$banners->banners_id) }}" method="post" enctype="multipart/form-data" >
                @method('put')
                @csrf
                <div class="form-group">
                  <label class="control-label mb-10 text-left">Heading</label>
                  <input type="text" name="banners_name" class="form-control @error("banners_name") is-invalid @enderror" data-error="Value Required." value="{{ old("banners_name",$banners->banners_name) }}" required >
                        <div class="help-block with-errors"></div>
                        @error("banners_name")
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                </div>
          
          <div class="form-group">
                  <label class="control-label mb-10 text-left"><strong style="color:#ff0000">Ex-Image</strong></label>
                  <div class="clearfix"></div>
                  @if ($banners->banners_image != "")
                  <img height="50" src="{{ asset('uploads/banners/'.$banners->banners_image) }}">
                  @endif
          </div> 

          <div class="form-group">
            <label class="control-label mb-10 text-left">Image</label>
            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
              <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
              <span class="input-group-addon fileupload btn btn-info btn-anim btn-file"><i class="fa fa-upload"></i> <span class="fileinput-new btn-text">Select file</span> <span class="fileinput-exists btn-text">Change</span>
              <input type="file" name="banners_image">
              </span> <a href="#" class="input-group-addon btn btn-danger btn-anim fileinput-exists" data-dismiss="fileinput"><i class="fa fa-trash"></i><span class="btn-text"> Remove</span></a> 
            </div>
          </div>


          <div class="form-group">
            <label class="control-label text-left">Details</label>
            <textarea name="banners_details" class="textarea_editor form-control" rows="5">{{ old("banners_details",$banners->banners_details) }}</textarea>
          </div>

          <div class="form-group">
            <label class="control-label mb-10 text-left">Link</label>
            <input type="text" name="banners_link" class="form-control" value="{{ old("banners_link",$banners->banners_link) }}">
          </div>

          <div class="form-group">
            <label class="control-label text-left">Sort</label>
            <input type="text" name="banners_sort" class="form-control" value="{{ old("banners_sort",$banners->banners_sort) }}">
          </div>

          <div class="form-group">
            <label class="control-label mb-10 text-left">Status</label>
            <select name="banners_status" class="form-control">
              <option value="1" @if ($banners->banners_status==1) selected @endif>Enabled</option>
              <option value="0" @if ($banners->banners_status==0) selected @endif>Disabled</option>
            </select>
          </div>

                <div class="form-group">
                  <label class="control-label mb-10 text-left">Banners For</label>
                  <select name="banners_for" class="form-control">
                    <option value="0" @if ($banners->banners_for==0) selected @endif>Umrah</option>
                    <option value="1" @if ($banners->banners_for==1) selected @endif>Umrah and Holiday</option>
                    <option value="2" @if ($banners->banners_for==2) selected @endif>Feature Holiday Packages</option>
                    <option value="3" @if ($banners->banners_for==3) selected @endif>Text Blocks</option>
                  </select>
                </div>


          <div class="form-group">
            <label class="control-label text-left">Image Box Type</label>
            <select name="banners_image_box_type" class="form-control">
              <option value="">Select</option>
              <option value="0" {{ old('banners_image_box_type',$banners->banners_image_box_type) == 0 ? 'selected' : '' }} >Basic</option>
              <option value="1" {{ old('banners_image_box_type',$banners->banners_image_box_type) == 1 ? 'selected' : '' }} >Type 1</option>
              <option value="2" {{ old('banners_image_box_type',$banners->banners_image_box_type) == 2 ? 'selected' : '' }} >Type 2</option>
              <option value="3" {{ old('banners_image_box_type',$banners->banners_image_box_type) == 3 ? 'selected' : '' }} >Type 3</option>
            </select>
          </div>

          {{-- <div class="form-group">
            <label class="control-label mb-10 text-left">Text 1 / Total Nights</label>
            <input type="text" name="banners_text1" class="form-control" value="{{ old("banners_text1",$banners->banners_text1) }}" >
          </div>
          <div class="form-group">
            <label class="control-label mb-10 text-left">Text 2 / Makkah Nights</label>
            <input type="text" name="banners_text2" class="form-control" value="{{ old("banners_text2",$banners->banners_text2) }}" >
          </div>
          <div class="form-group">
            <label class="control-label mb-10 text-left">Text 3 / Madinah Nights</label>
            <input type="text" name="banners_text3" class="form-control" value="{{ old("banners_text3",$banners->banners_text3) }}" >
          </div>

          <div class="form-group">
            <label class="control-label mb-10 text-left">Price</label>
            <input type="text" name="banners_price" class="form-control" value="{{ old("banners_price",$banners->banners_price) }}" >
          </div> --}}

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