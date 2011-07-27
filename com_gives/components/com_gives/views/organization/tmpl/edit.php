<?= @helper('behavior.mootools') ?>
<style src="media://com_gives/css/site.css" />

<div class="com_gives">
	<h1>
		Edit Your Profile
		<? if ($edit): ?>
		<span class="edit">
			<a href="<?= @route('view=organization&id='.$organization->id) ?>">
				<?= 'Back' ?>
			</a>
		</span>
		<? endif; ?>
	</h1>
	
	<p>Update your search settings below:</p>

	<form enctype="multipart/form-data" action="<?= @route('id='.$organization->id)?>" method="post">
		<input type="hidden" name="action" value="save" />
		<input type="hidden" name="MAX_FILE_SIZE" value="100000" />
	
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
			<?= @helper('select.interests')?>
		<?= @helper('tabs.endPanel') ?>

		<?= @helper('tabs.startPanel', array('title'=>'Skills')) ?>
			<?= @helper('select.skills')?>
		<?= @helper('tabs.endPanel') ?>
		
		<?= @helper('tabs.startPanel', array('title'=>'Locations')) ?>
			<?= @helper('select.locations')?>
		<?= @helper('tabs.endPanel') ?>
		
		<?= @helper('tabs.startPanel', array('title'=>'Logo')) ?>
			<? if ($organization->logo): ?>
				<div class="field">
					<div class="label"><label><?= @text('Logo Preview') ?></label></div>
					<div class="input">
						<img
							src="media://com_gives/uploads/organizations/<?= $organization->logo ?>"
							alt="<?= $organization->title ?>" />
					</div>
				</div>
				<div class="field">
					<div class="label"><label><?= @text('Delete Logo') ?></label></div>
					<div class="input"><input type="checkbox" name="logo_delete" /></div>
				</div>
			<? endif; ?>
			<div class="field">
				<div class="label"><label><?= @text('Logo') ?></label></div>
				<div class="input"><input type="file" name="logo_upload" /></div>
			</div>
		<?= @helper('tabs.endPanel') ?>
		
		<?= @helper('tabs.startPanel', array('title'=>'Password')) ?>
			<?= @helper('form.password', array('name'=>'password')) ?>
			<?= @helper('form.password', array('name'=>'confirm')) ?>
		<?= @helper('tabs.endPanel') ?>
		
		<?= @helper('tabs.endPane')?>
	
		
		<p class="clear right"><input type="submit" value="Save" /></p>
	</form>
</div>