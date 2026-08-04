<?php

namespace Bazario\SmartOrder;

defined( 'ABSPATH' ) || exit;

class Public_Class {

    public function __construct() {
        add_action( 'wp_enqueue_scripts', [ $this, 'assets' ] );
    }

    public function assets() {
        // Frontend assets.
    }
}
