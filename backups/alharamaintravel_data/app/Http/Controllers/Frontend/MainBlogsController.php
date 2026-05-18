<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Staticpages;
use App\Models\Blogs;
use App\Models\Services;

class MainBlogsController extends Controller
{
    public function index()
    {

        $staticpages = Staticpages::findorFail(20);

        $blogsdetails = Blogs::where('blogs_status', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(6); // Initial load

        return view("frontend.blogs", [
            'page_title'     => $staticpages->pages_title,
            'page_name'      => $staticpages->blogs_name,
            'page_descp'     => $staticpages->pages_descp,
            "page_keyword"   => $staticpages->pages_keyword,
            'blogsdetails'   => $blogsdetails
        ]);
    }


    public function loadMore(Request $request)
    {
        if ($request->ajax()) {
            $blogsdetails = Blogs::where('blogs_status', 1)
                ->orderBy('created_at', 'desc')
                ->paginate(6, ['*'], 'page', $request->page);

            return view('frontend.showmoreblogs', compact('blogsdetails'))->render();
        }
    }


    public function blogsdetails($blogs_url)
    {

        $blog = Blogs::where("blogs_url", "$blogs_url")->first();
        if ($blog) {
            $blogs_title     = $blog->blogs_name;
            $blogs_name      = $blog->blogs_name;
            $blogs_descp     = $blog->blogs_name;
            $blogs_keyword   = $blog->blogs_name;
        }
        return view('frontend.blogsdetails', [
            'page_title'     => $blogs_title,
            'page_name'      => $blogs_name,
            'page_descp'     => $blogs_descp,
            "page_keyword"   => $blogs_keyword,
            'blog'           => $blog
        ]);
    }
}
