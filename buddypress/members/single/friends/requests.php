<?php
/**
 * BuddyPress - Members Friends Requests
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

/**
 * Fires before the display of member friend requests content.
 *
 * @since 1.2.0
 */
do_action( 'bp_before_member_friend_requests_content' ); ?>

<?php if ( bp_has_members( 'type=alphabetical&include=' . bp_get_friendship_requests() ) ) : ?>

	<div id="pag-top" class="pagination no-ajax">

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
		 * Removed bp_members_pagination_links().
		 *
		 * Updated By: Jasper
		 *
		 * @since 1.0
		 */
		 ?>

	</div>

	<?php

	/**
	 * Modified the friend request loop to display grid and list layout.
	 *
	 * Updated By: Jasper
	 *
	 * @since 1.0
	 */
	 $view = flocks_bp_get_current_directory_view();

	 bp_get_template_part( 'members/single/friends/requests', $view['members'] ); ?>

	<?php

	/**
	 * Fires and displays the member friend requests content.
	 *
	 * @since 1.1.0
	 */
	do_action( 'bp_friend_requests_content' ); ?>

	<div id="pag-bottom" class="pagination no-ajax">

		<?php

		/**
		 * Removed bp_members_pagination_count().
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
		<p><?php esc_html_e( 'You have no pending friendship requests.', 'flocks' ); ?></p>
	</div>

<?php endif;?>

<?php

/**
 * Fires after the display of member friend requests content.
 *
 * @since 1.2.0
 */
do_action( 'bp_after_member_friend_requests_content' ); ?>
