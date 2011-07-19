<?= @helper('behavior.mootools') ?>
<?= @helper('behavior.validator') ?>

<script src="media://lib_koowa/js/koowa.js" />
<style src="media://com_gives/css/site.css" />

<div class="com_gives">
	<h1 class="componentheading">
	    <?= @text('Create new Opportunity')?>

		<span class="edit">
			<a href="<?= @route('view=organization&id='. KRequest::get('get.org_id', 'int')); ?>">
				<?= 'Back' ?>
			</a>
		</span>
	</h1>

	<div style="margin: 1em 0;">
	<form action="<?= @route('id='.$opportunity->id) ?>" method="post" class="-koowa-form">
	    <input type="hidden" name="action" value="save" />
		<input type="hidden" name="gives_organization_id" value="<?= KRequest::get('get.org_id', 'int') ?>" />
   
		<?= @helper('tabs.startPane') ?>
			<?= @helper('tabs.startPanel', array('title'=>'Opportunity Details')) ?>
				<?= @helper('form.text', array('name'=>'title')) ?>
				<?= @helper('form.text', array('name'=>'city')) ?>
				<div class="field">
					<div class="label"><label for=""><?= @text('Province') ?>:</label></div>
					<div class="input"><?= @helper('site::com.gives.template.helper.listbox.provinces', array()) ?></div>
				</div>
				<?= @helper('form.text', array('name'=>'postal')) ?>
				<?= @helper('form.text', array('name'=>'phone')) ?>
				<?= @helper('form.text', array('name'=>'fax')) ?>
				
				<div class="field">
					<div class="label"><label><?=@text('Special Event')?>:</label></div>
					<div class="input"><?=@helper('admin::com.gives.template.helper.listbox.yesNo', array('name'=>'event'))?></div>
				</div>

				<div class="field">
					<div class="label"><label><?= @text('Event/Start Date')?>:</label></div>
					<div class="input"><input type="text" name="event_date" id="field_event_date" value="<?=$opportunity->event_date?>" /></div>
				</div>
				
				<div class="field">
					<div class="label"><label><?= @text('End Date')?>:</label></div>
					<div class="input"><input type="text" name="end_date" id="field_end_date" value="<?=$opportunity->event_date?>" /></div>
				</div>
			<?= @helper('tabs.endPanel') ?>
			
			<?= @helper('tabs.startPanel', array('title'=>'Description')) ?>
				<?= @helper('admin::com.default.template.helper.editor.display', array(
					'name'=>'description', 'height'=>150, 'buttons'=>false)) ?>
			<?= @helper('tabs.endPanel') ?>
		
			<?= @helper('tabs.startPanel', array('title'=>'Interests')) ?>
				<?= @helper('select.interests') ?>
			<?= @helper('tabs.endPanel') ?>
		
			<?= @helper('tabs.startPanel', array('title'=>'Skills')) ?>
				<?= @helper('select.skills') ?>
			<?= @helper('tabs.endPanel') ?>
		
			<?= @helper('tabs.startPanel', array('title'=>'Locations')) ?>
				<?= @helper('select.locations') ?>
			<?= @helper('tabs.endPanel') ?>
		
			<?= @helper('tabs.startPanel', array('title'=>'Opportunity Details')) ?>
				<?= @helper('form.text', array('name'=>'min_hours'))?>
				<?= @helper('form.text', array('name'=>'max_hours'))?>
			
				<div class="field">
					<div class="label"><label><?=@text('License')?>:</label></div>
					<div class="input"><?=@helper('admin::com.gives.template.helper.listbox.yesNo', array('name'=>'license'))?></div>
				</div>
			
				<div class="field">
					<div class="label"><label><?=@text('Police Check')?>:</label></div>
					<div class="input"><?=@helper('admin::com.gives.template.helper.listbox.yesNo', array('name'=>'license'))?></div>
				</div>
			
				<?= @helper('form.text', array('name'=>'min_age'))?>
			<?= @helper('tabs.endPanel') ?>
		<?= @helper('tabs.endPane') ?>
	
		<p class="clear"><input type="submit" value="Save" /></p>
 
	</form>
	</div>
</div>
