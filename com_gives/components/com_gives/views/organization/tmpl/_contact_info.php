<?php defined('KOOWA') or die ?>

<? if ($organization->logo): ?>
	<img src="media://com_gives/uploads/organizations/<?= $organization->logo ?>" alt="<?= $organization->title ?>" width="100%" />
<? else: ?>
	<h2><?= @text('Contact Info')?></h2>
<? endif; ?>

<div class="column">
	<?=$organization->address?><br/>
	<?=$organization->city?>, <?=$organization->province?><br/>
	<?=$organization->postal?><br/><br/>
	
	<?= ($organization->phone)? @text('Phone') .': '. $organization->phone.'<br/>':'' ?>
	<?= ($organization->fax)? @text('Fax') .': '. $organization->fax.'<br/>':'' ?>
	<a href="mailto:<?=$organization->email?>"><?=$organization->email?></a><br/>
</div>
