@php
$favorites = json_decode(Cookie::get('favorites', '[]'), true);
@endphp
<div class="col-12 float-start header-mob d-block d-sm-block d-md-none p-4" id="mainHeader">
            <div class="row m-0 p-0 d-flex">
                <div class="col-4">
                    <nav role="navigation">
                        <div id="menuToggle">
                            <input type="checkbox" id="menucheckbox" />
                            <span></span>
                            <span></span>
                            <span></span>
                            <ul id="menu">
                                <li><a href="{{ url('') }}"><i class="fa fa-angles-right"></i> Home</a></li>
                                <li><a href="{{ url('/information/about-us') }}"><i class="fa fa-angles-right"></i> About Us</a></li>
                                <li><a href="{{ url('/beat-my-price') }}"><i class="fa fa-angles-right"></i> Beat My Price</a></li>
                                <li><a href="{{ url('/umrah-packages') }}"><i class="fa fa-angles-right"></i> Umrah Packages</a></li>
                                <li><a href="{{ url('/hajj-packages') }}"><i class="fa fa-angles-right"></i> Hajj Packages</a></li>

                                <li><a href="{{ url('/ramadan-umrah-packages') }}"><i class="fa fa-angles-right"></i> Ramadan Packages</a></li>
                                <li><a href="{{ url('/blog') }}"><i class="fa fa-angles-right"></i> Blogs</a></li>
                                <li class="position-relative"><a href="{{ url('/saved-packages') }}"><i class="fa fa-angles-right"></i> My Saved <span id="iconcount2" class="iconcount">{{ count($favorites) }}</span></a></li>
                                <li><a href="{{ url('/information/contact-us') }}"><i class="fa fa-angles-right"></i> Contact Us</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="col-4 text-center"><img src="{{ asset('uploads/settings/' . get_siteinfo('header_logo')) }}" class="img-mob-logo"
                        alt="{{ get_siteinfo('setting_name') }}"></div>
                <div class="col-4 toplinks position-relative text-center" style="line-height: 40px;"><a href="{{ url('/saved-packages') }}"><i class="far fa-heart"></i> <span id="iconcount3" class="iconcount">{{ count($favorites) }}</span></a></div>
            </div>
            <div class="mob-btns-bar col-12 float-start pt-4 pb-3">
                <div class="row d-flex m-0 p-0 justify-content-between">
                    <a href="https://api.whatsapp.com/send?phone={{ str_replace(' ', '',get_siteinfo('setting_whatsappno')) }}&amp;text=Hi,I%20would%20like%20to%20contact%20you"
                        target="_blank" class="mob_buttons col-4 me-1">
                        <img src="{{ url('frontend/assets/images/logos_whatsapp-icon.png') }}" class="img-fluid" alt="WhatsApp {{ str_replace(' ', '',get_siteinfo('setting_whatsappno')) }}"> Whatsapp
                    </a>
                    {{-- <a href="mailto:{{ get_siteinfo('setting_email') }}" target="_blank" class="mob_buttons col-4 me-1">
                        <img src="{{ url('frontend/assets/images/ic_twotone-email.png') }}" class="img-fluid"
                            alt="Email:{{ get_siteinfo('setting_email') }}"> E-mail
                    </a> --}}
                    <a href="{{ url('/beat-my-price') }}" class="mob_buttons col-4 me-1">
                        <img src="{{ url('frontend/assets/images/ic_twotone-email.png') }}" class="img-fluid"
                            alt=""> Enquire
                    </a>
                    <a href="tel:{{ str_replace(' ', '',get_siteinfo('setting_phone')) }}" target="_blank" class="mob_buttons col-3">
                        <img src="{{ url('frontend/assets/images/solar_phone-calling-bold.png') }}" class="img-fluid" alt="Call {{ get_siteinfo('setting_phone') }}"> Call
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix"></div>
            <h1 class="mobile_heading float-start text-center mt-4 mb-0 col-12">{{ $page_name }}</h1>
            <div class="clearfix"></div>
        </div>