<?php
function iaf_headertags_admin_enqueue() {
    $uri                = plugin_dir_url( HEADERTAGS_PLUGIN_URL );
    $ver                = HEADERTAGS_DEV_MODE ? time() : null;

    // Enqueue admin CSS
    wp_register_style( 'iaf-headertags-admin-style', $uri . 'assets/css/admin-style.css', [], $ver );
    wp_enqueue_style( 'iaf-headertags-admin-style' );

    wp_register_script( 'iaf-headertags-admin-script', $uri . 'assets/js/admin-script.js', [ 'jquery' ], $ver, true );

    wp_localize_script( 'iaf-headertags-admin-script', 'iaf_headertags_obj', [
        'ajax_url'      => admin_url( 'admin-ajax.php' )
    ]);
    
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'iaf-headertags-admin-script' );
}