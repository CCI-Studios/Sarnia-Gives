<? defined('KOOWA') or die; ?>
<script src="media://lib_koowa/js/koowa.js" />
<style src="media://com_default/css/form.css" />

<form action="<?=@route('id='.$opportunity->id)?>" method="post" class="adminform" name="adminForm" id="mainform">
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
		</fieldset>
	</div>
		
	<div style="float: left; width: 50%">
		<? jimport('joomla.html.pane') ?>
		<? $pane = &JPane::getInstance('sliders', array('allowAllClose' => true)) ?>
		<?= $pane->startPane('content-pane') ?>
		<?= $pane->startPanel('Location', 'location-pane')?>
			<label for="field_brooke_alvinston" class="mainlabel"><?=@text('Brooke-Alvinston')?>:</label>
			<input type="text" name="brooke_alvinston" id="field_brooke_alvinston" value="<?=$opportunity->brooke_alvinston?>" /><br/>
			
			<label for="field_lambton_shores" class="mainlabel"><?=@text('Lambton Shores')?>:</label>
			<input type="text" name="lambton_shores" id="field_lambton_shores" value="<?=$opportunity->lambton_shores?>" /><br/>
			
			<label for="field_point_edward" class="mainlabel"><?=@text('Point Edward')?>:</label>
			<input type="text" name="point_edward" id="field_point_edward" value="<?=$opportunity->point_edward?>" /><br/>
			
			<label for="field_sarnia" class="mainlabel"><?=@text('Sarnia')?>:</label>
			<input type="text" name="sarnia" id="field_sarnia" value="<?=$opportunity->sarnia?>" /><br/>
			
			<label for="field_dawn_euphemia" class="mainlabel"><?=@text('Dawn-Euphemia')?>:</label>
			<input type="text" name="dawn_euphemia" id="field_dawn_euphemia" value="<?=$opportunity->dawn_euphemia?>" /><br/>
			
			<label for="field_oil_springs" class="mainlabel"><?=@text('Oil Springs')?>:</label>
			<input type="text" name="oil_springs" id="field_oil_springs" value="<?=$opportunity->oil_springs?>" /><br/>
			
			<label for="field_plympton_wyoming" class="mainlabel"><?=@text('Plympton Wyoming')?>:</label>
			<input type="text" name="plympton_wyoming" id="field_plympton_wyoming" value="<?=$opportunity->plympton_wyoming?>" /><br/>
			
			<label for="field_enniskillen" class="mainlabel"><?=@text('Enniskillen')?>:</label>
			<input type="text" name="enniskillen" id="field_enniskillen" value="<?=$opportunity->enniskillen?>" /><br/>
			
			<label for="field_petrolia" class="mainlabel"><?=@text('Petrolia')?>:</label>
			<input type="text" name="petrolia" id="field_petrolia" value="<?=$opportunity->petrolia?>" /><br/>
			
			<label for="field_st_clair" class="mainlabel"><?=@text('St. Clair')?>:</label>
			<input type="text" name="st_clair" id="field_st_clair" value="<?=$opportunity->st_clair?>" /><br/>
			
			<label for="field_location_flexible" class="mainlabel"><?=@text('Location Flexible')?>:</label>
			<input type="checkbox" name="location_flexible" id="field_location_flexible" value="<?=$opportunity->location_flexible?>" /><br/>
		<?= $pane->endPanel() ?>
		
		<?= $pane->startPanel('Interests', 'interests-pane')?>
			<label for="field_animals" class="mainlabel"><?=@text('Animals/Animal Services')?>:</label>
			<input type="text" name="animals" id="field_animals" value="<?=$opportunity->animals?>" /><br/>
			
			<label for="field_community" class="mainlabel"><?=@text('Community Development')?>:</label>
			<input type="text" name="community" id="field_community" value="<?=$opportunity->community?>" /><br/>
			
			<label for="field_health" class="mainlabel"><?=@text('Health & Wellness')?>:</label>
			<input type="text" name="health" id="field_health" value="<?=$opportunity->health?>" /><br/>
			
			<label for="field_arts" class="mainlabel"><?=@text('Arts & Culture')?>:</label>
			<input type="text" name="arts" id="field_arts" value="<?=$opportunity->arts?>" /><br/>
			
			<label for="field_emergency" class="mainlabel"><?=@text('Emergency/Crisis Services')?>:</label>
			<input type="text" name="emergency" id="field_emergency" value="<?=$opportunity->emergency?>" /><br/>
			
			<label for="field_social_services" class="mainlabel"><?=@text('Social Services & Justice')?>:</label>
			<input type="text" name="social_services" id="field_social_services" value="<?=$opportunity->social_services?>" /><br/>
			
			<label for="field_children" class="mainlabel"><?=@text('Children & Youth')?>:</label>
			<input type="text" name="children" id="field_children" value="<?=$opportunity->children?>" /><br/>
			
			<label for="field_environment" class="mainlabel"><?=@text('Environment')?>:</label>
			<input type="text" name="environment" id="field_environment" value="<?=$opportunity->environment?>" /><br/>
			
			<label for="field_special_events" class="mainlabel"><?=@text('Special Events')?>:</label>
			<input type="text" name="special_events" id="field_special_events" value="<?=$opportunity->special_events?>" /><br/>
		<?= $pane->endPanel() ?>
		
		<?= $pane->startPanel('Skills', 'skills-pane')?>
			<label for="field_accounting" class="mainlabel"><?=@text('Accounting')?>:</label>
			<input type="text" name="accounting" id="field_accounting" value="<?=$opportunity->accounting?>" /><br/>
			
			<label for="field_coaching" class="mainlabel"><?=@text('Coaching')?>:</label>
			<input type="text" name="coaching" id="field_coaching" value="<?=$opportunity->coaching?>" /><br/>
			
			<label for="field_event_coordination" class="mainlabel"><?=@text('Event Coordination')?>:</label>
			<input type="text" name="event_coordination" id="field_event_coordination" value="<?=$opportunity->event_coordination?>" /><br/>
			
			<label for="field_it" class="mainlabel"><?=@text('IT')?>:</label>
			<input type="text" name="it" id="field_it" value="<?=$opportunity->it?>" /><br/>
			
			<label for="field_marketing" class="mainlabel"><?=@text('Marketing & Communications')?>:</label>
			<input type="text" name="marketing" id="field_marketing" value="<?=$opportunity->marketing?>" /><br/>
			
			<label for="field_outreach" class="mainlabel"><?=@text('Outreach')?>:</label>
			<input type="text" name="outreach" id="field_outreach" value="<?=$opportunity->outreach?>" /><br/>
			
			<label for="field_translation" class="mainlabel"><?=@text('Translation')?>:</label>
			<input type="text" name="translation" id="field_translation" value="<?=$opportunity->translation?>" /><br/>
			
			<label for="field_bilingual" class="mainlabel"><?=@text('Bilingual (Eng/Fr)')?>:</label>
			<input type="text" name="bilingual" id="field_bilingual" value="<?=$opportunity->bilingual?>" /><br/>
			
			<label for="field_counseling" class="mainlabel"><?=@text('Counseling')?>:</label>
			<input type="text" name="counseling" id="field_counseling" value="<?=$opportunity->counseling?>" /><br/>
			
			<label for="field_fundraising" class="mainlabel"><?=@text('Fundraising')?>:</label>
			<input type="text" name="fundraising" id="field_fundraising" value="<?=$opportunity->fundraising?>" /><br/>
			
			<label for="field_legal" class="mainlabel"><?=@text('Legal')?>:</label>
			<input type="text" name="legal" id="field_legal" value="<?=$opportunity->legal?>" /><br/>
			
			<label for="field_medical" class="mainlabel"><?=@text('Medical Assistance')?>:</label>
			<input type="text" name="medical" id="field_medical" value="<?=$opportunity->medical?>" /><br/>
			
			<label for="field_pr" class="mainlabel"><?=@text('PR')?>:</label>
			<input type="text" name="pr" id="field_pr" value="<?=$opportunity->pr?>" /><br/>
			
			<label for="field_writing" class="mainlabel"><?=@text('Writing & Research')?>:</label>
			<input type="text" name="writing" id="field_writing" value="<?=$opportunity->writing?>" /><br/>
			
			<label for="field_board_work" class="mainlabel"><?=@text('Board Work')?>:</label>
			<input type="text" name="board_work" id="field_board_work" value="<?=$opportunity->board_work?>" /><br/>
			
			<label for="field_crisis" class="mainlabel"><?=@text('Crisis Intervention')?>:</label>
			<input type="text" name="crisis" id="field_crisis" value="<?=$opportunity->crisis?>" /><br/>
			
			<label for="field_administration" class="mainlabel"><?=@text('General Administration')?>:</label>
			<input type="text" name="administration" id="field_administration" value="<?=$opportunity->administration?>" /><br/>
			
			<label for="field_management" class="mainlabel"><?=@text('Management Consulting')?>:</label>
			<input type="text" name="management" id="field_management" value="<?=$opportunity->management?>" /><br/>
			
			<label for="field_mentoring" class="mainlabel"><?=@text('Mentoring & Training')?>:</label>
			<input type="text" name="mentoring" id="field_mentoring" value="<?=$opportunity->mentoring?>" /><br/>
			
			<label for="field_sports" class="mainlabel"><?=@text('Sports & Recreation')?>:</label>
			<input type="text" name="sports" id="field_sports" value="<?=$opportunity->sports?>" /><br/>
			
			<label for="field_other_skills" class="mainlabel"><?=@text('Other')?>:</label>
			<input type="text" name="other_skills" id="field_other_skills" value="<?=$opportunity->other_skills?>" /><br/>
		<?= $pane->endPanel() ?>
		
		<?= $pane->startPanel('Requirements', 'requirements-pane') ?>
			<label for="field_event" class="mainlabel"><?=@text('For Event')?>:</label>
			<input type="checkbox" name="event" id="field_event" value="<?=$opportunity->event?>" /><br/>

			<label for="field_event_date" class="mainlabel"><?=@text('Event Date')?>:</label>
			<input type="text" name="event_date" id="field_event_date" value="<?=$opportunity->event_date?>" /><br/>
			
			<label for="field_min_hours" class="mainlabel"><?=@text('Min Hours')?>:</label>
			<input type="text" name="min_hours" id="field_min_hours" value="<?=$opportunity->min_hours?>" /><br/>
			
			<label for="field_max_hours" class="mainlabel"><?=@text('Max Hours')?>:</label>
			<input type="text" name="max_hours" id="field_max_hours" value="<?=$opportunity->max_hours?>" /><br/>
			
			<label for="field_license" class="mainlabel"><?=@text('License')?>:</label>
			<input type="text" name="license" id="field_license" value="<?=$opportunity->license?>" /><br/>
			
			<label for="field_police_check" class="mainlabel"><?=@text('Police Check')?>:</label>
			<input type="text" name="police_check" id="field_police_check" value="<?=$opportunity->police_check?>" /><br/>
			
			<label for="field_min_age" class="mainlabel"><?=@text('Min Age')?>:</label>
			<input type="text" name="min_age" id="field_min_age" value="<?=$opportunity->min_age?>" /><br/>
			
			<label for="field_other" class="mainlabel"><?=@text('Other')?>:</label>
			<input type="text" name="other" id="field_other" value="<?=$opportunity->other?>" /><br/>
		<?= $pane->endPanel()?>
		<?= $pane->endPane() ?>
	</div>	
</form>