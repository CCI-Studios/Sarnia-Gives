(function (window, document) {
	window.addEvent('load', function () {
		if (Modernizr.input.placeholder) {
			return;
		}

		$$('input[placeholder]').each(function (input) {
			var placeholder = input.getProperty('placeholder');

			input.addEvents({
				focus: function () {
					if (input.value === placeholder) {
						input.value = '';
					}
				},
				blur: function () {
					if (input.value === '') {
						input.value = placeholder;
					}
				}
			});
		});
	});
}(this, this.document));


(function (window, document) {
	window.addEvent('domready', function () {
		var images = $$('img.rollover');
		
		images.each(function (image) {
			var over, normal;
			normal = image.src;
			over = normal.replace('_normal', '_over');
			
			image.addEvents({
				mouseenter: function() {
					image.src = over;
				},
				mouseleave: function() {
					image.src = normal;
				}
			})
		});
	});
}(this, this.document));