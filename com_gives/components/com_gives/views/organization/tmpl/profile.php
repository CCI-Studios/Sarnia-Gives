<style src="media://com_gives/css/site.css" />

<div class="com_gives">
	<h1>
		<?= $title ?> Profile
		<? if ($edit_button): ?>
		<span class="edit">
			<a href="<?= @route('view=organization&layout=edit&id='.$organization->id) ?>">
				<?= @text('Edit Profile') ?>
			</a>
		</span>
		<? endif; ?>
	</h1>
	
	<? if($organization->mission): ?>
	<h2>Out Mission</h2>
	<?= $organization->mission ?>
	<? endif; ?>
	
	<? if (count($organization->interests)): ?>
		<h2>Our Interests</h2>
		
		<ul><? foreach($organization->interests as $interest): ?>
			<li><?= $interest; ?></li>
		<? endforeach; ?></ul>
	<? endif; ?>
	
	<? if (count($organization->skills)): ?>
		<h2>Our Skills</h2>
		
		<ul><? foreach($organization->skills as $skill): ?>
			<li><?= $skill; ?></li>
		<? endforeach; ?></ul>
	<? endif; ?>
	
	<h2>Our Opportunities</h2>
	<?= KFactory::get('site::com.gives.controller.opportunities')
		->set('organization_id', $organization->id)
		->layout('widget')
		->display(); ?>
	
	<p>Click <a href="<?= @route('view=opportunity&layout=form&org_id='.$organization->id); ?>">here</a> to create a new opportunity</p>
</div>