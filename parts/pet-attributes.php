<?php if( get_field( 'attributes' ) ): ?>
	<?php $field = get_field_object( 'attributes' ); ?>
	<ul class="pet-attributes">
	<?php foreach( get_field('attributes') as $attribute ): ?>
	<li class="<?= esc_attr( $attribute ); ?>" title="<?= esc_attr( $field['choices'][$attribute] ) ?>">
			<span><?= esc_html( $field['choices'][$attribute] ); ?></span>
		</li>
	<?php endforeach; ?>
	</ul>
<?php endif; ?>
