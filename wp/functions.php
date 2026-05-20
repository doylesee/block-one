<?php

/* Set the content width based on the theme's design and stylesheet. */
if ( ! isset( $content_width ) )
	$content_width = 1120;

/* Tell WordPress to run atheme_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'atheme_setup' );

if ( ! function_exists( 'atheme_setup' ) ):
function atheme_setup() {
	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();
	// This theme uses post thumbnails
	// IMP: ADD/REMOVE more image size as required BEFORE starting implementation.
	add_theme_support( 'post-thumbnails' );
	add_image_size('banner_list_item_image',1366,868,true);
	add_image_size('student_apartments_item_logo',220,205,false);
	add_image_size('footer_social_media_item_logo',28,28,false);

	// This theme uses wp_nav_menu() in two location.
	// IMP: ADD/REMOVE more nav if needed.
	register_nav_menus( array(
		//'header-menu' => __( 'Header Menu', 'atheme' ),
		//'footer-menu' => __( 'Footer Menu', 'atheme' ),
	) );
}
endif;

/*CUSTOM POST TYPES*/
// Set priority to avoid plugin conflicts
/* Custom Post Types */
add_action("init", "register_rc", 1);
if ( !function_exists( 'register_rc' ) ) {
	function register_rc() {
		global $ds_custom_post_types;
		$a_types = array(
		/* Declare Banner Custom Post Type ( Use this as the template for declaration )
		 * @optoinal slug
		 * @optional supports */
			array(
			  'the_type'	=> 'global-fields',
			  'single'		=> 'Global Field',
			  'plural'		=> 'Global Fields'
			),
			
			array(
			  'the_type'	=> 'banner-items',
			  'single'		=> 'Banner Item',
			  'plural'		=> 'Banner Items'
			),
			
			array(
			  'the_type'	=> 'student-apartments',
			  'single'		=> 'Student Apartment',
			  'plural'		=> 'Student Apartments'
			),
			
			array(
			  'the_type'	=> 'social-media',
			  'single'		=> 'Social Media',
			  'plural'		=> 'Social Media'
			)
		);
		foreach ($a_types as $a_type) {
			// This will merge the defaults and the passed data
			$a_type = wp_parse_args($a_type, array(
				'the_type'		=> '',
				'single'		=> '',
				'plural'		=> '',
				'slug'			=> '',
				'supports'		=> array('title','editor','thumbnail','page-attributes'),
				'has_archive'	=> false
			));
			$a_labels = array(
				 'name'      			=> _x($a_type['plural'], 'post type general name'),
				 'singular_name'		=> _x($a_type['single'], 'post type singular name'),
				 'add_new'				=> _x('Add New', $a_type['single']),
				 'add_new_item'			=> __('Add New ' . $a_type['single']),
				 'edit_item'			=> __('Edit ' . $a_type['single']),
				 'new_item'				=> __('New ' . $a_type['single']),
				 'view_item'			=> __('View ' . $a_type['single']),
				 'search_items'			=> __('Search ' . $a_type['plural']),
				 'not_found'			=> __('No ' . $a_type['plural'] . ' found'),
				 'not_found_in_trash'	=> __('No ' . $a_type['plural'] . ' found in Trash')
			);
			$a_rewrite = array(
				 'slug'			=> $a_type['slug'],
				 'with_front'	=> true,
				 'pages'		=> true,
				 'feeds'		=> true
			);
			$a_args = array(
				 'labels'		=> $a_labels,
				 'public'		=> true,
				 'has_archive'	=> $a_type['has_archive'],
				 'rewrite'		=> $a_rewrite,
				 'supports'		=> $a_type['supports']
			);
			register_post_type($a_type['the_type'], $a_args);
			$ds_custom_post_types[] = $a_type['the_type'];
		}
	}
}

//Adding jQuery from Google and load any additional script the correct way
function jquery_init() {
	if (!is_admin()) {//load scripts for non admin pages
		//deregister current jquery
		wp_deregister_script('jquery');
		//load jquery from google api, and place in footer
		wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js', false, '1.7.2',false);
		wp_enqueue_script('jquery');
		// load a additional js files
	}elseif (is_admin()){
		//load scripts for admin page
	}
}
add_action('init', 'jquery_init');

?>