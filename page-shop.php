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
			<div id="webshop" class="site-main-webshop">
				<h1>Shop</h1>
				<?php get_sidebar('category'); ?>
				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop for CPT Products*/ ?>
					<?php $args = array(
						'post_type' => 'product',
					);
					?>
					
					<?php $loop = new WP_Query($args); ?>
					<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
						
						<?php
							get_template_part( 'template-parts/content', get_post_format() );
						?>	
					<?php endwhile; wp_reset_query(); ?>
					
					<?php the_posts_navigation(); ?>

				<?php else : ?>

					<?php get_template_part( 'template-parts/content', 'none' ); ?>

				<?php endif; ?>
			</div>
			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
