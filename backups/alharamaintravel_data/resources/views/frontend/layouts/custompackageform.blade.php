                <div class="col-12 float-start">
                    <h3 class="page_sub_heading mb-2 mt-0 mb-lg-4 mt-lg-5">Didn't get what you were looking for?</h3>
                    <div class="clearfix"></div>
                    <p class="page_sub_heading_text">Give us a minute of your time and we will help you out!</p>
                    <div class="row mt-0 ms-0 me-0 mb-3 p-3 p-md-3 p-lg-5 form-custon-inquiry">
                        <form name="customform" id="customform" method="post"
                            class="col-12 m-0 p-0 float-start">
                        @csrf

                            <div class="row gx-4">
                                <div class="col-md-6 mb-3">
                                    <label for="customform_fname" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="customform_fname" name="customform_fname"
                                        placeholder="Full Name">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="customform_contactno" class="form-label">Contact Number</label>
                                    <input type="text" class="form-control" id="customform_contactno" placeholder="+44" name="customform_contactno" value="+44" oninput="if(!this.value.startsWith('+44')) this.value = '+44';" maxlength="13">
                                </div>
                            </div>
                            <p class="termsnote float-start">
                                By submitting, you agree to emails and GDPR-compliant data use per our <a href="{{ url('/information/privacy-policy') }}" target="_blank">Privacy Policy</a> and <a href="{{ url('/information/terms-conditions') }}" target="_blank">Terms</a>.
                            </p>
                            <div class="form-row-msg" id="customform_msg"></div>
                            <button type="button" class="btn btn-form-custon-inquiry-submit mt-1" onclick="submitcustomform();">Submit</button>
                        </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
<script>
        function submitcustomform() {

            var customform_fname            = $("#customform_fname").val();
            var customform_contactno        = $("#customform_contactno").val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if ((customform_fname != "") && (customform_contactno != "")) {
                var formData = $("#customform").serialize(); // Serialize form data
                //alert (formData);
                $("#customform_msg").html('<img src="{{ url('/frontend/assets/images/form-load.gif') }}" alt="">');
                $.ajax({
                    url: "{{ url('/submitcustomform') }}",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        $("#customform_msg").html(response);
                        $("#customform").trigger("reset");
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


var input = document.getElementById('customform_contactno');
input.addEventListener('input', function () {
    // Replace anything that's not a digit or a plus sign
    this.value = this.value.replace(/[^\d+]/g, '');
});

</script>