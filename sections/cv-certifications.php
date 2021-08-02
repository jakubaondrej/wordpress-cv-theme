<?php
$args = array(
    'post_type' => 'jakuba_certification',
    'orderby'   => 'meta_value',
    'meta_key'  => 'publish_date'
);
query_posts($args);
if (have_posts()) :
?>
    <h2><?php _e('Certifications', TEXT_DOMAIN); ?></h2>
    <div class="ps-2">
    <?php
    while (have_posts()) : the_post();
        $publisher       = get_post_meta(get_the_ID(), 'publisher', true) ?? '';
        $publish_date    = get_post_meta(get_the_ID(), 'publish_date', true) ?? '';
        $publish_date    = date('F Y', strtotime($publish_date));
        $end_date        = get_post_meta(get_the_ID(), 'end_date', true);
        ?>
            <div class="cv-cert-item">
                <h4 class="mb-1"><?php the_title(); ?></h4>
                <div class="px-2">
                    <div>
                        <?php echo $publisher; ?>
                        <br />
                        <small><?php esc_html_e("Published $publish_date.", TEXT_DOMAIN) ?></small>
                        <?php
                        if($end_date) :
                            $expiration = date('F Y', strtotime($end_date));
                            $datetime_now = new DateTime('NOW');
                            if( date_create($end_date) > $datetime_now ) :
                                ?>
                                <small><?php esc_html_e("Valid until $expiration.", TEXT_DOMAIN) ?></small>
                            <?php else : ?>
                                <small><?php esc_html_e("This has expired $expiration.", TEXT_DOMAIN) ?></small>
                            <?php 
                            endif; 
                        endif;
                        ?>

                    </div>
                </div>
            </div>
        <?php

    endwhile;
    ?>
    </div>
<?php
endif;
wp_reset_query();