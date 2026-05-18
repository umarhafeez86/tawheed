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
                    <li><a href="{{ url('administrative/emailtemplates/index') }}">{{ $page_name }}</a></li>
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

              <form data-toggle="validator" novalidate="true" action="{{ route("administrative.emailtemplates.update",$emailtemplates->id) }}" method="post" enctype="multipart/form-data" >
                @method('put')
                @csrf
                <div class="form-group">
                  <label class="control-label mb-10 text-left">Email Title</label>
                  <input type="text" name="email_title" class="form-control @error("email_title") is-invalid @enderror" data-error="Value Required." value="{{ old("email_title",$emailtemplates->email_title) }}" required >
                        <div class="help-block with-errors"></div>
                        @error("email_title")
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                </div>

                <div class="form-group">
                  <label class="control-label mb-10 text-left">Email Subject</label>
                  <input type="text" name="email_subject" class="form-control @error("email_subject") is-invalid @enderror" data-error="Value Required." value="{{ old("email_subject",$emailtemplates->email_subject) }}" required >
                        <div class="help-block with-errors"></div>
                        @error("email_subject")
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                </div>

          <div class="form-group">
            <label class="control-label text-left">Details</label>
            @php
            $CKEditor = new CKEditor();
            $CKEditor->returnOutput = true;
            $CKEditor->basePath = '../../ckeditor/';
            $CKEditor->config['width'] = "100%";
            $CKEditor->config['height'] = "650px";
            $initialValue = old("email_content",$emailtemplates->email_content);
            CKFinder::SetupCKEditor( $CKEditor, '../../ckfinder/' ) ;
            $code = $CKEditor->editor("email_content", $initialValue);
            echo $code;
            @endphp
          </div>

          <div class="form-group">
            <label class="control-label mb-10 text-left">Status</label>
            <select name="status" class="form-control">
              <option value="1" @if ($emailtemplates->status==1) selected @endif>Enabled</option>
              <option value="0" @if ($emailtemplates->status==0) selected @endif>Disabled</option>
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