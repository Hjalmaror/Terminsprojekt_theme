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