<?php

get_header();

// Start the loop.
while ( have_posts() ) :
	the_post();
	?>
        <article <?php post_class(); ?>>
			<?php the_title( '<h1 class="primary-text">', '</h1>' ); ?>
            <div class="w-100">
                <?php echo wp_get_attachment_image( get_the_ID(), 'full' ); ?>
                <?php if ( wp_get_attachment_caption() ) : ?>
					<div class="text-center">
                        <?php echo wp_kses_post( wp_get_attachment_caption() ); ?>
                    </div>
				<?php endif; ?>
            </div>
            <?php
			the_content();
            wp_link_pages();
            ?>
        </article>
    <?php 
    if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
endwhile;

get_footer();
