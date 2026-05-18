<div class="toprighticonsbar">
    <a href="https://api.whatsapp.com/send?phone={{ str_replace(' ', '', get_siteinfo('setting_whatsappno')) }}&amp;text=Hi,I%20would%20like%20to%20contact%20you"
        target="_blank" class="toprighticons"><img src="{{ url('frontend/assets/images/icon-whatsapp.png') }}"
            alt=""> {{ get_siteinfo('setting_whatsappno') }}</a>
    <div class="clearfix"></div>
    <a href="tel:{{ get_siteinfo('setting_phone') }}" target="_blank" class="toprighticons2"><img
            src="{{ url('frontend/assets/images/icon-phone-call.png') }}" alt="">
        {{ get_siteinfo('setting_phone') }}</a>
    <div class="clearfix"></div>
    <a href="{{ url('/beat-my-price') }}" target="_blank" class="toprighticons2"><img
            src="{{ url('frontend/assets/images/icon-email.png') }}" alt=""> Email</a>
    <div class="clearfix"></div>
</div>

<!--
  <div class="toprighticonsbarmobile d-block d-sm-block d-md-none">
          <a href="{{ url('/beat-my-price') }}">
            <img src="{{ url('frontend/assets/images/ion_email.png') }}" alt="" class="call-png">
          </a>
  </div>
-->

<header id="topheader" class="">
    <div class="container">
        <div
            class="d-flex align-items-center justify-content-between justify-content-lg-between flex-wrap gap-3 mt-3 mb-3">
            <div>
                <a href="{{ url('') }}">
                    <img src="{{ asset('uploads/settings/' . get_siteinfo('header_logo')) }}"
                        alt="{{ get_siteinfo('setting_name') }}" class="logo-img d-none d-sm-none d-md-block">
                    <img src="{{ url('frontend/assets/images/logoforsmall.png') }}"
                        alt="{{ get_siteinfo('setting_name') }}" class="logo-img d-block d-sm-block d-md-none">
                </a>
            </div>

            <div class="d-flex gap-3">
                <img src="{{ url('frontend/assets/images/certificates 1.png') }}" alt=""
                    class="trustpilot-logo">
                <img src="{{ url('frontend/assets/images/trustpilot-logo 1.png') }}" alt=""
                    class="certificates-logo">
            </div>

            <div class="d-flex gap-1 gap-lg-5 ms-auto me-auto">
                <div class="d-flex align-items-center gap-2">
                    <a href="https://api.whatsapp.com/send?phone={{ str_replace(' ', '', get_siteinfo('setting_whatsappno')) }}&amp;text=Hi,I%20would%20like%20to%20contact%20you"
                        target="_blank" class="watsapp-png">
                        <img src="{{ url('frontend/assets/images/ic_baseline-whatsapp.png') }}" alt=""
                            >
                        <span class="toptext d-block d-sm-block d-md-none ms-2 me-3">WhatsApp</span>
                    </a>
                    <div class="d-flex flex-column contact-info">
                        <p class="mb-1">WhatsApp:</p>
                        <h3 class="mb-0"><a
                                href="https://api.whatsapp.com/send?phone={{ str_replace(' ', '', get_siteinfo('setting_whatsappno')) }}&amp;text=Hi,I%20would%20like%20to%20contact%20you"
                                target="_blank">{{ get_siteinfo('setting_whatsappno') }}</a></h3>
                    </div>
                    </a>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <a href="tel:{{ get_siteinfo('setting_phone') }}" class="call-png">
                        <img src="{{ url('frontend/assets/images/ion_call.png') }}" alt="" >
                        <span class="toptext d-block d-sm-block d-md-none ms-2 me-3">Call</span>
                    </a>
                    <div class="d-flex flex-column info-block">
                        <p class="mb-1">Call Now:</p>
                        <h3 class="mb-0"><a
                                href="tel:{{ get_siteinfo('setting_phone') }}">{{ get_siteinfo('setting_phone') }}</a>
                        </h3>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2 d-block d-sm-block d-md-none">
                    <a href="{{ url('/beat-my-price') }}" class="call-png">
                        <img src="{{ url('frontend/assets/images/ion_email.png') }}" alt="" >
                        <span class="toptext d-block d-sm-block d-md-none ms-2 me-3">Email</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</header>
