<?php
/**
 * Template part for displaying related posts on index.
 *
 * @package setopati
 */

global $post;

$arg = array(
		'post_type'             => 'post',
		'post_status'           => 'publish',
		'posts_per_page'        => 6,
		'no_found_rows' => true,
		'ignore_sticky_posts'   => true,
		'post__not_in'          => array( $post->ID ),
	);					
    $cats = get_the_category( $post->ID );
    if( $cats ){
        $c = array();
        foreach( $cats as $cat ){
            $c[] = $cat->term_id; 
        }
        $arg['category__in'] = $c;
        
        $qry = new WP_Query( $arg );
        ?>
		<div class="kinmel-anubhav clearfix">

            <div class="title-box">
              <h1><?php echo esc_html('थप', 'setopati'); ?></h1>
              <p>
				<?php 
				echo get_cat_name( $c[0] ) ?>
              </p>
              
            </div>
            
            <div class="right-panel si-po">
              <div class="row">
              <ul>
				<?php 
                if( $qry->have_posts() ){
                    while( $qry->have_posts() ){
                        $qry->the_post(); ?>
                        
 <li id="post-<?php the_ID(); ?>" <?php post_class('latest_post'); ?>>                    
                    
                    <?php
					if (in_category( array(95,7,8) )) {					
					?>                                        
					<div class="post-thumbnail">
                        <a href="<?php the_permalink(); ?>">
                        <?php
						$authorimage = get_field('author_photo'); 
						$authorbyline = get_field('byline'); 						
						if ($authorimage) {
							echo wp_get_attachment_image( $authorimage, array('111', '111'), "", array( "class" => "img-responsive bichar-img" ) );						
						}
						?>
                        </a>
                    </div>                        
					<?php 
					}                    
					else {
					?>
                    <div class="post-thumbnail">
                        <?php $imger = get_field('photo-gallery', get_the_ID() ); ?>
                             <a href="<?php echo esc_url(get_the_permalink().'/?id=0&img='.$imger[0]['ID']); ?>">
                                <?php
                                if ( has_post_thumbnail() ) {
                                    the_post_thumbnail( 'setopati-content', array( 'class' => 'img-responsive' )  );
                                } 
								else {
								?>
								<img src="<?php echo get_template_directory_uri(); ?>/img/defaultimg.png" class="img-responsive wp-post-image" alt="">                                
                                <?php } ?>
                            </a>                            
	                </div>
                    <?php } ?>    
                        
    	                <header class="entry-header">
							<?php 
							if ( in_category('photo-gallery') ) { ?>
                            <?php $imger = get_field('photo-gallery', get_the_ID() ); ?>
                                <h2 class="entry-title">
                                <a href="<?php echo esc_url(get_the_permalink().'/?id=0&img='.$imger[0]['ID']); ?>">                                                  
                                <?php 			  
                                do_action('setopati_published_date_gallery');
                                echo " का तस्वीरहरु";
                                ?>
                                </a>
                                </h2>                            
							<?php
							}
							else {
							the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); 
							} 
                            ?>
            	        </header>
                    </li>                        
                        
                        
                        <?php

							if ( $qry->current_post =="2" ) {
							echo '<div class="clearfix"></div>';
							}
                    }
                    wp_reset_postdata();
                }
                ?>
	        </ul>
            </div>
        </div>
        </div>
        <?php                  
    }

?>