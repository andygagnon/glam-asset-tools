<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://andregagnon.com
 * @since      1.0.0
 *
 * @package    Glam_Asset_Tools
 * @subpackage Glam_Asset_Tools/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Glam_Asset_Tools
 * @subpackage Glam_Asset_Tools/public
 * @author     Andre Gagnon <andy.gagnon@gmail.com>
 */
class Glam_Asset_Tools_Public {

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

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Glam_Asset_Tools_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Glam_Asset_Tools_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/glam-asset-tools-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Glam_Asset_Tools_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Glam_Asset_Tools_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/glam-asset-tools-public.js', array( 'jquery' ), $this->version, false );

	}


		/**
		 * Register the JavaScript for the public-facing side of the site.
		 *
		 * @since    1.0.0
		 */
		public function glam_action_init() {

			// add rewrite rule
			//add_rewrite_rule('^blog/?([^/]*)/?','index.php?id=$matches[1]','bottom');

			// remove meta below single post title
			remove_action( 'generate_after_entry_title', 'generate_post_meta' );

		}

		// set excpert length in words for archive templates
		public function glam_custom_excerpt_length( $length ) {
			return 28;
    	// return 0;
		}


		// filter and change generatepress copyright text
		public function glam_generate_copyright( $copyright ) {
			$copyright = sprintf( '<span class="copyright">&copy; %1$s %2$s</span>',
				date( 'Y' ),
				get_bloginfo( 'name' )
			);

			return $copyright;

		}

		// unused, generatepress template provides this
		public function glam_generate_archive_description ( ) {
			$s = '';
			if ( 0 && is_category() ) {

				$term_id = get_category_by_slug('fiction')->term_id;
				$s = 'test';
				// $s = category_description( $term_id );
			}
			else {
				$s = '';
			}

			if ( $s )
			echo '<div class="archive-description">
				<p>
					'.$s.'.
				</p>
			</div>';

		}



}
