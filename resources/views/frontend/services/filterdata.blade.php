@php
    $favorites = json_decode(Cookie::get('favorites', '[]'), true);
    //$compares  = json_decode(Cookie::get('compares', '[]'), true);
    use App\Models\Services;
    use App\Models\Servicepackages;
    use App\Models\Hotelinfos;
@endphp
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
