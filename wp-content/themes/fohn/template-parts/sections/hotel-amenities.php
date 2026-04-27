<?php
/**
 * Section: Hotel Amenities
 */

$intro_title = get_field('hotel_intro_title') ?: 'Hotel';
$intro_desc = get_field('hotel_intro_desc');
$amenities_bar_title = get_field('hotel_amenities_title') ?: 'Amenities';
$amenities_list = get_field('hotel_amenities_list');
$footer_text = get_field('hotel_footer_text');
?>

<section class="relative py-24 overflow-hidden bg-white">
    <!-- Decorative Florals -->
    <div class="absolute left-[-100px] top-1/2 -translate-y-1/2 w-[400px] pointer-events-none select-none">
        <?php if (get_field('hotel_flower_left')): ?>
            <img src="<?php echo esc_url(get_field('hotel_flower_left')); ?>" alt="" class="w-full h-auto">
        <?php else: ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lotus-bg.png" alt="" class="w-full h-auto">
        <?php endif; ?>
    </div>
    <div class="absolute right-[-100px] top-1/2 -translate-y-1/2 w-[400px] pointer-events-none select-none scale-x-[-1]">
        <?php if (get_field('hotel_flower_right')): ?>
            <img src="<?php echo esc_url(get_field('hotel_flower_right')); ?>" alt="" class="w-full h-auto">
        <?php else: ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lotus-bg.png" alt="" class="w-full h-auto">
        <?php endif; ?>
    </div>

    <div class="container relative z-10 mx-auto px-6 max-w-[1040px]">
        <!-- Title & description -->
        <div class="text-center mb-15">
            <h2 class="text-brand-blue font-serif text-5xl tracking-[0.2em] mb-6 uppercase">
                <?php echo esc_html($intro_title); ?>
            </h2>
            <div class="w-24 h-px bg-brand-orange mx-auto mb-10"></div>
            <?php if ($intro_desc): ?>
                <p class="text-brand-black-700 font-sans text-lg leading-relaxed max-w-[850px] mx-auto">
                    <?php echo nl2br(esc_html($intro_desc)); ?>
                </p>
            <?php else: ?>
                <p class="text-brand-black-700 font-sans text-lg leading-relaxed max-w-[850px] mx-auto">
                    Nestled in the heart of Hanoi, just a five-minute walk from West Lake, the hotel seamlessly blends contemporary design with the city’s rich cultural heritage, offering an immersive experience where art, architecture, and storytelling come to life. Designed as a living gallery, the lobby, lounges, restaurants, corridors, and guest rooms are adorned with curated artworks and décor inspired by motifs such as lotus flowers, cranes, and the mountains and forests of Vietnam.
                </p>
            <?php endif; ?>
        </div>

        <!-- Amenities Bar -->
        <div class="bg-brand-blue py-4 mb-15">
            <h3 class="text-white font-serif text-xl tracking-[0.3em] text-center uppercase">
                <?php echo esc_html($amenities_bar_title); ?>
            </h3>
        </div>

        <!-- Amenities Grid -->
        <div class="grid grid-cols-2 md:grid-cols-6 gap-x-8 gap-y-12">
            <?php if ($amenities_list): ?>
                <?php foreach ($amenities_list as $item): ?>
                    <div class="flex flex-col items-center text-center group">
                        <div class="mb-5 text-brand-blue transition-transform duration-300 group-hover:scale-110">
                            <?php if ($item['icon']): ?>
                                <img src="<?php echo esc_url($item['icon']); ?>" alt="<?php echo esc_attr($item['label']); ?>" class="w-10 h-10 object-contain">
                            <?php else: ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/></svg>
                            <?php endif; ?>
                        </div>
                        <span class="text-brand-black-700 font-sans text-sm font-medium leading-tight">
                            <?php echo esc_html($item['label']); ?>
                        </span>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- Fallback to static items if no ACF data -->
                <p class="col-span-full text-center italic text-brand-black-400">Please add amenities in the page editor.</p>
            <?php endif; ?>
        </div>

        <!-- Footer Text -->
        <?php if ($footer_text): ?>
            <div class="mt-24 text-center">
                <p class="text-brand-black-500 font-sans italic text-sm leading-loose max-w-[600px] mx-auto">
                    <?php echo nl2br(esc_html($footer_text)); ?>
                </p>
            </div>
        <?php else: ?>
            <div class="mt-24 text-center">
                <p class="text-brand-black-500 font-sans italic text-sm leading-loose max-w-[600px] mx-auto">
                    We believe that comfort comes from thoughtful details. <br>
                    Our amenities are designed to support your every mood whether you're here to recharge
                </p>
            </div>
        <?php endif; ?>
    </div>
</section>
