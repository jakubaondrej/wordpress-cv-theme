<?php
$args = array(
    'post_type' => 'jakuba_work_history',
    'orderby'   => 'meta_value',
    'meta_key'  => 'to'
);
query_posts($args);
if (have_posts()) :
?>
    <h2><?php _e('Work History', TEXT_DOMAIN); ?></h2>
    <div class="ps-2">
        <?php
        while (have_posts()) : the_post();

            $details    = get_post_meta(get_the_ID(), 'details', true) ?? '';
            $from       = get_post_meta(get_the_ID(), 'from', true) ?? '';
            $from       = date('F Y', strtotime($from));
            $to         = get_post_meta(get_the_ID(), 'to', true) ?? '';
            $to         = $to ? date('F Y', strtotime($to)) : __('present', TEXT_DOMAIN);
            $company_address = get_post_meta(get_the_ID(), 'company_address', true) ?? '';
            $position   = get_post_meta(get_the_ID(), 'position', true) ?? '';
            ?>
            <div class="cv-work-history-item">
                <h4 class="mb-1"><?php echo esc_html($position); ?></h4>
                <div class="px-2">
                    <div>
                        <small><?php esc_html_e("$from to $to", TEXT_DOMAIN) ?></small>
                        <br />
                        <?php echo get_the_title(); ?> |
                        <i><?php echo esc_html($company_address); ?></i>
                        <br />
                        <?php echo esc_html($details); ?>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    <?php
endif;
wp_reset_query();