<? defined('KOOWA') or die; ?>
<script src="media://lib_koowa/js/koowa.js" />
<style src="media://com_default/css/form.css" />

<form action="<?=@route('id='.$volunteer->id)?>" method="post" class="-koowa-form">
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
			<input type="hidden" name="required" value="0" />
			<input type="checkbox" name="required" id="field_required" value="1" <?= ($volunteer->required)? 'checked="checked"':'';?> /><br/>
			
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
			<input type="hidden" name="brooke_alvinston" value="0" />
			<input type="checkbox" name="brooke_alvinston" id="field_brooke_alvinston" value="1" <?= ($volunteer->brooke_alvinston)? 'checked="checked"':''?> /><br/>
			
			<label for="field_lambton_shores" class="mainlabel"><?=@text('Lambton Shores')?>:</label>
			<input type="hidden" name="lambton_shores" value="0" />
			<input type="checkbox" name="lambton_shores" id="field_lambton_shores" value="1" <?= ($volunteer->lambton_shores)? 'checked="checked"':''?> /><br/>
			
			<label for="field_point_edward" class="mainlabel"><?=@text('Point Edward')?>:</label>
			<input type="hidden" name="point_edward" value="0" />
			<input type="checkbox" name="point_edward" id="field_point_edward" value="1" <?= ($volunteer->point_edward)? 'checked="checked"':''?> /><br/>
			
			<label for="field_sarnia" class="mainlabel"><?=@text('Sarnia')?>:</label>
			<input type="hidden" name="sarnia" value="0" />
			<input type="checkbox" name="sarnia" id="field_sarnia" value="1" <?= ($volunteer->sarnia)? 'checked="checked"':''?> /><br/>
			
			<label for="field_dawn_euphemia" class="mainlabel"><?=@text('Dawn-Euphemia')?>:</label>
			<input type="hidden" name="dawn_euphemia" value="0" />
			<input type="checkbox" name="dawn_euphemia" id="field_dawn_euphemia" value="1" <?= ($volunteer->dawn_euphemia)? 'checked="checked"':''?> /><br/>
			
			<label for="field_oil_springs" class="mainlabel"><?=@text('Oil Springs')?>:</label>
			<input type="hidden" name="oil_springs" value="0" />
			<input type="checkbox" name="oil_springs" id="field_oil_springs" value="1" <?= ($volunteer->oil_springs)? 'checked="checked"':''?> /><br/>
			
			<label for="field_plympton_wyoming" class="mainlabel"><?=@text('Plympton Wyoming')?>:</label>
			<input type="hidden" name="plympton_wyoming" value="0" />
			<input type="checkbox" name="plympton_wyoming" id="field_plympton_wyoming" value="1" <?= ($volunteer->plympton_wyoming)? 'checked="checked"':''?> /><br/>
			
			<label for="field_enniskillen" class="mainlabel"><?=@text('Enniskillen')?>:</label>
			<input type="hidden" name="enniskillen" value="0" />
			<input type="checkbox" name="enniskillen" id="field_enniskillen" value="1" <?= ($volunteer->enniskillen)? 'checked="checked"':''?> /><br/>
			
			<label for="field_petrolia" class="mainlabel"><?=@text('Petrolia')?>:</label>
			<input type="hidden" name="petrolia" value="0" />
			<input type="checkbox" name="petrolia" id="field_petrolia" value="1" <?= ($volunteer->petrolia)? 'checked="checked"':''?> /><br/>
			
			<label for="field_st_clair" class="mainlabel"><?=@text('St. Clair')?>:</label>
			<input type="hidden" name="st_clair" value="0" />
			<input type="checkbox" name="st_clair" id="field_st_clair" value="1" <?= ($volunteer->st_clair)? 'checked="checked"':''?> /><br/>
			
			<label for="field_location_flexible" class="mainlabel"><?=@text('Location Flexible')?>:</label>
			<input type="hidden" name="location_flexible" value="0" />
			<input type="checkbox" name="location_flexible" id="field_location_flexible" value="1" <?= ($volunteer->location_flexible)? 'checked="checked"':'';?> /><br/>
		<?= $pane->endPanel() ?>
		
		<?= $pane->startPanel('Areas of Interest', 'interests-pane') ?>
			<label for="field_animals" class="mainlabel"><?=@text('Animals/Animal Services')?>:</label>
			<input type="hidden" name="animals" value="0" />
			<input type="checkbox" name="animals" id="field_animals" value="1" <?= ($volunteer->animals)? 'checked="checked"':''?> /><br/>
			
			<label for="field_community" class="mainlabel"><?=@text('Community Development')?>:</label>
			<input type="hidden" name="community" value="0" />
			<input type="checkbox" name="community" id="field_community" value="1" <?= ($volunteer->community)? 'checked="checked"':''?> /><br/>
			
			<label for="field_health" class="mainlabel"><?=@text('Health & Wellness')?>:</label>
			<input type="hidden" name="health" value="0" />
			<input type="checkbox" name="health" id="field_health" value="1" <?= ($volunteer->health)? 'checked="checked"':''?> /><br/>
			
			<label for="field_arts" class="mainlabel"><?=@text('Arts & Culture')?>:</label>
			<input type="hidden" name="arts" value="0" />
			<input type="checkbox" name="arts" id="field_arts" value="1" <?= ($volunteer->arts)? 'checked="checked"':''?> /><br/>
			
			<label for="field_emergency" class="mainlabel"><?=@text('Emergency/Crisis Services')?>:</label>
			<input type="hidden" name="emergency" value="0" />
			<input type="checkbox" name="emergency" id="field_emergency" value="1" <?= ($volunteer->emergency)? 'checked="checked"':''?> /><br/>
			
			<label for="field_social_services" class="mainlabel"><?=@text('Social Services & Justice')?>:</label>
			<input type="hidden" name="social_services" value="0" />
			<input type="checkbox" name="social_services" id="field_social_services" value="1" <?= ($volunteer->social_services)? 'checked="checked"':''?> /><br/>
			
			<label for="field_children" class="mainlabel"><?=@text('Children & Youth')?>:</label>
			<input type="hidden" name="children" value="0" />
			<input type="checkbox" name="children" id="field_children" value="1" <?= ($volunteer->children)? 'checked="checked"':''?> /><br/>
			
			<label for="field_environment" class="mainlabel"><?=@text('Environment')?>:</label>
			<input type="hidden" name="environment" value="0" />
			<input type="checkbox" name="environment" id="field_environment" value="1" <?= ($volunteer->environment)? 'checked="checked"':''?> /><br/>
			
			<label for="field_special_events" class="mainlabel"><?=@text('Special Events')?>:</label>
			<input type="hidden" name="special_events" value="0" />
			<input type="checkbox" name="special_events" id="field_special_events" value="1" <?= ($volunteer->special_events)? 'checked="checked"':''?> /><br/>
		<?= $pane->endPanel() ?>
		
		<?= $pane->startPanel('Skills', 'skills-pane') ?>
			<label for="field_accounting" class="mainlabel"><?=@text('Accounting')?>:</label>
			<input type="hidden" name="accounting" value="0" />
			<input type="checkbox" name="accounting" id="field_accounting" value="1" <?= ($volunteer->accounting)? 'checked="checked"':''?> /><br/>
			
			<label for="field_coaching" class="mainlabel"><?=@text('Coaching')?>:</label>
			<input type="hidden" name="coaching" value="0" />
			<input type="checkbox" name="coaching" id="field_coaching" value="1" <?= ($volunteer->coaching)? 'checked="checked"':''?> /><br/>
			
			<label for="field_event_coordination" class="mainlabel"><?=@text('Event Coordination')?>:</label>
			<input type="hidden" name="event_coordination" value="0" />
			<input type="checkbox" name="event_coordination" id="field_event_coordination" value="1" <?= ($volunteer->event_coordination)? 'checked="checked"':''?> /><br/>
			
			<label for="field_it" class="mainlabel"><?=@text('IT')?>:</label>
			<input type="hidden" name="it" value="0" />
			<input type="checkbox" name="it" id="field_it" value="1" <?= ($volunteer->it)? 'checked="checked"':''?> /><br/>
			
			<label for="field_marketing" class="mainlabel"><?=@text('Marketing & Communications')?>:</label>
			<input type="hidden" name="marketing" value="0" />
			<input type="checkbox" name="marketing" id="field_marketing" value="1" <?= ($volunteer->marketing)? 'checked="checked"':''?> /><br/>
			
			<label for="field_outreach" class="mainlabel"><?=@text('Outreach')?>:</label>
			<input type="hidden" name="outreach" value="0" />
			<input type="checkbox" name="outreach" id="field_outreach" value="1" <?= ($volunteer->outreach)? 'checked="checked"':''?> /><br/>
			
			<label for="field_translation" class="mainlabel"><?=@text('Translation')?>:</label>
			<input type="hidden" name="translation" value="0" />
			<input type="checkbox" name="translation" id="field_translation" value="1" <?= ($volunteer->translation)? 'checked="checked"':''?> /><br/>
			
			<label for="field_bilingual" class="mainlabel"><?=@text('Bilingual (Eng/Fr)')?>:</label>
			<input type="hidden" name="bilingual" value="0" />
			<input type="checkbox" name="bilingual" id="field_bilingual" value="1" <?= ($volunteer->bilingual)? 'checked="checked"':''?> /><br/>
			
			<label for="field_counseling" class="mainlabel"><?=@text('Counseling')?>:</label>
			<input type="hidden" name="counseling" value="0" />
			<input type="checkbox" name="counseling" id="field_counseling" value="1" <?= ($volunteer->counseling)? 'checked="checked"':''?> /><br/>
			
			<label for="field_fundraising" class="mainlabel"><?=@text('Fundraising')?>:</label>
			<input type="hidden" name="fundraising" value="0" />
			<input type="checkbox" name="fundraising" id="field_fundraising" value="1" <?= ($volunteer->fundraising)? 'checked="checked"':''?> /><br/>
			
			<label for="field_legal" class="mainlabel"><?=@text('Legal')?>:</label>
			<input type="hidden" name="legal" value="0" />
			<input type="checkbox" name="legal" id="field_legal" value="1" <?= ($volunteer->legal)? 'checked="checked"':''?> /><br/>
			
			<label for="field_medical" class="mainlabel"><?=@text('Medical Assistance')?>:</label>
			<input type="hidden" name="medical" value="0" />
			<input type="checkbox" name="medical" id="field_medical" value="1" <?= ($volunteer->medical)? 'checked="checked"':''?> /><br/>
			
			<label for="field_pr" class="mainlabel"><?=@text('PR')?>:</label>
			<input type="hidden" name="pr" value="0" />
			<input type="checkbox" name="pr" id="field_pr" value="1" <?= ($volunteer->pr)? 'checked="checked"':''?> /><br/>
			
			<label for="field_writing" class="mainlabel"><?=@text('Writing & Research')?>:</label>
			<input type="hidden" name="writing" value="0" />
			<input type="checkbox" name="writing" id="field_writing" value="1" <?= ($volunteer->writing)? 'checked="checked"':''?> /><br/>
			
			<label for="field_board_work" class="mainlabel"><?=@text('Board Work')?>:</label>
			<input type="hidden" name="board_work" value="0" />
			<input type="checkbox" name="board_work" id="field_board_work" value="1" <?= ($volunteer->board_work)? 'checked="checked"':''?> /><br/>
			
			<label for="field_crisis" class="mainlabel"><?=@text('Crisis Intervention')?>:</label>
			<input type="hidden" name="crisis" value="0" />
			<input type="checkbox" name="crisis" id="field_crisis" value="1" <?= ($volunteer->crisis)? 'checked="checked"':''?> /><br/>
			
			<label for="field_administration" class="mainlabel"><?=@text('General Administration')?>:</label>
			<input type="hidden" name="administration" value="0" />
			<input type="checkbox" name="administration" id="field_administration" value="1" <?= ($volunteer->administration)? 'checked="checked"':''?> /><br/>
			
			<label for="field_management" class="mainlabel"><?=@text('Management Consulting')?>:</label>
			<input type="hidden" name="management" value="0" />
			<input type="checkbox" name="management" id="field_management" value="1" <?= ($volunteer->management)? 'checked="checked"':''?> /><br/>
			
			<label for="field_mentoring" class="mainlabel"><?=@text('Mentoring & Training')?>:</label>
			<input type="hidden" name="mentoring" value="0" />
			<input type="checkbox" name="mentoring" id="field_mentoring" value="1" <?= ($volunteer->mentoring)? 'checked="checked"':''?> /><br/>
			
			<label for="field_sports" class="mainlabel"><?=@text('Sports & Recreation')?>:</label>
			<input type="hidden" name="sports" value="0" />
			<input type="checkbox" name="sports" id="field_sports" value="1" <?= ($volunteer->sports)? 'checked="checked"':''?> /><br/>
			
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
			<input type="hidden" name="newsetter" value="0" />
			<input type="checkbox" name="newsletter" id="field_newsletter" value="1" <?= ($volunteer->newsletter)? 'checked="checked"':''?> /><br/>
			
			<label for="field_search" class="mainlabel"><?=@text('Include in Search')?>:</label>
			<input type="hidden" name="search" value="0" />
			<input type="checkbox" name="search" id="field_search" value="1" <?= ($volunteer->search)? 'checked="checked"':''?> /><br/>
			
			<label for="field_user_id" class="mainlabel"><?=@text('User ID')?>:</label>
			<input type="text" name="user_id" id="field_user_id" value="<?=$volunteer->user_id?>" /><br/>
		<?= $pane->endPanel() ?>
		<?= $pane->endPane() ?>
	</div>	
</form>