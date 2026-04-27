<?php
/**
 * Section: Offers & Dining (Alternating Layout)
 * Data fetched from 'offer' Custom Post Type
 */

// Queries
$offers_args = array(
    'post_type' => 'offer',
    'posts_per_page' => 4,
    // You can filter by category if you add taxonomies later
);
$offers_query = new WP_Query($offers_args);

$dining_args = array(
    'post_type' => 'offer',
    'posts_per_page' => 4,
    'offset' => 4, // Just taking next 4 for demonstration
);
$dining_query = new WP_Query($dining_args);
?>

<section class="offers-alternate-section py-24 bg-white overflow-hidden">
    <div class="container mx-auto px-6">
        
        <!-- Block 1: OFFERS (Text Left, Slider Right) -->
        <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20 mb-32">
            <!-- Text Content -->
            <div class="w-full lg:w-5/12 order-2 lg:order-1">
                <h2 class="text-3xl font-serif font-semibold text-brand-blue uppercase tracking-widest mb-4">
                    OFFERS
                </h2>
                <div class="w-20 h-0.5 bg-brand-orange mb-8 opacity-60"></div>
                
                <p class="text-brand-black-600 leading-relaxed mb-10 max-w-md">
                    Discover a collection of seasonal experiences and exclusive stay packages crafted to elevate your time in Hanoi.
                </p>
                
                <a href="#" class="inline-block text-xs font-bold font-serif text-brand-blue uppercase tracking-[0.2em] border-b border-brand-orange pb-1 hover:text-brand-orange transition-colors">
                    VIEW ALL OFFERS
                </a>
            </div>
            
            <!-- Slider -->
            <div class="w-full lg:w-7/12 order-1 lg:order-2">
                <div class="offer-slider-container relative" id="offers-block">
                    <div class="swiper offer-inner-swiper aspect-[16/10] bg-brand-black-100 overflow-hidden">
                        <div class="swiper-wrapper">
                            <?php if ($offers_query->have_posts()): ?>
                                <?php while ($offers_query->have_posts()): $offers_query->the_post(); ?>
                                    <div class="swiper-slide">
                                        <?php if (has_post_thumbnail()): ?>
                                            <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover']); ?>
                                        <?php else: ?>
                                            <div class="w-full h-full bg-brand-black-300 flex items-center justify-center text-white italic">Offer Image</div>
                                        <?php endif; ?>
                                        
                                        <!-- Post Data for Navigation Label -->
                                        <div class="hidden post-title"><?php the_title(); ?></div>
                                    </div>
                                <?php endwhile; wp_reset_postdata(); ?>
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
                            <?php if ($dining_query->have_posts()): ?>
                                <?php while ($dining_query->have_posts()): $dining_query->the_post(); ?>
                                    <div class="swiper-slide">
                                        <?php if (has_post_thumbnail()): ?>
                                            <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover']); ?>
                                        <?php else: ?>
                                            <div class="w-full h-full bg-brand-black-300 flex items-center justify-center text-white italic">Dining Image</div>
                                        <?php endif; ?>
                                        <div class="hidden post-title"><?php the_title(); ?></div>
                                    </div>
                                <?php endwhile; wp_reset_postdata(); ?>
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
                    DRINK & DINE
                </h2>
                <div class="w-20 h-0.5 bg-brand-orange mb-8 opacity-60"></div>
                
                <p class="text-brand-black-600 leading-relaxed mb-10">
                    Savor the tastes of Vietnam in a new light at our 100-seat all-day-dining restaurant MỘC Loft, where authentic flavors meet contemporary reinterpretation. Rise above the city at our 24th-floor bar and VIP Room, the perfect setting for sunset cocktails, skyline views, and stylish gatherings.
                </p>
                
                <a href="#" class="inline-block text-xs font-bold font-serif text-brand-blue uppercase tracking-[0.2em] border-b border-brand-orange pb-1 hover:text-brand-orange transition-colors">
                    VIEW DETAILS
                </a>
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
});
</script>
