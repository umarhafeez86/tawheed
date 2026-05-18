@extends('frontend.layouts.main')
@section('main-container')

    <div class="background-img overflow-hidden">

        @include('frontend.layouts.topnavbar')

        <div class="hero-section container custome-margin-top custome-margin-bottom-01">
            <div class="container hero-subtitle-width">
                <p class="hero-subtitle mt-4 mt-lg-5">Customize your Divine Journey with Best Umrah Packages</p>
            </div>
            <div class="container hero-form-width mb-3 mb-lg-5">

                
                <form id="fastquote" name="fastquote" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row-msg text-center" id="fastquote_msg"></div>

                    <input type="hidden" name="packagetype" id="packagetype" value="Umrah">
                    <div class="container">
                        <div class=" row">
                            <div class="mb-3 col-lg-3   col-6">
                                <label for="travelmonth" class="custom-label">Month *</label>
                                <select class="form-select form-select-black1" name="travelmonth" id="travelmonth">
                                    <option value="">-- Select A Month ---</option>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                            </div>
                            <div class="mb-3 col-lg-3   col-6">
                                <label for="nightsinfo" class="custom-label">Days *</label>
                                <input type="number" class="form-control" id="nightsinfo" name="nightsinfo"
                                    placeholder="days">
                            </div>
                            <div class="mb-3 col-lg-3   col-6">
                                <label for="passginfo" class="custom-label">persons *</label>
                                <input type="number" class="form-control" id="passginfo" name="passginfo"
                                    placeholder="no of guests">
                            </div>
                            <div class="mb-3 col-lg-3   col-6">
                                <label for="personname" class="custom-label">full name *</label>
                                <input type="text" class="form-control" name="personname" id="personname"
                                    placeholder="Full name">
                            </div>
                            <div class="mb-3 col-lg-4  mt-lg-2  col-6">
                                <label for="phoneno" class="custom-label">contact number *</label>
                                <input type="text" class="form-control" name="phoneno" id="phoneno" placeholder="+44"
                                    value="+44" oninput="if(!this.value.startsWith('+44')) this.value = '+44';"
                                    maxlength="13" minlength="11">
                            </div>
                            <div class="mb-3 col-lg-5  mt-lg-2  col-6">
                                <label for="txtemail" class="custom-label">email *</label>
                                <input type="email" class="form-control" name="txtemail" id="txtemail"
                                    placeholder="demo@123">
                            </div>
                            <div class="mb-3 col-12 col-lg-3">
                                <button type="button" class="explore-btn" style="margin-top: 37px;" onclick="submitfastquote();">submit</button>
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
    <div class="container bg-yellow negitive-margin-top-01 p-1 ">
        <div class="row m-3 m-sm-4 m-lg-5 ">
            <div class="col-6 col-md-3 text-center stats-item">
                <h2>10<sup>+</sup></h2>
                <p>Years of Experience</p>
            </div>
            <div class="col-6 col-md-3 text-center stats-item">
                <h2>30k<sup>+</sup></h2>
                <p>Satisfied Pilgrims</p>
            </div>
            <div class="col-6 col-md-3 text-center stats-item">
                <h2>95<sup>%</sup></h2>
                <p>Success Travellers</p>
            </div>
            <div class="col-6 col-md-3 text-center stats-item">
                <h2>4.8<sup>*</sup></h2>
                <p>Client Ratings</p>
            </div>
        </div>
    </div>

    <!-- Short Banners -->
    <div class="container custome-margin-top custome-margin-bottom">
        <h2 class="umrah-package">Browse Popular Umrah Packages</h2>
        <p class="mt-3 umrah-package-p">
            Urna, massa aliqua dui pellentesque. Ac, gravida in. Diam vitae, nec mattis
            lectus quam pretium amet facilisis.
        </p>
        <div class="row">

            @php
                //$specialClass = [2, 3, 6, 7, 10, 11, 14, 15];
                use App\Models\Banners;
                $banners = Banners::where('banners_status', 1)
                    ->where('banners_for', 0)
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

    <!-- Filers For Packages -->
    <div class="container custome-margin-top mt-3">
        <h3 class="Popular-pkg mt-3">Featured affordable Umrah packages 2025</h3>
        <p class="Popular-pkg-p mt-3 mb-5">Urna, massa aliqua dui pellentesque. Ac, gravida in. Diam vitae, nec mattis
            lectus quam
            pretium amet facilisis.</p>
        @php
            $price_ranges = explode(',', get_siteinfo('price_range'));
            $priceminval = reset($price_ranges);
            $pricemaxval = end($price_ranges);
            $pricemidval = array_slice($price_ranges, -3, 1)[0];
        @endphp

        <form id="filterForm" method="POST">
            @csrf <!-- CSRF token is required in Laravel -->

            @php
                $price_ranges = explode(',', get_siteinfo('price_range'));
                if (session()->has('priceminval')) {
                    $priceminval = session('priceminval');
                } else {
                    $priceminval = reset($price_ranges);
                }

                if (session()->has('pricemaxval')) {
                    $pricemaxval = session('pricemaxval');
                } else {
                    $pricemaxval = array_slice($price_ranges, -2, 1)[0];
                }
            @endphp

            @php
                $priceby = 'asc';
            @endphp

            <div class="gap-2 margin-on-small d-none d-sm-none d-md-block">
                <div class="d-flex align-items-center justify-content-center">
                    <div class="section-box">
                        <div class="row">
                            <div class="">
                                <select
                                    class="form-select holidays-btn homefilterdata selectservices d-none d-sm-none d-md-block"
                                    name="services_id" id="services_id">
                                    <option disabled selected>Select Month</option>
                                    @php
                                        $i = 1;
                                        use App\Models\Services;
                                        $servicedetails = Services::where('services_status', 1)
                                            ->orderBy('services_sort', 'asc')
                                            ->limit(20)
                                            ->get();
                                    @endphp
                                    @if ($servicedetails->count() > 0)
                                        @foreach ($servicedetails as $servicedetail)
                                            @php
                                                if ($i == 1) {
                                                    $services_id = $servicedetail->services_id;
                                                }
                                            @endphp
                                            <option value="{{ $servicedetail->services_id }}"
                                                @if ($services_id == $servicedetail->services_id) selected @endif>
                                                {{ $servicedetail->services_name }}</option>
                                            @php
                                                $i++;
                                            @endphp
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="section-box">
                        <div class="btn-group w-100 gap-2" role="group">
                            @php
                                $packagenights = 'all';
                            @endphp
                            <input type="radio" class="btn-check homefilterdata packagenights" name="packagenights"
                                id="packagenights0" value="all" @if ($packagenights == 'all') checked @endif>
                            <label class="btn custom-button" for="packagenights0">All</label>

                            @php
                                $filter_nights = explode(',', get_siteinfo('filter_nights_values'));
                            @endphp
                            @foreach ($filter_nights as $filter_night)
                                <input type="radio" class="btn-check homefilterdata packagenights" name="packagenights"
                                    id="packagenights{{ $filter_night }}" value="{{ $filter_night }}"
                                    @if ($packagenights == $filter_night) checked @endif>
                                <label class="btn custom-button"
                                    for="packagenights{{ $filter_night }}">{{ $filter_night }} Days</label>
                            @endforeach
                        </div>
                    </div>
                    <div class="section-box text-center d-flex gap-1">
                        @php
                            $roomtype = 'all';
                        @endphp

                        <input type="radio" name="roomtype" id="roomtype0" value="all"
                            @if ($roomtype == 'all') checked @endif class="d-none homefilterdata roomtype">
                        <label for="roomtype0" class="star-wrapper2">
                            All
                        </label>
                        @php
                            $filter_stars = explode(',', get_siteinfo('filter_star_values'));
                        @endphp
                        @foreach ($filter_stars as $filter_star)
                            <input type="radio" name="roomtype" id="roomtype{{ $filter_star }}"
                                value="{{ $filter_star }}" @if ($roomtype == $filter_star) checked @endif
                                class="d-none homefilterdata roomtype">
                            <label for="roomtype{{ $filter_star }}" class="star-wrapper2">
                                @for ($i = 1; $i <= $filter_star; $i++)
                                    <span class="star"></span>
                                @endfor
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>


            <div class="d-block d-sm-block d-md-none">
                <!-- Trigger Button (Filter Icon) -->
                <div class="col-12 float-start">
                    <button type="button" class="btn p-0 border-0 bg-transparent float-end" onclick="toggleDiv()">
                        <img src="{{ url('frontend/assets/images/filter-icon.jpg') }}"
                            class="img-fluid img-filter float-end" alt="Filter">
                    </button>

                    <div class="clearfix"></div>
                    <div id="filtersformob" class="slide-toggle mt-3 col-12 float-start">
                        <div class="section-box mb-3">
                            <select
                                class="form-select holidays-btn homefilterdata selectservices d-block d-sm-block d-md-none"
                                name="services_id" id="services_id2">
                                <option disabled selected>Select Month</option>
                                @php
                                    $i = 1;
                                    $servicedetails = Services::where('services_status', 1)
                                        ->orderBy('services_sort', 'asc')
                                        ->limit(20)
                                        ->get();
                                @endphp
                                @if ($servicedetails->count() > 0)
                                    @foreach ($servicedetails as $servicedetail)
                                        @php
                                            if ($i == 1) {
                                                $services_id = $servicedetail->services_id;
                                            }
                                        @endphp
                                        <option value="{{ $servicedetail->services_id }}"
                                            @if ($services_id == $servicedetail->services_id) selected @endif>
                                            {{ $servicedetail->services_name }}</option>
                                        @php
                                            $i++;
                                        @endphp
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="section-box mb-3">
                            <div class="btn-group w-100 gap-2" role="group">
                                <input type="radio" class="btn-check homefilterdata packagenights"
                                    name="packagenights2" id="packagenights0a" value="all"
                                    @if ($packagenights == 'all') checked @endif>
                                <label class="btn custom-button" for="packagenights0a">All</label>

                                @php
                                    $filter_nights = explode(',', get_siteinfo('filter_nights_values'));
                                @endphp
                                @foreach ($filter_nights as $filter_night)
                                    <input type="radio" class="btn-check homefilterdata packagenights"
                                        name="packagenights2" id="packagenights{{ $filter_night }}a"
                                        value="{{ $filter_night }}" @if ($packagenights == $filter_night) checked @endif>
                                    <label class="btn custom-button"
                                        for="packagenights{{ $filter_night }}a">{{ $filter_night }} Days</label>
                                @endforeach
                            </div>
                        </div>

                        <div class="section-box text-center d-flex gap-1 justify-content-center">
                            <input type="radio" name="roomtype2" id="roomtype0a" value="all"
                                @if ($roomtype == 'all') checked @endif class="d-none homefilterdata roomtype">
                            <label for="roomtype0a" class="star-wrapper2" style="color: #fff">
                                All
                            </label>
                            @php
                                $filter_stars = explode(',', get_siteinfo('filter_star_values'));
                            @endphp
                            @foreach ($filter_stars as $filter_star)
                                <input type="radio" name="roomtype2" id="roomtype{{ $filter_star }}a"
                                    value="{{ $filter_star }}" @if ($roomtype == $filter_star) checked @endif
                                    class="d-none homefilterdata roomtype">
                                <label for="roomtype{{ $filter_star }}a" class="star-wrapper2">
                                    @for ($i = 1; $i <= $filter_star; $i++)
                                        <span class="star"></span>
                                    @endfor
                                </label>
                            @endforeach
                        </div>

                        <button type="button" class="details-btn mt-2 bg-transparent"
                            onclick="submitfiltershome();">Show Results</button>

                    </div>

                </div>
            </div>

        </form>

        <!-- d-flex gap-3 flex-wrap -->
        <div class="row mt-3 col-12 float-start g-4 text-center" id="packagefiltershome">
            @php
                use App\Models\Servicepackages;
                $servicepackages = Servicepackages::where('servicepackages_status', 1)
                    ->where('services_id', $services_id)
                    ->where('destinations_id', null)
                    ->orderBy('servicepackages_price', $priceby)
                    ->limit(6)
                    ->get();
            @endphp
            @if ($servicepackages->count() > 0)
                @foreach ($servicepackages as $servicepackage)
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4 float-start">
                        <div class="custom-card mb-4">
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
                                        <div class="city-item d-flex justify-content-center align-items-center mt-3">
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
                                        <div class="city-item d-flex mt-3 justify-content-center align-items-center">
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
                                    <div class="features d-flex justify-content-between mt-3">
                                        <div class="mt-3 col-5 float-start text-center">
                                            <img class="img-fluid"
                                                src="{{ url('frontend/assets/images/aeroplane.svg') }}" alt="">
                                            <div class="clearfix"></div>
                                            <p class="facilisis mt-3 text-center">
                                                @if ($servicepackage->flight_info == 'Included')
                                                    {{ $servicepackage->servicepackages_flightinfo }}
                                                @endif
                                            </p>
                                        </div>
                                        <div class="mt-3 col-5 float-start text-center">
                                            <img class="img-fluid" src="{{ url('frontend/assets/images/card.svg') }}"
                                                alt="">
                                            <div class="clearfix"></div>
                                            <p class="facilisis mt-3 text-center">
                                                @if ($servicepackage->visa_info == 'Included')
                                                    Visa Service
                                                @endif
                                            </p>
                                        </div>
                                    </div>

                                    <div class="features d-flex justify-content-between">
                                        <div class="mt-3 col-5 float-start text-center">
                                            <img class="img-fluid" src="{{ url('frontend/assets/images/jeep.svg') }}"
                                                alt="">
                                            <div class="clearfix"></div>
                                            <p class="facilisis mt-3 text-center">
                                                @if ($servicepackage->transport_info != 'Not Included')
                                                    Transportation
                                                @endif
                                            </p>
                                        </div>
                                        <div class="mt-3 col-5 float-start text-center">
                                            <img class="img-fluid" src="{{ url('frontend/assets/images/hotel.svg') }}"
                                                alt="">
                                            <div class="clearfix"></div>
                                            <p class="facilisis mt-3 text-center">
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
                                        class="details-btn mb-4">Details</a>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>


    <!-- Featured Holiday Packages -->
    <div class="col-12 mt-3 mb-3 pt-5 pb-5 ps-0 pe-0 float-start holiday-packages-wrap" id="holidays-packages">
        <div class="col-12 col-sm-12 col-md-12 col-lg-3 float-start holidays-packages-left-section p-5">
            <h3 class="sub-heading">
                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21"
                    fill="none">
                    <rect x="9.91919" width="5.84878" height="5.84878" transform="rotate(45 9.91919 0)"
                        fill="white" />
                    <rect x="16.1365" y="6" width="5.85" height="5.85" transform="rotate(45 16.1365 6)"
                        fill="white" />
                    <rect x="10.1365" y="12" width="5.85" height="5.85" transform="rotate(45 10.1365 12)"
                        fill="white" />
                    <rect x="4.13647" y="6" width="5.85" height="5.85" transform="rotate(45 4.13647 6)"
                        fill="white" />
                </svg>
                HALAL HOLDIAYS
            </h3>
            <h2 class="heading">get Amazing Umrah with
                holiday packages</h2>
            <p class="textinfo">
                Discover their experiences, reflections, and profound moments that have transformed their lives. Join the
                countless believers who have found
            </p>
            <a href="{{ url('/umrah-and-holiday-packages') }}" class="btnexplore">
                Explore All
            </a>
        </div>
        <div class="col-12 col-sm-12 col-md-12  col-lg-9 float-start">
            <!-- Blog Card 1 -->
            <div class="swiper mySwiper3">
                <div class="swiper-buttons">
                    <button class="custom-prev3"></button>
                    <button class="custom-next3"></button>
                </div>
                <div class="swiper-wrapper">
                    @php
                        $featured_holidays_servicepackages = Servicepackages::where('servicepackages_status', 1)
                            ->where('destinations_id', '!=', null)
                            ->where('featured_package', 1)
                            ->limit(6)
                            ->get();
                    @endphp
                    @if ($featured_holidays_servicepackages->count() > 0)
                        @foreach ($featured_holidays_servicepackages as $servicepackage)
                            <div class="swiper-slide">
                                <a href="{{ url('/package/' . $servicepackage->servicepackages_url) }}">
                                    <div class="holiday-package-thumb position-relative p-4"
                                        style="background: url('{{ asset('uploads/servicepackages/' . $servicepackage->servicepackages_featured_image) }}')">
                                        <div class="package-info-text position-absolute bottom-0 pb-3">
                                            <div class="pacakge-name-info">{{ $servicepackage->servicepackages_name }}
                                            </div>
                                            <div class="pacakge-price-info">
                                                {{ get_siteinfo('currency_symbol') }}{{ $servicepackage->servicepackages_price }}
                                                <span>Per person</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

    </div>


    <!-- Hotels Logos Slider -->
    @include('frontend.layouts.hotelslogos')

    <!-- Welcome Text -->
    <div class="container custome-margin-top custome-margin-bottom">
        <div class="row">
            <div class="col-12 col-lg-6 order-2 order-lg-1">
                <div class="row">
                    <div class="col-12">
                        <img src="{{ url('frontend/assets/images/Image.jpg') }}" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <img src="{{ url('frontend/assets/images/Image 2.png') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-6">
                        <img src="{{ url('frontend/assets/images/Image 2.png') }}" class="img-fluid" alt="">

                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 about-section  order-1 order-lg-2">
                <!-- Title with Icon -->
                <div class="icon-heading mb-2 d-flex gap-lg-2 ">
                    <img src="{{ url('frontend/assets/images/ornament.svg') }}" class="img-fluid" alt="Ornament Icon">
                    <h2 class="about-title mb-0">About Us</h2>
                </div>

                <!-- Subtitle and Paragraph -->
                <div class="mb-4">
                    <h3 class="about-subtitle mt-2 mt-lg-4">Making Your Umrah & Hajj Experience Smooth</h3>
                    <p class="about-text-p mt-3 mt-lg-4">
                        From luxurious accommodations to expert guidance through sacred rituals, we're
                        dedicated to crafting unforgettable journeys that resonate with the essence of your faith.
                        Explore our offerings and embark on a pilgrimage that transcends expectations.
                    </p>
                </div>

                <!-- Feature: Expert Guidance -->
                <div class="about-feature d-flex gap-lg-2">
                    <div class="icon-heading mb-1">
                        <img src="{{ url('frontend/assets/images/tick.svg') }}" alt="Tick Icon " class=" img-fluid">
                    </div>
                    <div>
                        <h4 class="about-feature-title">Tailored Packages</h4>
                        <p class="about-text">
                            We offer customized packages to ensure your pilgrimage fits your personal preferences,
                            schedule, and budget.
                        </p>
                    </div>
                </div>

                <!-- Feature: Tailored Packages -->
                <div class="about-feature d-flex gap-lg-2">
                    <div class="icon-heading mb-1">
                        <img src="{{ url('frontend/assets/images/tick.svg') }}" alt="Tick Icon " class=" img-fluid">
                    </div>
                    <div>
                        <h4 class="about-feature-title">Tailored Packages</h4>
                        <p class="about-text">
                            We offer customized packages to ensure your pilgrimage fits your personal preferences,
                            schedule, and budget.
                        </p>
                    </div>
                </div>
            </div>



        </div>

    </div>


    <!-- Our Services Text -->
    <div class="container custome-margin-top custome-margin-bottom ">
        <div class="row gap-3 gap-lg-0">
            <div class="col-12 col-lg-6">
                <div class="icon-heading mb-2 d-flex gap-lg-2 ">
                    <img src="{{ url('frontend/assets/images/ornament.svg') }}" class="img-fluid" alt="Ornament Icon">
                    <h2 class="about-title mb-0">Our Services</h2>
                </div>
                <h2 class="mt-2 mt-lg-4 section-subtitle">Tailored to Elevate Your Spiritual Journey</h2>
                <p class="mt-3 mt-lg-5 section-text">From Luxurious accommodations to expert guidance through sacred
                    rituals,
                    we're dedicated to crafting unforgettable journeys that resonate with the essence of your faith. Explore
                    our
                    offerings and embark on a pilgrimage that transcends expectations.</p>
                <a href="" class="mt-3 mt-lg-4 section-link">Learn More &gt;</a>
            </div>

            <div class="col-12 col-lg-6">
                <img src="{{ url('frontend/assets/images/service.png') }}" class="img-fluid" alt="">

            </div>

        </div>

        <div class="d-flex gap-4 overflow-on-cards negitive-margin-top">
            <div class="box">
                <div class="box-text p-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0 our-hotel">Best Hotels</h4>
                        <img src="{{ url('frontend/assets/images/ornament.svg') }}" alt="Ornament">
                    </div>
                    <div class="mt-4 box-text-area">
                        <p>Experience world-class amenities, breathtaking views, and impeccable service, ensuring that your
                            stay
                            is
                            nothing short of extraordinary.</p>
                    </div>
                </div>
            </div>


            <div class="box">
                <div class="box-text p-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0 our-hotel">Best Hotels</h4>
                        <img src="{{ url('frontend/assets/images/ornament.svg') }}" alt="Ornament">
                    </div>
                    <div class="mt-4 box-text-area">
                        <p>Experience world-class amenities, breathtaking views, and impeccable service, ensuring that your
                            stay
                            is
                            nothing short of extraordinary.</p>
                    </div>
                </div>
            </div>




            <div class="box">
                <div class="box-text p-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0 our-hotel">Best Hotels</h4>
                        <img src="{{ url('frontend/assets/images/ornament.svg') }}" alt="Ornament">
                    </div>
                    <div class="mt-4 box-text-area">
                        <p>Experience world-class amenities, breathtaking views, and impeccable service, ensuring that your
                            stay
                            is
                            nothing short of extraordinary.</p>
                    </div>
                </div>
            </div>



            <div class="box">
                <div class="box-text p-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0 our-hotel">Best Hotels</h4>
                        <img src="{{ url('frontend/assets/images/ornament.svg') }}" alt="Ornament">
                    </div>
                    <div class="mt-4 box-text-area">
                        <p>Experience world-class amenities, breathtaking views, and impeccable service, ensuring that your
                            stay
                            is
                            nothing short of extraordinary.</p>
                    </div>
                </div>
            </div>


        </div>




    </div>

    <!-- Testimonials -->
    <div class="container custome-margin-top custome-margin-bottom">
        <div class="mb-5">
            <div class="icon-heading mb-2 d-flex gap-lg-2 ">
                <img src="{{ url('frontend/assets/images/ornament.svg') }}" class="img-fluid" alt="Ornament Icon">
                <h2 class="about-title mb-0">Testimonials</h2>
            </div>
            <div class="swiper-header position-relative d-flex align-items-center justify-content-between mb-4">
                <h3 class="mb-0 testimonials">Hear What Our Travelers Say with their spiritual journey</h3>
                <div class="swiper-buttons">
                    <button class="custom-prev"></button>
                    <button class="custom-next"></button>
                </div>

            </div>
        </div>

        <!-- Swiper container goes here -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <!-- Swiper slides -->
                @php
                    use App\Models\Testimonials;
                    $testimonials = Testimonials::where('status', 1)
                        ->orderBy('testimonials_sort', 'asc')
                        ->limit(10)
                        ->get();
                @endphp
                @if ($testimonials->count() > 0)
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($testimonials as $testimonial)
                        <div class="swiper-slide costome-slide">
                            <div class="px-lg-5  mt-5">
                                <div class="d-flex gap-4 align-items-start">
                                    <div>
                                        <img src="{{ url('frontend/assets/images/bluetooth.svg') }}"
                                            class="img-sm-md-fluid" alt="">
                                    </div>
                                    <div>
                                        <div class="d-flex gap-3 py-4">
                                            <div>
                                                <img src="{{ asset('uploads/testimonials/' . $testimonial->testimonials_image) }}"
                                                    class="img-sm-md-fluid" alt="">
                                            </div>
                                            <div>
                                                @for ($i = 1; $i <= $testimonial->testimonials_ratings; $i++)
                                                    <i class="fa fa-star"></i>
                                                @endfor
                                                <p class="mt-2 testimonials-p me-4">
                                                    {!! $testimonial->testimonials_details !!}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center gap-3 mt-4 mb-5">
                                            <img src="{{ url('frontend/assets/images/google-logo.png') }}"
                                                alt="">
                                            <div class="">
                                                <h2 class="mb-0 testimonials-heading">
                                                    {{ $testimonial->testimonials_name }}</h2>
                                                <p class="mb-0 testimonials-designation">
                                                    {{ $testimonial->testimonials_location }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <!-- Blogs -->
    <div class="container custome-margin-top mb-3 mb-lg-5 ">
        <div class="blogs py-5">
            <div class="container">
                <div class="mb-5">
                    <div class="icon-heading mb-2 d-flex gap-lg-2 ">
                        <img src="{{ url('frontend/assets/images/ornament.svg') }}" class="img-fluid"
                            alt="Ornament Icon">
                        <h2 class="about-title mb-0">Our Blogs</h2>
                    </div>
                    <div class="swiper-header position-relative d-flex align-items-center justify-content-between mb-4">
                        <h3 class="mb-0 about-p">Blogs & News For Your Spiritual Journey</h3>
                        <div class="swiper-buttons">
                            <button class="custom-prev2"></button>
                            <button class="custom-next2"></button>
                        </div>

                    </div>
                </div>

                <!-- <div class="row g-4 justify-content-center"> -->
                <!-- Blog Card 1 -->
                <div class="swiper mySwiper2">
                    <div class="swiper-wrapper">
                        @php
                            use App\Models\Blogs;
                            $blogsdetails = Blogs::where('blogs_status', 1)->orderBy('created_at', 'desc')->paginate(4);
                        @endphp
                        @foreach ($blogsdetails as $blogsdetail)
                            <div class="swiper-slide">
                                <div class="custom-card bg-white pb-2 m-2 h-100">
                                    <a href="{{ url('/blog/' . $blogsdetail->blogs_url) }}"><img
                                            src="{{ asset('uploads/blogs/' . $blogsdetail->blogs_image) }}"
                                            class="img-fluid rounded p-2" alt="{{ $blogsdetail->blogs_name }}"></a>
                                    <div class="mt-3 ms-3 ms-lg-4 me-3 me-lg-4">
                                        <h5 class="special-place"><a
                                                href="{{ url('/blog/' . $blogsdetail->blogs_url) }}">{{ $blogsdetail->blogs_name }}</a>
                                        </h5>
                                        <hr>
                                        <time datetime=""
                                            class="special-place-date mb-2">{{ $blogsdetail->blogs_date }}</time>
                                        <p class="special-place-p mt-4 mb-2">
                                            {!! strlen($blogsdetail->blogs_details) > 400
                                                ? substr(strip_tags($blogsdetail->blogs_details), 0, 400) . ''
                                                : $blogsdetail->blogs_details !!}
                                        </p>
                                        <hr>

                                        <div class="">
                                            <a href="{{ url('/blog/' . $blogsdetail->blogs_url) }}"
                                                class="details-btn mb-4 mt-4">Details</a>

                                        </div>
                                    </div>
                                    <!-- </div> -->
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <!-- Faqs -->
    <div class="bg-accordian overflow-hidden custome-margin-bottom">
        <div class="container custome-margin-top custome-margin-bottom">
            <div>
                <h2 class="accordion-heading">Everything You Need to Know About <br> Umrah and Payment</h2>
                <p class="accordion-para mt-3 mt-lg-4">Urna, massa aliqua dui pellentesque. Ac, gravida in. Diam vitae,
                    nec
                    mattis lectus quam pretium amet
                    facilisis.</p>
                <div class="row mt-4 mt-lg-5 ">

                    <div class="col-12 col-lg-6">
                        <div class="accordion" id="accordionLeft">
                            <div class="accordion-item mt-3 mt-lg-4">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        What is the difference between Hajj and Umrah?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionLeft">
                                    <div class="accordion-body">
                                        Hajj is a mandatory pilgrimage performed once a year during specific dates in
                                        the
                                        Islamic month of
                                        Dhu al-Hijjah, while Umrah is a voluntary pilgrimage that can be performed at
                                        any
                                        time of the
                                        year.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mt-3 mt-lg-4">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        What is the difference between Hajj and Umrah?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionLeft">
                                    <div class="accordion-body">
                                        Hajj is a mandatory pilgrimage performed once a year during specific dates in
                                        the
                                        Islamic month of
                                        Dhu al-Hijjah, while Umrah is a voluntary pilgrimage that can be performed at
                                        any
                                        time of the
                                        year.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mt-3 mt-lg-4">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        What is the difference between Hajj and Umrah?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionLeft">
                                    <div class="accordion-body">
                                        Hajj is a mandatory pilgrimage performed once a year during specific dates in
                                        the
                                        Islamic month of
                                        Dhu al-Hijjah, while Umrah is a voluntary pilgrimage that can be performed at
                                        any
                                        time of the
                                        year.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <div class="accordion" id="accordionRight">
                            <div class="accordion-item mt-3 mt-lg-4">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                        What is the difference between Hajj and Umrah?
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse "
                                    data-bs-parent="#accordionRight">
                                    <div class="accordion-body">
                                        Hajj is a mandatory pilgrimage performed once a year during specific dates in
                                        the
                                        Islamic month of
                                        Dhu al-Hijjah, while Umrah is a voluntary pilgrimage that can be performed at
                                        any
                                        time of the
                                        year.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mt-3 mt-lg-4">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                        What is the difference between Hajj and Umrah?
                                    </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionRight">
                                    <div class="accordion-body">
                                        Hajj is a mandatory pilgrimage performed once a year during specific dates in
                                        the
                                        Islamic month of
                                        Dhu al-Hijjah, while Umrah is a voluntary pilgrimage that can be performed at
                                        any
                                        time of the
                                        year.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mt-3 mt-lg-4">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                                        What is the difference between Hajj and Umrah?
                                    </button>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionRight">
                                    <div class="accordion-body">
                                        Hajj is a mandatory pilgrimage performed once a year during specific dates in
                                        the
                                        Islamic month of
                                        Dhu al-Hijjah, while Umrah is a voluntary pilgrimage that can be performed at
                                        any
                                        time of the
                                        year.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Custom Enquiry Form -->
    @include('frontend.layouts.customform')

    <!-- Air Lines Logos Slider -->
    @include('frontend.layouts.airlineslogos')

@endsection
