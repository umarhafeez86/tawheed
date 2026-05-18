@extends('frontend.layouts.mainholidays')
@section('main-container')
    <div class="background-img2 overflow-hidden">
        @include('frontend.layouts.topnavbar')

        <div class="hero-section container custome-margin-top custome-margin-bottom ">
            <div class="clearfix"></div>

            <div class="container">
                <p class="hero-subtitle mt-4 mt-lg-5">Customize your Umrah with Best Holiday Packages</p>
            </div>
            <div class="container hero-form-width-new mb-3 mb-lg-5" id="customholidayform_Area">
                <form name="customholidayform" id="customholidayform" method="post">
                    @csrf

                    <div class="container" id="">
                        <input type="hidden" name="travel_legs_row" id="travel_legs_row" value="1">
                        <div class="row" id="travel_legs">
                            <div class="mb-3 col-lg-3 col-6 autocomplete-container">
                                <label for="DepartureFrom_1" class="custom-label">Departure From</label>
                                <select class="form-control select2" name="DepartureFrom[]" id="DepartureFrom_1">
                                    <option value="">-- Select One--</option>
                                        @php
                                        use App\Models\Airports;
                                        $airports = Airports::orderBy('name','asc')->get();
                                        @endphp
                                        @foreach ($airports as $airport)
                                        <option value="{{ $airport->cityName }} {{ str_replace($airport->cityName,"",$airport->name) }} ({{ $airport->code }})-{{ $airport->countryName }}" >{{ $airport->cityName }}  {{ str_replace($airport->cityName,"",$airport->name) }} ({{ $airport->code }})-{{ $airport->countryName }}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-lg-3 col-6 autocomplete-container">
                                <label for="Destination_1" class="custom-label">Destination</label>
                                <select class="form-control select2" name="Destination[]" id="Destination_1">
                                    <option value="">-- Select One--</option>
                                        @php
                                        $airports = Airports::orderBy('name','asc')->get();
                                        @endphp
                                        @foreach ($airports as $airport)
                                        <option value="{{ $airport->cityName }} {{ str_replace($airport->cityName,"",$airport->name) }} ({{ $airport->code }})-{{ $airport->countryName }}" >{{ $airport->cityName }} {{ str_replace($airport->cityName,"",$airport->name) }} ({{ $airport->code }})-{{ $airport->countryName }}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-lg-3 col-6">
                                <label for="DepartureDate_1" class="custom-label">Date</label>
                                <input type="date" class="form-control" name="DepartureDate[]" id="DepartureDate_1">
                            </div>
                            <div class="mt-4 mb-3 col-lg-3 col-6">
                                <button type="button" class="leg-btn" onclick="addrow();">
                                    <img src="{{ asset('frontend/assets/images/plus.svg') }}" class="img-fluid"
                                        alt=""> Add leg
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-lg-3 mt-lg-2 col-6">
                                <label for="personname" class="custom-label">Person Name</label>
                                <input type="text" class="form-control" name="personname" id="personname"
                                    placeholder="Full Name">
                            </div>

                            <div class="mb-3 col-lg-3 mt-lg-2 col-6">
                                <label for="personphone" class="custom-label">contact number</label>
                                <input type="text" class="form-control" name="personphone" id="personphone"
                                    placeholder="" value=""
                                    maxlength="13" minlength="">
                            </div>
                            <div class="mb-3 col-lg-3 mt-lg-2 col-6">
                                <label for="personemail" class="custom-label">email</label>
                                <input type="email" class="form-control" name="personemail" id="personemail"
                                    placeholder="Email Address">
                            </div>
                            <div class="mb-3 col-lg-3 mt-lg-2 col-6">
                                <label class="custom-label"></label>
                                <button type="button" class="explore-btn mt-1"
                                    onclick="submitcustomform();">submit</button>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </form>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>


    <!-- Short Banners -->
    <div class="container custome-margin-top custome-margin-bottom">
        <h2 class="umrah-package">Browse Popular Umrah &amp; Packages</h2>
        <p class="mt-3 umrah-package-p">
            Start your blessed journey today with premium packages designed for comfort, convenience, and deep spiritual fulfillment.
        </p>
        <div class="row">
            @php
                //$specialClass = [2, 3, 6, 7, 10, 11, 14, 15];
                use App\Models\Banners;
                $banners = Banners::where('banners_status', 1)
                    ->where('banners_for', 1)
                    ->orderBy('banners_sort', 'asc')
                    ->get();
                $i = 1;
            @endphp
            @if ($banners->count() > 0)
                @foreach ($banners as $banner)
                    <div
                        class="col-12 @if ($banner->banners_image_box_type == 2) col-md-6 col-lg-4 mt-4 @else col-lg-8 mt-4 @endif box-banner">
                        <a href="{{ $banner->banners_link }}">
                            <div class="position-relative">
                                <img src="{{ asset('uploads/banners/' . $banner->banners_image) }}"
                                    class="img-fluid w-full img-h" alt="Ramadan Umrah Packages">
                                <div class="position-absolute top-50  text-white  px-3 text-img1 ms-2 ms-lg-4">
                                    <h3>{{ $banner->banners_name }}</h3>
                                    <div class="clearfix"></div>
                                    <p class="mt-0">
                                        {{ $banner->banners_details }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @php
                        $i = $i + 1;
                    @endphp
                @endforeach
            @endif
        </div>
    </div>
    <div class="clearfix"></div>


    <!-- Destinations Slider -->
    @include('frontend.layouts.destinationslists')


    <div class="bg-accordian overflow-hidden custome-margin-bottom" id="howitworks">
        <div class="container custome-margin-top custome-margin-bottom">
            <div>

                <div class="row mt-4 mt-lg-5 ">

                    <div class="col-12 col-lg-6">
                        <div class="icon-heading mb-2 d-flex gap-lg-2 ">
                            <img src="{{ asset('frontend/assets/images/ornament.svg') }}" class="img-fluid"
                                alt="Ornament Icon">
                            <h2 class="about-title mb-0">How it Works</h2>
                        </div>
                        <h2 class="accordion-heading text-start">Your Umrah & Holiday, Seamlessly Combined</h2>
                        <p class="accordion-para mt-3 mt-lg-4 text-start">Experience the best of both worlds, spiritual peace and a memorable vacation. Our Umrah + Holiday packages are designed to help you fulfill your religious journey while exploring exciting destinations with ease and comfort.</p>

                        <!-- <img src="{{ asset('frontend/assets/images/accordian-img.jpg') }}" class="img-fluid d-none me-4" alt=""> -->

                        <div class="accordion" id="accordionLeft">
                            <div class="accordion-item mt-3 mt-lg-4">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <img class="accordion-icon me-4"
                                            src="{{ asset('frontend/assets/images/not-fill-icon.svg') }}"
                                            alt="">Choose
                                        Your Package
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionLeft">
                                    <div class="accordion-body d-flex gap-4">
                                        <div class="wide-line ms-2"></div>

                                        Browse our handpicked Umrah + Holiday bundles tailored for every traveler. Whether you prefer serene beaches, cultural escapes, or family fun, select the package that matches your travel mood and schedule.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mt-3 mt-lg-4">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <img class="accordion-icon me-4"
                                            src="{{ asset('frontend/assets/images/not-fill-icon.svg') }}" alt="">
                                        Confirm & Customize
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionLeft">
                                    <div class="accordion-body d-flex gap-4">
                                        <div class="wide-line ms-2"></div>
                                        Once you've selected a package, we’ll work with you to fine-tune every detail, from hotel upgrades to extra sightseeing and flight preferences. You’re in full control of how your journey unfolds.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mt-3 mt-lg-4">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        <img class="accordion-icon me-4"
                                            src="{{ asset('frontend/assets/images/not-fill-icon.svg') }}" alt="">
                                        Travel
                                        & Experience
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionLeft">
                                    <div class="accordion-body d-flex gap-4">
                                        <div class="wide-line ms-2"></div>
                                        Embark on your spiritual journey with confidence. After completing Umrah, continue to your dream holiday destination with all arrangements in place, flights, stays, activities, and local support included.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6 mt-lg-5">
                        <img src="{{ asset('frontend/assets/images/accordian-img.jpg') }}" class="img-fluid"
                            alt="">
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>


    <div class="container custome-margin-top mt-3">
        <h3 class="Popular-pkg mt-3 text-start float-start">Featured affordable Umrah packages 2025</h3>
        <div class="clearfix"></div>
        <p class="Popular-pkg-p mt-3 mb-0 text-start float-start">Travel stress-free in 2025 with complete Umrah packages that include flights, hotels, transport, and guided religious tours.</p>

        <!-- d-flex gap-3 flex-wrap -->
        <div class="row mt-3 col-12 float-start g-4 m-0 p-0">
            @php
                use App\Models\Destinations;
                use App\Models\Servicepackages;
                $servicepackages = Servicepackages::where('servicepackages_status', 1)
                    ->where('destinations_id', '!=', null)
                    ->where('featured_package', 1)
                    ->orderBy('servicepackages_price', 'asc')
                    ->limit(6)
                    ->get();
            @endphp
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
        <!--
            <div class="d-flex align-items-center justify-content-center mt-5  mb-5">
                <button class="explore-btn-btn mb-5">explore MORE</button>
            </div>
        -->
    </div>
    <div class="clearfix"></div>

    <!-- Hotels Logos Slider -->
    @include('frontend.layouts.hotelslogos')

    <!-- Services Block 2 -->
    <div class="col-12 float-start custome-margin-top custome-margin-bottom" id="howitworks2">
        <div class="container">
            <div class="row">
                <!-- This will be 2nd on mobile, 1st on desktop -->
                <div class="col-12 col-md-6 order-2 order-md-1 float-start">
                    <div class="col-6 col-sm-6 col-md-4 float-start pe-2">
                        <img src="{{ asset('frontend/assets/images/desti-promo-1.jpg') }}"
                            class="img-fluid mb-2 desti-promo-img" alt="Ornament Icon">
                        <img src="{{ asset('frontend/assets/images/desti-promo-2.jpg') }}"
                            class="img-fluid mb-2 desti-promo-img" alt="Ornament Icon">
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 float-start pe-2">
                        <img src="{{ asset('frontend/assets/images/desti-promo-2.jpg') }}"
                            class="img-fluid mb-2 desti-promo-img" alt="Ornament Icon">
                        <img src="{{ asset('frontend/assets/images/desti-promo-1.jpg') }}"
                            class="img-fluid mb-2 desti-promo-img" alt="Ornament Icon">
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 float-start pe-2 d-none d-sm-none d-md-block">
                        <img src="{{ asset('frontend/assets/images/desti-promo-1.jpg') }}"
                            class="img-fluid mb-2 desti-promo-img" alt="Ornament Icon">
                        <img src="{{ asset('frontend/assets/images/desti-promo-2.jpg') }}"
                            class="img-fluid mb-2 desti-promo-img" alt="Ornament Icon">
                    </div>
                </div>
                <!-- This will be 1st on mobile, 2nd on desktop -->
                <div class="col-12 ps-0 ps-md-6 col-md-6 order-1 order-md-2 float-start">

                    <div class="icon-heading mb-2 d-flex gap-lg-2 ">
                        <img src="{{ asset('frontend/assets/images/ornament.svg') }}" class="img-fluid"
                            alt="Ornament Icon">
                        <h2 class="about-title mb-0">How it Works</h2>
                    </div>
                    <h2 class="mt-2 mt-lg-4 section-subtitle">Don’t Wait. Plan Ahead Today.</h2>
                    <p class="mt-3 mt-lg-5 section-text">Early planning means better pricing, more options, and zero stress. Let us lock your Umrah + Holiday bundle before the season’s top dates vanish.</p>
                    <a href="{{ url('/umrah-and-holiday-packages') }}"
                        class="mt-3 mb-3 mt-lg-4 col-12 col-sm-12 col-md-4 float-start text-center btn-book-now">Book
                        Now</a>


                </div>
            </div>
        </div>
    </div>



    <!-- Air Lines Logos Slider -->
    @include('frontend.layouts.airlineslogos')
@endsection
