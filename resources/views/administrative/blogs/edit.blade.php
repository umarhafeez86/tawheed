@extends('administrative.layouts.main')

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
                    <li><a href="{{ url('administrative/blogs/index') }}">{{ $page_name }}</a></li>
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

              <form data-toggle="validator" novalidate="true" action="{{ route("administrative.blogs.update",$blogs->blogs_id) }}" method="post" enctype="multipart/form-data" >
                @method('put')
                @csrf
                <div class="form-group">
                  <label class="control-label mb-10 text-left">Service Name</label>
                  <input type="text" name="blogs_name" class="form-control @error("blogs_name") is-invalid @enderror" data-error="Value Required." value="{{ old("blogs_name",$blogs->blogs_name) }}" required >
                        <div class="help-block with-errors"></div>
                        @error("blogs_name")
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                </div>

                <div class="form-group">
                  <label class="control-label mb-10 text-left">SEO URL</label>
                  <input type="text" name="blogs_url" class="form-control" value="{{ old("blogs_url",$blogs->blogs_url) }}">
                </div>

                <div class="form-group">
                  <label class="control-label text-left">Details</label>
                  @php
                  $CKEditor = new CKEditor();
                  $CKEditor->returnOutput = true;
                  $CKEditor->basePath = '../../ckeditor/';
                  $CKEditor->config['width'] = "100%";
                  $CKEditor->config['height'] = "650px";
                  $initialValue = old("blogs_details",$blogs->blogs_details);
                  CKFinder::SetupCKEditor( $CKEditor, '../../ckfinder/' ) ;
                  $code = $CKEditor->editor("blogs_details", $initialValue);
                  echo $code;
                  @endphp
                </div>
      
                <div class="form-group col-xs-12 col-sm-4" style="padding-left:0px;">
                  <label class="control-label mb-10 text-left">Date</label>
                  <input type="date" name="blogs_date" class="form-control" value="{{ old("blogs_date",$blogs->blogs_date) }}">
                </div>

                <div class="form-group col-xs-12 col-sm-4" style="padding-left:0px;">
                  <label class="control-label mb-10 text-left">Author</label>
                  <input type="text" name="blogs_author" class="form-control" value="{{ old("blogs_author",$blogs->blogs_author) }}">
                </div>

                <div class="form-group col-xs-12 col-sm-4" style="padding-left:0px;">
                  <label class="control-label mb-10 text-left">Tag</label>
                  <input type="text" name="blogs_tag" class="form-control" value="{{ old("blogs_tag",$blogs->blogs_tag) }}">
                </div>
      
          <div class="form-group">
                  <label class="control-label mb-10 text-left"><strong style="color:#ff0000">Ex-Image</strong></label>
                  <div class="clearfix"></div>
                  @if ($blogs->blogs_image != "")
                  <img height="50" src="{{ asset('uploads/blogs/'.$blogs->blogs_image) }}">
                  @endif
          </div>

          <div class="form-group">
            <label class="control-label mb-10 text-left">Image</label>
            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
              <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
              <span class="input-group-addon fileupload btn btn-info btn-anim btn-file"><i class="fa fa-upload"></i> <span class="fileinput-new btn-text">Select file</span> <span class="fileinput-exists btn-text">Change</span>
              <input type="file" name="blogs_image">
              </span> <a href="#" class="input-group-addon btn btn-danger btn-anim fileinput-exists" data-dismiss="fileinput"><i class="fa fa-trash"></i><span class="btn-text"> Remove</span></a> 
            </div>
          </div>


          <div class="form-group">
            <label class="control-label text-left">Sort</label>
            <input type="text" name="blogs_sort" class="form-control" value="{{ old("blogs_sort",$blogs->blogs_sort) }}">
          </div>
          <div class="form-group">
            <label class="control-label mb-10 text-left">Status</label>
            <select name="blogs_status" class="form-control">
              <option value="1" @if ($blogs->blogs_status==1) selected @endif>Enabled</option>
              <option value="0" @if ($blogs->blogs_status==0) selected @endif>Disabled</option>
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