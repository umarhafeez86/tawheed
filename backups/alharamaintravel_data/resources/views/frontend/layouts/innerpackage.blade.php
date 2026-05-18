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
    <link rel="stylesheet" href="{{ url('frontend/assets/css/package-details.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

        <!-- head widgets -->
        @include('frontend.layouts.headwidgets')
        <!-- head widgets -->
        
</head>

<body>

    @include('frontend.layouts.header')

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

                <!-- Testimonials Carousel -->
                @include('frontend.layouts.testimonialscarousel')
                <!-- Testimonials Carousel -->


                <!-- Related Packages -->
                @include('frontend.layouts.relatedpackages')
                <!-- Related Packages -->

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
    </script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            // Default number of slides per view
            slidesPerView: 4,
            spaceBetween: 10,
            grabCursor: true,
            /* Makes it look draggable */
            freeMode: true,
            /* Smooth dragging */

            // Breakpoints for responsive design
            breakpoints: {
                // When window width is >= 0px (sm)
                0: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                // When window width is >= 576px (sm)
                576: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                // When window width is >= 768px (md)
                768: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                // When window width is >= 992px (lg)
                992: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
            },

            // Enable loop
            loop: false,

            // Pagination
            pagination: {
                el: '', // .swiper-pagination
                clickable: true,
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // Autoplay
            autoplay: {
                delay: 8000,
                disableOnInteraction: false,
            },
        });

        function scrollToSection() {
            const section = document.getElementById("booknowsection");
            section.scrollIntoView({
                behavior: "smooth"
            });
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

        $('.fav-btn').on('click', function() {
            const id = $(this).data('id');
            $.ajax({
                url: "{{ route('favorites.toggle') }}",
                type: 'POST',
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    //alert(`Item ${response.status} to favorites.`);
                    //location.reload(); // or update UI dynamically
                    $fav = `${response.status}`;
                    $total_saved = `${response.total_saved}`;
                    //alert(`Item ${response.favorites} to favorites.`);
                    if ($fav == "added"){
                            //alert(`Item ${response.status} to favorites.`);
                            //$("#servicepackage_"+id).attr("src","{{ url('frontend/assets/images/yellow-heart.svg') }}");
                            $("#servicepackage_"+id).html('<i class="fa fa-heart"></i> Saved');
                            $(".iconcount").html($total_saved);
                            $("#notification_info").html('Package added to My Saved List. <a href="{{ url('/saved-packages') }}">Click here</a> to My Saved Packages.');
                            showNotification();
                        }else{
                            //alert("servicepackage_"+id);
                            //$("#servicepackage_"+id).attr("src","{{ url('frontend/assets/images/heart-icon.svg') }}");
                            $("#servicepackage_"+id).html('<i class="far fa-heart"></i> Save');
                            $(".iconcount").html($total_saved);
                            $("#notification_info").html('Package removed from My Saved List. <a href="{{ url('/saved-packages') }}">Click here</a> to My Saved Packages.');
                            showNotification();
                        }
                }
            });
        });


        var myCarousel = document.querySelector('#TestimonialsSlider')
        var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 2000,
            wrap: true,
            ride: 'carousel'
        })

        function submitbooknow() {

            var frmbooknow_fname = $("#frmbooknow_fname").val();
            var frmbooknow_contactno = $("#frmbooknow_contactno").val();
            var frmbooknow_email = $("#frmbooknow_email").val();

            var frmbooknow_travel_month = $("#frmbooknow_travel_month").val();
            var frmbooknow_guests = $("#frmbooknow_guests").val();
            var frmbooknow_total_days = $("#frmbooknow_total_days").val();

            var frmbooknow_package_name = $("#frmbooknow_package_name").val();
            var frmbooknow_package_price = $("#frmbooknow_package_price").val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if ((frmbooknow_fname != "") && (frmbooknow_contactno != "") && (frmbooknow_email != "") && (
                    frmbooknow_travel_month != "") && (frmbooknow_guests != "") && (frmbooknow_total_days != "")) {
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

        function showNotification() {
            const notification = document.getElementById('notification');
            notification.style.display = 'block';

            // Auto close after 3 seconds
            setTimeout(() => {
            hideNotification();
            }, 3000);
        }

        function hideNotification() {
            const notification = document.getElementById('notification');
            notification.style.display = 'none';
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
