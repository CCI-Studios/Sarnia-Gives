<script src="media://lib_koowa/js/koowa.js" />
<style src="media://com_default/css/admin.css" />

<form action="<?=@route()?>" method="get" class="-koowa-form">
	<table class="adminlist">
		<thead>
			<tr>
				<th width="5">#</th>
				<th width="15"></th>
				<th><?=@helper('grid.sort', array('column'=>'last_name', 'title'=>'Name'))?></th>
				
				<th width="100"><?=@text('Joomla Account')?></th>
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
			foreach ($volunteers as $volunteer): ?>
			<tr>
				<td><?=$i?></td>
				<td><?=@helper('grid.checkbox', array('row'=>$volunteer))?></td>
				<td><a href="<?=@route('view=volunteer&id='.$volunteer->id)?>">
					<?=$volunteer->last_name.', '.$volunteer->first_name?>
				</a></td>
				<td align="center"><a href="index.php?option=com_users&amp;view=user&amp;task=edit&amp;cid[]=<?=$volunteer->user_id?>"><?=@text('Joomla Account')?></a></td>
				<td align="center"><?=$volunteer->id?></td>
			</tr>
			<? $i++;
			endforeach; ?>
		
			<?if (!count($volunteers)):?>
			<tr>
				<td colspan="99" align="center"><?=@text('No volunteers available.')?></td>
			</tr>
			<?endif;?>
		</tbody>
	
	</table>
</form>