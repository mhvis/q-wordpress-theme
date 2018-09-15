    <ul id="members-list" class="item-list bp-objects-loop members-list type-list">

    <?php while ( bp_members() ) : bp_the_member(); ?>

        <li>
            <div class="item-avatar col-md-2 col-sm-2 col-xs-2">
                <a href="<?php bp_member_permalink(); ?>"><?php bp_member_avatar('type=full&width=130'); ?></a>
            </div>

            <div class="item col-md-10 col-sm-10 col-xs-10">
                <div class="item-title">
                    <div class="item-name">
                        <a href="<?php bp_member_permalink(); ?>"><?php bp_member_name(); ?></a>
                    </div>

                    <?php if ( bp_get_member_latest_update() ) : ?>

                        <div class="item-update">
                            <span class="update">
                                <?php flocks_bp_members_status(); ?>
                            </span>
                        </div>

                        <div class="action has-latest-update">

                            <?php do_action( 'bp_directory_members_actions' ); ?>

                        </div>

                    <?php else: ?>

                        <div class="action">

                            <?php do_action( 'bp_directory_members_actions' ); ?>

                        </div>

                    <?php endif; ?>

                    <div class="item-meta">
                        <span class="activity"><?php bp_member_last_active(); ?></span>
                    </div>

                </div>


                <?php do_action( 'bp_directory_members_item' ); ?>

                <?php
                 /***
                  * If you want to show specific profile fields here you can,
                  * but it'll add an extra query for each member in the loop
                  * (only one regardless of the number of fields you show):
                  *
                  * bp_member_profile_data( 'field=the field name' );
                  */
                ?>
            </div>

            <div class="clear"></div>
        </li>

    <?php endwhile; ?>

    </ul>
