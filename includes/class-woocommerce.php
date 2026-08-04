<?php

namespace Bazario\SmartOrder;

defined( 'ABSPATH' ) || exit;

class WooCommerce {

    /**
     * Check WooCommerce
     */
    public static function is_active() {

        return class_exists( 'WooCommerce' );

    }

    /**
     * Admin Notice
     */
    public static function admin_notice() {

        if ( self::is_active() ) {
            return;
        }

        echo '<div class="notice notice-error">';
        echo '<p><strong>Bazario Smart Order</strong> requires WooCommerce to be installed and activated.</p>';
        echo '</div>';

    }

}