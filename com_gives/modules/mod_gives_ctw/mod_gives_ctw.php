<?php
defined('_JEXEC') or die;
$logs = KService::get('com://site/gives.controller.ctwhours')
	->browse();
$total_hours = 0;
$goal = $params->get('goal');
foreach($logs as $log)
{
	$total_hours += $log->hours;
}
$percent = $total_hours/$goal*100;
if ($percent > 100) $percent = 100;
?>
<div class="custom">
	<div id="globes">
		<div class="text">
			<p><strong><?php echo $total_hours;?></strong> Hours completed</p>
			<p>Currently at <strong><?php echo round($percent);?>%</strong></p>

			<?php
			$user = JFactory::getUser();
			if ($user->guest)
			{
				?>
				<a href="/component/gives/?view=volunteer&amp;layout=form&amp;ctw=1" style="display:inline-block;padding:12px;color:white;background:#7f3f98;text-transform:uppercase;text-decoration:none;">Register</a>
				<?php
			}
			else 
			{
				?>
				<a href="/change-the-world.html" style="display:inline-block;padding:12px;color:white;background:#7f3f98;text-transform:uppercase;text-decoration:none;">Log Hours</a>
				<?php
			}
			?>
		</div>
		<div class="globe1"></div>
		<div class="globe2" style="height:<?php echo $percent;?>%;"></div>
	</div>
</div>