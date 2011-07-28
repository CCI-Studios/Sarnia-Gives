<?= @helper('behavior.mootools') ?>
<?= @helper('behavior.validator') ?>
<script src="media://lib_koowa/js/koowa.js" />

<h1 class="componentheading">
    <?= @text('Volunteer Registration')?>
</h1>

<? if ($description) {
	echo $description;
} ?>

<div style="margin: 1em 0;">
<form action="<?= @route('id='.$volunteer->id) ?>" method="post" class="-koowa-form">
    <input type="hidden" name="action" value="save" />
   
	<?= @helper('form.text', array('name'=>'first_name', 'value'=>$volunteer->first_name, 'klass'=>'required'))?>
	<?= @helper('form.text', array('name'=>'last_name', 'value'=>$volunteer->last_name, 'klass'=>'required'))?>
    <?= @helper('form.text', array('name'=>'email', 'title'=>'Email Address', 'value'=> $volunteer->email, 'klass'=>'required validate-email'))?>
    <?= @helper('form.password', array('klass'=>'required'))?>
	<?= @helper('form.password', array('name'=>'confirmation', '_title'=>'Password Confirmation', 'klass'=>'required'))?>
	<?= @helper('form.submit', array())?>
    
</form>
</div>
