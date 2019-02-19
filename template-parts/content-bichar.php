<?php
/**
 * Template part for displaying bichar on homepage.
 *
 * @package setopati
 */
?>

<div class="kinmel-anubhav clearfix">
              <div class="title-box">
                    <h1><?php echo esc_html($cattitle); ?></h1>
                    <?php
                    if ($subtitle) {
                        echo '<p class="sub_category_title">' .$subtitle. '</p>';
                    }
                    ?>           
              </div>
              <div class="right-panel">
                <div class="row">
                  <ul id="bichar-top">
                    
                    
				<?php     
				$query_args = array(
				'post_type' => 'post',
				'no_found_rows' => true,
				'posts_per_page' => 3,
				'cat' => $catid,
				'meta_query' => array(
				   'relation' => 'AND',
					array(
					 'key' => 'hide_on_homepage',
					 'value' => '0' 
					),
				),				
                );                            
                $the_query = new WP_Query( $query_args ); ?>                            
                <?php if ( $the_query->have_posts() ) : ?>                            
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>                           
                    <li>
                      <div class="post-thumbnail">
                        <a href="<?php echo the_permalink(); ?>">
                        <?php
						$authorimage = get_field('author_photo'); 
						$authorbyline = get_field('byline'); 						
						if ($authorimage) {
							echo wp_get_attachment_image( $authorimage, array('111', '111'), "", array( "class" => "img-responsive bichar-img" ) );						
						}
						?>
                        </a>
                      </div>
                      <header class="entry-header text-center">
                        <span class="category cat-bichar"><?php echo esc_html($authorbyline); ?></span>
						<?php the_title( '<h2 class="entry-title entry-bichar"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>                        
                      </header>
                    </li>                                        
				<?php endwhile; ?>                
                <?php wp_reset_postdata(); ?>                            
                <?php else:  ?>
                <?php endif;   ?>                     
                    
                  </ul>
                </div>
              <a class="read_more" href="#">थप विचार</a>
            </div>
          </div>