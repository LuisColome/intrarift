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

<article class="pais entry listing-item" itemtype="https://schema.org/CreativeWork">
    <div class="pais__wrap">
    
        <!-- Viaje Header -->
        <div class="pais__header">

            <!-- Viaje Image -->
            <figure class="pais__image">
                    <?php
                    if( has_post_thumbnail() ) {
                        echo genesis_get_image( array(
                            'size'     => 'rv-featured',
                            'itemprop' => 'image',
                            'attr' => array(
                                'class'    => 'pais__image__img',
                            ),
                        ) ); 
                    }else { ?>
                        <img class="viaje__image__img" src="<?php echo get_stylesheet_directory_uri() ?>/images/fallback.png" alt="Pais imagen">
                    <?php } ?>
                <div class="pais__image__gradient"></div>
            </figure> <!-- End pais__image -->

            <!-- Viaje Info -->
            <div class="pais__header__info">
            
                <h2 class="pais__title" itemprop="headline">
                    <?php
                    $alt_title = get_field('rv_alt_title', $post->ID);
                    $alt_title_second_line = get_field('rv_alt_title_second_line', $post->ID);
                    if( $alt_title && $alt_title_second_line ) { ?>
                        <span><?php echo $alt_title ?></span><span><?php echo $alt_title_second_line ?></span>
                    <?php }elseif( $alt_title ){ ?>
                        <?php echo $alt_title ?>
                    <?php }else{ ?>
                        <?php the_title() ?>
                    <?php } ?>
                </h2>
            </div><!-- End pais__header__info -->

        </div><!-- End pais__header -->

        <!-- Viaje Main -->
        <div class="pais__main">

            <!-- Viaje Content -->
            <div class="pais__content">

                <ul class="pais__intralinks">

                    <?php 
                    $pais_photos_link = get_field('intra_destino_fotos_download');
                    if( $pais_photos_link) : ?>
                    <li class="pais__intralink">
                        <a href="<?php echo esc_url($pais_photos_link) ?>" class="pais__intralink__link">
                            <span class="pais__intralink__icon">
                                <svg width="26" height="26" viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.014 4.829s-.116.038-.038.038c.31.04.232.04.581.04.272 0 .272-.04.31-.04h.504c-.349.04.62.04.31.078h.35c-.194 0-.194-.039-.04-.039.466 0 .776.039 1.242.039h.543c.116 0 .27-.039.426 0 .31 0 .543.155.582.233l-.009-.002.015.01.032.03.059.058.058.059c.077.116.155.194.232.31.04.116.078.194.156.31-.024 0-.061-.056-.095-.109l-.006-.007.023.039c.078.129.155.258.233.376l.116.166.078.155.038.04c.117.154-.077-.078.04.116 0-.04.077.116.154.232 0 .039.116.155.31.155h.698c-.038-.271-.038-.543-.038-.736 0-.233.077-.388.116-.427l.046-.065c.06-.08.109-.129.109-.129.078-.039.194-.116.31-.194l.088-.037a.592.592 0 0 1 .184-.04c-.155.039-.078 0-.117.039h1.396a.624.624 0 0 1-.191.019h-.164c-.074.001-.125.005-.11.02h.775c.466-.04.853.348.892.814v.814c1.125 0 2.055.93 2.055 2.055v.737c0 .426.04.892.04 1.318-.04 1.202.038 2.094.038 3.063l-.001-.01.011 1.357.019 1.416.01 1.425.038.388c0 .194-.038.388-.077.581a2.025 2.025 0 0 1-.543.97c-.271.271-.62.465-.97.582a2.289 2.289 0 0 1-.542.077h-.504c-.737.039-1.551 0-2.366.039l.077-.002h-.027c-.15-.004-.421-.012-.44-.03l.003-.007H12.74c-.261-.001-.504-.007-.408-.039-.466 0-1.474 0-1.9.04h-.466c.388 0 .427.038.582.038-.93.039-1.9.039-2.986.077l.053-.002-.184-.012a20.24 20.24 0 0 0-.997-.023l-1.702-.001a2.489 2.489 0 0 1-1.241-.504c-.388-.31-.62-.698-.776-1.125a1.97 1.97 0 0 1-.116-.66v-2.287c0-1.55.039-3.063.039-4.537V8.861c.039-.426.194-.814.388-1.124.271-.427.659-.737 1.124-.93 0-.04.155-.078.388-.117.116-.039.232-.039.388-.039h.387c.504.039 1.086.078 1.164.116.387-.038.853-.077 1.357-.077h1.163l.039-.039c.116-.233.271-.465.426-.698l.233-.349-.08.119-.114.219-.116.204-.112.187.15-.225c0 .035 0 .039.142-.187l.052-.084s.078-.117.155-.272c.078-.116.233-.349.35-.426.193-.155.31-.194.426-.233.078 0 .194-.039.465-.077zM22.26 13.01c-.349 0-.698.039-1.047.039h.078c-1.163 0-2.327.039-3.49.039.039.077.039.155.078.232.077.156.077.31.116.466.039.31.077.62.039.93 0 .62-.155 1.241-.388 1.823-.233.62-.66 1.163-1.125 1.667-.077.039-.426.35-.387.272a9.899 9.899 0 0 1-.815.542.675.675 0 0 0-.271.117 6.67 6.67 0 0 1-1.629.426c-.581.039-1.202 0-1.745-.155l.117.039c-.272-.078-.582-.194-.504-.194-.194-.077-.504-.194-.815-.349a4.23 4.23 0 0 1-.426-.233c-.116-.077-.233-.155-.31-.193l.077.077c-.194-.116-.349-.271-.504-.426-.155-.156-.349-.31-.465-.505a3.913 3.913 0 0 1-.529-.76l-.1-.2.018.042.03.065c0 .04.038.078.038.117-.078-.117-.116-.272-.194-.388-.116-.388-.31-.97-.349-1.629 0-.31 0-.698.039-1.047.039-.193.077-.348.116-.542l.039-.078v-.039c-1.202-.038-2.404-.038-3.063-.038H3.84v5.39c0 .27 0 .542.039.697.077.31.271.543.542.62 0 0 .078.04.194.078.078.039.117.039.233.039h.349c.504.039.97.078 1.047.116 1.435-.194 3.606-.116 5.428-.038h-1.318c.35 0 .31.038.698.038 0 0-.116.04-.039.04.233.038.155.038.466.038.232 0 .271-.039.271-.039h.465c-.31.039.543.039.272.078h.31c-.155 0-.116-.04 0-.04.426 0 .698.04 1.086.04h.155c.388.038 1.085-.04 1.202 0h.775c.04.038-.155.038-.194.038h-.038c-.194 0-.31.04-.427.04l.015-.002.21-.014c.239-.008.508 0 .732-.008l.206-.016h.194c.155 0-.116.04.078.04h.232c.078.038 1.862-.04 2.017-.04.021 0 .027.002.02.004l-.013.002.025-.001.136-.004H19.778c-.117 0-.04.038-.078.038h1.202c-.039.039-.426 0-.388.039h.66a1.25 1.25 0 0 0 1.24-1.24h-.116v-3.413c0-.349-.039-.776-.039-1.125zm-9.073-2.365h-.427c-.155 0-.31.039-.426.077l.034-.01c.048-.02-.224.006-.19-.028l-.348.116c-.04 0-.078.039-.117.039a4.252 4.252 0 0 0-1.163.62h.039c-.117.078-.194.155-.194.117-.116.116-.35.348-.427.504l-.116.116c.078-.078.116-.078.155-.116-.194.271-.388.542-.504.891l.155-.232-.116.232a3.33 3.33 0 0 0-.388 1.319 4.382 4.382 0 0 0 .116 1.357c.233 1.047 1.009 1.9 1.862 2.288.155.077.271.116.426.155 0 0 .66.232.698.31.31-.039.62-.078 1.008-.078.388-.038.776-.077 1.125-.193-.31.116-.66.193-.97.232h.117c0 .039 0 .039.116.039 0 0 .194-.039.271-.078.117-.038.117.04.272-.038 0 0-.039.038 0 .038.116 0 .077 0 .194-.038.077-.04.077-.078.077-.078a.294.294 0 0 1 .155-.077c-.077.116.233-.04.156.038.038 0 .077 0 .116-.038-.078 0-.078 0-.039-.04.155-.077.271-.116.388-.193l.039-.039c.155-.077.31-.31.387-.31h.04l.038-.039c.039-.077.077-.155.155-.194l-.039.078-.028.066-.015.033.036-.054c.053-.069.116-.13.17-.19l.07-.088.039-.039.01-.008c.007.003-.036.073.028.008-.038 0 0-.038.04-.077.038 0 .154-.155.232-.35.077-.154.116-.348.155-.387.039-.039 0 .078-.078.233 0 .02-.002.039-.006.057l-.018.054c.03-.031.074-.146.111-.253l.049-.144.02-.063c0-.039.038-.078.038-.117l.029-.056h.005l.005.018a.419.419 0 0 0 .116-.272l.023-.063c.019-.068.026-.14.055-.17.039 0-.039.156 0 .156.116-.35.155-.698.155-1.086 0-.504-.078-1.008-.349-1.512a3.41 3.41 0 0 0-.233-.388c-.155-.427-.426-.66-.659-.892v.039c-.737-.737-1.706-1.163-2.675-1.202zm-.297.458.22.007h.114c.127.002.475.013.855.117.387.116.775.31.775.349a.12.12 0 0 0 .078.038c.232.155.387.31.581.504.388.388.698.892.853 1.358.04.116 0 .193.194.232.155.504.155 1.202 0 1.784-.155.543-.504 1.047-.853 1.473a3.303 3.303 0 0 1-2.171.97l-.096.003c-.106.01-.137.028-.292-.003-.116-.04.233-.04.155-.078.155-.039.233-.039.349-.077.116 0 .194-.04.349-.078.078-.039.194-.078.31-.155a3.603 3.603 0 0 1-1.124.194c-.31 0-.582-.039-.853-.117h-.078l.039.04a.416.416 0 0 0 .233.077h.038c.04 0 .078.039.117.039-.04 0 .038.038.077.038h.039a.17.17 0 0 1 .116.04c.117 0 .233 0 .155-.04.194.04-.155.155.04.155 0 .012-.098.04-.195.04h-.116l-.023-.02c-.028-.02-.047-.02-.016-.02-.077 0-.155-.038-.194-.038l-.041-.001-.036-.018-.039-.001-.039-.02h-.116a2.672 2.672 0 0 1-.31-.115c-.04 0-.155-.078-.194-.078l.085.05-.013.006c-.008 0-.019 0-.03-.002l-.042-.015h-.039c-.039 0-.504-.117-.543-.155-.039 0-.039-.04-.077-.04l-.019-.006c-.032-.012-.098-.042-.098-.07-.038 0-.077-.04-.077-.04-.117-.038-.117-.116-.233-.193v-.039c-.039-.078-.039-.039-.116-.116-.039-.04-.078-.117-.117-.155a3.009 3.009 0 0 1-.62-.931c-.039.039.078.155.039.155a3.313 3.313 0 0 1-.35-.93c-.038-.35-.077-.699-.038-1.048.039-.232.116-.387.194-.62v.039c0-.078.116-.543.155-.582.116-.194.116-.116.194-.31.039 0 .077-.039.116-.116.039-.078.117-.155.155-.233l.466-.465c-.117.077-.04-.04.232-.155.078-.04.078-.078.155-.117.078-.038.194-.116.272-.194.465-.232 1.086-.349 1.667-.31zm.142 1.132-.063.002.026.004c.053.026-.061.117-.03.142l.028.007.01.006-.021.027.01.006c.04 0-.038 0-.115.038h-.117c-.039.04-.116.04-.116.04-.039 0-.116.038-.116 0 .038-.04.077-.04.116-.04h-.078c-.038 0-.077.04-.077.04h-.155.004-.014l-.07.008a.033.033 0 0 1-.01.02l-.027.01-.027.01c-.073.042-.244.19-.244.223 0 .038-.039.038-.039.038l-.008.008c-.02.019-.07.062-.07.031-.038 0-.038.039-.038.039-.039.077-.117.039-.155.116h-.04c-.038.039 0 .039-.077.078-.038 0-.077 0-.116.039-.155.155-.31.349-.426.542.038 0 .038-.077.077-.077a2.561 2.561 0 0 0-.194.581c-.039.233-.039.466-.039.66 0 .155-.038.271 0 .426v-.039c0 .033.108.227.144.313l.012.036c.038.117 0 .078.077.194 0 .039 0 .078.039.117l.116.116c.116.116.194.233.31.31-.038-.116.04-.039.155.116.04.04.078.04.117.078.039 0 .116.039.194.039.31.116.659.31 1.047.31h.077a2.7 2.7 0 0 0 .543-.116c.271-.078.465-.233.504-.233.039 0 .039-.039.039-.039.116-.116.271-.194.388-.31.232-.233.426-.582.542-.775.04-.078.078-.117.078-.194.078-.35.039-.776-.078-1.125a2.301 2.301 0 0 0-.542-.892c-.35-.387-.815-.62-1.319-.736l-.052-.017c-.05-.008-.093.007-.18-.022-.078 0 .155 0 .116-.039h.233c.077 0 .155 0 .271.039.039-.039.116-.039.233 0l-.004-.001-.16-.06a2.04 2.04 0 0 0-.508-.09l-.181-.004zm-.543.581c.155-.077.388 0 .581 0h.04s.193 0 .348.117c.155.077.233.31.194.31.039.155 0 .233-.039.504-.077.271-.349.426-.581.426-.04-.038-.04-.038-.078-.038a.844.844 0 0 0-.31.194c-.078.077-.155.155-.155.271-.039.039-.039.078-.039.116a.719.719 0 0 1-.078.272.6.6 0 0 1-.426.31l-.046.005c-.036.01-.051.024-.11-.005l.039.014v.025l-.012.006-.007.003h.03c.064.001.104.008.12.033l.008.033H11.9l-.04-.033a.225.225 0 0 0-.036-.02l-.026-.01-.013.007a.406.406 0 0 1-.038.013l-.035.007h-.077v-.04l-.078-.038c-.039-.039-.077-.039-.077-.078l-.038-.038c-.023-.026-.04-.052-.04-.078-.039-.039-.039-.077-.078-.077 0 .077.04.155.078.193-.039 0-.039-.038-.078-.038v-.04l-.077-.077c0 .04 0 .04-.039 0l-.014-.014c-.045-.046-.18-.186-.18-.218v-.04l-.005-.011c-.01-.022-.024-.066.005-.066v-.038c0-.078.04-.078.04-.117h.038v-.039c0-.038.039-.038.039-.077 0-.116.077-.233.116-.35-.039 0 0 .04-.039.04.078-.194.155-.466.31-.62.04-.04.155-.078.194-.117l.009-.016c.02-.04.077-.14.108-.14.077-.038.077-.038.116-.077 0 .04.039.04.039 0l.077-.077c.078-.039.117-.078.194-.117-.077 0-.039-.077.078-.038.038 0 .038-.04.077-.04l.078-.077zm-1.319-6.592h-.116l-.116.117c-.039 0-.039.039-.039.039l-.039.038c.078-.232-.271.388-.194.155l-.115.19.028-.038c.04-.06.043-.06.024 0l-.014.042a7.724 7.724 0 0 1-.466.737c-.038.116 0 .039-.038.116-.078.156-.233.31-.427.427-.194.116-.349.155-.426.155h-.66c0-.039.117-.039.156-.039h.038a.774.774 0 0 0 .35-.077c-.272.077-.66 0-.931.038h-.155c-.117 0 .077-.038-.078-.038h-.194c-.077-.04-1.512.038-1.628.038-.018 0-.018-.001-.004-.004l.007-.001-.07.003-.06.002h-.455c.116 0 .039-.038.077-.038h-.62v.038h-.116a1.25 1.25 0 0 0-1.241 1.241v2.83c.271 0 .543-.038.775-.038.854.039 1.435-.039 2.133-.039h-.039l1.474-.038h.698a.083.083 0 0 0 .077-.078l.078-.116c.077-.117.155-.194.233-.31.31-.388.659-.776 1.085-1.047a5.246 5.246 0 0 1 1.319-.66c.504-.193 1.047-.232 1.59-.271h.05l.084.003c.025-.008.058-.007.123.025l-.056-.023c.104.005.205.015.186.034.272.039.504.039.776.116.038.039.116.039.232.078.388.116.815.31 1.241.542.388.233.776.543 1.086.892l-.039-.077c.194.155.349.388.271.349.04.039.117.155.194.232.078.078.117.194.194.272l.039.039h.155c.078-.04.194-.04.272-.04h.349c-.31 0-.31-.038-.427-.038.62-.039 1.318-.039 2.055-.078h-.008l.132.002c.462.005 1.15.03 1.886.036l.278.001V9.327a.947.947 0 0 0-.776-.854h-4.204c-.1-.002-.216-.01-.332-.038-.35-.078-.66-.31-.892-.62-.039-.04-.194-.31-.388-.66l-.233-.465-.028-.058a.416.416 0 0 1-.05-.136v-.078c-.038-.038-.077-.038-.116-.038h-.155c-.155 0-.349.038-.504.038H13.38c-.776 0-1.551-.038-2.288-.077h1.047c-.31 0-.272-.039-.582-.039-.039 0 .039-.039 0-.039l-.135-.027c-.063-.012-.098-.012-.253-.012zM6.135 8.621l.032.008h.04c.154 0 .232.038.387.038h.853c.077.04.116.078.194.078.31.077.659.388.737.814v.892c0 .078 0 .233-.04.349a1.572 1.572 0 0 1-.193.349c-.155.233-.427.349-.66.388l-.057.003c-.063.01-.082.028-.175-.003-.077-.039.116-.039.078-.078.193-.039.232-.116.387-.194.04-.038.078-.077.117-.155-.117.155-.31.233-.543.233h-.543l.039.039h.194c0 .038.038.038.038.038h.04c.038 0 .077.04.077.04.077 0 .116 0 .077-.04.117 0-.077.156.04.156-.015.016-.03.038 0 .038 0 0-.078 0-.117.04h-.078l-.022-.023-.012-.012-.005-.005h-.116c0-.038-.077 0-.077-.038l-.05-.01c-.037-.012-.08-.03-.106-.03h-.116c.026.014.052.027.078.038h.002c-.002.002-.002.019-.014.03l-.027.01-.04.008c-.07.02-.2.07-.232.07h-.038l-.012-.017c-.022-.007-.066.007-.066-.022h-.039c-.077.039-.077-.039-.155 0v-.039h-.077s-.04-.038-.078-.038c-.194 0-.349-.04-.543-.04 0 .04.078 0 .078.04H5.12c-.077 0-.193-.04-.31-.078a1.072 1.072 0 0 1-.504-.427c-.077-.116-.039-.232-.077-.387v.038c0-.038-.04-.116-.04-.193v-.35c.04 0 .04-.038.04-.077v-.504c-.04.078-.078-.039.038-.194.04-.039 0-.077.04-.116 0-.039 0-.117.038-.194.077-.116.233-.272.388-.35.194-.077.387-.077.543-.077h.038c.04.04.815-.077.853-.038zm-.511 1.297v.046h-.011l-.028.053v.057c0-.044.026-.017.035-.005l.004.005.001.01c.002.018.01.06.038.101.039 0 .039.056.039.056h-.078l-.01.014-.028.041v.055s0 .056.038.056v-.056h.388c.039.056.078.111.155.111l.012-.008c.036-.024.143-.093.143-.047H6.4c0 .055 0 .055.039.055h.232c-.038-.055 0-.11.117.056h.039s.038-.056.077-.056c.078 0 .078.056.116.056 0 0 .078.055.117.055v-.012a.333.333 0 0 0-.039-.154v-.222l.01-.04c.012-.021.029-.034.029-.07v-.056H7.02v-.055h-.038c-.117 0-.31.055-.466.055-.116 0-.271-.055-.426 0-.155-.055-.35-.055-.504-.11l.038.009zm13.3-3.5c-.038 0-.038 0-.077.04v.195s.039.04.039.078c-.04.079.038.157.038.196l.01.067c.012.037.03.063.03.09h.154c0-.04 0-.04.04-.04.038 0 .038-.039.077-.039l-.007.002a.081.081 0 0 1 .038.018l.007.02H19.684c.016.002.016.009.016.038 0 0 .078 0 .116-.039h.04c-.04 0-.04-.039-.04-.039.04-.039.117-.039.194-.078h.039v.023c.002.016.01.016.039.016l.003-.014c.009-.017.036-.012.036-.142 0-.04 0-.079-.04-.079l-.038.04.002-.004.006-.028c-.008.022-.008.031-.008.031h-.039a.548.548 0 0 1-.232-.078h.155s0-.039-.04-.039c0 .04-.038.04-.038.04s0-.04-.039-.04v-.039c-.038-.04 0-.04-.038-.04-.04 0-.04.04-.04.04H19.7c0-.04-.078-.04-.039-.078h-.039v.039c-.038 0-.038-.04-.077-.04l-.027-.01c-.04-.002-.09.042-.09.01h-.038v-.038l.027-.01c.012-.012.012-.03.012-.03 0 .04-.04 0-.078.04v-.04h-.039c0-.015-.025-.012-.054-.003l-.009.003h-.014l-.018.007-.08.026-.019.007h-.038v-.04h-.078z" fill="#838383" fill-rule="nonzero"/>
                                </svg>
                            </span>
                            Descargar fotos
                        </a>
                    </li>
                    <?php endif; ?>

                    <?php 
                    $pais_videos_link = get_field('intra_destino_videos_download');
                    if( $pais_videos_link) : ?>
                    <li class="pais__intralink">
                        <a href="<?php echo esc_url($pais_videos_link) ?>" class="pais__intralink__link">
                            <span class="pais__intralink__icon">
                                <svg width="24" height="27" viewBox="0 0 24 26" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.109 4.124v.148h8.811c.206 0 .411.038.617.112l.034-.112c.138.075.275.112.343.149.24.149.412.297.583.52.137.186.309.446.377.854.035.149.035.409.035.669v1.785c.001.53.01.672.068.703 0 1.226-.034 1.598-.068 1.969-.022.235-.044.484-.048 1.029v.468c.002.237.006.515.013.843.027.376.033.976.034 1.556l.001.928c.002.525.012.599.068.599v.26l-.034.037c-.026.028-.033.035-.034.468v.535c.034.334.034.557.068.817a.506.506 0 0 1 .034.223v.371c-.068 0-.102.075-.137.26-.103.409-.274.595-.377.743l-.034.037-.24.26c-.034.037-.103.075-.24.186-.137.074-.377.223-.857.297h-3.36v-.037c-.549.037-1.029 0-1.577 0H13.13c-.102 0-.171.037-.205.037-.103.037-.206.074-1.063.074l-.309-.037c-.685-.037-.788-.037-2.4-.074-.034 0-.137-.037-.445-.037h-1.68v.111h-2.16c-.069.037-.103.037-.138.037h-.274c-.343.038-.446.038-.686 0-.102-.037-.274-.037-.48-.148-.205-.112-.548-.297-.822-.669-.103-.148-.172-.371-.24-.557a1.653 1.653 0 0 1-.103-.594l-.035-3.789h.172l.034-.557v-2.637h-.206v-1.709h.206V8.247h-.206v1.968c-.034-.334-.034-.817-.034-1.3V7.652l.034-.037v-.223h.206v-1.3c0-1.002.857-1.82 1.954-1.82h4.286v-.111c.309 0 .446 0 .514-.037h2.058zm6.384 1.47H16.758l-.39.002c-.708.005-1.35.014-1.35.014h-4.904v.074l-.48.074h-.823V5.61H4.217c-.103 0-.171.037-.274.074l.068.074-.05.034c-.048.04-.087.096-.087.152-.034.074-.034.186-.034.26v.111c-.034.149-.034.297-.034.483v.446l.012.188c.036.54.09 1.343.09 1.706l.035 2.377H3.77l-.034.409v1.857h.206v1.263h-.206v1.448h.206v-1.374c.034.26.034.594.034.929v.891h-.034v.037c.034.26 0 .557 0 .892v-.78h-.206v1.857c0 .26.24.483.514.483h5.623v-.075l.686-.111h1.2v.149h8.16a.522.522 0 0 0 .411-.223l-.068-.037c.034-.112.034-.223.034-.298v-.222c0-.26.034-.52.034-1.003v-1.441c0-.683-.008-.83-.068-.862 0-.854.034-1.114 0-1.374.034-.298.068-.558.034-1.709-.034-.334-.034-.966-.034-1.449 0-.705.034-.78-.069-.78v-.111l.035-.037c.053-.03.065-.036.067-.38l.001-.363c0-.149-.034-.186-.034-.26l-.002-.017c-.015-.164-.133-1.483-.101-1.692l.034-.408V6.13a.314.314 0 0 0-.308-.372h-.995V5.61h-.274s-.068.037-.446 0c-.089-.01-.346-.015-.678-.016zm-7.735 11.35.013-.006c-.102-.037-.205-.186-.24-.186-.034-.037-.171-.185-.137-.222.035.074.069.148.137.185-.034-.074-.102-.111-.102-.148-.035-.075-.069-.075-.103-.112-.069-.148-.103-.371-.069-.483v-.26c0 .075-.034.149-.034.26v-.111c0 .037-.034 0-.034-.074v-.037c0-.075-.103-.558-.103-.632v-.074l.013-.016c.01-.038-.006-.133.021-.133v-.111c0-.112.069-.186.034-.334h.035v-.186c0-.037.034-.112.034-.186 0-.408.034-.817.034-1.226-.034 0 0 .149-.034.149 0-.706-.034-1.523 0-2.266 0-.297.068-.483.068-.743v.018l-.002-.027c-.011-.13-.049-.446-.04-.575l.008-.047c.034-.111.034-.149.034-.223 0-.074 0-.111.035-.26.034-.074.068-.111.103-.223.068-.148.137-.26.24-.334a.915.915 0 0 1 .857-.223c-.103-.037-.069-.037 0-.037.068 0 .24.074.343.223.102.074.137.037.205.111.069.037.206.112.309.149.446.297.926.743 1.44 1.114l.068.037c.069.075 1.543.892 1.578.966.034.037.068.037.068.037.274.149.446.334.686.483h-.034c.137.074.24.149.377.223.103.111.24.148.274.408.274.298.377.743.274 1.115-.068.148-.137.26-.24.408l-.205.223c-.035.074-.103.112-.172.149-.103.111-.24.185-.377.297-.24.186-.514.371-.789.557-.48.334-1.028.669-1.474 1.003-.72.446-1.406.891-2.16 1.337l-.093.027c-.055.014-.101.022-.147.047-.068 0-.137.037-.274 0h-.274l.005.006h.014c-.037 0 .048.046.129.1l.046.033.043.013v.054c-.07 0-.167-.043-.204-.094l-.014-.04-.014-.016h-.003l-.037-.019c-.034 0-.034-.037-.068-.037h-.069c-.046-.025-.03-.033.005-.025l.02.007c-.008-.01-.008-.019.01-.019zm-.295-.897c-.034 0-.034.037-.034.074a.52.52 0 0 0 .102.297l.035.037c.034.037.034.075.103.112-.035.037.034.074.068.111.034 0 0-.037.069 0 .068.074.137.112.137.112.137.037.274.037.171 0 .137.037.103.074.035.111-.035.037-.103.074.034.074l-.026-.003c-.03-.008.009-.034.094-.034.069-.037.138-.074.103-.074a.764.764 0 0 0 .377-.223c.069-.074.172-.149.309-.26.034-.037.137-.149.274-.26l-.72.483a.857.857 0 0 1-.411.111c-.343 0-.617-.26-.72-.594zm1.278-6.523c-.003.066-.015.12-.06.073v-.133l.007-.001-.055-.065V9.505c-.003.03-.01.043-.039.093v.066c.077.067.192.133.307.266l-.053-.055-.185-.143c0 .028 0 .077-.015.1l-.009.005.015.016.009.028c0 .111 0 .223-.034.297v.186a.837.837 0 0 0 .025-.121l.008-.065v.112c0-.03.023-.036.032 0l.003.037v.037c0 .037.103.446.103.483v.074l-.015.017c-.006.032.006.094-.02.094v.075c0 .111-.068.148-.034.26h-.034v.148s-.034.075-.034.149c0 .297-.034.631-.034.966.034 0 0-.112.034-.112 0 .557.034 1.189 0 1.783 0 .223-.069.371-.069.594l.001-.023.005.032c.006.04.017.097.023.147l.006.067v.074c-.035.075-.035.075-.035.149-.034.037-.034.074-.034.111l.01-.027c.013-.014.036-.022.059-.047.034-.074.102-.111.171-.148-.034 0-.034-.038-.034-.038l.205-.074c.069-.037.069-.074.138-.111l.205-.223c.343-.223.823-.446 1.235-.706l.068-.037c.069-.037 1.097-.891 1.166-.891l.034-.038c.206-.148.377-.222.549-.334l.098-.06c.095-.065.185-.135.313-.163-.068-.037-.103-.037-.137-.074v-.074c-.034 0-.034-.037-.069-.037-.377-.223-.857-.52-1.268-.78-.377-.26-.789-.558-1.166-.78-.514-.335-.994-.706-1.474-1.078l.247.19.014-.009c.049-.01.145.061.233.118l.051.032-.467-.54.002-.028v-.031l-.055-.001.053.06z" fill="#838383" fill-rule="nonzero"/>
                                </svg>
                            </span>
                            Descargar videos
                        </a>
                    </li>
                    <?php endif; ?>
                    
                </ul>

            </div> <!-- End pais__content -->
            
            <!-- Viaje Footer -->
            <div class="pais__footer">
                <a class="pais__read-more-link wp-block-button__link" href="#" rel="nofollow" tabindex="-1" aria-hidden="true"><?php _e('Descargar paquete completo', 'intrarift') ?></span></a>
            </div> <!-- End pais__footer -->
                
        </div><!-- End pais__body -->

    </div> <!-- End pais__wrap -->
</article>