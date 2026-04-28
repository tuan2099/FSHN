<?php
/**
 * The template for displaying single offer posts.
 *
 * @package fohn
 */

get_header();

while ( have_posts() ) :
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
        <div class="container mx-auto px-6 max-w-[1200px]">
            <div class="flex flex-col lg:flex-row items-stretch gap-12 lg:gap-20">
                
                <!-- Left Content -->
                <div class="w-full lg:w-1/2 flex flex-col justify-center">
                    <h1 class="text-brand-blue font-serif text-3xl md:text-4xl lg:text-5xl tracking-wide uppercase mb-6">
                        <?php the_title(); ?>
                    </h1>
                    
                    <div class="text-brand-black-600 font-sans text-sm md:text-base leading-relaxed mb-6">
                        <?php the_content(); ?>
                    </div>
                    
                    <div class="w-24 h-px bg-[#FDB078] mb-8"></div>

                    <?php if ($benefits): ?>
                        <div class="mb-10">
                            <h4 class="text-brand-black-900 font-sans font-bold text-sm tracking-widest uppercase mb-4">
                                BENEFITS:
                            </h4>
                            <ul class="list-disc list-inside text-brand-black-700 font-sans text-sm md:text-base space-y-2">
                                <?php foreach ($benefits as $benefit): ?>
                                    <li><?php echo esc_html($benefit['benefit_text']); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <div class="flex items-center gap-6 mt-6">
                        <a href="javascript:history.back()" class="inline-block text-brand-blue font-sans text-xs font-bold uppercase tracking-[0.2em] border-b-2 border-transparent hover:border-brand-blue pb-1 transition-all">
                            BACK TO OFFER
                        </a>
                        
                        <a href="<?php echo esc_url($book_link); ?>" class="inline-block bg-[#FDB078] hover:bg-brand-blue text-white font-sans text-xs font-bold uppercase tracking-[0.2em] px-8 py-3 transition-colors shadow-sm">
                            BOOK NOW
                        </a>
                    </div>
                </div>

                <!-- Right Image -->
                <div class="w-full lg:w-1/2 min-h-[400px] lg:min-h-0">
                    <div class="relative w-full h-full min-h-[400px] aspect-[4/5] lg:aspect-auto overflow-hidden">
                        <?php if ($bg_image_url): ?>
                            <img src="<?php echo esc_url($bg_image_url); ?>" alt="<?php the_title_attribute(); ?>" class="absolute inset-0 w-full h-full object-cover">
                        <?php else: ?>
                            <div class="absolute inset-0 w-full h-full bg-brand-black-100 flex items-center justify-center text-brand-black-300 italic">Offer Image</div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Center Divider Line -->
    <div class="w-32 h-px bg-[#FDB078] mx-auto opacity-50 mb-16"></div>

    <!-- Bottom Section: Other Offers -->
    <section class="bg-white pb-24 md:pb-40">
        <div class="container mx-auto px-6 max-w-[1400px]">
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
                    while ($other_offers->have_posts()): $other_offers->the_post(); 
                        $num = str_pad($count, 2, '0', STR_PAD_LEFT);
                        
                        $card_bg = get_the_post_thumbnail_url(get_the_ID(), 'large');
                        if (!$card_bg) {
                            $acf_img = get_field('image') ?: get_field('offer_image');
                            if (is_array($acf_img)) $card_bg = $acf_img['url'];
                            elseif (is_string($acf_img)) $card_bg = $acf_img;
                        }
                    ?>
                        <a href="<?php the_permalink(); ?>" class="offer-card relative block group w-full sm:w-[calc(50%-1rem)] lg:w-[calc(33.333%-1rem)] aspect-square overflow-hidden">
                            <!-- Image -->
                            <?php if ($card_bg): ?>
                                <img src="<?php echo esc_url($card_bg); ?>" alt="<?php the_title_attribute(); ?>" class="absolute inset-0 w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
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

<?php 
endwhile;

get_footer();
?>
