<?php
function iaf_headertags_menu() {
    add_menu_page( 
        __( 'Header Tags', 'headertags' ), 
        __( 'Header Tags', 'headertags' ), 
        'manage_options', 
        'iaf-headertags', 
        'iaf_headertags_settings',
        'dashicons-editor-code',
        10
    );
    
    function iaf_headertags_settings() {
        $iaf_headertags_opts      = get_option( 'iaf-headertags-opts' );
        ?>
        <div class="wrap">
            <h1><?php esc_html_e( 'Headertags', 'headertags' ); ?></h1>
            <p><?php esc_html_e( 'Update the information below to configure the desciption and keywords of your platform.', 'headertags' ); ?></p>

            <form id="iaf-headertags-form">
                <div class="iaf-headertags-box">
                    <div class="iaf-headertags-row">
                        <div class="iaf-headertags-inner-row">
                            <div class="iaf-headertags-col left-col">
                                <div class="iaf-headertags-title">
                                    <?php esc_html_e( 'Meta Description', 'headertags' ); ?>
                                    <span><?php esc_html_e( 'Enter the default description for your website. This will be used on pages where the description is not specified.', 'headertags' ) ?></span>
                                </div>
                            </div>
                            <div class="iaf-headertags-col right-col">
                                <textarea name="iaf-headertags-description" id="iaf-headertags-description" rows="3"><?php echo $iaf_headertags_opts['description']; ?></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="iaf-headertags-row">
                        <div class="iaf-headertags-inner-row">
                            <div class="iaf-headertags-col left-col">
                                <div class="iaf-headertags-title">
                                    <?php esc_html_e( 'Meta Keywords', 'headertags' ); ?>
                                    <span><?php esc_html_e( 'Enter the default keywords for your website. This will be used on pages where keywords are not specified.', 'headertags' ) ?></span>
                                </div>
                            </div>
                            
                            <div class="iaf-headertags-col right-col">
                                    <textarea name="iaf-headertags-keywords" id="iaf-headertags-keywords" rows="5"><?php echo $iaf_headertags_opts['keywords']; ?></textarea>         
                            </div>
                        </div>    
                    </div>

                    <div class="iaf-headertags-row">
                        <div class="iaf-headertags-inner-row">
                            <div class="iaf-headertags-col left-col">
                                <div class="iaf-headertags-title">
                                    <?php esc_html_e( 'Posts', 'headertags' ); ?>
                                    <span><?php esc_html_e( 'Manage description and keywords for your posts.', 'headertags' ) ?></span>
                                </div>
                            </div>
                            
                            <div class="iaf-headertags-col right-col">
                                <div class="iaf-headertags-innercol">
                                    <input type="radio" name="iaf-headertags-posts" id="iaf-headertags-posts-auto" <?php checked( $iaf_headertags_opts['post_tags'], 'auto', true ); ?> value="auto" />  <label for="iaf-headertags-posts-auto"><?php esc_html_e( 'Add tags automatically', 'headertags' ); ?></label>
                                    <span class="iaf-headertags-details"><?php esc_html_e( 'Post excerpt will be used as description, while post tags will be used as keywords', 'headertags' ); ?></span>
                                </div>

                                <div class="iaf-headertags-innercol">
                                    <input type="radio" name="iaf-headertags-posts" id="iaf-headertags-posts-manual" <?php checked( $iaf_headertags_opts['post_tags'], 'manual', true ); ?> value="manual" />  <label for="iaf-headertags-posts-manual"><?php esc_html_e( 'Enter tags manually', 'headertags' ); ?></label>
                                    <span class="iaf-headertags-details"><?php esc_html_e( 'You will have to add description and keywords for each post', 'headertags' ); ?></span>
                                </div>

                                <div class="iaf-headertags-innercol">
                                    <input type="radio" name="iaf-headertags-posts" id="iaf-headertags-posts-deactivate" <?php checked( $iaf_headertags_opts['post_tags'], 'deactivate', true ); ?> value="deactivate" />  <label for="iaf-headertags-posts-deactivate"><?php esc_html_e( 'Deactivate header tags', 'headertags' ); ?></label>
                                    <span class="iaf-headertags-details"><?php esc_html_e( 'Header tags will be deactivated for your posts and will not show', 'headertags' ); ?></span>
                                </div>
                            </div>
                        </div>
					</div>
                    <div class="iaf-headertags-row">
                        <div class="iaf-headertags-col iaf-headertags-padding-top">
                            <input type="submit" id="iaf-headertags-submit" value="<?php esc_html_e( 'Update Settings', 'headertags' ); ?>" class="button button-primary" />            
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <?php
    }
}