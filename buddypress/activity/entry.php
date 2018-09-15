<?php
/**
 * BuddyPress - Activity Stream (Single Item)
 *
 * This template is used by activity-loop.php and AJAX functions to show
 * each activity.
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

/**
 * Fires before the display of an activity entry.
 *
 * @since 1.2.0
 */
do_action( 'bp_before_activity_entry' ); ?>

<li class="<?php bp_activity_css_class(); ?>" id="activity-<?php bp_activity_id(); ?>">
	<div class="activity-avatar">
		<div class="row">
			<div class="col-sm-1 col-xs-2">
				<div class="activity-avatar-image">
					<a href="<?php bp_activity_user_link(); ?>">
						<?php bp_activity_avatar(); ?>
					</a>
				</div>
			</div>
			<div class="col-sm-11 col-xs-10">
				<div class="activity-header">

					<?php bp_activity_action(); ?>

				</div>
			</div>
		</div>
	</div><!--.activity-avatar-->

	<div class="activity-content">

		<?php if ( bp_activity_has_content() ) : ?>

			<div class="activity-inner">

				<?php bp_activity_content_body(); ?>

			</div>

		<?php endif; ?>

		<?php

		/**
		 * Fires after the display of an activity entry content.
		 *
		 * @since 1.2.0
		 */
		do_action( 'bp_activity_entry_content' ); ?>

		<div class="activity-meta">

			<?php if ( bp_get_activity_type() == 'activity_comment' ) : ?>

				<a href="<?php bp_activity_thread_permalink(); ?>" class="button view bp-secondary-action" title="<?php esc_attr_e( 'View Conversation', 'flocks' ); ?>"><?php esc_html_e( 'View Conversation', 'flocks' ); ?></a>

			<?php endif; ?>

			<?php if ( is_user_logged_in() ) : ?>

				<?php if ( bp_activity_can_comment() ) : ?>

					<a href="<?php bp_activity_comment_link(); ?>" class="button acomment-reply bp-primary-action" id="acomment-comment-<?php bp_activity_id(); ?>">

						<?php printf( esc_html__( 'Comment %s', 'flocks' ), '<span>' . bp_activity_get_comment_count() . '</span>' ); ?>
						
					</a>

				<?php endif; ?>

				<?php

				/**
				 * Contained the markup inside '.right-activity-meta'.
				 *
				 * Updated By: Jasper
				 *
				 * @since 1.0
				 */
				?>
				<div class="right-activity-meta">

					<?php if ( bp_activity_can_favorite() ) : ?>

						<?php if ( !bp_get_activity_is_favorite() ) : ?>

							<a href="<?php bp_activity_favorite_link(); ?>" class="button fav bp-secondary-action" title="<?php esc_attr_e( 'Add to Favorite', 'flocks' ); ?>"><?php esc_html_e( 'Add to Favorite', 'flocks' ); ?></a>

						<?php else : ?>

							<a href="<?php bp_activity_unfavorite_link(); ?>" class="button unfav bp-secondary-action" title="<?php esc_attr_e( 'Remove Favorite', 'flocks' ); ?>"><?php esc_html_e( 'Remove Favorite', 'flocks' ); ?></a>

						<?php endif; ?>

					<?php endif; ?>

					<?php if ( bp_activity_user_can_delete() ) bp_activity_delete_link(); ?>

				</div>

				<?php

				/**
				 * Fires at the end of the activity entry meta data area.
				 *
				 * @since 1.2.0
				 */
				do_action( 'bp_activity_entry_meta' ); ?>

			<?php endif; ?>

		</div>

	</div>

	<?php

	/**
	 * Fires before the display of the activity entry comments.
	 *
	 * @since 1.2.0
	 */
	do_action( 'bp_before_activity_entry_comments' ); ?>

	<?php if ( ( bp_activity_get_comment_count() || bp_activity_can_comment() ) || bp_is_single_activity() ) : ?>

		<div class="activity-comments">

			<?php bp_activity_comments(); ?>

			<?php if ( is_user_logged_in() && bp_activity_can_comment() ) : ?>

				<form action="<?php bp_activity_comment_form_action(); ?>" method="post" id="ac-form-<?php bp_activity_id(); ?>" class="ac-form"<?php bp_activity_comment_form_nojs_display(); ?>>

					<div class="ac-reply-avatar"><?php bp_loggedin_user_avatar( 'width=' . BP_AVATAR_THUMB_WIDTH . '&height=' . BP_AVATAR_THUMB_HEIGHT ); ?></div>
					<div class="ac-reply-content">
						<div class="ac-textarea">
							<label for="ac-input-<?php bp_activity_id(); ?>" class="bp-screen-reader-text"><?php
								/* translators: accessibility text */
								esc_html_e( 'Comment', 'flocks' );
							?></label>

							<?php

							/**
							 * Added a place holder to the textbox.
							 *
							 * Updated By: Jasper
							 *
							 * @since 1.0
							 */
							?>
							<textarea id="ac-input-<?php bp_activity_id(); ?>" class="ac-input bp-suggestions" name="ac_input_<?php bp_activity_id(); ?>" placeholder="<?php echo esc_html__( 'Write a comment ....', 'flocks' ) ?>"></textarea>

							<?php

							/**
							* Contained the submit button inside '.ac_form_submit'.
							*
							* Updated By: Jasper
							*
							* @since 1.0
							*/
							?>
							<div class="ac_form_submit">
								<div class="ac_form_submit_inner">
									<input type="submit" name="ac_form_submit" value="<?php esc_attr_e( 'Post', 'flocks' ); ?>" />
									<i class="fa fa-paper-plane"></i>
								</div>
							</div>
							<a href="#" class="ac-reply-cancel"><?php esc_html_e( 'Cancel', 'flocks' ); ?></a>
							<input type="hidden" name="comment_form_id" value="<?php bp_activity_id(); ?>" />
						</div>


					</div>

					<?php

					/**
					 * Fires after the activity entry comment form.
					 *
					 * @since 1.5.0
					 */
					do_action( 'bp_activity_entry_comments' ); ?>

					<?php wp_nonce_field( 'new_activity_comment', '_wpnonce_new_activity_comment' ); ?>

				</form>

			<?php endif; ?>

		</div>

	<?php endif; ?>

	<?php

	/**
	 * Fires after the display of the activity entry comments.
	 *
	 * @since 1.2.0
	 */
	do_action( 'bp_after_activity_entry_comments' ); ?>

</li>

<?php

/**
 * Fires after the display of an activity entry.
 *
 * @since 1.2.0
 */
do_action( 'bp_after_activity_entry' ); ?>
