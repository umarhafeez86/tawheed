@extends('frontend.layouts.innercompare')
@section('main-container')
                <div class="col-12 float-start pt-3 pb-3 goback">
                    <a href="{{ url()->previous() }}"><i class="fa fa-arrow-left me-2"></i> Go Back</a>
                <div class="clearfix"></div>
                </div>
                
                <div class="clearfix"></div>
                <h1 class="col-12 mt-4 mb-0 mb-md-3 page_heading float-start">
                    {{ $page_name }}
                </h1>
                <div class="clearfix"></div>

                <div class="col-12 mt-4 mb-4 float-start"> <!-- overflow-x-auto -->
@php
use App\Models\Servicepackages;
use App\Models\Hotelinfos;

$compares = json_decode(Cookie::get('compares', '[]'), true);
@endphp

 @if (count($compares) > 0)
 @php
   $colspan  = count($compares) + 1;
 @endphp
              <table class="table table-bordered text-white custom-table">
                <thead class="custom-thead">
                  <tr class="custom-tr">
                    <th class="custom-th" scope="col"></th>
                    @foreach ($compares as $compare)
                    @php
                          $package_info = Servicepackages::where("servicepackages_id",$compare)->first();
                          $makkah_hotel_info     = Hotelinfos::where('hotelinfos_id',$package_info->makkah_hotelinfos_id)->first();
                          $madinah_hotel_info    = Hotelinfos::where('hotelinfos_id',$package_info->madinah_hotelinfos_id)->first();
                          $makkah_hotel_names[]  = $makkah_hotel_info->hotelinfos_name;
                          $madinah_hotel_names[] = $madinah_hotel_info->hotelinfos_name;

                          $package_prices[]                            = $package_info->servicepackages_price;
                          $package_servicepackages_startypes[]         = $package_info->servicepackages_startype;
                          $package_servicepackages_totalnights[]       = $package_info->servicepackages_totalnights;

                          $package_servicepackages_makkahnights[]      = $package_info->servicepackages_makkahnights;
                          $package_servicepackages_madinahnights[]     = $package_info->servicepackages_madinahnights;

                          $package_makkah_hotel_meal_infos[]           = $package_info->makkah_hotel_meal_info;
                          $package_madinah_hotel_meal_infos[]          = $package_info->madinah_hotel_meal_info;
                          $package_visa_infos[]                        = $package_info->visa_info;
                          $package_transport_infos[]                   = $package_info->transport_info;
                          $package_flight_infos[]                      = $package_info->flight_info;

                    @endphp
                    <th class="custom-th" scope="col">{{ $package_info->servicepackages_name }}</th>
                    @endforeach
                  </tr>
                </thead>
                <tbody>
                  <tr class="custom-tr">
                    <td class="custom-td sticky-col">Ratings</td>
                    @foreach ($package_servicepackages_startypes as $package_servicepackages_startype)
                    <td class="custom-td">
                      <span class="number-cell">{{ $package_servicepackages_startype }}</span>
                      <span class="text-cell">Stars</span>
                    </td>
                    @endforeach
                  </tr>
                  <tr class="custom-tr">
                    <td class="custom-td sticky-col">Total Nights</td>
                    @foreach ($package_servicepackages_totalnights as $package_servicepackages_totalnight)
                    <td class="custom-td">
                      <span class="number-cell">{{ $package_servicepackages_totalnight }}</span>
                      <span class="text-cell">Nights</span>
                    </td>
                    @endforeach
                  </tr>
                  <tr class="custom-tr">
                    <td class="custom-td-h sticky-col" colspan="{{ $colspan }}" class="text-center" style="color: #FACE8D;font-size:14px;">
                      Makkah Accommodations
                    </td>
                  </tr>
                  <tr class="custom-tr">
                    <td class="custom-td sticky-col">Nights</td>
                    @foreach ($package_servicepackages_makkahnights as $package_servicepackages_makkahnight)
                    <td class="custom-td">
                      <span class="number-cell">{{ $package_servicepackages_makkahnight }}</span>
                    </td>
                    @endforeach
                  </tr>
                  <tr class="custom-tr">
                    <td class="custom-td sticky-col">Hotel</td>
                    @foreach ($makkah_hotel_names as $makkah_hotel_name)
                    <td class="custom-td">
                      <span class="text-cell">{{ $makkah_hotel_name }}</span>
                    </td>
                    @endforeach
                  </tr>
                  <tr class="custom-tr">
                    <td class="custom-td sticky-col">Meal</td>
                    @foreach ($package_makkah_hotel_meal_infos as $package_makkah_hotel_meal_info)
                    <td class="custom-td">
                      <span class="text-cell">{{ $package_makkah_hotel_meal_info }}</span>
                    </td>
                    @endforeach
                  </tr>


                  <tr class="custom-tr">
                    <td class="custom-td-h sticky-col" colspan="{{ $colspan }}" class="text-center" style="color: #FACE8D;font-size:14px;">
                      Madinah Accommodations
                    </td>
                  </tr>
                  <tr class="custom-tr">
                    <td class="custom-td sticky-col">Nights</td>
                    @foreach ($package_servicepackages_madinahnights as $package_servicepackages_madinahnight)
                    <td class="custom-td">
                      <span class="number-cell">{{ $package_servicepackages_madinahnight }}</span>
                    </td>
                    @endforeach
                  </tr>
                  <tr class="custom-tr">
                    <td class="custom-td sticky-col">Hotel</td>
                    @foreach ($madinah_hotel_names as $madinah_hotel_name)
                    <td class="custom-td">
                      <span class="text-cell">{{ $madinah_hotel_name }}</span>
                    </td>
                    @endforeach
                  </tr>
                  <tr class="custom-tr">
                    <td class="custom-td sticky-col">Meal</td>
                    @foreach ($package_madinah_hotel_meal_infos as $package_madinah_hotel_meal_info)
                    <td class="custom-td">
                      <span class="text-cell">{{ $package_madinah_hotel_meal_info }}</span>
                    </td>
                    @endforeach
                  </tr>

                  <tr class="custom-tr">
                    <td class="custom-td-h sticky-col" colspan="{{ $colspan }}" class="text-center" style="color: #FACE8D;font-size:14px;">
                      Other Info.
                    </td>
                  </tr>
                  <tr class="custom-tr">
                    <td class="custom-td sticky-col">Flight</td>
                    @foreach ($package_flight_infos as $package_flight_info)
                    <td class="custom-td">
                      <span class="number-cell">{{ $package_flight_info }}</span>
                    </td>
                    @endforeach
                  </tr>
                  <tr class="custom-tr">
                    <td class="custom-td sticky-col">Visa</td>
                    @foreach ($package_visa_infos as $package_visa_info)
                    <td class="custom-td">
                      <span class="number-cell">{{ $package_visa_info }}</span>
                    </td>
                    @endforeach
                  </tr>
                  <tr class="custom-tr">
                    <td class="custom-td sticky-col">Per Person Price</td>
                    @foreach ($package_prices as $package_price)
                    <td class="custom-td">
                      <span class="number-cell">&pound; {{ $package_price }}</span>
                    </td>
                    @endforeach
                  </tr>


                  <tr class="custom-tr">
                    <td class="custom-td sticky-col">&nbsp;</td>
                    @foreach ($compares as $compare)
                    @php
                      $servicepackages_booking = Servicepackages::query()
                ->where('servicepackages_id', $compare)
                ->first();
                    @endphp
                    <td class="custom-td">
                      <a href="{{ url('/package/'.$servicepackages_booking->servicepackages_url.'#booknowsection')}}" class="book-umrah">Book Umrah</a>
                    </td>
                    @endforeach
                  </tr>
                </tbody>
              </table>
@else
    <div class="mt-3 mb-3 text-center page_sub_heading">Select Packages to Compare</div>
@endif

                </div>

                <div class="clearfix"></div>
@endsection
