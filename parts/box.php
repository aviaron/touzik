<?php if( has_post_thumbnail() ): ?>
  <div class="box-picture">
    <?php the_post_thumbnail() ?>
  </div>
<?php endif; ?>

<div class="box-content">
  <h3><?= the_title() ?></h3>
  <?= the_content() ?>
</div>

<?php
$link = get_field('link');
$link_text = get_field('link_text');
$link_text = $link_text ? $link_text : $link;
if ($link): ?>
  <p class="link">
    <a class="button" href="<?= $link ?>"><?= $link_text ?></a>
  </p>
<?php endif; ?>
