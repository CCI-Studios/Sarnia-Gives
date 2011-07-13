<? defined('KOOWA') or die; ?>

<ul style="border: 1px solid black; padding: 5px; background: ; list-style: none;">
	<? foreach ($opportunities as $opportunity): ?>
	<li style="border: 1px solid black; padding: 0 0 5px 2em;">
		<div class="logo" style="float: left; margin: 5px 5px 5px 0;">
			<img src="http://dummyimage.com/40x40/000/585858&text=+" />
		</div>
		
		<div style="float: left;">
			Organization title<br/>
			<span style="font-weight: 500;"><?= $opportunity->title; ?></span>
		</div>
		
		<div class="" style="float: right;">
			<a style="display: block; padding: 0 5px; background-color: #77cc77;" href="<?= @route('view=opportunity&id='. $opportunity->id) ?>">
				View More Details
			</a>
		</div>

		<div class="clear"></div>
	</li>
	<? endforeach; ?>
</ul>
