<? defined('KOOWA') or die; ?>
<script src="media://lib_koowa/js/koowa.js" />
<style src="media://com_default/css/form.css" />

<form action="<?=@route('id='.$volunteer->id)?>" method="post" class="adminform" name="adminForm" id="mainform">
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
			<input type="checkbox" name="required" id="field_required" value="<?=$volunteer->required?>" /><br/>
			
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
		
		<?= $pane->startPanel('Location', 'location-pane')?>
			<label for="field_brooke_alvinston" class="mainlabel"><?=@text('Brooke-Alvinston')?>:</label>
			<input type="text" name="brooke_alvinston" id="field_brooke_alvinston" value="<?=$volunteer->brooke_alvinston?>" /><br/>
			
			<label for="field_lambton_shores" class="mainlabel"><?=@text('Lambton Shores')?>:</label>
			<input type="text" name="lambton_shores" id="field_lambton_shores" value="<?=$volunteer->lambton_shores?>" /><br/>
			
			<label for="field_point_edward" class="mainlabel"><?=@text('Point Edward')?>:</label>
			<input type="text" name="point_edward" id="field_point_edward" value="<?=$volunteer->point_edward?>" /><br/>
			
			<label for="field_sarnia" class="mainlabel"><?=@text('Sarnia')?>:</label>
			<input type="text" name="sarnia" id="field_sarnia" value="<?=$volunteer->sarnia?>" /><br/>
			
			<label for="field_dawn_euphemia" class="mainlabel"><?=@text('Dawn-Euphemia')?>:</label>
			<input type="text" name="dawn_euphemia" id="field_dawn_euphemia" value="<?=$volunteer->dawn_euphemia?>" /><br/>
			
			<label for="field_oil_springs" class="mainlabel"><?=@text('Oil Springs')?>:</label>
			<input type="text" name="oil_springs" id="field_oil_springs" value="<?=$volunteer->oil_springs?>" /><br/>
			
			<label for="field_plympton_wyoming" class="mainlabel"><?=@text('Plympton Wyoming')?>:</label>
			<input type="text" name="plympton_wyoming" id="field_plympton_wyoming" value="<?=$volunteer->plympton_wyoming?>" /><br/>
			
			<label for="field_enniskillen" class="mainlabel"><?=@text('Enniskillen')?>:</label>
			<input type="text" name="enniskillen" id="field_enniskillen" value="<?=$volunteer->enniskillen?>" /><br/>
			
			<label for="field_petrolia" class="mainlabel"><?=@text('Petrolia')?>:</label>
			<input type="text" name="petrolia" id="field_petrolia" value="<?=$volunteer->petrolia?>" /><br/>
			
			<label for="field_st_clair" class="mainlabel"><?=@text('St. Clair')?>:</label>
			<input type="text" name="st_clair" id="field_st_clair" value="<?=$volunteer->st_clair?>" /><br/>
			
			<label for="field_location_flexible" class="mainlabel"><?=@text('Location Flexible')?>:</label>
			<input type="checkbox" name="location_flexible" id="field_location_flexible" value="<?=$volunteer->location_flexible?>" /><br/>
		<?= $pane->endPanel() ?>
		
		<?= $pane->startPanel('Areas of Interest', 'interests-pane') ?>
			<label for="field_animals" class="mainlabel"><?=@text('Animals/Animal Services')?>:</label>
			<input type="text" name="animals" id="field_animals" value="<?=$volunteer->animals?>" /><br/>
			
			<label for="field_community" class="mainlabel"><?=@text('Community Development')?>:</label>
			<input type="text" name="community" id="field_community" value="<?=$volunteer->community?>" /><br/>
			
			<label for="field_health" class="mainlabel"><?=@text('Health & Wellness')?>:</label>
			<input type="text" name="health" id="field_health" value="<?=$volunteer->health?>" /><br/>
			
			<label for="field_arts" class="mainlabel"><?=@text('Arts & Culture')?>:</label>
			<input type="text" name="arts" id="field_arts" value="<?=$volunteer->arts?>" /><br/>
			
			<label for="field_emergency" class="mainlabel"><?=@text('Emergency/Crisis Services')?>:</label>
			<input type="text" name="emergency" id="field_emergency" value="<?=$volunteer->emergency?>" /><br/>
			
			<label for="field_social_services" class="mainlabel"><?=@text('Social Services & Justice')?>:</label>
			<input type="text" name="social_services" id="field_social_services" value="<?=$volunteer->social_services?>" /><br/>
			
			<label for="field_children" class="mainlabel"><?=@text('Children & Youth')?>:</label>
			<input type="text" name="children" id="field_children" value="<?=$volunteer->children?>" /><br/>
			
			<label for="field_environment" class="mainlabel"><?=@text('Environment')?>:</label>
			<input type="text" name="environment" id="field_environment" value="<?=$volunteer->environment?>" /><br/>
			
			<label for="field_special_events" class="mainlabel"><?=@text('Special Events')?>:</label>
			<input type="text" name="special_events" id="field_special_events" value="<?=$volunteer->special_events?>" /><br/>
		<?= $pane->endPanel() ?>
		
		<?= $pane->startPanel('Skills', 'skills-pane') ?>
			<label for="field_accounting" class="mainlabel"><?=@text('Accounting')?>:</label>
			<input type="text" name="accounting" id="field_accounting" value="<?=$volunteer->accounting?>" /><br/>
			
			<label for="field_coaching" class="mainlabel"><?=@text('Coaching')?>:</label>
			<input type="text" name="coaching" id="field_coaching" value="<?=$volunteer->coaching?>" /><br/>
			
			<label for="field_event_coordination" class="mainlabel"><?=@text('Event Coordination')?>:</label>
			<input type="text" name="event_coordination" id="field_event_coordination" value="<?=$volunteer->event_coordination?>" /><br/>
			
			<label for="field_it" class="mainlabel"><?=@text('IT')?>:</label>
			<input type="text" name="it" id="field_it" value="<?=$volunteer->it?>" /><br/>
			
			<label for="field_marketing" class="mainlabel"><?=@text('Marketing & Communications')?>:</label>
			<input type="text" name="marketing" id="field_marketing" value="<?=$volunteer->marketing?>" /><br/>
			
			<label for="field_outreach" class="mainlabel"><?=@text('Outreach')?>:</label>
			<input type="text" name="outreach" id="field_outreach" value="<?=$volunteer->outreach?>" /><br/>
			
			<label for="field_translation" class="mainlabel"><?=@text('Translation')?>:</label>
			<input type="text" name="translation" id="field_translation" value="<?=$volunteer->translation?>" /><br/>
			
			<label for="field_bilingual" class="mainlabel"><?=@text('Bilingual (Eng/Fr)')?>:</label>
			<input type="text" name="bilingual" id="field_bilingual" value="<?=$volunteer->bilingual?>" /><br/>
			
			<label for="field_counseling" class="mainlabel"><?=@text('Counseling')?>:</label>
			<input type="text" name="counseling" id="field_counseling" value="<?=$volunteer->counseling?>" /><br/>
			
			<label for="field_fundraising" class="mainlabel"><?=@text('Fundraising')?>:</label>
			<input type="text" name="fundraising" id="field_fundraising" value="<?=$volunteer->fundraising?>" /><br/>
			
			<label for="field_legal" class="mainlabel"><?=@text('Legal')?>:</label>
			<input type="text" name="legal" id="field_legal" value="<?=$volunteer->legal?>" /><br/>
			
			<label for="field_medical" class="mainlabel"><?=@text('Medical Assistance')?>:</label>
			<input type="text" name="medical" id="field_medical" value="<?=$volunteer->medical?>" /><br/>
			
			<label for="field_pr" class="mainlabel"><?=@text('PR')?>:</label>
			<input type="text" name="pr" id="field_pr" value="<?=$volunteer->pr?>" /><br/>
			
			<label for="field_writing" class="mainlabel"><?=@text('Writing & Research')?>:</label>
			<input type="text" name="writing" id="field_writing" value="<?=$volunteer->writing?>" /><br/>
			
			<label for="field_board_work" class="mainlabel"><?=@text('Board Work')?>:</label>
			<input type="text" name="board_work" id="field_board_work" value="<?=$volunteer->board_work?>" /><br/>
			
			<label for="field_crisis" class="mainlabel"><?=@text('Crisis Intervention')?>:</label>
			<input type="text" name="crisis" id="field_crisis" value="<?=$volunteer->crisis?>" /><br/>
			
			<label for="field_administration" class="mainlabel"><?=@text('General Administration')?>:</label>
			<input type="text" name="administration" id="field_administration" value="<?=$volunteer->administration?>" /><br/>
			
			<label for="field_management" class="mainlabel"><?=@text('Management Consulting')?>:</label>
			<input type="text" name="management" id="field_management" value="<?=$volunteer->management?>" /><br/>
			
			<label for="field_mentoring" class="mainlabel"><?=@text('Mentoring & Training')?>:</label>
			<input type="text" name="mentoring" id="field_mentoring" value="<?=$volunteer->mentoring?>" /><br/>
			
			<label for="field_sports" class="mainlabel"><?=@text('Sports & Recreation')?>:</label>
			<input type="text" name="sports" id="field_sports" value="<?=$volunteer->sports?>" /><br/>
			
			<label for="field_other" class="mainlabel"><?=@text('Other')?>:</label>
			<input type="text" name="other" id="field_other" value="<?=$volunteer->other?>" /><br/>
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
			<input type="text" name="newsletter" id="field_newsletter" value="<?=$volunteer->newsletter?>" /><br/>
			
			<label for="field_search" class="mainlabel"><?=@text('Include in Search')?>:</label>
			<input type="text" name="search" id="field_search" value="<?=$volunteer->search?>" /><br/>
		<?= $pane->endPanel() ?>
		<?= $pane->endPane() ?>
	</div>	
</form>