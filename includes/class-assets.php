<?php

namespace Bazario\SmartOrder;

defined( 'ABSPATH' ) || exit;

class Assets {

    public function __construct() {

        add_action(
            'wp_enqueue_scripts',
            [ $this, 'frontend_assets' ]
        );

    }

    public function frontend_assets() {

        wp_enqueue_style(
            'bso-frontend',
            BSO_PLUGIN_URL . 'assets/css/frontend.css',
            [],
            BSO_VERSION
        );

    }

}
