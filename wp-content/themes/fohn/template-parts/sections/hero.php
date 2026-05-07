<?php
/**
 * Section: Hero Banner
 */

$hero_bg = get_the_post_thumbnail_url(get_the_ID(), 'full') ?: get_field('hero_bg_image');
$hero_logo = get_field('hero_logo') ?: get_template_directory_uri() . '/assets/images/logo-white.png';
$hero_title = get_field('hero_title') ?: 'LÈGACY';
$hero_subtitle = get_field('hero_subtitle') ?: 'a fusionoriginal';
$hero_location = get_field('hero_location') ?: 'ha noi';
$hero_height = get_field('hero_height_type') ?: 'full'; // Default to full screen

// Determine the height class based on user selection
$height_class = ($hero_height === 'fixed') ? 'h-[500px] lg:h-[600px]' : 'h-screen min-h-[700px]';
?>
<section class="hero-banner relative <?php echo $height_class; ?> flex items-center justify-center z-40">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <?php if ($hero_bg): ?>
            <img src="<?php echo esc_url($hero_bg); ?>" alt="LÈGACY Hero" class="w-full h-full object-cover">
        <?php else: ?>
            <div class="w-full h-full bg-brand-black-900"></div>
        <?php endif; ?>
        <!-- Overlay -->
        <!-- Professional Gradient Overlay (Darkened) -->
        <div class="absolute inset-0 z-10" style="background: linear-gradient(to bottom, rgba(30, 45, 65, 0.85) 0%, rgba(43, 60, 84, 0) 30%, rgba(43, 60, 84, 0) 70%, rgba(20, 30, 45, 1) 100%);"></div>
    </div>

    <!-- Center Content -->
    <div class="relative z-10 text-center text-white" data-aos="fade-up" data-aos-duration="1500">
        <!-- Logo/Text Group -->
        <div class="flex flex-col items-center">

        </div>
    </div>

    <!-- Booking Form Import -->
    <?php get_template_part('template-parts/sections/booking-form'); ?>
</section>