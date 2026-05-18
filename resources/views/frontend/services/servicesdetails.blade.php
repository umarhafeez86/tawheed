@extends('frontend.layouts.inner')
@php
    use App\Models\Services;
    use App\Models\Servicepackages;
    use App\Models\Hotelinfos;
@endphp
@section('main-container')
    <div class="bg-[#F3FDFF] h-[100px] md:h-[150px] lg:h-[200px]">
        <div class="container mx-auto px-4 sm:px-6 2xl:px-20 ">
            <div class="bg-about w-full max-w-[1542px] mx-auto absolute top-10 left-0 right-0 mx-auto width-on-small">
                <div class="px-4 sm:px-6 2xl:px-20">
                    <div class=" bg-heading">
                        <div class="p-4 md:p-6 lg:p-8 flex justify-between">
                            <h2 class="tawheed_travels px-5 flex justify-center items-center">{{ $page_name }}</h2>
                            <div>
                                <button id="dropdownDefaultButton2" data-dropdown-toggle="dropdown2"
                                    class=" px-5 py-2.5 text-center inline-flex items-center justify-start text-sky-900 text-[0px] md:text-sm md:text-base lg:text-lg font-normal font-['Poppins'] "
                                    type="button">Change Month<svg class="w-2.5 h-2.5 ms-3 " aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>
                                <!-- Dropdown menu -->
                                <div id="dropdown2"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="dropdownDefaultButton">
                                                <li><a href="{{ url('/umrah-packages') }}"
                                                        class="block px-4 py-2 hover:bg-gray-100 justify-start text-black hover:text-sky-900 text-base font-medium font-['Poppins'] leading-relaxed">
                                                        Umrah Packages</a>
                                                </li>
                                        @php
                                            $servicedetails = Services::where('services_status', 1)
                                                ->orderBy('services_sort', 'asc')
                                                ->get();
                                        @endphp
                                        @if ($servicedetails->count() > 0)
                                            @foreach ($servicedetails as $servicedetail)
                                                <li><a href="{{ url('/' . $servicedetail->services_url) }}"
                                                        class="block px-4 py-2 hover:bg-gray-100 justify-start text-black hover:text-sky-900 text-base font-medium font-['Poppins'] leading-relaxed">
                                                        {{ $servicedetail->services_name }}</a>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="clearfix"></div>
    <div class="col-span-12 w-full relative">
        <div class="col-span-12 w-full float-left px-4 sm:px-6 2xl:px-20 flex justify-center pt-5">
            <div class="bg-contact flex gap-3 md:gap-5 lg:gap-10" id="desktopmenufixed">
                <div class="flex items-center gap-2">
                    <a href="tel:{{ get_siteinfo('setting_phone') }}" class="flex gap-3">
                        <img src="{{ asset('frontend/assets/images/phone-icon.svg') }}" alt="">
                        <p class="call-us text-[14px] sm:text-[16px] md:text-[18px]">{{ get_siteinfo('setting_phone') }}</p>
                    </a>
                </div>
                <!-- Correct vertical line -->
                <div class="line-breaker"></div>
                <div class="flex items-center gap-2 ">
                    <a href="{{ url('/information/contact-us') }}" class="flex gap-3">
                        <img src="{{ asset('frontend/assets/images/mail-icon.svg') }}" alt="">
                        <p class="contact-us text-[14px] sm:text-[16px] md:text-[18px]">Contact Us</p>
                    </a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    
    <div class="bg-[#F3FDFF]">
        <div class="container mx-auto px-4 sm:px-6 2xl:px-20 overflow-hidden">
            <div class="mt-5 md:mt-10 lg:mt-20 mb-5 md:mb-10 lg:mb-20 gap-5 lg:gap-10">

                <div class="flex justify-between">
                    <p class="packages_showing flex justify-center items-center">Showing {{ $servicedetails->count() }}
                        Packages</p>
                    <button id="openFilter" class="flex items-center gap-2 filter_btn">
                        <img src="{{ asset('frontend/assets/images/filter.svg') }}" alt=""> Filter
                    </button>
                    <div id="filterSidebar"
                        class="fixed top-0 right-0 h-full w-80 max-w-full bg-white p-6 shadow-lg z-50 transform translate-x-full transition-transform duration-300 ease-in-out" style="z-index:444444;">

                        @php
                            $price_ranges = explode(',', get_siteinfo('price_range'));
                            $priceminval = reset($price_ranges);
                            $pricemaxval = end($price_ranges);
                            $pricemidval = array_slice($price_ranges, -3, 1)[0];
                        @endphp

                        <form id="filterForm" method="POST">
                            @csrf <!-- CSRF token is required in Laravel -->

                            @if (isset($services->services_id))
                                <input type="hidden" name="services_id" id="services_id" value="{{ $services->services_id }}">
                            @else
                                <input type="hidden" name="services_id" id="services_id" value="">
                            @endif

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

                            <div class="flex justify-between items-center mb-6">
                                <h2 class="text-xl font-semibold font-['Poppins']">Apply Filters</h2>
                                <button type="button" id="closeFilter" class="text-xl">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>

                            <div>
                                <h3 class="font-semibold mb-2 font-['Poppins']">Accommodation</h3>
                                <ul class="space-y-3">
                                    @php
                                        $roomtype = '';
                                    @endphp
                                    <li><input type="radio" class="mr-2" name="roomtype" id="roomtype0" value=""
                                            @if ($roomtype == '') checked @endif> <label for="roomtype0"> All
                                        </label>
                                    </li>
                                    @php
                                        $filter_stars = explode(',', get_siteinfo('filter_star_values'));
                                    @endphp
                                    @foreach ($filter_stars as $filter_star)
                                        <li><input type="radio" class="mr-2" name="roomtype"
                                                id="roomtype{{ $filter_star }}" value="{{ $filter_star }}"
                                                @if ($roomtype == $filter_star) checked @endif> <label
                                                for="roomtype{{ $filter_star }}">{{ $filter_star }} Star
                                                @for ($i = 1; $i <= $filter_star; $i++)
                                                    <i class="fas fa-star text-[#FFA100]"></i>
                                                @endfor
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="mt-6">
                                <h3 class="font-semibold mb-2 font-['Poppins']">Total Nights</h3>
                                @php
                                    $packagenights = '';
                                @endphp
                                <ul class="space-y-3">
                                    <li><input type="radio" class="mr-2" name="packagenights" id="packagenights0"
                                            value="" @if ($packagenights == '') checked @endif> <label
                                            for="packagenights0"> All
                                        </label>
                                    </li>
                                    @php
                                        $filter_nights = explode(',', get_siteinfo('filter_nights_values'));
                                    @endphp
                                    @foreach ($filter_nights as $filter_night)
                                        <li><input type="radio" class="mr-2" name="packagenights"
                                                id="packagenights{{ $filter_night }}" value="{{ $filter_night }}"
                                                @if ($packagenights == $filter_night) checked @endif> <label
                                                for="packagenights{{ $filter_night }}">{{ $filter_night }} Nights or
                                                Above</label></li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="mt-6 flex justify-between items-center">
                                <!--button onclick="clearfilters();" style="cursor: pointer;"
                                    class="text-gray-400 text-sm">Clear</button-->
                                    <a href="{{ url('/umrah-packages') }}"
                                    class="text-gray-400 text-sm">Clear</a>
                                <button type="button"
                                    class="bg-[#005B68] font-['Poppins'] hover:bg-teal-800 text-base text-white font-semibold px-5 py-3 rounded-full"
                                    onclick="submitfiltershome();">Show
                                    Results</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div id="packagefiltershome">
                        @if ($servicepackages->count() > 0)
                            @foreach ($servicepackages as $servicepackage)
                                <div class="">
                                    <div
                                        class="card-width-new w-full max-w-full bg-[#FFF] rounded-[50px] mt-4 sm:mt-5 md:mt-8 lg:mt-10 grid grid-cols-12">
                                        <div class="col-span-12 lg:col-span-3">
                                            <a href="{{ url('/package/' . $servicepackage->servicepackages_url) }}">
                                            <img src="{{ asset('uploads/servicepackages/' . $servicepackage->servicepackages_image) }}"
                                                class="rounded-[50px] w-full" alt="{{ $servicepackage->servicepackages_name }}">
                                            </a>
                                        </div>
                                        <div class="col-span-12 sm:col-span-6 md:col-span-6 lg:col-span-6 xl:col-span-6 pl-5 pr-5 pt-5 2xl:p-8 hidden md:block">
                                            <p class="mb-3 month_umrah_pkg">
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
                                            </p>
                                            <a href="{{ url('/package/' . $servicepackage->servicepackages_url) }}">
                                                <h5 class="mb-3 lg:mb-6 card-h">
                                                    {{ $servicepackage->servicepackages_name }}</h5>
                                            </a>
                                            <p class="mb-4 destination"><span class="destination_route">Makkah</span>
                                                {{ $servicepackage->servicepackages_makkahnights }}
                                                Nights .
                                                @php
                                                    $makkah_hotel_info = Hotelinfos::where(
                                                        'hotelinfos_id',
                                                        $servicepackage->makkah_hotelinfos_id,
                                                    )->first();
                                                    $madinah_hotel_info = Hotelinfos::where(
                                                        'hotelinfos_id',
                                                        $servicepackage->madinah_hotelinfos_id,
                                                    )->first();
                                                @endphp
                                                @if ($makkah_hotel_info)
                                                    {{ $makkah_hotel_info->hotelinfos_name }}
                                                @endif
                                            </p>
                                            <p class="mb-5 destination"><span class="destination_route">Madinah </span>
                                                {{ $servicepackage->servicepackages_madinahnights }}
                                                Nights
                                                .
                                                @if ($madinah_hotel_info)
                                                    {{ $madinah_hotel_info->hotelinfos_name }}
                                                @endif
                                            </p>

                                            <div class="flex gap-3 sm:gap-4 md:gap-5 lg:gap-8 mt-8 mb-3">
                                                @if ($servicepackage->visa_info == 'Included')
                                                    <div class="flex items-center gap-1 sm:gap-2 service">
                                                        <img src="{{ asset('frontend/assets/images/visa.svg') }}"
                                                            class="h-4 w-6 lg:h-6 object-contain" alt="">
                                                        <p>Visa</p>
                                                    </div>
                                                @endif

                                                @if ($servicepackage->flight_info == 'Included')
                                                    <div class="flex items-center gap-1 sm:gap-2 service">
                                                        <img src="{{ asset('frontend/assets/images/flights.svg') }}"
                                                            class="h-4 w-6 lg:h-6 object-contain" alt="">
                                                        <p>Flights</p>
                                                    </div>
                                                @endif

                                                @if ($servicepackage->makkah_hotelinfos_id != 'Not Included' || $servicepackage->madinah_hotelinfos_id != 'Not Included')
                                                    <div class="flex items-center gap-1 sm:gap-2 service">
                                                        <img src="{{ asset('frontend/assets/images/hotel.svg') }}"
                                                            class="h-4 w-6 lg:h-6 object-contain" alt="">
                                                        <p>Hotels</p>
                                                    </div>
                                                @endif

                                                @if (
                                                    $servicepackage->makkah_hotel_meal_info != 'Not Included' ||
                                                        $servicepackage->madinah_hotel_meal_info != 'Not Included')
                                                    <div class="flex items-center gap-1 sm:gap-2 service">
                                                        <img src="{{ asset('frontend/assets/images/food.svg') }}"
                                                            class="h-4 w-6 lg:h-6 object-contain" alt="">
                                                        <p>Food</p>
                                                    </div>
                                                @endif
                                            </div>

                                            @if ($servicepackage->transport_info != 'Not Included')
                                                <div class="flex gap-2 service gap-1 sm:gap-2 items-center hide_on_large">
                                                    <img src="{{ asset('frontend/assets/images/transportation.svg') }}"
                                                        class="h-4 w-6 lg:h-6 object-contain" alt="">
                                                    <p>Transportation</p>
                                                </div>
                                            @endif

                                        </div>
                                        <div class="col-span-12 sm:col-span-3 md:col-span-3 lg:col-span-3 pl-5 pr-5 pt-5 2xl:p-8 hidden md:block">
                                            <div class="flex justify-between items-start h-auto relative">
                                                <!-- Vertical line -->
                                                <div class="card_breaker h-auto w-[1px] bg-[#005B68]/30"></div>

                                                <!-- Star + price -->
                                                <div class="flex flex-col items-end gap-2 pl-4">
                                                    <!-- Star rating -->
                                                    <div class="flex items-center gap-2 ">
                                                        <span class="total_star">{{ $servicepackage->servicepackages_startype }}
                                                            Star</span>
                                                        <div class="rating-star">
                                                            @for ($i = 1; $i <= $servicepackage->servicepackages_startype; $i++)
                                                                <i class="fa fa-star"></i>
                                                            @endfor
                                                        </div>
                                                    </div>

                                                    <div class="mt-5 xl:mt-5">
                                                        <!-- Price -->
                                                        <p class="price">{{ get_siteinfo('currency_symbol') }}
                                                            {{ $servicepackage->servicepackages_price }} <span
                                                                class="price_span">per person</span></p>
                                                        <p class="terms_condition mt-1">Terms and Conditions Applied * </p>
                                                        <div class="flex gap-3 justify-center mt-5">
                                                            <div class="circle2 rotate-180">
                                                                <a href="tel:{{ get_siteinfo('setting_phone') }}">
                                                                    <img src="{{ asset('frontend/assets/images/call-icon.svg') }}"
                                                                        class="h-4 lg:h-auto max-w-full rotate-180"
                                                                        alt="">
                                                                </a>
                                                            </div>
                                                            <div>
                                                                <a href="{{ url('/package/' . $servicepackage->servicepackages_url) }}"
                                                                    class="view-details_btn">View More</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                            <!-- Mobile View -->
                                            <div class="p-5 col-span-12 card-body md:hidden">
                                                <div class="flex justify-between">
                                                    <h5 class="mb-2 card-h packagename">
                                                        <a
                                                            href="{{ url('/package/' . $servicepackage->servicepackages_url) }}">
                                                            {{ $servicepackage->servicepackages_name }}
                                                        </a>
                                                    </h5>
                                                    <div class="rating-star space-x-0 text-base lg:text-xl">
                                                        @for ($i = 1; $i <= $servicepackage->servicepackages_startype; $i++)
                                                            <i class="fa fa-star"></i>
                                                        @endfor
                                                    </div>
                                                </div>
                                                <p class="mb-3 destination">Makkah
                                                    {{ $servicepackage->servicepackages_makkahnights }}N Madinah
                                                    {{ $servicepackage->servicepackages_madinahnights }}N</p>

                                                <div class="flex gap-3 sm:gap-4 md:gap-5 lg:gap-8 mt-5 mb-3">
                                                    @if ($servicepackage->visa_info == 'Included')
                                                        <div class="flex items-center gap-1 sm:gap-2 service">
                                                            <img src="{{ asset('frontend/assets/images/visa.svg') }}"
                                                                class="h-4 w-6 lg:h-6 object-contain" alt="">
                                                            <p>Visa</p>
                                                        </div>
                                                    @endif

                                                    @if ($servicepackage->flight_info == 'Included')
                                                        <div class="flex items-center gap-1 sm:gap-2 service">
                                                            <img src="{{ asset('frontend/assets/images/flights.svg') }}"
                                                                class="h-4 w-6 lg:h-6 object-contain" alt="">
                                                            <p>Flights</p>
                                                        </div>
                                                    @endif

                                                    @if ($servicepackage->makkah_hotelinfos_id != 'Not Included' || $servicepackage->madinah_hotelinfos_id != 'Not Included')
                                                        <div class="flex items-center gap-1 sm:gap-2 service">
                                                            <img src="{{ asset('frontend/assets/images/hotel.svg') }}"
                                                                class="h-4 w-6 lg:h-6 object-contain" alt="">
                                                            <p>Hotels</p>
                                                        </div>
                                                    @endif
                                                    @if (
                                                        $servicepackage->makkah_hotel_meal_info != 'Not Included' ||
                                                            $servicepackage->madinah_hotel_meal_info != 'Not Included')
                                                        <div class="flex items-center gap-1 sm:gap-2 service">
                                                            <img src="{{ asset('frontend/assets/images/food.svg') }}"
                                                                class="h-4 w-6 lg:h-6 object-contain" alt="">
                                                            <p>Food</p>
                                                        </div>
                                                    @endif
                                                </div>

                                                @if ($servicepackage->transport_info != 'Not Included')
                                                    <div class="flex gap-2 service gap-1 sm:gap-2 items-center mb-8">
                                                        <img src="{{ asset('frontend/assets/images/transportation.svg') }}"
                                                            class="h-4 w-6 lg:h-6 object-contain" alt="">
                                                        <p>Transportation</p>
                                                    </div>
                                                @endif

                                                <div class="card-breaker mb-8"></div>

                                                <div class="flex justify-between mb-3">
                                                    <div class="prices">
                                                        <h3>{{ get_siteinfo('currency_symbol') }}
                                                            {{ $servicepackage->servicepackages_price }}</h3>
                                                        <p>per person</p>
                                                    </div>

                                                    <div class="flex gap-3 justify-center">
                                                        <div class="circle2 rotate-180">
                                                            <a href="tel:{{ get_siteinfo('setting_phone') }}">
                                                                <img src="{{ asset('frontend/assets/images/call-icon.svg') }}"
                                                                    class="h-4 lg:h-auto max-w-full rotate-180"
                                                                    alt="">
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a href="{{ url('/package/' . $servicepackage->servicepackages_url) }}"
                                                                class="view-details">View More</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Mobile View -->

                                    </div>
                                </div>
                            @endforeach
                        @endif
                </div>

        @if ($servicepackages->count() > 0)
            <div class="block text-center mt-[45px] mb-[45px]">
                <button id="load-more" data-page="2" class="load-more-btn pointer">Load more</button>
            </div>
        @endif

            </div>
        </div>
        @include('frontend.layouts.relatedservices')
    </div>
@endsection
