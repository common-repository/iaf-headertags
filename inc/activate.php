<?php
function iaf_headertags_activate (){
    // Verify WordPress version
    if( version_compare( get_bloginfo( 'version' ), '5.0', '<' ) ){
        wp_die( __( 'You must update your WordPress version before you can use this plugin.', 'headertags' ) );
    }
}

// Add option with default project ID
$iaf_headertags_opts             = get_option( 'iaf-headertags-opts' );

// If option doesn't exist
if( !$iaf_headertags_opts ) {
    // Define default values
    $headertags_opts            = [
        'description'           => get_bloginfo( 'description' ),
        'keywords'              => get_bloginfo( 'name' ),
        'post_tags'             => 'auto'
    ];

    // Create option
    $iaf_headertags_opts        = add_option( 'iaf-headertags-opts', $headertags_opts );
}