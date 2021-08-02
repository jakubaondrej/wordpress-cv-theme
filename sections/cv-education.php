<?php
$args = array(
    'post_type' => 'jakuba_education',
    'orderby'   => 'meta_value_num',
    'meta_key'  => 'to'
);
query_posts($args);
if (have_posts()) : ?>
    <h2><?php _e('Education', TEXT_DOMAIN); ?></h2>
    <div class="ps-2">
        <?php
        while (have_posts()) : the_post();
            $details    = get_post_meta(get_the_ID(), 'details', true);
            $from       = get_post_meta(get_the_ID(), 'from', true);
            $to         = get_post_meta(get_the_ID(), 'to', true);
            $university = get_post_meta(get_the_ID(), 'university', true) ?? '';
            $programme   = get_post_meta(get_the_ID(), 'programme', true) ?? '';
        ?>
            <div class="cv-education-item">
                <h4 class="mb-1"><?php echo get_the_title(); ?></h4>
                <div class="px-2">
                    <small>
                        <?php
                        if ($to) :
                            echo esc_html($to);
                        else :
                            esc_html_e("Ongoing education since $from.", TEXT_DOMAIN);
                        endif;
                        ?></small>
                    <br />
                    <?php echo esc_html($programme); ?>
                    <br />
                    <?php echo esc_html($university); ?>
                    <?php if ($details) : ?>
                        <p><?php echo esc_html($details); ?></p>
                    <?php endif; ?>

                </div>
            </div>
        <?php endwhile; ?>
    </div>
    <?php
endif;
wp_reset_query();