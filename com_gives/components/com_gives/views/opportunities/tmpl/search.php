<style src="media://com_gives/css/site.css" />

<div class="com_gives">
	<h1><?= @text('Search for Opportunities') ?></h1>

	<?= $params->get('description') ?>

	<form action="<?= @route('') ?>" method="get">
		<input type="hidden" name="layout" value="default">

		<div><div>
			<h2>Interests</h2>
			<?= @helper('listbox.interests') ?>
		</div></div>

		<div><div>
			<h2>Skills</h2>
			<?= @helper('listbox.skills') ?>
		</div></div>

		<div><div>
			<h2>Locations</h2>
			<?= @helper('listbox.locations') ?>
		</div></div>

		<p><input type="submit" value="Search" /></p>
	</form>
</div>