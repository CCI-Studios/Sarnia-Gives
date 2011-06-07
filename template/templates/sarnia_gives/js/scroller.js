jQuery(function ($) {
	var images, left, right, update, current, timeout, spacer, delay, duration, transition;
	delay = 4000;
	duration = 1000;
	spacer = 320;
	transition = 'swing';

	images = $('#scroll .inner').children();
	if (images.length < 4)
		return;
	
	images.each(function (index, image) {
		$(image).css({
			padding: 0,
			position: 'absolute',
			left: (spacer*index)
		});
	});
	
	update = function (amount) {
		clearTimeout(timeout);
		
		prev = current;
		current += amount;
		next = current + amount + 1;
		
		while (current >= images.length)
			current -= images.length;
		while (next >= images.length)
			next -= images.length;
			
		while (current < 0)
			current += images.length;
		while (next < 0)
			next += images.length;
			
		images.css('display', function (index) {
			if (amount > 0 && index === prev ||
				amount < 0 && index === next) {
				return 'none';
			}
			return 'block';
		});
		
		
		images.each(function (index, image) {
			diff = index - current - 1;
			if (diff < -1) // allow one space offscreen
				diff += images.length;
			
			$(image).stop(false, true).animate({
				left: (diff * spacer)
			}, duration, transition);
		});
		
		timeout = setTimeout(function () {
			update(amount);
		}, delay);
	}
	
	
	$('#scroll .arrow-left').click(function (e) {
		update(1);
	});
	$('#scroll .arrow-right').click(function (e) {
		update(-1);
	});
	
	current = -1;
	timeout = setTimeout(function () {
		update(1);
	}, delay)
});