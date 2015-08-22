$(function () {
    $.validator.addMethod("regex", function (value, element, regexpr) {
        return regexpr.test(value);
    });
    // SEARCH RESULTS
    // Rating Slider
    $("#ratingAmountSlider").slider({
        value: 0,
        min: 0,
        max: 5,
        step: 1,
        slide: function (event, ui) {
            $('#ratingDisplayAmount').text(ui.value);
        }
    });


    // Min Bid Spinner
    $("#minBidAmountSpinner").spinner({
        min: 0,
        step: 5.0
    });

    // Max Bid Spinner
    $("#maxBidAmountSpinner").spinner({
        min: 0,
        step: 5.0
    });

    // Sort By Select Menu
    $('#sortBy').selectmenu();

    $('#auctionsPerPage').selectmenu();

    // same billing address slider
    $("#billingAddressSame").change(function () {
        if ($(this).is(":checked")) {
            $("#billingAddress").slideUp('fast');
        } else {
            $("#billingAddress").slideDown('fast');
        }
    });

    $('#startBidAmountSpinner').spinner({
        min: 1,
        step: 5.0
    });

    $("#addJobDurationSpinner").slider({
        value: 3,
        min: 1,
        max: 7,
        step: 1,
        slide: function (event, ui) {
            $('#addJobDurationDisplayAmount').text(ui.value);
            $('#joblength').val(ui.value);
        }
    });

    $("#jobProposedBidSpinner").spinner({
        min: 1.00,
        max: parseFloat($("#jobCurrentBidAmount").text()) - 0.01,
        step: 5.00
    });

    //registration validation
    $("#registerForm").validate({
        rules: {
            username: {
                required: true,
                minlength: 3,
                maxlength: 16,
                regex: /^[a-zA-Z0-9_-]{3,16}$/
            },
            firstName: {
                required: true,
                minlength: 3,
                regex: /^[A-Za-z-]{3,}$/
            },
            lastName: {
                required: true,
                minlength: 3,
                regex: /^[A-Za-z-]{3,}$/
            },
            address1: {
                required: true,
                minlength: 9,
                regex: /^[A-Za-z0-9 -]{9,}$/
            },
            address2: {
                required: true,
                minlength: 9,
                regex: /^[A-Za-z0-9 -]{9,}$/
            },
            suburb: {},
            postCode: {
                required: true,
                regex: /^[1-9]{1}[0-9]{3}$/
            },
            email: {
                required: true,
                email: true
            },
            confirmEmail: {
                equalTo: '#email'
            },
            password: {
                required: true,
                minlength: 6,
                maxlength: 18,
                regex: /^[a-zA-Z0-9_-]{6,18}$/
            },
            confirmPassword: {
                equalTo: '#password'
            }
        },
        messages: {
            username: {
                required: "Please enter your desired username.",
                minlength: "Your username must be at least 3 characters long.",
                maxlength: "Your username can only be up to 16 characters long.",
                regex: "Your username must only contain letters, numbers,'-' and '_'."
            },
            firstName: {
                required: "Please enter your first name.",
                minlength: "First name must be at least 3 characters long.",
                regex: "First name must only contain letters and '-'"
            },
            lastName: {
                required: "Please enter your last name.",
                minlength: "Last name must be at least 3 characters long.",
                regex: "Last name must only contain letters and '-'"
            },
            address1: {
                required: "Please enter your address.",
                minlength: "Your address must be at least 9 characters long.",
                regex: "Your address can only contain letters, numbers, spaces and '-'."
            },
            address2: {
                minlength: "Your address must be at least 9 characters long.",
                regex: "Your address can only contain letters, numbers, spaces and '-'."
            },
            suburb: {},
            postCode: {
                regex: "Please enter your postcode."
            },
            email: {
                required: "Please enter your email address.",
                email: "Please enter your valid email address."
            },
            confirmEmail: {
                equalTo: "Your email must match."
            },
            password: {
                required: "Please enter your desired password.",
                minlength: "Your password must contain at least 6 characters.",
                maxlength: "Your password must contain 18 or less characters.",
                regex: "Your password must only contain letters, numbers,'-' and '_', and have a length of 6 to 18 characters."
            },
            confirmPassword: {
                equalTo: "Must match other password provided."
            }

        }
    });

    //add job validation
    $("#addJobForm").validate({
        rules: {
            summary: {
                required: true
            },
            description: {
                required: true
            },
            startbid: {
                required: true,
                min: 1
            }


        },
        messages: {
            summary: {
                required: "Summary required."
            },
            description: {
                required: "Description required."
            },
            startbid: {
                required: "Must have starting bid.",
                min: "Starting bid must be at least $1."
            }
        }
    });
});
