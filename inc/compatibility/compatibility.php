<?php

namespace ChanceDigital\CPT\Compatibility;

/**
 * Load the plugin or display a notice about requirements.
 */
if ( version_compare( phpversion(), Compatibility_Checker::MINIMUM_PHP_VERSION, '<' ) ) {

	$action = is_multisite() ? 'network_admin_notices' : 'admin_notices';
	add_action( $action, [ __NAMESPACE__ . '\\Compatibility_Checker', 'display_php_version_notice' ] );

} elseif ( version_compare( $GLOBALS['wp_version'], Compatibility_Checker::MINIMUM_WORDPRESS_VERSION, '<' ) ) {

	$action = is_multisite() ? 'network_admin_notices' : 'admin_notices';
	add_action( $action, [ __NAMESPACE__ . '\\Compatibility_Checker', 'display_wordpress_version_notice' ] );

} else {
	require_once CHANCE_DIGITAL_CPT_PATH . 'boots.php';
}
