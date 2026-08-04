<?php

namespace Bazario\SmartOrder;

defined( 'ABSPATH' ) || exit;

/**
 * Product Buttons
 *
 * @package BazarioSmartOrder
 */
class Buttons {

    /**
     * Constructor
     */
    public function __construct() {

    add_action(
        Hooks::single_product_hook(),
        array( $this, 'single_product_buttons' ),
        20
    );

    add_action(
        Hooks::shop_loop_hook(),
        array( $this, 'shop_loop_buttons' ),
        20
    );

}

    /**
     * Single Product
     */
    public function single_product_buttons() {

        global $product;

        if ( ! $product instanceof \WC_Product ) {
            return;
        }

        $this->render( $product );

    }

    /**
     * Shop Loop
     */
    public function shop_loop_buttons() {

        global $product;

        if ( ! $product instanceof \WC_Product ) {
            return;
        }

        $this->render( $product );

    }

    /**
     * Render Buttons
     */
    private function render( \WC_Product $product ) {

        $settings = Settings::get();

        if ( empty( $settings['enable_whatsapp'] ) ) {
            return;
        }

        $phone = preg_replace(
            '/\D+/',
            '',
            $settings['whatsapp_number']
        );

        if ( empty( $phone ) ) {
            return;
        }

        $message = sprintf(
            "Hello,\n\nI want to order this product.\n\nProduct: %s\nPrice: %s\nLink: %s",
            $product->get_name(),
            wp_strip_all_tags(
                wc_price( $product->get_price() )
            ),
            get_permalink( $product->get_id() )
        );

        ?>

        <div class="bso-buttons">

            <a
                class="bso-whatsapp"
                target="_blank"
                rel="noopener"
                href="<?php echo esc_url(
                    'https://wa.me/' .
                    $phone .
                    '?text=' .
                    rawurlencode( $message )
                ); ?>">

                <?php
                echo esc_html(
                    $settings['whatsapp_text']
                );
                ?>

            </a>

            <?php if ( ! empty( $settings['enable_call'] ) ) : ?>

                <a
                    class="bso-call"
                    href="tel:<?php echo esc_attr(
                        $settings['call_number']
                    ); ?>">

                    <?php
                    echo esc_html(
                        $settings['call_text']
                    );
                    ?>

                </a>

            <?php endif; ?>

        </div>

        <?php

    }

}