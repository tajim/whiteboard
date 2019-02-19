<?php
/**
 * Template part for displaying content on single post.
 *
 * @package setopati
 */

$single_belownewstitle_image = get_field('news_title_ad_image', 'option');
$single_belownewstitle_url = get_field('news_title_ad_url', 'option');

$single_belowauthor_image = get_field('below_author_ad_image', 'option');
$single_belowauthor_url = get_field('below_author_ad_url', 'option');

$single_jacket_image = get_field('innerpage_jacket_image', 'option');
$single_jacket_url = get_field('innerpage_jacket_url', 'option');

$single_contetnad_image = get_field('news_content_one_image', 'option');
$single_contentad_url = get_field('news_content_one_url', 'option');

$single_below_content_multiple = get_field('content_end_multiple_ads', 'option');

$jacket_single_image = get_field('innerpage_jacket_image_inside_content', 'option');
$jacket_single_url = get_field('innerpage_jacket_url', 'option');

?>


          <header class="entry-header clearfix">
			<div class="nav-news-title" id="nav-news-title">
              <h2 style=" margin-top:0px;">
              <img src="<?php echo get_template_directory_uri(); ?>/img/no-logo.png?check=yes" />
			  <?php
				$category = get_the_category();
				if ($category) {
					echo esc_html($category[0]->cat_name);
				}
			  ?>
              </h2> <p>|</p> <?php the_title( '<p class="toptitle">', '</p>' ); ?>
                <div class="sharethis_top">
                    <div id="share_top1"></div>
                </div>
            </div>
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            <h3 class="entry-title"><?php the_field('subtitle'); ?></h3>
            <?php if ($single_belownewstitle_image) { ?><a target="_blank" href="<?php echo esc_url($single_belownewstitle_url); ?>"><img class="aligncenter img-responsive" src="<?php echo esc_url($single_belownewstitle_image); ?>" alt=""></a><?php } ?>
            <div class="entry-meta clearfix">
				<div class="news-auth-wrap">
                <?php
				$authorimg = get_field('author_photo');
				if ($authorimg) {
				?>
				<?php echo wp_get_attachment_image( $authorimg, 'setopati-widget-small', "", array( "class" => "img-responsive alignleft" ) );  ?>
                <?php } ?>
                <p class="name"><?php the_field('byline'); ?></p>
                <p class="address">
			     <span class="location">
					<?php the_field('dateline'); ?>
                  </span>
                </p>
              </div>
                <div class="sharethis_jsshare">
				 <div class="setopati-share">
                <ul>
                  <a onclick="return popitup('http://www.facebook.com/sharer.php?s=100&p[url]=<?php the_permalink(); ?>')" href="http://www.facebook.com/sharer.php?s=100&p[url]=<?php the_permalink(); ?>"><li class="fb"><i class="fa fa-facebook" aria-hidden="true"></i></li></a>
                  <a data-text="<?php the_title(); ?>" data-url="<?php the_permalink(); ?>" data-via="setopati" data-related="setopati" data-show-count="false" onclick="return popitup('https://twitter.com/share')" href="https://twitter.com/share"><li class="tw"><i class="fa fa-twitter" aria-hidden="true"></i></li></a>
                  <a onclick="return popitup('https://plus.google.com/share?url=<?php the_permalink(); ?>')" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><li class="gp"><i class="fa fa-google-plus" aria-hidden="true"></i></li></a>
                  <a onclick="return popitup('http://www.linkedin.com/shareArticle?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>')" href="http://www.linkedin.com/shareArticle?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>"><li class="in"><i class="fa fa-linkedin" aria-hidden="true"></i></li></a>
                </ul>
             	 </div>                                                    
                </div>
            </div>
            <?php if ($single_belowauthor_image) { ?><a target="_blank" href="<?php echo esc_url($single_belowauthor_url); ?>"><img class="aligncenter img-responsive" src="<?php echo esc_url($single_belowauthor_image); ?>" alt=""></a><?php } ?>
          </header>

          <article>
            <div class="post-thumbnail clearfix">
				<?php
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail( 'setopati-single-content', array( 'class' => 'img-responsive' )  );
                }
                ?>
				<?php if ( $caption = get_post( get_post_thumbnail_id() )->post_excerpt ) : ?>
                    <p class="caption"><?php echo $caption; ?></p>
                <?php endif; ?>
            </div>

            <div class="entry-content">


			<div class="wrappedad">
	        <?php if ($jacket_single_image) { ?><a target="_blank" href="<?php echo esc_url($jacket_single_url); ?>"><img style="max-width:250px;" src="<?php echo esc_url($jacket_single_image); ?>" class="aligncenter img-responsive" /></a><?php } ?>
            <br />
            <?php if ($single_contetnad_image) { ?><a target="_blank" href="<?php echo esc_url($single_contentad_url); ?>"><img class="aligncenter img-responsive" src="<?php echo esc_url($single_contetnad_image); ?>" alt=""></a><?php } ?>
            </div>
				<?php
                    the_content( sprintf(
                        /* translators: %s: Name of current post. */
                        wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'easthill' ), array( 'span' => array( 'class' => array() ) ) ),
                        the_title( '<span class="screen-reader-text">"', '"</span>', false )
                    ) );

                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'easthill' ),
                        'after'  => '</div>',
                    ) );
                ?>
            </div>
            <div class="clearfix"></div>
            <div class="sharelikes">
            <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fsetopati%2F&width=78&layout=button_count&action=like&size=small&show_faces=false&share=false&height=21&appId" width="78" height="21" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
            <a href="https://twitter.com/setopati" class="twitter-follow-button" data-show-count="false">Follow @setopati</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
            <div class="clearfix"></div>
            <div class="entry-footer" style="margin-top:0px;">
              <p class="pull-left">
              <?php
			  echo esc_html('प्रकाशित मिति: ', 'setopati');
				do_action('setopati_published_date');
				$raw_time = get_the_time( 'h:i:s', $post->id );
				echo to_nepali_time($raw_time);
			  ?>
              </p>
            </div>
            <div class="clearfix"></div>
            <h4><strong>प्रतिकृया दिनुहोस</strong></h4>
       		<div class="fb-comments" data-href="<?php echo get_permalink(); ?>" data-order-by="reverse_time" data-width="100%" data-numposts="14"></div>               					
          </article>         