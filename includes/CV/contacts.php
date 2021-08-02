<?php
add_action('after_setup_theme', 'jakuba_add_contact_options');
function jakuba_add_contact_options(){
    if (FALSE === get_option('contacts_title')) 
        add_option('contacts_title','Contacts');
}

add_action('admin_menu', 'jakuba_add_contact_setting_page');
function jakuba_add_contact_setting_page()
{
	if (FALSE === get_option('contacts_title')) {
		add_option('contacts_title', 'Contacts');
	}
	$contact_page = add_submenu_page(
		'manage-cv.php',                //string $parent_slug, 
		__('Contacts', TEXT_DOMAIN), //string $page_title, 
		__('Contacts', TEXT_DOMAIN), //string $menu_title, 
		'manage_options',               //string $capability, 
		'cv-contacts',              //string $menu_slug, 
		'jakuba_cv_contacts',       //callable $function = '', 
		1                               //int $position = null
	);
	add_action("load-{$contact_page}", 'jakuba_cv_contact_save_options');
}

function jakuba_cv_contacts()
{
	get_template_part('includes/CV/contents/contacts', 'Contacts');
}

function jakuba_cv_contact_save_options()
{
	$action       = 'jakuba-contacts-save';
	$nonce        = 'jakuba-contacts-save-nonce';

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
	if (isset($_POST['contacts_title'])) {
		//- Sanitize the code
		update_option('contacts_title', $_POST['contacts_title']);
	} else {
		delete_option('contacts_title');
	}

	if (isset($_POST['cv_address'])) {
		//- Sanitize the code
		update_option('cv_address', $_POST['cv_address']);
	} else {
		delete_option('cv_address');
	}

	if (isset($_POST['cv_phone'])) {
		//- Sanitize the code
		update_option('cv_phone', $_POST['cv_phone']);
	} else {
		delete_option('cv_phone');
	}

	if (isset($_POST['cv_phone2'])) {
		//- Sanitize the code
		update_option('cv_phone2', $_POST['cv_phone2']);
	} else {
		delete_option('cv_phone2');
	}

	if (isset($_POST['cv_email'])) {
		//- Sanitize the code
		update_option('cv_email', $_POST['cv_email']);
	} else {
		delete_option('cv_email');
	}

	if (isset($_POST['cv_linkedin_url'])) {
		//- Sanitize the code
		update_option('cv_linkedin_url', $_POST['cv_linkedin_url']);
	} else {
		delete_option('cv_linkedin_url');
	}

	if (isset($_POST['cv_linkedin_text'])) {
		//- Sanitize the code
		update_option('cv_linkedin_text', $_POST['cv_linkedin_text']);
	} else {
		delete_option('cv_linkedin_text');
	}

	if (isset($_POST['cv_another_contact'])) {
		//- Sanitize the code
		update_option('cv_another_contact', $_POST['cv_another_contact']);
	} else {
		delete_option('cv_another_contact');
	}
}
