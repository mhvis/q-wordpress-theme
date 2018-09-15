<?php
/**
 * BuddyPress - Members Loop
 *
 * Querystring is set via AJAX in _inc/ajax.php - bp_legacy_theme_object_filter()
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

/**
 * Fires before the display of the members loop.
 *
 * @since 1.2.0
 */
do_action( 'bp_before_members_loop' ); ?>

<?php if ( bp_get_current_member_type() ) : ?>
	<p class="current-member-type"><?php bp_current_member_type_message() ?></p>
<?php endif; ?>

<?php if ( bp_has_members( bp_ajax_querystring( 'members' ) ) ) : ?>

	<div id="pag-top" class="pagination">

		<div class="pag-count" id="member-dir-count-top"><?php bp_members_pagination_count(); ?></div>

		<div class="list-style-container">

			<ul>
				<li id="list-style-list">
					<a href="?members_view=list" title="<?php esc_attr_e('View as List', 'flocks'); ?>">
						<i class="fa fa-align-justify"></i>
					</a>
				</li>
				<li id="list-style-grid">
					<a href="?members_view=grid" title="<?php esc_attr_e('View as Grid', 'flocks'); ?>">
						<i class="fa fa-th"></i>
					</a>
				</li>
			</ul>

		</div>

		<?php

		/**
		 * Remove the top bp_members_pagination_links().
		 *
		 * Updated By: Jasper
		 *
		 * @since 1.0
		 */
		?>

	</div>

	<?php

	/**
	 * Fires before the display of the members list.
	 *
	 * @since 1.1.0
	 */
	do_action( 'bp_before_directory_members_list' ); ?>


	<?php

	/**
	 * Modified the members loop to display grid and list layout.
	 *
	 * Updated By: Jasper
	 *
	 * @since 1.0
	 */
	 $view = flocks_bp_get_current_directory_view();
	 bp_get_template_part( 'members/members', $view['members'] ); ?>


	<?php

	/**
	 * Fires after the display of the members list.
	 *
	 * @since 1.1.0
	 */
	do_action( 'bp_after_directory_members_list' ); ?>

	<?php bp_member_hidden_fields(); ?>

	<div id="pag-bottom" class="pagination">


		<?php

		/**
		 * Remove the bottom bp_members_pagination_count().
		 *
		 * Updated By: Jasper
		 *
		 * @since 1.0
		 */
		?>

		<div class="pagination-links" id="member-dir-pag-bottom">

			<?php bp_members_pagination_links(); ?>

		</div>

	</div>

<?php else: ?>

	<div id="message" class="info">
		<p><?php esc_html_e( "Sorry, no members were found.", 'flocks' ); ?></p>
	</div>

<?php endif; ?>

<?php

/**
 * Fires after the display of the members loop.
 *
 * @since 1.2.0
 */
do_action( 'bp_after_members_loop' ); ?>
