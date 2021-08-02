<?php
/*
*Created by Jakuba generator (jakubao.eu)
*/
add_action('init', 'jakuba_posttype_work_history',0);

function jakuba_posttype_work_history() {
    register_post_type('jakuba_work_history',
        array(
            'labels'      => array(
                'name'          => _x('Work history', 'Post type General name', TEXT_DOMAIN),
                'singular_name' => _x('Work history', 'Post type Singular name', TEXT_DOMAIN),

                'all_items'     => __('Work history', TEXT_DOMAIN),
                'add_new_item'  => __('Add next work experience', TEXT_DOMAIN),
                'add_new'       => __('Add', TEXT_DOMAIN),
            ),
            'has_archive' => false,
            'rewrite'     => array( 'slug' => __('work_history', TEXT_DOMAIN)), 
            'description'   => _x('CV Work histories','Post type description', TEXT_DOMAIN),
            'supports'      => array('title'),//
            'taxonomies'    => array(),
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

function jakuba_add_cv_work_history_meta_box() {
	add_meta_box( 
		'jakuba_cv_work_history_meta_box',
		'Details',
		'jakuba_cv_work_history_meta_box',
		'jakuba_work_history',
		'normal'
	) ;
}
add_action( 'add_meta_boxes', 'jakuba_add_cv_work_history_meta_box' );
add_action( 'save_post', 'save_jakuba_cv_work_history_meta_box' );

function jakuba_cv_work_history_meta_box($post){
    $details    = get_post_meta($post->ID,'details',true) ?? '';
    $from       = get_post_meta($post->ID,'from',true) ?? '';
    $to         = get_post_meta($post->ID,'to',true) ?? '';
    $company_address = get_post_meta($post->ID,'company_address',true) ?? '';
    
    $position   = get_post_meta( $post->ID, 'position',true) ?? '';
    ?>
    <strong><?php _e('At first write company name to title.',TEXT_DOMAIN); ?></strong>
    <div>
        <label for="company_address"><?=__('Company address',TEXT_DOMAIN)?></label>
        <input type="text" id="company_address" name="company_address" value="<?=$company_address?>">
    </div>
    <div>
        <label for="position"><?=__('Position',TEXT_DOMAIN)?></label>
        <input type="text" id="position" name="position" value="<?=$position?>">
    </div>

    <div>
        <label for="details"><?=__('Details',TEXT_DOMAIN)?></label>
        <textarea id="details" name="details" rows="4" cols="50"><?php echo $details; ?></textarea>
    </div>
    
    <div>
        <label for="from"><?=__('From',TEXT_DOMAIN)?></label>
        <input type="date" id="from" name="from" value=<?php echo esc_attr($from);?>>
    </div>
    <div>
        <label for="to"><?=__('To (leave empty if this is your curent job)',TEXT_DOMAIN)?></label>
        <input type="date" id="to" name="to" value=<?php echo esc_attr($to);?>>
    </div>
    <?php
}

function save_jakuba_cv_work_history_meta_box( $id ) {
	if ( ! current_user_can( 'edit_post', $id ) ) {
		return;
	}
    if(  get_post_type() !== 'jakuba_work_history' ){
		return;
    }
	$company_address = isset( $_POST['company_address'])?$_POST['company_address']:'';
	$to = isset( $_POST['to'])?$_POST['to']:'';
	$from = isset( $_POST['from'])?$_POST['from']:'';
	$details = isset( $_POST['details'])?$_POST['details']:'';
	$position = isset( $_POST['position'])?$_POST['position']:'';;
	update_post_meta( $id, 'details', $details );
	update_post_meta( $id, 'to', $to );
	update_post_meta( $id, 'company_address', $company_address );
	update_post_meta( $id, 'from', $from );
	update_post_meta( $id, 'position', $position );
}