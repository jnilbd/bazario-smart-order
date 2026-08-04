<?php

namespace Bazario\SmartOrder;

defined( 'ABSPATH' ) || exit;

/**
 * Assets Loader
 *
 * @package BazarioSmartOrder
 */
class Assets {

    /**
     * Constructor
     */
    public function __construct() {

        add_action( 'wp_enqueue_scripts', [ $this, 'frontend_assets' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'admin_assets' ] );

    }

    /**
     * Frontend Assets
     */
    public function frontend_assets() {

        wp_enqueue_style(
            'bso-frontend',
            BSO_PLUGIN_URL . 'assets/css/frontend.css',
            [],
            BSO_VERSION
        );

        wp_enqueue_script(
            'bso-frontend',
            BSO_PLUGIN_URL . 'assets/js/frontend.js',
            [ 'jquery' ],
            BSO_VERSION,
            true
        );

        wp_localize_script(
            'bso-frontend',
            'bso_data',
            [
                'ajax_url' => admin_url( 'admin-ajax.php' ),
                'nonce'    => wp_create_nonce( 'bso_nonce' ),
            ]
        );

    }

    /**
     * Admin Assets
     */
    public function admin_assets( $hook ) {

        if ( strpos( $hook, 'bazario-smart-order' ) === false ) {
            return;
        }

        wp_enqueue_style(
            'bso-admin',
            BSO_PLUGIN_URL . 'assets/css/admin.css',
            [],
            BSO_VERSION
        );

        wp_enqueue_script(
            'bso-admin',
            BSO_PLUGIN_URL . 'assets/js/admin.js',
            [ 'jquery' ],
            BSO_VERSION,
            true
        );

    }

}