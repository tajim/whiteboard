<?php
/**
 * Template part for displaying hotenews on homepage.
 *
 * @package setopati
 */
?>

<div class="clearfix"></div>		
        
				<?php     
					// run query
					$the_query_wide = get_transient($cat_transient_var);					
					if (!$the_query_wide) {					
							$query_args = array(
							'post_type' => 'post',
							'posts_per_page' => 12,
							'no_found_rows' => true,
							'cat' => array($catid),
							'newsposition' => $newsposition,
							);          
						$the_query_wide = new WP_Query( $query_args );
						set_transient($cat_transient_var, $the_query_wide, 60*60*12); // set transient for 12 hours
					}												                  
					$majorposts_wide = $the_query_wide->posts;					
				?>                            		        
		        
                    <div class="major-news clearfix">
                            <div class="title-box">
                            <h1><?php echo esc_html($cattitle); ?><a href="<?php echo esc_url($caturl); ?>" class="thapnews">थप समाचार</a></h1>
                            <?php
                            if ($subtitle) {
                                echo '<p class="sub_category_title">' .$subtitle. '</p>';
                            }
                            ?>         
                            </div>
                            <div class="major-news-style" id="ghumfir">                              
                            <?php 
                            $sliced_array_wide = array_slice($majorposts_wide, 0, 1);
                            foreach($sliced_array_wide as $post) { ?>  
                                                        
                              <div class="featured">
                                <h2><a href="<?php echo esc_url( get_permalink( $post->ID )); ?>"><?php echo esc_html($post->post_title); ?></a></h2>
                                <p class="news_author">
                                <span>
                                  <?php  
                                  $byline = get_field('byline', $post->ID);
                                  echo esc_html($byline);
                                  ?>
                                </span>
                                </p>
								<center><a href="<?php echo esc_url( get_permalink( $post->ID )); ?>"><?php echo get_the_post_thumbnail( $post->ID, 'setopati-single-content', array( 'class' => 'img-responsive' ) ); ?></a></center>
                              </div>
                              
                            <?php } ?>                                              
                              
                                <ul>
								<?php 
                                $sliced_array_wide = array_slice($majorposts_wide, 2, 12);
                                foreach($sliced_array_wide as $post) { ?>                                    
                                  <li><a href="<?php echo esc_url( get_permalink( $post->ID )); ?>"><?php echo esc_html($post->post_title); ?></a></li>
	                            <?php } ?>                                                                                
                                </ul>
                                
                                <div class="small-wrap">
                                <ul>
								<?php 
                                $sliced_array_wide = array_slice($majorposts_wide, 1, 2);
                                foreach($sliced_array_wide as $post) { ?>                                            
                                  <li>
                                    <div class="entry-meta">
                                      <span class="category">
									  <?php
                                        $category_detail=get_the_category($post->ID);//$post->ID
                                        foreach($category_detail as $cd){
										echo "<span class=delterm-" .$cd->slug. ">";
	                                        echo esc_html($cd->cat_name);
										echo "</span>";
                                        }					  
										
                                      ?>                                      
                                      </span>
                                    </div>
                                    <a href="<?php echo esc_url( get_permalink( $post->ID )); ?>">
                                    <center>                                
                                    <div class="post-thumbnail">
                                                <?php
                                                if ( has_post_thumbnail() ) {
                                                    the_post_thumbnail( 'setopati-widget-big', array( 'class' => 'img-responsive' )  );
                                                } 
                                                else {
                                                ?>
                                                <img src="<?php echo get_template_directory_uri(); ?>/img/defaultimg.png" class="img-responsive wp-post-image" alt="">                                
                                                <?php } ?>
                                    </div>                                
                                    </center>                      
                                    </a>                                                                      
                                    <h2 class="entry-title"><a href="<?php echo esc_url( get_permalink( $post->ID )); ?>"><?php echo esc_html($post->post_title); ?></a></h2>
                                    <br />
                                  </li>
	                            <?php } ?>                                                                                                                  
                                </ul>
                              </div>
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
                <?php wp_reset_postdata(); ?>                                                      