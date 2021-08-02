<?php
/*
*Created by Jakuba generator (jakubao.eu)
*/
add_action('init', 'jakuba_posttype_education',0);
function jakuba_posttype_education() {
    register_post_type('jakuba_education',
        array(
            'labels'      => array(
                'name'          => _x('Education', 'Post type General name', TEXT_DOMAIN),
                'singular_name' => _x('Education', 'Post type Singular name', TEXT_DOMAIN),

                'all_items'     => __('Education', TEXT_DOMAIN),
                'add_new_item'  => __('Add', TEXT_DOMAIN),
                'add_new'       => __('Add', TEXT_DOMAIN),
            ),
            'has_archive' => false,
            'rewrite'     => array( 'slug' => _x('education','Post type Slug', TEXT_DOMAIN)), 
            'description'   => _x('CV Education','Post type description', TEXT_DOMAIN),
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

function jakuba_add_cv_education_meta_box() {
	add_meta_box( 
		'jakuba_cv_education_meta_box',
		'Details',
		'jakuba_cv_education_meta_box',
		'jakuba_education',
		'normal'
	) ;
}
add_action( 'add_meta_boxes', 'jakuba_add_cv_education_meta_box' );
add_action( 'save_post', 'save_jakuba_cv_education_meta_box' );

function jakuba_cv_education_meta_box($post){
    $details    = get_post_meta($post->ID,'details',true) ?? '';
    $from       = get_post_meta($post->ID,'from',true) ?? '';
    $to         = get_post_meta($post->ID,'to',true) ?? '';
    $university = get_post_meta($post->ID,'university',true) ?? '';
    $programme   = get_post_meta( $post->ID, 'programme',true) ?? '';
    ?>
    <strong><?php _e('At first write academic degree (education university) to title.',TEXT_DOMAIN); ?></strong>
    <div>
        <label for="university"><?=__('University / School',TEXT_DOMAIN)?></label>
        <input type="text" id="university" name="university" value="<?=$university?>">
    </div>
    <div>
        <label for="programme"><?=__('Programme / Qualification',TEXT_DOMAIN)?></label>
        <input type="text" id="programme" name="programme" value="<?=$programme?>">
    </div>

    <div>
        <label for="details"><?=__('Details (Something extra you want to share with)',TEXT_DOMAIN)?></label>
        <textarea id="details" name="details" rows="4" cols="50"><?php echo $details; ?></textarea>
    </div>
    
    <div>
        <label for="from"><?=__('From',TEXT_DOMAIN)?></label>
        <input type="number" min="1900" max="2100" id="from" name="from" value=<?php echo esc_attr($from);?>>
    </div>
    <div>
        <label for="to"><?=__('To',TEXT_DOMAIN)?></label>
        <input type="number" min="1900" max="2100" id="to" name="to" value=<?php echo esc_attr($to);?>>
        (<?=__('leave empty if this education is in progress',TEXT_DOMAIN)?>)
    </div>
    <?php
}

function save_jakuba_cv_education_meta_box( $id ) {
	if ( ! current_user_can( 'edit_post', $id ) ) {
		return;
	}
    if(  get_post_type() !== 'jakuba_education' ){
		return;
    }
	$university = isset( $_POST['university'])?$_POST['university']:'';
	$to = isset( $_POST['to'])?$_POST['to']:'';
	$from = isset( $_POST['from'])?$_POST['from']:'';
	$details = isset( $_POST['details'])?$_POST['details']:'';
	$programme = isset( $_POST['programme'])?$_POST['programme']:'';;
	update_post_meta( $id, 'details', $details );
	update_post_meta( $id, 'to', $to );
	update_post_meta( $id, 'university', $university );
	update_post_meta( $id, 'from', $from );
	update_post_meta( $id, 'programme', $programme );
}