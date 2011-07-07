<?= @helper('behavior.mootools') ?>
<script src="media://com_gives/js/koowa.js" />
<style src="media://com_gives/css/site.css" />

<h1 class="componentheading">Organizations</h1>

<?= @template('site::com.gives.views.list.search_letters', 
	array('letters' => $letters)); ?>

<ul class="organization">
<? foreach ($organizations as $organization): ?>
	<li>
		<a href="<?=@route('view=organization&id='.$organization->id)?>"><?= $organization->title ?></a>
	</li>
<? endforeach; ?>
</ul>

<?= @helper('paginator.pagination', array('total'=>$total)) ?>
