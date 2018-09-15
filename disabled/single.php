<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Flocks
 */

 get_header(); ?>

<?php flocks_the_cover_image(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<div id="printable-content">
		<div class="container">
			<div class="row">
			
				<div class="<?php echo apply_filters( 'flocks_main_section_class', 'col-lg-9' ); ?>">
					<div id="primary" class="content-area">
						<main id="main" class="site-main">
							<?php

								$post_format = ( get_post_format() ? get_post_format() : 'standard' );

								get_template_part( 'components/post/content', get_post_format() );

								// Display the author information.
								//flocks_author();

                                //the_post_navigation();

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
							?>
						</main>
					</div>
				</div>

				<div class="<?php echo apply_filters( 'flocks_sidebar_section_class', 'col-lg-3' ); ?>">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</div>

<?php
endwhile; // End of the loop.
get_footer();
