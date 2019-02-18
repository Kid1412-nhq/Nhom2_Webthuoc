(function($){
	"use strict";
    var WPO_Menufooter_effect = function(){
        "use strict";
        jQuery('.wpo-footer .menu a').each(function(){
            jQuery(this).contents().wrap("<span></span>");
            jQuery(this).find('span').attr('data-hover',jQuery(this).text());
        });
    }

    var WPO_Parallax = function(){
        jQuery('.parallax').parallax('50%',0.5);
    }


	jQuery(document).ready(function() {
        WPO_Parallax();
        WPO_Menufooter_effect();
        jQuery('.yith-wcwl-add-to-wishlist div[style="clear:both"]').remove();

        // init Animate Scroll
        if(jQuery('body').hasClass('wpo-animate-scroll')){
            new WOW().init();
        }
	});

    jQuery(window).scroll(function(event){

    });

    jQuery(window).resize(function(event) {

    });

})(jQuery);
