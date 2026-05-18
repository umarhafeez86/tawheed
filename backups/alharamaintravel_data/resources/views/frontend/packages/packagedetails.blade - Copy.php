@extends('frontend.layouts.innerpackage')

@section('main-container')

    <div class="background-color text-white">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6  backround-image hide-on-small-screens">
                    <h3 class="Logo mt-4"><a href="{{ url('') }}"><img
                                src="{{ asset('uploads/settings/' . get_siteinfo('header_logo')) }}"
                                alt="{{ get_siteinfo('setting_name') }}"></a></h3>
                    <p class="enquire-for-umrah custom-mt">Enquire for Umrah packages</p>
                    <div class="sign-up-for-umrah">
                        <form name="enquiryform" id="enquiryform" class="p-4 rounded ms-auto me-auto">
                            @csrf
                            <input type="hidden" name="estimate_packagetype" id="estimate_packagetype" value="Umrah">
                            <div class="mb-3">
                                <label for="name" class="custome-label mb-2">Name</label>
                                <input type="text" class=" input-filds" name="estimate_fullname" id="estimate_fullname"
                                    placeholder="Full name" required>
                            </div>
                            <div class="mb-3">
                                <label for="contact" class="custome-label mb-2">Contact Number</label>
                                <input type="text" class=" input-filds" name="estimate_phoneno" id="estimate_phoneno"
                                    placeholder="" required>
                            </div>
                            <div class="mb-3">
                                <label for="enquiry" class="custome-label mb-2">Enquiry Message</label>
                                <textarea class=" input-filds" name="estimate_msg" id="estimate_msg" rows="3" placeholder="Write your enquiry"></textarea>
                            </div>
                            <div class="mb-3" id="enquiryform_msg"></div>
                            <button type="button" class="submit-enquiry" onclick="submitenquiry();">Send Enquiry</button>
                        </form>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="{{ url('beat-my-price') }}" class="beat-price-btn mt-5">Beat my price</a>
                    </div>
                    <div class=" mt-4 d-flex align-items-center justify-content-between ms-auto me-auto col-8">
                        <div>
                            <p class="Available">Available 24/7</p>
                            <p class="phone-no-company">UAN <span class="phone-no"><a
                                        href="tel:{{ get_siteinfo('setting_phone') }}">{{ get_siteinfo('setting_phone') }}</a></span>
                            </p>
                        </div>
                        <div>
                            <a href="https://api.whatsapp.com/send?phone={{ str_replace(' ', '', get_siteinfo('setting_whatsappno')) }}&amp;text=Hi,I%20would%20like%20to%20contact%20you"
                                target="_blank"><img class="blur-wattsapp-img"
                                    src="{{ url('frontend/assets/images/wattsapp-image.svg') }}" alt=""></a>
                        </div>
                    </div>
                </div>




                <div class="col-lg-6  scrollable-section g-0">
                    <div class="hide-on-small-screens">
                        <ul
                                class="list-unstyled d-flex flex-row flex-wrap align-items-center justify-content-center mt-5 gap-5 display-block">
                                <li><a href="{{ url('/beat-my-price') }}" class="text-decoration-none custome-li-alignments ms-4">Beat My Price</a></li>
                                <li><a href="{{ url('/umrah-packages') }}" class="text-decoration-none custome-li-alignments">Umrah Packages</a>
                                </li>
                                <li><a href="{{ url('/hajj-packages') }}" class="text-decoration-none custome-li-alignments">Hajj Packages</a>
                                </li>
                                <li><a href="{{ url('/services/ramdan-umrah-package') }}" class="text-decoration-none custome-li-alignments">Ramadan Packages</a></li>
                                <li class="me-3"><a href="{{ url('/blogs') }}"
                                        class="text-decoration-none custome-li-alignments">Blogs</a></li>
                            </ul>
                    </div>


                    <div class="backround-image show-on-small-screens">
                        <div class="row">
                            <h3 class="Logo"><a href="{{ url('') }}"><img
                                src="{{ asset('uploads/settings/' . get_siteinfo('header_logo')) }}"
                                alt="{{ get_siteinfo('setting_name') }}"></a></h3>
                        </div>
                        <hr class="line">
                        <div class="">
                            <nav class="navbar  fixed-top">
                                <div class="container-fluid">
                                    <a class="navbar-brand" href="tel:{{ get_siteinfo('setting_phone') }}">
                                        <p class="phone-no-company">UAN <span class="phone-no">{{ get_siteinfo('setting_phone') }}</span></p>
                                    </a>
                                    <div>
                                        <a href="https://api.whatsapp.com/send?phone={{ str_replace(' ', '', get_siteinfo('setting_whatsappno')) }}&amp;text=Hi,I%20would%20like%20to%20contact%20you"
                                            target="_blank"><img
                                                src="{{ url('frontend/assets/images/wattsapp-image.svg') }}"
                                                class="wattsapp-icon me-3" alt=""></a>
                                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                                            data-bs-target="#navbarMenuLarge" aria-controls="offcanvasNavbar"
                                            aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"></span>
                                        </button>
                                    </div>
                                    <div class="offcanvas offcanvas-end" tabindex="-1" id="navbarMenuLarge"
                                        aria-labelledby="offcanvasNavbarLabel">
                                        <div class="offcanvas-header">
                                            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Know More About Us</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="offcanvas-body">
                                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ url('/beat-my-price') }}">Beat My Price</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ url('/umrah-packages') }}">Umrah
                                                        Packages</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ url('/hajj-packages') }}">Hajj
                                                        Packages</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link " href="{{ url('/services/ramdan-umrah-package') }}">Ramadan Packages</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ url('/blogs') }}">Blogs</a>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>

                                </div>
                            </nav>

                        </div>
                        <p class="umrah-pkg">Umrah Packages</p>

                        <button type="button" class="all-btn2" data-bs-toggle="modal" data-bs-target="#enquirymodal">
                            Send Enquiry
                          </button>
                          
                          <!-- Modal -->
                          <div class="modal fade" id="enquirymodal" tabindex="-1" aria-labelledby="enquirymodal" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-body custom-modal-content">
                                        <button type="button" class="btn-close btn-close-white float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                                        <form name="enquiryformmob" id="enquiryformmob" class="p-4 rounded ms-auto me-auto">
                                        @csrf
                                            <input type="hidden" name="estimate_packagetype" id="estimate_packagetype2" value="Umrah">
                                            <div class="mb-3">
                                                <label for="name" class="custome-label mb-2">Name</label>
                                                <input type="text" class="input-filds" name="estimate_fullname" id="estimate_fullname2" placeholder="Full name" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="contact" class="custome-label mb-2">Contact Number</label>
                                                <input type="text" class="input-filds" name="estimate_phoneno" id="estimate_phoneno2" placeholder="" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="enquiry" class="custome-label mb-2">Enquiry Message </label>
                                                <textarea class="input-filds" name="estimate_msg" id="estimate_msg2" rows="3"
                                                    placeholder="Write your enquiry"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <div class="mb-3" id="enquiryformmob_msg"></div>
                                            </div>
                                            <button type="button" class="submit-enquiry" onclick="submitenquirymob();">Send Enquiry</button>
                                        </form>
                                </div>
                              </div>
                            </div>
                          </div>


                    </div>

                    @php
                        $page_title_info = explode(' ', $page_title);
                    @endphp
                    @php
                        use App\Models\Services;
                        use App\Models\Servicepackagesimgs;

                        use App\Models\Hotelinfos;
                        use App\Models\Hotelimgs;

                        $makkah_hotel_info = Hotelinfos::where(
                            'hotelinfos_id',
                            $servicepackage->makkah_hotelinfos_id,
                        )->first();
                        $madinah_hotel_info = Hotelinfos::where(
                            'hotelinfos_id',
                            $servicepackage->madinah_hotelinfos_id,
                        )->first();
                        $service = Services::where('services_id', $servicepackage->services_id)->first();
                    @endphp
                    @php
                        $hotelimgs_makkah = "";
                        $hotelimgs_madinah = "";
                        if ($makkah_hotel_info)
                        $hotelimg = Hotelimgs::query()
                        ->where('hotelimgs_status',1)->where('hotelinfos_id',$makkah_hotel_info->hotelinfos_id)
                        ->orderBy('hotelimgs_sort','asc')->first();
                    @endphp
                    @if ($hotelimg)
                    @php
                        if ($hotelimgs_makkah==""){
                            $hotelimgs_makkah = $hotelimg->hotelimgs_image;
                        }
                    @endphp
                    @endif


                    @php
                    if ($madinah_hotel_info)
                    $hotelimg2 = Hotelimgs::query()
                    ->where('hotelimgs_status',1)->where('hotelinfos_id',$madinah_hotel_info->hotelinfos_id)
                    ->orderBy('hotelimgs_sort','asc')->first();
                    @endphp
                    @if ($hotelimg2)
                    @php
                        if ($hotelimgs_madinah==""){
                        $hotelimgs_madinah = $hotelimg2->hotelimgs_image;
                        }
                    @endphp
                    @endif


                    <div class=" ms-5">
                        <span class="d-flex justify-content-start custom-mt umrah-package"><a
                                href="{{ url('/services/' . $service->services_url) }}">{{ $service->services_name }}</a></span>
                        <span class="seat-reserve mt-2 d-block">{{ $page_title }}</span>
                        <p class="umrah-p mt-3 me-5">{!! $servicepackage->servicepackages_details !!}</p>
                        <p class="umrah-price mt-4">{{ get_siteinfo('currency_symbol') }}
                            {{ $servicepackage->servicepackages_price }} <span class="umrah-price-span">per person</span>
                        </p>
                        <p class="custom-mt details-umrah">Details</p>
                        <div class="col-lg-12 col-sm-12 ">
                            <div class="details-section text-white me-md-5 me-sm-5">
                                <p class="d-flex justify-content-between mt-2 mb-2">
                                    <span class="details-section-h">Stars</span>
                                    <span class="details-section-p">{{ $servicepackage->servicepackages_startype }}
                                        Stars</span>
                                </p>
                                <hr class="break-line">
                                <p class="d-flex justify-content-between mt-2 mb-2">
                                    <span class="details-section-h">Total</span>
                                    <span class="details-section-p">{{ $servicepackage->servicepackages_totalnights }}
                                        Nights</span>
                                </p>
                                <hr class="break-line">

                                <p class="d-flex justify-content-between mt-2 mb-2">
                                    <span class="details-section-h">Stays</span>
                                    <span class="details-section-p">Makkah:
                                        {{ $servicepackage->servicepackages_madinahnights }} Nights &nbsp;&nbsp; Madina:
                                        {{ $servicepackage->servicepackages_madinahnights }}
                                        Nights</span>
                                </p>
                                <hr class="break-line">
                            </div>
                        </div>

                        @if ($servicepackage->heading1 != '')
                            <p class="custom-mt mb-5 Itinerary">{{ $servicepackage->heading1 }}</p>
                            <p class="confirmation custom-mb">{!! $servicepackage->heading1_details !!}</p>
                        @endif

                        <p class="mb-5 Hotels">Hotels</p>
                        <div class="col-lg-12 d-flex mb-5">
                            @if ($makkah_hotel_info)
                                <div class="col-12 col-sm-4 hotel-image">
                                    <img src="{{ asset('uploads/hotels/gallery/'.$hotelimgs_makkah) }}"
                                        alt="" class="img-fluid">
                                </div>
                                <div class="ms-4 me-auto">
                                    <p class="makkah-p mb-2">{{ $makkah_hotel_info->hotelinfos_city }}</p>
                                    <p class="hotel-location  mb-2">Hotel: <span
                                            class="name-service">{{ $makkah_hotel_info->hotelinfos_name }} -
                                            {{ $makkah_hotel_info->hotelinfos_city }}</span></p>
                                    <p class="hotel-location  mb-2">
                                        {!! strip_tags($makkah_hotel_info->hotelinfos_details) !!}
                                    </p>
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-12 d-flex mb-5 mt-5">
                            @if ($madinah_hotel_info)
                                <div class="col-12 col-sm-4 hotel-image">
                                    <img src="{{ asset('uploads/hotels/gallery/'.$hotelimgs_madinah) }}"
                                        alt="" class="img-fluid">
                                </div>
                                <div class="ms-4 me-auto">
                                    <p class="makkah-p  mb-2">{{ $madinah_hotel_info->hotelinfos_city }}</p>
                                    <p class="hotel-location  mb-2">Hotel: <span
                                            class="name-service">{{ $madinah_hotel_info->hotelinfos_name }} -
                                            {{ $madinah_hotel_info->hotelinfos_city }}</span></p>
                                    <p class="hotel-location  mb-2">
                                        {!! strip_tags($madinah_hotel_info->hotelinfos_details) !!}
                                    </p>
                                </div>
                            @endif
                        </div>

                        @if ($servicepackage->heading2 != '')
                            <div class="me-5">
                                <p class="custom-mt mb-5 Itinerary">{{ $servicepackage->heading2 }}</p>
                                {!! $servicepackage->heading2_details !!}
                            </div>
                        @endif

                        @if ($servicepackage->heading3 != '')
                            <div class="me-5">
                                <p class="mb-5 Hotels custom-mt custom-mb ">{{ $servicepackage->heading3 }}</p>
                                {!! $servicepackage->heading3_details !!}
                            </div>
                        @endif

                        @if ($servicepackage->heading4 != '')
                            <div class="mb-5 me-5">
                                <p class="mb-5 Hotels custom-mt custom-mb">{{ $servicepackage->heading4 }}</p>
                                {!! $servicepackage->heading4_details !!}
                            </div>
                        @endif

                    </div>

                    <div class="row mt-5 ms-5 me-5">
                        <div class="row mt-5 ">
                            <p class="related-umrah-pkg">Related Umrah packages</p>
                            @php
                                use App\Models\Servicepackages;
                                $servicepackages = Servicepackages::where('servicepackages_status', 1)
                                    ->where('services_id', $service->services_id)
                                    ->orderBy('servicepackages_sort', 'asc')
                                    ->limit(4)
                                    ->get();
                            @endphp
                            @if ($servicepackages->count() > 0)
                                @foreach ($servicepackages as $servicepackage)
                                    <div class="col-12 mt-5 p-0 float-start">
                                        <div class="row mt-4 ">
                                            <div class="col-4">
                                                <img class="image-border"
                                                    src="{{ asset('uploads/servicepackages/' . $servicepackage->servicepackages_image) }}"
                                                    alt="{{ $servicepackage->servicepackages_name }}">
                                            </div>
                                            <div class="col-8 hover-border">
                                                <div class="px-2">
                                                    <p class="rating-text">{{ $servicepackage->servicepackages_startype }}
                                                        Stars</p>
                                                    <h3 class="package-title ">{{ $servicepackage->servicepackages_name }}
                                                    </h3>
                                                    <p class="package-details">
                                                        {{ $servicepackage->servicepackages_makkahnights }} Nights Makkah -
                                                        {{ $servicepackage->servicepackages_madinahnights }} Nights Madinah
                                                    </p>
                                                    <ul>
                                                        <li class="package-includes">{!! $servicepackage->servicepackages_details !!}...
                                                            <span class="package-includes-details"><a
                                                                    href="{{ url('/package/' . $servicepackage->servicepackages_url) }}">Details</a></span>
                                                        </li>
                                                    </ul>
                                                    <span
                                                        class="package-price">{{ get_siteinfo('currency_symbol') }}{{ $servicepackage->servicepackages_price }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>

                    <!-- here is the show more section -->
                    <div class="row mt-4">
                        <div class="col-10 text-center ms-5 ">
                            <a href="{{ url('/umrah-packages') }}" class="show-more-button mt-4 w-100">Browse all</a>
                        </div>
                    </div>
                    @include('frontend.layouts.footer')
                </div>
            </div>
        </div>
    </div>

@endsection
