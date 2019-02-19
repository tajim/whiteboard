<?php
/**
 * Template part for displaying hotenews on homepage.
 *
 * @package setopati
 */
 
if ($catid == '14') {
$kalaclass = "kala";
}
else {
$kalaclass = "nokala";
}
?>

				<?php     
					// run query
					$the_query = get_transient($cat_transient_var);					
					if (!$the_query) {					
						$query_args = array(
						'post_type' => 'post',
						'posts_per_page' => 12,
						'no_found_rows' => true,
						'cat' => array($catid),
						'newsposition' => $newsposition,
						
						/*
						'meta_query' => array(
						   'relation' => 'AND',
							array(
							 'key' => 'hide_on_homepage',
							 'value' => '0' 
							),
							array(
							 'key' => 'special',
							 'value' => '1'
							)
						),
						*/
						);          
						$the_query = new WP_Query( $query_args );
						set_transient($cat_transient_var, $the_query, 60*60*12); // set transient for 12 hours
					}												                  
					$majorposts = $the_query->posts;					
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
                        <div class="major-news-style <?php echo $kalaclass; ?>">
                          <ul>
            
                            <?php 
                            $sliced_array_one = array_slice($majorposts, 0, 1);
                            foreach($sliced_array_one as $post) { ?>
                            <li>
                            <center>
                                <a href="<?php echo esc_url( get_permalink( $post->ID )); ?>"><?php echo get_the_post_thumbnail( $post->ID, 'setopati-content', array( 'class' => 'img-responsive' ) ); ?></a>
                            </center>
                              <header>
                                <div class="entry-meta">
                                  <span class="category" id="category-font">
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
                                <h3 class="entry-title"><a href="<?php echo esc_url( get_permalink( $post->ID )); ?>"><?php echo esc_html($post->post_title); ?></a></h3>
                                <div class="entry-footer">
                                  <p>
                                  <span>
                                  <?php  
                                  $byline = get_field('byline', $post->ID);
                                  echo esc_html($byline);
                                  ?>
                                  </span>
                                  </p>
                                </div>
                              </header>
                            </li>
                            <?php } ?>                
                            
                            <li class="noborder">
                            <div class="small-wrap hidden-lg hidden-md">                
                              <ul>
                            <?php 
                            $sliced_array_two = array_slice($majorposts, 1, 4);
                            foreach($sliced_array_two as $post) { ?>                    
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
                                </li>
                            <?php } ?>                                    
                              </ul>
                            </div>
                            </li>
            
                            <?php 
                            $sliced_array_three = array_slice($majorposts, 5, 12);
                            foreach($sliced_array_three as $post) { ?>                                    
                            <li><a href="<?php echo esc_url( get_permalink( $post->ID )); ?>"><?php echo esc_html($post->post_title); ?></a></li>                
                            <?php } ?>                                                    
                            
                          </ul>
                          <div class="small-wrap">
                            <ul>
            
                            <?php 
                            $sliced_array_four = array_slice($majorposts, 1, 4);
                            foreach($sliced_array_four as $post) { ?>                                                     
                            <li class="noborder">
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
                      
			<?php 
            wp_reset_postdata(); 
            //unset( $majorposts );								
            ?>                                                                  