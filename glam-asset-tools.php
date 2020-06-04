<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://andregagnon.com
 * @since             1.0.0
 * @package           Glam_Asset_Tools
 *
 * @wordpress-plugin
 * Plugin Name:       GLAM Asset Tools
 * Plugin URI:        https://github.com/andygagnon/glam-asset-tools
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Andre Gagnon
 * Author URI:        https://andregagnon.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       glam-asset-tools
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'GLAM_ASSET_TOOLS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-glam-asset-tools-activator.php
 */
function activate_glam_asset_tools() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-glam-asset-tools-activator.php';
	Glam_Asset_Tools_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-glam-asset-tools-deactivator.php
 */
function deactivate_glam_asset_tools() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-glam-asset-tools-deactivator.php';
	Glam_Asset_Tools_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_glam_asset_tools' );
register_deactivation_hook( __FILE__, 'deactivate_glam_asset_tools' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-glam-asset-tools.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_glam_asset_tools() {

	$plugin = new Glam_Asset_Tools();
	$plugin->run();

}
run_glam_asset_tools();
