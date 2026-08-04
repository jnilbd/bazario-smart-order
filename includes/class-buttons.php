<?php

namespace Bazario\SmartOrder;

defined( 'ABSPATH' ) || exit;

class Buttons {

    public function __construct() {

        // Single Product
        add_action(
            'woocommerce_after_add_to_cart_button',
            [ $this, 'render_buttons' ],
            20
        );

        // Shop / Archive
        add_action(
            'woocommerce_after_shop_loop_item',
            [ $this, 'render_buttons' ],
            20
        );

        // WoodMart Theme
        add_action(
            'woodmart_after_product_add_to_cart',
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

        $whatsapp = preg_replace(
            '/\D+/',
            '',
            $settings['whatsapp_number'] ?? ''
        );

        $call = $settings['call_number'] ?? '';

        $message = rawurlencode(
            "Hello,\n\n" .
            "Product: {$product->get_name()}\n" .
            "Price: " . wp_strip_all_tags( wc_price( $product->get_price() ) ) . "\n" .
            "Link: " . get_permalink( $product->get_id() )
        );

        ?>
        <div class="bso-buttons">

            <?php if ( $whatsapp ) : ?>

                <a
                    class="bso-whatsapp"
                    href="https://wa.me/<?php echo esc_attr( $whatsapp ); ?>?text=<?php echo esc_attr( $message ); ?>"
                    target="_blank">

                    WhatsApp Order

                </a>

            <?php endif; ?>

            <?php if ( $call ) : ?>

                <a
                    class="bso-call"
                    href="tel:<?php echo esc_attr( $call ); ?>">

                    Call to Order

                </a>

            <?php endif; ?>

        </div>
        <?php

    }

}
