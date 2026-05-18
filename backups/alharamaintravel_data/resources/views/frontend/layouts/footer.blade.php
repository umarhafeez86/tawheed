                <footer class="footer mt-5 text-white custom-mb">
                    <div class="row">
                        <div class="col-6 col-sm-6 col-md-8 col-lg-8 float-start">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 float-start">
                                <div class="float-start footer-heading-box">
                                    <img src="{{ asset('uploads/settings/' . get_siteinfo('footer_logo')) }}"
                                        alt="{{ get_siteinfo('setting_name') }}" class="footer-logo" />
                                </div>
                                <p class="footer-copyrights float-start col-12 pe-4">
                                    Haq Travels is a UK-based agency dedicated to delivering smooth, spiritually
                                    enriching Hajj and Umrah journeys from the UK.
                                </p>
                                <p class="footer-copyrights float-start col-12 mt-3 pe-4">
                                    We accept following mode of payments
                                <div class="clearfix"></div>
                                <img src="{{ url('frontend/assets/images/icon_payments.jpg') }}" class="img-fluid"
                                    alt="" style="max-width: 80%;">
                                </p>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 float-start">
                                <h6 class="footer-heading footer-heading-box">Pages</h6>
                                <ul class="footer-links list-unstyled float-start">
                                    <li><a href="{{ url('') }}">Home</a></li>
                                    <li><a href="{{ url('/information/about-us') }}">About Us</a></li>
                                    <li><a href="{{ url('beat-my-price') }}">Beat My Price</a></li>
                                    <li><a href="{{ url('umrah-packages') }}">Umrah Packages</a></li>
                                    <li><a href="{{ url('/ramadan-umrah-packages') }}">Ramadan Packages</a></li>
                                    @php
                                        use App\Models\Staticpages;
                                        $staticpages = Staticpages::where('pages_status', 1)
                                            ->where('pages_status_bottom', 1)
                                            ->where('pages_bottom_incol', 2)
                                            ->orderBy('pages_sort', 'asc')
                                            ->get();
                                    @endphp
                                    @if ($staticpages->count() > 0)
                                        @foreach ($staticpages as $staticpage)
                                            <li><a
                                                    href="{{ url('/information/' . $staticpage->pages_url) }}">{{ $staticpage->pages_name }}</a>
                                            </li>
                                        @endforeach
                                    @endif
                                    <li><a href="{{ url('/information/contact-us') }}">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4 col-lg-4 float-end footer-contact">
                            <a class="phone_lnk"
                                href="tel:{{ get_siteinfo('setting_phone') }}">{{ get_siteinfo('setting_phone') }}</a><br />
                            <a class="phone_lnk"
                                href="tel:{{ get_siteinfo('setting_phone2') }}">{{ get_siteinfo('setting_phone2') }}</a><br />
                            <a class="email_lnk"
                                href="mailto:{{ get_siteinfo('setting_email') }}">{{ get_siteinfo('setting_email') }}</a>
                            <div class="clearfix"></div>
                            <div class="footer-socials mt-4 float-start col-12">
                                @if (get_siteinfo('setting_fb_link') != '')
                                    <a href="{{ get_siteinfo('setting_fb_link') }}" class="icons" target="_blank"><i
                                            class="fab fa-facebook-f"></i></a>
                                @endif
                                @if (get_siteinfo('setting_insta_link') != '')
                                    <a href="{{ get_siteinfo('setting_insta_link') }}" class="icons"
                                        target="_blank"><i class="fab fa-instagram"></i></a>
                                @endif
                                @if (get_siteinfo('setting_tw_link') != '')
                                    <a href="{{ get_siteinfo('setting_tw_link') }}" class="icons" target="_blank"><i
                                            class="fab fa-twitter"></i></a>
                                @endif
                                @if (get_siteinfo('setting_linkedin_link') != '')
                                    <a href="{{ get_siteinfo('setting_linkedin_link') }}" class="icons"
                                        target="_blank"><i class="fab fa-linkedin"></i></a>
                                @endif
                                <a href="https://www.tiktok.com/@haqtravels.co.uk" class="icons" target="_blank"><i
                                        class="fab fa-tiktok"></i></a>
                                <a href="https://www.youtube.com/@haqtravels3829" class="icons" target="_blank"><i
                                        class="fab fa-youtube"></i></a>
                            </div>
                            <div class="clearfix"></div>
                            <div class="footer-logos mt-2 float-start col-12">
                                <img src="{{ url('frontend/assets/images/icon_atol.png') }}" class="float-start mb-2"
                                    alt="">
                                <img src="{{ url('frontend/assets/images/icon_iata.png') }}" class="float-start mb-2"
                                    alt="">
                                <img src="{{ url('frontend/assets/images/icon_ministryofsaudia.png') }}"
                                    class="float-start mb-2 ministrylogo" alt="">
                            </div>
                            <div class="clearfix"></div>
                            <div class="footer-logos float-start mb-3 col-12">
                                <a href="https://www.trustpilot.com/review/haqtravels.co.uk" target="_blank"><img
                                        src="{{ url('frontend/assets/images/icon_trustpilot.png') }}"
                                        class="img-fluid float-start mt-3 me-3 mb-2" alt=""></a>
                                <a href="https://goo.gd/8li4c" target="_blank"><img
                                        src="{{ url('frontend/assets/images/icon_google.png') }}"
                                        class="img-fluid float-start" alt=""></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="footer-copyrights col-12 float-start text-center pt-2 pb-2"
                            style="border-top: solid 1px #272727; ">
                            &copy; Copyright 2025 Travigence as Haq Travels. Company Number 15101982. All Rights
                            Reserved.<br>
                            Note: All fares advertised are subject to availability and start from the prices we have
                            mentioned. Fares are only guaranteed until ticketed. Offers may be withdrawn without any
                            prior notice.
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </footer>
                <link rel="stylesheet" type="text/css"
                    href="https://cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
                <script src="https://cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>

                <script>
                    window.addEventListener("load", function() {
                        window.cookieconsent.initialise({
                            "palette": {
                                "popup": {
                                    "background": "#000",
                                    "text": "white"
                                },
                                "button": {
                                    "background": "#f1d600"
                                },
                                "cookie": {
                                    expiryDays: 2
                                }
                            },
                            "content": {
                                message: 'This website uses cookies to improve your experience.',
                            },
                            "position": "bottom"

                        })
                    });

                    function loadReturnTypeMoreField() {
                        $('#contact-Info-Div').show();
                    }

                    function loadOneWayMoreField() {
                        $('#contact-Info-Div-OneWay').show();
                    }
                </script>
