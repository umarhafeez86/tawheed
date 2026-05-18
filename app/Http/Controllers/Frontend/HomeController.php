<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Mail;


use App\Models\Staticpages;
use App\Models\Services;
use App\Models\Servicepackages;
use App\Models\Testimonials;
use App\Models\Emailtemplates;

class HomeController extends Controller
{
    public function index()
    {
        session(['home' => 'true']);
        if (session('home')=="true"){
            //session(['home' => '']);
            $staticpages = Staticpages::findorFail(2);
            return view("frontend.index", [
                'page_title'     => $staticpages->pages_title,
                'page_name'      => $staticpages->pages_name,
                'page_descp'     => $staticpages->pages_descp,
                "page_keyword"   => $staticpages->pages_keyword,
                "pages_details"  => $staticpages->pages_details
            ]);
        }else{
            session(['home' => 'true']);
            $staticpages = Staticpages::findorFail(1);
            return view("frontend.intro",[
                'page_title'     => $staticpages->pages_title,
                'page_descp'     => $staticpages->pages_descp,
                "page_keyword"   => $staticpages->pages_keyword 
            ]);
        }   
    }

    public function bookinquiry(Request $request)
    {
        $packagetype = $request->packagetype;

        return view('frontend.bookinquiry', [
            'page_title'     => "",
            'page_descp'     => "",
            "page_keyword"   => "",
            'packagetype'    => $packagetype,
        ]);
    }


    public function bookinquirysubmit(Request $request)
    {

        $rules = [
            'packagetype'         => 'required',
            'txtname'             => 'required',
            'txtphone'            => 'required',
            'txtemail'            => 'required',
            'travelmonth'         => 'required',
            'nightsinfo'          => 'required',
            'passginfo'           => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        session(['packagetype'      =>     request('packagetype')]);
        session(['txtname'          =>     request('txtname')]);
        session(['txtphone'         =>     request('txtphone')]);
        session(['txtemail'         =>     request('txtemail')]);
        session(['travelmonth'      =>     request('travelmonth')]);
        session(['nightsinfo'       =>     request('nightsinfo')]);
        session(['passginfo'        =>     request('passginfo')]);

        //$emailtemplate = Emailtemplates::findorFail(3);
        //$toEmail = $request->txtemail;
        //$message = str_replace(array('{departurefrom}','{destinationcity}','{travel_date}','{personname}','{phoneno}','{txtemail}','{makkahnights}','{madinahnights}','{rooms}','{accommodation}','{adults}','{child}','{infants}','{company_name}','{company_phone}','{company_email}','{company_webaddress}'),array($request->departurefrom,$request->destinationcity,$request->travel_date,$request->personname,$request->phoneno,$request->txtemail,$request->makkahnights,$request->madinahnights,$request->rooms,$request->accommodation,$request->adults,$request->child,$request->infants        ,get_siteinfo('setting_name'),get_siteinfo('setting_phone'),get_siteinfo('setting_email'),url('')),$emailtemplate->email_content);
        //$subject = $emailtemplate->email_subject;
        //echo $message;
        //exit;
        //$emailrequest = Mail::to($toEmail)->cc([get_siteinfo('setting_email')])->send(new Beatmyprice($message,$subject));
        //return back()->with("success","Your request has sent successfully.");

        return redirect("/services/july-umrah-packages");
    }

    public function customholidayformrow($rowno)
    {
        return view('frontend.customholidayformrow', [
            'rowno'   => $rowno,
        ]);
    }



    public function homefilterdata(Request $request)
    {
        if ((request('packagenights') != "all") && (request('roomtype') != "all")) {
            $servicepackages = Servicepackages::query()
                ->where('servicepackages_status', 1)
                ->where('services_id', request('services_id'))
                ->where('servicepackages_totalnights', request('packagenights'))
                ->where('servicepackages_startype', request('roomtype'))
                ->orderBy('servicepackages_price', 'asc')->limit(6)->get();
        } elseif ((request('packagenights') == "all") && (request('roomtype') != "all")) {
            $servicepackages = Servicepackages::query()
                ->where('servicepackages_status', 1)
                ->where('services_id', request('services_id'))
                ->where('servicepackages_startype', request('roomtype'))
                ->orderBy('servicepackages_price', 'asc')->limit(6)->get();
        } elseif ((request('packagenights') != "all") && (request('roomtype') == "all")) {
            $servicepackages = Servicepackages::query()
                ->where('servicepackages_status', 1)
                ->where('services_id', request('services_id'))
                ->where('servicepackages_totalnights', request('packagenights'))
                ->orderBy('servicepackages_price', 'asc')->limit(6)->get();
        } elseif ((request('packagenights') == "all") && (request('roomtype') == "all")) {
            $servicepackages = Servicepackages::query()
                ->where('servicepackages_status', 1)
                ->where('services_id', request('services_id'))
                ->orderBy('servicepackages_price', 'asc')->limit(6)->get();
        }

        $service = Services::where('services_status', 1)
            ->where('services_id', request('services_id'))
            ->orderBy('services_sort', 'asc')
            ->first();

        return view('frontend.homefilterdata', [
            'servicepackages'        => $servicepackages,
            'service'                => $service
        ]);
    }

    public function beatmyprice()
    {

        $staticpages = Staticpages::findorFail(7);
        return view("frontend.beatmyprice", [
            'page_title'     => $staticpages->pages_title,
            'page_name'      => $staticpages->pages_name,
            'page_descp'     => $staticpages->pages_descp,
            "page_keyword"   => $staticpages->pages_keyword,
            'staticpages'    => $staticpages
        ]);
    }

    public function hajjpackages()
    {

        $staticpages = Staticpages::findorFail(5);
        return view("frontend.hajjpackages", [
            'page_title'     => $staticpages->pages_title,
            'page_name'      => $staticpages->pages_name,
            'page_descp'     => $staticpages->pages_descp,
            "page_keyword"   => $staticpages->pages_keyword,
            'staticpages'    => $staticpages
        ]);
    }

    public function reviews()
    {
        $staticpages = Staticpages::findorFail(5);

        $testimonials = Testimonials::where('status', 1)
            ->orderBy('testimonials_sort', 'asc')
            ->paginate(4); // Initial load

        return view("frontend.reviews", [
            'page_title'     => $staticpages->pages_title,
            'page_name'      => $staticpages->pages_name,
            'page_descp'     => $staticpages->pages_descp,
            "page_keyword"   => $staticpages->pages_keyword,
            'testimonials'   => $testimonials
        ]);
    }

    public function loadMorereviews(Request $request)
    {
        if ($request->ajax()) {
            $testimonials = Testimonials::where('status', 1)
                ->orderBy('testimonials_sort', 'asc')
                ->paginate(4, ['*'], 'page', $request->page);

            return view('frontend.showmoretestimonials', compact('testimonials'))->render();
        }
    }
    
    public function epayment(Request $request)
    {
        return view('frontend.payment', [
            'page_name'      => "",
			'page_title'     => "",
            'page_descp'     => "",
            "page_keyword"   => "",
            'packagetype'    => ""
        ]);
    }
    
}
