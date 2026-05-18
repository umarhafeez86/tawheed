<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>{{ $page_title }} - {{ config('app.name') }}</title>
    <meta name="description" content="{{ $page_descp }}">
    <meta name="keywords" content="{{ $page_keyword }}">

    <link rel="shortcut icon" href="{{ asset('/uploads/settings/' . get_siteinfo('favicon_logo')) }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ url('/frontend/assets/css/fonts.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" /> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">

    <!-- <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" /> -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ url('/frontend/assets/css/index.css') }}">


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

    @include('frontend.layouts.footer') 

<script src="{{ asset('frontend/assets/js/jquery-3.7.1.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

<script>
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