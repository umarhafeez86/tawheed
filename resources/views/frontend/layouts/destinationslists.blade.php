    <div class="container custome-margin-top custome-margin-bottom">
        @php
            use App\Models\Destinations;
            $destinations_lists = Destinations::where('destinations_status', 1)
                ->orderBy('destinations_sort', 'asc')
                ->get();
        @endphp
        <div class="swiper-header position-relative d-flex align-items-center justify-content-between mb-4">
            <div>
                <h3 class="mb-0 testimonials">Explore World Best Destinations</h3>
            </div>
            <div class="swiper-buttons">
                <button class="custom-prev"></button>
                <button class="custom-next"></button>
            </div>
        </div>
        <p class="testimonials-para">Don’t miss out, secure your spot in top Muslim-friendly locations before the season’s best deals disappear.</p>
        <div class="swiper mySwiper4">
            <div class="swiper-wrapper">
                @foreach ($destinations_lists as $destination)
                    <div class="swiper-slide mt-4 desti-slider">
                        <a href="{{ url('/umrah-with-' . $destination->destinations_url.'-holidays') }}" class="float-start">
                            <div class="position-relative aligin-on-small">
                                <img src="{{ asset('uploads/destinations/' . $destination->destinations_image) }}"
                                    alt="" class="img-fluid desti-img-round">
                            </div>
                            <div class="destination_name mt-2 mb-2 float-start">
                                {{ $destination->destinations_name }}
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
