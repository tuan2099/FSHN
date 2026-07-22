<?php
/**
 * Section: Offers Page Content
 * Displays the dynamic grid of 'offer' Custom Post Type.
 */

$intro_title = get_field('offers_intro_title') ?: 'EXCLUSIVE OFFERS';
$intro_subtitle = get_field('offers_intro_subtitle') ?: 'Elevate Your Experience at LÈGACY';
$intro_desc = get_field('offers_intro_desc');
// Falls back to the site-wide booking engine URL (same one used by the header
// "BOOK A STAY" button and the room BOOK NOW links) when no override is set.
$book_link = get_field('offers_book_link') ?: 'https://fohn.backhotelite.com/en/';

// Query all active offers
$offers_query = new WP_Query(array(
    'post_type' => 'offer',
    'posts_per_page' => -1, // Get all offers
    'post_status' => 'publish',
));
?>

<section class="offers-page-section relative bg-[#FBF9F6] overflow-hidden" style="padding-top:5rem;padding-bottom:5rem">
    <!-- Decorative flower frame (shared helper) -->
    <?php fohn_render_flowers(get_field('offers_flower_left'), get_field('offers_flower_right')); ?>
    <!-- Intro Header -->
    <div class="container px-6 mx-auto mb-20 text-center ">
        <h2 class="text-brand-blue font-serif text-[40px] font-semibold mb-4 uppercase">
            <?php echo esc_html($intro_title); ?>
        </h2>
        <div class="w-[150px] h-px bg-[#FDB078] mx-auto mb-6"></div>
        <p class="mb-4 font-serif text-[16px] text-brand-black-900 font-semibold" style="letter-spacing:2px"><?php echo esc_html($intro_subtitle); ?>
        </p>
        <?php if ($intro_desc): ?>
            <p class="text-brand-black-700 font-sans max-w-[900px] mx-auto mb-12 leading-relaxed">
                <?php echo nl2br(esc_html($intro_desc)); ?>
            </p>
        <?php endif; ?>
    </div>

    <!-- Offers Grid -->
    <div class="container px-6 mx-auto">
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
                                class="absolute inset-0 object-cover w-full h-full transition-transform duration-1000 group-hover:scale-110">
                        <?php else: ?>
                            <div class="absolute inset-0 w-full h-full bg-brand-black-900"></div>
                        <?php endif; ?>

                        <!-- Overlay -->
                        <div class="absolute inset-0 transition-colors duration-500 bg-black/60 group-hover:bg-black/40"></div>

                        <!-- Content Overlay -->
                        <div class="absolute inset-0 z-10 flex flex-col items-center justify-center p-6 text-center text-white">
                            <span class="mb-2 font-serif text-sm italic md:text-base opacity-80"><?php echo $num; ?></span>
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
            <div class="py-20 text-center text-brand-black-400">
                <p>No offers are currently available. Please check back later or add them in the WP Admin.</p>
            </div>
        <?php endif; ?>

        <!-- CTA: Book A Stay -->
        <div class="mt-20 text-center">
            <a href="<?php echo esc_url($book_link); ?>"
                class="inline-block bg-[#FDB078] text-white font-serif px-12 py-4 text-sm font-bold uppercase tracking-[0.1em] hover:bg-brand-blue transition-all shadow-lg">
                <?php pll_e('BOOK A STAY'); ?>
            </a>
        </div>
    </div>
</section>