<?php
/**
 * Template part for displaying hotenews on homepage.
 *
 * @package setopati
 */
 
$triple_ad_img = get_field('special_template_ad_image', 'option');
$triple_ad_url = get_field('special_template_ad_url', 'option');
?>



        <div class="block-ad1">
			<center><?php if ($triple_ad_img) { ?><a target="_blank" href="<?php echo esc_url($triple_ad_url); ?>"><img class="aligncenter img-responsive" src="<?php echo esc_url($triple_ad_img); ?>" alt=""></a><?php } ?></center>            
        </div>                                                        
		<div class="clearfix"></div>   
        

		<?php $triplehotnews_label = get_field('triple_hot_news_title', 'option');
			if ($triplehotnews_label) { ?>
            <div class="header-labels">
            <h2><?php echo esc_html($triplehotnews_label); ?></h2>
           </div>
       <?php } ?>


      <!-- kinmel anubhav -->
      <div class="kinmel-anubhav clearfix header-news-box-3">
        <div class="right-panel">
          <div class="row">
            <ul>

				<?php
				$the_query_triple_hotnews = get_transient('triplehotnewstran');				
				if (!$the_query_triple_hotnews) {					
					$query_args = array(
					'post_type' => 'post',
					'posts_per_page' => 3,
					'no_found_rows' => true,
					'newsposition' => 'triple-hot-news',
//					'meta_key'		=> 'hompage_news_section',
//					'meta_value'	=> 'triple_hotnews'
					);
					$the_query_triple_hotnews = new WP_Query( $query_args );
					set_transient('triplehotnewstran', $the_query_triple_hotnews, 60*60*12); // set transient for 12 hours
				}
				$triple_hotnews_posts = $the_query_triple_hotnews->posts;						                										
				  //Set the counter to 1				  
				  $i = 1;
				$sliced_array_triple_hot_news = array_slice($triple_hotnews_posts, 0, 3);
				foreach($sliced_array_triple_hot_news as $post) {
				?> 
              <li>
              <?php
			  echo get_post_meta ('hompage_major_news_category', true);
			  ?>
                <div class="post-thumbnail">
                    <a href="<?php echo get_permalink(); ?>">
                        <?php
                        if ( has_post_thumbnail( $post->ID ) ) {
                            the_post_thumbnail( 'setopati-content', array( 'class' => 'img-responsive' )  );
                        }
						else {
						?>
						<img src="<?php echo get_template_directory_uri(); ?>/img/defaultimg.png" class="img-responsive" alt="">                                
                        <?php } ?>
                    </a>
                </div>                
                
                <header class="entry-header">
					<h2 class="entry-title">                    
                    	<a href="<?php echo esc_url( get_permalink( $post->ID )); ?>"><?php echo esc_html($post->post_title); ?></a>                                                
					</h2>                    
                </header>
              </li>
				<?php
			  // After 3 close the row div and open a new one
			 	 if($i % 3 == 0) {echo '<div class="clearfix"></div>';}
				$i++; 
				 } ?>   		


            </ul>
          </div>
          <!-- <a class="read_more" href="#">?? ????????</a> -->
        </div>
      </div>
      <!-- end kinmel anubhav -->
		<div class="clearfix"></div>   