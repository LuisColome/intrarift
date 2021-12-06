<?php
/**
 * IntraRift
 *
 * This file adds the landing page template to Intrarift Theme.
 *
 * Template Name: Generador enlaces
 *
 * @package RiftValley
 * @author  Luis Colomé
 * @license GPL-2.0-or-later
 * @link    https://luiscolome.com/
 */

add_filter( 'body_class', 'genesis_sample_landing_body_class' );
/**
 * Adds landing page body class.
 *
 * @since 1.0.0
 *
 * @param array $classes Original body classes.
 * @return array Modified body classes.
 */
function genesis_sample_landing_body_class( $classes ) {

	$classes[] = 'generador-enlaces';
	return $classes;

}

// Removes Skip Links.
remove_action( 'genesis_before_header', 'genesis_skip_links', 5 );

add_action( 'wp_enqueue_scripts', 'genesis_sample_dequeue_skip_links' );
/**
 * Dequeues Skip Links Script.
 *
 * @since 1.0.0
 */
function genesis_sample_dequeue_skip_links() {

	wp_dequeue_script( 'skip-links' );

}

/**
 * Load the script to make the generator work.
 * 
 */
function lcm_generador_enqueues() {

    
    wp_enqueue_script( 'google-generator', get_stylesheet_directory_uri() . '/assets/js/google-generator-min.js', array( 'jquery' ), filemtime( get_stylesheet_directory() . '/assets/js/google-generator-min.js' ), true );

}
add_action( 'wp_enqueue_scripts', 'lcm_generador_enqueues' );



// Runs the Genesis loop.
genesis();
