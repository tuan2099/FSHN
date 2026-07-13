<?php
/**
 * Section: Offers Carousel (CPT version)
 * Same UI as offers-carousel.php but data comes from the 'offer' Custom Post Type.
 * Used at the bottom of the Hotel & Apartment pages. (Home keeps the ACF version.)
 */

$offers_query = new WP_Query(array(
    'post_type'      => 'offer',
    'posts_per_page' => 8,
    'post_status'    => 'publish',
));

$heading      = 'OFFERS AT LÈGACY';
$button_text  = 'EXPLORE MORE OFFERS';
$button_link  = get_post_type_archive_link('offer') ?: '#';
?>

<section class="offers-carousel-section pb-24 bg-white overflow-hidden">
    <div class="container mx-auto px-6">
        <!-- Heading -->
        <div class="flex justify-center mb-10" data-aos="fade-up">
            <div class="text-center">
                <h2 class="text-[40px] font-serif font-semibold text-brand-blue uppercase mb-4">
                    <?php echo esc_html($heading); ?>
                </h2>
                <div class="w-24 h-0.5 bg-brand-orange mx-auto opacity-60"></div>
            </div>
        </div>

        <!-- Slider Wrapper with clipping -->
        <div class="relative mx-auto py-20 overflow-hidden" data-aos="fade-up" data-aos-delay="200">
            <div class="swiper offers-cpt-swiper !overflow-visible">
                <div class="swiper-wrapper flex items-center">
                    <?php if ($offers_query->have_posts()): ?>
                        <?php $i = 1;
                        while ($offers_query->have_posts()):
                            $offers_query->the_post();
                            $offer_img = get_the_post_thumbnail_url(get_the_ID(), 'large');
                            if (!$offer_img) {
                                $acf_img = get_field('image') ?: get_field('offer_image') ?: get_field('bg_image');
                                if (is_array($acf_img)) {
                                    $offer_img = $acf_img['url'];
                                } elseif (is_string($acf_img)) {
                                    $offer_img = $acf_img;
                                }
                            }
                            ?>
                            <div class="swiper-slide !h-auto transition-all duration-700 opacity-20 scale-[0.7]"
                                data-aos="zoom-in" data-aos-delay="<?php echo $i * 100; ?>">
                                <a href="<?php the_permalink(); ?>"
                                    class="block relative aspect-square rounded-none overflow-hidden group shadow-xl">
                                    <?php if ($offer_img): ?>
                                        <img src="<?php echo esc_url($offer_img); ?>" alt="<?php the_title_attribute(); ?>"
                                            class="absolute inset-0 w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                                    <?php else: ?>
                                        <div
                                            class="absolute inset-0 bg-brand-black-800 flex items-center justify-center text-white italic">
                                            No Image</div>
                                    <?php endif; ?>

                                    <!-- Overlay -->
                                    <div class="offer-overlay absolute inset-0 transition-colors duration-500"></div>

                                    <!-- Content -->
                                    <div
                                        class="absolute inset-0 flex flex-col items-center justify-center text-center p-8 text-white z-10">
                                        <span class="text-xs italic font-serif mb-4 opacity-90">
                                            <?php echo sprintf('%02d', $i); ?>
                                        </span>
                                        <h3
                                            class="text-lg md:text-xl font-serif font-semibold uppercase leading-snug max-w-[250px]">
                                            <?php the_title(); ?>
                                        </h3>
                                    </div>
                                </a>
                            </div>
                            <?php $i++; endwhile;
                        wp_reset_postdata(); ?>
                    <?php else: ?>
                        <!-- Dummy Slides -->
                        <?php for ($j = 1; $j <= 5; $j++): ?>
                            <div class="swiper-slide !h-auto transition-all duration-700 opacity-20 scale-[0.7]">
                                <div
                                    class="relative aspect-square bg-brand-black-800 flex items-center justify-center shadow-xl overflow-hidden">
                                    <div class="offer-overlay absolute inset-0 transition-colors duration-500"></div>
                                    <div class="relative text-center text-white p-8 z-10">
                                        <span class="text-xs italic font-serif mb-4 block">0<?php echo $j; ?></span>
                                        <h3 class="text-lg font-serif font-semibold uppercase">SAMPLE OFFER
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
                class="inline-block bg-brand-orange text-white px-10 py-4 font-serif font-semibold uppercase text-xs hover:bg-brand-blue transition-all shadow-xl active:scale-95">
                <?php echo esc_html($button_text); ?>
            </a>
        </div>
    </div>
</section>

<style>
    /* Default overlay for all slides */
    .offers-cpt-swiper .offer-overlay {
        background-color: rgba(2, 2, 3, 0.6);
        transition: background-color 0.7s ease;
    }

    /* Brighter overlay for the active (center) slide */
    .offers-cpt-swiper .swiper-slide-active {
        opacity: 1 !important;
        scale: 1.25 !important;
        z-index: 20;
    }

    .offers-cpt-swiper .swiper-slide-active .offer-overlay {
        background-color: rgba(43, 60, 84, 0.2);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (document.querySelector('.offers-cpt-swiper')) {
            new Swiper('.offers-cpt-swiper', {
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
                    768: { slidesPerView: 2.5, spaceBetween: 40 },
                    1024: { slidesPerView: 3, spaceBetween: 60 }
                }
            });
        }
    });
</script>
