<?php
class Oja_Nav_Menu_Walker extends Walker {
    var $tree_type = array( 'post_type', 'taxonomy', 'custom' );
    var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );

    function start_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent";
    }

    function end_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
		$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );
		
        $title = apply_filters( 'the_title', $item->title, $item->ID );
		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

        $item_output = $args->before;

        $item_output .= '<a'. $attributes . ' class="btn-block btn btn-primary m-2 flex-fill">';
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= "</a>\n";

        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}