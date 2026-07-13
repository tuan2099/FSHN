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

<style>
    .amenities-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 3rem 2rem;
    }

    @media (min-width: 768px) {
        .amenities-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (min-width: 1024px) {
        .amenities-grid {
            grid-template-columns: repeat(6, 1fr);
        }
    }
</style>

<section class="relative pb-24 overflow-hidden bg-white" style="padding-top:5rem">
    <!-- Decorative flower frame (shared helper) -->
    <?php fohn_render_flowers(get_field('hotel_flower_left'), get_field('hotel_flower_right')); ?>

    <div class="container relative z-10 mx-auto px-6 max-w-[1040px]">
        <!-- Title & description -->
        <div class="text-center mb-16">
            <h3 class="text-brand-blue font-serif text-[40px] font-semibold mb-6 uppercase">
                <?php echo esc_html($intro_title); ?>
            </h3>
            <div class="w-[150px] h-px mx-auto mb-10 bg-brand-orange"></div>
            <?php if ($intro_desc): ?>
                <p class="text-brand-black-700 font-sans max-w-[900px] mx-auto mb-12 leading-relaxed">
                    <?php echo nl2br(esc_html($intro_desc)); ?>
                </p>
            <?php else: ?>
                <p class="text-brand-black-700 font-sans max-w-[900px] mx-auto mb-12 leading-relaxed">
                    Nestled in the heart of Hanoi, just a five-minute walk from West Lake, the hotel seamlessly blends
                    contemporary design with the city’s rich cultural heritage, offering an immersive experience where art,
                    architecture, and storytelling come to life. Designed as a living gallery, the lobby, lounges,
                    restaurants, corridors, and guest rooms are adorned with curated artworks and décor inspired by motifs
                    such as lotus flowers, cranes, and the mountains and forests of Vietnam.
                </p>
            <?php endif; ?>
        </div>

        <!-- Amenities Bar -->
        <div class="bg-brand-blue py-4 mb-15 max-w-[850px] mx-auto">
            <h3 class="font-serif text-xl text-center text-white uppercase">
                <?php echo esc_html($amenities_bar_title); ?>
            </h3>
        </div>

        <!-- Amenities Grid (6 per row on desktop) -->
        <div class="amenities-grid max-w-[900px] mx-auto">
            <?php if ($amenities_list): ?>
                <?php foreach ($amenities_list as $item): ?>
                    <div class="flex flex-col items-center text-center group">
                        <div class="mb-5 transition-transform duration-300 text-brand-blue group-hover:scale-110">
                            <?php if ($item['icon']): ?>
                                <img src="<?php echo esc_url($item['icon']); ?>" alt="<?php echo esc_attr($item['label']); ?>"
                                    class="object-contain w-14 h-14">
                            <?php else: ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10" />
                                </svg>
                            <?php endif; ?>
                        </div>
                        <span class="font-sans text-[13px] leading-tight text-brand-blue">
                            <?php echo esc_html($item['label']); ?>
                        </span>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- Fallback to static items if no ACF data -->
                <p class="italic text-center col-span-full text-brand-black-400">Please add amenities in the page editor.
                </p>
            <?php endif; ?>
        </div>

        <!-- Footer Text -->
        <?php if ($footer_text): ?>
            <div class="mt-12 text-center">
                <p class="text-brand-black-500 font-sans italic text-sm leading-loose max-w-[850px] mx-auto">
                    <?php echo nl2br(esc_html($footer_text)); ?>
                </p>
            </div>
        <?php else: ?>
            <div class="mt-12 text-center">
                <p class="text-brand-black-500 font-sans italic text-sm leading-loose max-w-[850px] mx-auto">
                    We believe that comfort comes from thoughtful details. <br>
                    Our amenities are designed to support your every mood whether you're here to recharge
                </p>
            </div>
        <?php endif; ?>
    </div>
</section>