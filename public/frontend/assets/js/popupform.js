  let currentStep2 = 0;
  const steps2 = document.querySelectorAll(".step2");
  const nextBtn = document.getElementById("nextBtn");
  const prevBtn = document.getElementById("prevBtn");
  const submitBtn = document.getElementById("submitBtn");
  const form = document.getElementById("multiStepForm");

  // $("#btmbuttons").hide();

  function showStep(step) {
    steps2.forEach((el, i) => {
      el.classList.toggle("active", i === step);
    });

    // if (step == 0){
    //   $("#btmbuttons").hide();
    // }else{
    //   $("#btmbuttons").show();
    // }

    prevBtn.classList.toggle("hidden", step === 0);
    //prevBtn.style.display = step === 0 ? "hidden" : "flex";
    nextBtn.classList.toggle("hidden", step === steps2.length - 1);
    submitBtn.classList.toggle("hidden", step !== steps2.length - 1);


  }

  nextBtn.addEventListener("click", () => {
    const inputs = steps2[currentStep2].querySelectorAll("input, textarea, select");
    for (let input of inputs) {

if (input.type === "radio") {
      const name = input.name;
      const radios = steps2[currentStep2].querySelectorAll(`input[type="radio"][name="${name}"]`);
      const isChecked = [...radios].some(r => r.checked); 
      if (!isChecked) {
        alert(`Please select an option`);
        return;
      }
    } else if (input.tagName === "SELECT" && !input.value) {
      alert(`Please select a value`);
      return;
    } else if (!input.checkValidity()) {
      input.reportValidity();
      return;
    }
    
      // if (!input.checkValidity()) {
      //   input.reportValidity();
      //   return;
      // }
    }
    currentStep2++;
    showStep(currentStep2);
  });

  prevBtn.addEventListener("click", () => {
    currentStep2--;
    showStep(currentStep2);
  });

  form.addEventListener("submit", (e) => {
        e.preventDefault();
        //alert("Form submitted!");

            //$("#packagefiltershome").html('<img src="{{ url('/frontend/assets/images/loading.gif') }}" class="filterloader" alt="">');
            //console.log( $(this).val());
            var formData = $("#multiStepForm").serialize(); // Serialize form data
            //alert (formData);
            $.ajax({
                url: "https://tawheedtravel.co.uk/custom-holiday-plan-submit",
                type: "POST",
                data: formData,
                success: function(response) {
                    $("#multiStepForm_Area").html(response);
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
 
        //form.reset();
        //currentStep2 = 0;
        //showStep(currentStep2);
        //const modal = bootstrap.Modal.getInstance(document.getElementById("stepFormModal"));
        //modal.hide();
  });

  showStep(currentStep2);