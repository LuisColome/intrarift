<?php
/**
 * Archive partial for Viajes CPT
 *
 * @package       RiftValley
 * @author        Luis Colomé
 * @link          https://www.billerickson.net/using-template-parts-with-genesis/
 * @since         0.9.5.1
 * @license       GPL-2.0+
**/

?>

<article class="viaje entry listing-item" itemtype="https://schema.org/CreativeWork">
    <div class="viaje__wrap">
    
        <!-- Viaje Header -->
        <div class="viaje__header">

            <!-- Viaje Image -->
            <figure class="viaje__image">
                <a class="viaje__image__link" href="<?php echo get_permalink() ?>">
                    <?php
                    echo genesis_get_image( array(
                        'size'     => 'rv-featured',
                        'itemprop' => 'image',
                        'attr' => array(
                            'class'    => 'viaje__image__img',
                        ),
                    ) ); ?>
                </a>
                <div class="viaje__image__gradient"></div>
            </figure> <!-- End viaje__image -->

            <!-- Viaje Info -->
            <div class="viaje__header__info">
                <?php $terms = get_the_terms( $post->ID, 'destinos');
                    if ( $terms && ! is_wp_error( $terms ) ) { ?>
                        <div class="viaje__pais"><span class="viaje__guion">—</span><span class="viaje__paises">
                        <?php foreach($terms as $term) {
                            $entry_terms .= $term->name . ', ';
                        } 
                        $entry_terms = rtrim( $entry_terms, ', ' );
                        echo $entry_terms?>
                        <span class="viaje__guion">—</span></span></div>
                    <?php } 
                ?>
            
                <h2 class="viaje__title" itemprop="headline">
                    <?php
                    $alt_title = get_field('rv_alt_title', $post->ID);
                    $alt_title_second_line = get_field('rv_alt_title_second_line', $post->ID);
                    if( $alt_title && $alt_title_second_line ) { ?>
                        <a class="viaje__title__link viaje__title__link-alt" href="<?php echo get_permalink() ?>"><span><?php echo $alt_title ?></span><span><?php echo $alt_title_second_line ?></span></a>
                    <?php }elseif( $alt_title ){ ?>
                        <a class="viaje__title__link" href="<?php echo get_permalink() ?>"><?php echo $alt_title ?></a>
                    <?php }else{ ?>
                        <a class="viaje__title__link" href="<?php echo get_permalink() ?>"><?php the_title() ?></a>
                    <?php } ?>
                </h2>
            </div><!-- End viaje__header__info -->

        </div><!-- End viaje__header -->

        <!-- Viaje Main -->
        <div class="viaje__main">

            <!-- Viaje Content -->
            <div class="viaje__content">


            </div> <!-- End viaje__content -->
            
            <!-- Viaje Footer -->
            <div class="viaje__footer">
                <a class="viaje__read-more-link wp-block-button__link" href="<?php echo get_permalink() ?>" rel="nofollow" tabindex="-1" aria-hidden="true"><?php _e('Desargar paquerte completo', 'intrarift') ?></span></a>
            </div> <!-- End viaje__footer -->
                
        </div><!-- End viaje__body -->

    </div> <!-- End viaje__wrap -->
</article>