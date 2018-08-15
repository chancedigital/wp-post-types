<?php
/**
 * Environment ompatibility checks and notices.
 *
 * @package chancedigital
 */

namespace ChanceDigital\CPT\Compatibility;

/**
 * Class for checking environment compatibility.
 */
class Compatibility_Checker {
	/**
	 * Minimum PHP version.
	 *
	 * @var string
	 */
	const MINIMUM_PHP_VERSION = '7.1';

	/**
	 * Minimum WordPress version.
	 *
	 * @var string
	 */
	const MINIMUM_WORDPRESS_VERSION = '4.9';

	/**
	 * Display a notice about the minimum PHP version supported.
	 */
	public static function display_php_version_notice() {
		$notice = sprintf(
			/* translators: Minimum version of PHP required compared to the version in use. */
			esc_html__( 'The Post Types plugin requires PHP %1$s or later to run. Your current version is %2$s.', 'chancedigital-post-types' ),
			self::MINIMUM_PHP_VERSION,
			phpversion()
		);

		self::display_notice( $notice );
	}

	/**
	 * Display a notice about the minimum WordPress version supported.
	 */
	public static function display_wordpress_version_notice() {
		$notice = sprintf(
			/* translators: Minimum version of WordPress required compared to the version in use. */
			esc_html__( 'The Post Types plugin requires WordPress %1$s or later to run. Your current version is %2$s.', 'chancedigital-post-types' ),
			self::MINIMUM_WORDPRESS_VERSION,
			$GLOBALS['wp_version']
		);

		self::display_notice( $notice );
	}

	/**
	 * Display an admin notice.
	 *
	 * @param string $message Message to print.
	 * @param string $type    Type of notice.
	 */
	protected static function display_notice( $message, $type = 'error' ) {
		?>
		<div class="chancedigital-post-types-compatibility-notice notice notice-<?php echo esc_attr( $type ); ?>">
			<p>
				<?php
				echo wp_kses( $message, [
					'a' => [ 'href' => true ],
				] );
				?>
			</p>
		</div>
		<?php
	}
}
