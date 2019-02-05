
jQuery(document).ready(function($) {	
    
    photographer_location.photographer_locat;

    console.log(photographer_location.photographer_locat);
    var availableTags = JSON.parse(photographer_location.photographer_locat);
    $( "#photographer_location" ).autocomplete({
       source: availableTags
    });
 });