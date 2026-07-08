<?php
/**
 * Section: Apartment List
 */

// ACF Data
$intro_title = get_field('apartment_intro_title') ?: 'Residences';
$intro_desc = get_field('apartment_intro_desc');
$flower_left = get_field('apartment_flower_left');
$flower_right = get_field('apartment_flower_right');

$amenities_title = get_field('apartment_amenities_title') ?: 'Amenities';
$amenities_list = get_field('apartment_amenities_list');
$footer_quote = get_field('apartment_footer_text');

$apt_query = new WP_Query(array(
    'post_type' => 'room',
    'posts_per_page' => -1,
    'category_name' => 'apartment',
    'order' => 'ASC'
));
?>

<section class="relative pb-24 overflow-hidden bg-white" style="padding-top:5rem">
    <!-- Decorative flower frame (shared helper) -->
    <?php fohn_render_flowers($flower_left, $flower_right); ?>

    <div class="container relative z-10 mx-auto px-6 max-w-[1200px]">
        <!-- Intro Header -->
        <div class="mb-16 text-center">
            <h2 class="text-brand-blue font-serif text-[40px] font-semibold mb-6 uppercase">
                <?php echo esc_html($intro_title); ?>
            </h2>
            <div class="w-24 h-px mx-auto mb-10 bg-brand-orange"></div>
            <?php if ($intro_desc): ?>
                <p class="mx-auto font-sans leading-relaxed text-brand-black-700 text-md ">
                    <?php echo nl2br(esc_html($intro_desc)); ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- Amenities Section (Moved to Top, Mirroring Hotel Page) -->
        <div class="">
            <!-- Amenities Bar -->
            <div class="bg-brand-blue py-4 mb-15 max-w-[850px] mx-auto">
                <h3 class="font-serif text-xl text-center text-white uppercase">
                    <?php echo esc_html($amenities_title); ?>
                </h3>
            </div>

            <style>
                /* 6 per row on desktop; last row auto-centers via justify-content:center */
                .apartment-amenities {
                    display: flex;
                    flex-wrap: wrap;
                    justify-content: center;
                    gap: 3rem 2rem;
                }
                .apartment-amenities .amenity-item {
                    width: calc((100% - 2rem) / 2);
                }
                @media (min-width: 768px) {
                    .apartment-amenities .amenity-item {
                        width: calc((100% - 4rem) / 3);
                    }
                }
                @media (min-width: 1024px) {
                    .apartment-amenities .amenity-item {
                        width: calc((100% - 10rem) / 6);
                    }
                }
            </style>
            <!-- Amenities Grid: 6 per row, last row centered -->
            <div class="apartment-amenities max-w-[900px] mx-auto">
                <?php if ($amenities_list): ?>
                    <?php foreach ($amenities_list as $item): ?>
                        <div class="flex flex-col items-center text-center amenity-item group">
                            <div class="mb-5 transition-transform duration-300 text-brand-blue group-hover:scale-110">
                                <?php if ($item['icon']): ?>
                                    <img src="<?php echo esc_url($item['icon']); ?>" alt="<?php echo esc_attr($item['label']); ?>"
                                        class="object-contain w-14 h-14">
                                <?php else: ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10" />
                                    </svg>
                                <?php endif; ?>
                            </div>
                            <span class="font-sans text-[13px] leading-tight text-brand-blue">
                                <?php echo esc_html($item['label']); ?>
                            </span>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="italic text-center col-span-full text-brand-black-400">
                        <?php pll_e('Please add amenities in the Apartment Page backend.'); ?>
                    </p>
                <?php endif; ?>
            </div>

            <!-- Footer Quote (Short text below amenities) -->
            <?php if ($footer_quote): ?>
                <div class="mt-12 text-center">
                    <p class="mx-auto font-sans text-sm italic leading-loose text-brand-black-500">
                        <?php echo nl2br(esc_html($footer_quote)); ?>
                    </p>
                </div>
            <?php endif; ?>
        </div>

        <div class="w-full h-px mb-12 bg-brand-black-50"></div>

        <?php if ($apt_query->have_posts()): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12" style="row-gap:4rem">
                <?php $apt_index = 0;
                while ($apt_query->have_posts()):
                    $apt_query->the_post();
                    $gallery = get_field('room_gallery');
                    $description = get_the_excerpt();
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
                                        class="apt-prev-<?php echo $apt_index; ?> hover:translate-x-[-4px] transition-transform">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Vector (5).png"
                                            alt="Prev" class="object-contain w-10 h-4">
                                    </button>
                                    <button
                                        class="apt-next-<?php echo $apt_index; ?> hover:translate-x-[4px] transition-transform">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Vector (6).png"
                                            alt="Next" class="object-contain w-10 h-4">
                                    </button>
                                </div>
                                <div
                                    class="apt-pagination-<?php echo $apt_index; ?> text-sm font-bold text-brand-black-900 font-serif relative !bottom-auto !left-auto !w-auto text-right flex items-baseline justify-end">
                                </div>
                            </div>
                        </div>

                        <!-- Apartment Content -->
                        <div class="text-center">
                            <h3 class="text-brand-blue font-serif text-2xl tracking-[2px] font-semibold uppercase mb-2">
                                <?php the_title(); ?>
                            </h3>
                            <div class="w-16 h-px mx-auto mb-8 opacity-50 bg-brand-orange"></div>

                            <p class="js-room-clamp text-brand-black-600 font-sans text-sm leading-relaxed mb-10 max-w-[500px] mx-auto opacity-80 text-justify md:text-justify"
                                style="font-weight: 200">
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
                                <div class="flex flex-wrap justify-center gap-x-8 md:gap-x-16 gap-y-4 max-w-[500px] w-full mx-auto">
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
                    <?php $apt_index++; endwhile;
                wp_reset_postdata(); ?>
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

