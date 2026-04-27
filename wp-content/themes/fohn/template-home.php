<?php
/**
 * Template Name: Home Page
 */

get_header(); ?>

<main id="primary" class="site-main">

    <?php get_template_part('template-parts/sections/hero'); ?>

    <!-- Flexible Content or Custom Sections could go here if not using blocks -->
    <?php if (have_rows('home_sections')): ?>
        <?php while (have_rows('home_sections')):
            the_row(); ?>
            <?php if (get_row_layout() == 'feature_section'): ?>
                <!-- Example Feature Section -->
                <section class="py-24 bg-brand-black-100">
                    <div class="container mx-auto px-6">
                        <div class="text-center mb-18">
                            <h2 class="text-4xl font-bold text-brand-blue mb-4">
                                <?php the_sub_field('title'); ?>
                            </h2>
                            <p class="text-brand-black-700 max-w-2xl mx-auto">
                                <?php the_sub_field('description'); ?>
                            </p>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            <?php if (have_rows('features')): ?>
                                <?php while (have_rows('features')):
                                    the_row(); ?>
                                    <div
                                        class="bg-white p-8 rounded-3xl shadow-sm border border-brand-black-100 hover:shadow-xl transition-all group">
                                        <div
                                            class="w-16 h-16 bg-brand-orange/10 rounded-2xl flex items-center justify-center text-brand-orange mb-6 group-hover:bg-brand-orange group-hover:text-white transition-all">
                                            <!-- Icon here -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                                            </svg>
                                        </div>
                                        <h3 class="text-xl font-bold mb-4 text-brand-blue">
                                            <?php the_sub_field('feature_title'); ?>
                                        </h3>
                                        <p class="text-brand-black-500 text-sm leading-relaxed">
                                            <?php the_sub_field('feature_text'); ?>
                                        </p>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>

    <?php get_template_part('template-parts/sections/heritage'); ?>
    <?php get_template_part('template-parts/sections/rooms-slider'); ?>
    <?php get_template_part('template-parts/sections/offers-carousel'); ?>
    <?php get_template_part('template-parts/sections/offers-alternate'); ?>
    <?php // get_template_part('template-parts/sections/offers'); ?>
    <?php get_template_part('template-parts/sections/map'); ?>
    <?php get_template_part('template-parts/sections/faq'); ?>

</main>

<?php get_footer(); ?>