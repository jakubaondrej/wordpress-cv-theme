<h2 class="mb-1"><?php _e('Skills', TEXT_DOMAIN); ?></h2>
<div class="px-2">
    <?php
    $skill_types = get_terms('skill_set_type');

    foreach ($skill_types as $skill_type) :
        $args = array(
            'post_type' => 'jakuba_cv_skills',
            'orderby'   => 'meta_value_num',
            'meta_key'  => 'knowledge',
            'tax_query' => array(
                array(
                    'taxonomy' => 'skill_set_type',
                    'field'    => 'term_id',
                    'terms'    => $skill_type->term_id
                )
            )
        );
        query_posts($args);
        if (have_posts()) : ?>
            <h3 class="mt-2 mb-1"><?php echo $skill_type->name; ?></h3>
            <div class="px-2">
                <?php
                while (have_posts()) : the_post();
                    $details    = get_post_meta(get_the_ID(), 'details', true) ?? '';
                    $knowledge  = get_post_meta(get_the_ID(), 'knowledge', true) ?? 50;
                    $top        = get_post_meta(get_the_ID(), 'top', true) ?? 0;
                ?>
                    <div class="row <?php echo $top == 0 ? '' : 'top'; ?>">
                        <div class="col-3">
                            <?php if ( $top == 1 ) : ?>
                                <span class="material-icons" title="<?php esc_attr_e( 'I like it!', TEXT_DOMAIN ); ?>">favorite</span>
                            <?php endif ?>
                            <a class="text-white" href="#collapse<?php echo get_the_ID(); ?>" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapse<?php echo get_the_ID(); ?>">
                                <strong data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $details; ?>"><?php the_title(); ?></strong> 
                            </a>
                        </div>
                        <div class="col">
                            <div class="progress bg-primary">
                                <div class="progress-bar bg-info text-black" role="progressbar" style="width: <?php echo $knowledge; ?>%" aria-valuenow="<?php echo $knowledge; ?>" aria-valuemin="0" aria-valuemax="100"><?php esc_html_e("$knowledge%"); ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="collapse" id="collapse<?php echo get_the_ID(); ?>">
                        <div class="card card-body">
                            <?php echo $details; ?>
                        </div>
                    </div>
                <?php
                endwhile;
                ?>
            </div>
    <?php
        endif;
    endforeach;
    ?>
</div>