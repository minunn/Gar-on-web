function initialize() {
  var map = L.map("map").setView([43.840304, 4.311], 18); //setView([longitude, latitude], zoom);

  var osmLayer = L.tileLayer("http://{s}.tile.osm.org/{z}/{x}/{y}.png", {
    attribution: "© OpenStreetMap contributors",
    maxZoom: 19,
  });
  map.addLayer(osmLayer);

  L.marker([43.840304, 4.311]).addTo(map).bindPopup("Chez moi");

  L.marker([43.840167, 4.31098]).addTo(map).bindPopup("Chez mes voisins");

  /* CA MARCHE PAS
    L.marker([43.840302, 4.311323], {icon: customIcon}).addTo(map);

    var customIcon = L.icon({
        iconUrl: 'logofinal_2.png',
        //shadowUrl: 'icon-shadow.png',
        iconSize:     [64, 64], // taille de l'icone
        //shadowSize:   [50, 64], // taille de l'ombre
        iconAnchor:   [32, 64], // point de l'icone qui correspondra à la position du marker
        //shadowAnchor: [32, 64],  // idem pour l'ombre
        popupAnchor:  [-3, -76] // point depuis lequel la popup doit s'ouvrir relativement à l'iconAnchor
    });*/
}

function sous_menu_1_on() {
  /* Ferme les autres sous-menus s'ils sont ouverts et ouvre le menu 1 */
  sous_menu_2_off();
  sous_menu_3_off();
  document.getElementById("sous-menu_1").style.visibility = "visible";
}

function sous_menu_1_off() {
  /* Ferme le sous-menu 1 */
  document.getElementById("sous-menu_1").style.visibility = "hidden";
}

function sous_menu_2_on() {
  /* Ferme les autres sous-menus s'ils sont ouverts et ouvre le menu 2 */
  sous_menu_1_off();
  sous_menu_3_off();
  document.getElementById("sous-menu_2").style.visibility = "visible";
}

function sous_menu_2_off() {
  /* Ferme le sous-menu 2 */
  document.getElementById("sous-menu_2").style.visibility = "hidden";
}

function sous_menu_3_on() {
  /* Ferme les autres sous-menus s'ils sont ouverts et ouvre le menu 3 */
  sous_menu_1_off();
  sous_menu_2_off();
  document.getElementById("sous-menu_3").style.visibility = "visible";
}

function sous_menu_3_off() {
  /* Ferme le sous-menu 3 */
  document.getElementById("sous-menu_3").style.visibility = "hidden";
}

function sous_menus_off() {
  /* Ferme tous les sous-menus, appliqué dès la souris quitte le header */
  sous_menu_1_off();
  sous_menu_2_off();
  sous_menu_3_off();
}
