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
}
