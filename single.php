<?php
/**
 * The main template file.
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
include(locate_template('jacket/jacket-single.php')); // bishes custom fields from rajniti and samaj catgeory only 
get_header();
$single_taboola_code = get_field('taboola_ad_code', 'option');
?>
    <!-- main container -->
    <div class="container">
      <!-- row -->
      <div class="row">
        <!-- right side -->
        <div class="col-md-9 site-main" id="post-single">


			<?php
                while ( have_posts() ) : the_post();

                    get_template_part( 'template-parts/content', 'single' );

                endwhile; // End of the loop.
            ?>
        <div class="clearfix"></div>
         <?php //get_template_part( 'template-parts/content', 'related' ); ?>
		<div class="clearfix"></div>

            <?php //if ($single_taboola_code) { ?>
				<?php //echo $single_taboola_code; ?>
			<?php //} ?>
            
            <div id="taboola-below-article-thumbnails"></div>
            <script type="text/javascript">
              window._taboola = window._taboola || [];
              _taboola.push({
                mode: 'thumbnails-a',
                container: 'taboola-below-article-thumbnails',
                placement: 'Below Article Thumbnails',
                target_type: 'mix'
              });
            </script>            
            

        </div>
        <!-- end right side -->

        <!-- left side -->
    	<?php 
		get_sidebar('single'); 
		//get_sidebar(); 
		?>
        <!-- end left side -->
      </div>
      <!-- end row -->
    </div>
    <!-- end main container -->
<?php get_footer(); ?>