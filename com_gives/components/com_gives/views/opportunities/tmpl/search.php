<style src="media://com_gives/css/site.css" />

<div class="com_gives">
	<h1><?= @text('Criteria Search') ?></h1>

	<?= $params->get('description') ?>

	<?= @template('search_form')?>
</div>