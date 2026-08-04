<?php

namespace Bazario\SmartOrder;

defined( 'ABSPATH' ) || exit;

/**
 * Admin Controller
 *
 * @package BazarioSmartOrder
 * @since 2.0.0
 */
class Admin {

    /**
     * Constructor
     */
    public function __construct() {

        add_action(
            'admin_menu',
            array( $this, 'register_menu' )
        );

    }

    /**
     * Register Admin Menu
     */
    public function register_menu() {

        add_menu_page(

            __( 'Bazario Smart Order', 'bazario-smart-order' ),

            __( 'Smart Order', 'bazario-smart-order' ),

            'manage_options',

            'bazario-smart-order',

            array( $this, 'dashboard' ),

            'dashicons-cart',

            56

        );

    }

    /**
     * Dashboard
     */
    public function dashboard() {

        require_once BSO_PLUGIN_PATH . 'admin/views/dashboard.php';

    }

}
