<?php
/**
 * Plugin Name: Bazario Smart Order
 * Plugin URI: https://github.com/jnilbd/bazario-smart-order
 * Description: Smart WooCommerce Order Plugin with WhatsApp Order, Call Button, Buy Now, Floating Buttons and WoodMart Support.
 * Version: 2.0.0
 * Requires at least: 6.5
 * Requires PHP: 7.4
 * Author: JOHN NIL
 * Author URI: https://mybazario.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: bazario-smart-order
 * Domain Path: /languages
 */

defined( 'ABSPATH' ) || exit;

/*
|--------------------------------------------------------------------------
| Composer Autoload
|--------------------------------------------------------------------------
*/

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
    require_once __DIR__ . '/vendor/autoload.php';
}

/*
|--------------------------------------------------------------------------
| Plugin Constants
|--------------------------------------------------------------------------
*/

define( 'BSO_VERSION', '2.0.0' );
define( 'BSO_PLUGIN_FILE', __FILE__ );
define( 'BSO_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'BSO_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'BSO_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

/*
|--------------------------------------------------------------------------
| Required Classes
|--------------------------------------------------------------------------
*/

require_once BSO_PLUGIN_PATH . 'includes/class-activator.php';
require_once BSO_PLUGIN_PATH . 'includes/class-deactivator.php';
require_once BSO_PLUGIN_PATH . 'includes/class-plugin.php';

/*
|--------------------------------------------------------------------------
| Activation / Deactivation
|--------------------------------------------------------------------------
*/

register_activation_hook(
    __FILE__,
    array( '\Bazario\SmartOrder\Activator', 'activate' )
);

register_deactivation_hook(
    __FILE__,
    array( '\Bazario\SmartOrder\Deactivator', 'deactivate' )
);

/*
|--------------------------------------------------------------------------
| Boot Plugin
|--------------------------------------------------------------------------
*/

\Bazario\SmartOrder\Plugin::init();