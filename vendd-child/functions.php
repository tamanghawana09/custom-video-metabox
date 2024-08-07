<?php
add_action('wp_enqueue_scripts', 'vendd_child_enqueue_styles');
function vendd_child_enqueue_styles()
{
	wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
	wp_enqueue_script('child-custom', get_stylesheet_directory_uri() . '/assets/js/custom.js', 'jQuery', '1.0.0', true);
	wp_enqueue_style('child-responsive', get_stylesheet_directory_uri() . '/assets/css/responsive.css', array('vendd-style'));
}

function custom_widgets_init()
{
	register_sidebar(array(
		'name'          => __('Footer First Widget', 'vendd'),
		'id'            => 'footer-widget-one',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
	));

	register_sidebar(array(
		'name'          => __('Footer Second Widget', 'vendd'),
		'id'            => 'footer-widget-two',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
	));

	register_sidebar(array(
		'name'          => __('Footer Third Widget', 'vendd'),
		'id'            => 'footer-widget-three',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
	));
}
add_action('widgets_init', 'custom_widgets_init');

function add_video_metabox()
{
	$post_types = array('post', 'page');
	add_meta_box(
		'custom_video_meta_box',
		'Video Embed',
		'render_video_meta_box',
		$post_types,
		'normal',
		'high'
	);
}
add_action('add_meta_boxes', 'add_video_metabox');

function render_video_meta_box($post)
{
	wp_nonce_field('save_video_meta_box_data', 'video_meta_box_nonce');
	$video_embed = get_post_meta($post->ID, '_video_embed', true);
?>
<p>Paste the YouTube iframe code here:</p>
<textarea name="video_embed" rows="4" style="width:100%;"
    placeholder="Enter your video Iframe"><?php echo esc_textarea($video_embed); ?></textarea>
<?php
}

function save_video_meta_box_data($post_id) {
    if (!isset($_POST['video_meta_box_nonce']) || !wp_verify_nonce($_POST['video_meta_box_nonce'], 'save_video_meta_box_data')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['video_embed'])) {
        $video_embed = $_POST['video_embed'];
        update_post_meta($post_id, '_video_embed', $video_embed);
    }
}
add_action('save_post', 'save_video_meta_box_data');