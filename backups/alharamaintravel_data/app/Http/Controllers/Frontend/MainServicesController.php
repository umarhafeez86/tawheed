<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Staticpages;

use App\Models\Services;
use App\Models\Servicepackages;


class MainServicesController extends Controller
{
    public function index(){

        $staticpages = Staticpages::findorFail(4);
        return view("frontend.services.services",[
            'page_title'     => $staticpages->pages_title,
            'page_descp'     => $staticpages->pages_descp,
            "page_keyword"   => $staticpages->pages_keyword
        ]);
    }

    public function servicesinfo($service_url=""){

                    $services_title     = "Umrah Packages";
                    $services_descp     = "";
                    $services_keyword   = "";
                    $services_image     = "";

                    return view('frontend.services.servicesinfo',[
                    'page_title'     => $services_title,
                    'page_descp'     => $services_descp,
                    "page_keyword"   => $services_keyword,
                    'services'       => "",
                    'services_image' => ""
                    ]);

    }


    public function servicesdetailsnew($service_url){

                    $services = Services::where("services_url",$service_url)->first();

                            $services_title     = $services->services_title;
                            $services_name      = $services->services_name;
                            $services_descp     = $services->services_descp;
                            $services_keyword   = $services->services_keyword;
                            $services_details   = $services->services_details;
                            $services_image     = $services->services_image;

                           
                            if (!session()->has('roomtype')) {
                                    session(['roomtype'      =>     '']);
                            }

                            if (!session()->has('packagenights')) {
                                    session(['packagenights' =>     '']);
                            }
                            
                            $price_ranges = explode(",",get_siteinfo('price_range'));
                            if (!session()->has('priceminval')) {
                                session(['priceminval'      =>     reset($price_ranges)]);
                            }else{
                                session(['priceminval'      =>     session('priceminval')]);
                            }

                            if (!session()->has('pricemaxval')) {
                                session(['pricemaxval'      =>     array_slice($price_ranges, -2, 1)[0]]);
                            }else{
                                session(['pricemaxval'      =>     session('pricemaxval')]);
                            }

                    $servicepackages = Servicepackages::where('servicepackages_status', 1)
                                ->where('services_id', $services->services_id)
                                ->when(session('roomtype'), function ($query, $roomtype) {
                                    return $query->where('servicepackages_startype', $roomtype);
                                })
                                ->when(session('packagenights'), function ($query, $packagenights) {
                                    return $query->where('servicepackages_totalnights', session('packagenights'));
                                })
                                ->orderBy('servicepackages_sort', 'asc')
                                ->paginate(6); // Initial load


                    return view('frontend.services.servicesdetails',[
                        'page_title'      => $services_title,
                        'page_name'       => $services_name,
                        'page_descp'      => $services_descp,
                        "page_keyword"    => $services_keyword,
                        'page_details'    => $services_details,
                        'services'        => $services,
                        'services_image'  => $services_image,
                        'servicepackages' => $servicepackages
                    ]);      
    }
    
    
    public function filterdatanew($service_url,Request $request)
    {

                    $services = Services::where("services_url",$service_url)->first();
                    $servicepackages = Servicepackages::query()
                    ->where('servicepackages_status',1)->where('services_id',$services->services_id)
                    ->when(request('roomtype'), function ($query, $roomtype) {
                        return $query->where('servicepackages_startype', $roomtype);
                    })
                    ->when(request('packagenights'), function ($query, $packagenights) {
                        return $query->where('servicepackages_totalnights', $packagenights);
                    })
                    ->whereBetween('servicepackages_price', [request('priceminval'), request('pricemaxval')])
                    ->orderBy('servicepackages_sort','asc')
                    ->paginate(6); // Initial load; 
                    
                    session(['roomtype'      =>     request('roomtype')]);
                    session(['packagenights' =>     request('packagenights')]);
                    session(['priceminval'   =>     request('priceminval')]);
                    session(['pricemaxval'   =>     request('pricemaxval')]);

                    return view('frontend.services.filterdata',[
                        'services'        => $services,
                        'roomtype'        => $request->roomtype,
                        'packagenights'   => $request->packagenights,
                        'servicepackages' => $servicepackages,
                    ]);
    }

