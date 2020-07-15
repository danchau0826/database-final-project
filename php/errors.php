<?php if (count($errors)) : ?>
	<div class="error">
		<?php foreach ($errors as $error) : ?>
			<p style="color: red; font-size: 24px; position: relative; left: 550px; top: 15px;"><?php echo $error ?></p>
		<?php endforeach ?>
	</div>
<?php endif ?>