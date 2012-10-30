<?
	defined('KOOWA') or die;
	$user = JFactory::getUser();
?>

<ul class="opportunity_list">
	<? foreach ($opportunities as $opportunity): ?>
	<? if (isset($distance) && $opportunity->distance > $distance) {
		continue;
	} ?>

	<?	$org = $this->getService('com://admin/gives.model.organization')
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
			<a href="<?= @route('layout=default&view=organization&id='. $org->id) ?>">
				<? if ($org->logo): ?>
					<img src="media://com_gives/uploads/organizations/small_<?= $org->logo ?>" alt="" />
				<? else: ?>
					<img src="media://com_gives/images/no_logo.png" alt="" />
				<? endif; ?>
			</a>
		</div>

		<div style="float: left;">
			<a href="<?= @route('layout=default&view=organization&id='. $org->id) ?>">
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
			<a href="<?= @route('layout=default&view=opportunity&id='. $opportunity->id) ?>">View Opportunity</a>
			<? if ($org->user_id == $user->id): ?>
				<form action="<?= @route('layout=default&view=opportunity&id='. $opportunity->id) ?>" method="post" class="-koowa-form">
					<input type="hidden" name="enabled" value="0" />
					<button>Delete</button>
				</form>
			<? endif; ?>
		</div>

		<div class="clear"></div>
	</li>
	<? endforeach; ?>

	<? if (!count($opportunities)): ?>
		<li>We currently have no opportunities listed.</li>
	<? endif; ?>
</ul>
