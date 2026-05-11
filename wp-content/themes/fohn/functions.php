<?php
/**
 * FOHN functions and definitions
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}



/**
 * Setup Theme
 */
function fohn_setup()
{
	// Add support for block styles.
	add_theme_support('wp-block-styles');

	// Add support for responsive embedded content.
	add_theme_support('responsive-embeds');

	// Add support for post thumbnails.
	add_theme_support('post-thumbnails');

	// Add support for title tag.
	add_theme_support('title-tag');

	// Register Navigation Menus
	register_nav_menus(array(
		'primary' => __('Primary Menu', 'fohn'),
		'footer' => __('Footer Menu', 'fohn'),
	));

	// Add support for HTML5 features.
	add_theme_support('html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
	));
}
add_action('after_setup_theme', 'fohn_setup');

/**
 * Enqueue scripts and styles.
 */
function fohn_scripts()
{
	// Enqueue Tailwind CSS
	wp_enqueue_style('fohn-style', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0');

	// Enqueue Swiper CSS
	wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.0');

	// Enqueue Swiper JS
	wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', false);

	// Enqueue Flatpickr
	wp_enqueue_style('flatpickr-css', 'https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css', array(), '4.6.13');
	wp_enqueue_script('flatpickr-js', 'https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.js', array(), '4.6.13', false);

	// Enqueue AOS CSS
	wp_enqueue_style('aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css', array(), '2.3.1');

	// Enqueue AOS JS
	wp_enqueue_script('aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), '2.3.1', true);

	// Enqueue GLightbox
	wp_enqueue_style('glightbox-css', 'https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css', array(), '3.3.0');
	wp_enqueue_script('glightbox-js', 'https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js', array(), '3.3.0', true);

	// Enqueue Leaflet CSS
	wp_enqueue_style('leaflet-css', 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.css', array(), '1.9.4');

	// Enqueue Leaflet JS
	wp_enqueue_script('leaflet-js', 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.js', array(), '1.9.4', true);

	// Main JS
	wp_enqueue_script('fohn-script', get_template_directory_uri() . '/assets/js/main.js', array('swiper-js', 'flatpickr-js', 'aos-js', 'glightbox-js', 'leaflet-js'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'fohn_scripts');

/**
 * Include separate files
 */
require get_template_directory() . '/inc/acf-fields.php';
require get_template_directory() . '/inc/polylang.php';

// Include Custom Post Types
require get_template_directory() . '/inc/cpt.php';
