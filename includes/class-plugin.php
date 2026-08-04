<?php

namespace Bazario\SmartOrder;

defined( 'ABSPATH' ) || exit;

class Plugin {

    public static function init() {

        $plugin = new self();

        $plugin->load_dependencies();

        $plugin->run();

    }

    private function load_dependencies() {

        require_once BSO_PLUGIN_PATH . 'includes/class-loader.php';
        require_once BSO_PLUGIN_PATH . 'includes/class-assets.php';
        require_once BSO_PLUGIN_PATH . 'includes/class-settings.php';
        require_once BSO_PLUGIN_PATH . 'admin/class-admin.php';
        require_once BSO_PLUGIN_PATH . 'public/class-public.php';

    }

    private function run() {

        new Loader();

        new Assets();

        new Settings();

        if ( is_admin() ) {
            new Admin();
        }

        new Public_Class();

    }

}
