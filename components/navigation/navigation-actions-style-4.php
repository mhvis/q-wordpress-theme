<nav id="user-navigation">
    <ul>
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
    </ul>
</nav>
