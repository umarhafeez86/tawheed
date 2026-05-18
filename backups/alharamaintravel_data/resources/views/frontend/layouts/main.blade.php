
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $page_title }} - {{ config('app.name') }}</title>
    <meta name="description" content="{{ $page_descp }}">
    <meta name="keywords" content="{{ $page_keyword }}">

    <link rel="shortcut icon" href="{{ asset('uploads/settings/'.get_siteinfo('favicon_logo')) }}" type="image/x-icon">
    
    <link rel="stylesheet" href="{{ url('frontend/assets/css/fonts.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('frontend/assets/css/intro.css') }}">

        <!-- head widgets -->
        @include('frontend.layouts.headwidgets')
        <!-- head widgets -->

</head>



@yield('main-container')


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
function loadReturnTypeMoreField()
{
    $('#contact-Info-Div').show();
}
function loadOneWayMoreField()
{
    $('#contact-Info-Div-OneWay').show();
}
</script>

</html>