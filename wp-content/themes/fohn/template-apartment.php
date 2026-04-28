<?php
/**
 * Template Name: Apartment Page
 */

get_header(); ?>

<main id="primary" class="site-main bg-white">

    <?php
    // Include the global hero section (automatically uses the page's featured image)
    get_template_part('template-parts/sections/hero');
    ?>

    <!-- Apartment Content will go here -->
    <?php get_template_part('template-parts/sections/apartment-content'); ?>

</main>

<?php get_footer(); ?>
