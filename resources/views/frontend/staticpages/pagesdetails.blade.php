@extends('frontend.layouts.innerinfo')

@section('main-container')


    <div class="clearfix"></div>
    <div class="col-span-12 w-full relative">
        <div class="col-span-12 w-full float-left px-4 sm:px-6 2xl:px-20 flex justify-center pt-5">
            <div class="bg-contact flex gap-3 md:gap-5 lg:gap-10" id="desktopmenufixed">
                <div class="flex items-center gap-2">
                    <a href="tel:{{ get_siteinfo('setting_phone') }}" class="flex gap-3">
                        <img src="{{ asset('frontend/assets/images/phone-icon.svg') }}" alt="">
                        <p class="call-us text-[14px] sm:text-[16px] md:text-[18px]">{{ get_siteinfo('setting_phone') }}</p>
                    </a>
                </div>
                <!-- Correct vertical line -->
                <div class="line-breaker"></div>
                <div class="flex items-center gap-2 ">
                    <a href="{{ url('/information/contact-us') }}" class="flex gap-3">
                        <img src="{{ asset('frontend/assets/images/mail-icon.svg') }}" alt="">
                        <p class="contact-us text-[14px] sm:text-[16px] md:text-[18px]">Contact Us</p>
                    </a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    
    @if ($staticpages->pages_name != 'Contact Us')
        <div class="bg-[#FFF]">
            <div class="container mx-auto px-4 sm:px-6 2xl:px-20 overflow-hidden">
                <div class="grid grid-cols-12 gap-5 sm:gap-8 md:gap-12 lg:gap-16">
                    <div class="col-span-12 lg:col-span-12 ">
                        <div class=" mt-5 mb-5 sm:mt-8 md:mt-14 lg:mt-20">
                            <h1 class="umrah_pilgrim mb-3">{{ $page_name }}</h1>
                            <p class="mt-2 lg:mt-4 tips_p">{!! $staticpages->pages_details !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="bg-[#FFF]">
            <div class="container mx-auto px-4 sm:px-6 2xl:px-20 pb-10 lg:pb-16 lg:pb-20 overflow-hidden ">

                <div class="grid grid-cols-12 mt-5 sm:mt-6 md:mt-10 lg:mt-20 gap-5 lg:gap-10">
                    <div class="col-span-12 lg:col-span-6">
                        <form name="estimateform" id="estimateform" method="post">
                            @csrf
                            <div
                                class="bg-enquiry bg-white rounded-2xl border border-[#C4DFE7] p-6 md:p-10 space-y-6 shadow-md max-w-xl">
                                <h2 class="">Drop Message</h2>

                                <!-- Full Name -->
                                <div>
                                    <label class="block custome-label mb-1">Full Name</label>
                                    <input type="text"
                                        class="w-full border-b border-[#A7D3DD] focus:outline-none focus:border-[#005B68] bg-transparent px-1 py-2"
                                        id="contact_fullname" name="contact_fullname" placeholder="Full Name*" required />
                                </div>

                                <!-- Contact and Email -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block custome-label mb-1">Contact Number</label>
                                        <input type="text"
                                            class="w-full border-b border-[#A7D3DD] focus:outline-none focus:border-[#005B68] bg-transparent px-1 py-2"
                                            placeholder="" id="contact_phoneno" name="contact_phoneno" value=""
                                            maxlength="13" minlength="11" required />
                                    </div>
                                    <div>
                                        <label class="block custome-label mb-1">Email Address</label>
                                        <input type="email"
                                            class="w-full border-b border-[#A7D3DD] focus:outline-none focus:border-[#005B68] bg-transparent px-1 py-2"
                                            id="contact_email" name="contact_email" placeholder="Email Address" required />
                                    </div>
                                </div>
                                <!-- Message -->
                                <div>
                                    <label class="block custome-label mb-1">Your Message</label>
                                    <textarea
                                        class="w-full border-b border-[#A7D3DD] focus:outline-none focus:border-[#005B68] bg-transparent px-1 py-2 resize-none"
                                        id="contact_message" name="contact_message" placeholder="Message*" required></textarea>
                                </div>

                                <!-- Button -->
                                <div class="form-row-msg" id="estimateform_msg"></div>
                                <button type="button" class="w-full send-enquiry-btn" onclick="submitcontactform();">Send
                                    Enquiry</button>
                                <input type="hidden" name="gclid" id="gclid" value="">
                                <input type="hidden" name="page_url" id="page_url" value="{{ url()->current() }}">
                            </div>
                        </form>
                    </div>
                    <div class="col-span-12 lg:col-span-6 reach_us">
                <h2>Reach out to us</h2>
                <p class="mt-3">Whether you need assistance with itinerary customization, accommodation preferences, or general inquiries about your pilgrimage, we're just a message away. Reach out to us today to begin your transformative journey.</p>
                        <ul class="space-y-6 mt-8">
                            <li class="flex items-center gap-4">
                                <span class="reach_us_route">
                                    <img src="{{ asset('frontend/assets/images/phone-icon.svg') }}" alt="Phone Icon"
                                        class="h-5 w-5 lg:h-9 lg:w-9" />
                                </span>
                                <span class="contact_us"><a href="tel:{{ get_siteinfo('setting_phone') }}">{{ get_siteinfo('setting_phone') }}</a></span>
                            </li>

                            <li class="flex items-center gap-4">
                                <span class="reach_us_route">
                                    <img src="{{ asset('frontend/assets/images/email-icon.svg') }}" alt="Email Icon"
                                        class="h-5 w-5 lg:h-9 lg:w-9" />
                                </span>
                                <span class="contact_us"><a href="mailto:{{ get_siteinfo('setting_email') }}">{{ get_siteinfo('setting_email') }}</a></span>
                            </li>

                            <li class="flex items-center gap-4">
                                <span class="reach_us_route">
                                    <img src="{{ asset('frontend/assets/images/location-icon.svg') }}" alt="Location Icon"
                                        class="h-5 w-5 lg:h-9 lg:w-9" />
                                </span>
                                <span class="contact_us">
                                    {{ get_siteinfo('setting_address') }}
                                </span>
                            </li>

                            <li class="flex items-center gap-4">
                                <span class="reach_us_route">
                                    <img src="{{ asset('frontend/assets/images/whatsapp-icon.svg') }}" alt="WhatsApp Icon"
                                        class="h-5 w-5 lg:h-9 lg:w-9" />
                                </span>
                                <span class="contact_us"><a href="https://api.whatsapp.com/send?phone={{ str_replace(' ', '', get_siteinfo('setting_whatsappno')) }}&amp;text=Hi,I%20would%20like%20to%20contact%20you">{{ get_siteinfo('setting_whatsappno') }}</a></span>
                            </li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <script>
            function submitcontactform() {

                var contact_fullname = $("#estimateform #contact_fullname").val();
                var contact_email    = $("#estimateform #contact_email").val();
                var contact_phoneno  = $("#estimateform #contact_phoneno").val();
                var contact_message  = $("#estimateform #contact_message").val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                if ((contact_fullname != "") && (contact_email != "") && (contact_phoneno != "") && (contact_message != "")) {

                    if (contact_phoneno.length < 11) {
                        alert("Enter Valid Number.");
                        return false;
                    } else {
                        $("#estimateform_msg").html('<img src="{{ url('/frontend/assets/images/form-load.gif') }}" alt="">');

                        var formData = $("#estimateform").serialize(); // Serialize form data
                        //alert (formData);
                        $.ajax({
                            url: "{{ url('/contact-submit') }}",
                            type: "POST",
                            data: formData,
                            success: function(response) {
                                $("#estimateform_msg").html(response);
                                $('#estimateform').trigger("reset");
                            }
                            /*,
                            error: function(xhr) {
                                let errors = xhr.responseJSON.errors;
                                let errorMessage = '<div class="alert alert-danger"><ul>';
                                $.each(errors, function(key, value) {
                                    errorMessage += '<li>' + value + '</li>';
                                });
                                errorMessage += '</ul></div>';
                                $("#alertBox").html(errorMessage);
                            }
                            */
                        });

                    }
                } else {
                    alert("Please Fill All the Required Information.");
                    return false;
                }
            }
        </script>
    @endif
@endsection
