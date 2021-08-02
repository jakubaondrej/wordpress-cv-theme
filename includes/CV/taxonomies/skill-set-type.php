<?php
function jakuba_taxonomy_skill_set_type()
{
    $labels = array(
        'name'              => _x('Skill Set type', 'taxonomy general name',TEXT_DOMAIN),
        'parent_item'                => null,
        'parent_item_colon'          => null
    );
    $args =  array(
        'hierarchical'      => false,
        'labels'            => $labels,
        'description'   => _x('CV skill set type Taxonomy','Post type description', TEXT_DOMAIN),
        'show_ui'           => true,
        'show_admin_column' => true,
        'public'            => true,
        'update_count_callback' => '_update_post_term_count',
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'meta_box_cb'  => false,
        'show_in_rest' => true,
        "show_in_menu" => true,
    );
    register_taxonomy('skill_set_type', array( 'jakuba_cv_skills' ), $args);
}
add_action('init', 'jakuba_taxonomy_skill_set_type');

