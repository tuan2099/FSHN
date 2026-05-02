<?php
/**
 * Section: Features Content
 */

$intro_title = get_field('features_intro_title') ?: 'FEATURES';
$intro_subtitle = get_field('features_intro_subtitle') ?: 'Discover Our Unique Amenities';
$intro_desc = get_field('features_intro_desc');
$features_list = get_field('features_list');
?>

<section class="features-section relative bg-[#FBF9F6] py-24 md:py-40 overflow-hidden">
    <!-- Decorative Florals (Matching Other Templates) -->
    <div class="absolute left-[-50px] top-4 md:top-20 w-[350px] pointer-events-none select-none z-0 hidden md:block">
        <?php if (get_field('features_flower_left')): ?>
            <img src="<?php echo esc_url(get_field('features_flower_left')); ?>" alt="" class="w-full h-auto">
        <?php else: ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lotus-bg.png" alt="" class="w-full h-auto">
        <?php endif; ?>
    </div>
    <div class="absolute right-[-50px] top-4 md:top-20 w-[350px] pointer-events-none select-none z-0 scale-x-[-1] hidden md:block">
        <?php if (get_field('features_flower_right')): ?>
            <img src="<?php echo esc_url(get_field('features_flower_right')); ?>" alt="" class="w-full h-auto">
        <?php else: ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lotus-bg.png" alt="" class="w-full h-auto">
        <?php endif; ?>
    </div>
    <!-- Intro Header -->
    <div class="container mx-auto px-6 text-center mb-20 md:mb-32">
        <h2 class="text-brand-blue font-serif text-[40px] font-semibold  tracking-[0.1em] uppercase mb-6">
            <?php echo esc_html($intro_title); ?>
        </h2>
        <?php if ($intro_desc): ?>
            <p class="text-brand-black-700 font-sans text-sm md:text-base leading-loose mx-auto">
                <?php echo nl2br(esc_html($intro_desc)); ?>
            </p>
        <?php endif; ?>
    </div>

    <!-- Features Grid -->
    <div class="features-list container mx-auto px-6">
        <?php if ($features_list): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-4 gap-y-12">
                <?php foreach ($features_list as $feature):
                    $title = $feature['title'];
                    $desc = $feature['description'];
                    $image = $feature['image'];
                    $link = $feature['link'];
                    ?>
                    <div class="feature-item text-center flex flex-col">

                        <!-- Title -->
                        <h3 class="text-brand-blue font-serif italic text-xl font-semibold mb-6 tracking-wide">
                            <?php echo esc_html($title); ?>
                        </h3>

                        <!-- Image -->
                        <div class="relative aspect-[16/9] w-full overflow-hidden shadow-md mb-6">
                            <?php if ($image): ?>
                                <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>"
                                    class="w-full h-full object-cover transition-transform duration-700 hover:scale-105">
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
                                <a href="<?php echo esc_url($link); ?>"
                                    class="inline-block border-b-2 border-brand-orange text-brand-orange text-xs font-bold uppercase tracking-[0.2em] hover:text-brand-blue hover:border-brand-blue transition-colors pb-1">
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