<?php get_header(); ?>
<div class="bg-light py-3">
	<?php
	while (have_posts()) :
		the_post();

		get_template_part('templates/contents/single', '', get_post_format());

		if (is_attachment()) {
			the_post_navigation(
				array(
					'prev_text' =>  __('Attached in %title', TEXT_DOMAIN),
				)
			);
		}

		if (comments_open() || get_comments_number()) {
			comments_template();
		}

		the_post_navigation(array(
			'prev_text'                 => __('Previous post: %title', TEXT_DOMAIN),
			'next_text'                 => __('Next post: %title', TEXT_DOMAIN),
			'screen_reader_text'        => __('Continue Reading', TEXT_DOMAIN),
		));
	endwhile;
	?>
</div>
<?php
get_footer();
