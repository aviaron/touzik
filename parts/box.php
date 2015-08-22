<h2><?= the_title() ?></h2>
<?= the_content() ?>

<?php
$link = get_field('link');
$link_text = get_field('link_text');
$link_text = $link_text ? $link_text : $link;
if ($link): ?>
  <p class="link">
    <a class="button" href="<?= $link ?>"><?= $link_text ?></a>
  </p>
<?php endif; ?>
