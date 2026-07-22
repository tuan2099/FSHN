<?php
/**
 * The template for displaying single offer posts.
 *
 * @package fohn
 */

get_header();

while (have_posts()):
    the_post();

    // Get background image
    $bg_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
    if (!$bg_image_url) {
        $acf_img = get_field('image') ?: get_field('offer_image') ?: get_field('bg_image');
        if (is_array($acf_img)) {
            $bg_image_url = $acf_img['url'];
        } elseif (is_string($acf_img)) {
            $bg_image_url = $acf_img;
        }
    }

    $benefits = get_field('offer_benefits');
    $book_link = get_field('offer_book_link') ?: '#';
    ?>

    <section class="single-offer-section bg-white pt-32 md:pt-40 pb-16">

        <!-- Top Banner -->
        <div class="container mx-auto px-6">
            <div class="relative w-full aspect-[16/9] md:aspect-[21/9] overflow-hidden">
                <?php if ($bg_image_url): ?>
                    <img src="<?php echo esc_url($bg_image_url); ?>" alt="<?php the_title_attribute(); ?>"
                        class="absolute inset-0 w-full h-full object-cover">
                <?php else: ?>
                    <div
                        class="absolute inset-0 w-full h-full bg-brand-black-100 flex items-center justify-center text-brand-black-300 italic">
                        <?php pll_e('Offer Image'); ?></div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Body Content -->
        <div class="container mx-auto px-6">
            <div class="max-w-3xl mx-auto mt-12 md:mt-16">
                <h1 class="text-brand-blue font-serif text-3xl md:text-4xl lg:text-5xl tracking-wide uppercase mb-6 text-center">
                    <?php the_title(); ?>
                </h1>

                <div class="w-24 h-px bg-[#FDB078] mx-auto mb-8"></div>

                <div class="offer-content text-brand-black-600 font-sans text-sm md:text-base leading-relaxed mb-6">
                    <?php the_content(); ?>
                </div>

                <?php if ($benefits): ?>
                    <div class="mb-10">
                        <h4 class="text-brand-black-900 font-sans font-bold text-sm tracking-widest uppercase mb-4">
                            <?php pll_e('BENEFITS:'); ?>
                        </h4>
                        <ul class="list-disc list-inside text-brand-black-700 font-sans text-sm md:text-base space-y-2">
                            <?php foreach ($benefits as $benefit): ?>
                                <li><?php echo esc_html($benefit['benefit_text']); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <div class="flex items-center justify-center gap-6 mt-10">
                    <a href="javascript:history.back()"
                        class="inline-block text-brand-blue font-sans text-xs font-bold uppercase tracking-[0.2em] border-b-2 border-transparent hover:border-brand-blue pb-1 transition-all">
                        <?php pll_e('BACK TO OFFERS'); ?>
                    </a>

                    <a href="<?php echo esc_url($book_link); ?>"
                        class="inline-block bg-[#FDB078] hover:bg-brand-blue text-white font-sans text-xs font-bold uppercase tracking-[0.2em] px-8 py-3 transition-colors shadow-sm">
                        <?php pll_e('BOOK NOW'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Center Divider Line -->
    <div class="w-32 h-px bg-[#FDB078] mx-auto opacity-50 mb-16"></div>

    <!-- Bottom Section: Other Offers -->
    <section class="bg-white pb-24 md:pb-40">
        <div class="container mx-auto px-6">
            <?php
            $other_offers = new WP_Query(array(
                'post_type' => 'offer',
                'posts_per_page' => 8,
                'post_status' => 'publish',
            ));

            if ($other_offers->have_posts()): ?>
                <div class="flex flex-wrap justify-center gap-4 md:gap-6">
                    <?php
                    $count = 1;
                    while ($other_offers->have_posts()):
                        $other_offers->the_post();
                        $num = str_pad($count, 2, '0', STR_PAD_LEFT);

                        $card_bg = get_the_post_thumbnail_url(get_the_ID(), 'large');
                        if (!$card_bg) {
                            $acf_img = get_field('image') ?: get_field('offer_image');
                            if (is_array($acf_img))
                                $card_bg = $acf_img['url'];
                            elseif (is_string($acf_img))
                                $card_bg = $acf_img;
                        }
                        ?>
                        <a href="<?php the_permalink(); ?>"
                            class="offer-card relative block group w-full sm:w-[calc(50%-1rem)] lg:w-[calc(33.333%-1rem)] aspect-square overflow-hidden">
                            <!-- Image -->
                            <?php if ($card_bg): ?>
                                <img src="<?php echo esc_url($card_bg); ?>" alt="<?php the_title_attribute(); ?>"
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
                    wp_reset_postdata();
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

<style>
    /* Tailwind's Preflight strips heading/list/spacing defaults, so the WYSIWYG
       output of the_content() loses its bold headings, italics and line breaks.
       Restore brand-appropriate typography scoped to the offer body only. */
    .offer-content > *:first-child {
        margin-top: 0;
    }

    .offer-content h2 {
        color: #2B3C54;
        font-weight: 700;
        font-size: 1.375rem;
        line-height: 1.3;
        margin: 2rem 0 0.75rem;
    }

    .offer-content h3 {
        color: #2B3C54;
        font-weight: 700;
        font-size: 1.125rem;
        line-height: 1.3;
        margin: 1.75rem 0 0.5rem;
    }

    .offer-content h4 {
        color: #2B3C54;
        font-weight: 700;
        font-size: 1rem;
        margin: 1.5rem 0 0.5rem;
    }

    .offer-content p {
        margin: 0 0 1rem;
    }

    .offer-content strong,
    .offer-content b {
        font-weight: 700;
        color: #2B3C54;
    }

    .offer-content em,
    .offer-content i {
        font-style: italic;
    }

    .offer-content ul {
        list-style: disc;
        padding-left: 1.5rem;
        margin: 0 0 1rem;
    }

    .offer-content ol {
        list-style: decimal;
        padding-left: 1.5rem;
        margin: 0 0 1rem;
    }

    .offer-content li {
        margin-bottom: 0.375rem;
    }

    .offer-content a {
        color: #2B3C54;
        text-decoration: underline;
    }

    .offer-content img {
        max-width: 100%;
        height: auto;
    }

    .offer-content figure {
        margin: 1.5rem 0;
    }
</style>

<?php
endwhile;

get_footer();
?>