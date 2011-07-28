<style src="media://com_gives/css/site.css" />

<div class="com_gives">
	<h1>
		<?= $organization->title .' - '. $opportunity->title ?>
		
		<? if ($edit): ?>
		<span class="edit">
			<a href="<?= @route('view=opportunity&layout=form&id='.$opportunity->id) ?>">
				<?= @text('Edit Opportunity') ?>
			</a>
		</span>
		<? endif; ?>
	</h1>
	
	<h2>Description</h2>
	<p><?= $opportunity->description ?></p>
	
	<h2>Requirements</h2>
	<p>police check<Br/>
	license</p>
	
	<h2>Location</h2>
	<p>Address: <?= $opportunity->address ?><br/>
	City: <?= $opportunity->city ?><br/>
	Province: <?= $opportunity->province ?><br/>
	Postal: <?= $opportunity->postal ?></p>
	
	<h2>Contact</h2>
	<p>Call us at <?= $organization->phone ?> or email <a href="mailto:<?= $organization->email ?>"><?= $organization->contact?></a> for more information.</p>
	<p style="margin-top:2em;">
		Click <a href="<?= @route('view=organization&id='. $organization->id) ?>">here</a> to view more 
		opportunities from <a href="<?= @route('view=organization&id='. $organization->id) ?>"><?= $organization->title ?></a>.
	</p>
</div>
