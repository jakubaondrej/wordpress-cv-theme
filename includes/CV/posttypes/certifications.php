<?php
/*
*Created by Jakuba generator (jakubao.eu)
*/
add_action('init', 'jakuba_posttype_certification',0);
function jakuba_posttype_certification() {
    register_post_type('jakuba_certification',
        array(
            'labels'      => array(
                'name'          => _x('Licence and Certification', 'Post type General name', TEXT_DOMAIN),
                'singular_name' => _x('Licence and Certification', 'Post type Singular name', TEXT_DOMAIN),

                'all_items'     => __('Licence and Certification', TEXT_DOMAIN),
                'add_new_item'  => __('Add', TEXT_DOMAIN),
                'add_new'       => __('Add', TEXT_DOMAIN),
            ),
            'has_archive' => false,
            'rewrite'     => array( 'slug' => _x('certification','Post type Slug', TEXT_DOMAIN)), 
            'description'   => _x('CV Licence and Certification','Post type description', TEXT_DOMAIN),
            'supports'      => array('title'),//
            'taxonomies'    => array(),
            'show_in_menu' => 'manage-cv.php',
            'menu_qualification' => null,
            'hierarchical'   => false,
            'public' => true,
            'show_ui' => true, 
            'query_var' => true,
            'show_in_rest' => true,
        )
    );
}

function jakuba_add_cv_certification_meta_box() {
	add_meta_box( 
		'jakuba_cv_certification_meta_box',
		'Details',
		'jakuba_cv_certification_meta_box',
		'jakuba_certification',
		'normal'
	) ;
}
add_action( 'add_meta_boxes', 'jakuba_add_cv_certification_meta_box' );
add_action( 'save_post', 'save_jakuba_cv_certification_meta_box' );

function jakuba_cv_certification_meta_box($post){
    $publisher    = get_post_meta($post->ID,'publisher',true) ?? '';
    $publish_date         = get_post_meta($post->ID,'publish_date',true) ?? '';
    $end_date         = get_post_meta($post->ID,'end_date',true) ?? '';
    ?>
    <strong><?php _e('Name of the license / certification write to the title.',TEXT_DOMAIN); ?></strong>
    <div>
        <label for="publisher"><?=__('Published by:',TEXT_DOMAIN)?></label>
        <input type="text" id="publisher" name="publisher" value="<?=$publisher?>">
    </div>
    <div>
        <label for="publish_date"><?=__('Publish date',TEXT_DOMAIN)?></label>
        <input type="date" id="publish_date" name="publish_date" value=<?php echo esc_attr($publish_date);?>>
    </div>
    <div>
        <label for="end_date"><?=__('Expiration ',TEXT_DOMAIN)?></label>
        <input type="date" id="end_date" name="end_date" value=<?php echo esc_attr($end_date);?>>
        (<?=__('leave empty if this license / certification is not limited in time ',TEXT_DOMAIN)?>)
    </div>
    <?php
}

function save_jakuba_cv_certification_meta_box( $id ) {
	if ( ! current_user_can( 'edit_post', $id ) ) {
		return;
	}
    if(  get_post_type() !== 'jakuba_certification' ){
		return;
    }
	$publisher = isset( $_POST['publisher'])?$_POST['publisher']:'';
	$publish_date = isset( $_POST['publish_date'])?$_POST['publish_date']:'';
	$end_date = isset( $_POST['end_date'])?$_POST['end_date']:'';
	update_post_meta( $id, 'publisher', $publisher );
	update_post_meta( $id, 'publish_date', $publish_date );
	update_post_meta( $id, 'end_date', $end_date );
}