<? defined('KOOWA') or die; ?>

<ul class="opportunity_list">
	<? foreach ($opportunities as $opportunity): ?>
	<? if (isset($distance) && $opportunity->distance > $distance) {
		continue;
	} ?>
	
	<?	$org = KFactory::tmp('admin::com.gives.model.organization')
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
		
		<div class="logo">
			<a href="<?= @route('view=organization&id='. $org->id) ?>">
				<? if ($org->logo): ?>
					<img src="media://com_gives/uploads/organizations/small_<?= $org->logo ?>" alt="" />
				<? else: ?>
					<img src="media://com_gives/images/no_logo.png" alt="" />
				<? endif; ?>
			</a>
		</div>
		
		<div style="float: left;">
			<a href="<?= @route('view=organization&id='. $org->id) ?>">
				<?= $org->title ?>
			</a><br/>
			<span style="font-weight: 500;">
				<?= $opportunity->title; ?>
			</span><br/>
			
			<? if (isset($opportunity->distance)): ?>
				Distance: <?= sprintf('%.2f', $opportunity->distance) ?>km
			<? endif; ?>
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
