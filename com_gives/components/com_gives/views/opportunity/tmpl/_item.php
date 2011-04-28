<div class="opportunity">
	<h2><?= $opportunity->title ?></h2>
	<p><a href="<?= @route('view=opportunity&id='.$opportunity->id)?>">See More</a></p>
	
	<? if (true): ?>
	<p><a href="<?=@route('view=opportunity&layout=form&id='.$opportunity->id)?>">Edit</a></p>
	<? endif; ?>
</div>