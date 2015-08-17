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
			<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('medium'); ?></a>
		<?php endif; ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
