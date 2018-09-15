<?php
/**
 * BuddyPress - Forums
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>
<div id="buddypress">

	<?php

	/**
	 * Fires at the start of the forums template.
	 *
	 * @since 1.5.0
	 */
	do_action( 'bp_before_directory_forums' ); ?>

	<form action="" method="post" id="forums-search-form" class="dir-form">

		<?php

		/**
		 * Fires before the display of the forums content.
		 *
		 * @since 1.1.0
		 */
		do_action( 'bp_before_directory_forums_content' ); ?>

		<div id="forums-dir-search" class="dir-search">

			<?php bp_directory_forums_search_form(); ?>

		</div>
	</form>

	<?php

	/**
	 * Fires before the display of the forum topics.
	 *
	 * @since 1.5.0
	 */
	do_action( 'bp_before_topics' ); ?>

	<form action="" method="post" id="forums-directory-form" class="dir-form">

		<div class="item-list-tabs">
			<ul>
				<li class="selected" id="forums-all"><a href="<?php echo trailingslashit( bp_get_root_domain() . '/' . bp_get_forums_root_slug() ); ?>"><?php printf( esc_html__( 'All Topics %s', 'flocks' ), '<span>' . bp_get_forum_topic_count() . '</span>' ); ?></a></li>

				<?php if ( is_user_logged_in() && bp_get_forum_topic_count_for_user( bp_loggedin_user_id() ) ) : ?>

					<li id="forums-personal"><a href="<?php echo trailingslashit( bp_loggedin_user_domain() . bp_get_forums_slug() . '/topics' ); ?>"><?php printf( esc_html__( 'My Topics %s', 'flocks' ), '<span>' . bp_get_forum_topic_count_for_user( bp_loggedin_user_id() ) . '</span>' ); ?></a></li>

				<?php endif; ?>

				<?php

				/**
				 * Fires inside the forum group types list.
				 *
				 * @since 1.2.0
				 */
				do_action( 'bp_forums_directory_group_types' ); ?>

			</ul>
		</div>

		<div class="item-list-tabs" id="subnav">
			<ul>

				<?php

				/**
				 * Fires inside the forum group sub-types list.
				 *
				 * @since 1.5.0
				 */
				do_action( 'bp_forums_directory_group_sub_types' ); ?>

				<li id="forums-order-select" class="last filter">

					<label for="forums-order-by"><?php esc_html_e( 'Order By:', 'flocks' ); ?></label>
					<select id="forums-order-by">
						<option value="active"><?php esc_html_e( 'Last Active', 'flocks' ); ?></option>
						<option value="popular"><?php esc_html_e( 'Most Posts', 'flocks' ); ?></option>
						<option value="unreplied"><?php esc_html_e( 'Unreplied', 'flocks' ); ?></option>

						<?php

						/**
						 * Fires inside the select input for forums order options.
						 *
						 * @since 1.2.0
						 */
						do_action( 'bp_forums_directory_order_options' ); ?>

					</select>
				</li>
			</ul>
		</div>

		<div id="forums-dir-list" class="forums dir-list">

			<?php bp_get_template_part( 'forums/forums-loop' ); ?>

		</div>

		<?php

		/**
		 * Fires and displays the forums content.
		 *
		 * @since 1.1.0
		 */
		do_action( 'bp_directory_forums_content' ); ?>

		<?php wp_nonce_field( 'directory_forums', '_wpnonce-forums-filter' ); ?>

	</form>

	<?php

	/**
	 * Fires after the display of the forums.
	 *
	 * @since 1.5.0
	 */
	do_action( 'bp_after_directory_forums' ); ?>

	<?php

	/**
	 * Fires before the display of the new topic form.
	 *
	 * @since 1.5.0
	 */
	do_action( 'bp_before_new_topic_form' ); ?>

	<div id="new-topic-post">

		<?php if ( is_user_logged_in() ) : ?>

			<?php if ( bp_is_active( 'groups' ) && bp_has_groups( 'user_id=' . bp_loggedin_user_id() . '&type=alphabetical&max=100&per_page=100' ) ) : ?>

				<form action="" method="post" id="forum-topic-form" class="standard-form">

					<?php

					/**
					 * Fires inside the new topic form tag and before input display.
					 *
					 * @since 1.0.0
					 */
					do_action( 'groups_forum_new_topic_before' ); ?>

					<a name="post-new"></a>
					<h5><?php esc_html_e( 'Create New Topic:', 'flocks' ); ?></h5>

					<?php

					/** This action is documented in bp-templates/bp-legacy/buddypress/activity/index.php */
					do_action( 'template_notices' ); ?>

					<label for="topic_title"><?php esc_html_e( 'Title:', 'flocks' ); ?></label>
					<input type="text" name="topic_title" id="topic_title" value="" maxlength="100" />

					<label for="topic_text"><?php esc_html_e( 'Content:', 'flocks' ); ?></label>
					<textarea name="topic_text" id="topic_text"></textarea>

					<label for="topic_tags"><?php esc_html_e( 'Tags (comma separated):', 'flocks' ); ?></label>
					<input type="text" name="topic_tags" id="topic_tags" value="" />

					<label for="topic_group_id"><?php esc_html_e( 'Post In Group Forum:', 'flocks' ); ?></label>
					<select id="topic_group_id" name="topic_group_id">

						<option value=""><?php /* translators: no option picked in select box */ esc_html_e( '----', 'flocks' ); ?></option>

						<?php while ( bp_groups() ) : bp_the_group(); ?>

							<?php if ( bp_group_is_forum_enabled() && ( bp_current_user_can( 'bp_moderate' ) || 'public' == bp_get_group_status() || bp_group_is_member() ) ) : ?>

								<option value="<?php bp_group_id(); ?>"><?php bp_group_name(); ?></option>

							<?php endif; ?>

						<?php endwhile; ?>

					</select><!-- #topic_group_id -->

					<?php

					/**
					 * Fires before the new topic form submit actions.
					 *
					 * @since 1.0.0
					 */
					do_action( 'groups_forum_new_topic_after' ); ?>

					<div class="submit">
						<input type="submit" name="submit_topic" id="submit" value="<?php esc_attr_e( 'Post Topic', 'flocks' ); ?>" />
						<input type="button" name="submit_topic_cancel" id="submit_topic_cancel" value="<?php esc_attr_e( 'Cancel', 'flocks' ); ?>" />
					</div>

					<?php wp_nonce_field( 'bp_forums_new_topic' ); ?>

				</form><!-- #forum-topic-form -->

			<?php elseif ( bp_is_active( 'groups' ) ) : ?>

				<div id="message" class="info">

					<p><?php printf( esc_html__( "You are not a member of any groups so you don't have any group forums you can post in. To start posting, first find a group that matches the topic subject you'd like to start. If this group does not exist, why not <a href='%s'>create a new group</a>? Once you have joined or created the group you can post your topic in that group's forum.", 'flocks' ), trailingslashit( bp_get_groups_directory_permalink() . 'create' ) ); ?></p>

				</div>

			<?php endif; ?>

		<?php endif; ?>
	</div><!-- #new-topic-post -->

	<?php

	/**
	 * Fires after the display of the new topic form.
	 *
	 * @since 1.5.0
	 */
	do_action( 'bp_after_new_topic_form' ); ?>

	<?php

	/**
	 * Fires before the display of the forums content.
	 *
	 * @since 1.1.0
	 */
	do_action( 'bp_after_directory_forums_content' ); ?>

</div>
