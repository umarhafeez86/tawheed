    <footer class="pt-4 pb-8 ps-4 pr-4 bg-[#f3fdff]">
        <div class="bg-[#005B68] pb-8 boder-radius-50">
            <div class="container mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 p-5 sm:p-10 md:p-16 lg:p-20 text-white">
                    <!-- Left Section -->
                    <div>
                        <img src="{{ asset('uploads/settings/' . get_siteinfo('footer_logo')) }}" class="h-12 max-w-full"
                            alt="">
                    </div>
                    
                    <div>
                        <p class="mt-4 lg:mt-6 necessary d-block">Tawheed Travels is a trusted UK-based Hajj and Umrah agency, committed to making your sacred journey smooth, affordable, and spiritually fulfilling.</p>
                    </div>


                    <!-- Center Logos -->
                    <!--div class="flex items-center gap-3">
                        <img src="{{ asset('frontend/assets/images/footer_logo_3.png') }}"
                            class="h-10 w-10 lg:h-auto lg:w-auto object-contain" alt="">
                        <img src="{{ asset('frontend/assets/images/footer_logo_2.png') }}"
                            class="h-10 w-10 lg:h-auto lg:w-auto object-contain" alt="">
                        <img src="{{ asset('frontend/assets/images/footer_logo_1.png') }}"
                            class="h-10 w-[120px] sm:w-[100px] md:w-[110px] lg:w-[130px] object-contain" alt="">
                    </div-->


                    <!-- Contact Info -->
                    <div class="space-y-6">
                        <div class="flex gap-6">
                            <div class="footer_info">
                                <h2>Phone Number</h2>
                                <p class="mt-1"><a
                                        href="tel:{{ get_siteinfo('setting_phone') }}">{{ get_siteinfo('setting_phone') }}</a>
                                </p>
                            </div>
                            <div class="footer_info">
                                <h2>Email</h2>
                                <p class="mt-1"><a
                                        href="mailto:{{ get_siteinfo('setting_email') }}">{{ get_siteinfo('setting_email') }}</a>
                                </p>
                            </div>
                        </div>
                        <div class="footer_info">
                            <h2>Location</h2>
                            <p class="mt-1">{{ get_siteinfo('setting_address') }}</p>
                        </div>
                    </div>
                </div>

                <div class="d-block">
                    <div
                        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 p-5 sm:p-10 md:p-16 lg:p-20 text-white">
                        <div>
                            <h4 class="cheap_umrah mb-4">Cheap Umrah Packages</h4>
                            <ul class="space-y-2 umrah_packages">
                                @php
                                    use App\Models\Services;
                                    $servicedetails = Services::where('services_status', 1)
                                        ->orderBy('services_sort', 'asc')
                                        ->limit(8)
                                        ->get();
                                @endphp
                                @if ($servicedetails->count() > 0)
                                    @foreach ($servicedetails as $servicedetail)
                                        <li><a
                                                href="{{ url('/services/' . $servicedetail->services_url) }}">{{ $servicedetail->services_name }}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <div>
                            <h4 class="cheap_umrah mb-4">Useful Links</h4>
                            <ul class="space-y-2 umrah_packages">
                                @php
                                    use App\Models\Staticpages;
                                    $staticpages = Staticpages::where('pages_status', 1)
                                        ->where('pages_status_bottom', 1)
                                        ->where('pages_bottom_incol', 2)
                                        ->orderBy('pages_sort', 'asc')
                                        ->limit(8)
                                        ->get();
                                @endphp
                                @if ($staticpages->count() > 0)
                                    @foreach ($staticpages as $staticpage)
                                        <li><a
                                                href="{{ url('/information/' . $staticpage->pages_url) }}">{{ $staticpage->pages_name }}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>

                        <div>
                            <h4 class="cheap_umrah mb-4">Important Information</h4>
                            <ul class="space-y-2 umrah_packages">
                                @php
                                    $staticpages = Staticpages::where('pages_status', 1)
                                        ->where('pages_status_bottom', 1)
                                        ->where('pages_bottom_incol', 3)
                                        ->orderBy('pages_sort', 'asc')
                                        ->limit(8)
                                        ->get();
                                @endphp
                                @if ($staticpages->count() > 0)
                                    @foreach ($staticpages as $staticpage)
                                        <li><a
                                                href="{{ url('/information/' . $staticpage->pages_url) }}">{{ $staticpage->pages_name }}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>

                        <div>
                            <div>
                                <p class="mb-4 payments">We accept following mode of payments</p>
                                <img src="{{ asset('frontend/assets/images/payment-cards.png') }}"
                                    class="h-auto max-w-full" alt="">
                            </div>
                            <div class="mt-5 lg:mt-8">
                                <p class="payments">Follow us on</p>

                                <div class="footer-icons flex gap-3 mt-4">
                                    @if (get_siteinfo('setting_insta_link') != '')
                                        <a href="{{ get_siteinfo('setting_fb_link') }}" target="_blank">
                                            <span class="icon-circle">
                                                <i class="fab fa-instagram"></i>
                                            </span></a>
                                    @endif
                                    @if (get_siteinfo('setting_fb_link') != '')
                                        <a href="{{ get_siteinfo('setting_fb_link') }}" target="_blank">
                                            <span class="icon-circle">
                                                <i class="fab fa-facebook-f"></i>
                                            </span>
                                        </a>
                                    @endif
                                    @if (get_siteinfo('setting_linkedin_link') != '')
                                        <a href="{{ get_siteinfo('setting_linkedin_link') }}" target="_blank">
                                            <span class="icon-circle">
                                                <i class="fab fa-linkedin-in"></i>
                                            </span>
                                        </a>
                                    @endif
                                    @if (get_siteinfo('setting_tw_link') != '')
                                        <a href="{{ get_siteinfo('setting_tw_link') }}" target="_blank">
                                            <span class="icon-circle">
                                                <i class="fab fa-twitter"></i>
                                            </span>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sm:hidden px-5">
                        <!-- Accordion Wrapper -->
                        <div class="sm:hidden border-b border-white">
                            <!-- Toggle Checkbox (hidden but controls visibility) -->
                            <input type="checkbox" id="accordion-1" class="peer hidden">
                            <!-- Label (clickable heading + icon) -->
                            <label for="accordion-1"
                                class="flex gap-5 items-center py-4 text-white font-semibold cursor-pointer">
                                Cheap Umrah Packages
                                <img src="{{ asset('frontend/assets/images/arrow_down.svg') }}" alt="arrow"
                                    class="w-4 h-4 transition-transform peer-checked:rotate-180">
                            </label>

                            <!-- Collapsible Content -->
                            <ul
                                class="max-h-0 overflow-x-hidden transition-all duration-300 peer-checked:max-h-96 pl-2 space-y-2 text-white text-sm">
                                @php
                                    $servicedetails = Services::where('services_status', 1)
                                        ->orderBy('services_sort', 'asc')
                                        ->limit(8)
                                        ->get();
                                @endphp
                                @if ($servicedetails->count() > 0)
                                    @foreach ($servicedetails as $servicedetail)
                                        <li><a
                                                href="{{ url('/services/' . $servicedetail->services_url) }}">{{ $servicedetail->services_name }}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>

                        <div class="sm:hidden border-b border-white">
                            <!-- Toggle Checkbox (hidden but controls visibility) -->
                            <input type="checkbox" id="accordion-2" class="peer hidden">

                            <!-- Label (clickable heading + icon) -->
                            <label for="accordion-2"
                                class="flex gap-5 items-center py-4 text-white font-semibold cursor-pointer">
                                Useful Links
                                <img src="{{ asset('frontend/assets/images/arrow_down.svg') }}" alt="arrow"
                                    class="w-4 h-4 transition-transform peer-checked:rotate-180">
                            </label>

                            <!-- Collapsible Content -->
                            <ul
                                class="max-h-0 overflow-x-hidden transition-all duration-300 peer-checked:max-h-96 pl-2 space-y-2 text-white text-sm">
                                @php
                                    $staticpages = Staticpages::where('pages_status', 1)
                                        ->where('pages_status_bottom', 1)
                                        ->where('pages_bottom_incol', 2)
                                        ->orderBy('pages_sort', 'asc')
                                        ->limit(8)
                                        ->get();
                                @endphp
                                @if ($staticpages->count() > 0)
                                    @foreach ($staticpages as $staticpage)
                                        <li><a
                                                href="{{ url('/information/' . $staticpage->pages_url) }}">{{ $staticpage->pages_name }}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>

                        <div class="sm:hidden border-b border-white">
                            <!-- Toggle Checkbox (hidden but controls visibility) -->
                            <input type="checkbox" id="accordion-3" class="peer hidden">

                            <!-- Label (clickable heading + icon) -->
                            <label for="accordion-3"
                                class="flex gap-5 items-center py-4 text-white font-semibold cursor-pointer">
                                Important Information
                                <img src="{{ asset('frontend/assets/images/arrow_down.svg') }}" alt="arrow"
                                    class="w-4 h-4 transition-transform peer-checked:rotate-180">
                            </label>

                            <!-- Collapsible Content -->
                            <ul
                                class="max-h-0 overflow-x-hidden transition-all duration-300 peer-checked:max-h-96 pl-2 space-y-2 text-white text-sm">
                                @php
                                    $staticpages = Staticpages::where('pages_status', 1)
                                        ->where('pages_status_bottom', 1)
                                        ->where('pages_bottom_incol', 3)
                                        ->orderBy('pages_sort', 'asc')
                                        ->limit(8)
                                        ->get();
                                @endphp
                                @if ($staticpages->count() > 0)
                                    @foreach ($staticpages as $staticpage)
                                        <li><a href="{{ url('/information/' . $staticpage->pages_url) }}">
                                                {{ $staticpage->pages_name }}</a></li>
                                    @endforeach
                                @endif
                            </ul>
                        </div> 
                        
                            <div class="mt-5">
                                <p class="mb-4 payments">We accept following mode of payments</p>
                                <img src="{{ asset('frontend/assets/images/payment-cards.png') }}" class="h-auto max-w-full"
                                    alt="">
                            </div>
                            
                            <div class="mt-5 lg:mt-8">
                                <p class="payments">Follow us on</p>

                                <div class="footer-icons flex gap-3 mt-4">
                                    @if (get_siteinfo('setting_insta_link') != '')
                                        <a href="{{ get_siteinfo('setting_fb_link') }}" target="_blank">
                                            <span class="icon-circle">
                                                <i class="fab fa-instagram"></i>
                                            </span></a>
                                    @endif
                                    @if (get_siteinfo('setting_fb_link') != '')
                                        <a href="{{ get_siteinfo('setting_fb_link') }}" target="_blank">
                                            <span class="icon-circle">
                                                <i class="fab fa-facebook-f"></i>
                                            </span>
                                        </a>
                                    @endif
                                    @if (get_siteinfo('setting_linkedin_link') != '')
                                        <a href="{{ get_siteinfo('setting_linkedin_link') }}" target="_blank">
                                            <span class="icon-circle">
                                                <i class="fab fa-linkedin-in"></i>
                                            </span>
                                        </a>
                                    @endif
                                    @if (get_siteinfo('setting_tw_link') != '')
                                        <a href="{{ get_siteinfo('setting_tw_link') }}" target="_blank">
                                            <span class="icon-circle">
                                                <i class="fab fa-twitter"></i>
                                            </span>
                                        </a>
                                    @endif
                                </div>
                            </div>
                </div>
                    
                <div class="hidden sm:block px-5 sm:px-10 md:px-16 lg:px-20">
                        <div class="footer-breaker"></div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 p-5 sm:p-10 md:p-16 lg:p-20 gap-10">
                    <div class="start_from">
                        <p>Note: All fares advertised are subject to availability and start from the prices we have
                            mentioned. Fares are only guaranteed until ticketed. Offers may be withdrawn without any
                            prior notice.</p>
                    </div>
                    <div>
                        <p class="copyright_claim mt-5 lg:mt-0">© Copyright 2025 Travigence as TAWHEED TRAVELS.
                            Company
                            Number 15101982. All Rights Reserved.</p>
                    </div>

                </div>

                <div class="p-5 sm:p-10 md:p-16 lg:p-20 ">
                    <div class="bg_protected">
                        <p class="p-3 sm:p-4 md:p-6 lg:p-10 most_flights">“Most of the flights and flight-inclusive
                            packages that we sell are ATOL and IATA protected by our suppliers. All quotations are
                            subject to availability at the time of booking. When you pay you will be supplied with
                            an
                            ATOL Certificate. Please ask for it and check to ensure that everything you booked
                            (flights,
                            hotels and other services) is listed on it. Please see our booking conditions for
                            further
                            information or for more information about financial protection and the ATOL Certificate
                            go
                            to: www.atol.org.uk”</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    

    <!-- head widgets -->
    @include('frontend.layouts.footerwidgets')
    <!-- head widgets -->
