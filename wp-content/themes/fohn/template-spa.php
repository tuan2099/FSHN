<?php
/**
 * Template Name: Spa Page
 */

get_header(); ?>

<main id="primary" class="site-main">

    <?php
    // Include hero or other standard sections if needed
    get_template_part('template-parts/sections/hero');
    ?>

    <?php get_template_part('template-parts/sections/spa-content'); ?>

</main>

<?php get_footer(); ?>