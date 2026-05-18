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

    <link rel="stylesheet" href="{{ url('frontend/assets/css/hajjpackages.css') }}">

        <!-- head widgets -->
        @include('frontend.layouts.headwidgets')
        <!-- head widgets -->
    
</head>

<body>

    @include('frontend.layouts.headerhajj')

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

                <!-- Why Choose Us -->
                @include('frontend.layouts.whychooseus')
                <!-- Why Choose Us -->


                <div class="col-12 float-start page_info_box">
                    {!! str_replace(array('<div>'),array('<div class="page_content_text col-12 float-start">'),$staticpages->page_details) !!}
                    {{-- 
                    <h1 class="page_content_heading mb-4 float-start"></h1>
                    <div class="clearfix"></div>
                    <div class="page_content_text col-12 float-start">
                    </div> 
                    --}}
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>

                <!-- Testimonials Carousel -->
                @include('frontend.layouts.testimonialscarousel')
                <!-- Testimonials Carousel -->

                <!-- Custom Package Form -->
                @include('frontend.layouts.custompackageform')
                <!-- Custom Package Form -->

                <!-- Bottom Buttons -->
                @include('frontend.layouts.bottombuttons')
                <!-- Bottom Buttons -->

                <!-- Certificates -->
                @include('frontend.layouts.certificates')
                <!-- Certificates -->

                <!-- Footer -->
                @include('frontend.layouts.footer')
                <!-- Footer -->
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

        /* Counter Animaton */
        function animateCounter(element, end, duration) {
            let start = 0;
            let startTime = null;

            function step(timestamp) {
                if (!startTime) startTime = timestamp;
                let progress = timestamp - startTime;
                let value = Math.min(Math.floor((progress / duration) * end), end);
                element.textContent = value;

                if (value < end) {
                    requestAnimationFrame(step);
                }
            }

            requestAnimationFrame(step);
        }


        var counter = document.getElementById("counter1");
        var observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(counter, 20, 2000); // target number, duration in ms
                    observer.unobserve(counter); // Run only once
                }
            });
        }, {
            threshold: 1.0
        });
        observer.observe(counter);


        var counter2 = document.getElementById("counter2");
        var observer2 = new IntersectionObserver((entries, observer2) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(counter2, 120, 2000);
                    observer.unobserve(counter2);
                }
            });
        }, {
            threshold: 1.0
        });
        observer2.observe(counter2);


        var counter3 = document.getElementById("counter3");
        var observer3 = new IntersectionObserver((entries, observer3) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(counter3, 119, 2000);
                    observer.unobserve(counter3);
                }
            });
        }, {
            threshold: 1.0
        });
        observer3.observe(counter3);

        /* Counter Animaton */

        function toggleDiv() {
            const div = document.getElementById("filtersformob");
            if (div.style.maxHeight) {
                div.style.maxHeight = null;
                div.style.opacity = 0;
            } else {
                div.style.maxHeight = div.scrollHeight + "px";
                div.style.opacity = 1;
            }
        }


        function submitenquiry() {

            var estimate_fullname = $("#enquiryform #estimate_fullname").val();
            var estimate_phoneno = $("#enquiryform #estimate_phoneno").val();
            var estimate_msg = $("#enquiryform #estimate_msg").val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if ((estimate_fullname != "") && (estimate_phoneno != "") && (estimate_msg != "")) {
                var formData = $("#enquiryform").serialize(); // Serialize form data
                //alert (formData);
                $("#estimateform_msg").html('<img src="{{ url('/frontend/assets/images/form-load.gif') }}" alt="">');
                $.ajax({
                    url: "{{ url('/estimateformprocess') }}",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        $("#enquiryform_msg").html(response);
                        $("#enquiryform").trigger("reset");
                    }
                    /*,
                    error: function(xhr) {
                        let errors = xhr.responseJSON.errors;
                        let errorMessage = '<div class="alert alert-danger"><ul>';
                        $.each(errors, function(key, value) {
                            errorMessage += '<li>' + value + '</li>';
                        });
                        errorMessage += '</ul></div>';
                        $("#alertBox").html(errorMessage);
                    }
                    */
                });
            } else {
                alert("Please Fill All the Required Information.");
                return false;
            }
        }



var myCarousel = document.querySelector('#TestimonialsSlider')
var carousel   = new bootstrap.Carousel(myCarousel, {
  interval: 2000,
  wrap: true,
  ride: 'carousel'
})


        function scrollToSection() {
            const section = document.getElementById("booknowsection");
            section.scrollIntoView({
                behavior: "smooth"
            });
        }

        function booknowpackageinfo($package_name,$package_price) {
            $('#frmbooknow_package_name').val($package_name);
            $('#frmbooknow_package_price').val($package_price);
        }
        

        function submitbooknow() {

            var frmbooknow_fname            = $("#frmbooknow_fname").val();
            var frmbooknow_contactno        = $("#frmbooknow_contactno").val();
            var frmbooknow_email            = $("#frmbooknow_email").val();

            var frmbooknow_travel_month     = $("#frmbooknow_travel_month").val();
            var frmbooknow_guests           = $("#frmbooknow_guests").val();
            var frmbooknow_total_days       = $("#frmbooknow_total_days").val();

            var frmbooknow_package_name     = $("#frmbooknow_package_name").val();
            var frmbooknow_package_price    = $("#frmbooknow_package_price").val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if ((frmbooknow_fname != "") && (frmbooknow_contactno != "") && (frmbooknow_email != "") && (frmbooknow_travel_month != "") && (frmbooknow_guests != "") && (frmbooknow_total_days != "")) {
                var formData = $("#frmbooknow").serialize(); // Serialize form data
                //alert (formData);
                $("#frmbooknow_msg").html('<img src="{{ url('/frontend/assets/images/form-load.gif') }}" alt="">');
                $.ajax({
                    url: "{{ url('/booknow-package') }}",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        $("#frmbooknow_msg").html(response);
                        $("#frmbooknow").trigger("reset");
                    }
                    /*,
                    error: function(xhr) {
                        let errors = xhr.responseJSON.errors;
                        let errorMessage = '<div class="alert alert-danger"><ul>';
                        $.each(errors, function(key, value) {
                            errorMessage += '<li>' + value + '</li>';
                        });
                        errorMessage += '</ul></div>';
                        $("#alertBox").html(errorMessage);
                    }
                    */
                });
            } else {
                alert("Please Fill All the Required Information.");
                return false;
            }
        }


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


var input = document.getElementById('estimate_phoneno');
input.addEventListener('input', function () {
    // Replace anything that's not a digit or a plus sign
    this.value = this.value.replace(/[^\d+]/g, '');
});

var input = document.getElementById('frmbooknow_contactno');
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
