<?php

function facebook_graph_metatags() {
  global $post;

  if ( !isset($post) ) {
    return;
  }

  $description = $post->post_content; // can't use the_description since not in the_loop :(
  if ( empty( $description ) ) {
    $description = get_bloginfo( 'description' );
  }
?>
<meta property="og:url" content="<?= esc_attr( get_the_permalink() ) ?>" />
<?php if ( is_single() ): ?>
<meta property="og:type" content="product.item" />
<?php endif; ?>
<meta property="og:title" content="<?= esc_attr( get_the_title() ) ?>" />
<meta property="og:description" content="<?= esc_attr( $description ) ?>" />
<?php
$pictures = get_field('pictures');
if ( $pictures ): ?>
<meta property="og:image" content="<?= esc_attr( $pictures[0]['sizes']['medium'] ) ?>" />
<?php
endif;
}

// facebook_graph_metatags();
add_action( 'wp_head', 'facebook_graph_metatags' );

function share_buttons() {

$share_title = 'כלב לאימוץ: ';
if (get_field( 'sex' ) == 'female') {
  $share_title = 'כלבה לאימוץ: ';
}
$share_title .= get_the_title();

$share_links = array(
  'mail' => 'mailto:?subject=' . urlencode($share_title) . '&amp;body=' . urlencode(get_the_permalink()),
  'facebook' => 'https://www.facebook.com/dialog/feed?app_id=145204419293992&amp;link=' . urlencode(get_the_permalink()) . '&amp;redirect_uri=' . urlencode(get_the_permalink()),
  'twitter' => 'https://twitter.com/intent/tweet?text=' . urlencode($share_title . ' - ' . get_the_permalink()),
  'whatsapp' => 'whatsapp://send?text=' . urlencode($share_title . ' - ' . get_the_permalink()),
);

?>

<ul class="entry-share menu">
  <li><a href="<?= $share_links['mail'] ?>"><i class="fa fa-envelope"></i></a></li>
  <li><a href="<?= $share_links['facebook'] ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
  <li><a href="<?= $share_links['twitter'] ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
  <li class="show-for-small-only"><a href="<?= $share_links['whatsapp'] ?>"><i class="fa fa-whatsapp"></i></a></li>
</ul>

<?php } ?>
