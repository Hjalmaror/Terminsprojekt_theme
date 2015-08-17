<?php
/**
 * Template part for displaying single posts.
 *
 * @package Terminsprojekt
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php terminsprojekt_posted_on(); ?>
		</div><!-- .entry-meta -->
		<!-- Post image -->
		<?php if ( has_post_thumbnail() ) : // check if the post has a Post Thumbnail assigned to it. ?> 
			<?php the_post_thumbnail('full'); ?>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'terminsprojekt' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php terminsprojekt_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

