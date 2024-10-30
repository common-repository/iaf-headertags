<?php
function iaf_headertags_meta_box(){
    $iaf_headertags_context              = [ 'page' ];
    $iaf_headertags_opts                 = get_option( 'iaf-headertags-opts' );
    
    if( $iaf_headertags_opts['post_tags'] != 'auto' ) {
        // If mode is not auto, add posts to context list
        array_push( $iaf_headertags_context, 'post' );
    }

    add_meta_box( 'iaf-headertags-metas', __( 'Meta Tags', 'headertags' ), 'iaf_headertags_display_meta_box', $iaf_headertags_context, 'advanced' );
}

function iaf_headertags_display_meta_box( $post ) {
    $iaf_headertags_description          = get_post_meta( $post->ID, '_iaf_headertags_description', true );$iaf_headertags_keywords             = get_post_meta( $post->ID, '_iaf_headertags_keywords', true );
    ?>
    <div class="iaf-headertags-box">
        <div class="iaf-headertags-row">
            <div class="iaf-headertags-inner-row">
                <div class="iaf-headertags-col left-col">
                    <div class="iaf-headertags-title">
                        <?php echo esc_html_e( 'Meta Description', 'headertags' ); ?>
                        <span><?php echo esc_html_e( 'Enter the description for your ' ) . get_post_type() ?>.</span>
                    </div>
                </div>
                <div class="iaf-headertags-col right-col">
                    <textarea name="iaf-headertags-description" id="iaf-headertags-description" rows="2"><?php echo esc_attr( $iaf_headertags_description, 'headertags' ); ?></textarea>
                </div>
            </div>
        </div>
        
        <div class="iaf-headertags-row">
            <div class="iaf-headertags-inner-row">
                <div class="iaf-headertags-col left-col">
                    <div class="iaf-headertags-title">
                        <?php echo esc_html_e( 'Meta Keywords', 'headertags' ); ?>
                        <span><?php echo esc_html_e( 'Enter the keywords for your ' ) . get_post_type() ?>.</span>
                    </div>
                </div>
                
                <div class="iaf-headertags-col right-col">
                        <textarea name="iaf-headertags-keywords" id="iaf-headertags-keywords" rows="4"><?php echo esc_attr( $iaf_headertags_keywords ); ?></textarea>         
                </div>
            </div>
        </div>
    <?php
}

function iaf_headertags_save_meta_box( $post_id ) {
    if( isset( $_POST['iaf-headertags-description'] ) ) {
        update_post_meta( $post_id, '_iaf_headertags_description', sanitize_text_field( $_POST['iaf-headertags-description'] ) );
    }

    if( isset( $_POST['iaf-headertags-keywords'] ) ) {
		  update_post_meta( $post_id, '_iaf_headertags_keywords', sanitize_text_field( $_POST['iaf-headertags-keywords'] ) );
    }
}