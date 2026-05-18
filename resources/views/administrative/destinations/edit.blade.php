@extends('administrative.layouts.mainsettings')

@section('main-container')
<div class="container-fluid">
  <script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}" ></script>
  @php
  include("ckeditor/ckeditor.php");
  include('ckfinder/ckfinder.php');
  @endphp					
  <!-- Title -->
  <div class="row heading-bg">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
      <h5 class="txt-dark"><?=$page_name?></h5>
    </div>
    <!-- Breadcrumb -->
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
      <ol class="breadcrumb">
      <li><a href="{{ url('administrative/dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ url('administrative/destinations/index') }}">{{ $page_name }}</a></li>
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

              <form data-toggle="validator" novalidate="true" action="{{ route("administrative.destinations.update",$destinations->destinations_id) }}" method="post" enctype="multipart/form-data" >
                @method('put')
                @csrf
                <div class="form-group">
                  <label class="control-label mb-10 text-left">Destination Name</label>
                  <input type="text" name="destinations_name" class="form-control @error("destinations_name") is-invalid @enderror" data-error="Value Required." value="{{ old("destinations_name",$destinations->destinations_name) }}" required >
                        <div class="help-block with-errors"></div>
                        @error("destinations_name")
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                </div>
          
          <div class="form-group">
                  <label class="control-label mb-10 text-left"><strong style="color:#ff0000">Ex-Image</strong></label>
                  <div class="clearfix"></div>
                  @if ($destinations->destinations_image != "")
                  <img height="50" src="{{ asset('uploads/destinations/'.$destinations->destinations_image) }}">
                  @endif
          </div> 

          <div class="form-group">
            <label class="control-label mb-10 text-left">Image</label>
            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
              <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
              <span class="input-group-addon fileupload btn btn-info btn-anim btn-file"><i class="fa fa-upload"></i> <span class="fileinput-new btn-text">Select file</span> <span class="fileinput-exists btn-text">Change</span>
              <input type="file" name="destinations_image">
              </span> <a href="#" class="input-group-addon btn btn-danger btn-anim fileinput-exists" data-dismiss="fileinput"><i class="fa fa-trash"></i><span class="btn-text"> Remove</span></a> 
            </div>
          </div>


          <div class="form-group">
                  <label class="control-label mb-10 text-left"><strong style="color:#ff0000">Header Ex-Image</strong></label>
                  <div class="clearfix"></div>
                  @if ($destinations->destinations_image2 != "")
                  <img height="50" src="{{ asset('uploads/destinations/'.$destinations->destinations_image2) }}">
                  @endif
          </div> 

          <div class="form-group">
            <label class="control-label mb-10 text-left">Header Image</label>
            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
              <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
              <span class="input-group-addon fileupload btn btn-info btn-anim btn-file"><i class="fa fa-upload"></i> <span class="fileinput-new btn-text">Select file</span> <span class="fileinput-exists btn-text">Change</span>
              <input type="file" name="destinations_image2">
              </span> <a href="#" class="input-group-addon btn btn-danger btn-anim fileinput-exists" data-dismiss="fileinput"><i class="fa fa-trash"></i><span class="btn-text"> Remove</span></a> 
            </div>
          </div>

<div class="form-group">
            <label class="control-label text-left">Details</label>
            @php
            $CKEditor = new CKEditor();
            $CKEditor->returnOutput = true;
            $CKEditor->basePath = '../../ckeditor/';
            $CKEditor->config['width'] = "100%";
            $CKEditor->config['height'] = "650px";
            $initialValue = old("destinations_details",$destinations->destinations_details);
            CKFinder::SetupCKEditor( $CKEditor, '../../ckfinder/' ) ;
            $code = $CKEditor->editor("destinations_details", $initialValue);
            echo $code;
            @endphp
          </div>

          <div class="form-group">
            <label class="control-label mb-10 text-left">SEO URL</label>
            <input type="text" name="destinations_url" class="form-control" value="{{ old("destinations_url",$destinations->destinations_url) }}">
          </div>

          <div class="form-group">
            <label class="control-label mb-10 text-left">Title</label>
            <input type="text" name="destinations_title" class="form-control" value="{{ old("destinations_title",$destinations->destinations_title) }}">
          </div>

          <div class="form-group">
            <label class="control-label mb-10 text-left">Description</label>
            <textarea name="destinations_descp" class="form-control" rows="5">{{ old("destinations_descp",$destinations->destinations_descp) }}</textarea>
          </div>

          <div class="form-group">
            <label class="control-label mb-10 text-left">Keyword</label>
            <textarea name="destinations_keyword" class="form-control" rows="5">{{ old("destinations_keyword",$destinations->destinations_keyword) }}</textarea>
          </div>


          <div class="form-group">
            <label class="control-label text-left">Sort</label>
            <input type="text" name="destinations_sort" class="form-control" value="{{ old("destinations_sort",$destinations->destinations_sort) }}">
          </div>

          <div class="form-group">
            <label class="control-label mb-10 text-left">Status</label>
            <select name="destinations_status" class="form-control">
              <option value="1" @if ($destinations->destinations_status==1) selected @endif>Enabled</option>
              <option value="0" @if ($destinations->destinations_status==0) selected @endif>Disabled</option>
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