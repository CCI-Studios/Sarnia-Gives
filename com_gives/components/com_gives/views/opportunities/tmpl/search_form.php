<? defined('KOOWA') or die; ?>

<form action="<?= @route('') ?>" method="get">
	<input type="hidden" name="layout" value="default">

	<div><div>
		<h2>Interests</h2>
		<?= @helper('select.interests', array('select_all'=>true)) ?>
	</div></div>

	<div><div>
		<h2>Skills</h2>
		<?= @helper('select.skills', array('select_all'=>true)) ?>
	</div></div>

	<div><div>
		<h2>Locations</h2>
		<?= @helper('select.locations', array('select_all'=>true)) ?>
	</div></div>

	<p><input type="submit" value="Search" /></p>
</form>