console.log('code JS chargé');

//RECUPERER LES COORDONNES DE LA VILLE

/* const URLville = `https://nominatim.openstreetmap.org/search?q=${ville}&format=json`;
const gps = document.querySelector('#gps');
fetch(URL)
    .then(response => response.json())
    .then((data) => {
        gps.insertAdjacentHTML('beforeend', `<div id="mescoord" data-lat="${search.lat}" data-lon="${search.lon}"></div>`);
        console.log(gps);
    }); */



//PARTIE MAP
var mymap = L.map('my_osm_widget_map', { /* use the same name as your <div id=""> */
  center: [dataJson[0].lat, dataJson[0].lon], /* set GPS Coordinates */
  zoom: 17, /* define the zoom level */
  zoomControl: false, /* false = no zoom control buttons displayed */
  scrollWheelZoom: false /* false = scrolling zoom on the map is locked */
});

L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoiZGVyYmVjYSIsImEiOiJjazBzNW11cXIwY2plM2N0aXlycWQxaWRiIn0.df8vHmJngmhQK_q2_BIFQQ', { /* set your personal MapBox Access Token */
  maxZoom: 20, /* zoom limit of the map */
  attribution: 'Données &copy; Contributeurs <a href="http://openstreetmap.org">OpenStreetMap</a> + ' +
    '<a href="http://mapbox.com">Mapbox</a> | ' +
    '<a href="https://creativecommons.org/licenses/by/2.0/">CC-BY</a> ' +
    'Guillaume Rouan 2016', /* set the map's caption */
    id: 'mapbox.streets' /* mapbox.light / dark / streets / outdoors / satellite */
}).addTo(mymap);

L.marker([42.360847, -71.056819]).addTo(mymap); /* set your location's GPS Coordinates : [LAT,LON] */