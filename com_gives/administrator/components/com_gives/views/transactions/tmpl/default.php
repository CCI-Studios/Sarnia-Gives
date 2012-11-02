<?= @helper('behavior.modal') ?>
<script src="media://lib_koowa/js/koowa.js" />
<style src="media://com_default/css/form.css" />
<script src="media://lib_koowa/css/koowa.css" />

<form action="<?=@route()?>" method="get" class="-koowa-grid">
	<table class="adminlist">
		<thead>
			<tr>
				<th width="5">#</th>
				<th>&nbsp;</th>
				<th width="150"><?= @text('Date') ?></th>
				<th width="250"><?= @text('Organziation') ?></th>
				<th width="100"><?= @text('Status') ?></th>
				<th width="100"><?= @text('Transaction Method') ?></th>
				<th width="150"><?= @text('IPN ID') ?></th>

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
			foreach ($transactions as $transaction): ?>
			<tr>
				<td align="center"><?=$i?></td>
				<td align="center">
					<a href="<?= @route('view=transaction&id='. $transaction->id) ?>">Details</a>
				</td>
				<td align="center"><?= $transaction->created_on ?></td>
				<td align="center"><?= $transaction->gives_organization_id ?></td>
				<td align="center"><?= ($transaction->completed)? 'Complete':'Incomplete' ?></td>
				<td align="center"><?= $transaction->txn_type ?></td>
				<td align="center"><?= $transaction->ipn_txn_id ?></td>
				<td align="center"><?=$transaction->id?></td>
			</tr>
			<? $i++;
			endforeach; ?>

			<?if (!count($transactions)):?>
			<tr>
				<td colspan="99" align="center"><?=@text('No Transaction available.')?></td>
			</tr>
			<?endif;?>
		</tbody>

	</table>
</form>