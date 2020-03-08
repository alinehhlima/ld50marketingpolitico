<?php
/**
 * Plugin Name: Fancy Elementor Flipbox
 * Description: This plugin adds an amazing and customizable flip box widget(with many options) to the Elementor page builder plugin.
 * Plugin URI:  https://themeprix.com/
 * Version:     1.0.3
 * Author:      Hossein Hashemi
 * Author URI:  https://bardiaweb.com/
 * Text Domain: fancy-elementor-flipbox
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


define( 'FANCY_ELEMENTOR_FLIPBOX__FILE__', __FILE__ );
/**
 * Load elementor fancy flipbox
 *
 * Load the plugin after Elementor (and other plugins) are loaded.
 *
 * @since 1.0.0
 */
function fancy_elementor_flipbox_load() {
	// Load localization file
	load_plugin_textdomain( 'fancy-elementor-flipbox' );

	// Notice if the Elementor is not active
	if ( ! did_action( 'elementor/loaded' ) ) {
		add_action( 'admin_notices', 'fancy_elementor_flipbox_fail_load' );
		return;
	}

	// Check required version
	$elementor_version_required = '1.8.0';
	if ( ! version_compare( ELEMENTOR_VERSION, $elementor_version_required, '>=' ) ) {
		add_action( 'admin_notices', 'fancy_elementor_flipbox_fail_load_out_of_date' );
		return;
	}

	// Require the main plugin file
	require( __DIR__ . '/plugin.php' );
}
add_action( 'plugins_loaded', 'fancy_elementor_flipbox_load' );


function fancy_elementor_flipbox_fail_load_out_of_date() {
	if ( ! current_user_can( 'update_plugins' ) ) {
		return;
	}

	$file_path = 'elementor/elementor.php';

	$upgrade_link = wp_nonce_url( self_admin_url( 'update.php?action=upgrade-plugin&plugin=' ) . $file_path, 'upgrade-plugin_' . $file_path );
	$message = '<p>' . __( 'Fancy Elementor Flipbox is not working because you are using an old version of Elementor.', 'fancy-elementor-flipbox' ) . '</p>';
	$message .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $upgrade_link, __( 'Update Elementor Now', 'fancy-elementor-flipbox' ) ) . '</p>';

	echo '<div class="error">' . $message . '</div>';
}
