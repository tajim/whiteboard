<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package setopati
 */
get_header('gallery');
   $current_url_2 = "//".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
?>
    <!-- main container -->
    <div class="container">
      <!-- row -->
      <div class="row">
        <!-- right side -->
        <div class="col-md-12 site-main no-gutter" id="post-single">
      <?php while ( have_posts() ) : the_post(); ?>

                <div class="container no-gutter first-slider">

    <header class="entry-header clearfix">
      <div class="nav-news-title" id="nav-news-title">
              <h2 style=" margin-top:0px;">
              <img src="<?php echo get_template_directory_uri(); ?>/img/no-logo.png" />
        <?php
        $category = get_the_category();
        if ($category) {
          echo esc_html($category[0]->cat_name);
        }
        ?>
              </h2> <p>|</p> <p> <?php $img_id = isset( $_GET['img'] ) ? $_GET['img'] : '';
                                        $thumb_img = get_post( $img_id );
                                        echo wp_trim_words( $thumb_img->post_excerpt, 10 );  ?> </p>
            </div>
      <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            <h3 class="entry-title"><?php the_field('subtitle'); ?></h3>
            <?php if ($single_belownewstitle_image) { ?><a target="_blank" href="<?php echo esc_url($single_belownewstitle_url); ?>"><img class="aligncenter img-responsive" src="<?php echo esc_url($single_belownewstitle_image); ?>" alt=""></a><?php } ?>
            <div class="entry-meta clearfix">
        <div class="news-auth-wrap">
              </div>
            </div>
            <?php if ($single_belowauthor_image) { ?><a target="_blank" href="<?php echo esc_url($single_belowauthor_url); ?>"><img class="aligncenter img-responsive" src="<?php echo esc_url($single_belowauthor_image); ?>" alt=""></a><?php } ?>
          </header>

                   <div class="bold owl-theme">

          <?php
          $images = get_field('photo-gallery');
                    if( $images ):

                      $count = max(array_keys($images)); 

                      if (isset($_GET['id'])) { 
                        $i = $_GET['id'];
                      }else{ 
                        $i = 0;
                      }

                    $j = $i;
                      ?>

                      <div>

                      <img src="<?php echo $images[$j]['url']; ?>" class="img-responsive" />
                      <div class="imgcapt"><h3><?php echo esc_html($images[$j]['caption']); ?></h3></div>
                      
                      <?php  
                      if( $count != $j) {
                        $inc = $j + 1;?>
                        <div class="slider-next">
                          <a href="?id=<?php echo $inc; ?>&img=<?php echo $images[$inc]['ID'];?>"><i class="fa fa-chevron-right fa-4x" aria-hidden="true"></i>
                        </div>
</a> 
                      <?php } ?>

                      <?php
                      if( $j != 0) {
                        $dec = $j - 1;
                        ?>
                        <div class="slider-prev">
                          <a href="?id=<?php echo $dec; ?>&img=<?php echo $images[$dec]['ID'];?>"><i class="fa fa-chevron-left fa-4x" aria-hidden="true"></i>
                        </div>
</a>
                      <?php } ?>


              
               <div class="setopati-share gallery-share">
              
                <div class="sharethis-inline-share-buttons"></div>

                <div class="sharable"><div class="fb-share-button" data-href="<?php echo the_permalink().'/?id='.$j.'%26img='.$images[$j]['ID']; ?>" data-layout="button_count" data-size="large" data-mobile-iframe="false"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/dialog/share?u=<?php echo the_permalink().'/?id='.$j.'%26img='.$images[$j]['ID']; ?>&amp;src=sdkpreparse">Share</a></div></div>

                <div class="sharable"><a class="twitter-share-button"
                  href="https://twitter.com/share""
                  data-size="large"
                  data-text="<?php echo esc_html(wp_trim_words( $images[$j]['caption'], 13, '... ')); ?>"
                  data-url = "<?php echo the_permalink().'/?id='.$j.'%26img='.$images[$j]['ID']; ?>"
                  data-via = "setopati">
                Tweet</a></div>

                <div class="sharable"><div class="g-plus" data-action="share" data-annotation="bubble" data-height="28"></div></div>

                  
              </div>

                  <!-- <a href="javascript:window.open('https://www.facebook.com/sharer/sharer.php?u=','mypopuptitle','width=600,height=400')" onClick="MyWindow=window.open('http://www.google.com','MyWindow',width=600,height=300); return false;"><li class="fb g-share"><i class="fa fa-facebook" aria-hidden="true"></i></li></a>

                  <a href="javascript:window.open('https://twitter.com/home?status=<?php //echo $image['caption'].' '; ?><?php// echo get_permalink(); ?>%20via%20@setopati','mypopuptitle','width=600,height=400')"><li class="tw g-share"><i class="fa fa-twitter" aria-hidden="true"></i></li></a>

                  <a href="javascript:window.open('https://www.linkedin.com/shareArticle?mini=true&url=<?php //echo get_permalink(); ?>&title=<?php //echo $image['caption']; ?>&summary=&source=','mypopuptitle','width=600,height=400')"><li class="in g-share"><i class="fa fa-linkedin" aria-hidden="true"></i></li></a>
                  
                  <a href="javascript:window.open('https://plus.google.com/share?url=<?php //echo get_permalink(); ?>','mypopuptitle','width=600,height=400')"><li class="gp g-share"><i class="fa fa-google" aria-hidden="true"></i></li></a> -->

                  <!-- <a onclick="return popitup('http://www.facebook.com/sharer.php?s=100&p[url]=<?php //the_permalink(); ?>')" href="http://www.facebook.com/sharer.php?s=100&p[url]=<?php //the_permalink(); ?>"><li class="fb"><i class="fa fa-facebook" aria-hidden="true"></i></li></a>
                  <a data-text="<?php //echo $image['caption']; ?>" data-url="<?php the_permalink(); ?>" data-via="setopati" data-related="setopati" data-show-count="false" onclick="return popitup('https://twitter.com/share')" href="https://twitter.com/share"><li class="tw"><i class="fa fa-twitter" aria-hidden="true"></i></li></a>
                  <a onclick="return popitup('http://www.linkedin.com/shareArticle?url=<?php //the_permalink(); ?>&title=<?php //the_title(); ?>')" href="http://www.linkedin.com/shareArticle?url=<?php //the_permalink(); ?>&title=<?php //the_title(); ?>"><li class="in"><i class="fa fa-linkedin" aria-hidden="true"></i></li></a>
                  <a onclick="return popitup('https://plus.google.com/share?url=<?php //the_permalink(); ?>')" href="https://plus.google.com/share?url=<?php //the_permalink(); ?>"><li class="gp"><i class="fa fa-google-plus" aria-hidden="true"></i></li></a> -->
            

                      </div>
                      
                    

                    <?php endif; ?>

                  </div>

        <div class="clearfix"></div>
        
        

                

                </div>


      <?php endwhile; // End of the loop.  ?>


        </div>
        <!-- end right side -->
        <div class="container">
         <?php get_template_part( 'template-parts/content', 'relatedgallery' ); ?>
         </div>
        <!-- left side -->
        <!-- end left side -->
      </div>
      <!-- end row -->
    </div>
    <!-- end main container -->
<?php get_footer(); ?>
