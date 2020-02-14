<?php
/**
 * Template part for displaying standard post formats.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Flocks
 */

?>

<?php if (! is_single() ) { ?>
<div id="post-<?php the_ID(); ?>" class="q-entry">
	<div class="q-entry-thumbnail">
		<?php if ( '' != get_the_post_thumbnail() ) : ?>
		<?php the_post_thumbnail( 'flocks-featured-image' ); ?>
		<?php endif; ?>	
	</div>
	<div class="q-entry-body">
		<?php the_title( '<h2 class="q-entry-title">', '</h2>' ); ?>
		<div class="q-entry-excerpt"><?php the_excerpt(); ?></div>
		<a href="<?php echo esc_url( the_permalink() ); ?>" title="<?php echo esc_attr( the_title() ); ?>" class="q-entry-link stretched-link">
			<?php echo WPGlobus_Filters::filter__text("{:en}More info{:}{:nl}Meer info{:}"); ?> &raquo;
		</a>
	</div>
</div>

<?php } else { /* is_single() === true */ ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header has-post-thumbnail">

		<?php if ( '' != get_the_post_thumbnail() ) : ?>

		<div class="entry-thumbnail">
			<?php the_post_thumbnail( 'flocks-featured-image' ); ?>
		</div>

		<?php endif; ?>
		
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		
	</header>

	<header class="entry-header screen-reader-text">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>
	
	<div class="entry-content">
		<?php if ( has_excerpt( $post->ID ) ) { ?>
		<div class="entry-excerpt">
			<?php the_excerpt(); ?>
		</div>
		<?php } ?>
		
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

</article><!-- #post-## -->
<?php } ?>
