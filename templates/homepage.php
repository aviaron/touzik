<?php
/*
Template Name: Homepage
*/
get_header(); ?>

<div class="row topbar">

  <div class="small-12 large-6 columns adoption-text" role="main">
    <?php dynamic_sidebar( 'adoption-widget' ); ?>
  </div>

  <div class="small-12 large-6 columns text-left" role="main">
    <div class="cat-switch">
      <a href="https://www.facebook.com/herzelialovesanimals/photos/?tab=album&album_id=378803352131267">חתולים</a>
      <span>כלבים</span>
    </div>
    <?php get_template_part( 'parts/pet-search-form' ); ?>
  </div>

</div>

<div class="row">
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

        <li <?php post_class( 'small-12 large-4 columns' ) ?> id="post-<?php the_ID(); ?>" data-post-id="<?php the_ID(); ?>">
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
    <ul class="homepage-box-list row aligned-center">
      <?= all_pets_button() ?>
    </ul>
  </div>
</div>

<?php get_footer(); ?>
