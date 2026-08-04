<?php

namespace Bazario\SmartOrder;

defined( 'ABSPATH' ) || exit;

class Settings {

    public function __construct() {
        add_action( 'admin_init', [ $this, 'register_settings' ] );
    }

    public function register_settings() {

        register_setting(
            'bso_settings_group',
            'bso_settings'
        );

        add_settings_section(
            'bso_general',
            'General Settings',
            '__return_false',
            'bazario-smart-order'
        );

        add_settings_field(
            'whatsapp_number',
            'WhatsApp Number',
            [ $this, 'whatsapp_number_callback' ],
            'bazario-smart-order',
            'bso_general'
        );

        add_settings_field(
            'call_number',
            'Call Number',
            [ $this, 'call_number_callback' ],
            'bazario-smart-order',
            'bso_general'
        );

    }

    public function whatsapp_number_callback() {

        $options = get_option( 'bso_settings' );
        ?>
        <input type="text"
               name="bso_settings[whatsapp_number]"
               value="<?php echo esc_attr( $options['whatsapp_number'] ?? '' ); ?>"
               class="regular-text">
        <?php

    }

    public function call_number_callback() {

        $options = get_option( 'bso_settings' );
        ?>
        <input type="text"
               name="bso_settings[call_number]"
               value="<?php echo esc_attr( $options['call_number'] ?? '' ); ?>"
               class="regular-text">
        <?php

    }

}
