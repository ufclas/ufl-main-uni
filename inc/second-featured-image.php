<?php 

// Enable support for a second featured image
add_theme_support('post-thumbnails');
add_image_size('second-featured-image', 800, 600, true);

// Register the second featured image meta box
function add_second_featured_image_meta_box() {
    add_meta_box(
        'second_featured_image',
        'Alternate Logo',
        'render_second_featured_image_meta_box',
        array('post', 'page'), // Add 'page' to support pages
        'side',
        'low'
    );
}
add_action('add_meta_boxes', 'add_second_featured_image_meta_box');

// Render the second featured image meta box
function render_second_featured_image_meta_box($post) {
    $second_featured_image = get_post_meta($post->ID, 'second_featured_image', true);
    $custom_text = get_post_meta($post->ID, 'custom_text', true);
    wp_nonce_field('save_second_featured_image', 'second_featured_image_nonce');
    ?>
    <p>
        <label for="second_featured_image"><?php esc_html_e('Select an Alternate Logo:', 'text-domain'); ?></label>
        <br>
        <button type="button" id="upload_second_featured_image_button" class="button"><?php esc_html_e('Upload an Alternate Logo', 'text-domain'); ?></button>
        <button type="button" id="remove_second_featured_image_button" class="button"><?php esc_html_e('Remove Alternate Logo', 'text-domain'); ?></button>
        <br>
        <img id="second_featured_image_preview" src="<?php echo $second_featured_image; ?>" style="max-width: 100%; height: auto;">
        <?php //$second_featured_image = wp_get_attachment_image_url($second_featured_image, 'full'); ?>
        <input type="text" style="display:none;" name="second_featured_image" id="second_featured_image_val" value="<?php echo esc_attr($second_featured_image); ?>">
    </p>
    <p>
        <label for="custom_text"><?php esc_html_e('Alternate Logo Text:', 'text-domain'); ?></label>
        <input type="text" name="custom_text" id="custom_text" value="<?php echo esc_attr($custom_text); ?>">
    </p>
    <script>
        jQuery(document).ready(function ($) {
            var mediaUploader;
            $('#upload_second_featured_image_button').click(function (e) {
                e.preventDefault();
                if (mediaUploader) {
                    mediaUploader.open();
                    return;
                }
                mediaUploader = wp.media({
                    title: 'Choose an Image',
                    button: {
                        text: 'Use this Image'
                    },
                    multiple: false
                });
                mediaUploader.on('select', function () {
                    var attachment = mediaUploader.state().get('selection').first().toJSON();
                    var imageURL = attachment.url;
                    $('#second_featured_image_val').val(imageURL);
                    $('#upload_second_featured_image_button').text('Change');
                    $('#remove_second_featured_image_button').show();
                    $('#second_featured_image_preview').attr('src', imageURL);
                });
                mediaUploader.open();
            });
            $('#remove_second_featured_image_button').click(function (e) {
                e.preventDefault();
                $('#second_featured_image_val').val('');
                $('#upload_second_featured_image_button').text('Upload');
                $('#remove_second_featured_image_button').hide();
                $('#second_featured_image_preview').attr('src', '');
            });
        });
    </script>
    <?php
}

function save_second_featured_image_meta_box($post_id) {
    // Verify the nonce
    if (!isset($_POST['second_featured_image_nonce']) || !wp_verify_nonce($_POST['second_featured_image_nonce'], 'save_second_featured_image')) {
        return;
    }

    // Check if this is an autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check the user's permissions
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Save the second featured image ID
    if (isset($_POST['second_featured_image'])) {
        update_post_meta($post_id, 'second_featured_image', sanitize_text_field($_POST['second_featured_image']));
    }

    // Save the custom text
    if (isset($_POST['custom_text'])) {
        update_post_meta($post_id, 'custom_text', sanitize_text_field($_POST['custom_text']));
    }
}
add_action('save_post', 'save_second_featured_image_meta_box');

