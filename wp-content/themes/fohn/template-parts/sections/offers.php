<?php
/**
 * Section: Offers Slider
 */

$heading = get_field('offers_heading') ?: 'OFFERS AT LÈGACY';
$offers = get_field('offers_list'); // Repeater
$button_text = get_field('offers_button_text') ?: 'EXPLORE MORE OFFERS';
$button_link = get_field('offers_button_link') ?: '#';

?>
<section class="py-24 overflow-hidden bg-white offers-section">
    <div class="container px-6 mx-auto">
        <!-- Heading -->
        <div class="flex justify-center mb-18">
            <div class="text-center">
                <h2 class="mb-2 text-3xl font-bold tracking-tight uppercase lg:text-4xl text-brand-blue">
                    <?php echo esc_html($heading); ?>
                </h2>
                <div class="w-[100px] h-0.5 bg-brand-orange mx-auto opacity-50"></div>
            </div>
        </div>

        <!-- Swiper Slider -->
        <div class="swiper offers-swiper !pb-18">
            <div class="flex items-center swiper-wrapper">
                <?php if ($offers) : ?>
                    <?php foreach ($offers as $index => $offer) : ?>
                        <div class="swiper-slide !h-auto transition-all duration-500">
                            <div class="relative aspect-square md:aspect-[4/5] rounded-none overflow-hidden group">
                                <img src="<?php echo esc_url($offer['image']); ?>" alt="<?php echo esc_attr($offer['title']); ?>" class="absolute inset-0 object-cover w-full h-full transition-transform duration-1000 group-hover:scale-110">
                                <div class="absolute inset-0 transition-colors duration-500 bg-brand-black-900/40 group-hover:bg-brand-black-900/60"></div>
                                
                                <div class="absolute inset-0 flex flex-col items-center justify-center p-8 text-center text-white">
                                    <span class="mb-4 font-serif text-xs italic opacity-80">
                                        <?php echo sprintf('%02d', $index + 1); ?>
                                    </span>
                                    <h3 class="text-xl font-bold leading-tight tracking-widest uppercase md:text-2xl">
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
                                <div class="p-8 text-center text-white">
                                    <span class="block mb-4 text-xs italic">0<?php echo $i; ?></span>
                                    <h3 class="text-xl font-bold tracking-widest uppercase">PROMO OFFER <?php echo $i; ?></h3>
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
            <a href="<?php echo esc_url($button_link); ?>" class="inline-block px-12 py-4 text-sm font-bold tracking-widest text-white uppercase transition-all shadow-xl bg-brand-orange hover:bg-brand-blue active:scale-95">
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
