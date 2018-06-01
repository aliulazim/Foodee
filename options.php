<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'options-framework-theme';
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'theme-textdomain'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	$options = array();

	$options[] = array(
		'name' => __( 'Page', 'theme-textdomain' ),
		'type' => 'heading'
	);
	$options[] = array(
		'name' => __( 'Page Title', 'theme-textdomain' ),
		'desc' => __( 'Shows up on tab and google search result', 'theme-textdomain' ),
		'id' => 'page_title',
		'std' => 'Foodee - The Best Restaurent in Town',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Page Description', 'theme-textdomain' ),
		'desc' => __( 'Shows up on 2nd line in google search result', 'theme-textdomain' ),
		'id' => 'page_description',
		'std' => 'Full-service social media marketing content design & management agency in Dhaka Bangladesh',
		'type' => 'editor'
	);
	$options[] = array(
		'name' => __( 'Favicon', 'theme-textdomain' ),
		'desc' => __( 'Icon thats showed in tab and mobile, should be either 16x16 or 32x32', 'theme-textdomain' ),
		'id' => 'image_favicon',
		'type' => 'upload'
	);
	$options[] = array(
		'name' => __( 'Site Logo', 'theme-textdomain' ),
		'desc' => __( 'Site main logo', 'theme-textdomain' ),
		'id' => 'image_logo',
		'type' => 'upload'
	);

	$options[] = array(
		'name' => __( 'Banner Image', 'theme-textdomain' ),
		'desc' => __( 'Banner image', 'theme-textdomain' ),
		'id' => 'banner_img',
		'type' => 'upload'
	);

	$options[] = array(
		'name' => __( 'Logo Title', 'theme-textdomain' ),
		'desc' => __( 'Show title if has no logo', 'theme-textdomain' ),
		'id' => 'logo_title',
		'std' => 'Theory',
		'type' => 'text'
	);
        
	$options[] = array(
		'name' => 'Logo area background',
		'desc' => 'Use white background for logo and menu area',
		'id' => 'use_menu_background',
		'type' => 'checkbox'
	);
        
        
        $options[] = array(
		'name' => __( 'About Us', 'theme-textdomain' ),
		'type' => 'heading'
	);
	/**
	 * For $settings options see:
	 * http://codex.wordpress.org/Function_Reference/wp_editor
	 *
	 * 'media_buttons' are not supported as there is no post to attach items to
	 * 'textarea_name' is set by the 'id' you choose
	 */
	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 25,
		'tinymce' => array( 'plugins' => 'wordpress,wplink' )
	);

	$options[] = array(
		'name' => 'Title',
		'desc' => 'Text added here will show up in the about us section, if empty then the section will not show up',
		'id' => 'about_us',
		'std' => 'About Us',
		'type' => 'text'
	);

	$options[] = array(
		'name' => 'Body',
		'desc' => 'Text added here will show up in the about us section, if empty then the section will not show up',
		'id' => 'text_about_us',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);

	$options[] = array(
		'name' => __( 'About Image', 'theme-textdomain' ),
		'desc' => __( 'About image', 'theme-textdomain' ),
		'id' => 'about_img',
		'type' => 'upload'
	);


	$options[] = array(
		'name' => __( 'Feature Foods', 'theme-textdomain' ),
		'type' => 'heading'
	);
	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 25,
		'tinymce' => array( 'plugins' => 'wordpress,wplink' )
	);

	$options[] = array(
		'name' => 'Title',
		'desc' => 'Text added here will show up in the about us section, if empty then the section will not show up',
		'id' => 'feature_foods',
		'std' => 'Featured Dishes',
		'type' => 'text'
	);

	$options[] = array(
		'name' => 'Body',
		'desc' => 'Text added here will show up in the about us section, if empty then the section will not show up',
		'id' => 'feature_foods_body',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);


	$options[] = array(
		'name' => __( 'Food Menu', 'theme-textdomain' ),
		'type' => 'heading'
	);
	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 25,
		'tinymce' => array( 'plugins' => 'wordpress,wplink' )
	);

	$options[] = array(
		'name' => 'Title',
		'desc' => 'Text added here will show up in the about us section, if empty then the section will not show up',
		'id' => 'food_menu',
		'std' => 'Food Menus',
		'type' => 'text'
	);

	$options[] = array(
		'name' => 'Body',
		'desc' => 'Text added here will show up in the about us section, if empty then the section will not show up',
		'id' => 'food_menu_body',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);



	$options[] = array(
		'name' => __( 'Upcoming Events', 'theme-textdomain' ),
		'type' => 'heading'
	);
	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 25,
		'tinymce' => array( 'plugins' => 'wordpress,wplink' )
	);

	$options[] = array(
		'name' => 'Title',
		'desc' => 'Text added here will show up in the about us section, if empty then the section will not show up',
		'id' => 'upcoming_events',
		'std' => 'Upcoming Events',
		'type' => 'text'
	);

	$options[] = array(
		'name' => 'Body',
		'desc' => 'Text added here will show up in the about us section, if empty then the section will not show up',
		'id' => 'upcoming_events_body',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);


        
        
	$options[] = array(
		'name' => __( 'Contact', 'theme-textdomain' ),
		'type' => 'heading'
	);
