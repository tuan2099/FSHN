<?php
/**
 * Section: Dining Content
 */

$intro_title = get_field('dining_intro_title') ?: 'DINING';
$intro_subtitle = get_field('dining_intro_subtitle') ?: 'Where Flavors, Culture, and Creativity Meet Above Hanoi';
$intro_desc = get_field('dining_intro_desc');
$menu_link_1 = get_field('dining_menu_link_1');
$menu_link_2 = get_field('dining_menu_link_2');

$slider_images = get_field('dining_slider_images');
$main_book_link = get_field('dining_main_book_link') ?: '#';
$dining_outlets = get_field('dining_outlets');
?>

<section class="relative py-24 overflow-hidden bg-white">
    <!-- Decorative Florals (Matching Screenshot) -->
    <div class="absolute left-[-50px] top-[10%] w-[350px] pointer-events-none select-none z-0">
        <?php if (get_field('dining_flower_left')): ?>
            <img src="<?php echo esc_url(get_field('dining_flower_left')); ?>" alt="" class="w-full h-auto">
        <?php else: ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lotus-bg.png" alt="" class="w-full h-auto">
        <?php endif; ?>
    </div>
    <div class="absolute right-[-50px] top-[10%] w-[350px] pointer-events-none select-none z-0 scale-x-[-1]">
        <?php if (get_field('dining_flower_right')): ?>
            <img src="<?php echo esc_url(get_field('dining_flower_right')); ?>" alt="" class="w-full h-auto">
        <?php else: ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lotus-bg.png" alt="" class="w-full h-auto">
        <?php endif; ?>
    </div>

    <div class="container relative z-10 mx-auto px-6 max-w-[1040px] mb-32">
        <!-- Intro Header (New Section from Screenshot) -->
        <div class="text-center mb-18">
            <h2 class="text-brand-blue font-serif text-5xl tracking-[0.2em] mb-6 uppercase">
                <?php echo esc_html($intro_title); ?>
            </h2>
            <div class="w-24 h-px bg-[#FDB078] mx-auto mb-10"></div>

            <h4 class="text-brand-blue font-serif font-bold text-xl mb-8">
                <?php echo esc_html($intro_subtitle); ?>
            </h4>

            <?php if ($intro_desc): ?>
                <p class="text-brand-black-700 font-sans text-base leading-loose max-w-[900px] mx-auto mb-12">
                    <?php echo nl2br(esc_html($intro_desc)); ?>
                </p>
            <?php else: ?>
                <p class="text-brand-black-700 font-sans text-base leading-loose max-w-[900px] mx-auto mb-12">
                    Located on the 24th floor, our dining and social spaces reimagine Vietnamese hospitality through modern
                    flavors, artistic energy, and panoramic views of Hanoi’s skyline. The all-day dining restaurant, bar,
                    and VIP Room create a seamless journey from casual daytime gatherings to vibrant, elevated evenings.
                    Guests can also enjoy 24/7 in-room dining, bringing curated dishes and crafted comfort directly to their
                    room.
                </p>
            <?php endif; ?>

            <div class="flex flex-wrap justify-center gap-12 mt-10">
                <a href="<?php echo esc_url($menu_link_1 ?: '#'); ?>"
                    class="text-brand-blue font-serif font-bold text-sm tracking-[0.2em] uppercase border-b border-[#FDB078] pb-1 hover:text-brand-orange transition-colors">
                    ALL-DAY DINING MENU
                </a>
                <a href="<?php echo esc_url($menu_link_2 ?: '#'); ?>"
                    class="text-brand-blue font-serif font-bold text-sm tracking-[0.2em] uppercase border-b border-[#FDB078] pb-1 hover:text-brand-orange transition-colors">
                    LOUNGE / TERRACE MENU
                </a>
            </div>
        </div>

        <!-- Dining Slider -->
        <div class="relative dining-slider-wrapper mt-32">
            <div class="swiper dining-main-swiper overflow-visible">
                <div class="swiper-wrapper">
                    <?php if ($slider_images): ?>
                        <?php foreach ($slider_images as $img_url): ?>
                            <div class="swiper-slide h-auto max-w-[80vw] md:max-w-[700px]">
                                <div class="relative group aspect-[16/9] overflow-hidden">
                                    <img src="<?php echo esc_url($img_url); ?>" alt="Dining"
                                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <!-- Dummy Slides -->
                        <?php for ($i = 1; $i <= 3; $i++): ?>
                            <div class="swiper-slide h-auto max-w-[80vw] md:max-w-[700px]">
                                <div class="relative group aspect-[16/9] bg-brand-black-100 flex items-center justify-center">
                                    <span class="text-brand-black-300 italic">Dining Image <?php echo $i; ?></span>
                                </div>
                            </div>
                        <?php endfor; ?>
                    <?php endif; ?>
                </div>

                <!-- Custom Navigation Buttons -->
                <button
                    class="dining-prev absolute left-4 md:left-10 top-1/2 -translate-y-1/2 z-30 w-12 h-12 bg-transparent border border-brand-orange rounded-full flex items-center justify-center text-brand-orange hover:bg-brand-orange hover:text-white transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m15 18-6-6 6-6" />
                    </svg>
                </button>
                <button
                    class="dining-next absolute right-4 md:right-10 top-1/2 -translate-y-1/2 z-30 w-12 h-12 bg-transparent border border-brand-orange rounded-full flex items-center justify-center text-brand-orange hover:bg-brand-orange hover:text-white transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="text-center mt-12 md:mt-20">
            <a href="<?php echo esc_url($main_book_link); ?>"
                class="inline-block bg-[#FDB078] text-white px-12 py-4 text-sm font-bold font-serif uppercase tracking-[0.2em] hover:bg-brand-blue transition-all">
                MAKE A RESERVATION
            </a>
        </div>
    </div>

    <!-- Dining Outlets (Repeater with Alternating Layout) -->
    <div class="dining-outlets-list">
        <?php if ($dining_outlets): ?>
            <?php $counter = 0;
            foreach ($dining_outlets as $outlet):
                $is_even = ($counter % 2 == 0);
                $name = $outlet['name'];
                $subtitle = $outlet['subtitle'];
                $desc = $outlet['description'];
                $image = $outlet['image'];
                $book_link = $outlet['book_link'] ?: '#';
                $menu_link = $outlet['menu_link'] ?: '#';
                ?>
                <div class="container relative z-10 mx-auto px-6 max-w-[1040px] <?php echo $counter > 0 ? 'mt-32' : ''; ?>">
                    <div class="flex flex-col <?php echo $is_even ? 'md:flex-row' : 'md:flex-row-reverse'; ?> items-center">
                        <div class="w-full md:w-1/2 mb-12 md:mb-0">
                            <div class="<?php echo $is_even ? 'pr-0 md:pr-12' : 'pl-0 md:pl-12'; ?>">
                                <h3 class="text-brand-blue font-serif text-3xl tracking-[0.1em] uppercase mb-4">
                                    <?php echo esc_html($name); ?>
                                </h3>
                                <p class="text-brand-orange font-serif italic text-xl mb-12"><?php echo esc_html($subtitle); ?>
                                </p>

                                <p class="text-brand-black-700 font-sans text-base leading-loose mb-12">
                                    <?php echo nl2br(esc_html($desc)); ?>
                                </p>

                                <div class="flex gap-6">
                                    <a href="<?php echo esc_url($book_link); ?>"
                                        class="bg-brand-orange text-white px-10 py-4 text-xs font-bold uppercase tracking-[0.2em] hover:bg-brand-blue transition-all">
                                        Book Now
                                    </a>
                                    <a href="<?php echo esc_url($menu_link); ?>" target="_blank"
                                        class="border border-brand-blue text-brand-blue px-10 py-4 text-xs font-bold uppercase tracking-[0.2em] hover:bg-brand-blue hover:text-white transition-all">
                                        Menu
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="w-full md:w-1/2">
                            <div class="relative aspect-[7/5] overflow-hidden shadow-2xl">
                                <?php if ($image): ?>
                                    <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($name); ?>"
                                        class="w-full h-full object-cover">
                                <?php else: ?>
                                    <div
                                        class="w-full h-full bg-brand-black-100 flex items-center justify-center italic text-brand-black-300">
                                        No Image</div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $counter++; endforeach; ?>
        <?php endif; ?>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Swiper('.dining-main-swiper', {
            slidesPerView: 'auto',
            centeredSlides: true,
            spaceBetween: 30,
            loop: true,
            speed: 800,
            navigation: {
                nextEl: '.dining-next',
                prevEl: '.dining-prev',
            }
        });
    });
</script>

<style>
    .dining-main-swiper .swiper-slide {
        transition: transform 0.6s ease, opacity 0.6s ease;
        opacity: 0.5;
        transform: scale(0.85);
    }

    .dining-main-swiper .swiper-slide-active {
        opacity: 1;
        transform: scale(1.1);
        z-index: 10;
    }

    .dining-main-swiper {
        padding-top: 40px;
        padding-bottom: 40px;
    }
</style>