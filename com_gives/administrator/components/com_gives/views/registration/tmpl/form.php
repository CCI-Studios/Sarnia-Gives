<? defined('KOOWA') or die; ?>
<?= @helper('behavior.mootools'); ?>
<script src="media://lib_koowa/js/koowa.js" />
<style src="media://com_default/css/form.css" />
<style src="media://com_gives/css/admin.css" />

<form action="<?=@route('id='.$registration->id)?>" method="post" class="-koowa-form" id="mainform">

	<fieldset>
		<legend><?= @text('Registration Details') ?></legend>
		
		<label for="field_name" class="mainlabel"><?=@text('Name')?>:</label>
		<input type="text" name="name" id="field_name" value="<?=$registration->name?>" /><br/>
		
		<label for="field_email" class="mainlabel"><?=@text('Email')?>:</label>
		<input type="email" name="email" id="field_email" value="<?=$registration->email?>" /><br/>

		<label for="field_event_id" class="mainlabel"><?=@text('Event')?>:</label>
		<?= @helper('listbox.events') ?>
	</fieldset>
		
</form>