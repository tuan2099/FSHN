<?php
/**
 * Section: Rooms & Suites Slider
 */

$selected_rooms = get_field('home_rooms_list');

?>
<section class="rooms-suites-section py-24 bg-[#EBEBEB] overflow-hidden">
    <div class="container mx-auto px-6">
        <!-- Header -->
        <div class="mb-12">
            <h2 class="text-2xl font-bold flex items-center gap-2">
                <span class="text-brand-blue uppercase tracking-widest">ROOM</span>
                <span class="text-brand-black-400 font-normal italic lowercase font-serif">suites</span>
            </h2>
        </div>

        <!-- Outer Slider Container -->
        <div class="relative group/outer">
            <div class="swiper rooms-outer-swiper !overflow-visible">
                <div class="swiper-wrapper">
                    <?php if ($selected_rooms) : ?>
                        <?php foreach ($selected_rooms as $room_post) : 
                            $room_id = $room_post->ID;
                            $size = get_field('room_size', $room_id) ?: '290 square feet / 27 square metres';
                            $gallery = get_field('room_gallery', $room_id);
                            $excerpt = get_the_excerpt($room_id);
                        ?>
                            <div class="swiper-slide h-auto max-w-sm md:max-w-md lg:max-w-lg">
                                <div class="bg-transparent flex flex-col h-full">
                                    <!-- Inner Gallery Slider -->
                                    <div class="relative room-card-gallery mb-8">
                                        <div class="swiper room-inner-gallery-swiper rounded-none overflow-hidden group/inner">
                                            <div class="swiper-wrapper">
                                                <?php if ($gallery) : ?>
                                                    <?php foreach ($gallery as $img_url) : ?>
                                                        <div class="swiper-slide aspect-[4/3]">
                                                            <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($room_post->post_title); ?>" class="w-full h-full object-cover">
                                                        </div>
                                                    <?php endforeach; ?>
                                                <?php else : ?>
                                                    <div class="swiper-slide aspect-[4/3] bg-brand-black-300"></div>
                                                <?php endif; ?>
                                            </div>
                                            
                                            <!-- Inner Navigation -->
                                            <div class="absolute bottom-2 left-0 right-0 z-10 px-4 flex justify-between items-center bg-transparent">
                                                <div class="flex gap-4">
                                                    <button class="inner-prev text-brand-orange hover:translate-x-[-2px] transition-transform">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                                                        </svg>
                                                    </button>
                                                    <button class="inner-next text-brand-orange hover:translate-x-[2px] transition-transform">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                                        </svg>
                                                    </button>
                                                </div>
                                                <div class="inner-pagination text-[10px] font-bold text-brand-black-800 tracking-widest"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Room Info -->
                                    <div class="flex flex-col flex-grow">
                                        <span class="text-[10px] italic text-brand-black-400 mb-2 font-serif">
                                            <?php echo esc_html($size); ?>
                                        </span>
                                        <h3 class="text-xl font-bold text-brand-blue uppercase tracking-widest mb-4">
                                            <?php echo esc_html($room_post->post_title); ?>
                                        </h3>
                                        <p class="text-brand-black-600 text-sm leading-relaxed mb-8 line-clamp-4">
                                            <?php echo esc_html($excerpt); ?>
                                        </p>
                                        
                                        <div class="flex items-center gap-8 mt-auto">
                                            <a href="#" class="bg-brand-orange text-white px-8 py-3 text-xs font-bold uppercase tracking-widest hover:bg-brand-blue transition-all">
                                                BOOK NOW
                                            </a>
                                            <a href="<?php echo get_permalink($room_id); ?>" class="text-[10px] font-bold text-brand-blue uppercase tracking-widest border-b border-brand-orange pb-1 hover:text-brand-orange transition-colors">
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
            <button class="outer-prev absolute left-[-60px] top-1/2 -translate-y-1/2 w-12 h-12 rounded-full border border-brand-orange flex items-center justify-center text-brand-orange hover:bg-brand-orange hover:text-white transition-all z-20">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button class="outer-next absolute right-[-60px] top-1/2 -translate-y-1/2 w-12 h-12 rounded-full border border-brand-orange flex items-center justify-center text-brand-orange hover:bg-brand-orange hover:text-white transition-all z-20">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Inner Gallery Sliders first
    const innerSliders = document.querySelectorAll('.room-inner-gallery-swiper');
    innerSliders.forEach(slider => {
        new Swiper(slider, {
            slidesPerView: 1,
            loop: true,
            navigation: {
                nextEl: slider.querySelector('.inner-next'),
                prevEl: slider.querySelector('.inner-prev'),
            },
            pagination: {
                el: slider.querySelector('.inner-pagination'),
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
