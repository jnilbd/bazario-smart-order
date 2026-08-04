<?php

namespace Bazario\SmartOrder;

defined( 'ABSPATH' ) || exit;

/**
 * Main Plugin Class
 *
 * @package BazarioSmartOrder
 * @since 2.0.0
 */
final class Plugin {

    /**
     * Plugin Instance
     *
     * @var Plugin|null
     */
    private static $instance = null;

    /**
     * Initialize Plugin
     *
     * @return Plugin
     */
    public static function init() {

        if ( null === self::$instance ) {
            self::$instance = new self();
        }

        return self::$instance;

    }

    /**
     * Constructor
     */
    private function __construct() {

        $this->load_dependencies();

        $this->boot();

    }

    /**
     * Prevent Clone
     */
    private function __clone() {}

    /**
     * Prevent Unserialize
     */
    public function __wakeup() {}

    /**
     * Load Plugin Files
     */
    private function load_dependencies() {

        /*
        |--------------------------------------------------------------------------
        | Core
        |--------------------------------------------------------------------------
        */

        require_once BSO_PLUGIN_PATH . 'includes/class-loader.php';
        require_once BSO_PLUGIN_PATH . 'includes/class-assets.php';
        require_once BSO_PLUGIN_PATH . 'includes/class-settings.php';
        require_once BSO_PLUGIN_PATH . 'includes/class-woocommerce.php';
        require_once BSO_PLUGIN_PATH . 'includes/class-theme.php';
        require_once BSO_PLUGIN_PATH . 'includes/class-hooks.php';

        /*
        |--------------------------------------------------------------------------
        | Frontend
        |--------------------------------------------------------------------------
        */

        require_once BSO_PLUGIN_PATH . 'includes/class-buttons.php';
        require_once BSO_PLUGIN_PATH . 'includes/class-floating.php';
        require_once BSO_PLUGIN_PATH . 'includes/class-buy-now.php';

        /*
        |--------------------------------------------------------------------------
        | Admin
        |--------------------------------------------------------------------------
        */

        require_once BSO_PLUGIN_PATH . 'admin/class-admin.php';

        /*
        |--------------------------------------------------------------------------
        | Public
        |--------------------------------------------------------------------------
        */

        require_once BSO_PLUGIN_PATH . 'public/class-public.php';

    }

    /**
     * Boot Plugin
     */
    private function boot() {

        // WooCommerce Required
        if ( ! WooCommerce::is_active() ) {

            if ( is_admin() ) {

                add_action(
                    'admin_notices',
                    array(
                        '\Bazario\SmartOrder\WooCommerce',
                        'admin_notice',
                    )
                );

            }

            return;

        }

        /*
        |--------------------------------------------------------------------------
        | Core
        |--------------------------------------------------------------------------
        */

        new Loader();
        new Assets();
        new Settings();

        /*
        |--------------------------------------------------------------------------
        | Theme Compatibility
        |--------------------------------------------------------------------------
        */

        switch ( Theme::current() ) {

            case 'woodmart':
                // Future WoodMart Hooks
                break;

            case 'astra':
                // Future Astra Hooks
                break;

            case 'hello':
                // Future Hello Elementor Hooks
                break;

            default:
                // Default WooCommerce Hooks
                break;

        }

        /*
        |--------------------------------------------------------------------------
        | Frontend
        |--------------------------------------------------------------------------
        */

        new Buttons();
        new Buy_Now();
        new Floating();

        /*
        |--------------------------------------------------------------------------
        | Admin
        |--------------------------------------------------------------------------
        */

        if ( is_admin() ) {
            new Admin();
        }

        /*
        |--------------------------------------------------------------------------
        | Public
        |--------------------------------------------------------------------------
        */

        new Public_Class();

    }

}