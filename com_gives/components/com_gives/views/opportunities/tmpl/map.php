<? defined('KOOWA') or die; ?>
<?= @helper('behavior.mootools'); ?>
<script src="http://maps.google.com/maps/api/js?sensor=false" />
<script src="media://com_gives/js/map.js" />
<style src="media://com_gives/css/site.css" />

<? if ($distance && $address): ?>
<script>
window.addEvent('domready', function () {
	var map = new cci.gives.map($('mapview').getElement('div'));
	var list = new cci.gives.list($('mapresults'), map);
});
</script>
<? endif; ?>

<? if ($params->get('show_page_title')): ?>
<h1 class="componentheading">
	<?= $params->get('page_title') ?>
</h1>
<? endif; ?>

<p>Enter a address and maximum distance to find opportunities near you.</p>

<form action="<?= @route() ?>" method="get" id="mapsearch">
	<div>
		<div class="label"><label><?= @text('Address') ?>:</label></div>
		<div class="input"><input type="text" name="address" value="<?= $address; ?>" /></div>
	</div>
	
	<div>
		<div class="label"><label><?= @text('Distance (in km)') ?>:</label></div>
		<div class="input"><input type="text" name="distance" value="<?= $distance; ?>" /></div>
	</div>
	
	<input type="submit" />
</form>
	
	
<? if ($distance && $address): ?>
<div id="mapview"><div></div></div>

<div id="mapresults" style="display: none;">
	<?= @template('widget'); ?>
</div>
<? endif; ?>