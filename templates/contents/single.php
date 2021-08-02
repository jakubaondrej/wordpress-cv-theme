<article id="post-<?php the_ID(); ?>" <?php post_class('container rounded my-2 py-2 bg-white shadow'); ?>>
    <div class="text-center">
        <div><?php the_post_thumbnail("large"); ?></div>
        <div class="text-secondary font-italic"><?php the_post_thumbnail_caption(); ?></div>
    </div>
    <?php the_title('<h1 class="text-primary">', '</h1>'); ?>

    <div class="container">
        <?php
        the_content();

        wp_link_pages();
        ?>
    </div>
</article>