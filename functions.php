<?php
/**
 * setopati functions and definitions.
 *
 * Do not go gentle into that good night,
 * Old age should burn and rave at close of day;
 * Rage, rage against the dying of the light.
 *
 * Though wise men at their end know dark is right,
 * Because their words had forked no lightning they
 * Do not go gentle into that good night.
 *
 * Dylan Thomas, 1914 - 1953
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License as published by the Free Software Foundation; either version 2 of the License,
 * or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * You should have received a copy of the GNU General Public License along with this program; if not, write
 * to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 *
 * @package    setopati
 * @subpackage Functions
 * @author     Mohammad Tajim <tajim@growcept.com>
 * @copyright  Copyright (c) 2016 - 2017, Growcept
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */

if ( ! function_exists( 'setopati_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function setopati_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on setopati, use a find and replace
	 * to change 'setopati' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'setopati' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// add custmo logo support
	add_theme_support( 'custom-logo', array(
		'height'      => 175,
		'width'       => 450,
		'flex-width' => true,
		'flex-height' => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );


	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
		 // Custom Image Size
	add_image_size( 'setopati-content', 453, 266, true );
	add_image_size( 'setopati-single-content', 826, 495, true );
	add_image_size( 'setopati-widget-big', 255, 140, true );
	add_image_size( 'setopati-widget-small', 110, 110, true );
	add_image_size( 'setopati-video-big', 734, 426, true );
	add_image_size( 'setopati-photo-slider', 1170, 500, true );


	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'setopati' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );


}
endif;
add_action( 'after_setup_theme', 'setopati_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function setopati_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'setopati_content_width', 826 );
}
add_action( 'after_setup_theme', 'setopati_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function setopati_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Main', 'setopati' ),
		'id'            => 'sidebar-main',
		'description'   => esc_html__( 'Use this widget area to display widgets sidebar of homepage and pages.', 'setopati' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Single News', 'setopati' ),
		'id'            => 'sidebar-single',
		'description'   => esc_html__( 'Use this widget area to display widgets sidebar of single news/posts', 'setopati' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	/*
	register_sidebar( array(
		'name'          => esc_html__( 'Footer One', 'setopati' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Use this widget area to display widgets in the first column of the footer.', 'setopati' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Two', 'setopati' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Use this widget area to display widgets in the second column of the footer.', 'setopati' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Three', 'setopati' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'Use this widget area to display widgets in the third column of the footer.', 'setopati' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	*/
}
add_action( 'widgets_init', 'setopati_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function setopati_scripts() {

	$setopati_theme = wp_get_theme();
    $setopati_version = $setopati_theme['Version'];

	// css includes
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), $setopati_version, false );
//	wp_enqueue_style( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', array(), $setopati_version, false );
//	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), $setopati_version, false );
	wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), $setopati_version, false );	
	wp_enqueue_style( 'setopati-custom-style', get_template_directory_uri() . '/css/style.css', array(), $setopati_version, false );
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css', array(), $setopati_version, false );
	wp_enqueue_style( 'setopati-second-style', get_template_directory_uri() . '/css/secondstyle.css', array(), $setopati_version, false );
	wp_enqueue_style( 'setopati-coverstory', get_template_directory_uri() . '/css/cover.css', array(), $setopati_version, false );		
	wp_enqueue_style( 'setopati-election', get_template_directory_uri() . '/css/electiontable.css', array(), $setopati_version, false );			
	wp_enqueue_style( 'setopati-style', get_stylesheet_uri(), array(), $setopati_version, false  );
	
	wp_enqueue_style( 'setopati-jssocial', get_template_directory_uri() . '/css/jssocials.css', array(), $setopati_version, false );	
	wp_enqueue_style( 'setopati-jssocial-flat', get_template_directory_uri() . '/css/jssocials-theme-flat.css', array(), $setopati_version, false );	


	//js includes
	wp_enqueue_script( 'jquery-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), $setopati_version, true );
	wp_enqueue_script( 'jquery-owl-carousel', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'), $setopati_version, true );
	wp_enqueue_script( 'jquery-sticky-anything', get_template_directory_uri() . '/js/jq-sticky-anything.min.js', array('jquery'), $setopati_version, true );
	wp_enqueue_script( 'jquery-owl-carousel-custom', get_template_directory_uri() . '/js/custom-owlslider.js', array('jquery'), $setopati_version, true );
	wp_enqueue_script( 'jquery-nptime', get_template_directory_uri() . '/js/nepaliTime.js', array('jquery'), $setopati_version, true );
	wp_enqueue_script( 'jquery-carouFredSel', get_template_directory_uri() . '/js/jquery.carouFredSel.js', array('jquery'), $setopati_version, true );

	wp_enqueue_script( 'jquery-jssocial', get_template_directory_uri() . '/js/jssocials.min.js', array('jquery'), $setopati_version, true );		
	wp_enqueue_script( 'jquery-script', get_template_directory_uri() . '/js/script.js', array('jquery'), $setopati_version, true );
	wp_enqueue_script( 'jquery-jacket', get_template_directory_uri() . '/js/jacket.js', array('jquery'), $setopati_version, true );			

	wp_register_script( 'setopati-ajax', get_template_directory_uri() . '/js/ajax.js', array('jquery'), $setopati_version, true );

	if ( is_singular('post') ) {
		wp_enqueue_script( 'jquery-single-sticky', get_template_directory_uri() . '/js/single-sticky.js', array('jquery'), $setopati_version, true );
//		wp_enqueue_script( 'sharethis-inline', '//platform-api.sharethis.com/js/sharethis.js#property=5938db658f08c50011c5d8d5&product=inline-share-buttons', array('jquery'), $setopati_version, true ); // rounded				
		wp_enqueue_script( 'sharethis-inline', '//platform-api.sharethis.com/js/sharethis.js#property=5937a3b042902e00112e9fbe&product=inline-share-buttons', array('jquery'), $setopati_version, true ); // rounded						
		
		wp_enqueue_script( 'google-share', 'https://apis.google.com/js/platform.js', array('jquery'), $setopati_version, true );
//		wp_enqueue_script( 'sharethis', 'http://w.sharethis.com/button/buttons.js', array('jquery'), $setopati_version, true );		
//		wp_enqueue_script( 'sharethis-inline', '//platform-api.sharethis.com/js/sharethis.js#property=59746ac580bb1d0011ab6cbc&product=inline-share-buttons', array('jquery'), $setopati_version, true ); // wide
	}



	wp_enqueue_script( 'setopati-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), $setopati_version, true );

	// custom paginations
	if ( is_archive() || is_search() ) {
	  $pagination = get_theme_mod( 'setopati_pagination_type', 'infinite_scroll' );

		if( $pagination == 'load_more' || $pagination == 'infinite_scroll' ){

	        // Add parameters for the JS
	        global $wp_query;
	        $max = $wp_query->max_num_pages;
	        $paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;

	        wp_enqueue_script( 'setopati-ajax' );

	        wp_localize_script(
	            'setopati-ajax',
	            'setopati_ajax',
	            array(
	                'url'           => admin_url( 'admin-ajax.php' ),
	                'startPage'     => $paged,
	                'maxPages'      => $max,
	                'nextLink'      => next_posts( $max, false ),
	                'autoLoad'      => $pagination,
	                'loadmore'      => __( 'Load More Posts', 'setopati' ),
	                'loading'       => __('Loading...', 'setopati'),
	                'nomore'        => __( 'No more posts.', 'setopati' ),
	                'plugin_url'    => plugins_url()
	             )
	        );

	    }
		}
	// custom paginations ends

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'setopati_scripts' );

function load_custom_wp_admin_style() {
        wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/css/admin.css',  '', '2.1.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... *
 */
if ( ! function_exists( 'setopati_excerpt_more' ) && ! is_admin() ) :

function setopati_excerpt_more() {
	return ' &hellip; ';
}
add_filter( 'excerpt_more', 'setopati_excerpt_more' );

endif;

/**
 * Widget Category Post
 */
require get_template_directory() . '/inc/widget-cat-post-small-thumb.php';
require get_template_directory() . '/inc/widget-cat-post-big-thumb.php';
require get_template_directory() . '/inc/widget-recommended.php';
require get_template_directory() . '/inc/widget-popular.php';

require get_template_directory() . '/inc/nepali_calendar.php';
require get_template_directory() . '/inc/date_functions.php';
require get_template_directory() . '/inc/cleanup.php';
require get_template_directory() . '/inc/widget-bichar-post.php';
require get_template_directory() . '/inc/acf-fields.php';
require get_template_directory() . '/inc/position-taxonomy.php';


/**
 * Custom Functions
 */
//require get_template_directory() . '/inc/custom-functions.php';

/**
 * English to Nepali Date
 */
//require get_template_directory() . '/inc/nepali_calendar.php';


if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Homepage Templates',
		'menu_title' 	=> 'Layout Settings',
		'menu_slug' 	=> 'home-layout-settings',
		'capability' 	=> 'edit_posts',
		'redirect' 	=> false,
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Advertisement Settings',
		'menu_title' 	=> 'Ad Settings',
		'menu_slug' 	=> 'ad-settings',
		'capability' 	=> 'edit_posts',
		'icon_url' => 'dashicons-awards',
		'position' => 7,
		'redirect' 	=> false,
	));


}

