<style>
.map {
    height: 100%;
    width: 100vw;
    min-height: 100%;
    min-width: 100%;
    margin: 0;
    padding: 0;
}

.geocodeError {
    position: absolute;
    display: none;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
    padding: 25px;
    width: 250px;
    height: 150px;
    background: #fff;
    border: 2px solid #000;
    font-weight: bold;
    font-size: 1.1em;
    text-align: center;
    z-index: 2000;
}

.errorCloseBtn {
    position: absolute;
    padding: 8px;
    top: 2px;
    right: 4px;
    font-weight: bold;
    font-size: 0.96em;
}

.errorText {
    margin-top: 30px;
}

.fill {
    min-height: 100%;
    height: 100%;
    width: 100%;
    min-width: 100%;
}
</style>

<form action="" id="manage_fenologia">
    <input type="hidden" name="id_fenologia" value="<?php echo isset($id_fenologia) ? $id_fenologia : '' ?>">
    <input type="hidden" name="id_user" value="<?php echo isset($_SESSION['login_id']) ? $_SESSION['login_id'] : '' ?>">

    <div class="container">
        <div class="card text-center card-outline card-warning caja-mes">
            <h3><b>NUEVO TALA</b></h3>
        </div>
        <div class="card">
            <div class="card-body card-outline card-warning">
                <label for="">IDENTIFICACIÓN</label>
                <div class="row">
                    <div class="col">
                        <div class="form-group ">
                            <label for="">¿Qué nombre le vas a poner a tu tala? <span
                                    style="color: #dc3545"><b>*</b></span></label>
                            <input type="text" name="Nombre_individuo" class="form-control form-control-sm"
                                value="<?php echo isset($Nombre_individuo) ? $Nombre_individuo : '' ?>" required>
                        </div>

                        <div class="form-group ">
                            <?php $flag =""; ?>
                            <label for="">¿Qué especie creés que es? <span
                                    style="color: #dc3545"><b>*</b></span></label>
                            <select name="id_especie" id="id_especie" class="custom-select custom-select-sm"
                                value="<?php echo isset($id_especie) ? $id_especie : '' ?>" required>
                                <option value="<?php echo isset($id_especie) ?>" disabled selected>
                                    <?php echo isset($id_especie) == isset($flag) ?  $row_request['Especie'] : 'Seleccionar especie'; ?>
                                </option>
                                <option value="1"
                                    <?php echo isset($id_especie) && $id_especie == '1' ? 'selected' : '' ?>>Tala
                                </option>
                                <option value="2"
                                    <?php echo isset($id_especie) && $id_especie == '2' ? 'selected' : '' ?>>Tala
                                    churqui</option>
                                <option value="3"
                                    <?php echo isset($id_especie) && $id_especie == '3' ? 'selected' : '' ?>>Tala
                                    gateador</option>
                                <option value="4"
                                    <?php echo isset($id_especie) && $id_especie == '4' ? 'selected' : '' ?>>No sé
                                </option>
                                <option value="5"
                                    <?php echo isset($id_especie) && $id_especie == '5' ? 'selected' : '' ?>>Otro
                                </option>
                            </select>
                        </div>
                        <div class="form-group ">
                            <label for="">Si seleccionaste otro escribí a continuación el nombre</label>
                            <input type="text" name="especie_otro" class="form-control form-control-sm"
                                value="<?php echo isset($especie_otro) ? $especie_otro : '' ?>">
                        </div>

                        <div class="form-group ">
                            <label for="">¿Se parecía más a un árbol o a un arbusto? <span
                                    style="color: #dc3545"><b>*</b></span></label>
                            <div class="row">
                                <img class="mx-auto d-block" src="assets/uploads/identificacion-19.jpg" width="190"
                                    height="195"></img>
                                <img class="mx-auto d-block" src="assets/uploads/identificacion-20.jpg" width="190"
                                    height="195"></img>
                            </div>
                            <select name="id_tipo" id="id_tipo" class="custom-select custom-select-sm"
                                value="<?php echo isset($id_tipo) ? $id_tipo : '' ?>" required>
                                <option value="<?php echo isset($id_tipo) ?>" disabled selected>
                                    <?php echo isset($id_tipo) == isset($flag) ? $row_request['Tipo'] : 'Seleccionar Tipo'; ?>
                                </option>
                                <option value="1" <?php echo isset($id_tipo) && $id_tipo == '1' ? 'selected' : '' ?>>
                                    Árbol</option>
                                <option value="2" <?php echo isset($id_tipo) && $id_tipo == '2' ? 'selected' : '' ?>>
                                    Arbusto</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="" class="control-label">Subí una foto de tu tala entero</label>
                            <div class="custom-file">
                                <input type="file" accept="image/*" class="custom-file-input rounded-circle"
                                    name="foto_completo" id="foto_completo" />
                                <label class="custom-file-label" for="customFile"
                                    value="<?php isset($meta['foto_tala']) ? isset($meta['foto_tala']) : '' ?>"><?php echo isset($foto_completo) ? $foto_completo : '' ?></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="control-label">Indicá la fecha en la que tomaste la foto <span
                                    style="color: #dc3545"><b>*</b></span></label>
                            <input type="date" name="fecha_foto" class="form-control form-control-sm"
                                max="<?= date('Y-m-d'); ?>" value="<?php echo isset($fecha_foto) ? $fecha_foto : '' ?>"
                                required>
                        </div>

                        <div class="form-group ">
                            <label for="">¿Qué tipo de espinas te parece que tiene? <span
                                    style="color: #dc3545"><b>*</b></span></label>
                            <div class="row">
                                <img class="mx-auto d-block" src="assets/uploads/identificacion-21.jpg" width="190"
                                    height="195"></img>
                                <img class="mx-auto d-block" src="assets/uploads/identificacion-22.jpg" width="190"
                                    height="195"></img>
                                <img class="mx-auto d-block" src="assets/uploads/identificacion-23.jpg" width="190"
                                    height="195"></img>
                            </div>
                            <select name="id_espinas" id="id_espinas" class="custom-select custom-select-sm"
                                value="<?php echo isset($id_espinas) ? $id_espinas : '' ?>" required>
                                <option value="<?php echo isset($id_espinas) ?>" disabled selected>
                                    <?php echo isset($id_espinas) == isset($flag) ? $row_request['Espinas'] : 'Seleccionar espinas'; ?>
                                </option>
                                <option value="1"
                                    <?php echo isset($id_espinas) && $id_espinas == '1' ? 'selected' : '' ?>>Espinas
                                    geminadas</option>
                                <option value="2"
                                    <?php echo isset($id_espinas) && $id_espinas == '2' ? 'selected' : '' ?>>Espinas
                                    curvas</option>
                                <option value="3"
                                    <?php echo isset($id_espinas) && $id_espinas == '3' ? 'selected' : '' ?>>Espinas
                                    brotadas</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="" class="control-label">Subí una foto de las espinas</label>
                            <div class="custom-file">
                                <input type="file" accept="image/*" class="custom-file-input rounded-circle"
                                    name="foto_espinas" id="foto_espinas" />
                                <label class="custom-file-label" for="customFile"
                                    value="<?php isset($meta['foto_espinas']) ? isset($meta['foto_espinas']) : '' ?>"><?php echo isset($foto_espinas) ? $foto_espinas : '' ?></label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body card-outline card-warning">
                <label for="">UBICACIÓN Y ENTORNO</label>
                <div class="row">
                    <div class="col">

                        <div class="form-group">
                            <label for="" class="control-label">Indicá la provincia en la que se encuentra tu tala<span
                                    style="color: #dc3545"><b>*</b></span></label>
                            <select name="id_provincia" id="id_provincia" class="form-control form-control-sm select2"
                                value="<?php echo isset($id_provincia) ? $$id_provincia : '' ?>" required>
                                <option value="<?php echo isset($id_provincia) ?>" disabled selected>
                                    <?php echo isset($id_provincia) == isset($flag) ? $row_request['Provincia'] : 'Seleccionar Provincia'; ?>
                                </option>
                                <?php            
                                $provincias = $bdd->query("SELECT * FROM provincias ");          
                                while($row_provincia= $provincias->fetch(PDO::FETCH_ASSOC)):  
                                ?>
                                <option value=<?php $row_provincia['id_provincia'] ?>
                                    <?php echo isset($provincia) && $provincia== $row_provincia['id_provincia'] ? 'selected' : $row_provincia['id_provincia'] ?>>
                                    <?php echo $row_provincia['Provincia'] ?></option>
                                <?php            
                                endwhile
                                ?>
                            </select>
                        </div>

                        <label for="" class="control-label">Indicá la localidad la que se encuentra tu tala<span
                                style="color: #dc3545"><b>*</b></span></label>
                        <div id="id_localidad">
                        </div>

                        <div class="form-group">
                            <label for="" class="control-label"> Para indicarnos
                                las coordenadas podés buscar la dirección con la lupita del mapa.
                                Una vez en la zona podés buscar el punto donde está tu Tala Amigo y hacer click en la
                                ubicación.
                                Te van a aparecer las coordenadas en las cajitas de "Latitud" y "Longitud". En caso de
                                haberte equivocado simplemente
                                tocás nuevamente en el lugar correcto.
                            </label>


                            <div class="form">
                                <div class="row">
                                    <div class="col-md-6 d-flex justify-content-center text-center">
                                        <div class="form-group"><label class="control-label"><span
                                                    class="label-text">Latitud</span>
                                                <input class="form-control form-control-sm" type="text" id="latitud"
                                                    name="latitud"
                                                    value="<?php echo isset($latitud) ? $latitud : '' ?>" />
                                            </label>
                                        </div>

                                    </div>
                                    <div class="col-md-6 d-flex justify-content-center text-center">
                                        <div class="form-group"><label class="control-label"><span
                                                    class="label-text">Longitud</span>
                                                <input class="form-control form-control-sm" type="text" id="longitud"
                                                    name="longitud"
                                                    value="<?php echo isset($longitud) ? $longitud : '' ?>"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="map" style="width: 300px; height: 300px; position: relative; outline-style: none;"
                                class="mx-auto d-block leaflet-container leaflet-touch leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom container fill"
                                tabindex="0">
                                <div class="leaflet-pane leaflet-map-pane"
                                    style="transform: translate3d(389px, 436px, 0px);">
                                    <div class="leaflet-pane leaflet-tile-pane">
                                        <div class="leaflet-layer " style="z-index: 1; opacity: 1;">
                                        </div>
                                    </div>
                                    <div class="leaflet-pane leaflet-overlay-pane"></div>
                                    <div class="leaflet-pane leaflet-shadow-pane"></div>
                                    <div class="leaflet-pane leaflet-marker-pane"></div>
                                    <div class="leaflet-pane leaflet-tooltip-pane"></div>
                                    <div class="leaflet-pane leaflet-popup-pane"></div>
                                    <div class="leaflet-proxy leaflet-zoom-animated"
                                        style="transform: translate3d(1.04766e+06px, 696943px, 0px) scale(4096);"></div>
                                </div>
                                <div class="leaflet-control-container">
                                    <div class="leaflet-top leaflet-left">
                                        <div class="leaflet-control-zoom leaflet-bar leaflet-control"><a
                                                class="leaflet-control-zoom-in" href="#" title="Zoom in" role="button"
                                                aria-label="Zoom in" aria-disabled="false"><span
                                                    aria-hidden="true">+</span></a><a class="leaflet-control-zoom-out"
                                                href="#" title="Zoom out" role="button" aria-label="Zoom out"
                                                aria-disabled="false"><span aria-hidden="true">−</span></a>
                                        </div>
                                    </div>
                                    <div class="leaflet-top leaflet-right"></div>
                                    <div class="leaflet-bottom leaflet-left"></div>
                                    <div class="leaflet-bottom leaflet-right">
                                        <div class="leaflet-control-attribution leaflet-control"><a
                                                href="https://leafletjs.com"
                                                title="A JavaScript library for interactive maps"><svg
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="12"
                                                    height="8" viewBox="0 0 12 8" class="leaflet-attribution-flag">
                                                    <path fill="#4C7BE1" d="M0 0h12v4H0z"></path>
                                                    <path fill="#FFD500" d="M0 4h12v3H0z"></path>
                                                    <path fill="#E0BC00" d="M0 7h12v1H0z"></path>
                                                </svg> Leaflet</a> <span aria-hidden="true">|</span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group ">
                            <label for="">Te invitamos a que cargues la foto de tu tala en <a
                                    href="https://www.google.com.ar/maps" target="_blank"> Argentinat </a> para saber
                                dónde está exactamente. Si ya cargaste tu tala tenés un id en Argentinat para este árbol
                                que podés indicar a continuación.</label>
                            <img class="mx-auto d-block" src="assets/uploads/argentinat_ej.jpg" width="344"
                                height="128"></img>
                            <input type="text" name="id_argentinat" class="form-control form-control-sm"
                                value="<?php echo isset($id_argentinat) ? $id_argentinat : '' ?>">
                        </div>

                        <div class="form-group ">
                            <label for="">¿Las fotos corresponden a un ejemplar cultivado o está presente en un ambiente
                                natural?</label>
                            <select name="id_origen" id="id_origen" class="custom-select custom-select-sm"
                                value="<?php echo isset($id_origen) ? $id_origen : '' ?>">
                                <option value="<?php echo isset($id_origen) ?>" disabled selected>
                                    <?php echo isset($id_origen) == isset($flag) ?  $row_request['Origen'] : 'Seleccionar'; ?>
                                </option>
                                <option value="1"
                                    <?php echo isset($id_origen) && $id_origen == '1' ? 'selected' : '' ?>>
                                    Cultivado
                                </option>
                                <option value="2"
                                    <?php echo isset($id_origen) && $id_origen == '2' ? 'selected' : '' ?>>
                                    Natural
                                </option>
                                <option value="3"
                                    <?php echo isset($id_origen) && $id_origen == '3' ? 'selected' : '' ?>>No sé
                                </option>
                            </select>
                        </div>

                        <div class="form-group ">
                            <label for="">¿Tu tala se encuentra en un lugar soleado o a la sombra?</label>
                            <select name="luz" id="luz" class="custom-select custom-select-sm"
                                value="<?php echo isset($luz) ? $luz : '' ?>">
                                <option value="<?php echo isset($luz) ?>" disabled selected>
                                    <?php echo isset($luz) == isset($flag) ?  $row_request['luz'] : 'Seleccionar'; ?>
                                </option>
                                <option value="1" <?php echo isset($luz) && $luz == '1' ? 'selected' : '' ?>>Sol
                                </option>
                                <option value="2" <?php echo isset($luz) && $luz == '2' ? 'selected' : '' ?>>
                                    Sombra
                                </option>
                            </select>
                        </div>

                        <div class="form-group ">
                            <label for="">¿Tu tala se encuentra a menos de 5 m de un edificio?</label>
                            <select name="distancia_edif" id="distancia_edif" class="custom-select custom-select-sm"
                                value="<?php echo isset($distancia_edif) ? $distancia_edif : '' ?>">
                                <option value="<?php echo isset($distancia_edif) ?>" disabled selected>
                                    <?php echo isset($distancia_edif) == isset($flag) ?  $row_request['disancia_edif'] : 'Seleccionar'; ?>
                                </option>
                                <option value="si"
                                    <?php echo isset($distancia_edif) && $distancia_edif == 'si' ? 'selected' : '' ?>>Sí
                                </option>
                                <option value="no"
                                    <?php echo isset($distancia_edif) && $distancia_edif == 'no' ? 'selected' : '' ?>>No
                                </option>
                            </select>
                        </div>

                        <div class="form-group ">
                            <label for="">¿Estás de acuerdo con que se difunda la ubicación de tu tala en Argentinat?
                                <span style="color: #dc3545"><b>*</b></span></label>
                            <select name="permiso" id="permiso" class="custom-select custom-select-sm"
                                value="<?php echo isset($permiso) ? $permiso : '' ?>" required>
                                <option value="<?php echo isset($permiso) ?>" disabled selected>
                                    <?php echo isset($permiso) == isset($flag) ? $row_request['permiso'] : 'Seleccionar'; ?>
                                </option>
                                <option value="1" <?php echo isset($permiso) && $permiso == '1' ? 'selected' : '' ?>>Sí
                                </option>
                                <option value="2" <?php echo isset($permiso) && $permiso == '2' ? 'selected' : '' ?>>No
                                </option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body card-outline card-warning">
                    <label for="">¿Nos querés contar algo más del tala? Si tenés dudas comunicate a info@restaura.com.ar
                    </label>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <!-- <label for="" class="control-label">Espacio libre para comentarios</label> -->
                                <textarea name="Sugerencias" id="" cols="30" rows="10" class="form-control">
                            <?php echo isset($Sugerencias) ? '' . $Sugerencias . '' : '' ?>
                            </textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-lg-12 text-right justify-content-center d-flex">
                    <button class="btn btn-primary mr-2">Guardar</button>
                    <button class="btn btn-secondary" type="button"
                        onclick="location.href = 'index.php?page=mis_talas'">Cancelar</button>
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>

