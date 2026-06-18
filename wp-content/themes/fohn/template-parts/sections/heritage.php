<?php
/**
 * Section: Heritage & Accommodations
 */

// Heritage Section Fields
$heritage_title = get_field('heritage_title') ?: 'WHERE HERITAGE <br> MEETS ORIGINALITY';
$heritage_desc = get_field('heritage_desc');
$heritage_btn1_link = get_field('heritage_btn1_link') ?: '#';
$heritage_btn2_link = get_field('heritage_btn2_link') ?: '#';
$heritage_flower_left = get_field('heritage_flower_left');
$heritage_flower_right = get_field('heritage_flower_right');

// Accommodation Section Fields
$acc_title = get_field('acc_title') ?: 'ACCOMMODATIONS';
$acc_sub = get_field('acc_sub') ?: 'Live the rhythm of Hanoi. Heritage, culture, and comfort in perfect Harmony!';
$acc_desc = get_field('acc_desc');

?>
<section class="relative overflow-hidden bg-white heritage-section" style="padding-top:5rem;padding-bottom:1rem">
    <!-- Decorative flower frame: centered & capped, so flowers sit at the screen
         edges on smaller screens and stay put (don't drift) on very wide screens. -->
    <div class="absolute inset-0 z-0 mx-auto pointer-events-none" style="max-width:1536px">
        <?php if ($heritage_flower_left): ?>
            <img src="<?php echo esc_url($heritage_flower_left); ?>"
                class="absolute hidden w-48 select-none md:block top-1/2 lg:w-72"
                style="left:0;transform:translate(-50%, -50%)" alt="Flower Ornament">
        <?php endif; ?>
        <?php if ($heritage_flower_right): ?>
            <img src="<?php echo esc_url($heritage_flower_right); ?>"
                class="absolute hidden w-48 select-none md:block top-1/2 lg:w-72"
                style="right:0;transform:translate(50%, -50%)" alt="Flower Ornament">
        <?php endif; ?>
    </div>

    <div class="container relative z-10 mx-auto">
        <!-- Top Heritage Part -->
        <div class="mx-auto mb-24 text-center" data-aos="fade-up">
            <h2 class="mb-8 font-serif text-4xl font-semibold leading-tight uppercase lg:text-5xl text-brand-blue">
                <?php echo wp_kses_post($heritage_title); ?>
            </h2>
            <div class="mx-auto mb-12 text-sm leading-relaxed text-justify text-brand-black-700 md:text-base">
                <?php echo wp_kses_post($heritage_desc); ?>
            </div>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="<?php echo esc_url($heritage_btn1_link); ?>"
                    class="px-10 py-3 font-serif text-xs font-bold text-white uppercase transition-all shadow-lg bg-brand-orange hover:bg-brand-blue">
                    <?php pll_e('BOOK A STAY'); ?>
                </a>
                <a href="<?php echo esc_url($heritage_btn2_link); ?>"
                    class="px-10 py-3 font-serif text-xs font-bold text-white uppercase transition-all shadow-lg bg-brand-orange hover:bg-brand-blue">
                    <?php pll_e('SUSTAINABILITY'); ?>
                </a>
            </div>
        </div>

        <!-- Bottom Accommodations Part -->
        <div class="max-w-5xl mx-auto" data-aos="fade-up" data-aos-delay="200">
            <div class="group">
                <!-- Title on Top -->
                <h3 class="mb-6 font-serif text-2xl font-semibold uppercase md:text-3xl text-brand-blue">
                    <?php echo esc_html($acc_title); ?>
                </h3>
                
                <!-- Line and Subtitle Row -->
                <div class="flex items-center gap-6 mb-8">
                    <div class="w-24 md:w-48 h-0.5 bg-brand-orange/30 relative flex-shrink-0">
                        <div class="absolute top-0 left-0 w-1/4 h-full transition-all duration-1000 bg-brand-orange group-hover:w-full"></div>
                    </div>
                    <?php if ($acc_sub): ?>
                        <p class="font-serif text-xs italic md:text-sm text-brand-black-500">
                            <?php echo esc_html($acc_sub); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <!-- Description below -->
                <div class="max-w-4xl text-sm leading-relaxed text-brand-black-700 md:text-base">
                    <?php echo wp_kses_post($acc_desc); ?>
                </div>
            </div>
        </div>
    </div>
</section>