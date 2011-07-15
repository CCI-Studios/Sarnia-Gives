<? defined('KOOWA') or die; ?>

<ul style="border: 1px solid black; padding: 5px; background: ; list-style: none;">
	<? foreach ($opportunities as $opportunity): ?>
	<? $org = KFactory::tmp('admin::com.gives.model.organization')
		->set('id', $opportunity->gives_organization_id)
		->getItem();
	?>
	<li style="border: 1px solid black; padding: 0 0 5px 2em;">
		<? if ($org->logo): ?>
		<div class="logo" style="float: left; margin: 5px 5px 5px 0;">
			<img src="media://com_gives/uploads/organizations/small_<?= $org->logo ?>" alt="" />
		</div>
		<? endif; ?>
		
		<div style="float: left;">
			<?= $org->title ?><br/>
			<span style="font-weight: 500;"><?= $opportunity->title; ?></span>
		</div>
		
		<div class="" style="float: right;">
			<a style="display: block; padding: 0 5px; background-color: #77cc77;" href="<?= @route('view=opportunity&id='. $opportunity->id) ?>">
				View More Details
			</a>
		</div>

		<div class="clear"></div>
	</li>
	<? endforeach; ?>
</ul>