    public function servicesdetails($service_url="all"){
        if ($service_url != "all"){
                    $services = Services::where("services_url",$service_url)->first();

                            $services_title     = $services->services_title;
                            $services_name      = $services->services_name;
                            $services_descp     = $services->services_descp;
                            $services_keyword   = $services->services_keyword;
                            $services_details   = $services->services_details;
                            $services_image     = $services->services_image;

                           
                            if (!session()->has('roomtype')) {
                                    session(['roomtype'      =>     '']);
                            }

                            if (!session()->has('packagenights')) {
                                    session(['packagenights' =>     '']);
                            }
                            
                            $price_ranges = explode(",",get_siteinfo('price_range'));
                            if (!session()->has('priceminval')) {
                                session(['priceminval'      =>     reset($price_ranges)]);
                            }else{
                                session(['priceminval'      =>     session('priceminval')]);
                            }

                            if (!session()->has('pricemaxval')) {
                                session(['pricemaxval'      =>     array_slice($price_ranges, -2, 1)[0]]);
                            }else{
                                session(['pricemaxval'      =>     session('pricemaxval')]);
                            }

                    $servicepackages = Servicepackages::where('servicepackages_status', 1)
                                ->where('services_id', $services->services_id)
                                ->when(session('roomtype'), function ($query, $roomtype) {
                                    return $query->where('servicepackages_startype', $roomtype);
                                })
                                ->when(session('packagenights'), function ($query, $packagenights) {
                                    return $query->where('servicepackages_totalnights', session('packagenights'));
                                })
                                ->orderBy('servicepackages_sort', 'asc')
                                ->paginate(6); // Initial load


                    return view('frontend.services.servicesdetails',[
                        'page_title'      => $services_title,
                        'page_name'       => $services_name,
                        'page_descp'      => $services_descp,
                        "page_keyword"    => $services_keyword,
                        'page_details'    => $services_details,
                        'services'        => $services,
                        'services_image'  => $services_image,
                        'servicepackages' => $servicepackages
                    ]);

        }else{


                    $staticpages = Staticpages::where("pages_id",1)->first();

                    $services_title     = $staticpages->pages_title;
                    $services_name      = $staticpages->pages_name;
                    $services_descp     = $staticpages->pages_descp;
                    $services_keyword   = $staticpages->pages_keyword;
                    $services_details   = $staticpages->pages_details;
                    $services_image     = "";

  
                    $price_ranges = explode(",",get_siteinfo('price_range'));
                            
                            if (!session()->has('roomtype')) {
                                    session(['roomtype'      =>     '']);
                            }

                            if (!session()->has('packagenights')) {
                                    session(['packagenights' =>     '']);
                            }
                            
                            $price_ranges = explode(",",get_siteinfo('price_range'));
                            if (!session()->has('priceminval')) {
                                session(['priceminval'      =>     reset($price_ranges)]);
                            }else{
                                session(['priceminval'      =>     session('priceminval')]);
                            }

                            if (!session()->has('pricemaxval')) {
                                session(['pricemaxval'      =>     array_slice($price_ranges, -2, 1)[0]]);
                            }else{
                                session(['pricemaxval'      =>     session('pricemaxval')]);
                            }


                    $servicepackages = Servicepackages::where('servicepackages_status', 1)
                                    ->where('showall', 'Yes')
                                    ->when(session('roomtype'), function ($query, $roomtype) {
                                        return $query->where('servicepackages_startype', $roomtype);
                                    })
                                    ->when(session('packagenights'), function ($query, $packagenights) {
                                        return $query->where('servicepackages_totalnights', session('packagenights'));
                                    })
                                    ->orderBy('servicepackages_sort', 'asc')
                                    ->paginate(6); // Initial load
                    
                    return view('frontend.services.servicesdetails',[
                        'page_title'      => $services_title,
                        'page_name'       => $services_name,
                        'page_descp'      => $services_descp,
                        "page_keyword"    => $services_keyword,
                        "page_details"    => $services_details,
                        'services'        => "",
                        'services_image'  => "",
                        'servicepackages' => $servicepackages
                    ]);
        }
    }

