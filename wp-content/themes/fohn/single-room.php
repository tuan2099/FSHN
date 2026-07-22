<?php
/**
 * The template for displaying all single rooms
 */

get_header();

while (have_posts()) :
    the_post();

    // ACF Fields
    $gallery = get_field('room_gallery');
    $description = get_field('room_description') ?: get_the_content();
    $inclusions_raw = get_field('room_inclusions');
    $inclusions = array();
    if ($inclusions_raw) {
        foreach (preg_split('/\r\n|\r|\n/', $inclusions_raw) as $line) {
            $line = trim($line);
            if ($line !== '') {
                $inclusions[] = $line;
            }
        }
    }
    $size = get_field('room_size');
    $occupancy = get_field('room_occupancy');
    $view = get_field('room_view');
    $bed = get_field('room_bed');
    $balcony = get_field('room_balcony');
    $book_link = get_field('room_book_link') ?: '#';

    // Featured Image for Hero
    $hero_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
    $images_url = get_template_directory_uri() . '/assets/images/';
?>

    <main id="primary" class="bg-white site-main">

        <!-- Room Hero Section -->
        <section class="relative h-[60vh] lg:h-[70vh] flex items-center justify-center overflow-hidden">
            <?php if ($hero_image): ?>
                <img src="<?php echo esc_url($hero_image); ?>" alt="<?php the_title(); ?>" class="absolute inset-0 object-cover w-full h-full">
            <?php endif; ?>
            <div class="absolute inset-0 bg-brand-blue/30"></div>
            <div class="relative z-10 px-6 text-center text-white" data-aos="fade-up">
                <h1 class="mb-4 font-serif text-4xl font-bold uppercase lg:text-7xl">
                    <?php the_title(); ?>
                </h1>
                <div class="w-24 h-1 mx-auto bg-brand-orange opacity-80"></div>
            </div>
        </section>

        <div class="container px-6 py-20 mx-auto">
            <div class="">

                <!-- Right Side: Sticky Info Card -->
                <div class="">
                    <div class="sticky p-8 border top-32 bg-brand-black-50 rounded-3xl md:p-10 border-brand-black-100" data-aos="fade-left">
                        <h3 class="pb-4 mb-8 font-serif text-2xl font-bold uppercase border-b text-brand-blue border-brand-black-200">
                            <?php pll_e('Room Information'); ?>
                        </h3>

                        <ul class="mb-10 space-y-6">
                            <?php if ($size): ?>
                                <li class="flex items-center justify-between pb-4 border-b border-brand-black-100">
                                    <div class="flex items-center gap-3">
                                        <img src="<?php echo $images_url; ?>bx_area.png" alt="Size" class="object-contain w-5 h-5 opacity-70">
                                        <span class="text-base font-bold uppercase text-brand-black-400"><?php pll_e('Size'); ?></span>
                                    </div>
                                    <span class="text-base text-brand-black-700"><?php echo esc_html($size); ?></span>
                                </li>
                            <?php endif; ?>
                            
                            <?php if ($occupancy): ?>
                                <li class="flex items-center justify-between pb-4 border-b border-brand-black-100">
                                    <div class="flex items-center gap-3">
                                        <img src="<?php echo $images_url; ?>wordpress_people.png" alt="Occupancy" class="object-contain w-5 h-5 opacity-70">
                                        <span class="text-base font-bold uppercase text-brand-black-400"><?php pll_e('Occupancy'); ?></span>
                                    </div>
                                    <div class="text-base text-brand-black-700"><?php echo esc_html($occupancy); ?></div>
                                </li>
                            <?php endif; ?>

                            <?php if ($bed): ?>
                                <li class="flex items-center justify-between pb-4 border-b border-brand-black-100">
                                    <div class="flex items-center gap-3">
                                        <img src="<?php echo $images_url; ?>material-symbols_bed-outline.png" alt="Bed" class="object-contain w-5 h-5 opacity-70">
                                        <span class="text-base font-bold uppercase text-brand-black-400"><?php pll_e('Bed Type'); ?></span>
                                    </div>
                                    <span class="text-base text-brand-black-700"><?php echo esc_html($bed); ?></span>
                                </li>
                            <?php endif; ?>

                            <?php if ($view): ?>
                                <li class="flex items-center justify-between pb-4 border-b border-brand-black-100">
                                    <div class="flex items-center gap-3">
                                        <img src="<?php echo $images_url; ?>Group.png" alt="View" class="object-contain w-5 h-5 opacity-70">
                                        <span class="text-base font-bold uppercase text-brand-black-400"><?php pll_e('View'); ?></span>
                                    </div>
                                    <span class="text-base text-brand-black-700"><?php echo esc_html($view); ?></span>
                                </li>
                            <?php endif; ?>

                            <?php if ($balcony): ?>
                                <li class="flex items-center justify-between pb-4 border-b border-brand-black-100">
                                    <div class="flex items-center gap-3">
                                        <img src="<?php echo $images_url; ?>cbi_rooms-balcony.png" alt="Balcony" class="object-contain w-5 h-5 opacity-70">
                                        <span class="text-base font-bold uppercase text-brand-black-400"><?php pll_e('Balcony'); ?></span>
                                    </div>
                                    <span class="text-base text-brand-black-700"><?php echo esc_html($balcony); ?></span>
                                </li>
                            <?php endif; ?>
                        </ul>

                        <div class="mt-auto">
                            <a href="<?php echo esc_url($book_link); ?>" class="block py-2 font-bold text-center text-white uppercase transition-all transform rounded-full shadow-xl bg-brand-orange hover:bg-brand-blue hover:shadow-2xl hover:-translate-y-1 active:scale-95">
                                <?php pll_e('Book This Room'); ?>
                            </a>
                            <p class="text-center text-[11px] text-brand-black-400 mt-4 font-medium uppercase">
                                <?php pll_e('Best Price Guaranteed for Direct Booking'); ?>
                            </p>
                        </div>
                    </div>
                </div>
                </br>
                </br>
                <!-- Left Side: Content & Gallery -->
                <div class="">
                    
                    <!-- Description -->
                    <div class="mb-16 leading-relaxed prose prose-lg text-justify max-w-none text-brand-black-700" data-aos="fade-up">
                        <?php echo wpautop(wp_kses_post($description)); ?>
                    </div>

                    <!-- Complimentary Inclusions (Highlight) -->
                    <?php if ($inclusions): ?>
                        <div class="mb-16 room-inclusions" data-aos="fade-up">
                            <div class="room-inclusions__card">
                                <div class="room-inclusions__head">
                                    <span class="room-inclusions__line"></span>
                                    <h3 class="font-serif room-inclusions__title"><?php pll_e('Complimentary Inclusions'); ?></h3>
                                </div>
                                <ul class="room-inclusions__grid">
                                    <?php foreach ($inclusions as $item): ?>
                                        <li class="room-inclusions__item">
                                            <span class="room-inclusions__icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <polyline points="20 6 9 17 4 12" />
                                                </svg>
                                            </span>
                                            <span class="room-inclusions__text"><?php echo esc_html($item); ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Room Gallery -->
                    <?php if ($gallery): ?>
                        <div class="mb-16 room-detail-gallery" data-aos="fade-up">
                            <div class="overflow-hidden shadow-2xl swiper room-gallery-swiper rounded-2xl">
                                <div class="swiper-wrapper">
                                    <?php foreach ($gallery as $image_url): ?>
                                        <div class="swiper-slide aspect-video">
                                            <img src="<?php echo esc_url($image_url); ?>" alt="Room Image" class="object-cover w-full h-full">
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="swiper-button-next !text-white after:!text-2xl"></div>
                                <div class="swiper-button-prev !text-white after:!text-2xl"></div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>

                

            </div>
        </div>

        <!-- Related Rooms Section -->
        <?php
        $related_rooms = new WP_Query(array(
            'post_type' => 'room',
            'posts_per_page' => 3,
            'post__not_in' => array(get_the_ID()),
        ));

        if ($related_rooms->have_posts()): ?>
            <section class="py-24 bg-brand-black-50">
                <div class="container px-6 mx-auto">
                    <div class="mb-16 text-center" data-aos="fade-up">
                        <h2 class="mb-4 font-serif text-3xl font-bold uppercase lg:text-4xl text-brand-blue">
                            <?php pll_e('Other Accommodations'); ?>
                        </h2>
                        <div class="w-20 h-1 mx-auto bg-brand-orange opacity-60"></div>
                    </div>

                    <div class="grid grid-cols-1 gap-10 md:grid-cols-3">
                        <?php while ($related_rooms->have_posts()): $related_rooms->the_post(); ?>
                            <a href="<?php the_permalink(); ?>" class="block overflow-hidden transition-all duration-500 bg-white shadow-sm group hover:shadow-2xl rounded-3xl" data-aos="fade-up">
                                <div class="aspect-[4/3] overflow-hidden">
                                    <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover transition-transform duration-700 group-hover:scale-110']); ?>
                                </div>
                                <div class="p-8">
                                    <h3 class="mb-2 text-xl font-bold uppercase transition-colors text-brand-blue group-hover:text-brand-orange">
                                        <?php the_title(); ?>
                                    </h3>
                                    <p class="text-sm font-medium uppercase text-brand-black-400">
                                        <?php echo esc_html(get_field('room_size')); ?> | <?php echo esc_html(get_field('room_occupancy')); ?>
                                    </p>
                                </div>
                            </a>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

    </main>

    <style>
        .room-inclusions__card {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(253, 176, 120, 0.35);
            border-radius: 1.5rem;
            background: linear-gradient(135deg, #fafafa 0%, #ffffff 60%);
            padding: 2.5rem;
            box-shadow: 0 10px 40px -20px rgba(43, 60, 84, 0.25);
        }

        .room-inclusions__card::before {
            content: "";
            position: absolute;
            top: -60px;
            right: -60px;
            width: 160px;
            height: 160px;
            border-radius: 50%;
            background: rgba(253, 176, 120, 0.08);
            pointer-events: none;
        }

        .room-inclusions__head {
            position: relative;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 2rem;
        }

        .room-inclusions__line {
            display: inline-block;
            width: 40px;
            height: 2px;
            background: #FDB078;
        }

        .room-inclusions__title {
            font-size: 1.35rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: #2B3C54;
            margin: 0;
        }

        .room-inclusions__grid {
            position: relative;
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.1rem 2.5rem;
        }

        @media (min-width: 768px) {
            .room-inclusions__grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        .room-inclusions__item {
            display: flex;
            align-items: flex-start;
            gap: 0.9rem;
        }

        .room-inclusions__icon {
            flex-shrink: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: rgba(253, 176, 120, 0.15);
            color: #FDB078;
        }

        .room-inclusions__text {
            font-size: 0.95rem;
            line-height: 1.6;
            color: #525252;
            padding-top: 4px;
        }
    </style>

    <!-- Swiper Initialization for Room Gallery -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof Swiper !== 'undefined') {
                new Swiper('.room-gallery-swiper', {
                    slidesPerView: 1,
                    spaceBetween: 0,
                    loop: true,
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    autoplay: {
                        delay: 5000,
                    }
                });
            }
        });
    </script>

<?php
endwhile;

get_footer();
