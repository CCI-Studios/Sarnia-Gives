<?= @helper('behavior.modal') ?>
<script src="media://lib_koowa/js/koowa.js" />
<style src="media://com_default/css/form.css" />
<script src="media://lib_koowa/css/koowa.css" />

<form action="<?=@route()?>" method="get" class="-koowa-grid">
	<table class="adminlist">
		<thead>
			<tr>
				<td colspan="6" align="right">
					<?= @helper('listbox.enabled_filter') ?>
				</td>
			</tr>
			<tr>
				<th width="5">#</th>
				<th width="15"><?= @helper('grid.checkall') ?></th>
				<th><?=@helper('grid.sort', array('column'=>'title'))?></th>

				<th width="100"><?=@text('Joomla Account')?></th>
				<th width="25">Enabled</th>
				<th width="5"><?= @helper('grid.sort', array('column'=>'id')) ?></th>
			</tr>
		</thead>

		<tfoot>
			<tr>
				<td colspan="99" align="center">
					<?=@helper('paginator.pagination', array('total'=>$total))?>
				</td>
			</tr>
		</tfoot>

		<tbody>
			<? $i = 1;
			foreach ($organizations as $organization): ?>
			<tr>
				<td><?=$i?></td>
				<td><?=@helper('grid.checkbox', array('row'=>$organization))?></td>
				<td><a href="<?=@route('view=organization&id='.$organization->id)?>">
					<?=$organization->title?>
				</a></td>
				<td align="center"><a href="index.php?option=com_users&amp;view=user&amp;task=user.edit&amp;id=<?=$organization->user_id?>"><?=@text('Joomla Account')?></a></td>
				<td align="center"><?= @helper('grid.enable', array('row'=>$organization))?>
				<td align="center"><?=$organization->id?></td>
			</tr>
			<? $i++;
			endforeach; ?>

			<?if (!count($organizations)):?>
			<tr>
				<td colspan="99" align="center"><?=@text('No organizations available.')?></td>
			</tr>
			<?endif;?>
		</tbody>

	</table>
</form>