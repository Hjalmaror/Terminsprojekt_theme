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
			<div id="playarea" class="site-main-playarea">
				<div id="mannequin" class="ui-widget-header">
					<?php if ( has_post_thumbnail() ) {
						the_post_thumbnail();
					} ?>
				</div>
				
	         	<?php if ( have_posts() ) : ?>
	         		<?php $index = 1; ?>
					<?php /* Start the Loop for CPT Showcase*/ ?>
					<?php $loop2 = new WP_Query( array('post_type' => 'showcase') ); ?>
					<?php while ( $loop2->have_posts() ) : $loop2->the_post(); ?>
						<div id="type1-<?php echo $index;?>" class="ui-widget-content">
							<!-- Post thumbnail -->
							<?php if ( has_post_thumbnail() ) : // check if the post has a Post Thumbnail assigned to it. ?> 
								<a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
							<?php endif; ?>
						</div>
						<?php $index++ ?>
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
