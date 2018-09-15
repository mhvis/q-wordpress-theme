<?php 
/**
 * Contains the Footer Call to Action and Footer Headline Section
 *
 * @since  1.0
 */
$register_page = get_option('bp-pages');

$post_id = get_queried_object_id();

// Disable on 404 page.
if ( is_404() ) { return; }

?>
<?php if ( flocks_is_headline_enabled() ) : ?>
		
		<div id="footer-before-to-action">
			<div class="container">
				<div class="row">
					<div class="footer-before-to-action-inner">
						
						<h3 class="call-to-action-heading">

							<span id="footer-call-to-action-head">
								
								<?php $footer_headline_title = get_theme_mod( 'flocks_footer_headline_title' ); ?>

								<?php if ( ! empty( $footer_headline_title ) ) { ?>

									<?php echo wp_kses( htmlspecialchars_decode ( $footer_headline_title ), wp_kses_allowed_html( 'post' ) ); ?>

								<?php } else { ?>

									<?php echo nl2br( esc_html__("Welcome to Flocks Community \n WordPress Theme", 'flocks') ); ?>

								<?php } ?>

							</span>

						</h3>

						<div class="call-to-action-excerpt">

							<span id="footer-call-to-action-text">

								<?php $footer_headline_textarea = get_theme_mod( 'flocks_footer_headline_textarea' ); ?>

								<?php if ( ! empty( $footer_headline_textarea ) ) { ?>
									
									<?php 
									echo do_shortcode( wp_kses( $footer_headline_textarea, wp_kses_allowed_html( 'post' ) ) ); 
									?>
								
								<?php } else { ?>

									<?php 
									echo wp_kses ( __('This is a <em>Footer Headline</em> section that you can use to display any information you like. You can change this text inside the theme\'s live customizer. This section can show HTML and all of your favorite shortcodes. You can also replace the background image, the background color, the title, and the opacity. Kind of cool, right?', 'flocks'), wp_kses_allowed_html( 'post' ) ); 
									?>
								<?php } ?>

							</span>

						</div>

					</div>
				</div>
			</div>
		</div><!--#footer-before-to-action-->
	<?php endif; ?>

	<?php if ( flocks_is_cta_enabled() ): ?>
	
		<div id="footer-call-to-action">
			<div class="container">
				<div class="row">
					<div class="col-md-9 col-sm-9">

						<?php $footer_cta_heading = get_theme_mod( 'flocks_footer_cta_title' ); ?>
						
						<h3 class="call-to-action-heading">

							<?php if ( ! empty( $footer_cta_heading ) ) { ?>

								<?php echo wp_kses( $footer_cta_heading, wp_kses_allowed_html( 'post' ) ); ?>

							<?php } else { ?>

								<?php esc_attr_e('Get Started with WordPress &amp; BuddyPress', 'flocks'); ?>

							<?php } ?>

						</h3>

						<p class="call-to-action-excerpt">
							
							<?php $flocks_footer_cta_subheading = get_theme_mod( 'flocks_footer_cta_subheading' ); ?>

							<?php if ( ! empty( $flocks_footer_cta_subheading ) ) { ?>
								
								<?php echo wp_kses( $flocks_footer_cta_subheading, wp_kses_allowed_html( 'post' ) ); ?>

							<?php } else { ?>

								<?php esc_html_e('Over 60 million people have chosen WordPress to power the place on the web they call "home" - Join the family.', 'flocks'); ?>

							<?php } ?>

						</p>

					</div>
					<div class="col-md-3 col-sm-3">

						<div class="pull-right">

							<?php $flocks_footer_cta_btn_link = get_theme_mod( 'flocks_footer_cta_btn_link' ); ?>

							<?php $flocks_footer_cta_btn_target = "_self"; ?>

							<?php if ( true == get_theme_mod( 'flocks_footer_cta_btn_new_tab' ) ) { ?>
								
								<?php $flocks_footer_cta_btn_target = "_blank"; ?>

							<?php } ?>

							<?php if ( empty( $flocks_footer_cta_btn_link ) ) { ?>

								<?php $flocks_footer_cta_btn_link = "#"; ?>

							<?php } ?>

							<a href="<?php echo esc_url( $flocks_footer_cta_btn_link ); ?>" target="<?php echo esc_attr( $flocks_footer_cta_btn_target ); ?>" class="button" id="call-to-action-button">
								
								<?php $footer_cta_button_link = get_theme_mod( 'flocks_footer_cta_btn_text' ); ?>

								<?php if ( ! empty ( $footer_cta_button_link ) ) { ?>

									<?php echo esc_html( $footer_cta_button_link  ); ?>

								<?php } else { ?>

									<?php esc_html_e( 'Get Started', 'flocks' ); ?>

								<?php } ?>

							</a>

						</div>

					</div>

				</div>

			</div>
			
		</div><!--#footer-call-to-action-->

	<?php endif; ?>