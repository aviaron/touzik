<?php

add_action( 'wp_ajax_pet-search', 'pet_search' );

function pet_search() {
	global $post;

	$meta_query = array(
		'relation' => 'AND'
	);

	foreach( ['sex', 'size', 'breed'] as $criterion ) {
		if ( isset( $_REQUEST[$criterion] ) && $_REQUEST[$criterion] != '' ) {
			$meta_query[] = array(
				'key' => $criterion,
				'value' => $_REQUEST[$criterion],
				'comapre' => '='
			);
		}
	}

	$posts = get_posts(array(
		'posts_per_page'  => 50,
		'post_type' => 'pet',
		'orderby' => 'ID',
		'order' => 'DESC',
		'meta_query' => $meta_query
	));

	// TODO: deal with zero results?

	foreach( $posts as $post ) {
		setup_postdata( $post );
?>
<li <?php post_class( 'small-1 large-4 columns' ) ?> id="post-<?php the_ID(); ?>">
	<div class="homepage-box">
		<?php get_template_part( 'parts/box', 'pet' ); ?>
	</div>
</li>
<?php
	}

	exit;
}

?>
