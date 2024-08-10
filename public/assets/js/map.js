;
function initMap() {
    var centerLat = document.getElementById("centerLatitude").value;
    var centerLong = document.getElementById("centerLongitude").value;
    var markerIcon = document.getElementById("markerIcon").value;
    var latlng = new google.maps.LatLng(centerLat, centerLong);
    var options = {
        zoom: 16,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        mapTypeControl: false
        // styles: [{"featureType": "landscape", "elementType": "labels", "stylers": [{"visibility": "off"}]}, {"featureType": "transit", "elementType": "labels", "stylers": [{"visibility": "off"}]}, {"featureType": "poi", "elementType": "labels", "stylers": [{"visibility": "off"}]}, {"featureType": "water", "elementType": "labels", "stylers": [{"visibility": "off"}]}, {"featureType": "road", "elementType": "labels.icon", "stylers": [{"visibility": "off"}]}, {"stylers": [{"hue": "#00aaff"}, {"saturation": -100}, {"gamma": 2.15}, {"lightness": 1}]}, {"featureType": "road", "elementType": "labels.text.fill", "stylers": [{"visibility": "on"}, {"lightness": -20}]}, {"featureType": "road", "elementType": "geometry", "stylers": [{"lightness": 57}]}]
    };
    var map = new google.maps.Map(document.getElementById("map"),options);
    var infowindow = new google.maps.InfoWindow(), marker, lat, lng;
    var markersList = document.getElementById("markersList").value;
    console.log(markersList);
    var json=JSON.parse(markersList);

    for( var o in json ){
        lat = json[ o ].lat;
        lng=json[ o ].lng;
        locationName=json[ o ].name;
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(lat,lng),
            name:locationName,
            map: map,
            icon: markerIcon,
            draggable: false,
            animation: google.maps.Animation.DROP
        }); 
        // marker.addListener('click', toggleBounce);
        google.maps.event.addListener( marker, 'click', function(e){
            infowindow.setContent( this.name );
            infowindow.open( map, this );
        }.bind( marker ) );
    }
}
google.maps.event.addDomListener(window, "load", initMap);