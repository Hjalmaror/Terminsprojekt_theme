<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Terminsprojekt
 */

    if ( is_page('Startpage') ) {
?>

<?php 
    }
    if ( is_page('Shop') ) {
?>
sdssadad
<?php 
    }
    else if( is_page('Checkout')){
?>

<?php
    }
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
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
		<?php edit_post_link( esc_html__( 'Edit', 'terminsprojekt' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

