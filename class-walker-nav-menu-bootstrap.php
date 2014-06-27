<?php

/**
 * @author Spencer Baynton
 * @uses Walker_Nav_Menu
 * @version 1.0.0
 */
class Walker_Nav_Menu_Bootstrap extends Walker_Nav_Menu {

	function start_lvl( &$output, $depth = 0, $args = array() ) {

		$output .= '<ul class="dropdown-menu">';

	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

		$item->classes[] = 'menu-item-' . $item->ID;

		if ( $item->current ) {
			$item->classes[] = 'active';
		}

		if ( in_array( 'menu-item-has-children', $item->classes ) ) {
			$item->classes[] = 'dropdown';
		}

		$item->classes = apply_filters( 'nav_menu_css_class', array_filter( $item->classes ), $item, $args );
		$class = $item->classes ? ' class="' . esc_attr( join( ' ', $item->classes ) ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= '<li' . $class . $id . '>';

		if ( ! in_array( 'divider', $item->classes ) ) {

			$item_output = $args->before;

			if ( ! in_array( 'dropdown-header', $item->classes ) ) {

				$item_output .= '<a';

				if ( in_array( 'dropdown', $item->classes ) ) {
					$item_output .= ' class="dropdown-toggle" data-toggle="dropdown"';
				}

				$attributes = array();
				$attributes['href']   = $item->url;
				$attributes['rel']    = $item->xfn;
				$attributes['target'] = $item->target;
				$attributes['title']  = $item->attr_title;
				$attributes = apply_filters( 'nav_menu_link_attributes', $attributes, $item, $args );

				foreach ( $attributes as $attribute => $value ) {
					if ( ! empty( $value ) ) {
						$value = ( 'href' === $attribute ) ? esc_url( $value ) : esc_attr( $value );
						$item_output .= ' ' . $attribute . '="' . $value . '"';
					}
				}

				$item_output .= '>';
				$item_output .= $args->link_before;

			}

			$item_output .= apply_filters( 'the_title', $item->title, $item->ID );

			if ( ! in_array( 'dropdown-header', $item->classes ) ) {

				if ( in_array( 'dropdown', $item->classes ) ) {
					$item_output .= ' <span class="caret"></span>';
				}

				$item_output .= $args->link_after;
				$item_output .= '</a>';

			}

			$item_output .= $args->after;

		}

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

	}

}
