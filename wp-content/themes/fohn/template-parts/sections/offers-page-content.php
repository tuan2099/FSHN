<?php
/**
 * Section: Offers Page Content
 * Displays the dynamic grid of 'offer' Custom Post Type.
 */

$intro_title = get_field('offers_intro_title') ?: 'EXCLUSIVE OFFERS';
$intro_subtitle = get_field('offers_intro_subtitle') ?: 'Elevate Your Experience at LÈGACY';
$intro_desc = get_field('offers_intro_desc');

// Query all active offers
$offers_query = new WP_Query(array(
    'post_type' => 'offer',
    'posts_per_page' => -1, // Get all offers
    'post_status' => 'publish',
));
?>

<section class="offers-page-section relative bg-[#FBF9F6] py-24 overflow-hidden">
    <!-- Decorative Florals (Matching Other Templates) -->
    <div class="absolute left-[-50px] top-[10%] w-[350px] pointer-events-none select-none z-0">
        <?php if (get_field('offers_flower_left')): ?>
            <img src="<?php echo esc_url(get_field('offers_flower_left')); ?>" alt="" class="w-full h-auto">
        <?php else: ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lotus-bg.png" alt="" class="w-full h-auto">
        <?php endif; ?>
    </div>
    <div class="absolute right-[-50px] top-[10%] w-[350px] pointer-events-none select-none z-0 scale-x-[-1]">
        <?php if (get_field('offers_flower_right')): ?>
            <img src="<?php echo esc_url(get_field('offers_flower_right')); ?>" alt="" class="w-full h-auto">
        <?php else: ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lotus-bg.png" alt="" class="w-full h-auto">
        <?php endif; ?>
    </div>
    <!-- Intro Header -->
    <div class="container mx-auto px-6 text-center mb-20 ">
        <h2 class="text-brand-blue font-serif text-5xl tracking-[0.2em] mb-6 uppercase">
            <?php echo esc_html($intro_title); ?>
        </h2>
        <div class="w-24 h-px bg-[#FDB078] mx-auto mb-10"></div>
        <p class="font-serif  text-xl mb-8"><?php echo esc_html($intro_subtitle); ?>
        </p>
        <?php if ($intro_desc): ?>
            <p class="text-brand-black-700 font-sans text-sm md:text-base leading-loose mx-auto">
                <?php echo nl2br(esc_html($intro_desc)); ?>
            </p>
        <?php endif; ?>
    </div>

    <!-- Offers Grid -->
    <div class="container mx-auto px-6">
        <?php if ($offers_query->have_posts()): ?>
            <div class="flex flex-wrap justify-center gap-4 md:gap-6">
                <?php
                $count = 1;
                while ($offers_query->have_posts()):
                    $offers_query->the_post();
                    $num = str_pad($count, 2, '0', STR_PAD_LEFT);
                    ?>
                    <a href="<?php the_permalink(); ?>"
                        class="offer-card relative block group w-full sm:w-[calc(50%-1rem)] lg:w-[calc(33.333%-1rem)] aspect-square overflow-hidden">
                        <!-- Image -->
                        <?php
                        $bg_image_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                        if (!$bg_image_url) {
                            // Fallback to common ACF image field names
                            $acf_img = get_field('image') ?: get_field('offer_image') ?: get_field('bg_image');
                            if (is_array($acf_img)) {
                                $bg_image_url = $acf_img['url'];
                            } elseif (is_string($acf_img)) {
                                $bg_image_url = $acf_img;
                            }
                        }

                        if ($bg_image_url): ?>
                            <img src="<?php echo esc_url($bg_image_url); ?>" alt="<?php the_title_attribute(); ?>"
                                class="absolute inset-0 w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                        <?php else: ?>
                            <div class="absolute inset-0 w-full h-full bg-brand-black-900"></div>
                        <?php endif; ?>

                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-black/60 group-hover:bg-black/40 transition-colors duration-500"></div>

                        <!-- Content Overlay -->
                        <div class="absolute inset-0 flex flex-col items-center justify-center text-white p-6 text-center z-10">
                            <span class="font-serif italic text-sm md:text-base opacity-80 mb-2"><?php echo $num; ?></span>
                            <h3 class="font-sans font-bold text-base md:text-lg uppercase tracking-[0.1em]">
                                <?php the_title(); ?>
                            </h3>
                        </div>
                    </a>
                    <?php
                    $count++;
                endwhile;
                ?>
                <?php wp_reset_postdata(); ?>
            </div>
        <?php else: ?>
            <div class="text-center text-brand-black-400 py-20">
                <p>No offers are currently available. Please check back later or add them in the WP Admin.</p>
            </div>
        <?php endif; ?>
    </div>
</section>