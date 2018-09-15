<?php
/**
 * BuddyPress - Activity Stream Comment
 *
 * This template is used by bp_activity_comments() functions to show
 * each activity.
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

/**
 * Fires before the display of an activity comment.
 *
 * @since 1.5.0
 */
do_action( 'bp_before_activity_comment' ); ?>

<li id="acomment-<?php bp_activity_comment_id(); ?>">

	<div class="acomment-inner">

		<div class="row">
			<div class="col-sm-1">
				<div class="acomment-avatar">
					<a href="<?php bp_activity_comment_user_link(); ?>">
						<?php bp_activity_avatar( 'type=thumb&user_id=' . bp_get_activity_comment_user_id() ); ?>
					</a>
				</div>
			</div>
			<div class="col-sm-11">
				<?php
				/**
				 * Remove this section and replace the markup.
				 *
				 * Updated By: Jasper
				 *
				 * @since 1.0
				 */
				 ?>
				<?php // <div class="acomment-meta"> ?>
					<?php
					/* translators: 1: user profile link, 2: user name, 3: activity permalink, 4: activity timestamp */
					// printf( esc_html__( '<a href="%1$s">%2$s</a> replied <a href="%3$s" class="activity-time-since"><span class="time-since">%4$s</span></a>', 'flocks' ), bp_get_activity_comment_user_link(), bp_get_activity_comment_name(), bp_get_activity_comment_permalink(), bp_get_activity_comment_date_recorded() );
					?>
				<?php // </div> ?>

				<?php

				/**
				 * Added this markup to display bp_get_activity_comment_name()
				 * and bp_get_activity_comment_content().
				 *
				 * Updated By: Jasper
				 *
				 * @since 1.0
				 */
				 ?>
				<div class="acomment-content">
					<p>
						<?php
							$activity_comment = bp_get_activity_comment_content();

							$strip_activity_comment = flocks_sanity_check( $activity_comment );

							/* translators: 1: user profile link, 2: user name, 3: activity permalink, 4: activity timestamp */
							printf( __( '<a href="%1$s" class="acomment-meta">%2$s</a>', 'flocks' ), bp_get_activity_comment_user_link(), bp_get_activity_comment_name(), bp_get_activity_comment_permalink(), '' );

							echo wpautop( $strip_activity_comment );
						?>
					</p>
				</div>
			</div>
		</div>

		<?php

		/**
		 * Remove this section and replace the markup.
		 *
		 * Updated By: Jasper
		 *
		 * @since 1.0
		 */
		 ?>
		<?php // <div class="acomment-content"> <?php // bp_activity_comment_content(); ? > </div> ?>

		<div class="acomment-options">

			<?php

			/**
			 * Added this markup to display bp_activity_comment_date_recorded()
			 *
			 * Updated By: Jasper
			 *
			 * @since 1.0
			 */
			 ?>
			<div class="comment-date">
				<a href="<?php echo esc_url( bp_get_activity_comment_permalink() ); ?>">
					<?php bp_activity_comment_date_recorded(); ?>
				</a>
			</div>

			<?php if ( is_user_logged_in() && bp_activity_can_comment_reply( bp_activity_current_comment() ) ) : ?>

				<a href="#acomment-<?php bp_activity_comment_id(); ?>" class="acomment-reply bp-primary-action" id="acomment-reply-<?php bp_activity_id(); ?>-from-<?php bp_activity_comment_id(); ?>"><?php esc_html_e( 'Reply', 'flocks' ); ?></a>

			<?php endif; ?>

			<?php if ( bp_activity_user_can_delete() ) : ?>

				<a href="<?php bp_activity_comment_delete_link(); ?>" class="delete acomment-delete confirm bp-secondary-action" rel="nofollow"><?php esc_html_e( 'Delete', 'flocks' ); ?></a>

			<?php endif; ?>

			<?php

			/**
			 * Fires after the defualt comment action options display.
			 *
			 * @since 1.6.0
			 */
			do_action( 'bp_activity_comment_options' ); ?>

		</div>

	</div>

		<?php bp_activity_recurse_comments( bp_activity_current_comment() ); ?>

</li>

<?php

/**
 * Fires after the display of an activity comment.
 *
 * @since 1.5.0
 */
do_action( 'bp_after_activity_comment' ); ?>
