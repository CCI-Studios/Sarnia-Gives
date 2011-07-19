<?= @helper('behavior.mootools') ?>
<script src="media://com_gives/js/koowa.js" />
<style src="media://com_gives/css/site.css" />

<h1 class="componentheading">Directory</h1>

<?= @template('site::com.gives.views.list.search_letters', 
	array('letters' => $letters)); ?>

<ul class="organization_list">
	<? foreach ($organizations as $organization): ?>
	<li>
		<div class="logo">
			<a href="<?= @route('view=organization&id='. $organization->id) ?>">
				<? if ($organization->logo): ?>
					<img src="media://com_gives/uploads/organizations/small_<?= $organization->logo ?>" alt="" />
				<? else: ?>
					SG LOGO FIXME
				<? endif; ?>
			</a>
		</div>
		
		<div style="float: left;">
			<a href="<?= @route('view=organization&id='. $organization->id) ?>">
				<?= $organization->title ?>
			</a><br/>
		</div>
		
		<div class="clear"></div>
	</li>
	<? endforeach; ?>
</ul>


<?= @helper('paginator.pagination', array('total'=>$total)) ?>
