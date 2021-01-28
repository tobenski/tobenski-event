<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/tobenski/
 * @since      1.0.0
 *
 * @package    Tobenski_Event
 * @subpackage Tobenski_Event/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Tobenski_Event
 * @subpackage Tobenski_Event/admin
 * @author     Knud Rishøj <tirdyr@tobenski.dk>
 */
class Tobenski_Event_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the Event CPT
	 *
	 * @since 1.0.0
	 */
	public function register_cpt()
	{
		$labels = array(
			'name'                     => 'Arrangementer',
			'singular_name'            => 'Arrangement',
			'add_new'                  => 'Tilføj Ny',
			'add_new_item'             => 'Tilføj Nyt Arrangement',
			'edit_item'                => 'Rediger Arrangement',
			'new_item'                 => 'Ny Arrangement',
			'view_item'                => 'Vis Arrangement',
			'view_items'               => 'Vis Arrangementer',
			'search_items'             => 'Søg i Arrangementer',
			'not_found'                => 'Ingen Arrangementer',
			'not_found_in_trash'       => 'Ingen Arrangementer i Papirkurv',
			'parent_item_colon'        => 'Parent Page:',
			'all_items'                => 'Alle Arrangementer',
			'archives'                 => 'Arrangement Arkiver',
			'attributes'               => 'Arrangement Attributes',
			'insert_into_item'         => 'Insert into Arrangement', 
			'uploaded_to_this_item'    => 'Uploaded til denne Arrangement',
			'featured_image'           => 'Udvalgt billede',
			'set_featured_image'       => 'Vælg udvalgt billede',
			'remove_featured_image'    => 'Fjern udvalgt billede',
			'use_featured_image'       => 'Brug som udvalgt billede',
			'filter_items_list'        => 'Filtrer Arrangement liste', 
			'items_list_navigation'    => 'Arrangement liste navigation',
			'items_list'               => 'Arrangement liste',
			'item_published'           => 'Arrangement offentliggjort',
			'item_published_privately' => 'Arrangement offentliggjort privat',
			'item_reverted_to_draft'   => 'Arrangement lavet om til kladde',
			'item_scheduled'           => 'Arrangement planlagt',
			'item_updated'             => 'Arrangement opdateret',
		);

		$args = array(
			'rewrite' => array('slug' => 'events'),
			'labels' => $labels,
			'description' => 'Arrangementer til Det Gamle Posthus.',
			'public' => true,
			'hierarchical' => false,
			'menu_position' => 23,
			'menu_icon' => 'dashicons-beer',
			'has_archive' => false,        
			'taxonomies' => array( 'category' ),
			'supports' => array(
				'title', 'editor', 'page-attributes', 'thumbnail'
			),	
		);

		register_post_type( 'event', $args); 

	}

	/**
	 * Register the Event Custom Fields
	 *
	 * @since 1.0.0
	 */
	public function register_custom_fields()
	{
		acf_add_local_field_group(array(
            'key' => 'group_tob_9f9wji69ff',
            'title' => 'Arrangementer',
            'fields' => array(
                array(
                    'key' => 'field_tob_8asjulcrq0',
                    'label' => 'Dato',
                    'name' => 'dato',
                    'type' => 'date_picker',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'display_format' => 'l j F Y',
                    'return_format' => 'l \d\e\n j. F Y',
                    'first_day' => 1,
                ),
                array(
                    'key' => 'field_tob_zju9qwso8l',
                    'label' => 'Start Tidspunkt',
                    'name' => 'start_tidspunkt',
                    'type' => 'time_picker',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'display_format' => 'H.i',
                    'return_format' => 'H.i',
                ),
                array(
                    'key' => 'field_tob_nj9jrev7ga',
                    'label' => 'Slut Tidspunkt',
                    'name' => 'slut_tidspunkt',
                    'type' => 'time_picker',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'display_format' => 'H.i',
                    'return_format' => 'H.i',
                ),
                array(
                    'key' => 'field_tob_4iuca8otsv',
                    'label' => 'Dato som tekst',
                    'name' => 'dato_som_tekst',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => 'Skriv Dato med tekst fx. "fredag den 3. marts"',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_tob_92l8dd01g9',
                    'label' => 'Samlet Pris',
                    'name' => 'samlet_pris',
                    'type' => 'number',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'min' => '',
                    'max' => '',
                    'step' => '',
                ),
                array(
                    'key' => 'field_tob_w2l5ukf0dm',
                    'label' => 'Reserver Link',
                    'name' => 'reserver_link',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_tob_nqlirkpflc',
                    'label' => 'Reserver Text',
                    'name' => 'reserver_text',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_tob_xfdjr8in2e',
                    'label' => 'Menu',
                    'name' => 'menu',
                    'type' => 'wysiwyg',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                    'delay' => 0,
                ),
                array(
                    'key' => 'field_tob_zmwbsgg0lo',
                    'label' => 'Events Secondary Image',
                    'name' => 'event_secondary_image',
                    'type' => 'image',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'return_format' => 'url',
                    'preview_size' => 'medium',
                    'library' => 'all',
                    'min_width' => '',
                    'min_height' => '',
                    'min_size' => '',
                    'max_width' => '',
                    'max_height' => '',
                    'max_size' => '',
                    'mime_types' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'event',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
        ));
	}

}
