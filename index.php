<?php get_header(); ?>
<?php if (is_home() && !is_front_page() && !empty(single_post_title('', false))) : ?>
	<div class="bg-light py-1">
		<h1 class="text-primary text-center my-0"><?php single_post_title(); ?></h1>
	</div>
<?php endif; ?>
<div class="bg-light py-3">
	<?php
	if (have_posts()) {
		while (have_posts()) {
			the_post();
			get_template_part('templates/content', '', get_post_format());
		}
		get_the_posts_navigation();
	} else {
		get_template_part('templates/contents/content-none');
	}
	?>
</div>
<?php
get_footer(); ?>