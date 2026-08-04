<?php

namespace Bazario\SmartOrder;

defined( 'ABSPATH' ) || exit;

class Admin {

    public function __construct() {

        add_action( 'admin_menu', [ $this, 'register_menu' ] );

    }

    /**
     * Register Admin Menu
     */
    public function register_menu() {

        add_menu_page(
            'Bazario Smart Order',
            'Smart Order',
            'manage_options',
            'bazario-smart-order',
            [ $this, 'settings_page' ],
            'dashicons-cart',
            56
        );

    }

    /**
     * Settings Page
     */
    public function settings_page() {
        ?>
        <div class="wrap">
            <h1>Bazario Smart Order</h1>

            <form method="post" action="options.php">

                <?php
                settings_fields( 'bso_settings_group' );
                do_settings_sections( 'bazario-smart-order' );
                submit_button( 'Save Settings' );
                ?>

            </form>
        </div>
        <?php
    }

}
