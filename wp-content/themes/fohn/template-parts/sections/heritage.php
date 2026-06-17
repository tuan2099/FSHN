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
<section class="heritage-section relative bg-white overflow-hidden" style="padding-top:5rem;padding-bottom:1rem">
    <!-- Decorative flower frame: centered & capped, so flowers sit at the screen
         edges on smaller screens and stay put (don't drift) on very wide screens. -->
    <div class="absolute inset-0 mx-auto pointer-events-none z-0" style="max-width:1536px">
        <?php if ($heritage_flower_left): ?>
            <img src="<?php echo esc_url($heritage_flower_left); ?>"
                class="hidden md:block absolute top-1/2 w-48 lg:w-72 select-none"
                style="left:0;transform:translate(-50%, -50%)" alt="Flower Ornament">
        <?php endif; ?>
        <?php if ($heritage_flower_right): ?>
            <img src="<?php echo esc_url($heritage_flower_right); ?>"
                class="hidden md:block absolute top-1/2 w-48 lg:w-72 select-none"
                style="right:0;transform:translate(50%, -50%)" alt="Flower Ornament">
        <?php endif; ?>
    </div>

    <div class="container mx-auto relative z-10">
        <!-- Top Heritage Part -->
        <div class="mx-auto text-center mb-24" data-aos="fade-up">
            <h2 class="text-4xl lg:text-5xl font-semibold text-brand-blue uppercase leading-tight mb-8 font-serif">
                <?php echo wp_kses_post($heritage_title); ?>
            </h2>
            <div class="text-brand-black-700 text-sm md:text-base leading-relaxed mb-12 mx-auto">
                <?php echo wp_kses_post($heritage_desc); ?>
            </div>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="<?php echo esc_url($heritage_btn1_link); ?>"
                    class="bg-brand-orange font-serif text-white px-10 py-3 text-xs font-bold uppercase hover:bg-brand-blue transition-all shadow-lg">
                    <?php pll_e('BOOK A STAY'); ?>
                </a>
                <a href="<?php echo esc_url($heritage_btn2_link); ?>"
                    class="bg-brand-orange font-serif text-white px-10 py-3 text-xs font-bold uppercase hover:bg-brand-blue transition-all shadow-lg">
                    <?php pll_e('SUSTAINABILITY'); ?>
                </a>
            </div>
        </div>

        <!-- Bottom Accommodations Part -->
        <div class="max-w-5xl mx-auto" data-aos="fade-up" data-aos-delay="200">
            <div class="group mb-12">
                <!-- Title on Top -->
                <h3 class="text-2xl md:text-3xl font-serif font-bold text-brand-blue uppercase mb-6">
                    <?php echo esc_html($acc_title); ?>
                </h3>
                
                <!-- Line and Subtitle Row -->
                <div class="flex items-center gap-6 mb-8">
                    <div class="w-24 md:w-48 h-0.5 bg-brand-orange/30 relative flex-shrink-0">
                        <div class="absolute left-0 top-0 h-full bg-brand-orange w-1/4 group-hover:w-full transition-all duration-1000"></div>
                    </div>
                    <?php if ($acc_sub): ?>
                        <p class="text-xs md:text-sm italic text-brand-black-500 font-serif">
                            <?php echo esc_html($acc_sub); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <!-- Description below -->
                <div class="text-brand-black-700 text-sm md:text-base leading-relaxed max-w-4xl">
                    <?php echo wp_kses_post($acc_desc); ?>
                </div>
            </div>
        </div>
    </div>
</section>