<nav id="main-navigation" class="main-navigation">

	<?php $main_nav = wp_nav_menu( array( 'fallback_cb'=> false, 'echo' => false, 'theme_location' => 'main', 'menu_id' => 'main-menu-ul' ) ); ?>

	<?php if ( empty ( $main_nav ) ) { ?>
		<a id="no-main-menu-fallback" href="<?php echo esc_url( admin_url( 'nav-menus.php?action=locations' ) ); ?>" title="<?php esc_attr_e("Create Top Menu", 'flocks'); ?>">
			<?php esc_attr_e("Create Main Menu", 'flocks'); ?>
		</a>
	<?php } else { ?>
		<?php echo flocks_sanity_check( $main_nav ); ?>
	<?php } ?>
</nav><!-- #site-navigation -->
