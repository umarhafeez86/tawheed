        $(window).scroll(function() {
            if ($(this).scrollTop() > 80) {
                $('#topheader').addClass('position-fixed');
            } else {
                $('#topheader').removeClass('position-fixed');
            }
        });

        ///////////////////////

        // var input = document.getElementById('personphoneno');
        // input.addEventListener('input', function () {
        //     // Replace anything that's not a digit or a plus sign
        //     this.value = this.value.replace(/[^\d+]/g, '');
        // });

        //////////////////