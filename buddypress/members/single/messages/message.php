<?php
/**
 * BuddyPress - Private Message Content.
 *
 * This template is used in /messages/single.php during the message loop to
 * display each message and when a new message is created via AJAX.
 *
 * @since 2.4.0
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>

<div class="message-box <?php bp_the_thread_message_css_class(); ?>">

	<div class="row mg-bottom-35">
		<div class="col-sm-2">
			<div class="message-metadata">
				<?php
				/**
				 * Fires before the single message header is displayed.
				 *
				 * @since 1.1.0
				 */
				do_action( 'bp_before_message_meta' ); ?>

				<?php bp_the_thread_message_sender_avatar( 'type=thumb&width=180&height=180' ); ?>

				<div class="message-sender-name">

					<?php if ( bp_get_the_thread_message_sender_link() ) : ?>
						<strong><a href="<?php bp_the_thread_message_sender_link(); ?>" title="<?php bp_the_thread_message_sender_name(); ?>"><?php bp_the_thread_message_sender_name(); ?></a></strong>
					<?php else : ?>
						<strong><?php bp_the_thread_message_sender_name(); ?></strong>
					<?php endif; ?>
				
				</div>

				<?php

				/**
				 * Fires after the single message header is displayed.
				 *
				 * @since 1.1.0
				 */
				do_action( 'bp_after_message_meta' ); ?>

			</div><!-- .message-metadata -->
		</div>
		<div class="col-sm-9">
			<?php
			/**
			 * Fires before the message content for a private message.
			 *
			 * @since 1.1.0
			 */
			do_action( 'bp_before_message_content' ); ?>

			<div class="message-content">

				<?php bp_the_thread_message_content(); ?>

			</div><!-- .message-content -->

			<span class="activity"><small>&mdash; <?php bp_the_thread_message_time_since(); ?></small></span>

			<?php

			/**
			 * Fires after the message content for a private message.
			 *
			 * @since 1.1.0
			 */
			do_action( 'bp_after_message_content' ); ?>
		</div>

		<div class="col-sm-1">
			<?php if ( bp_is_active( 'messages', 'star' ) ) : ?>
				<div class="message-star-actions">
					<?php bp_the_message_star_action_link(); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>



	<div class="clear"></div>

</div><!-- .message-box -->
