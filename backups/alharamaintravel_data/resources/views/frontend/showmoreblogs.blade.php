      @foreach ($blogsdetails as $blogsdetail)
        <div class="col-12 mb-4 float-start package-grid blog-item position-relative">
            <div class="d-flex gap-4">
                <div class="col-3">
                    <a href="{{ url('/blog/'.$blogsdetail->blogs_url) }}" title="{{ $blogsdetail->blogs_name }}">
                        <img src="{{ asset('uploads/blogs/'.$blogsdetail->blogs_image) }}" alt="{{ $blogsdetail->blogs_name }}" class="img-fluid img-round">
                    </a>
                </div>
                <div class="blog-content">
                    <a href="{{ url('/blog/'.$blogsdetail->blogs_url) }}" class="package_name">{{ $blogsdetail->blogs_name }}</a>
                    <div class="clearfix"></div>
                    <p class="umrah-blog-p multiline-ellipsis">{!! strlen($blogsdetail->blogs_details) > 400 ? substr(strip_tags($blogsdetail->blogs_details), 0, 400) . '' : $blogsdetail->blogs_details !!}</p>
                </div>
            </div>
            <a href="{{ url('/blog/'.$blogsdetail->blogs_url) }}" class="hover-button">Read More</a>
        </div>
        <div class="clearfix"></div>
      @endforeach