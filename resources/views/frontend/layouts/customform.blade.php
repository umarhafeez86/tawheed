        <div class="bg-[#FFF]">
            <div class="container mx-auto px-4 sm:px-6 2xl:px-20 pb-10 lg:pb-16 lg:pb-20 overflow-x-hidden ">
                <div class="grid grid-cols-12 mt-5 sm:mt-6 md:mt-10 lg:mt-20 gap-5 lg:gap-10">
                    <div class=" col-span-12 lg:col-span-6">
                        <div class="bg-yellow">
                            <div class="p-4 sm:p-6 md:p-8 lg:p-12 talk-to">
                                <h2>Need Help Choosing the Right Package?</h2>
                                <p class="mt-5 lg:mt-8 mb-5 lg:mb-16 ">If you haven’t found the perfect package, don’t worry. <br/>Our experienced team is ready to assist you personally.</p>
                                <a href="tel:{{ get_siteinfo('setting_phone') }}" class="flex items-center gap-2 mt-5 call-us-btn">
                                    <img src="{{ asset('frontend/assets/images/call-icon.svg') }}" alt="Call Icon"
                                        class="w-4 h-4 md:w-6 md:h-6" />
                                    Talk to an Expert Now
                                </a>
                            </div>
                        </div>
                        <div class="lg:mt-10 grid grid-cols-4">

                            <img src="{{ asset('frontend/assets/images/footer_icon_02.jpg') }}" class="h-auto max-w-full"
                                alt="">
                            <img src="{{ asset('frontend/assets/images/footer_icon_04.jpg') }}" class="h-auto max-w-full"
                                alt="">
                            <img src="{{ asset('frontend/assets/images/footer_icon_01.jpg') }}" class="h-auto max-w-full"
                                alt="">
                            <img src="{{ asset('frontend/assets/images/footer_icon_03.jpg') }}" class="h-auto max-w-full"
                                alt="">

                        </div>
                    </div>

                    <div class="col-span-12 lg:col-span-6">

<form id="estimateform" name="estimateform" method="post">
@csrf
        
    <div id="estimateform_msg" class="col-span-12 float-left mb-1"></div>

                        <div
                            class="bg-enquiry bg-white rounded-2xl border border-[#C4DFE7] p-6 md:p-10 space-y-6 shadow-md max-w-xl">
                            <h2 class="">Book an Umrah/Hajj Consultancy Appointment</h2>

                            <!-- Full Name -->
                            <div>
                                <label class="block custome-label mb-1" for="estimate_fullname">Full Name</label>
                                <input type="text" name="estimate_fullname" id="estimate_fullname"
                                    class="w-full border-b border-[#A7D3DD] focus:outline-none focus:border-[#005B68] bg-transparent px-1 py-2" />
                            </div>

                            <!-- Contact and Email -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block custome-label mb-1" for="estimate_phoneno">Contact Number</label>
                                    <input type="text" name="estimate_phoneno" id="estimate_phoneno"
                                        class="w-full border-b border-[#A7D3DD] focus:outline-none focus:border-[#005B68] bg-transparent px-1 py-2" />
                                </div>
                                <div>
                                    <label class="block custome-label mb-1" for="estimate_email">Email Address</label>
                                    <input type="email" name="estimate_email" id="estimate_email"
                                        class="w-full border-b border-[#A7D3DD] focus:outline-none focus:border-[#005B68] bg-transparent px-1 py-2" />
                                </div>
                            </div>

                            <!-- No. of Days and Guests -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block custome-label mb-1" for="travel_date">No. of Days</label>
                                    <select name="travel_date" id="travel_date"
                                        class="w-full border-b border-[#A7D3DD] focus:outline-none focus:border-[#005B68] bg-transparent px-1 py-2">
                                            <option value="7">7</option>
                                            <option value="10">10</option>
                                            <option value="12">12</option>
                                            <option value="14">14</option>
                                            <option value="21">21</option>
                                            <option value="Others">Othes</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block custome-label mb-1" for="estimate_noofpassg">No. of Guests</label>
                                    <select name="estimate_noofpassg" id="estimate_noofpassg"
                                        class="w-full border-b border-[#A7D3DD] focus:outline-none focus:border-[#005B68] bg-transparent px-1 py-2">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10+">10+</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Message -->
                            <div>
                                <label class="block custome-label mb-1" for="estimate_message">Your Message</label>
                                <textarea name="estimate_message" id="estimate_message"
                                    class="w-full border-b border-[#A7D3DD] focus:outline-none focus:border-[#005B68] bg-transparent px-1 py-2 resize-none"></textarea>
                            </div>

                            <!-- Button -->
                            <button type="button" class="w-full send-enquiry-btn" onclick="submitestimateform();">Send
                                Enquiry</button>
                            <input type="hidden" name="gclid" id="gclid" value="">
                            <input type="hidden" name="page_url" id="page_url" value="{{ url()->current() }}">
                        </div>

</form>                        
                    </div>
                </div>
            </div>
        </div>