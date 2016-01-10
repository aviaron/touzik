<?php

function search_options_for($name, $default_label) {
  $field = acf_get_local_field( "field_$name" );
?>
<select name="<?= $name ?>">
  <option selected value=""><?= $field['label'] ?></option>
  <option disabled>─</option>
  <?php foreach( $field['choices'] as $key => $value ): ?>
    <option value="<?= $key ?>"><?= $value ?></option>
  <?php endforeach; ?>
</select>
<?php
}

?>

<form action="<?= admin_url( 'admin-ajax.php' ) ?>" id="pet-search-form">

  <input type="hidden" name="action" value="pet-search" />
  <?php search_options_for('breed', 'כל הגזעים'); ?>
  <?php search_options_for('sex', 'כל המינים'); ?>
  <?php search_options_for('size', 'כל הגדלים'); ?>
  <input type="hidden" name="adopted" value="0" />

</form>
