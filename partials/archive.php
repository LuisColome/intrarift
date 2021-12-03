<?php 

/**
 * Archive partial (native Posts)
 *
 * @package      RiftValley
 * @author       Luis Colomé
 * @since        1.0.0
 * @license      GPL-2.0+
**/

?>
<article class="lcm-post">

	<a class="lcm-post__image-link" href="<?php echo get_permalink() ?>" tabindex="-1" aria-hidden="true"><?php echo get_the_post_thumbnail( get_the_ID(), 'rv-featured' ) ?></a>

    <div class="lcm-post__wrap">

        <header class="lcm-post__header">
            <?php ea_entry_category(); ?>
            <h2 class="lcm-post__title"><a href="<?php echo get_permalink() ?>"><?php echo get_the_title() ?></a></h2>
        </header>
        <div class="lcm-post__content">
            <p class="lcm-post__intro">
                <span class="excerpt"><?php echo wp_trim_words( get_the_content(), 12, '... ' ); ?> </span>
            </p>
        </div>

    </div>
	

</article>