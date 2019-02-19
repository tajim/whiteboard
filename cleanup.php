<?php
// cleanup dashboard widgets
// @link http://www.wpbeginner.com/wp-tutorials/how-to-remove-wordpress-dashboard-widgets/
function remove_dashboard_widgets() {
	global $wp_meta_boxes;

	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);

//	remove_meta_box( 'dashboard_activity', 'dashboard', 'side' );
}

add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );

// disable the admin bar
show_admin_bar(false);


// hide unwanted menu items for no-maj users


function setopati_remove_menu_pages() {

    global $user_ID;

    if ( !current_user_can( 'manage_options' ) ) {
		remove_menu_page( 'profile.php' );
		remove_menu_page( 'tools.php' );
		remove_menu_page( 'edit-comments.php' );
		remove_menu_page( 'edit.php?post_type=page' );
    }
}
add_action( 'admin_init', 'setopati_remove_menu_pages' );

// login page logo

function setopati_login_logo() { ?>

<style type="text/css">
	h1 a {
		background-image: url(<?php echo get_template_directory_uri(); ?>/img/text-logo.png) !important;
		width:300px !important;
		height:100px !important;
		background-size: 300px!important;
		}
</style>

<?php
}
add_action('login_head', 'setopati_login_logo');


// remove howdy
add_filter('gettext', 'change_howdy', 10, 3);

function change_howdy($translated, $text, $domain) {

    if (!is_admin() || 'default' != $domain)
        return $translated;

    if (false !== strpos($translated, 'Howdy'))
        return str_replace('Howdy', 'Namaste', $translated);

    return $translated;
}


/**
 * Function to add the post view count
 */
function setopati_set_views( $post_id ) {
    $count_key = '_setopati_view_count';
    $count = get_post_meta( $post_id, $count_key, true );
    if( $count == '' ){
        $count = 0;
        delete_post_meta( $post_id, $count_key );
        add_post_meta( $post_id, $count_key, '1' );
    }else{
        $count++;
        update_post_meta( $post_id, $count_key, $count );
    }
}

if( ! function_exists( 'setopati_dns_prefetch' ) ) :

	function setopati_dns_prefetch(){

			if ( is_singular() ) {
                echo '<link rel="prefetch" href="' .esc_url( home_url() ) . '">';
                echo '<link rel="prerender" href="' .esc_url( home_url() ) . '">';
			}

	}

endif;

add_action('wp_head', 'setopati_dns_prefetch');

/**
 *  Custom Pagination
*/
function setopati_pagination(){
    $pagination = get_theme_mod( 'setopati_pagination_type', 'infinite_scroll' );

    switch( $pagination ){
        case 'default': // Default Pagination

        the_posts_navigation();

        break;

        case 'numbered': // Numbered Pagination

        the_posts_pagination( array(
            'prev_text'          => __( '<i class="fa fa-chevron-left" aria-hidden="true"></i>', 'setopati' ),
            'next_text'          => __( '<i class="fa fa-chevron-right" aria-hidden="true"></i>', 'setopati' ),
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'setopati' ) . ' </span>',
         ) );

        break;

        case 'load_more': // Load More Button
        case 'infinite_scroll': // Auto Infinite Scroll

        echo '<div class="pagination"></div>';

        break;

        default:

        the_posts_navigation();

        break;
    }
}

/**
 * Return the post excerpt, if one is set, else generate it using the
 * post content. If original text exceeds $num_of_words, the text is
 * trimmed and an ellipsis (�) is added to the end.
 *
 * @param  int|string|WP_Post $post_id   Post ID or object. Default is current post.
 * @param  int                $num_words Number of words. Default is 55.
 * @return string                        The generated excerpt.
 */
function km_get_the_excerpt( $post_id = null, $num_words = 55 ) {
	$post = $post_id ? get_post( $post_id ) : get_post( get_the_ID() );
	$text = get_the_content( $post );
	if ( ! $text ) {
		$text = get_post_field( 'post_content', $post );
	}
	$generated_excerpt = wp_trim_words( $text, $num_words );
	return apply_filters( 'get_the_excerpt', $generated_excerpt, $post );
}


/** redirect after post publish **/

add_filter( 'redirect_post_location', 'wpse_124132_redirect_post_location' );
/**
 * Redirect to the edit.php on post save or publish.
 */
function wpse_124132_redirect_post_location( $location ) {

    if ( isset( $_POST['save'] ) || isset( $_POST['publish'] ) )
        return admin_url( "post-new.php" );

    return $location;
}


function return_cache_time( $seconds ) {
// change the default feed cache recreation period to 2 hours
return (int) 600;
}
 
//set feed cache duration
add_filter( 'wp_feed_cache_transient_lifetime', 'return_cache_time');