<style src="media://com_gives/css/site.css" />

<h1 class="componentheading">Opportunities</h1>

<? if (count($opportunities)): ?>
	<?= @template('search_results', array(
		'opportunities'	=> $opportunities
	)) ?>

	<p>Looking for more options? Check out the results below:</p>
<? else: ?>
	<p>No opportunities were found that match all of your search preferences. Check out the results below for opportunities that match one or two of your criteria.</p>
<? endif; ?>

<script>
window.addEvent('domready', function() {
	var alternatives = $$('.alternatives');
	
	alternatives.each(function (alt) {
		var headings;
		
		headings = alt.getElements('.heading');
		headings.each(function (heading) {
			var body, slide;
			
			body = heading.getNext();
			slide = new Fx.Slide(body, {
				
			});
			slide.hide();
			heading.addEvent('click', function () {
				heading.toggleClass('close');
				slide.toggle();
			});
		});
	});
});
</script>

<ul class="alternatives">
	<li>
		<div class="heading">Opportunities Matching Your Interests and Skills (<?= count($opps_is) ?> matches)</div>
		<div class="body">
			<?= @template('search_results', array('opportunities' => $opps_is)) ?>
			<div style="height: 1px;"></div>
		</div>
	</li>
	<li>
		<div class="heading">Opportunities Matching Your Interests and Locations (<?= count($opps_il) ?> matches)</div>
		<div class="body">
			<?= @template('search_results', array('opportunities' => $opps_il)) ?>
			<div style="height: 1px;"></div>
		</div>
	</li>
	<li>
		<div class="heading">Opportunities Matching Your Skills and Locations (<?= count($opps_sl) ?> matches)</div>
		<div class="body">
			<?= @template('search_results', array('opportunities' => $opps_sl)) ?>
			<div style="height: 1px;"></div>
		</div>
	</li>
	<li>
		<div class="heading">Opportunities Matching Your Interests (<?= count($opps_i) ?> matches)</div>
		<div class="body">
			<?= @template('search_results', array('opportunities' => $opps_i)) ?>
			<div style="height: 1px;"></div>
		</div>
	</li>
	<li>
		<div class="heading">Opportunities Matching Your Skills (<?= count($opps_s) ?> matches)</div>
		<div class="body">
			<?= @template('search_results', array('opportunities' => $opps_s)) ?>
			<div style="height: 1px;"></div>
		</div>
	</li>
	<li>
		<div class="heading">Opportunities Matching Your Locations (<?= count($opps_l) ?> matches)</div>
		<div class="body">
			<?= @template('search_results', array('opportunities' => $opps_l)) ?>
			<div style="height: 1px;"></div>
		</div>
	</li>
</ul>

<p>Still unable to find what you are looking for?<br/>
	<a href="<?= @route('layout=search') ?>">Click here</a> to start a new Search or <a href="<?= @route('view=opportunities&layout=map') ?>">click here</a> to do a Map Search.</p>