<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package _mbbasetheme
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="cbp-spmenu-s2" class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right">
	<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
	
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
