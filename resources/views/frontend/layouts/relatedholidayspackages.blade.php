<div class="container custome-margin-top mt-5">
    <h3 class="Popular-pkg mt-3 text-start d-block">Related Umrah packages 2025</h3>
    <p class="Popular-pkg-p mt-3 mb-3 text-start d-block">Urna, massa aliqua dui pellentesque. Ac, gravida in. Diam
        vitae, nec mattis
        lectus quam
        pretium amet facilisis.</p>

    <!-- d-flex gap-3 flex-wrap -->
    <div class="row mt-3 col-12 float-start g-4">
            @php
                $favorites = json_decode(Cookie::get('favorites', '[]'), true);
                //$compares  = json_decode(Cookie::get('compares', '[]'), true);
                use App\Models\Services;
                use App\Models\Servicepackages;
                use App\Models\Hotelinfos;
                use App\Models\Destinations;

                $service = Services::where('services_id', $servicepackage->services_id)->first();

                $related_servicepackages = Servicepackages::where('servicepackages_status', 1)
                    ->where('destinations_id', $servicepackage->destinations_id)
                    ->where('servicepackages_id', '!=', $servicepackage->servicepackages_id)
                    ->orderBy('servicepackages_sort', 'asc')
                    ->paginate(3); // Initial load

            @endphp
            @if ($related_servicepackages->count() > 0)
                @foreach ($related_servicepackages as $related_servicepackage)
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4 float-start">
                        <div class="custom-card mb-4">
                            <div class="position-relative text-center">
                                <a href="{{ url('/package/' . $related_servicepackage->servicepackages_url) }}"><img
                                        src="{{ asset('uploads/servicepackages/' . $related_servicepackage->servicepackages_image) }}"
                                        class="custom-card-img mt-2"
                                        alt="{{ $related_servicepackage->servicepackages_name }}"></a>
                                @if ($related_servicepackage->custom_label != '')
                                    <p class="deposit-amount">{{ $related_servicepackage->custom_label }}</p>
                                @endif
                            </div>

                            <div class="custom-card-body ms-3 me-3 ms-lg-4 me-lg-4 mt-2">
                                @php
                                    $page_title_info = explode(' ', $related_servicepackage->servicepackages_name);
                                @endphp
                                <!-- Title and rating -->
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="package-title mb-0">
                                            <a href="{{ url('/package/' . $related_servicepackage->servicepackages_url) }}">
                                                {{ $related_servicepackage->servicepackages_name }}
                                            </a>
                                        </h5>
                                        <div class="rating-stars d-flex">
                                            @for ($i = 1; $i <= $related_servicepackage->servicepackages_startype; $i++)
                                                <i class="fa fa-star"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    <p class="package-duration mt-2">{{ $related_servicepackage->servicepackages_totalnights }} Nights {{ $related_servicepackage->servicepackages_startype }} Star</p>
                                </div>

                                <div class="package-card-body">
                                    <!-- City info -->
                                    <div class="city-info d-flex justify-content-between">
                                        <!-- Makkah -->
                                        <div class="city-item d-flex justify-content-center align-items-center mt-3">
                                            <div class="ms-2 mt-4">
                                                <span class="city-name dis-block">Makkah</span>
                                                {{ $related_servicepackage->servicepackages_makkahnights }} <span
                                                    class="days">Nights</span>
                                            </div>
                                        </div>
                                        <!-- Madina -->
                                        <div class="city-item d-flex mt-3 justify-content-center align-items-center">
                                            <div class="ms-2 mt-4">
                                                <span class="city-name dis-block">Madinah</span>
                                                {{ $related_servicepackage->servicepackages_madinahnights }} <span
                                                    class="days">Nights</span>
                                            </div>
                                        </div>
                                        <!-- Madina -->
                                        <div class="city-item d-flex mt-3 justify-content-center align-items-center">
                                            @php
                                                $destination_name = "";
                                                $destination_info = Destinations::where(
                                                    'destinations_id',
                                                    $related_servicepackage->destinations_id,
                                                )->first();
                                                if ($destination_info){
                                                    $destination_name = $destination_info->destinations_name;
                                                }
                                            @endphp
                                            <div class="ms-2 mt-4">
                                                <span class="city-name dis-block">{{ $destination_name }}</span>
                                                {{ $related_servicepackage->servicepackages_destinations_nights }} <span
                                                    class="days">Nights</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Features -->
                                    <div class="features d-flex justify-content-between  mt-3 ">
                                        <div class="mt-3">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <img class="img-fluid"
                                                    src="{{ asset('frontend/assets/images/aeroplane.svg') }}"
                                                    alt="">
                                            </div>
                                            <p class="facilisis mt-3">
                                                @if ($related_servicepackage->flight_info == 'Included')
                                                    {{ $related_servicepackage->servicepackages_flightinfo }}
                                                @endif
                                            </p>
                                        </div>
                                        <div class="mt-3 width-117">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <img class="img-fluid"
                                                    src="{{ asset('frontend/assets/images/card.svg') }}" alt="">
                                            </div>
                                            <p class="facilisis mt-3">
                                                @if ($related_servicepackage->visa_info == 'Included')
                                                    Visa Service
                                                @endif
                                            </p>
                                        </div>
                                    </div>

                                    <div class="features d-flex justify-content-between ">
                                        <div class="mt-3">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <img class="img-fluid"
                                                    src="{{ asset('frontend/assets/images/jeep.svg') }}" alt="">
                                            </div>
                                            <p class="facilisis mt-3">
                                                @if ($related_servicepackage->transport_info != 'Not Included')
                                                    Transportation
                                                @endif
                                            </p>
                                        </div>
                                        <div class="mt-3">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <img class="img-fluid"
                                                    src="{{ asset('frontend/assets/images/hotel.svg') }}" alt="">
                                            </div>
                                            <p class="facilisis mt-3">
                                                @if ($related_servicepackage->makkah_hotelinfos_id != 'Not Included' || $related_servicepackage->madinah_hotelinfos_id != 'Not Included')
                                                    Hotels Included
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <hr class="divider m-0">
                                    <!-- Price and CTA -->
                                    <div class="price-section d-flex justify-content-between align-items-center mt-3 mb-3">
                                        <p class="price">{{ get_siteinfo('currency_symbol') }}
                                            {{ $related_servicepackage->servicepackages_price }} <span class="price-person">per
                                                person</span></p>
                                        <a href="tel:{{ get_siteinfo('setting_phone') }}" class="book-now-btn">
                                            <img src="{{ asset('frontend/assets/images/dailer.svg') }}" class="img-fluid"
                                                alt="Phone Icon"> Call Now
                                        </a>

                                    </div>
                                    <a href="{{ url('/package/' . $related_servicepackage->servicepackages_url) }}"
                                        class="details-btn mb-4">Details</a>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            @endif          
    </div>
</div>
