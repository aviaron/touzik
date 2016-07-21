<?php
/**
 * Register widget areas
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'foundationpress_sidebar_widgets' ) ) :
function foundationpress_sidebar_widgets() {
	register_sidebar(array(
	  'id' => 'sidebar-widgets',
	  'name' => __( 'Sidebar widgets', 'foundationpress' ),
	  'description' => __( 'Drag widgets to this sidebar container.', 'foundationpress' ),
	  'before_widget' => '<article id="%1$s" class="widget %2$s">',
	  'after_widget' => '</article>',
	  'before_title' => '<h6>',
	  'after_title' => '</h6>',
	));

	register_sidebar(array(
	  'id' => 'footer-widgets-r',
	  'name' => __( 'Footer right widgets', 'foundationpress' ),
	  'description' => __( 'Drag widgets to this footer container', 'foundationpress' ),
	  'before_widget' => '<article id="%1$s" class="widget %2$s">',
	  'after_widget' => '</article>',
	  'before_title' => '<h6>',
	  'after_title' => '</h6>',
	));

	register_sidebar(array(
	  'id' => 'footer-widgets-l',
	  'name' => __( 'Footer left widgets', 'foundationpress' ),
	  'description' => __( 'Drag widgets to this footer container', 'foundationpress' ),
	  'before_widget' => '<article id="%1$s" class="widget %2$s">',
	  'after_widget' => '</article>',
	  'before_title' => '<h6>',
	  'after_title' => '</h6>',
	));

	register_sidebar(array(
	  'id' => 'adoption-widget',
	  'name' => __( 'Adoption widget', 'foundationpress' ),
	  'description' => __( 'Drag widgets to this container', 'foundationpress' ),
	  'before_widget' => '<div id="%1$s" class="widget %2$s">',
	  'after_widget' => '</div>',
	  'before_title' => '<div class="adoption-widget-title">',
	  'after_title' => '</div>',
	));

	register_sidebar(array(
	  'id' => 'topbar-end',
	  'name' => __( 'Top bar end', 'foundationpress' ),
	  'description' => __( 'Drag widgets to this container', 'foundationpress' ),
	  'before_widget' => '<div id="%1$s" class="widget %2$s">',
	  'after_widget' => '</div>',
	));
}

add_action( 'widgets_init', 'foundationpress_sidebar_widgets' );
endif;
