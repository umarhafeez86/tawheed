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

    <!-- Left Panel Section -->
    <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-4 float-start leftpanel-bg d-none d-sm-none d-md-block">
        <div class="col-12 float-start">
            <div class="text-center col-12 float-start">
                <a href="{{ url('') }}"><img src="{{ asset('uploads/settings/' . get_siteinfo('header_logo')) }}" alt="{{ get_siteinfo('setting_name') }}" class="img-fluid nextpagelogo"></a>
            </div>
            <div class="clearfix"></div>
            <h2 class="leftpanel-heading mt-2">Enquire for Hajj packages</h2>
            <div class="sign-up-for-umrah ms-4 me-4">
                <form name="enquiryform" id="enquiryform" class="col-12 float-start">
                @csrf
                    <input type="hidden" name="estimate_packagetype" id="estimate_packagetype" value="Hajj" />
                    <div class="form-row">
                        <label for="name" class="custome-label">Name</label>
                        <input type="text" class="input-filds" name="estimate_fullname" id="estimate_fullname"
                            placeholder="Full name" required />
                    </div>
                    <div class="form-row">
                        <label for="contact" class="custome-label">Contact Number</label>
                        <input type="text" class="input-filds" name="estimate_phoneno" id="estimate_phoneno"
                            placeholder="+44" value="+44" oninput="if(!this.value.startsWith('+44')) this.value = '+44';" maxlength="13" required />
                    </div>
                    <div class="form-row">
                        <label for="enquiry" class="custome-label">Message</label>
                        <textarea class="input-filds" name="estimate_msg" id="estimate_msg" rows="3" placeholder="Write your enquiry"></textarea>
                    </div>
                    <div class="form-row-msg" id="enquiryform_msg"></div>
                    <button type="button" class="submit-enquiry" onclick="submitenquiry();">
                        Send Enquiry
                    </button>
                    <div class="clearfix"></div>
                </form>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
            <div class="d-flex justify-content-center">
                <a href="{{ url('beat-my-price') }}" class="beat-price-btn">Beat my
                    price</a>
            </div>
            <div class="clearfix"></div>
            <div class="col-12 float-start mt-3">
                <div class="col-9 float-start">
                    <p class="Available">Available 24/7</p>
                    <p class="phone-no-company">TEL <span class="phone-no"><a href="tel:{{ get_siteinfo('setting_phone') }}">{{ get_siteinfo('setting_phone') }}</a></span>
                    </p>
                </div>
                <div class="col-3 float-start">
                    <a href="https://api.whatsapp.com/send?phone={{ str_replace(' ', '', get_siteinfo('setting_whatsappno')) }}&amp;text=Hi,I%20would%20like%20to%20contact%20you"
                        target="_blank"><img class="float-end img-fluid whatsappicon"
                            src="{{ url('frontend/assets/images/icon-whatsapp.png') }}" alt="" /></a>
                </div>
            </div>
            <div class="clearfix"></div>

        </div>
    </div>
    <!-- Left Panel Section -->