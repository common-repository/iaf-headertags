<?php
function iaf_headertags_header() {
    global $post;

    // Get options
    $iaf_headertags_opts                = get_option( 'iaf-headertags-opts' );

    // Get article meta-tag
    $iaf_headertags_meta_description    = get_post_meta( $post->ID, '_iaf_headertags_description', true );
    $iaf_headertags_meta_keywords       = get_post_meta( $post->ID, '_iaf_headertags_keywords', true );

    // if archives or homepage, exit
    if( is_archive() or is_home() ) {
        return;
    }

    // If article is a post and manual mode is activated
    if( 'post' == get_post_type() && $iaf_headertags_opts['post_tags'] == 'auto' ) {
        $tags                           = get_the_tags();
        $cats                           = get_the_category();

        var_dump( $cats );

        $iaf_headertags_meta_description = get_the_excerpt();
        $iaf_headertags_meta_keywords    = '';

        // Article has no tags
        if( !$tags ) {
            foreach( $cats as $cat ) {
                $iaf_headertags_meta_keywords   .= $cat->name . ', ';
            }
        } else {
            foreach( $tags as $tag ) {
                $iaf_headertags_meta_keywords   .= $tag->name . ', ';
            }
        }

        $iaf_headertags_meta_keywords    = trim( $iaf_headertags_meta_keywords, ', ' );
    }

    $iaf_headertags_description      = empty( $iaf_headertags_meta_description ) ? $iaf_headertags_opts['description'] : $iaf_headertags_meta_description;
    $iaf_headertags_keywords         = empty( $iaf_headertags_meta_keywords ) ? $iaf_headertags_opts['keywords'] : $iaf_headertags_meta_keywords;
    
    // Insert tags in header
    echo '
    <meta name="description" content="' . $iaf_headertags_description . '">
    <meta name="keywords" content="' . $iaf_headertags_keywords . '">';
}
