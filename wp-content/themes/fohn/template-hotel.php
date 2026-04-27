<?php
/**
 * Template Name: Hotel Page
 */

get_header(); ?>

<main id="primary" class="site-main">

    <?php
    // You can include other sections here, like hero, before the amenities
    get_template_part('template-parts/sections/hero');
    ?>

    <?php get_template_part('template-parts/sections/hotel-amenities'); ?>
    <?php get_template_part('template-parts/sections/hotel-rooms'); ?>


</main>

<?php get_footer(); ?>