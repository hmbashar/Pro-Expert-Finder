(function($) {
    "use strict";    
    $(document).ready(function(){
        
        // Photographer top to bottom scroll
        $(".see_photo_review").on('click', function(event) {
            if (this.hash !== "") {
              event.preventDefault();
              var hash = this.hash;
              $('html, body').animate({
                scrollTop: $(hash).offset().top
              }, 1000, function(){
                window.location.hash = hash;
              });
            }
            return false;
        });


        $('.photographer-profile-feedback-content').owlCarousel({
            items: 1,
            autoplay:true,
            loop:true,
            dots: false,
            nav: true,
            navText: ['<i class="fas fa-less-than"></i>', '<i class="fas fa-greater-than"></i>'],
        });
    });    
})(jQuery);