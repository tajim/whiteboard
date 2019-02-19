/*

	jQuery('.skipbtn').click(function() {
          jQuery('#singlejacketModal').modal('hide');
      });

		jQuery(document).ready(function(){
			jQuery('#homejacketModal').modal('show');
			jQuery('#singlejacketModal').modal('show');
      //$('.skipbtn').modal('hide');
		});


    jQuery(".close-button").click(function(){
        jQuery(".stickyad").hide();
    })


*/



jQuery(document).ready(function() {

  jQuery(window).bind("resize", function() {
	  resizeEvent();
  });
});

function resizeEvent() {
  jQuery(".introduction .shade .container .row").css("height", jQuery(window).height());
  jQuery(".introduction .shade").css("height", jQuery(window).height());
}

jQuery('.skipbtn').on('click', function(e){
  jQuery(".introduction").slideUp(500);
  e.preventDefault();
  });

