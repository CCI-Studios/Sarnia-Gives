<style src="media://com_gives/css/site.css" />

<div class="com_gives">
	<h1 class="componentheading">
		<?= $organization->title ?>

		<? if ($edit): ?>
		<span class="edit">
			<a href="<?= @route('view=organization&layout=edit&id='.$organization->id) ?>">
				<?= @text('Edit Profile') ?>
			</a>
		</span>
		<? endif; ?>
	</h1>

	<div class="contact_info">
		<?= @template('_contact_info') ?>
		<div class="clear"></div>
	</div>

	<h2><?= @text('Our Mission')?></h2>
	<p><?=$organization->mission?></p>

	<h2><?=@text('Description')?></h2>
	<p><?=$organization->description?></p>
	
	<h2>Opportunities</h2>
	<?= KFactory::get('site::com.gives.controller.opportunities')
		->set('organization_id', $organization->id)
		->layout('search_results')
		->display(); ?>
		
	<? if ($edit): ?>
		<form action="<?= @route('view=opportunity&layout=form&org_id='.$organization->id) ?>" method="get">
			<p><input type="submit" value="Create Opportunity" /></p> 
		</form>
	<? endif; ?>
</div>