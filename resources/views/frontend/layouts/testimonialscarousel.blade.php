        <div class="bg-[#ffffff]">

            <div class="container mx-auto px-4 sm:px-6 2xl:px-20 pb-10 lg:pb-16 lg:pb-20 overflow-x-hidden">
                <div class="mt-5 md:mt-10 lg:mt-20 mb-5 md:mb-10 lg:mb-20">
                    <h2 class="affordable-price">Travel the Right Way — With Comfort, Care, and Faith</h2>
                    <div class="flex justify-between mt-5">
                        <p class="affordable-price-p d-block">We Specialize in Muslim-Friendly Travel
 Every package is designed <br/> to honor Islamic values, halal meals, prayer-friendly stops, and hotels close to Haram. </p>

                    </div>

                    <div class="relative mb-5">

                        <div id="scroll-container3"
                            class="mt-5 sm:mt-8 md:mt-10 lg:mt-16 mb-4 flex gap-5 scroll-none overflow-x-auto">
                            @php
                            use App\Models\Testimonials;
                            $testimonials = Testimonials::where('status',1)->orderBy('testimonials_sort','asc')->limit(10)->get();
                            @endphp
                            @if ($testimonials->count() > 0)
                                @php
                                $i = 1;
                                @endphp
                                @foreach ($testimonials as $testimonial)
                            <div class="img-card-width">
                                <img src="{{ asset('uploads/testimonials/' . $testimonial->testimonials_image) }}" class="h-auto max-w-full"
                                    alt="">
                            </div>
                                @php
                                $i++;
                                @endphp
                                @endforeach
                            @endif
                        </div>

                        <div class="circle lg:mt-5 absolute right-0 z-10" onclick="scrollRight3()">
                            <img src="{{ asset('frontend/assets/images/left-arrow.svg') }}"
                                class="img-2 h-auto w-4 md:w-6 rotate-180" alt="">
                        </div>
                        <div class="circle lg:mt-5 absolute right-10 lg:right-20 z-10" onclick="scrollleft3()">
                            <img src="{{ asset('frontend/assets/images/right-arrow.svg') }}"
                                class="img-2 h-auto w-4 md:w-6 rotate-180" alt="">
                        </div>

                    </div>
                </div>
            </div>
        </div>