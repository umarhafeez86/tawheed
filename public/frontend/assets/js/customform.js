    $("#inner_content_details").hide();
    $("#umrahwithholiday").hide();

    $('.select6').select2();

    function changeValue(delta) {
        const input = document.getElementById('noofdays');
        let value = parseInt(input.value) || 1;
        value += delta;
        if (value < parseInt(input.min)) value = input.min;
        input.value = value;
    }


    const dateInput = document.getElementById("dateInput");
    const selectedText = document.getElementById("selectedText");

    let picker;

    function initPicker(type) {
      if (picker) picker.destroy();

      if (type === "fixed") {
        dateInput.style.display = 'block';
        dateInput.placeholder = "Pick a specific date";
        selectedText.textContent = "";
        picker = flatpickr(dateInput, {
          mode: "single",
          dateFormat: "d M Y",
          minDate: "today",
          onChange: (selectedDates, dateStr) => {
            //selectedText.textContent = "Fixed Date: " + dateStr;
            selectedText.textContent = "";

            $("#noofdays").val(1);
          }
        });
      } else if (type === "flexible") {
        dateInput.style.display = 'block';
        dateInput.placeholder = "Pick a date range";
        selectedText.textContent = "";
        picker = flatpickr(dateInput, {
          mode: "range",
          dateFormat: "d M Y",
          minDate: "today",
          showMonths: 2, // Show 2 months side-by-side
          onChange: (selectedDates, dateStr) => {
            //selectedText.textContent = "Flexible Dates: " + dateStr;
            selectedText.textContent = "";


            const dateRange = dateStr;

            // Step 1: Split the range
            const [startStr, endStr] = dateRange.split(" to ");

            // Step 2: Convert to Date objects
            const startDate = new Date(startStr);
            const endDate = new Date(endStr);

            // Step 3: Calculate difference in milliseconds and convert to days
            const diffTime = endDate - startDate;
            const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24)) + 1; // +1 to include both days
            //console.log(`Total Days: ${diffDays}`);
            $("#noofdays").val(diffDays);


          }
        });
      } else if (type === "anytime") {
        dateInput.style.display = 'none';
        selectedText.textContent = "Anytime selected";
        $("#noofdays").val(1);
      }
    }

    // Radio button listener
    document.querySelectorAll('input[name="dateOption"]').forEach(radio => {
      radio.addEventListener('change', (e) => {
        $("#inner_content_details").show();
        initPicker(e.target.value);
      });
    });

    document.querySelectorAll('input[name="triptype"]').forEach(radio => {
      radio.addEventListener('change', (e) => {
            //alert(e.target.value);
            if (e.target.value=="umrahonly"){
                 $("#umrahwithholiday").hide();
                 $("#umrahonly").show();
            }else{
                $("#umrahwithholiday").show();
                $("#umrahonly").hide();
            }
      });
    });

    // Init default picker
    initPicker("fixed");

function isValidEmail(email) {
    const pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return pattern.test(email);
}

  const steps3 = document.querySelectorAll('.step-section');
  let currentStep = 0;

  function showStep1(index) {
    steps3.forEach((steps3, i) => {
      steps3.classList.toggle('active', i === index);
    });
  }

  document.querySelectorAll('.next-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      if (currentStep == 0){
                var triptype             = $('#customholidayform_btm input[name="triptype"]:checked').val();

                if (triptype=="umrahonly"){
                    var DepartureCity    = $("#customholidayform_btm #DepartureCity").val();
                }else{
                    var DepartureCity    = $("#customholidayform_btm #DepartureCity2").val();
                }
                

                var DestinationCity      = $('#customholidayform_btm select[name="DestinationCity"]:visible').val();
                var noofpax              = $("#customholidayform_btm #noofpax").val();

                var hotel_type           = $("#customholidayform_btm #hotel_type").val();
                var dateOption           = $('#customholidayform_btm input[name="dateOption"]:checked').val();

                var dateInput            = $("#customholidayform_btm #dateInput").val();
                var noofdays             = $("#customholidayform_btm #noofdays").val();


                if (DepartureCity == ""){
                        $("#DepartureCity_msg").html("Select Departure City");
                        return false;
                }else{
                        $("#DepartureCity_msg").html("");
                }

                //alert (DestinationCity);
                if (DestinationCity == ""){
                        $("#DestinationCity_msg").html("Select Destination City");
                        return false;
                }else{
                        $("#DestinationCity_msg").html("");
                }

                if (noofpax == ""){
                        $("#noofpax_msg").html("Enter No. of Pax.");
                        return false;
                }else{
                        $("#noofpax_msg").html("");
                }

                if (hotel_type == ""){
                        $("#hotel_type_msg").html("Select Hotel Preference");
                        return false;
                }else{
                        $("#hotel_type_msg").html("");
                }
                
                if ($('input[name="dateOption"]:checked').length > 0) {
                        $("#dateOption_msg").html("");

                        if (dateOption != "anytime"){
                                if (dateInput == ""){
                                        $("#dateInput_msg").html("Select Depature Dates");
                                        return false;
                                }else{
                                        $("#dateInput_msg").html("");
                                }
                        }   

                }else{
                        $("#dateOption_msg").html("Select Departure Dates Type");
                        return false;
                }  

                if (noofdays == ""){
                        $("#noofdays_msg").html("Enter No. of Days.");
                        return false;
                }else{
                        $("#noofdays_msg").html("");
                }     

      }

      if (currentStep == 1){
        
                var personname        = $("#customholidayform_btm #personname").val();
                var personemail       = $("#customholidayform_btm #personemail").val();
                var personphoneno     = $("#customholidayform_btm #personphoneno").val();

                if (personname == ""){
                        $("#personname_msg").html("Enter Person Name");
                        return false;
                }else{
                        $("#personname_msg").html("");
                }

                if (personemail == ""){
                        $("#personemail_msg").html("Enter Person Email");
                        return false;
                }else{
                        $("#personemail_msg").html("");
                }

                if (personemail == ""){
                        $("#personemail_msg").html("Enter Person Email");
                        return false;
                }else{
                        $("#personemail_msg").html("");
                }

                if (isValidEmail(personemail)) {
                        $("#personemail_msg").html("");
                }else{
                        $("#personemail_msg").html("Enter Valid Email");
                        return false;
                }   

                if (personphoneno == ""){
                        $("#personphoneno_msg").html("Enter Person Contact No.");
                        return false;
                }else{
                        $("#personphoneno_msg").html("");
                }

                submitcustomholidayform();
      }
 
      if (currentStep < steps3.length - 1) {
        currentStep++;
        showStep1(currentStep);
      }
    });
  });

  document.querySelectorAll('.prev-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      if (currentStep > 0) {
        currentStep--;
        showStep1(currentStep);
      }
    });
  });

  document.getElementById('customholidayform_btm').addEventListener('submit', e => {
    e.preventDefault();
    //alert('Form submitted!');
    // Do your submission logic here
  });


  function submitcustomholidayform(){

            //$("#packagefiltershome").html('<img src="{{ url('/frontend/assets/images/loading.gif') }}" class="filterloader" alt="">');
            //console.log( $(this).val());
            var formData = $("#customholidayform_btm").serialize(); // Serialize form data
            //alert (formData);
            $.ajax({
                url: "https://tawheedtravel.co.uk/custom-holiday-plan-submit",
                type: "POST",
                data: formData,
                success: function(response) {
                    $("#customholidayform_btm_Area").html(response);
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