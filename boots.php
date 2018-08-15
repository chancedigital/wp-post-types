<?php
/**
 * Plugin bootstrap.
 *
 * @package chancedigital
 */

use Cedaro\WP\Plugin\Container;
use Cedaro\WP\Plugin\PluginFactory;
use Cedaro\WP\Plugin\Provider\I18n;
use ChanceDigital\CPT\Post_Types\Team_Member;
use ChanceDigital\CPT\Service_Provider;

// Create the main plugin instance.
$chancedigital_post_types = PluginFactory::create(
	'chancedigital-post-types',
	__DIR__ . '/chancedigital-post-types.php'
);

// Register a service provider.
$chancedigital_post_types
	->get_container()
	->register( new Service_Provider() );

// Register hook providers.
$chancedigital_post_types->register_hooks( new Team_Member() );
