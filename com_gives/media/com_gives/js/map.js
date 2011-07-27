var cci = cci = cci || {};
cci.gives = cci.gives = cci.gives || {};

cci.gives.map = new Class({
	Implements: [Options, Events],

	map: null,
	element: null,
	
	options: {
		lat: 42.97,
		lng: -82.35,
		zoom: 12,
		width: '100%',
		height: 400
	},
	
	initialize: function (element, options) {
		var mapOptions;
		
		this.setOptions(options);
		
		mapOptions = {
			center: new google.maps.LatLng(this.options.lat, this.options.lng),
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			zoom: this.options.zoom
		};
		
		this.element = $(element);
		this.element.setStyles({
			height: this.options.height,
			width: this.options.width
		});
		this.map = new google.maps.Map(this.element, mapOptions);
	},
	
	moveTo: function (lat, lng) {
		this.map.setCenter(new google.maps.LatLng(lat, lng));
	},
	
	addMarker: function (ann) {
		var marker = new google.maps.Marker({
			position: new google.maps.LatLng(ann.lat, ann.lng),
			map: this.map,
			title: ann.title
		});
		
		return marker;
	}
});

cci.gives.list = new Class({
	Implements: [Events, Options],
	
	element: null,
	children: null,
	map: null,
	markers: null,
	
	options: {
		child: 'li'
	},
	
	initialize: function (element, map, options) {
		this.setOptions(options);
		
		this.element = $(element);
		this.children = this.element.getElements(this.options.child);
		this.map = map;
		
		this.markers = [];
		this.children.each(function (child) {
			this.markers.push(new cci.gives.annotation(
					child,
					child.get('data-title'),
					child.get('data-lat'),
					child.get('data-lng'),
					this.map));
		}, this);
	}
});

cci.gives.annotation = new Class({
	marker: null,
	element: null,
	
	title: null,
	lat: null,
	lng: null,
	
	map: null,
	
	initialize: function (element, title, lat, lng, map) {
		this.element = $(element);
		this.title = title;
		this.lat = lat;
		this.lng = lng;
		this.map = map;
		
		this.marker = this.map.addMarker(this);
		google.maps.event.addListener(this.marker, 'click', (function (event) {
			if (cci.gives.infoWindow) {
				cci.gives.infoWindow.close();
				cci.gives.infoWindow = null;
			}
			
			cci.gives.infoWindow = new google.maps.InfoWindow({
				content: new Element('div', {
					'class': 'infoWindow',
					html: this.element.get('html')
				})
			});

			cci.gives.infoWindow.open(this.map, this.marker);
			
			this.element.getParent().getChildren().removeClass('active');
			this.element.addClass('active');
		}).bind(this));
		
	}
});