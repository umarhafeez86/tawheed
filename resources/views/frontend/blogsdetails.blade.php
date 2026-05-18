@extends('frontend.layouts.innerblog')

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
    
    <div class="bg-[#F3FDFF]">
        <div class="container mx-auto px-4 sm:px-6 2xl:px-20 overflow-hidden">
            <div class="grid grid-cols-12 gap-5 sm:gap-8 md:gap-12 lg:gap-16">
                <div class="col-span-12 lg:col-span-7">

                    <div id="blogsData">
                        @if ($blog)
                            <div class=" mt-5 sm:mt-8 md:mt-14 lg:mt-20">
                                <h2 class="mt-2 lg:mt-4 tips">{{ $blog->blogs_name }}</h2>
                                  <img src="{{ asset('uploads/blogs/'.$blog->blogs_image) }}" class="h-auto max-w-full" alt="{{ $blog->blogs_name }}">
                                <p class="mt-4 lg:mt-6 blog_written">
                                    {{-- get_formated_date($blog->blogs_date,"M d, Y") --}} <!--span class="separator">|</span--> {{ $blog->blogs_author }}
                                </p>
                                <p class="mt-2 lg:mt-4 tips_p">{!! $blog->blogs_details !!}</p>
                            </div>
                        @endif
                    </div>

                </div>

                <div class="col-span-12 lg:col-span-5">
                    <div class=" mt-5 sm:mt-8 md:mt-14 lg:mt-20">
                        <div class="bg_post d-block">
                            <div class="pt-12 p-8 ps-12">
                                <h2 class="posts">Popular PostS</h2>
                            @php
                                use App\Models\Blogs;
                                $blogsdetails = Blogs::where('blogs_status', 1)
                                    ->orderBy('created_at', 'desc')
                                    ->paginate(3); // Initial load
                            @endphp
                            @foreach ($blogsdetails as $blogsdetail)
                                <div class="mt-5 md:mt-6 lg:mt-8 flex gap-4">
                                    <a href="{{ url('/blog/' . $blogsdetail->blogs_url) }}">
                                    <img src="{{ asset('uploads/blogs/'.$blogsdetail->blogs_image) }}" class="h-auto max-w-full" alt="{{ $blogsdetail->blogs_name }}">
                                    <div>
                                        <h2 class="essential_tips">{{ $blogsdetail->blogs_name }}</h2>
                                        <!--p class="essential_tips_p">{{ get_formated_date($blogsdetail->blogs_date,"M d, Y") }}</p-->
                                        <p class="essential_tips_p">{{ $blogsdetail->blogs_author }}</p>
                                    </div>
                                    </a>
                                </div>
                            @endforeach
                            </div>
                        </div>
                        
                        <!--
                        <div class="bg_post mt-5 sm:mt-8 md:mt-12 lg:mt-16">
                            <div class="pt-5 sm:pt-6 md:pt-8 lg:pt-12 p-5 md:p-6 lg:p-8 ps-5 sm:ps-6 md:ps-8 lg:ps-12">
                                <h2 class="posts">Sign Up for Newsletter</h2>
                                <p class="mt-5 stay_connected">Stay Connected to the Umrah Community Worldwide and Don't
                                    Miss Out on the Latest
                                    Umrah and Umrah Plus Deals!</p>
                                <div class="mt-5">
                                    <label class="block custome-label mb-1">Email Address</label>
                                    <input type="email"
                                        class="w-full border-b border-[#A7D3DD] focus:outline-none focus:border-[#005B68] bg-transparent px-1 py-2">
                                </div>
                                <button class="w-full send-enquiry-btn mt-8">Subscribe</button>

                            </div>
                        </div>

                        <div class="bg_post mt-5 mb-5 sm:mt-8 md:mt-12 lg:mt-16">
                            <div class="pt-5 sm:pt-6 md:pt-8 lg:pt-12 p-5 md:p-6 lg:p-8 ps-5 sm:ps-6 md:ps-8 lg:ps-12">
                                <h2 class="posts">Connect With Us!</h2>
                                <div class="grid grid-cols-5 gap-4 md:gap-5 lg:gap-8 mt-5">
                                    <div class="circle2 rotate-180">
                                        <i class="fab fa-whatsapp fa-lg rotate-180"></i>
                                    </div>
                                    <div class="circle2 rotate-180">
                                        <i class="fab fa-facebook-f fa-lg rotate-180"></i>
                                    </div>
                                    <div class="circle2 rotate-180">
                                        <i class="fab fa-instagram fa-lg rotate-180"></i>
                                    </div>
                                    <div class="circle2 rotate-180">
                                        <i class="fas fa-phone fa-lg rotate-180"></i>
                                    </div>
                                    <div class="circle2 rotate-180">
                                        <i class="fas fa-envelope fa-lg rotate-180"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        -->

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
