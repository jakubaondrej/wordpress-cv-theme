<article id="post-<?php the_ID(); ?>" <?php post_class('container rounded my-2 py-2 bg-white shadow'); ?>>
    <div class="row">
        <?php if (has_post_thumbnail($post->ID)) : ?>
            <div class="col-lg-2 col-md-3 text-center">
                <a href="<?php the_permalink() ?>">
                    <?php the_post_thumbnail(array(200, 400)); ?>
                </a>
            </div>
        <?php endif; ?>

        <div class="col">
            <?php the_title(sprintf('<h2 class="my-1"><a class="link-primary" href="%s">', esc_url(get_permalink())), '</a></h2>'); ?>
            <?php if (is_category() || is_archive()) {
                the_excerpt();
            ?>
                <a href="<?= get_the_permalink() ?>"><?php esc_html_e('Continue reading', TEXT_DOMAIN) ?></a>
            <?php
            } else {
                the_content(__('Continue reading', TEXT_DOMAIN));
            } ?>
        </div>
    </div>
</article>