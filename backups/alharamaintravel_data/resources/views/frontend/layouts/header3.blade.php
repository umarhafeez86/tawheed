    <!-- Fixed Icon Section -->
    <div class="toprighticonsbar d-none d-sm-none d-md-block">
        <a href="tel:{{ str_replace(' ', '',get_siteinfo('setting_phone')) }}" target="_blank" class="toprighticons"><img
                src="{{ url('frontend/assets/images/solar_phone-calling-bold.png') }}" alt=""> <span>{{ get_siteinfo('setting_phone') }}</span></a>
        <div class="clearfix"></div>
        <a href="https://api.whatsapp.com/send?phone={{ str_replace(' ', '',get_siteinfo('setting_whatsappno')) }}&amp;text=Hi,I%20would%20like%20to%20contact%20you"
            target="_blank" class="toprighticons2"><img src="{{ url('frontend/assets/images/logos_whatsapp-icon.png') }}" alt="">
            <span>{{ get_siteinfo('setting_whatsappno') }}</span></a>
        <div class="clearfix"></div>
        {{-- <a href="mailto:{{ get_siteinfo('setting_email') }}" target="_blank" class="toprighticons3"><img src="{{ url('frontend/assets/images/ic_twotone-email.png') }}"
                alt="Email:{{ get_siteinfo('setting_email') }}"> <span>{{ get_siteinfo('setting_email') }}</span></a> --}}
        <a href="{{ url('/beat-my-price') }}" class="toprighticons3"><img
                src="{{ url('frontend/assets/images/ic_twotone-email.png') }}"
                alt="Beat My Price"> <span>Beat My Price</span></a>
        <div class="clearfix"></div>
    </div>
    <!-- Fixed Icon Section -->