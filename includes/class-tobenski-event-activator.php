<?php 

/**
 * Fired during plugin activation
 *
 * @link       https://github.com/tobenski/
 * @since      1.0.0
 *
 * @package    Tobenski_Event
 * @subpackage Tobenski_Event/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Tobenski_Event
 * @subpackage Tobenski_Event/includes
 * @author     Knud Rishøj <tirdyr@tobenski.dk>
 */
class Tobenski_Event_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		self::create_page();
	}

	public static function create_page() {
		$page = array(
			'post_title' => 'Arrangementer',
			'post_status' => 'publish',
			'post_author' => 1,
			'post_type' => 'page',
			'post_name' => 'events',
		); 

		$page_exists = get_page_by_path( '/' . $page['page_name'] . '/', ARRAY_A, 'page');
		if ($page_exists == null) : wp_insert_post( $page ); endif;
	}

}
