<?php

namespace Bazario\SmartOrder;

defined( 'ABSPATH' ) || exit;

class Buttons {

    public function __construct() {

        // Single Product Page
        add_action(
            'woocommerce_after_add_to_cart_button',
            [ $this, 'render_buttons' ],
            20
        );

        // Shop / Archive Page
        add_action(
            'woocommerce_after_shop_loop_item',
            [ $this, 'render_shop_button' ],
            20
        );

    }

    /**
     * Single Product Buttons
     */
    public function render_buttons() {

        $this->button_html();

    }

    /**
     * Shop Page Button
     */
    public function render_shop_button() {

        $this->button_html();

    }

    /**
     * Shared Button HTML
     */
    private function button_html() {

        $options = get_option( 'bso_settings', [] );

        $whatsapp = $options['whatsapp_number'] ?? '';
        $call     = $options['call_number'] ?? '';

        echo '<div class="bso-buttons">';

        if ( ! empty( $whatsapp ) ) {

            echo '<a class="bso-whatsapp"
                    target="_blank"
                    href="https://wa.me/' . esc_attr( preg_replace( '/\D+/', '', $whatsapp ) ) . '">
                    WhatsApp Order
                  </a>';

        }

        if ( ! empty( $call ) ) {

            echo '<a class="bso-call"
                    href="tel:' . esc_attr( $call ) . '">
                    Call to Order
                  </a>';

        }

        echo '</div>';

    }

}
