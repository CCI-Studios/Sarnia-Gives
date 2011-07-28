<? defined('KOOWA') or die; ?>

<script>
window.addEvent('domready', function () {
	var form = $('criteria-search-form');

	form.addEvent('submit', function (event) {
		var interests = false, 
			skills = false, 
			locations = false;

		form.getElements('input[name="interests[]"]').each(function (box) {
			if (box.checked) {
				console.log(box.value + ' was checked');
				interests = true;
			}
		});

		form.getElements('input[name="skills[]"]').each(function (box) {
			if (box.checked) {
				console.log(box.value + ' was checked');
				skills = true;
			}
		});

		form.getElements('input[name="locations[]"]').each(function (box) {
			if (box.checked) {
				console.log(box.value + ' was checked');
				locations = true;
			}
		});

		if (!(interests && skills && locations)) {
			alert('Please make a selection for all sections.');
		}

		return (interests && skills && locations);
	});
});
</script>

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