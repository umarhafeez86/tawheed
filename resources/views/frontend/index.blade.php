@extends('frontend.layouts.main')
@section('main-container')
    @php
        use App\Models\Services;
        use App\Models\Servicepackages;
    @endphp
    <div class="px-2 md:px-5 lg:px-8 mt-10 mb-5 lg:mb-20 overflow-x-hidden">
        <div class="bg-nav overflow-x-hidden">
            <div
                class="pl-2 md:pl-5 lg:pl-[30px] pr-2 md:pr-5 lg:pr-[30px] pt-2 md:pt-5 lg:pt-[30px] xl:pt-[50px] pb-5 md:pb-5 lg:pb-[30px] xl:pb-[50px] overflow-x-hidden ">
                <div class="bg-border">
                    <div
                        class="mt-8 md:mt-[30px] lg:mt-[70px] xl:mt-[100px] mb-20 md:mb-[130px] lg:mb-[170px] xl:mb-[200px] grid grid-cols-12 ">
                        <div class="col-span-3"></div>
                        <div class=" col-span-12 xl:col-span-5">
                            <h1 class="our-patner">Your Trusted Partner for a Hassle-Free <span
                                    class="our-patner-span">Umrah</span> Journey</h1>
                            <p
                                class="ml-5 md:ml-[30px] lg:ml-[50px] mr-5 md:mr-[30px] lg:mr-[50px] mb-5 md:mb-[30px] lg:mb-[50px] mt-5 our-patner-p">
                                Book your Umrah with confidence.
                                Handpicked packages, smooth travel, and personalized support — all in one place.</p>
                        </div>
                        <div class="col-span-4 "></div>
                    </div>
                </div>
                <div class="container mx-auto ">
                    <div class="ml-2 mr-2  bg-form overflow-x-hidden">

            <form id="fastquote" name="fastquote" method="post" enctype="multipart/form-data">
                    @csrf
                        
                        <div class="form-row-msg text-center" id="fastquote_msg"></div>
                        
                        <input type="hidden" name="packagetype" id="packagetype" value="umrah">
                        <div
                                    class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-7 mt-5 md:mt-[20px] lg:mt-[30px] ml-5 md:ml-[30px] lg:ml-[50px] mr-5 md:mr[30px] lg:mr-[50px] mb-5 md:mb-[20px] lg:mb-[30px] gap-5 lg:gap-5">
                                    <div>
                                        <label class="custome-label">Travel Month</label>
                                        <label for="travelmonth" class="sr-only">Underline select</label>
                                        <select id="travelmonth" name="travelmonth"
                                            class="block py-2.5 px-0 w-full text-lg font-semibold text-[#c2c2c2] bg-transparent border-0 border-b-2 border-gray-200 appearance-none focus:outline-none focus:ring-0 focus:border-gray-200 peer">
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
                                    <div>
                                        <label class="custome-label">No. Of Days</label>
                                        <label for="nightsinfo" class="sr-only">Underline select</label>
                                        <select id="nightsinfo" name="nightsinfo"
                                            class="block py-2.5 px-0 w-full text-lg font-semibold text-[#c2c2c2] bg-transparent border-0 border-b-2 border-gray-200 appearance-none focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                            <option selected>Choose an option</option>
                                            <option value="7">7</option>
                                            <option value="10">10</option>
                                            <option value="12">12</option>
                                            <option value="14">14</option>
                                            <option value="21">21</option>
                                            <option value="Others">Othes</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="custome-label">No. of Guests</label>
                                        <label for="passginfo" class="sr-only">Underline select</label>
                                        <select id="passginfo" name="passginfo"
                                            class="block py-2.5 px-0 w-full text-lg font-semibold text-[#c2c2c2] bg-transparent border-0 border-b-2 border-gray-200 appearance-none focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                            <option selected disabled>Choose an option</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10+">10+</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label class="custome-label">Person Name</label>
                                        <label for="personname" class="sr-only">Underline select</label>
                                        <input id="personname" name="personname"
                                            class="block py-2.5 px-0 w-full text-lg font-semibold text-[#c2c2c2] bg-transparent border-0 border-b-2 border-gray-200 appearance-none focus:outline-none focus:ring-0 focus:border-gray-200 peer" />
                                    </div>
                                    <div>
                                        <label class="custome-label">Phone No.</label>
                                        <label for="phoneno" class="sr-only">Underline select</label>
                                        <input id="phoneno" name="phoneno"
                                            class="block py-2.5 px-0 w-full text-lg font-semibold text-[#c2c2c2] bg-transparent border-0 border-b-2 border-gray-200 appearance-none focus:outline-none focus:ring-0 focus:border-gray-200 peer" />
                                    </div>
                                    <div>
                                        <label class="custome-label">Email</label>
                                        <label for="txtemail" class="sr-only">Underline select</label>
                                        <input id="txtemail" name="txtemail"
                                            class="block py-2.5 px-0 w-full text-lg font-semibold text-[#c2c2c2] bg-transparent border-0 border-b-2 border-gray-200 appearance-none focus:outline-none focus:ring-0 focus:border-gray-200 peer" />
                                    </div>

                                    <div>
                                        <button type="button" onclick="submitfastquote();" class="search-packages pt-5 pb-5 pl-5 pr-5 rounded-[10px] pointer">Submit</button>
										<input type="hidden" name="gclid" id="gclid" value="">
                                		<input type="hidden" name="page_url" id="page_url" value="{{ url()->current() }}">
                                    </div>
                                </div>
            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-span-12 relative">
        <div class="col-span-12 w-full float-left px-4 sm:px-6 2xl:px-20 flex justify-center">
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

        <div class="bg-[#F3FDFF]">
            <div class="container mx-auto px-4 sm:px-6 2xl:px-20 overflow-x-hidden">
                <div class="mt-5 md:mt-10 lg:mt-20 mb-5 md:mb-10 lg:mb-20 grid grid-cols-12 gap-5 lg:gap-10">
                    <div class="col-span-12 lg:col-span-5 order-2 lg:order-1 flex justify-center">
                        <img src="{{ asset('frontend/assets/images/experiance.jpg') }}" alt="">
                    </div>
                    <div class=" col-span-12 lg:col-span-7 order-1 lg:order-2">
                        <h2 class="our-experiance">{{ $page_name }}</h2>
                        <p class="our-experiance-p mt-3">{!! $pages_details !!}</p>
                        <div class="flex justify-between mt-5 md:mt-10 lg:mt-20">
                            <div class="line-breaker2 d-none"></div>
                            <div class="review">
                                <h2>10+</h2>
                                <p>Experience Guide</p>
                            </div>
                            <div class="line-breaker2"> </div>
                            <div class="review">
                                <h2>289k+</h2>
                                <p>Satisfied Pilgrims</p>
                            </div>
                            <div class="line-breaker2"> </div>
                            <div class="review d-block">
                                <h2>4.8+</h2>
                                <p>Clients Ratings</p>
                            </div>
                            <div class="line-breaker2 d-block"> </div>
                        </div>
                        <div class="d-none mt-5 ">
                            <div class="line-breaker2"> </div>
                            <div class="review">
                                <h2>4.8+</h2>
                                <p>Clients Ratings</p>
                            </div>
                            <div class="line-breaker2"> </div>
                        </div>
                        <div class="flex justify-between items-center mt-5 md:mt-10 lg:mt-20 gap-4 mr-5">
                            <img src="{{ asset('frontend/assets/images/certificates.png') }}"
                                class="h-6 md:h-8 lg:h-16 max-w-full" alt="">
                            <img src="{{ asset('frontend/assets/images/trustpilot-logo.png') }}"
                                class="h-8 md:h-10 lg:h-20 max-w-full" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-[#005B68]">

            <div
                class="container mx-auto px-4 sm:px-6 2xl:px-20 pb-10 lg:pb-16 lg:pb-20 mt-6 sm:mt-8 md:mt-12 lg:mt-20 overflow-x-hidden">
                <div class="grid grid-cols-12">
                    <div class=" col-span-12 lg:col-span-4 flex justify-start items-center">
                        <h2 class="perfect_umrah_heading mb-3">Find the Perfect Month for Umrah</h2>
                    </div>
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
                                class="relative group max-w-full overflow-x-hidden shrink-0 col-span-12 md:col-span-6 lg:col-span-4 shortbanners">
                                <a href="{{ $banner->banners_link }}">
                                    <img src="{{ asset('uploads/banners/' . $banner->banners_image) }}"
                                        class="h-auto w-full object-cover" alt="{{ $banner->banners_name }}">
                                </a>

                                <!-- Dark overlay -->
                                <div
                                    class="absolute inset-0 bg-blue-overlay2 z-10 transition-opacity duration-300 group-hover:opacity-0">
                                </div>

                                <!-- Text on hover -->
                                <div
                                    class="absolute inset-0 z-20 p-5 flex flex-col justify-end transition-all duration-300 group-hover:translate-y-[-10px] overflow-x-hidden">
                                    <div class="inner-boder">
                                        <h2 class="text-white text-base lg:text-lg font-medium">
                                            {{ $banner->banners_name }}</h2>
                                        <div class="flex justify-between items-center mt-2 hidden group-hover:flex">
                                            <p class="cost_start">From <span
                                                    class="cost_start_span">{{ $banner->banners_details }}</span></p>
                                            <a href="{{ $banner->banners_link }}"
                                                class="px-4 py-1 rounded-full border border-[#D4B357] bg-[#D4B357] text-[#ffffff] font-['Poppins'] text-sm hover:bg-[#D4B357] hover:text-white transition-colors duration-300">Learn
                                                More</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            @php
                                $i = $i + 1;
                            @endphp
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="bg-[#F3FDFF]">

                <div class="container mx-auto px-4 sm:px-6 2xl:px-20 pb-10 lg:pb-16 lg:pb-20 overflow-x-hidden">
                    <div class="mt-5 md:mt-10 lg:mt-20 mb-5 md:mb-10 lg:mb-20">
                        <h2 class="affordable-price">Embark on your journey with our affordable packages.</h2>
                        <div class="flex justify-between mt-5">
                            <p class="affordable-price-p d-block">Since we first opened we have always prioritized the
                                convenience
                                of our users by <br /> providing low prices
                                and with a easy process. Since we first opened we have always .</p>
                            <div class="d-block">
                                <a href="{{ url('/umrah-packages') }}" class="view-more">View More</a>
                            </div>
                        </div>

                        <div class="relative mb-5">

                            <div id="scroll-container"
                                class="mt-5 sm:mt-8 md:mt-10 lg:mt-16 mb-4 flex gap-5 scroll-none overflow-x-auto">
                                @php
                                    $servicepackages = Servicepackages::where('servicepackages_status', 1)
                                        ->where('featured_package', 1)
                                        ->where('destinations_id', null)
                                        ->limit(9)
                                        ->get();
                                @endphp
                                @if ($servicepackages->count() > 0)
                                    @foreach ($servicepackages as $servicepackage)
                                        <div class="card-width">
                                            <div class="relative">
                                                <a href="{{ url('/package/' . $servicepackage->servicepackages_url) }}">
                                                    <img class="rounded-tl-[50px] rounded-tr-[50px] w-full"
                                                        src="{{ asset('uploads/servicepackages/' . $servicepackage->servicepackages_image) }}"
                                                        alt="{{ $servicepackage->servicepackages_name }}" />
                                                </a>
                                                @if ($servicepackage->custom_label != '')
                                                    <div
                                                        class="absolute top-5 lg:left-2 lg:px-3 py-1 rounded-full text-sm">
                                                        <p class="deposit-only">{{ $servicepackage->custom_label }}</p>
                                                    </div>
                                                @endif
                                                <div class="absolute bottom-5 left-2  px-3 py-1 rounded-full text-sm">
                                                    <p class="time-duaration">
                                                        {{ $servicepackage->servicepackages_totalnights }} Nights .
                                                        {{ $servicepackage->servicepackages_startype }} Star</p>
                                                </div>
                                            </div>

                                            <div class="p-5 card-body">
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
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                            <div class="circle lg:mt-5 absolute right-0 z-10 bg-[#ffffff] top-[35%]" onclick="scrollRight()">
                                <img src="{{ asset('frontend/assets/images/left-arrow.svg') }}"
                                    class="img-2 h-auto w-4 md:w-6 rotate-180" alt="">
                            </div>
                            <div class="circle lg:mt-5 absolute left-0 z-10 bg-[#ffffff] top-[35%]" onclick="scrollleft()">
                                <img src="{{ asset('frontend/assets/images/right-arrow.svg') }}"
                                    class="img-2 h-auto w-4 md:w-6 rotate-180" alt="">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="container mx-auto px-4 sm:px-6 2xl:px-20 pb-10 lg:pb-16 lg:pb-20 overflow-x-hidden">
                    <div class="mt-5 md:mt-10 lg:mt-20 mb-5 md:mb-10 lg:mb-20">
                        <h2 class="umrah-leaving">Umrah Packages Departing Soon<br /> Secure Your Spot Before They're Gone</h2>
                        <div class="flex justify-center mt-5">
                            <p class="umrah-leaving-p d-block"> Our upcoming Umrah packages are almost fully booked! Travel with ease and peace of mind <br/>through our expertly planned tours that include everything from visa to ziyarat.</p>

                        </div>

                        <div class="relative mb-5">
                            <div id="scroll-container2"
                                class="mt-5 sm:mt-8 md:mt-10 lg:mt-16 mb-4 flex gap-5 scroll-none overflow-x-auto">
                                @php
                                    $service_current = Services::where('services_status', 1)
                                        ->orderBy('services_sort', 'asc')
                                        ->first();
                                    $servicepackages = Servicepackages::where('servicepackages_status', 1)
                                        ->where('services_id', $service_current->services_id)
                                        ->where('destinations_id', null)
                                        ->limit(9)
                                        ->get();
                                @endphp
                                @if ($servicepackages->count() > 0)
                                    @foreach ($servicepackages as $servicepackage)
                                        <div class="card-width">
                                            <div class="relative">
                                                <a href="{{ url('/package/' . $servicepackage->servicepackages_url) }}">
                                                    <img class="rounded-tl-[50px] rounded-tr-[50px] w-full"
                                                        src="{{ asset('uploads/servicepackages/' . $servicepackage->servicepackages_image) }}"
                                                        alt="{{ $servicepackage->servicepackages_name }}" />
                                                </a>

                                                @if ($servicepackage->custom_label != '')
                                                    <div
                                                        class="absolute top-5 lg:left-2  lg:px-3 py-1 rounded-full text-sm">
                                                        <p class="deposit-only">{{ $servicepackage->custom_label }}</p>
                                                    </div>
                                                @endif
                                                <div class="absolute bottom-5 left-2  px-3 py-1 rounded-full text-sm">
                                                    <p class="time-duaration">
                                                        {{ $servicepackage->servicepackages_totalnights }} Nights .
                                                        {{ $servicepackage->servicepackages_startype }} Star</p>
                                                </div>
                                            </div>

                                            <div class="p-5 card-body">
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
                                        </div>
                                    @endforeach
                                @endif

                            </div>

                            <div class="circle lg:mt-5 absolute right-0 z-10 bg-[#ffffff] top-[35%]" onclick="scrollRight2()">
                                <img src="{{ asset('frontend/assets/images/left-arrow.svg') }}"
                                    class="img-2 h-auto w-4 md:w-6 rotate-180" alt="">
                            </div>
                            <div class="circle lg:mt-5 absolute left-0 z-10 bg-[#ffffff] top-[35%]" onclick="scrollleft2()">
                                <img src="{{ asset('frontend/assets/images/right-arrow.svg') }}"
                                    class="img-2 h-auto w-4 md:w-6 rotate-180" alt="">
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            @include('frontend.layouts.testimonialscarousel')


            <div class="bg-[#F3FDFF]">
                <div class="container mx-auto lg:px-4 sm:px-6 2xl:px-20 pb-10 lg:pb-16 lg:pb-20  overflow-x-hidden">
                    <div class="grid grid-cols-12 lg:gap-10">
                        <div class="col-span-12 lg:col-span-7 mt-10">
                            <div id="accordion-collapse" data-accordion="collapse">
                                <h2 id="accordion-collapse-heading-1">
                                    <button type="button" onclick="toggleAccordion(this)"
                                        class="flex items-center justify-between w-full p-5 bg-open gap-3"
                                        data-accordion-target="#accordion-collapse-body-1" aria-expanded="false"
                                        aria-controls="accordion-collapse-body-1">
                                        <span class="accordian-heading mt-5 mb-5">What services does Tawheed Travels offer for Hajj and Umrah pilgrims?
</span>
                                        <img src="{{ asset('frontend/assets/images/accordian-plus.svg') }}"
                                            alt="icon" class="accordion-icon" />
                                    </button>
                                </h2>
                                <div id="accordion-collapse-body-1" class="opened"
                                    aria-labelledby="accordion-collapse-heading-1">
                                    <div class="p-5 border-p">
                                        <p>Tawheed Travels provides complete Hajj and Umrah packages from the UK, including visa processing, flight bookings, hotel accommodations near Haram, ground transport, and guided support throughout the journey.</p>
                                    </div>
                                </div>

                                <h2 id="accordion-collapse-heading-2">
                                    <button type="button" onclick="toggleAccordion(this)"
                                        class="flex items-center justify-between w-full p-5 bg-open gap-3"
                                        data-accordion-target="#accordion-collapse-body-2" aria-expanded="false"
                                        aria-controls="accordion-collapse-body-2">
                                        <span class="accordian-heading mt-5 mb-5">Are your Hajj and Umrah packages ATOL protected?
</span>
                                        <img src="{{ asset('frontend/assets/images/accordian-plus.svg') }}"
                                            alt="icon" class="accordion-icon" />
                                    </button>
                                </h2>
                                <div id="accordion-collapse-body-2" class="hidden"
                                    aria-labelledby="accordion-collapse-heading-2">
                                    <div class="p-5 border-p">
                                        <p>Yes, all our packages are ATOL protected to ensure your financial security and peace of mind when booking with us.</p>
                                    </div>
                                </div>
                                <h2 id="accordion-collapse-heading-3">
                                    <button type="button" onclick="toggleAccordion(this)"
                                        class="flex items-center justify-between w-full p-5 bg-open gap-3"
                                        data-accordion-target="#accordion-collapse-body-3" aria-expanded="false"
                                        aria-controls="accordion-collapse-body-3">
                                        <span class="accordian-heading mt-5 mb-5">Can I customize my Umrah package based on my budget or travel dates?</span>
                                        <img src="{{ asset('frontend/assets/images/accordian-plus.svg') }}"
                                            alt="icon" class="accordion-icon" />
                                    </button>
                                </h2>
                                <div id="accordion-collapse-body-3" class="hidden"
                                    aria-labelledby="accordion-collapse-heading-3">
                                    <div class="p-5 border-p">
                                        <p>Absolutely. We offer flexible and customizable Umrah packages to suit different budgets, family sizes, and preferred travel dates.</p>
                                    </div>
                                </div>
                                <h2 id="accordion-collapse-heading-4">
                                    <button type="button" onclick="toggleAccordion(this)"
                                        class="flex items-center justify-between w-full p-5 bg-open gap-3"
                                        data-accordion-target="#accordion-collapse-body-4" aria-expanded="false"
                                        aria-controls="accordion-collapse-body-4">
                                        <span class="accordian-heading mt-5 mb-5">Do you provide group or family Umrah packages?</span>
                                        <img src="{{ asset('frontend/assets/images/accordian-plus.svg') }}"
                                            alt="icon" class="accordion-icon" />
                                    </button>
                                </h2>
                                <div id="accordion-collapse-body-4" class="hidden"
                                    aria-labelledby="accordion-collapse-heading-3">
                                    <div class="p-5 border-p">
                                        <p>Yes, we specialize in group and family packages with dedicated support, convenient hotel arrangements, and discounted rates for children.</p>
                                    </div>
                                </div>
                                <h2 id="accordion-collapse-heading-5">
                                    <button type="button" onclick="toggleAccordion(this)"
                                        class="flex items-center justify-between w-full p-5 bg-open gap-3"
                                        data-accordion-target="#accordion-collapse-body-5" aria-expanded="false"
                                        aria-controls="accordion-collapse-body-5">
                                        <span class="accordian-heading mt-5 mb-5">Is a guide available during the Hajj or Umrah journey?</span>
                                        <img src="{{ asset('frontend/assets/images/accordian-plus.svg') }}"
                                            alt="icon" class="accordion-icon" />
                                    </button>
                                </h2>
                                <div id="accordion-collapse-body-5" class="hidden"
                                    aria-labelledby="accordion-collapse-heading-3">
                                    <div class="p-5 border-p">
                                        <p>Yes, our experienced guides accompany the group throughout the pilgrimage to assist with rituals and ensure everything is performed correctly.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-5 mt-10  d-block">
                            <h2 class="questions">Got Questions? <br /> We’ve Got Answers!</h2>
                            <img src="{{ asset('frontend/assets/images/oval-kaaba.jpg') }}"
                                class="h-auto max-w-full mt-10" alt="">
                        </div>
                    </div>
                </div>
            </div>

            @include('frontend.layouts.customform')

            <div class="bg-[#F3FDFF]">
                <div class="container mx-auto px-4 sm:px-6 2xl:px-20 pb-10 lg:pb-16 lg:pb-20 overflow-x-hidden">
                    <div class="mt-5 md:mt-10 lg:mt-20 mb-5 md:mb-10 lg:mb-20">
                        <h2 class="affordable-price">Latest Tips & News for Your Blessed Journey</h2>
                        <div class="flex justify-between mt-5">
                            <p class="affordable-price-p d-block">Guidance for Every Step of Your Pilgrimage
 From preparing your Ihram <br /> to understanding each ritual, our blogs and resources guide you with practical and spiritual tips.</p>
                            <div class="d-block">
                                <a href="{{ url('/blog') }}" class="view-more">View More</a>
                            </div>
                        </div>

                        <div class="relative mb-5">
                            <div class="swiper mySwiper mt-5 sm:mt-8 md:mt-10 lg:mt-16 mb-4">
                                <div class="swiper-wrapper">
                                    @php
                                        use App\Models\Blogs;
                                        $blogsdetails = Blogs::where('blogs_status', 1)
                                            ->orderBy('created_at', 'desc')
                                            ->paginate(4);
                                    @endphp
                                    @foreach ($blogsdetails as $blogsdetail)
                                        <div class="swiper-slide card2 flex boder-radius-50">
                                            <div class="max-w-[150px] sm:max-w-[40%]">
                                                <a href="{{ url('/blog/' . $blogsdetail->blogs_url) }}">
                                                    <img src="{{ asset('uploads/blogs/' . $blogsdetail->blogs_image) }}"
                                                        class="h-auto w-custome w-full img-bdr-50"
                                                        alt="{{ $blogsdetail->blogs_name }}">
                                                </a>
                                            </div>
                                            <div class="tips-tricks p-4 lg:p-5">
                                                <h2>{{ $blogsdetail->blogs_name }}</h2>
                                                <p class="mt-2 lg:mt-4 d-block blog-text">
                                                    {!! strlen($blogsdetail->blogs_details) > 400
                                                        ? substr(strip_tags($blogsdetail->blogs_details), 0, 400) . ''
                                                        : $blogsdetail->blogs_details !!}
                                                </p>
                                                <a href="{{ url('/blog/' . $blogsdetail->blogs_url) }}"
                                                    class="read-more mt-2 lg:mt-5 block">Read more</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <!-- Navigation buttons -->
                            </div>
                            <div class="circle next lg:mt-5 absolute right-0 z-10 bg-[#ffffff] top-[35%]">
                                <img src="{{ asset('frontend/assets/images/left-arrow.svg') }}"
                                    class="img-2 h-auto w-4 md:w-6 rotate-180" alt="">
                            </div>
                            <div class="circle previos lg:mt-5 absolute left-0 z-10 bg-[#ffffff] top-[35%]">
                                <img src="{{ asset('frontend/assets/images/right-arrow.svg') }}"
                                    class="img-2 h-auto w-4 md:w-6 rotate-180" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
