                <div class="col-12 float-start">
                    <h3 class="page_sub_heading mb-0 mt-5 mb-lg-4 mt-lg-5">Related Umrah Packages 2025</h3>
                    <div class="clearfix"></div>
                    @php
                    $favorites = json_decode(Cookie::get('favorites', '[]'), true);
                    //$compares  = json_decode(Cookie::get('compares', '[]'), true);

                    use App\Models\Services;
                    use App\Models\Servicepackages;
                    use App\Models\Hotelinfos;
                    
                    $service = Services::where('services_id', $servicepackage->services_id)->first();




                        $related_servicepackages = Servicepackages::where('servicepackages_status', 1)
                                ->where('services_id', $service->services_id)
                                ->where('servicepackages_id','!=', $servicepackage->servicepackages_id)
                                ->when(session('roomtype'), function ($query, $roomtype) {
                                    return $query->where('servicepackages_startype', $roomtype);
                                })
                                ->when(session('packagenights'), function ($query, $packagenights) {
                                    return $query->where('servicepackages_totalnights', session('packagenights'));
                                })
                                ->orderBy('servicepackages_sort', 'asc')
                                ->paginate(2); // Initial load

                    @endphp
                    @if ($related_servicepackages->count() > 0)
                        @foreach ($related_servicepackages as $related_servicepackage)
                            <div class="col-12 float-start package-grid mb-5">
                                <div
                                    class="col-12 col-sm-5 col-md-3 float-start position-relative img-round img-thumb-area">
                                    <a href="{{ url('/package/' . $related_servicepackage->servicepackages_url) }}"
                                        title="{{ $related_servicepackage->servicepackages_name }}">
                                        <img src="{{ asset('uploads/servicepackages/' . $related_servicepackage->servicepackages_image) }}"
                                            class="img-fluid img-round" alt="{{ $related_servicepackage->servicepackages_name }}">
                                    </a>
                                    @if ($related_servicepackage->soldout == 'Yes')
                                        <span class="soldout_tag">SOLD OUT</span>
                                    @endif
                                </div>
                                <div class="col-12 col-sm-7 col-md-9 ps-1 ps-md-4 pt-2 float-start">
                                    <h3 class="package_cat pe-sm-0 pe-md-1 pe-lg-2 pe-xl-5">
                                        @php
                                            $main_service = Services::where(
                                                'services_id',
                                                $related_servicepackage->services_id,
                                            )->first();
                                            $makkah_hotel_info = Hotelinfos::where(
                                                'hotelinfos_id',
                                                $related_servicepackage->makkah_hotelinfos_id,
                                            )->first();
                                            $madinah_hotel_info = Hotelinfos::where(
                                                'hotelinfos_id',
                                                $related_servicepackage->madinah_hotelinfos_id,
                                            )->first();
                                        @endphp
                                        @if ($main_service)
                                            {{ $main_service->services_name }}
                                        @endif
                                        <span class="package_stars float-end">
                                            @for ($i = 1; $i <= $related_servicepackage->servicepackages_startype; $i++)
                                                <i class="fa fa-star"></i>
                                            @endfor
                                        </span>
                                    </h3>
                                    <h4 class="package_name pe-sm-0 pe-md-1 pe-lg-2 pe-xl-5">
                                        {{ $related_servicepackage->servicepackages_name }}<span
                                            class="package_price float-end">{{ get_siteinfo('currency_symbol') }}{{ $related_servicepackage->servicepackages_price }}</span>
                                    </h4>
                                    <div class="clearfix"></div>
                                    <p class="package_short_info">
                                        @if ($makkah_hotel_info)
                                            {{ $makkah_hotel_info->hotelinfos_name }}
                                        @endif -
                                        <span>{{ $related_servicepackage->servicepackages_makkahnights }} Nights in
                                            Makkah</span> *
                                        @if ($madinah_hotel_info)
                                            {{ $madinah_hotel_info->hotelinfos_name }}
                                        @endif -
                                        <span>{{ $related_servicepackage->servicepackages_madinahnights }} Nights
                                            in Madinah</span>...
                                    </p>
                                    <div class="clearfix"></div>
                                    <p class="package_short_icons">
                                        @if ($related_servicepackage->visa_info == 'Included')
                                            <span class="visaicon float-start me-3"></span>
                                        @endif
                                        @if ($related_servicepackage->flight_info == 'Included')
                                            <span class="flighticon float-start me-3"></span>
                                        @endif
                                        @if ($related_servicepackage->makkah_hotelinfos_id != 'Not Included' || $related_servicepackage->madinah_hotelinfos_id != 'Not Included')
                                            <span class="hotelicon float-start me-3"></span>
                                        @endif
                                        @if ($related_servicepackage->transport_info != 'Not Included')
                                            <span class="busicon float-start me-3"></span>
                                        @endif
                                        @if (
                                            $related_servicepackage->makkah_hotel_meal_info != 'Not Included' ||
                                                $related_servicepackage->madinah_hotel_meal_info != 'Not Included')
                                            <span class="mealicon float-start me-3"></span>
                                        @endif
                                    </p>
                                    <div class="clearfix"></div>
                                    <span class="btn_save float-start fav-btn" style="cursor: pointer"
                                        id="servicepackage_{{ $related_servicepackage->servicepackages_id }}"
                                        data-id="{{ $related_servicepackage->servicepackages_id }}">
                                        @if (in_array($related_servicepackage->servicepackages_id, $favorites))
                                            <i class="fa fa-heart"></i> Saved
                                        @else
                                            <i class="far fa-heart"></i> Save
                                        @endif
                                    </span>
                                    <a href="{{ url('/package/' . $related_servicepackage->servicepackages_url) }}"
                                        class="btn_details float-end">Details</a>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        @endforeach
                    @endif
                    <div class="clearfix"></div>
                    <a href="{{ url('/umrah-packages') }}" class="btn_showmore mb-5">See all</a>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
