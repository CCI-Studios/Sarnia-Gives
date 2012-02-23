<?= @helper('behavior.mootools') ?>
<?= @helper('behavior.validator') ?>
<script src="media://lib_koowa/js/koowa.js" />
<script>
Form.Validator.addAllThese([
    ['validate-required-check', {
        errorMsg: function(element, props){
            return props.useTitle ? element.get('title') : Form.Validator.getMsg('requiredChk');
        },
        test: function(element, props){
            return !!element.checked;
        }
    }]
]);
</script>


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
        I hereby authorize verification of all statements herein and release Sarnia Gives and all others from liability in connection with the same.<br/>
        I give Sarnia Gives permission to share the information provided with potential volunteers for the purpose of volunteer matching.
        <div class="label">
            <label for="field_auth">
                Accept
                <input type="checkbox" name="auth" id="field_auth" class="validate-required-check" title="This is required" />
            </label>
        </div>
    </div>

    <div>
        By clicking "Create Account" the above organization claims responsibility to make the payment of the annual membership fee of $130.
        <div class="label">
            <label for="field_pay">
                Accept
                <input type="checkbox" name="pay" id="field_pay" class="validate-required-check" />
            </label>
        </div>
    </div>
    
    <div>
    	<div class="label">&nbsp;</div>
    	<div class="input"><input type="submit" value="Create Account" /></div>
    </div>   
</form>
</div>
