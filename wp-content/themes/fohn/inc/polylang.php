<?php
/**
 * Polylang String Registrations
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * ---------------------------------------------------------------------------
 * Language "gate": launch one language publicly while another is still being
 * built. English (en) is live for everyone; Vietnamese (vi) is in development
 * and only visible to logged-in editors/admins.
 *
 * To take Vietnamese live later: set FOHN_DEV_LANG to '' (or remove this block
 * and the guard in header.php). Verify the slugs in WP Admin > Languages.
 * ---------------------------------------------------------------------------
 */
if (!defined('FOHN_DEV_LANG')) {
    define('FOHN_DEV_LANG', 'vi'); // language still under development (gated)
}
if (!defined('FOHN_LIVE_LANG')) {
    define('FOHN_LIVE_LANG', 'en'); // public / live language
}

if (!function_exists('fohn_can_view_dev_lang')) {
    /**
     * Who may preview the in-development language.
     * Logged-in users who can edit content (administrators + editors).
     * Tighten to current_user_can('manage_options') for administrators only.
     */
    function fohn_can_view_dev_lang()
    {
        return is_user_logged_in() && current_user_can('edit_posts');
    }
}

/**
 * Redirect public visitors away from the in-development language.
 * Runs on the front-end main query only (not admin/REST/AJAX/cron).
 */
add_action('template_redirect', function () {
    if (is_admin() || !FOHN_DEV_LANG || !function_exists('pll_current_language')) {
        return;
    }
    if (fohn_can_view_dev_lang()) {
        return; // editors preview the dev language freely
    }
    if (pll_current_language() !== FOHN_DEV_LANG) {
        return; // only gate the dev language
    }

    // Resolve the same content in the live language, else fall back to home.
    $target = '';
    $qid = get_queried_object_id();

    if ($qid && function_exists('pll_get_post')) {
        $tr = pll_get_post($qid, FOHN_LIVE_LANG);
        if ($tr) {
            $target = get_permalink($tr);
        }
    }
    if (!$target && $qid && function_exists('pll_get_term')) {
        $tr = pll_get_term($qid, FOHN_LIVE_LANG);
        if ($tr) {
            $term_link = get_term_link((int) $tr);
            if (!is_wp_error($term_link)) {
                $target = $term_link;
            }
        }
    }
    if (!$target && function_exists('pll_home_url')) {
        $target = pll_home_url(FOHN_LIVE_LANG);
    }

    if ($target && !is_wp_error($target)) {
        // 302 (temporary) so the future VI URLs are not permanently dropped by search engines.
        wp_safe_redirect($target, 302);
        exit;
    }
});

if (!function_exists('pll_e')) {
    function pll_e($string) {
        echo esc_html($string);
    }
}

if (!function_exists('pll__')) {
    function pll__($string) {
        return $string;
    }
}

