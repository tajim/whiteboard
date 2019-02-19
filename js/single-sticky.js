/*=================== Single page Header ===================*/
var attach = jQuery('.news-auth-wrap').offset().top;

jQuery(window).on("scroll",function() {
    var scroll = jQuery(window).scrollTop();
    if (scroll > attach) {
      jQuery('.main-menu').addClass('singe-page-post');
      var temp = jQuery('#nav-news-title').detach();
      temp.insertAfter('#header #top-menu');
    } else {
      jQuery('.main-menu').removeClass('singe-page-post');
      var temp = jQuery('#nav-news-title').detach();
      temp.insertBefore('#post-single .entry-header h1.entry-title');
    }
});


jQuery('#secondary').stickThis({
    top:            60,		    // top position of sticky element, measured from 'ceiling'
    minscreenwidth: 1024,		    // element will not be sticky when viewport width smaller than this
    maxscreenwidth: 999999,		// element will not be sticky when viewport width larger than this 
    zindex:         1,		    // z-index value of sticky element
    debugmode:      true,      // when true, errors will be logged to console
    pushup:         '.footpushup'          // another (unique) element on the page that will 'push up' the sticky element
});