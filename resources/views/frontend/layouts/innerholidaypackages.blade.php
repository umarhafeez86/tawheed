<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $page_title }} - {{ config('app.name') }}</title>
    <meta name="description" content="{{ $page_descp }}">
    <meta name="keywords" content="{{ $page_keyword }}">

    <link rel="shortcut icon" href="{{ asset('uploads/settings/' . get_siteinfo('favicon_logo')) }}"
        type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/fonts.css') }}">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/index.css') }}">


</head>

<body>

    @include('frontend.layouts.header')

    @yield('main-container')

    @include('frontend.layouts.footer')

    <script src="{{ asset('frontend/assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script src="{{ asset('frontend/assets/js/customform.js') }}"></script>

    <script src="{{ asset('frontend/assets/js/common.js') }}"></script>

    <script>
        const swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 20,
            navigation: {
                nextEl: ".custom-next", // Ensure these match the custom classes
                prevEl: ".custom-prev",
            },
            loop: true,
            breakpoints: {
                992: {
                    slidesPerView: 1, // Large screens (≥992px)
                },
                0: {
                    slidesPerView: 1, // Default for small screens too
                }
            },
        });

        const mySwiper2 = new Swiper(".mySwiper2", {
            slidesPerView: 1,
            spaceBetween: 20,
            navigation: {
                nextEl: ".custom-next2", // Ensure these match the custom classes
                prevEl: ".custom-prev2",
            },

            loop: true,
            breakpoints: {
                992: {
                    slidesPerView: 3, // Large screens (≥992px)
                },
                0: {
                    slidesPerView: 1, // Default for small screens too
                }
            },
        });

        const mySwiper3 = new Swiper(".mySwiper3", {
            slidesPerView: 3,
            spaceBetween: 0,
            navigation: {
                nextEl: ".custom-next3", // Ensure these match the custom classes
                prevEl: ".custom-prev3",
            },

            loop: true,
            breakpoints: {
                992: {
                    slidesPerView: 3, // Large screens (≥992px)
                },
                768: {
                    slidesPerView: 2, // Large screens (≥992px)
                },
                0: {
                    slidesPerView: 1, // Default for small screens too
                }
            },
        });


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


        document.querySelectorAll('.accordion-collapse').forEach((collapseEl) => {
            collapseEl.addEventListener('show.bs.collapse', function() {
                const icon = this.previousElementSibling.querySelector('.accordion-icon');
                if (icon) icon.src = 'assets/images/fill-icon.svg';
            });

            collapseEl.addEventListener('hide.bs.collapse', function() {
                const icon = this.previousElementSibling.querySelector('.accordion-icon');
                if (icon) icon.src = 'assets/images/not-fill-icon.svg';
            });
        });



        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.accordion-collapse').forEach((collapseEl) => {
                const icon = collapseEl.previousElementSibling.querySelector('.accordion-icon');
                if (icon) {
                    if (collapseEl.classList.contains('show')) {
                        icon.src = 'assets/images/fill-icon.svg';
                    } else {
                        icon.src = 'assets/images/not-fill-icon.svg';
                    }
                }
            });
        });


        const swiper4 = new Swiper(".mySwiper4", {
            slidesPerView: 1,
            spaceBetween: 20,
            navigation: {
                nextEl: ".custom-next", // Ensure these match the custom classes
                prevEl: ".custom-prev",
            },
            loop: true,
            breakpoints: {
                0: {
                    slidesPerView: 2, // Mobile
                },
                576: {
                    slidesPerView: 2, // Small tablets
                },
                768: {
                    slidesPerView: 2, // Tablets
                },
                992: {
                    slidesPerView: 3, // Desktops
                },
                1200: {
                    slidesPerView: 4, // Large desktops and up
                }
            },
        });


        $('#load-more').click(function() {
            let page = $(this).data('page');
            $.ajax({
                url: "/load-more-holidays-packages?destinations_id=" + {{ $destination->destinations_id }} + "&page=" + page,
                type: "GET",
                success: function(data) {
                    if (data.trim() === '') {
                        $('#load-more').hide();
                    } else {
                        $('#packagefiltershome').append(data);
                        $('#load-more').data('page', page + 1);
                    }
                }
            });
        });
    </script>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
<script>
window.addEventListener("load", function(){
window.cookieconsent.initialise({
  "palette": {
    "popup": {
      "background": "#000",
      "text": "white"
    },
    "button": {
      "background": "#f1d600"
    },
     "cookie":{
      expiryDays:2
  }
  }, 
  "content": {
  message:'This website uses cookies to improve your experience.',
  

  },
  "position": "bottom"
  
})});
</script>

</body>

</html>
