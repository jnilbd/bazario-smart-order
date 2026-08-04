<?php

namespace Bazario\SmartOrder;

defined( 'ABSPATH' ) || exit;

class Loader {

    public function __construct() {
        add_action( 'init', [ $this, 'init' ] );
    }

    public function init() {
        // Plugin initialized.
    }
}
