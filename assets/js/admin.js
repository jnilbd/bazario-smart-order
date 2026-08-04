/**
 * =====================================================
 * Bazario Smart Order
 * Admin Script
 * Version: 2.0.0
 * =====================================================
 */

(function ($) {

    'use strict';

    $(document).ready(function () {

        console.log('Bazario Smart Order Admin Loaded');

        // Reset confirmation
        $('.bso-reset').on('click', function (e) {

            if (!confirm('Are you sure you want to reset all settings?')) {
                e.preventDefault();
            }

        });

        // Save notice
        $('form').on('submit', function () {

            console.log('Saving Bazario Smart Order Settings...');

        });

        // Enable / Disable dependent fields
        $('input[type="checkbox"]').on('change', function () {

            console.log($(this).attr('name') + ' : ' + ($(this).is(':checked') ? 'Enabled' : 'Disabled'));

        });

    });

})(jQuery);