<?php
/**
 * Template part for displaying gallery on homepage.
 *
 * @package setopati
 */
$special_one_img = get_field('special_ad_one_image', 'option');
$special_one_url = get_field('special_ad_one_url', 'option');
?>

			<?php $gallery_label = get_field('slidershow_title', 'option');
			if ($gallery_label) { ?>
            <div class="header-labels">
            <h2><?php echo esc_html($gallery_label); ?></h2>
      			</div>
       <?php } ?>

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
                $the_query = get_transient($cat_transient_var);
                if (!$the_query) {
                    $query_args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 1,
					'no_found_rows' => true,
                    'cat' => $catid,
                    );
                    $the_query = new WP_Query( $query_args );
                    set_transient($cat_transient_var, $the_query, 60*60*12); // set transient for 12 hours
                }
                $galleryposts = $the_query->posts;

				$sliced_array_gallery = array_slice($galleryposts, 0, 1);
				foreach($sliced_array_gallery as $post) {
				$postid = $post->ID;
				$images = get_field('photo-gallery');
			?>

                    <div class="no-gutter first-slider">
                    <div class="owl-carousel owl-theme">

                            <?php
                            if( $images ):
                            $count = 0;
                            foreach( $images as $image ):
                            $count++;
                             ?>
                              <div>
                              <a href="<?php echo get_permalink(); ?>">
                              <div class="bgoverlay" style="background-image:url(<?php echo $image['sizes']['setopati-photo-slider']; ?>);"></div>
                              </a>
                                <h3><?php echo $image['caption']; ?></h3>
                              </div>
                            <?php endforeach; ?>
                            <?php endif; ?>
                    </div>
                    </div>


			<?php } ?>


			<?php wp_reset_postdata(); ?>
	            <div class="clearfix"></div>
				<center><?php if ($special_one_img) { ?><a target="_blank" href="<?php echo esc_url($special_one_url); ?>"><img class="aligncenter img-responsive" src="<?php echo esc_url($special_one_img); ?>" alt=""></a><?php } ?></center>
               <div class="clearfix"></div>
