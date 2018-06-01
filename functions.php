<?php
/*
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework.php';

// Loads options.php from child or parent theme
$optionsfile = locate_template( 'options.php' );
load_template( $optionsfile );

/*
 * This is an example of how to add custom scripts to the options panel.
 * This one shows/hides the an option when a checkbox is clicked.
 *
 * You can delete it if you not using that option
 */
add_action( 'optionsframework_custom_scripts', 'optionsframework_custom_scripts' );

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery('#example_showhidden').click(function() {
        jQuery('#section-example_text_hidden').fadeToggle(400);
    });
    if (jQuery('#example_showhidden:checked').val() !== undefined) {
        jQuery('#section-example_text_hidden').show();
    }
});
</script>
<?php
}

add_action('admin_menu', 'add_options_menu');
function add_options_menu() {
    add_menu_page('Site Settings', 'Site Settings', 'edit_posts', 'options-framework','','',61);
}


add_action('after_setup_theme','foodie_theme_init');
function foodie_theme_init(){
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    

    if (function_exists(register_nav_menus)){
 		register_nav_menus(array('primary' => __( 'Main Menu', 'Foodee' ),
'secondary' => __( 'Main Menu 2', 'Foodee' )));
 	}

 	function read_more($word){
 		$blog_content = explode(" ", get_the_content());

 		$word_limit = array_slice($blog_content, 0, $word);

 		echo implode(" ", $word_limit);
 	}

    
    
}




function css_js(){
	wp_enqueue_style( 'animate', get_template_directory_uri().'/css/animate.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'icomoon', get_template_directory_uri().'/css/icomoon.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'simple-line-icons', get_template_directory_uri().'/css/simple-line-icons.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'bootstrap-datetimepicker', get_template_directory_uri().'/css/bootstrap-datetimepicker.min.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'flexslider', get_template_directory_uri().'/css/flexslider.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'style', get_template_directory_uri().'/css/style.css', array(), '1.0', 'all' );
	wp_enqueue_script( 'jquery', get_template_directory_uri().'/js/jquery.min.js', array(), '1.0', true );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr-2.6.2.min.js', array ( 'jquery' ), 1.5, false);
	wp_enqueue_script( 'easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array ( 'jquery' ), 1.5, true);
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array ( 'jquery' ), 1.5, true);
	wp_enqueue_script( 'moment', get_template_directory_uri() . '/js/moment.js', array ( 'jquery' ), 1.5, true);
	wp_enqueue_script( 'bootstrap-datetimepicker', get_template_directory_uri() . '/js/bootstrap-datetimepicker.min.js', array ( 'jquery' ), 1.5, true);
	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/js/jquery.waypoints.min.js', array ( 'jquery' ), 1.5, true);
	wp_enqueue_script( 'steller', get_template_directory_uri() . '/js/jquery.stellar.min.js', array ( 'jquery' ), 1.5, true);
	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array ( 'jquery' ), 1.5, true);
	wp_add_inline_script( 'bootstrap-datetimepicker', 'var $ =jQuery.noConflict();$(function () {
	       $("#date").datetimepicker();
	   })' );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array ( 'jquery' ), 1.5, true);


}
add_action('wp_enqueue_scripts','css_js');

/* Show or Hide admin bar */
add_filter('show_admin_bar', '__return_false');

/* add javascript attribute in anchor tag */
add_filter( 'nav_menu_link_attributes', 'wp_single_page_menu', 10, 3 );
function wp_single_page_menu( $atts, $item, $args )
{
  $atts['data-nav-section'] = $item->title;
    return $atts;
}

/*
add_filter('wp_nav_menu_items','add_custom_in_menu', 10, 2);

// add in Logo in the middle of the menu
//
function add_custom_in_menu( $items, $args )
{
    if( $args->theme_location == 'primary' )
    {
        //$new_item       = array( '<li class="menu-logo"><a href="/"><img src="' . get_template_directory_uri() . '/assets/img/logo.png" alt=""></a></li>' );
        $new_item       = array( '<li class="fh5co-logo"><a href="/">Foodee</a></li>' );
        $items          = preg_replace( '/<\/li>\s<li/', '</li>,<li',  $items );

        $array_items    = explode( ',', $items );
        array_splice( $array_items, 2, 0, $new_item ); // splice in at position 3
        $items          = implode( '', $array_items );
    }
    return $items;
}
*/

require_once  'cuztom/cuztom.php' ;

