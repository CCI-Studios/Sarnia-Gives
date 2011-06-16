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
	
	<? if (isset($organization->mission)): ?>
		<h2>Our Interests</h2>
		
		<ul><? foreach($organization->interests as $skill): ?>
			<li><?= $interest; ?></li>
		<? endforeach; ?></ul>
	<? endif; ?>
	
	<? if (isset($organization->skills)): ?>
		<h2>Our Skills</h2>
		
		<ul><? foreach($organization->skills as $skill): ?>
			<li><?= $skill; ?></li>
		<? endforeach; ?></ul>
	<? endif; ?>
	
	<h2>Our Opportunities</h2>
	<p><strong>INSERT OPPORTUNITIES SEARCH HERE</strong></p>
</div>