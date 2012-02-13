<?php defined('KOOWA') or die ?>

<div class="logo">
<? if ($organization->logo): ?>
	<img src="media://com_gives/uploads/organizations/<?= $organization->logo ?>" alt="<?= $organization->title ?>" />
<? else: ?>
	<img src="media://com_gives/images/no_logo.png" alt="<?= $organization->title ?>" />
<? endif; ?>
</div>

<div style="width: 50%; float: left;">
	<?=$organization->address?><br/>
	<?=$organization->city?>, <?=$organization->province?><br/>
	<?=$organization->postal?>
</div>
<div style="width: 50%; float: left;">
	<?= ($organization->phone)? @text('Phone') .': '. $organization->phone.'<br/>':'' ?>
	<?= ($organization->fax)? @text('Fax') .': '. $organization->fax.'<br/>':'' ?>
	<a href="mailto:<?=$organization->email?>"><?=$organization->contact ?></a><br/>
	<? if ($organization->website): ?>
		<a href="<?= strpos($organization->website, '://')? '' : 'http://' ?><?= $organization->website ?>" target="_blank">
			<?= $organization->website ?></a>
	<? endif; ?>
</div>
