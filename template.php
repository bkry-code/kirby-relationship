<?php
$all_options = $field->options(); // All available options
$values = $field->value(); // All selected options

// "$field->options()" contains both the key and the value. E.g. the page url and title.
// "$field->value()" contains only the key. E.g. only the page url.
// Make a new array with selected options stored with both the key and value:
$selected_options = [];
foreach ($values as $value) {
	$selected_options[$value] = $all_options[$value];
}

// We also need an array with all unselected options.
// Array_diff will do the trick:
$unselected_options = array_diff($all_options, $selected_options);
?>

<div class="field-content">
	<div class="relationship-field" data-field="relationship">
		
		<ul class="relationship-list relationship-list--available">
			<?php foreach ($all_options as $key => $value): ?>
				<li>
					<button type="button" data-key="<?php echo $key; ?>"<?php e(array_key_exists($key, $selected_options), ' disabled') ?> aria-label="<?php echo i18n('add') ?> <?php echo $value ?>">
						<?php echo $value ?>
						<span class="icon-add" aria-hidden="true">
							<i class="icon fa fa-plus-circle"></i>
						</span>
					</button>
				</li>
			<?php endforeach ?>
		</ul>
		
		<ul class="relationship-list relationship-list--selected">
			<?php foreach ($selected_options as $key => $value): ?>
				<li data-key="<?php echo $key; ?>">
					<input type="checkbox" name="<?php echo $field->name() . '[]' ?>" value="<?php echo $key ?>" checked />
					<i class="icon icon-left fa fa-bars" aria-hidden="true"></i>
					<span><?php echo $value; ?></span>
					<button class="icon-delete" type="button" aria-label="<?php echo i18n('delete') ?> <?php echo $value ?>"><i class="icon fa fa-minus-circle" aria-hidden="true"></i></button>
				</li>
			<?php endforeach ?>
		</ul>
		
		<ul class="relationship-list relationship-list--unselected">
			<?php foreach ($unselected_options as $key => $value): ?>
				<li data-key="<?php echo $key; ?>">
					<input type="checkbox" name="<?php echo $field->name() . '[]' ?>" value="<?php echo $key ?>" />
					<i class="icon icon-left fa fa-bars" aria-hidden="true"></i>
					<span><?php echo $value; ?></span>
					<button class="icon-delete" type="button" aria-label="<?php echo i18n('delete') ?> <?php echo $value ?>"><i class="icon fa fa-minus-circle" aria-hidden="true"></i></button>
				</li>
			<?php endforeach ?>
		</ul>
		
	</div>
</div>
