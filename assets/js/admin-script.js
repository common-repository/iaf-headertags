(function($) {
    $("#iaf-headertags-form").on( 'submit', function(e) {
        e.preventDefault();

        var form            = {
            action:         'iaf_headertags_save_options',
            description:    $("#iaf-headertags-description").val(),
            keywords:       $("#iaf-headertags-keywords").val(),
            post_tags:      $("input[name=iaf-headertags-posts]:checked").val()
        }

        $.post( iaf_headertags_obj.ajax_url, form, function( data ) {
            alert( data.message );
        });
    });
})(jQuery);