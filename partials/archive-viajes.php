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

                <!-- Viaje - Guía experto -->
                <?php
                $guia = get_field('rv_expert_guide', $post->ID);
                if( $guia ) :?>
                <div class="viaje__guia">
                    <i class="viaje__guia__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" xmlns:v="https://vecta.io/nano"><g fill="#d89100" transform="translate(0 -1)"><path fill="#d89100" d="M17.2.963a.77.77 0 0 1 .396.069L24.61 4.44c.239.114.389.346.389.6s-.15.485-.39.601l-6.764 3.291v6.87c.663.421 1.129.95 1.245 1.644 1.13 5.4.773 5.588-8.374 5.594H8.685c-8.843-.007-9.21-.197-8.396-5.594.338-1.99 3.617-2.657 5.703-3.29a5.98 5.98 0 0 0 7.4 0 56.82 56.82 0 0 1 3.31 1.135V1.841c0-.373.027-.878.422-.878h.076zm-7.51 4.11c2.546 0 4.61 1.946 4.61 4.344s-2.064 4.344-4.61 4.344-4.609-1.945-4.609-4.344 2.064-4.343 4.61-4.343z" transform="translate(0 1)"/></g></svg>
                    </i>
                    <div class="viaje__guia__text"><?php echo $guia ?></div>
                </div>
                <?php endif; ?>

                <!-- Viaje Próxima salida + primera linea info -->
                <?php
                $first_info_line = get_field('rv_info_loops_first', $post->ID);

                if ($first_info_line) { ?>
                    <span class="viaje__info"><?php echo $first_info_line ?></span>
                <?php 
                }else{
                    $counter = 0;
                    // Check if there is dates on the first list.
                    if( have_rows('rv_salidas_first', $post->ID) ) {?>
                        <?php // Loop through rows.
                        while( have_rows('rv_salidas_first', $post->ID) ) { the_row(); 
                            if ($counter) {
                                // if already did output of first, skip the rest
                                continue;
                            }
                            $date = date_i18n('j \d\e M. Y', strtotime(get_sub_field('rv_salida_date_first', $post_id))); ?>
                            <span class="viaje__info">Próxima salida: <?php echo $date ?></span>
                        <?php $counter++;
                        }
                    }
                } ?>
            
                <!-- Viaje segunda linea info -->
                <?php
                $second_info_line = get_field('rv_info_loops_second', $post->ID);
                if ( $second_info_line ) :?>
                    <span class="viaje__info"><?php echo $second_info_line ?></span>
                <?php endif; ?>
                
                <!-- Experiencias - Tag like -->
                <?php
                // We get the experiencias taxonomy terms. 
                $terms = get_the_terms( $post->ID, 'experiencias'); 
                if ( $terms && ! is_wp_error( $terms ) ) { ?>
                    <div class="viaje__experiencias">
                    <?php 
                    foreach($terms as $term) {
                        echo '<span class="viaje__experiencia">' . $term->name . '</span>';
                    } ?>
                    </div>
                <?php
                } ?>
            </div> <!-- End viaje__content -->
            
            <!-- Viaje Footer -->
            <div class="viaje__footer">
                <?php $dias = get_field('rv_days', $post->ID);
                      $precio = get_field('rv_price_group', $post->ID) ? get_field('rv_price_group', $post->ID) : get_field('rv_price_private', $post->ID);
                      //$precio_private = get_field('rv_price_private', $post->ID); ?>
                <div class="viaje__details">
                    <span class="viaje__dias"><?php echo $dias ?> días, </span><span class="viaje__precio">desde <?php echo $precio ?>€</span>
                </div>
                <a class="viaje__read-more-link wp-block-button__link" href="<?php echo get_permalink() ?>" rel="nofollow" tabindex="-1" aria-hidden="true">Ver ruta<span class="screen-reader-text"> of <?php echo get_the_title() ?></span></a>
            </div> <!-- End viaje__footer -->
                
        </div><!-- End viaje__body -->

    </div> <!-- End viaje__wrap -->
</article>