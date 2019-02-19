<?php
/**
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package setopati
 */

				
				$country_code = $_SERVER["HTTP_CF_IPCOUNTRY"]; // to access in PHP
				
    			if ($country_code == 'AU'){
    			$catid = "51"; ?>
				<center><a href="http://www.experteducation.com.au/"><img style="margin-bottom:15px;" src="http://setopati.com/wp-content/uploads/2017/11/AD_V2_IMAGE.gif" class="img-responsive" /></a></center>
                <?php								
				include(locate_template('template-parts/content-location.php')); // global bishesh category				
				}
				if ($country_code == 'US'){
    			$catid = "49"; 
				include(locate_template('template-parts/content-location.php')); // global bishesh category
				}
