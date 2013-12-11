<? defined('KOOWA') or die; ?>
<?= @helper('behavior.mootools'); ?>
<script src="media://lib_koowa/js/koowa.js" />
<style src="media://com_default/css/form.css" />
<style src="media://com_gives/css/admin.css" />

<form action="<?=@route('id='.$event->id)?>" method="post" class="-koowa-form" id="mainform">

	<fieldset>
		<legend><?= @text('Event Details') ?></legend>
		
		<label for="field_title" class="mainlabel"><?=@text('Title')?>:</label>
		<input type="text" name="title" id="field_title" value="<?=$event->title?>" /><br/>
		
		<label for="field_event_date" class="mainlabel"><?=@text('Event Date')?>:</label>
		<?= JHtml::calendar($event->event_date, 'event_date', 'field_event_date', '%Y-%m-%d') ?><br/>
		
		<label for="field_time" class="mainlabel"><?=@text('Time')?>:</label>
		<input type="text" name="time" id="field_time" value="<?=$event->time?>" /><br/>
		
		<label for="field_location" class="mainlabel"><?=@text('Location')?>:</label>
		<input type="text" name="location" id="field_location" value="<?=$event->location?>" /><br/>
		
		<label for="field_max_capacity" class="mainlabel"><?=@text('Max Registrations (-1 for unlimited)')?>:</label>
		<input type="text" name="max_capacity" id="field_max_capacity" value="<?=$event->max_capacity?>" /><br/>
	</fieldset>
		
</form>