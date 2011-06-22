<style src="media://com_gives/css/site.css" />

<div class="com_gives">
	<h1>Edit Your Profile</h1>
	
	<p>Update your search settings below:</p>

	<form action="<?= @route('id='.$organization->id)?>" method="post">
		<input type="hidden" name="action" value="save" />
	
		<fieldset>
			<legend><?= @text('Contact Information') ?></legend>
			
			<?= @helper('form.text', array('name'=>'address')) ?>
			<?= @helper('form.text', array('name'=>'city')) ?>
			<dl>
				<dt><label for=""><?= @text('Province') ?>:</label></dt>
				<dd><?= @helper('site::com.gives.template.helper.listbox.provinces', array()) ?></dd>
			</dl>
			<?= @helper('form.text', array('name'=>'postal')) ?>
			<?= @helper('form.text', array('name'=>'phone')) ?>
			<?= @helper('form.text', array('name'=>'fax')) ?>
			<?= @helper('form.text', array('name'=>'email')) ?>
			<?= @helper('form.text', array('name'=>'website')) ?>
		</fieldset>
		
		<fieldset>
			<legend>Organization Details</legend>
			
			<?= @helper('form.text', array('name'=>'director')) ?>
			<?= @helper('form.text', array('name'=>'contact')) ?>
			<?= @helper('form.text', array('name'=>'contact_email')) ?>
			<?= @helper('form.text', array('name'=>'contact_title')) ?>
			<dl>
				<dt><label for=""><?= @text('Organization Type') ?>:</label></dt>
				<dd><?= @helper('site::com.gives.template.helper.listbox.organizationTypes', array()) ?></dd>
			</dl>
		</fieldset>

<? if (false): ?>		
		<fieldset>
			<legend>Organization Mission</legend>
			<?= @helper('admin::com.default.template.helper.editor.display', array('name'=>'mission', 'height'=>150, 'buttons'=>false)) ?>
		</fieldset>
		
		<fieldset>
			<legend>Organization Description</legend>
			<?= @helper('admin::com.default.template.helper.editor.display', array('height'=>150, 'buttons'=>false)) ?>
		</fieldset>
<? endif; ?>
	
		<h2>Your Interests</h2>
		<?= @helper('listbox.interests')?>
		
		<h2>Your Skills</h2>
		<?= @helper('listbox.skills')?>
		
		<h2>Your Locations</h2>
		<?= @helper('listbox.locations')?>
	
	
		<p><input type="submit" value="Save" /></p>
	</form>
</div>