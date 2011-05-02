<style src="media://com_gives/css/site.css" />

<h1 class="componentheading"><?= $organization->title ?></h1>

<div>
	<h2><?= @text('Organization Details')?></h2>
	
	<div class="column-group">
		<div class="column">
			<?=$organization->address?><br/>
			<?=$organization->city?><br/>
			<?=$organization->province?><br/>
		</div>
		<div class="column">
			<?=$organization->phone?><br/>
			<?=$organization->fax?><br/>
			<a href="mailto:<?=$organization->email?>"><?=$organization->email?></a><br/>
		</div>
	</div>
	
	<h2><?= @text('Our Mission')?></h2>
	<p><?=$organization->mission?></p>
	
	<h2><?=@text('Description')?></h2>
	<p><?=$organization->description?></p>
</div>

<p><a href="<?= @route('view=organization&layout=form&id='.$organization->id)?>">Edit</a></p>