//	$options[] = array(
//		'name' => __( 'Admin Email', 'theme-textdomain' ),
//		'desc' => __( 'Form submissions will be emailed to this address, for more than one address use comma', 'theme-textdomain' ),
//		'id' => 'admin_email',
//		'placeholder' => 'email1@example.com, email2@example.com',
//		'type' => 'text'
//	);     

	$options[] = array(
		'name' => 'Title',
		'desc' => 'Text added here will show up in the about us section, if empty then the section will not show up',
		'id' => 'contact',
		'std' => 'Reserve a Table',
		'type' => 'text'
	);

	$options[] = array(
		'name' => 'Body',
		'desc' => 'Text added here will show up in the about us section, if empty then the section will not show up',
		'id' => 'contact_body',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);      
	$options[] = array(
		'name' => 'Address',
		'desc' => '',
		'id' => 'footer_address',
		'placeholder' => '',
		'type' => 'text'
	);           
	$options[] = array(
		'name' => 'Mobile',
		'desc' => '',
		'id' => 'footer_mobile',
		'placeholder' => '',
		'type' => 'text'
	);           
	$options[] = array(
		'name' => 'Email',
		'desc' => '',
		'id' => 'footer_email',
		'placeholder' => '',
		'type' => 'text'
	);    
	$options[] = array(
		'name' => 'Website',
		'desc' => '',
		'id' => 'footer_website',
		'placeholder' => '',
		'type' => 'text'
	);        
     

	$options[] = array(
		'name' => 'Footer Links',
		'type' => 'heading'
	);
	$options[] = array(
		'name' => 'LinkedIn',
		'desc' => 'Can be left empty to remove',
		'id' => 'footer_link_linkedin',
		'placeholder' => '',
		'type' => 'text'
	);        
	$options[] = array(
		'name' => 'Facebook',
		'desc' => 'Can be left empty to remove',
		'id' => 'footer_link_facebook',
		'placeholder' => '',
		'type' => 'text'
	);        
	$options[] = array(
		'name' => 'Youtube',
		'desc' => 'Can be left empty to remove',
		'id' => 'footer_link_youtube',
		'placeholder' => '',
		'type' => 'text'
	);        
	$options[] = array(
		'name' => 'Instagram',
		'desc' => 'Can be left empty to remove',
		'id' => 'footer_link_instagram',
		'placeholder' => '',
		'type' => 'text'
	);        
	$options[] = array(
		'name' => 'Dribble',
		'desc' => 'Can be left empty to remove',
		'id' => 'footer_link_dribble',
		'placeholder' => '',
		'type' => 'text'
	); 
	$options[] = array(
		'name' => 'Pinterest',
		'desc' => 'Can be left empty to remove',
		'id' => 'footer_link_pinterest',
		'placeholder' => '',
		'type' => 'text'
	);
	$options[] = array(
		'name' => 'Twitter',
		'desc' => 'Can be left empty to remove',
		'id' => 'footer_link_twitter',
		'placeholder' => '',
		'type' => 'text'
	);        

	return $options;
}