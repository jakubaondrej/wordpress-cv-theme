<?php
function jakuba_add_cv_admin_menu() {
    add_menu_page( 
        __('manage your CV',TEXT_DOMAIN),   //page title
        __('CV',TEXT_DOMAIN),   //menu title
        'manage_options',   //capability
        'manage-cv.php', //menu_slug, 
        'jakuba_cv_admin_page_contents',     //callable function
        'dashicons-id-alt',     //$icon_url, 
        3      //position 
    );
    //add_menu_page( 'Multiple Post Types Page', 'Multiple Post Types', 'manage_options', 'your-custom-menu-slug.php', 'your_menu_function');
   /* $page_hook = add_submenu_page(   
        'manage-cv.php',                //string $parent_slug, 
        __('Introduction',TEXT_DOMAIN), //string $page_title, 
        __('Introduction',TEXT_DOMAIN), //string $menu_title, 
        'manage_options',               //string $capability, 
        'cv-introduction',              //string $menu_slug, 
        'jakuba_cv_introduction',       //callable $function = '', 
        0                               //int $position = null
    );
    */
    //$hook = add_management_page( 'Test', 'Test', 8, 'testload');
   //print('load-'.$page_hook);exit; //load-cv_page_cv-introduction
}
add_action('admin_menu', 'jakuba_add_cv_admin_menu');