add_action( 'init', 'content_types' );
function content_types()
{
    $test = register_cuztom_post_type( array('Testimonial','Testimonial'), array(
        'supports' => array( 'title' ,'editor' ),
        'menu_icon' => 'dashicons-format-chat',
        'menu_position' => 4
    ));
    $test->add_meta_box(
        'detail',
        'Basic',
        array(
            
            array(
                'name'          => 'Philosophist',
                'label'         => 'Philosophist Name',
                'description'   => 'Limit to two/three words',
                'type'          => 'text'
            )
        ),
        'normal',
        'high'
    );   
    

    $slider = new Cuztom_Post_Type( array('Slider','Sliders'), array(
        'supports' => array( 'title' ,'thumbnail' ),
        'menu_icon' => 'dashicons-images-alt2',
        'menu_position' => 5
    ));


    $foods = new Cuztom_Post_Type( array('Food Section','Food Section'), array(
        'supports' => array( 'title' ,'editor','thumbnail' ),
        'labels' => array('add_new' => 'Add Food' , 'add_new_item' => 'Add new Food','search_items' => 'Search Food Section'),
        'menu_icon' => 'dashicons-screenoptions',
        'menu_position' => 6
    ));
    $foods->add_meta_box(
        'detail',
        'Basic',
        array(
            
            array(
                'name'          => 'Price',
                'label'         => 'Price Tag',
                'description'   => 'formatting in regular style',
                'type'          => 'text'
            )
        ),
        'normal',
        'high'
    );  
      


    $features = new Cuztom_Post_Type( array('Feature','Features'), array(
        'supports' => array( 'title' ,'thumbnail','editor' ),
        'menu_icon' => 'dashicons-awards',
        'menu_position' => 7
    ));



    $box = new Cuztom_Meta_Box(
    'detail', 
    'Basic',
    array(
        'post'
    ),
    array(
        array(
            'name'    => 'Date',
            'label' => 'Event Date',
            'type'  => 'date',
            'args'  => array(
            'date_format' => 'm/d/y'
        )
        )
    )
);
    
}



add_action( 'init', 'add_category' );
function add_category() {
	register_taxonomy_for_object_type( 'category', 'food_section' );
}



require 'inc/attachements.php';



add_action( 'admin_menu', 'foodee_change_post_label' );
add_action( 'init', 'foodee_change_post_object' );
function foodee_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Events';
    $submenu['edit.php'][5][0] = 'Events';
    $submenu['edit.php'][10][0] = 'Add Events';
    $submenu['edit.php'][16][0] = 'Events Tags';
}
function foodee_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Events';
    $labels->singular_name = 'Events';
    $labels->add_new = 'Add Events';
    $labels->add_new_item = 'Add Events';
    $labels->edit_item = 'Edit Events';
    $labels->new_item = 'Events';
    $labels->view_item = 'View Events';
    $labels->search_items = 'Search Events';
    $labels->not_found = 'No Events found';
    $labels->not_found_in_trash = 'No Events found in Trash';
    $labels->all_items = 'All Events';
    $labels->menu_name = 'Events';
    $labels->name_admin_bar = 'Events';
}
 


add_action('admin_init', 'change_permissions');
function change_permissions() {
        // for the client
        $editor = get_role('editor');
        
        $caps_remove = array(
        'moderate_comments',
        'manage_categories',
        'manage_links',
        'delete_others_pages',
        'delete_others_posts',
        'edit_others_posts',
        'edit_others_pages',
    );

    foreach ( $caps_remove as $cap_remove ) {
    
        // Remove the capability.
        $editor->remove_cap( $cap_remove );
    }

    $caps_add = array(

     'edit_theme_options',
     'manage_options',

    );

    foreach ($caps_add as $cap_add) {
     // Add the capability.
     $editor -> add_cap($cap_add);
    }

}

if ( !current_user_can('administrator') ) {
    add_action('admin_menu', 'remove_menus');
}

function remove_menus() {
global $menu;
global $submenu;
    $restricted = array(__('Dashboard'), __('Appearance'), __('Settings'), __('Tools'), __('Toolset'),__('Links'));
    foreach($menu as $k => $m){
        if(isset($m[0]) && in_array($m[0], $restricted)){
          unset($menu[$k]);
        }
    }       
    unset($submenu['upload.php'][11]);
}

add_filter( 'get_sample_permalink_html', 'hide_permalink' );
function hide_permalink() {
    return '';
}



















?>