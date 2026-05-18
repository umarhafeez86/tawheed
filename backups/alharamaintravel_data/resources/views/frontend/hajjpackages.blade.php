@extends('frontend.layouts.innerhajjpackages')

@section('main-container')
    <h1 class="col-12 mt-4 page_heading float-start">{{ $page_name }}</h1>
    <div class="clearfix"></div>

    <div class="col-12 float-start m-0 p-0" id="packagesData">
        @php
        use App\Models\Packages;
        $packages = Packages::where('packages_status',1)->orderBy('packages_sort','asc')->get();
        @endphp
        @foreach ($packages as $package)
                <div class="col-12 float-start package-grid mb-5">
                    <div class="col-12 col-sm-5 col-md-3 float-start position-relative img-round img-thumb-area">
                            <img src="{{ asset('uploads/packages/'.$package->packages_image) }}"
                                class="img-fluid img-round" alt="{{ $package->packages_name }}">
                    </div>
                    <div class="col-12 col-sm-7 col-md-9 ps-1 ps-md-4 pt-2 float-start">
                        <h3 class="package_cat pe-sm-0 pe-md-1 pe-lg-2 pe-xl-5">
                               {{ $package->packages_tag }}
                        </h3>
                        <h4 class="package_name pe-sm-0 pe-md-1 pe-lg-2 pe-xl-5">
                            {{ $package->packages_name }}<span
                                class="package_price float-end">{{ get_siteinfo('currency_symbol') }}{{ $package->packages_price }}</span>
                        </h4>
                        <div class="clearfix"></div>
                        <p class="package_short_info">
                            {{ $package->packages_info }} - * {!! $package->packages_details !!} ...
                        </p>
                        <div class="clearfix"></div>
                        <div onclick="scrollToSection();booknowpackageinfo('{{ $package->packages_name }} - {{ $package->packages_tag }}','{{ $package->packages_price }}');"
                            class="btn_details float-end">Book Now</div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="col-12 float-start package-grid mb-5">
                    <div class="col-12 col-sm-5 col-md-3 float-start position-relative img-round img-thumb-area">
                            <img src="{{ asset('uploads/packages/'.$package->packages_image) }}"
                                class="img-fluid img-round" alt="{{ $package->packages_name }}">
                    </div>
                    <div class="col-12 col-sm-7 col-md-9 ps-1 ps-md-4 pt-2 float-start">
                        <h3 class="package_cat pe-sm-0 pe-md-1 pe-lg-2 pe-xl-5">
                               {{ $package->packages_tag2 }}
                        </h3>
                        <h4 class="package_name pe-sm-0 pe-md-1 pe-lg-2 pe-xl-5">
                            {{ $package->packages_name }}<span
                                class="package_price float-end">{{ get_siteinfo('currency_symbol') }}{{ $package->packages_price2 }}</span>
                        </h4>
                        <div class="clearfix"></div>
                        <p class="package_short_info">
                            {{ $package->packages_info }} - * {!! $package->packages_details !!} ...
                        </p>
                        <div class="clearfix"></div>
                        <div onclick="scrollToSection();booknowpackageinfo('{{ $package->packages_name }} - {{ $package->packages_tag2 }}','{{ $package->packages_price2 }}');"
                            class="btn_details float-end">Book Now</div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="col-12 float-start package-grid mb-5">
                    <div class="col-12 col-sm-5 col-md-3 float-start position-relative img-round img-thumb-area">
                            <img src="{{ asset('uploads/packages/'.$package->packages_image) }}"
                                class="img-fluid img-round" alt="{{ $package->packages_name }}">
                    </div>
                    <div class="col-12 col-sm-7 col-md-9 ps-1 ps-md-4 pt-2 float-start">
                        <h3 class="package_cat pe-sm-0 pe-md-1 pe-lg-2 pe-xl-5">
                               {{ $package->packages_tag3 }}
                        </h3>
                        <h4 class="package_name pe-sm-0 pe-md-1 pe-lg-2 pe-xl-5">
                            {{ $package->packages_name }}<span
                                class="package_price float-end">{{ get_siteinfo('currency_symbol') }}{{ $package->packages_price3 }}</span>
                        </h4>
                        <div class="clearfix"></div>
                        <p class="package_short_info">
                            {{ $package->packages_info }} - * {!! $package->packages_details !!} ...
                        </p>
                        <div class="clearfix"></div>
                        <div onclick="scrollToSection();booknowpackageinfo('{{ $package->packages_name }} - {{ $package->packages_tag3 }}','{{ $package->packages_price3 }}');"
                            class="btn_details float-end">Book Now</div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
        @endforeach
    </div>

    <div class="clearfix"></div>

        <div class="col-12 mb-2 mt-0 mb-lg-4 mt-lg-5 float-start">
        <div class="row mt-0 ms-0 me-0 mb-3 p-3 p-md-3 p-lg-5 form-custon-inquiry">
            <section id="booknowsection"></section>
            <form name="frmbooknow" id="frmbooknow" method="post" class="col-12 m-0 p-0 float-start">
            @csrf

                <h3 class="page_sub_heading col-12 float-start mb-4">Book Now</h3>
                <div class="clearfix"></div>

                <div class="row gx-4">
                    <div class="col-12 col-sm-6 col-md-4 mb-4">
                        <label for="frmbooknow_fname" class="form-label">Name *</label>
                        <input type="text" class="form-control" id="frmbooknow_fname" name="frmbooknow_fname" placeholder="Full Name">
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4">
                        <label for="frmbooknow_contactno" class="form-label">Contact Number *</label>
                        <input type="text" class="form-control" id="frmbooknow_contactno" name="frmbooknow_contactno" placeholder="+44" value="+44" oninput="if(!this.value.startsWith('+44')) this.value = '+44';" maxlength="13">
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4">
                        <label for="frmbooknow_email" class="form-label">Email Address *</label>
                        <input type="text" class="form-control" id="frmbooknow_email" name="frmbooknow_email" placeholder="@">
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4">
                        <label for="frmbooknow_travel_month" class="form-label">Travel Month *</label>
                        <select id="frmbooknow_travel_month" name="frmbooknow_travel_month" class="form-select">
                            <option value="Hajj Month">Hajj Month</option>
                        </select>

                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-4 mb-4">
                        <label for="frmbooknow_guests" class="form-label">No. of Guests *</label>
                        <input type="text" class="form-control" id="frmbooknow_guests" name="frmbooknow_guests" placeholder="">
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-4 mb-4">
                        <label for="frmbooknow_total_days" class="form-label">Total Days *</label>
                        <input type="text" class="form-control" id="frmbooknow_total_days" name="frmbooknow_total_days" placeholder="">
                    </div>
                </div>

                <input type="hidden" name="frmbooknow_package_name" id="frmbooknow_package_name" value="">
                <input type="hidden" name="frmbooknow_package_price" id="frmbooknow_package_price" value="">
                <p class="termsnote float-start">
                    By submitting, you agree to emails and GDPR-compliant data use per our <a href="{{ url('/information/privacy-policy') }}" target="_blank">Privacy Policy</a> and <a href="{{ url('/information/terms-conditions') }}" target="_blank">Terms</a>.
                </p>
                <div class="form-row-msg" id="frmbooknow_msg"></div>
                <button type="button" class="btn btn-form-custon-inquiry-submit mt-3" onclick="submitbooknow();">Book
                    Package</button>

            </form>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>

@endsection