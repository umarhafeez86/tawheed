<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $page_title }} - {{ config('app.name') }}</title>
    <meta name="description" content="{{ $page_descp }}">
    <meta name="keywords" content="{{ $page_keyword }}">

    <link rel="shortcut icon" href="{{ asset('uploads/settings/'.get_siteinfo('favicon_logo')) }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ url('frontend/assets/css/fonts.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('frontend/assets/css/page3.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/assets/css/extra.css') }}">

</head>

<body>

@yield('main-container')

<script src="{{ url('frontend/assets/js/jquery-3.7.1.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
  crossorigin="anonymous"></script>

  
<script>
function submitfiler2(){
    var estimate_packagetype    =    $("#enquiryform_new #estimate_packagetype").val();
    var roomtype                =    $("#enquiryform_new #roomtype").val();
    var selmonth                =    $("#enquiryform_new #selmonth").val();

    $("#enquiryform_new").attr("action", selmonth).submit();

}    

function submitenquiry(){

        var estimate_fullname   =    $("#enquiryform #estimate_fullname").val();
        var estimate_phoneno    =    $("#enquiryform #estimate_phoneno").val();
        var estimate_msg        =    $("#enquiryform #estimate_msg").val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
                if ((estimate_fullname!="") && (estimate_phoneno!="") && (estimate_msg!="")){
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
                }else{
                        alert("Please Fill All the Required Information.");
                        return false;
                }
}


function submitenquirymob(){

        var estimate_fullname   =    $("#enquiryformmob #estimate_fullname2").val();
        var estimate_phoneno    =    $("#enquiryformmob #estimate_phoneno2").val();
        var estimate_msg        =    $("#enquiryformmob #estimate_msg2").val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        if ((estimate_fullname!="") && (estimate_phoneno!="") && (estimate_msg!="")){
                var formData = $("#enquiryformmob").serialize(); // Serialize form data
                //alert (formData);
                $("#enquiryformmob_msg").html('<img src="{{ url('/frontend/assets/images/form-load.gif') }}" alt="">');
                        $.ajax({ 
                            url: "{{ url('/estimateformprocess') }}", 
                            type: "POST",
                            data: formData,
                            success: function(response) {
                                $("#enquiryformmob_msg").html(response);
                                $("#enquiryformmob").trigger("reset");
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


  @php 
  if ($services){
  @endphp
  $(".roomtype").on("change", function() { 
      $("#packagesData").html('<img src="{{ url('/frontend/assets/images/loading.gif') }}" alt="">');
      //console.log( $(this).val());
      $("input[name='roomtype'][value='"+$(this).val()+"']").prop("checked", true);
      var formData = $("#filterForm").serialize(); // Serialize form data
      //alert (formData);
                $.ajax({ 
                    url: "{{ url('/services') }}/{{  $services->services_url }}/filterdata", 
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        $("#packagesData").html(response);
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
});
$(".packagenights").on("change", function() { 
      $("#packagesData").html('<img src="{{ url('/frontend/assets/images/loading.gif') }}" alt="">');
      //console.log( $(this).val());
      $("input[name='packagenights'][value='"+$(this).val()+"']").prop("checked", true);
      var formData = $("#filterForm").serialize(); // Serialize form data
      //alert (formData);
                $.ajax({ 
                    url: "{{ url('/services') }}/{{ $services->services_url }}/filterdata", 
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        $("#packagesData").html(response);
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
});
  @php
  }else{
  @endphp
  $(".roomtype").on("change", function() { 
      $("#packagesData").html('<img src="{{ url('/frontend/assets/images/loading.gif') }}" alt="">');
      //console.log( $(this).val());
      $("input[name='roomtype'][value='"+$(this).val()+"']").prop("checked", true);
      var formData = $("#filterForm").serialize(); // Serialize form data
      //alert (formData);
                $.ajax({ 
                    url: "{{ url('/services') }}/umrah-packages/filterdata", 
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        $("#packagesData").html(response);
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
});
$(".packagenights").on("change", function() { 
      $("#packagesData").html('<img src="{{ url('/frontend/assets/images/loading.gif') }}" alt="">');
      //console.log( $(this).val());
      $("input[name='packagenights'][value='"+$(this).val()+"']").prop("checked", true);
      var formData = $("#filterForm").serialize(); // Serialize form data
      //alert (formData);
                $.ajax({ 
                    url: "{{ url('/services') }}/umrah-packages/filterdata", 
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        $("#packagesData").html(response);
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
});
  @php
  }
  @endphp
</script>
	
</body>
</html>