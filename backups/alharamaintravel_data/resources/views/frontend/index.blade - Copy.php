@extends('frontend.layouts.main')
@section('main-container')
<div class="col-12 m-0 float-start sliderarea">
    <div class="container">
         <div class="col-12 col-sm-12 col-md-6 float-start">

            @php
            use App\Models\Sliders;
            $sliders = Sliders::where('sliders_status',1)->orderBy('sliders_sort','desc')->limit(10)->get();
            @endphp
            @if ($sliders->count() > 0)            
            <div id="mainslider" class="carousel slide">
            <div class="carousel-inner">
                @php
                    $i = 1;
                @endphp
                @foreach ($sliders as $slider)
                <div class="carousel-item @if ($i == 1) active @endif">
                    <span class="slidertext1 float-start">{{ $slider->sliders_heading }}</span>
                    <div class="clearfix"></div>
                    <span class="slidertext2 float-start">{{ $slider->sliders_subheading }}</span>
                    <div class="clearfix"></div>
                    <span class="slidertext1 float-start">{{ $slider->sliders_textdetails }}</span>
                    <div class="clearfix"></div>
                    <span class="slidertext3 float-start">FR.</span> <span class="slidertext4 float-start">{{ $slider->sliders_textdetails2 }}</span> <span class="slidertext3 float-start">PP</span>
                    <div class="clearfix"></div>
                    <a class="btndiscover" href="{{ $slider->sliders_link }}" title="{{ $slider->sliders_heading }}">Discover</a>
                    <div class="clearfix"></div>
                </div>
                @php
                    $i++;
                @endphp
                @endforeach
            </div>
            @endif
 <!--button class="carousel-control-prev" type="button" data-bs-target="#mainslider" data-bs-slide="prev">
   <span class="carousel-control-prev-icon" aria-hidden="true"></span>
   <span class="visually-hidden">Previous</span>
 </button>
 <button class="carousel-control-next" type="button" data-bs-target="#mainslider" data-bs-slide="next">
   <span class="carousel-control-next-icon" aria-hidden="true"></span>
   <span class="visually-hidden">Next</span>
 </button-->
</div>
             
         </div>
        <div class="col-12 col-sm-12 col-md-6 mt-3 quickquotebg d-md-block float-start">
             <!-- step by step form -->
<h3 class="fastquoteformhead text-center">Get a fast quote in simple steps</h3>		

<div class="clearfix"></div>
<div id="success-message" class="col-12 text-center float-start mb-1"></div>
<div class="clearfix"></div>
<form id="fastquote" name="fastquote" action="{{ url('/fast-quote-process') }}" method="post" enctype="multipart/form-data">
@csrf
       <!-- start step indicators -->
       <div class="form-header d-flex mb-4">
           <span class="stepIndicator"></span>
           <span class="stepIndicator"></span>
           <span class="stepIndicator"></span>
       </div>
       <!-- end step indicators -->
   
       <!-- step one -->
       <div class="step">
           <p class="text-left stepheading mb-1">Are you planning for </p>
           <div class="mb-3">
               <select class="" name="packagetype" id="packagetype" oninput="this.className = ''">
                       <option value="">-- Select A Package Type ---</option>
                       <option value="Umrah Package">Umrah Packages</option>
                       <option value="Hajj Package">Hajj Package</option>
               </select>
           </div>
           <div class="mb-3">
            <select class="" name="travelmonth" id="travelmonth" oninput="this.className = ''">
                    <option value="">-- Select A Travel Month ---</option>
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
            </div>
                <!-- start previous / next buttons -->
                <div class="form-footer d-flex">
                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                </div>
                <!-- end previous / next buttons -->
       </div>
   
       <!-- step two -->
       <div class="step">
           <p class="text-left stepheading mb-1">Package Information</p>
           <div class="mb-3">
               <input type="number" placeholder="How many nights" oninput="this.className = ''" name="nightsinfo" id="nightsinfo">
           </div>
           <div class="mb-3">
               <input type="number" placeholder="No. of Passengers" oninput="this.className = ''" name="passginfo" id="passginfo">
           </div>
                <!-- start previous / next buttons -->
                <div class="form-footer d-flex">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                </div>
                <!-- end previous / next buttons -->
       </div>
   
       <!-- step three -->
       <div class="step">
            <p class="text-left stepheading mb-1">Your Information</p>
            <div class="mb-3">
                <input type="text" placeholder="Full name" oninput="this.className = ''" name="fullname" id="fullname">
            </div>
            <div class="mb-3">
                <input type="text" placeholder="Contact No." oninput="this.className = ''" name="phoneno" id="phoneno">
            </div>
            <div class="mb-3">
                <input type="email" placeholder="Email Address" oninput="this.className = ''" name="peremail" id="peremail">
            </div>
                    <!-- start previous / next buttons -->
                    <div class="form-footer d-flex">
                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                    <button type="button" id="nextBtn" onclick="submitfastquote()">Next</button>
                    </div>
                    <!-- end previous / next buttons -->
       </div>

