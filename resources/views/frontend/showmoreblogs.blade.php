@foreach ($blogsdetails as $blogsdetail)
    <div class=" mt-5 sm:mt-8 md:mt-14 lg:mt-20">
        <a href="{{ url('/blog/'.$blogsdetail->blogs_url) }}">
          <img src="{{ asset('uploads/blogs/'.$blogsdetail->blogs_image) }}" class="h-auto max-w-full" alt="{{ $blogsdetail->blogs_name }}">
        </a>
        <p class="mt-4 lg:mt-6 blog_written">
            {{-- get_formated_date($blogsdetail->blogs_date,"M d, Y") --}} <!--span class="separator">|</span--> {{ $blogsdetail->blogs_author }}
        </p>
        <h2 class="mt-2 lg:mt-4 tips">{{ $blogsdetail->blogs_name }}</h2>
        <p class="mt-2 lg:mt-4 tips_p">{!! strlen($blogsdetail->blogs_details) > 400 ? substr(strip_tags($blogsdetail->blogs_details), 0, 400) . '' : $blogsdetail->blogs_details !!}</p>
        <a href="{{ url('/blog/'.$blogsdetail->blogs_url) }}" class="inline-flex items-center gap-2 read_more mt-3 lg:mt-5">
            Read more
            <img src="{{ asset('frontend/assets/images/read_more.svg') }}" alt="" class="h-auto max-w-full">
        </a>
    </div>
@endforeach