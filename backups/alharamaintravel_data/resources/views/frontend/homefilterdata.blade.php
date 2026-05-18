<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

<!-- Swiper Container -->
<div class="swiper-container2 col-12 float-start">
            <div class="swiper-wrapper">
                @if ($servicepackages->count() > 0)
                @foreach ($servicepackages as $servicepackage)
                <div class="swiper-slide">
                    <div class="col-12 float-start packagebox3">
                            <div class="col-12 float-start">
                                <img src="{{ asset('uploads/servicepackages/'.$servicepackage->servicepackages_image) }}" alt="" class="img-fluid">
                            </div>
                            <div class="col-12 float-start packageinfosec position-relative">
                                <div class="priceinfoblock position-absolute">{{ get_siteinfo('currency_symbol') }} {{ $servicepackage->servicepackages_price }}</div>
                                <div class="packageicons">
                                    <div class="col-6 float-start">{{ $servicepackage->servicepackages_totalnights }} Nights</div>
                                    <div class="col-6 float-start">{{ $servicepackage->servicepackages_startype }} Star 
                                            @for ($i = 1; $i<=$servicepackage->servicepackages_startype; $i++) 
                                            <i class="fa fa-star float-end mt-1 me-1"></i>
                                            @endfor
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-12 ps-4 pe-4 float-start packageinfoblock">
                                <h3 class="col-10 packagename3 pt-3 pb-3">{{ $servicepackage->servicepackages_name }}</h3>
                                <div class="clearfix"></div>
                                <div class="col-10 float-start packagetext">
                                        <ul>
                                            <li><span class="iconinfo"><img src="{{ url('frontend/assets/images/icon-makkah.png') }}" alt=""></span> {{ $servicepackage->servicepackages_makkahnights }} Nights Makkah</li>
                                            <li><span class="iconinfo"><img src="{{ url('frontend/assets/images/icon-madinah.png') }}" alt=""></span> {{ $servicepackage->servicepackages_madinahnights }} Nights Makkah</li>
                                            <li><span class="iconinfo"><img src="{{ url('frontend/assets/images/icon-flight.png') }}" alt=""></span> {{ $servicepackage->servicepackages_flightinfo }}</li>
                                        </ul>
                                </div>
                                <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-12 float-start ps-4 pe-4 packagebox3actions">
                                <a href="tel:{{ str_replace(' ', '',get_siteinfo('setting_phone')) }}" class="float-start btncallnow">Call Now</a>
                                <a href="{{ url('/package/'.$servicepackage->servicepackages_url ) }}" class="float-end btnbooknow">Book Now</a>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Navigation -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
</div>
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
  var swiper = new Swiper('.swiper-container2', {
    // Default number of slides per view
    slidesPerView: 3,
    spaceBetween: 20,
	grabCursor: true,    /* Makes it look draggable */
	freeMode: true,      /* Smooth dragging */

    // Breakpoints for responsive design
    breakpoints: {
	  // When window width is >= 0px (sm)
      0: {
        slidesPerView: 1,
        spaceBetween: 5,
      },
      // When window width is >= 576px (sm)
      576: {
        slidesPerView: 1,
        spaceBetween: 30,
      },
      // When window width is >= 768px (md)
      768: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      // When window width is >= 992px (lg)
      992: {
        slidesPerView: 3,
        spaceBetween: 20,
      },
    },

    // Enable loop
    loop: false,

    // Pagination
    pagination: {
      el: '', // .swiper-pagination
      clickable: true,
    },

    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
	    
    // Autoplay
    autoplay: {
      delay: 10000,
      disableOnInteraction: false,
    },
  });
</script>