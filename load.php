<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exits when accessed directly.

defined( 'THEME_SECTIONS_POST_TYPE' ) or define( 'THEME_SECTIONS_POST_TYPE', 'section' );

class Theme_Sections
{
	static private $instance = null;

	static public function get_instance()
	{
		if ( ! self::$instance ) 
		{
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function init()
	{
		add_action( 'init', 		array( $this, 'register_post_type' ) );
		add_action( 'widgets_init', array( $this, 'widgets_init' ) );
	}

	public function register_post_type()
	{
		register_post_type( THEME_SECTIONS_POST_TYPE, array
		(
			'labels' => array
			(
				'name'               => _x( 'Sections', 'post type general name', 'theme-sections' ),
				'singular_name'      => _x( 'Section', 'post type singular name', 'theme-sections' ),
				'menu_name'          => _x( 'Sections', 'admin menu', 'theme-sections' ),
				'name_admin_bar'     => _x( 'Section', 'add new on admin bar', 'theme-sections' ),
				'add_new'            => _x( 'Add New', 'section', 'theme-sections' ),
				'add_new_item'       => __( 'Add New Section', 'theme-sections' ),
				'new_item'           => __( 'New Section', 'theme-sections' ),
				'edit_item'          => __( 'Edit Section', 'theme-sections' ),
				'view_item'          => __( 'View Section', 'theme-sections' ),
				'all_items'          => __( 'All Sections', 'theme-sections' ),
				'search_items'       => __( 'Search Sections', 'theme-sections' ),
				'parent_item_colon'  => __( 'Parent Sections:', 'theme-sections' ),
				'not_found'          => __( 'No sections found.', 'theme-sections' ),
				'not_found_in_trash' => __( 'No sections found in Trash.', 'theme-sections' )
			),
	        'description'        => __( 'Description.', 'theme-sections' ),
			'public'             => false,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => false,
			'rewrite'            => false,
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor' )
		));
	}

	public function widgets_init()
	{
		require_once plugin_dir_path( THEME_SECTIONS_FILE ) . 'includes/widgets/section.php';
	}
}

Theme_Sections::get_instance()->init();
