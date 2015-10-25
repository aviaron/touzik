<?php
define('NONCE_NAME', 'admin-ajax-nonce');

add_action( 'wp_ajax_homepage-shuffle', 'homepage_shuffle' );
add_action( 'wp_ajax_homepage-remove', 'homepage_remove' );

function register_client_side_values() {
  wp_localize_script( 'foundation', 'Touzik', array(
   'admin_url' => admin_url( 'admin-ajax.php' ),
   'nonce' => wp_create_nonce( NONCE_NAME ),
   )
  );
}

add_action( 'wp_enqueue_scripts', 'register_client_side_values' );

function verify_nonce() {
	$nonce = $_SERVER['HTTP_X_TOUZIK_NONCE'];
	if ( ! wp_verify_nonce( $nonce, NONCE_NAME ) ) {
		die ( 'Not authorized' );
	}
}

function homepage_shuffle() {
  verify_nonce();

	foreach( $_POST['list'] as $index => $postId ) {
		update_post_meta( $postId, 'homepage_index', $index + 1 );
	}
	exit;
}

function homepage_remove() {
  verify_nonce();

	update_post_meta( $_POST['postId'], 'homepage_index', null );
	exit;
}
?>
