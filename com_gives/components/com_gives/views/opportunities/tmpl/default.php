<h1 class="componentheading">Opportunities</h1>

<p>Do another <a href="<?= @route('view=opportunities&layout=search') ?>">search</a>, or look on the <a href="#">map</a>.</p>

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