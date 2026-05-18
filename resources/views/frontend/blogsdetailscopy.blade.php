@extends('frontend.layouts.innerblogdetails')

@section('main-container')

<div class="my-main-class ">
    <div class="row ">
        <div class="col-lg-5 col-md-12 backround-img display-block">
            <h3 class="Logo text-center "><a href="{{ url('') }}"><img src="{{ asset('uploads/settings/'.get_siteinfo('header_logo')) }}" alt="{{ get_siteinfo('setting_name') }}"></a></h3>
            <div class="d-flex justify-content-center flex-column align-items-center custome-margin-top ">
                <div class="blurr-background  ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/QSS0X9XAT6E" loading="lazy" frameborder="0"
                        allowfullscreen class="iframe-tag"></iframe>
                </div>

            </div>
            <div class="container custome-margin-top">
                <div class="d-flex justify-content-center mt-5">
                    <a href="{{ url('beat-my-price') }}" class="beat-price-btn mt-5">Beat my price</a>
                </div>
                <div class="container mt-5 d-flex justify-content-center align-items-center flex-row custome-gap">
                    <div class="">
                        <p class="Available">Available 24/7</p>
                        <p class="phone-no-company">UAN <span class="phone-no"><a href="tel:{{ get_siteinfo('setting_phone') }}">{{ get_siteinfo('setting_phone') }}</a></span></p>
                    </div>
                    <div class="">
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
                            <h3 class="Logo"><a href="{{ url('') }}"><img
                                src="{{ asset('uploads/settings/' . get_siteinfo('header_logo')) }}"
                                alt="{{ get_siteinfo('setting_name') }}"></a></h3>
                        </div>
                        <hr class="line">
                        <div class="">
                            <nav class="navbar  fixed-top">
                                <div class="container-fluid">
                                    <a class="navbar-brand" href="tel:{{ get_siteinfo('setting_phone') }}">
                                        <p class="phone-no-company">UAN <span class="phone-no">{{ get_siteinfo('setting_phone') }}</span>
                                        </p>
                                    </a>
                                    <div>
                                        <a href="https://api.whatsapp.com/send?phone={{ str_replace(' ', '', get_siteinfo('setting_whatsappno')) }}&amp;text=Hi,I%20would%20like%20to%20contact%20you"
                                            target="_blank"><img
                                                src="{{ url('frontend/assets/images/wattsapp-image.svg') }}"
                                                class="wattsapp-icon me-3" alt=""></a>
                                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                                            data-bs-target="#navbarMenuLarge" aria-controls="offcanvasNavbar"
                                            aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"></span>
                                        </button>
                                    </div>
                                    <div class="offcanvas offcanvas-end" tabindex="-1" id="navbarMenuLarge"
                                        aria-labelledby="offcanvasNavbarLabel">
                                        <div class="offcanvas-header">
                                            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Know More About Us
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                                aria-label="Close"></button>
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

        <div class="col-lg-7 col-md-12 scrollable-section">
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
            <div class=" article-container custome-margin-top ms-5 me-5 col-lg-10 col-sm-11">
                @if ($blog)
                <div class="post-section ">
                    <p class="post-date">{{ get_formated_date($blog->blogs_date,"d M, Y") }}</p>
                    <h3 class="post-title mb-4">{{ $blog->blogs_name }}</h3>
                    <p class="post-author mb-5">By: <span class="post-author-span">{{ $blog->blogs_author }}</span></p>
                    <p class="post-content mb-5">{!! $blog->blogs_details !!}</p>
                    <img class="img-fluid mb-5" src="{{ asset('uploads/blogs/'.$blog->blogs_image) }}" alt="Kaaba">
                </div>
                @endif
            </div>

            <div class=" ms-5 me-5 mt-5 mb-5">
                <h3 class="Latest-blog">Latest blogs and news</h3>
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
                        <!--<a class="show-more-link mt-4">Show More</a>-->
                    </div>
                </div>
                
                @include('frontend.layouts.footer')

            </div>

        </div>
    </div>
@endsection