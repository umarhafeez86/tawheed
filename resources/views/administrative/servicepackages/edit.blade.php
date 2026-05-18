@extends('administrative.layouts.mainsettings')

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
                    <li><a href="{{ url('administrative/servicepackages/index') }}">{{ $page_name }}</a></li>
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
                                    action="{{ route('administrative.servicepackages.update', $servicepackages->servicepackages_id) }}"
                                    method="post" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf


                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">Select Service</label>
                                        <select name="services_id" class="form-control">
                                            <option value="0">Select</option>
                                            @php
                                                use App\Models\Services;
                                                $main_services = Services::where('services_parent', 0)
                                                    ->orderBy('created_at', 'desc')
                                                    ->get();
                                            @endphp
                                            @foreach ($main_services as $main_service)
                                                <option value="{{ $main_service->services_id }}"
                                                    @if ($servicepackages->services_id == $main_service->services_id) selected @endif>
                                                    {{ $main_service->services_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12 col-sm-5">
                                        <label class="control-label mb-10 text-left">Package Name</label>
                                        <input type="text" name="servicepackages_name"
                                            class="form-control @error('servicepackages_name') is-invalid @enderror"
                                            data-error="Value Required."
                                            value="{{ old('servicepackages_name', $servicepackages->servicepackages_name) }}"
                                            required>
                                        <div class="help-block with-errors"></div>
                                        @error('servicepackages_name')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-12 col-sm-3">
                                        <label class="control-label mb-10 text-left" style="color: #ff0000">Holiday
                                            Destination</label>
                                        <select name="destinations_id" class="form-control">
                                            <option value="">Select</option>
                                            @php
                                                use App\Models\Destinations;
                                                $destinations = Destinations::where('destinations_status', 1)
                                                    ->orderBy('destinations_name', 'asc')
                                                    ->get();
                                            @endphp
                                            @foreach ($destinations as $destination)
                                                <option value="{{ $destination->destinations_id }}"
                                                    @if ($destination->destinations_id == $servicepackages->destinations_id) selected @endif>
                                                    {{ $destination->destinations_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12 col-sm-2">
                                        <label class="control-label mb-10 text-left">Total Nights</label>
                                        <input type="text" name="servicepackages_totalnights"
                                            class="form-control @error('servicepackages_totalnights') is-invalid @enderror"
                                            data-error="Value Required."
                                            value="{{ old('servicepackages_totalnights', $servicepackages->servicepackages_totalnights) }}"
                                            required>
                                        <div class="help-block with-errors"></div>
                                        @error('servicepackages_totalnights')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-12 col-sm-2">
                                        <label class="control-label mb-10 text-left">Star Category</label>
                                        <input type="text" name="servicepackages_startype"
                                            class="form-control @error('servicepackages_startype') is-invalid @enderror"
                                            data-error="Value Required."
                                            value="{{ old('servicepackages_startype', $servicepackages->servicepackages_startype) }}"
                                            required>
                                        <div class="help-block with-errors"></div>
                                        @error('servicepackages_startype')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="clearfix"></div>
                                    <div class="form-group col-12 col-sm-2">
                                        <label class="control-label mb-10 text-left">Makkah Nights</label>
                                        <input type="text" name="servicepackages_makkahnights" class="form-control"
                                            data-error="Value Required."
                                            value="{{ old('servicepackages_makkahnights', $servicepackages->servicepackages_makkahnights) }}">
                                    </div>

                                    <div class="form-group col-12 col-sm-2">
                                        <label class="control-label mb-10 text-left">Madinah Nights</label>
                                        <input type="text" name="servicepackages_madinahnights" class="form-control"
                                            value="{{ old('servicepackages_madinahnights', $servicepackages->servicepackages_madinahnights) }}">
                                    </div>

                                    <div class="form-group col-12 col-sm-2">
                                        <label class="control-label mb-10 text-left" style="color: #ff0000">Destination
                                            Nights</label>
                                        <input type="text" name="servicepackages_destinations_nights"
                                            class="form-control"
                                            value="{{ old('servicepackages_destinations_nights', $servicepackages->servicepackages_destinations_nights) }}">
                                    </div>

                                    <div class="form-group col-12 col-sm-3">
                                        <label class="control-label mb-10 text-left">Flight Text</label>
                                        <input type="text" name="servicepackages_flightinfo" class="form-control"
                                            value="{{ old('servicepackages_flightinfo', $servicepackages->servicepackages_flightinfo) }}">
                                    </div>

                                    <div class="form-group col-12 col-sm-3">
                                        <label class="control-label mb-10 text-left">Visa Info.</label>
                                        <select name="visa_info" class="form-control">
                                            <option value="">Select</option>
                                            <option value="Included"
                                                {{ old('visa_info', $servicepackages->visa_info) == 'Included' ? 'selected' : '' }}>
                                                Included</option>
                                            <option value="Not Included"
                                                {{ old('visa_info'), $servicepackages->visa_info == 'Not Included' ? 'selected' : '' }}>
                                                Not Included</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-6 col-sm-2">
                                        <label class="control-label mb-10 text-left">Mak: Hotel Meal Info.</label>
                                        <select name="makkah_hotel_meal_info" class="form-control">
                                            <option value="">Select</option>
                                            <option value="Not Included"
                                                {{ old('makkah_hotel_meal_info', $servicepackages->makkah_hotel_meal_info) == 'Not Included' ? 'selected' : '' }}>
                                                Not Included</option>
                                            <option value="Breakfast"
                                                {{ old('makkah_hotel_meal_info', $servicepackages->makkah_hotel_meal_info) == 'Breakfast' ? 'selected' : '' }}>
                                                Breakfast</option>
                                            <option value="Half Board"
                                                {{ old('makkah_hotel_meal_info', $servicepackages->makkah_hotel_meal_info) == 'Half Board' ? 'selected' : '' }}>
                                                Half Board</option>
                                            <option value="Full Board"
                                                {{ old('makkah_hotel_meal_info', $servicepackages->makkah_hotel_meal_info) == 'Full Board' ? 'selected' : '' }}>
                                                Full Board</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-6 col-sm-2">
                                        <label class="control-label mb-10 text-left">Mad: Meal Info.</label>
                                        <select name="madinah_hotel_meal_info" class="form-control">
                                            <option value="">Select</option>
                                            <option value="Not Included"
                                                {{ old('madinah_hotel_meal_info', $servicepackages->madinah_hotel_meal_info) == 'Not Included' ? 'selected' : '' }}>
                                                Not Included</option>
                                            <option value="Breakfast"
                                                {{ old('madinah_hotel_meal_info', $servicepackages->madinah_hotel_meal_info) == 'Breakfast' ? 'selected' : '' }}>
                                                Breakfast</option>
                                            <option value="Half Board"
                                                {{ old('madinah_hotel_meal_info', $servicepackages->madinah_hotel_meal_info) == 'Half Board' ? 'selected' : '' }}>
                                                Half Board</option>
                                            <option value="Full Board"
                                                {{ old('madinah_hotel_meal_info', $servicepackages->madinah_hotel_meal_info) == 'Full Board' ? 'selected' : '' }}>
                                                Full Board</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-6 col-sm-2">
                                        <label class="control-label mb-10 text-left" style="color: #ff0000">Dest: Meal
                                            Info.</label>
                                        <select name="destination_hotel_meal_info" class="form-control">
                                            <option value="">Select</option>
                                            <option value="Not Included"
                                                {{ old('destination_hotel_meal_info', $servicepackages->destination_hotel_meal_info) == 'Not Included' ? 'selected' : '' }}>
                                                Not Included</option>
                                            <option value="Breakfast"
                                                {{ old('destination_hotel_meal_info', $servicepackages->destination_hotel_meal_info) == 'Breakfast' ? 'selected' : '' }}>
                                                Breakfast</option>
                                            <option value="Half Board"
                                                {{ old('destination_hotel_meal_info', $servicepackages->destination_hotel_meal_info) == 'Half Board' ? 'selected' : '' }}>
                                                Half Board</option>
                                            <option value="Full Board"
                                                {{ old('destination_hotel_meal_info', $servicepackages->destination_hotel_meal_info) == 'Full Board' ? 'selected' : '' }}>
                                                Full Board</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-6 col-sm-2">
                                        <label class="control-label mb-10 text-left">Flight Info.</label>
                                        <select name="flight_info" class="form-control">
                                            <option value="">Select</option>
                                            <option value="Included"
                                                {{ old('flight_info', $servicepackages->flight_info) == 'Included' ? 'selected' : '' }}>
                                                Included</option>
                                            <option value="Not Included"
                                                {{ old('flight_info', $servicepackages->flight_info) == 'Not Included' ? 'selected' : '' }}>
                                                Not Included</option>
                                        </select>
                                    </div>


                                    <div class="form-group col-6 col-sm-2">
                                        <label class="control-label mb-10 text-left">Transport Info.</label>
                                        <select name="transport_info" class="form-control">
                                            <option value="">Select</option>
                                            <option value="Not Included"
                                                {{ old('transport_info', $servicepackages->transport_info) == 'Not Included' ? 'selected' : '' }}>
                                                Not Included</option>
                                            <option value="JED to MAK"
                                                {{ old('transport_info', $servicepackages->transport_info) == 'JED to MAK' ? 'selected' : '' }}>
                                                JED to MAK</option>
                                            <option value="Full Loop"
                                                {{ old('transport_info', $servicepackages->transport_info) == 'Full Loop' ? 'selected' : '' }}>
                                                Full Loop</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-6 col-sm-2">
                                        <label class="control-label mb-10 text-left" style="color: #ff0000">Custom
                                            Label</label>
                                        <input type="text" name="custom_label" class="form-control"
                                            value="{{ old('custom_label', $servicepackages->custom_label) }}">
                                    </div>


                                    <div class="form-group col-12 col-sm-4">
                                        <label class="control-label mb-10 text-left">Price
                                            {{ get_siteinfo('currency_symbol') }}</label>
                                        <input type="text" name="servicepackages_price"
                                            class="form-control @error('servicepackages_price') is-invalid @enderror"
                                            data-error="Value Required."
                                            value="{{ old('servicepackages_price', $servicepackages->servicepackages_price) }}"
                                            required>
                                        <div class="help-block with-errors"></div>
                                        @error('servicepackages_price')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>


                                    <div class="form-group col-12 col-sm-4">
                                        <label class="control-label mb-10 text-left">Sold out</label>
                                        <select name="soldout" class="form-control">
                                            <option value="">Select</option>
                                            <option value="Yes"
                                                {{ old('soldout', $servicepackages->soldout) == 'Yes' ? 'selected' : '' }}>
                                                Yes</option>
                                            <option value="No"
                                                {{ old('soldout', $servicepackages->soldout) == 'No' ? 'selected' : '' }}>No
                                            </option>
                                        </select>
                                    </div>

                                    <div class="form-group col-12 col-sm-4">
                                        <label class="control-label mb-10 text-left">Show in All</label>
                                        <select name="showall" class="form-control">
                                            <option value="">Select</option>
                                            <option value="Yes"
                                                {{ old('showall', $servicepackages->showall) == 'Yes' ? 'selected' : '' }}>
                                                Yes</option>
                                            <option value="No"
                                                {{ old('showall', $servicepackages->showall) == 'No' ? 'selected' : '' }}>No
                                            </option>
                                        </select>
                                    </div>





                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left"><strong
                                                style="color:#ff0000">Ex-Image</strong></label>
                                        <div class="clearfix"></div>
                                        @if ($servicepackages->servicepackages_image != '')
                                            <img height="50"
                                                src="{{ asset('uploads/servicepackages/' . $servicepackages->servicepackages_image) }}">
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
                                                <input type="file" name="servicepackages_image">
                                            </span> <a href="#"
                                                class="input-group-addon btn btn-danger btn-anim fileinput-exists"
                                                data-dismiss="fileinput"><i class="fa fa-trash"></i><span
                                                    class="btn-text"> Remove</span></a>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>


                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left"><strong
                                                style="color:#ff0000">Featured Ex-Image</strong></label>
                                        <div class="clearfix"></div>
                                        @if ($servicepackages->servicepackages_featured_image != '')
                                            <img height="50"
                                                src="{{ asset('uploads/servicepackages/' . $servicepackages->servicepackages_featured_image) }}">
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">Featured Image</label>
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <div class="form-control" data-trigger="fileinput"> <i
                                                    class="glyphicon glyphicon-file fileinput-exists"></i> <span
                                                    class="fileinput-filename"></span></div>
                                            <span class="input-group-addon fileupload btn btn-info btn-anim btn-file"><i
                                                    class="fa fa-upload"></i> <span class="fileinput-new btn-text">Select
                                                    file</span> <span class="fileinput-exists btn-text">Change</span>
                                                <input type="file" name="servicepackages_featured_image">
                                            </span> <a href="#"
                                                class="input-group-addon btn btn-danger btn-anim fileinput-exists"
                                                data-dismiss="fileinput"><i class="fa fa-trash"></i><span
                                                    class="btn-text"> Remove</span></a>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>


                                    <div class="form-group">
                                        <label class="control-label text-left">Details</label>
                                        @php
                                            $CKEditor = new CKEditor();
                                            $CKEditor->returnOutput = true;
                                            $CKEditor->basePath = '../../ckeditor/';
                                            $CKEditor->config['width'] = '100%';
                                            $CKEditor->config['height'] = '650px';
                                            $initialValue = old(
                                                'servicepackages_details',
                                                $servicepackages->servicepackages_details,
                                            );
                                            CKFinder::SetupCKEditor($CKEditor, '../../ckfinder/');
                                            $code = $CKEditor->editor('servicepackages_details', $initialValue);
                                            echo $code;
                                        @endphp
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">SEO URL</label>
                                        <input type="text" name="servicepackages_url" class="form-control"
                                            value="{{ old('servicepackages_url', $servicepackages->servicepackages_url) }}">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">Title</label>
                                        <input type="text" name="servicepackages_title" class="form-control"
                                            value="{{ old('servicepackages_title', $servicepackages->servicepackages_title) }}">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">Description</label>
                                        <textarea name="servicepackages_description" class="form-control" rows="5">{{ old('servicepackages_description', $servicepackages->servicepackages_description) }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">Keyword</label>
                                        <textarea name="servicepackages_keyword" class="form-control" rows="5">{{ old('servicepackages_keyword', $servicepackages->servicepackages_keyword) }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label text-left">Sort</label>
                                        <input type="text" name="servicepackages_sort" class="form-control"
                                            value="{{ old('servicepackages_sort', $servicepackages->servicepackages_sort) }}">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">Status</label>
                                        <select name="servicepackages_status" class="form-control">
                                            <option value="1" @if ($servicepackages->servicepackages_status == 1) selected @endif>
                                                Enabled</option>
                                            <option value="0" @if ($servicepackages->servicepackages_status == 0) selected @endif>
                                                Disabled</option>
                                        </select>
                                    </div>

                                    <div class="clearfix"></div>
                                    <h4>Hotels Info.</h4>

                                    <div class="form-group col-6">
                                        <label class="control-label mb-10 text-left">Select Makkah Hotel</label>
                                        <select name="makkah_hotelinfos_id" class="form-control">
                                            <option value="0">Select</option>
                                            @php
                                                use App\Models\Hotelinfos;
                                                $hotelinfos = Hotelinfos::where('hotelinfos_city', 'Makkah')
                                                    ->orderBy('hotelinfos_name', 'asc')
                                                    ->get();
                                            @endphp
                                            @foreach ($hotelinfos as $hotelinfo)
                                                <option value="{{ $hotelinfo->hotelinfos_id }}"
                                                    @if ($servicepackages->makkah_hotelinfos_id == $hotelinfo->hotelinfos_id) selected @endif>
                                                    {{ $hotelinfo->hotelinfos_name }} -
                                                    {{ $hotelinfo->hotelinfos_startype }} Stars</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group col-6">
                                        <label class="control-label mb-10 text-left">Select Madinah Hotel</label>
                                        <select name="madinah_hotelinfos_id" class="form-control">
                                            <option value="0">Select</option>
                                            @php
                                                $hotelinfos = Hotelinfos::where('hotelinfos_city', 'Madinah')
                                                    ->orderBy('hotelinfos_name', 'asc')
                                                    ->get();
                                            @endphp
                                            @foreach ($hotelinfos as $hotelinfo)
                                                <option value="{{ $hotelinfo->hotelinfos_id }}"
                                                    @if ($servicepackages->madinah_hotelinfos_id == $hotelinfo->hotelinfos_id) selected @endif>
                                                    {{ $hotelinfo->hotelinfos_name }} -
                                                    {{ $hotelinfo->hotelinfos_startype }} Stars</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group col-6">
                                        <label class="control-label mb-10 text-left" style="color: #ff0000">Select
                                            Destination Hotel</label>
                                        <select name="destination_hotelinfos_id" class="form-control">
                                            <option value="">Select</option>
                                            @php
                                                $hotelinfos = Hotelinfos::where('hotelinfos_city', '!=', 'Madinah')
                                                    ->where('hotelinfos_city', '!=', 'Makkah')
                                                    ->orderBy('hotelinfos_name', 'asc')
                                                    ->get();
                                            @endphp
                                            @foreach ($hotelinfos as $hotelinfo)
                                                <option value="{{ $hotelinfo->hotelinfos_id }}"
                                                    @if ($servicepackages->destination_hotelinfos_id == $hotelinfo->hotelinfos_id) selected @endif>
                                                    {{ $hotelinfo->hotelinfos_city }} : {{ $hotelinfo->hotelinfos_name }}
                                                    - {{ $hotelinfo->hotelinfos_startype }} Stars</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">Heading 1</label>
                                        <input type="text" name="heading1" class="form-control"
                                            value="{{ old('heading1', $servicepackages->heading1) }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label text-left">Heading 1 Details</label>
                                        @php
                                            $CKEditor = new CKEditor();
                                            $CKEditor->returnOutput = true;
                                            $CKEditor->basePath = '../../ckeditor/';
                                            $CKEditor->config['width'] = '100%';
                                            $CKEditor->config['height'] = '650px';
                                            $initialValue = old('heading1_details', $servicepackages->heading1_details);
                                            CKFinder::SetupCKEditor($CKEditor, '../../ckfinder/');
                                            $code = $CKEditor->editor('heading1_details', $initialValue);
                                            echo $code;
                                        @endphp
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">Heading 2</label>
                                        <input type="text" name="heading2" class="form-control"
                                            value="{{ old('heading2', $servicepackages->heading2) }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label text-left">Heading 2 Details</label>
                                        @php
                                            $CKEditor = new CKEditor();
                                            $CKEditor->returnOutput = true;
                                            $CKEditor->basePath = '../../ckeditor/';
                                            $CKEditor->config['width'] = '100%';
                                            $CKEditor->config['height'] = '650px';
                                            $initialValue = old('heading2_details', $servicepackages->heading2_details);
                                            CKFinder::SetupCKEditor($CKEditor, '../../ckfinder/');
                                            $code = $CKEditor->editor('heading2_details', $initialValue);
                                            echo $code;
                                        @endphp
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">Heading 3</label>
                                        <input type="text" name="heading3" class="form-control"
                                            value="{{ old('heading3', $servicepackages->heading3) }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label text-left">Heading 3 Details</label>
                                        @php
                                            $CKEditor = new CKEditor();
                                            $CKEditor->returnOutput = true;
                                            $CKEditor->basePath = '../../ckeditor/';
                                            $CKEditor->config['width'] = '100%';
                                            $CKEditor->config['height'] = '650px';
                                            $initialValue = old('heading3_details', $servicepackages->heading3_details);
                                            CKFinder::SetupCKEditor($CKEditor, '../../ckfinder/');
                                            $code = $CKEditor->editor('heading3_details', $initialValue);
                                            echo $code;
                                        @endphp
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">Heading 4</label>
                                        <input type="text" name="heading4" class="form-control"
                                            value="{{ old('heading4', $servicepackages->heading4) }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label text-left">Heading 4 Details</label>
                                        @php
                                            $CKEditor = new CKEditor();
                                            $CKEditor->returnOutput = true;
                                            $CKEditor->basePath = '../../ckeditor/';
                                            $CKEditor->config['width'] = '100%';
                                            $CKEditor->config['height'] = '650px';
                                            $initialValue = old('heading4_details', $servicepackages->heading4_details);
                                            CKFinder::SetupCKEditor($CKEditor, '../../ckfinder/');
                                            $code = $CKEditor->editor('heading4_details', $initialValue);
                                            echo $code;
                                        @endphp
                                    </div>

                                    <div class="clearfix"></div>


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
