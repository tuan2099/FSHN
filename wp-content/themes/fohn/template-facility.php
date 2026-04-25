<?php
/**
 * Template Name: Facility Page
 */

get_header(); ?>

<main id="primary" class="site-main">

    <?php 
    get_template_part('template-parts/sections/hero'); 
    ?>

    <?php get_template_part('template-parts/sections/facility-content'); ?>

    <?php
    while (have_posts()):
        the_post();
        the_content();
    endwhile;
    ?>

</main>

<?php get_footer(); ?>
