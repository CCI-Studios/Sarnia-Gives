<h1 class="componentheading">Organizations</h1>

<? foreach ($organizations as $organization): ?>
<div class="organization">
	<h2><?= $organization->title ?></h2>
	<p><?= $organization->mission?></p>
	<p><a href="<?=@route('view=organization&id='.$organization->id)?>">See More</a></p>
</div>
<? endforeach; ?>