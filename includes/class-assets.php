<?php

namespace Bazario\SmartOrder;

defined( 'ABSPATH' ) || exit;

class Assets {

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

    }

    /**
     * Admin Assets
     */
    public function admin_assets() {

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
