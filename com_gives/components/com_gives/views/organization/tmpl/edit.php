<style src="media://com_gives/css/site.css" />

<div class="com_gives">
	<h1>Edit Your Profile</h1>
	
	<p>Update your search settings below:</p>

	<form action="<?= @route('id='.$organization->id)?>" method="post">
		<input type="hidden" name="action" value="save" />
	
		<?= @helper('tabs.startPane') ?>
		<?= @helper('tabs.startPanel', array('title'=>'Organization Details')) ?>
			<?= @helper('form.text', array('name'=>'address')) ?>
			<?= @helper('form.text', array('name'=>'city')) ?>
			<div class="field">
				<div class="label"><label for=""><?= @text('Province') ?>:</label></div>
				<div class="input"><?= @helper('site::com.gives.template.helper.listbox.provinces', array()) ?></div>
			</div>
			<?= @helper('form.text', array('name'=>'postal')) ?>
			<?= @helper('form.text', array('name'=>'phone')) ?>
			<?= @helper('form.text', array('name'=>'fax')) ?>
			<?= @helper('form.text', array('name'=>'email')) ?>
			<?= @helper('form.text', array('name'=>'website')) ?>
			<div class="clear"></div>
		<?= @helper('tabs.endPanel') ?>
		
		<?= @helper('tabs.startPanel', array('title'=>'Contact Details')) ?>
			<?= @helper('form.text', array('name'=>'director')) ?>
			<?= @helper('form.text', array('name'=>'contact')) ?>
			<?= @helper('form.text', array('name'=>'contact_email')) ?>
			<?= @helper('form.text', array('name'=>'contact_title')) ?>
			<div class="field">
				<div class="label"><label for=""><?= @text('Organization Type') ?>:</label></div>
				<div class="input"><?= @helper('site::com.gives.template.helper.listbox.organizationTypes', array()) ?></div>
			</div>
			<div class="clear"></div>
		<?= @helper('tabs.endPanel') ?>
		
		<?= @helper('tabs.startPanel', array('title'=>'Organization Mission')) ?>
			<?= @helper('admin::com.default.template.helper.editor.display', array('name'=>'mission', 'height'=>150, 'buttons'=>false)) ?>
		<?= @helper('tabs.endPanel') ?>
		
		<?= @helper('tabs.startPanel', array('title'=>'Organization Description')) ?>
			<?= @helper('admin::com.default.template.helper.editor.display', array('height'=>150, 'buttons'=>false)) ?>
		<?= @helper('tabs.endPanel') ?>
		
		<?= @helper('tabs.startPanel', array('title'=>'Interests')) ?>
			<?= @helper('listbox.interests')?>
		<?= @helper('tabs.endPanel') ?>

		<?= @helper('tabs.startPanel', array('title'=>'Skills')) ?>
			<?= @helper('listbox.skills')?>
		<?= @helper('tabs.endPanel') ?>
		
		<?= @helper('tabs.startPanel', array('title'=>'Locations')) ?>
			<?= @helper('listbox.locations')?>
		<?= @helper('tabs.endPanel') ?>
		
		<?= @helper('tabs.startPanel', array('title'=>'Password')) ?>
			<?= @helper('form.password', array('name'=>'password')) ?>
			<?= @helper('form.password', array('name'=>'confirm')) ?>
		<?= @helper('tabs.endPanel') ?>
		
		<?= @helper('tabs.endPane')?>
	
		
		<p class="clear"><input type="submit" value="Save" /></p>
	</form>
</div>