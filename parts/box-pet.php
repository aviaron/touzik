<?php
$pictures = get_field('pictures');
if( $pictures ): ?>
  <img src="<?= $pictures[0]['url'] ?>" alt="<?php echo $pictures[0]['alt']; ?>" />
<?php endif; ?>

<h2><?php the_title(); ?></h2>
<?php the_content(); ?>
