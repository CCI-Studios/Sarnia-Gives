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


<form id="mapsearch">
	<label><?= @text('Address') ?>:</label>
	<input type="text" name="address" /><br/>
	
	<label><?= @text('Distance') ?>:</label>
	<input type="text" name="distance" /><br/>
</form>
	
<div id="mapview"><div>
</div></div>

<div id="mapresults"><div>
	<?= KFactory::tmp('site::com.gives.controller.opportunity')
			->layout('search_results')
			->limit(5)
			->display(); ?>
</div></div>