</form>


<script>
$('#manage_fenologia').submit(function(e) {
    e.preventDefault()
    $('input').removeClass("border-danger")
    start_load()
    $.ajax({
        url: 'ajax.php?action=save_fenologia',
        data: new FormData($(this)[0]),
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST',
        success: function(resp) {
            if (resp == 1) {
                alert_toast('Guardado exitosamente.', "success");
                setTimeout(function() {
                    location.replace('index.php?page=mis_talas')
                }, 750)
            }
        }
    })
})


// Mapa y geocoder
map = L.map('map').setView([-34.505, -62], 5);

tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);


var LeafIcon = L.Icon.extend({
    options: {
        iconSize: [57.4, 75],
        shadowSize: [50, 64],
        iconAnchor: [22, 94],
        shadowAnchor: [4, 62],
        popupAnchor: [-3, -76]
    }
});
var greenIcon = new LeafIcon({
        iconUrl: 'assets/uploads/icons/Talita.png'
    }),
    redIcon = new LeafIcon({
        iconUrl: 'leaf-red.png'
    }),
    orangeIcon = new LeafIcon({
        iconUrl: 'leaf-orange.png'
    });
map.on('click', onMapClick);

L.icon = function(options) {
    return new L.Icon(options);
};
var tala = {};

function onMapClick(click) {
    var coordenada = click.latlng;
    var latitud = coordenada.lat; // lat  es una propiedad de latlng
    document.getElementById('latitud').value = latitud;
    var longitud = coordenada.lng; // lng también es una propiedad de latlng
    document.getElementById('longitud').value = longitud;
    // alert("Acabas de hacer clic en: \n latitud: " + latitud + "\n longitud: " + longitud);
    if (tala !== undefined) {
        map.removeLayer(tala);
    }
    tala = L.marker([latitud, longitud], {
        icon: greenIcon
    }).addTo(map).bindPopup("Soy tu Tala amigo");
};

