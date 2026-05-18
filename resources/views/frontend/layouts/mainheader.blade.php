<div class="toprighticonsbar print:hidden">
    <a href="tel:{{ get_siteinfo('setting_phone') }}" target="_blank" class="toprighticons3">
        <img src="{{ asset('frontend/assets/images/phone-icon.svg') }}" class="float-left" alt="">
        <span class="float-left">{{ get_siteinfo('setting_phone') }}</span></a>
    <div class="clearfix"></div>
    <a href="https://api.whatsapp.com/send?phone={{ str_replace(' ', '', get_siteinfo('setting_whatsappno')) }}&amp;text=Hi,I%20would%20like%20to%20contact%20you"
        target="_blank" class="toprighticons2">
        <img src="{{ asset('frontend/assets/images/whatsapp-icon.png') }}" class="float-left" alt="">
        <span class="float-left">{{ get_siteinfo('setting_whatsappno') }}</span></a>
    <div class="clearfix"></div>
    <a href="mailto:{{ get_siteinfo('setting_email') }}" target="_blank" class="toprighticons">
        <img src="{{ asset('frontend/assets/images/email-icon.png') }}" class="float-left" alt="">
        <span class="float-left">{{ get_siteinfo('setting_email') }}</span></a>
    <div class="clearfix"></div>
</div>

@php
        use App\Models\Services;
@endphp
    <div class="container mx-auto px-4 sm:px-6 2xl:px-20 relative z-[9999]">
        <div class="m-5 sm:m-6 md:m-8 lg:m-10 flex justify-between items-center ">
            <a href="{{ url('') }}"><img src="{{ asset('uploads/settings/' . get_siteinfo('header_logo')) }}" class="h-10 xxl:h-14 max-w-full" alt="{{ get_siteinfo('setting_name') }}"></a>
            <div class="d-block">
                <ul class="flex justify-between justify-center lg:gap-12 nav-link text-black">
                    <li><a href="{{ url('') }}">Home</a></li>
                    <li class="relative group">
                        <a href="#" id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                            class="inline-flex items-center ">
                            Umrah Packages
                            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </a>
                        <!-- Dropdown menu inside the same li -->
                        <div id="dropdown"
                            class="z-10 hidden absolute top-full min-w-[280px] mt-2 bg-white rounded-lg">
                            <ul class="py-2 text-gray-800" aria-labelledby="dropdownDefaultButton">
                                @php
                                    $servicedetails = Services::where('services_status', 1)
                                        ->orderBy('services_sort', 'asc')
                                        ->get();
                                @endphp
                                @if ($servicedetails->count() > 0)
                                    @foreach ($servicedetails as $servicedetail)
                                        <li>
                                            <a href="{{ url('/' . $servicedetail->services_url) }}"
                                                class="block px-4 py-2 text-gray-800 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-[16px]">{{ $servicedetail->services_name }}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </li>
                    <li><a href="{{ url('/hajj-packages') }}">Hajj 2026</a></li>
                    <!--li><a href="{{ url('/blog') }}">Blogs</a></li-->
                    <li><a href="{{ url('/e-payment') }}">E Payment</a></li>
                    <li><a href="{{ url('/information/contact-us') }}">Contact Us</a></li>
                </ul>
            </div>
            <div class="d-block">
                <a href="tel:{{ get_siteinfo('setting_phone') }}" class="book-btn text-[12px]"><span><i class="fa fa-phone mr-1"></i> {{ get_siteinfo('setting_phone') }}</span></a>
            </div>
            <div class="d-none">
                <img src="{{ url('frontend/assets/images/menu.svg') }}" alt="menu" class="cursor-pointer"
                    data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation"
                    aria-controls="drawer-navigation" />
                <!-- drawer component -->
                <div id="drawer-navigation"
                    class="fixed top-0 left-0 z-40 w-64 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white dark:bg-gray-800"
                    tabindex="-1" aria-labelledby="drawer-navigation-label">
                    <h5 id="drawer-navigation-label"
                        class="text-base font-semibold text-gray-500 uppercase dark:text-gray-400">
                        Menu</h5>
                    <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 end-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close menu</span>
                    </button>
                    <div class="py-4 overflow-y-auto">
                        <ul class="space-y-2 font-medium">
                            <li>
                                <a href="{{ url('') }}"
                                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                    &gt;  <span class="ms-3">Home</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/umrah-packages') }}"
                                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                    &gt;  <span class="flex-1 ms-3 whitespace-nowrap">Umrah Packages</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/hajj-packages') }}"
                                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                    &gt;  <span class="flex-1 ms-3 whitespace-nowrap">Hajj 2026</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/beat-my-price') }}"
                                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                    &gt;  <span class="flex-1 ms-3 whitespace-nowrap">Beat My Price</span>
                                </a>
                            </li>
                            <!--li>
                                <a href="{{ url('/blog') }}"
                                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                    &gt;  <span class="flex-1 ms-3 whitespace-nowrap">Blogs</span>
                                </a>
                            </li-->
                            <li>
                                <a href="{{ url('/e-payment') }}"
                                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                    &gt;  <span class="flex-1 ms-3 whitespace-nowrap">E Payment</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/information/contact-us') }}"
                                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                    &gt;  <span class="flex-1 ms-3 whitespace-nowrap">Contact Us</span>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>