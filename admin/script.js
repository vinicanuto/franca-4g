/*
 $(document).ready(function () {
 */
const map = L.map('map').setView([-20.5415, -47.4012], 12);
map.zoomControl.setPosition('topright');
/*var marker = L.marker([-20.5415, -47.4012]).addTo(map)
 .bindPopup('Cidade de Franca')
 .openPopup(); */
map.addLayer(new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        {attribution: 'Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'}
));

/*
 L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
 attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
 }).addTo(map);
 L.Control.geocoder().addTo(map);
 */
var $resultado = document.querySelector('#resultado');

var GeoSearchControl = window.GeoSearch.GeoSearchControl;
//var OpenStreetMapProvider = window.GeoSearch.OpenStreetMapProvider;
var BingProvider = window.GeoSearch.BingProvider;

// remaining is the same as in the docs, accept for the var instead of const declarations
//var provider = new EsriProvider();

const provider = new BingProvider({
    params: {
        key: 'AuWrnTZVhQe1Fzyj5ERx303K2_iy48Ua1lBgG_GnIV6h0BRGbI2Z1r3ZL6l62xRW' //CHAVE DO API BING
    },
});

var searchControl = new GeoSearchControl({
    provider: provider,
    style: 'button',
    autoComplete: true,
    autoClose: true,
    showPopup: false,
    marker: {// optional: L.Marker    - default L.Icon.Default
        icon: new L.Icon(
                {
                    iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
                    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                    iconSize: [25, 41],
                    iconAnchor: [12, 41],
                    popupAnchor: [1, -34],
                    shadowSize: [41, 41]
                }),
        draggable: false,
    },
    showMarker: true,
    autoCompleteDelay: 250,
    searchLabel: 'Busque um endereço, cep ...',
    keepResult: true
});

map.addControl(searchControl);


map.on('geosearch/showlocation', (result) => {
    console.log(result);
    var cep = result.location.raw.address.postalCode;

    cep = cep.replace(/[^\d]+/g, '');// retira todos simbolos do cep, apenas numeros
    var lat = result.location.x
    var lng = result.location.y;


    //envia o cep para o php validar se existe no banco de dados
    $.ajax({
        url: 'valida-end.php',
        type: 'post',
        dataType: 'html',
        data: {
            'cep': cep,
            'lat': lat,
            'lng': lng

        }
    }).done(function (data) {
        $resultado.innerHTML = data // caso encontrado, cria na tela a informação que achou
    });
});
///// --- Que funciona ----
var district_boundary = new L.geoJson();
;
district_boundary.addTo(map);

$.ajax({
    dataType: "json",
    url: "franc4g.geojson",
    success: function (data) {
        $(data.features).each(function (key, data) {
            district_boundary.addData(data);
        });
    }
}).error(function () {});
////--------------------------------


//L.circle([ -47.484161, -20.596141], {radius: 10000}).addTo(map);
