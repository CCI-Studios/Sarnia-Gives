<h1 class="componentheading">Opportunities</h1>

<p>Do another <a href="<?= @route('view=opportunities&layout=search') ?>">search</a>, or look on the <a href="#">map</a>.</p>

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
		<?= @text('There are currently no opportunities available that match your requirements.'); ?>
	</li>
	<? endif; ?>
</ul>
