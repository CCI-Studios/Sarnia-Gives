<? defined('KOOWA') or die; ?>

<ul class="search_letters">
	<? foreach ($letters as $letter): ?>
		<? $class = ($state->letter_name == $letter)? 'class="active"':'' ?>
		<li>
			<a <?= $class ?> href="<?= @route('letter_name='.$letter) ?>"><?= $letter; ?></a>
		</li>
	<? endforeach; ?>
	
	<? if (isset($state->letter_name) && $state->letter_name !== ''): ?>
	<li>
		<a href="<?= @route('letter_name=') ?>"><?= @text('All')?></a>
	</li>
	<? endif; ?>
</ul>