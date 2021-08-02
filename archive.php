<?php get_header(); ?>
<div class="bg-light py-1">
    <?php the_archive_title('<h1 class="text-primary text-center my-0">', '</h1>'); ?>
    <?php
    $description = get_the_archive_description();
    if ($description) :
    ?>
        <div class="mb-3">
            <?php echo wp_kses_post(wpautop($description)); ?>
        </div>
    <?php endif; ?>
</div>
<div class="bg-light py-3">
    <?php if (have_posts()) : ?>
            <?php while (have_posts()) : ?>
                <?php the_post(); ?>
                <?php get_template_part('templates/contents/archive', '', get_post_format()); ?>
            <?php endwhile; ?>
        <?php get_the_posts_navigation(); ?>
    <?php else : ?>
        <?php get_template_part('templates/contents/content-none'); ?>
    <?php endif; ?>
</div>
<?php get_footer(); ?>