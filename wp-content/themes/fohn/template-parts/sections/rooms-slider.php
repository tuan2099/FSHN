<?php
/**
 * Section: Rooms & Suites Slider
 */

$selected_rooms = get_field('home_rooms_list');

?>
<section class="rooms-suites-section py-24 bg-[#EBEBEB] overflow-hidden">
    <div class="container mx-auto">
        <!-- Header -->
        <div class="mb-12">
            <h2 class="text-2xl font-bold flex items-center gap-2">
                <span class="text-brand-blue uppercase tracking-widest">ROOM</span>
                <span class="text-brand-black-400 font-normal italic lowercase font-serif">suites</span>
            </h2>
        </div>

        <!-- Outer Slider Container -->
        <div class="relative group/outer">
            <div class="swiper rooms-outer-swiper">
                <div class="swiper-wrapper">
                    <?php if ($selected_rooms): ?>
                        <?php foreach ($selected_rooms as $room_post):
                            $room_id = $room_post->ID;
                            $size = get_field('room_size', $room_id) ?: '290 square feet / 27 square metres';
                            $gallery = get_field('room_gallery', $room_id);
                            $excerpt = get_the_excerpt($room_id);
                            ?>
                            <div class="swiper-slide h-auto">
                                <div class="bg-transparent flex flex-col h-full">
                                    <!-- Inner Gallery Slider -->
                                    <div class="relative room-card-gallery">
                                        <div class="swiper room-inner-gallery-swiper rounded-none overflow-hidden group/inner">
                                            <div class="swiper-wrapper">
                                                <?php if ($gallery): ?>
                                                    <?php foreach ($gallery as $img_url): ?>
                                                        <div class="swiper-slide aspect-[4/3]">
                                                            <img src="<?php echo esc_url($img_url); ?>"
                                                                alt="<?php echo esc_attr($room_post->post_title); ?>"
                                                                class="w-full h-full object-cover">
                                                        </div>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <div class="swiper-slide aspect-[4/3] bg-brand-black-300"></div>
                                                <?php endif; ?>
                                            </div>

                                        </div>

                                        <!-- Inner Navigation (Moved below image) -->
                                        <div class="flex justify-between items-center py-6 w-full">
                                            <div class="flex gap-5">
                                                <button class="inner-prev hover:opacity-70 transition-opacity">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Vector (5).png"
                                                        alt="Prev" class="w-10 h-auto">
                                                </button>
                                                <button class="inner-next hover:opacity-70 transition-opacity">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Vector (6).png"
                                                        alt="Next" class="w-10 h-auto">
                                                </button>
                                            </div>
                                            <div
                                                class="inner-pagination text-sm font-semibold text-brand-black-800 font-serif !w-auto">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Room Info -->
                                    <div class="flex flex-col flex-grow">
                                        <span class="text-[10px] italic text-brand-black-400 mb-2 font-serif opacity-80">
                                            <?php echo esc_html($size); ?>
                                        </span>
                                        <h3
                                            class="text-xl font-semibold text-brand-blue uppercase tracking-widest mb-4 font-serif">
                                            <?php echo esc_html($room_post->post_title); ?>
                                        </h3>
                                        <p class="text-brand-black-600 text-[13px] leading-relaxed my-8 line-clamp-4">
                                            <?php echo esc_html($excerpt); ?>
                                        </p>

                                        <div class="flex items-center justify-between gap-3 mt-auto">
                                            <a href="#"
                                                class="bg-brand-orange text-[16px] text-white px-5 py-3 font-semibold font-serif uppercase tracking-widest hover:bg-brand-blue transition-all">
                                                BOOK NOW
                                            </a>
                                            <a href="<?php echo get_permalink($room_id); ?>"
                                                class="text-[10px] font-semibold text-[16px] px-3 font-serif text-brand-blue uppercase tracking-widest border-b border-brand-orange pb-1 hover:text-brand-orange transition-colors">
                                                FINDING OUT
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Outer Navigation -->
            <button
                class="outer-prev absolute left-[-60px] top-1/2 -translate-y-1/2 w-12 h-12 rounded-full border border-brand-orange flex items-center justify-center text-brand-orange hover:bg-brand-orange hover:text-white transition-all z-20">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button
                class="outer-next absolute right-[-60px] top-1/2 -translate-y-1/2 w-12 h-12 rounded-full border border-brand-orange flex items-center justify-center text-brand-orange hover:bg-brand-orange hover:text-white transition-all z-20">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize Inner Gallery Sliders first
        const innerGalleryContainers = document.querySelectorAll('.room-card-gallery');
        innerGalleryContainers.forEach(container => {
            const slider = container.querySelector('.room-inner-gallery-swiper');
            if (!slider) return;

            new Swiper(slider, {
                slidesPerView: 1,
                loop: true,
                navigation: {
                    nextEl: container.querySelector('.inner-next'),
                    prevEl: container.querySelector('.inner-prev'),
                },
                pagination: {
                    el: container.querySelector('.inner-pagination'),
                    type: 'fraction',
                    formatFractionCurrent: function (number) {
                        return number;
                    },
                    formatFractionTotal: function (number) {
                        return number;
                    },
                    renderFraction: function (currentClass, totalClass) {
                        return '<span class="' + currentClass + '"></span>' +
                            ' / ' +
                            '<span class="' + totalClass + '"></span>';
                    }
                }
            });
        });

        // Initialize Outer Swiper
        new Swiper('.rooms-outer-swiper', {
            slidesPerView: 1.2,
            spaceBetween: 30,
            centeredSlides: false,
            loop: false,
            navigation: {
                nextEl: '.outer-next',
                prevEl: '.outer-prev',
            },
            breakpoints: {
                768: {
                    slidesPerView: 2.2,
                },
                1024: {
                    slidesPerView: 3,
                }
            }
        });
    });
</script>