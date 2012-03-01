<? defined('KOOWA') or die; ?>

<ul class="opportunity_list">
	<? foreach ($opportunities as $opportunity): ?>
	<? $org = $this->getService('com://admin/gives.model.organization')
		->set('id', $opportunity->gives_organization_id)
		->getItem();
	?>
	<li
		<? if (isset($opportunity->distance)): ?>
			data-distance="<?= $opportunity->distance ?>"
			data-lat="<?= $opportunity->lat ?>"
			data-lng="<?= $opportunity->lng ?>"
			data-title="<?= $opportunity->title ?>"
			data-address="<?= $opportunity->address  ?>"
		<? endif; ?>>
		<? if ($org->logo): ?>
		<div class="logo">
			<a href="<?= @route('view=organization&id='. $org->id) ?>">
				<img src="media://com_gives/uploads/organizations/small_<?= $org->logo ?>" alt="" />
			</a>
		</div>
		<? endif; ?>
		
		<div style="float: left;">
			<a href="<?= @route('view=organization&id='. $org->id) ?>"><?= $org->title ?></a><br/>
			<span style="font-weight: 500;"><?= $opportunity->title; ?></span><br/>
			<a href="<?= @route('view=opportunity&id='. $opportunity->id) ?>">View Opportunity</a>
		</div>
	
		<div class="clear"></div>
	</li>
	<? endforeach; ?>
</ul>
