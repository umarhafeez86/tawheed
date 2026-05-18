@extends('frontend.layouts.innerfav')
@section('main-container')

<div id="notification">
  <div id="notification_text" class="alert alert-success">
        <span class="close-btn" onclick="hideNotification()">&times;</span>
        <span id="notification_info" class="text-center"></span>
  </div>
</div>

    <h1 class="col-12 mt-4 page_heading float-start">{{ $page_name }}</h1>
    <div class="clearfix mb-4"></div>


    <div class="col-12 float-start m-0 p-0" id="packagesData">
        @php
            $favorites = json_decode(Cookie::get('favorites', '[]'), true);
            $compares  = json_decode(Cookie::get('compares', '[]'), true);

            //print_r ($compares);

            use App\Models\Services;
            use App\Models\Servicepackages;
            use App\Models\Hotelinfos;
        @endphp
        @if (count($favorites) > 0)
            @foreach ($favorites as $favorite_servicepackages_id)
                @php
                    $servicepackage = Servicepackages::where(
                        'servicepackages_id',
                        $favorite_servicepackages_id,
                    )->first();
                @endphp
                @if ($servicepackage)
                    <div class="col-12 float-start package-grid mb-5" id="servicepackage_row_{{ $favorite_servicepackages_id }}">
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
                                    $main_service = Services::where(
                                        'services_id',
                                        $servicepackage->services_id,
                                    )->first();
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
                                @endif - <span>{{ $servicepackage->servicepackages_madinahnights }}
                                    Nights
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
                                    <i class="fa fa-heart"></i> <span class="d-none d-sm-none d-md-block savetext">Saved</span>
                                @else
                                    <i class="far fa-heart"></i> Save
                                @endif
                            </span>
                            <span class="btn_compare float-start ms-2 compare-btn" style="cursor: pointer" id="servicepackage_compare_{{ $servicepackage->servicepackages_id }}"
                                data-id="{{ $servicepackage->servicepackages_id }}">
                                @if (in_array($servicepackage->servicepackages_id, $compares))
                                    <input type="checkbox" name="" class="checkboxes" value="1" checked id="compare_{{ $servicepackage->servicepackages_id }}"> <label id="label_compare_{{ $servicepackage->servicepackages_id }}" for="compare_{{ $servicepackage->servicepackages_id }}">Compare</label>
                                @else
                                    <input type="checkbox" name="" class="checkboxes" value="1" id="compare_{{ $servicepackage->servicepackages_id }}"> <label id="label_compare_{{ $servicepackage->servicepackages_id }}" for="compare_{{ $servicepackage->servicepackages_id }}">Compare</label>
                                @endif
                            </span>

                            <a href="{{ url('/package/' . $servicepackage->servicepackages_url) }}"
                                class="btn_details float-end">Details</a>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                @endif
            @endforeach
        @else
             <div class="mt-3 mb-5 text-center page_sub_heading_text">There is no package in my saved list. Click on Save button in packages to save packages.</div>
        @endif
    </div>
    <div class="clearfix"></div>
@endsection
