<?php
/**
 * BuddyPress - Members Notifications Loop
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>
<form action="" method="post" id="notifications-bulk-management">
	<table class="notifications">
		<thead>
			<tr>
				<?php
				/**
				* Remove first th tag.
				* Remove notification select all checkbox label.
				* By Jasper
				* @since 1.0
				*/
				?>
				<th class="bulk-select-all">
					<input id="select-all-notifications" type="checkbox">
				</th>
				<th class="title"><?php esc_html_e( 'Notification', 'flocks' ); ?></th>
				<th class="date"><?php esc_html_e( 'Date Received', 'flocks' ); ?></th>
				<th class="actions"><?php esc_html_e( 'Actions',    'flocks' ); ?></th>
			</tr>
		</thead>

		<tbody>

			<?php while ( bp_the_notifications() ) : bp_the_notification(); ?>

				<tr>
					<?php
					/**
					 * Remove first td tag.
					 * Remove notification select checkbox label.
					 * By Jasper
					 * @since 1.0
					 */
					 ?>
					<td class="bulk-select-check">
						<input id="<?php bp_the_notification_id(); ?>" type="checkbox" name="notifications[]" value="<?php bp_the_notification_id(); ?>" class="notification-check">
					</td>
					<td class="notification-description"><?php bp_the_notification_description();  ?></td>
					<td class="notification-since"><?php bp_the_notification_time_since();   ?></td>
					<td class="notification-actions"><?php bp_the_notification_action_links(); ?></td>
				</tr>

			<?php endwhile; ?>

		</tbody>
	</table>

	<div class="notifications-options-nav">
		<?php bp_notifications_bulk_management_dropdown(); ?>
	</div><!-- .notifications-options-nav -->

	<?php wp_nonce_field( 'notifications_bulk_nonce', 'notifications_bulk_nonce' ); ?>
</form>
