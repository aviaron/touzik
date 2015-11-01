<?php
/*
Template Name: Homepage
*/
get_header(); ?>

<?php get_template_part( 'parts/pet-search-form' ); ?>

<div class="row">
  <div class="small-12 large-12 columns" role="main">
  <?php

    $posts = get_posts(array(
      'posts_per_page'  => 18,
      'post_type' => array( 'post', 'page', 'pet' ),
      'meta_key' => 'homepage_index',
      'meta_value' => '0',
      'meta_compare' => '>',
      'orderby' => 'meta_value_num',
      'order' => 'ASC'
    ));

    if( $posts ): ?>

      <ul class="homepage-box-list row">

      <?php foreach( $posts as $post ):
        setup_postdata( $post )
        ?>

        <li <?php post_class( 'small-1 large-4 columns' ) ?> id="post-<?php the_ID(); ?>" data-post-id="<?php the_ID(); ?>">
          <div class="homepage-box homepage-box-<?= get_field('box_theme') ?>">
            <?php if ( current_user_can( 'edit_others_posts' ) ): ?>
            <div class="admin-bar">
              <button class="remove" title="Remove from homepage">
                <span class="dashicons dashicons-no"></span>
              </button>
              <div class="handle" title="Drag to reorder">
                <span class="dashicons dashicons-menu"></span>
              </div>
            </div>
            <?php endif; ?>
            <?php get_template_part( 'parts/box', get_post_type( $post ) ); ?>
          </div>
        </li>

      <?php endforeach; ?>

      </ul>

      <?php wp_reset_postdata(); ?>

    <?php endif; ?>

  </div>
</div>

<?php get_footer(); ?>
