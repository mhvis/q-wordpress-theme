<?php
$top_nav = wp_nav_menu(
	array(
		'fallback_cb' => false,
		'echo' => false,
		'theme_location' => 'top',
		'menu_id' => 'top-menu',
		'depth' => -1 )
);
?>

<nav id="site-navigation" class="main-navigation">

	<?php if ( ! empty( $top_nav ) ) { ?>
		<span id="top-menu-toggle" class="visible-sm visible-xs">
			<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
		</span>
	<?php } ?>

	<div class="top-left-menu-container">

		<?php if ( empty ( $top_nav ) ) { ?>
			<a id="no-top-menu-fallback" href="<?php echo esc_url( admin_url( 'nav-menus.php?action=locations' ) ); ?>"
				title="<?php esc_attr_e("Create Top Menu Here", 'flocks'); ?>">
				<?php esc_attr_e("Create Top Menu Here", 'flocks'); ?>
			</a>
		<?php } else { ?>
			<?php echo flocks_sanity_check( $top_nav ); ?>
		<?php } ?>
	</div>

	<?php $flocks_top_social = get_theme_mod('flocks_top_social'); ?>

	<div class="social-menu-top-container">
		<ul id="social-top-menu" class="menu">
			<?php if ( empty( $flocks_top_social ) ) { ?>
				<li class="menu-item"><a title="<?php esc_html_e('Dribbble', 'flocks'); ?>" href="#"><i class="fa fa-dribbble"></i></a></li>
				<li class="menu-item"><a title="<?php esc_html_e('Google Plus', 'flocks'); ?>" href="#"><i class="fa fa-google-plus"></i></a></li>
				<li class="menu-item"><a title="<?php esc_html_e('Twitter', 'flocks'); ?>" href="#"><i class="fa fa-twitter"></i></a></li>
				<li class="menu-item"><a title="<?php esc_html_e('Facebook', 'flocks'); ?>" href="#"><i class="fa fa-facebook"></i></a></li>
			<?php } else { ?>

				<?php foreach( $flocks_top_social as $social_item ): ?>
					<li class="menu-item">
						<a href="<?php echo esc_url( $social_item['link_url'] );?>" title="<?php echo esc_attr( $social_item['link_icon'] );?>">
							<i class="fa fa-<?php echo esc_attr( $social_item['link_icon'] );?>"></i>
						</a>
					</li>
				<?php endforeach; ?>

			<?php } ?>

			<?php $flocks_phone_number = get_theme_mod('flocks_top_menu_phone_number', '+123-456-7890'); ?>

			<?php if ( empty ( $flocks_phone_number ) ) { $flocks_phone_number = '+123-456-7890'; } ?>

			<li id="flocks-phone" class="menu-item">
				<a href="tel:<?php echo esc_attr( $flocks_phone_number ); ?>"><i class="fa fa-phone primary"></i>
				<span id="flocks-phone-number"><?php echo esc_html( $flocks_phone_number ); ?></span></a>
			</li>
		</ul>
	</div>

</nav><!-- #site-navigation -->
