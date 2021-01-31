<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/tobenski/
 * @since      1.0.0
 *
 * @package    Tobenski_Event
 * @subpackage Tobenski_Event/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Tobenski_Event
 * @subpackage Tobenski_Event/public
 * @author     Knud Rishøj <tirdyr@tobenski.dk>
 */
class Tobenski_Event_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/tobenski-event-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/tobenski-event-public.js', null, $this->version, false );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url(__FILE__). '/js/swiper-bundle.min.js', null, '6.4.2', true );
	}

	/**
	 * Add a page-template to use with the events slug.
	 *
	 * @since 1.0.0
	 * @param string $template [Template location]
	 * @return string [Template location]
	 */
	public function page_templates( $template ) {
		if (is_page('events')) :
			// has slug events
			return plugin_dir_path( __FILE__ ) . 'partials/page-events.php';
		elseif (is_singular( 'event' )) :
			// is singular view of type event
			return plugin_dir_path( __FILE__ ) . 'partials/single-event.php';
		else :
			// is not event
			return $template;
		endif;
	} 

}
