<?php

add_action( 'wp_ajax_pet-search', 'pet_search' );

function pet_search() {
	global $post;

	$meta_query = array(
		'relation' => 'AND'
	);

	if ( isset( $_REQUEST['sex'] ) ) {
		$meta_query[] = array(
			'key' => 'sex',
			'value' => $_REQUEST['sex'],
			'comapre' => '='
		);
	}

	$posts = get_posts(array(
		'posts_per_page'  => 50,
		'post_type' => 'pet',
		'orderby' => 'ID',
		'order' => 'DESC',
		'meta_query' => $meta_query
	));

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
