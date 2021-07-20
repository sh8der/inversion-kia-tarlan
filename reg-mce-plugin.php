<?php
add_action( 'admin_head', function() {
    global $typenow;

    if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
        return;
    }

    if ( user_can_richedit() ) {

        add_filter( 'mce_buttons', function( $buttons ) {
            $buttons[] = 'flatsome_slider_outside_toggler'; 
            return $buttons;
        } );

        add_filter( 'mce_external_plugins', function( $plugin_array ) {

            $plugin_array[ 'flatsome_slider_outside_toggler__plugin' ] = get_template_directory_uri() . '-child/sh8der/add-slider-toggler-button.js?v8';
            return $plugin_array;
        } );
    }
} );