window.addEvent('domready', function() {
	var element, delta, current;
	
	function saveSize(size) {
		expire = new Date();
		expire.setTime((new Date()).getTime() + 3600000*24*1000);
		document.cookie = 	'template.size='+ size + ';' +
							'path=/;' +
							'expires=' + expire.toGMTString();
	};
	
	function loadSize() {
		var dc = document.cookie;
		var cname = 'template.size=';

		if (dc.length > 0) {
			begin = dc.indexOf(cname);
	
			if (begin != -1) {
				begin += cname.length;
				end = dc.indexOf(";", begin);
				
				if (end == -1)
					end = dc.length;
				
				return unescape(dc.substring(begin, end));
			}
		}
		
		return 10;
	}
	
	function setSize(size) {
		$('body').setStyle('font-size', (size/10)+'em');
	}
	
	element = $('text_sizer');
	delta = 2;
	current = loadSize();
	
	if (!element)
		return;
		
	console.log('current: ' + current);
	element.getElement('.increase').addEvent('click', function() {
		current = Math.min(10+delta*2, current + delta);
		setSize(current);
		saveSize(current);
	});
	element.getElement('.decrease').addEvent('click', function() {
		current = Math.max(10-delta*2, current - delta);
		setSize(current);
		saveSize(current);
	});
});