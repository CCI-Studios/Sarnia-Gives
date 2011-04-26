<? defined('KOOWA') or die; ?>
<script src="media://lib_koowa/js/koowa.js" />
<style src="media://com_default/css/form.css" />

<form action="<?=@route('id='.$organization->id)?>" method="post" class="adminform" name="adminForm" id="mainform">
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
		<?= $pane->startPanel('Location', 'location-pane')?>
			<label for="field_brooke_alvinston" class="mainlabel"><?=@text('Brooke-Alvinston')?>:</label>
			<input type="text" name="brooke_alvinston" id="field_brooke_alvinston" value="<?=$organization->brooke_alvinston?>" /><br/>
			
			<label for="field_lambton_shores" class="mainlabel"><?=@text('Lambton Shores')?>:</label>
			<input type="text" name="lambton_shores" id="field_lambton_shores" value="<?=$organization->lambton_shores?>" /><br/>
			
			<label for="field_point_edward" class="mainlabel"><?=@text('Point Edward')?>:</label>
			<input type="text" name="point_edward" id="field_point_edward" value="<?=$organization->point_edward?>" /><br/>
			
			<label for="field_sarnia" class="mainlabel"><?=@text('Sarnia')?>:</label>
			<input type="text" name="sarnia" id="field_sarnia" value="<?=$organization->sarnia?>" /><br/>
			
			<label for="field_dawn_euphemia" class="mainlabel"><?=@text('Dawn-Euphemia')?>:</label>
			<input type="text" name="dawn_euphemia" id="field_dawn_euphemia" value="<?=$organization->dawn_euphemia?>" /><br/>
			
			<label for="field_oil_springs" class="mainlabel"><?=@text('Oil Springs')?>:</label>
			<input type="text" name="oil_springs" id="field_oil_springs" value="<?=$organization->oil_springs?>" /><br/>
			
			<label for="field_plympton_wyoming" class="mainlabel"><?=@text('Plympton Wyoming')?>:</label>
			<input type="text" name="plympton_wyoming" id="field_plympton_wyoming" value="<?=$organization->plympton_wyoming?>" /><br/>
			
			<label for="field_enniskillen" class="mainlabel"><?=@text('Enniskillen')?>:</label>
			<input type="text" name="enniskillen" id="field_enniskillen" value="<?=$organization->enniskillen?>" /><br/>
			
			<label for="field_petrolia" class="mainlabel"><?=@text('Petrolia')?>:</label>
			<input type="text" name="petrolia" id="field_petrolia" value="<?=$organization->petrolia?>" /><br/>
			
			<label for="field_st_clair" class="mainlabel"><?=@text('St. Clair')?>:</label>
			<input type="text" name="st_clair" id="field_st_clair" value="<?=$organization->st_clair?>" /><br/>
			
			<label for="field_location_flexible" class="mainlabel"><?=@text('Location Flexible')?>:</label>
			<input type="checkbox" name="location_flexible" id="field_location_flexible" value="<?=$organization->location_flexible?>" /><br/>
		<?= $pane->endPanel() ?>
		
		<?= $pane->startPanel('Interests', 'interests-pane')?>
			<label for="field_animals" class="mainlabel"><?=@text('Animals/Animal Services')?>:</label>
			<input type="text" name="animals" id="field_animals" value="<?=$organization->animals?>" /><br/>
			
			<label for="field_community" class="mainlabel"><?=@text('Community Development')?>:</label>
			<input type="text" name="community" id="field_community" value="<?=$organization->community?>" /><br/>
			
			<label for="field_health" class="mainlabel"><?=@text('Health & Wellness')?>:</label>
			<input type="text" name="health" id="field_health" value="<?=$organization->health?>" /><br/>
			
			<label for="field_arts" class="mainlabel"><?=@text('Arts & Culture')?>:</label>
			<input type="text" name="arts" id="field_arts" value="<?=$organization->arts?>" /><br/>
			
			<label for="field_emergency" class="mainlabel"><?=@text('Emergency/Crisis Services')?>:</label>
			<input type="text" name="emergency" id="field_emergency" value="<?=$organization->emergency?>" /><br/>
			
			<label for="field_social_services" class="mainlabel"><?=@text('Social Services & Justice')?>:</label>
			<input type="text" name="social_services" id="field_social_services" value="<?=$organization->social_services?>" /><br/>
			
			<label for="field_children" class="mainlabel"><?=@text('Children & Youth')?>:</label>
			<input type="text" name="children" id="field_children" value="<?=$organization->children?>" /><br/>
			
			<label for="field_environment" class="mainlabel"><?=@text('Environment')?>:</label>
			<input type="text" name="environment" id="field_environment" value="<?=$organization->environment?>" /><br/>
			
			<label for="field_special_events" class="mainlabel"><?=@text('Special Events')?>:</label>
			<input type="text" name="special_events" id="field_special_events" value="<?=$organization->special_events?>" /><br/>
		<?= $pane->endPanel() ?>
		
		<?= $pane->startPanel('Misc', 'availability-pane')?>
			<label for="field_created" class="mainlabel"><?=@text('Created')?>:</label>
			<input type="text" name="created" id="field_created" value="<?=$organization->created?>" /><br/>
			
			<label for="field_type" class="mainlabel"><?=@text('Type')?>:</label>
			<?=@helper('admin::com.gives.template.helper.listbox.organizationTypes')?><br/>
			
			<label for="field_newsletter" class="mainlabel"><?=@text('Newsletter')?>:</label>
			<input type="text" name="newsletter" id="field_newsletter" value="<?=$organization->newsletter?>" /><br/>
		<?= $pane->endPanel() ?>
		<?= $pane->endPane() ?>
	</div>	
</form>