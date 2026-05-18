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

 <div class="container custome-margin-top custome-margin-bottom ">
     <div class="row gap-3 gap-lg-0">
         <div class="col-12 col-lg-6 mt-lg-5">
             <div class="icon-heading mb-2 d-flex gap-lg-2 ">
                 <img src="{{ asset('frontend/assets/images/ornament.svg') }}" class="img-fluid" alt="Ornament Icon">
                 <h2 class="about-title mb-0">Customize</h2>
             </div>
             <h2 class="mt-2 mt-lg-4 section-subtitle">Let Our Experts Create the Perfect Package for You</h2>
             <p class="mt=3 mt-lg-5 expert-text">Whether you're planning a spiritual Umrah journey or want to combine
                 it
                 with
                 a relaxing holiday — we’ve got you covered.</p>
             <img src="{{ asset('frontend/assets/images/our-support.jpg') }}" class="img-fluid mt-3 mt-lg-4 "
                 alt="">
         </div>

         <div class="col-12 col-lg-6">
             <form name="customholidayform_btm" id="customholidayform_btm" method="post">
                 @csrf
                 <div class="service-form custom-form-container p-4 p-lg-5 rounded">
                     <h4 class="form-title position-relative">
                         Choose Your Journey Type
                         <img src="{{ asset('frontend/assets/images/icon-loc-makkah.png') }}"
                             class="position-absolute pos-img-btm" alt="">
                     </h4>


                     
                     <div class="form-check-group mt-4 mb-4">
                         <div class="form-check ">
                             <input class="form-check-input" type="radio" name="journeyType" id="umrahOnly" checked>
                             <label class="form-check-label ms-1 mb-3" for="umrahOnly">Umrah Only</label>
                         </div>
                         <div class="form-check">
                             <input class="form-check-input" type="radio" name="journeyType" id="umrahHoliday">
                             <label class="form-check-label mb-3 ms-1" for="umrahHoliday">Umrah with Holiday
                                 Extension</label>
                         </div>
                     </div>

                     <div class="mb-3 mt-3">
                         <label class="form-label" for="DepartureCity">Departure City</label>
                         <select class="form-control custom-input select3" name="DepartureCity" id="DepartureCity">
                             <option value="">-- Select One--</option>
                             @php
                                 use App\Models\Airports;
                                 $airports = Airports::orderBy('name', 'asc')->get();
                             @endphp
                             @foreach ($airports as $airport)
                                 <option
                                     value="{{ $airport->cityName }} {{ str_replace($airport->cityName, '', $airport->name) }} ({{ $airport->code }})-{{ $airport->countryName }}">
                                     {{ $airport->cityName }} {{ str_replace($airport->cityName, '', $airport->name) }}
                                     ({{ $airport->code }})-{{ $airport->countryName }}</option>
                             @endforeach
                         </select>

                     </div>

                     <div class="row mb-3 mt-4">
                         <div class="col">
                             <label class="form-label">No. Of Pax</label>
                             <input type="number" class="form-control custom-input" placeholder="2">
                         </div>
                         <div class="col">
                             <label class="form-label">Hotel Preference</label>
                             <select class="form-select custom-input" name="travelmonth" id="travelmonth">
                                    <option value="">-- Select ---</option>
                                    <option value="3 Star">3 Star</option>
                                    <option value="4 Star">4 Star</option>
                                    <option value="5 Star">5 Star</option>
                             </select>       
                         </div>
                     </div>

                     <div class="mb-2 d-flex align-items-center justify-content-between">
                         <label class="form-label mb-0 mt-2">Departure dates <span class="select-any-text">( select any
                                 )</span></label>
                     </div>

                     <div class="btn-group d-flex gap-2 mb-4 mt-3" role="group">
                         <input type="radio" name="dateOption" id="fixed" class="custom-radio-input"
                             value="fixed">
                         <label for="fixed" class="btn custom-date-btn">Fixed</label>

                         <input type="radio" name="dateOption" id="flexible" class="custom-radio-input"
                             value="flexible">
                         <label for="flexible" class="btn custom-date-btn">Flexible</label>

                         <input type="radio" name="dateOption" id="anytime" class="custom-radio-input"
                             value="anytime">
                         <label for="anytime" class="btn custom-date-btn">Anytime</label>
                     </div>

                     <div class="mb-2 d-flex align-items-center justify-content-between">
                             <div class="col-12" id="inner_content_details">
                                 <label class="form-label">Selected Time</label>
                                 <input type="text" id="dateInput" class="form-control picker-input custom-input"
                                     placeholder="Select a date...">
                                 <!-- Output -->
                                 <p class="mt-3" id="selectedText"></p>
                             </div>
                     </div>



                     <button type="submit" class="btn custom-submit-btn w-100 mt-4">Next</button>

                 </div>
             </form>
         </div>
     </div>
 </div>
