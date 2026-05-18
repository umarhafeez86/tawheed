@extends('frontend.layouts.innerpackage')
@section('main-container')

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
    
    <div
        class="container mx-auto px-4 sm:px-6 2xl:px-20 overflow-hidden mt-5 sm:mt-12 md:mt-16 lg:mt-20  mb-5 sm:mb-12 md:mb-16 lg:mb-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            @php
                use App\Models\Services;
                use App\Models\Servicepackagesimgs;

                use App\Models\Hotelinfos;
                use App\Models\Hotelimgs;

                $makkah_hotel_info = Hotelinfos::where('hotelinfos_id', $servicepackage->makkah_hotelinfos_id)->first();
                $madinah_hotel_info = Hotelinfos::where(
                    'hotelinfos_id',
                    $servicepackage->madinah_hotelinfos_id,
                )->first();
                $service = Services::where('services_id', $servicepackage->services_id)->first();
            @endphp
            @php
                $hotelimgs_makkah = '';
                $hotelimgs_madinah = '';
                if ($makkah_hotel_info) {
                    $hotelimg = Hotelimgs::query()
                        ->where('hotelimgs_status', 1)
                        ->where('hotelinfos_id', $makkah_hotel_info->hotelinfos_id)
                        ->orderBy('hotelimgs_sort', 'asc')
                        ->first();
                }
            @endphp
            @php
                if ($madinah_hotel_info) {
                    $hotelimg2 = Hotelimgs::query()
                        ->where('hotelimgs_status', 1)
                        ->where('hotelinfos_id', $madinah_hotel_info->hotelinfos_id)
                        ->orderBy('hotelimgs_sort', 'asc')
                        ->first();
                }

                $favorites = json_decode(Cookie::get('favorites', '[]'), true);
            @endphp
            <div>
                <div class="flex justify-between items-center">
                    <h2 class="month_umrah">
                        @if ($service)
                            {{ $service->services_name }}
                        @endif
                    </h2>

                    @php
                        $months = [
                            'January',
                            'February',
                            'March',
                            'April',
                            'May',
                            'June',
                            'July',
                            'August',
                            'September',
                            'October',
                            'November',
                            'December',
                        ];

                        $pattern = '/\b(' . implode('|', $months) . ')\b/i';

                        if (preg_match($pattern, $servicepackage->servicepackages_name, $matches)) {
                            $month_name = $matches[1]; // Output: May
                        } else {
                            $month_name = '';
                        }
                    @endphp
                    <div class="flex items-center gap-2">
                        <span class="total_star">{{ $servicepackage->servicepackages_startype }} Star</span>
                        <div class="rating-star text-base lg:text-xl">
                            @for ($i = 1; $i <= $servicepackage->servicepackages_startype; $i++)
                                <i class="fa fa-star"></i>
                            @endfor
                        </div>
                    </div>
                </div>
                <h2 class="nights_spend mt-4 lg:mt-7 mb-4 lg:mb-7">{{ $servicepackage->servicepackages_name }}</h2>
                <div class="flex justify-between items-center">
                    <p class="price">{{ get_siteinfo('currency_symbol') }}
                        {{ $servicepackage->servicepackages_price }} <span class="price_span">pp</span></p>
                    <h2 class="month_umrah">*Terms
                        Applied</h2>

                </div>

                <div class="flex gap-3 sm:gap-4 md:gap-5 lg:gap-8 mt-5 mb-3">
                    @if ($servicepackage->visa_info == 'Included')
                        <div class="flex items-center gap-1 sm:gap-2 service">
                            <img src="{{ asset('frontend/assets/images/visa.svg') }}" class="h-4 w-6 lg:h-6 object-contain"
                                alt="">
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
                            <img src="{{ asset('frontend/assets/images/hotel.svg') }}" class="h-4 w-6 lg:h-6 object-contain"
                                alt="">
                            <p>Hotels</p>
                        </div>
                    @endif

                    @if (
                        $servicepackage->makkah_hotel_meal_info != 'Not Included' ||
                            $servicepackage->madinah_hotel_meal_info != 'Not Included')
                        <div class="flex items-center gap-1 sm:gap-2 service">
                            <img src="{{ asset('frontend/assets/images/food.svg') }}" class="h-4 w-6 lg:h-6 object-contain"
                                alt="">
                            <p>Food</p>
                        </div>
                    @endif

                    @if ($servicepackage->transport_info != 'Not Included')
                        <div class="flex service gap-1 sm:gap-2 items-center">
                            <img src="{{ asset('frontend/assets/images/transportation.svg') }}"
                                class="h-4 w-6 lg:h-6 object-contain" alt="">
                            <p>Transportation</p>
                        </div>
                    @endif

                </div>

                <div>
                    <p class="mt-4 lg:mt-8 mb-4 lg:mb-b share_room"></p>
                    @if ($servicepackage->heading1 != '')
                        <h2 class="mt-4 lg:mt-8 mb-4 lg:mb-b share_destination"><span
                                class="share_destination_span mb-2">{{ $servicepackage->heading1 }}</span></h2>
                        <p class="hotel_discription mb-4">{!! $servicepackage->heading1_details !!}</p>
                    @endif

                    @if ($servicepackage->heading2 != '')
                        <h2 class="mt-4 lg:mt-8 mb-4 lg:mb-b share_destination"><span
                                class="share_destination_span mb-2">{{ $servicepackage->heading2 }}</span></h2>
                        <p class="hotel_discription mb-4">{!! $servicepackage->heading1_details2 !!}</p>
                    @endif

                    @if ($servicepackage->heading3 != '')
                        <h2 class="mt-4 lg:mt-8 mb-4 lg:mb-b share_destination"><span
                                class="share_destination_span mb-2">{{ $servicepackage->heading3 }}</span></h2>
                        <p class="hotel_discription mb-4">{!! $servicepackage->heading1_details3 !!}</p>
                    @endif

                    @if ($servicepackage->heading4 != '')
                        <h2 class="mt-4 lg:mt-8 mb-4 lg:mb-b share_destination"><span
                                class="share_destination_span mb-2">{{ $servicepackage->heading4 }}</span></h2>
                        <p class="hotel_discription mb-4">{!! $servicepackage->heading1_details4 !!}</p>
                    @endif

                    @if ($makkah_hotel_info->hotelinfos_id > 0)
                        <h2 class="mt-4 lg:mt-8 mb-4 lg:mb-b share_destination"><span
                                class="share_destination_span mb-2">{{ $makkah_hotel_info->hotelinfos_city }}</span>
                            {{ $servicepackage->servicepackages_makkahnights }} Nights .
                            {{ $makkah_hotel_info->hotelinfos_name }}</h2>
                        <p class="hotel_discription mb-4">{!! strip_tags($makkah_hotel_info->hotelinfos_details) !!}</p>
                        <div class="relative overflow-hidden">
                            <div id="slider1" class="flex transition-transform duration-500 ease-in-out float-left">
                                <!-- Navigation + Counter at Bottom -->
                                @php
                                    $hotelimgs = Hotelimgs::query()
                                        ->where('hotelimgs_status', 1)
                                        ->where('hotelinfos_id', $makkah_hotel_info->hotelinfos_id)
                                        ->orderBy('hotelimgs_sort', 'asc')
                                        ->get();
                                @endphp
                                @if ($hotelimgs->count() > 0)
                                    @foreach ($hotelimgs as $hotelimg)
                                        <div class="min-w-full flex items-center justify-center">
                                            <div class="md:col-span-12">
                                                <img src="{{ asset('uploads/hotels/gallery/' . $hotelimg->hotelimgs_image) }}"
                                                    class="max-w-full h-auto" alt="{{ $hotelimg->hotelimgs_caption }}">
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <!-- Navigation + Counter at Bottom -->
                            <div class="absolute top-[45px] right-[25px] flex">
                                <!-- Prev Button -->
                                <button id="prev1" class="py-1 px-3">
                                    <img src="{{ asset('frontend/assets/images/arrow-back.png') }}" alt="">
                                </button>

                                <!-- Slide Counter -->
                                <div class="px-4 py-1 rounded-full bg-slider-info hidden">
                                    <span id="currentSlide1">1</span> <span class="ms-2 mx-2">/</span> <span
                                        id="totalSlides1">{{ $hotelimgs->count() }}</span>
                                </div>

                                <!-- Next Button -->
                                <button id="next1" class="py-1 px-3">
                                    <img src="{{ asset('frontend/assets/images/arrow-next.png') }}" alt="">
                                </button>
                            </div>
                        </div>
                    @endif

                </div>
                <div>
                    @if ($madinah_hotel_info->hotelinfos_id > 0)
                        <p class="mt-4 lg:mt-8 mb-4 lg:mb-b share_room"></p>
                        <h2 class="mt-4 lg:mt-8 mb-4 lg:mb-b share_destination"><span
                                class="share_destination_span mb-2">{{ $madinah_hotel_info->hotelinfos_city }}</span>
                            {{ $servicepackage->servicepackages_madinahnights }} Nights .
                            {{ $madinah_hotel_info->hotelinfos_name }}</h2>
                        <p class="hotel_discription mb-4">{!! strip_tags($madinah_hotel_info->hotelinfos_details) !!}</p>

                        <div class="relative overflow-hidden">
                            <div id="slider2" class="flex transition-transform duration-500 ease-in-out float-left">
                                <!-- Navigation + Counter at Bottom -->
                                @php
                                    $hotelimgs_madinah = Hotelimgs::query()
                                        ->where('hotelimgs_status', 1)
                                        ->where('hotelinfos_id', $madinah_hotel_info->hotelinfos_id)
                                        ->orderBy('hotelimgs_sort', 'asc')
                                        ->get();
                                @endphp
                                @if ($hotelimgs_madinah->count() > 0)
                                    @foreach ($hotelimgs_madinah as $hotelimg_madinah)
                                        <div class="min-w-full flex items-center justify-center">
                                            <div class="md:col-span-12">
                                                <img src="{{ asset('uploads/hotels/gallery/' . $hotelimg_madinah->hotelimgs_image) }}"
                                                    class="max-w-full h-auto"
                                                    alt="{{ $hotelimg_madinah->hotelimgs_caption }}">
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                            <!-- Navigation + Counter at Bottom -->
                            <div class="absolute top-[45px] right-[25px] flex">
                                <!-- Prev Button -->
                                <button id="prev2" class="py-1 px-3">
                                    <img src="{{ asset('frontend/assets/images/arrow-back.png') }}" alt="">
                                </button>

                                <!-- Slide Counter -->
                                <div class="px-4 py-1 rounded-full bg-slider-info hidden">
                                    <span id="currentSlide2">1</span> <span class="ms-2 mx-2">/</span> <span
                                        id="totalSlides2">{{ $hotelimgs_madinah->count() }}</span>
                                </div>

                                <!-- Next Button -->
                                <button id="next2" class="py-1 px-3">
                                    <img src="{{ asset('frontend/assets/images/arrow-next.png') }}" alt="">
                                </button>
                            </div>
                        </div>

                    @endif
                </div>
            </div>
            <div class="bg-enquiry bg-white rounded-2xl border border-[#C4DFE7] p-6 md:p-10 space-y-6 shadow-md max-w-xl">

                <section id="booknowsection"></section>
                <form name="frmbooknow" id="frmbooknow" method="post" class="col-12 m-0 p-0 float-start">
                    @csrf

                    <h2 class="">Enquire Now</h2>

                    <!-- Full Name -->
                    <div class="mt-3">
                        <label class="block custome-label mb-1" for="frmbooknow_fname">Full Name</label>
                        <input type="text"
                            class="w-full border-b border-[#A7D3DD] focus:outline-none focus:border-[#005B68] bg-transparent px-1 py-2"
                            id="frmbooknow_fname" name="frmbooknow_fname" placeholder="Full Name" />
                    </div>

                    <!-- Contact and Email -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mt-3">
                            <label class="block custome-label mb-1" for="frmbooknow_contactno">Contact Number</label>
                            <input type="text"
                                class="w-full border-b border-[#A7D3DD] focus:outline-none focus:border-[#005B68] bg-transparent px-1 py-2"
                                id="frmbooknow_contactno" name="frmbooknow_contactno" placeholder="" value=""
                                maxlength="13" minlength="11" />
                        </div>
                        <div class="mt-3">
                            <label class="block custome-label mb-1" for="frmbooknow_email">Email Address</label>
                            <input type="email"
                                class="w-full border-b border-[#A7D3DD] focus:outline-none focus:border-[#005B68] bg-transparent px-1 py-2"
                                id="frmbooknow_email" name="frmbooknow_email" placeholder="@" />
                        </div>
                    </div>

                    <!-- No. of Days and Guests -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mt-3">
                            <label class="block custome-label mb-1" for="frmbooknow_total_days">No. of Days</label>
                            <select
                                class="w-full border-b border-[#A7D3DD] focus:outline-none focus:border-[#005B68] bg-transparent px-1 py-2"
                                id="frmbooknow_total_days" name="frmbooknow_total_days">
                                @php
                                    $filter_nights = explode(',', get_siteinfo('filter_nights_values'));
                                @endphp
                                @foreach ($filter_nights as $filter_night)
                                    <option value="1" @if ($servicepackage->servicepackages_totalnights == $filter_night) selected @endif>
                                        {{ $filter_night }}</option>
                                @endforeach
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        <div class="mt-3">
                            <label class="block custome-label mb-1" for="frmbooknow_guests">No. of Guests</label>
                            <select
                                class="w-full border-b border-[#A7D3DD] focus:outline-none focus:border-[#005B68] bg-transparent px-1 py-2"
                                id="frmbooknow_guests" name="frmbooknow_guests">
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
                    </div>

                    <!-- Message -->
                    <div class="mt-3">
                        <label class="block custome-label mb-1" for="frmbooknow_message">Your Message</label>
                        <textarea
                            class="w-full border-b border-[#A7D3DD] focus:outline-none focus:border-[#005B68] bg-transparent px-1 py-2 resize-none"
                            name="frmbooknow_message" id="frmbooknow_message"></textarea>
                    </div>

                    <p class="month_umrah float-left mt-2 mb-2">
                        By submitting, you agree to emails and GDPR-compliant data use per our <a
                            href="{{ url('/information/privacy-policy') }}" target="_blank">Privacy Policy</a> and <a
                            href="{{ url('/information/terms-conditions') }}" target="_blank">Terms</a>.
                    </p>

                    <input type="hidden" name="frmbooknow_travel_month" id="frmbooknow_travel_month"
                        value="{{ $month_name }}">
                    <input type="hidden" name="frmbooknow_package_name" id="frmbooknow_package_name"
                        value="{{ $servicepackage->servicepackages_name }}">
                    <input type="hidden" name="frmbooknow_package_price" id="frmbooknow_package_price"
                        value="{{ $servicepackage->servicepackages_price }}">

                    <!-- Button -->
                    <div class="form-row-msg" id="frmbooknow_msg"></div>
                    <button type="button" class="w-full send-enquiry-btn" onclick="submitbooknow();">Send
                        Enquiry</button>
                    <input type="hidden" name="gclid" id="gclid" value="">
                    <input type="hidden" name="page_url" id="page_url" value="{{ url()->current() }}">
                </form>

            </div>
        </div>
    </div>
    @include('frontend.layouts.relatedpackages')
@endsection
