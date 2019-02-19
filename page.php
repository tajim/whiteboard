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

get_header('single'); ?>
    <!-- main container -->
    <div class="container">
      <!-- row -->
      <div class="row">
        <!-- right side -->
        <div class="col-md-9 site-main" id="post-single">               
        
			<?php
                while ( have_posts() ) : the_post();
        	
                    get_template_part( 'template-parts/content', 'page' );
        
                endwhile; // End of the loop.
            ?>          
        <!-- end right side -->
	    </div>
        <!-- left side -->
    	<?php get_sidebar(); ?>             
        <!-- end left side -->
      </div>
      <!-- end row -->
    </div>
    <!-- end main container -->

<?php get_footer(); ?>