<?php
/**
 * BuddyPress - Members Single Messages Compose
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>
<form action="<?php bp_messages_form_action('compose' ); ?>" method="post" id="send_message_form" class="standard-form" enctype="multipart/form-data">

	<?php

	/**
	 * Fires before the display of message compose content.
	 *
	 * @since 1.1.0
	 */
	do_action( 'bp_before_messages_compose_content' ); ?>


	<ul class="first acfb-holder">
		<li class="flocks-compose-container send-to">
			<?php bp_message_get_recipient_tabs(); ?>

			<?php

			/**
			 * Remove label
		 	 *
		 	 * By: Jasper
			 * @since 1.1.0
			 */
			 ?>
			<input type="text" name="send-to-input" class="send-to-input" id="send-to-input" placeholder="<?php esc_attr_e("Send To (Username or Friend's Name)", 'flocks' ); ?>" />
		</li>
	</ul>

	<?php if ( bp_current_user_can( 'bp_moderate' ) ) : ?>
		<p class="notice"><label for="send-notice"><input type="checkbox" id="send-notice" name="send-notice" value="1" /> <?php esc_html_e( "This is a notice to all users.", 'flocks' ); ?></label></p>
	<?php endif; ?>

	<div class="flocks-compose-container subject">
		<?php

		/**
		 * Remove label and contain to a container
		 *
		 * By: Jasper
		 * @since 1.1.0
		 */
		 ?>
		<input type="text" name="subject" id="subject" placeholder="<?php esc_attr_e( 'Subject', 'flocks' ); ?>" value="<?php bp_messages_subject_value(); ?>" />
	</div>

	<div class="flocks-compose-container message">
		<?php

		/**
		 * Remove label and contain to a container
		 *
		 * By: Jasper
		 * @since 1.1.0
		 */
		 ?>
		 <textarea name="content" id="message_content" placeholder="<?php esc_attr_e( 'Message', 'flocks' ); ?>" rows="15" cols="40"><?php bp_messages_content_value(); ?></textarea>
	</div>

	<input type="hidden" name="send_to_usernames" id="send-to-usernames" value="<?php bp_message_get_recipient_usernames(); ?>" class="<?php bp_message_get_recipient_usernames(); ?>" />

	<?php

	/**
	 * Fires after the display of message compose content.
	 *
	 * @since 1.1.0
	 */
	do_action( 'bp_after_messages_compose_content' ); ?>

	<div class="submit">
		<input type="submit" value="<?php esc_attr_e( "Send Message", 'flocks' ); ?>" name="send" id="send" />
	</div>

	<?php wp_nonce_field( 'messages_send_message' ); ?>
</form>
