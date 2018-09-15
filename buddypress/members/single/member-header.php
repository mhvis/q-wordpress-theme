<?php
/**
 * BuddyPress - Users Header
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>

<?php

/**
 * Fires before the display of a member's header.
 *
 * @since 1.2.0
 */
do_action( 'bp_before_member_header' ); ?>

<div id="cv-main-head">
	<?php flocks_bp_the_cover_photo(); ?>
	<div id="cv-avatar-navigation">
		<div class="container">
			<div class="row">
				<div class="col-xs-4 col-sm-2">
					<div id="item-header-avatar">
						<a href="<?php bp_displayed_user_link(); ?>">
							<?php bp_displayed_user_avatar( 'type=full' ); ?>
						</a>
						<div id="members-single-user-displayed-name">
							<?php echo the_title(); ?>
						</div>
					</div>
				</div>
				<div class="col-xs-8 col-sm-10">
					<div id="item-nav">
						<div id="bp-object-nav-toggle" class="visible-sm visible-xs">
							<span class="fa fa-gear"></span>
						</div>
				        <div class="item-list-tabs no-ajax" id="object-nav">
				            <ul>

				                <?php bp_get_displayed_user_nav(); ?>

				                <?php

				                /**
				                 * Fires after the display of member options navigation.
				                 *
				                 * @since 1.2.4
				                 */
				                do_action( 'bp_member_options_nav' ); ?>

				            </ul>
				        </div>
				    </div><!-- #item-nav -->
				</div>
			</div><!-- .row -->
		</div><!-- .container-->
	</div><!-- #member-avatar-navigation-->

	<div id="item-header-content hidden" style="display: none;">

		<?php if ( bp_is_active( 'activity' ) && bp_activity_do_mentions() ) : ?>
			<h2 class="user-nicename">@<?php bp_displayed_user_mentionname(); ?></h2>
		<?php endif; ?>

		<span class="activity"><?php bp_last_activity( bp_displayed_user_id() ); ?></span>

		<?php

		/**
		 * Fires before the display of the member's header meta.
		 *
		 * @since 1.2.0
		 */
		do_action( 'bp_before_member_header_meta' ); ?>

		<div id="item-meta">

			<?php if ( bp_is_active( 'activity' ) ) : ?>

				<div id="latest-update">

					<?php bp_activity_latest_update( bp_displayed_user_id() ); ?>

				</div>

			<?php endif; ?>

			<div id="item-buttons">

				<?php

				/**
				 * Fires in the member header actions section.
				 *
				 * @since 1.2.6
				 */
				do_action( 'bp_member_header_actions' ); ?>

			</div><!-- #item-buttons -->

			<?php

			 /**
			  * Fires after the group header actions section.
			  *
			  * If you'd like to show specific profile fields here use:
			  * bp_member_profile_data( 'field=About Me' ); -- Pass the name of the field
			  *
			  * @since 1.2.0
			  */
			 do_action( 'bp_profile_header_meta' );

			 ?>

		</div><!-- #item-meta -->

	</div><!-- #item-header-content -->
</div><!-- #member-main-head-->

<?php

/**
 * Fires after the display of a member's header.
 *
 * @since 1.2.0
 */
do_action( 'bp_after_member_header' ); ?>

<?php

/** This action is documented in bp-templates/bp-legacy/buddypress/activity/index.php */
do_action( 'template_notices' ); ?>
