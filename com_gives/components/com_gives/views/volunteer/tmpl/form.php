<?= @helper('behavior.mootools') ?>
<?= @helper('behavior.validator') ?>
<script src="media://lib_koowa/js/koowa.js" />

<h1 class="componentheading">
    <?= @text('Volunteer Registration')?>
</h1>

<? if (isset($description)) {
	echo $description;
}

if (isset($_GET['ctw']))
{
	$_SESSION['ctw'] = true;
}
else 
{
	unset($_SESSION['ctw']);
}
 ?>

<p>Please note, your Email Address will be used for your Username.</p>

<div style="margin: 1em 0;">
<form action="<?= @route('id='.$volunteer->id) ?>" method="post" class="-koowa-form">
    <input type="hidden" name="action" value="save" />
   
	<?= @helper('form.text', array('name'=>'first_name', 'value'=>$volunteer->first_name, 'klass'=>'required'))?>
	<?= @helper('form.text', array('name'=>'last_name', 'value'=>$volunteer->last_name, 'klass'=>'required'))?>
    <?= @helper('form.text', array('name'=>'email', '_title'=>'Email Address', 'value'=> $volunteer->email, 'klass'=>'required validate-email'))?>
    <?= @helper('form.password', array('klass'=>'required'))?>
	<?= @helper('form.password', array('name'=>'confirmation', '_title'=>'Password Confirmation', 'klass'=>'required'))?>
	<?= @helper('form.submit', array())?>
    
</form>
</div>
