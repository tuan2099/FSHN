<?php
/**
 * Section: Hotel Rooms List
 */

$rooms_query = new WP_Query(array(
    'post_type' => 'room',
    'posts_per_page' => -1,
    'category_name' => 'hotel',
    'order' => 'ASC'
));
?>

<section class="pb-24 bg-white">
    <div class="container mx-auto">
        <?php if ($rooms_query->have_posts()): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12" style="row-gap:4rem">
                <?php $room_index = 0;
                while ($rooms_query->have_posts()):
                    $rooms_query->the_post();
                    $gallery = get_field('room_gallery');
                    $description = get_field('room_description');
                    $size = get_field('room_size');
                    $occupancy = get_field('room_occupancy');
                    $view = get_field('room_view');
                    $bed = get_field('room_bed');
                    $balcony = get_field('room_balcony');
                    $book_link = get_field('room_book_link') ?: '#';
                    ?>
                    <div class="room-card group">
                        <!-- Image Slider -->
                        <div class="relative mb-10 overflow-hidden">
                            <div class="swiper room-slider-<?php echo $room_index; ?> overflow-hidden shadow-lg">
                                <div class="swiper-wrapper">
                                    <?php if ($gallery): ?>
                                        <?php foreach ($gallery as $img_url): ?>
                                            <div class="swiper-slide aspect-[16/10]">
                                                <img src="<?php echo esc_url($img_url); ?>" alt="<?php the_title(); ?>"
                                                    class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-105">
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
                            <div class="flex items-center justify-between mt-6">
                                <div class="flex gap-8">
                                    <button
                                        class="room-prev-<?php echo $room_index; ?> hover:translate-x-[-4px] transition-transform">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Vector (5).png"
                                            alt="Prev" class="object-contain w-10 h-4">
                                    </button>
                                    <button
                                        class="room-next-<?php echo $room_index; ?> hover:translate-x-[4px] transition-transform">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Vector (6).png"
                                            alt="Next" class="object-contain w-10 h-4">
                                    </button>
                                </div>
                                <div
                                    class="room-pagination-<?php echo $room_index; ?> text-sm font-bold text-brand-black-900 font-serif relative !bottom-auto !left-auto !w-auto text-right flex items-baseline justify-end">
                                </div>
                            </div>
                        </div>

                        <!-- Room Content -->
                        <div class="text-center">
                            <h3 class="text-brand-blue font-serif text-[16px] tracking-[2px] font-semibold uppercase mb-2">
                                <?php the_title(); ?>
                            </h3>
                            <div class="w-16 h-px mx-auto mb-8 opacity-50 bg-brand-orange"></div>

                            <p class="text-brand-black-600 font-sans text-sm leading-relaxed mb-10 max-w-[470px] mx-auto opacity-80 min-h-[60px] line-clamp-4 text-left md:text-center"
                                style="display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden; font-weight: 200">
                                <?php echo esc_html($description); ?>
                            </p>

                            <!-- Meta Info: Top 2, Bottom 3 Layout -->
                            <div class="flex flex-col items-center w-full mb-12 gap-y-6">
                                <!-- Top Row (2 items) -->
                                <div class="flex flex-wrap justify-center gap-x-8 md:gap-x-16 gap-y-4">
                                    <!-- Size -->
                                    <div class="flex items-center gap-3">
                                        <div class="flex-shrink-0">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/bx_area.png"
                                                alt="Size" class="object-contain w-7 h-7">
                                        </div>
                                        <span
                                            class="text-brand-black-700 font-sans text-[13px] whitespace-nowrap" style="font-weight:200"><?php echo esc_html($size); ?></span>
                                    </div>
                                    <!-- Occupancy -->
                                    <div class="flex items-center gap-3">
                                        <div class="flex-shrink-0">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/wordpress_people.png"
                                                alt="Occupancy" class="object-contain w-7 h-7">
                                        </div>
                                        <span
                                            class="text-brand-black-700 font-sans text-[13px] whitespace-nowrap" style="font-weight:200"><?php echo esc_html($occupancy); ?></span>
                                    </div>
                                </div>

                                <!-- Bottom Row (3 items) -->
                                <div class="flex flex-wrap justify-between gap-x-6 md:gap-x-8 gap-y-4 max-w-[470px] w-full mx-auto">
                                    <!-- View -->
                                    <div class="flex items-center gap-3">
                                        <div class="flex-shrink-0">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Group.png"
                                                alt="View" class="object-contain w-7 h-7">
                                        </div>
                                        <span
                                            class="text-brand-black-700 font-sans text-[13px] whitespace-nowrap" style="font-weight:200"><?php echo esc_html($view); ?></span>
                                    </div>
                                    <!-- Bed -->
                                    <div class="flex items-center gap-3">
                                        <div class="flex-shrink-0">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/material-symbols_bed-outline.png"
                                                alt="Bed" class="object-contain w-7 h-7">
                                        </div>
                                        <span
                                            class="text-brand-black-700 font-sans text-[13px] whitespace-nowrap" style="font-weight:200"><?php echo esc_html($bed); ?></span>
                                    </div>
                                    <!-- Balcony -->
                                    <div class="flex items-center gap-3">
                                        <div class="flex-shrink-0">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cbi_rooms-balcony.png"
                                                alt="Balcony" class="object-contain w-7 h-7">
                                        </div>
                                        <span
                                            class="text-brand-black-700 font-sans text-[13px] whitespace-nowrap" style="font-weight:200"><?php echo esc_html($balcony); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-wrap items-center justify-center gap-4">
                                <a href="<?php echo esc_url($book_link); ?>"
                                    class="inline-block bg-[#FDB078] text-white font-serif px-6 py-2 text-[16px] font-bold uppercase hover:bg-brand-blue transition-all">
                                    <?php pll_e('BOOK NOW'); ?>
                                </a>
                                <a href="<?php echo esc_url(get_permalink()); ?>"
                                    class="inline-block border-2 border-brand-orange text-brand-blue font-serif px-6 py-2 text-[16px] font-bold uppercase hover:bg-brand-blue hover:text-white hover:border-brand-blue transition-all">
                                    <?php pll_e('Find Out'); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php $room_index++; endwhile;
                wp_reset_postdata(); ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        <?php for ($i = 0; $i < $room_index; $i++): ?>
            new Swiper('.room-slider-<?php echo $i; ?>', {
                loop: true,
                speed: 800,
                navigation: {
                    nextEl: '.room-next-<?php echo $i; ?>',
                    prevEl: '.room-prev-<?php echo $i; ?>',
                },
                pagination: {
                    el: '.room-pagination-<?php echo $i; ?>',
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