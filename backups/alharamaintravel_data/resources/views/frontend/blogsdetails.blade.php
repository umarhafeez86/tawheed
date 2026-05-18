@extends('frontend.layouts.innerblog')

@section('main-container')
@php
  use App\Models\Blogs;
@endphp
    @if ($blog)
        <div class="col-12 mt-4 mb-3 float-start post-date">{{-- get_formated_date($blog->blogs_date, 'd M, Y') --}}</div>
        <div class="clearfix"></div>
        <h1 class="col-12 page_heading float-start">{{ $blog->blogs_name }}</h1>
        <div class="clearfix"></div>
        <div class="col-12 float-start mb-3">By: <span class="post-author-span">{{ $blog->blogs_author }}</span></div>

        <div class="clearfix"></div>
        <div class="col-12 mt-3 mb-3 float-start text-center">
            <img src="{{ asset('uploads/blogs/'.$blog->blogs_image) }}" alt="{{ $blog->blogs_name }}" class="img-fluid img-round">
        </div>
        <div class="clearfix"></div>

        <div class="page_sub_heading_text blog-details mb-5 float-start">
            {!! str_replace(['<div>', '</div>'], ['<div class="page_content_text col-12 float-start">', '</div>'], $blog->blogs_details) !!}
        </div>
        <div class="clearfix"></div>

        <h2 class="col-12 mt-5 page_sub_heading float-start">Related Blogs and News</h2>
        <div class="clearfix"></div>
        <p class="page_sub_heading_text mb-5">&nbsp;</p>
        <div class="clearfix"></div>
        @php
            $blogsdetails = Blogs::where('blogs_status', 1)
                ->where('blogs_id', '!=', $blog->blogs_id)
                ->orderBy('created_at', 'desc')
                ->paginate(2); // Initial load
        @endphp
        @foreach ($blogsdetails as $blogsdetail)
            <div class="col-12 mb-4 float-start package-grid blog-item position-relative">
                <div class="d-flex gap-4">
                    <div class="col-3">
                        <a href="{{ url('/blog/' . $blogsdetail->blogs_url) }}" title="{{ $blogsdetail->blogs_name }}">
                            <img src="{{ asset('uploads/blogs/' . $blogsdetail->blogs_image) }}"
                                alt="{{ $blogsdetail->blogs_name }}" class="img-fluid img-round">
                        </a>
                    </div>
                    <div class="blog-content">
                        <a href="{{ url('/blog/' . $blogsdetail->blogs_url) }}"
                            class="package_name">{{ $blogsdetail->blogs_name }}</a>
                        <div class="clearfix"></div>
                        <p class="umrah-blog-p multiline-ellipsis">{!! strlen($blogsdetail->blogs_details) > 400 ? substr(strip_tags($blogsdetail->blogs_details), 0, 400) . '' : $blogsdetail->blogs_details !!}</p>
                    </div>
                </div>
                <a href="{{ url('/blog/' . $blogsdetail->blogs_url) }}" class="hover-button">Read More</a>
            </div>
            <div class="clearfix"></div>
        @endforeach



        <div class="clearfix"></div>
        <a href="{{ url('/blog') }}" class="btn_showmore mb-5">Show All</a>
        <div class="clearfix"></div>
    @endif
@endsection