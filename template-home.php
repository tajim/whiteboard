<?php
/**
 * Template Name: Homepage
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package setopati

 */

//include(locate_template('jacket/jackethome.php')); // bishes custom fields from rajniti and samaj catgeory only
get_header();
$bisesh_one_img = get_field('bishesh_ad_image', 'option');
$bisesh_one_url = get_field('bishesh_ad_url', 'option');
?>
  <!-- Site Overlay -->
  <div class="site-overlay"></div>  

    
<?php

        $homepagegallery_ed = get_field('homepage_header_gallery', 'option');
        if ($homepagegallery_ed) {
  				$catid = "69";
  				$cattitle = "फोटो";
  				$subtitle = "ग्यालरी";
  				$cat_transient_var = 'photogallery';
          echo '<div class="container topplace">';
//  				include(locate_template('template-parts/content-gallery.php')); //photo gallery
          echo '</div>';
        }

?>

    <!-- main container -->
    <div class="container">
    
	<?php //get_template_part( 'section', 'location' ); ?>      
    

			   <?php
			  	 $home_layouts = get_field('layouts', 'option');
					if( $home_layouts ) {
					 foreach($home_layouts as $key=>$value) {
						get_template_part( 'template-parts/content', $value );
					 }
					}
			   ?>

               <div class="clearfix"></div>
				<center><?php if ($bisesh_one_img) { ?><a target="_blank" href="<?php echo esc_url($bisesh_one_url); ?>"><img class="aligncenter img-responsive" src="<?php echo esc_url($bisesh_one_img); ?>" alt=""></a><?php } ?></center>
                <br />
               <div class="clearfix"></div>    
               
             

       </div>     
       
<?php 
//$homepageindia_ed = get_field('homepage_india_news', 'option');
//if ($homepageindia_ed) {
//	 get_template_part( 'codelibrary/coverstory', 'india' ); 
//}
?>           
              

    <div class="container">
      <!-- row -->
      <div class="row">
        <!-- right side -->
        <div class="col-md-9 site-main">
		     <?php
				$catid = "908";
//				$newsposition = "rajniti-samaj-bisesh";
				$cattitle = "विशेष";
				$caturl = "https://setopati.com/politics";
				$subtitle = "";
				$cat_transient_var = 'rajnitibishes';
				$adimage = 'bishesh_block_image';
				$adurl = 'bishesh_block_url';
				include(locate_template('template-parts/content-layoutmajor.php')); // bishes custom fields from rajniti and samaj catgeory only

				$catid = "2,3";
				$newsposition = "rajniti-samaj-bisesh";
				$cattitle = "समाचार";
				$caturl = "https://setopati.com/social";				
				$subtitle = "";
				$exclude = "908";
				$blockid = "only-news";
				$cat_transient_var = 'rajnitisamachar';
				$adimage = 'bishesh_samachar';
				$adurl = 'bishesh_samachar_url';
				include(locate_template( 'template-parts/content-onlynews.php' ));  // non bishes custom fields from rajniti and samaj catgeory only				
				?>
                
            
                
                <?php

				$homepagegallery_ed = get_field('homepage_header_gallery', 'option');
				if ( ! $homepagegallery_ed) {
						$catid = "69";
						$caturl = "https://setopati.com/photo-gallery";										
						$cattitle = "फोटो";
						$subtitle = "ग्यालरी";
						$cat_transient_var = 'photogallery';
				  echo '<div class="insidecontentgallery">';
						include(locate_template('template-parts/content-gallery.php')); //photo gallery
				  echo '</div>';
				}
				
				$catid = "13";
				$newsposition = "kinmel-bisesh";
				$cattitle = "किनमेल";
				$caturl = "https://setopati.com/kinmel";
				$subtitle = "विशेष";
				$cat_transient_var = 'kinmelbishesh';
				$adimage = 'kinmel_image';
				$adurl = 'kinmel_url';
				include(locate_template('template-parts/content-layoutmajor.php')); // bishes custom fields from rajniti and samaj catgeory only				

				$catid = "78";
				$newsposition = "kinmel-bisesh";
				$cattitle = "किनमेल";
				$caturl = "https://setopati.com/kinmel/experience";								
				$subtitle = "अनुभव";
				$cat_transient_var = 'kinmelanubhav';
				$adimage = 'kinmel_anubhav_image';
				$adurl = 'kinmel_anubhav_url';
				include(locate_template( 'template-parts/content-anubhav.php' ));  //kinmel anubhav

				$catid = "13";
				$newsposition = "kinmel-bisesh";				
				$cattitle = "किनमेल";
				$caturl = "https://setopati.com/kinmel";								
				$subtitle = "समाचार";
        		$exclude = "78,908";
				$cat_transient_var = 'kinmelsmachar';
				$adimage = 'kinmel_samachar_image';
				$adurl = 'kinmel_samachar_url';
				$blockid = "";
				//include(locate_template( 'template-parts/content-onlynews.php' ));  //kinmel samachar

				$catid = "11";
				$newsposition = "khelkud-bisesh";
				$cattitle = "खेलकुद";
				$caturl = "https://setopati.com/sports";								
				$subtitle = "";
				$cat_transient_var = 'khelkud';
				$adimage = 'khelkud_image';
				$adurl = 'khelkud_url';
				include(locate_template('template-parts/content-layoutmajor.php')); // khelkud category

				$catid = "14";
				$newsposition = "kala-bisesh";
				$cattitle = "कला";
				$caturl = "https://setopati.com/entertainment";								
				$subtitle = "";
				$cat_transient_var = 'kala';
				$adimage = 'kala_image';
				$adurl = 'kala_url';
				include(locate_template('template-parts/content-layoutmajor.php')); // kala category

				$catid = "15";
				$newsposition = "global-bisesh";
				$cattitle = "ग्लोबल";
				$caturl = "https://setopati.com/global";								
				$subtitle = "";
				$cat_transient_var = 'globalkhabar';
				$adimage = 'global_image';
				$adurl = 'global_url';
				include(locate_template('template-parts/content-layoutmajor.php')); // global bishesh category

				$catid = "12";
				$newsposition = "ghumphir-bisesh";
				$cattitle = "घुमफिर";
				$caturl = "https://setopati.com/ghumphir";								
				$subtitle = "विशेष";
				$cat_transient_var = 'ghumphir';
				$adimage = 'ghumphir_image';
				$adurl = 'ghumphir_url';
				include(locate_template( 'template-parts/content-layoutmajor-wide.php' ));  //ghumphir wide samachar

				$catid = "25";
				$newsposition = "ghumphir-bisesh";
				$cattitle = "घुमफिर";
				$caturl = "https://setopati.com/ghumphir/ghumphir-experience";								
				$subtitle = "अनुभव";
				$cat_transient_var = 'ghumphiranubhav';
				$adimage = 'ghumphir_anubhav_image';
				$adurl = 'ghumphir_anubhav_url';
				include(locate_template( 'template-parts/content-anubhav.php' ));  //ghumphir anubhav samachar	

		   ?>



        </div>
    	<?php get_sidebar(); ?>


          </div>
        </div>

<?php
//$catid = "77";
//$cattitle = "भिडीयो";
//$subtitle = "ग्यालरी";
//$cat_transient_var = 'videogallery';
if ( is_front_page() ) {
//	include(locate_template('template-parts/content-video.php')); // bishes custom fields from rajniti and samaj catgeory only
}
?>
<?php
get_footer();
?>
