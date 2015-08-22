<?php
/*
Template Name: Homepage
*/
get_header(); ?>
<div class="row">
  <div class="small-12 large-12 columns" role="main">
  <?php

    $posts = get_posts(array(
      'posts_per_page'  => 18,
      'post_type'     => array( 'post', 'page', 'pet' ),
      'meta_key' => 'homepage_index',
      'meta_value'     => '0',
      'meta_compare'   => '>',
      'orderby' => 'meta_value',
      'order' => 'ASC'
    ));

    if( $posts ): ?>

      <ul>

      <?php foreach( $posts as $post ):
        setup_postdata( $post )
        ?>

        <li <?php post_class() ?> id="post-<?php the_ID(); ?>">
          <?php get_template_part( 'parts/box', get_post_type( $post ) ); ?>
        </li>

      <?php endforeach; ?>

      </ul>

      <?php wp_reset_postdata(); ?>

    <?php endif; ?>

  </div>
</div>

<?php get_footer(); ?>
