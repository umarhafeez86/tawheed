<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Staticpages;

class MainStaticpagesController extends Controller
{
    public function pagesdetails($pages_url){
        $staticpages = Staticpages::where("pages_url",$pages_url)->first();

                $staticpages_title           = $staticpages->pages_title;
                $staticpages_pages_name      = $staticpages->pages_name;
                $staticpages_pages_descp     = $staticpages->pages_descp;
                $staticpages_pages_keyword   = $staticpages->pages_keyword;

        return view('frontend.staticpages.pagesdetails',[
            'page_title'           => $staticpages_title,
            'page_name'            => $staticpages_pages_name,
            'page_descp'           => $staticpages_pages_descp,
            "page_keyword"         => $staticpages_pages_keyword,
            'staticpages'          => $staticpages,
        ]);
    }

    // public function pagesdetailsnew(){
    //     $pages_url = "contact-us";
    //     $staticpages = Staticpages::where("pages_url",$pages_url)->first();

    //             $staticpages_title           = $staticpages->pages_title;
    //             $staticpages_pages_name      = $staticpages->pages_name;
    //             $staticpages_pages_descp     = $staticpages->pages_descp;
    //             $staticpages_pages_keyword   = $staticpages->pages_keyword;

    //     return view('frontend.staticpages.pagesdetails',[
    //         'page_title'           => $staticpages_title,
    //         'page_name'            => $staticpages_pages_name,
    //         'page_descp'           => $staticpages_pages_descp,
    //         "page_keyword"         => $staticpages_pages_keyword,
    //         'staticpages'          => $staticpages,
    //     ]);
    // }
}
