@extends('frontend.layouts.innerblog')

@section('main-container')

<div>
    <div class="row">
      <div class="col-lg-5 d-flex flex-column  align-items-center backround-image display-block ">
        <h3 class="Logo text-center "><a href="{{ url('') }}"><img src="{{ asset('uploads/settings/'.get_siteinfo('header_logo')) }}" alt="{{ get_siteinfo('setting_name') }}"></a></h3>
        <div class="custome-margin-top mb-4 ">
          <div class="blrr-background">
            <div class="row full-height-row">
              <div class="col-lg-6  col-md-12 col-sm-12 ms-4  mt-3 mb-3 ">
                <div class="ratio ratio-16x9 ">
                  <iframe src="https://www.youtube.com/embed/QSS0X9XAT6E" loading="lazy" frameborder="0"
                  allowfullscreen class="iframe-tag"></iframe>
                </div>

              </div>
              <div class="col-lg-5 col-md-12 col-sm-12">
                <span class="customer-review mt-2 d-block">Customer Review Demo Travels</span>
                <div>
                  <img class="mt-xxl-4 mt-xl-3 mt-lg-2 mt-md-1 img-1" src="{{ url('/frontend/assets/images/reviws.png' ) }}" alt="">
                  <img class="img-2 mt-2" src="{{ url('/frontend/assets/images/certificates.png' ) }}" alt="">
                </div>
                <div class="mt-xxl-5 mt-xl-4 mt-lg-3 mt-md-1">
                  <h3 class="Customer-in-no">65K+ <span class="Customer">Happy Customer</span></h3>
                </div>
              </div>

            </div>
          </div>
          <div class="d-flex justify-content-center mt-5">
            <a href="{{ url('beat-my-price') }}" class="beat-price-btn mt-5">Beat my price</a>
          </div>
          <div class=" mt-5 d-flex  justify-content-between ms-auto me-auto col-12">
            <div>
              <p class="Available">Available 24/7</p>
              <p class="phone-no-company">UAN <span class="phone-no"><a href="tel:{{ get_siteinfo('setting_phone') }}">{{ get_siteinfo('setting_phone') }}</a></span></p>
            </div>
            <div>
              <a href="https://api.whatsapp.com/send?phone={{ str_replace(' ', '',get_siteinfo('setting_whatsappno')) }}&amp;text=Hi,I%20would%20like%20to%20contact%20you" target="_blank"><img class="blur-wattsapp-img" src="{{ url('/frontend/assets/images/wattsapp-image.svg') }}" alt=""></a>
            </div>
          </div>
        </div>
      </div>
      <div class="d backround-image display-none">
        <div class="">
          <div class="  ">
            <div class=" ">
              <div class="row">
                <h3 class="Logo"><a href="{{ url('') }}"><img src="{{ asset('uploads/settings/'.get_siteinfo('header_logo')) }}" alt="{{ get_siteinfo('setting_name') }}"></a></h3>
              </div>
              <hr class="line">
              <div class="">
                <nav class="navbar  fixed-top">
                  <div class="container-fluid">
                    <a class="navbar-brand" href="tel:{{ get_siteinfo('setting_phone') }}">
                      <p class="phone-no-company">UAN <span class="phone-no">{{ get_siteinfo('setting_phone') }}</span></p>
                    </a>
                    <div>
                      <a href="https://api.whatsapp.com/send?phone={{ str_replace(' ', '',get_siteinfo('setting_whatsappno')) }}&amp;text=Hi,I%20would%20like%20to%20contact%20you" target="_blank"><img src="{{ url('/frontend/assets/images/wattsapp-image.svg') }}" class="wattsapp-icon me-3" alt=""></a>
                      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#navbarMenuLarge" aria-controls="offcanvasNavbar"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                    </div>
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="navbarMenuLarge"
                      aria-labelledby="offcanvasNavbarLabel">
                      <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Know More About Us</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                      </div>
                      <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

                          <li class="nav-item">
                              <a class="nav-link" href="{{ url('/beat-my-price') }}">Beat My Price</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="{{ url('/umrah-packages') }}">Umrah
                                  Packages</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="{{ url('/hajj-packages') }}">Hajj
                                  Packages</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link " href="{{ url('/services/ramdan-umrah-package') }}">Ramadan Packages</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="{{ url('/blogs') }}">Blogs</a>
                          </li>
                      </ul>

                      </div>
                    </div>

                  </div>
                </nav>

              </div>
              <p class="devine-journy">Blogs</p>
            </div>



          </div>


        </div>
      </div>
      <div class="col-lg-7 scrollable-section">
        <ul
                                class="list-unstyled d-flex flex-row flex-wrap align-items-center justify-content-center mt-5 gap-5 display-block">
                                <li><a href="{{ url('/beat-my-price') }}" class="text-decoration-none custome-li-alignments ms-4">Beat My Price</a></li>
                                <li><a href="{{ url('/umrah-packages') }}" class="text-decoration-none custome-li-alignments">Umrah Packages</a>
                                </li>
                                <li><a href="{{ url('/hajj-packages') }}" class="text-decoration-none custome-li-alignments">Hajj Packages</a>
                                </li>
                                <li><a href="{{ url('/services/ramdan-umrah-package') }}" class="text-decoration-none custome-li-alignments">Ramadan Packages</a></li>
                                <li class="me-3"><a href="{{ url('/blogs') }}"
                                        class="text-decoration-none custome-li-alignments">Blogs</a></li>
                            </ul>
        <div class=" ms-5 me-5 mt-5 mb-5">
          <h3 class="Latest-blog">Latest blogs and news</h3>
          <p class="Latest-blog-p mt-5">&nbsp;</p>
          <div>


            @php
            use App\Models\Blogs;
            $blogsdetails = Blogs::where('blogs_status',1)->orderBy('created_at','desc')->limit(4)->get();
            @endphp
            @if ($blogsdetails->count() > 0)
            @foreach ($blogsdetails as $blogsdetail)
                <div class="d-flex  mt-5 gap-4 ">
                  <div class="col-3 float-start"><a href="{{ url('/blogs/'.$blogsdetail->blogs_url) }}"><img src="{{ asset('uploads/blogs/'.$blogsdetail->blogs_image) }}" alt="{{ $blogsdetail->blogs_name }}" class="img-fluid"></a></div>
                  <div>
                    <h3 class="umrah-blog"><a href="{{ url('/blogs/'.$blogsdetail->blogs_url) }}">{{ $blogsdetail->blogs_name }}</a></h3>
                    <p class="umrah-blog-p">{!! strlen($blogsdetail->blogs_details) > 100 ? substr($blogsdetail->blogs_details, 0, 100) . '...' : $blogsdetail->blogs_details !!}</p>
                  </div>
                </div>
            @endforeach
            @endif

          </div>
          <div class="row mt-4">
            <div class="col-12 text-center">
              <!--a class="show-more-link mt-4">Show More</a-->
            </div>
          </div>

          @include('frontend.layouts.footer')

        </div>
      </div>
    </div>
  </div>

@endsection