// Open Street Map 
osm = L.tileLayer('//{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {}).addTo(map);

// container for address search results
addressSearchResults = new L.LayerGroup().addTo(map);

/*** Geocoder ***/
// OSM Geocoder

osmGeocoder = new L.Control.geocoder({
    collapsed: false,
    position: 'topright',
    text: 'Address Search',
    placeholder: 'Dirección,localidad,provincia',
    defaultMarkGeocode: false
}).addTo(map);

// handle geocoding result event
osmGeocoder.on('markgeocode', e => {
    // to review result object
    console.log(e);
    // coordinates for result
    const coords = [e.geocode.center.lat, e.geocode.center.lng];
    // center map on result
    map.setView(coords, 16);
    // popup for location
    // todo: use custom icon
    const resultMarker = L.marker(coords).addTo(map);
    // add popup to marker with result text
    resultMarker.bindPopup(e.geocode.name).openPopup();
});
</script>

<script>
$(document).ready(function() {
    recargarLista();

    $('#id_provincia').change(function() {
        recargarLista();
    });
})

function recargarLista() {
    $.ajax({
        type: "POST",
        url: 'ajax.php?action=cargar_localidad',
        data: "id_provincia=" + $('#id_provincia').val(),
        success: function(r) {
            $('#id_localidad').html(r);
        }
    });
}

// Chequear si la imágen no pesa más de 2MB
var completo = document.getElementById("foto_completo");
completo.onchange = function() {
    if (this.files[0].size > 20097152) {
        alert("¡La imágen que elegiste es demasiado grande! Máximo permitido 20 MB");
        this.value = "";
    };
};

var fruto = document.getElementById("foto_fruto");
fruto.onchange = function() {
    if (this.files[0].size > 20097152) {
        alert("¡La imágen que elegiste es demasiado grande! Máximo permitido 20 MB");
        this.value = "";
    };
};

var pireno = document.getElementById("foto_pireno");
pireno.onchange = function() {
    if (this.files[0].size > 20097152) {
        alert("¡La imágen que elegiste es demasiado grande! Máximo permitido 20 MB");
        this.value = "";
    };
};
</script>