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
    
        <div class="bg-[#FFF]">
            <div class="container mx-auto px-4 sm:px-6 2xl:px-20 pb-10 lg:pb-16 lg:pb-20 overflow-hidden ">


    @if (Session::has('success'))
        <p
            style="background-color:#F8D49E;color:#000;border-radius:5px;text-align:center;padding: 5px 0px;text-transform:Capitalise;">
            {{ Session::get('success') }}</p>
    @endif
    
                <div class="grid grid-cols-1 mt-5 sm:mt-6 md:mt-10 lg:mt-20 gap-5 lg:gap-10">
                    <div class="col-span-1 lg:col-span-1">
                        <form id="paymentform" name="paymentform" action="{{ url('/payment-process') }}" method="post">
                            @csrf
                            <div
                                class="bg-enquiry bg-white rounded-2xl border border-[#C4DFE7] p-6 md:p-10 shadow-md w-full">
                                <h2 class="mb-[50px]">E Payment</h2>

                                <!-- Contact and Email -->
                                <div class="grid grid-cols-1 gap-4">
                                    
                                    <div>
                                        <label class="block custome-label mb-1">Booking Reference Number *</label>
                                        <input type="text"
                                            class="w-full border-b border-[#A7D3DD] focus:outline-none focus:border-[#005B68] bg-transparent px-1 py-2"
                                            id="booking_refno" name="booking_refno" placeholder="First Name*" required />
                                            @error('booking_refno')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                    </div>
                                    
                                    <div>
                                        <label class="block custome-label mb-1">Order Description *</label>
                                        <input type="text" class="w-full border-b border-[#A7D3DD] focus:outline-none focus:border-[#005B68] bg-transparent px-1 py-2" id="order_description" placeholder="Order Description" name="order_description">
                                        @error('order_description')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    
                                    
                                    <div>
                                        <label class="block custome-label mb-1">Order Amount *</label>
                                        <input type="number" class="w-full border-b border-[#A7D3DD] focus:outline-none focus:border-[#005B68] bg-transparent px-1 py-2" id="booking_amount" placeholder="Order Amount" name="booking_amount">
                                        @error('booking_amount')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <!-- First Name -->
                                    <div class="mt-3">
                                        <label class="block custome-label mb-1">First Name *</label>
                                        <input type="text"
                                            class="w-full border-b border-[#A7D3DD] focus:outline-none focus:border-[#005B68] bg-transparent px-1 py-2"
                                            id="first_name" name="first_name" placeholder="First Name*" required />
                                            @error('first_name')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                    </div>
                                    
                                    <!-- Last Name -->
                                    <div class="mt-3">
                                        <label class="block custome-label mb-1">Last Name *</label>
                                        <input type="text"
                                            class="w-full border-b border-[#A7D3DD] focus:outline-none focus:border-[#005B68] bg-transparent px-1 py-2"
                                            id="last_name" name="last_name" placeholder="Last Name*" required />
                                            @error('last_name')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                    </div>
                                
                                    <div class="mt-3">
                                        <label class="block custome-label mb-1">Contact Number *</label>
                                        <input type="text"
                                            class="w-full border-b border-[#A7D3DD] focus:outline-none focus:border-[#005B68] bg-transparent px-1 py-2"
                                            placeholder="" id="contact_phone" name="contact_phone" value=""
                                            maxlength="13" minlength="11" required />
                                            @error('contact_phone')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                    </div>
                                    
                                    <div class="mt-3">
                                        <label class="block custome-label mb-1">Email Address *</label>
                                        <input type="email"
                                            class="w-full border-b border-[#A7D3DD] focus:outline-none focus:border-[#005B68] bg-transparent px-1 py-2"
                                            id="contact_email" name="contact_email" placeholder="Email Address" required />
                                            @error('contact_email')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                    </div>
                                    
                                </div>

                                <!-- Button -->
                                <button type="button" class="w-full send-enquiry-btn mt-[50px]" onclick="submitpaymentform();">Proceed Now</button>
                            </div>
                        </form>
                    </div>

        <script>
            function submitpaymentform() {
                let booking_refno       = $("#paymentform #booking_refno").val();
                let order_description   = $("#paymentform #order_description").val();
                let booking_amount      = $("#paymentform #booking_amount").val();
                let first_name          = $("#paymentform #first_name").val();
                let last_name           = $("#paymentform #last_name").val();
                let contact_email       = $("#paymentform #contact_email").val();
                let contact_phone       = $("#paymentform #phoneno").val();
                //var street_address    = $("#paymentform #street_address").val();
                //var cityname          = $("#paymentform #cityname").val();
                //var postal_code       = $("#paymentform #postal_code").val();
                //var billing_country   = $("#paymentform #billing_country").val();
                //var agent_name        = $("#paymentform #agent_name").val();
                
                //alert (booking_refno);

                if ((booking_refno != "") && (order_description != "") && (booking_amount != "") && (first_name !=
                        "") && (last_name != "") && (contact_email != "") && (contact_phone != "")) {
                            $('#paymentform').submit();
                     
                }else{
                            alert ("Please fill all the required fields.");
                }
            }
        </script>
        
                </div>

            </div>
        </div>
@endsection
