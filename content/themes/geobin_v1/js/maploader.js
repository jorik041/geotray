/* 
 * (C) Daniel Gilbert, 2013, tabero GbR.
 * 
 */

$(window).resize(function () {
    var h = $(window).height(),
    offsetTop = 100; // Calculate the top offset
    if (h - offsetTop < 500)
        {
            h = 500 + offsetTop;
        }
    $('#map').css('height', h - offsetTop);
}).resize();

var arrayMarkers = new Array();

var uriHash = null;

if (document.getElementById('geobin_urihash') !== null)
{
    uriHash = document.getElementById('geobin_urihash').value;  
}



// create a map in the "map" div, set the view to a given place and zoom
var cloudmadeUrl = 'http://{s}.tile.cloudmade.com/2acc0073775e4c17b5d1382633840eb2/997/256/{z}/{x}/{y}.png',
        cloudmade = new L.TileLayer(cloudmadeUrl, {maxZoom: 18}),
        map = new L.Map('map', {layers: [cloudmade], center: new L.LatLng(53.1405, 8.2141), zoom: 15 });
var drawnItems = new L.FeatureGroup();
map.addLayer(drawnItems);

if (uriHash === null)
{
    var drawControl = new L.Control.Draw({
            draw: {
                polyline: false,
                polygon: false,
                circle: false,
                rectangle: false
            },
            edit: {
                    featureGroup: drawnItems,
                    edit: false
            }
    });
    map.addControl(drawControl);
}
else
{
    $.getJSON(document.getElementById('geobin_jsonuri').value, function(data) {
        
      map.setView(new L.LatLng(data['center_lat'], data['center_lng']), data['zoom']);
        
      $.each(data['positions'], function(key, val) {
          L.marker([val.lat, val.lng]).addTo(map);
      });
    });
}

map.on('draw:created', function (e) {
        var type = e.layerType,
        layer = e.layer;
        if (type === 'marker') {
                layer.bindPopup('');
                arrayMarkers.push(e.layer.getLatLng());
        }
        document.getElementById('geobin_markers').value = JSON.stringify(arrayMarkers);
        drawnItems.addLayer(layer);
});

L.control.locate().addTo(map);

function setMapSettings(){
    document.getElementById('geobin_zoomlevel').value = JSON.stringify(map.getZoom());
    document.getElementById('geobin_center').value = JSON.stringify(map.getCenter());
}