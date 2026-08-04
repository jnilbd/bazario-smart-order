<?php

namespace Bazario\SmartOrder;

defined( 'ABSPATH' ) || exit;

class Admin {

    public function __construct() {
        add_action( 'admin_menu', [ $this, 'menu' ] );
    }

    public function menu() {
        // Admin menu.
    }
}
