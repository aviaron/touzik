<a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>">
  <?php
  $pictures = get_field('pictures');
  if( $pictures ): ?>
    <div class="box-picture">
      <img src="<?= $pictures[0]['sizes']['medium'] ?>" alt="<?php echo $pictures[0]['alt']; ?>" />
    </div>
  <?php endif; ?>

  <div class="pet-details">
    <h2><?php the_title(); ?></h2>
    <div class="pet-description">
      <?php the_content(); ?>
    </div>
  </div>

  <span class="pet-link">לפרטים נוספים ולטופס התעניינות</span>
</a>
