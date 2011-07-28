<?= @helper('behavior.mootools') ?>
<?= @helper('behavior.validator') ?>
<script src="media://lib_koowa/js/koowa.js" />

<h1 class="componentheading">
    <?= @text('Agency Registration'); ?>
</h1>

<? if ($description) {
	echo $description;
} ?>

<div style="margin: 1em 0;">
<form action="<?= @route('id='.$organization->id) ?>" method="post" class="-koowa-form">
    <input type="hidden" name="action" value="save" />
    
	<dl>
        <dt><label for="title_field"><?= @text('Organization Name') ?>:</label></dt>
        <dd><input class="required" type="text" name="title" id="title_field" value="<?= $organization->title ?>" /></dd>
    </dl>

    <dl>
        <dt><label for="fname_field"><?= @text('Name') ?>:</label></dt>
        <dd><input class="required" type="text" name="contact" id="fname_field" value="<?= $organization->first_name?>" /></dd>
    </dl>
    
    <dl>
        <dt><label for="email_field"><?= @text('Email Address') ?>:</label></dt>
        <dd><input class="required validate-email" type="text" name="email" id="email_field" value="<?= $organization->email ?>" /></dd>
    </dl>
    
    <dl>
        <dt><label for="password_field"><?= @text('Password') ?>:</label></dt>
        <dd><input class="required" type="password" name="password" id="password_field" value="" /></dd>
    </dl>
    
    <dl>
        <dt><label for="confirmation_field"><?= @text('Password confirmation') ?>:</label></dt>
        <dd><input class="required" type="password" name="confirmation" id="confirmation_field" value="" /></dd>
    </dl>
    
    <dl>
        <dt>&nbsp;</dt>
        <dd><input type="submit" value="Create Account" /></dd>
    </dl>    
</form>
</div>
