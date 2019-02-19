<?php
/**
 * Jacket Ad for Homepage only
 *
 * @package setopati
 */
$jacket_single_image = get_field('innerpage_jacket_image', 'option'); 
$jacket_single_url = get_field('innerpage_jacket_url', 'option'); 
?>
<?php 
//if ( ! is_user_logged_in() ) {
if ($jacket_single_image) { ?>
<script type="text/javascript">
function showIt() {
  document.getElementById("singlejacket").style.visibility = "hidden";
}
setTimeout("showIt()", 5000); // after 1 sec
</script>
<style>
/* jacket css */
.introduction {
background-color:#FFF;
position:absolute;
width:90%;
height:100%;
z-index:10000;
overflow:hidden;
}
.introduction .shade {
  background-color: #fff;
  margin-left:50px;
}
.introduction .shade .container .row {
  position: relative;  
  height: 100%;
}
.introduction .shade .container .row .header {
  position: relative;
  top: 20%;
  -webkit-transform: translateY(-50%);
  transform: translateY(-50%);
}
.introduction .shade .container .row button {
  font-size: 0.9em;
  padding: 8px 25px;
  background-color: #33c3f0;
  border-color: #33c3f0;
}
</style>
<div class="introduction" id="singlejacket">
  <div class="shade">
  <div class="container">
  <div class="row">
  <div class="col-xs-12 text-center header">


            <div class="" id="singlejacketModal1">
            <center>
                  <a target="_blank" href="<?php echo esc_url($jacket_single_url); ?>"><img style="margin-top:65px;" src="<?php echo esc_url($jacket_single_image); ?>" class="aligncenter img-responsive" /></a>
			</center>                    
            </div><!-- /.modal -->
			  <center><button href="#closeMofo" class="btn btn-default skipbtn" style="background-color:#FF6600; border-radius:4px;color:#fff;padding:8px 25px;border:none;font-size:22px;margin-top:15px;">Skip Ad</button></center>

  </div>
  </div>
  </div>
  </div>
</div>
            <?php 
                }
            //}
            ?>
