<?php
/**
 * Section: Offers Carousel
 * Data fetched from the ACF "Offers List" repeater (offers_list).
 */

$offers = get_field('offers_list');

$heading = get_field('offers_heading') ?: 'OFFERS AT LÈGACY';
$button_text = get_field('offers_button_text') ?: 'EXPLORE MORE OFFERS';
$button_link = get_field('offers_button_link') ?: '#';
?>

<section class="pb-24 overflow-hidden bg-white offers-carousel-section">
    <div class="container px-6 mx-auto">
        <!-- Heading -->
        <div class="flex justify-center mb-10" data-aos="fade-up">
            <div class="text-center">
                <h2 class="text-[32px] font-serif font-semibold text-brand-blue uppercase mb-4">
                    <?php echo esc_html($heading); ?>
                </h2>
                <div class="w-24 h-0.5 bg-brand-orange mx-auto opacity-60"></div>
            </div>
        </div>

        <!-- Slider Wrapper with clipping -->
        <div class="relative py-20 mx-auto overflow-hidden" data-aos="fade-up" data-aos-delay="200">
            <div class="swiper offers-carousel-swiper !overflow-visible">
                <div class="flex items-center swiper-wrapper">
                    <?php if ($offers): ?>
                        <?php $i = 1;
                        foreach ($offers as $offer):
                            $offer_title = $offer['title'];
                            $offer_image = $offer['image'];
                            $offer_link = !empty($offer['link']) ? $offer['link'] : $button_link;
                            ?>
                            <div class="swiper-slide !h-auto transition-all duration-700 opacity-20 scale-[0.7]"
                                data-aos="zoom-in" data-aos-delay="<?php echo $i * 100; ?>">
                                <a href="<?php echo esc_url($offer_link); ?>"
                                    class="relative block overflow-hidden rounded-none shadow-xl aspect-square group">
                                    <?php if ($offer_image): ?>
                                        <img src="<?php echo esc_url($offer_image); ?>"
                                            alt="<?php echo esc_attr(wp_strip_all_tags($offer_title)); ?>"
                                            class="absolute inset-0 object-cover w-full h-full transition-transform duration-1000 group-hover:scale-110">
                                    <?php else: ?>
                                        <div
                                            class="absolute inset-0 flex items-center justify-center italic text-white bg-brand-black-800">
                                            No Image</div>
                                    <?php endif; ?>

                                    <!-- Overlay -->
                                    <div class="absolute inset-0 transition-colors duration-500 offer-overlay">
                                    </div>
                                </a>
                            </div>
                            <?php $i++; endforeach; ?>
                    <?php else: ?>
                        <!-- Dummy Slides -->
                        <?php for ($j = 1; $j <= 5; $j++): ?>
                            <div class="swiper-slide !h-auto transition-all duration-700 opacity-20 scale-[0.7]">
                                <div
                                    class="relative flex items-center justify-center overflow-hidden shadow-xl aspect-square bg-brand-black-800">
                                    <div class="absolute inset-0 transition-colors duration-500 offer-overlay"></div>
                                    <div class="relative z-10 p-8 text-center text-white">
                                        <span class="block mb-4 font-serif text-xs italic">0<?php echo $j; ?></span>
                                        <h3 class="font-serif text-lg font-semibold uppercase ">SAMPLE OFFER
                                            <?php echo $j; ?>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Action Button -->
        <div class="mt-10 text-center">
            <a href="<?php echo esc_url($button_link); ?>"
                class="inline-block px-10 py-4 font-serif text-xs font-semibold text-white uppercase transition-all shadow-xl bg-brand-orange hover:bg-brand-blue active:scale-95">
                <?php echo esc_html($button_text); ?>
            </a>
        </div>
    </div>
</section>

<style>
    /* Default overlay for all slides */
    .offer-overlay {
        background-color: rgba(2, 2, 3, 0.6);
        /* Darker by default */
        transition: background-color 0.7s ease;
    }

    /* Brighter overlay for the active (center) slide */
    .offers-carousel-swiper .swiper-slide-active {
        opacity: 1 !important;
        scale: 1.25 !important;
        z-index: 20;
    }

    .offers-carousel-swiper .swiper-slide-active .offer-overlay {
        background-color: rgba(43, 60, 84, 0.2);
        /* Much brighter */
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Swiper('.offers-carousel-swiper', {
            slidesPerView: 1.5,
            centeredSlides: true,
            spaceBetween: 20,
            loop: true,
            speed: 1000,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            breakpoints: {
                768: {
                    slidesPerView: 2.5,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 60,
                }
            }
        });
    });
</script>