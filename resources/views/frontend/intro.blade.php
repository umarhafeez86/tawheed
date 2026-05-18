<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $page_title }} - {{ config('app.name') }}</title>
    <meta name="description" content="{{ $page_descp }}">
    <meta name="keywords" content="{{ $page_keyword }}">

    <link rel="stylesheet" href="{{ url('frontend/assets/css/fonts.css') }}">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" /> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">


    <!-- <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" /> -->
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="{{ url('frontend/assets/css/intro.css') }}">
    

    <link rel="stylesheet" href="{{ url('frontend/assets/css/popups.css') }}">

     <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
 <style>
     .datepicker-container {
         max-width: 300px;
     }

     .btn-date {
         width: 100%;
         display: flex;
         justify-content: space-between;
         align-items: center;
     }

     .btn-date span {
         flex-grow: 1;
         text-align: left;
     }

     .flatpickr-calendar {
         z-index: 1000;
         /* Important for Bootstrap */
     }
 </style>

    <!-- head widgets -->
    @include('frontend.layouts.headwidgets')
    <!-- head widgets -->

</head>

<body>

        <div class="absolute top-[0px] right-[0px] text-right" id="toprightcor">
            <img src="{{ url('frontend/assets/images/top-right.png') }}" class="float-right w-[60%] lg:w-[100%]"
                alt="">
        </div>
        
        <div class="absolute bottom-[0px] left-[0px] text-left" id="topbtmcor">
            <img src="https://tawheedtravel.co.uk/frontend/assets/images/bottom-left.png" class="float-left w-[30%] md:w-[50%] lg:w-[50%] xl:w-[55%] 2xl:w-[65%]" alt="">
        </div>

        
    <div class="bg-info relative">

        <div class="container mx-auto relative">
            <div class="grid grid-cols-12">
                <div class="mt-10 lg:mt-16 ms-5 lg:ms-1 col-span-4 lg:col-span-4 xl:col-span-3">
                    <img src="{{ url('frontend/assets/images/logo.png') }}" class="h-auto max-w-full" alt="">
                </div>
                <div class="col-span-12 lg:col-span-8 xl:col-span-9 relative z-[55555]">
                    <div class="ml-auto mr-auto w-[80%] md:wl-[80%] lg:wl-[100%]" id="multiStepForm_Area">
                        <form id="multiStepForm" name="multiStepForm" method="POST" class="float-left">
                            @csrf

                                <div class="float-left info-page custom-mt">
                                    <div class="step2 active">
                                        <div class="">
                                            <h2 class="info-head">Planning your Umrah or Hajj journey?</h2>
                                            <p class="mt-6 info-p">Let’s make it easy. A few quick questions and we’ll share the
                                                best options for
                                                you.</p>
                                            <div class="mt-10 lg:mt-20 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-3">
                                                <button type="button" class="umrah-btn"
                                                    onclick="movetonextstep('nextBtn');">Quick Quote</button>
                                                <a href="{{ url('') }}" class="hajj-btn">Explore Packages</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step2">
                                        <div class="">
                                            <h2 class="info-head">What kind of journey are you planning?</h2>
                                            <p class="mt-6 info-p">&nbsp;</p>
                                            <div class="mt-10 lg:mt-20 grid grid-cols-1 lg:grid-cols-2 gap-5">
                                                <input type="radio" class="btn-check absolute top-[-100px]" name="triptype"
                                                    id="triptype1" value="umrah">
                                                <label class="btn custom-button hajj-btn" for="triptype1">Umrah</label>
                                                <input type="radio" class="btn-check absolute top-[-200px]" name="triptype"
                                                    id="triptype2" value="hajj">
                                                <label class="btn custom-button hajj-btn" for="triptype2">Hajj 2026</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step2">
                                        <div class="">
                                            <h2 class="info-head">Do you have travel dates in mind?</h2>
                                            <div class="mt-2 lg:mt-2 grid grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-5"
                                                id="radio-group">
                                                <input type="radio" name="dateOption" id="fixed" class="hidden peer/fixed"
                                                    checked value="fixed">
                                                <label for="fixed" class="radio-btn">Fixed</label>
                                                <input type="radio" name="dateOption" id="flexible"
                                                    class="hidden peer/flexible" value="flexible">
                                                <label for="flexible" class="radio-btn">Flexible</label>
                                                <input type="radio" name="dateOption" id="anytime" class="hidden peer/anytime" value="anytime">
                                                <label for="anytime" class="radio-btn">Anytime</label>
                                            </div>
                                            <div
                                                class="grid grid-cols-2 gap-4 sm:gap-6 md:gap-10 lg:gap-24 mt-8 lg:mt-12 w-full">
                                                <!-- Date Picker -->
                                                <div class="relative">
                                                    <label for="selected_dates" class="custome-label">Departure Date</label>
                                                    <input id="dateInput" name="selected_dates picker-input custom-input" 
                                                        type="text"
                                                        class="bg-transparent border-0 border-b-2 border-white text-white text-lg font-semibold w-full ps-2 py-2 pr-10 placeholder-white focus:outline-none focus:border-[#D4B357]" />
                                                    <img src="{{ asset('frontend/assets/images/cross.svg') }}" alt=""
                                                        class="absolute right-2 top-1/2 transform  w-6 h-6 cursor-pointer"
                                                        onclick="document.getElementById('datepicker-autohide').value=''" />
                                                        <!-- Output -->
                                                        <p class="mt-3" id="selectedText"></p>
                                                        <p class="invalid-feedback float-start d-block" id="dateInput_msg"></p>
                                                </div>
                                                <!-- Number of Days -->
                                                <div class="">
                                                    <label for="noofdays" class="custome-label">Total Days</label>
                                                    <div
                                                        class="flex items-center justify-between border-b-2 border-white w-full max-w-full overflow-hidden">
                                                        <button type="button" id="decrement-button"
                                                            data-input-counter-decrement="noofdays"
                                                            class="px-2 py-2 shrink-0">
                                                            <img src="{{ asset('frontend/assets/images/minus.svg') }}"
                                                                alt="">
                                                        </button>
                                                        <input type="text" name="noofdays" id="noofdays" data-input-counter
                                                            value="0"
                                                            class="bg-transparent border-0 text-white text-lg text-center font-semibold flex-grow focus:outline-none w-[50px]"
                                                            readonly />
                                                        <button type="button" id="increment-button"
                                                            data-input-counter-increment="noofdays"
                                                            class="px-2 py-2 shrink-0">
                                                            <img src="{{ asset('frontend/assets/images/plus.svg') }}"
                                                                alt="">
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex justify-center gap-4 mt-5 lg:mt-10 items-center">
                                                <button type="button" onclick="movetonextstep('nextBtn');"
                                                    class="relative group w-40 h-16 rounded-full overflow-hidden bg-white text-center cursor-pointer">
                                                    <div
                                                        class="absolute inset-0 bg-[#D4B357] translate-y-full group-hover:translate-y-0 transition-transform duration-500 ease-in-out z-0">
                                                    </div>
                                                    <div
                                                        class="relative z-10 text-sky-900 text-2xl font-semibold font-['Poppins'] flex justify-center items-center h-full">
                                                        OK
                                                    </div>
                                                </button>
                                                <div class="lg:text-lg font-['Poppins'] text-neutral-300">
                                                    <span class="font-normal">Or press </span>
                                                    <span class="font-semibold">Enter</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step2">
                                        <div class="">
                                            <h2 class="info-head">And your phone number?</h2>
                                            <div class="mt-8 lg:mt-12 w-full">
                                                <label for="personphoneno" class="custome-label">Phone Number</label>
                                                <input type="text" name="personphoneno" id="personphoneno"
                                                    class=" w-full bg-transparent border-b-2 border-white text-white text-lg font-semibold px-2 py-2  focus:outline-none focus:border-[#D4B357]"
                                                    placeholder="+44 0000 0000" required />
                                            </div>
                                            <div class="flex justify-center gap-4 mt-5 lg:mt-10 items-center">
                                                <button type="button" onclick="movetonextstep('nextBtn');"
                                                    class="relative group w-40 h-16 rounded-full overflow-hidden bg-white text-center cursor-pointer">
                                                    <div
                                                        class="absolute inset-0 bg-[#D4B357] translate-y-full group-hover:translate-y-0 transition-transform duration-500 ease-in-out z-0">
                                                    </div>
                                                    <div
                                                        class="relative z-10 text-sky-900 text-2xl font-semibold font-['Poppins'] flex justify-center items-center h-full">
                                                        OK
                                                    </div>
                                                </button>
                                                <div class=" lg:text-lg font-['Poppins'] text-neutral-300">
                                                    <span class="font-normal">Or press </span>
                                                    <span class="font-semibold">Enter</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step2">
                                        <div class="">
                                            <h2 class="info-head">Before we start, what’s your name?</h2>
                                            <div class="mt-8 lg:mt-12 w-full">
                                                <label for="personname" class="custome-label">Full Name</label>
                                                <input type="text" name="personname" id="personname"
                                                    class=" w-full bg-transparent border-b-2 border-white text-white text-lg font-semibold px-2 py-2  focus:outline-none focus:border-[#D4B357]"
                                                    placeholder="e.g Full Name" required />
                                            </div>
                                            <div class="flex justify-center gap-4 mt-5 lg:mt-10 items-center">
                                                <button type="button" onclick="movetonextstep('nextBtn');"
                                                    class="relative group w-40 h-16 rounded-full overflow-hidden bg-white text-center cursor-pointer">
                                                    <div
                                                        class="absolute inset-0 bg-[#D4B357] translate-y-full group-hover:translate-y-0 transition-transform duration-500 ease-in-out z-0">
                                                    </div>
                                                    <div
                                                        class="relative z-10 text-sky-900 text-2xl font-semibold font-['Poppins'] flex justify-center items-center h-full">
                                                        OK
                                                    </div>
                                                </button>
                                                <div class=" lg:text-lg font-['Poppins'] text-neutral-300">
                                                    <span class="font-normal">Or press </span>
                                                    <span class="font-semibold">Enter</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step2">
                                        <div class="">
                                            <h2 class="info-head">Can we grab your email Address ?</h2>
                                            <div class="  mt-8 lg:mt-12 w-full">
                                                <label for="personemail" class="custome-label">Email id</label>
                                                <input type="email" name="personemail" id="personemail"
                                                    class=" w-full bg-transparent border-b-2 border-white text-white text-lg font-semibold px-2 py-2  focus:outline-none focus:border-[#D4B357]"
                                                    placeholder="name@example.com" required />
                                            </div>
                                            <div class="flex justify-center gap-4 mt-5 lg:mt-10 items-center">
                                                <button type="button" onclick="movetonextstep('nextBtn');"
                                                    class="relative group w-40 h-16 rounded-full overflow-hidden bg-white text-center cursor-pointer">
                                                    <div
                                                        class="absolute inset-0 bg-[#D4B357] translate-y-full group-hover:translate-y-0 transition-transform duration-500 ease-in-out z-0">
                                                    </div>
                                                    <div
                                                        class="relative z-10 text-sky-900 text-2xl font-semibold font-['Poppins'] flex justify-center items-center h-full">
                                                        OK
                                                    </div>
                                                </button>
                                                <div class=" lg:text-lg font-['Poppins'] text-neutral-300">
                                                    <span class="font-normal">Or press </span>
                                                    <span class="font-semibold">Enter</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step2">
                                        <div class="">
                                            <h2 class="info-head">Where will you be flying from?</h2>
                                            <div class="mt-8 lg:mt-12 w-full">
                                                <label for="DepartureCity" class="custome-label">Departure City</label>
                                                <select id="DepartureCity" name="DepartureCity"
                                                    class="w-full bg-[#005B68] border-b-2 border-white text-white text-lg font-semibold px-2 py-2  focus:outline-none focus:border-[#D4B357]"
                                                    required>
                                                    <option value="" disabled="" selected="">Departed Form
                                                    </option>
                                                    <option value="London Heathrow">London Heathrow</option>
                                                    <option value="London Gatwick">London Gatwick</option>
                                                    <option value="Manchester Airport">Manchester Airport</option>
                                                    <option value="London Luton">London Luton</option>
                                                    <option value="Edinburgh Airport">Edinburgh Airport</option>
                                                    <option value="London Stansted">London Stansted</option>
                                                </select>
                                            </div>
                                            <div class="flex justify-center gap-4 mt-5 lg:mt-10 items-center">
                                                <button type="button" onclick="movetonextstep('nextBtn');"
                                                    class="relative group w-40 h-16 rounded-full overflow-hidden bg-white text-center cursor-pointer">
                                                    <div
                                                        class="absolute inset-0 bg-[#D4B357] translate-y-full group-hover:translate-y-0 transition-transform duration-500 ease-in-out z-0">
                                                    </div>
                                                    <div
                                                        class="relative z-10 text-sky-900 text-2xl font-semibold font-['Poppins'] flex justify-center items-center h-full">
                                                        OK
                                                    </div>
                                                </button>
                                                <div class=" lg:text-lg font-['Poppins'] text-neutral-300">
                                                    <span class="font-normal">Or press </span>
                                                    <span class="font-semibold">Enter</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step2">
                                        <div class="">
                                            <h2 class="info-head">What kind of stay do you prefer?</h2>
                                            <div class="mt-10 lg:mt-20 grid grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-5"
                                                id="radio-group">
                                                <input type="radio" name="hotel_type" id="hotel_type1"
                                                    class="hidden peer/fixed" value="3 Star">
                                                <label for="hotel_type1" class="radio-btn2 text-[14px]">3 stars</label>

                                                <input type="radio" name="hotel_type" id="hotel_type2"
                                                    class="hidden peer/flexible" value="4 Star">
                                                <label for="hotel_type2" class="radio-btn2 text-[14px]">4 stars</label>

                                                <input type="radio" name="hotel_type" id="hotel_type3"
                                                    class="hidden peer/anytime" value="5 Star">
                                                <label for="hotel_type3" class="radio-btn2 text-[14px]">5 stars</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <div class="clearfix"></div>
                            <div class="flex gap-4 mt-[25px] sm:mt-[10px] md:mt-[15px] lg:mt-[20px] justify-end sm:justify-end md:justify-center z-[5555]"
                                id="btmbuttons">
                                <div class="circle2 hidden" id="prevBtn">
                                    <i class="fa fa-arrow-left"></i>
                                </div>
                                <div class="circle2" id="nextBtn">
                                    <i class="fa fa-arrow-right"></i>
                                </div>
                                <button type="submit" class="circle2 hidden" id="submitBtn"><i class="fa fa-arrow-right"></i></button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('frontend/assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="{{ asset('frontend/assets/js/popupform.js') }}"></script>
    
    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        function movetonextstep($input) {
            $("#" + $input).click();
        }
        $(document).on("keydown", function(e) {
            if (e.key === "Enter") {
                $("#nextBtn").click();
            }
        });


        function changeValue(delta) {
        const input = document.getElementById('noofdays');
        let value = parseInt(input.value) || 1;
        value += delta;
        if (value < parseInt(input.min)) value = input.min;
        input.value = value;
    }


    const dateInput = document.getElementById("dateInput");
    const selectedText = document.getElementById("selectedText");

    let picker;

    function initPicker(type) {
      if (picker) picker.destroy();

      if (type === "fixed") {
        dateInput.style.display = 'block';
        dateInput.placeholder = "Select Date";
        selectedText.textContent = "";
        picker = flatpickr(dateInput, {
          mode: "single",
          dateFormat: "d M Y",
          minDate: "today",
          onChange: (selectedDates, dateStr) => {
            //selectedText.textContent = "Fixed Date: " + dateStr;
            selectedText.textContent = "";

            $("#noofdays").val(1);
          }
        });
      } else if (type === "flexible") {
        dateInput.style.display = 'block';
        dateInput.placeholder = "Pick a date range";
        selectedText.textContent = "";
        picker = flatpickr(dateInput, {
          mode: "range",
          dateFormat: "d M Y",
          minDate: "today",
          showMonths: 2, // Show 2 months side-by-side
          onChange: (selectedDates, dateStr) => {
            //selectedText.textContent = "Flexible Dates: " + dateStr;
            selectedText.textContent = "";


            const dateRange = dateStr;

            // Step 1: Split the range
            const [startStr, endStr] = dateRange.split(" to ");

            // Step 2: Convert to Date objects
            const startDate = new Date(startStr);
            const endDate = new Date(endStr);

            // Step 3: Calculate difference in milliseconds and convert to days
            const diffTime = endDate - startDate;
            const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24)) + 1; // +1 to include both days
            //console.log(`Total Days: ${diffDays}`);
            $("#noofdays").val(diffDays);


          }
        });
      } else if (type === "anytime") {
        dateInput.style.display = 'none';
        selectedText.textContent = "Anytime selected";
        $("#noofdays").val(1);
      }
    }

    // Radio button listener
    document.querySelectorAll('input[name="dateOption"]').forEach(radio => {
      radio.addEventListener('change', (e) => {
        $("#inner_content_details").show();
        initPicker(e.target.value);
      });
    });

    document.querySelectorAll('input[name="triptype"]').forEach(radio => {
      radio.addEventListener('change', (e) => {
            //alert(e.target.value);
            if (e.target.value=="umrahonly"){
                 $("#umrahwithholiday").hide();
                 $("#umrahonly").show();
            }else{
                $("#umrahwithholiday").show();
                $("#umrahonly").hide();
            }
      });
    });

    // Init default picker
    initPicker("fixed");
    </script>
</body>

</html>
