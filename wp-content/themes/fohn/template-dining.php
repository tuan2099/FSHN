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

    <?php
    while (have_posts()):
        the_post();
        the_content();
    endwhile;
    ?>

</main>

<?php get_footer(); ?>