    public function loadMore(Request $request)
    {
        if ($request->ajax()) {
            if ($request->services_id !="" ){
                        $servicepackages = Servicepackages::where('servicepackages_status', 1)
                            ->where('services_id', $request->services_id)
                            ->when(session('roomtype'), function ($query, $roomtype) {
                                return $query->where('servicepackages_startype', $roomtype);
                            })
                            ->when(session('packagenights'), function ($query, $packagenights) {
                                return $query->where('servicepackages_totalnights', session('packagenights'));
                            })
                            ->orderBy('servicepackages_sort', 'asc')
                            ->paginate(6, ['*'], 'page', $request->page);
            }else{
                        $servicepackages = Servicepackages::where('servicepackages_status', 1)
                            ->where('showall', 'Yes')
                            ->when(session('roomtype'), function ($query, $roomtype) {
                                return $query->where('servicepackages_startype', $roomtype);
                            })
                            ->when(session('packagenights'), function ($query, $packagenights) {
                                return $query->where('servicepackages_totalnights', session('packagenights'));
                            })
                            ->orderBy('servicepackages_sort', 'asc')
                            ->paginate(6, ['*'], 'page', $request->page);
            }                        
            return view('frontend.services.showmorepackages', compact('servicepackages'))->render();
        }
    }

    
    public function packagescompare(){
                return view('frontend.services.packagescompare',[
                    'page_title'     => "Compare Packages",
                    'page_name'      => "Compare Packages",
                    'page_descp'     => "",
                    "page_keyword"   => "",
                    'services'       => "",
                    'services_image' => ""
                ]);
    }

    public function packagesfavorites(){
                return view('frontend.services.packagesfavorites',[
                    'page_title'     => "My Saved Packages",
                    'page_name'      => "My Saved Packages",
                    'page_descp'     => "",
                    "page_keyword"   => "",
                    'services'       => "",
                    'services_image' => ""
                ]);
    }
    
    public function filterdata($service_url,Request $request)
    {
        if ($service_url != "all"){
                    $services = Services::where("services_url",$service_url)->first();
                    $servicepackages = Servicepackages::query()
                    ->where('servicepackages_status',1)->where('services_id',$services->services_id)
                    ->when(request('roomtype'), function ($query, $roomtype) {
                        return $query->where('servicepackages_startype', $roomtype);
                    })
                    ->when(request('packagenights'), function ($query, $packagenights) {
                        return $query->where('servicepackages_totalnights', $packagenights);
                    })
                    ->whereBetween('servicepackages_price', [request('priceminval'), request('pricemaxval')])
                    ->orderBy('servicepackages_sort','asc')
                    ->paginate(6); // Initial load; 
                    
                    session(['roomtype'      =>     request('roomtype')]);
                    session(['packagenights' =>     request('packagenights')]);
                    session(['priceminval'   =>     request('priceminval')]);
                    session(['pricemaxval'   =>     request('pricemaxval')]);

                    return view('frontend.services.filterdata',[
                        'services'        => $services,
                        'roomtype'        => $request->roomtype,
                        'packagenights'   => $request->packagenights,
                        'servicepackages' => $servicepackages,
                    ]);
        }else{
                    //echo $request->roomtype;
                    $servicepackages = Servicepackages::query()
                    ->where('servicepackages_status',1)
                    ->where('showall', 'Yes')
                    ->when(request('roomtype'), function ($query, $roomtype) {
                        return $query->where('servicepackages_startype', $roomtype);
                    })
                    ->when(request('packagenights'), function ($query, $packagenights) {
                        return $query->where('servicepackages_totalnights', $packagenights);
                    })
                    ->whereBetween('servicepackages_price', [request('priceminval'), request('pricemaxval')])
                    ->orderBy('servicepackages_sort','asc')
                    ->paginate(6); // Initial load; 
                    
                    session(['roomtype'      =>     request('roomtype')]);
                    session(['packagenights' =>     request('packagenights')]);
                    session(['priceminval'   =>     request('priceminval')]);
                    session(['pricemaxval'   =>     request('pricemaxval')]);

                    return view('frontend.services.filterdata',[
                        'services'        => "",
                        'roomtype'        => $request->roomtype,
                        'packagenights'   => $request->packagenights,
                        'servicepackages' => $servicepackages,
                    ]);
        }   
    }

    public function skilsbyservices($services_id){
        return view('frontend.services.skillsbyservice',[
            'services_parent' => $services_id
        ]);
    }
}
