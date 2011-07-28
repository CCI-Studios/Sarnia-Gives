<?= @helper('behavior.mootools') ?>
<?= @helper('behavior.validator') ?>
<script src="media://lib_koowa/js/koowa.js" />

<h1 class="componentheading">
    <?= @text('Organization Registration'); ?>
</h1>

<? if (isset($description)) {
	echo $description;
} ?>

<p>Please note, your Email Address will be used for your Username.</p>

<div style="margin: 1em 0;">
<form action="<?= @route('id='.$organization->id) ?>" method="post" class="-koowa-form">
    <input type="hidden" name="action" value="save" />
    
	<div>
        <div class="label"><label for="title_field"><?= @text('Organization Name') ?>:</label></div>
        <div class="input"><input class="required" type="text" name="title" id="title_field" value="<?= $organization->title ?>" /></div>
	</div>

    <div>
    	<div class="label"><label for="fname_field"><?= @text('Name') ?>:</label></div>
        <div class="input"><input class="required" type="text" name="contact" id="fname_field" value="<?= $organization->first_name?>" /></div>
    </div>
    
    <div>
    	<div class="label"><label for="email_field"><?= @text('Email Address') ?>:</label></div>
       	<div class="input"><input class="required validate-email" type="text" name="email" id="email_field" value="<?= $organization->email ?>" /></div>
	</div>

	<div>
		<div class="label"><label for="password_field"><?= @text('Password') ?>:</label></div>
		<div class="input"><input class="required" type="password" name="password" id="password_field" value="" /></div>
	</div>
    
    <div>
    	<div class="label"><label for="confirmation_field"><?= @text('Password Confirmation') ?>:</label></div>
    	<div class="input"><input class="required" type="password" name="confirmation" id="confirmation_field" value="" /></div>
    </div>
    
    <div>
    	<div class="label">&nbsp;</div>
    	<div class="input"><input type="submit" value="Create Account" /></div>
    </div>   
</form>
</div>
