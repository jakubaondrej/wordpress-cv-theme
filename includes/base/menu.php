<?php 
function jakuba_get_menu_buttons($theme_location) {
    if ( ($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location]) ) {
        $args = array(
            'fallback_cb'       => 'link_to_menu_editor', 
            'echo'              => false, 
            'theme_location'    => $theme_location, 
            'walker'            => new Oja_Nav_Menu_Walker,
            'container'         => false,
            'menu_class'        => false,
            'items_wrap'        => '%3$s',
        );
        return wp_nav_menu( $args );
    }
    else if( current_user_can( 'edit_theme_options' ) ){
        return 'You can set it in administration.';
    }
}
