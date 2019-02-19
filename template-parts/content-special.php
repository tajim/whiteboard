<?php
/**
 * Template part for displaying hotenews on homepage.
 *
 * @package setopati
 */
?>

 <!-- featured news 2 -->
      <div class="header-news-box-2 clearfix">
        <div class="header-news-wrap">

				<?php $special_label = get_field('special_category_name', 'option');			   
                    if ($special_label) { ?>
                  <header>
                    <div class="entry-meta">
                      <span class="category">
                            <?php echo esc_html($special_label); ?>
                      </span>
                    </div>
                  </header>
               <?php } ?>
          
  
				<?php     
				$the_query_press_news = get_transient('pressnews');				
				if (!$the_query_press_news) {													        
					$query_args = array(
					'post_type' => 'post',
					'posts_per_page' => 9,
					'no_found_rows' => true,
					'cat' => '4',
					);              
					$the_query_press_news = new WP_Query( $query_args );
					set_transient('pressnews', $the_query_press_news, 60*60*12); // set transient for 12 hours					              
				}					
				$press_news_posts = $the_query_press_news->posts;						
				
				$i = 1; 	//Set the counter to 1 

				$sliced_array_press_news = array_slice($press_news_posts, 0, 9);
				foreach($sliced_array_press_news as $post) {
				?>
                
				<?php if ( $i == 1 || $i == 2 || $i == 3 ) { ?>                
                <div class="col-md-4 col-sm-12 col-xs-12 news-wraper">
                    <ul>
                        <li>
                            <div class="post-thumbnail">
                                <a href="<?php echo get_permalink(); ?>">
                                    <?php
                                    if ( has_post_thumbnail() ) {
                                        the_post_thumbnail( 'setopati-content', array( 'class' => 'img-responsive' )  );
                                    }
                                    else {
                                    ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/defaultimg.png" class="img-responsive" alt="">                                
                                    <?php } ?>
                                </a>
                            </div>                            
                            <header class="entry-header">
								<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
                            </header>
                        </li>
                    </ul>
                </div>
                <?php } 
				else {
				?>        
                <div class="col-md-4 col-sm-12 col-xs-12 news-wraper">
                    <ul class="line-list">
                      <li><?php the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' ); ?></li>
                    </ul>  
                </div>
                <?php } ?>                
				<?php 
			  // After 3 close the row div and open a new one
			  if($i % 3 == 0) {echo '<div class="clearfix"></div>';}																	
				$i++; ?>
                <!-- end of the loop -->                            
				<?php } ?>          
          
        </div>
      </div>
      <!-- end featured news 2 -->
      
		<div class="clearfix"></div>    