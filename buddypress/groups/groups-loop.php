<?php
/**
 * BuddyPress - Groups Loop
 *
 * Querystring is set via AJAX in _inc/ajax.php - bp_legacy_theme_object_filter().
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>

<?php

/**
 * Fires before the display of groups from the groups loop.
 *
 * @since 1.2.0
 */
do_action( 'bp_before_groups_loop' ); ?>

<?php if ( bp_has_groups( bp_ajax_querystring( 'groups' ) ) ) : ?>

	<div id="pag-top" class="pagination mg-top-20 mg-bottom-15">

		<div class="pag-count" id="group-dir-count-top">

			<?php bp_groups_pagination_count(); ?>

		</div>


		<?php

		/**
		 * Modified this section and do_action the
		 * bp_groups_directory_group_filter() function.
		 *
		 * Updated By: Jasper
		 *
		 * @since 1.0
		 */
		?>
		<div class="list-style-container">

			<ul>
				<?php do_action( 'bp_groups_directory_group_filter' ); ?>
				<li id="list-style-list">
					<a href="?groups_view=list" title="<?php esc_attr_e('View as List', 'flocks'); ?>">
						<i class="fa fa-align-justify"></i>
					</a>
				</li>
				<li id="list-style-grid">
					<a href="?groups_view=grid" title="<?php esc_attr_e('View as Grid', 'flocks'); ?>">
						<i class="fa fa-th"></i>
					</a>
				</li>
			</ul>

		</div>

		<?php

		/**
		 * Remove the top bp_groups_pagination_links().
		 *
		 * Updated By: Jasper
		 *
		 * @since 1.0
		 */
		?>

	</div>

	<?php

	/**
	 * Fires before the listing of the groups list.
	 *
	 * @since 1.1.0
	 */
	do_action( 'bp_before_directory_groups_list' ); ?>

	<?php

	/**
	 * Modified the groups loop to display grid and list layout.
	 *
	 * Updated By: Jasper
	 *
	 * @since 1.0
	 */
	 //print_r( flocks_bp_get_current_directory_view() );

	 $view = flocks_bp_get_current_directory_view();

	 bp_get_template_part( 'groups/groups', $view['groups'] ); ?>

	<?php

	/**
	 * Fires after the listing of the groups list.
	 *
	 * @since 1.1.0
	 */
	do_action( 'bp_after_directory_groups_list' ); ?>

	<div id="pag-bottom" class="pagination">

		<?php

		/**
		 * Remove the bottom bp_groups_pagination_count().
		 *
		 * Updated By: Jasper
		 *
		 * @since 1.0
		 */
		?>

		<div class="pagination-links" id="group-dir-pag-bottom">

			<?php bp_groups_pagination_links(); ?>

		</div>

	</div>

<?php else: ?>

	<div id="message" class="info">
		<p><?php esc_html_e( 'There were no groups found.', 'flocks' ); ?></p>
	</div>

<?php endif; ?>

<?php

/**
 * Fires after the display of groups from the groups loop.
 *
 * @since 1.2.0
 */
do_action( 'bp_after_groups_loop' ); ?>
