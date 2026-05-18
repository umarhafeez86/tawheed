@extends('frontend.layouts.innerpackage')
@section('main-container')

<div id="notification">
  <div id="notification_text" class="alert alert-success">
        <span class="close-btn" onclick="hideNotification()">&times;</span>
        <span id="notification_info" class="text-center"></span>
  </div>
</div>

    <div class="col-12 float-start pt-3 pb-3 goback">
        <a href="{{ url()->previous() }}"><i class="fa fa-arrow-left me-2"></i> Go Back</a>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>

    @php
        use App\Models\Services;
        use App\Models\Servicepackagesimgs;

        use App\Models\Hotelinfos;
        use App\Models\Hotelimgs;

        $makkah_hotel_info = Hotelinfos::where('hotelinfos_id', $servicepackage->makkah_hotelinfos_id)->first();
        $madinah_hotel_info = Hotelinfos::where('hotelinfos_id', $servicepackage->madinah_hotelinfos_id)->first();
        $service = Services::where('services_id', $servicepackage->services_id)->first();
    @endphp
    @php
        $hotelimgs_makkah = '';
        $hotelimgs_madinah = '';
        if ($makkah_hotel_info) {
            $hotelimg = Hotelimgs::query()
                ->where('hotelimgs_status', 1)
                ->where('hotelinfos_id', $makkah_hotel_info->hotelinfos_id)
                ->orderBy('hotelimgs_sort', 'asc')
                ->first();
        }
    @endphp
    @php
        if ($madinah_hotel_info) {
            $hotelimg2 = Hotelimgs::query()
                ->where('hotelimgs_status', 1)
                ->where('hotelinfos_id', $madinah_hotel_info->hotelinfos_id)
                ->orderBy('hotelimgs_sort', 'asc')
                ->first();
        }

        $favorites = json_decode(Cookie::get('favorites', '[]'), true);
    @endphp
    <h2 class="col-12 mt-4 package_cat float-start">
        @if ($service)
            {{ $service->services_name }}
        @endif
    </h2>
    <div class="clearfix"></div>
    @php
$months = [
    'January', 'February', 'March', 'April', 'May', 'June',
    'July', 'August', 'September', 'October', 'November', 'December'
];

$pattern = '/\b(' . implode('|', $months) . ')\b/i';

