$(function() {
  if ($('#map').length > 0) {
    var map = L.map('map', {scrollWheelZoom: false}).setView([51.505, -0.09], 13);
    var OpenStreetMap_DE = L.tileLayer('http://{s}.tile.openstreetmap.de/tiles/osmde/{z}/{x}/{y}.png', {
      maxZoom: 18,
      attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    map.on('popupopen', function(e) {
      var px = map.project(e.popup._latlng); // find the pixel location on the map where the popup anchor is
      px.y -= e.popup._container.clientHeight/2 // find the height of the popup container, divide by 2, subtract from the Y axis of marker location
      map.panTo(map.unproject(px),{animate: true}); // pan to new center
    });

    var markerarray = [];
    var coords_all = window.mgf.modulemapcoords;
    var marker = '';

    $(coords_all).each(function(idx, item){
      marker = L.marker(item.latlng).addTo(map).bindPopup(item.text, { autoPanPadding: 20, autoPan: true });
      markerarray.push(marker);
    });

    var group = new L.featureGroup(markerarray);
    map.fitBounds(group.getBounds(), {maxZoom: 17});

    // open popup if only one address is shown
    if ($(markerarray).length == 1) marker.openPopup();
  }
});
