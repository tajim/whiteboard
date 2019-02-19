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
					// run query
					$the_query_anubhav = get_transient($cat_transient_var);					
					if (!$the_query_anubhav) {					
						$query_args = array(
							'post_type' => 'post',
							'posts_per_page' => 3,
							'no_found_rows' => true,
							'category__in' => array($catid),
							'tax_query' => array(
								array(
									'taxonomy' => 'newsposition',
									'field'    => 'slug',
									'terms'    => $newsposition,
									'operator' => 'NOT IN',
								),
							),							
							
						);          
						$the_query_anubhav = new WP_Query( $query_args );
						set_transient($cat_transient_var, $the_query_anubhav, 60*60*12); // set transient for 12 hours
					}												                  
					$anubhavposts = $the_query_anubhav->posts;					
				?>      
                
					<?php 
                    foreach($anubhavposts as $post) { 
					?>
                    <li>
                      <div class="post-thumbnail">
						  <?php $author_image = get_field('author_photo', $post->ID); ?>
                          <center>
	                      <a href="<?php echo esc_url( get_permalink( $post->ID )); ?>">
							<?php if ($author_image) { ?>
							<?php echo wp_get_attachment_image( $author_image, 'setopati-widget-small', "", array( "class" => "img-responsive bichar-img" ) );  ?>                          
                            <?php 
							} 
							else { ?>
							<img style="max-width:110px;" src="<?php echo get_template_directory_uri(); ?>/img/defaultimg.png" class="img-responsive wp-post-image" alt="">                                                            
                            <?php } ?>                            
                          </a>
                          </center>
                          
                      </div>
                      <header class="entry-header text-center">
                        <span class="category cat-bichar">
						  <?php  
                          $byline = get_field('byline', $post->ID);
                          echo esc_html($byline);
                          ?>
                        </span>
                        <h2 class="entry-title entry-bichar"><a href="<?php echo esc_url( get_permalink( $post->ID )); ?>"><?php echo esc_html($post->post_title); ?></a></h2>
                      </header>
                    </li>
					<?php } ?>                                           
                    
                  </ul>
                </div>
					<?php $category_link = get_category_link( $catid );	?>
                    <a class="read_more" href="<?php echo esc_url($category_link); ?>"><?php echo esc_html('थप सामाग्री', 'setopati'); ?></a>
		<?php 
        $imageurl = get_field($adimage, 'option');
        $linkurl = get_field($adurl, 'option');				
        if ($imageurl) { 
        ?>
        <div class="clearfix"></div>
        <div class="block-ad">
            <a target="_blank" href="<?php echo esc_url($linkurl); ?>"><img class="aligncenter img-responsive" src="<?php echo esc_url($imageurl); ?>" alt=""></a>
        </div>
        <?php } ?>                      
            </div>
             
          </div>