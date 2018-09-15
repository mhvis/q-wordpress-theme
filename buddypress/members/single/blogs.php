<?php
/**
 * BuddyPress - Users Blogs
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>

<div class="item-list-tabs" id="subnav">
	<ul>

		<?php bp_get_options_nav(); ?>

		<li id="blogs-order-select" class="last filter">

			<label for="blogs-order-by"><?php esc_html_e( 'Order By:', 'flocks' ); ?></label>
			<select id="blogs-order-by">
				<option value="active"><?php esc_html_e( 'Last Active', 'flocks' ); ?></option>
				<option value="newest"><?php esc_html_e( 'Newest', 'flocks' ); ?></option>
				<option value="alphabetical"><?php esc_html_e( 'Alphabetical', 'flocks' ); ?></option>

				<?php

				/**
				 * Fires inside the members blogs order options select input.
				 *
				 * @since 1.2.0
				 */
				do_action( 'bp_member_blog_order_options' ); ?>

			</select>
		</li>
	</ul>
</div><!-- .item-list-tabs -->

<?php
switch ( bp_current_action() ) :

	// Home/My Blogs
	case 'my-sites' :

		/**
		 * Fires before the display of member blogs content.
		 *
		 * @since 1.2.0
		 */
		do_action( 'bp_before_member_blogs_content' ); ?>

		<div class="blogs myblogs">

			<?php bp_get_template_part( 'blogs/blogs-loop' ) ?>

		</div><!-- .blogs.myblogs -->

		<?php

		/**
		 * Fires after the display of member blogs content.
		 *
		 * @since 1.2.0
		 */
		do_action( 'bp_after_member_blogs_content' );
		break;

	// Any other
	default :
		bp_get_template_part( 'members/single/plugins' );
		break;
endswitch;
