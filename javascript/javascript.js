$(function () {

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
        min: 0,
        step: 5.0
    });

    $("#addJobDurationSpinner").slider({
        value: 3,
        min: 1,
        max: 7,
        step: 1,
        slide: function (event, ui) {
            $('#addJobDurationDisplayAmount').text(ui.value);
            $('#joblength').text(ui.value);
        }
    });

    $("#jobProposedBidSpinner").spinner({
        min: 1.00,
        max: parseFloat($("#jobCurrentBidAmount").text()) - 0.01,
        step: 5.00
    });


});