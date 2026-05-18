@if ($servicepackages->count() > 0)
    @foreach ($servicepackages as $servicepackage)
        <div class="col-12 col-sm-6 col-md-6 col-lg-4 float-start">
            <div class="custom-card mb-0">
                <div class="position-relative text-center">
                    <a href="{{ url('/package/' . $servicepackage->servicepackages_url) }}"><img
                            src="{{ asset('uploads/servicepackages/' . $servicepackage->servicepackages_image) }}"
                            class="custom-card-img mt-2" alt="{{ $servicepackage->servicepackages_name }}"></a>
                    @if ($servicepackage->custom_label != '')
                        <p class="deposit-amount">{{ $servicepackage->custom_label }}</p>
                    @endif
                </div>

                <div class="custom-card-body ms-3 me-3 ms-lg-4 me-lg-4 mt-2">
                    <!-- Title and rating -->
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            @php
                                $page_title_info = explode(' ', $servicepackage->servicepackages_name);
                            @endphp
                            <h5 class="package-title mb-0">
                                <a href="{{ url('/package/' . $servicepackage->servicepackages_url) }}">
                                    {{ $page_title_info[4] }}
                                    {{ $page_title_info[5] }} {{ $page_title_info[6] }}
                                </a>
                            </h5>
                            <div class="rating-stars d-flex">
                                @for ($i = 1; $i <= $servicepackage->servicepackages_startype; $i++)
                                    <i class="fa fa-star"></i>
                                @endfor
                            </div>
                        </div>
                        <p class="package-duration mt-2 text-start">{{ $page_title_info[0] }}
                            {{ $page_title_info[1] }}
                            {{ $page_title_info[2] }} {{ $page_title_info[3] }}</p>
                    </div>


                    <div class="package-card-body">
                        <!-- City info -->
                        <div class="city-info d-flex justify-content-between">
                            <!-- Makkah -->
                            <div class="city-item d-flex justify-content-center align-items-center mt-0 mt-md-0">
                                <img class="img-fluid"
                                    src="{{ url('frontend/assets/images/the-kaaba-and-the-minarets-images-1 1.png') }}"
                                    alt="Kaaba in Makkah">
                                <div class="ms-2 mt-4">
                                    <span class="city-name dis-block">Makkah</span>
                                    {{ $servicepackage->servicepackages_makkahnights }} <span
                                        class="days">Nights</span>
                                </div>
                            </div>

                            <!-- Madina -->
                            <div class="city-item d-flex mt-0 mt-md-0 justify-content-center align-items-center">
                                <img class="img-fluid"
                                    src="{{ url('frontend/assets/images/Madina-PNG-Image-Background 1.png') }}"
                                    alt="Madina">
                                <div class="ms-2 mt-4">
                                    <span class="city-name dis-block">Makkah</span>
                                    {{ $servicepackage->servicepackages_madinahnights }} <span
                                        class="days">Nights</span>
                                </div>
                            </div>
                        </div>

                        <!-- Features -->
                        <div class="features d-flex justify-content-between mt-0 mt-md-1">
                            <div class="mt-0 mt-md-3 col-5 float-start text-center w-40">
                                <img class="img-fluid" src="{{ url('frontend/assets/images/aeroplane.svg') }}"
                                    alt="">
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
                        <div class="price-section d-flex justify-content-between align-items-center mt-3 mb-3">
                            <p class="price">{{ get_siteinfo('currency_symbol') }}
                                {{ $servicepackage->servicepackages_price }} <span class="price-person">per
                                    person</span></p>
                            <a href="tel:{{ get_siteinfo('setting_phone') }}" class="book-now-btn">
                                <img src="{{ url('frontend/assets/images/dailer.svg') }}" class="img-fluid"
                                    alt="Call {{ get_siteinfo('setting_name') }} "> Call Now
                            </a>

                        </div>
                        <a href="{{ url('/package/' . $servicepackage->servicepackages_url) }}"
                            class="details-btn mb-1 mb-md-3">Details</a>
                    </div>

                </div>
            </div>
        </div>
    @endforeach

    <div class="clearfix"></div>
        <div class="col-12 float-start d-block align-items-center justify-content-center mt-5 mb-5">
            <a href="{{ url('/'.$service->services_url) }}" class="explore-btn-new-link">explore MORE</a>
        </div>
    <div class="clearfix"></div>
    
@endif
