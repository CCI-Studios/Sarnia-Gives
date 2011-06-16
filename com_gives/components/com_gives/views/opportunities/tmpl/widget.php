<ul>
	<? foreach ($opportunities as $opportunity): ?>
	<li>
		<a href="<?= @route('view=opportunity&id='. $opportunity->id) ?>">
			<?= $opportunity->title ?>
		</a>
	</li>
	<? endforeach; ?>

	<? if (!count($opportunities)): ?>
	<li>
		<?= @text('There are currently no opportunities available.'); ?>
	</li>
	<? endif; ?>
</ul>