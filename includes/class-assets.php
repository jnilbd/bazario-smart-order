<?php

namespace Bazario\SmartOrder;

defined( 'ABSPATH' ) || exit;

/**
 * Assets Loader
 *
 * @package BazarioSmartOrder
<<<<<<< HEAD
=======
 * @since 2.0.0
>>>>>>> 6eefc4e (feat(ui): improve buttons, icons and frontend assets)
 */
class Assets {

    /**
     * Constructor
     */
    public function __construct() {

<<<<<<< HEAD
        add_action( 'wp_enqueue_scripts', [ $this, 'frontend_assets' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'admin_assets' ] );
=======
        add_action(
            'wp_enqueue_scripts',
            array( $this, 'frontend' )
        );

        add_action(
            'admin_enqueue_scripts',
            array( $this, 'admin' )
        );
>>>>>>> 6eefc4e (feat(ui): improve buttons, icons and frontend assets)

    }

    /**
     * Frontend Assets
     */
<<<<<<< HEAD
    public function frontend_assets() {
=======
    public function frontend() {
>>>>>>> 6eefc4e (feat(ui): improve buttons, icons and frontend assets)

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

<<<<<<< HEAD
        wp_enqueue_script(
            'bso-frontend',
            BSO_PLUGIN_URL . 'assets/js/frontend.js',
            [ 'jquery' ],
=======
        // Frontend JS
        wp_enqueue_script(
            'bso-frontend',
            BSO_PLUGIN_URL . 'assets/js/frontend.js',
            array( 'jquery' ),
>>>>>>> 6eefc4e (feat(ui): improve buttons, icons and frontend assets)
            BSO_VERSION,
            true
        );

<<<<<<< HEAD
        wp_localize_script(
            'bso-frontend',
            'bso_data',
            [
                'ajax_url' => admin_url( 'admin-ajax.php' ),
                'nonce'    => wp_create_nonce( 'bso_nonce' ),
            ]
        );

=======
>>>>>>> 6eefc4e (feat(ui): improve buttons, icons and frontend assets)
    }

    /**
     * Admin Assets
     */
<<<<<<< HEAD
    public function admin_assets( $hook ) {

        if ( strpos( $hook, 'bazario-smart-order' ) === false ) {
            return;
        }
=======
    public function admin() {
>>>>>>> 6eefc4e (feat(ui): improve buttons, icons and frontend assets)

        wp_enqueue_style(
            'bso-admin',
            BSO_PLUGIN_URL . 'assets/css/admin.css',
<<<<<<< HEAD
            [],
=======
            array(),
>>>>>>> 6eefc4e (feat(ui): improve buttons, icons and frontend assets)
            BSO_VERSION
        );

        wp_enqueue_script(
            'bso-admin',
            BSO_PLUGIN_URL . 'assets/js/admin.js',
<<<<<<< HEAD
            [ 'jquery' ],
=======
            array( 'jquery' ),
>>>>>>> 6eefc4e (feat(ui): improve buttons, icons and frontend assets)
            BSO_VERSION,
            true
        );

    }

}