<?php
// Register Custom Taxonomy
function news_position() {

	$labels = array(
		'name'                       => _x( 'News Positions', 'Taxonomy General Name', 'setopati' ),
		'singular_name'              => _x( 'News Position', 'Taxonomy Singular Name', 'setopati' ),
		'menu_name'                  => __( 'News Position', 'setopati' ),
		'all_items'                  => __( 'All Items', 'setopati' ),
		'parent_item'                => __( 'Parent Item', 'setopati' ),
		'parent_item_colon'          => __( 'Parent Item:', 'setopati' ),
		'new_item_name'              => __( 'New Item Name', 'setopati' ),
		'add_new_item'               => __( 'Add New Item', 'setopati' ),
		'edit_item'                  => __( 'Edit Item', 'setopati' ),
		'update_item'                => __( 'Update Item', 'setopati' ),
		'view_item'                  => __( 'View Item', 'setopati' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'setopati' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'setopati' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'setopati' ),
		'popular_items'              => __( 'Popular Items', 'setopati' ),
		'search_items'               => __( 'Search Items', 'setopati' ),
		'not_found'                  => __( 'Not Found', 'setopati' ),
		'no_terms'                   => __( 'No items', 'setopati' ),
		'items_list'                 => __( 'Items list', 'setopati' ),
		'items_list_navigation'      => __( 'Items list navigation', 'setopati' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'newsposition', array( 'post' ), $args );

}
add_action( 'init', 'news_position', 0 );