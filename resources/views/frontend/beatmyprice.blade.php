@extends('frontend.layouts.innerbeatmyprice')
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

            <div class="grid grid-cols-12 mt-5 sm:mt-6 md:mt-10 lg:mt-20 gap-5 lg:gap-10">
                <div class="col-span-12 lg:col-span-12">

                    @if (Session::has('success'))
                        <p style="color: #000;border-radius:25px;text-align:center;padding:12px 18px;border:solid 5px #5caa7c;font-size:16px;"
                            class="mt-3 mb-3">
                            {{ Session::get('success') }}</p>
                    @endif

                    <form name="estimateform" action="{{ url('/beat-my-price-process') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf


                        <input type="hidden" name="packagetype" id="packagetype" value="Umrah">
                        <div class="bg-enquiry bg-white rounded-2xl border border-[#C4DFE7] p-6 md:p-10 shadow-md">
                            <h2 class="">Beat My Price</h2>

                            <!-- Contact and Email -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <!-- Full Name -->
                                <div class="mb-3">
                                    <label class="block custome-label mb-1">Travel Month *</label>
                                    <select
                                        class="w-full border-b border-[#A7D3DD] focus:outline-none focus:border-[#005B68] bg-transparent px-1 py-2 @error('travelmonth') is-invalid @enderror"
                                        id="travelmonth" name="travelmonth">
                                        <option value="">-- Select A Month ---</option>
                                        <option value="January">January</option>
                                        <option value="February">February</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                        <option value="August">August</option>
                                        <option value="September">September</option>
                                        <option value="October">October</option>
                                        <option value="November">November</option>
                                        <option value="December">December</option>
                                    </select>
                                    @error('travelmonth')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="block custome-label mb-1">Days</label>
                                    <input type="text"
                                        class="w-full border-b border-[#A7D3DD] focus:outline-none focus:border-[#005B68] bg-transparent px-1 py-2 @error('nightsinfo') is-invalid @enderror"
                                        id="nightsinfo" name="nightsinfo" placeholder="No. of Days*"
                                        value="{{ old('nightsinfo') }}" />
                                    @error('nightsinfo')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="block custome-label mb-1">No. of Guests</label>
                                    <input type="text"
                                        class="w-full border-b border-[#A7D3DD] focus:outline-none focus:border-[#005B68] bg-transparent px-1 py-2 @error('passginfo') is-invalid @enderror"
                                        id="passginfo" name="passginfo" placeholder="No. of Guests*"
                                        value="{{ old('passginfo') }}" />
                                    @error('passginfo')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="block custome-label mb-1">Full Name</label>
                                    <input type="text"
                                        class="w-full border-b border-[#A7D3DD] focus:outline-none focus:border-[#005B68] bg-transparent px-1 py-2 @error('personname') is-invalid @enderror"
                                        id="personname" name="personname" placeholder="Full Name*"
                                        value="{{ old('personname') }}" />
                                    @error('personname')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="block custome-label mb-1">Contact Number</label>
                                    <input type="text"
                                        class="w-full border-b border-[#A7D3DD] focus:outline-none focus:border-[#005B68] bg-transparent px-1 py-2 @error('phoneno') is-invalid @enderror"
                                        placeholder="" id="phoneno" name="phoneno" value="{{ old('phoneno') }}"
                                        maxlength="13" minlength="11" />
                                    @error('phoneno')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="block custome-label mb-1">Email Address</label>
                                    <input type="email"
                                        class="w-full border-b border-[#A7D3DD] focus:outline-none focus:border-[#005B68] bg-transparent px-1 py-2 @error('txtemail') is-invalid @enderror"
                                        id="txtemail" name="txtemail" placeholder="Email Address"
                                        value="{{ old('txtemail') }}" />
                                    @error('txtemail')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Button -->
                            <div class="form-row-msg" id="estimateform_msg"></div>
                            <button type="submit" class="w-full send-enquiry-btn">Send
                                Enquiry</button>
                            <input type="hidden" name="gclid" id="gclid" value="">
                            <input type="hidden" name="page_url" id="page_url" value="{{ url()->current() }}">
                        </div>
                    </form>
                </div>


            </div>

        </div>
    </div>
@endsection
