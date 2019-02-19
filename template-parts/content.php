<?php
/**
 * Template part for displaying content on index.
 *
 * @package setopati
 */
?>

                   
                    <li id="post-<?php the_ID(); ?>" <?php post_class('latest_post'); ?>>                    
                    
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
                                    the_post_thumbnail( 'setopati-content', array( 'class' => 'img-responsive' )  );
                                } 
								else {
								?>
								<img src="<?php echo get_template_directory_uri(); ?>/img/defaultimg.png" class="img-responsive wp-post-image" alt="">                                
                                <?php } ?>
                            </a>                            
	                </div>
                    <?php } ?>    
                        
    	                <header class="entry-header">
							<?php 
							if ( in_category('photo-gallery') ) { ?>
                                <h2 class="entry-title">
                                <a href="<?php echo esc_url( get_permalink() ); ?>">                                                  
                                <?php 			  
                                do_action('setopati_published_date_gallery');
                                echo " का तस्वीरहरु";
                                ?>
                                </a>
                                </h2>                            
							<?php
							}
							else {
							the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); 
							} 
                            ?>
            	        </header>
                    </li>