function wpse_delete_query_transient( $new, $old, $post ) {

	delete_transient( 'singlehotnewstran' );     // Deletes the transient when a new post is published	/ edited	
	delete_transient( 'triplehotnewstran' );     // Deletes the transient when a new post is published	/ edited		
	delete_transient( 'pressnews' );     // Deletes the transient when a new post is published			/ edited	

	if( 'publish' == $new ) {

		if ( in_category( array(908), $post->ID ) ) {  // do something
			delete_transient( 'rajnitibishes' );     // Deletes the transient when a new post is published
			delete_transient( 'rajnitisamachar' );     // Deletes the transient when a new post is published
		}

		if ( has_term( 'kinmel-bisesh', 'newsposition', $post->ID ) ) {  // do something
		
			delete_transient( 'kinmelbishesh' );     // Deletes the transient when a new post is published
			delete_transient( 'kinmelsmachar' );     // Deletes the transient when a new post is published
		}

		if ( has_term( 'photo-gallery', 'category', $post->ID ) ) {  // do something
			delete_transient( 'photogallery' );     // Deletes the transient when a new post is published
		}


		if ( has_term( 'kinmel-bisesh', 'newsposition', $post->ID ) ) {  // do something
			delete_transient( 'kinmelanubhav' );     // Deletes the transient when a new post is published
		}

		if ( has_term( 'khelkud-bisesh', 'newsposition', $post->ID ) ) {  // do something
			delete_transient( 'khelkud' );     // Deletes the transient when a new post is published
		}

		if ( has_term( 'kala-bisesh', 'newsposition', $post->ID ) ) {  // do something
			delete_transient( 'kala' );     // Deletes the transient when a new post is published
		}

		if ( has_term( 'global-bisesh', 'newsposition', $post->ID ) ) {  // do something
			delete_transient( 'globalkhabar' );     // Deletes the transient when a new post is published
		}

		if ( has_term( 'ghumphir-bisesh', 'newsposition', $post->ID ) ) {  // do something
			delete_transient( 'ghumphir' );     // Deletes the transient when a new post is published
		}

		if ( has_term( 'ghumphir-bisesh', 'newsposition', $post->ID ) ) {  // do something
			delete_transient( 'ghumphiranubhav' );     // Deletes the transient when a new post is published
		}
		

		if ( has_term( 'rajniti-samaj-bisesh', 'newsposition', $post->ID ) ) {  // do something
			delete_transient( 'videogallery' );     // Deletes the transient when a new post is published
		}
		
		if ( has_term( 'single-hot-news', 'newsposition', $post->ID ) ) {  // do something
			delete_transient( 'singlehotnewstran' );     // Deletes the transient when a new post is published
		}		
		
		if ( has_term( 'triple-hot-news', 'newsposition', $post->ID ) ) {  // do something
			delete_transient( 'triplehotnewstran' );     // Deletes the transient when a new post is published
		}				
		
		if ( in_category( array(4), $post->ID ) ) {  // do something
			delete_transient( 'pressnews' );     // Deletes the transient when a new post is published
		}			

	}

}
add_action( 'transition_post_status', 'wpse_delete_query_transient', 10, 3 );


