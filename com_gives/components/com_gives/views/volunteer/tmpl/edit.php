<?= @helper('behavior.mootools') ?>
<style src="media://com_gives/css/site.css" />

<div class="com_gives">
	<h1>
		Edit Your Profile
		
		<span class="edit">
			<a href="<?= @route('view=volunteer&id='.$volunteer->id) ?>">
				Back
			</a>
		</span>
	</h1>
	
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

			<?= @helper('tabs.startPanel', array('title'=>'Notifications')) ?>
				<?= @helper('select.notification_email')?>
				<?= @helper('select.notification_sms')?>
			<?= @helper('tabs.endPanel') ?>
			
			<?= @helper('tabs.startPanel', array('title'=>'Password')) ?>
				<?= @helper('form.password', array('name'=>'password', '_title'=>'Password')) ?>
				<?= @helper('form.password', array('name'=>'confirm', '_title'=>'Password Confirmation')) ?>
			<?= @helper('tabs.endPanel') ?>
		<?= @helper('tabs.endPane')?>

		<p class="clear right"><input type="submit" value="Save" /></p>
	</form>
</div>