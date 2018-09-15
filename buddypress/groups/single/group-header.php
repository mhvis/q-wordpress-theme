<?php
/**
 * BuddyPress - Groups Header
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

/**
 * Fires before the display of a group's header.
 *
 * @since 1.2.0
 */
do_action( 'bp_before_group_header' );

?>

<div id="cv-main-head">

	<?php flocks_bp_group_the_cover_photo(); ?>

	<div id="cv-avatar-navigation">
		<div class="container">
			<div class="row">
				<div class="col-xs-4 col-sm-2">
					<div id="item-header-avatar">
						<a href="<?php bp_displayed_user_link(); ?>">
							<?php bp_group_avatar(); ?>
						</a>
					</div>
				</div>
				<div class="col-xs-8 col-sm-10">
					<div id="bp-object-nav-toggle" class="visible-sm visible-xs">
						<span class="fa fa-gear"></span>
					</div>
					<div id="item-nav">
						<div class="item-list-tabs no-ajax" id="object-nav">
							<ul>
								<?php bp_get_options_nav(); ?>
								<?php

								/**
								 * Fires after the display of group options navigation.
								 *
								 * @since 1.2.0
								 */
								do_action( 'bp_group_options_nav' ); ?>
							</ul>
						</div>
					</div><!-- #item-nav -->
				</div>
			</div><!-- .row -->
		</div><!-- .container-->
	</div><!-- #member-avatar-navigation-->

</div><!-- #member-main-head-->

<?php

/**
 * Fires after the display of a group's header.
 *
 * @since 1.2.0
 */
do_action( 'bp_after_group_header' );

/** This action is documented in bp-templates/bp-legacy/buddypress/activity/index.php */
do_action( 'template_notices' );
?>
