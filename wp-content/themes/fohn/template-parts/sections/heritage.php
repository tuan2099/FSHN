<?php
/**
 * Section: Heritage & Accommodations
 */

// Heritage Section Fields
$heritage_title = get_field('heritage_title') ?: 'WHERE HERITAGE <br> MEETS ORIGINALITY';
$heritage_desc = get_field('heritage_desc');
$heritage_flower_left = get_field('heritage_flower_left');
$heritage_flower_right = get_field('heritage_flower_right');

// Accommodation Section Fields
$acc_title = get_field('acc_title') ?: 'ACCOMMODATIONS';
$acc_sub = get_field('acc_sub') ?: 'Live the rhythm of Hanoi. Heritage, culture, and comfort in perfect Harmony!';
$acc_desc = get_field('acc_desc');

?>
<section class="heritage-section relative py-24 bg-white overflow-hidden">
    <!-- Background Flower Images -->
    <?php if ($heritage_flower_left): ?>
        <img src="<?php echo esc_url($heritage_flower_left); ?>"
            class="absolute left-0 top-1/2 -translate-y-1/2 w-48 lg:w-72 pointer-events-none select-none"
            alt="Flower Ornament">
    <?php endif; ?>
    <?php if ($heritage_flower_right): ?>
        <img src="<?php echo esc_url($heritage_flower_right); ?>"
            class="absolute right-0 top-1/2 -translate-y-1/2 w-48 lg:w-72  pointer-events-none select-none"
            alt="Flower Ornament">
    <?php endif; ?>

    <div class="container mx-auto relative z-10">
        <!-- Top Heritage Part -->
        <div class="mx-auto text-center mb-24" data-aos="fade-up">
            <h2
                class="text-4xl lg:text-5xl font-semibold text-brand-blue uppercase leading-tight tracking-tighter mb-8 font-serif">
                <?php echo wp_kses_post($heritage_title); ?>
            </h2>
            <div class="text-brand-black-700 text-sm md:text-base leading-relaxed mb-12 mx-auto">
                <?php echo wp_kses_post($heritage_desc); ?>
            </div>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="#"
                    class="bg-brand-orange text-white px-10 py-3 text-xs font-bold uppercase tracking-widest hover:bg-brand-blue transition-all shadow-lg">
                    <?php pll_e('BOOK A STAY'); ?>
                </a>
                <a href="#"
                    class="bg-brand-orange text-white px-10 py-3 text-xs font-bold uppercase tracking-widest hover:bg-brand-blue transition-all shadow-lg">
                    <?php pll_e('SUSTAINABILITY'); ?>
                </a>
            </div>
        </div>

        <!-- Bottom Accommodations Part -->
        <div class="max-w-5xl mx-auto" data-aos="fade-up" data-aos-delay="200">
            <div class="flex flex-col md:flex-row md:items-center gap-6 mb-8 group">
                <h3
                    class="text-xl font-serif md:text-2xl font-bold text-brand-blue uppercase tracking-tighter whitespace-nowrap">
                    <?php echo esc_html($acc_title); ?>
                </h3>
                <div class="flex-grow h-0.5 bg-brand-orange/30 relative">
                    <div
                        class="absolute left-0 top-0 h-full bg-brand-orange w-1/4 group-hover:w-full transition-all duration-1000">
                    </div>
                </div>
                <p class="text-xs md:text-sm italic text-brand-black-500 font-serif">
                    <?php echo esc_html($acc_sub); ?>
                </p>
            </div>
            <div class="text-brand-black-700 text-sm md:text-base leading-relaxed max-w-4xl">
                <?php echo wp_kses_post($acc_desc); ?>
            </div>
        </div>
    </div>
</section>