<nav id="user-navigation">
    <ul>
        <?php if ( ! is_user_logged_in() ) { ?>
            <li>

                <a title="<?php echo esc_attr('Register', 'flocks'); ?>" href="<?php echo esc_url( wp_registration_url() ); ?>">
                    <span class="visible-lg visible-sm visible-xs hidden-md">
                        <?php esc_attr_e('Register', 'flocks'); ?>
                    </span>
                    <span class="hidden-lg hidden-sm hidden-xs visible-md">
                        <i class="fa fa-sign-in user-action-icon"></i>
                    </span>
                </a>

            </li>
            <li>

            <a title="<?php esc_attr_e('Sign In', 'flocks'); ?>" href="<?php echo flocks_signin_url(); ?>">
                <span class="visible-lg visible-sm visible-xs hidden-md">
                    <?php esc_attr_e('Sign In', 'flocks'); ?>
                </span>
                <span class="hidden-lg hidden-sm hidden-xs visible-md">
                    <i class="fa fa-user-circle-o user-action-icon"></i>
                </span>
            </a>

            </li>
        <?php } else {?>

            <!-- Notifications -->
            <li class="li-user-notication hidden-md">

                <?php $notifications = array(); ?>

                <?php if ( function_exists( 'bp_notifications_get_notifications_for_user' ) ) { ?>
                    <?php $notifications = bp_notifications_get_notifications_for_user( get_current_user_id() ); ?>
                <?php } ?>

                <?php $notifications_count = count( $notifications ); ?>

                <?php if ( empty( $notifications ) ) { ?>
                    <?php $notifications_count = 0; ?>
                <?php } ?>

                <a href="#" id="user-nav-action-notification">
                    <i class="user-notication"></i>
                    <span class="notification-count"><?php echo absint( $notifications_count ); ?></span>
                </a>

                <?php if ( ! empty( $notifications ) ) { ?>
                    <ul id="nav-user-action-notification">
                        <?php foreach( $notifications as $notification ) { ?>
                            <li>
								<?php if ( is_array( $notification ) ) { ?>
									<?php $notification_text = ! empty( $notification['text'] ) ? $notification['text'] : ''; ?>
									<?php $notification_link = ! empty( $notification['link'] ) ? $notification['link'] : ''; ?>
									<a title="<?php echo esc_attr( $notification_text ); ?>" href="<?php echo esc_url( $notification_link ); ?>">
										<?php echo esc_attr( $notification_text ); ?>
									</a>
								<?php } else { ?>
									<?php echo flocks_sanity_check( $notification ); ?>
								<?php } ?>
							</li>
                        <?php } ?>
                    </ul>
                <?php } else { ?>
                    <ul id="nav-user-action-notification">
                        <li>
                            <a href="#" title="<?php esc_attr_e('Hurray! No new notifications', 'flocks'); ?>">
                                <?php esc_html_e('Hurray! No new notifications!', 'flocks'); ?>
                            </a>
                        </li>
                    </ul>
                <?php } ?>
            </li>

            <!-- END notifications -->


            <li class="li-user-avatar">
                <a id="user-nav-action-avatar" href="#">
                    <?php echo get_avatar( get_current_user_id() ); ?>
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul id="nav-user-action-dropdown">

                    <!-- Edit Profile -->
                    <?php if ( function_exists( 'bp_loggedin_user_domain' ) ) { ?>
                        <li>
                            <a href="<?php echo esc_url( bp_loggedin_user_domain() . 'profile/edit/'); ?>" title="<?php esc_attr_e('Edit Profile', 'flocks'); ?>">
                                <i aria-hidden="true" class="fa fa-user"></i>
                                <?php esc_html_e('Edit Profile', 'flocks'); ?>
                            </a>
                        </li>
                    <?php } else { ?>
                        <li>
                            <a href="<?php echo esc_url( admin_url( 'profile.php' ) ); ?>">
                                <i aria-hidden="true" class="fa fa-user"></i>
                                <?php esc_html_e('Edit Profile', 'flocks'); ?>
                            </a>
                        </li>
                    <?php } ?>


                    <!-- Change Photo -->
                    <?php if ( function_exists( 'bp_loggedin_user_domain' ) ) { ?>
                        <li>
                            <a href="<?php echo esc_url( bp_loggedin_user_domain() . 'profile/change-avatar/'); ?>" title="<?php esc_attr_e('Change Photo', 'flocks'); ?>">
                                <i aria-hidden="true" class="fa fa-camera-retro"></i>
                                <?php esc_html_e('Change Photo', 'flocks'); ?>
                            </a>
                        </li>
                    <?php } else {?>
                        <li>
                            <a href="<?php echo esc_url( admin_url('options-discussion.php') ); ?>">
                                <i aria-hidden="true" class="fa fa-camera-retro"></i>
                                <?php esc_attr_e( 'Change Photo', 'flocks' ); ?>
                            </a>
                        </li>
                    <?php } ?>

                    <!-- settings -->
                    <?php if ( function_exists( 'bp_loggedin_user_domain' ) ) { ?>
                        <li><a href="<?php echo esc_url( bp_loggedin_user_domain() . 'settings' ); ?>"><i aria-hidden="true" class="fa fa-cog"></i>
                            <?php esc_html_e('Settings', 'flocks'); ?>
                        </a></li>
                    <?php } else { ?>
                        <li><a href="<?php echo esc_url( admin_url('options-general.php') ); ?>"><i aria-hidden="true" class="fa fa-cog"></i> Settings</a></li>
                    <?php } ?>

                    <!--logout-->
                    <?php if ( function_exists( 'wp_logout_url' ) ) { ?>
                        <li><a href="<?php echo esc_url( wp_logout_url( home_url( '/' ) ) ); ?>" title="<?php esc_attr_e('Logout','flocks'); ?>">
                            <i aria-hidden="true" class="fa fa-sign-out"></i>
                            <?php esc_html_e('Logout', 'flocks'); ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </li>
        <?php } ?>

        <?php $flocks_cart_disabled = absint( get_theme_mod( 'flock_disable_cart', 1 ) ); ?>

        <?php if ( 1 === $flocks_cart_disabled ) { ?>
            <?php if ( function_exists( 'wc_get_cart_url' ) ) { ?>
                <li class="li-user-cart">
                    <a class="flocks-cart-user-action" title="<?php esc_attr_e( 'View your shopping cart', 'flocks' ); ?>" href="<?php echo wc_get_cart_url(); ?>">
                        <i class="user-cart"></i>
                        <span class="cart-count">
                            <?php echo absint( WC()->cart->get_cart_contents_count() ); ?>
                        </span>
                    </a>
                </li>
            <?php } ?>
        <?php } ?>
    </ul>
</nav><!--#user-navigation-->
