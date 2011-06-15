edit profile

<form action="<?= @route('view=volunteer&id='.$volunteer->id)?>" method="post">
	
	<?= @helper('form.text', array('name'=>'email'))?>
	
</form>