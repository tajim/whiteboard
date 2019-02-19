<?php
/*
function return_cache_time( $seconds ) {
// change the default feed cache recreation period to 2 hours
return (int) 600;
}
 
//set feed cache duration
add_filter( 'wp_feed_cache_transient_lifetime', 'return_cache_time');
*/
?>
<div class="iccposts">
    <div class="container">
    
    
			<div class="header-labels">
            	<h2>#CT17 Final India vs Pakistan</h2>                
           </div>    
    <br />
    <?php // Get RSS Feed(s)
    include_once( ABSPATH . WPINC . '/feed.php' );
    
    // Get a SimplePie feed object from the specified feed source.
    $rss = fetch_feed( 'http://icc.setopati.com/feed?cleac=clear3' );
    
    $maxitems = 3;
    
    if ( ! is_wp_error( $rss ) ) : // Checks that the object is created correctly
    
        // Figure out how many total items there are, but limit it to 5. 
        $maxitems = $rss->get_item_quantity( 3 ); 
    
        // Build an array of all the items, starting with element 0 (first element).
        $rss_items = $rss->get_items( 0, $maxitems );
    
    endif;
    ?>
    
    <ul>
        <?php if ( $maxitems == 0 ) : ?>
            <li><?php _e( 'No items', 'my-text-domain' ); ?></li>
        <?php else : ?>
            <?php // Loop through each feed item and display each item as a hyperlink. ?>
            <?php foreach ( $rss_items as $item ) : ?>        
                <li class="col-lg-4 col-md-6 col-sm-6 col-xs-12" style="margin-bottom:25px;">
                    <a target="_blank" href="<?php echo esc_url( $item->get_permalink() ); ?>"
                        title="<?php printf( __( 'Posted %s', 'my-text-domain' ), $item->get_date('j F Y | g:i a') ); ?>">
                        <?php echo  $item->get_content(); ?>
                        <div style="clear:both;"></div>
                        <?php echo esc_html( $item->get_title() ); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>

	<center><a target="_blank" href="http://icc.setopati.com/"><img class="aligncenter img-responsive" src="http://setopati.com/wp-content/uploads/2017/06/BANNER_ICC-e1496748098400.png" alt=""></a></center>
    
    </div>
</div>

