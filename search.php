<?php
get_header();

?>
<?php if ( have_posts() ) : ?>
    <div class="container">
        <h1>
			<?php
			printf(
				esc_html__( 'Results for "%s"', TEXT_DOMAIN ), 
				esc_html( get_search_query() ) 
			);
			?>
		</h1>
        <div class="container">
        <?php while ( have_posts() ) : ?>
            <?php the_post(); ?>
            <?php get_template_part( 'templates/contents/archive' ); ?>
	    <?php endwhile; ?>

        </div>
    	<?php get_the_posts_navigation(); ?>

    </div>

<?php else : ?>
	<?php get_template_part('templates/contents/content-none'); ?>
<?php endif; ?>

<?php get_footer(); ?>