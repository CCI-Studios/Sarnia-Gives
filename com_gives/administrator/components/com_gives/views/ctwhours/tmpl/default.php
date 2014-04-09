<? defined('KOOWA') or die; ?>
<?= @helper('behavior.mootools'); ?>
<script src="media://lib_koowa/js/koowa.js" />
<style src="media://com_default/css/admin.css" />

<form action="<?=@route()?>" method="get" class="-koowa-grid">
	<table class="adminlist">
		<thead>
			<tr>
				<th width="5">#</th>
				<th width="5" align="center"><?=@helper('grid.checkall');?> </th>
				<th><?=@helper('grid.sort', array('column'=>'first_name'))?></th>
				<th><?=@helper('grid.sort', array('column'=>'last_name'))?></th>
				<th><?=@helper('grid.sort', array('column'=>'email'))?></th>
				<th><?=@helper('grid.sort', array('column'=>'organization'))?></th>
				<th><?=@helper('grid.sort', array('column'=>'hours'))?></th>
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
			foreach ($ctwhours as $hour_log): ?>
			<tr>
				<td><?=$i?></td>
				<td><?=@helper('grid.checkbox', array('row'=>$hour_log))?></td>
				<td><a href="<?=@route('view=ctwhour&id='.$hour_log->id)?>"><?=$hour_log->first_name?></a></td>
				<td><?=$hour_log->last_name?></td>
				<td><?=$hour_log->email?></td>
				<td><?=$hour_log->organization?></td>
				<td><?=$hour_log->hours?></td>
				<td align="center"><?=$hour_log->id?></td>
			</tr>
			<? $i++;
			endforeach; ?>
		
			<?if (!count($ctwhours)):?>
			<tr>
				<td colspan="99" align="center"><?=@text('No hour logs available.')?></td>
			</tr>
			<?endif;?>
		</tbody>
	
	</table>
</form>