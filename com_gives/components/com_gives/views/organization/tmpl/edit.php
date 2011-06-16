<style src="media://com_gives/css/sites.css" />

<div class="com_gives">
	<h1>Edit Your Profile</h1>
	
	<p>Update your search settings below:</p>

	<form action="<?= @route('id='.$organization->id)?>" method="post">
		<input type="hidden" name="action" value="save" />
	
		<h2>Your Interests</h2>
		<?= @helper('listbox.interests')?>
		
		<h2>Your Skills</h2>
		<?= @helper('listbox.skills')?>
		
		<h2>Your Locations</h2>
		<?= @helper('listbox.locations')?>
	
	
		<p><input type="submit" value="Save" /></p>
	</form>
</div>