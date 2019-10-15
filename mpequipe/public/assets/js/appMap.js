//Requête vers l'API Openstreetmap
const URLCity = `https://nominatim.openstreetmap.org/search?q=chicago&format=json`;
fetch(URLCity)
.then(responseFromServer => responseFromServer.json())
.then((dataJson) => {
    //-------------Affichage de la map Openstreetmap----------------
    document.querySelector('#map').innerHTML = '<div id="my_osm_widget_map"></div>';
    var mymap = L.map('my_osm_widget_map', { /* use the same name as your <div id=""> */
    center: [dataJson[0].lat, dataJson[0].lon], /* set GPS Coordinates */
    zoom: 13, /* define the zoom level */
    zoomControl: false, /* false = no zoom control buttons displayed */
    scrollWheelZoom: false /* false = scrolling zoom on the map is locked */
    });

    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoiYWNhcmRuaWNvbGFzOTEiLCJhIjoiY2swcnl3Ymt4MDFpMTNkcDVrdzRvMmQ5MyJ9.Jmw2gfO6CTF4yjmOkGm49w', { /* set your personal MapBox Access Token */
    maxZoom: 20, /* zoom limit of the map */
    attribution: 'Données &copy; Contributeurs <a href="http://openstreetmap.org">OpenStreetMap</a> + ' +
    '<a href="http://mapbox.com">Mapbox</a> | ' +
    '<a href="https://creativecommons.org/licenses/by/2.0/">CC-BY</a> ' +
    'Guillaume Rouan 2016', /* set the map's caption */
    id: 'mapbox.streets' /* mapbox.light / dark / streets / outdoors / satellite */
    }).addTo(mymap);

    L.marker([dataJson[0].lat, dataJson[0].lon]).addTo(mymap);
     /* set your location's GPS Coordinates : [LAT,LON] */
     //affichage des restaurants sous forme de marker
    const cards = document.querySelectorAll('.card');
    console.log(cards);
    cards.forEach((card) => {
      //implémentation des markers
     const marker =  L.marker([card.getAttribute('data-lat'), card.getAttribute('data-lng')]).addTo(mymap);
     //affichage d'une bulle d'info
     const popup = marker.bindPopup(card.getAttribute('data-name'));
    });

});