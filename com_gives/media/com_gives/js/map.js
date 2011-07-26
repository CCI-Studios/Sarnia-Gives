(function (window, document, undefined) {
	var infoWindow;
	
	Map = new Class({
		Implements: [Options, Events],

		map: null,
		element: null,
		
		options: {
			lat: 42.98,
			lng: -82.385,
			zoom: 14,
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
	
	List = new Class({
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
				this.markers.push(new Annotation(
						child,
						child.get('data-title'),
						child.get('data-lat'),
						child.get('data-lng'),
						this.map));
			}, this);
		}
	});
	
	Annotation = new Class({
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
				if (infoWindow) {
					console.log('closing window');
					infoWindow.close();
					infoWindow = null;
				}
				
				console.log('making new window');
				infoWindow = new google.maps.InfoWindow({
					content: new Element('div', {
						'class': 'infoWindow',
						html: this.element.get('html')
					})
				});
				console.log('made new window');
				
				console.log('opening window');
				infoWindow.open(this.map, this.marker);
				console.log('opened window');
				
				console.log('setting classes');
				this.element.getParent().getChildren().removeClass('active');
				this.element.addClass('active');
				console.log('set classes')
			}).bind(this));
			
		},
		
		onClick: function () {
			alert('clicked '+this.title);
		}
		
	});
	
	
	window.addEvent('domready', function () {
		var map = new Map($('mapview').getElement('div'));
		var list = new List($('mapresults'), map);
	});
}(this, this.document));