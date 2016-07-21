<a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>">
  <?php
  $pictures = get_field('pictures');
  if( $pictures ): ?>
    <div class="box-picture">
      <img src="<?= $pictures[0]['sizes']['medium'] ?>" alt="<?php echo $pictures[0]['alt']; ?>" />
    </div>
  <?php endif; ?>

  <?php if (get_field('adopted') == 1): ?>
    <div class="adopted-badge">
      אומצ/ה
    </div>
  <?php endif ?>

  <div class="pet-details">
    <?php if (get_field('needs_foster') == 1): ?>
      <div class="foster-badge">
        זקוק לאומנה
      </div>
    <?php endif ?>

    <header>
      <h2><?php the_title(); ?></h2>
      <ul class="pet-badges">
        <?php
          $age = abs( ( time() - strtotime( get_field( 'birthday' ) ) ) );
          $y = floor( $age / (365*60*60*24) );
          if ($y == 0) {
            $m = floor( $age / (30*60*60*24) );
            $age_s = "$y.$m";
          } else {
            $age_s = $y;
          }
        ?>
        <li class="age <?= $y == 0 ? 'puppy' : '' ?>" title="<?= $age_s ?> years old">
          <span><?= $age_s ?></span>
        </li>
        <li class="<?= esc_attr( get_field( 'sex' ) ) ?>" title="<?= esc_attr( get_field( 'sex' ) )?>">
          <span><?= esc_html( get_field_object( 'sex' )['choices'][get_field( 'sex' )] )?></span>
        </li>
      </ul>
    </header>
    <div class="pet-description">
      <?php the_content(); ?>
    </div>
  </div>

  <span class="pet-link">לפרטים נוספים ולטופס התעניינות</span>
</a>
