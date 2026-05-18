<div class="bg-[#F3FDFF]">

    <div class="container mx-auto px-4 sm:px-6 2xl:px-20 pb-10 lg:pb-16 lg:pb-20 overflow-hidden">
        <div class="mt-5 md:mt-10 lg:mt-20 mb-5 md:mb-10 lg:mb-20">
            <h2 class="affordable-price">Related Umrah Packages</h2>
            <div class="relative mb-5">

                
                <div id="scroll-container"
                    class="mt-5 sm:mt-8 md:mt-10 lg:mt-16 mb-4 flex gap-5 scroll-none overflow-x-auto">
            @php
                $favorites = json_decode(Cookie::get('favorites', '[]'), true);
                //$compares  = json_decode(Cookie::get('compares', '[]'), true);
                use App\Models\Services;
                use App\Models\Servicepackages;
                use App\Models\Hotelinfos;

                $service = Services::where('services_id', $servicepackage->services_id)->first();

                $related_servicepackages = Servicepackages::where('servicepackages_status', 1)
                    ->where('services_id', $service->services_id)
                    ->where('destinations_id', null)
                    ->where('servicepackages_id', '!=', $servicepackage->servicepackages_id)
                    ->when(session('roomtype'), function ($query, $roomtype) {
                        return $query->where('servicepackages_startype', $roomtype);
                    })
                    ->when(session('packagenights'), function ($query, $packagenights) {
                        return $query->where('servicepackages_totalnights', session('packagenights'));
                    })
                    ->orderBy('servicepackages_sort', 'asc')
                    ->paginate(3); // Initial load

            @endphp
            @if ($related_servicepackages->count() > 0)
                @foreach ($related_servicepackages as $related_servicepackage)
                                    <div class="card-width">
                                        <div class="relative">
                                            <a href="{{ url('/package/' . $related_servicepackage->servicepackages_url) }}">
                                                <img class="rounded-tl-[50px] rounded-tr-[50px] w-full"
                                                    src="{{ asset('uploads/servicepackages/' . $related_servicepackage->servicepackages_image) }}"
                                                    alt="{{ $related_servicepackage->servicepackages_name }}" />
                                            </a>
                                            @if ($related_servicepackage->custom_label != '')
                                                <div
                                                    class="absolute top-5 lg:left-2  lg:px-3 py-1 rounded-full text-sm shadow">
                                                    <p class="deposit-only">{{ $related_servicepackage->custom_label }}</p>
                                                </div>
                                            @endif
                                            <div class="absolute bottom-5 left-2  px-3 py-1 rounded-full text-sm shadow">
                                                <p class="time-duaration">
                                                    {{ $related_servicepackage->servicepackages_totalnights }} Nights .
                                                    {{ $related_servicepackage->servicepackages_startype }} Star</p>
                                            </div>
                                        </div>

                                        <div class="p-5 card-body">
                                            <div class="flex justify-between">
                                                <h5 class="mb-2 card-h packagename">
                                                    <a
                                                        href="{{ url('/package/' . $related_servicepackage->servicepackages_url) }}">
                                                        {{ $related_servicepackage->servicepackages_name }}
                                                    </a>
                                                </h5>
                                                <div class="rating-star space-x-0 text-base lg:text-xl">
                                                    @for ($i = 1; $i <= $related_servicepackage->servicepackages_startype; $i++)
                                                        <i class="fa fa-star"></i>
                                                    @endfor
                                                </div>
                                            </div>
                                            <p class="mb-3 destination">Makkah
                                                {{ $related_servicepackage->servicepackages_makkahnights }}N Madinah
                                                {{ $related_servicepackage->servicepackages_madinahnights }}N</p>

                                            <div class="flex gap-3 sm:gap-4 md:gap-5 lg:gap-8 mt-5 mb-3">
                                                @if ($related_servicepackage->visa_info == 'Included')
                                                    <div class="flex items-center gap-1 sm:gap-2 service">
                                                        <img src="{{ asset('frontend/assets/images/visa.svg') }}"
                                                            class="h-4 w-6 lg:h-6 object-contain" alt="">
                                                        <p>Visa</p>
                                                    </div>
                                                @endif

                                                @if ($related_servicepackage->flight_info == 'Included')
                                                    <div class="flex items-center gap-1 sm:gap-2 service">
                                                        <img src="{{ asset('frontend/assets/images/flights.svg') }}"
                                                            class="h-4 w-6 lg:h-6 object-contain" alt="">
                                                        <p>Flights</p>
                                                    </div>
                                                @endif

                                                @if ($related_servicepackage->makkah_hotelinfos_id != 'Not Included' || $related_servicepackage->madinah_hotelinfos_id != 'Not Included')
                                                    <div class="flex items-center gap-1 sm:gap-2 service">
                                                        <img src="{{ asset('frontend/assets/images/hotel.svg') }}"
                                                            class="h-4 w-6 lg:h-6 object-contain" alt="">
                                                        <p>Hotels</p>
                                                    </div>
                                                @endif
                                                @if (
                                                    $related_servicepackage->makkah_hotel_meal_info != 'Not Included' ||
                                                        $related_servicepackage->madinah_hotel_meal_info != 'Not Included')
                                                    <div class="flex items-center gap-1 sm:gap-2 service">
                                                        <img src="{{ asset('frontend/assets/images/food.svg') }}"
                                                            class="h-4 w-6 lg:h-6 object-contain" alt="">
                                                        <p>Food</p>
                                                    </div>
                                                @endif
                                            </div>

                                            @if ($related_servicepackage->transport_info != 'Not Included')
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
                                                        {{ $related_servicepackage->servicepackages_price }}</h3>
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
                                                        <a href="{{ url('/package/' . $related_servicepackage->servicepackages_url) }}"
                                                            class="view-details">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                @endforeach
            @endif
                </div>

                <div class="circle lg:mt-5 absolute right-0 z-10" onclick="scrollRight4()">
                    <img src="{{ asset('frontend/assets/images/left-arrow.svg') }}" class="img-2 rotate-180" alt="">
                </div>
                <div class="circle lg:mt-5 absolute right-10 lg:right-20 z-10" onclick="scrollleft4()">
                    <img src="{{ asset('frontend/assets/images/right-arrow.svg') }}" class="img-2 rotate-180" alt="">
                </div>

            </div>
        </div>
    </div>
</div>
