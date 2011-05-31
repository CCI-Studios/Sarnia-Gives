jQuery(function ($) {
	var images, left, right, update, current, timeout, spacer, delay, duration, transition;
	delay = 4000;
	duration = 1000;
	spacer = 320;
	transition = 'swing';

	images = $('#scroll .inner').find('.moduletable');
	images.each(function (index, image) {
		$(image).css({
			padding: 0,
			position: 'absolute',
			left: (spacer*index)
		});
	});
	
	update = function (amount) {
		clearTimeout(timeout);
		images.css('display', 'block');
		if (amount > 0) {
			$(images[current]).css('display', 'none');
		} else {
			if (current - 1 >= 0) {
				$(images[current - 1]).css('display', 'none');
			} else {
				$(images[images.length - 1]).css('display', 'none');
			}
		}
		
		current += amount;
		if (current === images.length) {
			current = 0
		}
		if (current === -1) {
			current = images.length - 1;
		}
		
		images.each(function (index, image) {
			if (index >= current) {
				$(image).stop(false, true).animate({
					left: ((index - current - 1) * spacer)
				}, duration, transition);
			} else {
				$(image).stop(false, true).animate({
					left: ((index - current - 1 + images.length) * spacer)
				}, duration, transition);
			}
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