</form>
            
            <!-- step by step form-->
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="clearfix"></div>

<!-- Trusted logs -->
<div class="container d-table">
    <div class="col-6 col-sm-6 col-md-3 col-lg-3 float-start text-center trustedlogos">
         <img src="{{ url('frontend/assets/images/trustpilot.jpg') }}" alt="" class="img-fluid">
    </div>
   <div class="col-6 col-sm-6 col-md-3 col-lg-3 float-start text-center trustedlogos">
        <img src="{{ url('frontend/assets/images/google-reviews.jpg') }}" alt="" class="img-fluid">
    </div>
   <div class="col-6 col-sm-6 col-md-3 col-lg-3 float-start text-center trustedlogos">
          <img src="{{ url('frontend/assets/images/atol-protection.jpg') }}" alt="" class="img-fluid">
    </div>
   <div class="col-6 col-sm-6 col-md-3 col-lg-3 float-start text-center trustedlogos">
          <img src="{{ url('frontend/assets/images/iata.jpg') }}" alt="" class="img-fluid">
    </div>
</div>
<div class="clearfix"></div>
<!-- Trusted logs -->

<!-- Find Best Package -->
<div class="col-12 findthebestpackage float-start">
    <div class="container position-relative">
           <a id="umrah-packages"></a>
           <h2>Find the Perfect Package for <span>Umrah</span></h2> 
        
           <div class="col-12 ps-0 pe-0 pt-4 float-start positon-relative">
               
<!-- Swiper Container -->
<div class="swiper-container col-12 float-start">
 <div class="swiper-wrapper">
    @php
    use App\Models\Banners;
    $banners = Banners::where('banners_status',1)->orderBy('banners_sort','asc')->get();
    @endphp
    @if ($banners->count() > 0)
    @foreach ($banners as $banner)
                <div class="swiper-slide">
                   <div class="col-12 float-start position-relative packagebox1">
                        <div class="col-12 position-absolute top-0" style="background: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5));border-top-left-radius:10px;border-top-right-radius:10px;min-height:60px;">
                         <!--span class="float-start totalnights text-center">{{ $banner->banners_text1 }}<br>Nights</span-->
                         <span class="float-start packageinfo">
                               <span class="float-start packagename">{{ $banner->banners_name }}</span>
                               <!--span class="float-start packagenightinfo">{{ $banner->banners_text2 }} Makkah</span>
                               <span class="float-end packagenightinfo">{{ $banner->banners_text3 }} Madinah</span-->
                         </span>
                        </div>
                        <img src="{{ asset('uploads/banners/'.$banner->banners_image) }}" alt="" class="img-fluid">
                        <div class="col-12 position-absolute bottom-0 z-1 pb-2" style="background: linear-gradient(rgba(0, 0, 0, 0.8),rgba(0, 0, 0, 0.8));border-bottom-left-radius:10px;border-bottom-right-radius:10px;">
                         <div class="packagebtminfo ms-auto me-auto">
                            <div class="col-12 float-start priceinfo text-end ms-1 bdrbottom"><span style="font-size:12px;">Starting from</span> {{ get_siteinfo('currency_symbol') }} {{ $banner->banners_price }}</div>
                            <a href="tel:{{ str_replace(' ', '',get_siteinfo('setting_phone')) }}" class="float-start ms-1 callnow">Call us</a>
                            <a href="{{ $banner->banners_link }}" class="float-end me-1 booknow">View More</a>
                         </div>
                        </div>
                    </div>
                </div>
    @endforeach
    @endif  
 </div>
 <!-- Add Pagination -->
 <div class="swiper-pagination"></div>
 <!-- Add Navigation -->
 <div class="swiper-button-next"></div>
 <div class="swiper-button-prev"></div>
