(function (window, document, undefined) {
	
	Map = new Class({
		Implements: [Options, Events],

		map: null,
		
		options: {
			element: null,
			lat: 0,
			lng: 0,
			zoom: 5,
			width: '100%',
			height: 400
		},
		
		initialize: function (options) {
			var mapOptions;
			
			this.setOptions(options);
			
			mapOptions = {
				center: new google.maps.LatLng(this.options.lat, this.options.lng),
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				zoom: this.options.zoom
			};
			
			this.options.element = $(this.options.element);
			this.options.element.setStyles({
				height: this.options.height,
				width: this.options.width
			});
			this.map = new google.maps.Map(this.options.element, mapOptions);
		},
		
		moveTo: function (lat, lng) {
			this.map.setCenter(new google.maps.LatLng(lat, lng));
		},
		
		addMarker: function () {
			
		}
	});
	
	
	window.addEvent('domready', function () {
		var map = new Map({
			element: $('mapview').getElement('div'),
			lat: 43.0003831,
			lng: -81.941786
		});
		
		console.log(map);
	});
}(this, this.document));