<? defined('KOOWA') or die; ?>
<script src="media://lib_koowa/js/koowa.js" />
<style src="media://com_default/css/form.css" />

<form action="<?=@route('id='.$volunteer->id)?>" method="post" class="-koowa-form" id="mainform">
	<div style="float: left; width: 50%">
		<fieldset>
			<legend><?= @text('Volunteer Details') ?></legend>
			
			<label for="field_first_name" class="mainlabel"><?=@text('First Name')?>:</label>
			<input type="text" name="first_name" id="field_first_name" value="<?=$volunteer->first_name?>" /><br/>

			<label for="field_last_name" class="mainlabel"><?=@text('Last Name')?>:</label>
			<input type="text" name="last_name" id="field_last_name" value="<?=$volunteer->last_name?>" /><br/>

			<label for="field_address" class="mainlabel"><?=@text('Address')?>:</label>
			<input type="text" name="address" id="field_address" value="<?=$volunteer->address?>" /><br/>
			
			<label for="field_city" class="mainlabel"><?=@text('City')?>:</label>
			<input type="text" name="city" id="field_city" value="<?=$volunteer->city?>" /><br/>
			
			<label for="field_province" class="mainlabel"><?=@text('Province')?>:</label>
			<?=@helper('admin::com.gives.template.helper.listbox.provinces')?><br/>
			
			<label for="field_postal" class="mainlabel"><?=@text('Postal')?>:</label>
			<input type="text" name="postal" id="field_postal" value="<?=$volunteer->postal?>" /><br/>
			
			<label for="field_phone" class="mainlabel"><?=@text('Phone')?>:</label>
			<input type="text" name="phone" id="field_phone" value="<?=$volunteer->phone?>" /><br/>
			
			<label for="field_email" class="mainlabel"><?=@text('Email')?>:</label>
			<input type="text" name="email" id="field_email" value="<?=$volunteer->email?>" /><br/>
			
			<label for="field_type" class="mainlabel"><?=@text('Type')?>:</label>
			<?=@helper('admin::com.gives.template.helper.listbox.volunteerTypes')?><br/>
			
			<label for="field_required" class="mainlabel"><?=@text('Required')?>:</label>
			<input type="hidden" name="required" value="0" />
			<input type="checkbox" name="required" id="field_required" value="1" <?= ($volunteer->required)? 'checked="checked"':'';?> /><br/>
			
			<label for="field_agency" class="mainlabel"><?=@text('Agency')?>:</label>
			<input type="text" name="agency" id="field_agency" value="<?=$volunteer->agency?>" /><br/>
			
			<label for="field_hours" class="mainlabel"><?=@text('Hours')?>:</label>
			<input type="text" name="hours" id="field_hours" value="<?=$volunteer->hours?>" /><br/>
		</fieldset>
	</div>
		
	<div style="float: left; width: 50%">
		<? jimport('joomla.html.pane') ?>
		<? $pane = &JPane::getInstance('sliders', array('allowAllClose' => true)) ?>
		<?= $pane->startPane('content-pane') ?>
		<?= $pane->startPanel('Availability', 'availability-pane')?>
			<label for="field_monday" class="mainlabel"><?=@text('Monday')?>:</label>
			<input type="text" name="monday" id="field_monday" value="<?=$volunteer->monday?>" /><br/>
		
			<label for="field_tuesday" class="mainlabel"><?=@text('Tuesday')?>:</label>
			<input type="text" name="tuesday" id="field_tuesday" value="<?=$volunteer->tuesday?>" /><br/>
		
			<label for="field_wednesday" class="mainlabel"><?=@text('Wednesday')?>:</label>
			<input type="text" name="wednesday" id="field_wednesday" value="<?=$volunteer->wednesday?>" /><br/>
		
			<label for="field_thursday" class="mainlabel"><?=@text('Thursday')?>:</label>
			<input type="text" name="thursday" id="field_thursday" value="<?=$volunteer->thursday?>" /><br/>
		
			<label for="field_friday" class="mainlabel"><?=@text('Friday')?>:</label>
			<input type="text" name="friday" id="field_friday" value="<?=$volunteer->friday?>" /><br/>
		
			<label for="field_saturday" class="mainlabel"><?=@text('Saturday')?>:</label>
			<input type="text" name="saturday" id="field_saturday" value="<?=$volunteer->saturday?>" /><br/>
		
			<label for="field_sunday" class="mainlabel"><?=@text('Sunday')?>:</label>
			<input type="text" name="sunday" id="field_sunday" value="<?=$volunteer->sunday?>" /><br/>
		
			<label for="field_time_flexible" class="mainlabel"><?=@text('Time Flexible')?>:</label>
			<?=@helper('admin::com.gives.template.helper.listbox.yesNo', array('name'=>'time_flexible'))?><br/>
		<?= $pane->endPanel() ?>
		
		<?= $pane->startPanel('Preference Settings', 'preference-pane') ?>
		<label class="mainlabel"><?= @text('Location')?></label>
		<?= @helper('listbox.locations', array('selected'=>$volunteer->locations)); ?><br/>
		
		<label class="mainlabel"><?= @text('Interests')?></label>
		<?= @helper('listbox.interests', array('selected'=>$volunteer->interests)); ?><br/>
		
		<label class="mainlabel"><?= @text('skills')?></label>
		<?= @helper('listbox.skills', array('selected'=>$volunteer->skills)); ?><br/>
		<?= $pane->endPanel() ?>
		
		<?= $pane->startPanel('Previous Volunteer Experience', 'experience-pane') ?>
			<label for="field_organization1" class="mainlabel"><?=@text('Organization')?>:</label>
			<input type="text" name="organization1" id="field_organization1" value="<?=$volunteer->organization1?>" /><br/>
			<label for="field_assignment1" class="mainlabel"><?=@text('Assignment')?>:</label>
			<input type="text" name="assignment1" id="field_assignment1" value="<?=$volunteer->assignment1?>" /><br/>
			<label for="field_dates1" class="mainlabel"><?=@text('Dates')?>:</label>
			<input type="text" name="dates1" id="field_dates1" value="<?=$volunteer->dates1?>" /><br/>
			
			<label for="field_organization2" class="mainlabel"><?=@text('Organization')?>:</label>
			<input type="text" name="organization2" id="field_organization2" value="<?=$volunteer->organization2?>" /><br/>
			<label for="field_assignment2" class="mainlabel"><?=@text('Assignment')?>:</label>
			<input type="text" name="assignment2" id="field_assignment2" value="<?=$volunteer->assignment2?>" /><br/>
			<label for="field_dates2" class="mainlabel"><?=@text('Dates')?>:</label>
			<input type="text" name="dates2" id="field_dates2" value="<?=$volunteer->dates2?>" /><br/>
			
			<label for="field_organization3" class="mainlabel"><?=@text('Organization')?>:</label>
			<input type="text" name="organization3" id="field_organization3" value="<?=$volunteer->organization3?>" /><br/>
			<label for="field_assignment3" class="mainlabel"><?=@text('Assignment')?>:</label>
			<input type="text" name="assignment3" id="field_assignment3" value="<?=$volunteer->assignment3?>" /><br/>
			<label for="field_dates3" class="mainlabel"><?=@text('Dates')?>:</label>
			<input type="text" name="dates3" id="field_dates3" value="<?=$volunteer->dates3?>" /><br/>
		<?= $pane->endPanel() ?>
		
		<?= $pane->startPanel('Misc', 'misc-panel') ?>
			<label for="field_newsletter" class="mainlabel"><?=@text('Newsletter Signup')?>:</label>
			<input type="hidden" name="newsetter" value="0" />
			<input type="checkbox" name="newsletter" id="field_newsletter" value="1" <?= ($volunteer->newsletter)? 'checked="checked"':''?> /><br/>
			
			<label for="field_search" class="mainlabel"><?=@text('Include in Search')?>:</label>
			<input type="hidden" name="search" value="0" />
			<input type="checkbox" name="search" id="field_search" value="1" <?= ($volunteer->search)? 'checked="checked"':''?> /><br/>
			
			<label for="field_user_id" class="mainlabel"><?=@text('User ID')?>:</label>
			<input type="text" name="user_id" id="field_user_id" value="<?=$volunteer->user_id?>" /><br/>
		<?= $pane->endPanel() ?>
		<?= $pane->endPane() ?>
	</div>	
</form>