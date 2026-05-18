<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Staticpages;

use App\Models\Services;
use App\Models\Servicepackages;


class MainServicepacakgesController extends Controller
{
    public function index(){

        $staticpages = Staticpages::findorFail(4);
        return view("frontend.services.services",[
            'page_title'     => $staticpages->pages_title,
            'page_descp'     => $staticpages->pages_descp,
            "page_keyword"   => $staticpages->pages_keyword
        ]);
    }

    public function packagedetails($servicepackages_url){
       
        $servicepackage = Servicepackages::where("servicepackages_url",$servicepackages_url)->first();

                $servicepackages_title           = $servicepackage->servicepackages_title;
                $servicepackages_name            = $servicepackage->servicepackages_name;
                $servicepackages_description     = $servicepackage->servicepackages_description;
                $servicepackages_keyword         = $servicepackage->servicepackages_keyword;

        return view('frontend.packages.packagedetails',[
            'page_title'           => $servicepackages_title,
            'page_name'            => $servicepackages_name,
            'page_descp'           => $servicepackages_description,
            "page_keyword"         => $servicepackages_keyword,
            'servicepackage'       => $servicepackage,
        ]);
    }

    public function filterdata($service_url,Request $request)
    {
        //echo $request->roomtype;
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
            ->orderBy('servicepackages_sort','asc')->limit(16)->get(); 
            
            return view('frontend.services.filterdata',[
                'services'        => $services,
                'roomtype'        => $request->roomtype,
                'packagenights'   => $request->packagenights,
                'servicepackages' => $servicepackages,
            ]);
    }

    public function skilsbyservices($services_id){
        return view('frontend.services.skillsbyservice',[
            'services_parent' => $services_id
        ]);
    }
}
