                <div class="col-12 float-start">
                    <h3 class="page_sub_heading mb-0 mt-5 mb-lg-4 mt-lg-5 text-center">What our Pilgrims Say</h3>
                    <div class="clearfix"></div>
                    <p class="page_sub_heading_text text-center">Haq Travels is an Excellent Rated Company. Look what
                        our Customers are saying</p>
                    <div class="row mt-0 ms-0 me-0 mb-2 p-3 mb-lg-3 p-lg-5">
                        <!-- Testimonials Slider-->
                        <div id="TestimonialsSlider" class="carousel slide">
                            <div class="carousel-inner">
                            @php
                            use App\Models\Testimonials;
                            $testimonials = Testimonials::where('status',1)->orderBy('testimonials_sort','asc')->limit(10)->get();
                            @endphp
                            @if ($testimonials->count() > 0)
                                @php
                                $i = 1;
                                @endphp
                                @foreach ($testimonials as $testimonial)
                                <div class="carousel-item @if ($i == 1) active @endif text-center">
                                    <img src="{{ asset('uploads/testimonials/' . $testimonial->testimonials_image) }}" class="w-80" alt="...">
                                </div>
                                @php
                                $i++;
                                @endphp
                                @endforeach
                            @endif
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#TestimonialsSlider"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#TestimonialsSlider"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <!-- Testimonials Slider-->
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
                <a href="{{ url('/reviews') }}" class="btn_showmore mb-5">See all testimonials</a>
                <div class="clearfix"></div>