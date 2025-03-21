<?php
/**
 * Genesis Sample.
 *
 * This file adds functions to the Genesis Sample Theme.
 *
 * @package RiftValley
 * @author  Luis Colomé
 * @license GPL-2.0-or-later
 * @link    https://luiscolome.com/
 */

 /**
 * Set up the content width value based on the theme's design.
 *
 */
if ( ! isset( $content_width ) )
	$content_width = 985;	

/**
 * Make the site private redirecting ant logged out user to login screen.
 * 
 */
function make_wordpress_site_private(){

    global $wp;

    if (!is_user_logged_in() && $GLOBALS['pagenow'] !== 'wp-login.php'){
        wp_redirect(wp_login_url($wp -> request));
        exit;
    }
}
//add_action('wp', 'make_wordpress_site_private');


 /**
 * Global enqueues
 *
 * @since  1.0.0
 * @global array $wp_styles
 */
function lcm_global_enqueues() {
	
	// javascript
	wp_enqueue_script( 'ea-global', get_stylesheet_directory_uri() . '/assets/js/global-min.js', array( 'jquery' ), filemtime( get_stylesheet_directory() . '/assets/js/global-min.js' ), true );

    // Load the custom tabs script.
    wp_enqueue_script( 'simple-tabs', get_stylesheet_directory_uri() . '/assets/js/simple-tabs-min.js', array( 'jquery' ), filemtime( get_stylesheet_directory() . '/assets/js/simple-tabs-min.js' ), true );

	// Move jQuery to footer
	if( ! is_admin() ) {
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
		wp_enqueue_script( 'jquery' );
	}

	// css
	wp_dequeue_style( 'child-theme' );
	wp_enqueue_style( 'lcm-fonts', lcm_theme_fonts_url(), array(), null  );
	wp_enqueue_style( 'lcm-style', get_stylesheet_directory_uri() . '/assets/css/main.css', array(), filemtime( get_stylesheet_directory() . '/assets/css/main.css' ) );

}
add_action( 'wp_enqueue_scripts', 'lcm_global_enqueues' );

/**
 * Gutenberg scripts and styles
 *
 */
function ea_gutenberg_scripts() {
	wp_enqueue_style( 'lcm-fonts', lcm_theme_fonts_url(), array(), null );
	//wp_enqueue_script( 'ea-editor', get_stylesheet_directory_uri() . '/assets/js/editor.js', array( 'wp-blocks', 'wp-dom' ), filemtime( get_stylesheet_directory() . '/assets/js/editor.js' ), true );
}
add_action( 'enqueue_block_editor_assets', 'ea_gutenberg_scripts' );

/**
* Theme Fonts URL
*
*/
function lcm_theme_fonts_url() {
	return 'https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,400;0,700;1,400&display=swap';
}

function ea_child_theme_setup() {

	define( 'CHILD_THEME_VERSION', filemtime( get_stylesheet_directory() . '/assets/css/main.css' ) );

	// General cleanup
	include_once( get_stylesheet_directory() . '/inc/wordpress-cleanup.php' );
	include_once( get_stylesheet_directory() . '/inc/genesis-changes.php' );

	// Theme
	include_once( get_stylesheet_directory() . '/inc/site-logo.php' );
	include_once( get_stylesheet_directory() . '/inc/site-footer.php' );
	include_once( get_stylesheet_directory() . '/inc/login-screen.php' );
	include_once( get_stylesheet_directory() . '/inc/layouts.php' );
	include_once( get_stylesheet_directory() . '/inc/loop.php' );
	include_once( get_stylesheet_directory() . '/inc/navigation.php' );
	include_once( get_stylesheet_directory() . '/inc/markup.php' );
	include_once( get_stylesheet_directory() . '/inc/template-tags.php' );
	include_once( get_stylesheet_directory() . '/inc/helper-functions.php' );
	include_once( get_stylesheet_directory() . '/inc/hidden.php' );

    // Plugin Support
	include_once( get_stylesheet_directory() . '/inc/acf.php' );
	include_once( get_stylesheet_directory() . '/inc/amp.php' );

	// Editor Styles
	add_theme_support( 'editor-styles' );
	add_editor_style( '/inc/gutenberg/style-editor.css' );
	// add_editor_style( '/assets/css/editor-style.css' );

	// Remove image sizes
	remove_image_size( '1536x1536' );
	remove_image_size( '2048x2048' );

	// Adds image sizes.
	// add_image_size( 'lcm-featured-images', 768, 432, true ); // 16:9

    // Tamaño Rift Valley Big con relación 1/5 para la imagen/slide destacado de las rutas.
    add_image_size( 'rv-featured-big', 1024, 683, true );

    // Tamaño Rift Valley con relación 1/5
    add_image_size( 'rv-featured', 985, 656, true );

	/**
	 * Register custom images sizes to use in Gutenberg
	 */
	function lcm_custom_image_sizes( $sizes ) {
		return array_merge( $sizes, array(

		//Add your custom sizes here
		'rv-featured-big' => __( 'Rift Valley Big (1024x683)' ),
		'rv-featured' => __( 'Rift Valley (985x656)' ),
		
		) );
	}
	add_filter( 'image_size_names_choose','lcm_custom_image_sizes' );

	// Gutenberg

	// -- Responsive embeds
	add_theme_support( 'responsive-embeds' );

	// -- Wide Images
	add_theme_support( 'align-wide' );

	// -- Custom line heights.
	add_theme_support( 'custom-line-height' );

	// -- Custom units.
	add_theme_support( 'custom-units' );

	// -- Editor Font Sizes
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name'      => __( 'Small', 'ea_genesis_child' ),
			'shortName' => __( 'S', 'ea_genesis_child' ),
			'size'      => 16,
			'slug'      => 'small'
		),
		array(
			'name'      => __( 'Normal', 'ea_genesis_child' ),
			'shortName' => __( 'M', 'ea_genesis_child' ),
			'size'      => 20,
			'slug'      => 'normal'
		),
		array(
			'name'      => __( 'Large', 'ea_genesis_child' ),
			'shortName' => __( 'L', 'ea_genesis_child' ),
			'size'      => 24,
			'slug'      => 'large'
		),
	) );

	// -- Disable Custom Colors
	// add_theme_support( 'disable-custom-colors' );

	// -- Editor Color Palette
	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => __( 'Yellow', 'ea_genesis_child' ),
			'slug'  => 'yellow',
			'color'	=> '#b3975e',
		),
		array(
			'name'  => __( 'BG Yellow', 'ea_genesis_child' ),
			'slug'  => 'bg-yellow',
			'color'	=> '#c28300',
		),
		array(
			'name'  => __( 'Light grey', 'ea_genesis_child' ),
			'slug'  => 'light-grey',
			'color' => '#acacac',
		),
		array(
			'name'  => __( 'Medium grey', 'ea_genesis_child' ),
			'slug'  => 'medium-grey',
			'color' => '#4e4c4c',
		),
		array(
			'name'  => __( 'Grey', 'ea_genesis_child' ),
			'slug'  => 'grey',
			'color' => '#272626',
		),
		array(
			'name'  => __( 'Dark grey', 'ea_genesis_child' ),
			'slug'  => 'dark-grey',
			'color' => '#1d1b1b',
		),
		array(
			'name'  => __( 'Darker grey', 'ea_genesis_child' ),
			'slug'  => 'darker-grey',
			'color' => '#0f0e0e',
		),
		array(
			'name'  => __( 'Black', 'ea_genesis_child' ),
			'slug'  => 'black',
			'color' => '#000000',
		),
		array(
			'name'  => __( 'White', 'ea_genesis_child' ),
			'slug'  => 'white',
			'color' => '#ffffff',
		),
	) );

    
    // Enable the block-based widget editor
    add_filter( 'use_widgets_block_editor', '__return_true' );

	// // Registers the responsive menus. (/config/responsive-menus.php)
	// if ( function_exists( 'genesis_register_responsive_menus' ) ) {
	// 	genesis_register_responsive_menus( genesis_get_config( 'responsive-menus' ) );
	// }

}
add_action( 'genesis_setup', 'ea_child_theme_setup', 15 );


