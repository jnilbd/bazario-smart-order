<?php

namespace Bazario\SmartOrder;

defined( 'ABSPATH' ) || exit;

/**
 * WooCommerce Hook Manager
 *
 * @package BazarioSmartOrder
 */
class Hooks {

    /**
     * Get Single Product Hook
     *
     * @return string
     */
    public static function single_product_hook() {

        switch ( Theme::current() ) {

            case 'woodmart':
                return 'woocommerce_after_add_to_cart_button';

            case 'astra':
                return 'woocommerce_after_add_to_cart_button';

            case 'hello':
                return 'woocommerce_after_add_to_cart_button';

            default:
                return 'woocommerce_after_add_to_cart_button';

        }

    }

    /**
     * Get Shop Loop Hook
     *
     * @return string
     */
    public static function shop_loop_hook() {

        switch ( Theme::current() ) {

            case 'woodmart':
                return 'woocommerce_after_shop_loop_item';

            case 'astra':
                return 'woocommerce_after_shop_loop_item';

            case 'hello':
                return 'woocommerce_after_shop_loop_item';

            default:
                return 'woocommerce_after_shop_loop_item';

        }

    }

}