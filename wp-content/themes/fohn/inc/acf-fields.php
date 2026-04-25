<?php
/**
 * Register ACF Fields Programmatically
 */

if( function_exists('acf_add_local_field_group') ):

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
				'value' => 'template-home.php',
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
			'key' => 'field_fohn_room_size',
			'label' => 'Room Size',
			'name' => 'room_size',
			'type' => 'text',
			'placeholder' => '290 square feet / 27 square metres',
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

endif;
