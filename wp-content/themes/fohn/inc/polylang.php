<?php
/**
 * Polylang String Registrations
 */

if (!defined('ABSPATH')) {
    exit;
}

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
    pll_register_string('fohn', 'FINDING OUT', 'fohn_theme');
    
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
    pll_register_string('fohn', 'Adults', 'fohn_theme');
    pll_register_string('fohn', 'Adult', 'fohn_theme');
    pll_register_string('fohn', 'Children', 'fohn_theme');
    pll_register_string('fohn', 'Child', 'fohn_theme');
    pll_register_string('fohn', 'Promocode', 'fohn_theme');
    pll_register_string('fohn', 'Find Out', 'fohn_theme');
    pll_register_string('fohn', 'Please select arrival and departure dates.', 'fohn_theme');

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

    // Apartment
    pll_register_string('fohn', 'Please add amenities in the Apartment Page backend.', 'fohn_theme');
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
