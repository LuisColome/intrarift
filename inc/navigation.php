<?php
/**
 * Navigation
 *
 * @package White River
 * @author       Luis Colomé
 * @since        1.0.0
 * @license      GPL-2.0+
**/

// Don't let Genesis load menus
remove_action( 'genesis_after_header', 'genesis_do_nav' );
remove_action( 'genesis_after_header', 'genesis_do_subnav' );

/**
 * Mobile Menu
 *
 */
function ea_site_header() {
	echo ea_mobile_menu_toggle();
	echo '<nav' . ea_amp_class( 'nav-menu', 'active', 'menuActive' ) . ' role="navigation">';
	if( has_nav_menu( 'primary' ) ) {
		wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'container_class' => 'nav-primary', 'link_before' => '<span>', 'link_after' => '</span>' ) );
	}
	if( has_nav_menu( 'secondary' ) ) {
		wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'secondary-menu', 'container_class' => 'nav-secondary' ) );
	}
	echo '</nav>';

	// echo '<div' . ea_amp_class( 'header-search', 'active', 'searchActive' ) . '>' . get_search_form( array( 'echo' => false ) ) . '</div>';
}
add_action( 'genesis_header', 'ea_site_header', 11 );



/**
 * Secondary Menu
 *
 */
function lcm_secondary_menu() {

	echo '<nav class="nav-menu" role="navigation">';
	if( has_nav_menu( 'secondary' ) ) {
		wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'secondary-menu', 'container_class' => 'nav-secondary' ) );
	}
	echo '</nav>';

}
//add_action( 'genesis_header', 'lcm_secondary_menu', 12 );

/**
 * Nav Extras
 *
 */
function ea_nav_extras( $menu, $args ) {

	// if( 'primary' === $args->theme_location ) {
	// 	$menu .= '<li class="menu-item search">' . ea_search_toggle() . '</li>';
	// }

	// if( 'secondary' === $args->theme_location ) {
	// 	$menu .= '<li class="menu-item search">' . get_search_form( false ) . '</li>';
	// }

	return $menu;
}
add_filter( 'wp_nav_menu_items', 'ea_nav_extras', 10, 2 );

/**
 * Mobile menu toggle
 *
 */
function ea_mobile_menu_toggle() {
	$output = '<button' . ea_amp_class( 'menu-toggle', 'active', 'menuActive' ) . ea_amp_toggle( 'menuActive', array( 'searchActive', 'mobileFollow' ) ) . '>';
		// $output .= ea_icon( array( 'icon' => 'menu', 'size' => 24, 'class' => 'open' ) );
		// $output .= ea_icon( array( 'icon' => 'close', 'size' => 24, 'class' => 'close' ) );
		$output .= '<span class="toggl__bar first"></span><span class="toggl__bar second"></span><span class="toggl__bar third"></span>';
		$output .= '<span class="screen-reader-text">Menu</span>';
	$output .= '</button>';
	return $output;
}

/**
 * Add a dropdown icon to top-level menu items.
 *
 * @param string $output Nav menu item start element.
 * @param object $item   Nav menu item.
 * @param int    $depth  Depth.
 * @param object $args   Nav menu args.
 * @return string Nav menu item start element.
 * Add a dropdown icon to top-level menu items
 */
function ea_nav_add_dropdown_icons( $output, $item, $depth, $args ) {

	if ( ! isset( $args->theme_location ) || 'primary' !== $args->theme_location ) {
		return $output;
	}

	if ( in_array( 'menu-item-has-children', $item->classes, true ) ) {

		// Add SVG icon to parent items.
		$icon = ea_icon( array( 'icon' => 'chevron-bottom', 'size' => 14, 'title' => 'Submenu Dropdown' ) );

		$output .= sprintf(
			'<button' . ea_amp_nav_dropdown( $args->theme_location, $depth ) . ' tabindex="-1">%s</button>',
			$icon
		);
	}

	return $output;
}
add_filter( 'walker_nav_menu_start_el', 'ea_nav_add_dropdown_icons', 10, 4 );




/**
 * Add a dropdown icon to top-level menu items.
 *
 * @param string $output Nav menu item start element.
 * @param object $item   Nav menu item.
 * @param int    $depth  Depth.
 * @param object $args   Nav menu args.
 * @return string Nav menu item start element.
 * Add a dropdown icon to top-level menu items
 */
function ea_nav_add_highlight_icon( $output, $item, $depth, $args ) {

	if ( ! isset( $args->theme_location ) || 'primary' !== $args->theme_location ) {
		return $output;
	}

	if ( in_array( 'highlight', $item->classes, true ) ) {

		// Add SVG icon to parent items.
		$icon = ea_icon( array( 'icon' => 'checkmark-featured', 'size' => 15, 'title' => 'Featured menu item' ) );

		$output .= sprintf(
			'<icon class="highlight-icon" tabindex="-1">%s</icon>',
			$icon
		);
	}

	return $output;
}
add_filter( 'walker_nav_menu_start_el', 'ea_nav_add_highlight_icon', 10, 4 );

/**
 * 
 * https://wordpress.stackexchange.com/questions/251181/how-do-i-display-post-count-of-a-custom-post-type-with-custom-category-taxonomy
 */
// function the_dramatist_item_setup($item) {
//     if ('taxonomy' === $item->type) {
//         $posts = get_posts( array(
//             'post_type'   => 'viajes',
//             'numberposts' => -1,
//             'tax_query' => array(
//                 array(
//                     'taxonomy' => 'destinos',
//                     'field' => 'id',
//                     'terms' => $item->object_id, // Where term_id of Term 1 is "1".
//                     'include_children' => true
//                 )
//             )
//         ) );

//         $item->title = $item->title . ' (' . count( $posts ) . ')';
//     }

//     return $item;
// }
// add_filter( 'wp_setup_nav_menu_item','the_dramatist_item_setup' );