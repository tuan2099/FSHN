<?php
/**
 * Register ACF Fields Programmatically
 */

add_action('init', 'fohn_register_acf_fields', 10);

function fohn_register_acf_fields()
{
    if (!function_exists('acf_add_local_field_group'))
        return;

    /**
     * Dining Page Settings
     */
    acf_add_local_field_group(array(
        'key' => 'group_fohn_dining_settings',
        'title' => 'Dining Page Settings',
        'fields' => array(
            // TAB: INTRO
            array(
                'key' => 'field_fohn_dining_tab_intro',
                'label' => 'Intro Section',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ),
            array(
                'key' => 'field_fohn_dining_intro_flower_left',
                'label' => 'Flower Left Image',
                'name' => 'dining_flower_left',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_fohn_dining_intro_flower_right',
                'label' => 'Flower Right Image',
                'name' => 'dining_flower_right',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_fohn_dining_intro_title',
                'label' => 'Intro Title',
                'name' => 'dining_intro_title',
                'type' => 'text',
                'default_value' => 'DINING',
            ),
            array(
                'key' => 'field_fohn_dining_intro_subtitle',
                'label' => 'Intro Subtitle',
                'name' => 'dining_intro_subtitle',
                'type' => 'text',
            ),
            array(
                'key' => 'field_fohn_dining_intro_desc',
                'label' => 'Intro Description',
                'name' => 'dining_intro_desc',
                'type' => 'textarea',
            ),
            array(
                'key' => 'field_fohn_dining_menu_link_1',
                'label' => 'Menu Link 1 (e.g. All-Day Dining)',
                'name' => 'dining_menu_link_1',
                'type' => 'url',
            ),
            array(
                'key' => 'field_fohn_dining_menu_link_2',
                'label' => 'Menu Link 2 (e.g. Lounge/Terrace)',
                'name' => 'dining_menu_link_2',
                'type' => 'url',
            ),

            // TAB: SLIDER
            array(
                'key' => 'field_fohn_dining_tab_slider',
                'label' => 'Main Slider',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ),
            array(
                'key' => 'field_fohn_dining_slider',
                'label' => 'Dining Slider Images',
                'name' => 'dining_slider_images',
                'type' => 'gallery',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_fohn_dining_main_book_link',
                'label' => 'Main Booking Link (Under Slider)',
                'name' => 'dining_main_book_link',
                'type' => 'url',
                'default_value' => '#',
            ),

            // TAB: OUTLETS
            array(
                'key' => 'field_fohn_dining_tab_outlets',
                'label' => 'Dining Outlets',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ),
            array(
                'key' => 'field_fohn_dining_restaurants',
                'label' => 'Dining Outlets (Alternating)',
                'name' => 'dining_outlets',
                'type' => 'repeater',
                'layout' => 'row',
                'button_label' => 'Add Outlet',
                'sub_fields' => array(
                    array(
                        'key' => 'field_fohn_dining_outlet_name',
                        'label' => 'Name',
                        'name' => 'name',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_fohn_dining_outlet_subtitle',
                        'label' => 'Subtitle',
                        'name' => 'subtitle',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_fohn_dining_outlet_desc',
                        'label' => 'Description',
                        'name' => 'description',
                        'type' => 'textarea',
                    ),
                    array(
                        'key' => 'field_fohn_dining_outlet_image',
                        'label' => 'Main Image',
                        'name' => 'image',
                        'type' => 'image',
                        'return_format' => 'url',
                    ),
                    array(
                        'key' => 'field_fohn_dining_outlet_book_link',
                        'label' => 'Booking Link',
                        'name' => 'book_link',
                        'type' => 'url',
                    ),
                    array(
                        'key' => 'field_fohn_dining_outlet_menu_link',
                        'label' => 'Menu Link',
                        'name' => 'menu_link',
                        'type' => 'url',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'templates/template-dining.php',
                ),
            ),
        ),
    ));

    /**
     * Spa Page Settings
     */
    acf_add_local_field_group(array(
        'key' => 'group_fohn_spa_settings',
        'title' => 'Spa Page Settings',
        'fields' => array(
            // TAB: INTRO
            array(
                'key' => 'field_fohn_spa_tab_intro',
                'label' => 'Intro Section',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_fohn_spa_flower_left',
                'label' => 'Flower Left Image',
                'name' => 'spa_flower_left',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_fohn_spa_flower_right',
                'label' => 'Flower Right Image',
                'name' => 'spa_flower_right',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_fohn_spa_intro_title',
                'label' => 'Intro Title',
                'name' => 'spa_intro_title',
                'type' => 'text',
                'default_value' => 'Yên Spa & Wellness',
            ),
            array(
                'key' => 'field_fohn_spa_intro_desc',
                'label' => 'Intro Description',
                'name' => 'spa_intro_desc',
                'type' => 'textarea',
            ),
            array(
                'key' => 'field_fohn_spa_intro_btn_text',
                'label' => 'Button Text',
                'name' => 'spa_intro_btn_text',
                'type' => 'text',
                'default_value' => 'Contact Concierge',
            ),
            array(
                'key' => 'field_fohn_spa_intro_btn_link',
                'label' => 'Button Link',
                'name' => 'spa_intro_btn_link',
                'type' => 'url',
            ),

            // TAB: BLOCKS
            array(
                'key' => 'field_fohn_spa_tab_blocks',
                'label' => 'Wellness Blocks',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_fohn_spa_blocks',
                'label' => 'Spa & Wellness Blocks (Alternating)',
                'name' => 'spa_blocks',
                'type' => 'repeater',
                'layout' => 'row',
                'button_label' => 'Add Block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_fohn_spa_block_title',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_fohn_spa_block_subtitle',
                        'label' => 'Subtitle',
                        'name' => 'subtitle',
                        'type' => 'textarea',
                    ),
                    array(
                        'key' => 'field_fohn_spa_block_desc',
                        'label' => 'Description',
                        'name' => 'description',
                        'type' => 'textarea',
                    ),
                    array(
                        'key' => 'field_fohn_spa_block_gallery',
                        'label' => 'Image Gallery',
                        'name' => 'gallery',
                        'type' => 'gallery',
                        'return_format' => 'url',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'templates/template-spa.php',
                ),
            ),
        ),
    ));

    /**
     * Facilities Page Settings
     */
    acf_add_local_field_group(array(
        'key' => 'group_fohn_facilities_settings',
        'title' => 'Facilities Page Settings',
        'fields' => array(
            // TAB: INTRO
            array(
                'key' => 'field_fohn_facilities_tab_intro',
                'label' => 'Intro Section',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_fohn_facilities_flower_left',
                'label' => 'Flower Left Image',
                'name' => 'facilities_flower_left',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_fohn_facilities_flower_right',
                'label' => 'Flower Right Image',
                'name' => 'facilities_flower_right',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_fohn_facilities_intro_title',
                'label' => 'Intro Title',
                'name' => 'facilities_intro_title',
                'type' => 'text',
                'default_value' => 'Facilities',
            ),
            array(
                'key' => 'field_fohn_facilities_intro_desc',
                'label' => 'Intro Description',
                'name' => 'facilities_intro_desc',
                'type' => 'textarea',
            ),

            // TAB: BLOCKS
            array(
                'key' => 'field_fohn_facilities_tab_blocks',
                'label' => 'Facility Blocks',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_fohn_facilities_blocks',
                'label' => 'Facilities Blocks',
                'name' => 'facilities_blocks',
                'type' => 'repeater',
                'layout' => 'row',
                'button_label' => 'Add Facility',
                'sub_fields' => array(
                    array(
                        'key' => 'field_fohn_facility_title',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_fohn_facility_desc',
                        'label' => 'Description',
                        'name' => 'description',
                        'type' => 'textarea',
                    ),
                    array(
                        'key' => 'field_fohn_facility_hours',
                        'label' => 'Operation Hours',
                        'name' => 'hours',
                        'type' => 'text',
                        'default_value' => 'All-day',
                    ),
                    array(
                        'key' => 'field_fohn_facility_gallery',
                        'label' => 'Image Gallery',
                        'name' => 'gallery',
                        'type' => 'gallery',
                        'return_format' => 'url',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'templates/template-facility.php',
                ),
            ),
        ),
    ));

    /**
     * Hotel Page Settings
     */
    acf_add_local_field_group(array(
        'key' => 'group_fohn_hotel_settings',
        'title' => 'Hotel Page Settings',
        'fields' => array(
            // TAB: INTRO
            array(
                'key' => 'field_fohn_hotel_tab_intro',
                'label' => 'Intro Section',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_fohn_hotel_flower_left',
                'label' => 'Flower Left Image',
                'name' => 'hotel_flower_left',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_fohn_hotel_flower_right',
                'label' => 'Flower Right Image',
                'name' => 'hotel_flower_right',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_fohn_hotel_intro_title',
                'label' => 'Intro Title',
                'name' => 'hotel_intro_title',
                'type' => 'text',
                'default_value' => 'Hotel',
            ),
            array(
                'key' => 'field_fohn_hotel_intro_desc',
                'label' => 'Intro Description',
                'name' => 'hotel_intro_desc',
                'type' => 'textarea',
            ),

            // TAB: AMENITIES
            array(
                'key' => 'field_fohn_hotel_tab_amenities',
                'label' => 'Amenities',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_fohn_hotel_amenities_title',
                'label' => 'Amenities Bar Title',
                'name' => 'hotel_amenities_title',
                'type' => 'text',
                'default_value' => 'Amenities',
            ),
            array(
                'key' => 'field_fohn_hotel_amenities_list',
                'label' => 'Amenities List',
                'name' => 'hotel_amenities_list',
                'type' => 'repeater',
                'layout' => 'table',
                'button_label' => 'Add Amenity',
                'sub_fields' => array(
                    array(
                        'key' => 'field_fohn_hotel_amenity_icon',
                        'label' => 'Icon (Image/SVG)',
                        'name' => 'icon',
                        'type' => 'image',
                        'return_format' => 'url',
                    ),
                    array(
                        'key' => 'field_fohn_hotel_amenity_label',
                        'label' => 'Label',
                        'name' => 'label',
                        'type' => 'text',
                    ),
                ),
            ),
            array(
                'key' => 'field_fohn_hotel_footer_text',
                'label' => 'Footer Quote',
                'name' => 'hotel_footer_text',
                'type' => 'textarea',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'templates/template-hotel.php',
                ),
            ),
        ),
    ));

    /**
     * Register Options Page
     */
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page(array(
            'page_title' => 'Theme Settings',
            'menu_title' => 'Theme Settings',
            'menu_slug' => 'theme-settings',
            'capability' => 'edit_posts',
            'redirect' => false
        ));

        acf_add_options_sub_page(array(
            'page_title' => 'Footer Settings',
            'menu_title' => 'Footer',
            'parent_slug' => 'theme-settings',
            'menu_slug' => 'footer-settings',
        ));
    }

    /**
     * Home Page: Reorganized into Tabs
     */
    acf_add_local_field_group(array(
        'key' => 'group_fohn_home_settings',
        'title' => 'Home Page Settings',
        'fields' => array(
            // TAB: HERO
            array(
                'key' => 'tab_fohn_hero',
                'label' => 'Hero Banner',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ),
            array(
                'key' => 'field_fohn_hero_bg',
                'label' => 'Background Image',
                'name' => 'hero_bg_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_fohn_hero_title',
                'label' => 'Title',
                'name' => 'hero_title',
                'type' => 'text',
                'default_value' => 'LÈGACY',
            ),
            array(
                'key' => 'field_fohn_hero_sub',
                'label' => 'Sub Title',
                'name' => 'hero_subtitle',
                'type' => 'text',
                'default_value' => 'a fusionoriginal',
            ),
            array(
                'key' => 'field_fohn_hero_loc',
                'label' => 'Location Text',
                'name' => 'hero_location',
                'type' => 'text',
                'default_value' => 'ha noi',
            ),

            // TAB: HERITAGE
            array(
                'key' => 'tab_fohn_heritage',
                'label' => 'Heritage & Accommodations',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ),
            array(
                'key' => 'field_fohn_heritage_title',
                'label' => 'Heritage Title',
                'name' => 'heritage_title',
                'type' => 'textarea',
                'default_value' => 'WHERE HERITAGE MEETS ORIGINALITY',
            ),
            array(
                'key' => 'field_fohn_heritage_desc',
                'label' => 'Heritage Description',
                'name' => 'heritage_desc',
                'type' => 'textarea',
                'new_lines' => 'br',
            ),
            array(
                'key' => 'field_fohn_heritage_fleft',
                'label' => 'Flower Left Image',
                'name' => 'heritage_flower_left',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_fohn_heritage_fright',
                'label' => 'Flower Right Image',
                'name' => 'heritage_flower_right',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_fohn_acc_title',
                'label' => 'Accommodation Title',
                'name' => 'acc_title',
                'type' => 'text',
                'default_value' => 'ACCOMMODATIONS',
            ),
            array(
                'key' => 'field_fohn_acc_sub',
                'label' => 'Accommodation Subheader',
                'name' => 'acc_sub',
                'type' => 'text',
                'default_value' => 'Live the rhythm of Hanoi. Heritage, culture, and comfort in perfect Harmony!',
            ),
            array(
                'key' => 'field_fohn_acc_desc',
                'label' => 'Accommodation Description',
                'name' => 'acc_desc',
                'type' => 'textarea',
                'new_lines' => 'br',
            ),

            // TAB: ROOMS
            array(
                'key' => 'tab_fohn_rooms',
                'label' => 'Rooms Slider',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ),
            array(
                'key' => 'field_fohn_home_rooms_list',
                'label' => 'Select Rooms to Display',
                'name' => 'home_rooms_list',
                'type' => 'relationship',
                'post_type' => array('room'),
                'filters' => array('search', 'taxonomy'),
                'elements' => array('featured_image'),
            ),

            // TAB: OFFERS
            array(
                'key' => 'tab_fohn_offers',
                'label' => 'Special Offers',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ),
            array(
                'key' => 'field_fohn_offers_heading',
                'label' => 'Heading',
                'name' => 'offers_heading',
                'type' => 'text',
                'default_value' => 'OFFERS AT LÈGACY',
            ),
            array(
                'key' => 'field_fohn_offers_list',
                'label' => 'Offers List',
                'name' => 'offers_list',
                'type' => 'repeater',
                'layout' => 'row',
                'button_label' => 'Add Offer',
                'sub_fields' => array(
                    array(
                        'key' => 'field_fohn_offer_title',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'textarea',
                    ),
                    array(
                        'key' => 'field_fohn_offer_image',
                        'label' => 'Image',
                        'name' => 'image',
                        'type' => 'image',
                        'return_format' => 'url',
                    ),
                ),
            ),
            array(
                'key' => 'field_fohn_offers_btn_text',
                'label' => 'Button Text',
                'name' => 'offers_button_text',
                'type' => 'text',
                'default_value' => 'EXPLORE MORE OFFERS',
            ),
            array(
                'key' => 'field_fohn_offers_btn_link',
                'label' => 'Button Link',
                'name' => 'offers_button_link',
                'type' => 'url',
                'default_value' => '#',
            ),
            array(
                'key' => 'field_fohn_offers_alt_block1_heading',
                'label' => 'Offers Alternate - Block 1 Heading',
                'name' => 'offers_alt_block1_heading',
                'type' => 'text',
                'default_value' => 'OFFERS',
            ),
            array(
                'key' => 'field_fohn_offers_alt_block1_desc',
                'label' => 'Offers Alternate - Block 1 Description',
                'name' => 'offers_alt_block1_desc',
                'type' => 'textarea',
                'default_value' => 'Discover a collection of seasonal experiences and exclusive stay packages crafted to elevate your time in Hanoi.',
            ),
            array(
                'key' => 'field_fohn_offers_alt_block1_btn_text',
                'label' => 'Offers Alternate - Block 1 Button Text',
                'name' => 'offers_alt_block1_btn_text',
                'type' => 'text',
                'default_value' => 'VIEW ALL OFFERS',
            ),
            array(
                'key' => 'field_fohn_offers_alt_block1_btn_link',
                'label' => 'Offers Alternate - Block 1 Button Link',
                'name' => 'offers_alt_block1_btn_link',
                'type' => 'url',
                'default_value' => '#',
            ),
            array(
                'key' => 'field_fohn_offers_alt_block1_list',
                'label' => 'Offers Alternate - Block 1 (Offers)',
                'name' => 'offers_alt_block1_list',
                'type' => 'repeater',
                'layout' => 'row',
                'button_label' => 'Add Item',
                'sub_fields' => array(
                    array(
                        'key' => 'field_fohn_offer_alt1_title',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'textarea',
                    ),
                    array(
                        'key' => 'field_fohn_offer_alt1_gallery',
                        'label' => 'Gallery',
                        'name' => 'gallery',
                        'type' => 'gallery',
                        'return_format' => 'url',
                    ),
                    array(
                        'key' => 'field_fohn_offer_alt1_link',
                        'label' => 'Link',
                        'name' => 'link',
                        'type' => 'url',
                    ),
                ),
            ),
            array(
                'key' => 'field_fohn_offers_alt_block2_heading',
                'label' => 'Offers Alternate - Block 2 Heading',
                'name' => 'offers_alt_block2_heading',
                'type' => 'text',
                'default_value' => 'DRINK & DINE',
            ),
            array(
                'key' => 'field_fohn_offers_alt_block2_desc',
                'label' => 'Offers Alternate - Block 2 Description',
                'name' => 'offers_alt_block2_desc',
                'type' => 'textarea',
                'default_value' => 'Savor the tastes of Vietnam in a new light at our 100-seat all-day-dining restaurant MỘC Loft, where authentic flavors meet contemporary reinterpretation. Rise above the city at our 24th-floor bar and VIP Room, the perfect setting for sunset cocktails, skyline views, and stylish gatherings.',
            ),
            array(
                'key' => 'field_fohn_offers_alt_block2_btn_text',
                'label' => 'Offers Alternate - Block 2 Button Text',
                'name' => 'offers_alt_block2_btn_text',
                'type' => 'text',
                'default_value' => 'VIEW DETAILS',
            ),
            array(
                'key' => 'field_fohn_offers_alt_block2_btn_link',
                'label' => 'Offers Alternate - Block 2 Button Link',
                'name' => 'offers_alt_block2_btn_link',
                'type' => 'url',
                'default_value' => '#',
            ),
            array(
                'key' => 'field_fohn_offers_alt_block2_list',
                'label' => 'Offers Alternate - Block 2 (Dining)',
                'name' => 'offers_alt_block2_list',
                'type' => 'repeater',
                'layout' => 'row',
                'button_label' => 'Add Item',
                'sub_fields' => array(
                    array(
                        'key' => 'field_fohn_offer_alt2_title',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'textarea',
                    ),
                    array(
                        'key' => 'field_fohn_offer_alt2_gallery',
                        'label' => 'Gallery',
                        'name' => 'gallery',
                        'type' => 'gallery',
                        'return_format' => 'url',
                    ),
                    array(
                        'key' => 'field_fohn_offer_alt2_link',
                        'label' => 'Link',
                        'name' => 'link',
                        'type' => 'url',
                    ),
                ),
            ),

            // TAB: MAP
            array(
                'key' => 'tab_fohn_map',
                'label' => 'Location Info',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ),
            array(
                'key' => 'field_fohn_map_address',
                'label' => 'Address',
                'name' => 'map_address',
                'type' => 'text',
                'default_value' => '349 Doi Can Street, Ngoc Ha Ward, Hanoi City',
            ),
            array(
                'key' => 'field_fohn_map_phone',
                'label' => 'Phone',
                'name' => 'map_phone',
                'type' => 'text',
                'default_value' => 'T: (+84) 28 3622 2265',
            ),
            array(
                'key' => 'field_fohn_map_embed',
                'label' => 'Map Embed Code',
                'name' => 'map_embed_code',
                'type' => 'textarea',
                'instructions' => 'Paste the Google Maps iframe embed code here.',
            ),

            // TAB: FAQ
            array(
                'key' => 'tab_fohn_faq',
                'label' => 'FAQ Section',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ),
            array(
                'key' => 'field_fohn_faq_sub_heading',
                'label' => 'Sub Heading',
                'name' => 'faq_sub_heading',
                'type' => 'text',
                'default_value' => 'EXPLORE THIS AREA',
            ),
            array(
                'key' => 'field_fohn_faq_main_heading',
                'label' => 'Main Heading',
                'name' => 'faq_main_heading',
                'type' => 'textarea',
                'default_value' => 'FREQUENTLY ASKED QUESTIONS',
            ),
            array(
                'key' => 'field_fohn_faq_items',
                'label' => 'FAQ Items',
                'name' => 'faq_items',
                'type' => 'repeater',
                'layout' => 'row',
                'button_label' => 'Add FAQ',
                'sub_fields' => array(
                    array(
                        'key' => 'field_fohn_faq_q',
                        'label' => 'Question',
                        'name' => 'question',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_fohn_faq_a',
                        'label' => 'Answer',
                        'name' => 'answer',
                        'type' => 'textarea',
                        'new_lines' => 'br',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'templates/template-home.php',
                ),
            ),
        ),
    ));

    /**
     * Room CPT Fields
     */
    acf_add_local_field_group(array(
        'key' => 'group_fohn_room_details',
        'title' => 'Room Details',
        'fields' => array(
            array(
                'key' => 'field_fohn_room_gallery',
                'label' => 'Gallery',
                'name' => 'room_gallery',
                'type' => 'gallery',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_fohn_room_desc',
                'label' => 'Room Description',
                'name' => 'room_description',
                'type' => 'textarea',
            ),
            array(
                'key' => 'field_fohn_room_size',
                'label' => 'Room Size (m²)',
                'name' => 'room_size',
                'type' => 'text',
                'placeholder' => '37.4 - 47.6 m²',
            ),
            array(
                'key' => 'field_fohn_room_occupancy',
                'label' => 'Occupancy',
                'name' => 'room_occupancy',
                'type' => 'text',
                'placeholder' => '2 Adults & 1 Child',
            ),
            array(
                'key' => 'field_fohn_room_view',
                'label' => 'View',
                'name' => 'room_view',
                'type' => 'text',
                'placeholder' => 'City View',
            ),
            array(
                'key' => 'field_fohn_room_bed',
                'label' => 'Bed Type',
                'name' => 'room_bed',
                'type' => 'text',
                'placeholder' => '1 King or 2 Twins',
            ),
            array(
                'key' => 'field_fohn_room_balcony',
                'label' => 'Balcony Size (m²)',
                'name' => 'room_balcony',
                'type' => 'text',
                'placeholder' => '1.5 - 9 m²',
            ),
            array(
                'key' => 'field_fohn_room_book_link',
                'label' => 'Booking Link',
                'name' => 'room_book_link',
                'type' => 'url',
                'default_value' => '#',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'room',
                ),
            ),
        ),
    ));

    /**
     * Footer Settings (Options Page)
     */
    acf_add_local_field_group(array(
        'key' => 'group_fohn_footer_settings',
        'title' => 'Footer Settings',
        'fields' => array(
            array(
                'key' => 'field_fohn_footer_loyalty_tab',
                'label' => 'Loyalty Bar (Top)',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_fohn_footer_loyalty_title',
                'label' => 'Loyalty Title',
                'name' => 'footer_loyalty_title',
                'type' => 'text',
                'default_value' => 'fusionlife',
            ),
            array(
                'key' => 'field_fohn_footer_loyalty_logo',
                'label' => 'Loyalty Logo',
                'name' => 'footer_loyalty_logo',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_fohn_footer_loyalty_desc',
                'label' => 'Loyalty Description',
                'name' => 'footer_loyalty_desc',
                'type' => 'textarea',
                'default_value' => 'Join our loyalty program and book direct to take advantage of all our rewards and benefits.',
            ),
            array(
                'key' => 'field_fohn_footer_loyalty_btn_text',
                'label' => 'Button Text',
                'name' => 'footer_loyalty_btn_text',
                'type' => 'text',
                'default_value' => 'Join Now',
            ),
            array(
                'key' => 'field_fohn_footer_loyalty_btn_link',
                'label' => 'Button Link',
                'name' => 'footer_loyalty_btn_link',
                'type' => 'url',
            ),
            array(
                'key' => 'field_fohn_footer_info_tab',
                'label' => 'Contact Info',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_fohn_footer_logo',
                'label' => 'Footer Logo',
                'name' => 'footer_logo',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_fohn_footer_desc',
                'label' => 'Footer Description',
                'name' => 'footer_description',
                'type' => 'textarea',
                'default_value' => 'LÈGACY - A FUSION ORIGINAL HA NOI',
            ),
            array(
                'key' => 'field_fohn_footer_address',
                'label' => 'Address',
                'name' => 'footer_address',
                'type' => 'text',
                'default_value' => '345 Doi Can, Ngoc Ha Ward, Ba Dinh, Hanoi City',
            ),
            array(
                'key' => 'field_fohn_footer_phone',
                'label' => 'Phone Number',
                'name' => 'footer_phone',
                'type' => 'text',
            ),
            array(
                'key' => 'field_fohn_footer_email',
                'label' => 'Email Address',
                'name' => 'footer_email',
                'type' => 'email',
            ),
            array(
                'key' => 'field_fohn_footer_socials',
                'label' => 'Social Links',
                'name' => 'footer_socials',
                'type' => 'repeater',
                'layout' => 'table',
                'button_label' => 'Add Social Link',
                'sub_fields' => array(
                    array(
                        'key' => 'field_fohn_social_platform',
                        'label' => 'Platform',
                        'name' => 'platform',
                        'type' => 'select',
                        'choices' => array(
                            'facebook' => 'Facebook',
                            'instagram' => 'Instagram',
                            'twitter' => 'Twitter/X',
                            'linkedin' => 'LinkedIn',
                            'youtube' => 'YouTube',
                        ),
                    ),
                    array(
                        'key' => 'field_fohn_social_link',
                        'label' => 'URL',
                        'name' => 'url',
                        'type' => 'url',
                    ),
                ),
            ),
            array(
                'key' => 'field_fohn_footer_copyright',
                'label' => 'Copyright Text',
                'name' => 'footer_copyright',
                'type' => 'text',
                'default_value' => '© 2026 LÈGACY. All rights reserved.',
            ),
            array(
                'key' => 'field_fohn_footer_brands_tab',
                'label' => 'Brand Logos',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_fohn_footer_brand_logos',
                'label' => 'Brand Logos Gallery',
                'name' => 'footer_brand_logos',
                'type' => 'gallery',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_fohn_footer_bottom_nav_tab',
                'label' => 'Bottom Navigation',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_fohn_footer_bottom_nav',
                'label' => 'Bottom Navigation Links',
                'name' => 'footer_bottom_nav',
                'type' => 'repeater',
                'layout' => 'table',
                'button_label' => 'Add Link',
                'sub_fields' => array(
                    array(
                        'key' => 'field_fohn_footer_nav_label',
                        'label' => 'Label',
                        'name' => 'label',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_fohn_footer_nav_url',
                        'label' => 'URL',
                        'name' => 'url',
                        'type' => 'url',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'footer-settings',
                ),
            ),
        ),
    ));

    /**
     * Hero Banner Layout Settings (For Pages)
     */
    acf_add_local_field_group(array(
        'key' => 'group_fohn_hero_layout',
        'title' => 'Hero Banner Settings',
        'fields' => array(
            array(
                'key' => 'field_fohn_hero_height',
                'label' => 'Banner Height',
                'name' => 'hero_height_type',
                'type' => 'radio',
                'choices' => array(
                    'full' => 'Full Screen (h-screen)',
                    'fixed' => 'Fixed Height (600px)',
                ),
                'default_value' => 'full',
                'layout' => 'horizontal',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ),
            ),
        ),
        'position' => 'side',
    ));

    /**
     * Features Page Settings
     */
    acf_add_local_field_group(array(
        'key' => 'group_fohn_features_settings',
        'title' => 'Features Page Settings',
        'fields' => array(
            // TAB: INTRO
            array(
                'key' => 'field_fohn_features_tab_intro',
                'label' => 'Intro Section',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_fohn_features_intro_title',
                'label' => 'Intro Title',
                'name' => 'features_intro_title',
                'type' => 'text',
                'default_value' => 'FEATURES',
            ),
            array(
                'key' => 'field_fohn_features_intro_subtitle',
                'label' => 'Intro Subtitle',
                'name' => 'features_intro_subtitle',
                'type' => 'text',
            ),
            array(
                'key' => 'field_fohn_features_intro_desc',
                'label' => 'Intro Description',
                'name' => 'features_intro_desc',
                'type' => 'textarea',
            ),
            array(
                'key' => 'field_fohn_features_flower_left',
                'label' => 'Left Flower Image',
                'name' => 'features_flower_left',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_fohn_features_flower_right',
                'label' => 'Right Flower Image',
                'name' => 'features_flower_right',
                'type' => 'image',
                'return_format' => 'url',
            ),

            // TAB: FEATURES LIST
            array(
                'key' => 'field_fohn_features_tab_list',
                'label' => 'Features List',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_fohn_features_list',
                'label' => 'Features (Alternating Layout)',
                'name' => 'features_list',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Add Feature',
                'sub_fields' => array(
                    array(
                        'key' => 'field_fohn_feature_title',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_fohn_feature_desc',
                        'label' => 'Description',
                        'name' => 'description',
                        'type' => 'textarea',
                    ),
                    array(
                        'key' => 'field_fohn_feature_image',
                        'label' => 'Image',
                        'name' => 'image',
                        'type' => 'image',
                        'return_format' => 'url',
                    ),
                    array(
                        'key' => 'field_fohn_feature_link',
                        'label' => 'Learn More Link (Optional)',
                        'name' => 'link',
                        'type' => 'url',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'templates/template-features.php',
                ),
            ),
        ),
    ));

    /**
     * Offers Page Settings
     */
    acf_add_local_field_group(array(
        'key' => 'group_fohn_offers_settings',
        'title' => 'Offers Page Settings',
        'fields' => array(
            array(
                'key' => 'field_fohn_offers_intro_title',
                'label' => 'Intro Title',
                'name' => 'offers_intro_title',
                'type' => 'text',
                'default_value' => 'EXCLUSIVE OFFERS',
            ),
            array(
                'key' => 'field_fohn_offers_intro_subtitle',
                'label' => 'Intro Subtitle',
                'name' => 'offers_intro_subtitle',
                'type' => 'text',
            ),
            array(
                'key' => 'field_fohn_offers_intro_desc',
                'label' => 'Intro Description',
                'name' => 'offers_intro_desc',
                'type' => 'textarea',
            ),
            array(
                'key' => 'field_fohn_offers_flower_left',
                'label' => 'Left Flower Image',
                'name' => 'offers_flower_left',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_fohn_offers_flower_right',
                'label' => 'Right Flower Image',
                'name' => 'offers_flower_right',
                'type' => 'image',
                'return_format' => 'url',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'templates/template-offers.php',
                ),
            ),
        ),
    ));

    /**
     * Offer Single Post Settings
     */
    acf_add_local_field_group(array(
        'key' => 'group_fohn_offer_post_settings',
        'title' => 'Offer Details',
        'fields' => array(
            array(
                'key' => 'field_fohn_offer_book_link',
                'label' => 'Book Now Link',
                'name' => 'offer_book_link',
                'type' => 'url',
            ),
            array(
                'key' => 'field_fohn_offer_benefits',
                'label' => 'Benefits',
                'name' => 'offer_benefits',
                'type' => 'repeater',
                'layout' => 'table',
                'button_label' => 'Add Benefit',
                'sub_fields' => array(
                    array(
                        'key' => 'field_fohn_benefit_text',
                        'label' => 'Benefit Text',
                        'name' => 'benefit_text',
                        'type' => 'text',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'offer',
                ),
            ),
        ),
    ));

    /**
     * Apartment Page Settings
     */
    acf_add_local_field_group(array(
        'key' => 'group_fohn_apartment_settings',
        'title' => 'Apartment Settings',
        'fields' => array(
            array(
                'key' => 'field_fohn_apartment_list',
                'label' => 'Apartments List',
                'name' => 'apartment_list',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Add Apartment',
                'sub_fields' => array(
                    array(
                        'key' => 'field_fohn_apt_title',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_fohn_apt_gallery',
                        'label' => 'Gallery',
                        'name' => 'gallery',
                        'type' => 'gallery',
                        'return_format' => 'url',
                    ),
                    array(
                        'key' => 'field_fohn_apt_description',
                        'label' => 'Description',
                        'name' => 'description',
                        'type' => 'textarea',
                    ),
                    array(
                        'key' => 'field_fohn_apt_size',
                        'label' => 'Size',
                        'name' => 'size',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_fohn_apt_occupancy',
                        'label' => 'Occupancy',
                        'name' => 'occupancy',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_fohn_apt_view',
                        'label' => 'View',
                        'name' => 'view',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_fohn_apt_bed',
                        'label' => 'Bed Type',
                        'name' => 'bed',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_fohn_apt_balcony',
                        'label' => 'Balcony',
                        'name' => 'balcony',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_fohn_apt_book_link',
                        'label' => 'Book Link',
                        'name' => 'book_link',
                        'type' => 'url',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'templates/template-apartment.php',
                ),
            ),
        ),
    ));

    /**
     * Gallery Page Settings
     */
    acf_add_local_field_group(array(
        'key' => 'group_fohn_gallery_settings',
        'title' => 'Gallery Settings',
        'fields' => array(
            array(
                'key' => 'field_fohn_gallery_intro_title',
                'label' => 'Intro Title',
                'name' => 'gallery_intro_title',
                'type' => 'text',
                'default_value' => 'Gallery',
            ),
            array(
                'key' => 'field_fohn_gallery_intro_subtitle',
                'label' => 'Intro Subtitle',
                'name' => 'gallery_intro_subtitle',
                'type' => 'text',
                'default_value' => 'A living canvas of heritage & originality',
            ),
            array(
                'key' => 'field_fohn_gallery_intro_desc',
                'label' => 'Intro Description',
                'name' => 'gallery_intro_desc',
                'type' => 'textarea',
            ),
            array(
                'key' => 'field_fohn_gallery_flower_left',
                'label' => 'Left Flower Image',
                'name' => 'gallery_flower_left',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_fohn_gallery_flower_right',
                'label' => 'Right Flower Image',
                'name' => 'gallery_flower_right',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_fohn_gallery_items',
                'label' => 'Gallery Items',
                'name' => 'gallery_items',
                'type' => 'repeater',
                'layout' => 'table',
                'button_label' => 'Add Image',
                'sub_fields' => array(
                    array(
                        'key' => 'field_fohn_gallery_item_image',
                        'label' => 'Image',
                        'name' => 'image',
                        'type' => 'image',
                        'return_format' => 'url',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_fohn_gallery_item_category',
                        'label' => 'Category',
                        'name' => 'category',
                        'type' => 'select',
                        'choices' => array(
                            'rooms' => 'Rooms',
                            'dining' => 'Dining',
                            'spa' => 'Spa',
                            'facilities' => 'Facilities',
                            'others' => 'Others',
                        ),
                        'required' => 1,
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'templates/template-gallery.php',
                ),
            ),
        ),
    ));

    /**
     * Contact Page Settings
     */
    acf_add_local_field_group(array(
        'key' => 'group_fohn_contact_settings',
        'title' => 'Contact Page Settings',
        'fields' => array(
            array(
                'key' => 'field_fohn_contact_map_bg',
                'label' => 'Map Background Illustration',
                'name' => 'contact_map_background',
                'type' => 'image',
                'return_format' => 'url',
                'instructions' => 'The illustrative map shown in the background.',
            ),
            array(
                'key' => 'field_fohn_contact_intro',
                'label' => 'Contact Intro Text',
                'name' => 'contact_intro',
                'type' => 'textarea',
                'rows' => 3,
            ),
            array(
                'key' => 'field_fohn_contact_form_shortcode',
                'label' => 'Contact Form 7 Shortcode',
                'name' => 'contact_form_shortcode',
                'type' => 'text',
                'placeholder' => '[contact-form-7 id="..."]',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'templates/template-contact.php',
                ),
            ),
        ),
    ));
}
