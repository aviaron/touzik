<?php

add_action( 'wp_ajax_pet-search', 'pet_search' );
add_action( 'wp_ajax_nopriv_pet-search', 'pet_search' );

function render_results($posts) {
	global $post;

	foreach( $posts as $post ) {
		setup_postdata( $post );
?>
<li <?php post_class( 'small-12 large-4 columns' ) ?> id="post-<?php the_ID(); ?>">
	<div class="homepage-box">
		<?php get_template_part( 'parts/box', 'pet' ); ?>
	</div>
</li>
<?php
	}
}

function pet_search() {
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
		'posts_per_page' => 50,
		'post_type' => 'pet',
		'orderby' => 'ID',
		'order' => 'DESC',
		'meta_query' => $meta_query
	));

	if ( $posts ) {
		render_results($posts);
	} else {
		$posts = random_pets();
?>
	<li class="no-results small-12 large-12 columns">
		לא נמצאו תוצאות על פי פרמטרי החיפוש. אולי הכלבים הבאים יעניינו אותך.
		<h2 class="text-center">כלבים נוספים לאימוץ</h2>
	</li>
<?php
		render_results($posts);
	}

	exit;
}

function random_pets() {
	return get_posts(array(
		'posts_per_page' => 3,
		'post_type' => 'pet',
		'orderby' => 'rand'
	));
}

?>
