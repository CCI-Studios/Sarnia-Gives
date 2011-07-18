<? defined('KOOWA') or die; ?>

<ul class="opportunity_list">
	<? foreach ($opportunities as $opportunity): ?>
	<? $org = KFactory::tmp('admin::com.gives.model.organization')
		->set('id', $opportunity->gives_organization_id)
		->getItem();
	?>
	<li>
		<? if ($org->logo): ?>
			<img src="media://com_gives/uploads/organizations/small_<?= $org->logo ?>" alt="" />
		<div class="logo">
		</div>
		<? endif; ?>
		
		<div style="float: left;">
			<?= $org->title ?><br/>
			<span style="font-weight: 500;"><?= $opportunity->title; ?></span>
		</div>
		
		<div class="details">
			<a href="<?= @route('view=opportunity&id='. $opportunity->id) ?>">
				View Opportunity
			</a>
		</div>
		
		<div class="clear"></div>
	</li>
	<? endforeach; ?>
</ul>
