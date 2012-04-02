/*
 * Google Maps API v3 for jQuery
 *
 * Copyright (c) 2010 tsutsu
 * MIT License: http://www.opensource.org/licenses/mit-license.php
 *
 * Date: 2010-10-26
 */
if (typeof google == 'undefined' || typeof google.maps == 'undefined') {
	document.write('<' + 'script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"><' + '/script>');
}

(function($){
	$.fn.gmap = function(options, callback) {
		var lastInfoWindow = null;
		var defaults = {
			'lat': 35.754683,
			'lng': 139.73938,
			'zoom': 10
		};
		settings = $.extend(defaults, options);
		var lat = settings.lat;
		var lng = settings.lng;
		var zoom = settings.zoom;
		var latlng = null;
		if (settings.position) {
			latlng = settings.position;
		} else {
			latlng = new google.maps.LatLng(lat, lng);
		}
		if (this.length) {
			var myOptions = {
				'zoom': zoom,
				'center': latlng,
				'mapTypeControl': false,
				'mapTypeId': google.maps.MapTypeId.ROADMAP
			};
			var map = new google.maps.Map(this.get(0), myOptions);
			$(this.get(0)).data('map', map);

			if (settings.marker != undefined) {
				var markers = new Array;
				$(settings.marker).each(function() {
					var infowindow = new google.maps.InfoWindow({
						'content': this.text
					});
					var mLatLng;
					if (this.position != undefined) {
						mLatLng = this.position;
					} else {
						mLatLng = new google.maps.LatLng(this.lat, this.lng);
					}
					var marker_option = {
						'position': mLatLng,
						'map': map,
						'title': this.title
					};
					if (this.icon) {
						marker_option.icon = this.icon;
						if (this.shadow) {
							marker_option.shadow = this.shadow;
						}
					}
					var marker = new google.maps.Marker(marker_option);
					zIndex = 0;
					if (this.zIndex != undefined) {
						zIndex = this.zIndex;
					}
					marker.setZIndex(zIndex);
					google.maps.event.addListener(marker, 'click', function() {
						if (lastInfoWindow) {
							lastInfoWindow.close();
						}
						infowindow.open(map, marker);
						lastInfoWindow = infowindow;
					});
					markers.push(marker);
				});
				$(this.get(0)).data('marker', markers);
			}
		}
		if (callback != undefined && map) {
			callback(map);
		}
	}
	$.geocoder = function(address, callback) {
		var geocoder = new google.maps.Geocoder();
		var map = this;
		if (geocoder) {
			geocoder.geocode({'address': address}, function(results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
						callback(results[0].geometry.location);
					} else {
						alert("指定の場所が存在しません。");
					}
				} else {
					if (status == google.maps.GeocoderStatus.ZERO_RESULTS) {
						alert('指定された住所[' + address + ']が見つかりませんでした。');
					} else {
						alert("検索に失敗しました。: " + status);
					}
				}
			});
		}
	}
})(jQuery);
