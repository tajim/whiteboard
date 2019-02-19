<?php
/**
 * Template part for displaying hotenews on homepage.
 *
 * @package setopati
 */
?>

<div class="only-news clearfix" id="only-news">
                <div class="title-box">
                    <h1><?php echo esc_html($cattitle); ?><a href="<?php echo esc_url($caturl); ?>" class="thapnews">थप समाचार</a></h1>
                    <?php
                    if ($subtitle) {
                        echo '<p class="sub_category_title">' .$subtitle. '</p>';
                    }
                    ?>
                </div>

				<?php
					// run query
					$the_query_news = get_transient($cat_transient_var);
					if (!$the_query_news) {
						$query_args = array(
							'post_type' => 'post',
							'posts_per_page' => 9,
							'no_found_rows' => true,
							'cat' => array($catid),
							'category__not_in' => $exclude,																			
							'orderby' => 'date',
							'order' => 'DESC',							
							'date_query' => array(
								array(
									'after' => '1 week ago'
								)
							),							
						);
						$the_query_news = new WP_Query( $query_args );
						set_transient($cat_transient_var, $the_query_news, 60*60*12); // set transient for 12 hours
					}
					$onlynewsposts = $the_query_news->posts;
				?>


                <div class="right-panel">
                  <div class="row">


					<?php
                    $sliced_array_news = array_slice($onlynewsposts, 0, 3);
					$i = 0;
                    foreach($sliced_array_news as $post) {
					$i++;
					?>
                    <div class="col-md-4 col-sm-6 news-wraper">
                      <ul>
                        <li>
                          <div class="post-thumbnail">
                              <a href="<?php echo esc_url( get_permalink( $post->ID )); ?>">
                                      <?php
                                      if ( has_post_thumbnail($post->ID) ) {
                                          echo get_the_post_thumbnail( $post->ID, 'setopati-content', array( 'class' => 'img-responsive' ) );
                                      }
					                          else {
    								               ?>
      								             <img src="<?php echo get_template_directory_uri(); ?>/img/defaultimg.png" class="img-responsive wp-post-image" alt="">
                                  <?php } ?>
                              </a>
      	                 </div>
                          <header class="entry-header">
                            <span class="category  hidden-xs">
                                  <?php
                                    $category_detail=get_the_category($post->ID);//$post->ID
                                    foreach($category_detail as $cd){
										echo "<span class=delterm-" .$cd->slug. ">";
	                                        echo esc_html($cd->cat_name);
										echo "</span>";
                                    }
                                  ?>
                            </span>
                           <h2 class="entry-title"><a href="<?php echo esc_url( get_permalink( $post->ID )); ?>"><?php echo esc_html($post->post_title); ?></a></h2>
                          </header>
                        </li>
                      </ul>
                    </div>
					<?php
                    if ( $i % 3 == 0 ) {
                    echo "<div class='clearfix'></div>";
                    }
					}
					?>
					<?php
                    $sliced_array_news = array_slice($onlynewsposts, 3, 9);
					$c = 0;
                    foreach($sliced_array_news as $post) {
					$c++;
					?>
                    <div class="col-md-4 col-sm-6 news-wraper">
                      <ul class="line-list">
                        <li><a href="<?php echo esc_url( get_permalink( $post->ID )); ?>"><?php echo esc_html($post->post_title); ?></a></li>
                      </ul>
                    </div>
                    <?php
                    if ( $c % 3 == 0 ) {
                    echo "<div class='clearfix'></div>";
                    }
					}
					?>

                </div>
                <a class="read_more" href="#">थप सामाग्री</a>
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

                <?php wp_reset_postdata();
				//unset( $onlynewsposts );								
				 ?>
