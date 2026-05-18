@extends('frontend.layouts.innerhajjpackages')

@section('main-container')
<div class="background-color text-white h-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 backround-image hide-on-small">
                <h3 class="Logo mt-4"><a href="{{ url('') }}"><img src="{{ asset('uploads/settings/'.get_siteinfo('header_logo')) }}" alt="{{ get_siteinfo('setting_name') }}"></a></h3>
                <p class="enquire-for-umrah custom-mt">Enquire for Hajj packages</p>
                <div class="sign-up-for-umrah">
                    <form name="enquiryform" id="enquiryform" class="p-4 rounded ms-auto me-auto">
                    @csrf
                        <input type="hidden" name="estimate_packagetype" id="estimate_packagetype" value="Hajj">
                        <div class="mb-3">
                            <label for="name" class="custome-label mb-2">Name</label>
                            <input type="text" class=" input-filds" name="estimate_fullname" id="estimate_fullname" placeholder="Full name" required>
                        </div>
                        <div class="mb-3">
                            <label for="contact" class="custome-label mb-2">Contact Number</label>
                            <input type="text" class=" input-filds" name="estimate_phoneno" id="estimate_phoneno" placeholder="" required>
                        </div>
                        <div class="mb-3">
                            <label for="enquiry" class="custome-label mb-2">Enquiry Message</label>
                            <textarea class=" input-filds" name="estimate_msg" id="estimate_msg" rows="3"
                                placeholder="Write your enquiry"></textarea>
                        </div>
                        <div class="mb-3" id="enquiryform_msg"></div>
                        <button type="button" class="submit-enquiry" onclick="submitenquiry();">Send Enquiry</button>
                    </form>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="{{ url('beat-my-price') }}" class="beat-price-btn mt-5">Beat my price</a>
                </div>
                <div class=" mt-4 d-flex align-items-center justify-content-between ms-auto me-auto col-8">
                    <div>
                        <p class="Available">Available 24/7</p>
                        <p class="phone-no-company">UAN <span class="phone-no"><a href="tel:{{ get_siteinfo('setting_phone') }}">{{ get_siteinfo('setting_phone') }}</a></span></p>
                    </div>
                    <div>
                        <a href="https://api.whatsapp.com/send?phone={{ str_replace(' ', '',get_siteinfo('setting_whatsappno')) }}&amp;text=Hi,I%20would%20like%20to%20contact%20you" target="_blank"><img class="blur-wattsapp-img" src="{{ url('frontend/assets/images/whatsapp.svg') }}" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="show-on-small col-12 float-start  m-0 p-0">
                <div class="backround-image ">
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
                                    <a href="https://api.whatsapp.com/send?phone={{ str_replace(' ', '',get_siteinfo('setting_whatsappno')) }}&amp;text=Hi,I%20would%20like%20to%20contact%20you" target="_blank"><img src="{{ url('frontend/assets/images/wattsapp-image.svg') }}" class="wattsapp-icon me-3" alt=""></a>
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
                    <p class="umrah-pkg">Hajj Packages</p>


                    <button type="button" class="all-btn2" data-bs-toggle="modal" data-bs-target="#enquirymodal">
                        Send Enquiry
                      </button>
                      
                      <!-- Modal -->
                      <div class="modal fade" id="enquirymodal" tabindex="-1" aria-labelledby="enquirymodal" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-body custom-modal-content">
                                    <button type="button" class="btn-close btn-close-white float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                                    <form name="enquiryformmob" id="enquiryformmob" class="p-4 rounded ms-auto me-auto">
                                    @csrf
                                        <input type="hidden" name="estimate_packagetype" id="estimate_packagetype2" value="Hajj">
                                        <div class="mb-3">
                                            <label for="name" class="custome-label mb-2">Name</label>
                                            <input type="text" class="input-filds" name="estimate_fullname" id="estimate_fullname2" placeholder="Full name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="contact" class="custome-label mb-2">Contact Number</label>
                                            <input type="text" class="input-filds" name="estimate_phoneno" id="estimate_phoneno2" placeholder="" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="enquiry" class="custome-label mb-2">Enquiry Message </label>
                                            <textarea class="input-filds" name="estimate_msg" id="estimate_msg2" rows="3"
                                                placeholder="Write your enquiry"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <div class="mb-3" id="enquiryformmob_msg"></div>
                                        </div>
                                        <button type="button" class="submit-enquiry" onclick="submitenquirymob();">Send Enquiry</button>
                                    </form>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>          
            
            <div class="col-lg-6 col-md-12 col-sm-12 mt-0 scrollable-section">
            <div class="col-lg-11 col-md-11 col-sm-10 ms-auto me-auto">    
                <div class="hide-on-small">
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
                  

                </div>


                
                <p class="custom-mt affordable-umrah">Browse All Affordable Hajj Packages</p>
                <div class="clearfix"></div>
                <div class="row mt-5" id="packagesData">
                    
                    @php
                    use App\Models\Packages;
                    $packages = Packages::where('packages_status',1)->orderBy('packages_sort','asc')->get();
                    @endphp
                    @foreach ($packages as $package)
                    <div class="row mt-4 ">
                        <div class="col-4">
                            <img class="image-border" src="{{ asset('uploads/packages/'.$package->packages_image) }}" alt="{{ $package->packages_name }}">
                        </div>
                        <div class="col-8 hover-border">
                            <div class="px-2">
                                <p class="rating-text">{{ $package->packages_tag }}</p>
                                <h3 class="package-title ">{{ $package->packages_name }}</h3>
                                <p class="package-details">{{ $package->packages_info }}</p>
                                <ul>
                                    <li class="package-includes">{!! $package->packages_details !!}</li>
                                </ul>
                                <span class="package-price">{{ get_siteinfo('currency_symbol') }}{{ $package->packages_price }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4 ">
                        <div class="col-4">
                            <img class="image-border" src="{{ asset('uploads/packages/'.$package->packages_image) }}" alt="{{ $package->packages_name }}">
                        </div>
                        <div class="col-8 hover-border">
                            <div class="px-2">
                                <p class="rating-text">{{ $package->packages_tag2 }}</p>
                                <h3 class="package-title ">{{ $package->packages_name }}</h3>
                                <p class="package-details">{{ $package->packages_info }}</p>
                                <ul>
                                    <li class="package-includes">{!! $package->packages_details !!}</li>
                                </ul>
                                <span class="package-price">{{ get_siteinfo('currency_symbol') }}{{ $package->packages_price2 }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4 ">
                        <div class="col-4">
                            <img class="image-border" src="{{ asset('uploads/packages/'.$package->packages_image) }}" alt="{{ $package->packages_name }}">
                        </div>
                        <div class="col-8 hover-border">
                            <div class="px-2">
                                <p class="rating-text">{{ $package->packages_tag3 }}</p>
                                <h3 class="package-title ">{{ $package->packages_name }}</h3>
                                <p class="package-details">{{ $package->packages_info }}</p>
                                <ul>
                                    <li class="package-includes">{!! $package->packages_details !!}</li>
                                </ul>
                                <span class="package-price">{{ get_siteinfo('currency_symbol') }}{{ $package->packages_price3 }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <!-- here is the show more section -->

                <!-- here is the show more section -->
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
</div>
@endsection