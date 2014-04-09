<?
	defined('KOOWA') or die;
	$user = JFactory::getUser();
?>
<style src="media://com_gives/css/site.css" />

<h1 class="componentheading">
	Last Minute
</h1>

<ul class="opportunity_list">
<?
$shown = 0;
foreach ($opportunities as $opportunity): ?>
	<?
	if ($opportunity->end_date != $opportunity->start_date)
		continue;

	if (strtotime($opportunity->end_date) < time() || strtotime($opportunity->end_date) > strtotime("+25 days"))
		continue;

	$shown++;

	$org = $this->getService('com://admin/gives.model.organization')
			->set('id', $opportunity->gives_organization_id)
			->getItem();
	?>
	<li>
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
				<form action="<?= @route('layout=&view=opportunity&id='. $opportunity->id) ?>" method="post" class="-koowa-form">
					<input type="hidden" name="enabled" value="0" />
					<button>Delete</button>
				</form>
			<? endif; ?>
		</div>

		<div class="clear"></div>
	</li>
<? endforeach; ?>

<? if ($shown == 0): ?>
	<li>We currently have no last minute opportunities listed.</li>
<? endif; ?>
</ul>

<?= @helper('paginator.pagination', array('total' => $total)); ?>
