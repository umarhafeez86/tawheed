@extends('administrative.layouts.main')

@section('main-container')
    <!-- Footable CSS -->
    <link href="{{ url('admin/vendors/bower_components/jsgrid/dist/jsgrid.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('admin/vendors/bower_components/jsgrid/dist/jsgrid-theme.min.css') }}" rel="stylesheet"
        type="text/css" />

    <div class="container-fluid">

        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">{{ $page_name }}</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ url('administrative/dashboard') }}">Dashboard</a></li>
                    <li class="active"><span>{{ $subpage_name }}</span></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">{{ $subpage_name }} List</h6>
                        </div>
                        <div class="pull-right">
                            @if (userpermission_status(session()->get('adminusergroups_id'), '17_a') == true)
                                <button class="btn  btn-primary"
                                    onclick="window.location='{{ url('administrative/servicepackages/create') }}'">Add
                                    New</button>
                            @endif
                        </div>

                        <div class="clearfix"></div>
                        @if (Session::has('success'))
                            <p style="background:#01c853;color:#fff;border-radius:5px;margin-top:20px;padding-left:20px;">
                                {{ Session::get('success') }}
                            <div class="clearfix"></div>
                        @endif
                        </p>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table id="datable_1" class="table  display table-hover mb-30">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>

                                                <th>Destination</th>

                                                <th>Hotel Info.</th>
                                                <th>Price</th>
                                                <th>Sort</th>
                                                <th>Status</th>
                                                <th>Show All</th>
                                                <th width="100">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php
                                                use App\Models\Services;
                                                use App\Models\Hotelinfos;
												use App\Models\Destinations;
                                            @endphp



                                            @foreach ($servicepackages as $servicepackage)
                                                <tr>
                                                    <td>{{ $servicepackage->servicepackages_id }}</td>
                                                    @php
                                                        $main_services = Services::where(
                                                            'services_id',
                                                            $servicepackage->services_id,
                                                        )->first();
                                                    @endphp
                                                    <td>
                                                        <strong
                                                            style="color: #000">{{ $servicepackage->servicepackages_name }}</strong><br>
                                                        <span style="color: #ff0000;">
                                                            @if ($main_services)
                                                                {{ $main_services->services_name }}
                                                            @endif
                                                        </span><br>
                                                        @if ($servicepackage->soldout == 'Yes')
                                                            <span class="label label-danger"
                                                                id="stock_{{ $servicepackage->servicepackages_id }}"
                                                                style="cursor: pointer"
                                                                onclick="updatestockinfo('{{ $servicepackage->servicepackages_id }}');">Sold</span>
                                                        @else
                                                            <span class="label label-success"
                                                                id="stock_{{ $servicepackage->servicepackages_id }}"
                                                                style="cursor: pointer"
                                                                onclick="updatestockinfo('{{ $servicepackage->servicepackages_id }}');">Available</span>
                                                        @endif
                                                        @if ($servicepackage->featured_package != 1)
                                                            <span class="label label-info"
                                                                id="featured_{{ $servicepackage->servicepackages_id }}"
                                                                style="cursor: pointer"
                                                                onclick="updatefeaturedinfo('{{ $servicepackage->servicepackages_id }}');">Normal</span>
                                                        @else
                                                            <span class="label label-success"
                                                                id="featured_{{ $servicepackage->servicepackages_id }}"
                                                                style="cursor: pointer"
                                                                onclick="updatefeaturedinfo('{{ $servicepackage->servicepackages_id }}');">Featured</span>
                                                        @endif
                                                    </td>
                                                    @php
                                                        $destination_name = '';
                                                        $destination_info = Destinations::where(
                                                            'destinations_id',
                                                            $servicepackage->destinations_id,
                                                        )->first();
                                                        if ($destination_info) {
                                                            $destination_name = $destination_info->destinations_name;
                                                        }
                                                    @endphp
                                                    <td>
                                                        {{ $destination_name }}
                                                    </td>

                                                    @php
                                                        $makkah_hotel_info = Hotelinfos::where(
                                                            'hotelinfos_id',
                                                            $servicepackage->makkah_hotelinfos_id,
                                                        )->first();
                                                        $madinah_hotel_info = Hotelinfos::where(
                                                            'hotelinfos_id',
                                                            $servicepackage->madinah_hotelinfos_id,
                                                        )->first();
														$destination_hotel_info = Hotelinfos::where(
                                                            'hotelinfos_id',
                                                            $servicepackage->destination_hotelinfos_id,
                                                        )->first();
                                                    @endphp
                                                    <td>
                                                        <strong>Makkah:</strong>
                                                        @if ($makkah_hotel_info)
                                                            {{ $makkah_hotel_info->hotelinfos_name }}
                                                        @endif <br />
                                                        <strong>Madinah:</strong>
                                                        @if ($madinah_hotel_info)
                                                            {{ $madinah_hotel_info->hotelinfos_name }}
                                                        @endif <br />
														@if ($destination_info)
															<strong>{{ $destination_name }}:</strong>
															@if ($destination_hotel_info)
																{{ $destination_hotel_info->hotelinfos_name }}
															@endif
														@endif
                                                    </td>

                                                    <td>{{ $servicepackage->servicepackages_price }}</td>
                                                    <td>{{ $servicepackage->servicepackages_sort }}</td>

                                                    <td>
                                                        @if ($servicepackage->servicepackages_status == 1)
                                                            <span class="label label-success">Enable</span>
                                                        @else
                                                            <span class="label label-danger">Disable</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($servicepackage->showall == 'Yes')
                                                            <span class="label label-success"
                                                                id="showall_{{ $servicepackage->servicepackages_id }}"
                                                                style="cursor: pointer"
                                                                onclick="updateshowallinfo('{{ $servicepackage->servicepackages_id }}');">Yes</span>
                                                        @else
                                                            <span class="label label-danger"
                                                                id="showall_{{ $servicepackage->servicepackages_id }}"
                                                                style="cursor: pointer"
                                                                onclick="updateshowallinfo('{{ $servicepackage->servicepackages_id }}');">No</span>
                                                        @endif
                                                    </td>

                                                    <td>

                                                        @if (userpermission_status(session()->get('adminusergroups_id'), '17_e') == true)
                                                            <!--a href="{# route("administrative.servicepackages.imagesgallery",$servicepackage->servicepackages_id) #}" style="padding:0 5px;">
            <i class="fa fa-image" aria-hidden="true"></i>
                                </a-->
                                                        @endif


                                                        @if (userpermission_status(session()->get('adminusergroups_id'), '17_e') == true)
                                                            <a href="{{ route('administrative.servicepackages.edit', $servicepackage->servicepackages_id) }}"
                                                                style="padding:0 5px;">
                                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                                            </a>
                                                        @endif

                                                        @if (userpermission_status(session()->get('adminusergroups_id'), '17_d') == true)
                                                            <a href="javascript:void(0)"
                                                                onclick="deleteData({{ $servicepackage->servicepackages_id }});">
                                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                            </a>
                                                            <form
                                                                id="delete-data-from-{{ $servicepackage->servicepackages_id }}"
                                                                action="{{ route('administrative.servicepackages.destroy', $servicepackage->servicepackages_id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('delete')
                                                            </form>
                                                        @endif

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Row -->
    </div>
    <script>
        function deleteData($id) {
            if (confirm("Are you sure you want to delete data?")) {
                document.getElementById('delete-data-from-' + $id).submit();
            }
        }

        function updatestockinfo($id) {
            //alert ($id);
            $.ajax({
                url: "{{ url('/administrative/servicepackages/change_stock') }}" + "/" + $id,
                type: "get",
                success: function(response) {
                    //alert(response);
                    if (response == "Yes") {
                        $("#stock_" + $id).removeClass("label-success");
                        $("#stock_" + $id).addClass("label-danger");
                        $("#stock_" + $id).html("Sold");
                    } else {
                        $("#stock_" + $id).removeClass("label-danger");
                        $("#stock_" + $id).addClass("label-success");
                        $("#stock_" + $id).html("Available");
                    }
                }
            });
        }

        function updateshowallinfo($id) {
            //alert ($id);
            $.ajax({
                url: "{{ url('/administrative/servicepackages/change_showall') }}" + "/" + $id,
                type: "get",
                success: function(response) {
                    //alert(response);
                    if (response == "Yes") {
                        $("#showall_" + $id).removeClass("label-danger");
                        $("#showall_" + $id).addClass("label-success");
                        $("#showall_" + $id).html("Yes");
                    } else {
                        $("#showall_" + $id).removeClass("label-success");
                        $("#showall_" + $id).addClass("label-danger");
                        $("#showall_" + $id).html("No");
                    }
                }
            });
        }

        function updatefeaturedinfo($id) {
            //alert ($id);
            $.ajax({
                url: "{{ url('/administrative/servicepackages/change_featured') }}" + "/" + $id,
                type: "get",
                success: function(response) {
                    //alert(response);
                    if (response == 1) {
                        $("#featured_" + $id).removeClass("label-info");
                        $("#featured_" + $id).addClass("label-success");
                        $("#featured_" + $id).html("Featured");
                    } else {
                        $("#featured_" + $id).removeClass("label-success");
                        $("#featured_" + $id).addClass("label-info");
                        $("#featured_" + $id).html("Normal");
                    }
                }
            });
        }
    </script>
@endsection
