<?php
add_action( 'after_switch_theme', 'touzik_initialization' );

function touzik_initialization () {
  // change permalink structure
  global $wp_rewrite;
  $wp_rewrite->set_permalink_structure( '/%postname%/' );
  $wp_rewrite->flush_rules();
}
?>
