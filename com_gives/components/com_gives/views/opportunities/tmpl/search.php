<style src="media://com_gives/css/site.css" />

<div class="com_gives">
	<h1><?= @text('Search for Opportunities') ?></h1>

	<p>Select your interests below to search for volunteer opportunities. Alternativly, you can seach for locations near you using the <a href="#">map</a>.</p>
	<p><?= $params->get('description')?></p>

	<form action="<?= @route('') ?>" method="get">
		<input type="hidden" name="layout" value="default">

		<div class="box"><div>
			<h2>Interests</h2>
			<?= @helper('listbox.interests') ?>
		</div></div>

		<div class="box"><div>
			<h2>Skills</h2>
			<?= @helper('listbox.skills') ?>
		</div></div>

		<div class="box"><div>
			<h2>Locations</h2>
			<?= @helper('listbox.locations') ?>
		</div></div>

		<?= @helper('form.submit') ?>
	</form>
</div>