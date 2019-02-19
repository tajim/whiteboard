<?php
/**
 * Jacket Ad for Homepage only
 *
 * @package setopati
 */
$jacket_home_image = get_field('homepage_jacket_ad_image', 'option'); 
$jacket_home_image_mobile = get_field('homepage_jacket_ad_image_mobile', 'option'); 
$jacket_home_url = get_field('homepage_jacket_ad_url', 'option'); 
?>
<?php if ($jacket_home_image) { ?>
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
			      <a target="_blank" href="<?php echo esc_url($jacket_home_url); ?>"><img style="margin-top:0px; height:auto;" src="<?php echo esc_url($jacket_home_image); ?>" class="aligncenter img-responsive" /></a>                  
			</center>                    
            </div><!-- /.modal -->


  </div>
  </div>
  </div>
  </div>
</div>


<?php  if ($jacket_home_image_mobile) { ?>
<div class="introduction mobilehomejacket" id="singlejacketmobile" style="padding-top:0px; height:4800px !important; overflow:hidden;">
  <div class="shade">
  <div class="col-xs-12 text-center header" style="top:0%;">

           
            <div id="singlejacketModal1" style="max-width:1070px; margin:auto;">
            <center>                              
               
		          <img src="http://setopati.com/wp-content/themes/setopati/img/logo-home-final.jpeg" style="max-width:200px; height:auto; display:block;" />
                <div style="clear:both;"></div>
                <center>
                <a target="_blank" href="<?php echo esc_url($jacket_home_url); ?>"><img style="margin-top:0px; height:auto;" src="<?php echo esc_url($jacket_home_image_mobile); ?>" class="aligncenter img-responsive" /></a>
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
