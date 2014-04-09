<?= @helper('behavior.mootools') ?>
<script src="media://lib_koowa/js/koowa.js" />

<h1 class="componentheading">
	Change the World
</h1>

<?php
$user = JFactory::getUser();
if ($user->guest)
{
	print '<p>You must be logged in to submit your volunteer hours.</p>
	<p><a href="/login.html" style="display:inline-block;padding:12px;color:white;background:#7f3f98;text-transform:uppercase;text-decoration:none;">Login</a> or <a href="/component/gives/?view=volunteer&layout=form&Itemid=13&ctw=1" style="display:inline-block;padding:12px;color:white;background:#7f3f98;text-transform:uppercase;text-decoration:none;">Register</a></p>';
}
else
{
	$user_id = $user->id;
	$email = $user->email;
	$volunteer = $this->getService('com://site/gives.model.volunteers')->getMe();
	$first_name = $volunteer->first_name;
	$last_name = $volunteer->last_name;
?>


<form action="<?= @route('id='.$ctwhour->id) ?>" method="post" class="-koowa-form" id="ctwhour">
	<div class="left">
		<label for="field_address1" class="mainlabel"><?=@text('Address')?></label>
		<input type="text" name="address1" id="field_address1" value="<?=$ctwhour->address1?>" required /><br/>
		<input type="text" name="address2" id="field_address2" value="<?=$ctwhour->address2?>" /><br/>
	</div>
	
	<div class="left">
		<label for="field_city" class="mainlabel"><?=@text('City')?></label>
		<input type="text" name="city" id="field_city" value="<?=$ctwhour->city?>" required /><br/>
	</div>
	
	<label for="field_postal_code" class="mainlabel"><?=@text('Postal Code')?></label>
	<input type="text" name="postal_code" id="field_postal_code" value="<?=$ctwhour->postal_code?>" required /><br/>
	
	<label for="field_phone" class="mainlabel"><?=@text('Phone')?></label>
	<input type="text" name="phone" id="field_phone" value="<?=$ctwhour->phone?>" required /><br/>

	<hr />
	
	<label for="field_organization" class="mainlabel"><?=@text('Where did you volunteer')?></label>
	<input type="text" name="organization" id="field_organization" value="<?=$ctwhour->organization?>" required /><br/>
	
	<hr />

	<label for="field_hours" class="mainlabel"><?=@text('Hours')?></label>
	<input type="text" name="hours" id="field_hours" value="<?=$ctwhour->hours?>" required /><br/>

	<input type="hidden" name="first_name" value="<?=$first_name?>" />
	<input type="hidden" name="last_name" value="<?=$last_name?>" />
	<input type="hidden" name="email" value="<?=$email?>" />
	<input type="hidden" name="user_id" value="<?=$user_id?>" />
	<input type="hidden" name="date_added" value="<?=date('Y-m-d H:s')?>" />

	<button type="submit">Log hours</button>
</form>

<?php
}
?>