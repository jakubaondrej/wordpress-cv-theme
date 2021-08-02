<?php
add_action('after_setup_theme', 'jakuba_add_introduction_options');
function jakuba_add_introduction_options(){
    if (FALSE === get_option('introduction_title')) 
        add_option('introduction_title','Introduction');
}

add_action('admin_menu', 'jakuba_add_introduction_setting_page');
function jakuba_add_introduction_setting_page()
{
	if (FALSE === get_option('introduction_title')) {
		add_option('introduction_title', 'Introduction');
	}
	$introduction_page = add_submenu_page(
		'manage-cv.php',                //string $parent_slug, 
		__('Introduction', TEXT_DOMAIN), //string $page_title, 
		__('Introduction', TEXT_DOMAIN), //string $menu_title, 
		'manage_options',               //string $capability, 
		'cv-introduction',              //string $menu_slug, 
		'jakuba_cv_introduction',       //callable $function = '', 
		0                               //int $position = null
	);
	add_action("load-{$introduction_page}", 'jakuba_cv_introduction_save_options');
}

function jakuba_cv_introduction()
{
	get_template_part('includes/CV/contents/introduction', 'Introduction');
}

function jakuba_cv_introduction_save_options()
{
	$action       = 'jakuba-introduction-save';
	$nonce        = 'jakuba-introduction-save-nonce';

	$is_nonce_set   = isset($_POST[$nonce]);
	$is_valid_nonce = false;

	if ($is_nonce_set) {
		$is_valid_nonce = wp_verify_nonce($_POST[$nonce], $action);
	}

	$is_nonce_ok = $is_nonce_set && $is_valid_nonce;

	// If the user doesn't have permission to save, then display an error message
	if (!$is_nonce_ok) {
		return;
	}

	/* Here is where you update your options. Depending on what you've implemented,
	   the code may vary, but it will generally follow something like this:
	*/
	if (isset($_POST['introduction_title'])) {
		//- Sanitize the code
		update_option('introduction_title', $_POST['introduction_title']);
	} else {
		delete_option('introduction_title');
	}
	if (isset($_POST['introduction_text'])) {
		//- Sanitize the code
		update_option('introduction_text', $_POST['introduction_text']);
	} else {
		delete_option('introduction_text');
	}
	if (isset($_POST['introduction_image_id'])) {
		//- Sanitize the code
		update_option('introduction_image_id', $_POST['introduction_image_id']);
	} else {
		delete_option('introduction_image_id');
	}
	if (isset($_POST['birthdate'])) {
		//- Sanitize the code
		update_option('birthdate', $_POST['birthdate']);
	} else {
		delete_option('birthdate');
	}
}
