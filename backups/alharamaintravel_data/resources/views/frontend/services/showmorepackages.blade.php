
        @php
            $favorites = json_decode(Cookie::get('favorites', '[]'), true);
            //$compares  = json_decode(Cookie::get('compares', '[]'), true);
            use App\Models\Services;
            use App\Models\Servicepackages;
            use App\Models\Hotelinfos;
        @endphp
        @if ($servicepackages->count() > 0)
            @foreach ($servicepackages as $servicepackage)
                <div class="col-12 float-start package-grid mb-5">
                    <div class="col-12 col-sm-5 col-md-3 float-start position-relative img-round img-thumb-area">
                        <a href="{{ url('/package/' . $servicepackage->servicepackages_url) }}"
                            title="{{ $servicepackage->servicepackages_name }}">
                            <img src="{{ asset('uploads/servicepackages/' . $servicepackage->servicepackages_image) }}"
                                class="img-fluid img-round" alt="{{ $servicepackage->servicepackages_name }}">
                        </a>
                    </div>
                    <div class="col-12 col-sm-7 col-md-9 ps-1 ps-md-4 pt-2 float-start">
                        <h3 class="package_cat pe-sm-0 pe-md-1 pe-lg-2 pe-xl-5">
                            @php
                                $main_service = Services::where('services_id', $servicepackage->services_id)->first();
                                $makkah_hotel_info = Hotelinfos::where(
                                    'hotelinfos_id',
                                    $servicepackage->makkah_hotelinfos_id,
                                )->first();
                                $madinah_hotel_info = Hotelinfos::where(
                                    'hotelinfos_id',
                                    $servicepackage->madinah_hotelinfos_id,
                                )->first();
                            @endphp
                            @if ($main_service)
                                {{ $main_service->services_name }}
                            @endif
                            <span class="package_stars float-end">
                                @for ($i = 1; $i <= $servicepackage->servicepackages_startype; $i++)
                                    <i class="fa fa-star"></i>
                                @endfor
                            </span>
                        </h3>
                        <h4 class="package_name pe-sm-0 pe-md-1 pe-lg-2 pe-xl-5">
                            {{ $servicepackage->servicepackages_name }}<span
                                class="package_price float-end">{{ get_siteinfo('currency_symbol') }}{{ $servicepackage->servicepackages_price }}</span>
                        </h4>
                        <div class="clearfix"></div>
                        <p class="package_short_info">
                            @if ($makkah_hotel_info)
                                {{ $makkah_hotel_info->hotelinfos_name }}
                            @endif -
                            <span>{{ $servicepackage->servicepackages_makkahnights }} Nights in Makkah</span> *
                            @if ($madinah_hotel_info)
                                {{ $madinah_hotel_info->hotelinfos_name }}
                            @endif - <span>{{ $servicepackage->servicepackages_madinahnights }} Nights
                                in Madinah</span>...
                        </p>
                        <div class="clearfix"></div>
                        <p class="package_short_icons">
                            @if ($servicepackage->visa_info == 'Included')
                                <span class="visaicon float-start me-3"></span>
                            @endif
                            @if ($servicepackage->flight_info == 'Included')
                                <span class="flighticon float-start me-3"></span>
                            @endif
                            @if ($servicepackage->makkah_hotelinfos_id != 'Not Included' || $servicepackage->madinah_hotelinfos_id != 'Not Included')
                                <span class="hotelicon float-start me-3"></span>
                            @endif
                            @if ($servicepackage->transport_info != 'Not Included')
                                <span class="busicon float-start me-3"></span>
                            @endif
                            @if (
                                $servicepackage->makkah_hotel_meal_info != 'Not Included' ||
                                    $servicepackage->madinah_hotel_meal_info != 'Not Included')
                                <span class="mealicon float-start me-3"></span>
                            @endif
                        </p>
                        <div class="clearfix"></div>
                        <span class="btn_save float-start fav-btn" style="cursor: pointer"
                            id="servicepackage_{{ $servicepackage->servicepackages_id }}"
                            data-id="{{ $servicepackage->servicepackages_id }}">
                            @if (in_array($servicepackage->servicepackages_id, $favorites))
                                <i class="fa fa-heart"></i> Saved
                            @else
                                <i class="far fa-heart"></i> Save
                            @endif
                        </span>
                        <a href="{{ url('/package/' . $servicepackage->servicepackages_url) }}"
                            class="btn_details float-end">Details</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            @endforeach
<script>
$('.fav-btn').on('click', function () {
        const id = $(this).data('id');
        $.ajax({
            url: "{{ route('favorites.toggle') }}",
            type: 'POST',
            data: {
                id: id,
                _token: "{{ csrf_token() }}"
            },
            success: function (response) {
                //alert(`Item ${response.status} to favorites.`);
                //location.reload(); // or update UI dynamically
                $fav = `${response.status}`;
                if ($fav == "added"){
                    //alert(`Item ${response.status} to favorites.`);
                    //$("#servicepackage_"+id).attr("src","{{ url('frontend/assets/images/yellow-heart.svg') }}");
                    $("#servicepackage_"+id).html('<i class="fa fa-heart"></i> Saved');
                    $(".iconcount").html($total_saved);
                    $("#notification_info").html('Package added to My Saved List. <a href="{{ url('/saved-packages') }}">Click here</a> to My Saved Packages.');
                    showNotification();
                }else{
                    //alert("servicepackage_"+id);
                    //$("#servicepackage_"+id).attr("src","{{ url('frontend/assets/images/heart-icon.svg') }}");
                    $("#servicepackage_"+id).html('<i class="far fa-heart"></i> Save');
                    $(".iconcount").html($total_saved);
                    $("#notification_info").html('Package removed from My Saved List. <a href="{{ url('/saved-packages') }}">Click here</a> to My Saved Packages.');
                    showNotification();
                }
            }
        });
});
</script>
        @endif