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
                        $qry->the_post();                        
	                        get_template_part( 'template-parts/content' );	
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