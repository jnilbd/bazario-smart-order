<?php

namespace Bazario\SmartOrder;

defined( 'ABSPATH' ) || exit;

/**
 * Floating Buttons
 *
 * @package BazarioSmartOrder
 */
class Floating {

    /**
     * Constructor
     */
    public function __construct() {

        add_action(
            'wp_footer',
            array( $this, 'render' )
        );

    }

    /**
     * Render Floating Buttons
     */
    public function render() {

        if ( is_admin() ) {
            return;
        }

        if ( ! class_exists( 'WooCommerce' ) ) {
            return;
        }

        $settings = Settings::get();

        if ( empty( $settings['enable_floating'] ) ) {
            return;
        }

        $phone = preg_replace(
            '/\D+/',
            '',
            $settings['whatsapp_number']
        );

        $call = sanitize_text_field(
            $settings['call_number']
        );

        if ( empty( $phone ) && empty( $call ) ) {
            return;
        }

        ?>

        <div class="bso-floating">

            <?php if ( ! empty( $settings['enable_whatsapp'] ) && ! empty( $phone ) ) : ?>

                <a
                    class="bso-floating-whatsapp"
                    href="<?php echo esc_url( 'https://wa.me/' . $phone ); ?>"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="WhatsApp">

                    💬

                </a>

            <?php endif; ?>

            <?php if ( ! empty( $settings['enable_call'] ) && ! empty( $call ) ) : ?>

                <a
                    class="bso-floating-call"
                    href="<?php echo esc_url( 'tel:' . $call ); ?>"
                    aria-label="Call">

                    📞

                </a>

            <?php endif; ?>

        </div>

        <?php

    }

}