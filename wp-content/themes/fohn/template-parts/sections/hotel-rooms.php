<?php
/**
 * Section: Hotel Rooms List
 */

$rooms_query = new WP_Query(array(
    'post_type' => 'room',
    'posts_per_page' => -1,
    'order' => 'ASC'
));
?>

<section class="pb-24 bg-white">
    <div class="container mx-auto px-6 max-w-[1140px]">
        <?php if ($rooms_query->have_posts()): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-24">
                <?php $room_index = 0; while ($rooms_query->have_posts()): $rooms_query->the_post(); 
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
                                                <img src="<?php echo esc_url($img_url); ?>" alt="<?php the_title(); ?>" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <div class="swiper-slide aspect-[16/10] bg-brand-black-100 flex items-center justify-center italic text-brand-black-300">
                                            No Images
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <!-- Navigation Overlay -->
                            <div class="absolute bottom-[-45px] left-0 right-0 flex justify-between items-center px-2 z-30 group-hover:bottom-6 transition-all duration-500 opacity-0 group-hover:opacity-100 bg-white/90 py-3 mx-4 rounded-lg shadow-xl">
                                <div class="flex gap-8 pl-4">
                                    <button class="room-prev-<?php echo $room_index; ?> hover:translate-x-[-3px] transition-transform text-brand-orange">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Vector (5).png" alt="Prev" class="w-8 h-4 object-contain">
                                    </button>
                                    <button class="room-next-<?php echo $room_index; ?> hover:translate-x-[3px] transition-transform text-brand-orange">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Vector (6).png" alt="Next" class="w-8 h-4 object-contain">
                                    </button>
                                </div>
                                <div class="room-pagination-<?php echo $room_index; ?> text-xs font-bold text-brand-black-900 tracking-widest font-sans pr-4"></div>
                            </div>

                            <!-- Fallback Navigation for mobile/non-hover -->
                            <div class="mt-4 flex md:hidden justify-between items-center px-2">
                                <div class="flex gap-8">
                                    <button class="room-prev-<?php echo $room_index; ?> text-brand-orange">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Vector (5).png" alt="Prev" class="w-8 h-4 object-contain">
                                    </button>
                                    <button class="room-next-<?php echo $room_index; ?> text-brand-orange">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Vector (6).png" alt="Next" class="w-8 h-4 object-contain">
                                    </button>
                                </div>
                                <div class="room-pagination-<?php echo $room_index; ?> text-xs font-bold text-brand-black-900 tracking-widest font-sans"></div>
                            </div>
                        </div>

                        <!-- Room Content -->
                        <div class="text-center">
                            <h3 class="text-brand-blue font-serif text-2xl tracking-[0.1em] uppercase mb-6"><?php the_title(); ?></h3>
                            <div class="w-16 h-px bg-brand-orange mx-auto mb-8 opacity-50"></div>
                            
                            <p class="text-brand-black-600 font-sans text-sm leading-relaxed mb-10 max-w-[450px] mx-auto opacity-80 min-h-[60px]">
                                <?php echo esc_html($description); ?>
                            </p>

                            <!-- Meta Info Grid -->
                            <div class="grid grid-cols-2 gap-y-6 mb-12 max-w-[450px] mx-auto text-left pl-8">
                                <!-- Size -->
                                <div class="flex items-center gap-4">
                                    <div class="text-brand-orange">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M7 17V7h10"/></svg>
                                    </div>
                                    <span class="text-brand-black-700 font-sans text-xs font-medium"><?php echo esc_html($size); ?></span>
                                </div>
                                <!-- Occupancy -->
                                <div class="flex items-center gap-4">
                                    <div class="text-brand-orange">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                                    </div>
                                    <span class="text-brand-black-700 font-sans text-xs font-medium"><?php echo esc_html($occupancy); ?></span>
                                </div>
                                <!-- View -->
                                <div class="flex items-center gap-4">
                                    <div class="text-brand-orange">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                                    </div>
                                    <span class="text-brand-black-700 font-sans text-xs font-medium"><?php echo esc_html($view); ?></span>
                                </div>
                                <!-- Bed -->
                                <div class="flex items-center gap-4">
                                    <div class="text-brand-orange">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 4v16"/><path d="M2 8h18a2 2 0 0 1 2 2v10"/><path d="M2 17h20"/><path d="M6 8v9"/></svg>
                                    </div>
                                    <span class="text-brand-black-700 font-sans text-xs font-medium"><?php echo esc_html($bed); ?></span>
                                </div>
                                <!-- Balcony -->
                                <div class="flex items-center gap-4">
                                    <div class="text-brand-orange">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="8" x="2" y="14" rx="2"/><path d="M6 14v-4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v4"/><path d="M12 2v6"/></svg>
                                    </div>
                                    <span class="text-brand-black-700 font-sans text-xs font-medium"><?php echo esc_html($balcony); ?></span>
                                </div>
                            </div>

                            <a href="<?php echo esc_url($book_link); ?>" class="inline-block bg-[#FDB078] text-white px-12 py-4 text-xs font-bold uppercase tracking-[0.2em] hover:bg-brand-blue transition-all shadow-lg">
                                BOOK NOW
                            </a>
                        </div>
                    </div>
                <?php $room_index++; endwhile; wp_reset_postdata(); ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    <?php for($i=0; $i<$room_index; $i++): ?>
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
