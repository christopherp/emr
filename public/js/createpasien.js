$(document).ready(function(){
    $.dobPicker({
     // Selectopr IDs
    daySelector: '#dobday',
    monthSelector: '#dobmonth',
    yearSelector: '#dobyear',

    // Default option values
    dayDefault: "Hari",
    monthDefault: "Bulan",
    yearDefault: "Tahun",

    // Minimum age
    minimumAge: 0,

    // Maximum age
    maximumAge: 100
    });
  });

