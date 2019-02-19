jQuery('.owl-carousel').owlCarousel({
	items:1,
    loop:true,
    margin:10,
	animateIn: 'fadeIn',
	animateOut: 'fadeOut',
	autoplay: true,
//	autoplayTimeout: 100,
//	autoplayHoverPause: false,
//	smartSpeed: 500,
	autoplaySpeed: 100,
    responsiveClass:true,
    nav:true,
    navigationText: [
      "<span class='fa fa-chevron-circle-left'></span>",
      "<span class='fa fa-chevron-circle-right'></span>"
      ],	
})