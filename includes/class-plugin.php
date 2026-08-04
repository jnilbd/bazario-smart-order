<?php

namespace Bazario\SmartOrder;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Plugin {

	public static function init() {
		$plugin = new self();
		$plugin->load();
	}

	private function load() {

		require_once BSO_PLUGIN_PATH . 'includes/class-loader.php';
		require_once BSO_PLUGIN_PATH . 'admin/class-admin.php';
		require_once BSO_PLUGIN_PATH . 'public/class-public.php';

		new Loader();
		new Admin();
		new Public_Class();
	}
}