<?php
/**
 * Section: Offers & Dining (Alternating Layout)
 * Data fetched from 'offer' Custom Post Type
 */

// ACF Data
$block1_heading  = get_field('offers_alt_block1_heading') ?: 'OFFERS';
$block1_desc     = get_field('offers_alt_block1_desc') ?: 'Discover a collection of seasonal experiences and exclusive stay packages crafted to elevate your time in Hanoi.';
$block1_btn_text = get_field('offers_alt_block1_btn_text') ?: 'VIEW ALL OFFERS';
$block1_btn_link = get_field('offers_alt_block1_btn_link') ?: '#';

$block2_heading  = get_field('offers_alt_block2_heading') ?: 'DRINK & DINE';
$block2_desc     = get_field('offers_alt_block2_desc') ?: 'Savor the tastes of Vietnam in a new light at our 100-seat all-day-dining restaurant MỘC Loft, where authentic flavors meet contemporary reinterpretation. Rise above the city at our 24th-floor bar and VIP Room, the perfect setting for sunset cocktails, skyline views, and stylish gatherings.';
$block2_btn_text = get_field('offers_alt_block2_btn_text') ?: 'VIEW DETAILS';
$block2_btn_link = get_field('offers_alt_block2_btn_link') ?: '#';

$block1_items = get_field('offers_alt_block1_list');
$block2_items = get_field('offers_alt_block2_list');
?>

