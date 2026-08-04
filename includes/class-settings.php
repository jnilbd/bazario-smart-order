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
            'bso_settings',
            [ $this, 'sanitize' ]
        );

        add_settings_section(
            'bso_general',
            'General Settings',
            '__return_false',
            'bazario-smart-order'
        );

        $fields = [
            'whatsapp_number' => 'WhatsApp Number',
            'call_number' => 'Call Number',
            'whatsapp_text' => 'WhatsApp Button Text',
            'call_text' => 'Call Button Text',
        ];

        foreach ( $fields as $id => $label ) {

            add_settings_field(
                $id,
                $label,
                [ $this, 'text_field' ],
                'bazario-smart-order',
                'bso_general',
                [ 'id' => $id ]
            );

        }

    }

    public function sanitize( $input ) {

        return [
            'whatsapp_number' => sanitize_text_field( $input['whatsapp_number'] ?? '' ),
            'call_number'     => sanitize_text_field( $input['call_number'] ?? '' ),
            'whatsapp_text'   => sanitize_text_field( $input['whatsapp_text'] ?? 'WhatsApp Order' ),
            'call_text'       => sanitize_text_field( $input['call_text'] ?? 'Call Now' ),
        ];

    }

    public function text_field( $args ) {

        $options = get_option( 'bso_settings', [] );
        $id      = $args['id'];

        ?>
        <input
            type="text"
            class="regular-text"
            name="bso_settings[<?php echo esc_attr( $id ); ?>]"
            value="<?php echo esc_attr( $options[ $id ] ?? '' ); ?>">
        <?php

    }

}
