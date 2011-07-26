<? defined('KOOWA') or die; ?>

<ul class="opportunity_list">
	<? foreach ($opportunities as $opportunity): ?>
	<? if ($distance && $opportunity->distance > $distance) {
		continue;
	} ?>
	
	<? $org = KFactory::tmp('admin::com.gives.model.organization')
		->set('id', $opportunity->gives_organization_id)
		->getItem();
	?>
	<li>
		<? if ($org->logo): ?>
		<div class="logo">
			<a href="<?= @route('view=organization&id='. $org->id) ?>">
				<? if ($org->logo): ?>
					<img src="media://com_gives/uploads/organizations/small_<?= $org->logo ?>" alt="" />
				<? else: ?>
					<img src="media://com_gives/images/no_logo.png" alt="" />
				<? endif; ?>
			</a>
		</div>
		<? endif; ?>
		
		<div style="float: left;">
			<a href="<?= @route('view=organization&id='. $org->id) ?>">
				<?= $org->title ?>
			</a><br/>
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
	
	<? if (!count($opportunities)): ?>
		<li>We currently have no opportunities listed.</li>
	<? endif; ?>
</ul>
