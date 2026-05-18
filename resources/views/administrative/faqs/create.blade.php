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
                    <li><a href="{{ url('administrative/faqs/index') }}">{{ $page_name }}</a></li>
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
                                
              <form data-toggle="validator" novalidate="true" action="{{ route("administrative.faqs.store") }}" method="post" enctype="multipart/form-data" >
              @csrf
                <div class="form-group">
                  <label class="control-label mb-10 text-left">Heading</label>
                  <input type="text" name="faqs_heading" class="form-control @error("faqs_heading") is-invalid @enderror" data-error="Value Required." value="{{ old("faqs_heading") }}" required >
                        <div class="help-block with-errors"></div>
                        @error("faqs_heading")
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                </div>


                <div class="form-group col-xs-12">
                  <label class="control-label mb-10 text-left">Image</label>
                  <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                    <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                    <span class="input-group-addon fileupload btn btn-info btn-anim btn-file"><i class="fa fa-upload"></i> <span class="fileinput-new btn-text">Select file</span> <span class="fileinput-exists btn-text">Change</span>
                    <input type="file" name="faqs_image">
                    </span> <a href="#" class="input-group-addon btn btn-danger btn-anim fileinput-exists" data-dismiss="fileinput"><i class="fa fa-trash"></i><span class="btn-text"> Remove</span></a> 
                  </div>
                </div>

                <div class="form-group" id="faqslist"> 
                  <div class="form-group">
                        <input type="hidden" name="rownumber" id="rownumber" value="1">
                        <a id="add-more1" name="add-more" class="btn btn-primary" style="padding: 4px 13px;" onclick="faqslist_fields();">+ Add Faqs List</a>
                  </div>
                  <div class="form-group">
                    <label class="control-label text-left">Question</label>
                    <input type="text" name="faqsdetails_question[]" class="form-control" value="{{ old("faqsdetails_question") }}">
                  </div>
                  <div class="form-group">
                    <label class="control-label text-left">Answer</label>
                    <textarea name="faqsdetails_answer[]" class="textarea_editor form-control" rows="5">{{ old("faqsdetails_answer") }}</textarea>
                  </div>
                  <div class="form-group">
                    <label class="control-label text-left">Sort</label>
                    <input type="text" name="faqsdetails_sort[]" class="form-control" value="{{ old("faqsdetails_sort") }}">
                  </div>
                  <div class="form-group">
                    <label class="control-label mb-10 text-left">Status</label>
                    <select name="status[]" class="form-control">
                      <option value="1">Enabled</option>
                      <option value="0">Disabled</option>
                    </select>
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