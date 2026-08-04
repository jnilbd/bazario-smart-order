<?php

namespace Bazario\SmartOrder;

defined( 'ABSPATH' ) || exit;

/**
 * Buy Now Button
 *
 * @package BazarioSmartOrder
 */
class Buy_Now {

    /**
     * Constructor
     */
    public function __construct() {

        add_action(
            'woocommerce_after_add_to_cart_button',
            array( $this, 'render' ),
            30
        );

    }

    /**
     * Render Buy Now Button
     */
    public function render() {

        global $product;

        if ( ! $product instanceof \WC_Product ) {
            return;
        }

        $settings = Settings::get();

        if ( empty( $settings['enable_buy_now'] ) ) {
            return;
        }

        $url = add_query_arg(
            array(
                'add-to-cart' => $product->get_id(),
                'quantity'    => 1,
            ),
            wc_get_checkout_url()
        );

        ?>

        <p class="bso-buy-now-wrapper">

            <a
                href="<?php echo esc_url( $url ); ?>"
                class="button alt bso-buy-now">

                <?php
                echo esc_html(
                    $settings['buy_now_text']
                );
                ?>

            </a>

        </p>

        <?php

    }

}