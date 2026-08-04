<?php
defined( 'ABSPATH' ) || exit;
?>

<div class="wrap bso-admin">

    <h1 class="wp-heading-inline">
        🚀 Bazario Smart Order
    </h1>

    <p>
        Version <?php echo esc_html( BSO_VERSION ); ?>
    </p>

    <hr>

    <?php settings_errors(); ?>

    <form method="post" action="options.php">

        <?php
        settings_fields( 'bso_settings_group' );
        do_settings_sections( 'bazario-smart-order' );
        submit_button(
            __( 'Save Settings', 'bazario-smart-order' ),
            'primary',
            'submit',
            true
        );
        ?>

    </form>

    <hr>

    <div class="bso-card">

        <h2>System Information</h2>

        <table class="widefat striped">

            <tbody>

                <tr>
                    <td><strong>Plugin Version</strong></td>
                    <td><?php echo esc_html( BSO_VERSION ); ?></td>
                </tr>

                <tr>
                    <td><strong>WordPress</strong></td>
                    <td><?php echo esc_html( get_bloginfo( 'version' ) ); ?></td>
                </tr>

                <tr>
                    <td><strong>WooCommerce</strong></td>
                    <td>
                        <?php
                        echo class_exists( 'WooCommerce' )
                            ? '<span style="color:green;">✔ Active</span>'
                            : '<span style="color:red;">✘ Not Installed</span>';
                        ?>
                    </td>
                </tr>

                <tr>
                    <td><strong>PHP Version</strong></td>
                    <td><?php echo esc_html( PHP_VERSION ); ?></td>
                </tr>

            </tbody>

        </table>

    </div>

</div>