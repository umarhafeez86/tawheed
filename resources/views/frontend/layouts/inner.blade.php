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
    
    <div class="bg-[#005B68] pt-3">
        @include('frontend.layouts.mainheader')
        @yield('main-container')
    </div>

    @include('frontend.layouts.customform')

    @include('frontend.layouts.footer')

<script src="{{ asset('frontend/assets/js/jquery-3.7.1.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
<script>
    function scrollRight4() {
        const container = document.getElementById('scroll-container4');
        container.scrollBy({
            left: 400,
            behavior: 'smooth'
        });
    }

    function scrollleft4() {
        const container = document.getElementById('scroll-container4');
        container.scrollBy({
            left: -400,
            behavior: "smooth"
        })
    }
    const openBtn = document.getElementById('openFilter');
    const closeBtn = document.getElementById('closeFilter');
    const sidebar = document.getElementById('filterSidebar');

    openBtn.addEventListener('click', () => {
        sidebar.classList.remove('translate-x-full');
    });

    closeBtn.addEventListener('click', () => {
        sidebar.classList.add('translate-x-full');
    });

    function submitfiltershome() {
        $("#packagefiltershome").html(
            '<img src="{{ url('/frontend/assets/images/loading.gif') }}" class="filterloader" alt="">');
        //console.log( $(this).val());
        var formData = $("#filterForm").serialize(); // Serialize form data
        //alert (formData);
       
            @php 
            if ($services){
            @endphp
            $.ajax({
                url: "{{ url('/' . $services->services_url) }}/filterdata",
                type: "POST",
                data: formData,
                success: function(response) {
                    $("#packagefiltershome").html(response);
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
            @php 
        }else{
            @endphp
                        $.ajax({
                url: "{{ url('/all/filterdata') }}",
                type: "POST",
                data: formData,
                success: function(response) {
                    $("#packagefiltershome").html(response);
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
            @php 
        }
            @endphp
    }


    $(".roomtype").on("change", function() {
        $("input[name='roomtype'][value='" + $(this).val() + "']").prop("checked", true);
    });

    $(".packagenights").on("change", function() {
        $("input[name='packagenights'][value='" + $(this).val() + "']").prop("checked", true);
    });


    $('#load-more').click(function() {
        let page = $(this).data('page');
                    @php 
            if ($services){
            @endphp
        $.ajax({
            url: "/load-more-packages?services_id=" + {{ $services->services_id }} + "&page=" + page,
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
                    @php 
    }else{
            @endphp
        $.ajax({
            url: "/load-more-packages?page=" + page,
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
                        @php 
            }
            @endphp
    });

    function clearfilters() {
        $('input[name="packagenights"][value=""]').prop('checked', true);
        $('input[name="roomtype"][value=""]').prop('checked', true);
        submitfiltershome();
    }
    

$(window).scroll(function() {
    if ($(this).scrollTop() > 150) {
        $('#desktopmenufixed').addClass('pos-fixed');
    } else {
        $('#desktopmenufixed').removeClass('pos-fixed');
    }
});


</script>

</body>

</html>
