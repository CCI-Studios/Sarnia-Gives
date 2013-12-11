<script src="media://lib_koowa/js/koowa.js" />
<style src="media://com_default/css/admin.css" />

<form action="<?=@route()?>" method="get" class="-koowa-grid">
	<table class="adminlist">
		<thead>
			<tr>
				<th width="5">#</th>
				<th width="5" align="center"><?=@helper('grid.checkall');?> </th>
				<th><?=@helper('grid.sort', array('column'=>'title'))?></th>
				<th>Registrations</th>
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
			foreach ($events as $event): ?>
			<tr>
				<td><?=$i?></td>
				<td><?=@helper('grid.checkbox', array('row'=>$event))?></td>
				<td><a href="<?=@route('view=event&id='.$event->id)?>">
					<? if ($event->title) {
						echo $event->title;
					} else {
						echo '** Title Missing **';
					} ?>
				</a></td>
				<td align="center"><a href="?option=com_gives&amp;view=registrations&amp;event_id=<?=$event->id?>">View Registrations</a></td>
				<td align="center"><?=@helper('grid.enable', array('row'=>$event)) ?></td>
				<td align="center"><?=$event->id?></td>
			</tr>
			<? $i++;
			endforeach; ?>
		
			<?if (!count($events)):?>
			<tr>
				<td colspan="99" align="center"><?=@text('No events available.')?></td>
			</tr>
			<?endif;?>
		</tbody>
	
	</table>
</form>