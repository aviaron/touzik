<header>
  <?php
  $pictures = get_field('pictures');
  if( $pictures ): ?>
    <img src="<?= $pictures[0]['url'] ?>" alt="<?php echo $pictures[0]['alt']; ?>" />
  <?php endif; ?>
  <h1 class="entry-title"><?php the_title(); ?></h1>
  <?php the_content(); ?>
</header>
