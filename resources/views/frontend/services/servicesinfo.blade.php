@extends('frontend.layouts.innerselectmonth')

@section('main-container')
    <div class="background-color text-white">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 backround-image hide-on-small-screens">
                    <h3 class="Logo mt-4">
                        <a href="{{ url('') }}"><img
                                src="{{ asset('uploads/settings/' . get_siteinfo('header_logo')) }}"
                                alt="{{ get_siteinfo('setting_name') }}"></a>
                    </h3>
                    <p class="enquire-for-umrah custom-mt">
                        Enquire for Umrah packages
                    </p>
                    <div class="sign-up-for-umrah">
                        <form name="enquiryform" id="enquiryform" class="p-4 rounded ms-auto me-auto">
                        @csrf
                            <input type="hidden" name="estimate_packagetype" id="estimate_packagetype" value="Umrah" />
                            <div class="mb-3">
                                <label for="name" class="custome-label mb-2">Name</label>
                                <input type="text" class="input-filds" name="estimate_fullname" id="estimate_fullname"
                                    placeholder="Full name" required />
                            </div>
                            <div class="mb-3">
                                <label for="contact" class="custome-label mb-2">Contact Number</label>
                                <input type="text" class="input-filds" name="estimate_phoneno" id="estimate_phoneno"
                                    placeholder="" required />
                            </div>
                            <div class="mb-3">
                                <label for="enquiry" class="custome-label mb-2">Enquiry Message</label>
                                <textarea class="input-filds" name="estimate_msg" id="estimate_msg" rows="3"
                                    placeholder="Write your enquiry"></textarea>
                            </div>
                            <div class="mb-3" id="enquiryform_msg"></div>
                            <button type="button" class="submit-enquiry" onclick="submitenquiry();">
                                Send Enquiry
                            </button>
                        </form>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="{{ url('beat-my-price') }}" class="beat-price-btn mt-5">Beat my
                            price</a>
                    </div>
                    <div class="mt-4 d-flex align-items-center justify-content-between ms-auto me-auto col-8">
                        <div>
                            <p class="Available">Available 24/7</p>
                            <p class="phone-no-company">
                                UAN
                                <span class="phone-no"><a href="tel:{{ get_siteinfo('setting_phone') }}">{{ get_siteinfo('setting_phone') }}</a></span>
                            </p>
                        </div>
                        <div>
                            <a href="https://api.whatsapp.com/send?phone={{ str_replace(' ', '', get_siteinfo('setting_whatsappno')) }}&amp;text=Hi,I%20would%20like%20to%20contact%20you"
                                target="_blank"><img class="blur-wattsapp-img" src="{{ url('frontend/assets/images/icon-call.png') }}"
                                    alt="" /></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 scrollable-section g-0">
                    <div class="hide-on-small-screens ms-5">
                        <ul class="list-unstyled mb-1 d-flex flex-row flex-wrap mt-5 gap-3">
                            <li>
                                <a href="{{ url('/beat-my-price') }}"
                                    class="text-decoration-none custome-li-alignments">Beat My Price</a>
                            </li>
                            <li>
                                <a href="{{ url('/umrah-packages') }}"
                                    class="text-decoration-none custome-li-alignments">Umrah Packages</a>
                            </li>
                            <li>
                                <a href="{{ url('/hajj-packages') }}"
                                    class="text-decoration-none custome-li-alignments">Hajj Packages</a>
                            </li>
                            <li>
                                <a href="{{ url('/services/ramdan-umrah-package') }}"
                                    class="text-decoration-none custome-li-alignments">Ramadan Packages</a>
                            </li>
                            <li class="me-3">
                                <a href="{{ url('/blogs') }}"
                                    class="text-decoration-none custome-li-alignments">Blogs</a>
                            </li>
                            <li class="me-3">
                                <a href="{{ url('/compare-packages') }}"
                                    class="text-decoration-none custome-li-alignments">Comparing</a>
                            </li>
                            <li>
                                <a href="{{ url('/favorites-packages') }}">
                                    <img src="{{ url('frontend/assets/images/heart-icon.svg') }}" class="img-class" alt="" />
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="backround-image show-on-small-screens">
                        <div class="row">
                            <h3 class="Logo mt-5">
                                <a href="{{ url('') }}"><img
                                        src="{{ asset('uploads/settings/' . get_siteinfo('header_logo')) }}"
                                        alt="{{ get_siteinfo('setting_name') }}"></a>
                            </h3>
                        </div>
                        <hr class="line" />
                        <div class="ms-5">
                            <nav class="navbar fixed-top">
                                <div class="container-fluid">
                                    <!-- <a class="navbar-brand"> -->
                                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                                            data-bs-target="#navbarMenuLarge" aria-controls="offcanvasNavbar"
                                            aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"></span>
                                        </button>
                                    <!-- </a> -->
                                    <div>
                                        <img src="{{ url('frontend/assets/images/yellow-border-heart.svg') }}" class="img-fluid m-2" alt="">
                                        <a href="https://api.whatsapp.com/send?phone=+442081451117&amp;text=Hi,I%20would%20like%20to%20contact%20you"
                                            target="_blank"><img src="{{ url('frontend/assets/images/wattsapp-image.svg') }}"
                                                class="wattsapp-icon me-3" alt="" /></a>
                                      
                                    </div>
                                    <div class="offcanvas offcanvas-end" tabindex="-1" id="navbarMenuLarge"
                                        aria-labelledby="offcanvasNavbarLabel">
                                        <div class="offcanvas-header">
                                            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                                                Know More About Us
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="offcanvas-body">
                                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                                <li class="nav-item">
                                                    <a class="nav-link"
                                                        href="{{ url('/beat-my-price') }}">Beat My
                                                        Price</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link"
                                                        href="{{ url('/umrah-packages') }}">Umrah
                                                        Packages</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link"
                                                        href="{{ url('/hajj-packages') }}">Hajj
                                                        Packages</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link"
                                                        href="{{ url('/services/ramdan-umrah-package') }}">Ramadan
                                                        Packages</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link"
                                                        href="{{ url('/blogs') }}">Blogs</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </nav>
                        </div>
                       <div class="d-flex align-items-center justify-content-center">
                         <p class="umrah-pkg">Umrah Packages</p>
                       </div>
                        <!-- <button type="button" class="all-btn2" data-bs-toggle="modal" data-bs-target="#enquirymodal">
                            Send Enquiry
                        </button> -->
                        <div class="position1 ms-2">
                            <a href="" class="all-btn2" data-bs-toggle="modal" data-bs-target="#enquirymodal"> Send Enquiry</a>
                            <img src="{{ url('frontend/assets/images/compare-white.svg') }}" alt="" />
                        </div>
                        <div class="position2">
                            <p class="phone-no-company">
                                UAN <a href="tel:{{ get_siteinfo('setting_phone') }}" class="phone-no">{{ get_siteinfo('setting_phone') }}</a>
                            </p>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="enquirymodal" tabindex="-1" aria-labelledby="enquirymodal"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body custom-modal-content">
                                        <button type="button" class="btn-close btn-close-white float-end"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                        <form name="enquiryformmob" id="enquiryformmob"
                                            class="p-4 rounded ms-auto me-auto">
                                            @csrf
                                            <input type="hidden" name="estimate_packagetype" id="estimate_packagetype2"
                                                value="Umrah">
                                            <div class="mb-3">
                                                <label for="name" class="custome-label mb-2">Name</label>
                                                <input type="text" class="input-filds" name="estimate_fullname"
                                                    id="estimate_fullname2" placeholder="Full name" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="contact" class="custome-label mb-2">Contact Number</label>
                                                <input type="text" class="input-filds" name="estimate_phoneno"
                                                    id="estimate_phoneno2" placeholder="" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="enquiry" class="custome-label mb-2">Enquiry Message </label>
                                                <textarea class="input-filds" name="estimate_msg" id="estimate_msg2" rows="3"
                                                    placeholder="Write your enquiry"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <div class="mb-3" id="enquiryformmob_msg"></div>
                                            </div>
                                            <button type="button" class="submit-enquiry"
                                                onclick="submitenquirymob();">Send Enquiry</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 mb-5 ms-5 me-3 Affordable-pakages">
                        <h2>Browse All Affordable Packages</h2>
                        <p class="mt-5">
                            Urna, massa aliqua dui pellentesque. Ac, gravida in. Diam vitae,
                            nec mattis lectus quam
                        </p>
                        <div class="sign-up-for-umrahh mt-5">
                            <form name="enquiryform_new" id="enquiryform_new" class="p-4 rounded ms-auto me-auto" action="" method="POST">
                            @csrf
                                <input type="hidden" name="estimate_packagetype" id="estimate_packagetype"
                                    value="Umrah" />
                                <input type="hidden" name="packagenights" id="packagenights"
                                    value="" />
                                    
                                <div class="mb-3">
                                    <label for="month" class="custome-label mb-2">Select Month</label>
                                    <div class="mb-3">
                                        <div class="position-relative">
                                                <select class="form-select custom-select @error('selmonth') is-invalid @enderror"
                                                    name="selmonth" id="selmonth">
                                                    <option value="">--- Select  ---</option>
                                                    @php
                                                        use App\Models\Services;
                                                        $servicedetails = Services::where('services_status', 1)
                                                            ->orderBy('services_sort', 'asc')
                                                            ->limit(20)
                                                            ->get();
                                                    @endphp
                                                    @if ($servicedetails->count() > 0)
                                                        @foreach ($servicedetails as $servicedetail)
                                                    <option value="{{ url('/services/' . $servicedetail->services_url) }}">{{ $servicedetail->services_name }}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                                @error('selmonth')
                                                    <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                         </div>
                                    </div>
                                </div>

                                <input type="hidden" name="estimate_packagetype" id="estimate_packagetype"
                                    value="Umrah" />
                                <div class="mb-3">
                                    <label for="month" class="custome-label mb-2">Select Hotels</label>
                                    <div class="mb-3">
                                        <div class="position-relative">
                                            <select class="form-select custom-select @error('roomtype') is-invalid @enderror"
                                                name="roomtype" id="roomtype">
                                                <option value="">--- Select  ---</option>
                                                @php
                                                $filter_stars = explode(',', get_siteinfo('filter_star_values'));
                                                @endphp
                                                @foreach ($filter_stars as $filter_star)
                                                <option value="{{ $filter_star }}">{{ $filter_star }} Stars</option>
                                                @endforeach
                                            </select>
                                            @error('roomtype')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                                </div>
                                    </div>
                                </div>
                                <button type="button" class="submit-enquiry" onclick="submitfiler2();">
                                    Find Packages
                                </button>
                            </form>
                        </div>
                    </div>

                    @include('frontend.layouts.footer')

                </div>
            </div>
        </div>
    </div>
@endsection