if (function_exists('pll_register_string')) {
    // Header & Buttons
    pll_register_string('fohn', 'BOOK A STAY', 'fohn_theme');
    pll_register_string('fohn', 'BOOK NOW', 'fohn_theme');
    pll_register_string('fohn', 'SUSTAINABILITY', 'fohn_theme');
    pll_register_string('fohn', 'BACK TO OFFER', 'fohn_theme');
    pll_register_string('fohn', 'BENEFITS:', 'fohn_theme');
    pll_register_string('fohn', 'Complimentary Inclusions', 'fohn_theme');
    pll_register_string('fohn', 'FINDING OUT', 'fohn_theme');
    pll_register_string('fohn', 'Find Out', 'fohn_theme');
    
    // Booking Form
    pll_register_string('fohn', 'Check Availability', 'fohn_theme');
    pll_register_string('fohn', 'Book Your Stay', 'fohn_theme');
    pll_register_string('fohn', 'Arrival', 'fohn_theme');
    pll_register_string('fohn', 'Departure', 'fohn_theme');
    pll_register_string('fohn', 'Rooms', 'fohn_theme');
    pll_register_string('fohn', 'Guests', 'fohn_theme');
    pll_register_string('fohn', 'Check availability', 'fohn_theme'); // Button
    pll_register_string('fohn', 'Room', 'fohn_theme');
    pll_register_string('fohn', 'Guest', 'fohn_theme');
    
    // Fallbacks
    pll_register_string('fohn', 'No Images', 'fohn_theme');
    pll_register_string('fohn', 'Offer Image', 'fohn_theme');
    pll_register_string('fohn', 'No apartments configured yet. Please add them in the Apartment Page backend.', 'fohn_theme');
    
    // Footer Newsletter & Socials
    pll_register_string('fohn', 'Sign up for Newsletter', 'fohn_theme');
    pll_register_string('fohn', 'Your email address', 'fohn_theme');
    pll_register_string('fohn', 'Follow Us', 'fohn_theme');
    
    // Header Navigation Fallback
    pll_register_string('fohn', 'Hotels', 'fohn_theme');
    pll_register_string('fohn', 'Dining', 'fohn_theme');
    pll_register_string('fohn', 'Residences', 'fohn_theme');
    pll_register_string('fohn', 'Yên Spa & Wellness', 'fohn_theme');
    pll_register_string('fohn', 'Offers', 'fohn_theme');
    pll_register_string('fohn', 'Facilities', 'fohn_theme');
    pll_register_string('fohn', 'Features', 'fohn_theme');
    pll_register_string('fohn', 'Gallery', 'fohn_theme');
    pll_register_string('fohn', 'Contact Us', 'fohn_theme');
    
    // Footer Navigation Fallback
    pll_register_string('fohn', 'Careers', 'fohn_theme');
    pll_register_string('fohn', 'Our Story', 'fohn_theme');
    pll_register_string('fohn', 'News', 'fohn_theme');
    pll_register_string('fohn', 'General Policy', 'fohn_theme');
    pll_register_string('fohn', 'Privacy Policy', 'fohn_theme');
    pll_register_string('fohn', 'Payment Policy', 'fohn_theme');

    // Contact Page
    pll_register_string('fohn', 'GET IN TOUCH', 'fohn_theme');
    pll_register_string('fohn', 'Name:', 'fohn_theme');
    pll_register_string('fohn', 'Email:', 'fohn_theme');
    pll_register_string('fohn', 'Phone:', 'fohn_theme');
    pll_register_string('fohn', 'Write your requries:', 'fohn_theme');
    pll_register_string('fohn', 'SEND', 'fohn_theme');
    // Single Room (detail page)
    pll_register_string('fohn', 'Room Information', 'fohn_theme');
    pll_register_string('fohn', 'Size', 'fohn_theme');
    pll_register_string('fohn', 'Occupancy', 'fohn_theme');
    pll_register_string('fohn', 'Bed Type', 'fohn_theme');
    pll_register_string('fohn', 'View', 'fohn_theme');
    pll_register_string('fohn', 'Balcony', 'fohn_theme');
    pll_register_string('fohn', 'Book This Room', 'fohn_theme');
    pll_register_string('fohn', 'Best Price Guaranteed for Direct Booking', 'fohn_theme');
    pll_register_string('fohn', 'Other Accommodations', 'fohn_theme');
    pll_register_string('fohn', '345 Doi Can, Ngoc Ha Ward, Hanoi City', 'fohn_theme');
    pll_register_string('fohn', 'Adults', 'fohn_theme');
    pll_register_string('fohn', 'Children', 'fohn_theme');
    pll_register_string('fohn', 'Promocode', 'fohn_theme');
    pll_register_string('fohn', 'HOTEL', 'fohn_theme');
    pll_register_string('fohn', 'APARTMENT', 'fohn_theme');
    // Apartment
    pll_register_string('fohn', 'Please add amenities in the Apartment Page backend.', 'fohn_theme');

    
    // Read more / less toggle
    pll_register_string('fohn', 'more', 'fohn_theme');
    pll_register_string('fohn', 'less', 'fohn_theme');

        // Gallery filters
    pll_register_string('fohn', 'All', 'fohn_theme');
    pll_register_string('fohn', 'Spa', 'fohn_theme');
    pll_register_string('fohn', 'Others', 'fohn_theme');

    // Facilities
    pll_register_string('fohn', 'Operation Hours:', 'fohn_theme');
    pll_register_string('fohn', 'All-day', 'fohn_theme');
    pll_register_string('fohn', 'Please add facility blocks in the page editor.', 'fohn_theme');
    pll_register_string('fohn', 'ALL-DAY DINING MENU', 'fohn_theme');
    pll_register_string('fohn', 'LOUNGE / TERRACE MENU', 'fohn_theme');
    pll_register_string('fohn', 'MAKE A RESERVATION', 'fohn_theme');
    pll_register_string('fohn', 'Book Now', 'fohn_theme');
    pll_register_string('fohn', 'Menu', 'fohn_theme');
}

/**
 * Register translatable ACF Options (footer) so their values show up in
 * Polylang > String translations. Runs on init because it needs get_field().
 * The default here MUST match the default used in footer.php.
 */
add_action('init', function () {
    if (!function_exists('pll_register_string') || !function_exists('get_field')) {
        return;
    }

    // key => array(default value, is multiline)
    $footer_option_strings = array(
        'footer_loyalty_title'    => array('fusionlife', false),
        'footer_loyalty_desc'     => array('Join our loyalty program and book direct to take advantage of all our rewards and benefits.', true),
        'footer_loyalty_btn_text' => array('Join Now', false),
        'footer_description'      => array('LÈGACY - A FUSION ORIGINAL HA NOI', false),
        'footer_address'          => array('345 Doi Can, Ngoc Ha Ward, Ba Dinh, Hanoi City', true),
    );

    foreach ($footer_option_strings as $key => $cfg) {
        $value = get_field($key, 'option');
        if (!$value) {
            $value = $cfg[0];
        }
        pll_register_string('fohn_' . $key, $value, 'fohn_theme', $cfg[1]);
    }
}, 20);
