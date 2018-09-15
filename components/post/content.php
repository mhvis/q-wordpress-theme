<?php
/**
 * Template part for displaying standard post formats.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Flocks
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header has-post-thumbnail">

		<?php if ( '' != get_the_post_thumbnail() ) : ?>

			<!-- Removed by Maarten
			<div class="entry-post-format">
				<span class="fa fa-file-text-o"></span>
			</div>
			-->

			<?php if ( ! is_single() ) : ?>

				<div class="entry-thumbnail">
					<a href="<?php echo esc_url( the_permalink() ); ?>" title="<?php echo esc_attr( the_title() ); ?>">
						<?php the_post_thumbnail( 'flocks-featured-image' ); ?>
					</a>
				</div>

			<?php else: ?>

				<div class="entry-thumbnail">
					<?php the_post_thumbnail( 'flocks-featured-image' ); ?>
				</div>

			<?php endif; ?>

		<?php endif; ?>
		
		<?php if ( is_single() ) { /* Added by Maarten */ ?>

		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>


		<div class="entry-meta hidden-xs">
			<div class="entry-information">
				<div class="row">
					<div class="col-sm-9">
						<div class="entry-meta-author">
						 	<span class="fa fa-calendar"></span> <?php echo dcc_transform_date(get_post_meta(get_the_ID(), 'event_start', true)); ?>
						 	<?php
						 		$end = get_post_meta(get_the_ID(), 'event_end', true);
						 		if($end != ''){
						 			echo ' - '.dcc_transform_date($end);
						 		}
						 	?>
						</div>
					</div>
					<!-- Disabled by Maarten -->
					<!--
					<div class="col-sm-3">
						<div class="pull-right">
							<a href="<?php echo esc_url( the_permalink() ); ?>" title="<?php esc_attr( the_title() ); ?>">
								<span class="archive-share-icon fa fa-share-alt"></span>
							</a>
						</div>
					</div>
					-->
				</div>
			</div>

		</div><!-- .entry-meta -->

		<?php } /* is_single */ ?>
	</header>

	<?php if (is_single()) { /* Added by Maarten */ ?>
	
	<header class="entry-header screen-reader-text">
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		<?php
		endif; ?>
	</header>

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Read More %s <span class="meta-nav fa fa-caret-right"></span>', 'flocks' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>
		<div class="clear-fix"></div>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'flocks' ),
				'after'  => '</div>',
			) );
		?>
		<div class="clear-fix"></div>
	</div>

	<?php if ( is_single() ) { ?>

		<!-- Disabled by Maarten
		<div class="entry-meta-category">
			<?php
				if ( 'post' === get_post_type() ) {
					/* translators: used between list items, there is a space after the comma */
					$categories_list = get_the_category_list( esc_html__( ', ', 'flocks' ) );
					if ( $categories_list && flocks_categorized_blog() ) {
						printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'flocks' ) . '</span>', $categories_list ); // WPCS: XSS OK.
					}

					/* translators: used between list items, there is a space after the comma */
					$tags_list = get_the_tag_list( '', esc_html__( ', ', 'flocks' ) );
					if ( $tags_list ) {
						printf( '<br><span class="tags-links">' . esc_html__( 'Tagged in %1$s', 'flocks' ) . '</span>', $tags_list ); // WPCS: XSS OK.
					}
				}
			?>
		</div>
		-->

	<?php } ?>
	
	<?php } /* is_single 2 */ ?>

</article><!-- #post-## -->
