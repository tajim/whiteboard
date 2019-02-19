<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package setopati
 */
if ( ! is_active_sidebar( 'sidebar-single' ) ) {
	return;
}
?>
       
       <aside id="secondary" class="widget-area col-md-3" role="complementary">
           <?php dynamic_sidebar( 'sidebar-single' ); ?>
		</aside>        