<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $page_title }} - {{ config('app.name') }}</title>

    <meta name="description" content="{{ $page_descp }}">
    <meta name="keywords" content="{{ $page_keyword }}">

    <link rel="shortcut icon" href="{{ asset('uploads/settings/' . get_siteinfo('favicon_logo')) }}"
        type="image/x-icon">


    <link rel="stylesheet" href="{{ asset('frontend/assets/css/fonts.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" /> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">


    <!-- <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" /> -->
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/index.css') }}">

    <!-- head widgets -->
    @include('frontend.layouts.headwidgets')
    <!-- head widgets -->

</head>

<body>
    
    <!-- head widgets -->
    @include('frontend.layouts.headwidgetsbody')
    <!-- head widgets -->

    <div class="bg-[#005B68] pt-3 pb-4">
        @include('frontend.layouts.mainheader')
    </div>

    @yield('main-container')

    @include('frontend.layouts.customform')

    @include('frontend.layouts.footer')


    <script src="{{ asset('frontend/assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    <script>
        function scrollRight4() {
            const container = document.getElementById('scroll-container');
            container.scrollBy({
                left: 400,
                behavior: 'smooth'
            });
        }

        function scrollleft4() {
            const container = document.getElementById('scroll-container');
            container.scrollBy({
                left: -400,
                behavior: "smooth"
            })
        }

        function scrollToSection($sectionid) {
            const section = document.getElementById($sectionid);
            section.scrollIntoView({
                behavior: "smooth"
            });
        }

        function setupSlider(sliderId) {

            const slider = document.getElementById('slider'+sliderId);
            const slides = slider.children;
            const totalSlides = slides.length;

            let currentIndex = 0;
            let interval;

            const currentSlideEl = document.getElementById('currentSlide'+sliderId);
            const totalSlidesEl = document.getElementById('totalSlides'+sliderId);

            // Set total with leading zero
            totalSlidesEl.textContent = totalSlides.toString().padStart(2, '0');

            function updateSlider(index) {
                slider.style.transform = `translateX(-${index * 100}%)`;
                currentSlideEl.textContent = (index + 1).toString().padStart(2, '0');
            }

            function showNext() {
                currentIndex = (currentIndex + 1) % totalSlides;
                updateSlider(currentIndex);
            }

            function showPrev() {
                currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
                updateSlider(currentIndex);
            }

            document.getElementById('next'+sliderId).addEventListener('click', () => {
                showNext();
                resetAutoplay();
            });

            document.getElementById('prev'+sliderId).addEventListener('click', () => {
                showPrev();
                resetAutoplay();
            });

            function startAutoplay() {
                interval = setInterval(showNext, 3000); // autoplay every 3s
            }

            function resetAutoplay() {
                clearInterval(interval);
                startAutoplay();
            }

            // Init
            updateSlider(currentIndex);
            startAutoplay();

        }


            // Initialize multiple sliders
            setupSlider(1);
            setupSlider(2);

        /////////////


        /////////

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
        
$(window).scroll(function() {
    if ($(this).scrollTop() > 150) {
        $('#desktopmenufixed').addClass('pos-fixed');
    } else {
        $('#desktopmenufixed').removeClass('pos-fixed');
    }
});

    </script>
<script>
(function () {
    const params = new URLSearchParams(window.location.search);
    const gclid = params.get('gclid');

    if (gclid) {
        localStorage.setItem('gclid', gclid);
    }
})();

document.addEventListener('DOMContentLoaded', function () {
    const gclidInput = document.getElementById('gclid');
    if (gclidInput) {
        gclidInput.value = localStorage.getItem('gclid') || '';
    }
});
</script>	
</body>

</html>
