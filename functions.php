<?php
define('TEXT_DOMAIN','jakubaondrej');
require  __DIR__ . '/includes/require_includes.php';

function custom_theme_assets() {
    wp_enqueue_style( 'main', get_template_directory_uri() . '/main.css' ,false);
    //wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/includes/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style( 'dashicons' );
    wp_enqueue_style( 'material-icons',"https://fonts.googleapis.com/icon?family=Material+Icons" );

    
    wp_enqueue_script(
        'jquery'
    );
    wp_enqueue_script(
        'Bootstrap-js', 
        get_template_directory_uri() . '/includes/js/bootstrap.min.js',
        array('jquery') 
    );
    wp_enqueue_script(
        'Bootstrap-bundle', 
        get_template_directory_uri() . '/includes/js/bootstrap.bundle.min.js',
        array('jquery') 
    );
   /* wp_enqueue_script(
        'background-robo-script', 
        get_template_directory_uri() . '/includes/js/background-robo.js' ,
        array('jquery') 
    );*/
    wp_enqueue_script(
        'main-js', 
        get_template_directory_uri() . '/includes/js/main.js' ,
        array('jquery') 
    );
}
add_action( 'wp_enqueue_scripts', 'custom_theme_assets' );

add_theme_support('menus');

register_nav_menus( 
	array( 
		'primary-menu' => __( 'Header menu', 'theme' ),
	)
);

function jakuba_image_uploader_enqueue($hook_suffix) {
    if( $hook_suffix=='cv_page_cv-introduction' ) {
        wp_enqueue_media();

        wp_register_script( 'meta-image', get_template_directory_uri() . '/includes/js/media-uploader.js', array( 'jquery' ) );
        wp_localize_script( 'meta-image', 'meta_image',
            array(
                'title' => 'Upload an Image',
                'button' => 'Use this Image',
                'multiple' => false
            )
        );
        wp_enqueue_script( 'meta-image' );
    }
}
add_action( 'admin_enqueue_scripts', 'jakuba_image_uploader_enqueue' );