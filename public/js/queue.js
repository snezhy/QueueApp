/**
 * Created by Snezhana on 23/04/2016.
 */

$(function () {

    'use strict';
    clearValues();

    $('select[name=customerType]').change(function() {

        var citizenType = $(this).val();

        switch (citizenType) {
            case "citizen":
                clearValues();
                $('#citizenDiv').show();
                $('#organisationDiv').hide();
                break;
            case 'organisation':
                clearValues();
                $('#citizenDiv').hide();
                $('#organisationDiv').show();
                break;
            default:
                clearValues();
                $('#citizenDiv').hide();
                $('#organisationDiv').hide();
                break;
        }
    })
});

function clearValues() {

    $('select[name=citizenType]').val('');
    $('select[name=title]').val('');
    $('input[name=firstName]').val('');
    $('input[name=lastName]').val('');
    $('input[name=organisationName]').val('');
}