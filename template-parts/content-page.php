<?php
/**
 * Template part for displaying content on single page
 *
 * @package setopati
 */


?>


          <header class="entry-header clearfix">
			<div class="nav-news-title" id="nav-news-title">
              <h2 style=" margin-top:0px;">
              <img src="<?php echo get_template_directory_uri(); ?>/img/no-logo.png?check=yes" />
              </h2> <p>|</p> <?php the_title( '<p class="toptitle">', '</p>' ); ?>
                <div class="sharethis_top">
                    <div id="share_top1"></div>
                </div>
              

              <div class="setopati-share">
                <ul>
                  <a onclick="return popitup('http://www.facebook.com/sharer.php?s=100&p[url]=<?php the_permalink(); ?>')" href="http://www.facebook.com/sharer.php?s=100&p[url]=<?php the_permalink(); ?>"><li class="fb"><i class="fa fa-facebook" aria-hidden="true"></i></li></a>
                  <a data-text="<?php the_title(); ?>" data-url="<?php the_permalink(); ?>" data-via="setopati" data-related="setopati" data-show-count="false" onclick="return popitup('https://twitter.com/share')" href="https://twitter.com/share"><li class="tw"><i class="fa fa-twitter" aria-hidden="true"></i></li></a>
                  <a onclick="return popitup('http://www.linkedin.com/shareArticle?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>')" href="http://www.linkedin.com/shareArticle?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>"><li class="in"><i class="fa fa-linkedin" aria-hidden="true"></i></li></a>
                  <a onclick="return popitup('https://plus.google.com/share?url=<?php the_permalink(); ?>')" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><li class="gp"><i class="fa fa-google-plus" aria-hidden="true"></i></li></a>
                </ul>
              </div>


            </div>
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
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

          </article>         