</div>
               

           </div>
           <div class="clearfix"></div>
    </div>
</div>
<div class="clearfix"></div>
<!-- Find Best Package -->

<!-- Budget Friendly Package -->
<div class="col-12 budgetpackages float-start">
    <div class="container">
        @php
        $price_ranges = explode(",",get_siteinfo('price_range'));
        $priceminval  = reset($price_ranges);
        $pricemaxval  = end($price_ranges);
        $pricemidval  = array_slice($price_ranges, -3, 1)[0];
        @endphp 
            <div class="col-12 col-sm-12 col-md-12 float-start">
                                    <h2>Budget-Friendly Packages for Every Pilgrim</h2> 
                                    <h3>Affordable Bliss</h3> 
                                    <h4>Experience Spiritual Fulfillment Within Your Budget.</h4>
                                    <p class="col-12">Perfect for pilgrims seeking an economical yet comfortable journey. Enjoy essential services, convenient accommodations, and a fulfilling Umrah experience without
                            stretching your budget.</p>
                           <div class="col-8 col-sm-3 d-flex justify-content-center">
                                <form id="filterForm">
                                @csrf  <!-- CSRF token is required in Laravel -->
                                        <div class="clearfix"></div>
                                        @php
                                        $price_ranges = explode(",",get_siteinfo('price_range'));
                                        if (session()->has('priceminval')) {
                                            $priceminval = session('priceminval');
                                        }else{
                                            $priceminval = reset($price_ranges);
                                        }
                            
                                        if (session()->has('pricemaxval')) {
                                            $pricemaxval = session('pricemaxval');
                                        }else{
                                            $pricemaxval = array_slice($price_ranges, -2, 1)[0];
                                        }
                                        @endphp      
                                        <div class="pricerangesec" id="pricerangesecdesktop">
                                            <div class="price-input">
                                                <div class="field">
                                                <input type="number" class="input-min" id="input-min1" name="priceminval" value="{{ $priceminval }}">
                                                </div>
                                                <div class="separator">&pound;</div>
                                                <div class="field">
                                                <input type="number" class="input-max" id="input-max1" name="pricemaxval" readonly value="{{ $pricemaxval }}">
                                                </div>
                                            </div>
                                            <div class="slider">
                                                <div class="progress"></div>
                                            </div>
                                            <div class="range-input">
                                                <input type="range" class="range-min" min="0" max="{{ end($price_ranges) }}" value="{{ $priceminval }}" step="50">
                                                <input type="range" class="range-max" min="0" max="{{ end($price_ranges) }}" value="{{ $pricemaxval }}" step="50">
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                </form>   
                            </div>
                            <div class="clearfix"></div>        
                            <div class="col-12 mt-2 float-start position-relative" id="budgetarea">
                                        <!-- Swiper Container -->
                                        <div class="swiper-container2 col-12 float-start">
                                                <div class="swiper-wrapper">
                                                        @php
                                                        use App\Models\Servicepackages;
                                                        $servicepackages = Servicepackages::where('servicepackages_status',1)->where('servicepackages_price','<=',$pricemidval)->orderBy('servicepackages_sort','asc')->limit(6)->get();
                                                        @endphp
                                                        @if ($servicepackages->count() > 0)
                                                        @foreach ($servicepackages as $servicepackage)
                                                        <div class="swiper-slide">
                                                            <div class="col-12 float-start packagebox3">
                                                                    <div class="col-12 float-start">
                                                                        <img src="{{ asset('uploads/servicepackages/'.$servicepackage->servicepackages_image) }}" alt="" class="img">
                                                                    </div>
                                                                    <div class="col-12 float-start packageinfosec position-relative">
                                                                        <div class="priceinfoblock position-absolute">{{ get_siteinfo('currency_symbol') }} {{ $servicepackage->servicepackages_price }}</div>
                                                                        <div class="packageicons">
                                                                            <div class="col-6 float-start">{{ $servicepackage->servicepackages_totalnights }} Nights</div>
                                                                            <div class="col-6 float-start">{{ $servicepackage->servicepackages_startype }} Star 
                                                                                    @for ($i = 1; $i<=$servicepackage->servicepackages_startype; $i++) 
                                                                                    <i class="fa fa-star float-end mt-1 me-1"></i>
                                                                                    @endfor
                                                                            </div>
                                                                            <div class="clearfix"></div>
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                        <div class="col-12 ps-4 pe-4 float-start packageinfoblock">
                                                                        <h3 class="col-10 packagename3 pt-3 pb-3">{{ $servicepackage->servicepackages_name }}</h3>
                                                                        <div class="clearfix"></div>
                                                                        <div class="col-10 float-start packagetext">
                                                                                <ul>
                                                                                    <li><span class="iconinfo"><img src="{{ url('frontend/assets/images/icon-makkah.png') }}" alt=""></span> {{ $servicepackage->servicepackages_makkahnights }} Nights Makkah</li>
                                                                                    <li><span class="iconinfo"><img src="{{ url('frontend/assets/images/icon-madinah.png') }}" alt=""></span> {{ $servicepackage->servicepackages_madinahnights }} Nights Makkah</li>
                                                                                    <li><span class="iconinfo"><img src="{{ url('frontend/assets/images/icon-flight.png') }}" alt=""></span> {{ $servicepackage->servicepackages_flightinfo }}</li>
                                                                                </ul>
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                    <div class="col-12 float-start ps-4 pe-4 packagebox3actions">
                                                                        <a href="tel:{{ str_replace(' ', '',get_siteinfo('setting_phone')) }}" class="float-start btncallnow">Call Now</a>
                                                                        <a href="{{ url('/package/'.$servicepackage->servicepackages_url ) }}" class="float-end btnbooknow">Book Now</a>
                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        @endif
                                                </div>
                                                <!-- Add Pagination -->
                                                <div class="swiper-pagination"></div>
                                                <!-- Add Navigation -->
                                                <div class="swiper-button-next"></div>
                                                <div class="swiper-button-prev"></div>
                                        </div>
                                    
                            </div>
                        <div class="clearfix"></div>
            </div>   
        
    </div>
