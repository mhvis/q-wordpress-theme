    <ul id="members-list" class="item-list bp-objects-loop members-grid type-grid">

    <?php while ( bp_members() ) : bp_the_member(); ?>

        <li>
            <div class="item-avatar">
                <a href="<?php bp_member_permalink(); ?>"><?php bp_member_avatar('type=full&width=130'); ?></a>
            </div>

            <div class="item">
                <div class="item-title mg-bottom-10">
                    <div class="mg-top-20 mg-bottom-20">
                        <a href="<?php bp_member_permalink(); ?>"><?php bp_member_name(); ?></a>
                    </div>
                    <?php if ( bp_get_member_latest_update() ) : ?>

                        <span class="hide update"> <?php bp_member_latest_update(); ?></span>

                    <?php endif; ?>

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

            <div class="action">

                <?php do_action( 'bp_directory_members_actions' ); ?>

            </div>

            <div class="clear"></div>
        </li>

    <?php endwhile; ?>

    </ul>
