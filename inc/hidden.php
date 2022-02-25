<?php
/**
 * Hidden box 
 *  
 * This file contains the hidden box for Viajes CPT.
 *
 * @package      RiftValley
 * @author       Luis Colomé
 * @since        1.0.0
 * @license      GPL-2.0+
**/

/**
 * Hidden div with the info form.
 * 
 */
function riftvalley_hidden_box(){

    $title = get_field('intra_form_title', 'option');
    $subtitle = get_field('intra_form_subtitle', 'option');
    $form = get_field('intra_shortcode_form', 'option');
    $phone = get_field('intra_contact_form_phone', 'option');
    $whatsapp = get_field('intra_contact_form_whatsapp', 'option');

	// if ( is_singular('viajes') ) {
        ?>
            <div class="rv-hidden">
                <div class="rv-hidden__wrap">
                    <header class="rv-hidden__header">
                        <button class="rv-hidden__close">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26">
                                <g fill="none" fill-rule="evenodd">
                                    <g fill="#000">
                                        <g>
                                            <g>
                                                <path d="M24.074 4.59L21.892 2.407 13.241 11.059 4.59 2.407 2.407 4.59 11.059 13.241 2.407 21.892 4.59 24.074 13.241 15.423 21.892 24.074 24.074 21.892 15.423 13.241 24.074 4.59" transform="translate(-1367 -48) translate(740) translate(627 48)"/>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </button>
                    </header>
                    <div class="rv-hidden__content">

                        <h2 class="rv-hidden__title"><?php echo $title ?></h2>
                        <p class="rv-hidden__intro"><?php echo $subtitle ?></p>
                        <div class="rv-hidden__form"><?php echo do_shortcode($form) ?></div>
                        
                    </div> <!-- End rv-hidden__content -->
                </div> <!-- End .rv-hidden__wrap -->
                
                <!-- Phone and Whatsapp links outside the wrapper. -->
                <div class="rv-hidden__links">

                    <div class="rv-hidden__links__wrap">

                        <button class="rv-hidden__whatsapp">

                            <a href="https://wa.me/0034<?php echo $whatsapp ?>" class="rv-hidden__whatsapp__link">
                            <svg viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
                                <g fill="none" fill-rule="evenodd">
                                    <g fill="#000">
                                        <path transform="translate(.118 .412)" d="M14.742 0C22.616 0 29 6.308 29 14.09c0 7.78-6.383 14.089-14.258 14.089-2.381 0-4.63-.577-6.603-1.597L0 29l2.5-7.682C1.21 19.205.485 16.732.485 14.09.484 6.307 6.868 0 14.742 0zm-.074 2.487c-6.35 0-11.5 5.148-11.5 11.5 0 2.555.825 4.915 2.242 6.824l.217.283-1.55 4.05 4.143-1.63c1.838 1.245 4.06 1.973 6.448 1.973 6.352 0 11.5-5.149 11.5-11.5 0-6.352-5.148-11.5-11.5-11.5zm-3.374 3.789c.198.114 1.752 2.77 1.752 2.77s.481.819-.367 1.187c-.14.14-.815.73-1.2 1.066l-.164.143-.106.092.016.033.048.096c.415.812 2.778 5.199 5.7 5.635 0 0 1.073-1.102 1.47-1.554-.084 0 .712-.93 1.583 0 .038 0 .422.234.836.495l.312.197c.411.26.774.495.774.495s1.188.452.367 1.922c-.084 0-2.384 2.621-5.066 1.635-.368-.085-8.159-3.16-9.262-9.971.085.083-.337-1.556.651-3.393.085 0 1.47-2.148 2.656-.848z"/>
                                    </g>
                                </g>
                            </svg>
                            <span>Whatsapp</span>
                            </a>
                            
                        </button>
                        <button class="rv-hidden__phone">

                            <a href="tel:0034<?php echo preg_replace("/[^0-9]+/", "", $phone); ?>" class="rv-hidden__phone__link">
                            <svg viewBox="0 0 22 23" xmlns="http://www.w3.org/2000/svg">
                                <g fill="none" fill-rule="evenodd">
                                    <g fill="#000">
                                        <path transform="translate(.607 .608)" d="M.977 1.846c.124 0 2.143-3.133 3.873-1.237.289.166 2.555 4.038 2.555 4.038s.701 1.195-.536 1.73c-.289.29-2.143 1.897-2.143 1.897s3.707 7.703 8.405 8.404c0 0 1.564-1.607 2.142-2.266-.123 0 1.038-1.355 2.309 0 .124 0 2.802 1.73 2.802 1.73s1.73.658.535 2.801c-.123 0-3.477 3.821-7.388 2.383C12.996 21.204 1.636 16.72.029 6.79c.123.123-.493-2.266.948-4.944z"/>
                                    </g>
                                </g>
                            </svg>
                            <span><?php echo $phone ?></span>
                            </a>
                            
                        
                        </button>

                    </div>                    
                </div> <!-- End rv-hidden__links -->
            </div><!-- End .rv-hidden -->
        <?php
	// }
}
add_action( 'genesis_after', 'riftvalley_hidden_box', 12 );

/**
 * Contact button that opens the hidden box
 * 
 */
function riftvalley_floating_button(){

    // Add the floating button with the correct class to activate the hidden box
	// if( is_singular('viajes') ) {
        ?>
        <div class="rv-floating-button">
            <button class="rv-floating-button__link rv-hidden__open wp-block-button__link" >
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="24" viewBox="0 0 20 24">
                <g fill="none" fill-rule="evenodd">
                    <g fill="#000" fill-rule="nonzero">
                        <g>
                            <g>
                                <g>
                                    <path d="M2 5.176c-1.1 0-1.99.891-1.99 1.979L0 16.845c0 1.089.9 1.979 2 1.979h16c1.1 0 2-.89 2-1.979v-9.69c0-1.089-.9-1.979-2-1.979H2zm0 11.67v-7.35l8 4.946 8-4.946v7.35H2zM2 7.13v.024h16V7.13l-8 4.97-8-4.97z" transform="translate(-60.000000, -632.000000) translate(0.000000, 626.000000) translate(60.000000, 6.000000) translate(0.000000, -0.000000)"/>
                                </g>
                            </g>
                        </g>
                    </g>
                </g>
            </svg>
                Solicita información
            </button>
        </div>
        <?php   
    // }
}
//add_action( 'genesis_after', 'riftvalley_floating_button', 14 );

