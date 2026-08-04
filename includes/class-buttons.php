<?php

namespace Bazario\SmartOrder;

defined( 'ABSPATH' ) || exit;

class Buttons {

    public function __construct() {

        add_action(
            'woocommerce_after_add_to_cart_button',
            [ $this, 'render_buttons' ]
        );

    }

    /**
     * Render WhatsApp & Call Buttons
     */
    public function render_buttons() {

        $options = get_option( 'bso_settings', [] );

        $whatsapp = $options['whatsapp_number'] ?? '';
        $call     = $options['call_number'] ?? '';

        echo '<div class="bso-buttons">';

        if ( ! empty( $whatsapp ) ) {

            echo '<a class="button alt bso-whatsapp"
                target="_blank"
                href="https://wa.me/' . esc_attr( preg_replace( '/\D+/', '', $whatsapp ) ) . '">
                WhatsApp Order
            </a>';

        }

        if ( ! empty( $call ) ) {

            echo '<a class="button bso-call"
                href="tel:' . esc_attr( $call ) . '">
                Call Now
            </a>';

        }

        echo '</div>';

    }

}
