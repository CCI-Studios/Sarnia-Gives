<? defined('KOOWA') or die; ?>

<ul class="search_letters">
	<? foreach ($letters_name as $letter): ?>
		<? $class = ($state->letter_name == $letter)? 'class="active"':'' ?>
		<li <?= $class ?>>
			<a href="<?= @route('letter_name='.$letter) ?>">
				<?= $letter; ?>
			</a>
		</li>
	<? endforeach; ?>
	
	<li>
		<a href="<?= @route('letter_name=') ?>">
			<?= @text('All')?>
		</a>
	</li>
</ul>