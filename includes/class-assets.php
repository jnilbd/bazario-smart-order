<?php

namespace Bazario\SmartOrder;

defined( 'ABSPATH' ) || exit;

/**
 * Assets Loader
 *
 * @package BazarioSmartOrder
 * @since 2.0.0
 */
class Assets {

    /**
     * Constructor
     */
    public function __construct() {

        add_action(
            'wp_enqueue_scripts',
            array( $this, 'frontend' )
        );

        add_action(
            'admin_enqueue_scripts',
            array( $this, 'admin' )
        );

    }

    /**
     * Frontend Assets
     */
    public function frontend() {

        if ( is_admin() ) {
            return;
        }

        // Font Awesome
        wp_enqueue_style(
            'bso-fontawesome',
            'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css',
            array(),
            '6.7.2'
        );

        // Frontend CSS
        wp_enqueue_style(
            'bso-frontend',
            BSO_PLUGIN_URL . 'assets/css/frontend.css',
            array(),
            BSO_VERSION
        );

        // Frontend JS
        wp_enqueue_script(
            'bso-frontend',
            BSO_PLUGIN_URL . 'assets/js/frontend.js',
            array( 'jquery' ),
            BSO_VERSION,
            true
        );

        wp_localize_script(
            'bso-frontend',
            'bso_data',
            array(
                'ajax_url' => admin_url( 'admin-ajax.php' ),
                'nonce'    => wp_create_nonce( 'bso_nonce' ),
            )
        );

    }

    /**
     * Admin Assets
     */
    public function admin( $hook = '' ) {

        if ( ! empty( $hook ) && strpos( $hook, 'bazario-smart-order' ) === false ) {
            return;
        }

        wp_enqueue_style(
            'bso-admin',
            BSO_PLUGIN_URL . 'assets/css/admin.css',
            array(),
            BSO_VERSION
        );

        wp_enqueue_script(
            'bso-admin',
            BSO_PLUGIN_URL . 'assets/js/admin.js',
            array( 'jquery' ),
            BSO_VERSION,
            true
        );

    }

}