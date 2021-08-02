<?php
/*
*Created by Jakuba generator (jakubao.eu)
*/
function jakuba_posttype_cv_skill() {
    register_post_type('jakuba_cv_skills',
        array(
            'labels'      => array(
                'name'          => _x('Skill Sets', 'Post type General name', TEXT_DOMAIN),
                'singular_name' => _x('Skill', 'Post type Singular name', TEXT_DOMAIN),
                'name_admin_bar' => _x('Skill Sets', 'Add New on Toolbar', TEXT_DOMAIN ),

                'all_items'     => __('Skills', TEXT_DOMAIN),
                'add_new_item'  => __('Add Skill you can speak', TEXT_DOMAIN),
                'add_new'       => __('Add', TEXT_DOMAIN),

                'edit_item'     => __('Edit Skill', TEXT_DOMAIN),
                'view_items'    => __('View Skills', TEXT_DOMAIN),
                'view_item'     => __('View Skill', TEXT_DOMAIN),
                'search_item'   => __('Search Skills', TEXT_DOMAIN),
            ),
            'has_archive' => false,
            'rewrite'     => array( 'slug' => __('skill', TEXT_DOMAIN)), 
            'description'   => _x('CV Skill Sets','Post type description', TEXT_DOMAIN),
            'supports'      => array('title'),
            'taxonomies'    => array('skill_set_type'),
            'show_in_menu' => 'manage-cv.php',
            'menu_position' => null,
            'hierarchical'   => false,
            'public' => true,
            'show_ui' => true, 
            'query_var' => true,
            'show_in_rest' => true,
        )
    );
}
add_action('init', 'jakuba_posttype_cv_skill',0);

function jakuba_add_cv_skill_meta_box() {
	add_meta_box( 
		'jakuba_cv_skill_meta_box',
		'Details',
		'jakuba_cv_skill_meta_box',
		'jakuba_cv_skills',
		'normal'
	) ;
}
add_action( 'add_meta_boxes', 'jakuba_add_cv_skill_meta_box' );
add_action( 'save_post', 'save_jakuba_cv_skill_meta_box' );

function jakuba_cv_skill_meta_box($post){
    $details    = get_post_meta($post->ID,'details',true) ?? '';
    $knowledge  = get_post_meta($post->ID,'knowledge',true) ?? 50;
    $top        = get_post_meta($post->ID,'top',true) ?? 0;
    $terms_obj  = wp_get_post_terms( $post->ID, 'skill_set_type',  array( 'fields' => 'slugs' )  );
    $term_obj   = 0;
    if( isset($terms_obj) && ! empty( $terms_obj ) ){
        $term_obj = $terms_obj[0];
    }
    $args = array(
        'show_option_all'   => __( 'Select one', TEXT_DOMAIN ),
        'id'                => 'skill_set_type',
        'name'              => 'skill_set_type',
        'selected'          => $term_obj,
        'value_field'       => 'slug',
        'hide_empty'        => false,
        'orderby'           => 'name',
        'taxonomy'          => 'skill_set_type',
    );
    ?>
    <div>
                <label for="skill_set_type"><?php _e('Select a skill set type',TEXT_DOMAIN); ?></label>
                <?php wp_dropdown_categories( $args ); ?>
                (<?php _e('You can add a new skill set type:',TEXT_DOMAIN); ?>
                <a id="create_new_typw" href="edit-tags.php?taxonomy=skill_set_type"><?php _e('Add',TEXT_DOMAIN); ?></a>)
    </div>
    <div>
        <label for="knowledge"><?=__('Knowledge in %','driven_theme')?></label>
        <input type="number" step="1" min="1" max="100" id="knowledge" name="knowledge" value="<?=$knowledge?>">
    </div>
    
    <div>
        <label for="details"><?=__('Detail info','driven_theme')?></label>
        <input type="text" id="details" name="details" value="<?=$details?>">
    </div>
    
    <div>
        <label for="top"><?=__('Is this the one of your most favorite ability/technology?','driven_theme')?></label>
        <input type="checkbox" id="top" name="top" <?php checked($top,"1");?>>
    </div>
    <?php
}

function save_jakuba_cv_skill_meta_box( $id ) {
	if ( ! current_user_can( 'edit_post', $id ) ) {
		return;
	}
    if(  get_post_type() !== 'jakuba_cv_skills' ){
		return;
    }
	$knowledge = isset( $_POST['knowledge'])?$_POST['knowledge']:'';
	$details = isset( $_POST['details'])?$_POST['details']:'';
	$top = isset( $_POST['top']);
	update_post_meta( $id, 'knowledge', $knowledge );
	update_post_meta( $id, 'details', $details );
	update_post_meta( $id, 'top', $top );
    $type = $_POST['skill_set_type'];
    if( isset($type) ){
        wp_set_post_terms( $id, $type, 'skill_set_type');
    }
}