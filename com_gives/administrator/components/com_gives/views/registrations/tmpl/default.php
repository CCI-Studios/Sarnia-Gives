<? defined('KOOWA') or die; ?>
<?= @helper('behavior.mootools'); ?>
<script src="media://lib_koowa/js/koowa.js" />
<style src="media://com_default/css/admin.css" />

<p><a href="index.php?option=com_gives&amp;format=csv&amp;view=registrations&amp;limit=100000&amp;event_id=<?=$_GET['event_id']?>">Download as CSV</a></p>

<form action="<?=@route()?>" method="get" class="-koowa-grid">
	<table class="adminlist">
		<thead>
			<tr>
				<th width="5">#</th>
				<th width="5" align="center"><?=@helper('grid.checkall');?> </th>
				<th><?=@helper('grid.sort', array('column'=>'Name'))?></th>
				<th><?=@helper('grid.sort', array('column'=>'Email'))?></th>
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
			if (!isset($registrations)) $registrations = array();
			foreach ($registrations as $registration): ?>
			<tr>
				<td><?=$i?></td>
				<td><?=@helper('grid.checkbox', array('row'=>$registration))?></td>
				<td><?=$registration->name?></td>
				<td><?=$registration->email?></td>
				<td align="center"><?=$registration->id?></td>
			</tr>
			<? $i++;
			endforeach; ?>
		
			<?if (!count($registrations)):?>
			<tr>
				<td colspan="99" align="center"><?=@text('No registrations.')?></td>
			</tr>
			<?endif;?>
		</tbody>
	
	</table>
</form>