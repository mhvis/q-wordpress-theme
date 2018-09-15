<?php
$mobile_menu = wp_nav_menu(
    array(
        'fallback_cb' => false,
        'echo' => false,
        'theme_location' => 'main',
        'menu_id' =>
        'mobile-main-menu-ul'
    )
);
?>
<header id="masthead" class="site-header">

    <div id="site-branding-seo">
        <?php get_template_part( 'components/header/site', 'branding' ); ?>
    </div>

    <div class="container-fluid">

        <div id="main-menu">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <?php flocks_site_logo(); ?>
                </div>
                <div id="mobile-menu-toggle" class="visible-sm visible-xs">
                    <span class="menu-bar"></span>
                    <span class="menu-bar"></span>
                    <span class="menu-bar"></span>
                </div>
                <div class="hidden-sm hidden-xs col-lg-7 col-md-7">
                    <?php get_template_part( 'components/navigation/navigation', 'main' );?>
                </div>
                <div class="col-lg-2 col-md-2">
                    <nav id="user-navigation">
						<ul>
							<?php /* New by Maarten */ ?>
							<?php /*
							<li>
								<a href="https://login.microsoftonline.com/login.srf?wa=wsignin1.0&whr=esmgquadrivium.nl&wreply=https://esmgquadrivium.sharepoint.com&LoginOptions=1">
									<?php echo WPGlobus_Filters::filter__text("{:en}Engels{:}{:nl}NL{:}"); ?>
									Voor leden
								</a>
							</li>*/?>
							
						<?php
             // Original from DutchCodingCompany
             ?>
        <?php if ( ! is_user_logged_in() ) { ?>
            <li><a title="<?php esc_attr_e('Sign In', 'flocks'); ?>" href="<?php echo esc_url( wp_login_url() ); ?>"><?php esc_attr_e('Intern', 'flocks'); ?></a></li>
        <?php } else { ?>
            <li><a href="/quadrivium-intern/">Intern</a></li>
        <?php } ?>

<?php //*/ ?>
					    </ul>
					</nav>
                </div>
                <div class="mobile-menu visible-sm visible-xs">
                    <?php echo flocks_sanity_check( $mobile_menu ); ?>
                </div>
            </div>
        </div>

    </div><!--.container-fluid-->

</header>
