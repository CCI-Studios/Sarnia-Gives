<style src="media://com_gives/css/site.css" />

<div class="com_gives">
	<h1>
		<?= $title ?>
		<? if ($edit_button): ?>
		<span class="edit">
			<a href="<?= @route('view=volunteer&layout=edit&id='.$volunteer->id) ?>">
				<?= @text('Edit Profile') ?>
			</a>
		</span>
		<? endif; ?>
	</h1>

	<div class="half"><div>
		<h2>My Interests</h2>
	
		<ul><? foreach($volunteer->interests as $interest): ?>
			<li><?= $interest; ?></li>
		<? endforeach; ?></ul>
	</div></div>

	<div class="half"><div>
		<h2>My Skills</h2>
	
		<ul><? foreach($volunteer->skills as $skill): ?>
			<li><?= $skill; ?></li>
		<? endforeach; ?></ul>
	</div></div>
	
	<h2 class="clear">My Opportunities</h2>
	<p><strong>INSERT OPPORTUNITIES SEARCH HERE</strong></p>
</div>