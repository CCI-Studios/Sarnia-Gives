<? defined('KOOWA') or die; ?>

<form action="<?= @route() ?>" method="get">
	<?= @helper('com://site/gives.template.helper.listbox.interests', array()) ?>
</form>