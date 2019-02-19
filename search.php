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

get_header('archive'); ?>
    <!-- main container -->
    <div class="container">
      <!-- row -->
      <div class="row">
        <!-- right side -->
        <div class="col-md-12 site-main">
          <div class="kinmel-anubhav clearfix">
            <div class="right-panel si-po" id="category_page">
              <div class="row">
                
						<div class="title-box">
							<h1 class="page-title"><?php printf( __( '%s', 'twentyfifteen' ), get_search_query() ); ?></h1>                                            
                        </div>                
                  
	                <?php setopati_pagination(); ?>                  
                  
						<?php								
						
                            if ( have_posts() ) :
                    
								//echo "<ul class='items'>";
								
							  //Set the counter to 1
							  $i = 1;								
							
                                /* Start the Loop */
                                while ( have_posts() ) : the_post();
                    
                                    /*
                                     * Include the Post-Format-specific template for the content.
                                     * If you want to override this in a child theme, then include a file
                                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                     */
								  if($i % 4 == 0) {
								  	$lastclass = "lastclass";
								}
						?>


                                      <div id="<?php if ($i % 4 == 1){echo 'alpha';}else if ($i % 4 == 0){echo 'omega';} ?>" <?php post_class('col-lg-3 col-sm-6 col-sm-12 col-xs-12 latest_post'); ?>>                                        
                                        <?php
                                        if (in_category( array(95,7,8) )) {					
                                        ?>                                        
                                        <div class="post-thumbnail">
                                            <a href="<?php the_permalink(); ?>">
                                            <?php
                                            $authorimage = get_field('author_photo'); 
                                            $authorbyline = get_field('byline'); 						
                                            if ($authorimage) {
                                                echo wp_get_attachment_image( $authorimage, array('111', '111'), "", array( "class" => "img-responsive bichar-img" ) );						
                                            }
                                            ?>
                                            </a>
                                        </div>                        
                                        <?php 
                                        }                    
                                        else {
                                        ?>
                                        <div class="post-thumbnail">
                                                 <a href="<?php the_permalink(); ?>">
                                                    <?php
                                                    if ( has_post_thumbnail() ) {
                                                        the_post_thumbnail( 'setopati-widget-big', array( 'class' => 'img-responsive' )  );
                                                    } 
                                                    else {
                                                    ?>
                                                    <img src="<?php echo get_template_directory_uri(); ?>/img/defaultimg.png" class="img-responsive wp-post-image" alt="">                                
                                                    <?php } ?>
                                                </a>                            
                                        </div>
                                        <?php } ?>    
                                            
                                            <header class="entry-header">
                                                <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>                            
                                            </header>
                                        </div>

								<?php
									
								  // After 3 close the row div and open a new one
								  if($i % 4 == 0) {echo '<div class="clearfix1"></div>';}									
                    
                                $i++; endwhile;

								//echo "</ul>";			
								
								echo "<div class='clearfix'></div>";					
								
                    
                            else :
                    
                                get_template_part( 'template-parts/content', 'none' );
                    
                           endif; 
                       ?>                                                     

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