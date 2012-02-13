<?= @helper('behavior.mootools') ?>
<?= @helper('behavior.validator') ?>

<script src="media://lib_koowa/js/koowa.js" />
<style src="media://com_gives/css/site.css" />

<div class="com_gives">
	<h1 class="componentheading">
		<? if ($opportunity->isnew()): ?>
	    	<?= @text('Create New Opportunity') ?>
	    <? else: ?>
	    	<?= 'Edit '. $opportunity->title ?>
	    <? endif; ?>

		<span class="edit">
			<? if ($opportunity->isnew()): ?>
			<a href="<?= @route('view=organization&id='. KRequest::get('get.org_id', 'int')); ?>">
				Cancel
			</a>
			<? else: ?>
			<a href="<?= @route('view=opportunity&id='. $opportunity->id) ?>">   
				Back
			</a>
			<? endif; ?>
			</a>
		</span>
	</h1>

	<div style="margin: 1em 0;">
	<form action="<?= @route('id='.$opportunity->id) ?>" method="post" class="-koowa-form">
	    <input type="hidden" name="action" value="save" />
	    <? if ($opportunity->isNew()): ?>
			<input type="hidden" name="gives_organization_id" value="<?= KRequest::get('get.org_id', 'int') ?>" />
		<? else: ?>
			<input type="hidden" name="gives_organization_id" value="<?= $opportunity->gives_organization_id ?>" />
		<? endif; ?>
   
		<?= @helper('tabs.startPane') ?>
			<?= @helper('tabs.startPanel', array('title'=>'Opportunity Details')) ?>
				<?= @helper('form.text', array('name'=>'title')) ?>
				<?= @helper('form.text', array('name'=>'address')) ?>
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
					<div class="input date">
						<?= JHtml::calendar($opportunity->start_date, 'start_date', 'field_start_date', '%Y-%m-%d') ?>
					</div>
				</div>
				
				<div class="field">
					<div class="label"><label><?= @text('End Date')?>:</label></div>
					<div class="input date">
						<?= JHtml::calendar($opportunity->end_date, 'end_date', 'field_end_date', '%Y-%m-%d') ?>
					</div>
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
		
			<?= @helper('tabs.startPanel', array('title'=>'Requirements')) ?>
				<?= @helper('form.text', array('name'=>'min_hours'))?>
				<?= @helper('form.text', array('name'=>'max_hours'))?>
			
				<div class="field">
					<div class="label"><label><?=@text('License')?>:</label></div>
					<div class="input"><?=@helper('admin::com.gives.template.helper.listbox.yesNo', array('name'=>'license'))?></div>
				</div>
			
				<div class="field">
					<div class="label"><label><?=@text('Police Check')?>:</label></div>
					<div class="input"><?=@helper('admin::com.gives.template.helper.listbox.yesNo', array('name'=>'police_check'))?></div>
				</div>
			
				<?= @helper('form.text', array('name'=>'min_age'))?>
			<?= @helper('tabs.endPanel') ?>
		<?= @helper('tabs.endPane') ?>
	
		<p class="clear" style="text-align: right;"><input type="submit" value="Save" /></p>
 
	</form>
	</div>
</div>
