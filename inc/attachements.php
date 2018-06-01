<?php

add_filter( 'attachments_default_instance', '__return_false' ); //disabled attachments in posts/pages

add_action( 'attachments_register', 'custom_attachments' );
function custom_attachments( $attachments ) {
    $fields         = array(
        array(
            'name' => 'slider_text_position',
            'type' => 'select',
            'label' => 'Text Position',
            'meta' => array(
                'options' => array(
                    'center' => 'Center',
                    'left' => 'Left',
                    'right' => 'Right'
                )
            ),
        ),
        array(
            'name' => 'title', // unique field name
            'type' => 'text', // registered field type
            'label' => __('Title', 'attachments'), // label to display
            'default' => 'title', // default value upon selection
        ),
        array(
            'name' => 'title_color', // unique field name
            'type' => 'text', // registered field type
            'label' => 'Title color Hex (example: #ffffff)',
            'default' => '', 
        ),
        array(
            'name' => 'title_color_bg', // unique field name
            'type' => 'text', // registered field type
            'label' => 'Title background-color hex or rgba for transparency (example: rgba(217, 237, 247, 0.50) or #999)',
            'default' => '', 
        ),
        array(
            'name' => 'caption', // unique field name
            'type' => 'textarea', // registered field type
            'label' => __('Caption', 'attachments'), // label to display
            'default' => 'caption', // default value upon selection
        ),
        array(
            'name' => 'caption_color', // unique field name
            'type' => 'text', // registered field type
            'label' => 'Caption color Hex (example: #999999)',
            'default' => '', 
        ),
        array(
            'name' => 'caption_color_bg', // unique field name
            'type' => 'text', // registered field type
            'label' => 'Caption background-color hex or rgba for transparency (example: rgba(252, 248, 227, 0.90) or #fcf8e3)',
            'default' => '', 
        )        
    );
    $args = array(
        // title of the meta box (string)
        'label' => 'Slides',
        // all post types to utilize (string|array)
        'post_type' => array('slider'),
        // meta box position (string) (normal, side or advanced)
        'position' => 'normal',
        // meta box priority (string) (high, default, low, core)
        'priority' => 'high',
        // allowed file type(s) (array) (image|video|text|audio|application)
        'filetype' => array('image'), // no filetype limit
        // include a note within the meta box (string)
        'note' => 'Images should be 1920x1280 for best fit',
        // by default new Attachments will be appended to the list
        // but you can have then prepend if you set this to false
        'append' => true,
        // text for 'Attach' button in meta box (string)
        'button_text' => 'Add',
        // text for modal 'Attach' button (string)
        'modal_text' => 'Add',
        // which tab should be the default in the modal (string) (browse|upload)
        'router' => 'browse',
        // whether Attachments should set 'Uploaded to' (if not already set)
        'post_parent' => false,
        // fields array
        'fields' => $fields,
    );
    $attachments->register('slider_attachments', $args); // unique instance name


    $fields = array(
        array(
            'name' => 'title', // unique field name
            'type' => 'text', // registered field type
            'label' => 'Title', // label to display
            'default' => 'title', // default value upon selection
        ),
        array(
            'name' => 'desc', // unique field name
            'type' => 'wysiwyg', // registered field type
            'label' => 'Description', // label to display
            'default' => 'description', // default value upon selection
        )
    );
    $args = array(
        'label' => 'Food Section Images',
        'post_type' => array('food_section'),
        'position' => 'normal',
        'priority' => 'high',
        'filetype' => array('image'), // no filetype limit
        'note' => '',
        'append' => true,
        'button_text' => 'Add Images',
        'modal_text' => 'Add',
        'router' => 'browse',
        'post_parent' => false,
        'fields' => $fields,
    );
    $attachments->register('food_section_attachments', $args); // unique instance name     
  
}