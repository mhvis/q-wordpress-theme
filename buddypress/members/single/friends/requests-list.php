<ul id="friend-list" class="item-list bp-objects-loop members-list type-list">
	<?php while ( bp_members() ) : bp_the_member(); ?>

		<li id="friendship-<?php bp_friend_friendship_id(); ?>">
			<div class="item-avatar col-md-2 col-sm-2 col-xs-2">
				<a href="<?php bp_member_link(); ?>"><?php bp_member_avatar('type=full&width=130'); ?></a>
			</div>

			<div class="item col-md-10 col-sm-10 col-xs-10">
				<div class="item-title mg-bottom-10">
					<a href="<?php bp_member_link(); ?>"><?php bp_member_name(); ?></a>
				</div>
				<div class="item-meta">
					<span class="activity"><?php bp_member_last_active(); ?></span>
				</div>
				<?php

				/**
				 * Removed bp_member_last_active().
				 *
				 * Updated By: Jasper
				 *
				 * @since 1.0
				 */
				 ?>

				<?php
				/**
				 * Fires inside the display of a member friend request item.
				 *
				 * @since 1.1.0
				 */
				do_action( 'bp_friend_requests_item' );
				?>
				<div class="action">
					<a class="button accept" href="<?php bp_friend_accept_request_link(); ?>"><?php esc_html_e( 'Accept', 'flocks' ); ?></a>

					<a class="button reject" href="<?php bp_friend_reject_request_link(); ?>"><?php esc_html_e( 'Reject', 'flocks' ); ?></a>

					<?php

					/**
					* Fires inside the member friend request actions markup.
					*
					* @since 1.1.0
					*/
					do_action( 'bp_friend_requests_item_action' ); ?>
				</div>
			</div>

			<div class="clear"></div>
		</li>

	<?php endwhile; ?>
</ul>