function wpse_delete_topsection_transient( $post_id ) {

		delete_transient( 'singlehotnewstran' );     // Deletes the transient when a new post is published	/ edited	
		delete_transient( 'triplehotnewstran' );     // Deletes the transient when a new post is published	/ edited		
		delete_transient( 'pressnews' );     // Deletes the transient when a new post is published			/ edited		

}

add_action( 'save_post', 'wpse_delete_topsection_transient', 10, 3 );

/*
function post_published_notification( $ID, $post ) { 

			delete_transient( 'rajnitibishes' );     // Deletes the transient when a new post is published
			delete_transient( 'rajnitisamachar' );     // Deletes the transient when a new post is published
			delete_transient( 'kinmelbishesh' );     // Deletes the transient when a new post is published
			delete_transient( 'kinmelsmachar' );     // Deletes the transient when a new post is published
			delete_transient( 'photogallery' );     // Deletes the transient when a new post is published
			delete_transient( 'kinmelanubhav' );     // Deletes the transient when a new post is published
			delete_transient( 'khelkud' );     // Deletes the transient when a new post is published
			delete_transient( 'kala' );     // Deletes the transient when a new post is published
			delete_transient( 'globalkhabar' );     // Deletes the transient when a new post is published
			delete_transient( 'ghumphir' );     // Deletes the transient when a new post is published
			delete_transient( 'ghumphiranubhav' );     // Deletes the transient when a new post is published
			delete_transient( 'videogallery' );     // Deletes the transient when a new post is published
			
			if (function_exists('w3tc_pgcache_flush')) {
				w3tc_pgcache_flush();
			} 
			
			

}
add_action( 'publish_post', 'post_published_notification', 10, 2 );
*/


