<? defined('KOOWA') or die; ?>
<script src="media://lib_koowa/js/koowa.js" />
<style src="media://com_default/css/form.css" />

<form action="<?=@route('id='.$organization->id)?>" method="post" class="-koowa-form" id="mainform">
	<div style="float: left; width: 50%">
		<fieldset>
			<legend><?= @text('Organization Details') ?></legend>
			
			<label for="field_title" class="mainlabel"><?=@text('Name')?>:</label>
			<input type="text" name="title" id="field_title" value="<?=$organization->title?>" /><br/>
			
			<label for="field_address" class="mainlabel"><?=@text('Address')?>:</label>
			<input type="text" name="address" id="field_address" value="<?=$organization->address?>" /><br/>
			
			<label for="field_city" class="mainlabel"><?=@text('City')?>:</label>
			<input type="text" name="city" id="field_city" value="<?=$organization->city?>" /><br/>
			
			<label for="field_province" class="mainlabel"><?=@text('Province')?>:</label>
			<?=@helper('admin::com.gives.template.helper.listbox.provinces')?><br/>
			
			<label for="field_postal" class="mainlabel"><?=@text('Postal')?>:</label>
			<input type="text" name="postal" id="field_postal" value="<?=$organization->postal?>" /><br/>
			
			<label for="field_phone" class="mainlabel"><?=@text('Phone')?>:</label>
			<input type="text" name="phone" id="field_phone" value="<?=$organization->phone?>" /><br/>
			
			<label for="field_fax" class="mainlabel"><?=@text('Fax')?>:</label>
			<input type="text" name="fax" id="field_fax" value="<?=$organization->fax?>" /><br/>
			
			<label for="field_email" class="mainlabel"><?=@text('Email')?>:</label>
			<input type="text" name="email" id="field_email" value="<?=$organization->email?>" /><br/>
			
			<label for="field_website" class="mainlabel"><?=@text('Website')?>:</label>
			<input type="text" name="website" id="field_website" value="<?=$organization->website?>" /><br/>
			
			<label for="field_director" class="mainlabel"><?=@text('Director')?>:</label>
			<input type="text" name="director" id="field_director" value="<?=$organization->director?>" /><br/>
			
			<label for="field_contact" class="mainlabel"><?=@text('Contact')?>:</label>
			<input type="text" name="contact" id="field_contact" value="<?=$organization->contact?>" /><br/>
			
			<label for="field_contact_email" class="mainlabel"><?=@text('Contact Email')?>:</label>
			<input type="text" name="contact_email" id="field_contact_email" value="<?=$organization->contact_email?>" /><br/>
			
			<label for="field_contact_title" class="mainlabel"><?=@text('Contact Title')?>:</label>
			<input type="text" name="contact_title" id="field_contact_title" value="<?=$organization->contact_title?>" /><br/>
		</fieldset>
		
		<fieldset>
			<legend><?=@text('Mission')?></legend>
			<textarea name="mission" style="width: 100%;" rows="10"><?=$organization->mission?></textarea>
		</fieldset>
		
		<fieldset>
			<legend><?=@text('Description')?></legend>
			<textarea name="description" style="width: 100%;" rows="10"><?=$organization->description?></textarea>
		</fieldset>
	</div>
		
	<div style="float: left; width: 50%">
		<? jimport('joomla.html.pane') ?>
		<? $pane = &JPane::getInstance('sliders', array('allowAllClose' => true)) ?>
		<?= $pane->startPane('content-pane') ?>
		
		<?= $pane->startPanel('Location', 'locaion-pane') ?>
			<?= @helper('listbox.locations', array('selected'=>$organization->locations)); ?>
		<?= $pane->endPanel()?>
		
		<?= $pane->startPanel('Interests', 'interests-pane') ?>
			<?= @helper('listbox.interests', array('selected'=>$organization->interests)); ?>
		<?= $pane->endPanel() ?>
		
		<?= $pane->startPanel('Skills Settings', 'skills-pane') ?>
			<?= @helper('listbox.skills', array('selected'=>$organization->skills)); ?>
		<?= $pane->endPanel() ?>
		
		
		<?= $pane->startPanel('Misc', 'availability-pane')?>
			<label for="field_type" class="mainlabel"><?=@text('Type')?>:</label>
			<?=@helper('admin::com.gives.template.helper.listbox.organizationTypes')?><br/>
			
			<label for="field_newsletter" class="mainlabel"><?=@text('Newsletter')?>:</label>
			<?=@helper('admin::com.gives.template.helper.listbox.yesNo', array('name'=>'newsletter'))?><br/>
			
			<label for="field_user_id" class="mainlabel"><?=@text('User ID')?>:</label>
			<input type="text" name="user_id" id="field_user_id" value="<?=$organization->user_id?>" />
		<?= $pane->endPanel() ?>
		<?= $pane->endPane() ?>
	</div>	
</form>