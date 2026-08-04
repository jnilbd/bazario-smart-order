<?php

namespace Bazario\SmartOrder;

defined( 'ABSPATH' ) || exit;

class Buttons {

    public function __construct() {

        add_action(
            'woocommerce_after_add_to_cart_button',
            [ $this, 'render_buttons' ],
            20
        );

        add_action(
            'woocommerce_after_shop_loop_item',
            [ $this, 'render_buttons' ],
            20
        );

    }

    public function render_buttons() {

        global $product;

        if ( ! $product instanceof \WC_Product ) {
            return;
        }

        $settings = get_option( 'bso_settings', [] );

        $whatsapp = preg_replace( '/\D+/', '', $settings['whatsapp_number'] ?? '' );
        $call     = $settings['call_number'] ?? '';

        $message = rawurlencode(
            "Hello,\n\n" .
            "I want to order this product.\n\n" .
            "Product: " . $product->get_name() . "\n" .
            "Price: " . wp_strip_all_tags( wc_price( $product->get_price() ) ) . "\n" .
            "Link: " . get_permalink( $product->get_id() )
        );

        echo '<div class="bso-buttons">';

        if ( $whatsapp ) {

            echo '<a class="bso-whatsapp"
                    target="_blank"
                    href="https://wa.me/' . esc_attr( $whatsapp ) . '?text=' . $message . '">
                    WhatsApp Order
                  </a>';

        }

        if ( $call ) {

            echo '<a class="bso-call"
                    href="tel:' . esc_attr( $call ) . '">
                    Call to Order
                  </a>';

        }

        echo '</div>';

    }

}
