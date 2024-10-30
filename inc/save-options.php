<?php
function iaf_headertags_save_options() {
    $output     = [ 
        'status'    => 1,
        'message'   => __( 'An unknown error occured', 'headertags' )
    ];

    if( empty( $_POST['description'] ) ) {
        $output['status']       = 1;
        $output['message']      = __( 'You did not provide default description', 'headertags' );

        wp_send_json( $output );
    }

    if( empty( $_POST['keywords'] ) ) {
        $output['status']       = 1;
        $output['message']      = __( 'You did not provide default keywords', 'headertags' );

        wp_send_json( $output );
    }

    $description                = sanitize_textarea_field( $_POST['description'] );
    $keywords                   = sanitize_textarea_field( $_POST['keywords'] );
    $post_tags                  = sanitize_text_field( $_POST['post_tags'] );



    $iaf_headertags_opts               = get_option( 'iaf-headertags-opts' );
    $headertags_opts           = [
        'description'           => $description,
        'keywords'              => $keywords,
        'post_tags'             => $post_tags
    ];

    update_option( 'iaf-headertags-opts', $headertags_opts );

    $output['status']           = 2;
    $output['message']         = __( 'Your options were successfully saved', 'headertags' );

    wp_send_json( $output );
}