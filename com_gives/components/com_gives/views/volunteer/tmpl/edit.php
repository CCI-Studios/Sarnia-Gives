<style src="media://com_gives/css/sites.css" />

<div class="com_gives">
	<h1>Edit Your Profile</h1>
	
	<p>Update your search settings below:</p>

	<form action="<?= @route('id='.$volunteer->id)?>" method="post">
		<input type="hidden" name="action" value="save" />
	
		<?= @helper('tabs.startPane') ?>
			<?= @helper('tabs.startPanel', array('title'=>'Interests')) ?>
				<?= @helper('select.interests')?>
			<?= @helper('tabs.endPanel') ?>

			<?= @helper('tabs.startPanel', array('title'=>'Skills')) ?>
				<?= @helper('select.skills')?>
			<?= @helper('tabs.endPanel') ?>

			<?= @helper('tabs.startPanel', array('title'=>'Locations')) ?>
				<?= @helper('select.locations')?>
			<?= @helper('tabs.endPanel') ?>
		<?= @helper('tabs.endPane')?>

		<p><input type="submit" value="Save" /></p>
	</form>
</div>