<?php
/**
 * Template Name: Dining Page
 */

get_header(); ?>

<main id="primary" class="site-main">

    <?php
    // Include hero or other standard sections
    get_template_part('template-parts/sections/hero');
    ?>

    <?php get_template_part('template-parts/sections/dining-content'); ?>


</main>

<?php get_footer(); ?>