if (preg_match($pattern, $servicepackage->servicepackages_name, $matches)) {
    $month_name = $matches[1]; // Output: May
} else {
    $month_name = "";
}
    @endphp
    <h1 class="col-12 mb-0 mb-md-3 page_heading float-start">
        {{ $servicepackage->servicepackages_name }}
        <span class="d-block float-md-end mt-2 mt-sm-4 mt-md-0">
            <span class="btn_save float-start fav-btn" style="cursor: pointer"
                id="servicepackage_{{ $servicepackage->servicepackages_id }}"
                data-id="{{ $servicepackage->servicepackages_id }}">
                @if (in_array($servicepackage->servicepackages_id, $favorites))
                    <i class="fa fa-heart"></i> Saved
                @else
                    <i class="far fa-heart"></i> Save
                @endif
            </span>
        </span>
    </h1>
    <div class="clearfix"></div>
    <div class="col-12 float-start mb-2 package_price_detail">{{ get_siteinfo('currency_symbol') }}
        {{ $servicepackage->servicepackages_price }} <span>per person</span> <span class="termsnote">*Terms
            Applied</span></div>
    <div class="clearfix"></div>
    <div onclick="scrollToSection()" class="btn btn_book_package mt-1 col-12 float-start">Book Package</div>
    <div class="clearfix"></div>

    <h2 class="col-12 float-start mt-5 details_sub_heading">Details</h2>
    <div class="clearfix"></div>
    <div class="col-12 float-start justify-content-center details_sub_text">
        <div class="col-12 m-0 p-0 float-start boder">
            <div class="col-3 col-sm-4 pt-3 pb-3 float-start">Total Stays</div>
            <div class="col-9 col-sm-8 pt-3 pb-3 float-start details_sub_text_info text-end">Makkah:
                {{ $servicepackage->servicepackages_makkahnights }}
                Nights Madinah: {{ $servicepackage->servicepackages_madinahnights }} Nights</div>
            <div class="clearfix"></div>
        </div>
        <div class="col-12 m-0 p-0 float-start boder">
            <div class="col-3 col-sm-4 pt-3 pb-3 float-start">Essentials</div>
            <div class="col-9 col-sm-8 pt-3 pb-3 float-start details_sub_text_info text-end">
                @if ($servicepackage->transport_info != 'Not Included')
                    <span class="float-end me-1">Transportation</span>
                    <span class="busicon d-none d-sm-none d-md-block float-end ms-2 me-2"></span>
                @endif
                @if ($servicepackage->flight_info == 'Included')
                    <span class="float-end me-1">Flights</span>
                    <span class="flighticon d-none d-sm-none d-md-block float-end ms-2 me-2"></span>
                @endif
                @if ($servicepackage->visa_info == 'Included')
                    <span class="float-end me-1">Visa Service</span>
                    <span class="visaicon d-none d-sm-none d-md-block float-end ms-2 me-2"></span>
                @endif
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="col-12 m-0 p-0 float-start boder">
            <div class="col-3 col-sm-4 pt-3 pb-3 float-start">Additional Service</div>
            <div class="col-9 col-sm-8 pt-3 pb-3 float-start details_sub_text_info text-end">
                @if (
                    $servicepackage->makkah_hotel_meal_info != 'Not Included' ||
                        $servicepackage->madinah_hotel_meal_info != 'Not Included')
                    <span class="float-end me-1">Makkah: @if ($servicepackage->makkah_hotel_meal_info != 'Not Included')
                            {{ $servicepackage->makkah_hotel_meal_info }}
                            @endif and Madinah: @if ($servicepackage->madinah_hotel_meal_info != 'Not Included')
                                {{ $servicepackage->madinah_hotel_meal_info }}
                            @endif
                    </span>
                    <span class="mealicon d-none d-sm-none d-md-block float-end me-3"></span>
                @endif
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="clearfix"></div>

    @if ($servicepackage->heading1 != '')
        <h2 class="col-12 float-start mt-5 details_sub_heading">{{ $servicepackage->heading1 }}</h2>
        <div class="clearfix"></div>
        <div class="col-12 float-start details_sub_text">
            {!! $servicepackage->heading1_details !!}
        </div>
        <div class="clearfix"></div>
    @endif

    @if ($makkah_hotel_info->hotelinfos_id > 0 || $madinah_hotel_info->hotelinfos_id > 0)
        <h2 class="col-12 float-start mt-5 mb-4 details_sub_heading">Hotels</h2>
        <div class="clearfix"></div>
        @if ($makkah_hotel_info->hotelinfos_id > 0)
            <div class="col-12 float-start mb-5 hotel_info_details">
                @php
                    $hotelimgs = Hotelimgs::query()
                        ->where('hotelimgs_status', 1)
                        ->where('hotelinfos_id', $makkah_hotel_info->hotelinfos_id)
                        ->orderBy('hotelimgs_sort', 'asc')
                        ->get();
                @endphp
                @if ($hotelimgs->count() > 0)
                    <div class="col-12 hotel-image position-relative float-start">
                        <!-- Swiper Container Start -->
                        <div class="swiper-container col-12 float-start">
                            <div class="swiper-wrapper">
                                @foreach ($hotelimgs as $hotelimg)
                                    <div class="swiper-slide">
                                        <img src="{{ asset('uploads/hotels/gallery/' . $hotelimg->hotelimgs_image) }}"
                                            alt="{{ $hotelimg->hotelimgs_caption }}" class="img-fluid">
                                    </div>
                                @endforeach
                            </div>
                            <!-- Add Pagination -->
                            <div class="swiper-pagination"></div>
                            <!-- Add Navigation -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                        <!-- Swiper Container End -->
                    </div>
                @endif
                <div class="col-12 float-start mt-4">
                    <h3 class="hotel_location mb-2">{{ $makkah_hotel_info->hotelinfos_city }}</h3>
                    <div class="hotel_name mb-2">Hotel: <span>{{ $makkah_hotel_info->hotelinfos_name }} - {{ $makkah_hotel_info->hotelinfos_city }}</span></div>
                    <div class="col-12 float-start hotel-infotext mb-2">
                        {!! strip_tags($makkah_hotel_info->hotelinfos_details) !!}
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        @endif

        @if ($madinah_hotel_info->hotelinfos_id > 0)
            <div class="col-12 float-start mb-5 hotel_info_details">
                @php
                    $hotelimgs_madinah = Hotelimgs::query()
                        ->where('hotelimgs_status', 1)
                        ->where('hotelinfos_id', $madinah_hotel_info->hotelinfos_id)
                        ->orderBy('hotelimgs_sort', 'asc')
                        ->get();
                @endphp
                @if ($hotelimgs_madinah->count() > 0)
                    <div class="col-12 hotel-image position-relative float-start">
                        <!-- Swiper Container Start -->
                        <div class="swiper-container col-12 float-start">
                            <div class="swiper-wrapper">
                                @foreach ($hotelimgs_madinah as $hotelimg_madinah)
                                    <div class="swiper-slide">
                                        <img src="{{ asset('uploads/hotels/gallery/' . $hotelimg_madinah->hotelimgs_image) }}"
                                            alt="{{ $hotelimg_madinah->hotelimgs_caption }}" class="img-fluid">
                                    </div>
                                @endforeach
                            </div>
                            <!-- Add Pagination -->
                            <div class="swiper-pagination"></div>
                            <!-- Add Navigation -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                        <!-- Swiper Container End -->
                    </div>
                @endif
                <div class="col-12 float-start mt-4">
                    <h3 class="hotel_location mb-2">{{ $madinah_hotel_info->hotelinfos_city }}</h3>
                    <div class="hotel_name mb-2">Hotel: <span>{{ $madinah_hotel_info->hotelinfos_name }} - {{ $madinah_hotel_info->hotelinfos_city }}</span></div>
                    <div class="col-12 float-start hotel-infotext mb-2">
                        {!! strip_tags($madinah_hotel_info->hotelinfos_details) !!}
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        @endif
    @endif

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
                            <option value="">-- Select A Travel Month ---</option>
                            <option value="January" @if ($month_name == "January") selected @endif>January</option>
                            <option value="February" @if ($month_name == "February") selected @endif>February</option>
                            <option value="March" @if ($month_name == "March") selected @endif>March</option>
                            <option value="April" @if ($month_name == "April") selected @endif>April</option>
                            <option value="May" @if ($month_name == "May") selected @endif>May</option>
                            <option value="June" @if ($month_name == "June") selected @endif>June</option>
                            <option value="July" @if ($month_name == "July") selected @endif>July</option>
                            <option value="August" @if ($month_name == "August") selected @endif>August</option>
                            <option value="September" @if ($month_name == "September") selected @endif>September</option>
                            <option value="October" @if ($month_name == "October") selected @endif>October</option>
                            <option value="November" @if ($month_name == "November") selected @endif>November</option>
                            <option value="December" @if ($month_name == "December") selected @endif>December</option>
                        </select>

                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-4 mb-4">
                        <label for="frmbooknow_guests" class="form-label">No. of Guests *</label>
                        <input type="text" class="form-control" id="frmbooknow_guests" name="frmbooknow_guests" placeholder="">
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-4 mb-4">
                        <label for="frmbooknow_total_days" class="form-label">Total Days *</label>
                        <input type="text" class="form-control" id="frmbooknow_total_days" name="frmbooknow_total_days" placeholder="" value="{{ $servicepackage->servicepackages_totalnights }}">
                    </div>
                </div>

                <input type="hidden" name="frmbooknow_package_name" id="frmbooknow_package_name" value="{{ $servicepackage->servicepackages_name }}">
                <input type="hidden" name="frmbooknow_package_price" id="frmbooknow_package_price" value="{{ $servicepackage->servicepackages_price }}">
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
