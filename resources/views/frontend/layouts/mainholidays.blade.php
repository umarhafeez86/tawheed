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

    <link rel="shortcut icon" href="{{ asset('uploads/settings/' . get_siteinfo('favicon_logo')) }}" type="image/x-icon">

    

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
    
    <!-- head widgets -->
    @include('frontend.layouts.headwidgets')
    <!-- head widgets -->

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

        // var input = document.getElementById('personphone');
        // input.addEventListener('input', function () {
        //     // Replace anything that's not a digit or a plus sign
        //     this.value = this.value.replace(/[^\d+]/g, '');
        // });

        
        $('.select2').select2();

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
                    slidesPerView: 4, // Desktops
                },
                1200: {
                    slidesPerView: 4, // Large desktops and up
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

        function addrow() {
            $rowno  = parseInt($("#travel_legs_row").val()) + 1;
            $rowno2 = parseInt($("#travel_legs_row").val()) + 101;
            $.ajax({
                url: "{{ url('/customholidayform-row') }}/"+$rowno,
                type: "get",
                success: function(response) {
                    $("#travel_legs").append(response);
                    $("#travel_legs_row").val($rowno);
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

            // $("#travel_legs_row").val($rowno);
            // $("#travel_legs").append('<div id="sublegs_'+ $rowno+'" class="row m-0 p-0">' +
            //   '<div class="mb-3 col-lg-3 col-6 autocomplete-container">' +
            //     '<label for="DepartureFrom_'+$rowno+'" class="custom-label">Departure From</label>' +
            //     '<input type="text" class="form-control autocomplete-input"' + 
            //     'oninput="showSuggestions(this.value,\'DepartureFrom_'+$rowno+'\', '+$rowno+')"' +
            //     'onblur="hideSuggestions(\'DepartureFrom_'+$rowno+'\', '+$rowno+')"' +
            //     'onfocus="showSuggestions(this.value,\'DepartureFrom_'+$rowno+'\', '+$rowno+')" name="DepartureFrom[]" id="DepartureFrom_'+$rowno+'">' +
            //     '<ul id="suggestion-list'+$rowno+'" class="suggestions"></ul>' +
            //   '</div>'+
            //   '<div class="mb-3 col-lg-3 col-6 autocomplete-container">' +
            //     '<label for="Destination_' +$rowno +'" class="custom-label">Destination</label>' +
            //     '<input type="text" class="form-control autocomplete-input"' + 
            //             'oninput="showSuggestions(this.value,\'Destination_'+$rowno+'\', '+ $rowno2+')"' +
            //             'onblur="hideSuggestions(\'Destination_'+$rowno+'\', '+ $rowno2+')"' +
            //             'onfocus="showSuggestions(this.value,\'Destination_'+$rowno+'\','+ $rowno2+')"' +
            //             'name="Destination[]" id="Destination_'+ $rowno+'" placeholder="Destination">' +
            //             '<ul id="suggestion-list'+ $rowno2+'" class="suggestions"></ul>' +
            //   '</div>' +
            //   '<div class="mb-3 col-lg-3 col-6">' +
            //   '  <label for="DepartureDate_'+$rowno+'" class="custom-label">Date</label>' +
            //   '  <input type="date" class="form-control" name="DepartureDate[]" id="DepartureDate_'+$rowno +'">' +
            //   '</div>' +
            //   '<div class="mt-4 mb-3 col-lg-3 col-6">' +
            //   '  <button type="button" class="leg-btn2" onclick="removerow('+$rowno +');">' +
            //   '    <img src="{{ asset('frontend/assets/images/minus.svg') }}" class="img-fluid" alt=""> Remove leg</button>' +
            //   '    </div>' +
            //   '</div>');
        }

        function removerow($rowno) {
            $("#sublegs_" + $rowno).remove();
        }


        function submitcustomform() {
            //$("#packagefiltershome").html('<img src="{{ url('/frontend/assets/images/loading.gif') }}" class="filterloader" alt="">');
            //console.log( $(this).val());
            var formData = $("#customholidayform").serialize(); // Serialize form data
            //alert (formData);
            $.ajax({
                url: "{{ url('/customholidayform-submit') }}",
                type: "POST",
                data: formData,
                success: function(response) {
                    $("#customholidayform_Area").html(response);
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
        }

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
