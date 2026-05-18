    @php
        use App\Models\Services;
        use App\Models\Servicepackages;
    @endphp
    @php
        $related_services = Services::where('services_status', 1)
            ->where('show_in_related', 1)
            ->orderBy('services_sort', 'asc')
            ->get();
    @endphp
    @if ($related_services->count() > 0)
        <div class="container mx-auto px-4 sm:px-6 2xl:px-20 mt-5 md:mt-10 lg:mt-16 xl:mt-20">
            <h2 class="popular_umrah">Browse Popular Months for <br /> best Umrah Packages</h2>

            <div class="mt-5 md:mt-10 lg:mt-20 mb-5 md:mb-10 lg:mb-20">

                <div class="relative mb-5">

                    <div class="flex gap-16 overflow-x-auto scroll-none" id="scroll-container4">
                        @foreach ($related_services as $related_service)
                            <div
                                class="relative group w-full max-w-xs sm:max-w-sm md:max-w-md rounded-[20px] overflow-hidden shrink-0">
                                <img src="{{ asset('uploads/services/' . $related_service->services_image2) }}"
                                    class="h-auto w-full object-cover" alt="{{ $related_service->services_name }}">

                                <!-- Dark overlay -->
                                <div
                                    class="absolute inset-0 bg-blue-overlay z-10 transition-opacity duration-300 group-hover:opacity-0">
                                </div>

                                <!-- Text on hover -->
                                <div
                                    class="absolute inset-0 z-20 p-5 flex flex-col justify-end transition-all duration-300 group-hover:translate-y-[-10px]">
                                    <h2 class="text-white text-lg font-medium">{{ $related_service->services_name }}
                                    </h2>
                                    @php
                                        $servicepackages_first = Servicepackages::where('servicepackages_status', 1)
                                            ->where('services_id', $related_service->services_id)
                                            ->where('destinations_id', null)
                                            ->orderBy('servicepackages_price', 'asc')
                                            ->first();
                                    @endphp
                                    <div class="flex justify-between items-center mt-2 hidden group-hover:flex">
                                        <p class="cost_start">From <span class="cost_start_span">
                                                @if ($servicepackages_first)
                                                    {{ get_siteinfo('currency_symbol') }}{{ $servicepackages_first->servicepackages_price }}
                                                @endif
                                            </span></p>
                                        <a href="{{ url('/' . $related_service->services_url) }}"
                                            class="px-4 py-1 rounded-full border border-[#D4B357] text-[#D4B357] font-['Poppins'] text-sm hover:bg-[#D4B357] hover:text-white transition-colors duration-300">Learn
                                            More</a>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>


                    <div class="circle lg:mt-5 absolute right-0 z-10" onclick="scrollRight4()">
                        <img src="{{ asset('frontend/assets/images/left-arrow.svg') }}" class="img-2 rotate-180"
                            alt="">
                    </div>
                    <div class="circle lg:mt-5 absolute right-10 lg:right-20 z-10" onclick="scrollleft4()">
                        <img src="{{ asset('frontend/assets/images/right-arrow.svg') }}" class="img-2 rotate-180"
                            alt="">
                    </div>

                </div>
            </div>

        </div>
    @endif
