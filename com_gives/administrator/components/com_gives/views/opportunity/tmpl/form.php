<? defined('KOOWA') or die; ?>
<script src="media://lib_koowa/js/koowa.js" />
<style src="media://com_default/css/form.css" />
<style src="media://com_gives/css/admin.css" />

<form action="<?=@route('id='.$opportunity->id)?>" method="post" class="-koowa-form" id="mainform">
	<div style="float: left; width: 50%">
		<fieldset>
			<legend><?= @text('Opportunity Details') ?></legend>
			
			<label for="field_title" class="mainlabel"><?=@text('Name')?>:</label>
			<input type="text" name="title" id="field_title" value="<?=$opportunity->title?>" /><br/>
			
			<label for="field_address" class="mainlabel"><?=@text('Address')?>:</label>
			<input type="text" name="address" id="field_address" value="<?=$opportunity->address?>" /><br/>
			
			<label for="field_city" class="mainlabel"><?=@text('City')?>:</label>
			<input type="text" name="city" id="field_city" value="<?=$opportunity->city?>" /><br/>
			
			<label for="field_province" class="mainlabel"><?=@text('Province')?>:</label>
			<?=@helper('admin::com.gives.template.helper.listbox.provinces')?><br/>
			
			<label for="field_postal" class="mainlabel"><?=@text('Postal')?>:</label>
			<input type="text" name="postal" id="field_postal" value="<?=$opportunity->postal?>" /><br/>
			
			<label for="field_start_date" class="mainlabel"><?=@text('Start Date')?>:</label>
			<input type="text" name="start_date" id="field_start_date" value="<?=$opportunity->start_date?>" /><br/>
			
			<label for="field_end_date" class="mainlabel"><?=@text('End Date')?>:</label>
			<input type="text" name="end_date" id="field_end_date" value="<?=$opportunity->end_date?>" /><br/>
			
			<label for="field_organization" class="mainlabel"><?=@text('Organization')?>:</label>
			<?= @helper('listbox.organizations') ?><br/>
		</fieldset>
		
		<fieldset>
			<legend><?= @text('Description') ?></legend>
			<textarea name="description" style="width: 100%;" rows="10"><?=$opportunity->description?></textarea>
		</fieldset>
	</div>
		
	<div style="float: left; width: 50%">
		<? jimport('joomla.html.pane') ?>
		<? $pane = &JPane::getInstance('sliders', array('allowAllClose' => true)) ?>
		<?= $pane->startPane('content-pane') ?>
		
		<?= $pane->startPanel('Interests', 'interests-pane')?>
			<?= @helper('select.interests') ?>
		<?= $pane->endPanel() ?>
		
		<?= $pane->startPanel('Skills', 'skills-pane')?>
			<?= @helper('select.skills') ?>
		<?= $pane->endPanel() ?>
		
		<?= $pane->startPanel('Location', 'location-pane')?>
			<?= @helper('select.locations') ?>
		<?= $pane->endPanel() ?>
		
		<?= $pane->startPanel('Requirements', 'requirements-pane') ?>
			<label for="field_event" class="mainlabel"><?=@text('For Event')?>:</label>
			<?=@helper('admin::com.gives.template.helper.listbox.yesNo', array('name'=>'event'))?><br/>

			<label for="field_event_date" class="mainlabel"><?=@text('Event Date')?>:</label>
			<input type="text" name="event_date" id="field_event_date" value="<?=$opportunity->event_date?>" /><br/>
			
			<label for="field_min_hours" class="mainlabel"><?=@text('Min Hours')?>:</label>
			<input type="text" name="min_hours" id="field_min_hours" value="<?=$opportunity->min_hours?>" /><br/>
			
			<label for="field_max_hours" class="mainlabel"><?=@text('Max Hours')?>:</label>
			<input type="text" name="max_hours" id="field_max_hours" value="<?=$opportunity->max_hours?>" /><br/>
			
			<label for="field_license" class="mainlabel"><?=@text('License')?>:</label>
			<?=@helper('admin::com.gives.template.helper.listbox.yesNo', array('name'=>'license'))?><br/>
			
			<label for="field_police_check" class="mainlabel"><?=@text('Police Check')?>:</label>
			<?=@helper('admin::com.gives.template.helper.listbox.yesNo', array('name'=>'police_check'))?><br/>
			
			<label for="field_min_age" class="mainlabel"><?=@text('Min Age')?>:</label>
			<input type="text" name="min_age" id="field_min_age" value="<?=$opportunity->min_age?>" /><br/>
			
			<label for="field_other" class="mainlabel"><?=@text('Other')?>:</label>
			<input type="text" name="other" id="field_other" value="<?=$opportunity->other?>" /><br/>
		<?= $pane->endPanel()?>
		<?= $pane->endPane() ?>
	</div>	
</form>