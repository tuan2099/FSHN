<?php
/**
 * Section: Rooms & Suites Slider with Tabs
 */

// Query Hotel Rooms
$hotel_query = new WP_Query([
    'post_type' => 'room',
    'posts_per_page' => -1,
    'tax_query' => [
        [
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => 'hotel',
        ]
    ],
]);

// Query Residences Rooms (Apartment category)
$residences_query = new WP_Query([
    'post_type' => 'room',
    'posts_per_page' => -1,
    'tax_query' => [
        [
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => 'apartment',
        ]
    ],
]);
?>
<style>
    .room-tab-content {
        transition: all 0.5s ease-in-out;
    }

    .room-tab-content.block {
        animation: fadeInUp 0.6s ease forwards;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .room-tab-trigger.active {
        border-color: #FDB078 !important;
        /* Brand orange underline */
    }
</style>

<style>
    /* Reserve 2 lines for the title so 1-line and 2-line titles stay aligned
       (no text is cut off — longer titles simply grow). */
    .rooms-suites-section .room-card-title {
        min-height: 3.5rem;
    }

    /* Limit description to exactly 3 lines so the "View more" link lines up
       across all cards (short text still reserves 3 lines). */
    .rooms-suites-section .room-desc {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        height: 4.875em;
        position: relative;
        /* 3 lines at leading-relaxed (1.625) */
    }

    .rooms-suites-section .room-desc__more {
        position: absolute;
        right: 0;
        bottom: 0;
        padding-left: 32px;
        background: linear-gradient(to right, rgba(255, 255, 255, 0), #fff 45%);
        white-space: nowrap;
    }

    /* Equal-height cards so the BOOK NOW / FINDING OUT row lines up */
    .rooms-suites-section .rooms-outer-swiper > .swiper-wrapper {
        align-items: stretch;
    }

    .rooms-suites-section .rooms-outer-swiper > .swiper-wrapper > .swiper-slide {
        height: auto;
        display: flex;
    }

    .rooms-suites-section .rooms-outer-swiper > .swiper-wrapper > .swiper-slide > div {
        width: 100%;
    }
</style>

<section class="overflow-hidden rooms-suites-section">
    <div class="container mx-auto">
        <!-- Header with Tabs -->
        <div class="flex items-end justify-start gap-6 mb-12 border-b border-brand-black-100">
            <button
                class="pb-4 font-serif text-2xl font-semibold uppercase transition-all duration-300 border-b-2 border-transparent room-tab-trigger active"
                data-target="hotel">
                <span class="tab-label-active text-brand-blue"><?php pll_e('HOTEL')?></span>
            </button>
            <button
                class="pb-4 font-serif text-2xl font-normal uppercase transition-all duration-300 border-b-2 border-transparent room-tab-trigger text-brand-black-400"
                data-target="residences">
                <span class="tab-label-inactive"><?php pll_e('APARTMENT')?></span>
            </button>
        </div>

        <!-- Outer Slider Container -->
        <div class="relative group/outer">

            <!-- HOTEL TAB CONTENT -->
            <div id="tab-hotel" class="block room-tab-content">
                <div class="swiper rooms-outer-swiper hotel-swiper">
                    <div class="swiper-wrapper">
                        <?php if ($hotel_query->have_posts()): ?>
                            <?php while ($hotel_query->have_posts()):
                                $hotel_query->the_post();
                                $room_id = get_the_ID();
                                $size = get_field('room_size', $room_id) ?: '290 square feet / 27 square metres';
                                $gallery = get_field('room_gallery', $room_id);
                                ?>
                                <div class="h-auto swiper-slide">
                                    <div class="flex flex-col h-full bg-transparent">
                                        <!-- Gallery slider -->
                                        <div class="relative room-card-gallery">
                                            <div
                                                class="overflow-hidden rounded-none swiper room-inner-gallery-swiper group/inner">
                                                <div class="swiper-wrapper">
                                                    <?php if ($gallery): ?>
                                                        <?php foreach ($gallery as $img_url): ?>
                                                            <div class="swiper-slide aspect-[4/3]">
                                                                <a href="<?php the_permalink(); ?>" class="block w-full h-full">
                                                                    <img src="<?php echo esc_url($img_url); ?>" alt="<?php the_title(); ?>"
                                                                        class="object-cover w-full h-full">
                                                                </a>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    <?php else: ?>
                                                        <div class="swiper-slide aspect-[4/3] bg-brand-black-300"></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="flex items-center justify-between w-full py-6">
                                                <div class="flex gap-5">
                                                    <button class="transition-opacity inner-prev hover:opacity-70">
                                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Vector (5).png"
                                                            alt="Prev" class="w-10 h-auto">
                                                    </button>
                                                    <button class="transition-opacity inner-next hover:opacity-70">
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
                                            <span
                                                class="text-[10px] italic text-brand-black-400 mb-2 font-serif opacity-80"><?php echo esc_html($size); ?></span>
                                            <h3 class="mb-2 font-serif text-[16px] font-semibold uppercase room-card-title tracking-wider">
                                                <a href="<?php the_permalink(); ?>"
                                                    class="transition-colors text-brand-blue hover:text-brand-orange">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h3>
                                            <p class="room-desc text-brand-black-900 text-[13px] leading-relaxed font-[300] mt-0 mb-8">
                                                <?php echo esc_html(get_the_excerpt()); ?><a href="<?php the_permalink(); ?>"
                                                    class="font-serif font-semibold transition-colors room-desc__more text-brand-orange hover:text-brand-blue"><?php pll_e('more'); ?></a>
                                            </p>
                                            <div class="flex items-center justify-center gap-3 mt-auto">
                                                <a href="https://fohn.backhotelite.com/en/"
                                                    class="bg-brand-orange text-[16px] text-white px-5 py-3 trac font-semibold font-serif uppercase hover:bg-brand-blue transition-all"><?php pll_e('BOOK NOW'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile;
                            wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- RESIDENCES TAB CONTENT -->
            <div id="tab-residences" class="hidden room-tab-content">
                <div class="swiper rooms-outer-swiper residences-swiper">
                    <div class="swiper-wrapper">
                        <?php if ($residences_query->have_posts()): ?>
                            <?php while ($residences_query->have_posts()):
                                $residences_query->the_post();
                                $room_id = get_the_ID();
                                $size = get_field('room_size', $room_id) ?: '290 square feet / 27 square metres';
                                $gallery = get_field('room_gallery', $room_id);
                                ?>
                                <div class="h-auto swiper-slide">
                                    <div class="flex flex-col h-full bg-transparent">
                                        <!-- Gallery slider -->
                                        <div class="relative room-card-gallery">
                                            <div
                                                class="overflow-hidden rounded-none swiper room-inner-gallery-swiper group/inner">
                                                <div class="swiper-wrapper">
                                                    <?php if ($gallery): ?>
                                                        <?php foreach ($gallery as $img_url): ?>
                                                            <div class="swiper-slide aspect-[4/3]">
                                                                <a href="<?php the_permalink(); ?>" class="block w-full h-full">
                                                                    <img src="<?php echo esc_url($img_url); ?>" alt="<?php the_title(); ?>"
                                                                        class="object-cover w-full h-full">
                                                                </a>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    <?php else: ?>
                                                        <div class="swiper-slide aspect-[4/3] bg-brand-black-300"></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="flex items-center justify-between w-full py-6">
                                                <div class="flex gap-5">
                                                    <button class="transition-opacity inner-prev hover:opacity-70">
                                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Vector (5).png"
                                                            alt="Prev" class="w-10 h-auto">
                                                    </button>
                                                    <button class="transition-opacity inner-next hover:opacity-70">
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
                                            <span
                                                class="text-[10px] italic text-brand-black-400 mb-2 font-serif opacity-80"><?php echo esc_html($size); ?></span>
                                            <h3 class="mb-2 font-serif text-[16px] font-semibold uppercase room-card-title tracking-wider">
                                                <a href="<?php the_permalink(); ?>"
                                                    class="transition-colors text-brand-blue hover:text-brand-orange">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h3>
                                            <p class="room-desc text-brand-black-900 text-[13px] leading-relaxed font-[300] mb-8">
                                                <?php echo esc_html(get_the_excerpt()); ?><a href="<?php the_permalink(); ?>"
                                                    class="font-serif font-semibold transition-colors room-desc__more text-brand-orange hover:text-brand-blue"><?php pll_e('more'); ?></a>
                                            </p>
                                            <div class="flex items-center justify-center gap-3 mt-auto">
                                                <a href="https://fohn.backhotelite.com/en/"
                                                    class="bg-brand-orange text-[16px] text-white px-5 py-3 font-semibold font-serif uppercase hover:bg-brand-blue transition-all"><?php pll_e('BOOK NOW'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile;
                            wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Outer Navigation -->
            <button
                class="outer-prev absolute left-[-60px] top-1/2 -translate-y-1/2 w-12 h-12 rounded-full border border-brand-orange flex items-center justify-center text-brand-orange hover:bg-brand-orange hover:text-white transition-all z-20">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button
                class="outer-next absolute right-[-60px] top-1/2 -translate-y-1/2 w-12 h-12 rounded-full border border-brand-orange flex items-center justify-center text-brand-orange hover:bg-brand-orange hover:text-white transition-all z-20">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const swipers = [];

        function initRoomSwipers() {
            // Destroy existing to avoid duplicates when re-init
            swipers.forEach(s => s && s.destroy && s.destroy());
            swipers.length = 0;

            // Initialize Outer Swipers
            document.querySelectorAll('.rooms-outer-swiper').forEach(container => {
                const s = new Swiper(container, {
                    slidesPerView: 1.2,
                    spaceBetween: 10,
                    navigation: {
                        nextEl: '.outer-next',
                        prevEl: '.outer-prev',
                    },
                    breakpoints: {
                        768: { slidesPerView: 2.2 },
                        1024: { slidesPerView: 3 }
                    }
                });
                swipers.push(s);
            });

            // Initialize Inner Gallery Swipers
            document.querySelectorAll('.room-inner-gallery-swiper').forEach(container => {
                new Swiper(container, {
                    slidesPerView: 1,
                    loop: true,
                    nested: true,
                    navigation: {
                        nextEl: container.closest('.room-card-gallery').querySelector('.inner-next'),
                        prevEl: container.closest('.room-card-gallery').querySelector('.inner-prev'),
                    },
                    pagination: {
                        el: container.closest('.room-card-gallery').querySelector('.inner-pagination'),
                        type: 'fraction'
                    }
                });
            });
        }

        initRoomSwipers();

        // Tab Logic
        const triggers = document.querySelectorAll('.room-tab-trigger');
        const contents = document.querySelectorAll('.room-tab-content');

        triggers.forEach(trigger => {
            trigger.addEventListener('click', function () {
                const target = this.getAttribute('data-target');

                // Update Buttons
                triggers.forEach(t => {
                    t.classList.remove('active', 'font-semibold');
                    t.classList.add('font-normal', 'text-brand-black-400');
                    t.querySelector('span').classList.remove('text-brand-blue');
                });
                this.classList.add('active', 'font-semibold');
                this.classList.remove('font-normal', 'text-brand-black-400');
                this.querySelector('span').classList.add('text-brand-blue');

                // Update Content
                contents.forEach(c => {
                    if (c.id === 'tab-' + target) {
                        c.classList.remove('hidden');
                        c.classList.add('block');
                    } else {
                        c.classList.add('hidden');
                        c.classList.remove('block');
                    }
                });

                // Re-init swipers in visible tab
                setTimeout(initRoomSwipers, 50);
            });
        });
    });
</script>