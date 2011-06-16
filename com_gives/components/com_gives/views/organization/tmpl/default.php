<style src="media://com_gives/css/site.css" />

<div class="com_gives">
	<h1 class="componentheading">
		<?= $organization->title ?>

		<? if ($organization->canEdit()): ?>
			<div class="right">
				<small><a href="<?= @route('view=organization&layout=edit&id='.$organization->id)?>">
					<img src="/images/M_images/edit.png" />
				</a></small>
			</div>
		<? endif; ?>
	</h1>

	<div class="contact_info">
		<h2><?= @text('Contact Info')?></h2>
	
		<div class="column">
			<?=$organization->address?><br/>
			<?=$organization->city?><br/>
			<?=$organization->province?><br/>
		</div>
		<div class="column">
			<?=$organization->phone?><br/>
			<?=$organization->fax?><br/>
			<a href="mailto:<?=$organization->email?>"><?=$organization->email?></a><br/>
		</div>
	</div>

	<h2><?= @text('Our Mission')?></h2>
	<p><?=$organization->mission?></p>

	<h2><?=@text('Description')?></h2>
	<p><?=$organization->description?></p>

	<h2>Our Opportunities</h2>
	<?= KFactory::get('site::com.gives.controller.opportunities')
		->set('organization_id', $organization->id)
		->layout('widget')
		->display(); ?>
</div>