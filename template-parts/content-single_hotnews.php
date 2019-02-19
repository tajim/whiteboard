<?php
/**
 * Template part for displaying hotenews on homepage.
 *
 * @package setopati
 */
?>

		<?php $singlehotnews_label = get_field('single_hot_news_title', 'option');
			if ($singlehotnews_label) { ?>
            <div class="header-labels">
            	<h2><?php echo esc_html($singlehotnews_label); ?></h2>
           </div>
       <?php } ?>

				<?php
				$the_query_single_hotnews = get_transient('singlehotnewstran');
					if (!$the_query_single_hotnews) {				
						$query_args = array(
						'post_type' => 'post',
						'posts_per_page' => 1,
						'no_found_rows' => true,
						'newsposition' => 'single-hot-news',
//						'tag' => 'breaking',
//						'meta_key'		=> 'hompage_news_section',
//      				'meta_value'	=> 'single_hotnews'
						);
						$the_query_single_hotnews = new WP_Query( $query_args );
						set_transient('singlehotnewstran', $the_query_single_hotnews, 60*60*12); // set transient for 12 hours
					}		
					
								
					$single_hotnews_posts = $the_query_single_hotnews->posts;						                
					?>
                    

					<?php
                    $sliced_array_single_hot_news = array_slice($single_hotnews_posts, 0, 1);
                    foreach($sliced_array_single_hot_news as $post) {
					?>                    
                
                <?php //if ( $the_query->have_posts() ) : ?>
                <?php //while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                      <div class="header-news-box clearfix">
                        <div class="header-news-wrap">
                          <header class="entry-header">
                            <?php //the_title( '<h2 class="entry-title specialmainnews"><a href="' . esc_url( get_permalink( $post->ID ) ) . '" rel="bookmark">', '</a></h2>' ); ?>
							<h2 class="entry-title specialmainnews">
	                            <a href="<?php echo esc_url( get_permalink( $post->ID )); ?>"><?php echo esc_html($post->post_title); ?></a>                            
                            </h2>
                            <center><h3 style="margin-top:15px;" class="entry-title"><?php the_field('subtitle', $post->ID); ?></h3></center>
                              <div class="entry-meta">
                              <?php
                              $subtitle = get_field('news_subtitle', $post->ID);
                              if ($subtitle) {
                              echo "<p>";
                                  echo esc_html($subtitle);
                              echo "</p>";
                              }
                              ?>
                              <?php
                              $byline = get_field('byline', $post->ID);
                            if ($byline) {
                              echo "<p class='auth'>";
                                    echo "-";
                                      echo esc_html($byline);
                              echo "</p>";
                                }
                              ?>
                            </div>
                                    </header>
                                    <center>
                                <a class="post-thumbnail" href="<?php echo get_permalink( $post->ID ); ?>">
                
                                    <?php
                                      if ( has_post_thumbnail( $post->ID ) ) {
                                                                    $homepagegallery_ed = get_field('homepage_header_gallery', 'option');
                                                                    if ( $homepagegallery_ed) {
                                                                        the_post_thumbnail( 'setopati-single-content', array( 'class' => 'img-responsive' )  );
                                                                    }
                                                                    else {
                                                                        the_post_thumbnail( 'setopati-photo-slider', array( 'class' => 'img-responsive' )  );
                                                                    }
                                        }										
                                    ?>
                
                
                
                                </a>
                                </center>
                                <div class="entry-content">
                                    <?php
                                    $summary = get_field('news_summary', $post->ID);
                                    if ($summary) {
                                    ?>
                                    <p><?php echo $summary; ?></p>
                                    <?php } ?>
                                </div>
                        </div>
                      </div>
                      
					<?php } ?>                      

				<?php //endwhile; ?>
                <?php //wp_reset_postdata(); ?>
                <?php //else: ?>
                <?php //endif; ?>


		<div class="clearfix"></div>
  