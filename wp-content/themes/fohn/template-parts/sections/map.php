<?php
/**
 * Section: Map
 */

$address = get_field('map_address') ?: '349 Doi Can Street, Ngoc Ha Ward, Hanoi City';
$phone = get_field('map_phone') ?: 'T: (+84) 28 3622 2265';
$embed_code = get_field('map_embed_code');

?>
<section class="map-section py-24 bg-white">
    <div class="container mx-auto px-6">
        <!-- Header Info -->
        <div class="text-center mb-12">
            <h2 class="text-xl md:text-2xl font-bold text-brand-blue mb-2 tracking-tight">
                <?php echo esc_html($address); ?>
            </h2>
            <p class="text-sm font-medium text-brand-black-600">
                <?php echo esc_html($phone); ?>
            </p>
        </div>

        <!-- Map Container -->
        <div class="map-container relative w-full h-[450px] lg:h-[600px] rounded-3xl overflow-hidden shadow-2xl grayscale hover:grayscale-0 transition-all duration-700 border-8 border-white">
            <?php if ($embed_code) : ?>
                <?php echo $embed_code; ?>
            <?php else : ?>
                <!-- Default Map (Hanoi) -->
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m12!1m3!1d3723.86433367123!2d105.8166521!3d21.0336214!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab6f1dcc700b%3A0xe543e5c94a5e381!2s349%20%C4%90%E1%BB%99i%20C%E1%BA%A5n%2C%20Ng%E1%BB%8Dc%20H%C3%A0%2C%20Ba%20%C4%90%C3%ACnh%2C%20H%C3%A0%20N%E1%BB%99i!5e0!3m2!1svi!2s!4v1713888888888!5m2!1svi!2s" 
                    width="100%" 
                    height="100%" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            <?php endif; ?>
        </div>
    </div>
</section>

<style>
    .map-container iframe {
        width: 100%;
        height: 100%;
        display: block;
    }
</style>
