<?php
/**
 * Section: Apartment List
 */

$apt_query = new WP_Query(array(
    'post_type' => 'room',
    'posts_per_page' => -1,
    'category_name' => 'apartment',
    'order' => 'ASC'
));
?>

<section class="py-24 bg-white">
    <div class="container mx-auto px-6 max-w-[1200px]">
        <?php if ($apt_query->have_posts()): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-24">
                <?php $apt_index = 0;
                while ($apt_query->have_posts()):
                    $apt_query->the_post();
                    $gallery = get_field('room_gallery');
                    $description = get_field('room_description');
                    $size = get_field('room_size');
                    $occupancy = get_field('room_occupancy');
                    $view = get_field('room_view');
                    $bed = get_field('room_bed');
                    $balcony = get_field('room_balcony');
                    $book_link = get_field('room_book_link') ?: '#';
                    ?>
                    <div class="apartment-card group">
                        <!-- Image Slider -->
                        <div class="relative mb-10 overflow-hidden">
                            <div class="swiper apt-slider-<?php echo $apt_index; ?> overflow-hidden shadow-lg">
                                <div class="swiper-wrapper">
                                    <?php if ($gallery): ?>
                                        <?php foreach ($gallery as $img_url): ?>
                                            <div class="swiper-slide aspect-[16/10]">
                                                <img src="<?php echo esc_url($img_url); ?>" alt="<?php the_title_attribute(); ?>"
                                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <div
                                            class="swiper-slide aspect-[16/10] bg-brand-black-100 flex items-center justify-center italic text-brand-black-300">
                                            <?php pll_e('No Images'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <!-- Static Navigation Below Image -->
                            <div class="mt-6 flex justify-between items-center">
                                <div class="flex gap-8">
                                    <button
                                        class="apt-prev-<?php echo $apt_index; ?> hover:translate-x-[-4px] transition-transform">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Vector (5).png"
                                            alt="Prev" class="w-10 h-4 object-contain">
                                    </button>
                                    <button
                                        class="apt-next-<?php echo $apt_index; ?> hover:translate-x-[4px] transition-transform">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Vector (6).png"
                                            alt="Next" class="w-10 h-4 object-contain">
                                    </button>
                                </div>
                                <div
                                    class="apt-pagination-<?php echo $apt_index; ?> text-sm font-bold text-brand-black-900 font-serif relative !bottom-auto !left-auto !w-auto text-right flex items-baseline justify-end">
                                </div>
                            </div>
                        </div>

                        <!-- Apartment Content -->
                        <div class="text-center">
                            <h3 class="text-brand-blue font-serif text-2xl uppercase mb-2">
                                <?php the_title(); ?>
                            </h3>
                            <div class="w-16 h-px bg-brand-orange mx-auto mb-8 opacity-50"></div>

                            <p class="text-brand-black-600 font-sans text-sm leading-relaxed mb-10 max-w-[470px] mx-auto opacity-80 min-h-[60px] line-clamp-4 text-left md:text-center"
                                style="display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden;">
                                <?php echo esc_html($description); ?>
                            </p>

                            <!-- Meta Info -->
                            <div class="flex flex-col items-center gap-y-6 mb-12 w-full">
                                <div class="flex flex-wrap justify-center gap-x-8 md:gap-x-16 gap-y-4">
                                    <div class="flex items-center gap-3">
                                        <div class="text-brand-orange flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <rect width="16" height="16" x="4" y="4" rx="1" />
                                                <rect width="8" height="8" x="8" y="8" rx="0.5" />
                                            </svg>
                                        </div>
                                        <span
                                            class="text-brand-black-700 font-sans text-xs font-medium whitespace-nowrap"><?php echo esc_html($size); ?></span>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <div class="text-brand-orange flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                                <circle cx="9" cy="7" r="4" />
                                                <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                            </svg>
                                        </div>
                                        <span
                                            class="text-brand-black-700 font-sans text-xs font-medium whitespace-nowrap"><?php echo esc_html($occupancy); ?></span>
                                    </div>
                                </div>

                                <div class="flex flex-wrap justify-center gap-x-6 md:gap-x-8 gap-y-4">
                                    <div class="flex items-center gap-3">
                                        <div class="text-brand-orange flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" />
                                                <circle cx="12" cy="12" r="3" />
                                            </svg>
                                        </div>
                                        <span
                                            class="text-brand-black-700 font-sans text-xs font-medium whitespace-nowrap"><?php echo esc_html($view); ?></span>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <div class="text-brand-orange flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M2 4v16" />
                                                <path d="M2 8h18a2 2 0 0 1 2 2v10" />
                                                <path d="M2 17h20" />
                                                <path d="M6 8v9" />
                                            </svg>
                                        </div>
                                        <span
                                            class="text-brand-black-700 font-sans text-xs font-medium whitespace-nowrap"><?php echo esc_html($bed); ?></span>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <div class="text-brand-orange flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M4 14h16v6H4z" />
                                                <path d="M2 14h20" />
                                                <path d="M8 14v6" />
                                                <path d="M16 14v6" />
                                                <path d="M6 14v-4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v4" />
                                            </svg>
                                        </div>
                                        <span
                                            class="text-brand-black-700 font-sans text-xs font-medium whitespace-nowrap"><?php echo esc_html($balcony); ?></span>
                                    </div>
                                </div>
                            </div>

                            <a href="<?php echo esc_url($book_link); ?>"
                                class="inline-block bg-[#FDB078] text-white px-12 py-4 text-xs font-bold uppercase tracking-[0.2em] hover:bg-brand-blue transition-all shadow-lg">
                                <?php pll_e('BOOK NOW'); ?>
                            </a>
                        </div>
                    </div>
                    <?php $apt_index++; endwhile;
                wp_reset_postdata(); ?>
            </div>
        <?php else: ?>
            <div class="text-center text-brand-black-400 py-20">
                <p><?php pll_e('No apartments configured yet. Please add them in the Apartment Page backend.'); ?></p>
            </div>
        <?php endif; ?>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        <?php for ($i = 0; $i < $apt_index; $i++): ?>
            new Swiper('.apt-slider-<?php echo $i; ?>', {
                loop: true,
                speed: 800,
                navigation: {
                    nextEl: '.apt-next-<?php echo $i; ?>',
                    prevEl: '.apt-prev-<?php echo $i; ?>',
                },
                pagination: {
                    el: '.apt-pagination-<?php echo $i; ?>',
                    type: 'fraction',
                    renderFraction: function (currentClass, totalClass) {
                        return '<span class="' + currentClass + '"></span>' +
                            ' / ' +
                            '<span class="' + totalClass + '"></span>';
                    }
                }
            });
        <?php endfor; ?>
    });
</script>