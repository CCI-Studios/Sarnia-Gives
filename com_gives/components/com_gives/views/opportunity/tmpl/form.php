<?= @helper('behavior.mootools') ?>
<?= @helper('behavior.validator') ?>
<script src="media://lib_koowa/js/koowa.js" />

<h1 class="componentheading">
    <?= @text('Create new Opportunity')?>
</h1>

<div style="margin: 1em 0;">
<form action="<?= @route('id='.$opportunity->id) ?>" method="post" class="-koowa-form">
    <input type="hidden" name="action" value="save" />
	<input type="hidden" name="gives_organization_id" value="<?= KRequest::get('get.org_id', 'int') ?>" />
   
	<?= @helper('form.text', array('name'=>'title', 'value'=>$opportunity->title, 'klass'=>'required'))?>
	<?= @helper('form.text', array('name'=>'start_date', 'value'=>$opportunity->start_date, 'klass'=>'required'))?>
	<?= @helper('form.text', array('name'=>'end_date', 'value'=>$opportunity->end_date, 'klass'=>'required'))?>
	
	<?= @helper('form.text', array('name'=>'address', 'value'=>$opportunity->address, 'klass'=>'required'))?>
	<?= @helper('form.text', array('name'=>'city', 'value'=>$opportunity->city, 'klass'=>'required'))?>
	<?= @helper('form.text', array('name'=>'province', 'value'=>$opportunity->province, 'klass'=>'required'))?>
	<?= @helper('form.text', array('name'=>'postal', 'value'=>$province->password, 'klass'=>'required'))?>
	
	
	<?= @helper('form.submit', array())?>
    
</form>
</div>
