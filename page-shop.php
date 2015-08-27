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
			
			<div data-role="page" id="pageone">
				get_template_part( 'template-parts/content-shop', get_post_format() );
				<a href="#pagetwo" data-transition="slide">Slide to Page Two</a>
			</div>
			
			<div data-role="page" id="pagetwo">
				
				get_template_part( 'template-parts/content-playarea', get_post_format() );
				<a href="#pageone" data-transition="slide" data-direction="reverse">Go to Page One</a>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
