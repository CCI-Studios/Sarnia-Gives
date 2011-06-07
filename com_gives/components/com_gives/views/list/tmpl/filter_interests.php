<? defined('KOOWA') or die; ?>

<form action="<?= @route() ?>" method="get">
	<?= @helper('site::com.gives.template.helper.listbox.interests', array()) ?>
</form>