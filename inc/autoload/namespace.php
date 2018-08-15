<?php
/**
 * Custom navigation walker for the topnav menu.
 *
 * @package chancedigital-post-types
 */

namespace ChanceDigital\CPT\Autoload;

/**
 * Class autoloader for WP standard filenames.
 *
 * @param  string $class Qualified class name.
 */
function autoload( string $class ) {

	// If the $class_name does not include our namespace, GTFO.
	if ( false === strpos( $class, CHANCE_DIGITAL_CPT_NAMESPACE ) ) {
		return;
	}

	$base_namespace_parts = explode( '\\', CHANCE_DIGITAL_CPT_NAMESPACE );
	$base_namespace_count = ( (int) count( $base_namespace_parts ) );
	$namespace_parts      = explode( '\\', $class );

	// Format parts to match filenames.
	$file_parts = array_map( function( $part ) {
		return str_replace( '_', '-', strtolower( $part ) );
	}, $namespace_parts );

	// Set up file path.
	$class_path = CHANCE_DIGITAL_CPT_INC;

	// If class uses sub-namespaces, we'll put them in matching sub-directories.
	$parts_to_check = $base_namespace_count + 1;
	if ( count( $namespace_parts ) > $parts_to_check ) {
		// Remove first array item (theme namespace) and last array item (filename).
		// Anything in between will go in the path.
		$class_path .= implode(
			DIRECTORY_SEPARATOR,
			array_slice(
				$file_parts,
				$base_namespace_count,
				count( $file_parts ) - $parts_to_check
			)
		) . '/';
	}

	// Construct file path + name.
	$file = $class_path . 'class-' . end( $file_parts ) . '.php';

	if ( file_exists( $file ) ) {
		require_once $file;
	} else {
		return;
	}
}
