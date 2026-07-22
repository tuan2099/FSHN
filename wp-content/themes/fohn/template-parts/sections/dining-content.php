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

<section class="relative overflow-hidden bg-white" style="padding-top:5rem;padding-bottom:5rem">
    <!-- Decorative flower frame (shared helper) -->
    <?php fohn_render_flowers(get_field('dining_flower_left'), get_field('dining_flower_right')); ?>

    <div class="container relative z-10 mx-auto px-6 max-w-[1040px] mb-12">
        <!-- Intro Header (New Section from Screenshot) -->
        <div class="mb-6 text-center">
            <h2 class="text-brand-blue font-serif text-[40px] font-semibold mb-6 uppercase">
                <?php echo esc_html($intro_title); ?>
            </h2>
            <div class="bg-[#FDB078] mx-auto mb-4" style="width:140px;height:3px"></div>

            <h4 class="mb-4 font-serif text-[16px] text-brand-black-900 font-semibold" style="letter-spacing:2px" >
                <?php echo esc_html($intro_subtitle); ?>
            </h4>

            <?php if ($intro_desc): ?>
                <p class="text-brand-black-700 font-sans max-w-[900px] mx-auto mb-12 leading-relaxed">
                    <?php echo nl2br(esc_html($intro_desc)); ?>
                </p>
            <?php else: ?>
                <p class="text-brand-black-700 font-sans max-w-[900px] mx-auto mb-12 leading-relaxed">
                    Located on the 24th floor, our dining and social spaces reimagine Vietnamese hospitality through modern
                    flavors, artistic energy, and panoramic views of Hanoi’s skyline. The all-day dining restaurant, bar,
                    and VIP Room create a seamless journey from casual daytime gatherings to vibrant, elevated evenings.
                    Guests can also enjoy 24/7 in-room dining, bringing curated dishes and crafted comfort directly to their
                    room.
                </p>
            <?php endif; ?>

            <div class="flex flex-wrap justify-center gap-12 mt-10">
                <a href="<?php echo esc_url($menu_link_1 ?: '#'); ?>"
                    class="text-brand-blue font-serif font-semibold text-base uppercase border-b border-[#FDB078] pb-1 hover:text-brand-orange transition-colors" style="letter-spacing:2px">
                    <?php pll_e('ALL-DAY DINING MENU'); ?>
                </a>
                <a href="<?php echo esc_url($menu_link_2 ?: '#'); ?>"
                    class="text-brand-blue font-serif font-semibold text-base uppercase border-b border-[#FDB078] pb-1 hover:text-brand-orange transition-colors" style="letter-spacing:2px">
                    <?php pll_e('LOUNGE / TERRACE MENU'); ?>
                </a>
            </div>
        </div>

        <!-- Dining Slider -->
        <div class="relative mt-6 dining-slider-wrapper">
            <div class="overflow-visible swiper dining-main-swiper">
                <div class="swiper-wrapper">
                    <?php if ($slider_images): ?>
                        <?php foreach ($slider_images as $img_url): ?>
                            <div class="swiper-slide h-auto max-w-[80vw] md:max-w-[700px]">
                                <div class="relative group aspect-[16/9] overflow-hidden">
                                    <img src="<?php echo esc_url($img_url); ?>" alt="Dining"
                                        class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-110">
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <!-- Dummy Slides -->
                        <?php for ($i = 1; $i <= 3; $i++): ?>
                            <div class="swiper-slide h-auto max-w-[80vw] md:max-w-[700px]">
                                <div class="relative group aspect-[16/9] bg-brand-black-100 flex items-center justify-center">
                                    <span class="italic text-brand-black-300"><?php pll_e('Dining Image'); ?> <?php echo $i; ?></span>
                                </div>
                            </div>
                        <?php endfor; ?>
                    <?php endif; ?>
                </div>

                <!-- Custom Navigation Buttons -->
                <button
                    class="absolute z-30 flex items-center justify-center w-12 h-12 transition-all -translate-y-1/2 bg-transparent border rounded-full dining-prev left-4 md:left-10 top-1/2 border-brand-orange text-brand-orange hover:bg-brand-orange hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m15 18-6-6 6-6" />
                    </svg>
                </button>
                <button
                    class="absolute z-30 flex items-center justify-center w-12 h-12 transition-all -translate-y-1/2 bg-transparent border rounded-full dining-next right-4 md:right-10 top-1/2 border-brand-orange text-brand-orange hover:bg-brand-orange hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="mt-4 text-center md:mt-12">
            <a href="<?php echo esc_url($main_book_link); ?>"
                class="inline-block bg-[#FDB078] text-white px-12 py-4 text-sm font-semibold font-serif uppercase hover:bg-brand-blue transition-all" style="letter-spacing:2px">
                <?php pll_e('MAKE A RESERVATION'); ?>
            </a>
        </div>
    </div>

    <!-- Dining Outlets (Repeater with Alternating Layout) -->
    <div class="dining-outlets-list">
        <?php if ($dining_outlets): ?>
            <?php $counter = 0;
            $outlet_sliders = array();
            foreach ($dining_outlets as $outlet):
                $is_even = ($counter % 2 == 0);
                $name = $outlet['name'];
                $subtitle = $outlet['subtitle'];
                $desc = $outlet['description'];
                $image = $outlet['image'];
                $gallery = $outlet['gallery'];
                $images = !empty($gallery) ? $gallery : ($image ? array($image) : array());
                $book_link = $outlet['book_link'] ?: '#';
                $menu_link = $outlet['menu_link'] ?: '#';
                ?>
                <div class="container relative z-10 mx-auto px-6 max-w-[1040px] <?php echo $counter > 0 ? 'mt-16' : ''; ?>">
                    <div class="flex flex-col <?php echo $is_even ? 'md:flex-row' : 'md:flex-row-reverse'; ?> items-center">
                        <div class="w-full mb-12 md:w-1/2 md:mb-0">
                            <div class="<?php echo $is_even ? 'pr-0 md:pr-12' : 'pl-0 md:pl-12'; ?>">
                                <h3 class="mb-4 font-serif text-[32px] font-semibold uppercase text-brand-blue">
                                    <?php echo esc_html($name); ?>
                                </h3>
                                <p class="mb-12 font-sans  text-xl text-brand-orange"><?php echo esc_html($subtitle); ?>
                                </p>

                                <p class="mb-12 font-sans leading-relaxed text-justify text-brand-black-700">
                                    <?php echo nl2br(esc_html($desc)); ?>
                                </p>

                                <div class="">
                                    <a href="<?php echo esc_url($menu_link); ?>" target="_blank"
                                        class="px-8 py-2 text-[16px] font-serif font-semibold uppercase transition-all border border-brand-blue text-brand-blue hover:bg-brand-blue hover:text-white">
                                        <?php pll_e('Menu'); ?>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="w-full md:w-1/2">
                            <?php if (count($images) > 1): ?>
                                <?php $outlet_sliders[] = $counter; ?>
                                <div class="relative outlet-slider-wrapper">
                                    <div class="swiper outlet-swiper-<?php echo $counter; ?> aspect-[7/5] overflow-hidden shadow-2xl">
                                        <div class="swiper-wrapper">
                                            <?php foreach ($images as $g_url): ?>
                                                <div class="swiper-slide">
                                                    <div class="relative w-full h-full overflow-hidden group">
                                                        <img src="<?php echo esc_url($g_url); ?>" alt="<?php echo esc_attr($name); ?>"
                                                            class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-110">
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <button
                                        class="outlet-prev-<?php echo $counter; ?> absolute z-30 flex items-center justify-center w-10 h-10 transition-all -translate-y-1/2 border rounded-full left-4 top-1/2 border-brand-orange text-brand-orange hover:bg-brand-orange hover:text-white"
                                        style="background:rgba(255,255,255,0.85)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="m15 18-6-6 6-6" />
                                        </svg>
                                    </button>
                                    <button
                                        class="outlet-next-<?php echo $counter; ?> absolute z-30 flex items-center justify-center w-10 h-10 transition-all -translate-y-1/2 border rounded-full right-4 top-1/2 border-brand-orange text-brand-orange hover:bg-brand-orange hover:text-white"
                                        style="background:rgba(255,255,255,0.85)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="m9 18 6-6-6-6" />
                                        </svg>
                                    </button>
                                    <div
                                        class="outlet-pagination-<?php echo $counter; ?> absolute z-30 px-3 py-1 text-xs font-bold tracking-widest text-white rounded-full right-4 font-sans"
                                        style="bottom:12px;background:rgba(0,0,0,0.45)">
                                    </div>
                                </div>
                            <?php elseif (count($images) === 1): ?>
                                <div class="relative aspect-[7/5] overflow-hidden shadow-2xl">
                                    <img src="<?php echo esc_url($images[0]); ?>" alt="<?php echo esc_attr($name); ?>"
                                        class="object-cover w-full h-full">
                                </div>
                            <?php else: ?>
                                <div class="relative aspect-[7/5] overflow-hidden shadow-2xl">
                                    <div
                                        class="flex items-center justify-center w-full h-full italic bg-brand-black-100 text-brand-black-300">
                                        <?php pll_e('No Image'); ?></div>
                                </div>
                            <?php endif; ?>
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
            spaceBetween: 10,
            loop: true,
            speed: 800,
            navigation: {
                nextEl: '.dining-next',
                prevEl: '.dining-prev',
            }
        });

        <?php if (!empty($outlet_sliders)): ?>
            <?php foreach ($outlet_sliders as $idx): ?>
                new Swiper('.outlet-swiper-<?php echo $idx; ?>', {
                    loop: true,
                    speed: 800,
                    navigation: {
                        nextEl: '.outlet-next-<?php echo $idx; ?>',
                        prevEl: '.outlet-prev-<?php echo $idx; ?>',
                    },
                    pagination: {
                        el: '.outlet-pagination-<?php echo $idx; ?>',
                        type: 'fraction',
                        renderFraction: function (currentClass, totalClass) {
                            return '<span class="' + currentClass + '"></span>' +
                                ' / ' +
                                '<span class="' + totalClass + '"></span>';
                        }
                    }
                });
            <?php endforeach; ?>
        <?php endif; ?>
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