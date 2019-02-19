<?php
/**
 * Template part for displaying news according to the location (Country).
 *
 * @package setopati
 */
?>

        <?php 
			$country_code = $_SERVER["HTTP_CF_IPCOUNTRY"]; 			
			
            if ($country_code == "AU" ) { 
				$cntlabel = "अस्ट्रेलिया";
			}
            if ($country_code == "US" ) { 
				$cntlabel = "अमेरिका";
			}
            if ($country_code == "GB" ) { 
				$cntlabel = "बेलायत";
			}	
         if ($country_code == "QA" ) { 
        $cntlabel = "कतार";
      }		
         if ($country_code == "KR" ) { 
        $cntlabel = "कोरीया";
      }
         if ($country_code == "CN" ) { 
        $cntlabel = "चीन";
      }
         if ($country_code == "CA" ) { 
        $cntlabel = "क्यानाडा";
      }
         if ($country_code == "JP" ) { 
        $cntlabel = "जापान";
      }
         if ($country_code == "NO" ) { 
        $cntlabel = "नर्वे";
      }
         if ($country_code == "PT" ) { 
        $cntlabel = "पोर्चुगल";
      }
         if ($country_code == "FR" ) { 
        $cntlabel = "फ्रान्स";
      }
         if ($country_code == "IN" ) { 
        $cntlabel = "भारत";
      }
         if ($country_code == "MY" ) { 
        $cntlabel = "मलेसिया";
      }
         if ($country_code == "AE" ) { 
        $cntlabel = "युएई";
      }   
      if ($country_code == "SA" ) { 
        $cntlabel = "साउदी अरेविया";
      }
			?>
            <div class="header-labels">
            <h2 style="float:left; font-size:15px;"><?php echo esc_html($cntlabel); ?></h2>
           </div>


      <!-- kinmel anubhav -->
      <div class="location clearfix header-news-box-3">
        <div class="right-panel">
          <div class="row">
            <ul>
                <?php
                $query_args = array(
                'post_type' => 'post',
                'posts_per_page' => 4,
                'no_found_rows' => true,
                'cat'=>$catid, 

                );
                  //Set the counter to 1
                  $i = 1;
                $the_query = new WP_Query( $query_args ); ?>
                <?php if ( $the_query->have_posts() ) : ?>
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
              <li class="col-lg-3 col-md-6 col-sm-6 col-xs-12" style="margin-bottom:25px;" >
              <?php
              echo get_post_meta ('hompage_major_news_category', true);
              ?>
                <div class="post-thumbnail">
                    <a href="<?php echo get_permalink(); ?>">
                        <?php
                        if ( has_post_thumbnail() ) {
                            the_post_thumbnail( 'setopati-content', array( 'class' => 'img-responsive hidden-sm hidden-xs' )  );
                        }
						else {
						?>
						<img src="<?php echo get_template_directory_uri(); ?>/img/defaultimg.png" class="img-responsive hidden-sm hidden-xs" alt="">                                
                        <?php } ?>
                    </a>
                </div>
                <header class="entry-header">
                    <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
                </header>
              </li>
                <?php
              // After 4 close the row div and open a new one
              if($i % 4 == 0) {echo '<div class="clearfix"></div>';}
                $i++; endwhile; ?>
                <?php wp_reset_postdata(); ?>
                <?php else: ?>
                <?php endif; ?>

            </ul>
          </div>
          <!-- <a class="read_more" href="#">?? ????????</a> -->
        </div>
      </div>
      <!-- end kinmel anubhav -->

