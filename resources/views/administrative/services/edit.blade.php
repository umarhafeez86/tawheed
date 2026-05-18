@extends('administrative.layouts.main')

@section('main-container')
    <div class="container-fluid">
        <script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
        @php
            include 'ckeditor/ckeditor.php';
            include 'ckfinder/ckfinder.php';
        @endphp
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark"><?= $page_name ?></h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ url('administrative/dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ url('administrative/services/index') }}">{{ $page_name }}</a></li>
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
                                    <p
                                        style="background:#01c853;color:#fff;border-radius:5px;margin-top:20px;padding-left:20px;">
                                        {{ Session::get('success') }}
                                    <div class="clearfix"></div>
                                @endif
                                </p>
                                <div class="clearfix"></div>

                                <form data-toggle="validator" novalidate="true"
                                    action="{{ route('administrative.services.update', $services->services_id) }}"
                                    method="post" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf


                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">Select Parent Service</label>
                                        <select name="services_parent" class="form-control">
                                            <option value="0">Select</option>
                                            @php
                                                use App\Models\Services;
                                                $main_services = Services::where('services_parent', 0)
                                                    ->orderBy('created_at', 'desc')
                                                    ->get();
                                            @endphp
                                            @foreach ($main_services as $main_service)
                                                <option value="{{ $main_service->services_id }}"
                                                    @if ($services->services_parent == $main_service->services_id) selected @endif>
                                                    {{ $main_service->services_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">Service Name</label>
                                        <input type="text" name="services_name"
                                            class="form-control @error('services_name') is-invalid @enderror"
                                            data-error="Value Required."
                                            value="{{ old('services_name', $services->services_name) }}" required>
                                        <div class="help-block with-errors"></div>
                                        @error('services_name')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left"><strong
                                                style="color:#ff0000">Ex-Image</strong></label>
                                        <div class="clearfix"></div>
                                        @if ($services->services_image != '')
                                            <img height="50"
                                                src="{{ asset('uploads/services/' . $services->services_image) }}">
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">Image</label>
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <div class="form-control" data-trigger="fileinput"> <i
                                                    class="glyphicon glyphicon-file fileinput-exists"></i> <span
                                                    class="fileinput-filename"></span></div>
                                            <span class="input-group-addon fileupload btn btn-info btn-anim btn-file"><i
                                                    class="fa fa-upload"></i> <span class="fileinput-new btn-text">Select
                                                    file</span> <span class="fileinput-exists btn-text">Change</span>
                                                <input type="file" name="services_image">
                                            </span> <a href="#"
                                                class="input-group-addon btn btn-danger btn-anim fileinput-exists"
                                                data-dismiss="fileinput"><i class="fa fa-trash"></i><span class="btn-text">
                                                    Remove</span></a>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left"><strong style="color:#ff0000">Thumbnail
                                                Ex-Image</strong></label>
                                        <div class="clearfix"></div>
                                        @if ($services->services_image2 != '')
                                            <img height="50"
                                                src="{{ asset('uploads/services/' . $services->services_image2) }}">
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">Thumbnail Image</label>
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <div class="form-control" data-trigger="fileinput"> <i
                                                    class="glyphicon glyphicon-file fileinput-exists"></i> <span
                                                    class="fileinput-filename"></span></div>
                                            <span class="input-group-addon fileupload btn btn-info btn-anim btn-file"><i
                                                    class="fa fa-upload"></i> <span class="fileinput-new btn-text">Select
                                                    file</span> <span class="fileinput-exists btn-text">Change</span>
                                                <input type="file" name="services_image2">
                                            </span> <a href="#"
                                                class="input-group-addon btn btn-danger btn-anim fileinput-exists"
                                                data-dismiss="fileinput"><i class="fa fa-trash"></i><span class="btn-text">
                                                    Remove</span></a>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label text-left">Details</label>
                                        @php
                                            $CKEditor = new CKEditor();
                                            $CKEditor->returnOutput = true;
                                            $CKEditor->basePath = '../../ckeditor/';
                                            $CKEditor->config['width'] = '100%';
                                            $CKEditor->config['height'] = '650px';
                                            $initialValue = old('services_details', $services->services_details);
                                            CKFinder::SetupCKEditor($CKEditor, '../../ckfinder/');
                                            $code = $CKEditor->editor('services_details', $initialValue);
                                            echo $code;
                                        @endphp
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">SEO URL</label>
                                        <input type="text" name="services_url" class="form-control"
                                            value="{{ old('services_url', $services->services_url) }}">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">Title</label>
                                        <input type="text" name="services_title" class="form-control"
                                            value="{{ old('services_title', $services->services_title) }}">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">Description</label>
                                        <textarea name="services_descp" class="form-control" rows="5">{{ old('services_descp', $services->services_descp) }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">Keyword</label>
                                        <textarea name="services_keyword" class="form-control" rows="5">{{ old('services_keyword', $services->services_keyword) }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label text-left">Sort</label>
                                        <input type="text" name="services_sort" class="form-control"
                                            value="{{ old('services_sort', $services->services_sort) }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">Status</label>
                                        <select name="services_status" class="form-control">
                                            <option value="1" @if ($services->services_status == 1) selected @endif>
                                                Enabled</option>
                                            <option value="0" @if ($services->services_status == 0) selected @endif>
                                                Disabled</option>
                                        </select>
                                    </div>

                                    <!--div class="form-group">
                <label class="control-label mb-10 text-left">Select FAQs</label>
                <select name="faqs_id" class="form-control">
                  <option value="">Select</option>
    @php
        use App\Models\Faqs;
        $faqs = Faqs::orderBy('created_at', 'desc')->get();
    @endphp
                  @foreach ($faqs as $faq)
    <option value="{{ $faq->faqs_id }}" @if ($services->faqs_id == $faq->faqs_id) selected @endif>{{ $faq->faqs_heading }}</option>
    @endforeach
                </select>
              </div-->

                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn btn-success btn-anim"><i
                                                class="icon-rocket"></i><span class="btn-text">submit</span></button>
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
