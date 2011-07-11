<style src="media://com_gives/css/site.css" />

<div class="com_gives">
	<h1>
		<?= $opportunity->title ?>
		
		<? if ($edit): ?>
		<span class="edit">
			<a href="<?= @route('view=opportunity&layout=edit&id='.$opportunity->id) ?>">
				<?= @text('Edit Opportunity') ?>
			</a>
		</span>
		<? endif; ?>
	</h1>
	
	<div class="contact_info">
		<h2><?= @text('Contact Info for ') .' '. $organization->title ?></h2>
	
		<div class="column">
			<?=$organization->address?><br/>
			<?=$organization->city?>, <?=$organization->province?><br/>
			<?= ($organization->postal)? $organization->postal .'<br/>': ''?>
			<br/>
			<?= ($organization->phone)? @text('Phone') .': '. $organization->phone.'<br/>':'' ?>
			<?= ($organization->fax)? @text('Fax') .': '. $organization->fax.'<br/>':'' ?>
			<a href="mailto:<?=$organization->email?>"><?=$organization->email?></a><br/>
		</div>
		
		<p>View <a href="<?= @route('view=organization&id='. $organization->id) ?>">
			<?= $organization->title ?></a></p>
	</div>
	
	<h2>Details</h2>
	Start Date: <?= $opportunity->start_date ?><br/>
	End Date: <?= $opportunity->end_date ?><br/>
	
	<h2>Location</h2>
	Address: <?= $opportunity->address ?><br/>
	City: <?= $opportunity->city ?><br/>
	Province: <?= $opportunity->province ?><br/>
	Postal: <?= $opportunity->postal ?><br/>
	
	<h2>Interests</h2>
	<? print_r($opportunity->interests) ?>
	
	<h2>Skills</h2>
	<? print_r($opportunity->skills) ?>
	
	<h2>Location</h2>
	<? print_r($opportunity->locations) ?>
	
	
	<p>FIXME Clean up the styling of this page.</p>
</div>
