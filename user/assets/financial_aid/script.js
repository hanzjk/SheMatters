
var current_fs, next_fs, previous_fs; //fieldsets
var opacity;

$(".next1").click(function () {
    var next1 = true;

    if (document.getElementById("emp").value === "") {
        next1 = false;
        document.getElementById("help_emp").textContent = "This field is required";
    }

    else {
        document.getElementById("help_emp").textContent = "";
    }

    if (document.getElementById("income").value === "") {
        next1 = false;
        document.getElementById("help_income").textContent = "This field is required";
    }


    else if (document.getElementById("income").value < 0) {
        next1 = false;
        document.getElementById("help_income").textContent = "Invalid Amount";
    }



    else {
        document.getElementById("help_income").textContent = "";
    }


    if (document.getElementById("reason").value === "") {
        next1 = false;
        document.getElementById("help_reason").textContent = "This field is required";
    }
    else {
        document.getElementById("help_reason").textContent = "";
    }

    if (document.getElementById("use").value === "") {
        next1 = false;
        document.getElementById("help_use").textContent = "This field is required";
    }
    else {
        document.getElementById("help_use").textContent = "";
    }

    if (document.getElementById("amount").value === "") {
        next1 = false;
        document.getElementById("help_amount").textContent = "This field is required";
    }

    else if (document.getElementById("amount").value < 0) {
        next1 = false;
        document.getElementById("help_amount").textContent = "Invalid Amount";
    }
    else {
        document.getElementById("help_amount").textContent = "";
    }



    if (next1 === true) {

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        //Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({ opacity: 0 }, {
            step: function (now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_fs.css({ 'opacity': opacity });
            },
            duration: 600
        });
    }
});


$(".next2").click(function () {
    var next2 = true;
    if (document.getElementById("r_name").value === "") {
        next2 = false;
        document.getElementById("help_rname").textContent = "This field is required";
    }

    else if ((/^[a-zA-Z ]*$/).test(document.getElementById("r_name").value) != true) {
        next2 = false;
        document.getElementById("help_rname").textContent = "Only letters are allowed";

    }
    else {
        document.getElementById("help_rname").textContent = "";
    }

    if (document.getElementById("r_contact").value === "") {
        next2 = false;
        document.getElementById("help_rcontact").textContent = "This field is required";
    }


    else if ((/[0-9]{10}/.test(document.getElementById("r_contact").value)) != true && document.getElementById("r_contact").value != "") {
        next2 = false;
        document.getElementById("help_rcontact").textContent = "Only 10 digits are allowed for the contact number";

    }
    else {
        document.getElementById("help_rcontact").textContent = "";

    }




    if (document.getElementById("account").value === "") {
        next2 = false;
        document.getElementById("help_account").textContent = "This field is required";
    }

    else if ((/[0-9]/.test(document.getElementById("account").value)) != true && document.getElementById("account").value != "") {
        next2 = false;
        document.getElementById("help_account").textContent = "Only  digits are allowed for the account number";

    }

    else {
        document.getElementById("help_account").textContent = "";
    }

    if (document.getElementById("bankName").value === "") {
        next2 = false;
        document.getElementById("help_bank").textContent = "This field is required";
    }

    else {
        document.getElementById("help_bank").textContent = "";
    }


    if (document.getElementById("branch").value === "") {
        next2 = false;
        document.getElementById("help_branch").textContent = "This field is required";
    }

    else {
        document.getElementById("help_branch").textContent = "";
    }


    if (next2 === true) {

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        //Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({ opacity: 0 }, {
            step: function (now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_fs.css({ 'opacity': opacity });
            },
            duration: 600
        });
    }
});




$(".previous").click(function () {

    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();

    //Remove class active
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

    //show the previous fieldset
    previous_fs.show();

    //hide the current fieldset with style
    current_fs.animate({ opacity: 0 }, {
        step: function (now) {
            // for making fielset appear animation
            opacity = 1 - now;

            current_fs.css({
                'display': 'none',
                'position': 'relative'
            });
            previous_fs.css({ 'opacity': opacity });
        },
        duration: 600
    });
});

$('.radio-group .radio').click(function () {
    $(this).parent().find('.radio').removeClass('selected');
    $(this).addClass('selected');
});

$(".submit").click(function () {
    return false;
});

