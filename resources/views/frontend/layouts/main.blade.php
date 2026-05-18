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
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

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
    
    <div class="bg-[#005B68] pt-3 pb-0">
        @include('frontend.layouts.mainheader') 
        @yield('main-container')
    </div>
    @include('frontend.layouts.footer')

<script src="{{ asset('frontend/assets/js/jquery-3.7.1.min.js') }}"></script>    
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    function scrollRight() {
        const container = document.getElementById('scroll-container');
        container.scrollBy({ left: 300, behavior: 'smooth' });
    }

    function scrollleft() {
        const container = document.getElementById('scroll-container');
        container.scrollBy({ left: -300, behavior: "smooth" })
    }

    function scrollRight2() {
        const container = document.getElementById('scroll-container2');
        container.scrollBy({ left: 300, behavior: 'smooth' });
    }

    function scrollleft2() {
        const container = document.getElementById('scroll-container2');
        container.scrollBy({ left: -300, behavior: "smooth" })
    }

    function scrollRight3() {
        const container = document.getElementById('scroll-container3');
        container.scrollBy({ left: 200, behavior: 'smooth' });
    }

    function scrollleft3() {
        const container = document.getElementById('scroll-container3');
        container.scrollBy({ left: -200, behavior: "smooth" })
    }

    function scrollRight4() {
        const container = document.getElementById('scroll-container4');
        container.scrollBy({ left: 400, behavior: 'smooth' });
    }

    function scrollleft4() {
        const container = document.getElementById('scroll-container4');
        container.scrollBy({ left: -400, behavior: "smooth" })
    }

    function toggleAccordion(button) {
        const contentId = button.getAttribute('data-accordion-target');
        const content = document.querySelector(contentId);
        const icon = button.querySelector('.accordion-icon');

        const isOpen = content.classList.contains('hidden') === false;

        if (isOpen) {
            content.classList.add('hidden');
            button.setAttribute('aria-expanded', 'false');
            icon.src = "{{ asset('frontend/assets/images/accordian-plus.svg') }}";
        } else {
            content.classList.remove('hidden');
            button.setAttribute('aria-expanded', 'true');
            icon.src = "{{ asset('frontend/assets/images/minus.svg') }}";
        }
    }

    const swiper = new Swiper(".mySwiper", {
        slidesPerView: 1.2,
        spaceBetween: 20,
        navigation: {
            nextEl: ".next",
            prevEl: ".previos",
        },
        breakpoints: {
            576: {
                slidesPerView: 1,
            },


            768: {
                slidesPerView: 2,
            },
        },
    });



////////////////// Forms Section Start ///////////////////

        function submitfastquote() {

            var travelmonth = $("#travelmonth").val();
            var nightsinfo = $("#nightsinfo").val();
            var passginfo = $("#passginfo").val();

            var personname = $("#personname").val();
            var phoneno = $("#phoneno").val();
            var txtemail = $("#txtemail").val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if ((travelmonth != "") && (nightsinfo != "") && (passginfo != "") && (
                    personname != "") && (phoneno != "") && (txtemail != "")) {
                var formData = $("#fastquote").serialize(); // Serialize form data
                //alert (formData);
                $("#fastquote_msg").html('<img src="{{ url('/frontend/assets/images/form-load.gif') }}" alt="">');
                $.ajax({
                    url: "{{ url('/fast-quote-process') }}",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        $("#fastquote_msg").html(response);
                        $("#fastquote").trigger("reset");
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
                //$("#fastquote_msg").html('Please Fill All the Required Information.');
                return false;
            }
        }

        function submitestimateform(){

                var estimate_fullname     =    $("#estimateform #estimate_fullname").val();
                var estimate_phoneno      =    $("#estimateform #estimate_phoneno").val();
                var estimate_email        =    $("#estimateform #estimate_email").val();

                var travel_date           =    $("#estimateform #travel_date").val();
                var estimate_noofpassg    =    $("#estimateform #estimate_noofpassg").val();
                var estimate_message      =    $("#estimateform #estimate_message").val();
                

                $.ajaxSetup({
                    headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                if ((estimate_fullname!="") && (estimate_phoneno!="") && (estimate_email!="") && (travel_date!="") &&  (estimate_noofpassg!="") &&  (estimate_message!="")){
                      var formData = $("#estimateform").serialize(); // Serialize form data
                      //alert (formData);
                      $("#estimateform_msg").html('<img src="{{ url('/frontend/assets/images/form-load.gif') }}" alt="">');
                      $.ajax({ 
                          url: "{{ url('/estimateformprocess') }}", 
                          type: "POST",
                          data: formData,
                          success: function(response) {
                              $("#estimateform_msg").html(response);
                              $("#estimateform").trigger("reset");
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

              }else{
                  alert("Please Fill All the Required Information.");
                  return false;
              }
        }
////////////////// Forms Section End ///////////////////


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