                <div class="btm-btns-bar col-12 float-start mt-4 mb-4 d-none d-sm-none d-md-block">
                    <h4 class="col-12 float-start">
                        <span class="mt-2 me-3 mt-lg-0 me-md-3 me-lg-5 float-start">
                            Or reach out to us
                        </span>

                        <a href="tel:{{ str_replace(' ', '',get_siteinfo('setting_phone')) }}" target="_blank"
                            class="btn_bottoms me-1 me-md-1 me-lg-2 float-start">
                            <img src="{{ url('frontend/assets/images/solar_phone-calling-bold.png') }}" alt="Call {{ get_siteinfo('setting_phone') }}"> Call Now
                        </a>
                        <a href="https://api.whatsapp.com/send?phone={{ str_replace(' ', '',get_siteinfo('setting_whatsappno')) }}&amp;text=Hi,I%20would%20like%20to%20contact%20you"
                            target="_blank" class="btn_bottoms me-1 me-md-1 me-lg-2 float-start">
                            <img src="{{ url('frontend/assets/images/logos_whatsapp-icon.png') }}" alt="WhatsApp {{ str_replace(' ', '',get_siteinfo('setting_whatsappno')) }}"> Whatsapp
                        </a>

                        <a href="mailto:{{ get_siteinfo('setting_email') }}" target="_blank" class="btn_bottoms me-0 me-md-0 me-lg-0 float-start">
                            <img src="{{ url('frontend/assets/images/ic_twotone-email.png') }}" alt="Email:{{ get_siteinfo('setting_email') }}"> E-mail
                        </a>
                        <div class="clearfix"></div>
                    </h4>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>