<section class="offers-alternate-section py-24 bg-white overflow-hidden">
    <div class="container mx-auto pb-6">
        
        <!-- Block 1: OFFERS (Text Left, Slider Right) -->
        <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20 mb-32">
            <!-- Text Content -->
            <div class="w-full lg:w-5/12 order-2 lg:order-1">
                <h2 class="text-3xl font-serif font-semibold text-brand-blue uppercase tracking-widest mb-4">
                    <?php echo esc_html($block1_heading); ?>
                </h2>
                <div class="w-20 h-0.5 bg-brand-orange mb-8 opacity-60"></div>
                
                <p class="text-brand-black-600 leading-relaxed mb-10 max-w-md">
                    <?php echo wp_kses_post($block1_desc); ?>
                </p>
                
                <?php if ($block1_btn_text): ?>
                <a href="<?php echo esc_url($block1_btn_link); ?>" class="inline-block text-xs font-bold font-serif text-brand-blue uppercase tracking-[0.2em] border-b border-brand-orange pb-1 hover:text-brand-orange transition-colors">
                    <?php echo esc_html($block1_btn_text); ?>
                </a>
                <?php endif; ?>
            </div>
            
            <!-- Slider -->
            <div class="w-full lg:w-7/12 order-1 lg:order-2">
                <div class="offer-slider-container relative" id="offers-block">
                    <div class="swiper offer-inner-swiper aspect-[16/10] bg-brand-black-100 overflow-hidden">
                        <div class="swiper-wrapper">
                            <?php if ($block1_items): ?>
                                <?php foreach ($block1_items as $item): ?>
                                    <div class="swiper-slide">
                                        <?php if (!empty($item['gallery'])): ?>
                                            <div class="swiper nested-offers-swiper absolute inset-0 w-full h-full overflow-hidden">
                                                <div class="nested-wrapper flex w-full h-full relative" style="transition-property: transform;">
                                                    <?php foreach ($item['gallery'] as $img_data): 
                                                        $img_src = '';
                                                        if (is_array($img_data)) {
                                                            $img_src = $img_data['url'] ?? '';
                                                        } elseif (is_numeric($img_data)) {
                                                            $img_src = wp_get_attachment_url($img_data);
                                                        } else {
                                                            $img_src = $img_data;
                                                        }
                                                    ?>
                                                        <div class="nested-slide w-full h-full shrink-0 relative">
                                                            <img src="<?php echo esc_url($img_src); ?>" alt="<?php echo esc_attr(strip_tags($item['title'])); ?>" class="w-full h-full object-cover">
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                            <div class="w-full h-full bg-brand-black-300 flex items-center justify-center text-white italic">Offer Image</div>
                                        <?php endif; ?>
                                        
                                        <!-- Post Data for Navigation Label -->
                                        <div class="hidden post-title"><?php echo wp_kses_post($item['title']); ?></div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <!-- Dummy Slides -->
                                <?php for($i=1; $i<=3; $i++): ?>
                                    <div class="swiper-slide">
                                        <div class="w-full h-full bg-brand-black-200 flex items-center justify-center text-brand-black-400">
                                            Offer Slide <?php echo $i; ?>
                                        </div>
                                        <div class="hidden post-title">ORIGINAL ROOM</div>
                                    </div>
                                <?php endfor; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <!-- Navigation below image -->
                    <div class="flex justify-between items-center py-4 mt-2">
                        <div class="flex items-center gap-6">
                            <div class="offer-pagination text-sm font-semibold text-brand-black-800 font-serif w-auto"></div>
                            <h3 class="offer-active-title text-sm font-serif font-semibold text-brand-blue uppercase tracking-widest ml-4">
                                ORIGINAL ROOM
                            </h3>
                        </div>
                        <div class="flex gap-6">
                            <button class="offer-prev hover:opacity-70 transition-opacity">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Vector (5).png" alt="Prev" class="w-10 h-auto">
                            </button>
                            <button class="offer-next hover:opacity-70 transition-opacity">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Vector (6).png" alt="Next" class="w-10 h-auto">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Block 2: DRINK & DINE (Slider Left, Text Right) -->
        <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20">
            <!-- Slider -->
            <div class="w-full lg:w-7/12">
                <div class="offer-slider-container relative" id="dining-block">
                    <div class="swiper offer-inner-swiper aspect-[16/10] bg-brand-black-100 overflow-hidden">
                        <div class="swiper-wrapper">
                            <?php if ($block2_items): ?>
                                <?php foreach ($block2_items as $item): ?>
                                    <div class="swiper-slide">
                                        <?php if (!empty($item['gallery'])): ?>
                                            <div class="swiper nested-offers-swiper absolute inset-0 w-full h-full overflow-hidden">
                                                <div class="nested-wrapper flex w-full h-full relative" style="transition-property: transform;">
                                                    <?php foreach ($item['gallery'] as $img_data): 
                                                        $img_src = '';
                                                        if (is_array($img_data)) {
                                                            $img_src = $img_data['url'] ?? '';
                                                        } elseif (is_numeric($img_data)) {
                                                            $img_src = wp_get_attachment_url($img_data);
                                                        } else {
                                                            $img_src = $img_data;
                                                        }
                                                    ?>
                                                        <div class="nested-slide w-full h-full shrink-0 relative">
                                                            <img src="<?php echo esc_url($img_src); ?>" alt="<?php echo esc_attr(strip_tags($item['title'])); ?>" class="w-full h-full object-cover">
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                            <div class="w-full h-full bg-brand-black-300 flex items-center justify-center text-white italic">Dining Image</div>
                                        <?php endif; ?>
                                        <div class="hidden post-title"><?php echo wp_kses_post($item['title']); ?></div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <!-- Dummy Slides -->
                                <?php for($i=1; $i<=3; $i++): ?>
                                    <div class="swiper-slide">
                                        <div class="w-full h-full bg-brand-black-200 flex items-center justify-center text-brand-black-400">
                                            Dining Slide <?php echo $i; ?>
                                        </div>
                                        <div class="hidden post-title">IL PAMPERO</div>
                                    </div>
                                <?php endfor; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <!-- Navigation below image -->
                    <div class="flex justify-between items-center py-4 mt-2">
                        <div class="flex gap-6">
                            <button class="offer-prev hover:opacity-70 transition-opacity">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Vector (5).png" alt="Prev" class="w-10 h-auto">
                            </button>
                            <button class="offer-next hover:opacity-70 transition-opacity">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Vector (6).png" alt="Next" class="w-10 h-auto">
                            </button>
                        </div>
                        <div class="flex items-center gap-6">
                            <h3 class="offer-active-title text-sm font-serif font-semibold text-brand-blue uppercase tracking-widest mr-4">
                                IL PAMPERO
                            </h3>
                            <div class="offer-pagination text-sm font-semibold text-brand-black-800 font-serif w-auto"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Text Content -->
            <div class="w-full lg:w-5/12">
                <h2 class="text-3xl font-serif font-semibold text-brand-blue uppercase tracking-widest mb-4">
                    <?php echo esc_html($block2_heading); ?>
                </h2>
                <div class="w-20 h-0.5 bg-brand-orange mb-8 opacity-60"></div>
                
                <p class="text-brand-black-600 leading-relaxed mb-10">
                    <?php echo wp_kses_post($block2_desc); ?>
                </p>
                
                <?php if ($block2_btn_text): ?>
                <a href="<?php echo esc_url($block2_btn_link); ?>" class="inline-block text-xs font-bold font-serif text-brand-blue uppercase tracking-[0.2em] border-b border-brand-orange pb-1 hover:text-brand-orange transition-colors">
                    <?php echo esc_html($block2_btn_text); ?>
                </a>
                <?php endif; ?>
            </div>
        </div>

    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const offerContainers = document.querySelectorAll('.offer-slider-container');
    
    offerContainers.forEach(container => {
        const swiperEl = container.querySelector('.offer-inner-swiper');
        const titleEl = container.querySelector('.offer-active-title');
        
        const swiper = new Swiper(swiperEl, {
            slidesPerView: 1,
            loop: true,
            speed: 1000,
            watchOverflow: false, // Force buttons and pagination to stay visible even with 1 slide
            navigation: {
                nextEl: container.querySelector('.offer-next'),
                prevEl: container.querySelector('.offer-prev'),
            },
            pagination: {
                el: container.querySelector('.offer-pagination'),
                type: 'fraction',
                renderFraction: function (currentClass, totalClass) {
                    return '<span class="' + currentClass + '"></span>' +
                           ' / ' +
                           '<span class="' + totalClass + '"></span>';
                }
            },
            on: {
                init: function() {
                    updateActiveTitle(this, titleEl);
                },
                slideChange: function() {
                    updateActiveTitle(this, titleEl);
                }
            }
        });
    });

    function updateActiveTitle(swiper, titleEl) {
        const activeSlide = swiper.slides[swiper.activeIndex];
        if (activeSlide) {
            const title = activeSlide.querySelector('.post-title');
            if (title && titleEl) {
                titleEl.textContent = title.textContent;
            }
        }
    }

    // Initialize nested gallery swipers
    const nestedSwipers = document.querySelectorAll('.nested-offers-swiper');
    nestedSwipers.forEach(swiperEl => {
        const slideCount = swiperEl.querySelectorAll('.nested-slide').length;
        if (slideCount > 1) {
            new Swiper(swiperEl, {
                wrapperClass: 'nested-wrapper',
                slideClass: 'nested-slide',
                slidesPerView: 1,
                loop: true,
                speed: 800,
                autoplay: {
                    delay: Math.floor(2500 + Math.random() * 2000),
                    disableOnInteraction: false,
                },
                allowTouchMove: false, // Prevent interference with the main outer carousel swipe
                nested: true,
                observer: true,
                observeParents: true,
            });
        }
    });
});
</script>