/**
 * Change the comment area text
 *
 * @since  1.0.0
 * @param  array $args
 * @return array
 */
function ea_comment_text( $args ) {
	$args['title_reply']          = __( 'Leave A Comment', 'ea_genesis_child' );
	$args['label_submit']         = __( 'Post Comment',  'ea_genesis_child' );
	$args['comment_notes_before'] = '';
	$args['comment_notes_after']  = '';
	return $args;
}
add_filter( 'comment_form_defaults', 'ea_comment_text' );


/**
 * Template Hierarchy
 *
 */
function ea_template_hierarchy( $template ) {
	if( is_home() )
		$template = get_query_template( 'archive' );
	return $template;
}
add_filter( 'template_include', 'ea_template_hierarchy' );


/**
 * Remove the P tag from the CF7 forms.
 * 
 */
add_filter('wpcf7_autop_or_not', '__return_false');

/**
 * Load Recaptcha and CF7 CSS/JS only on pages where contact form exists.
 * It uses get_header hook to load the functions before wp_head. 
 * 
 * https://contactform7.com/loading-javascript-and-stylesheet-only-when-it-is-necessary/
 * 
 */
function load_recaptcha_only_with_cf7() {
	global $post;
	if ( is_a( $post, 'WP_Post' ) && !has_shortcode( $post->post_content, 'contact-form-7') ) {
		wp_dequeue_script( 'google-recaptcha' );
		wp_dequeue_script( 'wpcf7-recaptcha' );
        add_filter( 'wpcf7_load_js', '__return_false' );
        add_filter( 'wpcf7_load_css', '__return_false' );
	}
}
add_action('get_header', 'load_recaptcha_only_with_cf7', 22);


/**
 * Posts per page based on CPT
 * 
 * @since 1.2.5
 * @link https://jonchristopher.us/blog/wordpress-posts-per-page-per-custom-post-type/
 *  */ 
function lcm_cpt_posts_per_page($query)
{
    if( !is_admin() ) {
        if ( isset( $query->query_vars['post_type'] ) ) { // Verificar si 'post_type' está definida
            switch ( $query->query_vars['post_type'] )
            {
                case 'etnias':
                case 'viajes':
                case 'lugares':
                case 'parques':
                    $query->query_vars['posts_per_page'] = -1;
                    break;
            }
        }
    }
    return $query; // Asegúrate de siempre retornar la consulta modificada
}
add_filter( 'pre_get_posts', 'lcm_cpt_posts_per_page' );

/**
 * Display Admin bar only to Administrators.
 * 
 */
function remove_admin_bar() {
    if (current_user_can('subscriber')) {
        show_admin_bar(false);
    }
}
add_action('after_setup_theme', 'remove_admin_bar');


/**
 * Hide Dashboard from subscribers.
 * 
 */
function disable_dashboard() {
    if (current_user_can('subscriber') && is_admin()) {
        wp_redirect(home_url());
        exit;
    }
}
add_action('admin_init', 'disable_dashboard');