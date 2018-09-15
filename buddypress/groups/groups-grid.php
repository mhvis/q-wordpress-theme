    <ul id="groups-list" class="item-list bp-objects-loop groups-grid type-grid">

    <?php while ( bp_groups() ) : bp_the_group(); ?>

        <li <?php bp_group_class(); ?>>

            <?php if ( ! bp_disable_group_avatar_uploads() ) : ?>
                <div class="item-avatar">
                    <a href="<?php bp_group_permalink(); ?>"><?php bp_group_avatar( 'type=full&width=130&height=130' ); ?></a>
                </div>
            <?php endif; ?>

            <div class="item">
                <div class="item-title mg-bottom-10">
                    <div class="mg-top-20 mg-bottom-20">
                        <a href="<?php bp_group_permalink(); ?>"><?php bp_group_name(); ?></a>
                    </div>
                </div>

                <?php do_action( 'bp_directory_groups_item' ); ?>

            </div>

            <div class="action">

                <?php do_action( 'bp_directory_groups_actions' ); ?>

                <div class="meta"><?php bp_group_member_count(); ?></div>

            </div>

            <div class="clear"></div>
        </li>

    <?php endwhile; ?>

    </ul>
