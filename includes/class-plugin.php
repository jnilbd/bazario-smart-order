<?php

namespace Bazario\SmartOrder;

defined( 'ABSPATH' ) || exit;

class Plugin {

    /**
     * Initialize plugin.
     */
    public static function init() {
        $plugin = new self();
        $plugin->load_dependencies();
        $plugin->run();
    }

    /**
     * Load required classes.
     */
    private function load_dependencies() {

        require_once BSO_PLUGIN_PATH . 'includes/class-loader.php';
        require_once BSO_PLUGIN_PATH . 'admin/class-admin.php';
        require_once BSO_PLUGIN_PATH . 'public/class-public.php';

    }

    /**
     * Run plugin.
     */
    private function run() {

        new Loader();

        if ( is_admin() ) {
            new Admin();
        }

        new Public_Class();
    }
}
