    jQuery(document).ready(function () {



		jQuery(function() {

			var $c = jQuery('#carousel-add'),
				$w = jQuery(window);

			$c.carouFredSel({
				align: true,
				width: 280,
				height: 210,
				direction: 'up',
				items: 1,
				scroll: {
					items: 1,
					duration: 8000,
					timeoutDuration: 0,
					easing: 'linear',
					pauseOnHover: 'immediate'
				}
			});


			$w.bind('resize.example', function() {
				var nw = $w.width();
				if (nw < 990) {
					nw = 990;
				}

				$c.width(nw * 3);
				$c.parent().width(nw);

			}).trigger('resize.example');

		});




        if (jQuery(window).width() < 768) {
          var temp=  jQuery('.widget_setopati_category_bichar_post').detach(); //Performs the cut operation
          temp.insertAfter('#only-news');  //Does the paste
        }

      jQuery('#left-side-bar').stickThis({
        top:            10,	// top position of sticky element, measured from 'ceiling'
        minscreenwidth: 800, // element will not be sticky when viewport width smaller than this
        maxscreenwidth: 999999, //element will not be sticky when viewport width larger than this
        zindex:         1,		    // z-index value of sticky element
        debugmode:      false,      // when true, errors will be logged to console
        pushup:         '.kinmel-anubhav' // another (unique) element on the page that will 'push up' the sticky element
      });

        if (jQuery(window).width() < 768) {
//          var temp=  jQuery('#setopati_category_post-7').detach(); //Performs the cut operation
          var temp=  jQuery('#setopati_category_bichar_post-3').detach(); //Performs the cut operation		  
          temp.insertAfter('#only-news');  //Does the paste
        }




      });


    function popitup(url) {
    	newwindow=window.open(url,'name','height=600,width=460');
    	if (window.focus) {newwindow.focus()}
    	return false;
    }

    //jQuery('.heateor_sss_sharing_ul li:last').insertBefore('.heateor_sss_sharing_ul li:first');


     jQuery(function() {
   //caches a jQuery object containing the header element
   var header = jQuery(".tacky");
   jQuery(window).scroll(function() {
       var scroll = jQuery(window).scrollTop();

       if (scroll >= 180) {
           header.addClass('tacky-ad');
       } else {
           header.removeClass("tacky-ad");
       }
   });
});


/*

jQuery('body').on( 'alnp-post-changed', function( e, post_title, post_url, post_id ) {
												 
	jQuery(".fb-comments").attr('data-href', post_url);
    FB.XFBML.parse();							
	
	jQuery(".toptitle").text(post_title);		
	
	jQuery('meta[name=description]').attr('content', post_title);

	
	
});

*/

minimum= 1101;
maximum= 28909;
var querystring = Math.floor(Math.random() * (maximum - minimum + 1)) + minimum; // replace with your own string

jQuery('#top-menu .utmclass a').each(function()
{
 var href = jQuery(this).attr('href');
 href += (href.match(/\?/) ? '&' : '?utm=') + querystring; // change last '?' to '#' if need
jQuery(this).attr('href', href);
});