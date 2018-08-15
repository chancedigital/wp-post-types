<?php
/**
 * Team member CPT.
 *
 * @package   chancedigital
 */

namespace ChanceDigital\CPT\Post_Types;

use Cedaro\WP\Plugin\AbstractHookProvider;
use PostTypes\PostType;

/**
 * The team member post type class
 */
class Team_Member extends AbstractHookProvider {

	public $slug = 'team-member';

	public function register_hooks() {
		$this->post_types();
	}

	protected function post_types() {
		$options = [
			'rewrite'     => [
				'with_front' => false,
				'slug'       => 'meet-the-team',
			],
			'has_archive' => true,
		];

		$cpt = new PostType( $this->slug, $options );
		$cpt->register();

		// Add custom fields.
		// @link https://www.advancedcustomfields.com/resources/register-fields-via-php
		if ( function_exists( '\\acf_add_local_field_group' ) ) :

			// Team options field group.
			$acf_team_options_location = [
				[
					[
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => $this->slug,
					],
				],
			];

			$acf_team_options_fields = [

				// Job title field.
				[
					'key'               => 'team_member_job_title',
					'label'             => 'Job title',
					'name'              => 'job_title',
					'type'              => 'text',
					'required'          => 0,
					'conditional_logic' => 0,
				],
			];

			\acf_add_local_field_group( [
				'key'                   => 'team_member_options',
				'title'                 => 'Team member options',
				'fields'                => $acf_team_options_fields,
				'location'              => $acf_team_options_location,
				'menu_order'            => 0,
				'position'              => 'side',
				'style'                 => 'default',
			] );

		endif;
	}
}
