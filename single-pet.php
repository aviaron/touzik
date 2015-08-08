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
  <div class="small-12 large-8 columns" role="main">

  <?php while ( have_posts() ) : the_post(); ?>
    <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
      <header>
        <h1 class="entry-title"><?php the_title(); ?></h1>
      </header>
      <div class="entry-content">

      <?php
      $pictures = get_field('pictures');

      if( $pictures ): ?>
          <ul>
              <?php foreach( $pictures as $picture ): ?>
                  <li>
                      <a href="<?php echo $picture['url']; ?>">
                           <img src="<?php echo $picture['sizes']['thumbnail']; ?>" alt="<?php echo $picture['alt']; ?>" />
                      </a>
                      <p><?php echo $picture['caption']; ?></p>
                  </li>
              <?php endforeach; ?>
          </ul>
      <?php endif; ?>

      <?php if ( has_post_thumbnail() ) : ?>
        <div class="row">
          <div class="column">
            <?php the_post_thumbnail( '', array('class' => 'th') ); ?>
          </div>
        </div>
      <?php endif; ?>

      <?php the_content(); ?>
      </div>
      <footer>
        <?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
        <p><?php the_tags(); ?></p>
      </footer>
      <?php do_action( 'foundationpress_post_before_comments' ); ?>
      <?php comments_template(); ?>
      <?php do_action( 'foundationpress_post_after_comments' ); ?>
    </article>
  <?php endwhile;?>

  <?php do_action( 'foundationpress_after_content' ); ?>

  </div>
</div>
<?php get_footer(); ?>
