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
                    <li><a href="{{ url('administrative/settings/index') }}">{{ $page_name }}</a></li>
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
                                
              <form data-toggle="validator" novalidate="true" action="{{ route("administrative.settings.store") }}" method="post" enctype="multipart/form-data" >
              @csrf
                <div class="form-group">
                  <label class="control-label mb-10 text-left">Name</label>
                  <input type="text" name="setting_name" class="form-control @error("setting_name") is-invalid @enderror" data-error="Value Required." value="{{ old("setting_name") }}" required >
                        <div class="help-block with-errors"></div>
                        @error("setting_name")
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                </div>
                                        
                <div class="form-group">
                  <label class="control-label mb-10 text-left">Address</label>
                  <textarea name="setting_address" class="textarea_editor form-control" rows="5" required >{{ old("setting_address") }}</textarea>
                </div>

                <div class="form-group col-xs-12 col-sm-4">
                  <label class="control-label mb-10 text-left">Phone</label>
                  <input type="text" name="setting_phone" class="form-control @error("setting_phone") is-invalid @enderror" data-error="Value Required." value="{{ old("setting_phone") }}" required >
                        <div class="help-block with-errors"></div>
                        @error("setting_phone")
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                </div>

                <div class="form-group col-xs-12 col-sm-4">
                  <label class="control-label mb-10 text-left">Phone 2</label>
                  <input type="text" name="setting_phone2" class="form-control" value="{{ old("setting_phone2") }}" >
                </div>

                <div class="form-group col-xs-12 col-sm-4">
                  <label class="control-label mb-10 text-left">Email</label>
                  <input type="text" name="setting_email" class="form-control @error("setting_email") is-invalid @enderror" data-error="Value Required." value="{{ old("setting_email") }}" required >
                        <div class="help-block with-errors"></div>
                        @error("setting_email")
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                </div>

                <div class="form-group col-xs-12 col-sm-6">
                  <label class="control-label mb-10 text-left">WhatsApp No.</label>
                  <input type="text" name="setting_whatsappno" class="form-control" value="{{ old("setting_whatsappno") }}" >
                </div>

                <div class="form-group col-xs-12 col-sm-6">
                  <label class="control-label mb-10 text-left">Web Address</label>
                  <input type="text" name="setting_webaddress" class="form-control" value="{{ old("setting_webaddress") }}" >
                </div>

                <div class="form-group col-xs-12">
                  <label class="control-label mb-10 text-left">Copyrights</label>
                  <input type="text" name="setting_copyrights" class="form-control @error("setting_copyrights") is-invalid @enderror" data-error="Value Required." value="{{ old("setting_copyrights") }}" required >
                        <div class="help-block with-errors"></div>
                        @error("setting_copyrights")
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                </div>

                <div class="form-group col-xs-12 col-sm-3">
                  <label class="control-label mb-10 text-left">FB Link</label>
                  <input type="text" name="setting_fb_link" class="form-control @error("setting_fb_link") is-invalid @enderror" data-error="Value Required." value="{{ old("setting_fb_link") }}" >
                </div>

                <div class="form-group col-xs-12 col-sm-3">
                  <label class="control-label mb-10 text-left">Instagram Link</label>
                  <input type="text" name="setting_insta_link" class="form-control @error("setting_insta_link") is-invalid @enderror" data-error="Value Required." value="{{ old("setting_insta_link") }}" >
                </div>

                <div class="form-group col-xs-12 col-sm-3">
                  <label class="control-label mb-10 text-left">Twitter Link</label>
                  <input type="text" name="setting_tw_link" class="form-control @error("setting_tw_link") is-invalid @enderror" data-error="Value Required." value="{{ old("setting_tw_link") }}" >
                </div>

                <div class="form-group col-xs-12 col-sm-3">
                  <label class="control-label mb-10 text-left">Linkedin Link</label>
                  <input type="text" name="setting_linkedin_link" class="form-control @error("setting_linkedin_link") is-invalid @enderror" data-error="Value Required." value="{{ old("setting_linkedin_link") }}" >
                </div>

                <div class="form-group col-xs-12 col-sm-3">
                  <label class="control-label mb-10 text-left">Currency Symbol</label>
                  <input type="text" name="currency_symbol" class="form-control @error("currency_symbol") is-invalid @enderror" value="{{ old("currency_symbol") }}" >
                </div>

                <div class="form-group col-xs-12 col-sm-3">
                  <label class="control-label mb-10 text-left">Price Range <span style="font-size: 10px;">(Comma Separated)</span></label>
                  <input type="text" name="price_range" class="form-control @error("price_range") is-invalid @enderror" value="{{ old("price_range") }}" >
                </div>

                <div class="form-group col-xs-12 col-sm-3">
                  <label class="control-label mb-10 text-left">Filter Nights Values <span style="font-size: 10px;">(Comma Separated)</span></label>
                  <input type="text" name="filter_nights_values" class="form-control @error("filter_nights_values") is-invalid @enderror" value="{{ old("filter_nights_values") }}" >
                </div>
                
                <div class="form-group col-xs-12 col-sm-3">
                  <label class="control-label mb-10 text-left">Filter Star Values  <span style="font-size: 10px;">(Comma Separated)</span></label>
                  <input type="text" name="filter_star_values" class="form-control @error("filter_star_values") is-invalid @enderror" value="{{ old("filter_star_values") }}" >
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