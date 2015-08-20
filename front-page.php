<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Terminsprojekt
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
	        	the_post_thumbnail();
	         } ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
