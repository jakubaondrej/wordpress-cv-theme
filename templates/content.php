<?php if (is_singular()) : ?>
    <?php the_title('<div class="py-2"><h1 class="text-primary text-center my-0">', '</h1></div>'); ?>
<?php endif; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('container rounded my-2 py-2 bg-white shadow'); ?>>
    <?php if ( ! is_singular()) : ?>
        <?php the_title(sprintf('<h2><a class="link-primary" href="%s">', esc_url(get_permalink())), '</a></h2>'); ?>
    <?php endif; ?>

    <div class="container">
        <?php
        the_content(__('Continue reading', TEXT_DOMAIN));

        wp_link_pages();

        ?>
    </div>
</article>