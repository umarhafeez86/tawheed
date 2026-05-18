@extends('frontend.layouts.main')
@section('main-container')
    @php
        use App\Models\Sliders;
        $slider = Sliders::where('sliders_status', 1)->orderBy('sliders_sort', 'desc')->first();
    @endphp
    @if ($slider)

        <body
            @if ($slider->sliders_image != '') style="background: url('{{ asset('uploads/sliders/' . $slider->sliders_image) }}') top center; background-size: cover; background-repeat: no-repeat;" @endif>

    <!-- Fixed Icon Section -->
    <div class="toprighticonsbar d-none d-sm-none d-md-block">
        <a href="#abouthaqtravels" data-bs-toggle="modal" data-bs-target="#abouthaqtravels" class="toprighticons">
            <span>About Us</span></a>
        <div class="clearfix"></div>
    </div>

<div class="modal fade" id="abouthaqtravels" tabindex="-1" aria-labelledby="abouthaqtravels" aria-hidden="true">
  <div class="modal-dialog modal-lg custom-modal-style">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="abouthaqtravels">{{ $page_name }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        {!! $pages_details !!}
      </div>
    </div>
  </div>
</div>

    <!-- Fixed Icon Section -->

            <div class="container-fluid text-center bg-image d-flex flex-column align-items-center m-0 p-0">
                <a href="{{ url('') }}"><img src="{{ asset('uploads/settings/' . get_siteinfo('header_logo')) }}"
                        alt="{{ get_siteinfo('setting_name') }}" class="intrologo mt-5"></a>
                <div class="custome-mergin">
                    <h2 class="devine-journy justify-content-center">{{ $slider->sliders_heading }}</h2>
                    <p class="makkah-p">{{ $slider->sliders_subheading }}</p>
                    <p class="devine-journy-p">{!! str_replace(['<p>', '</p>'], ['', ''], $slider->sliders_textdetails) !!}</p>
                    <div class="buttons-background align-items-center mt-4">
                        <a href="{{ url('umrah-packages') }}" class="Umrah-button">Umrah</a>
                        <a href="{{ url('hajj-packages') }}" class="hajj-button">Hajj</a>
                        <a href="{{ url('beat-my-price') }}" class="book-pakage">Beat My Price</a>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="col-12 mt-2 float-start position-fixed footer-logos-intro">
                    <div class="container">
                        <div class="col-12 col-sm-6 col-md-12 col-lg-8 text-center ms-auto me-auto">
                            <img src="{{ url('frontend/assets/images/icon_atol.png') }}" class=" me-2 mb-2" alt="">
                            <img src="{{ url('frontend/assets/images/icon_iata.png') }}" class="me-2 mb-2" alt="">
                            <img src="{{ url('frontend/assets/images/icon_ministryofsaudia-intro.png') }}"
                                class="me-2 mb-2 ministrylogo" alt="">
                            <a href="https://www.trustpilot.com/review/haqtravels.co.uk" target="_blank"><img
                                    src="{{ url('frontend/assets/images/icon_trustpilot.png') }}" class="me-3 mb-2"
                                    alt=""></a>
                            <a href="https://goo.gd/8li4c" target="_blank"><img
                                    src="{{ url('frontend/assets/images/icon_google.png') }}" class="me-2"
                                    alt=""></a>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
            <script src="{{ url('frontend/assets/js/jquery-3.7.1.min.js') }}"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
            </script>


        </body>
    @endif
@endsection
