<?php
/**
 * Section: Hero Banner
 */

$hero_bg = get_field('hero_bg_image');
$hero_logo = get_field('hero_logo') ?: get_template_directory_uri() . '/assets/images/logo-white.png';
$hero_title = get_field('hero_title') ?: 'LÈGACY';
$hero_subtitle = get_field('hero_subtitle') ?: 'a fusionoriginal';
$hero_location = get_field('hero_location') ?: 'ha noi';

?>
<section class="hero-banner relative h-screen min-h-[700px] flex items-center justify-center z-40">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <?php if ($hero_bg) : ?>
            <img src="<?php echo esc_url($hero_bg); ?>" alt="LÈGACY Hero" class="w-full h-full object-cover">
        <?php else : ?>
            <div class="w-full h-full bg-brand-black-900"></div>
        <?php endif; ?>
        <!-- Overlay -->
        <div class="absolute inset-0 bg-brand-black-900/30"></div>
    </div>

    <!-- Center Content -->
    <div class="relative z-10 text-center text-white">
        <!-- Logo/Text Group -->
        <div class="flex flex-col items-center">
            <div class="mb-4">
                <!-- If you have a specific icon or logo image, use it here -->
                <div class="w-12 h-16 border-2 border-white flex items-center justify-center mb-6">
                    <span class="text-2xl font-bold tracking-tighter">L E</span>
                </div>
            </div>
            <h1 class="text-6xl md:text-8xl font-serif font-bold tracking-[0.2em] mb-2">
                <?php echo esc_html($hero_title); ?>
            </h1>
            <p class="text-lg md:text-xl font-serif font-medium tracking-[0.3em] mb-1 italic opacity-90">
                <?php echo esc_html($hero_subtitle); ?>
            </p>
            <p class="text-sm md:text-base font-bold tracking-[0.5em] uppercase opacity-80">
                <?php echo esc_html($hero_location); ?>
            </p>
        </div>
    </div>

    <!-- Booking Form Import -->
    <?php get_template_part('template-parts/sections/booking-form'); ?>
</section>
