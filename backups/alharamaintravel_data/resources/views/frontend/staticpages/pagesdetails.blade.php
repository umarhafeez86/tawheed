@extends('frontend.layouts.innerinfo')

@section('main-container')

@if ($staticpages->pages_name != "Contact Us")

    <h1 class="col-12 mt-4 mb-4 page_heading float-start">{{ $page_name }}</h1>
    <div class="clearfix"></div>
    <p class="page_sub_heading_text mb-5">{!! $staticpages->pages_details !!}</p>
    <div class="clearfix"></div>

@else

    <h1 class="col-12 mt-4 mb-4 page_heading float-start">{{ $page_name }}</h1>
    <div class="clearfix"></div>

    <div class="col-12 mb-4 float-start package-grid blog-item position-relative">
            <div class="d-flex gap-4 blog-content">
                    <a href="#" class="linkmore p-3 float-start"><i class="fa fa-location-pin me-3 float-start"></i> {{ get_siteinfo('setting_address') }}</a>
                    <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
    <div class="col-12 mb-4 float-start package-grid blog-item position-relative">
            <div class="d-flex gap-4 blog-content">
                    <a href="tel:{{ str_replace(' ', '',get_siteinfo('setting_phone')) }}" target="_blank" class="linkmore p-3 float-start"><i class="fa fa-phone me-3 float-start"></i> {{ get_siteinfo('setting_phone') }}</a>
                    <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>

    @if (get_siteinfo('setting_phone2') !="")
    <div class="col-12 mb-4 float-start package-grid blog-item position-relative">
            <div class="d-flex gap-4 blog-content">
                    <a href="tel:{{ str_replace(' ', '',get_siteinfo('setting_phone2')) }}" target="_blank" class="linkmore p-3 float-start"><i class="fa fa-phone me-3 float-start"></i> {{ get_siteinfo('setting_phone2') }}</a>
                    <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
    @endif

    <div class="col-12 mb-4 float-start package-grid blog-item position-relative">
            <div class="d-flex gap-4 blog-content">
                    <a href="mailto:{{ get_siteinfo('setting_email') }}" class="linkmore p-3 float-start"><i class="fa fa-envelope me-3 float-start"></i> {{ get_siteinfo('setting_email') }}</a>
                    <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>


                <div class="col-12 float-start">
                    <h3 class="page_sub_heading mb-2 mt-0 mb-lg-4 mt-lg-5">Drop a Message</h3>
                    <div class="clearfix"></div>
                    <div class="row mt-0 ms-0 me-0 mb-3 p-3 p-md-3 p-lg-5 form-custon-inquiry">
                        <form name="estimateform" id="estimateform" method="post"
                            class="col-12 m-0 p-0 float-start">
                        @csrf

                            <div class="row gx-4">
                                <div class="col-md-6 mb-3">
                                    <label for="contact_fullname" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="contact_fullname" name="contact_fullname"
                                        placeholder="Full Name">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="contact_phoneno" class="form-label">Contact Number</label>
                                    <input type="text" class="form-control" id="contact_phoneno" placeholder="+44" name="contact_phoneno" value="+44" oninput="if(!this.value.startsWith('+44')) this.value = '+44';" maxlength="13">
                                </div>
                            </div>

                            <div class="row gx-4">
                                <div class="col-md-6 mb-3">
                                    <label for="contact_email" class="form-label">Email Address</label>
                                    <input type="text" class="form-control" id="contact_email" name="contact_email"
                                        placeholder="Email Address">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="contact_message" class="form-label">Message</label>
                                    <input type="text" class="form-control" id="contact_message" placeholder="Message" name="contact_message">
                                </div>
                            </div>
                            <p class="termsnote float-start">
                                By submitting, you agree to emails and GDPR-compliant data use per our <a href="{{ url('/information/privacy-policy') }}" target="_blank">Privacy Policy</a> and <a href="{{ url('/information/terms-conditions') }}" target="_blank">Terms</a>.
                            </p>
                            <div class="form-row-msg" id="estimateform_msg"></div>
                            <button type="button" class="btn btn-form-custon-inquiry-submit mt-1" onclick="submitcontactform();">Submit</button>
                        </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>


        <script>
            function submitcontactform(){
            
                                    var contact_fullname    =    $("#estimateform #contact_fullname").val();
                                    var contact_email       =    $("#estimateform #contact_email").val();
                                    var contact_phoneno     =    $("#estimateform #contact_phoneno").val();
                                    var contact_message     =    $("#estimateform #contact_message").val();
            
                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });
            
                                    if ((contact_fullname!="") && (contact_email!="") && (contact_phoneno!="") && (contact_message!="")){
        
                                        $("#estimateform_msg").html('<img src="{{ url('/frontend/assets/images/form-load.gif') }}" alt="">');
        
                                        var formData = $("#estimateform").serialize(); // Serialize form data
                                        //alert (formData);
                                        $.ajax({ 
                                            url: "{{ url('/contact-submit') }}", 
                                            type: "POST",
                                            data: formData,
                                            success: function(response) {
                                                $("#estimateform_msg").html(response);
                                                $('#estimateform').trigger("reset"); 
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
        </script>

@endif

@endsection