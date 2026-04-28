<?php
/**
 * Section: Features Content
 */

$intro_title = get_field('features_intro_title') ?: 'FEATURES';
$intro_subtitle = get_field('features_intro_subtitle') ?: 'Discover Our Unique Amenities';
$intro_desc = get_field('features_intro_desc');
$features_list = get_field('features_list');
?>

<section class="features-section bg-[#FBF9F6] py-24 md:py-40">
    <!-- Intro Header -->
    <div class="container mx-auto px-6 text-center max-w-[800px] mb-20 md:mb-32">
        <h2 class="text-brand-blue font-serif text-4xl md:text-5xl lg:text-6xl tracking-[0.1em] uppercase mb-6"><?php echo esc_html($intro_title); ?></h2>
        <p class="text-brand-orange font-serif italic text-xl md:text-2xl mb-8"><?php echo esc_html($intro_subtitle); ?></p>
        <?php if ($intro_desc): ?>
            <p class="text-brand-black-700 font-sans text-sm md:text-base leading-loose max-w-[600px] mx-auto">
                <?php echo nl2br(esc_html($intro_desc)); ?>
            </p>
        <?php endif; ?>
    </div>

    <!-- Features Grid -->
    <div class="features-list container mx-auto px-6 max-w-[1200px]">
        <?php if ($features_list): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-12 gap-y-20">
                <?php foreach ($features_list as $feature):
                    $title = $feature['title'];
                    $desc = $feature['description'];
                    $image = $feature['image'];
                    $link = $feature['link'];
                ?>
                    <div class="feature-item text-center flex flex-col">
                        
                        <!-- Title -->
                        <h3 class="text-brand-blue font-serif italic text-2xl mb-6 tracking-wide">
                            <?php echo esc_html($title); ?>
                        </h3>

                        <!-- Image -->
                        <div class="relative aspect-[16/9] w-full overflow-hidden shadow-md mb-6">
                            <?php if ($image): ?>
                                <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>" class="w-full h-full object-cover transition-transform duration-700 hover:scale-105">
                            <?php else: ?>
                                <div class="w-full h-full bg-brand-black-100 flex items-center justify-center">
                                    <span class="text-brand-black-300 italic">Feature Image</span>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Description -->
                        <p class="text-brand-black-700 font-sans text-sm leading-relaxed flex-grow px-2 md:px-0">
                            <?php echo nl2br(esc_html($desc)); ?>
                        </p>

                        <!-- Optional Link -->
                        <?php if ($link): ?>
                            <div class="mt-6">
                                <a href="<?php echo esc_url($link); ?>" class="inline-block border-b-2 border-brand-orange text-brand-orange text-xs font-bold uppercase tracking-[0.2em] hover:text-brand-blue hover:border-brand-blue transition-colors pb-1">
                                    Learn More
                                </a>
                            </div>
                        <?php endif; ?>
                        
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <!-- Placeholder if no features added -->
            <div class="container mx-auto px-6 text-center text-brand-black-400 py-20">
                <p>Please add features via the WordPress Admin dashboard.</p>
            </div>
        <?php endif; ?>
    </div>
</section>
