<?php
$pictures = get_field('pictures');
if( $pictures ): ?>
  <div class="box-picture">
    <img src="<?= $pictures[0]['url'] ?>" alt="<?php echo $pictures[0]['alt']; ?>" />
  </div>
<?php endif; ?>

<div class="pet-details">
  <h2><?php the_title(); ?></h2>
  <div class="pet-description">
    <?php the_content(); ?>
  </div>
</div>
