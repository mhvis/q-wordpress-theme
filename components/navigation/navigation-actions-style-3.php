<nav id="user-navigation">
    
    <?php if ( 'on' === get_theme_mod( 'flock_disable_cart', 'on' ) ) { ?>
        <ul class="user-cart-active">
    <?php } else { ?>
        <ul>
    <?php } ?>

        <?php if ( ! is_user_logged_in() ) { ?>
            <li><a title="<?php echo esc_attr('Register', 'flocks'); ?>" href="<?php echo esc_url( wp_registration_url() ); ?>"><?php esc_attr_e('Register', 'flocks'); ?></a></li>
            <li><a title="<?php esc_attr_e('Sign In', 'flocks'); ?>" href="<?php echo esc_url( wp_login_url() ); ?>"><?php esc_attr_e('Sign In', 'flocks'); ?></a></li>
        <?php } ?>
            <li class="li-main-menu-search">
                <a href="#" title="<?php esc_attr_e('Search', 'flocks'); ?>" id="flocks-search-btn">
                    <i class="fa fa-search"></i>
                </a>
                <div id="top-right-search-form">
                    <div id="close-top-right-search-form" class="visible-sm visible-xs">
                        <span class="menu-bar"></span>
                        <span class="menu-bar"></span>
                    </div>
    				<?php echo get_search_form( false ); ?>
    			</div>
            </li>
            <li class="li-user-sub-menu">
                <div id="header-menu-toggle">
                    <span class="menu-bar"></span>
                    <span class="menu-bar"></span>
                    <span class="menu-bar"></span>
                </div>
            </li>

        <?php $flocks_cart_disabled = absint( get_theme_mod( 'flock_disable_cart', 1 ) ); ?>

        <?php if ( 1 === $flocks_cart_disabled ) { ?>
            <?php if ( function_exists( 'wc_get_cart_url' ) ) { ?>
                <li class="li-user-cart">
                    <a class="flocks-cart-user-action" title="<?php esc_attr_e( 'View your shopping cart', 'flocks' ); ?>" href="<?php echo wc_get_cart_url(); ?>">
                        <i class="user-cart cart_light"></i>
                        <span class="cart-count">
                            <?php echo absint( WC()->cart->get_cart_contents_count() ); ?>
                        </span>
                    </a>
                </li>
            <?php } ?>
        <?php } ?>

    </ul>
    
</nav>

