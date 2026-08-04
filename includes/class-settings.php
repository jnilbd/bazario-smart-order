<?php

namespace Bazario\SmartOrder;

defined( 'ABSPATH' ) || exit;

/**
 * Settings Manager
 *
 * @package BazarioSmartOrder
 * @since 2.0.0
 */
class Settings {

    /**
     * Default Settings
     *
     * @var array
     */
    private $defaults = array(

        'whatsapp_number' => '',
        'call_number'     => '',

        'enable_whatsapp' => 1,
        'enable_call'     => 1,
        'enable_buy_now'  => 1,
        'enable_floating' => 1,

        'whatsapp_text'   => 'WhatsApp Order',
        'call_text'       => 'Call to Order',
        'buy_now_text'    => 'Buy Now',

    );

    /**
     * Constructor
     */
    public function __construct() {

        add_action(
            'admin_init',
            array( $this, 'register' )
        );

    }

    /**
     * Register Settings
     */
    public function register() {

        register_setting(

            'bso_settings_group',

            'bso_settings',

            array(
                'sanitize_callback' => array( $this, 'sanitize' ),
                'default'           => $this->defaults,
            )

        );

        add_settings_section(

            'bso_general',

            __( 'General Settings', 'bazario-smart-order' ),

            '__return_false',

            'bazario-smart-order'

        );

        /*
        |--------------------------------------------------------------------------
        | Text Fields
        |--------------------------------------------------------------------------
        */

        $this->text_field(
            'whatsapp_number',
            __( 'WhatsApp Number', 'bazario-smart-order' )
        );

        $this->text_field(
            'call_number',
            __( 'Call Number', 'bazario-smart-order' )
        );

        $this->text_field(
            'whatsapp_text',
            __( 'WhatsApp Button Text', 'bazario-smart-order' )
        );

        $this->text_field(
            'call_text',
            __( 'Call Button Text', 'bazario-smart-order' )
        );

        $this->text_field(
            'buy_now_text',
            __( 'Buy Now Button Text', 'bazario-smart-order' )
        );

        /*
        |--------------------------------------------------------------------------
        | Checkbox Fields
        |--------------------------------------------------------------------------
        */

        $this->checkbox_field(
            'enable_whatsapp',
            __( 'Enable WhatsApp', 'bazario-smart-order' )
        );

        $this->checkbox_field(
            'enable_call',
            __( 'Enable Call', 'bazario-smart-order' )
        );

        $this->checkbox_field(
            'enable_buy_now',
            __( 'Enable Buy Now', 'bazario-smart-order' )
        );

        $this->checkbox_field(
            'enable_floating',
            __( 'Enable Floating Buttons', 'bazario-smart-order' )
        );

    }

    /**
     * Register Text Field
     */
    private function text_field( $id, $label ) {

        add_settings_field(

            $id,

            $label,

            array( $this, 'text_callback' ),

            'bazario-smart-order',

            'bso_general',

            array(
                'id' => $id,
            )

        );

    }

    /**
     * Register Checkbox
     */
    private function checkbox_field( $id, $label ) {

        add_settings_field(

            $id,

            $label,

            array( $this, 'checkbox_callback' ),

            'bazario-smart-order',

            'bso_general',

            array(
                'id' => $id,
            )

        );

    }
        /**
     * Sanitize Settings
     */
    public function sanitize( $input ) {

        return array(

            'whatsapp_number' => sanitize_text_field(
                $input['whatsapp_number'] ?? ''
            ),

            'call_number' => sanitize_text_field(
                $input['call_number'] ?? ''
            ),

            'enable_whatsapp' => ! empty(
                $input['enable_whatsapp']
            ) ? 1 : 0,

            'enable_call' => ! empty(
                $input['enable_call']
            ) ? 1 : 0,

            'enable_buy_now' => ! empty(
                $input['enable_buy_now']
            ) ? 1 : 0,

            'enable_floating' => ! empty(
                $input['enable_floating']
            ) ? 1 : 0,

            'whatsapp_text' => sanitize_text_field(
                $input['whatsapp_text'] ?? 'WhatsApp Order'
            ),

            'call_text' => sanitize_text_field(
                $input['call_text'] ?? 'Call to Order'
            ),

            'buy_now_text' => sanitize_text_field(
                $input['buy_now_text'] ?? 'Buy Now'
            ),

        );

    }

    /**
     * Text Field Callback
     */
    public function text_callback( $args ) {

        $settings = self::get();

        $id = $args['id'];

        ?>

        <input
            type="text"
            class="regular-text"
            name="bso_settings[<?php echo esc_attr( $id ); ?>]"
            value="<?php echo esc_attr( $settings[ $id ] ?? '' ); ?>"
        />

        <?php

    }

    /**
     * Checkbox Callback
     */
    public function checkbox_callback( $args ) {

        $settings = self::get();

        $id = $args['id'];

        ?>

        <label>

            <input
                type="checkbox"
                name="bso_settings[<?php echo esc_attr( $id ); ?>]"
                value="1"
                <?php checked( ! empty( $settings[ $id ] ) ); ?>
            />

            <?php esc_html_e( 'Enable', 'bazario-smart-order' ); ?>

        </label>

        <?php

    }
        /**
     * Get Settings
     *
     * @return array
     */
    public static function get() {

        $defaults = array(
            'whatsapp_number' => '',
            'call_number'     => '',

            'enable_whatsapp' => 1,
            'enable_call'     => 1,
            'enable_buy_now'  => 1,
            'enable_floating' => 1,

            'whatsapp_text'   => 'WhatsApp Order',
            'call_text'       => 'Call to Order',
            'buy_now_text'    => 'Buy Now',
        );

        $settings = get_option( 'bso_settings', array() );

        return wp_parse_args( $settings, $defaults );

    }

    /**
     * Get Single Setting
     *
     * @param string $key
     * @param mixed  $default
     * @return mixed
     */
    public static function get_option( $key, $default = '' ) {

        $settings = self::get();

        return isset( $settings[ $key ] )
            ? $settings[ $key ]
            : $default;

    }

}