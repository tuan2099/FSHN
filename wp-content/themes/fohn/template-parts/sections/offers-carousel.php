<?php
/**
 * Section: Offers Carousel
 * Data fetched from 'offer' Custom Post Type
 */

$offers_query = new WP_Query(array(
    'post_type' => 'offer',
    'posts_per_page' => 6,
));

$heading = get_field('offers_heading') ?: 'OFFERS AT LÈGACY';
$button_text = get_field('offers_button_text') ?: 'EXPLORE MORE OFFERS';
$button_link = get_field('offers_button_link') ?: '#';
?>

<section class="offers-carousel-section pb-24 bg-white overflow-hidden">
    <div class="container mx-auto px-6">
        <!-- Heading -->
        <div class="flex justify-center mb-10">
            <div class="text-center">
                <h2
                    class="text-2xl lg:text-3xl font-serif font-semibold text-brand-blue uppercase tracking-[0.3em] mb-4">
                    <?php echo esc_html($heading); ?>
                </h2>
                <div class="w-24 h-0.5 bg-brand-orange mx-auto opacity-60"></div>
            </div>
        </div>

        <!-- Slider Wrapper with clipping -->
        <div class="relative mx-auto py-20 overflow-hidden">
            <div class="swiper offers-carousel-swiper !overflow-visible">
                <div class="swiper-wrapper flex items-center">
                    <?php if ($offers_query->have_posts()): ?>
                        <?php $i = 1;
                        while ($offers_query->have_posts()):
                            $offers_query->the_post(); ?>
                            <div class="swiper-slide !h-auto transition-all duration-700 opacity-20 scale-[0.7]">
                                <div class="relative aspect-square rounded-none overflow-hidden group shadow-xl">
                                    <?php if (has_post_thumbnail()): ?>
                                        <?php the_post_thumbnail('large', ['class' => 'absolute inset-0 w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110']); ?>
                                    <?php else: ?>
                                        <div
                                            class="absolute inset-0 bg-brand-black-800 flex items-center justify-center text-white italic">
                                            No Image</div>
                                    <?php endif; ?>

                                    <!-- Overlay -->
                                    <div
                                        class="absolute inset-0 bg-brand-black-900/60 group-hover:bg-brand-black-900/70 transition-colors duration-500">
                                    </div>

                                    <!-- Content -->
                                    <div
                                        class="absolute inset-0 flex flex-col items-center justify-center text-center p-8 text-white z-10">
                                        <span class="text-xs italic font-serif mb-4 opacity-90 tracking-widest">
                                            <?php echo sprintf('%02d', $i); ?>
                                        </span>
                                        <h3
                                            class="text-lg md:text-xl font-serif font-semibold uppercase tracking-[0.2em] leading-snug max-w-[250px]">
                                            <?php the_title(); ?>
                                        </h3>
                                    </div>

                                    <!-- Link -->
                                    <a href="<?php the_permalink(); ?>" class="absolute inset-0 z-20"></a>
                                </div>
                            </div>
                            <?php $i++; endwhile;
                        wp_reset_postdata(); ?>
                    <?php else: ?>
                        <!-- Dummy Slides -->
                        <?php for ($j = 1; $j <= 5; $j++): ?>
                            <div class="swiper-slide !h-auto transition-all duration-700 opacity-20 scale-[0.7]">
                                <div
                                    class="relative aspect-square bg-brand-black-800 flex items-center justify-center shadow-xl">
                                    <div class="text-center text-white p-8">
                                        <span class="text-xs italic font-serif mb-4 block">0<?php echo $j; ?></span>
                                        <h3 class="text-lg font-serif font-semibold uppercase tracking-widest">SAMPLE OFFER
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
                class="inline-block bg-brand-orange text-white px-10 py-4 font-serif font-semibold uppercase tracking-[0.2em] text-xs hover:bg-brand-blue transition-all shadow-xl active:scale-95">
                <?php echo esc_html($button_text); ?>
            </a>
        </div>
    </div>
</section>

<style>
    .offers-carousel-swiper .swiper-slide-active {
        opacity: 1 !important;
        scale: 1.25 !important;
        z-index: 20;
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