<?= @helper('behavior.mootools') ?>
<script src="media://com_gives/js/koowa.js" />
<style src="media://com_gives/css/site.css" />

<h1 class="componentheading">Organizations</h1>

<ul class="search_letters">	
	<? foreach($letters as $letter) : ?>
	<? $class = ($state->letter_name == $letter) ? 'class="active" ' : ''; ?>
	<li>
		<a href="<?= @route('letter_name='.$letter) ?>" <?= $class ?>>
			<?= $letter; ?>
		</a>
	</li>
	<? endforeach; ?>
	<li>
		<a href="<?= @route('letter_name=') ?>">
			<?= @text('Reset'); ?>
		</a>
	</li>
</ul>

<ul class="organization">
<? foreach ($organizations as $organization): ?>
	<li>
		<a href="<?=@route('view=organization&id='.$organization->id)?>"><?= $organization->title ?></a>
	</li>
<? endforeach; ?>
</ul>

<?= @helper('paginator.pagination', array('total'=>$total)) ?>
