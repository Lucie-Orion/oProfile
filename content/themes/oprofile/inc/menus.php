<?php
/**
 * Menus configuration
 *
 * @package oProfile
 */

// Add menus

add_action(
	'after_setup_theme',
	'oprofile_register_nav_menus'
);

function oprofile_register_nav_menus() {
	register_nav_menus(
		[
			'header-menu' => 'Menu de l\'en-tête',
			'main-menu' => 'Menu principal',
		]
	);
}

add_filter(
	'nav_menu_css_class',
	'oprofile_list_item_class'
);

function oprofile_list_item_class( $classes ) {
	$classes[] = 'menu__list__item';

	return $classes;
}

add_filter(
	'nav_menu_link_attributes',
	'oprofile_menu_link_attributes'
);


function oprofile_menu_link_attributes( $attributes ) {
	if ( ! isset( $attributes['class'] ) ) {
		$attributes['class'] = '';
	}

	$attributes['class'] .= ' menu__list__item__link';

	$attributes['class'] = trim( $attributes['class'] );

	return $attributes;
}

add_filter('wp_nav_menu_objects', 'oprofile_menu_link_item_icon', 10, 2);

function oprofile_menu_link_item_icon( $items, $args ) {
	
	// loop
	foreach( $items as &$item ) {
		
		// vars
		$icon = get_field('icon', $item);
		
		
		// append icon
		if( $icon ) {
			
            $item->title = str_replace('','',' <i class="fa fa-'.$icon.'"></i>');

		}

	}
	
	// return
	return $items;
	
}

