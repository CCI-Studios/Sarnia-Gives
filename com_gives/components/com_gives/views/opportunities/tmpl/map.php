<? defined('KOOWA') or die; ?>
<?= @helper('behavior.mootools'); ?>
<script src="http://maps.google.com/maps/api/js?sensor=false" />
<script src="media://com_gives/js/map.js" />
<style src="media://com_gives/css/site.css" />

<? if ($params->get('show_page_title')): ?>
<h1 class="componentheading">
	<?= $params->get('page_title') ?>
</h1>
<? endif; ?>

<p>Enter a address and maximum distance to find opportunities near you.</p>

<form action="<?= @route() ?>" method="get" id="mapsearch">
	<label><?= @text('Address') ?>:</label>
	<input type="text" name="address" value="<?= $address; ?>" /><br/>
	
	<label><?= @text('Distance') ?>:</label>
	<input type="text" name="distance" value="<?= $distance; ?>" /><br/>
	
	<input type="submit" />
</form>
	
<div id="mapview"><div></div></div>

<div id="mapresults">
	<? if ($distance && $address) {
		echo @template('search_results');
	} else {
	
	} ?>
</div>