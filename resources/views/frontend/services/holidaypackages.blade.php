@extends('frontend.layouts.innerholidaypackages')

@section('main-container')
    @php
        use App\Models\Destinations;
        use App\Models\Services;
        use App\Models\Servicepackages;
        $destinations_id = $destination->destinations_id;
    @endphp

    <div class="background-hajj col-12 float-start"
        @if ($services_image != '') style="background: url('{{ asset('uploads/destinations/' . $services_image) }}')" @endif>
        @include('frontend.layouts.topnavbar')

        <div class=" container">
            <div class="custome-margin-top custome-margin-bottom ramadan-packg">
                <h2>Umrah and {{ $page_name }} Packages</h2>
                <p></p>
            </div>
        </div>
    </div>


    <div class="container custome-margin-top mt-3">
        <h3 class="Popular-pkg mt-3 text-start float-start">Featured affordable Umrah packages 2025</h3>
        <div class="clearfix"></div>
        <p class="Popular-pkg-p mt-3 mb-0 text-start float-start">Urna, massa aliqua dui pellentesque. Ac, gravida in. Diam
            vitae, nec mattis
            lectus quam
            pretium amet facilisis.</p>

        <!-- d-flex gap-3 flex-wrap -->
        <div class="row mt-3 col-12 float-start g-4 m-0 p-0" id="packagefiltershome">
            @if ($servicepackages->count() > 0)
                @foreach ($servicepackages as $servicepackage)
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4 float-start">
                        <div class="custom-card mb-0">
                            <div class="position-relative text-center">
                                <a href="{{ url('/package/' . $servicepackage->servicepackages_url) }}"><img
                                        src="{{ asset('uploads/servicepackages/' . $servicepackage->servicepackages_image) }}"
                                        class="custom-card-img mt-2"
                                        alt="{{ $servicepackage->servicepackages_name }}"></a>
                                @if ($servicepackage->custom_label != '')
                                    <p class="deposit-amount">{{ $servicepackage->custom_label }}</p>
                                @endif
                            </div>

                            <div class="custom-card-body ms-3 me-3 ms-lg-4 me-lg-4 mt-2">
                                @php
                                    $page_title_info = explode(' ', $servicepackage->servicepackages_name);
                                @endphp
                                <!-- Title and rating -->
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="package-title mb-0">
                                            <a href="{{ url('/package/' . $servicepackage->servicepackages_url) }}">
                                                {{ $servicepackage->servicepackages_name }}
                                            </a>
                                        </h5>
                                        <div class="rating-stars d-flex">
                                            @for ($i = 1; $i <= $servicepackage->servicepackages_startype; $i++)
                                                <i class="fa fa-star"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    <p class="package-duration mt-2 mb-0">{{ $servicepackage->servicepackages_totalnights }}
                                        Nights {{ $servicepackage->servicepackages_startype }} Star</p>
                                </div>

                                <div class="package-card-body">
                                    <!-- City info -->
                                    <div class="city-info d-flex justify-content-between">
                                        <!-- Makkah -->
                                        <div class="city-item d-flex justify-content-center align-items-center mt-0 mt-md-0">
                                            <div class="ms-2 mt-0 mt-md-3">
                                                <span class="city-name dis-block">Makkah</span>
                                                {{ $servicepackage->servicepackages_makkahnights }} <span
                                                    class="days">Nights</span>
                                            </div>
                                        </div>
                                        <!-- Madina -->
                                        <div class="city-item d-flex mt-0 mt-md-0 justify-content-center align-items-center">
                                            <div class="ms-2 mt-0 mt-md-3">
                                                <span class="city-name dis-block">Madinah</span>
                                                {{ $servicepackage->servicepackages_madinahnights }} <span
                                                    class="days">Nights</span>
                                            </div>
                                        </div>
                                        <!-- Madina -->
                                        <div class="city-item d-flex mt-0 mt-md-0 justify-content-center align-items-center">
                                            @php
                                                $destination_info = Destinations::where(
                                                    'destinations_id',
                                                    $servicepackage->destinations_id,
                                                )->first();
                                                $destination_name = $destination_info->destinations_name;
                                            @endphp
                                            <div class="ms-2 mt-0 mt-md-3">
                                                <span class="city-name dis-block">{{ $destination_name }}</span>
                                                {{ $servicepackage->servicepackages_destinations_nights }} <span
                                                    class="days">Nights</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Features -->
                                    <div class="features d-flex justify-content-between mt-0 mt-md-1">
                                        <div class="mt-0 mt-md-3 col-5 float-start text-center w-40">
                                            <img class="img-fluid"
                                                src="{{ url('frontend/assets/images/aeroplane.svg') }}" alt="">
                                            <div class="clearfix"></div>
                                            <p class="facilisis mt-1 mt-md-3 text-center">
                                                @if ($servicepackage->flight_info == 'Included')
                                                    {{ $servicepackage->servicepackages_flightinfo }}
                                                @endif
                                            </p>
                                        </div>
                                        <div class="mt-0 mt-md-3 col-5 float-start text-center w-40">
                                            <img class="img-fluid" src="{{ url('frontend/assets/images/card.svg') }}"
                                                alt="">
                                            <div class="clearfix"></div>
                                            <p class="facilisis mt-1 mt-md-3 text-center">
                                                @if ($servicepackage->visa_info == 'Included')
                                                    Visa Service
                                                @endif
                                            </p>
                                        </div>
                                    </div>

                                    <div class="features d-flex justify-content-between mt-0 mt-md-1">
                                        <div class="mt-0 mt-md-3 col-5 float-start text-center w-40">
                                            <img class="img-fluid" src="{{ url('frontend/assets/images/jeep.svg') }}"
                                                alt="">
                                            <div class="clearfix"></div>
                                            <p class="facilisis mt-1 mt-md-3 text-center">
                                                @if ($servicepackage->transport_info != 'Not Included')
                                                    Transportation
                                                @endif
                                            </p>
                                        </div>
                                        <div class="mt-0 mt-md-3 col-5 float-start text-center w-40">
                                            <img class="img-fluid" src="{{ url('frontend/assets/images/hotel.svg') }}"
                                                alt="">
                                            <div class="clearfix"></div>
                                            <p class="facilisis mt-1 mt-md-3 text-center">
                                                @if ($servicepackage->makkah_hotelinfos_id != 'Not Included' || $servicepackage->madinah_hotelinfos_id != 'Not Included')
                                                    Hotels Included
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <hr class="divider m-0">
                                    <!-- Price and CTA -->
                                    <div class="price-section d-flex justify-content-between align-items-center mt-1 mt-md-3 mb-1 mb-md-3">
                                        <p class="price">{{ get_siteinfo('currency_symbol') }}
                                            {{ $servicepackage->servicepackages_price }} <span class="price-person">per
                                                person</span></p>
                                        <a href="tel:{{ get_siteinfo('setting_phone') }}" class="book-now-btn">
                                            <img src="{{ asset('frontend/assets/images/dailer.svg') }}" class="img-fluid"
                                                alt="Phone Icon"> Call Now
                                        </a>

                                    </div>
                                    <a href="{{ url('/package/' . $servicepackage->servicepackages_url) }}"
                                        class="details-btn mb-1 mb-md-3">Details</a>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        @if ($servicepackages->count() > 0)
            <div class="col-12 float-start d-block align-items-center justify-content-center mt-5 mb-5">
                <button id="load-more" data-page="2" class="explore-btn-new">explore MORE</button>
            </div>
        @endif
    </div>

    <div class="clearfix"></div>

    <!-- Destinations Slider -->
    @include('frontend.layouts.destinationslists')

    <!-- Air Lines Logos Slider -->
    @include('frontend.layouts.hotelslogos')

    <!-- Custom Enquiry Form -->
    @include('frontend.layouts.customform')

    <!-- Air Lines Logos Slider -->
    @include('frontend.layouts.airlineslogos')
@endsection
