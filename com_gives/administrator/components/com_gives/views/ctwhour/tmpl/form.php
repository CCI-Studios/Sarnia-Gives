<? defined('KOOWA') or die; ?>
<?= @helper('behavior.mootools'); ?>
<script src="media://lib_koowa/js/koowa.js" />
<style src="media://com_default/css/form.css" />
<style src="media://com_gives/css/admin.css" />

<form action="<?=@route('id='.$ctwhour->id)?>" method="post" class="-koowa-form" id="mainform">
	<label for="field_first_name" class="mainlabel"><?=@text('First Name')?></label>
	<input type="text" name="first_name" id="field_first_name" value="<?=$ctwhour->first_name?>"  /><br/>

	<label for="field_last_name" class="mainlabel"><?=@text('Last Name')?></label>
	<input type="text" name="last_name" id="field_last_name" value="<?=$ctwhour->last_name?>"  /><br/>

	<label for="field_address1" class="mainlabel"><?=@text('Address1')?></label>
	<input type="text" name="address1" id="field_address1" value="<?=$ctwhour->address1?>"  /><br/>

	<label for="field_address2" class="mainlabel"><?=@text('Address2')?></label>
	<input type="text" name="address2" id="field_address2" value="<?=$ctwhour->address2?>" /><br/>

	<label for="field_city" class="mainlabel"><?=@text('City')?></label>
	<input type="text" name="city" id="field_city" value="<?=$ctwhour->city?>"  /><br/>
	
	<label for="field_postal_code" class="mainlabel"><?=@text('Postal Code')?></label>
	<input type="text" name="postal_code" id="field_postal_code" value="<?=$ctwhour->postal_code?>"  /><br/>
	
	<label for="field_phone" class="mainlabel"><?=@text('Phone')?></label>
	<input type="text" name="phone" id="field_phone" value="<?=$ctwhour->phone?>"  /><br/>
	
	<label for="field_email" class="mainlabel"><?=@text('Email')?></label>
	<input type="email" name="email" id="field_email" value="<?=$ctwhour->email?>"  /><br/>
	
	<label for="field_organization" class="mainlabel"><?=@text('Organization')?></label>
	<input type="text" name="organization" id="field_organization" value="<?=$ctwhour->organization?>"  /><br/>

	<label for="field_hours" class="mainlabel"><?=@text('Hours')?></label>
	<input type="text" name="hours" id="field_hours" value="<?=$ctwhour->hours?>"  /><br/>

	<label for="field_date_added" class="mainlabel"><?=@text('Date Added')?></label>
	<input type="text" disabled name="date_added_disabled" value="<?=date('Y-m-d H:s')?>" />
</form>