<?php
/**
 * Plugin Name: Custom Post Types
 * Description: Plugin to register custom post types for this website. Do not disable this plugin unless you know what you're doing.
 * Version:     1.0.0
 * Author:      Chance Digital
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Constants
define( 'CHANCE_DIGITAL_CPT_VERSION', '1.0.0' );
define( 'CHANCE_DIGITAL_CPT_PATH', plugin_dir_path( __FILE__ ) );
define( 'CHANCE_DIGITAL_CPT_INC', CHANCE_DIGITAL_CPT_PATH . 'inc/' );
define( 'CHANCE_DIGITAL_CPT_NAMESPACE', 'ChanceDigital\\CPT' );

// Composer classes.
require_once __DIR__ . '/vendor/autoload.php';

// Import function files.
$files = [
	'autoload',
	'compatibility',
];
foreach ( $files as $file ) {
	require_once __DIR__ . "/inc/$file/$file.php";
}
