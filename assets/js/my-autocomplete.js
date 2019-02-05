
jQuery(document).ready(function($) {	
    
    pro_expert_location.pro_expert_locat;

    console.log(pro_expert_location.pro_expert_locat);
    var availableTags = JSON.parse(pro_expert_location.pro_expert_locat);
    $( "#pro_experts_location" ).autocomplete({
       source: availableTags
    });
 });