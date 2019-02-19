// JavaScript Document
jQuery(function($) { // DOM is now ready and jQuery's $ alias sandboxed

/*=================== Sticky Header ===================*/
jQuery("div#header").addClass("stick");
var nav_stick;
if (jQuery("div#header").hasClass('stick')) {
    var nav_stick = jQuery("nav").offset().top;
}
jQuery(window).on("scroll",function() {
    var scroll = jQuery(window).scrollTop();
    if (scroll > nav_stick) {
        jQuery("div.stick").addClass("sticky");
        jQuery("div.sticky .main-menu").addClass('noborder');
        var nav_height = jQuery("nav#stick").innerHeight();
        jQuery(".nav-height").css({
            "height": nav_height
        });
    } else {
        jQuery("div.stick").removeClass("sticky");
        jQuery("div.stick .main-menu").removeClass("noborder");
        jQuery(".nav-height").css({
            "height": 0
        });
    }
});


});		


        jQuery("#share").jsSocials({								   			   								   
			showCount: false,
			showLabel: false,
			shareIn: "popup",	
			shares: [
				{ share: "twitter", via: "setopati",},
				"facebook",
				"googleplus",
				"linkedin",
			]			
        });

        jQuery("#share_top").jsSocials({								   			   								   
			showCount: false,
			showLabel: false,
			shareIn: "popup",	
			shares: [
				{ share: "twitter", via: "setopati",},
				"facebook",
				"googleplus",
				"linkedin",
			]			
        });
		
        jQuery("#share_bottom").jsSocials({								   			   								   
			showCount: false,
			showLabel: false,
			shareIn: "popup",	
			shares: [
				{ share: "twitter", via: "setopati",},
				"facebook",
				"googleplus",
				"linkedin",
			]			
        });		


/*=================== Share Tools ===================*/
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=275331666278506";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);

  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };

  return t;
}(document, "script", "twitter-wjs"));

/*

		jQuery(document).ready(function() {
            jQuery('a').attr("target", "_blank");
            jQuery('#noNewTab').attr("target","_self");
            
            jQuery('#top-menu #menu-item-43551 a').attr("target", "_self");
        });

*/