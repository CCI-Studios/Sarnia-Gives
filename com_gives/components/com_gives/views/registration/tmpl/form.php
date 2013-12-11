<?= @helper('behavior.mootools') ?>
<script src="media://lib_koowa/js/koowa.js" />

<h1 class="componentheading">
	Register for Event
</h1>

<form action="<?= @route('id='.$registration->id) ?>" method="post" class="-koowa-form">
	<label for="field_name" class="mainlabel"><?=@text('Name')?>:</label>
	<input type="text" name="name" id="field_name" value="<?=$registration->name?>" /><br/>
	
	<label for="field_email" class="mainlabel"><?=@text('Email')?>:</label>
	<input type="email" name="email" id="field_email" value="<?=$registration->email?>" /><br/>

	<input type="hidden" name="gives_event_id" value="<?php print $_GET['event_id']; ?>" />

	<input type="submit" value="Register" />
</form>