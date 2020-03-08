<?php
/**
 * Plugin Name: Elementor Button Extended
 * Description: An Extended of Elementor Button Widget - Two buttons inline with separator text in-between with 16 button hover background transition effects. Option such as, to adjust space between, hide separator text on mobile or make buttons fullwidth on mobile and many others
 * Plugin URI:  https://internetcss.com/
 * Version:     1.0.2
 * Author:      InternetCSS
 * Author URI:  https://internetcss.com/
 * Text Domain: eb-button-extended
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define( 'EB_BUTTON_EXTENDED__FILE__', __FILE__ );
define( 'eb_button_version', '1.0.2' );

require_once __DIR__ . '/elementor-helper.php';


/**
 * Load Button Extended
 *
 * Load the plugin after Elementor (and other plugins) are loaded.
 *
 * @since 1.0.0
 */
function eb_button() {
	// Load localization file
	load_plugin_textdomain( 'eb-button-extended' );

	// Notice if the Elementor is not active
	if ( ! did_action( 'elementor/loaded' ) ) {
		add_action( 'admin_notices', 'eb_elementor_fail_load' );
		return;
	}

	// Check required version
	$elementor_version_required = '1.8.0';
	if ( ! version_compare( ELEMENTOR_VERSION, $elementor_version_required, '>=' ) ) {
		add_action( 'admin_notices', 'eb_check_button_elementor_load_out_of_date' );
		return;
	}

	// Require the main plugin file
	function add_eb_button_element(){
		require_once __DIR__ . '/widgets/eb-button-extended-widget.php';
	}
	add_action('elementor/widgets/widgets_registered','add_eb_button_element');
}

add_action( 'plugins_loaded', 'eb_button' );

function eb_elementor_button_fail_load() {

	$message = '<p>' . __( 'You do not have Elementor Page Builder on your WordPress. Elementor Button Extended Widget require Elementor in order to work.', 'eb-button-extended' ) . '</p>';

	echo '<div class="error">' . $message . '</div>';
}

function eb_check_button_elementor_load_out_of_date() {
	if ( ! current_user_can( 'update_plugins' ) ) {
		return;
	}

	$file_path = 'elementor/elementor.php';

	$upgrade_link = wp_nonce_url( self_admin_url( 'update.php?action=upgrade-plugin&plugin=' ) . $file_path, 'upgrade-plugin_' . $file_path );
	$message = '<p>' . __( 'Elementor Button Extended Widget may not work or is not compatible because you are using an old version of Elementor.', 'eb-button-extended' ) . '</p>';
	$message .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $upgrade_link, __( 'Update Elementor Now', 'eb-button-extended' ) ) . '</p>';

	echo '<div class="error">' . $message . '</div>';
}

/**
 * Register and enqueue a custom stylesheet in the Elementor.
 */
add_action('elementor/editor/before_enqueue_scripts', function(){
	wp_enqueue_style( 'eb-button-admin', plugins_url( '/assets/css/eb-button-admin.css', EB_BUTTON_EXTENDED__FILE__ ) );
});

add_action('elementor/frontend/after_enqueue_styles', function(){
	wp_enqueue_style( 'eb-button', plugins_url( '/assets/css/eb-button.min.css', EB_BUTTON_EXTENDED__FILE__ ) );
});

add_action('elementor/frontend/after_register_scripts', function(){
	wp_register_script( 'eb-button', plugins_url( '/assets/js/eb-button.js', EB_BUTTON_EXTENDED__FILE__ ), [ 'jquery' ], eb_button_version, true );
});