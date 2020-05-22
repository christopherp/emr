$(document).ready(function(){
    $.dobPicker({
     // Selectopr IDs
    daySelector: '#dobday',
    monthSelector: '#dobmonth',
    yearSelector: '#dobyear',

    // Default option values
    dayDefault: dob_day,
    monthDefault: dob_month,
    yearDefault: dob_year,

    // Minimum age
    minimumAge: 0,

    // Maximum age
    maximumAge: 100
    });
});

