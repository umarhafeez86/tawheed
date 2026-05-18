<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $page_title }} - {{ config('app.name') }}</title>
    <meta name="description" content="{{ $page_descp }}">
    <meta name="keywords" content="{{ $page_keyword }}">

    <link rel="shortcut icon" href="{{ asset('uploads/settings/' . get_siteinfo('favicon_logo')) }}"
        type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ url('frontend/assets/css/fonts.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ url('frontend/assets/css/mobileheader.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/assets/css/packages.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/assets/css/beatmyprice.css') }}">

        <!-- head widgets -->
        @include('frontend.layouts.headwidgets')
        <!-- head widgets -->
        
</head>

<body>

    @include('frontend.layouts.headerbeatmyprice')

    <!-- Right Main Section -->
    <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-8 float-end right-panel-scroll position-relative">

        <!-- mobile view header-->
        @include('frontend.layouts.mobileheader')
        <!-- mobile view header-->

        <div class="right-panel-container">
            <div class="col-12 ms-auto me-auto">
                <!-- desktop view menu header -->
                @include('frontend.layouts.desktopmenuheader')
                <!-- desktop view menu header -->


                <!-- main content area -->
                @yield('main-container')
                <!-- main content area -->

                <div class="clearfix"></div>
            </div>

        </div>
    </div>
    <!-- Right Main Section -->
    <script src="{{ url('frontend/assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        const header = document.getElementById('mainHeader');
        const headerOffset = header.offsetTop;
        window.addEventListener('scroll', () => {
            var parent, child, width;
            if (width === undefined) {
                parent = $('<div style="width:50px;height:50px;overflow:auto"><div/></div>').appendTo('body');
                child = parent.children();
                width = child.innerWidth() - child.height(99).innerWidth();
                parent.remove();
            }
            $('#mainHeader').css('right', width + 'px');
        });


 $(".right-panel-scroll").scroll(function() {
    if ($(this).scrollTop() > 150) {
        $('.desktopmenufixed').addClass('d-md-block');
    } else {
        $('.desktopmenufixed').removeClass('d-md-none');
    }
});

$(window).scroll(function() {
    if ($(this).scrollTop() > 150) {
        $('.desktopmenufixed').addClass('d-md-block');
    } else {
        $('.desktopmenufixed').removeClass('d-md-none');
    }
});

var input = document.getElementById('phoneno');
input.addEventListener('input', function () {
    // Replace anything that's not a digit or a plus sign
    this.value = this.value.replace(/[^\d+]/g, '');
});


const checkbox = document.getElementById("menucheckbox");
const menuToggle = document.getElementById("menuToggle");

document.addEventListener("click", function (event) {
    const isClickInside = menuToggle.contains(event.target);
    if (!isClickInside) {
      checkbox.checked = false; // close the menu
    }
});


    </script>


</body>

</html>