<?php
/*
*Created by Jakuba generator (jakubao.eu)
*/
function jakuba_posttype_cv_language() {
    register_post_type('jakuba_cv_language',
        array(
            'labels'      => array(
                'name'          => _x('Languages you can speak', 'Post type General name', TEXT_DOMAIN),
                'singular_name' => _x('Language', 'Post type Singular name', TEXT_DOMAIN),
                'name_admin_bar' => _x('Languages', 'Add New on Toolbar', TEXT_DOMAIN ),

                'all_items'     => __('Languages', TEXT_DOMAIN),
                'add_new_item'  => __('Add language you can speak', TEXT_DOMAIN),
                'add_new'       => __('Add', TEXT_DOMAIN),

                'edit_item'     => __('Edit language', TEXT_DOMAIN),
                'view_items'    => __('View languages', TEXT_DOMAIN),
                'view_item'     => __('View language', TEXT_DOMAIN),
                'search_item'   => __('Search languages', TEXT_DOMAIN),
            ),
            'has_archive' => false,
            'rewrite'     => array( 'slug' => __('language', TEXT_DOMAIN)), 
            'description'   => _x('Custom post type language','Post type description', TEXT_DOMAIN),
            'supports'      => array('title'),
            'taxonomies'    => array(),
            'show_in_menu' => 'manage-cv.php',
            'menu_position' => null,
            'hiearchical'   => false,
            'public' => true,
            'show_ui' => true, 
            'query_var' => true,
        )
    );
}
add_action('init', 'jakuba_posttype_cv_language',0);

function jakuba_add_cv_language_meta_box() {
	add_meta_box( 
		'jakuba_cv_language_meta_box',
		'Details',
		'jakuba_cv_language_meta_box',
		'jakuba_cv_language',
		'normal'
	) ;
}
add_action( 'add_meta_boxes', 'jakuba_add_cv_language_meta_box' );
add_action( 'save_post', 'save_jakuba_cv_language_meta_box' );

function jakuba_cv_language_meta_box($post){
    $level = get_post_meta($post->ID,'level',true)??'';
    ?>
    <div>
        <label for="level"><?=__('Proficiency level (CEFR description)','driven_theme')?></label>
        <input type="text" id="level" name="level" value="<?=$level?>">
    </div>
    <?php
}

function save_jakuba_cv_language_meta_box( $id ) {
	if ( ! current_user_can( 'edit_post', $id ) ) {
		return;
	}
	$level = isset( $_POST['level'])?$_POST['level']:'';
	
	update_post_meta( $id, 'level', $level );
}