<? defined('KOOWA') or die; ?>
<? @helper('behavior.mootools') ?>
<script src="media://lib_koowa/js/koowa.js" />
<style src="media://com_default/css/form.css" />
<style src="media://com_gives/css/admin.css" />

<form action="<?=@route('id='.$transaction->id)?>" method="post" class="-koowa-form" id="mainform">
	<div style="float: left; width: 50%">
		<fieldset>
			<legend><?= @text('Transaction Details') ?></legend>

			<label for="field_txn_type" class="mainlabel"><?=@text('Transaction Method')?>:</label>
			<input type="text" name="txn_type" id="field_txn_type" value="<?=$transaction->txn_type?>" /><br/>

			<label for="field_organization" class="mainlabel"><?=@text('Organization')?>:</label>
			<?= @helper('listbox.organizations') ?><br/>

			<label for="field_completed" class="mainlabel"><?=@text('Completed')?>:</label>
			<?= @helper('listbox.yesNo', array('name'=>'completed')) ?><br/>
		</fieldset>

		<fieldset>
			<legend><?= @text('Notes') ?></legend>
			<textarea name="notes" style="width: 98%;" rows="10"><?=$transaction->notes?></textarea>
		</fieldset>
	</div>

	<div style="float: left; width: 50%">
		<fieldset>
			<legend><?= @text('PayPal Details') ?></legend>
			<label for="field_ipn_txn_id" class="mainlabel"><?=@text('PayPal ID')?>:</label>
			<input type="text" name="title" id="field_ipn_txn_id" value="<?=$transaction->ipn_txn_id?>" /><br/>

			<textarea name="ipn_error" style="width: 98%;" rows="10"><?=$transaction->ipn_error?></textarea>
		</fieldset>

	</div>
</form>

