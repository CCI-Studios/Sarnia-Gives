<script src="media://lib_koowa/js/koowa.js" />
<style src="media://com_default/css/admin.css" />

<form action="<?=@route()?>" method="post">
	<table class="adminlist">
		<thead>
			<tr>
				<th width="5">#</th>
				<th width="15"></th>
				<th><?=@helper('grid.sort', array('column'=>'name'))?></th>
				
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
			foreach ($organizations as $organization): ?>
			<tr>
				<td><?=$i?></td>
				<td><?=@helper('grid.checkbox', array('row'=>$organization))?></td>
				<td><a href="<?=@route('view=organization&id='.$organization->id)?>">
					<?=$organization->name?>
				</a></td>
				<td align="center"><a href="index.php?option=com_users&amp;view=user&amp;task=edit&amp;cid[]=<?=$organization->user_id?>"><?=@text('Joomla Account')?></a></td>
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