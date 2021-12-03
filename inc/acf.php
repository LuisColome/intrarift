<?php
/**
 * ACF Customizations
 *
 * @package      EAGenesisChild
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

class BE_ACF_Customizations {

	public function __construct() {

		// Only allow fields to be edited on development
		if ( ! defined( 'WP_LOCAL_DEV' ) || ! WP_LOCAL_DEV ) {
			//add_filter( 'acf/settings/show_admin', '__return_false' );
		}

		// Register options page
		add_action( 'init', array( $this, 'register_options_page' ) );

		// Register Blocks
		add_action('acf/init', array( $this, 'register_blocks' ) );
	}

	/**
	 * Register Options Page
	 *
	 */
	function register_options_page() {
	    if ( function_exists( 'acf_add_options_page' ) ) {
	        acf_add_options_page( array(
	        	'title'      => __( 'Rift Valley Options', 'riftvalley' ),
	        	'capability' => 'manage_options',
	        ) );
	    }
	}

	/**
	 * Register Blocks
	 * @link https://www.billerickson.net/building-gutenberg-block-acf/#register-block
	 *
	 * Categories: common, formatting, layout, widgets, embed
	 * Dashicons: https://developer.wordpress.org/resource/dashicons/
	 * ACF Settings: https://www.advancedcustomfields.com/resources/acf_register_block/
	 */
	function register_blocks() {

		if( ! function_exists('acf_register_block_type') )
			return;

        // Register Incluye list block.
		acf_register_block_type(array(
			'name'              => 'rv-listas-incluye',
			'title'             => __('Listados SI incluye/ NO incluye'),
			'description'       => __('Bloque personalizado para añadir las listas de SI incluye / NO incluye.'),
			'render_template'   => 'partials/blocks/listado-incluye/block-incluye.php',
			'category'          => 'formatting',
			'icon'              => 'list-view',
			'keywords'          => array( 'listas', 'listados', 'incluye', 'no', 'riftvalley' ),
		));

        // Register Salidas y Precios Block.
		acf_register_block_type(array(
			'name'              => 'rv-salidas-precios',
			'title'             => __('Salidas / Precios'),
			'description'       => __('Bloque personalizado listar las posibles salidas y precios.'),
			'render_template'   => 'partials/blocks/salidas-precios/salidas-precios.php',
			'category'          => 'formatting',
			'icon'              => 'calendar-alt',
			'keywords'          => array( 'salidas', 'listados', 'precios', 'incluye', 'no', 'riftvalley' ),
		));

        acf_register_block_type( array(
            'name'			    => 'viajes-slider',
            'title'			    => __( 'Viajes slider', 'riftvalley' ),
            'render_template'	=> 'partials/blocks/viajes-slider/viajes-slider.php',
            'category'		    => 'formatting',
            'icon'			    => 'slides',
            'mode'			    => 'auto',
            'enqueue_assets'    => function(){
                wp_enqueue_style( 'swiper.css', get_stylesheet_directory_uri() . '/partials/blocks/viajes-slider-destacados/css/swiper-bundle.min.css' , array(), '7.0.6', 'all' );
                wp_enqueue_script( 'swiper.js', get_stylesheet_directory_uri() . '/partials/blocks/viajes-slider-destacados/js/swiper-bundle.min.js', array('jquery'), '7.0.6', true );
                wp_enqueue_script( 'swiper-select-init.js', get_stylesheet_directory_uri() . '/partials/blocks/viajes-slider-destacados/js/swiper-bundle-init.js', array('jquery'), '1.0.0', true );
            },
            'keywords'		    => array( 'Rift', 'Valley', 'Viajes', 'slider', 'loop', 'carousel' )
        ));

        acf_register_block_type( array(
            'name'			    => 'viajes-slider-destacados',
            'title'			    => __( 'Viajes slider destacados', 'riftvalley' ),
            'render_template'	=> 'partials/blocks/viajes-slider-destacados/viajes-slider-destacados.php',
            'category'		    => 'formatting',
            'icon'			    => 'slides',
            'mode'			    => 'auto',
            'enqueue_assets'    => function(){

                wp_enqueue_style( 'swiper.css', get_stylesheet_directory_uri() . '/partials/blocks/viajes-slider-destacados/css/swiper-bundle.min.css' , array(), '7.0.6', 'all' );
                wp_enqueue_script( 'swiper.js', get_stylesheet_directory_uri() . '/partials/blocks/viajes-slider-destacados/js/swiper-bundle.min.js', array('jquery'), '7.0.6', true );
                wp_enqueue_script( 'swiper-init.js', get_stylesheet_directory_uri() . '/partials/blocks/viajes-slider-destacados/js/swiper-bundle-init.js', array('jquery'), '1.0.0', true );
            },
            'keywords'		    => array( 'Rift', 'Valley', 'Viajes', 'slider', 'loop', 'carousel', 'destacados', 'featured' )
        ));

        acf_register_block_type( array(
            'name'			    => 'viajes-slider-proximas',
            'title'			    => __( 'Viajes slider Próximas salidas', 'riftvalley' ),
            'render_template'	=> 'partials/blocks/viajes-slider-proximas/viajes-slider-proximas.php',
            'category'		    => 'formatting',
            'icon'			    => 'slides',
            'mode'			    => 'auto',
            'enqueue_assets'    => function(){
                wp_enqueue_style( 'swiper-next.css', get_stylesheet_directory_uri() . '/partials/blocks/viajes-slider-proximas/css/swiper-bundle.min.css' , array(), '7.0.6', 'all' );
                wp_enqueue_script( 'swiper-next.js', get_stylesheet_directory_uri() . '/partials/blocks/viajes-slider-proximas/js/swiper-bundle.min.js', array('jquery'), '7.0.6', true );
                wp_enqueue_script( 'swiper-next-init.js', get_stylesheet_directory_uri() . '/partials/blocks/viajes-slider-proximas/js/swiper-bundle-init.js', array('jquery'), '1.0.0', true );
            },
            'keywords'		    => array( 'Rift', 'Valley', 'Viajes', 'slider', 'loop', 'carousel', 'proximas', 'salidas', 'featured' )
        ));

        acf_register_block_type( array(
            'name'			    => 'timeline-riftvalley',
            'title'			    => __( 'Timeline para Viajes', 'riftvalley' ),
            'render_template'	=> 'partials/blocks/timeline/timeline.php',
            'category'		    => 'formatting',
            'icon'			    => 'excerpt-view',
            'mode'			    => 'auto',
            'keywords'		    => array( 'Rift', 'Valley', 'Viajes', 'timeline', 'detalles', 'dias' )
        ));

        acf_register_block_type( array(
            'name'			    => 'member-riftvalley',
            'title'			    => __( 'Miembro del equipo', 'riftvalley' ),
            'render_template'	=> 'partials/blocks/miembro/miembro.php',
            'category'		    => 'formatting',
            'icon'			    => 'admin-users',
            'mode'			    => 'auto',
            'keywords'		    => array( 'Rift', 'Valley', 'Viajes', 'miembro', 'conocenos', 'equipo' )
        ));

        acf_register_block_type( array(
            'name'			    => 'phone-whatsapp-riftvalley',
            'title'			    => __( 'Teléfono y Whatsapp', 'riftvalley' ),
            'render_template'	=> 'partials/blocks/phone/phone-whats.php',
            'category'		    => 'formatting',
            'icon'			    => 'phone',
            'mode'			    => 'auto',
            'keywords'		    => array( 'Rift', 'Valley', 'telefono', 'whatsapp', 'contacto', 'llamar' )
        ));

	}
}
new BE_ACF_Customizations();