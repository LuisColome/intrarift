<?php
/**
 * Related posts
 *
 * @package      RiftValley
 * @author       Luis Colomé
 * @since        1.2.5
 * @license      GPL-2.0+
**/

/**
 * 
 * 
 */
function lcm_blog_related_posts() {
    
    if( ! is_admin() && is_singular('post') ) {
    
        global $post;
        
        $term = ea_first_term();

        $args = array(
            'post_type'         => 'post',
            'posts_per_page'    => 3,
            'order'             => 'ASC',
            'orderby'           => 'rand',
            'post_status'       => 'publish',
            'tax_query'         => array(
                array(
                    'taxonomy'    => 'category',
                    'field'       => 'slug',
                    'terms'       => $term->slug,
                ),
            ),
        );
                

            $related = new WP_Query($args);

            if ( $related->have_posts() ) : ?>
                    <div class="related">
                        <div class="related__wrap">
                            <h2 class="realted__title"><?php _e('También te puede interesar', 'riftvalley'); ?></h2>
                            <div class="lcm-posts grid viajes">
                            <?php while ( $related->have_posts() ) : $related->the_post(); ?>
                            
                                <?php // we use the partial archive.php to create the archive loops
                                get_template_part( 'partials/' . 'archive' ); ?>

                            <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
            <?php endif;
            wp_reset_query();

        }
}
add_action( 'genesis_after_endwhile', 'lcm_blog_related_posts', 20 );


/**
 * 
 * 
 */
function lcm_post_after_content_subscriptions(){
	if( ! is_admin() && is_singular('post') ) {

        get_template_part( 'partials/subscriptions' );

	}
}
add_action( 'genesis_after_endwhile', 'lcm_post_after_content_subscriptions', 25 );