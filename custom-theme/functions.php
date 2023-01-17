<?php
class wpc_post_editor {
	public function __construct() {
		add_action( 'add_meta_boxes', [$this, 'create_meta_box'] );
		add_action( 'save_post', [$this, 'save_editor'] );
	}

	public function create_meta_box() {
		add_meta_box( 'wpc_editor', 'Custom Metabox', [$this, 'meta_box_html'], ['listing'] );
	}

	public function save_editor( $post_id ) {
		if (isset( $_POST['wpc_post_editor'] ) && is_numeric( $_POST['wpc_post_editor'] )) {
			$order_value = sanitize_text_field( $_POST['wpc_post_editor'] );
			update_post_meta( $post_id, 'wpc_post_editor', $order_value );
		}
	}

	public function meta_box_html() {
		?>
		<input type="number" name="wpc_post_editor" id="post_editor" value="<?php if(get_post_meta( get_the_ID(), 'wpc_post_editor', true )) { echo get_post_meta( get_the_ID(), 'wpc_post_editor', true ); } else { echo 1; } ?>" placeholder="Order" />
		<?php
	}

}

new wpc_post_editor();

function wpdocs_theme_name_scripts() {
    wp_enqueue_style( 'style-name', get_stylesheet_uri() );
    wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

add_theme_support( 'custom-logo' );
add_theme_support( 'post-thumbnails' );