<style>
    .js-room-clamp {
        position: relative;
        overflow: hidden;
    }

    .room-clamp-toggle {
        color: #FDB078;
        cursor: pointer;
        white-space: nowrap;
        text-transform: uppercase;
    }

    .room-clamp-toggle:hover {
        color: #2B3C54;
    }
</style>

<script>
    (function () {
        var MAX_LINES = 4;
        var MORE = '<?php echo esc_js(pll__('more')); ?>';
        var LESS = '<?php echo esc_js(pll__('less')); ?>';

        function setup(el) {
            var full = el.textContent.replace(/\s+/g, ' ').trim();
            var cs = window.getComputedStyle(el);
            var lh = parseFloat(cs.lineHeight);
            if (!lh || isNaN(lh)) lh = parseFloat(cs.fontSize) * 1.6;
            var maxH = lh * MAX_LINES + 1;

            el.textContent = full;
            if (el.scrollHeight <= maxH) return; // Already fits within 4 lines

            var words = full.split(' ');
            var expanded = false;

            function makeToggle(label) {
                var a = document.createElement('a');
                a.href = '#';
                a.className = 'room-clamp-toggle';
                a.textContent = label;
                a.addEventListener('click', onToggle);
                return a;
            }

            function renderCollapsed(n) {
                el.innerHTML = '';
                el.appendChild(document.createTextNode(words.slice(0, n).join(' ') + '… '));
                el.appendChild(makeToggle(MORE));
            }

            function renderExpanded() {
                el.innerHTML = '';
                el.appendChild(document.createTextNode(full + ' '));
                el.appendChild(makeToggle(LESS));
            }

            // Largest word count that still fits within MAX_LINES (with the toggle present)
            var lo = 1, hi = words.length, best = 1;
            while (lo <= hi) {
                var mid = (lo + hi) >> 1;
                renderCollapsed(mid);
                if (el.scrollHeight <= maxH) { best = mid; lo = mid + 1; }
                else { hi = mid - 1; }
            }

            function onToggle(e) {
                e.preventDefault();
                var startH = el.offsetHeight;
                expanded = !expanded;
                if (expanded) renderExpanded(); else renderCollapsed(best);
                var endH = el.offsetHeight;
                el.style.height = startH + 'px';
                void el.offsetHeight; // force reflow
                el.style.transition = 'height 0.4s ease';
                el.style.height = endH + 'px';
                window.setTimeout(function () {
                    el.style.height = '';
                    el.style.transition = '';
                }, 430);
            }

            renderCollapsed(best);
        }

        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.js-room-clamp').forEach(setup);
        });
    })();
</script>