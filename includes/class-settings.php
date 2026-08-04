<?php

namespace Bazario\SmartOrder;

defined( 'ABSPATH' ) || exit;

class Settings {

    public function __construct() {

        add_action( 'admin_init', [ $this, 'register_settings' ] );

    }

    public function register_settings() {

        register_setting(
            'bso_settings_group',
            'bso_settings'
        );

    }

}
