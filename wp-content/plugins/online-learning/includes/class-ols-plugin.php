<?php
/**
 * Main plugin loader.
 *
 * @package OnlineLearning
 */

defined( 'ABSPATH' ) || exit;

/**
 * Singleton handling hooks and admin UI stubs.
 */
final class OLS_Plugin {

	/**
	 * Instance.
	 *
	 * @var OLS_Plugin|null
	 */
	private static $instance = null;

	/**
	 * Get instance.
	 *
	 * @return OLS_Plugin
	 */
	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Constructor.
	 */
	private function __construct() {
		add_action( 'init', array( OLS_Post_Types::class, 'register' ) );
		add_action( 'admin_menu', array( $this, 'register_admin_menu' ) );
	}

	/**
	 * Top-level admin entry (placeholder for future settings).
	 */
	public function register_admin_menu() {
		add_menu_page(
			__( 'Online Learning', 'online-learning' ),
			__( 'Online Learning', 'online-learning' ),
			'manage_options',
			'online-learning',
			array( $this, 'render_dashboard_page' ),
			'dashicons-welcome-learn-more',
			26
		);
	}

	/**
	 * Dashboard placeholder.
	 */
	public function render_dashboard_page() {
		echo '<div class="wrap"><h1>' . esc_html( get_admin_page_title() ) . '</h1>';
		echo '<p>' . esc_html__( 'Use Courses and Lessons in the menu to add content. Extend this plugin for enrollment and progress.', 'online-learning' ) . '</p></div>';
	}
}
