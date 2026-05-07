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

    <main id="primary" class="site-main bg-white">

        <!-- Room Hero Section -->
        <section class="relative h-[60vh] lg:h-[70vh] flex items-center justify-center overflow-hidden">
            <?php if ($hero_image): ?>
                <img src="<?php echo esc_url($hero_image); ?>" alt="<?php the_title(); ?>" class="absolute inset-0 w-full h-full object-cover">
            <?php endif; ?>
            <div class="absolute inset-0 bg-brand-blue/30"></div>
            <div class="relative z-10 text-center text-white px-6" data-aos="fade-up">
                <h1 class="text-4xl lg:text-7xl font-serif font-bold uppercase mb-4">
                    <?php the_title(); ?>
                </h1>
                <div class="w-24 h-1 bg-brand-orange mx-auto opacity-80"></div>
            </div>
        </section>

        <div class="container mx-auto px-6 py-20">
            <div class="flex flex-col lg:flex-row gap-16">
                
                <!-- Left Side: Content & Gallery -->
                <div class="lg:w-2/3">
                    
                    <!-- Description -->
                    <div class="prose prose-lg max-w-none mb-16 text-brand-black-700 leading-relaxed" data-aos="fade-up">
                        <?php echo wp_kses_post($description); ?>
                    </div>

                    <!-- Room Gallery -->
                    <?php if ($gallery): ?>
                        <div class="room-detail-gallery mb-16" data-aos="fade-up">
                            <div class="swiper room-gallery-swiper rounded-2xl overflow-hidden shadow-2xl">
                                <div class="swiper-wrapper">
                                    <?php foreach ($gallery as $image_url): ?>
                                        <div class="swiper-slide aspect-video">
                                            <img src="<?php echo esc_url($image_url); ?>" alt="Room Image" class="w-full h-full object-cover">
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

                <!-- Right Side: Sticky Info Card -->
                <div class="lg:w-1/3">
                    <div class="sticky top-32 bg-brand-black-50 rounded-3xl p-8 lg:p-10 border border-brand-black-100" data-aos="fade-left">
                        <h3 class="text-2xl font-serif font-bold text-brand-blue uppercase mb-8 border-b border-brand-black-200 pb-4">
                            <?php pll_e('Room Information'); ?>
                        </h3>

                        <ul class="space-y-6 mb-10">
                            <?php if ($size): ?>
                                <li class="flex justify-between items-center border-b border-brand-black-100 pb-4">
                                    <div class="flex items-center gap-3">
                                        <img src="<?php echo $images_url; ?>bx_area.png" alt="Size" class="w-5 h-5 object-contain opacity-70">
                                        <span class="text-xs font-bold text-brand-black-400 uppercase"><?php pll_e('Size'); ?></span>
                                    </div>
                                    <span class="text-sm font-bold text-brand-blue"><?php echo esc_html($size); ?></span>
                                </li>
                            <?php endif; ?>
                            
                            <?php if ($occupancy): ?>
                                <li class="flex justify-between items-center border-b border-brand-black-100 pb-4">
                                    <div class="flex items-center gap-3">
                                        <img src="<?php echo $images_url; ?>wordpress_people.png" alt="Occupancy" class="w-5 h-5 object-contain opacity-70">
                                        <span class="text-xs font-bold text-brand-black-400 uppercase"><?php pll_e('Occupancy'); ?></span>
                                    </div>
                                    <span class="text-sm font-bold text-brand-blue"><?php echo esc_html($occupancy); ?></span>
                                </li>
                            <?php endif; ?>

                            <?php if ($bed): ?>
                                <li class="flex justify-between items-center border-b border-brand-black-100 pb-4">
                                    <div class="flex items-center gap-3">
                                        <img src="<?php echo $images_url; ?>material-symbols_bed-outline.png" alt="Bed" class="w-5 h-5 object-contain opacity-70">
                                        <span class="text-xs font-bold text-brand-black-400 uppercase"><?php pll_e('Bed Type'); ?></span>
                                    </div>
                                    <span class="text-sm font-bold text-brand-blue"><?php echo esc_html($bed); ?></span>
                                </li>
                            <?php endif; ?>

                            <?php if ($view): ?>
                                <li class="flex justify-between items-center border-b border-brand-black-100 pb-4">
                                    <div class="flex items-center gap-3">
                                        <img src="<?php echo $images_url; ?>Group.png" alt="View" class="w-5 h-5 object-contain opacity-70">
                                        <span class="text-xs font-bold text-brand-black-400 uppercase"><?php pll_e('View'); ?></span>
                                    </div>
                                    <span class="text-sm font-bold text-brand-blue"><?php echo esc_html($view); ?></span>
                                </li>
                            <?php endif; ?>

                            <?php if ($balcony): ?>
                                <li class="flex justify-between items-center border-b border-brand-black-100 pb-4">
                                    <div class="flex items-center gap-3">
                                        <img src="<?php echo $images_url; ?>cbi_rooms-balcony.png" alt="Balcony" class="w-5 h-5 object-contain opacity-70">
                                        <span class="text-xs font-bold text-brand-black-400 uppercase"><?php pll_e('Balcony'); ?></span>
                                    </div>
                                    <span class="text-sm font-bold text-brand-blue"><?php echo esc_html($balcony); ?></span>
                                </li>
                            <?php endif; ?>
                        </ul>

                        <div class="mt-auto">
                            <a href="<?php echo esc_url($book_link); ?>" class="block w-full bg-brand-orange text-white text-center py-5 rounded-full font-bold uppercase hover:bg-brand-blue transition-all shadow-xl hover:shadow-2xl transform hover:-translate-y-1 active:scale-95">
                                <?php pll_e('Book This Room'); ?>
                            </a>
                            <p class="text-center text-[11px] text-brand-black-400 mt-4 font-medium uppercase">
                                <?php pll_e('Best Price Guaranteed for Direct Booking'); ?>
                            </p>
                        </div>
                    </div>
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
            <section class="bg-brand-black-50 py-24">
                <div class="container mx-auto px-6">
                    <div class="text-center mb-16" data-aos="fade-up">
                        <h2 class="text-3xl lg:text-4xl font-serif font-bold text-brand-blue uppercase mb-4">
                            <?php pll_e('Other Accommodations'); ?>
                        </h2>
                        <div class="w-20 h-1 bg-brand-orange mx-auto opacity-60"></div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                        <?php while ($related_rooms->have_posts()): $related_rooms->the_post(); ?>
                            <a href="<?php the_permalink(); ?>" class="group block bg-white overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 rounded-3xl" data-aos="fade-up">
                                <div class="aspect-[4/3] overflow-hidden">
                                    <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover transition-transform duration-700 group-hover:scale-110']); ?>
                                </div>
                                <div class="p-8">
                                    <h3 class="text-xl font-bold text-brand-blue uppercase group-hover:text-brand-orange transition-colors mb-2">
                                        <?php the_title(); ?>
                                    </h3>
                                    <p class="text-sm text-brand-black-400 font-medium uppercase">
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
