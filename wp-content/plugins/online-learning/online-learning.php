<?php
/**
 * Plugin Name:       Online Learning
 * Plugin URI:        https://example.com/
 * Description:       Core features for courses and lessons. Extend this plugin to add enrollment, progress, and payments.
 * Version:           1.0.0
 * Requires at least: 6.4
 * Requires PHP:       7.4
 * Author:             Your Name
 * License:            GPL v2 or later
 * License URI:        https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:        online-learning
 *
 * @package OnlineLearning
 */

defined( 'ABSPATH' ) || exit;

define( 'OLS_VERSION', '1.0.0' );
define( 'OLS_PLUGIN_FILE', __FILE__ );
define( 'OLS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'OLS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

require_once OLS_PLUGIN_DIR . 'includes/class-ols-post-types.php';
require_once OLS_PLUGIN_DIR . 'includes/class-ols-plugin.php';

/**
 * Runs on activation: register types and flush rewrite rules.
 */
function ols_activate() {
	OLS_Post_Types::register();
	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'ols_activate' );

/**
 * Flush permalinks when deactivating.
 */
function ols_deactivate() {
	flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'ols_deactivate' );

/**
 * Bootstrap the plugin.
 */
function ols_init() {
	OLS_Plugin::instance();
}
add_action( 'plugins_loaded', 'ols_init' );
