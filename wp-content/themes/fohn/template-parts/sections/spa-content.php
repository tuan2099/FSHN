<?php
/**
 * Section: Spa & Wellness Content
 */

$intro_title = get_field('spa_intro_title') ?: 'Yên Spa & Wellness';
$intro_desc = get_field('spa_intro_desc');
$btn_text = get_field('spa_intro_btn_text') ?: 'Contact Concierge';
$btn_link = get_field('spa_intro_btn_link') ?: '#';
$spa_blocks = get_field('spa_blocks');
?>

<section class="relative overflow-hidden bg-white" style="padding-top:5rem;padding-bottom:5rem">
    <!-- Decorative flower frame (shared helper) -->
    <?php fohn_render_flowers(get_field('spa_flower_left'), get_field('spa_flower_right')); ?>

    <div class="container relative z-10 mx-auto px-6 max-w-[1040px]">
        <!-- Intro Header -->
        <div class="mb-20 text-center">
            <h2 class="text-brand-blue font-serif text-[40px] font-semibold mb-6 uppercase">
                <?php echo esc_html($intro_title); ?>
            </h2>
            <div class="w-24 h-px mx-auto mb-10 bg-brand-orange"></div>
            <?php if ($intro_desc): ?>
                <p class="text-brand-black-700 font-sans max-w-[900px] mx-auto mb-12 leading-relaxed">
                    <?php echo nl2br(esc_html($intro_desc)); ?>
                </p>
            <?php else: ?>
                <p class="text-brand-black-700 font-sans max-w-[900px] mx-auto mb-12 leading-relaxed">
                    Inspired by the Vietnamese word “Yên,” meaning peace and calm, YÊN Spa is a sanctuary of quiet elegance
                    designed to restore balance for body, mind, and soul. Blending cultural rituals with contemporary
                    well-being, our holistic offering invites guests to restore both body and mind through thoughtfully
                    curated experiences.
                </p>
            <?php endif; ?>
            <a href="<?php echo esc_url($btn_link); ?>"
                class="inline-block bg-brand-orange text-white px-10 py-4 text-sm font-semibold font-serif uppercase tracking-[0.2em] hover:bg-brand-blue transition-all">
                <?php echo esc_html($btn_text); ?>
            </a>
        </div>

        <!-- Spa Blocks (Repeater) -->
        <div class="spa-blocks-list">
            <?php if ($spa_blocks): ?>
                <?php $counter = 0;
                foreach ($spa_blocks as $block):
                    $is_even = ($counter % 2 == 0);
                    $title = $block['title'];
                    $subtitle = $block['subtitle'];
                    $desc = $block['description'];
                    $gallery = $block['gallery'];
                    $btn_link = $block['button_link'];
                    $btn_label = $block['button_text'] ?: 'Learn More';
                    ?>
                    <div
                        class="flex flex-col gap-5 <?php echo $is_even ? 'md:flex-row' : 'md:flex-row-reverse'; ?> items-start <?php echo $counter < count($spa_blocks) - 1 ? 'mb-16' : ''; ?>">
                        <div class="w-full md:w-1/2">
                            <div class="relative group">
                                <!-- Image Slider -->
                                <div class="swiper spa-slider-<?php echo $counter; ?> overflow-hidden shadow-2xl">
                                    <div class="swiper-wrapper">
                                        <?php if ($gallery): ?>
                                            <?php foreach ($gallery as $img_url): ?>
                                                <div class="swiper-slide aspect-[4/3]">
                                                    <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($title); ?>"
                                                        class="object-cover w-full h-full">
                                                </div>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <div
                                                class="swiper-slide aspect-[4/3] bg-brand-black-100 flex items-center justify-center italic text-brand-black-300">
                                                No Images
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- Navigation -->
                                <div class="flex items-center justify-between mt-6">
                                    <div class="flex gap-6">
                                        <button
                                            class="spa-prev-<?php echo $counter; ?> text-brand-orange hover:translate-x-[-4px] transition-transform">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Vector (5).png"
                                                alt="Prev" class="object-contain w-12 h-6">
                                        </button>
                                        <button
                                            class="spa-next-<?php echo $counter; ?> text-brand-orange hover:translate-x-[4px] transition-transform">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Vector (6).png"
                                                alt="Next" class="object-contain w-12 h-6">
                                        </button>
                                    </div>
                                    <div
                                        class="spa-pagination-<?php echo $counter; ?> text-xs font-bold text-brand-black-800 tracking-widest font-sans text-right">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-full md:w-1/2">
                            <div class="<?php echo $is_even ? 'pl-0 md:pl-8' : 'pr-0 md:pr-8'; ?>">
                                <h3 class="mb-4 font-serif text-[32px] font-semibold tracking-wide uppercase text-brand-blue">
                                    <?php echo esc_html($title); ?>
                                </h3>
                                <div class="w-16 h-px mb-4 bg-brand-orange"></div>
                                <?php if ($subtitle): ?>
                                    <p class="mb-4 font-sans text-xl text-brand-orange">
                                        <?php echo nl2br(esc_html($subtitle)); ?>
                                    </p>
                                <?php endif; ?>
                                <p class="font-sans text-base text-brand-black-700">
                                    <?php echo nl2br(esc_html($desc)); ?>
                                </p>
                                <?php if ($btn_link): ?>
                                    <a href="<?php echo esc_url($btn_link); ?>"
                                        class="inline-block mt-8 bg-brand-orange text-white px-8 py-3 text-sm font-semibold font-serif uppercase tracking-[0.15em] hover:bg-brand-blue transition-all">
                                        <?php echo esc_html($btn_label); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php $counter++; endforeach; ?>
            <?php else: ?>
                <div class="py-20 italic text-center bg-brand-black-50 text-brand-black-400">
                    Please add wellness blocks in the page editor.
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        <?php if ($spa_blocks): ?>
            <?php foreach (array_keys($spa_blocks) as $index): ?>
                new Swiper('.spa-slider-<?php echo $index; ?>', {
                    loop: true,
                    navigation: {
                        nextEl: '.spa-next-<?php echo $index; ?>',
                        prevEl: '.spa-prev-<?php echo $index; ?>',
                    },
                    pagination: {
                        el: '.spa-pagination-<?php echo $index; ?>',
                        type: 'fraction',
                        renderFraction: function (currentClass, totalClass) {
                            return '<span class="' + currentClass + '"></span>' +
                                ' / ' +
                                '<span class="' + totalClass + '"></span>';
                        }
                    }
                });
            <?php endforeach; ?>
        <?php endif; ?>
    });
</script>