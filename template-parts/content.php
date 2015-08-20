<?php
/**
 * Template part for displaying posts.
 *
 * @package Terminsprojekt
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<!-- Post thumbnail -->
		<?php if ( has_post_thumbnail() ) : // check if the post has a Post Thumbnail assigned to it. ?> 
			<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
		<?php endif; ?></br>
		<span><?php echo get_the_title( $post->ID );?></span></br>
		<span><?php echo get_post_meta($post->ID, "product_price", true); ?> :-</span>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
