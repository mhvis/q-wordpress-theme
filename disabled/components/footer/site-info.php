<?php
$top_nav = wp_nav_menu(
	array(
		'fallback_cb' => false,
		'echo' => false,
		'theme_location' => 'top',
		'menu_id' => 'footer-menu',
		'depth' => -1 )
);
?>
<div class="site-info">
	
	<div class="row">
	
		<div id="site-copyright" class="col-xs-12 col-sm-8">
				
			<div class="row">

				<div class="col-xs-12 col-sm-4">
					
					<div id="site-copytext">

						<?php esc_html_e("&copy; 2018 ", 'flocks'); ?>
						<a href="<?php echo esc_url( home_url('/') ); ?>" title="<?php echo esc_attr( get_bloginfo('name') ); ?>">
							<?php echo esc_html( get_bloginfo('name') ); ?>
						</a>
					</div>
				
				</div>

				<div class="col-xs-12 col-sm-8">
					
					<?php if ( ! empty ( $top_nav ) && is_user_logged_in() ) { ?>

						<?php echo flocks_sanity_check( $top_nav ); ?>
						
					<?php } ?>
				</div>

			</div>

		</div>

		<div class="col-xs-12 col-sm-4">
			
			<div class="pull-right">

				<a href="<?php echo esc_url( home_url('/') ); ?> " title="<?php echo esc_attr( get_bloginfo('title') . ' &mdash; ' . get_bloginfo('description') ); ?>">
					
					<span id="footer-extratext">
					
					<?php echo get_bloginfo('description'); ?> 
					
						&mdash; 
					
					<?php echo get_bloginfo('title'); ?>
					
					</span>

				</a>

			</div>

		</div>
	
	</div>
	
</div><!-- .site-info -->