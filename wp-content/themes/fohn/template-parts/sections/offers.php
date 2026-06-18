<?php
/**
 * Section: Offers Slider
 */

$heading = get_field('offers_heading') ?: 'OFFERS AT LÈGACY';
$offers = get_field('offers_list'); // Repeater
$button_text = get_field('offers_button_text') ?: 'EXPLORE MORE OFFERS';
$button_link = get_field('offers_button_link') ?: '#';

?>
<section class="offers-section py-24 bg-white overflow-hidden">
    <div class="container mx-auto px-6">
        <!-- Heading -->
        <div class="flex justify-center mb-18">
            <div class="text-center">
                <h2 class="text-3xl lg:text-4xl font-bold text-brand-blue uppercase tracking-tight mb-2">
                    <?php echo esc_html($heading); ?>
                </h2>
                <div class="w-24 h-0.5 bg-brand-orange mx-auto opacity-50"></div>
            </div>
        </div>

        <!-- Swiper Slider -->
        <div class="swiper offers-swiper !pb-18">
            <div class="swiper-wrapper flex items-center">
                <?php if ($offers) : ?>
                    <?php foreach ($offers as $index => $offer) : ?>
                        <div class="swiper-slide !h-auto transition-all duration-500">
                            <div class="relative aspect-square md:aspect-[4/5] rounded-none overflow-hidden group">
                                <img src="<?php echo esc_url($offer['image']); ?>" alt="<?php echo esc_attr($offer['title']); ?>" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000">
                                <div class="absolute inset-0 bg-brand-black-900/40 group-hover:bg-brand-black-900/60 transition-colors duration-500"></div>
                                
                                <div class="absolute inset-0 flex flex-col items-center justify-center text-center p-8 text-white">
                                    <span class="text-xs italic font-serif mb-4 opacity-80">
                                        <?php echo sprintf('%02d', $index + 1); ?>
                                    </span>
                                    <h3 class="text-xl md:text-2xl font-bold uppercase tracking-widest leading-tight">
                                        <?php echo wp_kses_post($offer['title']); ?>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <!-- Dummy Slides -->
                    <?php for($i=1; $i<=3; $i++): ?>
                        <div class="swiper-slide !h-auto">
                            <div class="relative aspect-[4/5] bg-brand-black-800 flex items-center justify-center">
                                <div class="text-center text-white p-8">
                                    <span class="text-xs italic mb-4 block">0<?php echo $i; ?></span>
                                    <h3 class="text-xl font-bold uppercase tracking-widest">PROMO OFFER <?php echo $i; ?></h3>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                <?php endif; ?>
            </div>
            
            <!-- Pagination -->
            <div class="swiper-pagination !-bottom-2"></div>
        </div>

        <!-- Action Button -->
        <div class="mt-12 text-center">
            <a href="<?php echo esc_url($button_link); ?>" class="inline-block bg-brand-orange text-white px-12 py-4 font-bold uppercase tracking-widest text-sm hover:bg-brand-blue transition-all shadow-xl active:scale-95">
                <?php echo esc_html($button_text); ?>
            </a>
        </div>
    </div>
</section>

<style>
    .offers-swiper .swiper-slide {
        opacity: 0.5;
        transform: scale(0.85);
    }
    .offers-swiper .swiper-slide-active {
        opacity: 1;
        transform: scale(1);
        z-index: 10;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    new Swiper('.offers-swiper', {
        slidesPerView: 1.2,
        centeredSlides: true,
        spaceBetween: 20,
        loop: true,
        speed: 800,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            768: {
                slidesPerView: 2.2,
                spaceBetween: 30,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 40,
            }
        }
    });
});
</script>