</div>
<div class="clearfix"></div>
<!-- Budget Friendly Package -->
   
<!-- estimate section -->
<div class="col-12 estimatesection float-start">
   <div class="container">
 
           <div class="col-12 col-sm-12 col-md-12 col-lg-6 d-none d-sm-none d-md-none d-lg-block float-start text-left">
               <h3>Plan Your Umrah in</h3>
               <h2>Cheapest Price</h2>
               <p>We believe that everyone should have the opportunity
to embark on this sacred pilgrimage without financial
constraints.</p>
               <div class="clearfix"></div>
           </div>
           <div class="col-12 col-sm-12 col-md-12 col-lg-5 float-end estimateformbg position-relative">
               
               <div class="position-absolute planeicon d-none d-sm-none d-md-none d-lg-block"><img src="{{ url('frontend/assets/images/plane-icon.png') }}" alt=""></div>
               <div class="position-absolute bagsicon d-none d-sm-none d-md-none d-lg-block"><img src="{{ url('frontend/assets/images/travel-bags-bg.png') }}" alt=""></div>
               
<!-- estimate form -->
<div class="col-11 float-start">		
<h3>ESTIMATION TO YOUR TRAVEL</h3>		
</div>
<div class="clearfix"></div>
<form id="estimateform" name="estimateform" method="post">
@csrf
        
    <div id="estimateform_msg" class="col-12 float-start mb-1"></div>

           <select class="col-12" id="departurefrom" name="departurefrom" required>
               <option value="" disabled selected>Departed Form</option>
               <option value="London Heathrow">London Heathrow</option>
               <option value="London Gatwick">London Gatwick</option>
               <option value="Manchester Airport">Manchester Airport</option>
               <option value="London Luton">London Luton</option>
               <option value="Edinburgh Airport">Edinburgh Airport</option>
               <option value="London Stansted">London Stansted</option>
           </select>
   
           <select class="col-12" id="destinationcity" name="destinationcity" required>
               <option value="" disabled selected>Where to go?</option>
               <option value="Jeddah">Jeddah</option>
               <option value="Riyadh">Riyadh</option>
               <option value="Dammam">Dammam</option>
               <option value="Madinah">Madinah</option>
           </select>

           <input class="col-5 me-4 float-start" type="date" id="travel_date" name="travel_date" placeholder="Traveling Date" required>

           <input class="col-6 float-start" type="text" id="estimate_fullname" name="estimate_fullname" placeholder="Full Name" required>
   
           <input class="col-12" type="text" id="estimate_noofpassg" name="estimate_noofpassg" placeholder="No. Of Passengers" required>

           <input class="col-12" type="text" id="estimate_phoneno" name="estimate_phoneno" placeholder="Phone No." required>
           <div class="clearfix"></div>	
           <button type="button" onclick="submitestimateform();" class="btnsubmit flex-grow-1">Get Free Quote</button>
