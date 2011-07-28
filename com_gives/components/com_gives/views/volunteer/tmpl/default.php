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

	<? if (count($volunteer->interests)): ?>
	<div class="half"><div>
		<h2>My Interests</h2>
	
		<ul><? foreach($volunteer->interests as $interest): ?>
			<li><?= $interest; ?></li>
		<? endforeach; ?></ul>
	</div></div>
	<? endif; ?>

	<? if (count($volunteer->skill)): ?>
	<div class="half"><div>
		<h2>My Skills</h2>
	
		<ul><? foreach($volunteer->skills as $skill): ?>
			<li><?= $skill; ?></li>
		<? endforeach; ?></ul>
	</div></div>
	<? endif; ?>
	
	
	<h2 class="clear">My Opportunities</h2>
	<? if ($volunteer->interests || $volunteer->skills || $volunteer->locations): ?>
		<?= KFactory::get('site::com.gives.controller.opportunities')
			->set('interests', $volunteer->interest)
			->set('skills', $volunteer->skills)
			->set('locations', $volunteer->locations)
			->layout('widget')
			->limit(5)
			->display(); ?>
	<? else: ?>
		<p>Please complete your <a href="<?= @route('view=volunteer&layout=edit&id='.$volunteer->id) ?>">profile</a> to receive suggested opportunities.</p>
	<? endif; ?>
</div>