<? defined('KOOWA') or die; ?>
<?= @helper('behavior.validator') ?>
<script src="media://lib_koowa/js/koowa.js" />
<style src="media://com_default/css/form.css" />
<style src="media://com_gives/css/admin.css" />

<form enctype="multipart/form-data" action="<?=@route('id='.$organization->id)?>" method="post" class="-koowa-form" id="mainform">
	<input type="hidden" name="MAX_FILE_SIZE" value="100000" />

	<div style="float: left; width: 50%">
		<fieldset>
			<legend><?= @text('Organization Details') ?></legend>

			<label for="field_title" class="mainlabel"><?=@text('Name')?>:</label>
			<input type="text" class="required" name="title" id="field_title" value="<?=$organization->title?>" /><br/>

			<label for="field_address" class="mainlabel"><?=@text('Address')?>:</label>
			<input type="text" name="address" id="field_address" value="<?=$organization->address?>" /><br/>

			<label for="field_city" class="mainlabel"><?=@text('City')?>:</label>
			<input type="text" name="city" id="field_city" value="<?=$organization->city?>" /><br/>

			<label for="field_province" class="mainlabel"><?=@text('Province')?>:</label>
			<?=@helper('com://admin/gives.template.helper.listbox.provinces')?><br/>

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

			<label for="field_contact" class="mainlabel"><?=@text('Contact Name')?>:</label>
			<input type="text" class="required" name="contact" id="field_contact" value="<?=$organization->contact?>" /><br/>

			<label for="field_contact_email" class="mainlabel"><?=@text('Contact Email')?>:</label>
			<input type="text" class="required" name="contact_email" id="field_contact_email" value="<?=$organization->contact_email?>" /><br/>

			<label for="field_contact_title" class="mainlabel"><?=@text('Contact Title')?>:</label>
			<input type="text" name="contact_title" id="field_contact_title" value="<?=$organization->contact_title?>" /><br/>

			<label for="field_expires" class="mainlabel"><?=@text('Expiry Date')?>:</label>
			<?= JHtml::calendar($organization->expires, 'expires', 'field_expires', '%Y-%m-%d') ?><br/>
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

			<?= $pane->startPanel('Interests', 'interests-pane') ?>
				<?= @helper('select.interests'); ?>
			<?= $pane->endPanel() ?>

			<?= $pane->startPanel('Skills Settings', 'skills-pane') ?>
				<?= @helper('select.skills'); ?>
			<?= $pane->endPanel() ?>

			<?= $pane->startPanel('Location', 'locations-pane') ?>
				<?= @helper('select.locations'); ?>
			<?= $pane->endPanel()?>


			<?= $pane->startPanel('Misc', 'availability-pane')?>
				<label for="field_type" class="mainlabel"><?=@text('Type')?>:</label>
				<?=@helper('com://admin/gives.template.helper.listbox.organizationTypes')?><br/>

				<label for="field_newsletter" class="mainlabel"><?=@text('Newsletter')?>:</label>
				<?=@helper('com://admin/gives.template.helper.listbox.yesNo', array('name'=>'newsletter'))?><br/>

				<label for="field_user_id" class="mainlabel"><?=@text('User ID')?>:</label>
				<input type="text" name="user_id" id="field_user_id" value="<?=$organization->user_id?>" />
			<?= $pane->endPanel() ?>

			<?= $pane->startPanel('Logo', 'logo-panel') ?>
				<? if ($organization->logo): ?>
					<label class="mainlabel"><?= @text('Preview') ?></label>
					<img src="media://com_gives/uploads/organizations/<?= $organization->logo ?>" /><br/>
					<label for="field_logo_delete" class="mainlabel"><?= @text('Delete Logo') ?></label>
					<input type="checkbox" name="logo_delete" /><br/>
				<? endif; ?>
				<label for="field_logo" class="mainlabel"><?= @text('Select Logo') ?></label>
				<input type="file" name="logo_upload" /><br/>
			<?= $pane->endPanel() ?>
		<?= $pane->endPane() ?>
	</div>
</form>