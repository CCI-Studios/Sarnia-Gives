<script src="media://lib_koowa/js/koowa.js" />
<style src="media://com_default/css/admin.css" />

<form action="<?=@route()?>" method="get" class="-koowa-grid">
	<table class="adminlist">
		<thead>
			<tr>
				<th width="5">#</th>
				<th width="5" align="center"><?=@helper('grid.checkall');?> </th>
				<th><?=@helper('grid.sort', array('column'=>'title'))?></th>
				
				<th width="100"><?=@text('Organization')?></th>
				<th width="50"><?= @helper('grid.sort', array('column'=>'enabled')) ?></th>
				<th width="5"><?=@text('id')?></th>
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
			foreach ($opportunities as $opportunity): ?>
			<tr>
				<td><?=$i?></td>
				<td><?=@helper('grid.checkbox', array('row'=>$opportunity))?></td>
				<td><a href="<?=@route('view=opportunity&id='.$opportunity->id)?>">
					<? if ($opportunity->title) {
						echo $opportunity->title;
					} else {
						echo '** Title Missing **';
					} ?>
				</a></td>
				<td><?= $opportunity->organization_id ?></td>
				<td align="center"><?=@helper('grid.enable', array('row'=>$opportunity)) ?></td>
				<td align="center"><?=$opportunity->id?></td>
			</tr>
			<? $i++;
			endforeach; ?>
		
			<?if (!count($opportunities)):?>
			<tr>
				<td colspan="99" align="center"><?=@text('No opportunity available.')?></td>
			</tr>
			<?endif;?>
		</tbody>
	
	</table>
</form>