</form>
<!-- estimate form -->
               <div class="clearfix"></div>
           </div>
       <div class="clearfix"></div>
   </div>
   <div class="clearfix"></div>
</div>
<div class="clearfix"></div>
<!-- estimates section -->
   
<!-- need figures section -->
<div class="col-12 figuressection float-start">
   <div class="container">
        <div class="col-12 col-sm-12 col-md-6 pt-5 float-start">
              <h3>{{ get_siteinfo('setting_name') }} is an</h3>
             <h2>Excellent Rated Company</h2>
             <p class="mt-4 mb-4">We believe that everyone should have the opportunity to embark
on this sacred pilgrimage without financial constraints.</p>
             <div class="clearfix"></div>
             <div class="headsec col-10 float-start"><span>We Have <strong>20 Years</strong> of Experience</span></div>
             <div class="clearfix"></div>
             <div class="col-3 mt-4 ms-5 me-5 float-start headtext">3K+<span>Umrah / Hajj</span></div>
             <div class="col-3 mt-4 ms-5 float-start headtext">5K+<span>Satisfied Clients</span></div>
             <div class="clearfix"></div>
        </div>
<!-- Testimonials Section -->
       @php
       use App\Models\Testimonials;
       $testimonials = Testimonials::where('status',1)->orderBy('testimonials_sort','desc')->limit(6)->get();
       @endphp
       @if ($testimonials->count() > 0)
       <div class="col-12 col-sm-12 col-md-6 float-start p-3">
            <div class="testimonialsections col-12 float-start">
                <h3 class="mb-5">Testimonials</h3>
                <div class="clearfix"></div>

                    <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                        <!-- Indicators (bullets) -->
                    <!-- Testimonial Items -->
                                <div class="carousel-inner">
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($testimonials as $testimonial)
                                    <div class="carousel-item @if ($i == 1) active @endif">
                                        <div class="d-block w-100">
                                        <small>{{ $testimonial->testimonials_name }}</small>
                                        <p class="testimonialtext">{!! $testimonial->testimonials_details !!}</p>
                                        </div>
                                    </div>
                                    @php
                                        $i++;
                                    @endphp
                                    @endforeach
                                </div>

                        <div class="carousel-indicators">
                        @php
                        $i = 0;
                        @endphp
                        @foreach ($testimonials as $testimonial)
                        <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="{{ $i }}" @if ($i == 0) class="active" @endif aria-current="true" aria-label="Slide {{ $i }})"></button>
                        @php
                            $i++;
                        @endphp
                        @endforeach
                        </div>	
                        <!-- Carousel Controls (Previous & Next buttons) -->
                        <!--<button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                        </button>-->
                    </div>
                <div class="clearfix"></div>
            </div>
       </div>
       @endif
<!-- Testimonials Section -->
   </div>
   <div class="clearfix"></div>
</div>
<div class="clearfix"></div>
<!-- need figures section -->
   
<!-- need help section -->
@include('frontend.layouts.helpline')
<!-- need help section -->
   
<!-- welcome info -->
<div class="container welcomeinfo mb-1 p-4">
@php
use App\Models\Staticpages;
$homeinfo = Staticpages::findorFail(1);
@endphp
@if ($homeinfo)
       <h1>{{ $homeinfo->pages_name }}</h1> 
       {!! $homeinfo->pages_details !!}
       <div class="col-12 infoblock float-start">
        @php
        $homeinfo2 = Staticpages::findorFail(2);
        @endphp
        @if ($homeinfo2)
            <h2>{{ $homeinfo2->pages_name }}</h2>
            <div class="col-12 infotext float-start">
                {!! $homeinfo2->pages_details !!}
            </div>
        @endif
       </div>
       <div class="clearfix"></div>
@endif

<!-- footer logos section -->
@include('frontend.layouts.footerlogos')
<!-- footer logos section -->

       <div class="clearfix"></div>
</div>
<div class="clearfix"></div>
<!-- welcome info -->	
           
@endsection