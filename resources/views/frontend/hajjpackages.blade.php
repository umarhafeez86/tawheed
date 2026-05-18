@extends('frontend.layouts.innerhajjpackages')

@section('main-container')
    <div class="bg-[#F3FDFF] h-[100px] md:h-[150px] lg:h-[200px]">
        <div class="container mx-auto px-4 sm:px-6 2xl:px-20 ">
            <div class="bg-about w-full max-w-[1542px] mx-auto absolute top-10 left-0 right-0 mx-auto width-on-small">
                <div class="px-4 sm:px-6 2xl:px-20">
                    <div class=" bg-heading">
                        <div class="p-4 md:p-6 lg:p-8 flex justify-between">
                            <h2 class="tawheed_travels px-5 flex justify-center items-center">
                                {{ $page_name }}
                            </h2>
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
                <div id="packagefiltershome">
                        @php
                            use App\Models\Packages;
                            $packages = Packages::where('packages_status', 1)->orderBy('packages_sort', 'asc')->get();
                        @endphp

                        
                        @foreach ($packages as $package)
                                <div class="">
                                    <div
                                        class="card-width-new w-full max-w-full bg-[#FFF] rounded-[50px] mt-4 sm:mt-5 md:mt-8 lg:mt-10 grid grid-cols-12">
                                        <div class="col-span-12 lg:col-span-3">
                                            <img src="{{ asset('uploads/packages/' . $package->packages_image) }}"
                                                class="rounded-[50px] w-full" alt="{{ $package->packages_name }}">
                                        </div>
                                        <div class="col-span-12 sm:col-span-6 md:col-span-6 lg:col-span-6 xl:col-span-6 pl-5 pr-5 pt-5 2xl:p-8 hidden md:block">

                                                <h5 class="mb-3 lg:mb-6 card-h">
                                                    {{ $package->packages_name }}</h5>

                                            <p class="mb-4 destination">
                                                {{ $package->packages_tag }}
                                            </p>
                                            <p class="mb-5 destination">
                                                {{ $package->packages_info }} - * {!! $package->packages_details !!}
                                            </p>

                                        </div>
                                        <div class="col-span-12 sm:col-span-3 md:col-span-3 lg:col-span-3 xl:col-span-3 pl-5 pr-5 pt-5 2xl:p-8 hidden md:block">
                                            <div class="flex justify-between items-start h-auto relative">
                                                <!-- Vertical line -->
                                                <div class="card_breaker h-auto w-[1px] bg-[#005B68]/30"></div>

                                                <!-- Star + price -->
                                                <div class="flex flex-col items-end gap-2 pl-4">
                                                    <div class="mt-2 xl:mt-2">
                                                        <!-- Price -->
                                                        <p class="price">{{ get_siteinfo('currency_symbol') }}
                                                            {{ $package->packages_price }} <span
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
                                                                <a href="{{ url('/beat-my-price') }}"
                                                                    class="view-details_btn">Book Now</a>
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

                                                            {{ $package->packages_name }}
                         
                                                    </h5>
                                                </div>
                                                <p class="mb-3 destination">{{ $package->packages_tag }}/p>



                                                <div class="card-breaker mb-8"></div>

                                                <div class="flex justify-between mb-3">
                                                    <div class="prices">
                                                        <h3>{{ get_siteinfo('currency_symbol') }}
                                                            {{ $package->packages_price }}</h3>
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
                                                            <a href=""
                                                                class="view-details">Book Now</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Mobile View -->

                                    </div>
                                </div>

                                <div class="">
                                    <div
                                        class="card-width-new w-full max-w-full bg-[#FFF] rounded-[50px] mt-4 sm:mt-5 md:mt-8 lg:mt-10 grid grid-cols-12">
                                        <div class="col-span-12 lg:col-span-3">
                                            <img src="{{ asset('uploads/packages/' . $package->packages_image) }}"
                                                class="rounded-[50px] w-full" alt="{{ $package->packages_name }}">
                                        </div>
                                        <div class="col-span-12 sm:col-span-6 md:col-span-6 lg:col-span-6 xl:col-span-6 pl-5 pr-5 pt-5 2xl:p-8 hidden md:block">

                                                <h5 class="mb-3 lg:mb-6 card-h">
                                                    {{ $package->packages_name }}</h5>

                                            <p class="mb-4 destination">
                                                {{ $package->packages_tag2 }}
                                            </p>
                                            <p class="mb-5 destination">
                                                {{ $package->packages_info }} - * {!! $package->packages_details !!}
                                            </p>

                                        </div>
                                        <div class="col-span-12 sm:col-span-3 md:col-span-3 lg:col-span-3 xl:col-span-3 pl-5 pr-5 pt-5 2xl:p-8 hidden md:block">
                                            <div class="flex justify-between items-start h-auto relative">
                                                <!-- Vertical line -->
                                                <div class="card_breaker h-auto w-[1px] bg-[#005B68]/30"></div>

                                                <!-- Star + price -->
                                                <div class="flex flex-col items-end gap-2 pl-4">
                                                    <div class="mt-2 xl:mt-2">
                                                        <!-- Price -->
                                                        <p class="price">{{ get_siteinfo('currency_symbol') }}
                                                            {{ $package->packages_price2 }} <span
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
                                                                <a href="{{ url('/beat-my-price') }}"
                                                                    class="view-details_btn">Book Now</a>
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

                                                            {{ $package->packages_name }}
                         
                                                    </h5>
                                                </div>
                                                <p class="mb-3 destination">{{ $package->packages_tag2 }}/p>



                                                <div class="card-breaker mb-8"></div>

                                                <div class="flex justify-between mb-3">
                                                    <div class="prices">
                                                        <h3>{{ get_siteinfo('currency_symbol') }}
                                                            {{ $package->packages_price2 }}</h3>
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
                                                            <a href=""
                                                                class="view-details">Book Now</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Mobile View -->

                                    </div>
                                </div>

                                <div class="">
                                    <div
                                        class="card-width-new w-full max-w-full bg-[#FFF] rounded-[50px] mt-4 sm:mt-5 md:mt-8 lg:mt-10 grid grid-cols-12">
                                        <div class="col-span-12 lg:col-span-3">
                                            <img src="{{ asset('uploads/packages/' . $package->packages_image) }}"
                                                class="rounded-[50px] w-full" alt="{{ $package->packages_name }}">
                                        </div>
                                        <div class="col-span-12 sm:col-span-6 md:col-span-6 lg:col-span-6 xl:col-span-6 pl-5 pr-5 pt-5 2xl:p-8 hidden md:block">

                                                <h5 class="mb-3 lg:mb-6 card-h">
                                                    {{ $package->packages_name }}</h5>

                                            <p class="mb-4 destination">
                                                {{ $package->packages_tag3 }}
                                            </p>
                                            <p class="mb-5 destination">
                                                {{ $package->packages_info }} - * {!! $package->packages_details !!}
                                            </p>

                                        </div>
                                        <div class="col-span-12 sm:col-span-3 md:col-span-3 lg:col-span-3 xl:col-span-3 pl-5 pr-5 pt-5 2xl:p-8 hidden md:block">
                                            <div class="flex justify-between items-start h-auto relative">
                                                <!-- Vertical line -->
                                                <div class="card_breaker h-auto w-[1px] bg-[#005B68]/30"></div>

                                                <!-- Star + price -->
                                                <div class="flex flex-col items-end gap-2 pl-4">
                                                    <div class="mt-2 xl:mt-2">
                                                        <!-- Price -->
                                                        <p class="price">{{ get_siteinfo('currency_symbol') }}
                                                            {{ $package->packages_price3 }} <span
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
                                                                <a href="{{ url('/beat-my-price') }}"
                                                                    class="view-details_btn">Book Now</a>
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

                                                            {{ $package->packages_name }}
                         
                                                    </h5>
                                                </div>
                                                <p class="mb-3 destination">{{ $package->packages_tag3 }}/p>



                                                <div class="card-breaker mb-8"></div>

                                                <div class="flex justify-between mb-3">
                                                    <div class="prices">
                                                        <h3>{{ get_siteinfo('currency_symbol') }}
                                                            {{ $package->packages_price3 }}</h3>
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
                                                            <a href=""
                                                                class="view-details">Book Now</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Mobile View -->

                                    </div>
                                </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
