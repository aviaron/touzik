<?php
/**
 * The template for displaying pet posts
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="row">
  <div class="small-12 large-12 columns" role="main">

  <?php while ( have_posts() ) : the_post(); ?>
    <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
      <div class="entry-content">

      <?php
      $pictures = get_field('pictures');

      if( $pictures ): ?>
        <ul class="pet-gallery">
          <?php foreach( $pictures as $picture ): ?>
            <li class="item">
              <img src="<?= $picture['sizes']['large'] ?>" alt="<?php echo $picture['alt']; ?>" />
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>

      <div class="row">
        <div class="entry-content large-9 small-1 columns">
          <header>
            <h1 class="entry-title"><?php the_title(); ?></h1>
          </header>
          <?php the_content(); ?>

          <?php if( get_field( 'attributes' ) ): ?>
            <ul class="pet-attributes">
            <?php foreach( get_field('attributes') as $attribute ): ?>
              <li class="<?= esc_attr( $attribute ); ?>">
                <?= esc_html( $attribute ); ?>
              </li>
            <?php endforeach; ?>
            </ul>
          <?php endif; ?>
        </div>

        <div class="pet-contact large-3 small-1 columns">
          <h2 class="contact-form">מתעניין באימוץ?</h2>
          <?= do_shortcode( '[contact-form-7 id="35" title="התעניינות באימוץ"]' ); ?>
        </div>
      </div>

      </div>
    </article>
  <?php endwhile;?>

  <?php do_action( 'foundationpress_after_content' ); ?>

  </div>
</div>
<?php get_footer(); ?>
