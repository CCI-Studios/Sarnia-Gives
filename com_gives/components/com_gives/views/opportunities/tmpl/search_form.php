<? defined('KOOWA') or die; ?>

<?= @helper('behavior.mootools') ?>
<script src="media://com_gives/js/search.js"></script>

<form action="<?= @route('') ?>" method="get" id="criteria-search-form">
	<input type="hidden" name="layout" value="default">

	<div><div>
		<h2 class="underline">Interests</h2>
		<? if ($user) {
			echo @helper('select.interests', array(
				'select_all'	=> true,
				'selected'		=> $user->interests,
			));
		} else {
			echo @helper('select.interests', array('select_all'=>true));
		} ?>
		<div class="clear"></div>
	</div></div>

	<div><div>
		<h2 class="underline">Skills</h2>
		<? if ($user) {
			echo @helper('select.skills', array(
				'select_all'	=> true,
				'selected'		=> $user->skills,
			));
		} else {
			echo @helper('select.skills', array('select_all'=>true));
		} ?>
		<div class="clear"></div>
	</div></div>

	<div><div>
		<h2 class="underline">Locations</h2>
		<? if ($user) {
			echo @helper('select.locations', array(
				'select_all'	=> true,
				'selected'		=> $user->locations,
			));
		} else {
			echo @helper('select.locations', array('select_all'=>true));
		} ?>
		<div class="clear"></div>
	</div></div>

	<p><input type="submit" value="Search" /></p>
</form>