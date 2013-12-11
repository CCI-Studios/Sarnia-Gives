<?
	defined('KOOWA') or die;

$registrations = $this->getService('com://site/gives.controller.registrations')
	->browse();

$events_array = array();
foreach($events as $event)
{
	array_push($events_array, $event);
}
usort($events_array, function($a, $b){
	return (strtotime($a->event_date) < strtotime($b->event_date)) ? -1 : 1;
});
?>
<style src="media://com_gives/css/site.css" />

<h1 class="componentheading">
	Events
</h1>

<?php
if (isset($_GET['thanks'])) {
	echo '<p>Thanks for registering for an event!</p>';
}
?>

<ul class="event_list">
<?
$shown = 0;
foreach ($events_array as $event): ?>
	<?php
	if (strtotime($event->event_date) < strtotime(date('Y-m-d'))) continue;
	$shown++;

	$num_registrations = 0;
	foreach ($registrations as $registration)
	{
	  if($registration->gives_event_id == $event->id)
	    $num_registrations++;
	}
	?>
	<li style="background:none;border-left:4px solid #7f3f98;padding-left:5px;margin-bottom:10px;">
			<span style="font-weight: 500;"><?= $event->title ?> - 
				<?php if ($event->max_capacity == -1 || $event->max_capacity > $num_registrations): ?>
					<a href="?option=com_gives&amp;view=registration&amp;layout=form&amp;event_id=<?=$event->id?>">register now</a></span>
				<?php else: ?>
					</span>registrations closed
				<?php endif; ?>
			<br/>
				<?= date('l j F Y', strtotime($event->event_date)); ?> <?= $event->time; ?>
			<br/>
				<?= $event->location; ?>
	</li>
<? endforeach; ?>

<? if ($shown == 0): ?>
	<li>We currently have no events listed.</li>
<? endif; ?>
</ul>

<?= @helper('paginator.pagination', array('total' => $total)); ?>