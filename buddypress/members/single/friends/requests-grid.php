<ul id="friend-list" class="item-list bp-objects-loop members-grid type-grid">
	<?php while ( bp_members() ) : bp_the_member(); ?>

		<li id="friendship-<?php bp_friend_friendship_id(); ?>">
			<div class="item-avatar">
				<a href="<?php bp_member_link(); ?>"><?php bp_member_avatar('type=full&width=130'); ?></a>
			</div>

			<div class="item">
				<div class="item-title mg-bottom-10">
					<div class="mg-top-20 mg-bottom-20">
						<a href="<?php bp_member_link(); ?>"><?php bp_member_name(); ?></a>
					</div>
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
			</div>

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
		</li>

	<?php endwhile; ?>
</ul>
