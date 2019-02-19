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

get_header(); ?>
    <!-- main container -->
    <div class="container">
      <!-- row -->
      <div class="row">
        <!-- right side -->
        <div class="col-md-12 site-main">
          <div class="kinmel-anubhav clearfix">
            <h3 class="category_title">/fhgLlt</h3>
            <div class="right-panel si-po" id="category_page">
              <div class="row">
                <ul>
                  
						<?php
                            if ( have_posts() ) :
                    
								echo "<ul>";
								
							  //Set the counter to 1
							  $i = 1;								
							
                                /* Start the Loop */
                                while ( have_posts() ) : the_post();
                    
                                    /*
                                     * Include the Post-Format-specific template for the content.
                                     * If you want to override this in a child theme, then include a file
                                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                     */
                                    get_template_part( 'template-parts/content' );
									
								  // After 3 close the row div and open a new one
								  if($i % 4 == 0) {echo '<div class="clearfix"></div>';}									
                    
                                $i++; endwhile;

								echo "</ul>";			
								
								echo "<div class='clearfix'></div>";					
								
								setopati_pagination();
								
								
                    
                            else :
                    
                                get_template_part( 'template-parts/content', 'none' );
                    
                           endif; 
                       ?>                                                     

                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- end right side -->
      </div>
      <!-- end row -->
    </div>
    <!-- end main container -->

<?php get_footer(); ?>