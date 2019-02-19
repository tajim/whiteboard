<?php
/**
 * Jacket Ad for Homepage only
 *
 * @package setopati
 */
$jacket_single_image = get_field('innerpage_jacket_image', 'option'); 
$jacket_single_small = get_field('innerpage_jacket_image_mobile', 'option'); 
$jacket_single_url = get_field('innerpage_jacket_url', 'option'); 
?>

	<?php 
	if (is_singular('post')) {	
	$featurted_image = wp_get_attachment_image_url(get_post_thumbnail_id( get_the_ID() ), 'setopati-single-content'); 
	if ($featurted_image) {
	$fb_image = $featurted_image;
	}
	else {
	$fb_image = 'https://setopati.com/wp-content/themes/setopati/img/defaultimg.png';	
	}
	?>
	<!-- Social Tags -->

    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="<?php the_title( '', '' ); ?> #NepalVotes #NepalElection2017">
    <meta itemprop="description" content="<?php echo km_get_the_excerpt(get_the_ID()); ?>">
    <meta itemprop="image" content="<?php echo $fb_image; ?>">
    <meta name="description" content="<?php the_title(); ?>">    

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@setopati">
    <meta name="twitter:title" content="<?php the_title( '', '' ); ?> #NepalVotes #NepalElection2017">
    <meta name="twitter:description" content="<?php echo km_get_the_excerpt(get_the_ID()); ?>">
    <meta name="twitter:creator" content="@setopati">
    <meta name="twitter:image:src" content="<?php echo $fb_image; ?>">

    <!-- Open Graph data -->
    <meta property="og:title" content="<?php the_title( '', '' ); ?> #NepalVotes #NepalElection2017" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="<?php the_permalink(); ?>" />
    <meta property="og:image" content="<?php echo $fb_image; ?>" />
    <meta property="og:description" content="<?php echo km_get_the_excerpt(get_the_ID()); ?>" />
    <meta property="og:site_name" content="Setopati" />
    <!-- Social Tags Ends -->   
   
	<script type="text/javascript">
      window._taboola = window._taboola || [];
      _taboola.push({article:'auto'});
      !function (e, f, u, i) {
        if (!document.getElementById(i)){
          e.async = 1;
          e.src = u;
          e.id = i;
          f.parentNode.insertBefore(e, f);
        }
      }(document.createElement('script'),
      document.getElementsByTagName('script')[0],
      '//cdn.taboola.com/libtrc/setopati/loader.js',
      'tb_loader_script');
      if(window.performance && typeof window.performance.mark == 'function')
        {window.performance.mark('tbl_ic');}
    </script>    
          
<?php } ?>

<?php if ($jacket_single_image) { ?>
<script type="text/javascript">
function showIt() {
  document.getElementById("singlejacket").style.visibility = "hidden";
}
setTimeout("showIt()", 10000); // after 1 sec

function showItmobile() {
  document.getElementById("singlejacketmobile").style.visibility = "hidden";
}
setTimeout("showItmobile()", 10000); // after 1 sec
</script>
<style>
/* jacket css */
.introduction {
background-color:#FFF;
position: absolute;
width:100%;
z-index:10000;
overflow:hidden;
padding-top: 200px;
}
.introduction .shade {
  background-color: #fff;
  margin-left:0px;
}
.introduction .shade .container .row {
  position: relative;  
  height: 100%;
}
.introduction .shade .container .row .header {
  position: relative;
  -webkit-transform: translateY(-50%);
  transform: translateY(-50%);
}
.introduction .shade .container .row button {
  font-size: 0.9em;
  padding: 8px 25px;
  background-color: #33c3f0;
  border-color: #33c3f0;
}

/* Large desktops and laptops */
@media (min-width: 1200px) {
.mobilehomejacket {
display:none;
}
.introduction {
height:100%;
}
}

/* Landscape tablets and medium desktops */
@media (min-width: 992px) and (max-width: 1199px) {
.introduction {
height:100%;
}

.mobilehomejacket {
display:none;
}
}

/* Portrait tablets and small desktops */
@media (min-width: 768px) and (max-width: 991px) {
.introduction {
height:100%;
}
.mobilehomejacket {
display:none;
}
}

/* Landscape phones and portrait tablets */
@media (max-width: 767px) {
.desktophomejacket{
display:none;
}
}

/* Portrait phones and smaller */
@media (max-width: 480px) {
.desktophomejacket {
display:none;
}
}

</style>
<div class="introduction desktophomejacket" id="singlejacket" style="margin-top:0px !important;">
  <div class="shade">
  <div class="container">
  <div class="row">
  <div class="col-xs-12 text-center header" style="top: 25%;">

            <div id="singlejacketModal1" style="max-width:1070px; margin:auto;">
		          <img src="http://setopati.com/wp-content/themes/setopati/img/logo-home-final.jpeg" style="max-width:250px; height:auto; display:inline-block; float:left;" />
                  <button href="#closejacket" class="btn btn-default skipbtn" style="background-color:#FF6600; border-radius:4px;color:#fff;padding:8px 25px;border:none;font-size:22px;margin-top:20px; float:right;">Skip Ad</button>                  
                  <div style="clear:both;"></div>
            <center>                  
			      <a target="_blank" href="<?php echo esc_url($jacket_single_url); ?>"><img style="margin-top:0px; height:auto;" src="<?php echo esc_url($jacket_single_image); ?>" class="aligncenter img-responsive" /></a>                  
			</center>                    
            </div><!-- /.modal -->


  </div>
  </div>
  </div>
  </div>
</div>


<?php  if ($jacket_single_small) { ?>
<div class="introduction mobilehomejacket" id="singlejacketmobile" style="padding-top:0px; height:4800px !important; overflow:hidden;">
  <div class="shade">
  <div class="col-xs-12 text-center header" style="top:0%;">

           
            <div id="singlejacketModal1" style="max-width:1070px; margin:auto;">
            <center>                              
               
		          <img src="http://setopati.com/wp-content/themes/setopati/img/logo-home-final.jpeg" style="max-width:200px; height:auto; display:block;" />
                <div style="clear:both;"></div>
                <center>
                <a target="_blank" href="<?php echo esc_url($jacket_single_url); ?>"><img style="margin-top:0px; height:auto;" src="<?php echo esc_url($jacket_single_small); ?>" class="aligncenter img-responsive" /></a>
                <button href="#closejacket" class="btn btn-default skipbtn" style="background-color:#FF6600; border-radius:4px;color:#fff;padding:8px 25px;border:none;font-size:16px;margin-top:0px;">Skip Ad</button>
                    
                    
                </center>

            </div><!-- /.modal -->            

  </div>
  </div>
</div>
<?php 
	}
?>


<?php 
	}
?>
