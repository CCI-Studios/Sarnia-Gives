<? defined('KOOWA') or die; ?>

<ul>
	<? foreach ($opportunities as $opportunity): ?>
	<li>
		<a href="<?= @route('view=opportunity&id='. $opportunity->id) ?>">
			<?= $opportunity->title ?>
		</a>
	</li>
	<? endforeach; ?>
</ul>
