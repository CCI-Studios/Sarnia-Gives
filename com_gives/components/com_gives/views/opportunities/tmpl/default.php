<h1 class="componentheading">Opportunities</h1>



<? if (count($opportunities)): ?>
	<?= @template('search_results', array(
		'opportunities'	=> $opportunities
	)) ?>

	<p>Looking for more options? Check out the results below:</p>
<? else: ?>
	<p>No opportunities were found that exactly match your search. Check out the results below for ones that are close.</p>
<? endif; ?>

<h2 class="renameme"><a href="#">
	Opportunities Matching Your Interests and Skills (2 matches) 
	<img src="media://com_gives/images/open.jpg" alt="Open"  />
</a></h2>
<?= @template('search_results', array(
	'opportunities'	=> KFactory::tmp('site::com.gives.model.opportunity')
						//->set('fuzzy', true)
						->getList()
)) ?>
<p style="margin-top: 2em;"><a href="<?= @route('layout=search') ?>">Click here</a> to start a new Search.<br/>
	<a href="#">Click here</a> to do a Map Search.</p><h2 class="renameme">Opportunities Matching Your Interests and Locations</h2>
<h2 class="renameme">Opportunities Matching Your Interests and Locations</h2>
<h2 class="renameme">Opportunities Matching Your Skills and Locations</h2>
<h2 class="renameme">Opportunities Matching Your Interests</h2>
<h2 class="renameme">Opportunities Matching Your Skills</h2>
<h2 class="renameme">Opportunities Matching Your Locations</h2>
