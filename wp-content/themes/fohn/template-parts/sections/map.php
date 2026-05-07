<?php
/**
 * Section: Map
 */

$address = get_field('map_address') ?: '349 Doi Can Street, Ngoc Ha Ward, Hanoi City';
$phone = get_field('map_phone') ?: 'T: (+84) 28 3622 2265';
$embed_code = get_field('map_embed_code');

?>
<section class="map-section pb-24 bg-white">
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
        <div class="map-container relative w-full h-[450px] lg:h-[600px] rounded-3xl overflow-hidden shadow-2xl transition-all duration-700 border-8 border-white"
            data-aos="zoom-in">
            <?php if ($embed_code): ?>
                <?php echo $embed_code; ?>
            <?php else: ?>
                <!-- Dynamic Map based on Address -->
                <iframe
                    src="https://maps.google.com/maps?q=<?php echo urlencode($address); ?>&t=&z=15&ie=UTF8&iwloc=&output=embed"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
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