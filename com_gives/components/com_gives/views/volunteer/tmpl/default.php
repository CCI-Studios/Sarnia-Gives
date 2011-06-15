<h1><?= $title ?></h1>

<div><div>
	<p><?= $volunteer->firstname .' '. $volunteer->last_name ?></p>
	
	<? if ($edit_button): ?>
		<p><a href="<?= @route('view=volunteer&layout=edit&id='.$volunteer->id) ?>">
			<?= @text('Edit Profile') ?>
		</a></p>
	<? endif; ?>
</div></div>

<div class="half"><div>
	<h2>My Interests</h2>
	
	<p>adsf</p>
</div></div>

<div class="half"><div>
	<h2>My Skills</h2>
	
	<p>adsf</p>
</div></div>