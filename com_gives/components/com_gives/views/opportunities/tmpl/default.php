<h1 class="componentheading">Opportunities</h1>

<? foreach ($opportunities as $opportunity): ?>
	<?= @template('site::com.gives.view.opportunity._item', array('opportunity'=>$opportunity)) ?>
<? endforeach; ?>

<? if (!count($opportunities)): ?>
    <p><?= @text('There are currently no opportunities available.'); ?>
<? endif; ?>