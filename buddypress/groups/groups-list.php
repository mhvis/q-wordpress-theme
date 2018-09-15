    <ul id="groups-list" class="item-list bp-objects-loop groups-list type-list">

    <?php while ( bp_groups() ) : bp_the_group(); ?>

        <li <?php bp_group_class(); ?>>

            <?php if ( ! bp_disable_group_avatar_uploads() ) : ?>
                <div class="item-avatar col-md-2 col-sm-2 col-xs-2">
                    <a href="<?php bp_group_permalink(); ?>"><?php bp_group_avatar( 'type=full&width=130&height=130' ); ?></a>
                </div>
            <?php endif; ?>

            <div class="item col-md-10 col-sm-10 col-xs-10">
                <div class="item-title">
                    <div class="item-name">
                        <a href="<?php bp_group_permalink(); ?>"><?php bp_group_name(); ?></a>
                    </div>
                </div>


                <div class="item-desc"><?php bp_group_description_excerpt(); ?></div>
                <div class="item-meta"><span class="activity"><?php printf( esc_html__( 'Active %s', 'flocks' ), bp_get_group_last_active() ); ?></span></div>

                <?php do_action( 'bp_directory_groups_item' ); ?>

            </div>

            <div class="action">

                <?php do_action( 'bp_directory_groups_actions' ); ?>

                <div class="meta">

                    <?php bp_group_member_count(); ?>

                </div>

            </div>

            <div class="clear"></div>
        </li>

    <?php endwhile; ?>

    </ul>