add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

            $title = single_cat_title( '', false );

        } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

        } elseif ( is_author() ) {

            $title = '<span class="vcard">' . get_the_author() . '</span>' ;

        }

    return $title;

});

function setopati_header_date() {
				date_default_timezone_set('Asia/Katmandu');
				$cal = new Nepali_Calendar();
				$raw_date = date('Y-n-d');
				$dates = explode('-', $raw_date );
				$nepdate = $cal->eng_to_nep($dates[0], $dates[1], $dates[2]);
				$year = $nepdate['year'];
				$day = $nepdate['date'];
				echo $day_name = $nepdate['day'].', ';
				echo $month_name = $nepdate['nmonth'].' ';
				echo $day_n = $nepdate['date'].', ';
				echo $year.' ';
}
add_action( 'setopati_header_info', 'setopati_header_date' );

function setopati_single_published_date() {
				global $post;

				date_default_timezone_set('Asia/Katmandu');
				$cal = new Nepali_Calendar();
//;				$raw_date = date('Y-n-d');
				$raw_date = get_the_date( 'Y-n-d', $post->id );

				$dates = explode('-', $raw_date );
				$nepdate = $cal->eng_to_nep($dates[0], $dates[1], $dates[2]);
				$year = $nepdate['year'];
				$day = $nepdate['date'];
				echo $day_name = $nepdate['day'].', ';
				echo $month_name = $nepdate['nmonth'].' ';
				echo $day_n = $nepdate['date'].', ';
				echo $year.' ';
}
add_action( 'setopati_published_date', 'setopati_single_published_date' );

function setopati_single_published_date_gallery() {
				global $post;

				date_default_timezone_set('Asia/Katmandu');
				$cal = new Nepali_Calendar();
//;				$raw_date = date('Y-n-d');
				$raw_date = get_the_date( 'Y-n-d', $post->id );

				$dates = explode('-', $raw_date );
				$nepdate = $cal->eng_to_nep($dates[0], $dates[1], $dates[2]);
				$year = $nepdate['year'];
				$day = $nepdate['date'];
//				echo $day_name = $nepdate['day'].', ';
				echo $month_name = $nepdate['nmonth'].' ';
				echo $day_n = $nepdate['date'].'';
//				echo $year.' ';
}
add_action( 'setopati_published_date_gallery', 'setopati_single_published_date_gallery' );

function category_has_parent($catid){
    $category = get_category($catid);
    if ($category->category_parent > 0){
        return true;
    }
    return false;
}

// Enable shortcodes in text widgets
add_filter('widget_text','do_shortcode');

function wrap_embed_with_div($html, $url, $attr) {
     return '<div class="video-container">' . $html . '</div>';
}
add_filter('embed_oembed_html', 'wrap_embed_with_div', 10, 3);

/*
custom template for phot gallery
@link https://wordpress.stackexchange.com/a/173898
*/
add_filter( 'single_template', function ($single_template) {

     global $post;

    if ( in_category( 'photo-gallery' ) ) {
          $single_template = dirname( __FILE__ ) . '/single-gallery.php';
     }
	 
    if ( in_category( 'special-photofeature' ) ) {
          $single_template = dirname( __FILE__ ) . '/single-special-photofeature.php';
     }	 
	 
     return $single_template;

}, 10, 3 );

add_filter( 'category_rewrite_rules', 'vipx_filter_category_rewrite_rules' );
function vipx_filter_category_rewrite_rules( $rules ) {
    $categories = get_categories( array( 'hide_empty' => false ) );

    if ( is_array( $categories ) && ! empty( $categories ) ) {
        $slugs = array();
        foreach ( $categories as $category ) {
            if ( is_object( $category ) && ! is_wp_error( $category ) ) {
                if ( 0 == $category->category_parent ) {
                    $slugs[] = $category->slug;
                } else {
                    $slugs[] = trim( get_category_parents( $category->term_id, false, '/', true ), '/' );
                }
            }
        }

        if ( ! empty( $slugs ) ) {
            $rules = array();

            foreach ( $slugs as $slug ) {
                $rules[ '(' . $slug . ')/feed/(feed|rdf|rss|rss2|atom)?/?$' ] = 'index.php?category_name=$matches[1]&feed=$matches[2]';
                $rules[ '(' . $slug . ')/(feed|rdf|rss|rss2|atom)/?$' ] = 'index.php?category_name=$matches[1]&feed=$matches[2]';
                $rules[ '(' . $slug . ')(/page/(\d)+/?)?$' ] = 'index.php?category_name=$matches[1]&paged=$matches[3]';
            }
        }
    }
    return $rules;
}

add_filter( 'document_title_parts', function( $title ) {

    if ( is_single() )
        unset( $title['site'] ); /** Remove site name */

    return $title;

}, 10, 1 );

//add_theme_support('auto-load-next-post');