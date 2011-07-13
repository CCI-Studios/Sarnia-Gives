<h1 class="componentheading">Opportunities</h1>



<? if (count($opportunities)): ?>
	<?= @template('search_results', array(
		'opportunities'	=> $opportunities
	)) ?>

	<p>Looking for more options? Check out the results below:</p>
<? else: ?>
	<p>No opportunities were found that exactly match your search. Check out the results below for ones that are close.</p>
<? endif; ?>

<?= @template('search_results', array(
	'opportunities'	=> KFactory::tmp('site::com.gives.model.opportunity')
						//->set('fuzzy', true)
						->getList()
)) ?>
<p style="margin-top: 2em;"><a href="<?= @route('layout=search') ?>">Click here</a> to start a new Search.<br/>
	<a href="#">Click here</a> to do a Map Search.</p>