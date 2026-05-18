@extends('frontend.layouts.inner')
@section('main-container')
    <div id="notification">
        <div id="notification_text" class="alert alert-success">
            <span class="close-btn" onclick="hideNotification()">&times;</span>
            <span id="notification_info" class="text-center"></span>
        </div>
    </div>

    <h2 class="col-12 mt-4 page_heading float-start">Get Best Umrah Deals, Pick Month</h2>
    <div class="clearfix"></div>
    <div class="col-12 selected_filters_info float-start mb-3">
        Selected Month: <span class="selected_info">{{ $page_name }}</span>
        <div class="clearfix"></div>
        Selected Total Nights: <span class="selected_info" id="sel_packagenights">
            @if (session('packagenights') != '') {{ session('packagenights') }}
            @else
                All @endif Nights
        </span>
        <div class="clearfix"></div>
        Selected Hotel Type: <span class="selected_info" id="sel_roomtype">
            @if (session('roomtype') != '') {{ session('roomtype') }}
            @else
                All @endif Stars
        </span>
        <div class="clearfix"></div>
    </div>

    <form id="filterForm" class="col-12 float-start">
        @csrf

        <div class="d-flex flex-wrap mt-4 mb-5">
            @php
                if (session()->has('roomtype')) {
                    $roomtype = session('roomtype');
                } else {
                    $roomtype = '';
                }

                if (session()->has('packagenights')) {
                    $packagenights = session('packagenights');
                } else {
                    $packagenights = '';
                }

                $price_ranges = explode(',', get_siteinfo('price_range'));
                if (session()->has('priceminval')) {
                    $priceminval = session('priceminval');
                } else {
                    $priceminval = reset($price_ranges);
                }

                if (session()->has('pricemaxval')) {
                    $pricemaxval = session('pricemaxval');
                } else {
                    $pricemaxval = end($price_ranges);
                }
            @endphp
            <input type="hidden" class="input-min" id="input-min1" name="priceminval" value="{{ $priceminval }}" />
            <input type="hidden" class="input-max" id="input-max1" name="pricemaxval" readonly
                value="{{ $pricemaxval }}" />
            <a href="{{ url('/umrah-packages') }}" class="main_links"
                @if ($page_name == 'All Umrah Packages') style="color:#000 !important;background:#f8d49e !important;" @endif>All</a>

            @php
                use App\Models\Services;
            @endphp
            @if ($page_name != 'All Umrah Packages')
                <div class="dropdown d-flex">
                    <div class="dropdown">
                        <a class="btn month-btn dropdown-toggle main_links" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="true"
                            style="color:#000 !important;background:#f8d49e !important;">
                            {{ $page_name }}
                            <i class="fa fa-angle-down ms-2"></i>
                            <!-- <img src="{ !-- url('frontend/assets/images/chevron-down.svg') --! }" alt="Dropdown Icon" class="dropdown-icon-change"> -->
                        </a>
                        <ul class="dropdown-menu mt-3 fade-slide" data-popper-placement="bottom-start"
                            style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(-6px, 64px);">
                            <!-- Select Month Header with Close Icon -->
                            <li class="dropdown-header d-flex justify-content-between align-items-center">
                                <span>Select A Month: </span>
                                <img src="{{ url('frontend/assets/images/close-icon.svg') }}" alt="Close Icon"
                                    class="close-icon-change">
                            </li>
                            <!-- Month Options -->
                            @php
                                $servicedetails = Services::where('services_status', 1)
                                    ->orderBy('services_sort', 'asc')
                                    ->get();
                            @endphp
                            @if ($servicedetails->count() > 0)
                                @foreach ($servicedetails as $servicedetail)
                                    <li><a class="dropdown-item"
                                            href="{{ url('/' . $servicedetail->services_url) }}"
                                            @if ($page_name != 'All Umrah Packages') @if ($services->services_id == $servicedetail->services_id) style="color:#f8d49e;" @endif
                                            @endif >{{ $servicedetail->services_name }}</a></li>
                                    <hr class="dropdown-divider">
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            @else
                <div class="dropdown d-flex">
                    <div class="dropdown">
                        <a class="btn month-btn dropdown-toggle main_links" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="true">
                            Select A Month
                            <i class="fa fa-angle-down ms-2"></i>
                            <!-- <img src="{ !-- url('frontend/assets/images/chevron-down.svg') --! }" alt="Dropdown Icon" class="dropdown-icon-change"> -->
                        </a>
                        <ul class="dropdown-menu mt-3 fade-slide" data-popper-placement="bottom-start"
                            style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(-6px, 64px);">
                            <!-- Select Month Header with Close Icon -->
                            <li class="dropdown-header d-flex justify-content-between align-items-center">
                                <span>Select A Month</span>
                                <img src="{{ url('frontend/assets/images/close-icon.svg') }}" alt="Close Icon"
                                    class="close-icon-change">
                            </li>
                            <!-- Month Options -->
                            @php
                                $servicedetails = Services::where('services_status', 1)
                                    ->orderBy('services_sort', 'asc')
                                    ->get();
                            @endphp
                            @if ($servicedetails->count() > 0)
                                @foreach ($servicedetails as $servicedetail)
                                    <li><a class="dropdown-item"
                                            href="{{ url('/' . $servicedetail->services_url) }}"
                                            @if ($page_name != 'All Umrah Packages') @if ($services->services_id == $servicedetail->services_id) style="color:#f8d49e;" @endif
                                            @endif >{{ $servicedetail->services_name }}</a></li>
                                    <hr class="dropdown-divider">
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            @endif

            {{-- <a href="{{ url('/services/ramadan-umrah-package') }}"
                class="main_links d-none d-sm-none d-md-block" @if ($page_name == 'Ramadan Umrah Package') style="color:#000 !important;background:#f8d49e !important;" @endif>Ramadan</a>
            <a href="{{ url('/services/easter-umrah-package') }}" class="main_links d-none d-sm-none d-md-block" @if ($page_name == 'Easter Umrah Package') style="color:#000 !important;background:#f8d49e !important;" @endif>Easter
                Holidays</a>
            <a href="{{ url('/services/december-umrah-package') }}"
                class="main_links d-none d-sm-none d-md-block" @if ($page_name == 'December Umrah Package') style="color:#000 !important;background:#f8d49e !important;" @endif>December</a> --}}

            {{-- d-sm-none d-md-block  --}}
            <div class="dropdown d-flex d-none d-sm-none d-md-block">
                <div class="dropdown">
                    <a class="btn month-btn dropdown-toggle main_links" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="true"
                        style="color:#000 !important;background:#f8d49e !important;">
                        Nights: <span id="sel_packagenights2" class="me-1">@if (session('packagenights') != '') {{ session('packagenights') }} @else All @endif</span>
                        <i class="fa fa-angle-down ms-2"></i>
                        <!-- <img src="{ !-- url('frontend/assets/images/chevron-down.svg') --! }" alt="Dropdown Icon" class="dropdown-icon-change"> -->
                    </a>
                    <ul class="dropdown-menu mt-3 fade-slide" data-popper-placement="bottom-start"
                        style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(-6px, 64px);">
                        <!-- Select Nights Header with Close Icon -->
                        <li class="dropdown-header d-flex justify-content-between align-items-center">
                            <span>Select Nights: </span>
                            <img src="{{ url('frontend/assets/images/close-icon.svg') }}" alt="Close Icon"
                                class="close-icon-change">
                        </li>
                        <!-- Nights Options -->
                        <li class="d-flex justify-content-between" style="cursor: pointer">
                            <label class="dropdown-item" for="packagenight">All</label>
                            <input name="packagenights" id="packagenight" class="packagenights form-check-input me-3"
                                type="radio" value="" @if ($packagenights == '') checked @endif />
                        </li>
                        <hr class="dropdown-divider">
                        @php
                            $filter_nights = explode(',', get_siteinfo('filter_nights_values'));
                        @endphp
                        @foreach ($filter_nights as $filter_night)
                            <li class="d-flex justify-content-between" style="cursor: pointer">
                                <label class="dropdown-item" for="packagenight_{{ $filter_night }}">{{ $filter_night }}</label>
                                <input name="packagenights" id="packagenight_{{ $filter_night }}"
                                    class="packagenights form-check-input me-3" type="radio"
                                    value="{{ $filter_night }}" @if ($packagenights == $filter_night) checked @endif />
                            </li>
                            <hr class="dropdown-divider">
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="dropdown d-flex d-none d-sm-none d-md-block">
                <div class="dropdown">
                    <a class="btn month-btn dropdown-toggle main_links" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="true"
                        style="color:#000 !important;background:#f8d49e !important;">
                        Hotels: 
                        <span id="sel_roomtype2" class="me-1">@if (session('roomtype') != '') {{ session('roomtype') }} @else All @endif </span> Stars
                        <i class="fa fa-angle-down ms-2"></i>
                        <!-- <img src="{ !-- url('frontend/assets/images/chevron-down.svg') --! }" alt="Dropdown Icon" class="dropdown-icon-change"> -->
                    </a>
                    <ul class="dropdown-menu mt-3 fade-slide" data-popper-placement="bottom-start"
                        style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(-6px, 64px);">
                        <!-- Select Stars Header with Close Icon -->
                        <li class="dropdown-header d-flex justify-content-between align-items-center">
                            <span>Select Hotels: </span>
                            <img src="{{ url('frontend/assets/images/close-icon.svg') }}" alt="Close Icon"
                                class="close-icon-change">
                        </li>
                        <!-- Stars Options -->
                        <li class="d-flex justify-content-between" style="cursor: pointer">
                            <label class="dropdown-item" for="roomtype">All</label>
                            <input name="roomtype" id="roomtype" class="roomtype form-check-input me-3"
                                type="radio" value="" @if ($roomtype == '') checked @endif />
                        </li>
                        <hr class="dropdown-divider">
                        @php
                            $filter_stars = explode(',', get_siteinfo('filter_star_values'));
                        @endphp
                        @foreach ($filter_stars as $filter_star)
                            <li class="d-flex justify-content-between" style="cursor: pointer">
                                <label class="dropdown-item" for="roomtype_{{ $filter_star }}">{{ $filter_star }} Stars</label>
                                <input name="roomtype" id="roomtype_{{ $filter_star }}"
                                    class="roomtype form-check-input me-3" type="radio"
                                    value="{{ $filter_star }}" @if ($roomtype == $filter_star) checked @endif />
                            </li>
                            <hr class="dropdown-divider">
                        @endforeach
                    </ul>
                </div>
            </div>

            <button type="button" onclick="toggleDiv()" class="btnfilter d-block d-sm-block d-md-none"><img
                    src="{{ url('frontend/assets/images/filter.svg') }}" alt="Dropdown Icon"
                    class="dropdown-icon-change" /></button>

            <div id="filtersformob" class="slide-toggle mt-3 col-12">
                <div class="filtersformob_heading">Nights</div>
                <div class="clearfix"></div>
                <div class="col-12 m-0 p-0 float-start">
                    <span class="dropdown-item-new float-start col-6 col-sm-6 col-md-3 text-start"><input
                            name="packagenights2" id="packagenights"
                            class="packagenights form-check-input col-6 float-start" type="radio" value=""
                            @if ($packagenights == '') checked @endif><span class="ms-4"><label
                                for="packagenights">All</label></span></span>
                    @foreach ($filter_nights as $filter_night)
                        <span class="dropdown-item-new float-start col-6 col-sm-6 col-md-3 text-start"><input
                                name="packagenights2" id="packagenights_{{ $filter_night }}"
                                class="packagenights form-check-input col-6 float-start" type="radio"
                                value="{{ $filter_night }}" @if ($packagenights == $filter_night) checked @endif><span
                                class="ms-4"><label
                                    for="packagenights_{{ $filter_night }}">{{ $filter_night }}</label></span></span>
                    @endforeach
                </div>
                <div class="filtersformob_heading">Hotels</div>
                <div class="clearfix"></div>
                <div class="col-12 m-0 p-0 float-start">
                    <span class="dropdown-item-new float-start col-6 col-sm-6 col-md-3 text-start"><input name="roomtype2"
                            id="roomtypes" class="roomtype form-check-input me-3" type="radio" value=""
                            @if ($roomtype == '') checked @endif /><span class="ms-4"><label
                                for="roomtypes">All</label></span></span>
                    @foreach ($filter_stars as $filter_star)
                        <span class="dropdown-item-new float-start col-6 col-sm-6 col-md-3 text-start"><input
                                name="roomtype2" id="roomtypes_{{ $filter_star }}"
                                class="roomtype form-check-input me-3" type="radio" value="{{ $filter_star }}"
                                @if ($roomtype == $filter_star) checked @endif /><span class="ms-4"><label
                                    for="roomtypes_{{ $filter_star }}">{{ $filter_star }} Stars</label></span></span>
                    @endforeach
                </div>
                <div class="clearfix"></div>
            </div>

        </div>
    </form>
    <div class="clearfix"></div>

    <div class="col-12 float-start m-0 p-0" id="packagesData">
        @php
            $favorites = json_decode(Cookie::get('favorites', '[]'), true);
            //$compares  = json_decode(Cookie::get('compares', '[]'), true);

            use App\Models\Servicepackages;
            use App\Models\Hotelinfos;
        @endphp
        @if ($servicepackages->count() > 0)
            @foreach ($servicepackages as $servicepackage)
                <div class="col-12 float-start package-grid mb-5">
                    <div class="col-12 col-sm-5 col-md-3 float-start position-relative img-round img-thumb-area">
                        <a href="{{ url('/package/' . $servicepackage->servicepackages_url) }}"
                            title="{{ $servicepackage->servicepackages_name }}">
                            <img src="{{ asset('uploads/servicepackages/' . $servicepackage->servicepackages_image) }}"
                                class="img-fluid img-round" alt="{{ $servicepackage->servicepackages_name }}">
                        </a>
                        @if ($servicepackage->soldout == 'Yes')
                            <span class="soldout_tag">SOLD OUT</span>
                        @endif
                    </div>
                    <div class="col-12 col-sm-7 col-md-9 ps-1 ps-md-4 pt-2 float-start">
                        <h3 class="package_cat pe-sm-0 pe-md-1 pe-lg-2 pe-xl-5">
                            @php
                                $main_service = Services::where('services_id', $servicepackage->services_id)->first();
                                $makkah_hotel_info = Hotelinfos::where(
                                    'hotelinfos_id',
                                    $servicepackage->makkah_hotelinfos_id,
                                )->first();
                                $madinah_hotel_info = Hotelinfos::where(
                                    'hotelinfos_id',
                                    $servicepackage->madinah_hotelinfos_id,
                                )->first();
                            @endphp
                            @if ($main_service)
                                {{ $main_service->services_name }}
                            @endif
                            <span class="package_stars float-end">
                                @for ($i = 1; $i <= $servicepackage->servicepackages_startype; $i++)
                                    <i class="fa fa-star"></i>
                                @endfor
                            </span>
                        </h3>
                        <h4 class="package_name pe-sm-0 pe-md-1 pe-lg-2 pe-xl-5">
                            {{ $servicepackage->servicepackages_name }}<span
                                class="package_price float-end">{{ get_siteinfo('currency_symbol') }}{{ $servicepackage->servicepackages_price }}</span>
                        </h4>
                        <div class="clearfix"></div>
                        <p class="package_short_info">
                            @if ($makkah_hotel_info)
                                {{ $makkah_hotel_info->hotelinfos_name }}
                            @endif -
                            <span>{{ $servicepackage->servicepackages_makkahnights }} Nights in Makkah</span> *
                            @if ($madinah_hotel_info)
                                {{ $madinah_hotel_info->hotelinfos_name }}
                            @endif - <span>{{ $servicepackage->servicepackages_madinahnights }} Nights
                                in Madinah</span>...
                        </p>
                        <div class="clearfix"></div>
                        <p class="package_short_icons">
                            @if ($servicepackage->visa_info == 'Included')
                                <span class="visaicon float-start me-3"></span>
                            @endif
                            @if ($servicepackage->flight_info == 'Included')
                                <span class="flighticon float-start me-3"></span>
                            @endif
                            @if ($servicepackage->makkah_hotelinfos_id != 'Not Included' || $servicepackage->madinah_hotelinfos_id != 'Not Included')
                                <span class="hotelicon float-start me-3"></span>
                            @endif
                            @if ($servicepackage->transport_info != 'Not Included')
                                <span class="busicon float-start me-3"></span>
                            @endif
                            @if (
                                $servicepackage->makkah_hotel_meal_info != 'Not Included' ||
                                    $servicepackage->madinah_hotel_meal_info != 'Not Included')
                                <span class="mealicon float-start me-3"></span>
                            @endif
                        </p>
                        <div class="clearfix"></div>
                        <span class="btn_save float-start fav-btn" style="cursor: pointer"
                            id="servicepackage_{{ $servicepackage->servicepackages_id }}"
                            data-id="{{ $servicepackage->servicepackages_id }}">
                            @if (in_array($servicepackage->servicepackages_id, $favorites))
                                <i class="fa fa-heart"></i> Saved
                            @else
                                <i class="far fa-heart"></i> Save
                            @endif
                        </span>
                        <a href="{{ url('/package/' . $servicepackage->servicepackages_url) }}"
                            class="btn_details float-end">Details</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            @endforeach
        @endif
    </div>

    <div class="clearfix"></div>

    <button id="load-more" data-page="2" class="btn_showmore mb-5">Show more</button>
    <div class="clearfix"></div>
@endsection
