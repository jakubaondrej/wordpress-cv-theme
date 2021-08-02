<h1 class="text-primary">
    <?php esc_html_e('Nothing here', TEXT_DOMAIN); ?>
</h1>
<div class="container">
    <?php if (is_home() && current_user_can('publish_posts')) : ?>
        <?php
        printf(
            '<p>' . wp_kses(
                __('Do you want to public new post? <a href="%s">Lets do it!</a>.', TEXT_DOMAIN),
                array(
                    'a' => array(
                        'href' => array(),
                    ),
                )
            ) . '</p>',
            esc_url(admin_url('post-new.php'))
        );
        ?>

    <?php elseif (is_search()) : ?>

        <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', TEXT_DOMAIN); ?></p>
        <?php get_search_form(); ?>

    <?php else : ?>

        <p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', TEXT_DOMAIN); ?></p>
        <?php get_search_form(); ?>

    <?php endif; ?>
</div>