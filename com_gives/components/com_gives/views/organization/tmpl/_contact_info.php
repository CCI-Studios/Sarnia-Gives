<?php defined('KOOWA') or die ?>

<div class="logo">
<? if ($organization->logo): ?>
	<img src="media://com_gives/uploads/organizations/<?= $organization->logo ?>" alt="<?= $organization->title ?>" />
<? else: ?>
	get a logo
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
</div>
