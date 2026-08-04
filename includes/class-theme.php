<?php

namespace Bazario\SmartOrder;

defined( 'ABSPATH' ) || exit;

/**
 * Theme Compatibility
 *
 * @package BazarioSmartOrder
 */
class Theme {

    /**
     * Is WoodMart Theme
     */
    public static function is_woodmart() {

        $theme = wp_get_theme();

        return (
            stripos( $theme->get( 'Name' ), 'WoodMart' ) !== false ||
            stripos( $theme->get_template(), 'woodmart' ) !== false
        );

    }

    /**
     * Is Astra Theme
     */
    public static function is_astra() {

        $theme = wp_get_theme();

        return (
            stripos( $theme->get( 'Name' ), 'Astra' ) !== false ||
            stripos( $theme->get_template(), 'astra' ) !== false
        );

    }

    /**
     * Is Hello Elementor
     */
    public static function is_hello() {

        $theme = wp_get_theme();

        return (
            stripos( $theme->get( 'Name' ), 'Hello' ) !== false ||
            stripos( $theme->get_template(), 'hello-elementor' ) !== false
        );

    }

    /**
     * Current Theme
     */
    public static function current() {

        if ( self::is_woodmart() ) {
            return 'woodmart';
        }

        if ( self::is_astra() ) {
            return 'astra';
        }

        if ( self::is_hello() ) {
            return 'hello';
        }

        return 'default';

    }

}